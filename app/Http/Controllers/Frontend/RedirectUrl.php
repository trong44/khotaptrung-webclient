<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect;

class RedirectUrl extends Controller
{
    public function redirectUrlDanhmuc(Request $request,$slug){

        if(setting('sys_google_plus') != ''){
            if (\Request::server("HTTP_HOST") == 'muanickcf.net'){
                if ($slug == 'nick-cf'){
                    $slug_new = '/mua-acc/nick-dot-kich-gia-re';
                    $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                    return Redirect::to($url);
                }
            }else{
                return view('frontend.404.404');
            }
        }else{
            return view('frontend.404.404');
        }
    }

    public function redirectUrlGarena(Request $request,$slug){
        if(setting('sys_google_plus') != ''){
            if (\Request::server("HTTP_HOST") == 'shopas.vn'){

                switch($slug){
                    case 'nick-free-fire-gia-re':
                    case 'nick-free-fire-sieu-cap':
                    case 'nick-free-fire-tam-trung':
                            $slug_new = '/mua-acc/nick-free-fire';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                        break;
                    case 'random-free-fire-sieu-cap':
                            $slug_new = '/mua-acc/thu-van-may-free-fire-vip-2';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                        break;
                    case 'thu-van-may-free-fire-vip1':
                    case 'thu-van-may-free-fire-vip5':
                    case 'thu-van-may-free-fire-vip6':
                    case 'random-ff-sieu-bat-ngo':
                            $slug_new = '/mua-acc/thu-van-may-free-fire-vip-1';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                        break;
                    case 'thu-van-may-free-fire-vip-3':
                            $slug_new = '/mua-acc/thu-van-may-free-fire-vip-3';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                        break;
                    case 'thu-van-may-free-fire-vip-4':
                            $slug_new = '/mua-acc/thu-van-may-free-fire-vip-4';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                    case 'nick-lien-quan-gia-re':
                            $slug_new = '/mua-acc/nick-lien-quan-gia-re';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                    case 'thu-van-may-lien-quan-vip-1':
                            $slug_new = '/mua-acc/thu-van-may-lien-quan-vip-1';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                    case 'thu-van-may-lien-quan-vip-2':
                            $slug_new = '/mua-acc/thu-van-may-lien-quan-vip-2';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                    case 'thu-van-may-lien-quan-vip-3':
                            $slug_new = '/mua-acc/thu-van-may-lien-quan-vip-3';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                        break;
                    default:
                            return view('frontend.404.404');
                        break;
                }

            }elseif (\Request::server("HTTP_HOST") == 'shopgilgaming.com'){
                switch($slug){
                    case 'nick-free-fire-ha-gia':
                    case 'nick-free-fire-gia-re':
                    case 'nick-free-fire-tam-trung':
                    case 'nick-free-fire-sieu-cap':
                    case 'nick-free-fire-sieu-re':
                            $slug_new = '/mua-acc/nick-free-fire';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                        break;
                    case 'thu-van-may-vip-dac-biet':
                    case 'random-sieu-bat-ngo':
                            $slug_new = '/mua-acc/thu-van-may-free-fire-vip-1';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                        break;
                    case 'thu-van-may-free-fire-vip':
                            $slug_new = '/mua-acc/thu-van-may-free-fire-vip-2';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                    case 'thu-van-may-free-fire-vip-3':
                            $slug_new = '/mua-acc/thu-van-may-free-fire-vip-3';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                    case 'thu-van-may-free-fire-vip-4':
                            $slug_new = '/mua-acc/thu-van-may-free-fire-vip-4';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                        break;
                    default:
                            return view('frontend.404.404');
                        break;
                }
            }elseif (\Request::server("HTTP_HOST") == 'shopfreefire.vn'){
                switch($slug){
                    case 'nick-free-fire-gia-re':
                            $slug_new = '/mua-acc/nick-free-fire';
                            $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                            return Redirect::to($url);
                        break;
                    default:
                        return view('frontend.404.404');
                        break;
                }
            }elseif (\Request::server("HTTP_HOST") == 'shopfreefiregiare.com'){
                switch($slug){
                    case 'nick-free-fire-gia-re':
                        $slug_new = '/mua-acc/nick-free-fire';
                        $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                        return Redirect::to($url);
                        break;
                    default:
                        return view('frontend.404.404');
                        break;
                }
            }elseif (\Request::server("HTTP_HOST") == 'shopducmomtv.vn'){
                switch($slug){
                    case 'nick-free-fire-gia-re':
                        $slug_new = '/mua-acc/nick-free-fire';
                        $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                        return Redirect::to($url);
                        break;
                    default:
                        return view('frontend.404.404');
                        break;
                }
            }
            elseif (\Request::server("HTTP_HOST") == 'nickfreefiregiare.com'){
                switch($slug){
                    case 'nick-free-fire-gia-re':
                    case 'thu-van-may-free-fire-vip':
                        $slug_new = '/mua-acc/free-fire';
                        $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                        return Redirect::to($url);
                        break;
                    default:
                        return view('frontend.404.404');
                        break;
                }
            }elseif (\Request::server("HTTP_HOST") == 'acclienquan.net'){
                switch($slug){
                    case 'nick-lien-quan-gia-re':
                        $slug_new = '/mua-acc/nick-lien-quan-gia-re';
                        $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                        return Redirect::to($url);
                        break;
                    default:
                        return view('frontend.404.404');
                        break;
                }
            }else{
                return view('frontend.404.404');
            }
        }else{
            return view('frontend.404.404');
        }
    }

    public function redirectUrlRikaki(Request $request){
        if(setting('sys_google_plus') != ''){
            if (\Request::server("HTTP_HOST") == 'rikaki.vn'){
                $slug_new = '/mua-acc/nick-free-fire';
                $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                return Redirect::to($url);
            }else{
                return view('frontend.404.404');
            }
        }else{
            return view('frontend.404.404');
        }
    }

    public function redirectUrlNickFreeGireGiare(){
        if(setting('sys_google_plus') != ''){
            if (\Request::server("HTTP_HOST") == 'nickfreefiregiare.com'){
                $slug_new = '/mua-acc/free-fire';
                $url = 'https://'.\Request::server("HTTP_HOST").$slug_new;
                return Redirect::to($url);
            }else{
                return view('frontend.404.404');
            }
        }else{
            return view('frontend.404.404');
        }
    }
}
