<!DOCTYPE html>
<html lang="vi">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    @yield('seo_head')
    @yield('meta_robots')
    <meta name="path" content="" />
    <meta name="jwt" content="" />
    @if(setting('sys_google_search_console') != '')
        <meta name="google-site-verification" content="{{setting('sys_google_search_console')}}" />
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/lib/vendors/vendors.bundle.css" rel="stylesheet" type="text/css"/>

    <link href="/assets/frontend/{{theme('')->theme_key}}/lib/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/index.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/profile.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/blog.css?v={{time()}}" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/style_nam.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fixed-sticky/fixedsticky.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/storecard.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/owl-carousel/owl.transitions.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/easy-navigate-toc/public/css/toctoc.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/table_of_contents.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/theme_main.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.css">
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/vendors/vendors.bundle.js" type="text/javascript"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/lazyload2/jquery.lazy.min.js"></script>
    {{--    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/jquery.min.js"></script>--}}
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/owl-carousel/slider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/sweetalert2/sw2.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/popper/popper.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/popper/tippy-bundle.umd.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.umd.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/easy-navigate-toc/public/js/toctoc.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/select-nice/select-nice.js"></script>
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
<style>

</style>
<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
@if(setting('sys_google_tag_manager_body') != '')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{setting('sys_google_tag_manager_body') }}"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif
<!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    @include('frontend.layouts.includes.header')
    <div class="ajax-loader"></div>
    <div id="main">
        <div class="container pl-0 pr-0">
            @yield('content')
        </div>
    </div>
</div>
<div id="togger"></div>
@include('frontend.layouts.includes.footer')
@include('frontend.widget.__theme')
@include('frontend.widget.modal.__recharge_card')

@include('frontend.widget.modal.__login')

<div id="m_scroll_top" class="m-scroll-top">
    <i class="fa-solid fa-arrow-up"></i>
</div>
@if(setting('sys_noti_popup') != '')
<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="loader" style="text-align: center">
            <img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
        <div class="modal-content">
            {!! setting('sys_noti_popup') !!}
        </div>
    </div>
</div>
@endif


<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif"
                                                            style="width: 50px;height: 50px;display: none"></div>
        <div class="modal-content">
        </div>
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
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/scripts.bundle.js" type="text/javascript"></script>

<script src="/assets/frontend/{{theme('')->theme_key}}/lib/sweetalert2.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/dashboard.js" type="text/javascript"></script>
{{--<script src="/assets/frontend/{{theme('')->theme_key}}/lib/sweetalert/sweetalert.min.js"></script>--}}
{{--<script src="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.min.js"></script>--}}


<script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap-datepicker/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap-datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/index.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/main.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/charge/modal-charge.js" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/account_info.js?v={{time()}}" type="text/javascript"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/transfer/transfer.js?v={{time()}}"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/slider_home.js?v={{time()}}"></script>
</body>
<!-- end::Body -->
</html>

