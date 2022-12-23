@extends('frontend.layouts.master')
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/trong/buy-card-v2.css">
@endsection
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['datacard'=>$key]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow"/>
@endsection
@php
    function format_k($number) {
        if($number >= 1000) {
           return $number/1000 . "k";   // NB: you will want to round this
        }
        else {
            return $number;
        }
    }
@endphp
@section('content')
    <div class="c-container container">
        <!-- head mobile -->
        <div class="head-mobile">
            <a href="/mua-the" class="link-back"></a>

            <h1 class="head-title t-sub-2 card-name text-capitalize">
                Thẻ {{ @$key }}
            </h1>

            <a href="/" class="home"></a>
        </div>
        <!-- breadcrum -->
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/mua-the" class="breadcrumb-link">Mua thẻ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/mua-the-{{ @strtolower($key) }}"
                   class="breadcrumb-link text-capitalize">Thẻ {{ strtolower($key) }}</a>
            </li>
        </ul>
        <!-- end breadcrum -->
        <!-- Banner -->
    @include('frontend.widget.__slider__banner__napthe')
    <!-- End -->
        <div class="c-mt-32 d-block d-lg-none">
            <p class="t-title-1 c-mb-0 c-pb-8 card-name text-capitalize">
                Thẻ {{ @strtolower($key) }}
            </p>
            <hr class="c-mx-n16">
        </div>

        <div class="content-wrap c-mt-24 c-mt-lg-0">
            <!-- Nav danh mục -->
            <div class="nav-buy-card d-none d-lg-block c-mb-16">
                <div class="card">
                    <div class="c-px-16 c-py-12">
                        <div class="t-title-1 title-color">Danh mục thẻ</div>
                    </div>
                    <div class="card-body c-p-0">
                        <a class="section--card p-lg-3" data-toggle="collapse" href="#card--game__nav" role="button"
                           aria-expanded="true">
                            <span class="t-sub-1">
                                THẺ GAME
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="icon-default size-20"
                                   style="--path : url(/assets/frontend/theme_5/image/svg/arrow-down.svg)"></i>
                            </span>
                        </a>
                        <ul class="collapse card-list show" id="card--game__nav">
                            @if( $data_telecoms->status == 1 )
                                @forelse($data_telecoms->data as $telecom)
                                    @if(strtolower($telecom->key) == strtolower($key))
                                        @php
                                            $card_is = $telecom;
                                        @endphp
                                    @else
                                    @endif
                                    @if($telecom->params->teltecom_type == 2)
                                        <li class="card-item {{ strtolower($telecom->key) == $key ? 'active' : '' }}">
                                            <a href="/mua-the-{{ strtolower($telecom->key) }}" class="card-item_link">
                                                <div class="card-item_thumb mr-2">
                                                    <img src="{{ @\App\Library\MediaHelpers::media($telecom->image) }}"
                                                         alt="">
                                                </div>
                                                <span
                                                    class="card-item_name t-capitalize">Thẻ {{ strtolower($telecom->title) }}</span>
                                            </a>
                                        </li>
                                    @else
                                    @endif
                                @empty
                                @endforelse
                            @else
                            @endif
                        </ul>

                        <a class="section--card p-lg-3" data-toggle="collapse" href="#card--phone__nav" role="button"
                           aria-expanded="true">
                            <span class="t-sub-1">
                                THẺ ĐIỆN THOẠI
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="icon-default size-20"
                                   style="--path : url(/assets/frontend/theme_5/image/svg/arrow-down.svg)"></i>
                            </span>
                        </a>
                        <ul class="collapse card-list show" id="card--phone__nav">
                            @if( $data_telecoms->status == 1 )
                                @forelse($data_telecoms->data as $telecom)
                                    @if(strtolower($telecom->key) == strtolower($key))
                                        @php
                                            $card_is = $telecom;
                                        @endphp
                                    @else
                                    @endif
                                    @if($telecom->params->teltecom_type != 2)
                                        <li class="card-item {{ strtolower($telecom->key) == $key ? 'active' : '' }}">
                                            <a href="/mua-the-{{ strtolower($telecom->key) }}" class="card-item_link">
                                                <div class="card-item_thumb mr-2">
                                                    <img src="{{ @\App\Library\MediaHelpers::media($telecom->image) }}"
                                                         alt="">
                                                </div>
                                                <span
                                                    class="card-item_name t-capitalize">Thẻ {{ strtolower($telecom->title) }}</span>
                                            </a>
                                        </li>
                                    @else
                                    @endif
                                @empty
                                @endforelse
                            @else
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End nav danh mục -->
            {{--            PAGE CONTENT--}}
            <div class="page--card__content">
                <!-- Các mệnh giá thẻ -->
                <div class="c-py-12 d-none d-lg-block">
                    <h2 class="t-title-2 title-color card-name text-capitalize">
                        Thẻ {{ @$key }}
                    </h2>
                </div>
                <div class="row c-mx-n8 list-card d-none d-lg-flex" id="wrap-desktop">
                    @forelse($data_amounts->data as $amount)
                        @php
                            $amount_paid = $amount->amount - ($amount->amount * (100 - $amount->ratio_default)/100);
                        @endphp
                        <div class="col-lg-3 c-px-8 c-mb-16">
                            <div class="card">
                                <div class="card-body c-p-16">
                                    <a href="/mua-the-{{ strtolower($card_is->key) }}-{{ format_k($amount->amount) }}" class="scratch-card c-mb-12">
                                        <div class="card--thumb">
                                            <img src="{{ $card_is->image }}" class="card--thumb__image py-1 py-lg-0" alt="{{ $card_is->title }}">
                                        </div>
                                        <div class="card--name t-title-2 deno-card-color"
                                             data-amount="{{ $amount->amount }}" data-discount="{{ $amount->ratio_default }}">
                                            {{ str_replace(',','.',number_format($amount->amount)) }} VND
                                        </div>
                                    </a>
                                    <span class="t-sub-2 t-capitalize">Thẻ {{ strtolower($card_is->title) }} {{ format_k($amount->amount) }}</span>
                                    <div class="t-body-1 link-color">
                                        Đơn giá: {{ str_replace(',','.',number_format($amount_paid)) }} đ
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center c-mt-12">
                                        <span class="t-body-2">Số lượng</span>
                                        <div class="js-quantity sm">
                                            <div class="js-quantity-minus"></div>
                                            <input type="text" class="js-quantity-input" value="1">
                                            <div class="js-quantity-add"></div>
                                        </div>
                                    </div>
                                    <div class="group-btn c-mt-16">
                                        @if(\App\Library\AuthCustom::check())
                                            <button type="button" class="btn secondary show-modal-confirm">Chọn mua</button>
                                        @else
                                            <button type="button" class="btn secondary" onclick="openLoginModal();">Chọn mua</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="invalid-color t-body-2 text-center c-py-12 w-100">Chưa cấu hình mệnh giá thẻ</div>
                    @endforelse
                </div>

                <div class="d-block d-lg-none">
                    <div class="swiper swiper-card c-my-16">
                        <div class="swiper-wrapper" id="wrap-mobile">
                            @forelse($data_amounts->data as $amount)
                                @php
                                    $amount_paid = $amount->amount - ($amount->amount * (100 - $amount->ratio_default)/100);
                                @endphp
                                <div class="swiper-slide">
                                    <div class="card">
                                        <div class="card-body c-p-16">
                                            <a href="/mua-the-{{ strtolower($card_is->key) }}-{{ format_k($amount->amount) }}" class="scratch-card c-mb-12">
                                                <div class="card--thumb">
                                                    <img src="{{ \App\Library\MediaHelpers::media($card_is->image) }}" class="card--thumb__image py-1 py-lg-0" alt="">
                                                </div>
                                                <div class="card--name t-title-2 deno-card-color" data-amount="{{ $amount->amount }}" data-discount="{{ $amount->ratio_default }}">
                                                    {{ str_replace(',','.',number_format($amount->amount)) }} VND
                                                </div>
                                            </a>
                                            <span class="t-sub-2 text-capitalize">Thẻ {{ strtolower($card_is->title) }} {{ format_k($amount->amount) }}</span>
                                            <div class="t-body-1 link-color">Đơn giá: {{  str_replace(',','.',number_format($amount_paid)) }} đ</div>
                                            <div class="d-flex justify-content-between align-items-center c-mt-12">
                                                <span class="t-body-2">Số lượng</span>
                                                <div class="js-quantity sm">
                                                    <div class="js-quantity-minus"></div>
                                                    <input type="text" class="js-quantity-input" value="1">
                                                    <div class="js-quantity-add"></div>
                                                </div>
                                            </div>
                                            <div class="group-btn c-mt-16">
                                                @if(\App\Library\AuthCustom::check())
                                                    <button type="button" class="btn secondary js-step show-step-confirm" data-target="#step-confirm">
                                                        Chọn mua
                                                    </button>
                                                @else
                                                    <button type="button" class="btn secondary" onclick="openLoginModal();">
                                                        Chọn mua
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="invalid-color t-body-2 text-center c-py-12 w-100">Chưa cấu hình mệnh giá thẻ</div>
                            @endforelse

                        </div>
                    </div>
                </div>

                <div class="card card-other c-mb-16 unset-lg">
                    <div class="card-body c-px-16 c-px-lg-0 c-py-0">
                        <h2 class="t-title-2 c-py-12">
                            Các loại thẻ khác
                        </h2>
                        <hr>
                        <div class="swiper swiper-card c-my-12">
                            <div class="swiper-wrapper" id="card-other">
                                @forelse($data_telecoms->data as $telecom)
                                    @if(isset($telecom->params) && isset($card_is->params))
                                        @if($telecom->params->teltecom_type == $card_is->params->teltecom_type && $telecom->id != $card_is->id )
                                            <div class="swiper-slide">
                                                <a href="/mua-the-{{ strtolower($telecom->key) }}" class="scratch-card">
                                                    <div class="card--thumb">
                                                        <img
                                                            src="{{ \App\Library\MediaHelpers::media($telecom->image) }}"
                                                            class="card--thumb__image py-1 py-lg-0" alt="">
                                                    </div>
                                                    <div class="card--name t-sub-2 text-capitalize">
                                                        Thẻ {{ strtolower($telecom->title) }}</div>
                                                </a>
                                            </div>
                                        @else
                                        @endif
                                    @else
                                        <div class="swiper-slide">
                                            <a href="/mua-the-{{ strtolower($telecom->key) }}" class="scratch-card">
                                                <div class="card--thumb">
                                                    <img src="{{ \App\Library\MediaHelpers::media($telecom->image) }}"
                                                         class="card--thumb__image py-1 py-lg-0" alt="">
                                                </div>
                                                <div class="card--name t-sub-2 text-capitalize">
                                                    Thẻ {{ strtolower($telecom->title) }}</div>
                                            </a>
                                        </div>
                                    @endif
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="navigation slider-prev"></div>
                        <div class="navigation slider-next"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal-confirm -->
        <div class="modal fade modal-big" id="modal-confirm">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content c-p-24">
                    <div class="modal-header">
                        <p class="modal-title center">Xác nhận thanh toán</p>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body c-px-0 c-py-24">
                        <div class="t-body-2 title-color c-mb-12">
                            Thông tin mua thẻ
                        </div>
                        <div class="card card-dark c-mb-16">
                            <div class="card-body c-py-4">
                                <div class="d-flex justify-content-between c-py-4">
                                    <div class="t-body-1 link-color">
                                        Loại thẻ
                                    </div>
                                    <div class="t-body-2 text-capitalize t-type-card">
                                        {{ @$key }}
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between c-py-4">
                                    <div class="t-body-1 link-color">
                                        Số lượng
                                    </div>
                                    <div class="t-body-2 t-quantity-card">
                                        01
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between c-py-4">
                                    <div class="t-body-1 link-color">
                                        Chiết khấu
                                    </div>
                                    <div class="t-body-2 t-discount-card">

                                    </div>
                                </div>

                                <div class="d-flex justify-content-between c-py-4">
                                    <div class="t-body-1 link-color">
                                        Mệnh giá
                                    </div>
                                    <div class="t-body-2 t-amount-card">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-dark c-mb-16">
                            <div class="card-body c-py-4">
                                <div class="d-flex justify-content-between c-py-4">
                                    <div class="t-body-1 link-color">
                                        Phương thức thanh toán
                                    </div>
                                    <div class="t-body-2">
                                        Tài khoản Shopbrand
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between c-py-4">
                                    <div class="t-body-1 link-color">
                                        Phí thanh toán
                                    </div>
                                    <div class="t-body-2">
                                        Miễn phí
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-dark">
                            <div class="card-body c-py-4">
                                <div class="d-flex justify-content-between c-py-4">
                                    <div class="t-body-1 link-color">
                                        Số tiền thanh toán
                                    </div>
                                    <div class="t-body-2 text-primary-color t-total-card">
                                        0đ
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn primary submit-payment">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Step confirm -->
        <div class="step" id="step-confirm">
            <div class="head-mobile">
                <a href="" class="link-back close-step"></a>

                <div class="head-title text-title">Xác nhận thanh toán</div>

                <a href="#" class="home"></a>
            </div>
            <div class="body-mobile c-px-16">
                <div class="t-sub-2 title-color c-mt-16 c-mb-12">
                    Thông tin mua thẻ
                </div>
                <div class="card c-px-12 c-py-4 c-mb-16">
                    <div class="d-flex justify-content-between c-py-4">
                        <div class="t-body-1 link-color">Loại thẻ</div>
                        <div class="t-body-2 t-type-card text-capitalize">{{ @$key }}</div>
                    </div>
                    <div class="d-flex justify-content-between c-py-4">
                        <div class="t-body-1 link-color">Số lượng</div>
                        <div class="t-body-2 t-quantity-card">01</div>
                    </div>
                    <div class="d-flex justify-content-between c-py-4">
                        <div class="t-body-1 link-color">Chiết khấu</div>
                        <div class="t-body-2 t-discount-card">0 %</div>
                    </div>
                    <div class="d-flex justify-content-between c-py-4">
                        <div class="t-body-1 link-color">Mệnh giá</div>
                        <div class="t-body-2 t-amount-card">0đ</div>
                    </div>
                </div>
                <div class="card c-px-12 c-py-4 c-mb-16">
                    <div class="d-flex justify-content-between c-py-4">
                        <div class="t-body-1 link-color">Phương thức thanh toán</div>
                        <div class="t-body-2">Tài khoản Shopbrand</div>
                    </div>
                    <div class="d-flex justify-content-between c-py-4">
                        <div class="t-body-1 link-color">Phí thanh toán</div>
                        <div class="t-body-2">Miễn phí</div>
                    </div>
                </div>
                <div class="card c-px-12 c-py-4">
                    <div class="d-flex justify-content-between c-py-4">
                        <div class="t-body-1 link-color">Số tiền thanh toán</div>
                        <div class="t-body-2 text-primary-color t-total-card">0đ</div>
                    </div>
                </div>
            </div>
            <div class="footer-mobile group-btn">
                <button class="btn primary submit-payment" type="button">Xác nhận</button>
            </div>
        </div>
        <!-- Modal Mua thất bại -->
        <div class="modal fade modal-328" id="modal-failed">
            <div class="modal-dialog modal-dialog-centered c-px-sm-16">
                <div class="modal-content">
                    <div class="modal-body text-center c-p-0">
                        <div class="banner">
                            <img width="143" height="114" class=""
                                 src="/assets/frontend/{{theme('')->theme_key}}/image/trong/modal-failed.png" alt="">
                        </div>
                        <p class="t-sub-1 title-color">Mua thẻ thất bại</p>
                        <span class="t-body-1 res-message">

                    </span>
                    </div>
                    <div class="modal-footer group-btn c-mt-24" style="--data-between: 12px">
                        <a href="/" class="btn primary">Trang chủ</a>

                        <button type="button" class="btn ghost" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal thành công -->
        <div class="modal fade modal-big" id="modal-success">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content c-p-24">
                    <div class="modal-header">
                        <h2 class="modal-title center">Mua thẻ thành công</h2>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                        <div class="t-body-2 title-color c-mb-12">
                            Thông tin thẻ đã mua
                        </div>
                        <div class="card card-dark c-mb-16">
                            <div class="card-body c-py-4">
                                <div class="justify-content-between d-flex c-py-4">
                                    <div class="link-color t-body-1">
                                        Loại thẻ
                                    </div>
                                    <div class="t-body-2 text-capitalize">{{ @$key }}</div>
                                </div>
                                <div class="justify-content-between d-flex c-py-4">
                                    <div class="link-color t-body-1">
                                        Mệnh giá
                                    </div>
                                    <div class="t-body-2 t-amount-card">0đ</div>
                                </div>
                                <div class="justify-content-between d-flex c-py-4">
                                    <div class="link-color t-body-1">
                                        Số lượng
                                    </div>
                                    <div class="t-body-2 t-quantity-card">01</div>
                                </div>
                            </div>
                        </div>

                        <div class="swiper slider--card">
                            <div class="swiper-wrapper wrap-card-bought-desktop">
                                <!-- JS PASTE HTML HERE -->
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="/" class="btn secondary">Trang chủ</a>
                        <a href="/mua-the" class="btn primary">Mua thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Step Thành công -->
        <span class="d-none js-step" data-target="#step-success"></span>
        <div class="step" id="step-success">
            <div class="head-mobile">
                <a href="" class="link-back close-step"></a>

                <div class="head-title text-title">Mua thẻ thành công</div>

                <a href="/" class="home"></a>
            </div>
            <div class="body-mobile c-px-16">
                <div class="t-sub-2 title-color c-my-16">
                    Thông tin thẻ đã mua
                </div>
                <div class="card c-mb-16">
                    <div class="card-body c-px-12 c-py-4">
                        <div class="d-flex justify-content-between c-py-4">
                            <div class="t-body-1 link-color">Loại thẻ</div>
                            <div class="t-body-2 text-capitalize">{{ @$key }}</div>
                        </div>
                        <div class="d-flex justify-content-between c-py-4">
                            <div class="t-body-1 link-color">Mệnh giá</div>
                            <div class="t-body-2 t-amount-card">0 đ</div>
                        </div>
                        <div class="d-flex justify-content-between c-py-4">
                            <div class="t-body-1 link-color">Số lượng</div>
                            <div class="t-body-2 t-quantity-card">01</div>
                        </div>
                    </div>
                </div>
                <div class="wrap-card-bought-mobile">
                    <!-- JS PASTE HTML HERE -->

                </div>
            </div>
            <div class="footer-mobile group-btn">
                <a href="/" class="btn secondary" type="button">Trang chủ</a>
                <a href="/mua-the" class="btn primary" type="button">Mua thêm</a>
            </div>
        </div>
@endsection
        @section('scripts')
            <script src="/assets/frontend/{{theme('')->theme_key}}/js/store-card-v2/main.js?v={{ time() }}"></script>
@endsection
