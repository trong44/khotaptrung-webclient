@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    @if(isset($data->params) && isset($data->params->article_type))
        {!! $data->params->article_type !!}
    @endif
    @if($data == null)
        <div class="item_buy">
            <div class="container pt-3" style="padding-bottom: 600px">
                <div class="row pb-3 pt-3">
                    <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">
                            @if(isset($message))
                                {{ $message }}
                            @else
                                Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật dịch vụ thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                            @endif
                        </span>
                    </div>
                </div>

            </div>

        </div>
    @else
    <!-- Cookie  -->
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
{{--    @php--}}
{{--        $data_cookie = Cookie::get('viewed_account') ?? '[]';--}}

{{--        $flag_viewed = true;--}}
{{--        $data_cookie = json_decode($data_cookie,true);--}}

{{--            foreach ($data_cookie as $key => $acc_viewed){--}}
{{--                if($acc_viewed['randId'] == $data->randId){--}}
{{--                 $flag_viewed = false;--}}
{{--                }--}}
{{--            }--}}
{{--            if ($flag_viewed){--}}
{{--                    if (count($data_cookie) >= config('module.acc.viewed.limit_count')) {--}}
{{--                         array_pop($data_cookie);--}}
{{--                     }--}}
{{--                    $data_save = [--}}
{{--                        'image'=>$data->image,--}}
{{--                        'category'=>isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title,--}}
{{--                        'randId'=>$data->randId,--}}
{{--                        'price'=>$data->price,--}}
{{--                        'price_old'=>$data->price_old,--}}
{{--                        'promotion'=>$sale_percent,--}}
{{--                        'buy_account'=>$totalaccount,--}}
{{--                     ];--}}
{{--                    array_unshift($data_cookie,$data_save);--}}
{{--                    $data_cookie = json_encode($data_cookie);--}}
{{--                    Cookie::queue('viewed_account',$data_cookie,43200);--}}
{{--            }--}}
{{--    @endphp--}}

    <fieldset id="fieldset-one">
        <div id="pageBreadcrumb">

        </div>

        {{--   Bopđyy --}}
        <section id="detailLoader">
            <div class="loader position-relative" style="margin: 4rem 0">
                <div class="loading-spokes">
                    <div class="spoke-container">
                        <div class="spoke"></div>
                    </div>
                    <div class="spoke-container">
                        <div class="spoke"></div>
                    </div>
                    <div class="spoke-container">
                        <div class="spoke"></div>
                    </div>
                    <div class="spoke-container">
                        <div class="spoke"></div>
                    </div>
                    <div class="spoke-container">
                        <div class="spoke"></div>
                    </div>
                    <div class="spoke-container">
                        <div class="spoke"></div>
                    </div>
                    <div class="spoke-container">
                        <div class="spoke"></div>
                    </div>
                    <div class="spoke-container">
                        <div class="spoke"></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="showdetailacc">
            {{-- @include('frontend.pages.account.widget.__datadetail') --}}
        </section>

        <section class="media-mobile">
            <div class="row marginauto intermediary-ct" style="height: 20px;background: #EFEFEF">

            </div>
        </section>

        <section id="showslideracc">

        </section>

        <section id="showswatched">

        </section>
        {{--            Đã xem   --}}
{{--        @include('frontend.pages.account.widget.__watched')--}}

        <input type="hidden" name="previous" class="input-back-step-two" value="Trang trước"/>



    </fieldset>

    <fieldset id="fieldset-two"></fieldset>

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
        <!-- Modal Tướng -->
        <div class="modal fade show modal-lmht" id="modal-champ" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-block d-lg-flex w-100">
                            <div class="modal-title">Tướng ({{ $total_tuong??0 }} tướng)</div>
                            <form action="" class="form-search-modal c-ml-16 c-ml-lg-0 position-relative" data-tab="#content_page_champ">
                                <input type="text" class="form-search-modal-input input-primary" placeholder="Tìm kiếm...">
                                <ul class="suggest-list d-none">

                                </ul>
                                <button class="btn -primary d-none d-lg-inline-block" type="submit"></button>
                            </form>
                        </div>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                        <div class="modal-lmht-tabs-block">

                            <div class="tab-content" id="content_page_champ">
                                @foreach($game_auto_props as $key => $game_auto_prop)
                                    @if($key == 'champions' && count($game_auto_props['champions']))

                                        @foreach($game_auto_props['champions'] as $key => $arr_champ)
                                            <div class="tab-pane fade {{ !$key ? 'show active' : '' }}"
                                                id="tab-champ-{{$key}}" role="tabpanel">
                                                <div class="row" style="margin-right: 0;">
                                                    @foreach($arr_champ as $champ)
                                                        <div class="col-lg-2 col-6">
                                                            <div class="card card-lmht">
                                                                <div class="card-thumb">
                                                                    <img data-src="https://backend.dev.tichhop.pro/{{$champ->thumb}}" alt="{{ $champ->name }}" class="card-thumb-image lazy">
                                                                </div>
                                                                <div class="card-name">
                                                                    {{ $champ->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>

                            <div class="row justify-content-center default-paginate" style="margin-right: 0;">
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

                        <div class="modal-lmht-search-results row" style="margin-right: 0;">

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Skin -->
        <div class="modal fade show modal-lmht" id="modal-skin" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-block d-lg-flex w-100">
                            <div class="modal-title">Trang phục ({{ $total_trangphuc }} Trang phục)</div>
                            <form action="" class="form-search-modal c-ml-16 c-ml-lg-0 position-relative" data-tab="#content_page_skin">
                                <input type="text" class="form-search-modal-input input-primary" placeholder="Tìm kiếm...">
                                <ul class="suggest-list d-none">

                                </ul>
                                <button class="btn -primary d-none d-lg-inline-block" type="submit"></button>
                            </form>
                        </div>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">

                        <div class="modal-lmht-tabs-block">
                            <div class="tab-content" id="content_page_skin">
                                @foreach($game_auto_props as $key => $game_auto_prop)
                                    @if($key == 'skins' && count($game_auto_props['skins']))

                                        @foreach($game_auto_props['skins'] as $key => $arr_skins)
                                            <div class="tab-pane fade {{ !$key ? 'show active' : '' }}"
                                                id="tab-skin-{{$key}}" role="tabpanel">
                                                <div class="row" style="margin-right: 0;">
                                                    @foreach($arr_skins as $skin)
                                                        <div class="col-lg-2 col-6">
                                                            <div class="card card-lmht">
                                                                <div class="card-thumb">
                                                                    <img data-src="https://backend.dev.tichhop.pro/{{$skin->thumb}}" alt="{{ $skin->name }}" class="card-thumb-image lazy">
                                                                </div>
                                                                <div class="card-name">
                                                                    {{ $skin->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>

                            <div class="row justify-content-center default-paginate" style="margin-right: 0;">
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

                        <div class="modal-lmht-search-results row" style="margin-right: 0;">

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Animal -->
        <div class="modal fade show modal-lmht" id="modal-animal" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered animated">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-block d-lg-flex w-100">
                            <div class="modal-title">Linh thú TFT ({{ $total_linhthu }} linh thú)</div>
                            <form action="" class="form-search-modal c-ml-16 c-ml-lg-0 position-relative" data-tab="#content_page_companion">
                                <input type="text" class="form-search-modal-input input-primary" placeholder="Tìm kiếm...">
                                <ul class="suggest-list d-none">

                                </ul>
                                <button class="btn -primary d-none d-lg-inline-block" type="submit"></button>
                            </form>
                        </div>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-lmht-tabs-block">
                            <div class="tab-content" id="content_page_companion">
                                @foreach($game_auto_props as $key => $game_auto_prop)
                                    @if($key == 'tftcompanions' && count($game_auto_props['tftcompanions']))

                                        @foreach($game_auto_props['tftcompanions'] as $key => $arr_companions)
                                            <div class="tab-pane fade {{ !$key ? 'show active' : '' }}"
                                                id="tab-companion-{{$key}}" role="tabpanel">
                                                <div class="row" style="margin-right: 0;">
                                                    @foreach($arr_companions as $companion)
                                                        <div class="col-lg-2 col-6">
                                                            <div class="card card-lmht">
                                                                <div class="card-thumb">
                                                                    <img data-src="https://backend.dev.tichhop.pro/{{$companion->thumb}}" alt="{{ $companion->name }}" class="card-thumb-image lazy">
                                                                </div>
                                                                <div class="card-name">
                                                                    {{ $companion->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>

                            <div class="row justify-content-center default-paginate" style="margin-right: 0;">
                                <div class="col-auto paginate__category__col">
                                    <div class="data_paginate paging_bootstrap paginations_custom">
                                        <ul class="nav nav-tabs pagination pagination-sm border-0 js-pagination-handle tft-paginate" data-tab="tft-paginate" role="tablist">
                                            @foreach($game_auto_props as $key => $game_auto_prop)
                                                @if($key == 'tftcompanions' && count($game_auto_props['tftcompanions']) > 1)
                                                    @foreach($game_auto_props['tftcompanions'] as $key => $arr_companions)
                                                        @if($key == count($game_auto_props['tftcompanions']) - 1)
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
                        <div class="modal-lmht-search-results row" style="margin-right: 0;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif
    <input type="hidden" name="slug" class="slug" value="{{ $slug }}">
    <input type="hidden" name="slug" class="slug_category" value="{{ $slug_category }}">
    @endif



{{--    <script src="/js/{{theme('')->theme_key}}/nick/nick-detail.js?v={{time()}}"></script>--}}
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/nick-detail.js?v={{time()}}"></script>
@endsection






