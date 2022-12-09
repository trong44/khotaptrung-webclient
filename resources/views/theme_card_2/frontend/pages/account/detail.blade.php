@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow"/>
@endsection
@section('styles')

@endsection
@php
    if (isset($data->price_old)) {
        $sale_percent = (($data->price_old - $data->price) / $data->price_old) * 100;
        $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
    } else {
        $sale_percent = 0;
    }
@endphp
@php
    $totalaccount = 0;
    if(isset($data->category->items_count)){
        if ((isset($data->category->account_fake) && $data->category->account_fake > 1) || (isset($data->category->custom->account_fake) && $data->category->custom->account_fake > 1)){
            $totalaccount = str_replace(',','.',number_format(round(isset($data->category->custom->account_fake) ? $data->category->items_count*$data->category->custom->account_fake : $data->category->items_count*$data->category->account_fake)));
        }
    }else{
        $totalaccount = 0;
    }
@endphp
{{--@php--}}
{{--    $data_cookie = Cookie::get('viewed_account') ?? '[]';--}}
{{--    $flag_viewed = true;--}}
{{--    $data_cookie = json_decode($data_cookie,true);--}}
{{--        foreach ($data_cookie as $key => $acc_viewed){--}}
{{--            if($acc_viewed['randId'] == $data->randId){--}}
{{--             $flag_viewed = false;--}}
{{--            }--}}
{{--        }--}}
{{--        if ($flag_viewed){--}}
{{--                if (count($data_cookie) >= config('module.acc.viewed.limit_count')) {--}}
{{--                     array_pop($data_cookie);--}}
{{--                 }--}}
{{--                $data_save = [--}}
{{--                    'image'=>$data->image??'',--}}
{{--                    'category'=>isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title,--}}
{{--                    'randId'=>$data->randId,--}}
{{--                    'price'=>$data->price,--}}
{{--                    'price_old'=>$data->price_old,--}}
{{--                    'promotion'=>$sale_percent,--}}
{{--                    'buy_account'=>$totalaccount,--}}
{{--                 ];--}}
{{--                array_unshift($data_cookie,$data_save);--}}
{{--                $data_cookie = json_encode($data_cookie);--}}
{{--                Cookie::queue('viewed_account',$data_cookie,43200);--}}
{{--        }--}}
{{--@endphp--}}
@section('content')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/theme_main.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/modal-custom.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_trong.css?v={{time()}}">
    @if($data == null)
        <div class="item_buy">

            <div class="container pt-3">
                <div class="row pb-3 pt-3">
                    <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">
                            @if(isset($message))
                                {{ $message }}
                            @else
                                Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường
                                xuyên bạn vui lòng theo dõi web trong thời gian tới !
                            @endif
                        </span>
                    </div>
                </div>

            </div>

        </div>
    @else
        @if(isset($game_auto_props) && count($game_auto_props))
            @if($slug_category == 'nick-lien-minh')
                @php
                    if (isset($game_auto_props) && count($game_auto_props)){
                        $total_tuong = 0;
                        $total_bieucam = 0;
                        $total_chuongluc = 0;
                        $total_sandau = 0;
                        $total_linhthu = 0;
                        $total_trangphuc = 0;
                        $total_thongtinchung = 0;


                        foreach ($game_auto_props as $key => $item) {

                            if ($key == 'champions') {

                                foreach ($game_auto_props['champions'] as $arr_champ) {
                                    $total_tuong += count($arr_champ);
                                }
                            }
                            if($key == 'skins') {
                                foreach ($game_auto_props['skins'] as $arr_skins) {
                                    $total_trangphuc += count($arr_skins);
                                }
                            }
                            if ($key == 'tftmapskins'){
                                foreach ($game_auto_props['tftmapskins'] as $arr_mapskins) {
                                    $total_sandau += count($arr_mapskins);
                                }
                            }

                            if ($key == 'tftcompanions'){
                                foreach ($game_auto_props['tftcompanions'] as $arr_dameskins) {
                                    $total_chuongluc += count($arr_dameskins);
                                }
                            }

                            if ($key == 'tftdamageskins'){
                                foreach ($game_auto_props['tftdamageskins'] as $arr_linh_thu) {
                                    $total_linhthu += count($arr_linh_thu);
                                }
                            }

                            if ($key == 'emotes'){
                                foreach ($game_auto_props['emotes'] as $arr_emotes) {
                                    $total_bieucam += count($arr_emotes);
                                }
                            }
                        }
                    }
                @endphp

            @endif
        @endif
        <div class="not__data shop_product_detailS">
            <div class="news_breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-md-12 data__menuacc">

                        </div>
                    </div>
                </div>
            </div>

            <div class="container pt-3 fixcssacount">
                <div class="row container__show">

                    <div class="col-md-12 left-right" id="showdetailacc">
                        <div class="body-box-loadding result-amount-loadding">
                            <div class="d-flex justify-content-center" style="padding-top: 112px;">
                                <span class="pulser"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row container__show">
                    <div class="col-md-12 left-right">

                        @if(isset($data->description))
                            <div class="shop_product_another">
                                <div class="c-content-title-1">
                                    <h3 class="c-center c-font-uppercase c-font-bold title__tklienquan">CHI TIẾT</h3>
                                    <div class="c-line-center c-theme-bg"></div>
                                </div>

                                <div class="shop_product_another_content px-3">
                                    <div class="item_buy_list row">
                                        <div class="col-md-12">
                                            <span>{!! $data->description !!}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>



                <div class="row marginauto">
                    <div class="col-md-12 left-right" id="showslideracc">
                        <div class="body-box-loadding result-amount-loadding result-amount-loadding__nick-lien-quan">
                            <div class="d-flex justify-content-center" style="padding-top: 112px;">
                                <span class="pulser"></span>
                            </div>
                        </div>

                    </div>
                </div>

                {{--                <div class="row marginauto d-none">--}}
                {{--                    <div class="col-md-12 left-right" id="section-viewed-account">--}}
                {{--                        @include('frontend.pages.account.widget.__viewed__account')--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="row marginauto">
                    <div class="col-md-12 left-right" id="showswatched">
                        <div class="body-box-loadding result-amount-loadding result-amount-loadding__nick-lien-quan">
                            <div class="d-flex justify-content-center" style="padding-top: 112px;">
                                <span class="pulser"></span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <input type="hidden" name="slug" class="slug" value="{{ $slug }}">

        <input type="hidden" name="slug" class="slug_category" value="{{ $slug_category }}">
        @if(isset($game_auto_props) && count($game_auto_props))
            @if($slug_category == 'nick-lien-minh')
                {{--    Modal Linh thú tft   --}}

                <div class="c-modal__nick-lmht c-modal__nick-lmht-linh-thu-tft d-none" id="nick-lmht-linhthu" style="z-index: 1005; background: rgba(67, 70, 87, 0.5);">
                    <div
                        class="header-modal__nick-lmht c-px-24 c-pt-24 pb-0 position-relative text-uppercase text-center ml-auto mr-auto fw-700">
                        <div class="row marginauto c-pb-24 header-modal__nick-lmht-row">
                            <div class="col-auto pl-0 pr-0 mb-0 c-mr-24">
                                <h2 class="fw-700 fz-24 lh-32 mb-0">Linh thú TFT</h2>

                                <p class="fw-400 fz-13 lh-20 mb-0">({{ $total_linhthu }} linh thú)</p>
                            </div>
                            <div class="col-auto pl-0 pr-0 form-search input-search-lmht position-relative">
                                <input id="input-search-conpanion" type="search" placeholder="Tìm kiếm" class="has-submit input-search-lmht form-control" autocomplete="off">
                                <ul class="sugges_list d-none">

                                </ul>
                                <button class="submit-search-companion submit--search" type="button"></button>
                            </div>
                            <img class="c-close-modal" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/close.svg" alt="">
                        </div>
                    </div>
                    <div class="body-modal__nick-lmht pb-0 c-px-18 c-pt-10 mr-auto ml-auto">
                        <div class="row marginauto modal-container-body" id="tab-panel-companion">

                            <div class="col-md-12 left-right justify-content-end paginate__v1_index paginate__v1_mobie frontend__panigate">

                                <div class="tab-content" id="content_page_companion">

                                    @foreach($game_auto_props as $key => $game_auto_prop)
                                        @if($key == 'tftcompanions' && count($game_auto_props['tftcompanions']))

                                            @foreach($game_auto_props['tftcompanions'] as $key => $arr_companions)
                                                <div class="tab-pane fade {{ !$key ? 'show active' : '' }}" id="tab-companion-{{$key}}" role="tabpanel">
                                                    <div class="row">
                                                        @foreach($arr_companions as $companion)
                                                            <div class="col-auto c-px-6 c-py-8 item-nick-lmht">
                                                        <span>
                                                            <div class="row marginauto item-nick-lmht__border">
                                                                <div
                                                                    class="col-md-12 pl-0 pr-0 item-nick-lmht__border__col">
                                                                    <img src="https://cdn.upanh.info/{{$companion->thumb}}"
                                                                         class="w-100 brs-4 position-absolute item-nick-lmht__border__img"

                                                                         alt="{{ $companion->name }}">
                                                                </div>
                                                                <div class="col-md-12 pl-0 pr-0 text-center">
                                                                    <p class="fw-400 fz-13 c-mb-4 c-mt-20 text-theme text-limit limit-1">{{ $companion->name }}</p>
                                                                </div>
                                                            </div>
                                                        </span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach


                                        @endif
                                    @endforeach
                                </div>

                                <div class="row marinautooo paginate__history paginate__history__fix justify-content-center">
                                    <div class="col-auto paginate__category__col">
                                        <div class="data_paginate paging_bootstrap paginations_custom">
                                            <ul class="nav nav-tabs pagination pagination-sm border-0 js-pagination-handle tft-paginate" data-tab="tft-paginate" role="tablist">
                                                @foreach($game_auto_props as $key => $game_auto_prop)
                                                    @if($key == 'tftcompanions' && count($game_auto_props['tftcompanions']) > 1)
                                                        @foreach($game_auto_props['tftcompanions'] as $key => $arr_companions)
                                                            @if($key == count($game_auto_props['skins']) - 1)
                                                                <li class="page-item disabled hidden-xs dot-last-paginate">
                                                                    <span class="page-link">...</span>
                                                                </li>
                                                            @endif
                                                            <li class="nav-item page-item {{ !$key ? 'active' : '' }} page-item-{{ $key }}">
                                                                <a class="page-link {{ !$key ? 'active' : '' }} page-link-{{ $key }}"
                                                                   data-toggle="tab" href="#tab-companion-{{ $key }}"
                                                                   role="tab"  data-page="{{ $key }}">{{ $key + 1 }}</a>
                                                            </li>
                                                            @if(!$key)
                                                                <li class="page-item disabled hidden-xs dot-first-paginate">
                                                                    <span class="page-link">...</span>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row marginauto modal-container-body d-none" id="result-search-companion">

                        </div>
                    </div>
                </div>

                {{--    Modal Trang phuc   --}}

                <div class="c-modal__nick-lmht c-modal__nick-lmht-trang-phuc d-none" id="nick-lmht-trangphuc"
                     style="z-index: 1005; background: rgba(67, 70, 87, 0.5);">
                    <div
                        class="header-modal__nick-lmht c-px-24 c-pt-24 pb-0 position-relative text-uppercase text-center ml-auto mr-auto fw-700">
                        <div class="row marginauto c-pb-24 header-modal__nick-lmht-row">
                            <div class="col-auto pl-0 pr-0 mb-0 c-mr-24">
                                <h2 class="fw-700 fz-24 lh-32 mb-0">Trang phục</h2>
                                <p class="fw-400 fz-13 lh-20 mb-0">({{ $total_trangphuc }} Trang phục)</p>
                            </div>
                            <div class="col-auto pl-0 pr-0 form-search input-search-lmht position-relative">
                                <input id="input-search-skins" type="search" placeholder="Tìm kiếm" class="has-submit input-search-lmht form-control" autocomplete="off">
                                <ul class="sugges_list d-none">

                                </ul>
                                <button class="submit-search-skins submit--search" type="button"></button>
                            </div>
                            <img class="c-close-modal" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/close.svg" alt="">
                        </div>
                    </div>
                    <div class="body-modal__nick-lmht pb-0 c-px-18 c-pt-10 mr-auto ml-auto">
                        <div class="row marginauto modal-container-body" id="tab-panel-skins">

                            <div class="col-md-12 left-right justify-content-end paginate__v1_index paginate__v1_mobie frontend__panigate">

                                <div class="tab-content" id="content_page_skin">

                                    @foreach($game_auto_props as $key => $game_auto_prop)
                                        @if($key == 'skins' && count($game_auto_props['skins']))

                                            @foreach($game_auto_props['skins'] as $key => $arr_skins)
                                                <div class="tab-pane fade {{ !$key ? 'show active' : '' }}"
                                                     id="tab-skin-{{$key}}" role="tabpanel">
                                                    <div class="row">
                                                        @foreach($arr_skins as $skin)
                                                            <div class="col-auto c-px-6 c-py-8 item-nick-lmht">
                                                        <span>
                                                            <div class="row marginauto item-nick-lmht__border">
                                                                <div
                                                                    class="col-md-12 pl-0 pr-0 item-nick-lmht__border__col">
                                                                    <img
                                                                        src="https://cdn.upanh.info/{{$skin->thumb}}"
                                                                        class="w-100 brs-4 position-absolute item-nick-lmht__border__img "
                                                                        alt="{{ $skin->name }}">
                                                                </div>
                                                                <div class="col-md-12 pl-0 pr-0 text-center">
                                                                    <p class="fw-400 fz-13 c-mb-4 c-mt-20 text-theme text-limit limit-1">{{ $skin->name }}</p>
                                                                </div>
                                                            </div>
                                                        </span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach


                                        @endif
                                    @endforeach
                                </div>

                                <div class="row marinautooo paginate__history paginate__history__fix justify-content-center">
                                    <div class="col-auto paginate__category__col">
                                        <div class="data_paginate paging_bootstrap paginations_custom">

                                            <ul class="nav nav-tabs pagination pagination-sm border-0 js-pagination-handle skin-paginate" data-tab="skin-paginate" role="tablist">
                                                @foreach($game_auto_props as $key => $game_auto_prop)
                                                    @if($key == 'skins' && count($game_auto_props['skins']) > 1)

                                                        @foreach($game_auto_props['skins'] as $key => $arr_skins)
                                                            @if($key == count($game_auto_props['skins']) - 1)
                                                                <li class="page-item disabled hidden-xs dot-last-paginate">
                                                                    <span class="page-link">...</span>
                                                                </li>
                                                            @endif
                                                            <li class="nav-item page-item {{ !$key ? 'active' : '' }} page-item-{{ $key }}">
                                                                <a class="page-link {{ !$key ? 'active' : '' }} page-link-{{ $key }}"
                                                                   data-toggle="tab" href="#tab-skin-{{ $key }}"
                                                                   role="tab"  data-page="{{ $key }}">{{ $key + 1 }}</a>
                                                            </li>
                                                            @if(!$key)
                                                                <li class="page-item disabled hidden-xs dot-first-paginate">
                                                                    <span class="page-link">...</span>
                                                                </li>
                                                            @endif
                                                        @endforeach


                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row marginauto modal-container-body d-none" id="result-search-skin">

                        </div>
                    </div>

                </div>


                {{--    Modal Tuong   --}}

                <div class="c-modal__nick-lmht c-modal__nick-lmht-tuong d-none d-none" id="nick-lmht-tuong"
                     style="z-index: 1005; background: rgba(67, 70, 87, 0.5);">
                    <div
                        class="header-modal__nick-lmht c-px-24 c-pt-24 pb-0 position-relative text-uppercase text-center ml-auto mr-auto fw-700">
                        <div class="row marginauto c-pb-24 header-modal__nick-lmht-row">
                            <div class="col-auto pl-0 pr-0 mb-0 c-mr-24">
                                <h2 class="fw-700 fz-24 lh-32 mb-0">Tướng</h2>
                                <p class="fw-400 fz-13 lh-20 mb-0 total_tuong_data">({{ $total_tuong??0 }} tướng)</p>
                            </div>
                            <div class="col-auto pl-0 pr-0 form-search input-search-lmht position-relative">
                                <input id="input-search-champ" type="search" placeholder="Tìm kiếm" class="has-submit input-search-lmht form-control" autocomplete="off">
                                <ul class="sugges_list d-none">

                                </ul>
                                <button class="submit-search-champ submit--search" type="button"></button>
                            </div>
                            <img class="c-close-modal" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/close.svg"
                                 alt="">
                        </div>
                    </div>
                    <div class="body-modal__nick-lmht pb-0 c-px-18 c-pt-10 mr-auto ml-auto">
                        <div class="row marginauto modal-container-body" id="tab-panel-champ">
                            <div class="col-md-12 left-right justify-content-end paginate__v1_index paginate__v1_mobie frontend__panigate">
                                <div class="tab-content" id="content_page_champ">

                                    @foreach($game_auto_props as $key => $game_auto_prop)
                                        @if($key == 'champions' && count($game_auto_props['champions']))

                                            @foreach($game_auto_props['champions'] as $key => $arr_champ)
                                                <div class="tab-pane fade {{ !$key ? 'show active' : '' }}"
                                                     id="tab-champ-{{$key}}" role="tabpanel">
                                                    <div class="row">
                                                        @foreach($arr_champ as $champ)
                                                            <div class="col-auto c-px-6 c-py-8 item-nick-lmht">
                                                        <span>
                                                            <div class="row marginauto item-nick-lmht__border">
                                                                <div class="col-md-12 pl-0 pr-0 item-nick-lmht__border__col">
                                                                    <img
                                                                        src="https://cdn.upanh.info/{{$champ->thumb}}"
                                                                        class="w-100 brs-4 position-absolute item-nick-lmht__border__img"
                                                                        d alt="{{ $champ->name }}">
                                                                </div>
                                                                <div class="col-md-12 pl-0 pr-0 text-center">
                                                                    <p class="fw-400 fz-13 c-mb-4 c-mt-20 text-theme text-limit limit-1">{{ $champ->name }}</p>
                                                                </div>
                                                            </div>
                                                        </span>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>

                                <div class="row marinautooo paginate__history paginate__history__fix justify-content-center">
                                    <div class="col-auto paginate__category__col">
                                        <div class="data_paginate paging_bootstrap paginations_custom">

                                            <ul class="nav nav-tabs pagination pagination-sm border-0 js-pagination-handle champion-paginate" data-tab="champion-paginate" role="tablist">
                                                @foreach($game_auto_props as $key => $game_auto_prop)
                                                    @if($key == 'champions' && count($game_auto_props['champions']) > 1)

                                                        @foreach($game_auto_props['champions'] as $key => $arr_champ)
                                                            @if($key == count($game_auto_props['champions']) - 1)
                                                                <li class="page-item disabled hidden-xs dot-last-paginate">
                                                                    <span class="page-link">...</span>
                                                                </li>
                                                            @endif
                                                            <li class="nav-item page-item {{ !$key ? 'active' : '' }} page-item-{{ $key }}">
                                                                <a class="page-link {{ !$key ? 'active' : '' }} page-link-{{ $key }}"
                                                                   data-toggle="tab" href="#tab-champ-{{ $key }}"
                                                                   role="tab"  data-page="{{ $key }}">{{ $key + 1 }}</a>
                                                            </li>
                                                            @if(!$key)
                                                                <li class="page-item disabled hidden-xs dot-first-paginate">
                                                                    <span class="page-link">...</span>
                                                                </li>
                                                            @endif
                                                        @endforeach


                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row marginauto modal-container-body" id="result-search-champ">

                        </div>
                    </div>

                </div>

                {{--    Modal thông tin khác--}}

                <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap/bootstrap.min.css">
                <input type="hidden" name="total_tuong" class="total_tuong" value="{{ $total_tuong }}">

                <script>
                    $('body').on('click', '.c-close-modal', function (e) {
                        e.preventDefault();
                        $('.c-modal__nick-lmht-tuong').addClass('d-none');
                        $('.c-modal__nick-lmht-ttk').addClass('d-none');
                        $('.c-modal__nick-lmht-trang-phuc').addClass('d-none');
                        $('.c-modal__nick-lmht-linh-thu-tft').addClass('d-none');
                        $('.c-modal__nick-lmht-san-dau-tft').addClass('d-none');
                        $('.c-modal__nick-lmht-chuong-luc-tft').addClass('d-none');

                        $('.c-modal__nick-lmht-bieu-cam').addClass('d-none');
                    });


                    $('body').on('click', '.lm_xemthem_tuong', function (e) {
                        e.preventDefault();
                        $('.c-modal__nick-lmht-tuong').removeClass('d-none');
                    });

                    $('body').on('click', '.lm_xemthem_thongtinchung', function (e) {
                        e.preventDefault();
                        $('.c-modal__nick-lmht-ttk').removeClass('d-none');
                    });

                    $('body').on('click', '.lm_xemthem_trangphuc', function (e) {
                        e.preventDefault();
                        $('.c-modal__nick-lmht-trang-phuc').removeClass('d-none');
                    });

                    $('body').on('click', '.lm_xemthem_linhthu', function (e) {
                        e.preventDefault();
                        $('.c-modal__nick-lmht-linh-thu-tft').removeClass('d-none');
                    });

                    $('body').on('click', '.lm_xemthem_sandau', function (e) {
                        e.preventDefault();
                        $('.c-modal__nick-lmht-san-dau-tft').removeClass('d-none');
                    });

                    $('body').on('click', '.lm_xemthem_damedondanh', function (e) {
                        e.preventDefault();
                        $('.c-modal__nick-lmht-chuong-luc-tft').removeClass('d-none');
                    });

                    $('body').on('click', '.lm_xemthem_bieucam', function (e) {
                        e.preventDefault();
                        $('.c-modal__nick-lmht-bieu-cam').removeClass('d-none');
                    });

                    function convertToSlug(title) {
                        //Đổi chữ hoa thành chữ thường
                        let slug = title.toLowerCase();
                        //Đổi ký tự có dấu thành không dấu
                        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                        slug = slug.replace(/đ/gi, 'd');
                        //Xóa các ký tự đặt biệt
                        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\<|\'|\"|\:|\;|_/gi, '');
                        //Đổi khoảng trắng thành ký tự gạch ngang
                        slug = slug.replace(/ /gi, "-");
                        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                        slug = slug.replace(/\-\-\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-\-/gi, '-');
                        slug = slug.replace(/\-\-/gi, '-');
                        //Xóa các ký tự gạch ngang ở đầu và cuối
                        slug = '@' + slug + '@';
                        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                        // trả về kết quả
                        return slug;
                    }

                </script>
            @endif
        @endif


        <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/modal-charge.js?v={{time()}}"></script>
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/transfer/transfer.js?v={{time()}}"></script>
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/buyacc.js"></script>
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/buyaccslider.js"></script>
        <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/modal-custom.css">

        <script>

            // xử lý pagination
            $(document).ready(function () {

                Array.from($('.js-pagination-handle')).forEach(function (elm) {
                    setStatusLink($(elm).parent())
                })
                $('.js-pagination-handle').on('click', '.nav-item .page-link', function (e) {
                    e.preventDefault();
                    $(this).closest('.js-pagination-handle').find('.nav-item.active').removeClass('active');
                    $(this).parent().addClass('active');
                    let parent_elm = $(this).closest('.data_paginate');
                    setStatusLink(parent_elm);
                });
                $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
                    window.scrollTo(window.scrollX, window.scrollY + 1);
                })

                $('body').on('click', '.lm_xemthem', function () {
                    window.scrollTo(window.scrollX, window.scrollY + 1);
                })

                function setStatusLink(parent_elm) {
                    let elm_active = parent_elm.find('.js-pagination-handle .nav-item.active');
                    let elm_nav = parent_elm.find('.js-pagination-handle .nav-item');
                    let page = elm_active.text() * 1;
                    let last_page = elm_nav.last().text() * 1;

                    elm_nav.hide();
                    elm_active.show();
                    elm_active.prevAll(':lt(2)').show();
                    elm_active.nextAll(':lt(2)').show();
                    elm_nav.first().show();
                    elm_nav.last().show();

                    parent_elm.find('.dot-first-paginate').toggle(page > 3);
                    parent_elm.find('.dot-last-paginate').toggle(last_page - 3 > page);
                }
            });


            $('#nick-lmht-trangphuc #input-search-skins').on('input', function () {

                let result_ul = $('#nick-lmht-trangphuc .sugges_list');
                result_ul.empty();
                result_ul.toggleClass('d-none', !$(this).val().trim());

                let keyword = convertToSlug($(this).val());
                Array.from($('#content_page_skin .item-nick-lmht__border')).forEach(function (elm) {
                    let text = convertToSlug($(elm).find('.text-theme').text().trim())
                    if (text.indexOf(keyword) > -1) {
                        let html = `<li class="sugges_item">${$(elm).find('.text-theme').text()}</li>`;
                        result_ul.append(html);
                    }
                })
            });

            $('#nick-lmht-tuong #input-search-champ').on('input', function () {

                let result_ul = $('#nick-lmht-tuong .sugges_list');
                result_ul.empty();
                result_ul.toggleClass('d-none', !$(this).val().trim());

                let keyword = convertToSlug($(this).val());
                Array.from($('#content_page_champ .item-nick-lmht__border')).forEach(function (elm) {
                    let text = convertToSlug($(elm).find('.text-theme').text().trim())
                    if (text.indexOf(keyword) > -1) {
                        let html = `<li class="sugges_item">${$(elm).find('.text-theme').text()}</li>`;
                        result_ul.append(html);
                    }
                })
            });

            $('#nick-lmht-linhthu #input-search-conpanion').on('input', function () {

                let result_ul = $('#nick-lmht-linhthu .sugges_list');
                result_ul.empty();
                result_ul.toggleClass('d-none', !$(this).val().trim());

                let keyword = convertToSlug($(this).val());
                Array.from($('#content_page_companion .item-nick-lmht__border')).forEach(function (elm) {
                    let text = convertToSlug($(elm).find('.text-theme').text().trim())
                    if (text.indexOf(keyword) > -1) {
                        let html = `<li class="sugges_item">${$(elm).find('.text-theme').text()}</li>`;
                        result_ul.append(html);
                    }
                })
            });

            $('.submit-search-skins').on('click', function () {
                let keyword = convertToSlug($('#input-search-skins').val());
                let elm_result = $('#result-search-skin');
                elm_result.empty();
                $('.sugges_list').addClass('d-none')
                Array.from($('#content_page_skin .item-nick-lmht')).forEach(function (elm) {
                    let text = convertToSlug($(elm).find('.text-theme').text().trim())
                    if (text && text.indexOf(keyword) > -1) {
                        let new_elm = $(elm).clone();
                        new_elm.find('img').attr('src', new_elm.find('img').attr('data-original'))
                        elm_result.append(new_elm);
                    }
                });

                elm_result.toggleClass('d-none', !keyword);
                $('#tab-panel-skins').toggleClass('d-none', !!keyword);
            });

            $('.submit-search-champ').on('click', function () {
                let keyword = convertToSlug($('#input-search-champ').val());
                let elm_result = $('#result-search-champ');
                elm_result.empty();
                $('.sugges_list').addClass('d-none')
                Array.from($('#content_page_champ .item-nick-lmht')).forEach(function (elm) {
                    let text = convertToSlug($(elm).find('.text-theme').text().trim())
                    if (text && text.indexOf(keyword) > -1) {
                        let new_elm = $(elm).clone();
                        new_elm.find('img').attr('src', new_elm.find('img').attr('data-original'))
                        elm_result.append(new_elm);
                    }
                });

                elm_result.toggleClass('d-none', !keyword);
                $('#tab-panel-champ').toggleClass('d-none', !!keyword);
            });

            $('.submit-search-companion').on('click', function () {
                let keyword = convertToSlug($('#input-search-conpanion').val());
                let elm_result = $('#result-search-companion');
                elm_result.empty();
                $('.sugges_list').addClass('d-none')
                Array.from($('#content_page_companion .item-nick-lmht')).forEach(function (elm) {
                    let text = convertToSlug($(elm).find('.text-theme').text().trim())
                    if (text && text.indexOf(keyword) > -1) {
                        let new_elm = $(elm).clone();
                        new_elm.find('img').attr('src', new_elm.find('img').attr('data-original'))
                        elm_result.append(new_elm);
                    }
                });

                elm_result.toggleClass('d-none', !keyword);
                $('#tab-panel-companion').toggleClass('d-none', !!keyword);
            });

            $('.sugges_list').on('click', '.sugges_item', function () {
                let text = $(this).text();
                $(this).parent().prev().val(text);
                $(this).parent().next().trigger('click');
            })
        </script>
    @endif
@endsection

