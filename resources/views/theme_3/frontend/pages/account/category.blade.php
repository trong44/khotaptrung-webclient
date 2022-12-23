@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    {{--  Header mobile  --}}
{{--    <section class="media-mobile">--}}
{{--        <div class="container container-fix banner-mobile-container-ct">--}}

{{--            <div class="row marginauto banner-mobile-row-ct" style="position: relative">--}}
{{--                    <span class="card--back box-account-mobile_open" onclick="Redirect()">--}}
{{--                        <img src="/assets/frontend/theme_3/image/icons/back.png" alt="">--}}
{{--                    </span>                <div class="col-12 left-right banner-mobile-span text-center">--}}
{{--                    <p>Trang chủ</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <div class="card--mobile__title">
            <span class="card--back box-account-mobile_open">
                <a href="/"><img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt=""></a>
            </span>
        <p>Danh mục game</p>
    </div>
    {{--    Banner--}}

    @include('frontend.widget.__slider__banner__account')

    {{--  Menu  --}}
    <section class="media-web">
        <div class="container container-fix menu-container-ct">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li class="menu-container-li-ct"><img  src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="/mua-acc">Danh mục Shop Account</a></li>
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
                                    <img  src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/caythue.png" alt="">
                                </div>
                                <div class="col-md-10 col-10 body-header-col-ct">
                                    <h1>Danh sách mục Shop Account</h1>
                                </div>
                            </div>
                        </div>

                        @include('frontend.widget.__slider__banner__account__mobile')

                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-title-ct">
                                <div class="col-md-12 text-left left-right">
                                    <span>Chọn game muốn mua account</span>
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
                            <form class="media-form-search" method="POST">
                                <div class="row marginauto body-form-search-ct">
                                    <div class="col-auto left-right">
                                        <input autocomplete="off" type="text" name="search" class="input-search-ct" placeholder="Tìm kiếm theo game">
                                        <img   src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                                    </div>
                                    <div class="col-4 body-form-search-button-ct">
                                        <button type="submit" class="timkiem-button-ct">Tìm kiếm</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="col-md-12 left-right media-mobile">
                            <form class="media-form-search" method="POST">
                                <div class="row marginauto body-form-search-ct">
                                    <div class="col-12 left-right" type="">
                                        <input autocomplete="off" type="text" name="search-mobile" class="input-search-ct" placeholder="Tìm kiếm theo game">
                                        <img   src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                                    </div>
                                </div>
                            </form>

                        </div>

                        @include('frontend.pages.account.widget.__data__category')


                    </div>
                </div>

            </div>
        </div>
    </section>

{{--    @include('frontend.pages.account.widget.__category__content')--}}

    <script src="/js/{{theme('')->theme_key}}/nick/nick--update.js?v={{time()}}"></script>
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/nick--update.js?v={{time()}}"></script>--}}
@endsection





