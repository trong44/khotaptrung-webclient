@extends('frontend.layouts.master')
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/user/change-password.js?v={{time()}}"></script>
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    {{--  Menu  --}}
    <section class="media-web">
        <div class="container container-fix menu-container-ct">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li class="menu-container-li-ct"><img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="">Đổi mật khẩu</a></li>
            </ul>
        </div>
    </section>

    <section class="media-mobile">
        <div class="container container-fix banner-mobile-container-ct">

            <div class="row marginauto banner-mobile-row-ct">
                <div class="col-auto left-right" style="width: 10%" onclick="openMenuProfile()">
                    <a href="#" class="previous-step-one box-account-mobile_open" style="line-height: 28px">
                        <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" >
                    </a>
                </div>

                <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                    <h1>Đổi mật khẩu</h1>
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
                @include('frontend.widget.__navbar__profile')

                <div class="col-lg-9 col-12 body-container-detail-right-ct ">
                    <div class="row marginauto logs-content profile-category">
                        <div class="col-md-12 left-right">
                            <form action="{{route('changePasswordApi')}}" method="POST" id="form-changePassword">
                                @csrf
                                <div class="row marginauto">
                                    <div class="col-md-12 left-right">
                                        <div class="row marginauto logs-title">
                                            <div class="col-md-12 left-right">
                                                <span>Đổi mật khẩu</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-m-12 message-error password-error"></div>
                                    <div class="col-md-12 left-right text-change-password-default">

                                        <div class="row marginauto change-password-first change-password-row">
                                            <div class="col-12 left-right">
                                                <span>Mật khẩu cũ</span>
                                            </div>
                                            <div class="col-auto change-password-default change-password-col-last left-right">
                                                <input type="text" class="input-defautf-ct password-old" name="old_password" autocomplete="off" placeholder="Nhập mật khẩu cũ">
                                            </div>
                                        </div>
                                        <div class="col-m-12 message-error">

                                        </div>
                                    </div>
                                    <div class="col-md-12 left-right text-change-password-default">

                                        <div class="row marginauto change-password-last change-password-row">
                                            <div class="col-12 left-right">
                                                <span>Mật khẩu mới</span>
                                            </div>
                                            <div class="col-auto change-password-default change-password-col-last left-right">
                                                <input type="text" class="input-defautf-ct password-new" name="password" autocomplete="off" placeholder="Nhập mật khẩu mới">
                                            </div>

                                        </div>
                                        <div class="col-m-12 message-error">

                                        </div>
                                    </div>
                                    <div class="col-md-12 left-right text-change-password-default">

                                        <div class="row marginauto change-password-last change-password-row">
                                            <div class="col-12 left-right">
                                                <span>Xác nhận mật khẩu</span>
                                            </div>
                                            <div class="col-auto change-password-default change-password-col-last left-right">
                                                <input type="text" class="input-defautf-ct password-confirm" name="password_confirmation" autocomplete="off" placeholder="Xác nhận mật khẩu">
                                            </div>

                                        </div>
                                        <div class="col-m-12 message-error"></div>
                                    </div>
                                    <div class="col-md-12 left-right text-change-password-default">

                                        <div class="row marginauto change-password-last change-password-row">
                                            <div class="col-auto  change-password-default change-password-col-last left-right">
                                                <button class="button-default-ct btn-data" type="submit">Đổi mật khẩu</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="modal fade login show default-Modal" id="successModal" aria-modal="true">
        <div class="modal-dialog modal-md modal-dialog-centered login animated">
            <!--        <div class="image-login"></div>-->
            <div class="modal-content">
                <div class="modal-header modal-header-success-ct">
                    <div class="row marginauto modal-header-success-row-ct justify-content-center">
                        <div class="col-md-12 text-center">
                            <span class="modal_message">Thay đổi mật khẩu thành công</span>
                        </div>
                    </div>
                </div>


                <div class="modal-body modal-body-success-ct">
                    <div class="row marginauto justify-content-center">
                        <div class="col-auto">
                            <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/group.png" alt="">
                        </div>
                    </div>
                    <div class="row marginauto modal-body-span-success-ct justify-content-center">
                        <div class="col-md-12 text-center">
                            <span>Bạn đã thay đổi mật khẩu thành công, vui lòng đăng nhập lại!</span>
                        </div>
                    </div>
                    <div class="row marginauto justify-content-center modal-footer-success-ct">
                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                            <div class="row marginauto modal-footer-success-row-not-ct">
                                <div class="col-md-12 left-right">
                                    <a href="/" class="button-not-bg-ct"><span>Về trang chủ</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                            <div class="row marginauto modal-footer-success-row-ct">
                                <div class="col-md-12 left-right">
                                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="button-bg-ct"><span>Đăng nhập lại</span></a>
                                    <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" class="d-none"></form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

