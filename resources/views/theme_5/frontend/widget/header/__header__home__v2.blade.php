
<div class="header-container c-px-32">
    <div class="box-logo ">
        <a href="/">
            <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" alt="" class="d-lg-block d-none ">
            <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo_mobile'))}}" alt="" class="d-lg-none">
        </a>

    </div>
    <div class="container c-container c-header-theme position-absolute d-flex justify-content-between">
        <div class="box-search  ">
            <form action="" class="form-search" style="width: 400px">
                <input type="search" placeholder="Tìm kiếm" class=" has-submit">
                <button type="submit"></button>
            </form>
        </div>
        <div class="d-lg-block d-none box-menu-theme">
            @include('frontend.widget.__menu_category_desktop')

        </div>
    </div>

    <div  class="d-flex">
        <div class="box-search-mobile  position-relative " >

            <div class="box-icon brs-8" >
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/nam/search.svg" alt="" >
            </div>
            <div class="position-absolute box-search-mobile_detail">
                <input type="search" placeholder="Tìm kiếm" class="search c-mt-16">

            </div>
        </div>

        <div class="box-notify  d-flex c-ml-8">
            <div class="box-notify">
                <div class="box-icon brs-8 box-search_mobile">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/nam/search.svg" alt="" >
                </div>
            </div>
            <div class="box-icon brs-8 " data-notity="5">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/nam/ring.svg" alt="" >
            </div>
        </div>

        <div class="box-account c-ml-8 d-none d-md-block position-relative">
            <div class="box-loading btn-loading">
                <div class="loading">
                    <div class="loading-child"></div>
                </div>
            </div>
            <div class="account-logined box-account-open ">

            </div>
            <div class="box-account-logined position-absolute brs-12">

                <div class="box-account-title d-flex justify-content-between c-mb-18">
                    <div class="fw-700 fz-20 lh-28 title-color">Tài khoản</div>
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/nam/profile_close.svg" alt="" class="close-login-popup c-mr-12">
                </div>
                <div class="c-pr-16 account-logined-content box-account_nologined">
                    <div class="login-popup brs-12 c-p-16 d-flex m-auto justify-content-between">
                        <div class="m-auto ">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/nam/login-robot.png" alt="">
                        </div>

                        <div class="login-popup_content c-ml-24">
                            <div class="text-secondary-color fw-700 lh-28 fz-20">
                                Nick.vn xin chào!
                            </div>
                            <div class="fw-400 c-mt-4">Vui lòng đăng nhập để sử dụng dịch vụ của chúng tôi</div>
                            <button class="btn primary w-100 c-mt-12"  onclick="openLoginModal()">Đăng nhập</button>
                            <div class="c-mt-10">Bạn chưa có tài khoản? <a href="#" onclick="openRegisterModal()" class="text-primary-color fw-500 underline" style="text-decoration: underline">Đăng ký</a></div>
                        </div>
                    </div>
                </div>
                <div class="account-logined-content c-pr-4 box-account_logined">

                    @include('frontend.widget.__menu_profile')

                </div>
            </div>

        </div>
    </div>

</div>
