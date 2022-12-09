@extends('frontend.layouts.master')
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/user/change-password.js?v={{time()}}"></script>
@endsection
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <div class="background-history">

        <div class="container c-container-side c-mb-4 c-mb-lg-0">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/changepassword" class="breadcrumb-link">Đổi mật khẩu</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/profile" class="link-back close-step"></a>

                <h1 class="head-title text-title">Đổi mật khẩu</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>
                <div class="c-ml-16 c-ml-lg-0 c-history-right c_history-right">
                    <div class="card unset-lg withdraw-items" style="margin-bottom: 92px">

                        <div class="card-header d-none d-lg-block">
                            <h1 class="text-title-bold fz-20 lh-28">
                                Đổi mật khẩu
                            </h1>
                        </div>
                        <div class="head-mobile">
                            <a href="/profile" class="link-back"></a>

                            <h1 class="head-title text-title">Đổi mật khẩu</h1>

                            <a href="/" class="home"></a>
                        </div>
                        <div class="card-body c-px-16 c-px-lg-0 c-py-0 loadding-content">

                            <div class="c-pt-16 c-pb-lg-50 c-mb-lg-50" id="tab-1" role="tabpanel">

                                <form action="{{route('changePasswordApi')}}" method="POST" id="form-changePassword">
                                    @csrf
                                    <div class="input-group">
                                <span class="form-label">
                                    Mật khẩu cũ
                                </span>
                                        <div class="toggle-password">
                                            <input class="password-old" type="password" name="old_password" placeholder="Vui lòng nhập mật khẩu cũ">
                                        </div>
                                        <span class="text-error c-mt-4"></span>
                                    </div>
                                    <div class="input-group">
                                <span class="form-label">
                                    Mật khẩu mới
                                </span>
                                        <div class="toggle-password">
                                            <input class="password" name="password" type="password" placeholder="Vui lòng nhập mật khẩu mới">
                                        </div>
                                        <span class="text-error c-mt-4"></span>
                                    </div>

                                    <div class="input-group">
                                <span class="form-label">
                                    Xác nhận
                                </span>
                                        <div class="toggle-password">
                                            <input class="password-confirm" type="password" name="password_confirmation" placeholder="Vui lòng xác nhận mật khẩu mới">
                                        </div>
                                        <span class="text-error c-mt-4"></span>
                                    </div>

                                    <div class="footer-mobile v2 group-btn c-my-24 c-my-lg-0 c-px-lg-16 c-pt-lg-16 button-password" style="--data-between:12px">
                                        <button class="btn primary btn-data" type="submit" style="position: relative">
                                            Đổi mật khẩu
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <div class="modal fade modal-small" id="successModal">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content">
                    <div class="modal-header justify-content-center p-0">
                        <img class="c-pt-20 c-pb-20" src="/assets/frontend/{{theme('')->theme_key}}/image/son/success.png" alt="">
                    </div>
                    <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                        {{--                    Content 1  --}}
                        <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Thay đổi mật khẩu thành công</p>
                        <p class="fw-400 fz-13 c-mt-10 mb-0">Tài khoản của bạn đã được thay đổi mật khẩu, vui lòng đăng nhập lại để tiếp tục giao dịch</p>

                    </div>
                    <div class="modal-footer c-p-24">
                        <a href="/" class="btn secondary" data-dismiss="modal">Về trang chủ</a>
                        <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn primary">Đăng nhập lại</a>
                        <form id="logout-form" action="http://127.0.0.1:8000/ajax/logout" method="POST" class="d-none"></form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-small" id="FailChangePasswordModal">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content">
                    <div class="modal-header justify-content-center p-0">
                        <img class="c-pt-20 c-pb-20" src="/assets/frontend/{{theme('')->theme_key}}/image/son/success.png" alt="">
                    </div>
                    <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                        {{--                    Content 1  --}}
                        <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Thay đổi mật khẩu không thành công</p>
                        <p class="fw-400 fz-13 c-mt-10 mb-0"><div class="password-error"></div></p>

                    </div>
                    <div class="modal-footer c-p-24">
                        <a href="javascript:void(0)" class="btn secondary" data-dismiss="modal">Đóng</a>

                    </div>
                </div>
            </div>
        </div>
        {{--            Dịch vụ khác   --}}
        <div class="container c-container">
            @include('frontend.widget.__service__other__his')
        </div>

    </div>

@endsection




