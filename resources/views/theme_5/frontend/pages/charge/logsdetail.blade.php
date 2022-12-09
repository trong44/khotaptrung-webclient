@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <div class="background-history">
        <div class="container c-container-side">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="" class="breadcrumb-link">Chi tiết nạp thẻ</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/the-cao-da-mua" class="link-back"></a>

                <h1 class="head-title text-title">Lịch sử nạp thẻ</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>

                <div class="c-ml-16 c-ml-lg-0 c-history-right">
                    <div class="history-detail-title c-p-16 c-mb-16 brs-12 d-none d-sm-block">
                        <h1 class="fw-700 fz-20 lh-28 c-my-0">Chi tiết nạp thẻ</h1>
                    </div>
                    <div class="history-detail-content brs-12">
                        <div class="history-detail-subtitle lh-24 c-pt-16 c-pb-12 c-px-16 fw-500 fz-15 d-none d-sm-block">
                            Nạp thẻ {{ $data->telecom_key }}
                        </div>
                        <div class="c-px-16 c-pb-24">
                            <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                                Thông tin giao dịch
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">ID</p>
                                    <div class="fw-500 fz-13">#{{ $data->id }}</div>
                                </div>
{{--                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">--}}
{{--                                    <p class="fz-13 fw-400 mb-0">Chủ tài khoản</p>--}}
{{--                                    <div class="fw-500 fz-13">Nguyen Ngoc An</div>--}}
{{--                                </div>--}}
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Nhà mạng</p>
                                    <div class="fw-500 fz-13">{{ $data->telecom_key }}</div>
                                </div>
                                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Kiểu nạp</p>
                                    <div class="fw-500 fz-13">Nạp tự động</div>
                                </div>
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Mênh giá thẻ</p>
                                    <div class="fw-500 fz-13">{{ str_replace(',','.',number_format($data->declare_amount)) }} đ</div>
                                </div>
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Thực nhận</p>
                                    <div class="fw-500 fz-13">
                                        @if(isset($data->real_received_amount))
                                            {{ str_replace(',','.',number_format($data->real_received_amount)) }} đ
                                        @else
                                            0
                                        @endif
                                    </div>
                                </div>
                                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Ngày giao dịch</p>
                                    <div class="fw-500 fz-13">{{ date('d/m/Y',strtotime($data->created_at)) }} - {{ date('H:i',strtotime($data->created_at)) }}</div>
                                </div>
                                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Trạng thái</p>

                                    @switch($data->status)
                                        @case(1)
                                        <div class="detail-success fw-500 fz-13">{{config('module.charge.status.1')}}</div>
                                        @break
                                        @case(0)
                                        <div class="detail-invalid fw-500 fz-13">{{config('module.charge.status.0')}}</div>
                                        @break
                                        @case(3)
                                        <div class="detail-invalid fw-500 fz-13">{{config('module.charge.status.3')}}</div>
                                        @break
                                        @case(2)
                                        <div class="detail-warning fw-500 fz-13">{{config('module.charge.status.2')}}</div>
                                        @break
                                        @case(999)
                                        <div class="detail-invalid fw-500 fz-13">{{config('module.charge.status.999')}}</div>
                                        @break
                                        @case(-999)
                                        <div class="detail-invalid fw-500 fz-13">{{config('module.charge.status.-999')}}</div>
                                        @break
                                        @case(-1)
                                        <div class="detail-invalid fw-500 fz-13">{{config('module.charge.status.-1')}}</div>
                                        @break
                                    @endswitch
                                </div>
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16">
                                <p class="history-detail-info-label c-mb-8 fw-400 fz-13">Thông tin thẻ nạp</p>
                                <div class="history-detail-attr c-py-4 d-flex justify-content-between align-items-center">
                                    <div class="fz-12 lh-16 fw-400 mb-0">Mã thẻ:</div>
                                    <div class="card-attr">
                                        <div class="card__info fz-12 lh-16">
                                            {{  App\Library\Helpers::Decrypt($data->pin,config('module.charge.key_encrypt')) }}
                                        </div>
                                        <div class="js-copy-text"></div>
                                    </div>
                                </div>
                                <div class="history-detail-attr c-py-4 d-flex justify-content-between align-items-center">
                                    <div class="fz-12 lh-16 fw-400 mb-0">Số sê-ri:</div>
                                    <div class="card-attr">
                                        <div class="card__info fz-12 lh-16">
                                            {{  App\Library\Helpers::Decrypt($data->serial,config('module.charge.key_encrypt')) }}
                                        </div>
                                        <div class="js-copy-text"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c-py-16 d-none d-lg-block">
                @include('frontend/widget/__service__other__his')
            </div>
        </div>
    </div>
@endsection
