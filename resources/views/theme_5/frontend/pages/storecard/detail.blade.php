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
                    <a href="javascript:void(0)" class="breadcrumb-link">Chi tiết nạp thẻ</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/the-cao-da-mua" class="link-back"></a>

                <h1 class="head-title text-title">Chi tiết nạp thẻ</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>

                <div class="c-ml-16 c-ml-lg-0 c-history-right">
                    <div class="history-detail-title c-p-16 c-mb-16 brs-12 d-none d-sm-block">
                        <h1 class="fw-700 fz-20 lh-28 c-my-0">Chi tiết mua thẻ</h1>
                    </div>
                    <div class="history-detail-content brs-12">
                        @php
                            $telecome =\App\Library\HelpersDecode::DecodeJson('telecom',$data->params);
                        @endphp
                        <div class="history-detail-subtitle lh-24 c-pt-16 c-pb-12 c-px-16 fw-500 fz-15 d-none d-sm-block">
                            Mua thẻ {{ $telecome??'' }}
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
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Mô tả</p>
                                    <div class="fw-500 fz-13">{{ $data->content }}</div>
                                </div>
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Nhà mạng</p>
                                    <div class="fw-500 fz-13">{{ $telecome }}</div>
                                </div>
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Mênh giá thẻ</p>
                                    <div class="fw-500 fz-13">{{ str_replace(',','.',number_format($data->real_received_price)) }} đ</div>
                                </div>
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Chiết khấu</p>
                                    <div class="fw-500 fz-13">{{ $data->ratio }} %</div>
                                </div>
                                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Ngày giao dịch</p>
                                    <div class="fw-500 fz-13">{{date('d/m/Y - H:i', strtotime($data->created_at))}}</div>
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
                                        @case(3)
                                        <div class="detail-failed fw-500 fz-13">Đã hủy</div>
                                        @break
                                        @case(2)
                                        <div class="detail-pending fw-500 fz-13">Đang chờ xử lý</div>
                                        @break
                                        @case(4)
                                        <div class="detail-failed fw-500 fz-13">Lỗi gọi nhà cung cấp</div>
                                        @break
                                        @case(5)
                                        <div class="detail-failed fw-500 fz-13">Lỗi hệ thống</div>
                                        @break
                                    @endswitch


                                </div>
                            </div>
                            <div class="cards-bought">
                                @if(isset($data->card))
                                    @foreach($data->card as $key => $val)
                                        <div class="history-detail-info-block brs-12 c-p-16">
                                            <p class="history-detail-info-label c-mb-8 fw-400 fz-13">Thông tin thẻ nạp {{ $key + 1 }}</p>
                                            <div class="history-detail-attr c-py-4 d-flex justify-content-between align-items-center">
                                                <span class="mb-0">Mã thẻ:</span>
                                                <div class="card-attr">
                                                    <span class="card__info">
                                                        {{ \App\Library\Helpers::Decrypt($val->serial,config('module.charge.key_encrypt')) }}
                                                    </span>
                                                    <div class="js-copy-text"></div>
                                                </div>
                                            </div>
                                            <div class="history-detail-attr c-py-4 d-flex justify-content-between align-items-center">
                                                <span class="mb-0">Số sê-ri:</span>
                                                <div class="card-attr">
                                                    <span class="card__info">
                                                        {{ \App\Library\Helpers::Decrypt($val->pin,config('module.charge.key_encrypt')) }}
                                                    </span>
                                                    <div class="js-copy-text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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
