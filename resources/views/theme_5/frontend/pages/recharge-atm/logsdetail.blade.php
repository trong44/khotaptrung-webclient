@extends('frontend.layouts.master')
@section('content')
    <div class="background-history">
        <div class="container c-container-side">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="" class="breadcrumb-link">Chi tiết giao dịch</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/lich-su-atm-tu-dong" class="link-back"></a>

                <h1 class="head-title text-title">Chi tiết giao dịch</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>

                <div class="c-ml-16 c-ml-lg-0 c-history-right">
                    <div class="history-detail-title c-p-16 c-mb-16 brs-12 d-none d-sm-block">
                        <h1 class="fw-700 fz-20 lh-28 c-my-0">Chi tiết giao dịch</h1>
                    </div>
                    <div class="history-detail-content brs-12">
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
                                    <p class="fz-13 fw-400 mb-0">Chủ tài khoản</p>
                                    <div class="fw-500 fz-13">Nguyen Ngoc An</div>
                                </div>
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Nhà mạng</p>
                                    <div class="fw-500 fz-13">Viettel</div>
                                </div>
                                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Kiểu nạp</p>
                                    <div class="fw-500 fz-13">Nạp tự động</div>
                                </div>
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16">
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Mênh giá thẻ</p>
                                    <div class="fw-500 fz-13">100.000đ</div>
                                </div>
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Thực nhận</p>
                                    <div class="fw-500 fz-13">97.000đ</div>
                                </div>
                                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Ngày giao dịch</p>
                                    <div class="fw-500 fz-13">26/04/2021 - 16:05</div>
                                </div>
                                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Trạng thái</p>
                                    <div class="detail-success fw-500 fz-13">Thành công</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dịch vụ khác -->
        <div class="container d-none d-lg-block c-container c-mt-24 c-mt-lg-16">
            @include('frontend.widget.__service__other__his')
        </div>
    </div>
@endsection
