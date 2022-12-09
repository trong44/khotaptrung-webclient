@extends('frontend.layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-3 c-pr-12 c-p-sm-0">
            <h1 class="buy-card-title fw-700 fz-20 lh-28 c-mt-0 c-mb-8 c-py-8 d-none d-lg-block">Mua thẻ</h1>
            <div class="buy-card-container brs-12 brs-lg-0">
                <div class="buy-card-tab brs-12 brs-lg-0 c-px-15">
                    <ul class="nav justify-content-between row" role="tablist" >
                        <li class="nav-item col-6 col-lg-12 p-0" role="presentation">
                            <p class="nav-link active mb-0 c-py-10 fw-500 fz-15" data-toggle="tab" href="#gameCard" role="tab" aria-selected="true">Thẻ Game</p>
                        </li >
                        <li class="nav-item col-6 col-lg-12 p-0" role="presentation">
                            <p class="nav-link mb-0 c-py-10 fw-500 fz-15" data-toggle="tab" href="#mobileCard" role="tab" aria-selected="false">Thẻ điện thoại</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-9 c-pl-12 c-p-sm-0">
            <div class="tab-content c-px-sm-16">
                <div class="tab-pane fade active show" id="gameCard" role="tabpanel">
                    <form action="">
                        <div class="row">
                            <div class="col-12 col-md-6 c-pr-12 c-pl-12">
                                <div class="buy-card-section c-mb-16 c-mb-sm-0">
                                    <label class="text-form fz-13 fw-500 c-py-16 c-mb-sm-0 c-pb-sm-8">Chọn loại thẻ</label>
                                    <div class="col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col-4 c-px-4 c-py-0 card-type-form">
                                                <input name="amount" id="recharge_amount_0" type="radio" hidden="" checked="">
                                                <label for="recharge_amount_0" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 c-py-0 card-type-form">
                                                <input name="amount" id="recharge_amount_1" type="radio" hidden="">
                                                <label for="recharge_amount_1" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 c-py-0 card-type-form">
                                                <input name="amount" id="recharge_amount_2" type="radio" hidden="">
                                                <label for="recharge_amount_2" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-type-form">
                                                <input name="amount" id="recharge_amount_3" type="radio" hidden="">
                                                <label for="recharge_amount_3" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-type-form">
                                                <input name="amount" id="recharge_amount_4" type="radio" hidden="">
                                                <label for="recharge_amount_4" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-type-form">
                                                <input name="amount" id="recharge_amount_5" type="radio" hidden="">
                                                <label for="recharge_amount_5" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-type-form">
                                                <input name="amount" id="recharge_amount_6" type="radio" hidden="">
                                                <label for="recharge_amount_6" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-type-form">
                                                <input name="amount" id="recharge_amount_7" type="radio" hidden="">
                                                <label for="recharge_amount_7" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 c-pl-12 c-pr-sm-12">
                                <div class="buy-card-section c-mb-16">
                                    <label class="text-form fz-13 fw-500 c-py-16 c-mb-sm-0 c-py-sm-8">Chọn mệnh giá</label>
                                    <div class="col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_0" type="radio" hidden="" checked="">
                                                <label for="recharge_amount_0" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_1" type="radio" hidden="">
                                                <label for="recharge_amount_1" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_2" type="radio" hidden="">
                                                <label for="recharge_amount_2" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_3" type="radio" hidden="">
                                                <label for="recharge_amount_3" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_4" type="radio" hidden="">
                                                <label for="recharge_amount_4" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_5" type="radio" hidden="">
                                                <label for="recharge_amount_5" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_6" type="radio" hidden="">
                                                <label for="recharge_amount_6" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_7" type="radio" hidden="">
                                                <label for="recharge_amount_7" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="buy-card-info c-p-16 c-mb-20 brs-12">
                                    <div class="buy-card-info-block d-flex justify-content-between align-items-center c-mb-12">
                                        <span class="buy-card-info-title fw-500 fz-13">Số lượng thẻ</span>
                                        <div class="buy-card-amount d-flex">
                                            <button class="buy-card-amount-button d-flex button-minus">
                                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/minus.png" alt="">
                                            </button>
                                            <input type="text" name="card-amount" class="buy-card-amount-input" value="1" numberic>
                                            <button class="buy-card-amount-button d-flex button-add">
                                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/add.png" alt="">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="buy-card-info-block d-flex justify-content-between align-items-center c-mb-12">
                                        <input name="card-discount" type="hidden" value="">
                                        <span class="buy-card-info-title fw-500 fz-13">Chiết khấu</span>
                                        <span class="buy-card-discount fw-400 fz-13">1%</span>
                                    </div>
                                    <div class="buy-card-info-block d-flex justify-content-between align-items-center">
                                        <span class="buy-card-info-title fw-500 fz-13">Thành tiền</span>
                                        <span class="buy-card-total fw-500 fz-15">18.000đ</span>
                                    </div>
                                </div>
                                <button class="btn primary w-100" type="submit">
                                    Mua ngay
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="mobileCard" role="tabpanel" >
                    <form action="">
                        <div class="row">
                            <div class="col-12 col-md-6 c-pr-12 c-pl-12">
                                <div class="buy-card-section c-mb-16 c-mb-sm-0">
                                    <label class="text-form fz-13 fw-500 c-py-16 c-mb-sm-0 c-pb-sm-8">Chọn loại thẻ</label>
                                    <div class="col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col-4 c-px-4 c-py-0 card-type-form">
                                                <input name="amount" id="recharge_amount_0" type="radio" hidden="" checked="">
                                                <label for="recharge_amount_0" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 c-py-0 card-type-form">
                                                <input name="amount" id="recharge_amount_1" type="radio" hidden="">
                                                <label for="recharge_amount_1" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 c-py-0 card-type-form">
                                                <input name="amount" id="recharge_amount_2" type="radio" hidden="">
                                                <label for="recharge_amount_2" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-type-form">
                                                <input name="amount" id="recharge_amount_3" type="radio" hidden="">
                                                <label for="recharge_amount_3" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-type-form">
                                                <input name="amount" id="recharge_amount_4" type="radio" hidden="">
                                                <label for="recharge_amount_4" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-type-form">
                                                <input name="amount" id="recharge_amount_5" type="radio" hidden="">
                                                <label for="recharge_amount_5" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-type-form">
                                                <input name="amount" id="recharge_amount_6" type="radio" hidden="">
                                                <label for="recharge_amount_6" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-type-form">
                                                <input name="amount" id="recharge_amount_7" type="radio" hidden="">
                                                <label for="recharge_amount_7" class="brs-8 c-mb-8">
                                                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/zing.png" alt="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 c-pl-12 c-pr-sm-12">
                                <div class="buy-card-section c-mb-16">
                                    <label class="text-form fz-13 fw-500 c-py-16 c-mb-sm-0 c-py-sm-8">Chọn mệnh giá</label>
                                    <div class="col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_0" type="radio" hidden="" checked="">
                                                <label for="recharge_amount_0" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_1" type="radio" hidden="">
                                                <label for="recharge_amount_1" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_2" type="radio" hidden="">
                                                <label for="recharge_amount_2" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_3" type="radio" hidden="">
                                                <label for="recharge_amount_3" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_4" type="radio" hidden="">
                                                <label for="recharge_amount_4" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_5" type="radio" hidden="">
                                                <label for="recharge_amount_5" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_6" type="radio" hidden="">
                                                <label for="recharge_amount_6" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                            <div class="col-4 c-px-4 card-price-form">
                                                <input name="amount" id="recharge_amount_7" type="radio" hidden="">
                                                <label for="recharge_amount_7" class="c-py-21 c-px-8 c-mb-8 brs-8">
                                                    <p class="fw-500 fs-15 mb-0">10.000đ</p> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="buy-card-info c-p-16 c-mb-20 brs-12">
                                    <div class="buy-card-info-block d-flex justify-content-between align-items-center c-mb-12">
                                        <span class="buy-card-info-title fw-500 fz-13">Số lượng thẻ</span>
                                        <div class="buy-card-amount d-flex">
                                            <button class="buy-card-amount-button d-flex button-minus">
                                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/minus.png" alt="">
                                            </button>
                                            <input type="text" name="card-amount" class="buy-card-amount-input" value="1" numberic>
                                            <button class="buy-card-amount-button d-flex button-add">
                                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/phu/add.png" alt="">
                                            </button>
                                        </div>
                                    </div>
                                    <div class="buy-card-info-block d-flex justify-content-between align-items-center c-mb-12">
                                        <input name="card-discount" type="hidden" value="">
                                        <span class="buy-card-info-title fw-500 fz-13">Chiết khấu</span>
                                        <span class="buy-card-discount fw-400 fz-13">1%</span>
                                    </div>
                                    <div class="buy-card-info-block d-flex justify-content-between align-items-center">
                                        <span class="buy-card-info-title fw-500 fz-13">Thành tiền</span>
                                        <span class="buy-card-total fw-500 fz-15">18.000đ</span>
                                    </div>
                                </div>
                                <button class="btn primary w-100" type="submit">
                                    Mua ngay
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
