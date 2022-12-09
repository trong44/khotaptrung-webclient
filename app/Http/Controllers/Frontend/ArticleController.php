<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\DirectAPI;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Redirect;
use Session;

class ArticleController extends Controller
{

    public function getList(Request $request){

        try{
            $url = '/article';
            $method = "GET";
            $dataSend = array();
            $dataSend['page'] = $request->page;
            $dataSend['querry'] = $request->querry;

            $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
            $response_data = $result_Api->response_data??null;

            if(isset($response_data) && $response_data->status == 1){

                $data = $response_data->data;

                $per_page = 0;
                $total = 0;

                if (isset($data->total)){
                    $total = $data->total;
                }

                if (isset($data->to)){
                    $per_page = $data->to;
                }
                $data = new LengthAwarePaginator($data->data, $data->total , $data->per_page, $data->current_page,$data->data);
                $data->setPath($request->url());
                return view('frontend.pages.article.list')
                    ->with('total',$total)
                    ->with('per_page',$per_page)
                    ->with('data',$data);
            }
            else{

                $data = null;

                $message = $response_data->message??"Không thể lấy dữ liệu";

                return view('frontend.pages.article.list')
                    ->with('message',$message)
                    ->with('data',$data);
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

    public function getDetail(Request $request,$slug){

        $url = '/article/'.$slug;
        $method = "GET";
        $dataSend = array();
        $dataSend['page'] = $request->page;
        $dataSend['querry'] = $request->querry;

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $response_data = $result_Api->response_data??null;

        if(isset($response_data) && $response_data->status == 1){

            if ($response_data->item == 1){

                Session::put('path', $_SERVER['REQUEST_URI']);
                $data = $response_data->data;

                if (isset($data->url_redirect_301)){
                    return Redirect::to($data->url_redirect_301);
                }

                return view('frontend.pages.article.detail')
                    ->with('slug',$slug)
                    ->with('data',$data);

            }else {

                $data = $response_data->data;
                $title = $response_data->categoryarticle;

                $data = new LengthAwarePaginator($data->data, $data->total, $data->per_page, $data->current_page, $data->data);
                $data->setPath($request->url());
                Session::put('path', $_SERVER['REQUEST_URI']);

                return view('frontend.pages.article.category')
                    ->with('title',$title)
                    ->with('data',$data)
                    ->with('slug',$slug);
            }
        }
        else {


            $data = null;
//            $message = $response_data->message??"Không thể lấy dữ liệu";

            return view('frontend.404.404');
        }
    }

}
