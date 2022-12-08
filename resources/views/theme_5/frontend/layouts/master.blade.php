<!doctype html>
<html lang="vi">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('seo_head')

    @yield('meta_robots')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="path" content=""/>

    <meta name="jwt" content="" />

    @if(setting('sys_google_search_console') != '')
        <meta name="google-site-verification" content="{{setting('sys_google_search_console')}}" />
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/sweetalert2/sw2.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap/bootstrap.min.css">
    <!--    swiper-->
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/animate/animate.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/OwlCarousel2/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/steps/jquery-steps.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/select-nice/select-nice.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/nouislider/nouislider.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/easy-navigate-toc/public/css/toctoc.css">


    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/son/login_modal.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/modal-custom.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/main.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/duong/style.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/normalize.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/main.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style-custom.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/son/style.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/phu/style.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/nam/header.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/nam/menu-category.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/nam/menu-bottom.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/nam/nick-detail.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/nam/slide-banner.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/nam/change-password.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/range-slider-master/css/rSlider.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/son/service-mobile.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/duong/component-style.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/trong/components.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/select2/select2.min.css">
{{--js--}}
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/jquery/jquery.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/nick-random.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/buyaccrandomhome.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/charge/charge.js"></script>
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/store-card/store-card.js"></script>--}}
    <!-- js chứa các hàm cần load trước tiên -->
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/custom/preload.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>
{{--    import css --}}
    @yield('styles')
    @if(setting('sys_google_tag_manager_head') != '')

        @foreach(explode('|',setting('sys_google_tag_manager_head')) as $tag => $sys)
            @if($tag == 0)
            <!-- Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                    })(window,document,'script','dataLayer','{{ $sys }}');</script>
                <!-- End Google Tag Manager -->
            @elseif($tag == 1)
            <!-- Hubjs Tag Manager -->
                <script type="text/javascript">
                    var _mtm = window._mtm = window._mtm || [];
                    _mtm.push({'mtm.startTime': (new Date().getTime()), 'event': 'mtm.Start'});
                    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
                    g.type='text/javascript'; g.async=true; g.src='https://analytics.hub-js.com/js/container_{{ $sys }}.js'; s.parentNode.insertBefore(g,s);
                </script>
                <!-- End Hubjs Tag Manager -->
            @endif
        @endforeach

    @endif


    @if(Request::is('/') || Request::is('login'))
        <style>
            @media (max-width: 992px) {
                #footer{
                    display: block !important;
                    margin-bottom: 84px;
                }
            }
        </style>
    @elseif(Request::is('profile') )
        <style>
            @media (max-width: 992px) {
                #footer{
                    margin-bottom: 84px;
                }
            }
        </style>
    @endif


</head>
<body>
@if(setting('sys_google_tag_manager_body') != '')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{setting('sys_google_tag_manager_body') }}"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif

