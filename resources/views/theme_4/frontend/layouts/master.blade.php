
<!DOCTYPE html>
<html lang="vi">
<head>

    <meta charset="utf-8"/>
{{--    <title>Nạp All Game Giá Rẻ, Uy Tín Số 1 Việt Nam</title>--}}
{{--    <meta name="description" content="Website nạp all game ( liên minh, liên quân, free fire, pubg mobile, tốc chiến, .... ) giá rẻ, uy tín số 1 Việt Nam với 50.000 lượt nạp thành công mỗi ngày. Napgamegiare.net - Địa chỉ nạp game tin cậy của game thủ Việt">--}}
{{--    <meta name="keywords" content="">--}}
{{--    <link rel="shortcut icon" href="/assets/frontend/{{theme('')->theme_key}}/image/nHOb2jr8HK_1626233668.jpg" type="image/x-icon">--}}
{{--    <link rel="canonical" href="https://napgamegiare.net">--}}
{{--    <meta name="robots" content="index,follow" />--}}
{{--    <meta name="author" content="napgamegiare.net"/>--}}
{{--    <meta content="" name="author"/>--}}
{{--    <meta property="og:type" content="website"/>--}}
{{--    <meta property="og:url" content="https://napgamegiare.net"/>--}}
{{--    <meta property="og:title" content="Nạp All Game Giá Rẻ, Uy Tín Số 1 Việt Nam"/>--}}
{{--    <meta property="og:description" content="Website nạp all game ( liên minh, liên quân, free fire, pubg mobile, tốc chiến, .... ) giá rẻ, uy tín số 1 Việt Nam với 50.000 lượt nạp thành công mỗi ngày. Napgamegiare.net - Địa chỉ nạp game tin cậy của game thủ Việt"/>--}}
{{--    <meta property="og:image" content="https://napgamegiare.netassets/frontend/images/image-share.jpg"/>--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport"/>--}}
{{--    <meta http-equiv="Content-type" content="text/html; charset=utf-8">--}}
    @yield('seo_head')
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    @yield('meta_robots')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="path" content="" />
    <meta name="jwt" content="jwt" />
    @if(setting('sys_google_search_console') != '')
        <meta name="google-site-verification" content="{{setting('sys_google_search_console')}}" />
    @endif
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/bootstrap.min.css" rel="stylesheet">
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/style.css?v=10122021" rel="stylesheet">
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/style_custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/js/slick.js"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/account.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/sw2.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/bootstrap-datetimepicker.css"/>
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.css">

    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/style_nam.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/modal-custom.css"/>
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.css">

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/sw2.js"></script>

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/moment.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.umd.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.js"></script>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <style>
        #txtPrice {

            width: 100%;
            background: rgb(238, 70, 35) !important;
            font-size: 13px;
            color: #ffffff;
            text-align: center;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            -ms-border-radius: 8px;
            -o-border-radius: 8px;
            border-radius: 8px;
            border: 2px solid rgb(238, 70, 35) !important;
            padding: 11px 0;
            margin-top: 10px;
        }

        .btn-auth {
            width: 100%;
            background: #28a745;
            font-size: 13px;
            color: #ffffff;
            text-align: center;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            -ms-border-radius: 8px;
            -o-border-radius: 8px;
            border-radius: 8px;
            border: 2px solid #28a745;
            padding: 11px 0;
            margin-top: 10px;
        }

        .btn-auth:hover {
            color: #ffffff;
        }

    </style>

    @if(setting('sys_google_tag_manager_head') != '')
    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','{{setting('sys_google_tag_manager_head') }}');</script>
        <!-- End Google Tag Manager -->
    @endif
</head>
<body>
@if(setting('sys_google_tag_manager_body') != '')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{setting('sys_google_tag_manager_body') }}"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif

<!-- End Google Tag Manager (noscript) -->
<div class="search-input_out">
    <div class="search-input_out_nav">
        <div class=" search-input_in">
            <i class="fas fa-arrow-left  icon-close"></i>

            <div class="search-input">
                <input class="input-search" id="txtSearchMobile" placeholder="Tìm kiếm" autocomplete="off" type="text">

            </div>
            <button class="icon-delete"><i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="search-input_in_content ">
        <div class="" id="result-search-mobile">

        </div>

        <div class="search-input_in_content-detail-load-more" style="display: none">
            <p>Xem thêm  <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/xuocdoi_xuong.svg" alt=""></span></p>
        </div>
    </div>
</div>


@include('frontend.layouts.includes.header')

@yield('content')

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

@include('frontend.layouts.includes.footer')
@if(Session::has('check_login'))
    <script>
        $(document).ready(function () {
            $('#modal-login').modal('show');
            setTimeout(() => {
                $('#loginModal #modal-login-container').removeClass('right-panel-active');
            }, 200);

        });
    </script>
    @php
        Session::pull('check_login');
    @endphp
@endif
@if (!\App\Library\AuthCustom::check())
    @include('frontend.widget.modal.__login')
@endif
<style>
    .footer {
        border-top: 1px solid #eeeeee;
        padding: 14px 0;
        background: #fff;
        text-align: center;
    }
</style>

<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<div id="m_scroll_top" class="m-scroll-top">
    <i class="fas fa-arrow-up"></i>
</div>


<style>
    .m-scroll-top.show {
        display: block;
    }
    .m-scroll-top {
        width: 40px;
        height: 40px;
        position: fixed;
        bottom: 120px;
        right: 20px;
        cursor: pointer;
        text-align: center;
        vertical-align: middle;
        display: none;
        padding-top: 9px;
        z-index: 110;
        border-radius: 100%;
        background-color: #fff;
        box-shadow: 0 2px 6px 0 rgb(0 0 0 / 20%), 0 1px 1px 0 rgb(0 0 0 / 20%);
    }
</style>



<!-- Modal -->
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
<script type="text/javascript" src="/assets/frontend/{{theme('')->theme_key}}/js/slick.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.min.js"></script>

<script type="text/javascript" src="/assets/frontend/{{theme('')->theme_key}}/js/script.js"></script>
<script  type="text/javascript" src="/assets/frontend/{{theme('')->theme_key}}/js/account_info.js"></script>

<script>

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#btn-expand-content').on('click', function(e) {

            $('.special-text').toggleClass('-expanded');

            if ($('.special-text').hasClass('-expanded')) {
                $(this).html('Thu gọn nội dung');
            } else {
                $(this).html('Xem thêm nội dung');
            }
        });
    });

</script>

</body>
</html>
