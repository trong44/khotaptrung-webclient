@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
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
        @if(isset($game_auto_props) && count($game_auto_props))
            @if($slug_category == 'nick-lien-minh')
        @php
            $total_tuong = 0;
            $total_bieucam = 0;
            $total_chuongluc = 0;
            $total_sandau = 0;
            $total_linhthu = 0;
            $total_trangphuc = 0;
            $total_thongtinchung = 0;

            if(isset($game_auto_props) && count($game_auto_props)){
                foreach($game_auto_props as $game_auto_prop){
                    if($game_auto_prop->key == 'champions'){
                        $total_tuong = $total_tuong + 1;
                        if(isset($game_auto_prop->childs) && count($game_auto_prop->childs)){
                            foreach($game_auto_prop->childs as $c_child){
                                $total_trangphuc = $total_trangphuc + 1;
                            }
                        }
                    }elseif ($game_auto_prop->key == 'emotes'){
                        $total_bieucam = $total_bieucam + 1;
                    }elseif ($game_auto_prop->key == 'tftdamageskins'){
                        $total_chuongluc = $total_chuongluc + 1;
                    }elseif ($game_auto_prop->key == 'tftmapskins'){
                        $total_sandau = $total_sandau + 1;
                    }elseif ($game_auto_prop->key == 'tftcompanions'){
                        $total_linhthu = $total_linhthu + 1;
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

                <div class="row marginauto">

                    <div class="col-md-12 left-right" id="showslideracc">
                        <div class="body-box-loadding result-amount-loadding result-amount-loadding__nick-lien-quan">
                            <div class="d-flex justify-content-center" style="padding-top: 112px;">
                                <span class="pulser"></span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12 left-right" id="showswatched">
{{--                        @include('frontend.pages.account.widget.__viewed__account')--}}
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
                    <div class="header-modal__nick-lmht c-px-24 c-pt-24 pb-0 position-relative text-uppercase text-center ml-auto mr-auto fw-700">
                        <div class="row marginauto c-pb-24 header-modal__nick-lmht-row">
                            <div class="col-auto pl-0 pr-0 mb-0 c-mr-24">
                                <h2 class="fw-700 fz-24 lh-32 mb-0">Linh thú TFT</h2>

                                <p class="fw-400 fz-13 lh-20 mb-0">({{ $total_linhthu }} linh thú)</p>
                            </div>
                            <div class="col-auto pl-0 pr-0 form-search input-search-lmht position-relative">
                                <input id="keyword--search" type="search" placeholder="Tìm kiếm" class="has-submit input-search-lmht form-control">
                                <button class="submit--search" type="submit"></button>
                            </div>
                            <img class="c-close-modal" src="/assets/frontend/{{theme('')->theme_key}}/image/son/close.svg" alt="">
                        </div>
                    </div>
                    <div class="body-modal__nick-lmht pb-0 c-px-18 c-pt-10 mr-auto ml-auto">
                        <div class="row marginauto modal-container-body">
                            <div class="col-md-12 c-px-6 c-py-8 body-modal__nick__text-error">
                                <div class="text-error c-mt-4">Không có kết quả phù hợp.</div>
                            </div>

                            @foreach($game_auto_props as $game_auto_prop)
                                @if($game_auto_prop->key == 'tftcompanions')
                                    <div class="col-auto c-px-6 c-py-8 item-nick-lmht">
                                        <a href="javascript:void(0)">
                                            <div class="row marginauto item-nick-lmht__border">
                                                <div class="col-md-12 pl-0 pr-0 item-nick-lmht__border__col">
                                                    <img class="w-100 brs-4 position-absolute item-nick-lmht__border__img lazy" src="{{\App\Library\MediaHelpers::media($game_auto_prop->thumb)}}" alt="{{ $game_auto_prop->name }}">
                                                </div>
                                                <div class="col-md-12 pl-0 pr-0 text-center">
                                                    <p class="fw-400 fz-13 c-mb-4 c-mt-20 text-theme text-limit limit-1">{{ $game_auto_prop->name }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <div class="modal-footer" style="height: 16px">

                        </div>
                    </div>

                </div>

                {{--    Modal Trang phuc   --}}

                <div class="c-modal__nick-lmht c-modal__nick-lmht-trang-phuc d-none" id="nick-lmht-trangphuc" style="z-index: 1005; background: rgba(67, 70, 87, 0.5);">
                    <div class="header-modal__nick-lmht c-px-24 c-pt-24 pb-0 position-relative text-uppercase text-center ml-auto mr-auto fw-700">
                        <div class="row marginauto c-pb-24 header-modal__nick-lmht-row">
                            <div class="col-auto pl-0 pr-0 mb-0 c-mr-24">
                                <h2 class="fw-700 fz-24 lh-32 mb-0">Trang phục</h2>
                                <p class="fw-400 fz-13 lh-20 mb-0">({{ $total_trangphuc }} Trang phục)</p>
                            </div>
                            <div class="col-auto pl-0 pr-0 form-search input-search-lmht position-relative">
                                <input id="keyword--search" type="search" placeholder="Tìm kiếm" class="has-submit input-search-lmht form-control">
                                <button class="submit--search" type="submit"></button>
                            </div>
                            <img class="c-close-modal" src="/assets/frontend/{{theme('')->theme_key}}/image/son/close.svg" alt="">
                        </div>
                    </div>
                    <div class="body-modal__nick-lmht pb-0 c-px-18 c-pt-10 mr-auto ml-auto">
                        <div class="row marginauto modal-container-body">
                            <div class="col-md-12 c-px-6 c-py-8 body-modal__nick__text-error">
                                <div class="text-error c-mt-4">Không có kết quả phù hợp.</div>
                            </div>

                            @foreach($game_auto_props as $game_auto_prop)
                                @if($game_auto_prop->key == 'champions')
                                    @if(isset($game_auto_prop->childs) && count($game_auto_prop->childs))
                                        @foreach($game_auto_prop->childs as $c_child)
                                        <div class="col-auto c-px-6 c-py-8 item-nick-lmht">
                                            <a href="javascript:void(0)">
                                                <div class="row marginauto item-nick-lmht__border">
                                                    <div class="col-md-12 pl-0 pr-0 item-nick-lmht__border__col">
                                                        <img class="w-100 brs-4 position-absolute item-nick-lmht__border__img lazy" src="{{\App\Library\MediaHelpers::media($c_child->thumb)}}" alt="{{ $c_child->name }}">
                                                    </div>
                                                    <div class="col-md-12 pl-0 pr-0 text-center">
                                                        <p class="fw-400 fz-13 c-mb-4 c-mt-20 text-theme text-limit limit-1">{{ $c_child->name }}</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach

                        </div>
                        <div class="modal-footer" style="height: 16px">

                        </div>
                    </div>

                </div>


                {{--    Modal Tuong   --}}

                <div class="c-modal__nick-lmht c-modal__nick-lmht-tuong d-none d-none" id="nick-lmht-tuong" style="z-index: 1005; background: rgba(67, 70, 87, 0.5);">
                    <div class="header-modal__nick-lmht c-px-24 c-pt-24 pb-0 position-relative text-uppercase text-center ml-auto mr-auto fw-700">
                        <div class="row marginauto c-pb-24 header-modal__nick-lmht-row">
                            <div class="col-auto pl-0 pr-0 mb-0 c-mr-24">
                                <h2 class="fw-700 fz-24 lh-32 mb-0">Tướng</h2>
                                <p class="fw-400 fz-13 lh-20 mb-0 total_tuong_data">({{ $total_tuong??0 }} tướng)</p>
                            </div>
                            <div class="col-auto pl-0 pr-0 form-search input-search-lmht position-relative">
                                <input id="keyword--search" type="search" placeholder="Tìm kiếm" class="has-submit input-search-lmht form-control">
                                <button class="submit--search" type="submit"></button>
                            </div>
                            <img class="c-close-modal" src="/assets/frontend/{{theme('')->theme_key}}/image/son/close.svg" alt="">
                        </div>
                    </div>
                    <div class="body-modal__nick-lmht pb-0 c-px-18 c-pt-10 mr-auto ml-auto">
                        <div class="row marginauto modal-container-body">
                            <div class="col-md-12 c-px-6 c-py-8 body-modal__nick__text-error">
                                <div class="text-error c-mt-4">Không có kết quả phù hợp.</div>
                            </div>
                            @foreach($game_auto_props as $game_auto_prop)
                                @if($game_auto_prop->key == 'champions')
                                    <div class="col-auto c-px-6 c-py-8 item-nick-lmht">
                                        <a href="javascript:void(0)">
                                            <div class="row marginauto item-nick-lmht__border">
                                                <div class="col-md-12 pl-0 pr-0 item-nick-lmht__border__col">
                                                    <img class="w-100 brs-4 position-absolute item-nick-lmht__border__img lazy" src="https://backend.dev.tichhop.pro/{{ $game_auto_prop->thumb }}" alt="{{ $game_auto_prop->name }}">
        {{--                                            <img class="w-100 brs-4 position-absolute item-nick-lmht__border__img lazy" src="{{\App\Library\MediaHelpers::media($game_auto_prop->thumb)}}" alt="{{ $game_auto_prop->name }}">--}}
                                                </div>
                                                <div class="col-md-12 pl-0 pr-0 text-center">
                                                    <p class="fw-400 fz-13 c-mt-10 text-theme text-limit limit-1" style="padding-top: 8px;margin-bottom: 0">{{ $game_auto_prop->name }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <div class="modal-footer" style="height: 16px">

                        </div>
                    </div>

                </div>

                {{--    Modal thông tin khác--}}


                <input type="hidden" name="total_tuong" class="total_tuong" value="{{ $total_tuong }}">
        {{--        <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/son/main.css">--}}
                <script>
                    $('body').on('click','.c-close-modal',function(e){
                        e.preventDefault();
                        $('.c-modal__nick-lmht-tuong').addClass('d-none');
                        $('.c-modal__nick-lmht-ttk').addClass('d-none');
                        $('.c-modal__nick-lmht-trang-phuc').addClass('d-none');
                        $('.c-modal__nick-lmht-linh-thu-tft').addClass('d-none');
                        $('.c-modal__nick-lmht-san-dau-tft').addClass('d-none');
                        $('.c-modal__nick-lmht-chuong-luc-tft').addClass('d-none');

                        $('.c-modal__nick-lmht-bieu-cam').addClass('d-none');
                    });


                    $('body').on('click','.lm_xemthem_tuong',function(e){
                        e.preventDefault();
                        $('.c-modal__nick-lmht-tuong').removeClass('d-none');
                    });

                    $('body').on('click','.lm_xemthem_thongtinchung',function(e){
                        e.preventDefault();
                        $('.c-modal__nick-lmht-ttk').removeClass('d-none');
                    });

                    $('body').on('click','.lm_xemthem_trangphuc',function(e){
                        e.preventDefault();
                        $('.c-modal__nick-lmht-trang-phuc').removeClass('d-none');
                    });

                    $('body').on('click','.lm_xemthem_linhthu',function(e){
                        e.preventDefault();
                        $('.c-modal__nick-lmht-linh-thu-tft').removeClass('d-none');
                    });

                    $('body').on('click','.lm_xemthem_sandau',function(e){
                        e.preventDefault();
                        $('.c-modal__nick-lmht-san-dau-tft').removeClass('d-none');
                    });

                    $('body').on('click','.lm_xemthem_damedondanh',function(e){
                        e.preventDefault();
                        $('.c-modal__nick-lmht-chuong-luc-tft').removeClass('d-none');
                    });

                    $('body').on('click','.lm_xemthem_bieucam',function(e){
                        e.preventDefault();
                        $('.c-modal__nick-lmht-bieu-cam').removeClass('d-none');
                    });

                    $('body').on('click','#nick-lmht-tuong  .submit--search',function(e){
                        e.preventDefault();
                        let keyword = convertToSlug($('#nick-lmht-tuong #keyword--search').val());

                        let index = 0;
                        $('#nick-lmht-tuong .item-nick-lmht').each(function (i,elm) {
                            $('#nick-lmht-tuong  .body-modal__nick__text-error').css('display','none');
                            let slug_item = $(elm).find('img').attr('alt');
                            slug_item = convertToSlug(slug_item);
                            $(this).toggle(slug_item.indexOf(keyword) > -1);
                            if (slug_item.indexOf(keyword) > -1){
                                index = index + 1
                            }else {}

                            if (index == 0){
                                $('#nick-lmht-tuong  .body-modal__nick__text-error').css('display','block');
                            }

                        })
                    })

                    $('body').on('click','#nick-lmht-trangphuc  .submit--search',function(e){
                        e.preventDefault();
                        let keyword = convertToSlug($('#nick-lmht-trangphuc #keyword--search').val());

                        let index = 0;
                        $('#nick-lmht-trangphuc .item-nick-lmht').each(function (i,elm) {
                            $('#nick-lmht-trangphuc  .body-modal__nick__text-error').css('display','none');
                            let slug_item = $(elm).find('img').attr('alt');
                            slug_item = convertToSlug(slug_item);
                            $(this).toggle(slug_item.indexOf(keyword) > -1);
                            if (slug_item.indexOf(keyword) > -1){
                                index = index + 1
                            }else {}

                            if (index == 0){
                                $('#nick-lmht-trangphuc  .body-modal__nick__text-error').css('display','block');
                            }

                        })
                    })

                    $('body').on('click','#nick-lmht-thongtinchung  .submit--search',function(e){
                        e.preventDefault();
                        let keyword = convertToSlug($('#nick-lmht-thongtinchung #keyword--search').val());

                        let index = 0;
                        $('#nick-lmht-thongtinchung .item-nick-lmht').each(function (i,elm) {
                            $('#nick-lmht-thongtinchung  .body-modal__nick__text-error').css('display','none');
                            let slug_item = $(elm).find('img').attr('alt');
                            slug_item = convertToSlug(slug_item);
                            $(this).toggle(slug_item.indexOf(keyword) > -1);
                            if (slug_item.indexOf(keyword) > -1){
                                index = index + 1
                            }else {}

                            if (index == 0){
                                $('#nick-lmht-thongtinchung  .body-modal__nick__text-error').css('display','block');
                            }

                        })
                    })

                    $('body').on('click','#nick-lmht-linhthu  .submit--search',function(e){
                        e.preventDefault();
                        let keyword = convertToSlug($('#nick-lmht-linhthu #keyword--search').val());

                        let index = 0;
                        $('#nick-lmht-linhthu .item-nick-lmht').each(function (i,elm) {
                            $('#nick-lmht-linhthu  .body-modal__nick__text-error').css('display','none');
                            let slug_item = $(elm).find('img').attr('alt');
                            slug_item = convertToSlug(slug_item);
                            $(this).toggle(slug_item.indexOf(keyword) > -1);
                            if (slug_item.indexOf(keyword) > -1){
                                index = index + 1
                            }else {}

                            if (index == 0){
                                $('#nick-lmht-linhthu  .body-modal__nick__text-error').css('display','block');
                            }

                        })
                    })

                    $('body').on('click','#nick-lmht-sandau  .submit--search',function(e){
                        e.preventDefault();
                        let keyword = convertToSlug($('#nick-lmht-sandau #keyword--search').val());

                        let index = 0;
                        $('#nick-lmht-sandau .item-nick-lmht').each(function (i,elm) {
                            $('#nick-lmht-sandau  .body-modal__nick__text-error').css('display','none');
                            let slug_item = $(elm).find('img').attr('alt');
                            slug_item = convertToSlug(slug_item);
                            $(this).toggle(slug_item.indexOf(keyword) > -1);
                            if (slug_item.indexOf(keyword) > -1){
                                index = index + 1
                            }else {}

                            if (index == 0){
                                $('#nick-lmht-sandau  .body-modal__nick__text-error').css('display','block');
                            }

                        })
                    })

                    $('body').on('click','#nick-lmht-bieucam  .submit--search',function(e){
                        e.preventDefault();
                        let keyword = convertToSlug($('#nick-lmht-bieucam #keyword--search').val());

                        let index = 0;
                        $('#nick-lmht-bieucam .item-nick-lmht').each(function (i,elm) {
                            $('#nick-lmht-bieucam  .body-modal__nick__text-error').css('display','none');
                            let slug_item = $(elm).find('img').attr('alt');
                            slug_item = convertToSlug(slug_item);
                            $(this).toggle(slug_item.indexOf(keyword) > -1);
                            if (slug_item.indexOf(keyword) > -1){
                                index = index + 1
                            }else {}

                            if (index == 0){
                                $('#nick-lmht-bieucam  .body-modal__nick__text-error').css('display','block');
                            }

                        })
                    })

                    $('body').on('click','#nick-lmht-chuongluc  .submit--search',function(e){
                        e.preventDefault();
                        let keyword = convertToSlug($('#nick-lmht-chuongluc #keyword--search').val());

                        let index = 0;
                        $('#nick-lmht-chuongluc .item-nick-lmht').each(function (i,elm) {
                            $('#nick-lmht-chuongluc  .body-modal__nick__text-error').css('display','none');
                            let slug_item = $(elm).find('img').attr('alt');
                            slug_item = convertToSlug(slug_item);
                            $(this).toggle(slug_item.indexOf(keyword) > -1);
                            if (slug_item.indexOf(keyword) > -1){
                                index = index + 1
                            }else {}

                            if (index == 0){
                                $('#nick-lmht-chuongluc  .body-modal__nick__text-error').css('display','block');
                            }

                        })
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

                </script>
            @endif
        @endif
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/modal-charge.js?v={{time()}}"></script>
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/transfer/transfer.js?v={{time()}}"></script>
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/buyacc.js"></script>
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/buyaccslider.js"></script>
{{--        <script src="/js/{{theme('')->theme_key}}/account/detail.js"></script>--}}
        <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/modal-custom.css">
{{--        <link rel="stylesheet" href="/css/{{theme('')->theme_key}}/account/detail.css">--}}
        {{--    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/modal-custom.css">--}}


    @endif
@endsection

