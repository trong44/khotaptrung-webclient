
@if(theme('')->theme_config->sys_theme_ver == 'sys_theme_ver3.0')

{{--    @if(Request::is('/'))--}}
{{--        <script>--}}
{{--            $(document).on('scroll',function(){--}}
{{--                if ($(this).scrollTop() > 180) {--}}
{{--                    $('#menu-service').addClass("menu-fix");--}}
{{--                } else {--}}
{{--                    $('#menu-service').removeClass("menu-fix");--}}
{{--                }--}}
{{--            });--}}
{{--        </script>--}}
{{--    @else--}}
{{--        <script>--}}
{{--            $(document).ready(function () {--}}
{{--                $('#menu-service .menu-category').css("height","48px");--}}

{{--                $('#menu-service .menu-category').css("top","120px");--}}
{{--            });--}}
{{--            $(document).on('scroll',function(){--}}
{{--                if ($(this).scrollTop() > 10) {--}}
{{--                    $('#menu-service .menu-category').css("position","fixed");--}}
{{--                    $('#menu-service .menu-category').css("top","80px");--}}

{{--                } else {--}}
{{--                    $('#menu-service .menu-category').css("position","inherit");--}}
{{--                    $('#menu-service .menu-category').css("top","120px");                }--}}
{{--            });--}}
{{--        </script>--}}
{{--    @endif--}}
@else
    @include('frontend.widget.__menu__side')

    <script>
        $(document).on('scroll',function(){
            if ($(this).scrollTop() > 180) {
                $('.go-top').fadeIn();
            } else {
                $('.go-top').fadeOut();
            }

        });
        $('.go-top').click(function(){
            $('html, body').animate({scrollTop : 0},800);
        });
    </script>
@endif

@if(Request::is('login'))
    @if(!\App\Library\AuthCustom::check())
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
                    $('.mobile-auth').toggleClass('mobile-auth-show');
                }
            }, 0);
        });
    </script>

@endif
@endif


@if (!\App\Library\AuthCustom::check())
    @include('frontend.widget.modal.__login')
@endif
{{--@if(!Request::is('/'))--}}
{{--    @if(Session::has('url_return.id_return'))--}}
{{--        @php--}}
{{--            Session::forget('url_return.id_return');--}}
{{--        @endphp--}}
{{--    @endif--}}
{{--@endif--}}
