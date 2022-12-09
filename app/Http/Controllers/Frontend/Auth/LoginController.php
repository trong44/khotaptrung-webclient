<?php


namespace App\Http\Controllers\Frontend\Auth;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use App\Library\DirectAPI;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Session;
use function GuzzleHttp\Promise\all;
use App\Library\Helpers;

class LoginController extends Controller
{
    public function login(Request $request){

        $jwt = Session::get('jwt');
//    $html = view('test')->render();
//    return $html;
        if (theme('')->theme_key == 'theme_1'){
            if(empty($jwt)){
                return view('frontend.pages.log_in');
            }else{
                return redirect('/');
            }

        }elseif (theme('')->theme_key == 'theme_2'){
            if(empty($jwt)){
                return view('frontend.pages.log_in');
            }else{
                return redirect('/');
            }
        }elseif (theme('')->theme_key == 'theme_dup'){
            if(empty($jwt)){
                return view('frontend.pages.log_in');
            }else{
                return redirect('/');
            }
        }
        elseif (theme('')->theme_key == 'theme_6'){
            if(empty($jwt)){
                return view('frontend.pages.log_in');
            }else{
                return redirect('/');
            }
        }
        else{
            return view('frontend.pages.index');
        }
    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
        ],[
            'username.required' => __('Vui lòng nhập tài khoản'),
            'password.required' => __('Vui lòng nhập mật khẩu'),
        ]);
        try{

            $url = '/login';
            $method = "POST";
            $data = array();
            $data['username'] = $request->username;
            $data['password'] = $request->password;
            $data['remember_token'] = $request->remember_token;
            $result_Api = DirectAPI::_makeRequest($url,$data,$method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){
                $time = strtotime(Carbon::now());
                $exp_token = $response_data->exp_token;

                $time_exp_token = $time + $exp_token;

                if (isset($response_data->refresh_token)) {
                    $jwt_refresh_token = $response_data->refresh_token;

                    $http_url = \Request::server ("HTTP_HOST");
                    $name_url =  str_replace('www.','',$http_url);
                    $name_jwt = 'jwt_refresh_token_'.$name_url;

                    Cookie::queue($name_jwt,$jwt_refresh_token,20160);

                }

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

    public function loginfacebook(Request $request)
    {
        $url = '/loginfacebook';
        $method = "POST";
        $data = array();
        $data['accessToken'] = $request->accessToken;
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


            return redirect()->intended();

            if (isset($previous) && $previous != null){
                return redirect('/');
            }elseif(isset($return_url) && $return_url != null){
                return redirect()->intended();

            }else{
                return redirect()->back();
            }

            return redirect()->to('https://'.\Request::server("HTTP_HOST").Session::get('return_url').'');

        }
        else{
            return response()->json([
                'status' => 0,
                'message'=>$response_data->message??"Không thể lấy dữ liệu"
            ]);
        }


    }

    public function logout(Request $request){
        try{
            $url = '/logout';
            $method = "POST";
            $data = array();
            $data['token'] = $request->session()->get('jwt');
            $result_Api = DirectAPI::_makeRequest($url,$data,$method);

            if(isset($result_Api) && $result_Api->response_code == 401){
                Session::flush();

                \Cookie::queue(\Cookie::forget('jwt_refresh_token'));
                return redirect()->to('/');
            }

            if(isset($result_Api) && $result_Api->response_code == 200){
                $result = $result_Api->response_data;
                if($result->status == 1){
                    Session::flush();
                    \Cookie::queue(\Cookie::forget('jwt_refresh_token'));
                    return redirect()->back();
                }
            }
//            return redirect()->to('/');
        }
        catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi phát sinh khi lấy nhà mạng nạp thẻ, vui lòng liên hệ QTV để xử lý.',
            ]);        }
    }


    public function changePassword(){
        return view('frontend.pages.profile.change_password');
    }

    public function changePasswordApi(Request $request){
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required',
            'password_confirmation'=>'required',
        ],[
            'username.required' => __('Vui lòng nhập tài khoản'),
            'password.required' => __('Vui lòng nhập mật khẩu'),
            'password_confirmation.required' => __('Vui lòng nhập mật khẩu'),
        ]);

        try{

            $url = '/current-password';
            $method = "POST";
            $data = array();
            $jwt = Session::get('jwt');
            if (empty($jwt)) {
                return response()->json([
                    'status' => "LOGIN"
                ]);
            }

            $data['token'] = $jwt;
            $data['old_password'] = $request->old_password;
            $data['password'] = $request->password;
            $data['password_confirmation'] = $request->password_confirmation;

            $result_Api = DirectAPI::_makeRequest($url,$data,$method);
            $response_data = $result_Api->response_data??null;
            if(isset($response_data) && $response_data->status == 1){
                return response()->json([
                    'status' => 1,
                    'message'=>$response_data->message
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
            ]);        }
    }

    public function accesUser(Request $request){
        if (!$request->get('sign')){
            return "Mã khóa bị thiếu";
        }
        $sign = $request->get('sign');
        $data = Helpers::Decrypt($sign,config('module.user.encrypt'));
        $data = explode(',',$data);
        $token = $data[0];
        $time = $data[1];
        $user_qtv_id = $data[2];

        if (Carbon::now()->greaterThan(Carbon::createFromTimestamp($time))) {
             return "Mã khóa hết hiệu lực";
        }

        $url = '/profile';
        $method = "GET";
        $data = array();
        $data['token'] = $token;
        $result_Api = DirectAPI::_makeRequest($url,$data,$method);

        if(isset($result_Api) ){
            if( $result_Api->response_code == 200){
                $result = $result_Api->response_data;
                Session::put('jwt',$token);
                Session::put('auth_custom', $result->user);
                Session::put('access_user',Helpers::Encrypt($user_qtv_id.','.time(),config('module.user.encrypt')));

                return redirect()->to('/');
            }
            else if($result_Api->response_code == 401){
                return "Token không được xác thực";
            }
            else if($result_Api->response_code == 408){
                return "Không có phản hồi từ máy chủ (408)";
            }
            else{
                return "Không có phản hồi từ máy chủ ('.$result_Api->response_code.')";
            }

        }
        else{
         return "Lỗi không gọi được dữ liệu hệ thống";
        }

    }
}
