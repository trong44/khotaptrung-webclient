@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <div class="background-history">
        <div class="container c-container-side c-pb-40">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/lich-su-giao-dich" class="breadcrumb-link">Lịch sử nạp thẻ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="" class="breadcrumb-link">Chi tiết giao dịch</a>
                </li>
            </ul>
            <div class="head-mobile">
                <a href="/profile-navbar" class="link-back"></a>

                <h1 class="head-title text-title">Chi tiết giao dịch</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    @include('frontend.widget.__menu_profile')
                </div>
                <div class="col-12 col-md-8 c-px-sm-0">
                    <div class="history-detail-title c-p-16 c-mb-16 brs-12 d-none d-sm-block">
                        <h1 class="fw-700 fz-20 lh-28 c-my-0">Chi tiết biến động số dư</h1>
                    </div>
                    <div class="history-detail-content brs-12">
                        @if($status)
                            <div class="history-detail-subtitle lh-24 c-pt-16 c-pb-12 c-px-16 fw-500 fz-15 d-none d-sm-block">
                                @foreach($config as $ils => $valls)
                                    @if($ils == $data->trade_type)
                                        {{ $valls }}
                                    @endif
                                @endforeach
                            </div>
                            <div class="c-px-16 c-pb-24">
                                <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                                    Thông tin giao dịch
                                </div>
                                <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                                    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                        <p class="fz-13 fw-400 mb-0">Số tiền giao dịch</p>
                                        <div class="fw-500 fz-13">{{ $data->is_add ? '+ ' : '- ' }}{{ number_format($data->amount, 0, ',', '.') }}đ</div>
                                    </div>
                                    <div
                                        class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                        <p class="fz-13 fw-400 mb-0">Số dư cuối</p>
                                        <div class="fw-500 fz-13">{{ number_format($data->last_balance, 0, ',', '.') }}đ</div>
                                    </div>
                                    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                        <p class="fz-13 fw-400 mb-0">Ngày giao dịch</p>
                                        <div class="fw-500 fz-13">{{ date('d/m/Y - H:s',strtotime($data->created_at)) }}</div>
                                    </div>

                                    <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                        <p class="fz-13 fw-400 mb-0">Trạng thái</p>
                                        @switch($data->status)
                                            @case(1)
                                        <div class="detail-success fw-500 fz-13">Thành công</div>
                                            @break
                                            @case(0)
                                            <div class="detail-failed fw-500 fz-13">Thất bại</div>
                                            @break
                                            @case(2)
                                            <div class="detail-pending fw-500 fz-13">Đang xử lý</div>
                                            @break
                                        @endswitch
                                    </div>
                                </div>
                                <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                                    <div
                                        class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                        <p class="fz-13 fw-400 mb-0">ID</p>
                                        <div class="fw-500 fz-13">#{{ $data->id }}</div>
                                    </div>
                                    <div
                                        class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                        <p class="fz-13 fw-400 mb-0">Chủ tài khoản</p>
                                        <div class="fw-500 fz-13">{{ @$data->user->username }}</div>
                                    </div>
                                    <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                        <p class="fz-13 fw-400 mb-0">Loại giao dịch</p>
                                        <div class="fw-500 fz-13">
                                            @foreach($config as $ils => $valls)
                                                @if($ils == $data->trade_type)
                                                    {{ $valls }}
                                                @endif
                                            @endforeach</div>
                                    </div>
                                </div>
                                <div class="history-detail-info-block brs-12 c-p-16">
                                    <p class="history-detail-info-label c-mb-16 fw-400 fz-13">Thông báo</p>
                                    <div class="history-detail-info-content fw-400 fz-12 c-pb-8">
                                        {{ $data->description }}
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="invalid-color t-body-2">{{ @$message }}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container c-container c-pb-44">
            @include('frontend.widget.__service__other__his')
        </div>
    </div>
@endsection



