<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Library\AuthCustom;
use App\Library\DirectAPI;
use App\Library\Files;
use App\Library\Helpers;
use App\Library\HelpersDecode;
use App\Library\MediaHelpers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Log;

use Redirect;
use Session;
use function PHPUnit\Framework\isEmpty;

class ServiceController extends Controller
{

    public function getList(Request $request){
        $url = '/service';
        $method = "GET";

        $dataSend = array();
        $dataSend['limit'] = 100;

        if ($request->ajax()){

            $page = $request->page;
            $url = '/service';
            $method = "GET";

            $dataSend = array();
            $dataSend['page'] = $page;

            if (isset($request->title) || $request->title != '' || $request->title != null) {
                $dataSend['search'] = $request->title;
            }

            $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){

                $data = $response_data->data;

                $data = new LengthAwarePaginator($data->data, $data->total, $data->per_page, $page, $data->data);
                $data->setPath($request->url());
                $html = view('frontend.pages.service.widget.__datalist')
                    ->with('data', $data)->render();

                if (count($data) == 0 && $page == 1){
                    return response()->json([
                        'status' => 0,
                        'message' => 'Không có dữ liệu.',
                    ]);
                }

                return response()->json([
                    "success"=> "Load dữ liệu thành công",
                    "status"=> 1,
                    "data" => $html,
                ], 200);

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $response_data = $result_Api->response_data??null;

        if(isset($response_data) && $response_data->status == 1 && isset($response_data->data)){

            $data = $response_data->data;

            $data = new LengthAwarePaginator($data->data, $data->total, $data->per_page, $data->current_page, $data->data);
            $data->setPath($request->url());


            Session::put('path', $_SERVER['REQUEST_URI']);

            return view('frontend.pages.service.list')->with('data', $data);

        }else{
            $data =null;
            $message = "Không thể lấy dữ liệu";
            return view('frontend.pages.service.list')->with('data', $data)->with('message', $message);
//            return response()->json([
//                'status' => 0,
//                'message'=>$response_data->message??"Không thể lấy dữ liệu"
//            ]);
        }
    }

    public function getDetail(Request $request,$slug){

        $url = '/service/'.$slug;
        $method = "GET";
        $dataSend = array();
//        $dataSend['slug'] = $slug;

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $response_data = $result_Api->response_data??null;

        if(isset($response_data) && ($response_data->status??"") == 1){

            $data = $response_data->data;

            try {

                $data_seo_price = 0;
                $service_params = json_decode($data->params);
                $filter_type = $service_params->filter_type;
                $server_mode = $service_params->server_mode;
                $server_price = $service_params->server_price;

                if ( $filter_type == 7 ) {
                    $data_seo_price = $service_params->input_pack_min;
                }

                if ( $filter_type == 4 || $filter_type == 5 ) {
                    if ( $server_mode == 1 && $server_price == 1 ) {
                        $server_id =  $service_params->server_id[0];
                        $data_seo_price = $service_params->{'price'.$server_id}[0];
                    } else {
                        $data_seo_price = $service_params->price[0];
                    }
                }

                if ( $filter_type == 6 ) {
                    $data_seo_price = $service_params->price[0];
                }

            } catch (\Exception $e) {
                $data_seo_price = 7700;
            }

            $urlCate = '/service';

            $dataSendCate = array();
            $dataSendCate['limit'] = 8;
            $result_cate_Api = DirectAPI::_makeRequest($urlCate,$dataSendCate,$method);
//            return $result_cate_Api;
            $response_cate_data = $result_cate_Api->response_data??null;

            if(isset($response_cate_data) && $response_cate_data->status == 1){

                $datacate = $response_cate_data->data;

                $datacate = new LengthAwarePaginator($datacate->data, $datacate->total, $datacate->per_page, $datacate->current_page, $datacate->data);
                $datacate->setPath($request->url());

                Session::put('path', $_SERVER['REQUEST_URI']);

                if (!$data) {
                    abort('404');
                }

                return view('frontend.pages.service.detail')
                    ->with('data', $data)
                    ->with('data_seo_price', $data_seo_price)
                    ->with('datacate', $datacate)
                    ->with('slug', $slug);

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_cate_data->message??"Không thể lấy dữ liệu"
                ]);
            }

        }
        elseif ($result_Api->response_code == 404){
            return view('frontend.404.404');
        }
        else{

            $data =null;
            $message = "Không thể lấy dữ liệu";
            return view('frontend.pages.service.detail')->with('data', $data)->with('message', $message);

        }
    }

    public function showBot(Request $request){
        if ($request->ajax()){
            $slug = $request->slug;

            $url = '/service/list-bot/'.$slug;
            $method = "GET";
            $dataSend = array();
//        $dataSend['slug'] = $slug;

            $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && ($response_data->status??"") == 1){

                $data_bot = $response_data->data_bot??null;

                $html =  view('frontend.pages.service.widget.__data__bot')
                    ->with('data_bot',$data_bot)->render();

                return response()->json([
                    'status' => 1,
                    'data' => $html,
                    'message' => 'Load du lieu thanh cong.',
                ]);

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }
    }

    public function getLogs(Request $request)
    {
        if (AuthCustom::check()) {
            $url = '/service/log';
            $method = "GET";
            $dataSend = array();
            $jwt = Session::get('jwt');
            if (empty($jwt)) {
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }
            $dataSend['token'] = $jwt;
            $dataSend['author_id'] = AuthCustom::user()->id;

            if ($request->ajax()) {
                $page = $request->page;

                $dataSend['page'] = $page;

                if ($request->filled('id')) {
                    $dataSend['id'] = $request->id;
                }

                if ($request->filled('slug_category')) {
                    $dataSend['slug_category'] = $request->slug_category;
                }

                if ($request->filled('status')) {
                    $dataSend['status'] = $request->status;
                }

                if (isset($request->started_at) || $request->started_at != '' || $request->started_at != null) {
                    $started_at = \Carbon\Carbon::parse($request->started_at)->format('Y-m-d H:i:s');
                    $dataSend['started_at'] = $started_at;
                }

                if (isset($request->ended_at) || $request->ended_at != '' || $request->ended_at != null) {
                    $ended_at = \Carbon\Carbon::parse($request->ended_at)->format('Y-m-d H:i:s');
                    $dataSend['ended_at'] = $ended_at;
                }


                $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);
                $response_data = $result_Api->response_data??null;

                if(isset($response_data) && $response_data->status == 1){

                    $data = $response_data->datatable;

                    if (isEmpty($data->data)) {
                        $data = new LengthAwarePaginator($data->data, $data->total, $data->per_page, $data->current_page, $data->data);
                    }

                    if (count($data) == 0 && $page == 1){

                        return response()->json([
                            'status' => 0,
                            'message' => 'Không có dữ liệu !',
                        ]);
                    }

                    $html = view('frontend.pages.service.widget.__datalogs')->with('data', $data)->render();
                    return response()->json([
                        "success"=> true,
                        "data" => $html,
                        "status" => 1,
                        "last_page"=>$data->lastPage(),
                    ], 200);

                }
                else{
                    return response()->json([
                        'status' => 0,
                        'message'=>"Không thể tải dữ liệu vui lòng thử lại."
                    ]);
                }
            }

            $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);


            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){

                $datacate = $response_data->categoryservice;

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>"Không thể tải dữ liệu vui lòng thử lại."
                ]);
            }

            return view('frontend.pages.service.logs')->with('datacate',$datacate);
        }

    }

    public function getLogsDetail(Request $request,$id){

        if (AuthCustom::check()) {
            $url = '/service/log/detail';
            $method = "GET";
            $dataSend = array();
            $jwt = Session::get('jwt');
            if (empty($jwt)) {
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }
            $dataSend['token'] = $jwt;
            $dataSend['id'] = $id;

            $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){

                $data = $response_data->data;

                $urlInbox = '/inbox/'.$id.'/send';
                $methodInbox = "GET";
                $dataSendInbox = array();


                $dataSendInbox['token'] = $jwt;
                $dataSendInbox['id'] = $id;

                $result_Inbox_Api = DirectAPI::_makeRequest($urlInbox, $dataSendInbox, $methodInbox);
                $response_Inbox_data = $result_Inbox_Api->response_data??null;

                if(isset($response_Inbox_data) && $response_Inbox_data->status == 1){

                    $dataInbox = $response_Inbox_data->data;
                    $conversation = $dataInbox->conversation;
                    $inbox = $dataInbox->inbox;
                    $itemInbox = $dataInbox->order;

                    return view('frontend.pages.service.logsdetail')->with('data', $data)->with('itemInbox', $itemInbox)->with('inbox', $inbox)->with('conversation', $conversation);

                }
                else{
                    return response()->json([
                        'status' => 0,
                        'message'=>$response_data->message??"Không thể lấy dữ liệu"
                    ]);
                }



            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }
    }

    public function getDelete(Request $request){

        if (AuthCustom::check()) {
            $id = $request->get('id');
            $url = '/service/log/detail';
            $method = "GET";
            $dataSend = array();
            $jwt = Session::get('jwt');
            if (empty($jwt)) {
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }
            $dataSend['token'] = $jwt;
            $dataSend['id'] = $id;

            $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){

                $data = $response_data->data;

                $input_auto = \App\Library\HelpersDecode::DecodeJson('input_auto', $data->itemconfig_ref->params);

                if ($input_auto==1 && ($data->itemconfig_ref->idkey!='' ||$data->itemconfig_ref->idkey!=null )){
                    return response()->json([
                        'status' => 0,
                        'message' => "Dịch vụ không thể xóa",
                    ]);
                }else{
                    return response()->json([
                        'status' => 1,
                        'message' => "Lấy dữ liệu thành công",
                    ]);
                }

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }
    }

    public function getEdit(Request $request){
        if (AuthCustom::check()) {

            $id = $request->get('id');
            $url = '/service/log/detail';
            $method = "GET";
            $dataSend = array();
            $jwt = Session::get('jwt');
            if (empty($jwt)) {
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }
            $dataSend['token'] = $jwt;
            $dataSend['id'] = $id;

            $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){

                $data = $response_data->data;

                $input_auto = \App\Library\HelpersDecode::DecodeJson('input_auto', $data->itemconfig_ref->params);

                if ($input_auto==1 && ($data->itemconfig_ref->idkey!='' ||$data->itemconfig_ref->idkey!=null )){
                    return response()->json([
                        'status' => 0,
                        'message' => "Dịch vụ không thể sửa",
                    ]);
                }else{
                    return response()->json([
                        'status' => 1,
                        'message' => "Lấy dữ liệu thành công",
                    ]);
                }

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }
    }

    public function postDestroy(Request $request,$id){
        if (AuthCustom::check()) {
            $url = '/service/log/detail/destroy/'.$id;
            $method = "POST";
            $dataSend = array();
            $jwt = Session::get('jwt');
            if (empty($jwt)) {
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }
            $dataSend['token'] = $jwt;
            $dataSend['mistake_by'] = $request->mistake_by;
            $dataSend['note'] = $request->note;

            $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){

                if ($response_data->status == 1) {

                    return response()->json([
                        'status' => 1,
                        'message' => $response_data->message,
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => $response_data->message,
                    ]);
                }

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }

    }

    public function postPurchase(Request $request,$id){
        if (AuthCustom::check()) {

            $index = $request->index;

            $url = '/service/purchase';
            $method = "POST";
            $dataSend = array();
            $jwt = Session::get('jwt');

            if (empty($jwt)) {
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }

            $dataSend['token'] = $jwt;
            $dataSend['id'] = $id;

            $dataSend['selected'] = $request->selected;
            $dataSend['server'] = $request->get('server');

            if ((int)$index > 0){
                for ($i = 0; $i < $index; $i++){
                    $dataSend['customer_data'.$i] = $request->get('customer_data'.$i);
                }
            }
            $dataSend['rank_from'] = $request->get('rank_from');
            $dataSend['rank_to'] = $request->get('rank_to');
            $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){
                return response()->json([
                    'status' => 1,
                    'message' => 'Mua dịch vụ thành công',
                ],200);
            }
            else{
                return response()->json([
                    'status' => 0,
                    'data' => $request->all(),
                    'message'=>$response_data->message??"Thanh toán thất bại vui lòng thử lại"
                ]);
            }
        }
    }

    public function postEdit(Request $request,$id){

        if (AuthCustom::check()) {
//
            $index = $request->get('index');

            $url = '/service/log/detail/edit-info/'.$id;
            $method = "POST";
            $dataSend = array();
            $jwt = Session::get('jwt');
            if (empty($jwt)) {
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }
            $dataSend['token'] = $jwt;

            if ((int)$index > 0){
                for ($i = 0; $i < $index; $i++){
                    $dataSend['customer_data'.$i] = $request->get('customer_data'.$i);
                }
            }

            $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){

                if ($response_data->status == 1) {
                    return response()->json([
                        'status' => 1,
                        'message' => $response_data->message,
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => $response_data->message,
                    ]);
                }

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }

    }

    public function getInbox(Request $request,$id){
        if (AuthCustom::check()) {

            $url = '/inbox/'.$id.'/send';
            $method = "GET";
            $dataSend = array();
            $jwt = Session::get('jwt');
            if (empty($jwt)) {
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }

            $dataSend['token'] = $jwt;
            $dataSend['id'] = $id;

            $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);
            $response_data = $result_Api->response_data??null;
//            dd($result_Api);
            if(isset($response_data) && $response_data->status == 1){

                $data = $response_data->data;
                $conversation = $data->conversation;
                $inbox = $data->inbox;
                $item = $data->order;

                $urlItem = '/service/log/detail';
                $methodItem = "GET";
                $dataSendItem = array();

                $dataSendItem['token'] = $jwt;
                $dataSendItem['id'] = $id;

                $result_Item_Api = DirectAPI::_makeRequest($urlItem, $dataSendItem, $methodItem);
                $response_Item_data = $result_Item_Api->response_data??null;

                if(isset($response_Item_data) && $response_Item_data->status == 1){

                    $dataItem = $response_Item_data->data;

                    return view('frontend.pages.service.chat')
                        ->with('conversation',$conversation)
                        ->with('inbox',$inbox)
                        ->with('dataItem',$dataItem)
                        ->with('item',$item );
                }
                else{
                    return response()->json([
                        'status' => 0,
                        'message'=>$response_data->message??"Không thể lấy dữ liệu"
                    ]);
                }

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_data->message??"Không thể lấy dữ liệu"
                ]);
            }

        }

    }

    public function portInbox(Request $request,$id){
        $this->validate($request, [
            'captcha' => 'required|captcha'
        ], [
            'captcha.required' => "Vui lòng nhập mã bảo vệ",
            'captcha.captcha' => "Mã bảo vệ không đúng",
        ]);

        if($request->filled('image') && count($request->image)>5){
            return redirect()->back()->withErrors('Bạn có thể upload tối đa 5 hình ảnh');
        };

        $this->validate($request, [
            'image.*' => 'mimes:jpg,jpeg,png,gif|max:10000',
            'message' => 'required',
        ], [
            'image.*.mimes' => 'Ảnh đính kèm không đúng định dạng jpg,jpeg,png,gif',
            'message.required' => 'Vui lòng nhập nội dung trao đổi',
        ]);

        $url = '/inbox/'.$id.'/send';
        $method = "POST";
        $dataSend = array();
        $jwt = Session::get('jwt');
        if (empty($jwt)) {
            return response()->json([
                'status' => "LOGIN"
            ]);
        }

        $dataSend['token'] = $jwt;
        $dataSend['id'] = $id;

        $image= $request->image;

        $image = MediaHelpers::upload_image($image,'upload_client',null,null,null,false);

        $dataSend['image'] = $image;


        $dataSend['message'] = $request->message;

        $dataSend['complain'] = $request->complain;

        $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);
        $response_data = $result_Api->response_data??null;

        if(isset($response_data) && $response_data->status == 1){

            if ($response_data->status == 1) {

                return response()->json([
                    'status' => 1,
                    'message' => $response_data->message,
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => $response_data->message,
                ]);
            }

        }
        else{
            return response()->json([
                'status' => 0,
                'message'=>$response_data->message??"Không thể lấy dữ liệu"
            ]);
        }
//        return $response_data;
    }

    public function getListMobile(Request $request)
    {
        $url = '/menu-category';
        $method = "POST";
        $dataSend = array();

        $urlTrans = '/menu-transaction';
        $dataSendTran = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $result_Api_Trans = DirectAPI::_makeRequest($urlTrans,$dataSendTran,$method);
        $response_data = $result_Api->response_data->data??null;
        $response_data_Trans = $result_Api_Trans->response_data->data??null;



        if(isset($response_data) && isset($response_data_Trans) ){
            return view('frontend.pages.service.list-mobile')->with('data', $response_data)->with('data_trans', $response_data_Trans);


        }
        else{
            $telecoms =null;
            $message = "Không thể lấy dữ liệu";
            return view(''.theme('')->theme_key.'.frontend.pages.storecard-v2.index')->with('telecoms', $telecoms)->with('message', $message);
        }


    }
}
