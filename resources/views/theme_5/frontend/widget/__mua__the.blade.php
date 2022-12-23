@if(isset($telecoms))

    <div class="section-header c-pt-32 c-pt-lg-24 c-mb-24 c-mb-lg-20 justify-content-between">
        <h2 class="section-title">
            <i class="icon-title c-mr-8" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/son/naptien.svg)"></i>
            {{ $title??'Mua thẻ' }}
        </h2>
    </div>

    <div class="row c-mt-16 c-mb-lg-24 c-mx-lg-n16">
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
@else
@endif
<div class="c-pt-24 border-bottom-destop c-pt-lg-0"></div>
