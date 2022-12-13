
<!DOCTYPE html>
<html lang="vi">
<head>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport"/>

    @yield('seo_head')
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    @yield('meta_robots')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="path" content="" />
    <meta name="jwt" content="" />

    @if(setting('sys_google_search_console') != '')
        <meta name="google-site-verification" content="{{setting('sys_google_search_console')}}" />
    @endif
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/bootstrap.min.css" rel="stylesheet">
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>--}}
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/style.css?v={{time()}}" rel="stylesheet">
    <link href="/assets/frontend/{{theme('')->theme_key}}/css/style_custom.css?v={{time()}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/js/slick.js?v={{time()}}"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/slick.css?v={{time()}}"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/slick-theme.css?v={{time()}}"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/account.css?v={{time()}}"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/sw2.css?v={{time()}}"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/bootstrap-datetimepicker.css?v={{time()}}"/>
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/toastr/toastr.css?v={{time()}}">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/easy-navigate-toc/public/css/toctoc.css?v={{time()}}">

    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/style_nam.css?v={{time()}}"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/css/modal-custom.css?v={{time()}}"/>
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_trong.css?v={{time()}}">

    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/select-nice/select-nice.css">

    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/table_of_contents.css">

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/sw2.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/popper/popper.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/moment.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/fancybox.umd.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/fancybox/jquery.fancybox.min.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/easy-navigate-toc/public/js/toctoc.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/modal-charge.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/select-nice/select-nice.js"></script>

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
<!-- Modal nạp tiền -->
<div class="modal fade show" id="rechargeModal" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered animated">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Nạp tiền</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 24px">
                    <span aria-hidden="true">&times;</span>
                </button>
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

<script type="text/javascript" src="/assets/frontend/{{theme('')->theme_key}}/js/script.js?v={{time()}}"></script>
<script  type="text/javascript" src="/assets/frontend/{{theme('')->theme_key}}/js/account_info.js?v={{time()}}"></script>


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
    $('.xt').click(function () {
        $('.content_bvct').css('height', 'unset');
        $('.xt').hide();
    });




    $('.expand-button').on('click', function() {

        $('.special-text').toggleClass('-expanded');

        if ($('.special-text').hasClass('-expanded')) {
            $('.expand-button').html('Thu gọn nội dung');
        } else {
            $('.expand-button').html('Xem thêm nội dung');
        }
    });
</script>

@yield('scripts')
</body>
</html>