@include('frontend.layouts.includes.header')
<div class="layout" >
    <div class="content" style="">
        @yield('content')


        {{--    Modal xác nhận thanh toán--}}
        <div class="modal fade modal-big modal__buyacount loadModal__acount_home" id="LoadModalHome">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content c-p-24 data__form__random_home">

                </div>
            </div>
        </div>
        <div class="modal fade modal-small" id="notBuyHome">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content">
                    <div class="modal-header justify-content-center p-0">
                        <img class="c-pt-16 c-pb-16" src="/assets/frontend/{{theme('')->theme_key}}/image/son/thatbai.png" alt="">
                    </div>
                    <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                        <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Mua thẻ nick thất bại</p>
                        <p class="fw-400 fz-13 c-mt-10 mb-0">Rất tiếc việc mua nick đã thất bại do tài khoản của bạn không đủ, vui lòng nạp tiền để tiếp tục giao dịch!</p>
                    </div>
                    <div class="modal-footer c-p-24">
                        <button class="btn primary handle-recharge-modal" data-tab="1" data-dismiss="modal">Nạp tiền</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal mua thẻ cho người dùng --}}
        @include('frontend.widget.modal.__recharge_modal')

        {{-- Modal thông báo ATM tự động --}}
        @include('frontend.widget.modal.atm_auto_notify')

        {{-- Sheet thông báo ATM tự động --}}
        @include('frontend.widget.modal.atm_auto_notify_sheet')

        {{--  sử lý step thanh toán --}}
        <div class="step" id="chargeConfirmStep">
            <div class="head-mobile">
                <a href="javascript:void(0) " class="link-back close-step"></a>

                <p class="head-title text-title">Xác nhận thanh toán</p>

                <a href="/" class="home"></a>
            </div>
            <div class="body-mobile">
                <div class="body-mobile-content c-p-16">
                    <div class="dialog--content__title fw-700 fz-15 c-mb-12 text-title-theme">
                        Thông tin nạp thẻ
                    </div>
                    <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                        <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                Nhà mạng
                            </div>
                            <div class="card--attr__value fz-13 fw-500" id="confirmTitleMobile"></div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                Mệnh giá
                            </div>
                            <div class="card--attr__value fz-13 fw-500" id="confirmPriceMobile"></div>
                        </div>
                        <div class="card--attr justify-content-between d-flex text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                Chiết khấu
                            </div>
                            <div class="card--attr__value fz-13 fw-500" id="confirmDiscountMobile"></div>
                        </div>
                    </div>
                    <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                        <div class="card--attr justify-content-between d-flex text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                Phí thanh toán
                            </div>
                            <div class="card--attr__value fz-13 fw-500">
                                Miễn phí
                            </div>
                        </div>
                    </div>
                    <div class="card--gray c-mb-0 c-pt-8 c-pb-8 c-pl-12 brs-8 c-pr-12 g_mobile-content">
                        <div class="card--attr__total justify-content-between d-flex text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                Số tiền thực nhận
                            </div>
                            <div class="card--attr__value fz-13 fw-500"><a href="javascript:void(0)" class="c-text-primary" id="totalBillMobile"></a></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="footer-mobile v2">
                <div class="group-btn" >
                    <button class="btn primary" id="confirmSubmitButtonMobile">Xác nhận</button>
                </div>
            </div>
        </div>

        {{--    Modal xác nhận thanh toán--}}
        <div class="modal fade modal-big" id="orderCharge">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content c-p-24">
                    <div class="modal-header">
                        <p class="modal-title center">Xác nhận thanh toán</p>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                        <div class="dialog--content__title fw-700 fz-13 c-mb-12 text-title-theme">
                            Thông tin nạp thẻ
                        </div>
                        <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center">
                                    Nhà mạng
                                </div>
                                <div class="card--attr__value fz-13 fw-500" id="confirmTitle"></div>
                            </div>
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center">
                                    Mệnh giá
                                </div>
                                <div class="card--attr__value fz-13 fw-500" id="confirmPrice"></div>
                            </div>
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center">
                                    Chiết khấu
                                </div>
                                <div class="card--attr__value fz-13 fw-500" id="confirmDiscount"></div>
                            </div>
                        </div>
                        <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fz-13 fw-400 text-center">
                                    Phí thanh toán
                                </div>
                                <div class="card--attr__value fz-13 fw-500">
                                    Miễn phí
                                </div>
                            </div>
                        </div>
                        <div class="card--gray  c-mb-0 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                            <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                                <div class="card--attr__name fw-400 fz-13 text-center">
                                    Số tiền thực nhận
                                </div>
                                <div class="card--attr__value fz-13 fw-500"><a href="javascript:void(0)" class="c-text-primary" id="totalBill"></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn primary" type="button" id="confirmSubmitButton">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal thành công --}}
        <div class="modal fade modal-small" id="modalSuccessPayment">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content">
                    <div class="modal-header justify-content-center p-0">
                        <img class="c-pt-20 c-pb-20" src="/assets/frontend/{{theme('')->theme_key}}/image/son/success.png" alt="">
                    </div>
                    <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                        <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Nạp thẻ thành công</p>
                        <p class="fw-400 fz-13 c-mt-10 mb-0" id="successMessage"></p>
                    </div>
                    <div class="modal-footer c-p-24">
                        <a href="/" class="btn secondary" data-dismiss="modal">Trang chủ</a>
                        <button class="btn primary handle-recharge-modal" data-tab="1" data-dismiss="modal">Nạp thêm</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal thất bại --}}
        <div class="modal fade modal-small" id="modalFailPayment">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content">
                    <div class="modal-header justify-content-center p-0">
                        <img class="c-pt-16 c-pb-16" src="/assets/frontend/{{theme('')->theme_key}}/image/son/thatbai.png" alt="">
                    </div>
                    <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                        <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Nạp thẻ thất bại</p>
                        <p class="fw-400 fz-13 c-mt-10 mb-0" id="failMessage"></p>
                    </div>
                    <div class="modal-footer c-p-24">
                        <button class="btn ghost" data-dismiss="modal">Thoát</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal xem thêm --}}
        @include('frontend.widget.modal.viewmore_modal')
        {{-- Bottom Sheet xem thêm --}}
        @include('frontend.widget.modal.viewmore_sheet')

        {{--        login--}}
        @if (!\App\Library\AuthCustom::check())
            @include('frontend.widget.modal.__login')
        @endif

    </div>
