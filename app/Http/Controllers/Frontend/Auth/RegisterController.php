<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Library\DirectAPI;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Session;
use Validator;

class RegisterController extends Controller
{
    public function showFormRegister(){
        return view('frontend.pages.regist');
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username'=>'required',
            'password'=>'required',
            'password_confirmation'=>'required',
        ],[
            'username.required' => 'Vui lòng nhập tài khoản',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password_confirmation.required' =>'Vui lòng nhập mật khẩu',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->errors()->first(),
                'status' => 0
            ]);
        }
        try{

            $utm_source = Cookie::get('utm_source')??'';
            $utm_campaign = Cookie::get('utm_campaign')??'';

            $url = '/register';
            $method = "POST";
            $data = array();
            $data['username'] = $request->username;
            $data['password'] = $request->password;
            $data['utm_source'] = $utm_source;
            $data['utm_campain'] = $utm_campaign;
            $data['password_confirmation'] = $request->password_confirmation;
            $result_Api = DirectAPI::_makeRequest($url,$data,$method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){
                $time = strtotime(Carbon::now());
                $exp_token = $response_data->exp_token;
                $time_exp_token = $time + $exp_token;
                Session::put('jwt',$response_data->token);
                Session::put('exp_token',$response_data->exp_token);
                Session::put('time_exp_token',$time_exp_token);
                Session::put('auth_custom',$response_data->user);
                $return_url = Session::get('url.intended');

                return response()->json([
                    'status' => 1,
                    'message' => 'Thành công',
                    'return_url' => $return_url,
                    'data' => $result_Api->response_data,
                ]);

            }
            else{
                return response()->json([
                    'status' => 0,
                    'message'=>$response_data->message??"Không thể lấy dữ liệu"
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
}
