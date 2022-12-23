<div class="nav-overlay"></div>
<div class="header ">
    <div class="search-active" >
        <div class="search-input_out">
            <div class="search-input_out_nav">
                <div class=" search-input_in">
                    <span class="hide" id='messageMobile'></span>
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/search-back.svg" class="icon-search-close" alt="">
                    <form action="/idol-list" class="formSearchHeader">
                        <div class='search-input'>
                            <input class='input-search' id="searchFormMobile" name="q" placeholder='Tìm kiếm' type='text'  autocomplete="off">
                        </div>
                        <button class="icon-search">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/search-normal.svg"  alt="">
                        </button>

                    </form>
                </div>
            </div>
            <div class="search-input_in_content ">
                <div class="" id="result-search-mobile">
                    <div class="search-item">
                        <a href="" class="d-flex justify-content-between">
                            <div class="search-name">Vòng quay bãi biển</div>
                            <div class="search-show-more">Chi tiết   <img src="/assets/frontend/{{theme('')->theme_key}}/image/search-right.svg" alt=""></div>
                        </a>

                    </div>
                    <div class="search-item">
                        <a href="" class="d-flex justify-content-between">
                            <div class="search-name">Vòng quay bãi biển</div>
                            <div class="search-show-more">Chi tiết   <img src="/assets/frontend/{{theme('')->theme_key}}/image/search-right.svg" alt=""></div>
                        </a>

                    </div>
                    <div class="search-item">
                        <a href="" class="d-flex justify-content-between">
                            <div class="search-name">Vòng quay bãi biển</div>
                            <div class="search-show-more">Chi tiết   <img src="/assets/frontend/{{theme('')->theme_key}}/image/search-right.svg" alt=""></div>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="top-navigation d-none d-lg-block">
        <div class="header-container container" style="padding: 0">
            <ul>
                <li>
                    <a href="/tin-tuc">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/headertintuc.svg" alt="">
                        <span>
                                Tin tức
                        </span>
                    </a>
                </li>

                <li>
                    <a href="{{setting('sys_fanpage')}}">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/headerfacebook.svg" alt="">
                        <span>
                                Facebook fanpage
                        </span>
                    </a>
                </li>
                <li>
                    <a href="tel:+{{setting('sys_phone')}}">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/headercskh.svg" alt="">
                        <span>
                                CSKH: {{setting('sys_phone')}}
                        </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>


