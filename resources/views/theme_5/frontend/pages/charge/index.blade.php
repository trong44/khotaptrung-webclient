@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection

@section('content')
    <div class="container c-container">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/nap-the" class="breadcrumb-link">Nạp thẻ</a>
            </li>
        </ul>

        {{--            Slider banner    --}}
        <div class="d-none d-lg-block">
            @include('frontend.widget.__slider__banner__napthe')
        </div>

        <h2 class="section-title c-mt-24  c-mb-lg-8 d-none d-lg-flex">
            <i class="icon-title c-mr-8" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/son/naptien.svg)"></i>
            Nạp tiền
        </h2>

        {{--        nạp thẻ--}}

        <div class="row c-mt-16 c-mb-24 c-mt-lg-50 c-mt-md-0">

            <div class="col-12 col-lg-8 c-pr-8 c-px-sm-0 ">
                <div class="recharge-money-container brs-12 brs-sm-0 c-pt-lg-4">
                    <div class="recharge-money-tab c-px-16">
                        <ul class="nav justify-content-between row" role="tablist" >
                            <li class="nav-item col-6 p-0" role="presentation">
                                <p id="chargeNavTab" class="nav-link active text-center mb-0 fw-400 fz-13" data-toggle="tab" href="#charge_card" role="tab" aria-selected="true">Nạp thẻ cào </p>
                            </li >
                            <li class="nav-item col-6 p-0" role="presentation">
                                <p id="atmNavTab" class="nav-link text-center mb-0 fw-400 fz-13" data-toggle="tab" href="#atm_card" role="tab" aria-selected="false"> ATM tự động </p>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show c-p-16" id="charge_card" role="tabpanel">
                            <form class="w-100" action="" id="chargeCardForm">
                                <div class="row content-block">
                                    <div class="col-12 col-lg-6 c-pr-8">
                                        <div class="money-form-group c-mb-16">
                                            <label class="text-form fz-13 fw-500 c-mb-4">Nhà cung cấp</label>
                                            <div class="col-md-12 p-0">
                                                @if(isset($data))
                                                <select class="select-form w-100" name="type" id="telecom">
                                                    @forelse($data as $telecom)
                                                        <option value="{{ @$telecom->key }}">{{ @$telecom->title }}</option>
                                                    @empty
                                                        <option value="">Chưa cấu hình loại thẻ</option>
                                                    @endforelse
                                                </select>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="money-form-group c-mb-12 d-block d-lg-none">
                                            <label class="text-form fz-13 fw-500 c-mb-8">Chọn mệnh giá</label>
                                            <div class="loader position-relative">
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
                                                <div class="row m-0 c-mx-n4" id="cardAmountMobile">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="money-form-group c-mb-8">
                                            <label class="text-form fz-13 fw-500 c-mb-4">Mã số thẻ</label>
                                            <div class="col-md-12 p-0">
                                                <div class="input-group">
                                                    <input class="input-form w-100" name="pin" type="text" placeholder="Nhập mã số thẻ của bạn">
                                                    <p class="text-error c-mb-0 c-mt-4"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="money-form-group c-mb-8">
                                            <label class="text-form fz-13 fw-500 c-mb-4">Số sê-ri</label>
                                            <div class="col-md-12 p-0">
                                                <div class="input-group">
                                                    <input class="input-form w-100" name="serial" type="text" placeholder="Nhập mã số sê-ri trên thẻ">
                                                    <p class="text-error c-mb-0 c-mt-4"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="money-form-group">
                                            <label class="text-form fz-13 fw-500 c-mb-4">Mã bảo vệ</label>
                                            <div class="input-group">
                                                <div class="col-md-12 p-0 d-flex">
                                                    <div style="flex: 1;">
                                                        <input class="input-form w-100" name="captcha" type="text" placeholder="Nhập mã bảo vệ ">
                                                    </div>
                                                    <div class="captcha c-mx-8">
                                                        <div>
                                                        <span class="capchaImage">
                                                            {!! captcha_img('flat') !!}
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <button class="refresh-captcha brs-8" type="button" id="reload_1">
                                                        <img class="spinImg paused" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/captcha_refresh.png" alt="">
                                                    </button>
                                                </div>
                                                <p class="text-error c-mb-0 c-mt-4"></p>
                                            </div>
                                        </div>
                                        <div class="group-btn c-mt-24 d-flex d-lg-none">
                                            @if (\App\Library\AuthCustom::check())
                                                <button class="btn primary d-block d-lg-none" type="submit">Nạp ngay</button>
                                            @else
                                                <button class="btn primary d-block d-lg-none" onclick="openLoginModal();">Nạp ngay</button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 c-pl-8 d-none d-lg-flex flex-column justify-content-between">
                                        <div class="money-form-group c-mb-16">
                                            <label class="text-form fz-13 fw-500 c-mb-4">Chọn mệnh giá</label>
                                            <div class="loader position-relative">
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
                                                <div class="row m-0" id="cardAmount">

                                                </div>
                                            </div>
                                        </div>
                                        @if (\App\Library\AuthCustom::check())
                                            <button class="btn primary d-none d-lg-block" type="submit">Nạp ngay</button>
                                        @else
                                            <button class="btn primary d-none d-lg-block" onclick="openLoginModal();">Nạp ngay</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade c-p-16" id="atm_card" role="tabpanel" >
                            @if (!\App\Library\AuthCustom::check())
                                <div class="row content-block">
                                    <div class="col-12 col-lg-12">
                                        <div class="atm-recharge-right c-p-16 brs-8">
                                            <div class="atm-recharge-guide">
                                                <img class="w-100 c-mb-16" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/atm_recharge_guide.png" alt="">
                                                <p class="fz-13 fw-400">Để hoàn tất đơn nạp, bạn vui lòng chuyển khoản theo cú pháp sau:</p>
                                            </div>
                                            <div class="atm-recharge-content c-p-sm-12 brs-sm-8">
                                                @if (setting('sys_tranfer_content') != "")
                                                    {!! setting('sys_tranfer_content') !!}
                                                @endif
                                                <div class="atm-recharge-attr" style="text-align: center">
                                                    <p class="fz-14 fw-600 mb-0" style="color: red; max-width: 100% !important;">Vui lòng đăng nhập để nhận được nội dung chuyển tiền!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row text-center loader-container">
                                    <div class="col-12">
                                        <div class="loader position-relative" style="margin: 2rem 0">
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
                                    </div>
                                </div>
                                <div class="row content-block d-none">
                                    <div class="col-12 col-lg-12">
                                        <div class="atm-recharge-right c-p-16 brs-8">
                                            <div class="atm-recharge-guide">
                                                <img class="w-100 c-mb-16" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/atm_recharge_guide.png" alt="">
                                                <p class="fz-13 fw-400">Để hoàn tất đơn nạp, bạn vui lòng chuyển khoản theo cú pháp sau:</p>
                                            </div>
                                            <div class="atm-recharge-content c-p-sm-12 brs-sm-8">
                                                @if (setting('sys_tranfer_content') != "")
                                                    {!! setting('sys_tranfer_content') !!}
                                                @endif
                                                <div class="atm-recharge-attr d-flex justify-content-between align-items-center">
                                                    <p class="fz-13 fw-400 mb-0">Nội dung chuyển khoản</p>
                                                    <div class="fz-13 fw-500" id="transactionContent"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 c-pl-8 d-none d-lg-flex">
                <a href="javascript:void(0);" class="money-recharge-coupon d-block brs-12" style="height: 100%">
                    <img class="brs-12" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/recharge-coupon.png" alt="">
                </a>
            </div>
        </div>

        {{--            Dịch vụ khác   --}}
        <div class="c-mb-40">
            @include('frontend.widget.__services__other')
        </div>


    </div>

@endsection

