@extends('frontend.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">

            </div>
            <div class="col-12 col-md-8 c-px-sm-0">
                <div class="history-detail-title c-p-16 c-mb-16 brs-12 d-none d-sm-block">
                    <h1 class="fw-700 fz-20 lh-28 c-my-0">Chi tiết nạp thẻ</h1>
                </div>
                <div class="history-detail-content brs-12">
                    <div class="history-detail-subtitle lh-24 c-pt-16 c-pb-12 c-px-16 fw-500 fz-15 d-none d-sm-block">
                        Nạp thẻ Viettel
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
                        <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
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
                        <div class="history-detail-info-block brs-12 c-p-16">
                            <p class="history-detail-info-label c-mb-8 fw-400 fz-13">Thông tin thẻ nạp</p>
                            <div class="history-detail-attr c-py-4 d-flex justify-content-between align-items-center">
                                <div class="fz-12 fw-400 mb-0">Mã thẻ:</div>
                                <div class="card-attr">
                                    <div class="card__info fz-12 lh-16">
                                        12344567890123
                                    </div>
                                    <div class="js-copy-text"></div>
                                </div>
                            </div>
                            <div class="history-detail-attr c-py-4 d-flex justify-content-between align-items-center">
                                <div class="fz-12 fw-400 mb-0">Số sê-ri:</div>
                                <div class="card-attr">
                                    <div class="card__info fz-12 lh-16">
                                        12344567890123
                                    </div>
                                    <div class="js-copy-text"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
