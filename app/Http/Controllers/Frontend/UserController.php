<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\AuthCustom;
use App\Library\DirectAPI;
use App\Library\Helpers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Session;
use function PHPUnit\Framework\isEmpty;


class UserController extends Controller
{

    public function getInfo(Request $request){

        try{

            $jwt = Session::get('jwt');

            if(empty($jwt)){
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }

            $url = '/profile';
            $method = "GET";
            $data = array();
            $data['token'] = $jwt;
            $result_Api = DirectAPI::_makeRequest($url,$data,$method);
            if(isset($result_Api) ){
                if( $result_Api->response_code == 200){
                    $result = $result_Api->response_data;
                    Session::put('auth_custom', $result->user);

                    if($result->status == 1){
                        return response()->json([
                            'status' => true,
                            'jwt' => $jwt,
                            'info' => $result->user,
                        ]);
                    }
                }
                else if($result_Api->response_code == 401){

                    Session::forget('jwt');
                    Session::forget('exp_token');
                    Session::forget('time_exp_token');
                    Session::forget('auth_custom');
//                    session()->flush();
                    return response()->json([
                        'status' => 401,
                        'message'=>"unauthencation"
                    ]);
                }
                else if($result_Api->response_code == 408){
                    return response()->json([
                        'status' => 408,
                        'message'=>"Không có phản hồi từ máy chủ (408)"
                    ]);
                }
                else{
                    return response()->json([
                        'status' => 0,
                        'message'=>"Không có phản hồi từ máy chủ ('.$result_Api->response_code.')"
                    ]);
                }

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>"Lỗi không gọi được dữ liệu hệ thống"
                ]);
            }


        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => "ERROR"
            ]);
        }
    }

    public function profileSidebar(Request $request)
    {
        return view('frontend.pages.profile.sidebar');

    }

    public function info(Request $request)
    {
        return view(''.theme('')->theme_key.'.frontend.pages.profile.index');

    }

    public function profile(Request $request)
    {
        try{
            $jwt = Session::get('jwt');
            if(empty($jwt)){
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }
            $url = '/profile';
            $method = "GET";
            $data = array();
            $data['token'] = $jwt;

//            dd(111);
            $result_Api = DirectAPI::_makeRequest($url,$data,$method);
            if(isset($result_Api) && $result_Api->response_code == 200){
                $result = $result_Api->response_data;
                Session::forget('return_url');
                Session::put('return_url', $_SERVER['REQUEST_URI']);
                $request->session()->put('auth_custom', $result->user);

//                dd($result);
                if($result->status == 1){
                    return response()->json([
                        'status' => true,
                        'info' => $result->user,
                    ]);
                }
            }
            if(isset($result_Api) && $result_Api->response_code == 401){
                session()->flush();
                return response()->json([
                    'status' => 401,
                    'message'=>"unauthencation"
                ]);
            }

        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => "ERROR"
            ]);
        }
    }

    public function getThongTin(Request $request)
    {
        try{

            return view(''.theme('')->theme_key.'.frontend.pages.account.user.index');
        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => "ERROR"
            ]);
        }
    }

    public function getTran(Request $request){
        try{

            $jwt = Session::get('jwt');
            if(empty($jwt)){
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }

            $config = config('module.txns.trade_type_api');
            $status = config('module.txns.status');

            if ($request->ajax()) {
                $id_user = AuthCustom::user()->id;
                $url = '/get-txns';
                $method = "GET";
                $dataSend = array();
                $dataSend['token'] = $jwt;
                $dataSend['user_id'] = $id_user;

                $page = $request->page;

                $jwt = Session::get('jwt');
                if(empty($jwt)){
                    return response()->json([
                        'status' => "LOGIN"
                    ]);
                }

                $dataSend['page'] = $page;

                if (isset($request->id) || $request->id != '' || $request->id != null) {
                    $dataSend['id'] = $request->id;
                }

                if (isset($request->config) || $request->config != '' || $request->config != null) {
                    $dataSend['trade_type'] = $request->config;
                }

                if (isset($request->status) || $request->status != '' || $request->status != null) {
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

                if (isset($request->sort_by) || $request->sort_by != '' || $request->sort_by != null){
                    $sort_by = $request->sort_by;
                    if ($sort_by == "random"){
                        $dataSend['sort'] = 'random';
                    }elseif ($sort_by == "created_at_start"){
                        $dataSend['sort_by'] = 'created_at';
                        $dataSend['sort'] = 'desc';
                    }elseif ($sort_by == "created_at_end"){
                        $dataSend['sort_by'] = 'created_at';
                        $dataSend['sort'] = 'asc';
                    }
                }

                $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

                $response_data = $result_Api->response_data??null;

                if(isset($response_data) && $response_data->status == 1){
                    $data = $response_data->data;
                    $data = new LengthAwarePaginator($data->data, $data->total, $data->per_page, $page, $data->data);
                    $data->setPath($request->url());
                    $html =  view('frontend.pages.transaction.widget.__transaction_history')
                        ->with('data', $data)->with('config', $config)->with('status', $status)->render();
                    if (count($data) == 0 && $page == 1){
                        return response()->json([
                            'status' => 0,
                            'message' => 'Không có dữ liệu !',
                        ]);
                    }
                    if ($page > $data->lastPage()) {
                        return response()->json([
                            'status' => 404,
                            'message'=>'Trang này không tồn tại',
                        ]);
                    }
                    return response()->json([
                        'data' => $html,
                        'status' => 1,
                        'last_page'=>$data->lastPage(),
                        'message' => "Lấy dữ liệu thành công",
                    ]);
                }
                else{
                    return response()->json([
                        'status' => 0,
                        'message'=>$response_data->message??"Không thể lấy dữ liệu"
                    ]);
                }
            }

            $config = config('module.txns.trade_type_api');
            $status = config('module.txns.status');

            return view(''.theme('')->theme_key.'.frontend.pages.transaction.logs')->with('config',$config)->with('status',$status);

        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => $e->getMessage()
            ]);
        }
    }

    public function getTransactionShopCard(Request $request){

        try{

            if ($request->ajax()) {

                $page = $request->page;
                $jwt = Session::get('jwt');
                if(empty($jwt)){
                    return response()->json([
                        'status' => "LOGIN"
                    ]);
                }

                $id_user = AuthCustom::user()->id;
                $url = '/get-txns';
                $method = "GET";
                $data = array();
                $data['token'] = $jwt;
                $data['user_id'] = $id_user;
                $data['page'] = $page;

                if (isset($request->id) || $request->id != '' || $request->id != null) {
                    $data['id'] = $request->id;
                }

                if (isset($request->started_at) || $request->started_at != '' || $request->started_at != null) {
                    $started_at = \Carbon\Carbon::parse($request->started_at)->format('Y-m-d H:i:s');
                    $data['started_at'] = $started_at;
                }

                if (isset($request->ended_at) || $request->ended_at != '' || $request->ended_at != null) {
                    $ended_at = \Carbon\Carbon::parse($request->ended_at)->format('Y-m-d H:i:s');
                    $data['ended_at'] = $ended_at;
                }

                $result_Api = DirectAPI::_makeRequest($url,$data,$method);


                if (isset($result_Api) && $result_Api->response_code == 200) {
                    $result = $result_Api->response_data;
                    $data = $result->data;

                    $config = config('module.txns.trade_type_api');
                    $status = config('module.txns.status');
                    $per_page = 0;
                    $total = 0;

                    if (isset($data->total)){
                        $total = $data->total;
                    }

                    if (isset($data->to)){
                        $per_page = $data->to;
                    }

                    $data = new LengthAwarePaginator($data->data, $data->total, $data->per_page, $page, $data->data);

                    return view(''.theme('')->theme_key.'.frontend.pages.transaction.logs')
                        ->with('data', $data)
                        ->with('total',$total)
                        ->with('status',$status)
                        ->with('config',$config)
                        ->with('per_page',$per_page);
                }else{
                    return redirect('/404');
                }

            }

        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => "ERROR"
            ]);
        }
    }

    public function getChargeHistory(Request $request){

        try{

            if ($request->ajax()) {
                $page = $request->page;

                $url = '/deposit-auto/history';

                $method = "GET";
                $val = array();
                $jwt = Session::get('jwt');
                if (empty($jwt)) {
                    return response()->json([
                        'status' => "LOGIN"
                    ]);
                }
                $val['token'] = $jwt;
                $val['page'] = $page;


                if (isset($request->started_at) || $request->started_at != '' || $request->started_at != null) {
                    $started_at = \Carbon\Carbon::parse($request->started_at)->format('Y-m-d H:i:s');
                    $val['started_at'] = $started_at;
                }

                if (isset($request->ended_at) || $request->ended_at != '' || $request->ended_at != null) {
                    $ended_at = \Carbon\Carbon::parse($request->ended_at)->format('Y-m-d H:i:s');
                    $val['ended_at'] = $ended_at;
                }

                $result_Api = DirectAPI::_makeRequest($url, $val, $method);


                if (isset($result_Api) && $result_Api->response_code == 200) {
                    $result = $result_Api->response_data;


                    if ($result->status == 1) {

                        $result = $result_Api->response_data;

                        $data = $result->data;

                        $arrpin = array();
                        $arrserial = array();
                        $arr_declare_amount = array();

                        for ($i = 0; $i < count($data->data); $i++){
                            $serial = $data->data[$i]->serial;
                            $serial = Helpers::Decrypt($serial,config('module.charge.key_encrypt'));
                            array_push($arrserial,$serial);
                        }

                        for ($i = 0; $i < count($data->data); $i++){
                            $pin = $data->data[$i]->pin;
                            $pin = Helpers::Decrypt($pin,config('module.charge.key_encrypt'));
                            array_push($arrpin,$pin);
                        }
                        for ($i = 0; $i < count($data->data); $i++){
                            $declare_amount = $data->data[$i]->declare_amount;
                            array_push($arr_declare_amount,$declare_amount);
                        }

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



                        return view(''.theme('')->theme_key.'.frontend.pages.charge.logs')
                            ->with('data',$data)
                            ->with('arrpin',$arrpin)
                            ->with('total',$total)
                            ->with('per_page',$per_page)
                            ->with('arrserial',$arrserial)
                            ->with('arr_declare_amount',$arr_declare_amount);
                    } else {
                        return redirect()->back()->withErrors($result->message);
                    }
                }else{
                    return redirect('/404');
                }
            }

        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => "ERROR"
            ]);
        }
    }

    public function getChargeATMHistory(Request $request){

        try{

            if ($request->ajax()) {
                $page = $request->page;
                $url = '/transfer/history';
                $method = "GET";
                $val = array();
                $jwt = Session::get('jwt');
                if (empty($jwt)) {
                    return response()->json([
                        'status' => "LOGIN"
                    ]);
                }
                $val['token'] = $jwt;
                $val['page'] = $page;


//                if (isset($request->started_at) || $request->started_at != '' || $request->started_at != null) {
//                    $started_at = \Carbon\Carbon::parse($request->started_at)->format('Y-m-d H:i:s');
//                    $val['started_at'] = $started_at;
//                }
//
//                if (isset($request->ended_at) || $request->ended_at != '' || $request->ended_at != null) {
//                    $ended_at = \Carbon\Carbon::parse($request->ended_at)->format('Y-m-d H:i:s');
//                    $val['ended_at'] = $ended_at;
//                }

                $result_Api = DirectAPI::_makeRequest($url, $val, $method);


                if (isset($result_Api) && $result_Api->response_code == 200) {
                    $result = $result_Api->response_data;
                    if ($result->status == 1) {

                        $result = $result_Api->response_data;

                        $data = $result->data;

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

                        return view(''.theme('')->theme_key.'.frontend.pages.transfer.logs')
                            ->with('data',$data)
                            ->with('total',$total)
                            ->with('per_page',$per_page);

                    } else {
                        return redirect()->back()->withErrors($result->message);
                    }
                }else{
                    return redirect('/404');
                }
            }

        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => "ERROR"
            ]);
        }
    }

    public function getLogsStore(Request $request){
        $url = '/store-card/get-telecom';
        $method = "GET";
        $sendData = array();
        $result_Api = DirectAPI::_makeRequest($url, $sendData, $method);
        $data_res = $result_Api->response_data;
        $data_telecom = [];
        if($data_res->status){
            $data_telecom = $data_res->data;
        }
        $data_category = [
            'telecoms'=>$data_telecom,
            'status'=>config('module.store-card.status'),
        ];
        return view(''.theme('')->theme_key.'.frontend.pages.storecard.logs',compact('data_category'));
    }

    public function getLogsStoreData(Request $request){
        try{

            if ($request->ajax()) {

                $page = $request->page;

                $url = '/store-card/history';

                $method = "GET";
                $dataSend = array();
                $jwt = Session::get('jwt');
                if (empty($jwt)) {
                    return response()->json([
                        'status' => "LOGIN"
                    ]);
                }
                $dataSend['token'] = $jwt;
                $dataSend['page'] = $page;

                if ($request->filled('pin')) {
                    $dataSend['pin'] = $request->pin;
                }

                if ($request->filled('serial')) {
                    $dataSend['serial'] = $request->serial;
                }

                if ($request->filled('telecom')) {
                    $dataSend['telecom'] = $request->telecom;
                }
                if ($request->filled('status')) {
                    $dataSend['status'] = $request->status;
                }

                if ($request->filled('started_at')) {
                    $dataSend['started_at'] = \Carbon\Carbon::parse($request->started_at)->format('d/m/Y H:i:s');
                }
                if ($request->filled('ended_at')) {
                    $dataSend['ended_at'] = \Carbon\Carbon::parse($request->ended_at)->format('d/m/Y H:i:s');
                }
                $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);
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
                    $html = view(''.theme('')->theme_key.'.frontend.pages.storecard.widget.__datalogs')
                        ->with('data',$data)
                        ->with('total',$total)
                        ->with('per_page',$per_page)
                        ->with('arrpin',$arrpin)
                        ->with('arrserial',$arrserial)->render();

                    if (count($data) == 0 && $page == 1){
                        return response()->json([
                            'status' => 0,
                            'message' => 'Không có dữ liệu !',
                        ]);
                    }

                    if ($page > $data->lastPage()) {
                        return response()->json([
                            'status' => 404,
                            'message'=>'Trang này không tồn tại',
                        ]);
                    }

                    return response()->json([
                        'status' => 1,
                        'data' => $html,
                        'total'=>$total,
                        'last_page'=>$data->lastPage(),
                        'message' => 'Load dữ liệu thành công',
                    ]);
                }
                else{
                    return response()->json([
                        'status' => 0,
                        'message' => $response_data->message??'',
                    ]);
                }
            }

        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => "ERROR"
            ]);
        }
    }

    public function getShowLogsStore(Request $request,$id){

        $url = '/store-card/history/'.$id;

        $method = "GET";
        $dataSend = array();
        $jwt = Session::get('jwt');
        if (empty($jwt)) {
            return response()->json([
                'status' => "LOGIN"
            ]);
        }
        $dataSend['token'] = $jwt;

        $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);
        $response_data = $result_Api->response_data??null;

        if(isset($response_data) && $response_data->status == 1){

            $data = $response_data->data;

            return view(''.theme('')->theme_key.'.frontend.pages.storecard.detail')->with('data',$data);

        } else{
            return redirect('/404');
        }


    }

    public function getStoreHistory(Request $request){

        try{

            if ($request->ajax()) {

                $page = $request->page;

                $url = '/store-card/history';

                $method = "GET";
                $val = array();
                $jwt = Session::get('jwt');
                if (empty($jwt)) {
                    return response()->json([
                        'status' => "LOGIN"
                    ]);
                }
                $val['token'] = $jwt;
                $val['page'] = $page;

                if (isset($request->id) || $request->id != '' || $request->id != null) {
                    $data['id'] = $request->id;
                }

                if (isset($request->telecom) || $request->telecom != '' || $request->telecom != null) {
                    $data['telecom'] = $request->telecom;
                }

                if (isset($request->started_at) || $request->started_at != '' || $request->started_at != null) {
                    $started_at = \Carbon\Carbon::parse($request->started_at)->format('Y-m-d H:i:s');
                    $val['started_at'] = $started_at;
                }

                if (isset($request->ended_at) || $request->ended_at != '' || $request->ended_at != null) {
                    $ended_at = \Carbon\Carbon::parse($request->ended_at)->format('Y-m-d H:i:s');
                    $val['ended_at'] = $ended_at;
                }

                $result_Api = DirectAPI::_makeRequest($url, $val, $method);


                if (isset($result_Api) && $result_Api->response_code == 200) {
                    $result = $result_Api->response_data;


                    if ($result->status == 1) {

                        $result = $result_Api->response_data;
                        $data = $result->data;

                        $arrpin = array();
                        $arrserial = array();

//                        for ($i = 0; $i < count($data->data); $i++){
//                            for ($i = 0; $i < count($data->data[$i]->card); $i++){
//
//                                $serial = $data->data[$i]->card[0]->serial;
//
//                                $serial = Helpers::Decrypt($serial,config('module.charge.key_encrypt'));
//
//                                array_push($arrserial,$serial);
//
//                                $pin = $data->data[$i]->card[0]->pin;
//                                $pin = Helpers::Decrypt($pin,config('module.charge.key_encrypt'));
//
//                                array_push($arrpin,$pin);
//
//                            }
//                            dd($arrpin);
//                        }



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

                        return view(''.theme('')->theme_key.'.frontend.pages.storecard.widgets.logs')
                            ->with('data',$data)
                            ->with('total',$total)
                            ->with('per_page',$per_page)
                            ->with('arrpin',$arrpin)
                            ->with('arrserial',$arrserial);
                    } else {

                        return redirect()->back()->withErrors($result->message);
                    }
                } else{
                    return redirect('/404');
                }
            }

        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => "ERROR"
            ]);
        }
    }

    public function getTranDetail(Request $request,$id)
    {
        try{
            $jwt = Session::get('jwt');
            if(empty($jwt)){
                return response()->json([
                    'status' => "LOGIN",
                ]);
            }
            $config = config('module.txns.trade_type_api');

            $id_user = AuthCustom::user()->id;
            $url = '/get-txns';
            $method = "GET";
            $dataSend = array();
            $dataSend['token'] = $jwt;
            $dataSend['user_id'] = $id_user;
            $dataSend['id'] = $id;
            $dataSend['page'] = 1;
            $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
            $response_data = $result_Api->response_data??null;

            if ($response_data->status == 1){
                $data = $response_data->data->data[0];
                $data_view = [
                    'status'=>1,
                    'config'=>$config,
                    'data'=>$data,
                ];
            } else {
                $data_view = [
                    'status'=>0,
                    'message'=>'Không lấy được dữ liệu.',
                ];
            }
            return view(''.theme('')->theme_key.'.frontend.pages.transaction.logdetail',$data_view);
        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => $e->getMessage()
            ]);
        }
    }
}
