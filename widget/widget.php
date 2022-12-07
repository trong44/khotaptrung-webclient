<?php


use App\Library\DirectAPI;
use Illuminate\Pagination\LengthAwarePaginator;
use function PHPUnit\Framework\isEmpty;

//theme1
View::composer('frontend.widget.__slider__banner', function ($view) {

    $data = \Cache::rememberForever('__slider__banner', function() {
        $url = '/get-slider-banner';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});
//theme3
View::composer('frontend.widget.__banner__storecard', function ($view) {

    $data = \Cache::rememberForever('__banner__storecard', function() {
        $url = '/get-slider-banner';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

View::composer('frontend.widget.__slider__banner__home', function ($view) {
    if (theme('')->theme_key == "theme_3" || theme('')->theme_key == "theme_5"){
        $data = \Cache::rememberForever('__slider__banner__home', function() {
            $url = '/get-slider-banner';
            $method = "GET";
            $dataSend = array();

            $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
            $data_banner = $result_Api->response_data->data??null;

            $url_qc = '/get-slider-banner-ads';
            $method = "GET";
            $dataSend = array();

            $result_Api_qc = DirectAPI::_makeRequest($url_qc,$dataSend,$method);
            $data_qc = $result_Api_qc->response_data->data??null;

            return $data = [$data_banner,$data_qc];

        });
    }else{
        $data = \Cache::rememberForever('__slider__banner__home', function() {
            $url = '/get-slider-banner';
            $method = "GET";
            $dataSend = array();

            $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
            return $data = $result_Api->response_data->data??null;

        });
    }


    return $view->with('data',$data);

});

View::composer('frontend.widget.__slider__banner__home__ads', function ($view) {

    $data_qc = \Cache::rememberForever('__slider__banner__home__ads', function() {
        $url_qc = '/get-slider-banner-ads';
        $method = "GET";
        $dataSend = array();

        $result_Api_qc = DirectAPI::_makeRequest($url_qc,$dataSend,$method);
        return $data_qc = $result_Api_qc->response_data->data??null;

    });

    return $view->with('data_qc',$data_qc);

});

//theme1
View::composer('frontend.widget.__dich__vu__noi__bat', function ($view) {

    $data = \Cache::rememberForever('__dich__vu__noi__bat', function() {

        $url = '/get-dich-vu-noibat';
        $method = "GET";
        $dataSend = array();
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

View::composer('frontend.widget.__dich__vu__noi__bat__mobile', function ($view) {

    $data = \Cache::rememberForever('__dich__vu__noi__bat__mobile', function() {

        $url = '/get-dich-vu-noibat';
        $method = "GET";
        $dataSend = array();
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

//theme1
View::composer('frontend.widget.__menu__taget', function ($view) {

    $data = \Cache::rememberForever('__menu__taget', function() {
        $url = '/menu-transaction';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

//theme3
View::composer('frontend.widget.__head__dich__vu__noi__bat', function ($view) {

    $data = \Cache::rememberForever('__head__dich__vu__noi__bat', function() {
        $url = '/menu-category';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});


View::composer('frontend.widget.__menu', function ($view) {


    $data = \Cache::rememberForever('__menu__side', function() {
        $url = '/menu-transaction';
        $method = "POST";
        $dataSend = array();
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data;

    });
    return $view->with('data',$data);

});
View::composer('frontend.widget.__menu_header', function ($view) {


    $data = \Cache::rememberForever('__menu_header', function() {
        $url = '/menu-transaction';
        $method = "POST";
        $dataSend = array();
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data;

    });
    return $view->with('data',$data);

});
// dịch vụ nổi bật ảnh
View::composer('frontend.widget.__list_serve_remark_image', function ($view) {

    $data = \Cache::rememberForever('__list_serve_remark_image', function() {
        $url = '/get-dich-vu-noibat';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});
View::composer('frontend.widget.__list_service', function ($view) {

    $data = \Cache::rememberForever('__list_service', function() {
        $url = '/menu-category';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

//theme3
View::composer('frontend.widget.__head__dich__vu__noi__bat__mobile', function ($view) {

    $data = \Cache::rememberForever('__head__dich__vu__noi__bat__mobile', function() {
        $url = '/menu-category';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

//theme3
View::composer('frontend.widget.__list_serve_remark', function ($view) {

    $data = \Cache::rememberForever('__list_serve_remark', function() {
        $url = '/menu-transaction';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

//theme3
View::composer('frontend.widget.__list_serve_remark_mobile', function ($view) {

    $data = \Cache::rememberForever('__list_serve_remark_mobile', function() {
        $url = '/menu-transaction';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

View::composer('frontend.widget.__content__home__game', function ($view) {

//    Acc

    $data = \Cache::rememberForever('__content__home__game', function() {

        $url = '/acc';
        $method = "GET";
        $dataSend = array();
        $dataSend['data'] = 'category_list';
        $dataSend['module'] = 'acc_category';

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data??null;
    });

    return $view->with('data', $data);
});

View::composer('frontend.widget.__content__home__game_thuong', function ($view) {

//    Acc

    $data = \Cache::rememberForever('__content__home__game_thuong', function() {

        $url = '/acc';
        $method = "GET";
        $dataSend = array();
        $dataSend['data'] = 'category_list';
        $dataSend['module'] = 'acc_category';

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data??null;
    });

    return $view->with('data', $data);
});

View::composer('frontend.widget.__content__home__game__random', function ($view) {

//    Acc

    $data = \Cache::rememberForever('__content__home__game__random', function() {

        $url = '/acc';
        $method = "GET";
        $dataSend = array();
        $dataSend['data'] = 'category_list';
        $dataSend['module'] = 'acc_category';

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data??null;
    });

    return $view->with('data', $data);
});

View::composer('frontend.widget.__tai__khoan__lien__quan', function ($view) {

//    Acc

    $data = \Cache::rememberForever('__tai__khoan__lien__quan', function() {

        $url = '/acc';
        $method = "GET";
        $dataSend = array();
        $dataSend['data'] = 'category_list';
        $dataSend['module'] = 'acc_category';

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data??null;
    });

    return $view->with('data', $data);
});



View::composer('frontend.widget.__buy__acc__home', function ($view) {

//    Acc

    $data = \Cache::rememberForever('__buy__acc__home', function() {

        $url = '/acc';
        $method = "GET";
        $dataSend = array();
        $dataSend['data'] = 'category_list';
        $dataSend['module'] = 'acc_category';

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data??null;
    });

    return $view->with('data', $data);
});

View::composer('frontend.pages.account.widget.__related__category', function ($view) {

    //    Acc

    $data = \Cache::rememberForever('__related__category', function() {

        $url = '/acc';
        $method = "GET";
        $dataSend = array();
        $dataSend['data'] = 'category_list';
        $dataSend['module'] = 'acc_category';

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data??null;
    });

    return $view->with('data', $data);
});

View::composer('frontend.widget.__tin__tuc', function ($view) {

//    Acc

    $data = \Cache::rememberForever('__tin__tuc', function() {

        $url = '/article';
        $method = "GET";
        $dataSend = array();
        $dataSend['page'] = 1;
        $dataSend['querry'] = '';


        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

      return $data = $result_Api->response_data->data->data??null;

    });

    return $view->with('data', $data);
});

View::composer('frontend.widget.__random__account', function ($view) {

//    Acc

    $data = \Cache::rememberForever('__random__account', function() {

        $url = '/acc';
        $method = "GET";
        $dataSend = array();
        $dataSend['data'] = 'category_list_random';
        $dataSend['module'] = 'acc_category';
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;
    });

    return $view->with('data', $data);
});

View::composer('frontend.widget.__content__home__minigame', function ($view) {

//    Minigame

    $data = \Cache::rememberForever('__content__home__minigame', function() {

        $url = '/minigame/get-list-minigame';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data??null;
    });

//    dd($data);
    return $view->with('data', $data);

});

View::composer('frontend.widget.__content__category__minigame', function ($view) {

//    Minigame

    $data = \Cache::rememberForever('__content__category__minigame', function() {

        $url = '/minigame/get-list-minigame';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data??null;
    });

//    dd($data);
    return $view->with('data', $data);

});

View::composer('frontend.widget.__content__home__dichvu', function ($view) {

    $data = \Cache::rememberForever('__content__home__dichvu', function() {
        $url = '/service';
        $method = "GET";
        $dataSend = array();
        $dataSend['limit'] = 118;
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data->data??null;
    });

    return $view->with('data', $data);

});

View::composer('frontend.widget.__content__home__dichvu__v2', function ($view) {

    $data = \Cache::rememberForever('__content__home__dichvu__v2', function() {
        $url = '/service';
        $method = "GET";
        $dataSend = array();
        $dataSend['limit'] = 118;
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data->data??null;
    });

    return $view->with('data', $data);

});


View::composer('frontend.widget.__bai__viet__lien__quan', function ($view) {

    $data = \Cache::rememberForever('__bai__viet__lien__quan', function() {
        $url = '/article';
        $method = "GET";
        $dataSend = array();
//        $dataSend['group_slug'] = 'tin-moi';
        $dataSend['limit'] = 5;

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data->data??null;

    });

    return $view->with('data',$data);

});

View::composer('frontend.widget.__dichvu__lienquan', function ($view) {

    $data = \Cache::rememberForever('__dichvu__lienquan', function() {
        $url = '/service';
        $method = "GET";
        $dataSend = array();
        $dataSend['limit'] = 8;
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data->data??null;
    });
    return $view->with('data', $data);
});


View::composer('frontend.widget.__service_game', function ($view) {

    $data = \Cache::rememberForever('__service_game', function() {
        $url = '/service';
        $method = "GET";
        $dataSend = array();
//        $dataSend['limit'] = 8;
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data->data??null;
    });
    return $view->with('data', $data);
});

View::composer('frontend.widget.__menu_category_desktop', function ($view) {


    $data = \Cache::rememberForever('__menu_category_desktop', function() {
        $url = '/menu-category';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data;

    });
    return $view->with('data',$data);


});

View::composer('frontend.widget.__menu__side', function ($view) {


    $data = \Cache::rememberForever('__menu__side', function() {
        $url = '/menu-category';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data;

    });
    return $view->with('data',$data);


});

View::composer('frontend.widget.__menu_category_mobile', function ($view) {


    $data = \Cache::rememberForever('__menu_category_mobile', function() {
        $url = '/menu-category';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data;

    });
    return $view->with('data',$data);


});

View::composer('frontend.widget.__menu_category', function ($view) {

    try{
        $data_menu_category = \Cache::forever('__menu_category', function() {
            $url_menu_category = '/menu-category';
            $method_menu_category  = "POST";
            $val_menu_category  = array();
            $result_Api_menu_category  = DirectAPI::_makeRequest($url_menu_category ,$val_menu_category ,$method_menu_category );
            return $result_Api_menu_category->data;
        });

    }
    catch(\Exception $e){
        $data_menu_category = null;
    }
    return $view->with('data_menu_category', $data_menu_category);

});

View::composer('frontend.widget.__menu_category_theme2', function ($view) {

    $url_menu_category = '/menu-category';
    $method_menu_category  = "POST";
    $val_menu_category  = array();
    $result_Api_menu_category  = DirectAPI::_makeRequest($url_menu_category ,$val_menu_category ,$method_menu_category );
    $result_menu_category = $result_Api_menu_category->response_data;
    $data_menu_category  = $result_menu_category->data;

    return $view->with('data_menu_category', $data_menu_category);

});

View::composer('frontend.widget.__menu_profile', function ($view) {
    $data = \Cache::rememberForever('__menu_profile', function() {
        $url = '/menu-profile';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});
View::composer('frontend.widget.__menu_profile_header', function ($view) {
    $data = \Cache::rememberForever('__menu_profile_header', function() {
        $url = '/menu-profile';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

View::composer('frontend.widget.__menu_profile_desktop', function ($view) {
    $data = \Cache::rememberForever('__menu_profile_desktop', function() {
        $url = '/menu-profile';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});


View::composer('frontend.widget.__menu_transaction', function ($view) {

    $url_menu_transaction = '/menu-transaction';
    $method_menu_transaction = "POST";
    $val_menu_transaction = array();
    $result_Api_menu_transaction = DirectAPI::_makeRequest($url_menu_transaction ,$val_menu_transaction ,$method_menu_transaction);
    $result_menu_transaction = $result_Api_menu_transaction->data;
    $data_menu_transaction= $result_menu_transaction->data;

    return $view->with('data_menu_transaction', $data_menu_transaction);
});

View::composer('frontend.widget.__menu__category__article', function ($view) {

    $data = \Cache::rememberForever('__menu__category__article', function() {
        $url = '/get-category';
        $method = "GET";
        $val = array();

        $result_Api = DirectAPI::_makeRequest($url,$val,$method);

        return $data = $result_Api->response_data->datacategory??null;
    });

    return $view->with('data', $data);
});

View::composer('frontend.widget.__menu__category__article_theme_3', function ($view) {

    $data = null;
    $dataDetail = [];
    $category_url = [];

    $data = \Cache::rememberForever('__menu__category__article_theme_3', function() {
        $url = '/get-category';
        $method = "GET";
        $val = array();

        $result_Api = DirectAPI::_makeRequest($url,$val,$method);

        return $data = $result_Api->response_data->datacategory??null;
    });

    foreach ($data as $key => $value) {
        if ($key > 1) {
            break;
        }
        $category_url[] = $value->slug;
    }

    for($i = 0 ; $i < count($category_url); $i++) {
        $url = '/article/'.$category_url[$i];
        $method = "GET";
        $dataSend = array();
        $dataSend['page'] = 1;

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $response_data = $result_Api->response_data??null;

        $dataDetail[] = $response_data;
    }

    return $view->with('data_category', $data)->with('data_detail', $dataDetail);
});

View::composer('frontend.pages.article.widget.__danh__muc', function ($view) {

    $datacate = \Cache::rememberForever('__danh__muc', function() {
        $url = '/get-category';
        $method = "GET";
        $val = array();

        $result_Api = DirectAPI::_makeRequest($url,$val,$method);

        return $datacate = $result_Api->response_data->datacategory??null;
    });

    return $view->with('datacate', $datacate);

});

View::composer('frontend.widget.__menu__category__article__clone', function ($view) {

    $data = \Cache::rememberForever('__menu__category__article__clone', function() {

        $url = '/get-category';
        $method = "GET";
        $val = array();

        $result_Api = DirectAPI::_makeRequest($url,$val,$method);

        return $data = $result_Api->response_data->datacategory??null;


    });

    return $view->with('dataclone', $data);
});

View::composer('frontend.widget.__top_nap_the', function ($view) {


    $data = \Cache::rememberForever('__top_nap_the', function() {
        $url = '/top-charge';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });
    return $view->with('data',$data);



});

View::composer('frontend.widget.__top_nap_the_mobile', function ($view) {


    $data = \Cache::rememberForever('__top_nap_the_mobile', function() {
        $url = '/top-charge';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });
    return $view->with('data',$data);



});

View::composer('frontend.widget.__nap_the', function ($view) {
    $data = \Cache::rememberForever('__nap_the', function() {
        $url = '/deposit-auto/get-telecom';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });
    return $view->with('data',$data);


});

View::composer('frontend.widget.modal.__recharge_modal', function ($view) {
    $data = \Cache::rememberForever('modal.__recharge_modal', function() {
        $url = '/deposit-auto/get-telecom';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });
    return $view->with('data',$data);


});
//theme 2
View::composer('frontend.widget.__menu__category__article__index', function ($view) {


    $data = \Cache::rememberForever('__menu__category__article__index', function() {
        $url = '/article';
        $method = "GET";
        $dataSend = array();
        $dataSend['group_slug'] = 'tin-moi';
        $dataSend['limit'] = 5;

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data->data??null;

    });
    return $view->with('data',$data);

});

View::composer('frontend.widget.__huongdan__trangchu', function ($view) {


    $data = \Cache::rememberForever('__huongdan__trangchu', function() {
        $url = '/article';
        $method = "GET";
        $dataSend = array();
        $dataSend['group_slug'] ='huong-dan';
        $dataSend['limit'] = 5;

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data->data??null;

    });

    return $view->with('data',$data);

});


View::composer('frontend.widget.__baiviet__lienquan', function ($view) {

    $data = \Cache::rememberForever('__baiviet__lienquan', function() {
        $url = '/article';
        $method = "GET";
        $dataSend = array();
        $dataSend['limit'] = 8;

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data->data??null;
    });

    return $view->with('data', $data);

});

View::composer('frontend.widget.__baiviet__trangchu', function ($view) {

    $data = \Cache::rememberForever('__baiviet__trangchu', function() {
        $url = '/article';
        $method = "GET";
        $dataSend = array();
        $dataSend['limit'] = 8;

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data->data??null;
    });

    return $view->with('data', $data);

});



View::composer('frontend.widget.__menu__article', function ($view) {

    $data = \Cache::rememberForever('__menu__article', function() {
        $url = '/get-category';
        $method = "GET";
        $val = array();

        $result_Api = DirectAPI::_makeRequest($url,$val,$method);

        return $data = $result_Api->response_data->datacategory??null;
    });

    return $view->with('data', $data);

});

//THeme 3.

View::composer('frontend.widget.__slider__banner__account', function ($view) {

    $data = \Cache::rememberForever('__slider__banner__account', function() {
        $url = '/get-slider-banner-nick';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

View::composer('frontend.widget.__slider__banner__account__mobile', function ($view) {

    $data = \Cache::rememberForever('__slider__banner__account', function() {
        $url = '/get-slider-banner-nick';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

View::composer('frontend.widget.__slider__banner__napthe', function ($view) {

    $data = \Cache::rememberForever('__slider__banner__napthe', function() {
        $url = '/get-slider-banner-change';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

View::composer('frontend.widget.__services__other', function ($view) {

    $data = \Cache::rememberForever('__services__other', function() {
        $url = '/get-dich-vu-noibat';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

View::composer('frontend.widget.__service__other__his', function ($view) {

    $data = \Cache::rememberForever('__service__other__his', function() {
        $url = '/menu-transaction';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});


View::composer('frontend.widget.__slider__banner__minigame', function ($view) {

    $data = \Cache::rememberForever('__slider__banner__minigame', function() {
        $url = '/get-slider-banner-minigame';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

/*theme_5*/
View::composer('frontend.widget.__slide__news', function ($view) {

    $data = \Cache::rememberForever('__slide__news', function() {
        $url = '/article';
        $method = "GET";
        $val = array();

        $result_Api = DirectAPI::_makeRequest($url,$val,$method);
        return $data = $result_Api->response_data->data??null;
    });
    $data = new LengthAwarePaginator($data->data, $data->total , $data->per_page, $data->current_page,$data->data);
    return $view->with('data', $data);
});

View::composer('frontend.widget.__top__today', function ($view) {

//    Minigame
    $data = \Cache::rememberForever('__top__today', function() {

        $url = '/minigame/get-list-minigame';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data??null;
    });
    return $view->with('data', $data);

});

View::composer('frontend.widget.__minigame__list', function ($view) {

//    Minigame
    $data = \Cache::rememberForever('__minigame__list', function() {
        $url = '/minigame/get-list-minigame';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data??null;
    });
    return $view->with('data', $data);

});

View::composer('frontend.pages.minigame.widget.__related__minigame', function ($view) {

//    Minigame
    $data = \Cache::rememberForever('__related__minigame', function() {
        $url = '/minigame/get-list-minigame';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);

        return $data = $result_Api->response_data->data??null;
    });
    return $view->with('data', $data);

});
//lịch sử trúng thưởng

// theme 5
View::composer('frontend.widget.__slider__banner__service', function ($view) {

    $data = \Cache::rememberForever('__slider__banner__service', function() {
        $url = '/get-slider-banner-service';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

View::composer('frontend.widget.__slider__banner__service__mobile', function ($view) {

    $data = \Cache::rememberForever('__slider__banner__service__mobile', function() {
        $url = '/get-slider-banner-service';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

//rss

View::composer('frontend.pages.rss.widget.__article', function ($view) {

//    minigame

    $data = \Cache::rememberForever('__article', function() {

        $url = '/article';
        $method = "GET";
        $dataSend = array();
        $dataSend['data'] = 'category_list';
        $dataSend['module'] = 'acc_category';

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $response_data_article = $result_Api->response_data??null;
        $article = $response_data_article->data;
        $arrArticle = array();
        $arrArticleLastPage= $article->last_page;
        for ($i=1;$i<=$arrArticleLastPage;$i++){
            $url_article = '/article';
            $val_article = array();
            $val_article['page'] = $i;
            $result_article  = DirectAPI::_makeRequest($url_article ,$val_article ,$method );
            $article_data = $result_article->response_data->data->data;
            array_push($arrArticle,$article_data);

        }
        return $data = $arrArticle;
    });

    return $view->with('data', $data);
});

View::composer('frontend.pages.rss.widget.__minigame', function ($view) {

//    minigame

    $data = \Cache::rememberForever('__minigame', function() {

        $url = '/minigame/get-list-minigame';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $response_data_minigame = $result_Api->response_data??null;
        $mini_game = $response_data_minigame->data;

        return $data = $mini_game;
    });

    return $view->with('data', $data);
});

View::composer('frontend.pages.rss.widget.__service', function ($view) {

//    minigame

    $data = \Cache::rememberForever('__service', function() {

        $url = '/service';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $response_data_service = $result_Api->response_data??null;
        $service= $response_data_service->data;
        $arrService = array();
        $arrServiceLastPage= $service->last_page;

        for ($i=1;$i<=$arrServiceLastPage;$i++){
            $url_service = '/service';
            $val_service = array();
            $val_service['page'] = $i;
            $result_service  = DirectAPI::_makeRequest($url_service ,$val_service ,$method );
            $service_data = $result_service->response_data->data->data;
            array_push($arrService,$service_data);

        }

        return $data = $arrService;
    });

    return $view->with('data', $data);
});

View::composer('frontend.pages.rss.widget.__nick', function ($view) {

//    minigame

    $data = \Cache::rememberForever('__nick', function() {

        $url = '/acc';
        $method = "GET";
        $dataSend = array();
        $dataSend['data'] = 'category_list';
        $dataSend['module'] = 'acc_category';
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $response_data_acc = $result_Api->response_data??null;
        $acc= $response_data_acc->data;


        return $data = $acc;
    });

    return $view->with('data', $data);
});


View::composer('frontend.pages.article.widget.__ads__article', function ($view) {

//    quảng cáo bài viết

    $data = \Cache::rememberForever('__ads__article', function() {
        $url = '/get-slider-banner-article';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });
    return $view->with('data',$data);

});

View::composer('frontend.widget.__card_purchase', function ($view) {

//    minigame

    $telecoms = \Cache::rememberForever('__card_purchase', function() {

        $url = '/store-card/get-telecom';
        $method = "GET";
        $dataSend = array();
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $telecoms = $result_Api->response_data->data??null;


        return $telecoms;
    });

    return $view->with('telecoms', $telecoms);
});

View::composer('frontend.widget.__mua__the', function ($view) {

//    mua the theme 5

    $telecoms = \Cache::rememberForever('__mua__the', function() {

        $url = '/store-card/get-telecom';
        $method = "GET";
        $dataSend = array();
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $telecoms = $result_Api->response_data->data??null;


        return $telecoms;
    });

    return $view->with('telecoms', $telecoms);
});

View::composer('frontend.widget.__napthe', function ($view) {

//    nạp tiền theme 5

    $data = \Cache::rememberForever('frontend.widget.__napthe', function() {
        $url = '/deposit-auto/get-telecom';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });
    return $view->with('data',$data);
});

// quảng cáo chi tiết theme 5
View::composer('frontend.pages.article.widget.__ads__article__theme__5', function ($view) {
//    quảng cáo bài viết

    $data = \Cache::rememberForever('__ads__article__theme__5', function() {
        $url = '/get-slider-banner-article';
        $method = "GET";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });
    return $view->with('data',$data);
});

// tin hot article
View::composer('frontend.widget.__menu__category__article_theme_5', function ($view) {

    $data = null;
    $dataDetail = [];
    $category_url = [];

    $data = \Cache::rememberForever('__menu__category__article_theme_5', function() {
        $url = '/get-category';
        $method = "GET";
        $val = array();

        $result_Api = DirectAPI::_makeRequest($url,$val,$method);

        return $data = $result_Api->response_data->datacategory??null;
    });

    foreach ($data as $key => $value) {
        if ($key > 1) {
            break;
        }
        $category_url[] = $value->slug;
    }

    for($i = 0 ; $i < count($category_url); $i++) {
        $url = '/article/'.$category_url[$i];
        $method = "GET";
        $dataSend = array();
        $dataSend['page'] = 1;

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        $response_data = $result_Api->response_data??null;

        $dataDetail[] = $response_data;
    }

    return $view->with('data_category', $data)->with('data_detail', $dataDetail);
});

View::composer('frontend.widget.__list__service__mobile', function ($view) {

    $data = \Cache::rememberForever('__list__service__mobile', function() {
        $url = '/menu-category';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});
View::composer('frontend.widget.__menu__bottom', function ($view) {

    $data = \Cache::rememberForever('__menu__bottom', function() {
        $url = '/menu-transaction';
        $method = "POST";
        $dataSend = array();

        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;

    });

    return $view->with('data',$data);

});

//Related service and related acc in news page theme_5

View::composer('frontend.widget.__related__acc__article_theme_5', function ($view) {

    $data = \Cache::rememberForever('__related__acc__article_theme_5', function() {
        $url = '/acc';
        $method = "GET";
        $dataSend = array();
        $dataSend['data'] = 'category_list';
        $dataSend['module'] = 'acc_category';
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data??null;
    });

    return $view->with('data_acc',$data);

});

View::composer('frontend.widget.__related__service__article_theme_5', function ($view) {

    $data = \Cache::rememberForever('__related__service__article_theme_5', function() {
        $url = '/service';
        $method = "GET";
        $dataSend = array();
        $dataSend['limit'] = 8;
        $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
        return $data = $result_Api->response_data->data->data??null;
    });

    return $view->with('data_service',$data);

});

View::composer('frontend.widget.__bonus', function ($view) {
    $url = '/minigame/bonus';
    $method = "GET";
    $dataSend = array();
        $dataSend['secret_key'] = config('api.secret_key');
    $dataSend['domain'] = \Request::server("HTTP_HOST");
    $result_Api = DirectAPI::_makeRequest($url,$dataSend,$method);
    $data = $result_Api->response_data??null;
    return $view->with('data',$data);

});
