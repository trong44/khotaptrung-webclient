 <!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @yield('seo_head')

    @yield('meta_robots')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="path" content="" />
    <meta name="jwt" content="" />
    @if(setting('sys_google_search_console') != '')
        <meta name="google-site-verification" content="{{setting('sys_google_search_console')}}" />
    @endif

{{--    <title>Kho lưu trữ</title>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/sweetalert2/sw2.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap/bootstrap.min.css">
    <!--    swiper-->
    <link rel="shortcut icon" href="/assets/frontend/{{theme('')->theme_key}}/images/icon_logo.png">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/animate/animate.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/buyacc.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/OwlCarousel2/owl.carousel.min.css">
    <!--    bootstrap-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap/bootstrap.min.css">
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!--    gallery-->
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/steps/jquery-steps.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/select-nice/select-nice.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/easy-navigate-toc/public/css/toctoc.css">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrapdatepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fixed-sticky/fixedsticky.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap-popover/bootstrap-popover-x.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/date-picker/tui-date-picker.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/news.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/account.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/spin.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/steps/jquery-steps.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_trong.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/main.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/table_of_contents.css">

    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/@if(isset(theme('')->theme_config->sys_config_menu)){{theme('')->theme_config->sys_config_menu ? theme('')->theme_config->sys_config_menu : ''}}@endif/theme.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/@if(isset(theme('')->theme_config->sys_config_banner)){{theme('')->theme_config->sys_config_banner ? theme('')->theme_config->sys_config_banner : ''}}@endif/theme.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/@if(isset(theme('')->theme_config->sys_config_menu_news)){{theme('')->theme_config->sys_config_menu_news ? theme('')->theme_config->sys_config_menu_news : ''}}@endif/theme.css">

{{--    <link rel="stylesheet" href="/css/{{theme('')->theme_key}}/main.css?v={{time()}}">--}}

    @stack('style')


{{--    <link rel="stylesheet" href="/js/{{theme('')->theme_key}}/main.js?v={{time()}}">--}}


    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/jquery.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/moment/moment.min.js"></script>

    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrap-popover/bootstrap-popover.js"></script>

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/bootstrapdatepicker/bootstrap-datepicker.min.js"></script>

    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/rateit/jquery.barrating.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/rateit/examples.js"></script>

    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/steps/jquery-steps.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/lazyload2/jquery.lazy.min.js"></script>
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/lazy/jquery.lazy.plugins.min.js"></script>--}}

    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/select-nice/select-nice.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/easeJquery/easing.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/sweetalert.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account_info.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/auto-link.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/sweetalert2/sw2.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/popper/popper.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/popper/tippy-bundle.umd.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/easy-navigate-toc/public/js/toctoc.js"></script>

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/modal-charge.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/transfer/transfer.js?v={{time()}}"></script>
{{--    <script src="/js/{{theme('')->theme_key}}/main_top.js?v={{time()}}"></script>--}}

    <script>
        $(document).ready(function () {
            @if(Request::is('thong-tin'))

            $('.account_thong-tin').addClass('menu_active')
            @elseif(Request::is('lich-su-giao-dich'))

            $('.account_lich-su-giao-dich').addClass('menu_active')

            @elseif(Request::is('minigame-log-726'))

            $('.account_minigame-log-726').addClass('menu_active')

            @elseif(Request::is('dich-vu-da-mua'))

            $('.account_dich-vu-da-mua').addClass('menu_active')

            @elseif(Request::is('nap-the'))

            $('.account_nap-the').addClass('menu_active')

            @elseif(Request::is('lich-su-nap-the'))

            $('.account_lich-su-nap-the').addClass('menu_active')

            @elseif(Request::is('transfer'))

            $('.account_recharge-atm').addClass('menu_active')

            @elseif(Request::is('lich-su-mua-account'))

            $('.account_lich-su-mua-account').addClass('menu_active')

            @elseif(Request::is('withdrawitem-1'))
            $('.account_withdrawitem-1').addClass('menu_active')

            @endif
        })
    </script>


    @stack('js')

        @if(Request::is('/'))
        <style>
            .content{
                padding-top: 140px;
            }
            @media only screen and (max-width: 1024px) {
                .content {
                    padding-top: 80px;
                }
            }
        </style>
    @else
        <style>
            .content{
                padding-top: 120px;
            }
            @media only screen and (max-width: 1024px) {
                .content {
                    padding-top: 100px;
                }
            }
        </style>
        @endif
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


<!-- Hubjs Tag Manager -->

{{--    @if(setting('sys_tag_hubjs') != '')--}}
{{--        {!! setting('sys_tag_hubjs') !!}--}}
{{--    @endif--}}

    <!-- End Hubjs Tag Manager -->


</head>
<body>
@include('frontend.widget.__theme')

@if(setting('sys_google_tag_manager_body') != '')
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{setting('sys_google_tag_manager_body') }}"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
@endif
<div class="{{ Request::is('/')?'main-lay-out':'' }}">
    @include('frontend.layouts.includes.header')
    <div class="content" style="">
        @yield('content')
    </div>
</div>



<!-- Modal nạp tiền -->
<div class="modal fade show" id="rechargeModal" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered animated">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Nạp tiền</div>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-toggle="tab" href="#tab-modal-recharge" role="tab"
                       aria-selected="true">Nạp thẻ</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-toggle="tab" href="#tab-modal-atm" role="tab"
                       aria-selected="false">ATM</a>
                </li>
                {{--<li class="nav-item" role="presentation">
                    <a class="nav-link" data-toggle="tab" href="#tab-modal-wallet" role="tab"
                       aria-selected="false">Ví điện tử</a>
                </li>--}}
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="tab-modal-recharge" role="tabpanel">
                    <form action="{{route('postTelecomDepositAuto')}}" id="modal-form-charge">
                        @csrf
                        <div class="modal-body">
                            <div class="t-sub-2 mb-2">Nhà cung cấp</div>
                            <select name="type" class="form-control mb-fix-12" id="modal-telecom">
                                <!-- JS PASTE CODE HERE -->
                            </select>

                            <div class="t-sub-2 mb-2 mt-2">Chọn mệnh giá</div>
                            <div class="list-card-deno" id="modal-amounts">
                                <!-- JS PASTE CODE HERE -->
                            </div>

                            <div class="t-sub-2 mb-2">Mã số thẻ</div>
                            <input autocomplete="off" class="form-control input-form w-100 mb-fix-12" name="pin" type="text" placeholder="Nhập mã số thẻ" required="">

                            <div class="t-sub-2 mb-2 mt-2">Số seri</div>
                            <input autocomplete="off" class="form-control input-form w-100 mb-fix-12" name="serial" type="text" placeholder="Nhập số seri thẻ" required="">

                            <div class="default-form-group mt-2">
                                <label class="text-form fw-600" style="font-weight: 600">Mã bảo vệ</label>
                                <div class="row p-0">
                                    <div class="col-md-12 d-flex ">
                                        <input class="form-control input-form w-100" name="captcha" type="text" placeholder="Nhập mã bảo vệ" required>
                                        <div class="captcha captcha_1">
                                            <span class="reload">
                                                {!! captcha_img('flat') !!}
                                            </span>
                                        </div>
                                        <button class="refresh-captcha" id="modal-reload-captcha" type="button">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/captcha_refresh.png" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-invalid message-form mt-2"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-big submit-modal-form-charge" style="background: #32c5d2;border: 1px solid #32c5d2;">Nạp tiền</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="tab-modal-atm" role="tabpanel">
                    <div class="modal-body">
                        <form action="">
                            <div class="box-charge-card">
                                {{--                                            <div class="atm-card-title mb-fix-20">--}}
                                {{--                                                <span>Để hoàn tất đơn nạp, bạn vui lòng chuyển khoản theo cú pháp sau:</span>--}}
                                {{--                                            </div>--}}
                                <div class="dialog--content mb-fix-20">
                                    <div class="card--gray">
                                        @if (setting('sys_tranfer_content') != "")
                                            {!! setting('sys_tranfer_content') !!}
                                        @endif
                                        <div class="card--attr transfer-title justify-content-center">
                                            {{--                                            <div class="card--attr__name">--}}
                                            {{--                                                Nội dung chuyển tiền--}}
                                            {{--                                            </div>--}}
                                            <div class="card--attr__value d-flex">
                                                <div class="card__info transfer-code" id=""></div>

                                                <div class="icon--coppy js-copy-text" aria-describedby="tippy-7" >
                                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/copy-black.png" alt="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{--<div class="tab-pane fade" id="tab-modal-wallet" role="tabpanel">

                </div>--}}
            </div>
        </div>
    </div>
