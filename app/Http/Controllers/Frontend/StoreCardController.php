<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\AuthCustom;
use App\Library\DirectAPI;
use App\Library\Helpers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class StoreCardController extends Controller
{
    public function getStoreCard(){

        $data_host =\Request::server ("HTTP_HOST");

        if ($data_host =='shopngocrong.net'){
            return redirect('/');
        }else{
            if (isset(theme('')->theme_config->sys_store_card_vers) && theme('')->theme_config->sys_store_card_vers == 'sys_store_card_vers_2'){

                $url = '/store-card/get-telecom';
                $method = "GET";
                $dataSend = array();
                $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
                $response_data = $result_Api->response_data??null;

                if(isset($response_data) && $response_data->status == 1){

                    $telecoms = $response_data->data;

                    return view(''.theme('')->theme_key.'.frontend.pages.storecard-v2.index')->with('telecoms', $telecoms);
                }
                else{
                    $telecoms =null;
                    $message = "Không thể lấy dữ liệu";
                    return view(''.theme('')->theme_key.'.frontend.pages.storecard-v2.index')->with('telecoms', $telecoms)->with('message', $message);
                }

            }else{

                $url = '/store-card/get-telecom';
                $method = "GET";
                $dataSend = array();
                $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
                $response_data = $result_Api->response_data??null;

                if(isset($response_data) && $response_data->status == 1){

                    $telecoms = $response_data->data;

                    return view(''.theme('')->theme_key.'.frontend.pages.storecard.index')->with('telecoms', $telecoms);
                }
                else{
                    $telecoms =null;
                    $message = "Không thể lấy dữ liệu";
                    return view(''.theme('')->theme_key.'.frontend.pages.storecard.index')->with('telecoms', $telecoms)->with('message', $message);
                }

            }

        }

    }

    public function getTelecomStoreCard(Request $request){
        try{
            $url = '/store-card/get-telecom';
            $method = "GET";
            $dataSend = array();
            $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
            $data = $result_Api->response_data??null;
            if(isset($data) && $data->status == 1){
                return response()->json([
                    'status' => 1,
                    'message' => 'Thành công',
                    'data' => $data->data,
                ],200);
            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi phát sinh khi lấy nhà mạng nạp thẻ, vui lòng liên hệ QTV để xử lý.',
            ]);
        }
    }

    public function getAmountStoreCard(Request $request)
    {
        try {
            $url = '/store-card/get-amount';
            $method = "GET";
            $dataSend = array();
            $dataSend['telecom'] = $request->telecom;
            $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
            $data = $result_Api->response_data??null;
            if(isset($data) && $data->status == 1){
                return response()->json([
                    'status' => 1,
                    'message' => 'Thành công',
                    'data' => $data->data,
                ],200);
            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi phát sinh khi lấy nhà mạng nạp thẻ, vui lòng liên hệ QTV để xử lý.',
            ]);
        }
    }

    public function postStoreCard(Request $request)

    {
        try{
            $url = '/store-card';
            $method = "POST";
            $dataSend = array();
            $dataSend['token'] = session()->get('jwt');
            $dataSend['telecom_key'] = $request->telecom;
            $dataSend['amount'] = $request->amount;
            $dataSend['quantity'] = $request->quantity;
            $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
            $data = $result_Api->response_data??null;
            if(isset($data) && $data->status == 1){
                return response()->json([
                    'status' => 1,
                    'message' => $data->message,
                    'data' => $data,
                ]);
            }elseif(isset($result_Api) && $result_Api->response_code == 401){
                return response()->json([
                    'status' => 401,
                    'message'=>"unauthencation"
                ]);
            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi phát sinh khi lấy nhà mạng nạp thẻ, vui lòng liên hệ QTV để xử lý.',
            ]);
        }
    }

    public function showListCard(Request $request,$name)
    {
        /*Get telecom*/
        $url = '/store-card/get-telecom';
        $method = "GET";
        $dataSend = array();
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $data_telecoms = $result_Api->response_data??null;

        if ($data_telecoms && $data_telecoms->status == 1 ){
            /*Get amount*/
            $url = '/store-card/get-amount';
            $method = "GET";
            $dataSend = array();
            $dataSend['telecom'] = $name;
            $result_api_amount = DirectAPI::_makeRequest($url,$dataSend,$method);
            $data_amounts = $result_api_amount->response_data??null;
            if ($data_amounts && $data_amounts->status == 1) {
                $data_view = [
                    'key'=>$name,
                    'data_telecoms'=>$data_telecoms,
                    'data_amounts'=>$data_amounts,
                    'status'=>1,
                ];
                return view(''.theme('')->theme_key.'.frontend.pages.storecard-v2.card-list',$data_view);
            }
        }
    }
    public function showDetailCard($name,$value)
    {
        /*Get telecom*/
        $url = '/store-card/get-telecom';
        $method = "GET";
        $dataSend = array();
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $data_telecoms = $result_Api->response_data??null;

        if ($data_telecoms && $data_telecoms->status == 1 ){
            /*Get amount*/
            $url = '/store-card/get-amount';
            $method = "GET";
            $dataSend = array();
            $dataSend['telecom'] = $name;
            $result_api_amount = DirectAPI::_makeRequest($url,$dataSend,$method);
            $data_amounts = $result_api_amount->response_data??null;
            if ($data_amounts && $data_amounts->status == 1) {
                $data_view = [
                    'key'=>$name,
                    'value'=>$value,
                    'data_telecoms'=>$data_telecoms,
                    'data_amounts'=>$data_amounts,
                    'status'=>1,
                ];
                return view(''.theme('')->theme_key.'.frontend.pages.storecard-v2.card-single',$data_view);
            }
        }

    }

    public function getStoreCardHistory(Request $request)
    {
        if (AuthCustom::check()) {

            $method = "GET";

            if ($request->ajax()) {
                $page = $request->page;

                $url = '/store-card/history';

                $val = array();
                $jwt = Session::get('jwt');
                if (empty($jwt)) {
                    return response()->json([
                        'status' => "LOGIN"
                    ]);
                }

                $val['token'] = $jwt;
                $val['page'] = $page;

                if ($request->filled('id')) {
                    $val['id'] = $request->id;
                }

                if ($request->filled('telecom')) {
                    $val['telecom'] = $request->telecom;
                }

                if ($request->filled('started_at')) {
                    $started_at = \Carbon\Carbon::parse($request->started_at)->format('Y-m-d H:i:s');
                    $val['started_at'] = $started_at;
                }

                if ($request->filled('ended_at')) {
                    $ended_at = \Carbon\Carbon::parse($request->ended_at)->format('Y-m-d H:i:s');
                    $val['ended_at'] = $ended_at;
                }
                $result_Api = DirectAPI::_makeRequest($url, $val, $method);
                $response_data = $result_Api->response_data??null;

                if(isset($response_data) && $response_data->status == 1){

                    $data = $response_data->data;

                    $arrpin = array();
                    $arrserial = array();

                    $per_page = 0;
                    $total = 0;
                    if (isset($data->total)){
                        $total = $data->total;
                    }

                    if (isset($data->to)){
                        $per_page = $data->to;
                    }

                    if (isEmpty($data->data)) {
                        $data = new LengthAwarePaginator($data->data, $data->total, $data->per_page, $page, $data->data);
                        $data->setPath($request->url());
                    }
                    $html =  view(''.theme('')->theme_key.'.frontend.pages.storecard.widget.__store__card__history')->with('total',$total)->with('per_page',$per_page)
                        ->with('data',$data)->with('arrpin',$arrpin)->with('arrserial',$arrserial)->render();

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

            $url_telecome = '/store-card/history';

            $sendDatatele = array();

            $result_telecome_Api = DirectAPI::_makeRequest($url_telecome, $sendDatatele, $method);

            $response_tele_data = $result_telecome_Api->response_data??null;

            if(isset($response_tele_data) && $response_tele_data->status == 1){

                $data_telecome = $response_tele_data->data;

                return view(''.theme('')->theme_key.'.frontend.pages.storecard.logs')->with('data_telecome', $data_telecome);

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }
    }
}
