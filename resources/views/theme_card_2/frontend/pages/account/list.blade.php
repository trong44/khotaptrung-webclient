@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow"/>
@endsection

@section('content')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/theme_main.css">
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

        <div class="item_buy">
            <div class="news_breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-md-12">
                            <ul class="news_breadcrumbs_theme news_breadcrumbs_theme__show">
                                <li><a href="/"
                                       class="news_breadcrumbs_theme_trangchu news_breadcrumbs_theme_trangchu_a">Trang
                                        chủ</a></li>
                                <li>/</li>
                                <li><a href="/mua-acc" class="news_breadcrumbs_theme_tintuc_a"><p
                                            class="news_breadcrumbs_theme_tintuc">Mua Acc</p></a></li>
                                <li>/</li>
                                <li class="news_breadcrumbs_theme__li"><a href="javascript:void(0)"
                                                                          class="news_breadcrumbs_theme_title_a"><p
                                            class="news_breadcrumbs_theme_title">{{ isset($data->custom->title) ? $data->custom->title :  $data->title }}</p>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="booking_detail"></div>
            <div class="container pt-3 pl-0 pr-0">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="intro-text" style="color:#fff">
                            <div class="container pl-0 pr-0">
                                <!-- Begin: Testimonals 1 component -->
                                <div class="c-content-client-logos-slider-1  c-bordered hidetext" data-slider="owl" style="color: black">
                                    <!-- Begin: Title 1 component -->
                                    <h1 class="alert-heading h1_category"
                                        style="color:#000">{{ isset($data->custom->title) ? $data->custom->title :  $data->title }}</h1>

                                    @if($data->custom->content)
                                        {!!  $data->custom->content !!}
                                    @else
                                        @if(isset($data->content))
                                            {!!  $data->content !!}
                                        @else

                                        @endif
                                    @endif
                                </div>
                                <!-- End-->
                            </div>
                        </div>

                        <div style="text-align: center;margin: 15px 0">
                            <span class="viewmore">Xem tất cả »</span>
                        </div>
                    </div>
                </div>

                <div class="item_buy_form">
                    <form class="form-charge form-charge__accountlist">
                        <div class="row" id="load_attribute">
                            @include('frontend.pages.account.widget.account_load_attribute_to_filter')
                        </div>
                    </form>
                </div>

                <div class="item_buy_filter">
                    <label for="item_buy_filter_input" class="item_buy_filter_in btn btn-success"
                           style="cursor: pointer;">
                        <i class="fas fa-filter"></i> Tìm kiếm
                    </label>
                    <input type="checkbox" hidden class="item_buy_filter_input" id="item_buy_filter_input">
                    <label for="item_buy_filter_input" class="item_buy_filter_overlay">

                    </label>
                    <div class="item_buy_form-mobile">
                        <div class="item_buy_form-mobile_title">
                            <label for="item_buy_filter_input" class="item_buy_form-mobile_close">
                                <i class="fas fa-times"></i>
                            </label>
                            <p>Tìm kiếm</p>

                        </div>
                        <hr>
                        <div class="item_buy_form-mobile_search">
                            <form class="form-charge form-charge__accountlist-mobile">
                                <div class="row" id="load_attribute_mobile">
                                    @include('frontend.pages.account.widget.account_load_attribute_to_filter_mobile')
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div id="account_data">
                    <div class="body-box-loadding result-amount-loadding">
                        <div class="d-flex justify-content-center">
                            <span class="pulser"></span>
                        </div>
                    </div>

                    @include('frontend.pages.account.widget.__datalist')
                </div>


                <input type="hidden" name="hidden_page" id="hidden_page_service" value="1"/>

            </div>
        </div>


        <input type="hidden" value="{{ $slug }}" name="slug" class="slug">
        {{--    <input type="hidden" value="{{ $slug_category }}" name="slug_category" class="slug_category">--}}
        <input type="hidden" name="id_data" class="id_data" value="">
        <input type="hidden" name="title_data" class="title_data" value="">
        <input type="hidden" name="price_data" class="price_data" value="">
        <input type="hidden" name="select_data" class="select_data" value="">
        <input type="hidden" name="status_data" class="status_data" value="">
        <input type="hidden" name="sort_by_data" class="sort_by_data" value="">

        {{--        Lm auto  --}}

        <input type="hidden" name="champions_data" class="champions_data" value="">
        <input type="hidden" name="skill_data" class="skill_data" value="">
        <input type="hidden" name="tftcompanions_data" class="tftcompanions_data" value="">
        <input type="hidden" name="tftdamageskins_data" class="tftdamageskins_data" value="">
        <input type="hidden" name="tftmapskins_data" class="tftmapskins_data" value="">

        <div class="modal fade modal__account modal__buyacount loadModal__acount" id="LoadModal" role="dialog" style="display: none;"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog__account" role="document">
                <div class="loader" style="text-align: center"><img
                        src="/assets/frontend/{{theme('')->theme_key}}/images/loader.gif"
                        style="width: 50px;height: 50px;display: none"></div>
                <div class="modal-content modal-content_accountlist data__form__random">

                </div>
            </div>
        </div>

        <div class="modal fade modal__account" role="dialog" id="successModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog__account" role="document">
                <div class="modal-content modal-content_accountlist">

                    <div class="modal-header">
                        <span class="nick-modal-header">Thanh toán thành công</span>
                        <img data-dismiss="modal" class="nick-modal-header-close" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/close.svg" alt="">
                    </div>

                    <div class="modal-body">
                        <div class="modal-account-success-image d-flex justify-content-center w-100">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/group.png" alt="">
                        </div>
                        <div class="input-group nick-success-input-group" style="width: 100%">
                            <label>ID tài khoản</label>
                            <input id="nickIdInput" type="text" class="form-control" style="width:100%" readonly>
                        </div>
                        <div class="nick-notify-success-block">
                            <p>Nick của bạn được sẽ gửi tới trang Lịch sử mua Nick, vui lòng kiểm tra và đăng nhập vào Game, thay đổi mật khẩu để bảo mật cho tài khoản đã mua</p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="d-flex justify-content-center w-100">
                            <a class="btn-nick btn-secondary" href="/">Trang chủ</a>
                            <a class="btn-nick btn-primary" href="/lich-su-mua-account">Lịch sử</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal nạp tiền -->

{{--        @if($data->display_type == 2)--}}
{{--                    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/modal-charge.js?v={{time()}}"></script>--}}
{{--                    <script src="/assets/frontend/{{theme('')->theme_key}}/js/transfer/transfer.js?v={{time()}}"></script>--}}
{{--            <script src="/js/{{theme('')->theme_key}}/account/list_1.js"></script>--}}
{{--        @endif--}}

        <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/buyaccrandom.js?v={{time()}}"></script>
        <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/account-list.js?v={{time()}}"></script>
{{--        <script src="/js/{{theme('')->theme_key}}/account/list_2.js"></script>--}}
    @endif

@endsection

