@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
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
@php
    $data_cookie = Cookie::get('viewed_account') ?? '[]';
    $flag_viewed = true;
    $data_cookie = json_decode($data_cookie,true);
        foreach ($data_cookie as $key => $acc_viewed){
            if($acc_viewed['randId'] == $data->randId){
             $flag_viewed = false;
            }
        }
        if ($flag_viewed){
                if (count($data_cookie) >= config('module.acc.viewed.limit_count')) {
                     array_pop($data_cookie);
                 }
                $data_save = [
                    'image'=>$data->image??'',
                    'category'=>isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title,
                    'randId'=>$data->randId,
                    'price'=>$data->price,
                    'price_old'=>$data->price_old,
                    'promotion'=>$sale_percent,
                    'buy_account'=>$totalaccount,
                 ];
                array_unshift($data_cookie,$data_save);
                $data_cookie = json_encode($data_cookie);
                Cookie::queue('viewed_account',$data_cookie,43200);
        }
@endphp
@section('content')

    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/buyacc.css?v={{time()}}">

    <section>
        @if($data == null)
            <div class="row bs-normal pb-3 pt-3">
                <div class="col-md-12 text-center">
                    <span style="color: red;font-size: 16px;">
                        @if(isset($message))
                            {{ $message }}
                        @else
                            Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                        @endif
                    </span>
                </div>
            </div>
        @else
            {{-- Breadcrumb Ajax Loading --}}
            <nav aria-label="breadcrumb" class="data__menuacc" style="margin-top: 10px;"></nav>

            <div class="row bs-normal" style="width: 100%;margin: 0 auto; padding-bottom: 16px">
                <div style="width: 100%" id="showdetailacc">

                </div>
            </div>

            <div class="row bs-normal" style="width: 100%;margin: 0 auto; padding-bottom: 16px">
                <div style="width: 100%">
                    <div class="d-flex justify-content-between" style="padding-top: 8px;padding-bottom: 16px">
                        <div class="main-title" style="margin-bottom: 0">
                            <h2>Tài khoản liên quan</h2>
                        </div>
                    </div>

                    <div class="entries">
                        <div class="row bs-normal fix-border fix-border-nick " id="showslideracc">
                            <div class="body-box-loadding result-amount-loadding" style="transform: translateX(-50%);left: 50%">
                                <div class="d-flex justify-content-center" style="padding-top: 112px;">
                                    <span class="pulser"></span>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                {{-- @include('frontend.pages.account.widget.__viewed__account') --}}

            </div>

            <div id="showswatched"></div>

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

                                if ($key == 'tftdamageskins'){
                                    foreach ($game_auto_props['tftdamageskins'] as $arr_dameskins) {
                                        $total_chuongluc += count($arr_dameskins);
                                    }
                                }

                                if ($key == 'tftcompanions'){
                                    foreach ($game_auto_props['tftcompanions'] as $arr_linh_thu) {
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

                    {{-- Modal hiển thị danh sách tướng --}}
                    <div class="modal fade modal-nick-auto-lol" id="modal-champion-list" role="dialog" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="nick-auto-title">
                                        <div class="nick-auto-title-content">
                                            Tướng
                                        </div>
                                        <div class="nick-auto-count">
                                            ({{ $total_tuong??0 }} tướng)
                                        </div>
                                    </div>
                                    <div class="col-auto pl-0 pr-0 form-search input-search-lmht position-relative">
                                        <input id="input-search-champ" type="search" placeholder="Tìm kiếm" class="has-submit input-search-lmht form-control" autocomplete="off">
                                        <ul class="sugges_list d-none">

                                        </ul>
                                        <button class="submit-search-champ submit--search" type="button"></button>
                                    </div>
                                    <img class="c-close-modal" data-dismiss="modal" src="/assets/frontend/theme_1/image/son/close.svg" alt="">
                                </div>

                                <div class="modal-body">
                                    <div class="row bs-normal" id="tab-panel-champ" style="margin: 0;">
                                        <div class="col-md-12 left-right justify-content-end">
                                            <div class="tab-content" id="content_page_champ">

                                                @foreach($game_auto_props as $key => $game_auto_prop)
                                                    @if($key == 'champions' && count($game_auto_props['champions']))

                                                        @foreach($game_auto_props['champions'] as $key => $arr_champ)
                                                            <div class="tab-pane fade {{ !$key ? 'show active' : '' }}"
                                                                id="tab-champ-{{$key}}" role="tabpanel">
                                                                <div class="row bs-normal">
                                                                    @foreach($arr_champ as $champ)
                                                                        <div class="col-3 col-lg-1 item-nick-lmht">
                                                                            <a href="javascript:void(0)" style="color:#999;">
                                                                                <div class="row bs-normal item-nick-lmht__border" style="margin: 0;">
                                                                                    <div class="col-md-12 item-nick-lmht__border__col" style="position: relative">
                                                                                        <img class="w-100 item-nick-lmht__border__img lazy" src="https://cdn.upanh.info/{{ $champ->thumb }}" alt="{{ $champ->name }}">
                                                                                        <div class="col-md-12 text-center" style="padding-right: 0; padding-left: 0;position: absolute;bottom: 0">
                                                                                            <p class="properties-lol-title" style="margin-bottom: 0;background: rgba(0,0,0,0.8);">{{ $champ->name }}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </div>

                                            <div class="paginate__v1 paginate__v1_mobie frontend__panigate">
                                                <div class="row paginate__history paginate__history__fix justify-content-center">
                                                    <div class="col-auto paginate__category__col">
                                                        <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                                            <ul class="nav nav-tabs pagination pagination-sm js-pagination-handle champion-paginate" data-tab="champion-paginate">
                                                                @foreach($game_auto_props as $key => $game_auto_prop)
                                                                    @if($key == 'champions' && count($game_auto_props['champions']) > 1)

                                                                        @foreach($game_auto_props['champions'] as $key => $arr_champ)
                                                                            @if($key == count($game_auto_props['champions']) - 1)
                                                                                <li class="page-item disabled hidden-xs dot-last-paginate">
                                                                                    <a class="page-link">...</a>
                                                                                </li>
                                                                            @endif
                                                                            <li class="nav-item page-item {{ !$key ? 'active' : '' }} page-item-{{ $key }}">
                                                                                <a class="page-link {{ !$key ? 'active' : '' }} page-link-{{ $key }}"
                                                                                data-toggle="tab" href="#tab-champ-{{ $key }}"
                                                                                role="tab" data-page="{{ $key }}">{{ $key + 1 }}</a>
                                                                            </li>
                                                                            @if(!$key)
                                                                                <li class="page-item disabled hidden-xs dot-first-paginate">
                                                                                    <a class="page-link">...</a>
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
                                    </div>
                                    <div class="row bs-normal modal-container-body" id="result-search-champ" style="margin: 0;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal hiển thị linh thú tft --}}
                    <div class="modal fade modal-nick-auto-lol" id="modal-champion-tft" role="dialog" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="nick-auto-title">
                                        <div class="nick-auto-title-content">
                                            Linh thú TFT
                                        </div>
                                        <div class="nick-auto-count">
                                            ({{ $total_linhthu }} linh thú)
                                        </div>
                                    </div>
                                    <div class="col-auto pl-0 pr-0 form-search input-search-lmht position-relative">
                                        <input id="input-search-conpanion" type="search" placeholder="Tìm kiếm" class="has-submit input-search-lmht form-control" autocomplete="off">
                                        <ul class="sugges_list d-none">

                                        </ul>
                                        <button class="submit-search-companion submit--search" type="button"></button>
                                    </div>
                                    <img class="c-close-modal" data-dismiss="modal" src="/assets/frontend/theme_1/image/son/close.svg" alt="">
                                </div>

                                <div class="modal-body">
                                    <div class="row bs-normal" id="tab-panel-companion" style="margin: 0;">
                                        <div class="col-md-12 left-right justify-content-end">
                                            <div class="tab-content" id="content_page_companion">
                                                @foreach($game_auto_props as $key => $game_auto_prop)
                                                    @if($key == 'tftcompanions' && count($game_auto_props['tftcompanions']))

                                                        @foreach($game_auto_props['tftcompanions'] as $key => $arr_companions)
                                                            <div class="tab-pane fade {{ !$key ? 'show active' : '' }}" id="tab-companion-{{$key}}" role="tabpanel">
                                                                <div class="row bs-normal">
                                                                    @foreach($arr_companions as $companion)
                                                                        <div class="col-3 col-lg-1 item-nick-lmht">
                                                                            <a href="javascript:void(0)" style="color:#999;">
                                                                                <div class="row bs-normal item-nick-lmht__border" style="margin: 0;">
                                                                                    <div class="col-md-12 item-nick-lmht__border__col" style="position: relative">
                                                                                        <img class="w-100 item-nick-lmht__border__img lazy" src="https://cdn.upanh.info/{{ $companion->thumb }}" alt="{{ $companion->name }}">
                                                                                        <div class="col-md-12 text-center" style="padding-right: 0; padding-left: 0;position: absolute;bottom: 0">
                                                                                            <p class="properties-lol-title" style="margin-bottom: 0;background: rgba(0,0,0,0.8);">{{ $companion->name }}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach


                                                    @endif
                                                @endforeach
                                            </div>

                                            <div class="paginate__v1 paginate__v1_mobie frontend__panigate">
                                                <div class="row paginate__history paginate__history__fix justify-content-center">
                                                    <div class="col-auto paginate__category__col">
                                                        <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                                            <ul class="nav nav-tabs pagination pagination-sm js-pagination-handle tft-paginate" data-tab="tft-paginate">
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
                                    </div>
                                    <div class="row bs-normal modal-container-body d-none" id="result-search-companion" style="margin: 0;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Modal hiển thị trang phục LOL --}}
                    <div class="modal fade modal-nick-auto-lol" id="modal-lol-custom" role="dialog" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="nick-auto-title">
                                        <div class="nick-auto-title-content">
                                            Trang phục
                                        </div>
                                        <div class="nick-auto-count">
                                            ({{ $total_trangphuc }} trang phục)
                                        </div>
                                    </div>
                                    <div class="col-auto pl-0 pr-0 form-search input-search-lmht position-relative">
                                        <input id="input-search-skins" type="search" placeholder="Tìm kiếm" class="has-submit input-search-lmht form-control" autocomplete="off">
                                        <ul class="sugges_list d-none"></ul>
                                        <button class="submit-search-skins submit--search" type="button"></button>
                                    </div>
                                    <img class="c-close-modal" data-dismiss="modal" src="/assets/frontend/theme_1/image/son/close.svg" alt="">
                                </div>

                                <div class="modal-body">
                                    <div class="row bs-normal" id="tab-panel-skins" style="margin: 0;">
                                        <div class="col-md-12 left-right justify-content-end">
                                            <div class="tab-content" id="content_page_skin">
                                                @foreach($game_auto_props as $key => $game_auto_prop)
                                                    @if($key == 'skins' && count($game_auto_props['skins']))
                                                        @foreach($game_auto_props['skins'] as $key => $arr_skins)
                                                            <div class="tab-pane fade {{ !$key ? 'show active' : '' }}"
                                                                id="tab-skin-{{$key}}" role="tabpanel">
                                                                <div class="row bs-normal">
                                                                    @foreach($arr_skins as $skin)
                                                                        <div class="col-3 col-lg-1 item-nick-lmht">
                                                                            <a href="javascript:void(0)" style="color:#999;">
                                                                                <div class="row bs-normal item-nick-lmht__border" style="margin: 0;">
                                                                                    <div class="col-md-12 item-nick-lmht__border__col" style="position: relative">
                                                                                        <img class="w-100 item-nick-lmht__border__img lazy" src="https://cdn.upanh.info/{{$skin->thumb}}" alt="{{ $skin->name }}">
                                                                                        <div class="col-md-12 text-center" style="padding-right: 0; padding-left: 0;position: absolute;bottom: 0">
                                                                                            <p class="properties-lol-title" style="margin-bottom: 0;background: rgba(0,0,0,0.8);">{{ $skin->name }}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </div>

                                            <div class="paginate__v1 paginate__v1_mobie frontend__panigate">
                                                <div class="row paginate__history paginate__history__fix justify-content-center">
                                                    <div class="col-auto paginate__category__col">
                                                        <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                                            <ul class="nav nav-tabs pagination pagination-sm js-pagination-handle skin-paginate" data-tab="skin-paginate">
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
                                    </div>
                                    <div class="row bs-normal modal-container-body d-none" id="result-search-skin" style="margin: 0;">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            @endif

        @endif
    </section>

    <input type="hidden" name="slug" class="slug" value="{{ $slug }}">
    <input type="hidden" name="slug" class="slug_category" value="{{ $slug_category }}">

    @if(isset($game_auto_props) && count($game_auto_props))
        @if($slug_category == 'nick-lien-minh')
        <input type="hidden" name="total_tuong" class="total_tuong" value="{{ $total_tuong }}">
        @endif
    @endif

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/buyacc.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/buyaccslider.js"></script>

@endsection
