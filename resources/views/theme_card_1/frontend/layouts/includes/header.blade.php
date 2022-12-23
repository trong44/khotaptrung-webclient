<header>
    <div class="nav-top">
        <div class="container">
            <div class="logo">
                <a href="/" title="Mua thẻ cao online">
                    <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" alt="">
                </a>
            </div>
            <nav id="navmenutop">
                <a class="shownewx">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/ic_openmenu.svg" alt="Menu" />
                </a>
                <ul class="menu showmore">
                    <span class="close_nav"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/close_nav.svg" alt="close"></span>
                    @include('frontend.widget.__menu_category_desktop')


                    <li class="m1 box-loading ">
                        <div class="btn-loading" >
                            <div class="loading">
                                <div class="loading-child"></div>
                            </div>
                        </div>
                    </li>
                    <li class="m1 wp_login box-logined" >
{{--                        <div class="login">--}}
{{--                            <span class="btn_login" data-toggle="modal" data-target="#signin"><i class="icon_account ic_login"><img src="/assets/frontend/images/new_index/icon_login.svg" alt="login"></i>Đăng nhập</span>--}}
{{--                            <span style="border: 1px solid #FFFFFF;transform: rotate(104.43deg);background:#ffffff;width:20px;display:inline-block; vertical-align:middle;"></span>--}}
{{--                            <span class="btn_register" onclick="window.location.href = 'https://thegarenagiare.com/register';"><i class="icon_account ic_register"><img src="/assets/frontend/images/new_index/icon_register.svg" alt="register"></i>Đăng ký</span>--}}
{{--                        </div>--}}
                    </li>
                    <li class="m1 after_login box-account">
                        <div  id="manageAcount">
                        </div>
                        @include('frontend.widget.__menu_profile_header')
                    </li>
                    <form id="logout-form" action="{{ url('/ajax/logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </nav>
            <div class="bg_gra"></div>
        </div>
    </div>
    <!--second nav work end-->
</header>
