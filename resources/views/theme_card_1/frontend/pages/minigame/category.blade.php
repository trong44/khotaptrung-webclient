@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/lib_bootstrap.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/minigame.css">
@endsection

@section('content')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/breadcrumb.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/spin.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/minigame-v2.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/withdraw_items.css">
{{--    @if($position  != 'slotmachine' && $position != 'squarewheel')--}}
{{--        <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/spin.css">--}}
{{--    @endif--}}
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/layout_page.css">
    <div class="container container-fix">
        <section class="breadcrumb-container">
            <ul class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="minigame">Danh mục vòng quay</a></li>
            </ul>
        </section>
        <section class="breadcrumb-mobile">
            <a href="/minigame" style="display: block">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/back.svg" alt="">
            </a>
            <p>Danh mục vòng quay</p>
        </section>
        <div class="block-mini-game mb-fix-8">
            <div class="row">
                <div class="col-lg-12 col-md-12 " >
                    <div class=" block-product ">
                        <div class="product-header d-flex">
                        <span>
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/minigame_title_detail.png" alt="">
                        </span>
                            <p class="text-title" >Top vòng quay</p>
                            <div class="navbar-spacer"></div>

                            <div class="text-view-more">

                                {{--                                <a href="/minigame" class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/theme_3/image/icons/arrow-right-blue.png)"></i></a>--}}

                            </div>
                        </div>

                        @include('frontend.widget.__content__category__minigame')
                    </div>
                </div>

            </div>
        </div>
        <section>
            <div class="container container-fix body-container-ct">
                <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">
                    <div class="col-md-12 left-right">
                        <div class="row marginauto body-row-ct">

                            <div class="col-md-12 left-right">
                                <div class="row marginauto body-header-ct">
                                    <div class="col-auto left-right">
                                        <img   src="/assets/frontend/{{theme('')->theme_key}}/image/svg/vongquayindex.svg" alt="">
                                    </div>
                                    <div class="col-md-10 col-10 body-header-col-ct">
                                        <h1>Danh sách Mini Game</h1>
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
                                            <input autocomplete="off" type="text" name="search" class="input-search-ct" placeholder="Tìm kiếm theo minigame">
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
                                            <input autocomplete="off" type="text" name="search-mobile" class="input-search-ct" placeholder="Tìm kiếm theo minigame">
                                            <img   src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                                        </div>
                                    </div>
                                </form>

                            </div>

                            @include('frontend.pages.minigame.widget.__data__minigame')


                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{--        @include('frontend.widget.__hotsale')--}}

        {{--        @include('frontend.widget.__play__recently')--}}

        {{--        @include('frontend.widget.__minigame__related')--}}
    </div>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/minigame/search.js?v={{time()}}"></script>
@endsection