</div>

<div class="go-top">
    <i class="fas fa-arrow-alt-circle-up"></i>
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
        $( document ).ready(function() {

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
        });
    </script>
@endif




@include('frontend.layouts.includes.footer')
@if(!Request::is('/'))
    @if(Session::has('url_return.id_return'))
        @php
            Session::forget('url_return.id_return');
        @endphp
    @endif
@endif
@include('frontend.widget.modal.__login')


<script>
    //Show login modal and mobile login
    function openLoginModal(){
        setTimeout(function(){
            $('#modal-login').modal('show');

        }, 0);
    }

    function openRegisterModal(){
        setTimeout(function(){
            $('#loginRegist').modal('show');

        }, 0);
    }

</script>

<script>
    @if(\App\Library\AuthCustom::check())
    $( document ).ready(function() {
    $(document).on('scroll',function(){
        if($(window).width() > 1024){
            if ($(this).scrollTop() > 100) {
                $("#logout").css("display","none");

            } else {
                $("#logout").css("display","inline");
            }
        }

    });
    });
    @endif


</script>


<script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.umd.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.js"></script>

<script src="/assets/frontend/{{theme('')->theme_key}}/lib/OwlCarousel2/OwlCarousel2.min.js"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/lib/slick/slick.min.js"></script>

<script src="/assets/frontend/{{theme('')->theme_key}}/js/action.js?v={{time()}}"></script>
{{--<script src="/assets/frontend/{{theme('')->theme_key}}/js/@if(isset(theme('')->theme_config->sys_config_menu)){{theme('')->theme_config->sys_config_menu ? theme('')->theme_config->sys_config_menu : ''}}@endif/theme.js"></script>--}}

<script src="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.js"></script>

<script src="/assets/frontend/{{theme('')->theme_key}}/js/swiper.js?v={{time()}}"></script>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/jquery.cookie.min.js"></script>

{{--<script src="/js/{{theme('')->theme_key}}/main_bot.js?v={{time()}}"></script>--}}

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




{{--@yield('scripts')--}}
</body>


</html>
