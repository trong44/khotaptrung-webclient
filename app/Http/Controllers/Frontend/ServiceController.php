<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\DirectAPI;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getServiceCategory(Request $request){
        return view('frontend.pages.service.index');
    }

    public function getServiceCategoryData(Request $request){
        if ($request->ajax()){
            $page = $request->page;
            $append = $request->append;

            $url = '/get-service-category';
            $method = "GET";
            $val = array();
            $val['domain'] = "youtube.com";
            $val['page'] = $page;
            if (isset($request->querry) || $request->querry != '' || $request->querry != null){
                $val['querry'] = $request->querry;
            }
            $val['secret_key'] = config('api.secret_key');
            $result_Api = DirectAPI::_makeRequest($url,$val,$method);

            $result = $result_Api->data;
            if ($result->is_over){
                return response()->json([
                    'is_over'=>true
                ]);
            }
            $data = $result->data;
            $data = $data->data;

            return response()->json([
                'data' => $data,
                'append' => $append,
                'is_over'=>false
            ]);
        }
    }

    public function showServiceCategory(Request $request,$slug){
        $url = '/show-service-category';
        $method = "GET";
        $val = array();
        $val['domain'] = "youtube.com";
        $val['slug'] = $slug;

        $val['secret_key'] = config('api.secret_key');
        $result_Api = DirectAPI::_makeRequest($url,$val,$method);

        $result = $result_Api->data;
        //return $result;
        if ($result->is_router == false){
            $data = $result->data;
            $categoryservice = $result->categoryservice;
            $categoryservice = $categoryservice->data;
            //return $data;
            return view('frontend.pages.service.show')
                ->with('categoryservice',$categoryservice)
                ->with('data',$data)
                ->with('slug',$slug);
        }
        $data = $result->categoryservice;

        return view('frontend.pages.service.show_service_category')
            ->with('slug',$slug)
            ->with('data',$data);
    }


    public function showServiceCategoryData(Request $request,$slug){
        if ($request->ajax()){
            $page = $request->page;
            $append = $request->append;

            $url = '/show-service-category';
            $method = "GET";
            $val = array();
            $val['domain'] = "youtube.com";
            $val['page'] = $page;
            $val['slug'] = $slug;
            if (isset($request->querry) || $request->querry != '' || $request->querry != null){
                $val['querry'] = $request->querry;
            }
            $val['secret_key'] = config('api.secret_key');
            $result_Api = DirectAPI::_makeRequest($url,$val,$method);

            $result = $result_Api->data;
            if ($result->is_over){
                return response()->json([
                    'is_over'=>true
                ]);
            }
            $data = $result->data;
//            dd($data);
            $data = $data->data;

            return response()->json([
                'data' => $data,
                'append' => $append,
                'is_over'=>false
            ]);
        }
    }
}
