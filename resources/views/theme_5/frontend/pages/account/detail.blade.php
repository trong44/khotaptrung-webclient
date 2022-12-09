@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection

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
{{--                    'image'=>$data->image,--}}
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
    <div class="container c-container" id="account-detail">
        @if($data == null)
            <div class="item_buy">

                <div class="container pt-3">
                    <div class="row pb-3 pt-3">
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

                </div>

            </div>
        @else
            <div class="data__menuacc">

            </div>

            <div id="showdetailacc">
                {{--        Data detail    --}}
{{--                @include('frontend.pages.account.widget.__datadetail')--}}
            </div>

            <div id="showslideracc">
                <div class="loading-wrap c-my-24">
                    <span class="modal-loader-spin"></span>
                </div>
                {{--  TK đồng giá   --}}
{{--                @include('frontend.pages.account.widget.__same__price')--}}
            </div>

            <div id="showswatched">
{{--                <div class="loading-wrap c-my-24">--}}
{{--                    <span class="modal-loader-spin"></span>--}}
{{--                </div>--}}
                {{--  TK đồng giá   --}}
                {{--                @include('frontend.pages.account.widget.__same__price')--}}
            </div>


            <div>
                {{--            Siêu ưu đã   --}}
{{--                @include('frontend.pages.account.widget.__flash__sale')--}}

                {{--            Đã xem   --}}
{{--                @include('frontend.pages.account.widget.__viewed__account')--}}

                {{--            Dịch vụ khác   --}}
                @include('frontend.widget.__services__other')
            </div>


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
                                        <div class="modal-title w-auto">Tướng ({{ $total_tuong??0 }} tướng)</div>
                                        <form action="" class="form-search-modal c-ml-16 c-ml-lg-0 position-relative" data-tab="#content_page_champ">
                                            <input type="text" class="form-search-modal-input input-primary" placeholder="Tìm kiếm...">
                                            <ul class="suggest-list d-none">

                                            </ul>
                                            <button class="btn -primary d-none d-lg-inline-block" type="submit"></button>
                                        </form>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal"></button>
                                </div>
                                <div class="modal-body px-0">
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

                                        <div class="row justify-content-center" style="margin-right: 0;">
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
                                        <div class="modal-title w-auto">Trang phục ({{ $total_trangphuc }} Trang phục)</div>
                                        <form action="" class="form-search-modal c-ml-16 c-ml-lg-0 position-relative" data-tab="#content_page_skin">
                                            <input type="text" class="form-search-modal-input input-primary" placeholder="Tìm kiếm...">
                                            <ul class="suggest-list d-none">

                                            </ul>
                                            <button class="btn -primary d-none d-lg-inline-block" type="submit"></button>
                                        </form>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal"></button>
                                </div>
                                <div class="modal-body px-0">

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

                                        <div class="row justify-content-center" style="margin-right: 0;">
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
                                        <div class="modal-title w-auto">Linh thú TFT ({{ $total_linhthu }} linh thú)</div>
                                        <form action="" class="form-search-modal c-ml-16 c-ml-lg-0 position-relative" data-tab="#content_page_companion">
                                            <input type="text" class="form-search-modal-input input-primary" placeholder="Tìm kiếm...">
                                            <ul class="suggest-list d-none">

                                            </ul>
                                            <button class="btn -primary d-none d-lg-inline-block" type="submit"></button>
                                        </form>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal"></button>
                                </div>
                                <div class="modal-body px-0">
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

                                        <div class="row justify-content-center" style="margin-right: 0;">
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
            {{--    Modal trả góp   --}}

            <div class="modal fade modal-big modal-tra-gop" id="traGopModal">
                <div class="modal-dialog modal-dialog-centered modal-custom">
                    <div class="modal-content c-p-24">
                        <div class="modal-header">
                            <h2 class="modal-title center">Thông báo</h2>
                            <button type="button" class="close" data-dismiss="modal"></button>
                        </div>
                        <div class="modal-body py-0 pl-0 c-pr-8 c-mt-24" id="modal-body-scroll">
{{--                            <div class="dialog--content__title fw-500 fz-13 c-mb-12 text-title-theme">--}}
{{--                                Thông tin mua thẻ--}}
{{--                            </div>--}}
                            <div class="card--gray c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                                <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                                    <div class="card--attr__value fz-13 fw-500">Tính năng sẽ được cập nhật trong thời gian tới,bạn vui lòng quay lại sau!</div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="modal-footer">--}}
{{--                            <button class="btn primary">Xác nhận</button>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>

            {{-- Thanh toans thanhf coong  --}}

            <div class="modal fade modal-small" id="orderSuccses">
                <div class="modal-dialog modal-dialog-centered modal-custom">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center p-0">
                            <img class="c-pt-20 c-pb-20" src="/assets/frontend/{{env('THEME_VERSION')}}/image/son/success.png" alt="">
                        </div>
                        <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                            <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Mua tài khoản thành công</p>
                            <p class="fw-400 fz-13 c-mt-10 mb-0">
                                Để bảo mật bạn vui lòng thay đổi mật khẩu và tên đăng nhập của tải khoản đã mua!
                            </p>
                        </div>
                        <div class="modal-footer c-p-24">
                            <a class="btn primary" data-dismiss="modal">Lịch sử</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal 04 -->
            <div class="modal fade modal-small" id="notInbox">
                <div class="modal-dialog modal-dialog-centered modal-custom">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center p-0">
                            <img class="c-pt-16 c-pb-16" src="/assets/frontend/{{theme('')->theme_key}}/image/son/tinhnang.svg" alt="">
                        </div>
                        <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">

                            <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Tính năng đang phát triển</p>
                            <p class="fw-400 fz-13 c-mt-10 mb-0">Tính năng này đang được xây dựng và phát triển, bạn vui lòng quay lại sau nha ^^</p>

                        </div>
                        <div class="modal-footer c-p-24">
                            <button class="btn ghost" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="slug" class="slug" value="{{ $slug }}">

            <input type="hidden" name="slug" class="slug_category" value="{{ $slug_category }}">

            <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/buyacc.js"></script>
            <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/buyaccslider.js"></script>
        @endif
    </div>



@endsection

@section('scripts')
    <script>

        $('body').on('click','#account-detail .btn-muangay',function(e){
            e.preventDefault();
            $('#orderModal').modal('show');
        })

        $('body').on('click','#account-detail .btn-muangay-not',function(e){
            e.preventDefault();

            $('#orderModalNot').modal('show');
        })

        $('body').on('click','#account-detail .btn-tragop',function(e){
            e.preventDefault();
            $('#traGopModal').modal('show');
        })

        $('body').on('click','#account-detail .btn-show-tuong',function(e){
            e.preventDefault();
            $('.c-modal__nick-lmht-tuong').css('display','block');
        })

        $('body').on('click','.c-close-modal',function(e){
            e.preventDefault();
            $('.c-modal__nick-lmht-tuong').css('display','none');
            $('.c-modal__nick-lmht-trang-phuc').css('display','none');
            $('.c-modal__nick-lmht-ttk').css('display','none');
        })

        $('body').on('click','#account-detail .btn-trangphuc',function(e){
            e.preventDefault();
            $('.c-modal__nick-lmht-trang-phuc').css('display','block');
        })

        $('body').on('click','#account-detail .btn-thongtinkhac',function(e){
            e.preventDefault();
            $('.c-modal__nick-lmht-ttk').css('display','block');
        })

        $('body').on('click','#account-detail .btn-success-mobile',function(e){
            e.preventDefault();
            $('#orderSuccses').modal('show');
        })



        function convertToSlug(title) {
            var slug;
            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();
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

        $('body').on('click','.show-modal-champ',function (e) {
            e.preventDefault();
            $('#modal-champ').modal('show').find('.modal-body').trigger('scroll');
        })
        $('body').on('click','.show-modal-skin',function (e) {
            e.preventDefault();
            $('#modal-skin').modal('show').find('.modal-body').trigger('scroll');
        })
        $('body').on('click','.show-modal-animal',function (e) {
            e.preventDefault();
            $('#modal-animal').modal('show').find('.modal-body').trigger('scroll');
        })

        $('.modal-lmht .modal-body').on('scroll',function () {
            $('html body').trigger('scroll');
        });
    </script>
@endsection


