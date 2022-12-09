<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\AuthCustom;
use App\Library\Helpers;
use Illuminate\Http\Request;
use App\Library\DirectAPI;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;
use Session;
use Validator;

class ChargeController extends Controller

{
    public function index() {
        try{
            $url = '/deposit-auto/get-telecom';
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
        return view('index');
    }
    public function capthcaFormValidate(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'captcha' => 'required|captcha'
        ]);
        dd('thanh cong');
    }

    public function reloadCaptcha()
    {

        return response()->json(['captcha'=> captcha_img()]);
    }
    public function myCaptcha()
    {
        return response()->json(['captcha'=> captcha_img('flat')]);
    }
    public function reloadCaptcha2()
    {
        return captcha_img('flat');
    }
    public function getDepositAuto(Request $request)
    {

        try{
            $url = '/deposit-auto/get-telecom';
            $method = "GET";
            $dataSend = array();
            $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
            $data = $result_Api->response_data??null;


            if(isset($data) && $data->status == 1){
                return view(''.theme('')->theme_key.'.frontend.pages.charge.index')->with('data',$data->data);

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

    public function getDepositAutoData(Request $request){

        if ($request->ajax()) {

            $page = $request->page;

            $url = '/deposit-auto/history';

            $method = "GET";
            $sendData = array();
            $jwt = Session::get('jwt');
            if (empty($jwt)) {
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }
            $sendData['token'] = $jwt;
            $sendData['page'] = $page;

            $result_Api = DirectAPI::_makeRequest($url, $sendData, $method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){

                $data = $response_data->data;

                $arrpin = array();

                for ($i = 0; $i < count($data->data); $i++){
                    $pin = $data->data[$i]->pin;
                    $pin = Helpers::Decrypt($pin,config('module.charge.key_encrypt'));
                    array_push($arrpin,$pin);
                }

                $data = new LengthAwarePaginator($data->data, $data->total, $data->per_page, $page, $data->data);

                $html =  view(''.theme('')->theme_key.'.frontend.pages.charge.widget.__charge')
                    ->with('data', $data)->with('arrpin',$arrpin)->render();

                if (count($data) == 0 && $page == 1){
                    return response()->json([
                        'status' => 0,
                        'message' => 'Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !',
                    ]);
                }

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

    public function getTelecom(Request $request)
    {

        try{
            $url = '/deposit-auto/get-telecom';
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

    public function getTelecomDepositAuto(Request $request)
    {
        try {
            $url = '/deposit-auto/get-amount';
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

    public function postTelecomDepositAuto(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'captcha' => 'required|captcha',
            'type' => 'required|regex:/^([A-Za-z0-9])+$/i',
            'amount' => 'required|integer|in:10000,20000,30000,50000,100000,200000,300000,500000,1000000,2000000,3000000,5000000',
            'pin' => 'required|between::9,22|regex:/^([A-Za-z0-9])+$/i',
            'serial' => 'required|between:9,22|regex:/^([A-Za-z0-9])+$/i',
        ],[
            'captcha.required' => "Nhập mã capcha",
            'captcha.captcha' => "Sai mã capcha",
            'type.required' => __("Vui lòng chọn loại thẻ"),
            'type.regex' => __('Loại thẻ không được có ký tự đặc biệt'),
            'amount.required' => __("Vui lòng chọn mệnh giá"),
            'amount.in' => __("Mệnh giá không đúng định dạng"),
            'amount.integer' => __("Mệnh giá không đúng định dạng"),
            'pin.required' => __("Vui lòng nhập mã thẻ"),
            'pin.between' => __("Mã thẻ phải từ 9 - 16 ký tự"),
            'pin.regex' => __('Mã thẻ không được có ký tự đặc biệt'),
            'serial.required' => __("Vui lòng nhập số serial"),
            'serial.between' => __("Serial thẻ phải từ 9 - 16 ký tự"),
            'serial.regex' => __('Serial thẻ không được có ký tự đặc biệt'),
        ]);
        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 0
            ]);
        }


        try {
            $url = '/deposit-auto';
            $method = "POST";
            $dataSend = array();
            $dataSend['token'] = session()->get('jwt');
            $dataSend['type'] = $request->type;
            $dataSend['amount'] = $request->amount;
            $dataSend['pin'] = $request->pin;
            $dataSend['serial'] = $request->serial;
            $result_Api = DirectAPI::_makeRequest($url, $dataSend, $method);
            $data = $result_Api->response_data??null;

            if(isset($data) && $data->status == 1){
                return response()->json([
                    'status' => 1,
                    'message' => $data->message,
                    'data' => $data,
                ],200);
            } elseif(isset($result_Api) && $result_Api->response_code == 401){
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


    public function getChargeDepositHistory(Request $request)
    {
        if (AuthCustom::check()) {

            $method = "GET";

            if ($request->ajax()) {
                $page = $request->page;

                $url = '/deposit-auto/history';

                $val = array();
                $jwt = Session::get('jwt');
                if (empty($jwt)) {
                    return response()->json([
                        'status' => "LOGIN"
                    ]);
                }

                $val['token'] = $jwt;
                $val['page'] = $page;

                if ($request->filled('serial')) {
                    $val['serial'] = $request->serial;
                }

                if ($request->filled('key')) {
                    $val['key'] = $request->key;
                }

                if ($request->filled('key')) {
                    $val['status'] = $request->status;
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

                    if (isEmpty($data->data)) {
                        $data = new LengthAwarePaginator($data->data, $data->total, $data->per_page, $page, $data->data);
                        $data->setPath($request->url());
                    }

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

                    $html =  view(''.theme('')->theme_key.'.frontend.pages.charge.widget.__charge_history')
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

            $url_telecome = '/deposit-auto/get-telecom';

            $sendDatatele = array();

            $result_telecome_Api = DirectAPI::_makeRequest($url_telecome, $sendDatatele, $method);

            $response_tele_data = $result_telecome_Api->response_data??null;

            if(isset($response_tele_data) && $response_tele_data->status == 1){

                $data_telecome = $response_tele_data->data;

                return view(''.theme('')->theme_key.'.frontend.pages.charge.logs')->with('data_telecome', $data_telecome);

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_data->message??"Không thể lấy dữ liệu"
                ]);
            }
        }
    }

    public function getChargeDepositHistoryDetail(Request $request,$id){
        $url = '/deposit-auto/history/'.$id;

        $val = array();
        $jwt = Session::get('jwt');
        if (empty($jwt)) {
            return response()->json([
                'status' => "LOGIN"
            ]);
        }
        $method = "GET";
        $val['token'] = $jwt;

        $result_Api = DirectAPI::_makeRequest($url, $val, $method);
        $response_data = $result_Api->response_data??null;

        if(isset($response_data) && $response_data->status == 1) {

            $data = $response_data->data;

            return view(''.theme('')->theme_key.'.frontend.pages.charge.logsdetail')->with('data', $data);

        }else{
            return response()->json([
                'status' => 0,
                'message'=>$response_data->message??"Không thể lấy dữ liệu"
            ]);
        }

    }

//    public function getDepositHistory(Request $request)
//    {
//        if (AuthCustom::check()) {
//            try {
//                $url = '/deposit-auto/history';
//                $method = "GET";
//                $data = array();
//                $jwt = Session::get('jwt');
//                if (empty($jwt)) {
//                    return response()->json([
//                        'status' => "LOGIN"
//                    ]);
//                }
//                $data['token'] = $jwt;
//
//                $result_Api = DirectAPI::_makeRequest($url, $data, $method);
//                if (isset($result_Api) && $result_Api->response_code == 200) {
//                    $result = $result_Api->response_data;
//                    if ($result->status == 1) {
//
//                        return view('frontend.pages.account.user.transaction_history')->with('result', $result);
//                    } else {
//                        return redirect()->back()->withErrors($result->message);
//
//                    }
//                } else {
//                    return redirect()->back()->withErrors('Có lỗi phát sinh.Xin vui lòng thử lại !');
//                }
//            } catch (\Exception $e) {
//                Log::error($e);
//                return redirect()->back()->withErrors('Có lỗi phát sinh.Xin vui lòng thử lại !');
//            }
//        }
//
//    }

}
