<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\AuthCustom;
use App\Library\DirectAPI;
use App\Library\Helpers;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Log;
use Session;
use function PHPUnit\Framework\isEmpty;

class TranferController extends Controller
{
    public function index(Request $request)
    {
        $url = '/deposit-auto/get-telecom';
        $method = "GET";
        $dataSend = array();
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $data = $result_Api->response_data??null;

        if (theme('')->theme_key == 'theme_1' || theme('')->theme_key == 'theme_4' || theme('')->theme_key == 'theme_card_1' || theme('')->theme_key == 'theme_card_2'){
            return view(''.theme('')->theme_key.'.frontend.pages.transfer.index');
        }else{
            return view(''.theme('')->theme_key.'.frontend.pages.charge.index',['data'=>$data->data??null]);
        }


    }

    public function getIdCode(Request $request)
    {
        Session::push('url_return.id_return','1');
        try {
            $jwt = Session::get('jwt');
            if(empty($jwt)){
                return response()->json([
                    'status' => 0,
                ]);
            }
            $url = '/transfer/get-code';
            $method = "GET";
            $dataSend = array();
            $dataSend['token'] = session()->get('jwt');
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

        }   catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi phát sinh ',
            ]);
        }
    }

    public function getHistoryTranfer(Request $request){

        if ($request->ajax()) {

            $page = $request->page;

            $url = '/transfer/history';

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

                $data = new LengthAwarePaginator($data->data, $data->total, $data->per_page, $page, $data->data);

                $html =  view(''.theme('')->theme_key.'.frontend.pages.transfer.widget.__tranfer_history')
                    ->with('data', $data)->render();

                if (count($data) == 0 && $page == 1){
                    return response()->json([
                        'status' => 0,
                        'message' => 'Hiện tại không có giao dịch nào !',
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

    public function logsDetail(Request $request,$id){

        $url = '/transfer/history/'.$id;

        $method = "GET";
        $val = array();
//        $jwt = Session::get('jwt');
//        if (empty($jwt)) {
//            return response()->json([
//                'status' => "LOGIN"
//            ]);
//        }

        $result_Api = DirectAPI::_makeRequest($url, $val, $method);
        $response_data = $result_Api->response_data??null;

        if(isset($response_data) && $response_data->status == 1) {

            $data = $response_data->data;

            return view(''.theme('')->theme_key.'.frontend.pages.transfer.logsdetail')->with('data', $data);

        }else{
            return response()->json([
                'status' => 0,
                'message'=>$response_data->message??"Không thể lấy dữ liệu"
            ]);
        }


    }

    public function logs(Request $request)
    {
        try {

            return view(''.theme('')->theme_key.'.frontend.pages.transfer.logs');

        }   catch(\Exception $e){
            Log::error($e);
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi phát sinh ',
            ]);
        }
    }



}
