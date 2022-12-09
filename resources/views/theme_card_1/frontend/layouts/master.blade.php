
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">


<!-- Mirrored from muathe123.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Mar 2021 06:46:07 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('seo_head')
    @yield('meta_robots')
    <meta name="path" content=""/>
    <meta name="jwt" content=""/>
    @if(setting('sys_google_search_console') != '')
        <meta name="google-site-verification" content="{{setting('sys_google_search_console')}}"/>
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    @stack('style')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrapdatepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/tui-date-picker.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/easy-navigate-toc/public/css/toctoc.css">

    <!-- <link media="screen" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css" /> -->
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/responsive.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/blog.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_nam.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_duong.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/storecard.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/table_of_contents.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/select-nice/select-nice.css">
    {{--    js--}}
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/jquery.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/moment/moment.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.umd.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/easy-navigate-toc/public/js/toctoc.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/select-nice/select-nice.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/popper/popper.min.js"></script>
    <script
        src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrapdatepicker/bootstrap-datepicker.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/preload.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/lazysizes.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/sweetalert/sweetalert.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/main.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/modal-charge.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account_info.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="/assets/frontend/{{theme('')->theme_key}}/js/slick.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/moment.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/i18n/vi.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/bootstrap-datetimepicker.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/slider_home.js?v={{time()}}"></script>

    @if(setting('sys_google_tag_manager_head') != '')

        @foreach(explode('|',setting('sys_google_tag_manager_head')) as $tag => $sys)
            @if($tag == 0)
            <!-- Google Tag Manager -->
                <script>(function (w, d, s, l, i) {
                        w[l] = w[l] || [];
                        w[l].push({
                            'gtm.start':
                                new Date().getTime(), event: 'gtm.js'
                        });
                        var f = d.getElementsByTagName(s)[0],
                            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                        j.async = true;
                        j.src =
                            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                        f.parentNode.insertBefore(j, f);
                    })(window, document, 'script', 'dataLayer', '{{ $sys }}');</script>
                <!-- End Google Tag Manager -->
            @elseif($tag == 1)
            <!-- Hubjs Tag Manager -->
                <script type="text/javascript">
                    var _mtm = window._mtm = window._mtm || [];
                    _mtm.push({'mtm.startTime': (new Date().getTime()), 'event': 'mtm.Start'});
                    var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
                    g.type = 'text/javascript';
                    g.async = true;
                    g.src = 'https://analytics.hub-js.com/js/container_{{ $sys }}.js';
                    s.parentNode.insertBefore(g, s);
                </script>
                <!-- End Hubjs Tag Manager -->
            @endif
        @endforeach

    @endif
</head>

<body class="c-layout-header-fixed">
@if(setting('sys_google_tag_manager_body') != '')
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id={{setting('sys_google_tag_manager_body') }}"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif
<!--header section work start-->
@include('frontend.layouts.includes.header')


<!--Login Start-->
<!-- đăng kí -->
<!-- đăng nhập -->
@if(Request::is('login'))
    @if(!\App\Library\AuthCustom::check())
        <script>
            $(document).ready(function () {
                $('#modal-login').modal('show');
                setTimeout(() => {
                    $('#loginModal #modal-login-container').removeClass('right-panel-active');
                }, 200);

            });
        </script>
    @endif

@endif
@if (!\App\Library\AuthCustom::check())
    @include('frontend.widget.modal.__login')
@endif
@include('frontend.widget.modal.__regist')
<div id="modalinfo" tabindex="-1" role="dialog" class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="panel panel-primary">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">x</button><span></span></div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Đóng</button>
            </div>
        </div>
    </div>
</div>
<div id="remoteModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-md">
        <div class="modal-content panel panel-primary"></div>
    </div>
</div>
{{--@include('frontend.widget.modal.__recharge_modal')--}}

@if(Request::is('/') || Request::is('login'))
    @include('frontend.widget.__slider__banner')
@endif
<div id="main_home">
    <div class="container">
        @yield('content')
    </div>
</div>
@include('frontend.layouts.includes.footer')
@include('frontend.widget.__theme')


{{--<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>--}}
{{--        <div class="modal-content">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
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
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v13.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

@endif


<button type="button" class="btn btn-danger btn-floating btn-lg ripple-surface" id="btn-back-to-top"
        style="display: none; min-width: 45px;min-height: 45px;border-radius: 100%;z-index: 999">
    <i class="fas fa-arrow-up"></i>
</button>
<button type="button" class="btn btn-danger btn-floating btn-lg ripple-surface" id="btn-back-to-top" style="display: none; min-width: 45px;min-height: 45px;border-radius: 100%;z-index: 999">
    <i class="fas fa-arrow-up"></i>
</button>
@yield('scripts')


<div id="copy"></div>
<script>
    $('body').on('click','i.fa-copy',function(e){
        data = $(this).data('id');
        let temp = $("<input>");
        $("body #copy").html(temp);
        temp.val($.trim(data)).select();
        document.execCommand("copy");
        temp.remove();
        toastr.success('Sao chép thành công!');
    });
</script>
</body>
</html>
