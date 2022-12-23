@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('scripts')
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/service.js" type="text/javascript"></script>--}}

    <script src="/js/{{theme('')->theme_key}}/cay-thue/cay-thue.js" type="text/javascript"></script>
@endsection
@section('content')

    {{--  Header mobile  --}}

    <div class="card--mobile__title">
            <span class="card--back box-account-mobile_open">
                <a href="/"><img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt=""></a>
            </span>
        <p>Trang chủ</p>
    </div>
    {{--    Banner--}}
    @include('frontend.widget.__slider__banner__service')

    {{--  Menu  --}}
    <section class="media-web">
        <div class="container container-fix menu-container-ct">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li class="menu-container-li-ct"><img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="/dich-vu">Dịch vụ</a></li>
            </ul>
        </div>
    </section>

    {{--   Bopđyy --}}
    <section>
        <div class="container container-fix body-container-ct">
            <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">
                <div class="col-md-12 left-right">
                    <div class="row marginauto body-row-ct">

                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-header-ct">
                                <div class="col-auto left-right">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/caythue.png" alt="">
                                </div>
                                <div class="col-md-10 col-8 body-header-col-ct">
                                    <h1>Dịch vụ</h1>
                                </div>
                            </div>
                        </div>

                        @include('frontend.widget.__slider__banner__service__mobile')


                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-title-ct">
                                <div class="col-md-12 text-left left-right">
                                    <span>Chọn dịch vụ game</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-search-ct">
                                <div class="col-md-12 text-left left-right">
                                    <span>Tìm kiếm</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right media-web">
                            <form action="" method="POST" class="service-form">
                                <div class="row marginauto body-form-search-ct">
                                    <div class="col-auto left-right">
                                        <input type="text" name="search" class="input-search-ct" placeholder="Tìm dịch vụ">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                                    </div>
                                    <div class="col-4 body-form-search-button-ct">
                                        <button type="submit" class="timkiem-button-ct">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="col-md-12 left-right media-mobile">
                            <form action="" method="POST" class="service-form">
                                <div class="row marginauto body-form-search-ct">
                                    <div class="col-12 left-right">
                                        <input type="text" name="search" class="input-search-ct" placeholder="Tìm dịch vụ">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('frontend.pages.service.widget.__data__list')
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    @include('frontend.pages.service.widget.__category__content')--}}

@endsection