</div>
<header id="heading">
    <nav class="heading">
        <div class="header-container  container">
            <div class="open-hamburger-sidebar">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/hamburger.svg" alt="">
            </div>
            <div class="close-hamburger-sidebar">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/hamburger.svg" alt="">
            </div>
            <div class="box-logo ">
                <a href="/">
                    <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" alt="" class="d-lg-block d-none">
                    <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo_mobile'))}}" alt="" class="d-lg-none ">
                </a>
            </div>
            <div class="box-search">
                <form action="">
                    <div class="group-input @if(isset(theme('')->theme_config->sys_theme_ver) && theme('')->theme_config->sys_theme_ver == 'sys_theme_ver3.0' ) search-theme @endif ">
                        <input type="text" placeholder="Tìm kiếm" class="form-control">
                        <div class="input-group-btn ">
                            <button type="submit" class="btn px-3 border-0 shadow-none outline-none text-dark">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/search.svg" alt="">
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-about">
                @if(isset(theme('')->theme_config->sys_theme_ver))
                    @if(theme('')->theme_config->sys_theme_ver != 'sys_theme_ver3.0' )
                         @include('frontend.widget.__menu_header')
                    @else
                        <ul class="nav header-main-nav d-none d-lg-flex ">
                            <li class="nav-item item-about " id="item-about-khuyenmai">
                                <a href="javascript:void(0)">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/discount-tag.svg" alt="">
                                    <div class="item-about-title">Khuyến mãi</div>
                                </a>
                            </li>
                            <li class="nav-item item-about" id="item-about-thongbao">
                                <a href="javascript:void(0)">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/notifications.svg" alt="">
                                    <div class="item-about-title">Thông báo</div>
                                </a>
                            </li>
                            <li class="nav-item item-about" id="item-about-sukienhot">
                                <a href="javascript:void(0)">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/cup.svg" alt="">
                                    <div class="item-about-title">Sự kiện hot</div>
                                </a>
                            </li>
                        </ul>
                    @endif
                @else
                    <ul class="nav header-main-nav d-none d-lg-flex ">
                        <li class="nav-item item-about ">
                            <a href="">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/discount-tag.svg" alt="">
                                <div class="item-about-title">Khuyến mãi</div>
                            </a>
                        </li>
                        <li class="nav-item item-about">
                            <a href="">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/notifications.svg" alt="">
                                <div class="item-about-title">Thông báo</div>
                            </a>
                        </li>
                        <li class="nav-item item-about">
                            <a href="">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/cup.svg" alt="">
                                <div class="item-about-title">Sự kiện hot</div>
                            </a>
                        </li>
                    </ul>
                @endif
            </div>
            <div class="navbar-spacer"></div>
            <div class="box-about-mobile">
                <div class="nav header-main-nav  d-lg-flex">
                    <div class="nav-item-mobile item-search-mobile">
                        <a href="">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/search_mobile.svg" alt="">
                        </a>

                    </div>
{{--                    <div class="nav-item-mobile item-notification-mobile">--}}
{{--                        <a href="">--}}
{{--                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/notifications_mobile.svg" alt="">--}}
{{--                        </a>--}}
{{--                        <div class="item-notification-badges">--}}
{{--                            3--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
            <div class="box-login">
                <div class="box-loading btn-loading">
                    <div class="loading">
                        <div class="loading-child"></div>
                    </div>
                </div>
                <div class="box-logined box-deposit">
                    {{--                    <a class="btn btn-submit" onclick="openLoginModal();">--}}
                    {{--                        Đăng nhập--}}
                    {{--                    </a>--}}
                </div>
                {{--                d-none d-md-block--}}
                <div class="box-account ">
                    <div class="box-account-logined">
                        <div class="account-name">
                            <div id="account-name" class="text-center"></div>
                            <div  class="account-balance"></div>
                        </div>
                        <div class="account-avatar">
                            @if(setting('sys_avatar') != '')

                                <img src="{{ setting('sys_avatar') }}" alt="sys_avatar">
                            @else
                            <img src="/assets/frontend/theme_3/image/anhdaidien.svg" alt="sys_avatar">
                            @endif
                        </div>
                        <div class="account-triangle ">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/triangle.png" alt="">
                        </div>
                        <div class="account-logined-content">
                            <!--                                <div class="arrow down"></div>-->
                            <div class=" d-flex">
                                <div class="acount-logined_img">
                                    @if(setting('sys_avatar') != '')

                                        <img src="{{ setting('sys_avatar') }}" alt="sys_avatar">
                                    @else
                                        <img src="/assets/frontend/theme_3/image/anhdaidien.svg" alt="sys_avatar">
                                    @endif
                                </div>
                                <div class="account-logined_info">
                                    <div id="account-id">

                                    </div>
                                    <div id="account-balance">

                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="account-menu-content">
                                @include('frontend.widget.__menu_profile_desktop')

                            </div>
                            <div class="w-100 log-out-button text-center">


                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="box-login">
                <div class="box-loading btn-loading">
                    <div class="loading">
                        <div class="loading-child"></div>
                    </div>
                </div>
                <div class="box-deposit-charge box-deposit">
                    <a class="btn btn-submit">
                        Nạp tiền
                    </a>
                </div>
                <div class="box-registed box-deposit">
                    <a class="btn btn-submit" onclick="openRegisterModal();">
                        Đăng ký
                    </a>
                </div>
            </div>
            {{--                mobile--}}
            <div class="box-login-mobile">
                <div class="box-loading-mobile ">
                    <div class="loading">
                        <div class="loading-child"></div>
                    </div>
                </div>
                <div class="box-account-mobile">
                    {{--                    <div class="box-account-logined " onclick="openMenuProfile()">--}}
                    {{--                        <div class="account-avatar">--}}
                    {{--                            <img src="/assets/frontend/theme_3/image/avatar.png" alt="">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>

        @if(theme('')->theme_config->sys_theme_ver == 'sys_theme_ver3.0')
            @include('frontend.widget.__head__dich__vu__noi__bat')
        @endif
        <div class="menu-profile-mobile">
            <div class="row marginauto">
                {{--Bắt đầu vòng lặp --}}
                <div class="col-md-12 left-right nav-bar-hr">
                    <section class="media-mobile">
                        <div class=" banner-mobile-container-ct">
                            <div class="row marginauto banner-mobile-row-ct">
                                <div class="col-auto left-right box-account-mobile_open" style="width: 10%" onclick="openMenuProfile()" >
                                    <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" >
                                </div>

                                <div class="col-auto left-right banner-mobile-span text-center text-login" style="width: 80%">
                                    <p>Tài khoản</p>
                                </div>
                                <div class="col-auto left-right" style="width: 10%">
                                </div>
                            </div>
                        </div>
                    </section>
                    {{--                                    Vong lap thang bố--}}
                    <div class="acount-logined_mobile d-flex m-3">
                        <div class="acount-logined_img">
                            <img src="/assets/frontend/theme_3/image/avatar.png" alt="">
                        </div>
                        <div class="account-logined_info">
                            <div id="account-id-mobile">
                            </div>
                            <div id="account-balance-mobile">
                            </div>
                        </div>
                    </div>
                    @include('frontend.widget.__menu_profile')
                </div>
            </div>
        </div>

        <div class="menu-category-mobile">
            <ul class=" ">
                {{--            <li>--}}
                {{--                <a href="/">--}}
                {{--                        <img src="./assets/frontend/{{theme('')->theme_key}}/image/svg/home-2.svg" alt="">--}}
                {{--                    <span>Trang chủ</span>--}}

                {{--                </a>--}}
                {{--            </li>--}}
                {{--            <li>--}}
                {{--                <a href="">--}}
                {{--                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/km_mobile.svg" alt="">--}}
                {{--                    <span>Khuyến mãi</span>--}}
                {{--                </a>--}}
                {{--            </li>--}}
                {{--            <li>--}}
                {{--                <a href="">--}}
                {{--                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/sk_mobile.svg" alt="">--}}
                {{--                    <span>Sư kiện hot</span>--}}
                {{--                </a>--}}
                {{--            </li>--}}
                <div class="menu-category-mobile-partition"></div>
                @include('frontend.widget.__head__dich__vu__noi__bat__mobile')
            </ul>
        </div>
    </nav>
</header>
<div class="header " id="menu-service"  style="  ;">
    @if(theme('')->theme_config->sys_theme_ver == 'sys_theme_ver3.0')
         @include('frontend.widget.__head__dich__vu__noi__bat')
    @endif
    <div class="menu-profile-mobile">
        <div class="row marginauto">
            {{--Bắt đầu vòng lặp --}}
            <div class="col-md-12 left-right nav-bar-hr">
                <section class="media-mobile">
                    <div class=" banner-mobile-container-ct">
                        <div class="row marginauto banner-mobile-row-ct">
                            <div class="col-auto left-right box-account-mobile_open" style="width: 10%" onclick="openMenuProfile()" >
                                <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" >
                            </div>

                            <div class="col-auto left-right banner-mobile-span text-center text-login" style="width: 80%">
                                <p>Tài khoản</p>
                            </div>
                            <div class="col-auto left-right" style="width: 10%">
                            </div>
                        </div>
                    </div>
                </section>
                {{--                                    Vong lap thang bố--}}
                <div class="acount-logined_mobile d-flex m-3">
                    <div class="acount-logined_img">
                        <img src="/assets/frontend/theme_3/image/avatar.png" alt="">
                    </div>
                    <div class="account-logined_info">
                        <div class="account-id-mobile">
                        </div>
                        <div class="account-balance-mobile">
                        </div>
                    </div>
                </div>
                @include('frontend.widget.__menu_profile')
            </div>
        </div>
    </div>

    <div class="menu-category-mobile">
        <ul class=" ">
{{--            <li>--}}
{{--                <a href="/">--}}
{{--                        <img src="./assets/frontend/{{theme('')->theme_key}}/image/svg/home-2.svg" alt="">--}}
{{--                    <span>Trang chủ</span>--}}

{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="">--}}
{{--                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/km_mobile.svg" alt="">--}}
{{--                    <span>Khuyến mãi</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="">--}}
{{--                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/sk_mobile.svg" alt="">--}}
{{--                    <span>Sư kiện hot</span>--}}
{{--                </a>--}}
{{--            </li>--}}
            <div class="menu-category-mobile-partition"></div>
            @include('frontend.widget.__head__dich__vu__noi__bat__mobile')
        </ul>
    </div>
</div>
<form id="logout-form" action="{{ url('/ajax/logout') }}" method="POST" class="d-none">
    @csrf
</form>
