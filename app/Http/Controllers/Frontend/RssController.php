<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\DirectAPI;
use Illuminate\Http\Request;

class RssController extends Controller
{
    public function index(){
        //        menu
        $method  = "POST";
        $method_get  = "GET";
        $url_menu_category = '/menu-category';
        $val  = array();
        $result_Api_menu_category  = DirectAPI::_makeRequest($url_menu_category ,$val ,$method );
        //        tin tức
        $url_article = '/article';
        $val_article = array();
        $result_article  = DirectAPI::_makeRequest($url_article ,$val_article ,$method_get );
        //        chi tiết tin tức
        $url_article_category = '/get-category';
        $val_article_category = array();
        $result_article_category  = DirectAPI::_makeRequest($url_article_category ,$val_article_category ,$method_get );
        return response()->view('frontend.pages.rss.index')->header('Content-Type', 'application/xml');


    }
    public function detail(){
      return view('frontend.pages.rss.detail');


    }
}
