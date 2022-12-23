@extends('frontend.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">

            </div>
            <div class="col-12 col-md-8 c-px-sm-0">
                <div class="history-detail-title c-p-16 c-mb-16 brs-12 d-none d-sm-flex justify-content-between align-items-center">
                    <h1 class="fw-700 fz-20 lh-28 c-my-0">Chi tiết dịch vụ đã mua</h1>
                    <div class="d-none d-sm-block">
                        <button class="btn ghost c-mr-10">Hủy dịch vụ</button>
                        <button class="btn primary">Chỉnh sửa thông tin</button>
                    </div>
                </div>
                <div class="history-detail-content brs-12">
                    <div class="history-detail-subtitle lh-24 c-pt-16 c-pb-12 c-px-16 fw-500 fz-15 d-none d-sm-block">
                        Mua thẻ Viettel
                    </div>
                    <div class="c-px-16 c-pb-24">
                        <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                            Thông tin giao dịch
                        </div>
                        <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                            <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                <p class="fz-13 fw-400 mb-0">Chi tiết yêu cầu</p>
                                <div class="fw-500 fz-13">#123445</div>
                            </div>
                            <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                <p class="fz-13 fw-400 mb-0">Mã giao dịch SMS</p>
                                <div class="fw-500 fz-13">Nguyen Ngoc An</div>
                            </div>
                            <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                <p class="fz-13 fw-400 mb-0">Tên dịch vụ</p>
                                <div class="fw-500 fz-13">Viettel</div>
                            </div>
                            <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                <p class="fz-13 fw-400 mb-0">Công việc</p>
                                <div class="fw-500 fz-13">Viettel</div>
                            </div>
                            <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                <p class="fz-13 fw-400 mb-0">Giá</p>
                                <div class="fw-500 fz-13">Viettel</div>
                            </div>
                        </div>
                        <div class="history-detail-info-block brs-12 c-p-16">
                            <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                <p class="fz-13 fw-400 mb-0">Tên tài khoản Garena</p>
                                <div class="fw-500 fz-13">#123445</div>
                            </div>
                            <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                <p class="fz-13 fw-400 mb-0">Tên tài khoản</p>
                                <div class="fw-500 fz-13">Nguyen Ngoc An</div>
                            </div>
                            <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                <p class="fz-13 fw-400 mb-0">Mật khẩu</p>
                                <div class="fw-500 fz-13">Viettel</div>
                            </div>
                        </div>
                        <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                            Tiến độ
                        </div>
                        <div class="history-detail-info-block brs-12 c-p-16">
                            <ul class="order--timelines m-0 c-pl-22">
                                <li class="order--timeline">
                                    <div class="order--status fz-13 fw-500">
                                        Đang chờ
                                    </div>
                                    <div class="order--date fz-13 fw-400">
                                        16/06/2022 20:36:32
                                    </div>
                                </li>
                                <li class="order--timeline">
                                    <div class="order--status fz-13 fw-500">
                                        Thất bại -:- taikhoansai
                                    </div>
                                    <div class="order--date fz-13 fw-400">
                                        16/06/2022 20:37:36
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                            Trao đổi dịch vụ<span class="d-none d-sm-inline-block">: Dịch vụ số #12345</span>
                        </div>
                        <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                            <div class="service-change-title c-px-16 c-py-8 c-mr-8 c-mr-sm-0 fw-500 fz-15 lh-24">
                                Dịch vụ <span>#539084</span>
                            </div>
                            <div class="service-change-detail">
                                <div class="service-change-detail-item c-py-8 c-px-16">
                                    <div class="fw-500 fz-13">Người yêu cầu order</div>
                                    <p class="fw-400 fz-13 c-mb-0"><span class="service-change-time c-mr-12">1h trước</span>Mình thay đổi nội dung bạn ơi</p>
                                </div>
                                <div class="service-change-detail-item c-py-8 c-px-16">
                                    <div class="fw-500 fz-13">Admin</div>
                                    <p class="fw-400 fz-13 c-mb-0"><span class="service-change-time c-mr-12">1h trước</span>Mình thay đổi nội dung bạn ơi</p>
                                </div>
                                <div class="service-change-detail-item c-py-8 c-px-16">
                                    <div class="fw-500 fz-13">Admin</div>
                                    <p class="fw-400 fz-13 c-mb-0"><span class="service-change-time c-mr-12">1h trước</span>Mình thay đổi nội dung bạn ơi</p>
                                </div>
                                <div class="service-change-detail-item c-py-8 c-px-16">
                                    <div class="fw-500 fz-13">Admin</div>
                                    <p class="fw-400 fz-13 c-mb-0"><span class="service-change-time c-mr-12">1h trước</span>Mình thay đổi nội dung bạn ơi</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button class="service-change-message-btn btn secondary c-px-50">Nhắn tin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection