@extends('frontend.layouts.master')
@section('content')
    <div class="head-mobile">
        <a href="/" class="link-back"></a>

        <h1 class="head-title text-title">404 Page</h1>

        <a href="/" class="home"></a>
    </div>
    <div class="default-page-404 c-pl-lg-30 c-pt-lg-32">
        <div class="row page-404 page-404-mobile">
            <div class="image-default image-default-mobile">
                <img src="/assets/frontend/theme_5/image/duong/image-404.png" alt="">
            </div>
            <div class="image-404 col-6">
                <img src="/assets/frontend/theme_5/image/duong/404.png" alt="">
            </div>
            <div class="col-6 title-404 c-pl-0">
                <p class="c-mb-0">PAGE</p>
                <span>NOT FOUND</span>
            </div>
            <div class="c-pt-40 c-pl-24 c-pr-24 description-404">
                <p>Rất tiếc! Trang bạn truy cập đã không được tìm thấy, Xin lỗi bạn vì điều này thật bất tiện, vui lòng ghé lại sau nha</p>
                <button class="c-mb-40 c-ml-lg-0">Về trang chủ </button>
            </div>
        </div>
    </div>
@endsection
