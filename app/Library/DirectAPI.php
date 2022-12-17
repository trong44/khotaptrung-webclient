<?php



namespace App\Library;
use Carbon\Carbon;
use Cookie;
use Illuminate\Support\Facades\Log;
use Session;

class DirectAPI{
    public static function _makeRequest($url, array $data, $method,$log = false,$flag = 0){
        $url_data = $url;
        $resultChange = new \stdClass();
        $http_url = \Request::server ("HTTP_HOST");

        if ($flag > 1){
            $resultChange->response_code = 407;
            $resultChange->response_data = null;
            return $resultChange;
        }

//        $data ['domain'] = str_replace('www.','',$http_url);
//        $data ['client'] =  str_replace('www.','',$http_url);

        $data ['domain'] = config('api.client');
        $data ['client'] =config('api.client');

        if(session()->has('jwt')){
            $data['token'] = session()->get('jwt');
        }
        if (config('api.config_backup') === true && \Cache::has('verify_shop')) {
            $verify_shop = \Cache::get('verify_shop');
            if ($verify_shop->response_code == 200){
                $data['secret_key'] = $verify_shop->response_data->secret_key??null;
            }
        } else {
            $data['secret_key'] = config('api.secret_key');
        }
        if(is_array($data)){
            $dataPost = http_build_query($data);
        }else{
            $dataPost = $data;
        }
//        Lấy ip user agent khách hàng

        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }

        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = @$_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        $user_agent = @$_SERVER['HTTP_USER_AGENT'];

        $accesuser = Session::get('access_user');

        if(empty($accesuser)){
            $headers  = [
                'ip: '.$ip,
                'user-agent: '.$user_agent,
            ];
        }else{
            $headers  = [
                'ip: '.$ip,
                'user-agent: '.$user_agent,
                'access-user: '.$accesuser,
            ];
        }

        if($log == true){
            $myfile = fopen(storage_path() ."/logs/CACHE1-".Carbon::now()->format('Y-m-d').".txt", "a") or die("Unable to open file!");
            $txt = Carbon::now()." : [DATA: ".json_encode($data,JSON_UNESCAPED_UNICODE)."]";
            fwrite($myfile, $txt ."\n");
            fclose($myfile);
        }
        $url = config('api.host').$url;
        if($method == "GET"){
            $url = $url.'?'.$dataPost;
        }
        $loopTime=0;

        while ($loopTime<3){

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            if($method == "POST"){
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost);
                $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                curl_setopt($ch, CURLOPT_REFERER, $actual_link);
            }

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 60);
            $resultRaw = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if($httpcode==0){
                Log::error($resultRaw);
                $loopTime++;
                continue;
            }
            else{
                $result = json_decode($resultRaw);
                if($httpcode==401){

                    $jwt_refresh_token = Cookie::get('jwt_refresh_token') ?? '';
                    if (isset($jwt_refresh_token)){
                        $url_refresh = '/refresh-token-remember';
                        $method_refresh = "POST";
                        $data_refresh = array();
                        $data_refresh['refresh_token'] = $jwt_refresh_token;
                        $data_refresh ['domain'] = $data ['domain'];
                        $data_refresh ['client'] = $data ['client'];
                        $result_Api = DirectAPI::_makeRequest($url_refresh,$data_refresh,$method_refresh);
                        $response_data = $result_Api->response_data??null;
                        if(isset($response_data) && $response_data->status == 1){
                            $time = strtotime(Carbon::now());
                            $exp_token = $response_data->exp_token;
                            $time_exp_token = $time + $exp_token;
                            Session::put('jwt',$response_data->token);
                            Session::put('exp_token',$response_data->exp_token);
                            Session::put('time_exp_token',$time_exp_token);
                            Session::put('auth_custom',$response_data->user);
                            $data['token'] = $response_data->token;
                            $flag++;
                            return self::_makeRequest($url_data,$data,$method,false,$flag);

                        }else{
                            Session::forget('jwt');
                            Session::forget('exp_token');
                            Session::forget('time_exp_token');
                            Session::forget('auth_custom');
                            Session::forget('access_user');
                            \Cookie::queue(\Cookie::forget('jwt_refresh_token'));
                            $resultChange->response_code = 401;
                            $resultChange->response_data = $response_data;
                        }
                    }

                }

                $resultChange->response_code = $httpcode;
                $resultChange->response_data = $result;

                return $resultChange;

            }
            //timeout

            $resultChange->response_code = 408;
            $resultChange->response_data = null;
            return $resultChange;

        }

    }
}
