@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    {{--  Menu  --}}
    <section class="media-web">
        <div class="container container-fix menu-container-ct">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li class="menu-container-li-ct"><img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="">Thông tin tài khoản</a></li>
            </ul>
        </div>
    </section>

    <section class="media-mobile">
        <div class="container container-fix banner-mobile-container-ct">

            <div class="row marginauto banner-mobile-row-ct">
                <div class="col-auto left-right" style="width: 10%" onclick="openMenuProfile()">
                    <a href="#" class="previous-step-one" style="line-height: 28px">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" >
                    </a>
                </div>

                <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                    <h1>Thông tin tài khoản</h1>
                </div>
                <div class="col-auto left-right" style="width: 10%">
                </div>
            </div>

        </div>
    </section>

    {{--   Bopdy --}}
    <section>
        <div class="container container-fix body-container-ct">
            <div class="row marginauto body-container-row-ct profile-category-body body-container-row-mobile-ct">
                @include('theme_3.frontend.widget.__navbar__profile')

                <div class="col-lg-9 col-12 body-container-detail-right-ct ">
                    <div class="row marginauto logs-content profile-category">
                        <div class="col-md-12 left-right">
                            <div class="row marginauto">
                                <div class="col-md-12 left-right">
                                    <div class="row marginauto logs-title">
                                        <div class="col-md-12 left-right">
                                            <span>Danh mục tài khoản</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right text-profile-default">

                                    <div class="row marginauto profile-row">
                                        <div class="col-auto profile-auto left-right">
                                            <span>ID của bạn</span>
                                        </div>
                                        <div class="col-auto left-right">
                                            <small id="info_id"></small>
                                        </div>
                                    </div>
                                    <div class="row marginauto profile-row">
                                        <div class="col-auto profile-auto left-right">
                                            <span>Tên tài khoản</span>
                                        </div>
                                        <div class="col-auto profile-auto left-right">
                                            <small id="info_name"></small>
                                        </div>
                                    </div>
                                    <div class="row marginauto profile-row">
                                        <div class="col-auto profile-auto left-right">
                                            <span>Số dư tài khoản</span>
                                        </div>
                                        <div class="col-auto profile-auto left-right">
                                            <small id="info_balance"></small>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/txns/txns.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/profile.js?v={{time()}}"></script>
@endsection
