@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    <div class="container c-container" id="account-category">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/dich-vu" class="breadcrumb-link">Dịch vụ</a>
            </li>
        </ul>
        <div class="head-mobile">
            <a href="/service-mobile" class="link-back"></a>

            <h1 class="head-title text-title">Dịch vụ</h1>

            <a href="/" class="home"></a>
        </div>
        {{--            Slider baner    --}}
        @include('frontend.widget.__slider__banner__service')
        {{--            Top hôm nay    --}}
{{--        @include('frontend.pages.service.widget.__top__today')--}}

        <section class="listing-service c-mt-16">
            <div class="section-header justify-content-between c-pb-20 c-pb-lg-16">
                <h2 class="section-title fw-700 fz-20 lh-28 ">Danh sách dịch vụ</h2>
                <form action="" method="POST" id="service-form" class="form-search">
                    <input type="search" name="search" id="keyword--search" placeholder="Chọn dịch vụ" class="has-submit media-web">
                    <input type="search" name="search-mobile" placeholder="Chọn dịch vụ" class="search media-mobile">
                    <button class="media-web" type="submit"></button>
                </form>
            </div>
            <hr>
            <div class="text-title fw-700 c-py-16 c-py-lg-8 c-mb-lg-8">
                Chọn dịch vụ
            </div>

           @include('frontend.pages.service.widget.__data__list')
        </section>

        {{--            Dịch vụ khác   --}}
        @include('frontend.widget.__services__other')
    </div>

@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_duong/style.js?v={{time()}}" type="text/javascript"></script>
@endsection
