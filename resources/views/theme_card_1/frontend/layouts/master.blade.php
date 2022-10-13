
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
    <title>Mua Thẻ Garena Online Giá Rẻ | Đổi Thẻ Garena Từ Thẻ Điện Thoại</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @stack('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrapdatepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/tui-date-picker.css">

    <!-- <link media="screen" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css" /> -->
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/responsive.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/blog.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_nam.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/storecard.css?v={{time()}}">
{{--    js--}}
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/jquery.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/moment/moment.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrapdatepicker/bootstrap-datepicker.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/bootstrap-datetimepicker.min.js"></script>

</head>

<body class="c-layout-header-fixed">
<!--header section work start-->
@include('frontend.layouts.includes.header')

<!--Login Start-->
<!-- đăng kí -->
<!-- đăng nhập -->
@include('frontend.widget.modal.__login')
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

@if(\Illuminate\Support\Facades\Request::is('/'))
    @include('frontend.widget.__slider__banner')


@endif
<div id="main_home">
    <div class="container">
        @yield('content')
        <script>

        </script>

    </div>
</div>
@include('frontend.layouts.includes.footer')

<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
        <div class="modal-content">
        </div>
    </div>
</div>


<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<script src="/assets/frontend/{{theme('')->theme_key}}/lib/lazysizes.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/sweetalert/sweetalert.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/main.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/account_info.js"></script>

<button type="button" class="btn btn-danger btn-floating btn-lg ripple-surface" id="btn-back-to-top" style="display: none; min-width: 45px;z-index: 999">
    <i class="fas fa-arrow-up"></i>
</button>


</body>
</html>
