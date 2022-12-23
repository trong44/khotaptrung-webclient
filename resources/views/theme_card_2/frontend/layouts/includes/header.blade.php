<div class="dump_class d-none d-lg-block"></div>
<header class="d-lg-none" id="header-mobile">
    <a class="logo" href="/" alt="Shop bán nick game, acc game online avatar, đột kích – CF, liên minh huyền thoại lol , ngọc rồng, khí phách anh hùng - kpah giá rẻ, uy tín...">
       @if(setting('sys_logo_mobile'))
            <img  class="img-fluid"  src="{{\App\Library\MediaHelpers::media(setting('sys_logo_mobile'))}}" alt="">
        @else
            <img  class="img-fluid"  src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" alt="">
        @endif
    </a>

    <input id="nav" type="checkbox">
    <label for="nav"></label>
    <nav style="overflow: hidden">
        @include('frontend.widget.__menu_category_mobile')

    </nav>

    <div class="box-loading_mobile mr-5 ">
        <div class="m-nav__item ml-5 box-loading position-relative">
            <div class="btn-loading" >
                <div class="loading">
                    <div class="loading-child" style="background-color: black"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="m-nav__item mr-3 box-logined box-logined-mobile  profile_item_mobile">
        <div data-toggle="modal" data-target="#modalLogin">
            <img src="/assets/frontend/{{theme('')->theme_key}}/image/avatar.png" alt="">
        </div>
    </div>
    <div class="profile_item_mobile my-auto m-nav__item box-account m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light " m-dropdown-toggle="click">
        <a href="#" class="m-nav__link m-dropdown__toggle ">
            <span class="m-topbar__userpic">
              <img class="img-fluid" style="border-radius: 50px" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/anhdaidien.svg" alt="" />
            </span>
            <span class="m-topbar__username m--hide"></span>
        </a>
        <div class="m-dropdown__wrapper">
            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
            <div class="m-dropdown__inner">
                <div class="m-dropdown__header m--align-center" >
                    <div class="m-card-user m-card-user--skin-dark manageAcount">

                    </div>
                </div>
                <div class="m-dropdown__body">
                    <div class="m-dropdown__content">
                        @include('frontend.widget.__menu_header')

                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<header id="m_header" class="m-grid__item  d-none d-lg-block">
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">
            <div class="container">
                <div id="header" class="">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <a href="/" alt="Shop bán nick game, acc game online avatar, đột kích – CF, liên minh huyền thoại lol , ngọc rồng, khí phách anh hùng - kpah giá rẻ, uy tín...">
                                <img class="img-fluid img-logo" src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" alt="">
                            </a>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div id="menu-header" class="menu-top d-flex">
                                @include('frontend.widget.__menu_category_desktop')

                                <div class="m-nav__item ml-5 box-loading position-relative">
                                    <div class="btn-loading" >
                                        <div class="loading">
                                            <div class="loading-child"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-nav__item ml-5 box-logined wp_login">

                                </div>
                                <div id="profie_item" class="ml-5 my-auto m-nav__item box-account m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle ">
                                        <span class="m-topbar__userpic">
                                          <img class="img-fluid" style="border-radius: 50px" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/anhdaidien.svg" alt="" />
                                        </span>
                                        <span class="m-topbar__username m--hide"></span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center" >
                                                <div class="m-card-user m-card-user--skin-dark manageAcount">

                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    @include('frontend.widget.__menu_profile_header')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<form id="logout-form" action="{{ url('/ajax/logout') }}" method="POST" class="d-none">
    @csrf
</form>
