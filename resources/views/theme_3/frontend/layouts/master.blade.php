<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=0, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @yield('seo_head')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('meta_robots')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="path" content=""/>

    <meta name="jwt" content=""/>


    {{--    <meta name="google-site-verification" content="{{setting('sys_google_search_console')}}" />--}}
    @if(setting('sys_google_search_console') != '')
        <meta name="google-site-verification" content="{{setting('sys_google_search_console')}}" />
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
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

    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/css_nam/style.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/css_nam/lib_bootstrap.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/css_nam/minigame.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_son.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_trong.css?ver={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_duong.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/form_element.css">

    <!-- select 2 -->
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/select2/select2.min.css">

    @if (!\App\Library\AuthCustom::check())
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/login_modal.css">
    @endif

{{--    import css --}}
    @yield('styles')
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/jquery/jquery.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap/bootstrap.min.js"></script>
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/lazyload/lazyloadGen.js"></script>--}}

    <!-- cdnjs -->


    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/lazy/jquery.lazy.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/lazy/jquery.lazy.plugins.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/sweetalert2/sw2.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/select-nice/select-nice.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/popper/popper.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/popper/tippy-bundle.umd.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/steps/jquery-steps.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/easeJquery/easing.js"></script>

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account_info.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/preload.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/handlebars/handlebars.min.js"></script>

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
</head>
<body>

@if(setting('sys_google_tag_manager_body') != '')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{setting('sys_google_tag_manager_body') }}"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif
<!-- Modal nạp tiền -->
@include('frontend.widget.modal.__recharge_modal')

{{-- Modal thông báo ATM tự động --}}
@include('frontend.widget.modal.atm_auto_notify')

{{-- Modal xem thêm --}}
@include('frontend.widget.modal.viewmore_modal')

@include('frontend.widget.modal.__success_charge')
@include('frontend.widget.modal.__success_charge_home')
@include('frontend.widget.modal.__reject_charge')

<!-- end modal charge -->
{{--<a class="go-to-top">--}}
{{--    <img src="/assets/frontend/theme_3/image/gototop.png" alt="" style=" ">--}}
{{--</a>--}}
<div class="c_scroll-top go-to-top">
    <div class="c_circle">
        <img src="/assets/frontend/theme_3/image/c_back-to-top.svg" alt="" style=" ">
    </div>
{{--    <div class="c_text">--}}
{{--        <p style="margin-top: 4px">Quay về--}}
{{--        </p>--}}
{{--        <p>đầu trang</p>--}}
{{--    </div>--}}
</div>
<script>
    $(document).ready(function (e) {

        $('.go-to-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
        });

        tippy('#item-about-khuyenmai', {
            // default
            content: "Sắp ra mắt.",
            arrow: true,
        });

        tippy('#item-about-thongbao', {
            // default
            content: "Sắp ra mắt.",
            arrow: true,
        });

        tippy('#item-about-sukienhot', {
            // default
            content: "Sắp ra mắt.",
            arrow: true,
        });
    })
</script>

<div class="modal-loader-container">
    <div class="modal-loader-content">
        <span class="modal-loader-spin"></span>
    </div>
</div>
@include('frontend.layouts.includes.header')
<div class="layout">
    <div class="content" style="">
        @yield('content')
    </div>
</div>

{{--  modal hien thi nguoi mua website --}}
{{--<div class="fix-sedding">--}}
{{--    <div class="modal-sedding-notification sedding-notification-mobile" id="sedding-notification" >--}}
{{--        <div class="close-sedding">--}}
{{--            <i class="fas fa-times"></i>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{-- end modal --}}

@if(Request::is('/'))
    <style>
        @media (max-width: 992px){
            .content{
                padding-bottom: 1rem;
            }
        }
    </style>
@include('frontend.layouts.includes.footer')

@endif
@include('frontend.widget.__theme')

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
                <button class="btn primary handleOpenRechargeModal" data-dismiss="modal">Nạp tiền</button>
            </div>
        </div>
    </div>
</div>



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

@if (!\App\Library\AuthCustom::check())
<script src="/assets/frontend/{{theme('')->theme_key}}/js/js_phu/login_modal.js"></script>
@endif
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.umd.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/OwlCarousel2/OwlCarousel2.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/slick/slick.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/js_nam/main.js?v={{time()}}"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/js_nam/swiper.js?v={{time()}}"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/js_nam/swiper-banner.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/moment.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/i18n/vi.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/bootstrap-datetimepicker.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/modal-charge.js?v={{time()}}"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/transfer/transfer.js?v={{time()}}"></script>

<!-- select 2 -->
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/select2/select2.min.js"></script>
{{--<script src="/assets/frontend/{{theme('')->theme_key}}/js/js_duong/modal_sedding.js?v={{time()}}"></script>--}}

{{--impport script--}}
@yield('scripts')
</body>


</html>
