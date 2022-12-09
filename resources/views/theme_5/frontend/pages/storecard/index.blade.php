@extends('frontend.layouts.master')

@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection

@section('meta_robots')
    <meta name="robots" content="noindex,nofollow"/>
@endsection
@section('content')
    <div class="container c-container">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="" class="breadcrumb-link">Mua thẻ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="" class="breadcrumb-link">Thẻ game</a>
            </li>
        </ul>

        <div class="head-mobile">
            <a href="/service-mobile" class="link-back"></a>

            <h1 class="head-title text-title">Mua thẻ</h1>

            <a href="/" class="home"></a>
        </div>

        <div class="d-none d-lg-block">
            @include('frontend.widget.__slider__banner__napthe')
        </div>

        <div class="section-header c-pt-12 c-pt-lg-6 c-mb-16 c-mb-lg-20 justify-content-between">
            <h2 class="section-title">
                <i class="icon-title c-mr-8" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/son/naptien.svg)"></i>
                {{ $title??'Mua thẻ' }}
            </h2>
        </div>

        <div class="row c-mb-20 c-mb-lg-24 c-mx-lg-n16">
            <div class="col-12 col-lg-8 c-pr-8 c-px-sm-0 ">
                <div class="recharge-money-container brs-12 brs-sm-0 c-pt-lg-4">
                    <div class="recharge-money-tab c-px-16">
                        <ul class="nav justify-content-between row c-mx-lg-n16" role="tablist" >
                            <li class="nav-item col-6 p-0" role="presentation">
                                <p class="nav-link active text-center mb-0 fw-400 fz-13" id="gameCardNav" data-toggle="tab" href="#gameCard" role="tab" aria-selected="true">Thẻ game</p>
                            </li >
                            <li class="nav-item col-6 p-0" role="presentation">
                                <p class="nav-link text-center mb-0 fw-400 fz-13" id="mobileCardNav" data-toggle="tab" href="#mobileCard" role="tab" aria-selected="false"> Thẻ điện thoại </p>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade active show c-p-16 c-pb-lg-0" id="gameCard" role="tabpanel">
                            <div class="buy-card-section c-mb-8 c-mb-sm-0">
                                <label class="text-form fz-13 fw-500 c-pb-8 c-mb-sm-0 c-pb-sm-8">Chọn loại thẻ</label>
                                <div class="col-md-12 p-0 d-none d-lg-block">
                                    <div class="row m-0 c-mx-n4" id="cardGameList">
                                        @foreach($telecoms as $key => $telecom)
                                            @if(isset($telecom->params) and $telecom->params->teltecom_type == 2)
                                                <div class="col-2 c-px-4 c-py-0 card-type-form">
                                                    <input type="radio" id="card-{{ $key }}" value="{{ $telecom->key }}"
                                                            name="card-type" data-img="{{ $telecom->image }}"
                                                            data-title="{{ $telecom->title }}"
                                                            data-tab="1"
                                                            hidden>
                                                    <label for="card-{{ $key }}" class="brs-8 c-mb-8">
                                                        <img src="{{ $telecom->image }}" alt="{{ $telecom->title }}">
                                                    </label>
                                                </div>
                                            @else
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="swiper swiper-config-auto d-block d-lg-none" id="slider-card-game"
                                        data-perview="2.5" data-between="8">
                                    <div class="swiper-wrapper">
                                        @foreach($telecoms as $key => $telecom)
                                            @if(isset($telecom->params) && $telecom->params->teltecom_type == 2)
                                                <div class="swiper-slide card-type-form">
                                                    <input type="radio" id="card-{{ $key }}-slide"
                                                            value="{{ $telecom->key }}"
                                                            name="card-type" data-img="{{ $telecom->image }}"
                                                            data-title="{{ $telecom->title }}"
                                                            data-tab="1"
                                                            hidden>
                                                    <label for="card-{{ $key }}-slide" class="brs-8 c-mb-8">
                                                        <img src="{{ $telecom->image }}" alt="{{ $telecom->title }}">
                                                    </label>
                                                </div>
                                            @else
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="amount-card-section c-mb-8">
                                <label class="text-form fz-13 fw-500 c-pb-8 c-mb-sm-0 c-py-sm-8">Chọn mệnh giá</label>
                                <div class="loader position-relative" style="margin-top: 20px">
                                    <div class="loading-spokes">
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="row m-0 c-mx-n4" id="cardAmountListGame">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade c-p-16" id="mobileCard" role="tabpanel" >
                            <div class="buy-card-section c-mb-8 c-mb-sm-0">
                                <label class="text-form fz-13 fw-500 c-pb-8 c-mb-sm-0 c-pb-sm-8">Chọn loại thẻ</label>
                                <div class="col-md-12 p-0 d-none d-lg-block">
                                    <div class="row m-0" id="cardPhoneList">
                                        @foreach($telecoms as $key => $telecom)
                                            @if(!isset($telecom->params) || $telecom->params->teltecom_type != 2)
                                                <div class="col-2 c-px-4 c-py-0 card-type-form">
                                                    <input type="radio" id="card-{{ $key }}" value="{{ $telecom->key }}"
                                                           name="card-type" data-img="{{ $telecom->image }}"
                                                           data-title="{{ $telecom->title }}"
                                                           data-tab="2"
                                                           hidden>
                                                    <label for="card-{{ $key }}" class="brs-8 c-mb-8">
                                                        <img src="{{ $telecom->image }}" alt="{{ $telecom->title }}">
                                                    </label>
                                                </div>
                                            @else
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="swiper swiper-config-auto d-block d-lg-none" id="slider-card-phone"
                                     data-perview="2.5" data-between="8">
                                    <div class="swiper-wrapper">
                                        @foreach($telecoms as $key => $telecom)
                                            @if(!isset($telecom->params) || $telecom->params->teltecom_type != 2)
                                                <div class="swiper-slide card-type-form">
                                                    <input type="radio" id="card-{{ $key }}-slide"
                                                           value="{{ $telecom->key }}"
                                                           name="card-type" data-img="{{ $telecom->image }}"
                                                           data-title="{{ $telecom->title }}"
                                                           data-tab="2"
                                                           hidden>
                                                    <label for="card-{{ $key }}-slide" class="brs-8 c-mb-8">
                                                        <img src="{{ $telecom->image }}" alt="{{ $telecom->title }}">
                                                    </label>
                                                </div>
                                            @else
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="amount-card-section c-mb-8">
                                <label class="text-form fz-13 fw-500 c-pb-8 c-mb-sm-0 c-py-sm-8">Chọn mệnh giá</label>
                                <div class="loader position-relative" style="margin-top: 20px">
                                    <div class="loading-spokes">
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                        <div class="spoke-container">
                                            <div class="spoke"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 p-0">
                                    <div class="row m-0 c-mx-n4" id="cardAmountListMobile">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="cardPriceInfo" class="col-12 col-lg-4 c-pl-12 c-px-sm-16">
                {{-- <div class="buy-card-section c-mb-8">
                    <label class="text-form fz-13 fw-500 c-py-16 c-mb-sm-0 c-py-sm-8">Chọn mệnh giá</label>
                    <div class="col-md-12 p-0">
                        <div class="row m-0 c-mx-n4" id="cardAmountList">

                        </div>
                    </div>
                </div> --}}
                <div id="cardPriceContent">
                    <div class="buy-card-info c-p-16 c-mb-20 brs-12">
                        <div class="buy-card-info-block d-flex justify-content-between align-items-center c-mb-12">
                            <span class="buy-card-info-title fw-500 fz-13">Số lượng thẻ</span>
                            <div class="js-quantity">
                                <div class="js-quantity-minus"></div>
                                <input type="text" name="card-amount" value="1" class="js-quantity-input">
                                <div class="js-quantity-add"></div>
                            </div>
                        </div>
                        <div class="buy-card-info-block d-flex justify-content-between align-items-center c-mb-12">
                            <input name="card-discount" type="hidden" value="">
                            <span class="buy-card-info-title fw-500 fz-13">Chiết khấu</span>
                            <span class="buy-card-discount fw-400 fz-13">0%</span>
                        </div>
                        <div class="buy-card-info-block d-flex justify-content-between align-items-center">
                            <span class="buy-card-info-title fw-500 fz-13">Thành tiền</span>
                            <span class="buy-card-total fw-500 fz-15">0đ</span>
                        </div>
                    </div>
                    @if (\App\Library\AuthCustom::check())
                        <button class="btn primary w-100 d-none d-lg-block" id="btn-confirm" data-toggle="modal"
                                data-target="#modalConfirmPayment" type="button" disabled>
                            Mua ngay
                        </button>
                        <div class="group-btn c-pt-16 d-flex d-lg-none">
                            <button id="btn-confirm-mobile" class="btn primary js-step" data-target="#step2"
                                    type="button" disabled>Mua ngay
                            </button>
                        </div>
                    @else
                        <button class="btn primary w-100 d-none d-lg-block" onclick="openLoginModal();" type="button">
                            Mua ngay
                        </button>
                        <div class="group-btn c-pt-16 d-flex d-lg-none">
                            <button id="btn-confirm-mobile" class="btn primary js-step" onclick="openLoginModal();" type="button">Mua ngay</button>
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <h2 class="text-title-bold fz-20 lh-28 d-none d-lg-block c-mb-8">Mô tả dịch vụ</h2>
        <div class="card overflow-hidden d-none d-lg-block detailViewBlock">
            <p class="d-none detailViewBlockTitle">Mô tả dịch vụ</p>
            <div class="card-body c-px-16">
                <div class="content-desc hide detailViewBlockContent">

                    {!! setting('sys_store_card_content') !!}
                </div>
            </div>
            <div class="card-footer text-center">
                <span class="see-more" data-content="Xem thêm nội dung"></span>
            </div>
        </div>
        <div class="c-my-32 d-none d-lg-block">
            @include('frontend.widget.__services__other')
        </div>

    </div>

    <div class="step" id="step2">
        <div class="head-mobile">
            <a href="#" class="link-back close-step"></a>

            <p class="head-title text-title">Xác nhận thanh toán</p>

            <a href="#" class="notify" data-notify="2"></a>
        </div>
        <div class="body-mobile">
            <div class="c-px-16">
                <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                    Thông tin mua thẻ
                </div>
                <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                        <p class="fz-13 fw-400 mb-0">Loại thẻ</p>
                        <div class="fw-500 fz-13" id="confirmMobileCard"></div>
                    </div>
                    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                        <p class="fz-13 fw-400 mb-0">Mệnh giá</p>
                        <div class="fw-500 fz-13" id="confirmMobilePrice"></div>
                    </div>
                    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                        <p class="fz-13 fw-400 mb-0">Số lượng</p>
                        <div class="fw-500 fz-13" id="confirmMobileQuantity"></div>
                    </div>
                    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                        <p class="fz-13 fw-400 mb-0">Chiết khấu</p>
                        <div class="fw-500 fz-13" id="confirmMobileDiscount"></div>
                    </div>
                    <div class="history-detail-attr d-flex justify-content-between align-items-center">
                        <p class="fz-13 fw-400 mb-0">Thành tiền</p>
                        <div class="fw-500 fz-13" id="confirmMobileTotal"></div>
                    </div>
                </div>
                <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                        <p class="fz-13 fw-400 mb-0">Phương thức thanh toán</p>
                        <div class="fw-500 fz-13">Tài khoản Shopbrand</div>
                    </div>
                    <div class="history-detail-attr d-flex justify-content-between align-items-center">
                        <p class="fz-13 fw-400 mb-0">Phí thanh toán</p>
                        <div class="fw-500 fz-13">Miễn phí</div>
                    </div>
                </div>
                <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                    <div class="history-detail-attr d-flex justify-content-between align-items-center">
                        <p class="fz-13 fw-400 mb-0">Số tiền thanh toán</p>
                        <div class="fw-500 fz-13 detail-primary" id="totalMobileBill"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-mobile group-btn c-px-16 c-pt-16">
            <button class="btn primary js-step" id="confirmMobileButton" type="button">Xác nhận</button>
        </div>
    </div>

    <div class="step" id="step3">
        <div class="head-mobile">
            <a href="#" class="link-back close-step"></a>

            <div class="head-title text-title">Mua thẻ thành công</div>

            <a href="#" class="notify" data-notify="2"></a>
        </div>
        <div class="body-mobile">
            <div class="c-px-16">
                <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                    Thông tin mua thẻ
                </div>
                <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                        <p class="fz-13 fw-400 mb-0">Loại thẻ</p>
                        <div class="fw-500 fz-13" id="successMobileCard"></div>
                    </div>
                    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                        <p class="fz-13 fw-400 mb-0">Mệnh giá</p>
                        <div class="fw-500 fz-13" id="successMobilePrice"></div>
                    </div>
                    <div class="history-detail-attr d-flex justify-content-between align-items-center">
                        <p class="fz-13 fw-400 mb-0">Số lượng</p>
                        <div class="fw-500 fz-13" id="successMobileQuantity"></div>
                    </div>
                </div>
                <div id="cardList">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-big" id="modalConfirmPayment">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content c-p-24">
                <div class="modal-header">
                    <p class="modal-title center">Xác nhận thanh toán</p>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                    <div class="dialog--content__title fw-700 fz-13 c-mb-12 text-title-theme">
                        Thông tin mua thẻ
                    </div>
                    <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Loại thẻ
                            </div>
                            <div class="card--attr__value fz-13 fw-500" id="confirmTitle"></div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Mệnh giá
                            </div>
                            <div class="card--attr__value fz-13 fw-500" id="confirmPrice"></div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Số lượng
                            </div>
                            <div class="card--attr__value fz-13 fw-500" id="confirmQuantity"></div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Chiết khấu
                            </div>
                            <div class="card--attr__value fz-13 fw-500" id="confirmDiscount"></div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Thành tiền
                            </div>
                            <div class="card--attr__value fz-13 fw-500" id="confirmTotal"></div>
                        </div>
                    </div>
                    <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fz-13 fw-400 text-center">
                                Phương thức thanh toán
                            </div>
                            <div class="card--attr__value fz-13 fw-500">
                                Tài khoản Shopbrand
                            </div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Phí thanh toán
                            </div>
                            <div class="card--attr__value fz-13 fw-500">
                                Miễn phí
                            </div>
                        </div>
                    </div>
                    <div class="card--gray c-mb-0 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                        <div class="card--attr__total justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Tổng thanh toán
                            </div>
                            <div class="card--attr__value fz-13 fw-500"><a href="javascript:void(0)"
                                                                           class="c-text-primary" id="totalBill"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn primary" id="confirmSubmitButton">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-big" id="modal--success__payment">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content c-p-24">
                <div class="modal-header">
                    <h2 class="modal-title center">Mua thẻ thành công</h2>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                    <div class="dialog--content__title fw-700 fz-13 c-mb-12 text-title-theme">
                        Thông tin thẻ đã mua
                    </div>
                    <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Loại thẻ
                            </div>
                            <div class="card--attr__value fz-13 fw-500" id="successCard"></div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Mệnh giá
                            </div>
                            <div class="card--attr__value fz-13 fw-500" id="successPrice"></div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Số lượng
                            </div>
                            <div class="card--attr__value fz-13 fw-500" id="successQuantity"></div>
                        </div>
                    </div>

                    <div class="swiper slider--card swiper-container-horizontal swiper-container-free-mode">
                        <div class="swiper-wrapper">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn ghost">Xoá bộ lọc</button>
                    {{--                    <a class="btn secondary" data-dismiss="modal">Về trang chủ</a>--}}
                    {{--                    <button class="btn primary">Xem kết quả</button>--}}
                    <button class="btn primary">Xem kết quả</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-small" id="modal--fail__payment">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content">
                <div class="modal-header justify-content-center p-0">
                    <img class="c-pt-16 c-pb-16" src="/assets/frontend/{{theme('')->theme_key}}/image/son/thatbai.png"
                         alt="">
                </div>
                <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                    <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Mua thẻ thất bại</p>
                    <p class="fw-400 fz-13 c-mt-10 mb-0" id="message--error--buy"></p>
                </div>
                <div class="modal-footer c-p-24">
                    <button class="btn ghost" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/store-card/store-card.js"></script>
@endsection
