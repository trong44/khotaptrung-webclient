@extends('frontend.layouts.master')

@section('content')
    @if(!App\Library\AuthCustom::check())
        <div class="container">

        <div class="login-popup brs-12 c-mt-16 c-p-16 d-flex m-auto justify-content-between">
            <div class="m-auto">
                <img src="/assets/frontend/theme_5/image/nam/login-robot.png" alt="">
            </div>

            <div class="login-popup_content c-ml-24">
                <div class="text-secondary-color fw-700 lh-28 fz-20">
                    {{\Request::server ("HTTP_HOST")}} xin chào!
                </div>
                <div class="fw-400 c-mt-4">Vui lòng đăng nhập để sử dụng dịch vụ của chúng tôi</div>
                <button class="btn primary w-100 c-mt-12" id="handleLoginPopup">Đăng nhập</button>
                <div class="c-mt-10">Bạn chưa có tài khoản? <a href="" class="text-primary-color fw-500 underline" id="handleRegisterPopup" style="text-decoration: underline">Đăng ký</a></div>
            </div>
        </div>
        </div>

    @else
        <div class="container c-container-side background-history">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/thong-tin" class="breadcrumb-link">Thông tin tài khoản</a>
                </li>
            </ul>

            <div class="row">
                <div class="g-history-left">
                    @include('frontend.widget.__menu_profile')
                </div>
            </div>


        </div>

    @endif
@endsection
