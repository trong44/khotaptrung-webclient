@extends('frontend.layouts.master')
@section('content')
    <div class="background-history">
        <div class="container c-container-side">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="" class="breadcrumb-link">Chi tiết tài khoản đã mua</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/lich-su-mua-account" class="link-back"></a>

                <h1 class="head-title text-title">Chi tiết nạp thẻ</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>

                <div class="c-ml-16 c-ml-lg-0 c-history-right">
                    <div class="history-detail-title c-p-16 c-mb-16 brs-12 d-none d-sm-block">
                        <h1 class="fw-700 fz-20 lh-28 c-my-0">Chi tiết tài khoản đã mua</h1>
                    </div>
                    <div class="history-detail-content brs-12">
                        <div class="history-detail-subtitle lh-24 c-pt-16 c-pb-12 c-px-16 fw-500 fz-15 d-none d-sm-block">
                            Nick ngọc rồng tầm trung
                        </div>
                        <div class="c-px-16 c-pb-24">
                            <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                                Thông tin giao dịch
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">ID</p>
                                    <div class="fw-500 fz-13">#123445</div>
                                </div>
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Game</p>
                                    <div class="fw-500 fz-13">Ngọc rồng Online</div>
                                </div>
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Tài khoản</p>
                                    <div class="fw-500 fz-13">***abc@abc.com</div>
                                </div>
                                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Kiểu nạp</p>
                                    <div class="fw-500 fz-13">Nạp tự động</div>
                                </div>
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16 c-mb-24">
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Trị giá</p>
                                    <div class="fw-500 fz-13">100.000đ</div>
                                </div>
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Ngày giao dịch</p>
                                    <div class="fw-500 fz-13">26/04/2021 - 16:05</div>
                                </div>
                                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Trạng thái</p>
                                    <div class="detail-success fw-500 fz-13">Thành công</div>
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <button class="btn primary c-px-50" data-toggle="modal" data-target="#modal-get-nick">Xem tài khoản</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dịch vụ khác -->
        <div class="container c-container d-none d-lg-block c-mt-24 c-mt-lg-16">
            @include('frontend.widget.__service__other__his')
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade modal-328" id="modal-refund" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content">
                <div class="modal-body c-p-0">
                    <div class="banner">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/success.png" alt="">
                    </div>
                    <div class="c-mt-12">
                        <label class="c-mb-4 fw-500 fz-13 lh-20">Tài khoản</label>
                        <div class="copy-input">
                            <input type="text">
                        </div>
                    </div>
                    <div class="c-mt-12">
                        <label class="c-mb-4 fw-500 fz-13 lh-20">Mật khẩu</label>
                        <div class="copy-input toggle-password">
                            <input type="password">
                        </div>
                    </div>
                    <div class="c-mt-12 w-100 text-center focus-color">Đã lấy mật khẩu lúc: 05-05-2022, 121:32:56</div>
                    <div class="c-mt-16">
                        <label class="c-mb-4 fw-400 fz-13 lh-20 text-center">Để bảo mật bạn vui lòng thay đổi mật khẩu và tên đăng nhập của tải khoản đã mua!</label>
                    </div>
                </div>
                <div class="modal-footer c-pt-16">
                    <button class="btn ghost" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>
@endsection
