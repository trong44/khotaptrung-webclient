
@if(setting('sys_theme_background_image'))
    <style>
        .main-lay-out{
            background:{{setting('sys_theme_background_color')}} url({{setting('sys_theme_background_image')}});
            background-attachment: fixed;
            background-size: 100%;
            padding-bottom: 40px;
        }
    </style>

@else
    <style>
        .main-lay-out{
            background:#000 url(/assets/frontend/{{theme('')->theme_key}}/images/background_image.png);
            background-attachment: fixed;
            background-size: 100%;
            padding-bottom: 40px;
        }
    </style>
@endif
{{--nạp thẻ trang chủ--}}
{{--@if(isset(theme('')->theme_config->sys_charge_home))--}}
{{--    @if(theme('')->theme_config->sys_charge_home == 'sys_charge_home_ver1')--}}
{{--        <style>--}}
{{--            .content-banner-card {--}}
{{--                flex-basis: 29%;--}}
{{--            }--}}
{{--            .content-banner-slide {--}}
{{--                flex-basis: 69%;--}}
{{--            }--}}
{{--        </style>--}}
{{--    @else--}}
{{--        <style>--}}
{{--            .content-banner-card {--}}
{{--                flex-basis: 0%;--}}
{{--            }--}}
{{--            .content-banner-slide {--}}
{{--                flex-basis: 100%;--}}
{{--            }--}}
{{--        </style>--}}
{{--    @endif--}}
{{--@else--}}
{{--    <style>--}}
{{--        .content-banner-card {--}}
{{--            flex-basis: 29%;--}}
{{--        }--}}
{{--        .content-banner-slide {--}}
{{--            flex-basis: 69%;--}}
{{--        }--}}
{{--    </style>--}}
{{--@endif--}}

{{--màu nền --}}
{{--@if(setting('sys_theme_color_primary'))--}}
{{--    <style>--}}
{{--        header .nav-bar{--}}
{{--            background-color: {{setting('sys_theme_color_primary')}};--}}
{{--            box-shadow: none;--}}
{{--        }--}}
{{--        .content-banner {--}}
{{--            background-color: {{setting('sys_theme_color_primary')}};--}}

{{--        }--}}
{{--        .content-items .container{--}}
{{--            background-color: {{setting('sys_theme_color_primary')}};--}}
{{--        }--}}
{{--        .content-advertise .container{--}}
{{--            background-color: {{setting('sys_theme_color_primary')}};--}}
{{--        }--}}
{{--        .content-video .container {--}}
{{--            background-color: {{setting('sys_theme_color_primary')}};--}}

{{--        }--}}
{{--        .nav-log-in a:hover, .nav-regist a:hover {--}}
{{--            background-color: {{setting('sys_theme_color_primary')}};--}}
{{--            opacity: .8;--}}
{{--        }--}}
{{--        .content-video .container {--}}
{{--            border: 1px solid #cccccc;--}}
{{--        }--}}
{{--    </style>--}}
{{--    <script>--}}
{{--        $( document ).ready(function() {--}}

{{--            $(document).on('scroll',function(){--}}
{{--                if($(window).width() > 1024){--}}
{{--                    if ($(this).scrollTop() > 100) {--}}
{{--                        $(".nav-bar-container").css("height","90px");--}}
{{--                        $(".nav-bar-category .nav li a").css("line-height","90px");--}}
{{--                        $("header .nav-bar").css("background-color","{{setting('sys_theme_color_primary')}}");--}}
{{--                        $("header .nav-bar").css("box-shadow","0 6px 12px rgb(0 0 0 / 18%)");--}}
{{--                        $(".nav-bar-brand").css("margin","14px");--}}


{{--                    } else {--}}
{{--                        $(".nav-bar-container").css("height","120px");--}}
{{--                        $(".nav-bar-category .nav li a").css("line-height","120px");--}}
{{--                        $(".nav-bar-brand").css("margin","20px 0");--}}
{{--                        $("header .nav-bar").css("background-color","{{setting('sys_theme_color_primary')}}");--}}
{{--                        $("header .nav-bar").css("box-shadow","none");--}}

{{--                    }--}}
{{--                }--}}

{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@else--}}
{{--    <style>--}}
{{--        header .nav-bar{--}}
{{--            background-color: rgba(0,0,0,0.8) ;--}}
{{--            box-shadow: inset 0px -1px 0px #363636;--}}
{{--        }--}}
{{--        .content-banner {--}}
{{--            background-color: rgba(0,0,0,0.8);--}}

{{--        }--}}
{{--        .content-items .container{--}}
{{--            background-color: rgba(0,0,0,0.8);--}}
{{--        }--}}
{{--        .content-advertise .container{--}}
{{--            background-color: rgba(0,0,0,0.8);--}}
{{--        }--}}
{{--        .content-video .container {--}}
{{--            background-color: rgba(0,0,0,0.8);--}}

{{--        }--}}
{{--        .nav-log-in a:hover, .nav-regist a:hover {--}}
{{--            background-color: #2f353b;--}}
{{--        }--}}
{{--    </style>--}}

{{--    <script>--}}
{{--        $( document ).ready(function() {--}}

{{--            $(document).on('scroll',function(){--}}
{{--                if($(window).width() > 1024){--}}
{{--                    if ($(this).scrollTop() > 100) {--}}
{{--                        $(".nav-bar-container").css("height","90px");--}}
{{--                        $(".nav-bar-category .nav li a").css("line-height","90px");--}}
{{--                        $("header .nav-bar").css("background-color","rgba(0,0,0,0.5)");--}}
{{--                        $(".nav-bar-brand").css("margin","14px");--}}


{{--                    } else {--}}
{{--                        $(".nav-bar-container").css("height","120px");--}}
{{--                        $(".nav-bar-category .nav li a").css("line-height","120px");--}}
{{--                        $(".nav-bar-brand").css("margin","20px 0");--}}
{{--                        $("header .nav-bar").css("background-color","rgba(0,0,0,0.8)");--}}
{{--                    }--}}
{{--                }--}}

{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endif--}}
{{--@if(setting('sys_theme_color_text'))--}}
{{--    <style>--}}
{{--        .nav-bar-category .nav li a{--}}
{{--            color: {{setting('sys_theme_color_text')}}--}}
{{--        }--}}
{{--        .content-items .items-title h2 {--}}

{{--            color: {{setting('sys_theme_color_text')}};--}}
{{--        }--}}
{{--        .game-list-description p {--}}
{{--                color: {{setting('sys_theme_color_text')}};--}}
{{--        }--}}
{{--        .nav-bar-category .nav li ul li a {--}}
{{--            color: white;--}}
{{--        }--}}
{{--        .oldPrice {--}}
{{--            color:  {{setting('sys_theme_color_text')}};--}}

{{--        }--}}
{{--        .content-advertise .container marquee p{--}}
{{--            color: {{setting('sys_theme_color_text')}};--}}
{{--        }--}}
{{--        .content-advertise .container{--}}
{{--            border: 1px solid {{setting('sys_theme_color_text')}};--}}
{{--        }--}}
{{--    </style>--}}
{{--@else--}}
{{--    <style>--}}
{{--        .nav-bar-category .nav li a{--}}
{{--            color: white;--}}
{{--        }--}}
{{--        .content-items .items-title h2 {--}}

{{--            color: #fff;--}}
{{--        }--}}
{{--        .game-list-description p {--}}
{{--            color: white;--}}
{{--        }--}}

{{--    </style>--}}
{{--@endif--}}