</div>

@if(setting('sys_id_chat_message') != '')
<!-- Messenger Plugin chat Code -->
<div id="fb-root" style="    z-index: 666;"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>
<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "{{setting('sys_id_chat_message') }}");

    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v13.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
@endif
@include('frontend.layouts.includes.footer')

@include('frontend.layouts.includes.menu-bottom')
<div class="modal-loader-container">
    <div class="modal-loader-content">
        <span class="modal-loader-spin"></span>
    </div>
</div>
<!-- Messenger Plugin chat Code -->
{{--@if(Session::has('check_login'))--}}
@if(Request::is('login'))
    <script>
        $(document).ready(function () {
            let width = $(window).width();
            setTimeout(function(){
                if ( width > 1200 ) {
                    $('#loginModal').modal('show');
                    setTimeout(() => {
                        $('#loginModal #modal-login-container').removeClass('right-panel-active');
                    }, 200);
                } else {
                    $('.mobile-auth-form #formLoginMobile').css('display', 'flex');
                    $('.mobile-auth-form #formRegisterMobile').css('display', 'none');
                    $('.mobile-auth .head-mobile h1').text('Đăng nhập');
                    $('.mobile-auth').css('transform', 'translateX(0)');
                }
            }, 0);
        });
    </script>
{{--    @php--}}
{{--        Session::pull('check_login');--}}
{{--    @endphp--}}
@endif


@if(!Request::is('/'))
    @if(Session::has('url_return.id_return'))
        @php
            Session::forget('url_return.id_return');
        @endphp
    @endif
@endif


@include('frontend.widget.__theme')

<script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap/bootstrap.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/lazy/jquery.lazy.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/lazy/jquery.lazy.plugins.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/wnumb-1.2.0/wNumb.min.js"></script>

<script src="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/sweetalert2/sw2.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/select-nice/select-nice.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/popper/popper.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/popper/tippy-bundle.umd.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/steps/jquery-steps.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/easeJquery/easing.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/login/login_modal.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/nouislider/nouislider.min.js"></script>

<script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.umd.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/OwlCarousel2/OwlCarousel2.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/slick/slick.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/config/swiper-slider-conf.js"></script>

<script src="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/moment.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/bootstrap-datetimepicker.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/validate-form/validate.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/config/form-validate.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/i18n/vi.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/custom/main.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/nam/header.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/nam/swiper-banner.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/bottom-sheet/main.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/history-filter/handle.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/account_info.js?v={{time()}}"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/js_duong/style.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/select2/select2.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/easy-navigate-toc/public/js/toctoc.js"></script>
@if(\App\Library\AuthFrontendCustom::check())
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/transfer/transfer.js?v={{time()}}"></script>
@endif
{{--impport script--}}
@yield('scripts')
</body>


</html>
