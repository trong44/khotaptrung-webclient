@extends('frontend.layouts.master')
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/trong-style/distance.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/trong-style/buy-card.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_trong.css">
@endsection
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['datakey'=>$value,'dataname'=>$key]))
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
    <div class="container-fix container" id="buy-card">
        {{--        BANNER --}}

        <div class="d-none d-lg-block">
            @include('frontend.widget.__banner__storecard')
        </div>


        {{--        END BANNER--}}
        {{--breadcrum--}}
        <ul class="breadcrum--list">
            <li class="breadcrum--item">
                <a href="/" class="breadcrum--link">Trang chủ</a>
            </li>
            <li class="breadcrum--item">
                <a href="/mua-the" class="breadcrum--link">Mua thẻ</a>
            </li>
            <li class="breadcrum--item">
                <a href="/mua-the-{{ $key }}" class="breadcrum--link">Mua thẻ {{ $key }}</a>
            </li>
            <li class="breadcrum--item">
                <a href="/mua-the-{{ $key }}-{{ $value }}" class="breadcrum--link">Mua thẻ {{ $key }} {{ $value }}</a>
            </li>
        </ul>
        {{-- end breadcrum--}}
        <div class="row mx-0">
            {{--            NAV CATEGORY--}}
            <div class="col-lg-3 d-none d-lg-block pl-0 _pr-125">
                <div class="card --custom card__nav">
                    <div class="card--head _py-075 pl-3">
                        <div class="card--title">Danh mục thẻ</div>
                    </div>
                    <div class="card--body">
                        <a class="section--card p-lg-3" data-toggle="collapse" href="#card--game__nav" role="button"
                           aria-expanded="true">
                            <span class="section--card__title">
                                THẺ GAME
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="__icon --arrow --path__custom"
                                   style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/arrows/arrow-down.png)"></i>
                            </span>
                        </a>
                        <ul class="collapse card-list show" id="card--game__nav">
                            {{--                            JS PASTE CODE HERE--}}
                            @if( $data_telecoms->status == 1 )
                                @forelse($data_telecoms->data as $telecom)
                                    @if(strtolower($telecom->key) == strtolower($key))
                                        @php
                                            $card_is = $telecom;
                                        @endphp
                                    @else
                                    @endif
                                    @if($telecom->params->teltecom_type == 2)
                                        <li class="card-item {{ strtolower($telecom->key) == strtolower($key) ? 'active' : '' }}">
                                            <a href="/mua-the-{{ strtolower($telecom->key) }}" class="card-item_link">
                                                <div class="card-item_thumb mr-2"><img
                                                        src="{{ \App\Library\MediaHelpers::media($telecom->image) }}"
                                                        alt="{{ $telecom->title }}"></div>
                                                <span class="card-item_name"
                                                      style="text-transform: capitalize;">thẻ {{ strtolower($telecom->title) }}</span>
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
                            <span class="section--card__title">
                                THẺ ĐIỆN THOẠI
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="__icon --arrow --path__custom"
                                   style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/arrows/arrow-down.png)"></i>
                            </span>
                        </a>
                        <ul class="collapse card-list show" id="card--phone__nav">
                            {{--                            JS PASTE CODE HERE--}}
                            @if($data_telecoms->status == 1 )
                                @forelse($data_telecoms->data as $telecom)
                                    @if(strtolower($telecom->key) == strtolower($key))
                                        @php
                                            $card_is = $telecom;
                                        @endphp
                                    @else
                                    @endif
                                    @if($telecom->params->teltecom_type != 2)
                                        <li class="card-item {{ strtolower($telecom->key) == strtolower($key) ? 'active' : '' }}">
                                            <a href="/mua-the-{{ strtolower($telecom->key) }}" class="card-item_link">
                                                <div class="card-item_thumb mr-2"><img
                                                        src="{{ \App\Library\MediaHelpers::media($telecom->image) }}"
                                                        alt="{{ $telecom->title }}"></div>
                                                <span class="card-item_name"
                                                      style="text-transform: capitalize;">thẻ {{ strtolower($telecom->title) }}</span>
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
            {{--            END NAV CATEGORY--}}

            {{--            PAGE CONTENT--}}
            <div class="col-12 col-lg-9 p-0 page--card__content">
                {{--                CARD SINGLE--}}
                <div class="card --custom _mb-125" id="card--value">
                    <div class="card--head card--mobile__title px-lg-3 _py-075">
                        <a href="/mua-the-{{ strtolower($key) }}" class="card--back d-lg-none d-block">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt="">
                        </a>
                        <h1 class="card--title text-capitalize">
                            Thẻ {{ $key }} {{ $value }}
                        </h1>
                    </div>
                    <div class="card--body p-lg-2 p-3">
                        <div class="row mx-lg-0" id="card--wrap__single">
                            {{--JS GENERATE HTML HERE--}}
                            @forelse($data_amounts->data as $amount)
                                @if(format_k($amount->amount) == strtolower($value))
                                    @php
                                        $amount_paid = $amount->amount - ($amount->amount * (100 - $amount->ratio_default)/100);
                                    @endphp
                                    <div class="col-12 col-lg-3 px-lg-2 mb-lg-4">
                                        <div class="col-8 col-lg-12 p-0">
                                            <div class="scratch-card card--single">
                                                <div class="card--thumb">
                                                    <img src="{{ \App\Library\MediaHelpers::media($card_is->image) }}"
                                                         class="card--thumb__image" alt=""></div>
                                                <div class="card--name"
                                                     style="--bg-color: {{ $card_is->params->color ?? 'var(--primary-color)' }};">{{str_replace(',','.',number_format($amount->amount))}}
                                                    VND
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card--deno my-lg-1" data-amount="{{ $amount->amount }}"
                                             data-ratio_default="{{ $amount->ratio_default }}"
                                             data-key="{{ strtolower($card_is->key) }}"> Mệnh
                                            giá {{str_replace(',','.',number_format($amount->amount))}} đ
                                        </div>
                                        <div class="card--unit__price"> Đơn
                                            giá: {{str_replace(',','.',number_format($amount_paid))}} đ
                                        </div>
                                        <div class="card--amount _mt-075"><span class="card--amount__title">           Số lượng        </span>
                                            <div class="card--amount__group">
                                                <button class="btn--amount -minus js-amount"
                                                        data-action="minus"></button>
                                                <input type="text" name="card-amount" class="input--amount" value="1"
                                                       numberic="">
                                                <button class="btn--amount -add js-amount" data-action="add">
                                                    <!--                <img src="/assets/frontend/theme_3/image/icons/add.png" alt="">-->            </button>
                                            </div>
                                        </div>
                                        @if(\App\Library\AuthCustom::check())
                                            <button type="button" class="btn -secondary w-100 _mt-075 btn-buy-card d-none d-lg-block" data-toggle="modal" data-target="#modal--confirm__payment">Chọn mua</button>
                                            <button type="button" class="btn -secondary w-100 _mt-075 btn-buy-card d-block d-lg-none js_step" data-toggle="modal" data-go_to="step2">Chọn mua</button>
                                        @else
                                            <button type="button" class="btn -secondary w-100 _mt-075" onclick="openLoginModal()">Chọn mua</button>
                                        @endif
                                    </div>
                                @else
                                @endif
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                {{--                CARD SINGLE--}}
                {{--                SERVICE DESC--}}
                {{--                <div class="card --custom p-3 p-lg-3 _mb-125">--}}
                {{--                    <h2 class="card--desc__title mb-4">--}}
                {{--                        Mô tả dịch vụ--}}
                {{--                    </h2>--}}
                {{--                    <div class="card--desc__content content-video-in-add p-0">--}}
                {{--                        {!! setting('sys_store_card_content') !!}--}}
                {{--                    </div>--}}
                {{--                    <div class="col-md-12 left-right text-center js-toggle-content">--}}
                {{--                        <div class="view-more">--}}
                {{--                            <span class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/arrow-down.png)"></i></span>--}}
                {{--                        </div>--}}
                {{--                        <div class="view-less" style="display: none;">--}}
                {{--                            <span class="global__link">Thu gọn<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/iconright.png)"></i></span>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                END SERVICE DESC--}}

                {{--                SAME KIND--}}
                <div class="card --custom _mb-125 _mb-sm-075" id="card--same">
                    <div class="card--head px-3 px-lg-3 _py-075">
                        <h2 class="card--title">
                            Sản phẩm cùng loại
                        </h2>
                    </div>
                    <div class="card--body px-3 py-3 py-lg-2 px-lg-3">
                        <div class="swiper card--other__swipe overflow-hidden">
                            <div class="swiper-wrapper" id="card--same__wrapper">
                                {{--JS GENERATE HTML HERE--}}
                                @forelse($data_amounts->data as $amount)
                                    @if(format_k($amount->amount) != strtolower($value))
                                        <div class="swiper-slide">
                                            <a href="/mua-the-{{ strtolower($key) }}-{{ format_k($amount->amount) }}" class="scratch-card">
                                                <div class="card--thumb"><img src="{{ \App\Library\MediaHelpers::media($card_is->image) }}" class="card--thumb__image" alt=""></div>
                                                <div class="card--name"
                                                     style="--bg-color: {{ $card_is->params->color ?? 'var(--primary-color)' }};text-transform: capitalize"> {{str_replace(',','.',number_format($amount->amount))}} VND
                                                </div>
                                            </a>
                                        </div>
                                    @else
                                    @endif
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                {{--                END SAME KIND--}}
                {{--            SERVICE RELATED--}}
                <div class="card --custom _mb-125 _mb-sm-075 p-3 p-lg-0" id="service-related">
                    @include('frontend.widget.__list_serve_remark_image')
                </div>
                {{--            END SERVICE RELATED--}}
            </div>
            {{--            END PAGE CONTENT--}}
        </div>
    </div>
    <!-- Xác Nhận Thanh Toán Mobile-->
    <div class="mobile--confirm__payment step">
        <div class="step--header">
            <a href="" class="step--back js_step" data-go_to="step1">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt="">
            </a>
            <div class="step--header__title">
                Xác nhận thanh toán
            </div>
        </div>
        <div class="step--content">
            <div class="card--gray">
                <div class="card--attr">
                    <div class="card--attr__name">
                        Loại thẻ
                    </div>
                    <div class="card--attr__value">
                        <div class="card--logo">
                            <img src="{{ \App\Library\MediaHelpers::media($card_is->image) }}" alt=""
                                 id="detail--logo__mobile">
                        </div>
                    </div>
                </div>
                <div class="card--attr">
                    <div class="card--attr__name">
                        Mệnh giá
                    </div>
                    <div class="card--attr__value" id="detail--deno__mobile">
                        10.000 đ
                    </div>
                </div>
                <div class="card--attr">
                    <div class="card--attr__name">
                        Số lượng
                    </div>
                    <div class="card--attr__value" id="detail--quantity__mobile">
                        01
                    </div>
                </div>
                <div class="card--attr">
                    <div class="card--attr__name">
                        Chiết khấu
                    </div>
                    <div class="card--attr__value" id="detail--discount__mobile">
                        3%
                    </div>
                </div>
            </div>
            <div class="card--gray">
                <div class="card--attr">
                    <div class="card--attr__name">
                        Phương thức thanh toán
                    </div>
                    <div class="card--attr__value -bold -primary">
                        Tài khoản Shopbrand
                    </div>
                </div>
                <div class="card--attr">
                    <div class="card--attr__name">
                        Phí thanh toán
                    </div>
                    <div class="card--attr__value -bold">
                        Miễn phí
                    </div>
                </div>
            </div>
            <div class="card--gray">
                <div class="card--attr">
                    <div class="card--attr__name -bold">
                        Số tiền thanh toán
                    </div>
                    <div class="card--attr__value -bold" id="detail--total__mobile">
                        9.700 đ
                    </div>
                </div>
            </div>
            <button type="button" class="btn -primary btn-big -ps__end js-send-data">Xác nhận</button>
        </div>
    </div>
    <!-- Modal Xác Nhận Thanh Toán-->
    <div class="modal fade" id="modal--confirm__payment" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered animated">
            <div class="modal-content -custom dialog">
                <div class="dialog--header">
                    <div class="dialog--header__title">
                        Xác nhận nạp thẻ
                    </div>
                    <button type="button" class="close dialog__close" data-dismiss="modal">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/close.png" alt="">
                    </button>
                </div>
                <div class="dialog--content">
                    <div class="dialog--content__title">
                        Thông tin mua thẻ
                    </div>
                    <div class="card--gray">
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Loại thẻ
                            </div>
                            <div class="card--attr__value">
                                <div class="card--logo">
                                    <img src="{{ \App\Library\MediaHelpers::media($card_is->image) }}" alt="" id="detail--logo__card" data-key="{{ strtolower($card_is->key) }}">
                                </div>
                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Mệnh giá
                            </div>
                            <div class="card--attr__value" id="detail--deno__card">
                                10.000 đ
                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Số lượng
                            </div>
                            <div class="card--attr__value" id="detail--quantity__card">
                                01
                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Chiết khấu
                            </div>
                            <div class="card--attr__value" id="detail--discount__card">
                                3%
                            </div>
                        </div>
                    </div>
                    <div class="card--gray">
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Phương thức thanh toán
                            </div>
                            <div class="card--attr__value">
                                Tài khoản Shopbrand
                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Phí thanh toán
                            </div>
                            <div class="card--attr__value">
                                Miễn phí
                            </div>
                        </div>
                    </div>
                    <div class="card--gray">
                        <div class="card--attr__total">
                            <div class="card--attr__name">
                                Tổng thanh toán
                            </div>
                            <div class="card--attr__value" id="detail--total__card">
                                9.700 đ
                            </div>
                        </div>
                    </div>
                    {{--                    <button type="submit" class="btn -primary btn-big" data-dismiss="modal" data-toggle="modal" data-target="#modal--success__payment">Xác nhận</button>--}}
                    <button type="button" class="btn -primary btn-big js-send-data">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Thanh Toán Thành Công Mobile-->
    <div class="mobile--success__payment step">
        <div class="step--header">
            <a href="" class="step--back js_step" data-go_to="step2">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt="">
            </a>
            <div class="step--header__title">
                Mua thẻ thành công
            </div>
        </div>
        <div class="step--content">
            <div class="card--gray card__notify">
                <div class="card__message">
                    Chúc mừng bạn đã giao dịch thành công
                </div>
                <div class="card--success__icon">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/success.png" alt="">
                </div>
            </div>
            <div class="step--content__title">
                Thông tin thẻ
            </div>
            <div class="card--list">
                {{--                JS PASTE HTML HERE--}}
            </div>
            <div class="step--content__end">
                <a href="/" class="btn -secondary btn-big">Về trang chủ</a>
                <a href="/mua-the" class="btn -primary btn-big">Mua thêm</a>
            </div>
        </div>
    </div>
    <!-- Thanh Toán Không Thành Công Mobile-->
    <div class="mobile--fail__payment step" style="display: none">
        <div class="step--header">
            <a href="" class="step--back js_step" data-go_to="step2">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt="">
            </a>
            <div class="step--header__title">
                Mua thẻ không thành công
            </div>
        </div>
        <div class="step--content">
            <div class="card--gray card__notify">
                <div class="card__message">
                    Rất tiếc, giao dịch của bạn đã thất bại
                </div>
                <div class="card--success__icon">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/reject.png" alt="">
                </div>
            </div>
            <div class="step--content__end">
                <a href="/" class="btn -secondary btn-big">Về trang chủ</a>
                <a href="/nap-tien" class="btn -primary btn-big">Nạp tiền</a>
            </div>
        </div>
    </div>
    <!-- Modal Mua Thành Công-->
    <div class="modal fade" id="modal--success__payment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content -custom dialog">
                <div class="dialog--header">
                    <div class="dialog--header__title">
                        Mua thẻ thành công
                    </div>
                    <button type="button" class="close dialog__close" data-dismiss="modal">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/close.png" alt="">
                    </button>
                </div>
                <div class="dialog--content">
                    <div class="card--gray card__notify">
                        <div class="card__message">
                            Chúc mừng bạn đã giao dịch thành công
                        </div>
                        <div class="card--success__icon">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/success.png" alt="icon">
                        </div>
                    </div>
                    <div class="dialog--content__title">
                        Thông tin thẻ
                    </div>
                    <div class="card--gray">
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Loại thẻ
                            </div>
                            <div class="card--attr__value">
                                <div class="card--logo">
                                    <img src="{{ \App\Library\MediaHelpers::media($card_is->image) }}"
                                         class="telecom__logo" alt="logo">
                                </div>
                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Mệnh giá
                            </div>
                            <div class="card--attr__value card--attr__deno">
                                10.000 đ
                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Số lượng
                            </div>
                            <div class="card--attr__value card--attr__quantity">
                                01
                            </div>
                        </div>
                    </div>
                    <div class="swiper slider--card">
                        <div class="swiper-wrapper">
                            <!-- JS PASTE CODE HERE -->
                        </div>
                    </div>
                    <button type="button" class="btn -primary btn-big" data-dismiss="modal">Mua thêm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Mua Thất Bại-->
    <div class="modal fade login show default-Modal" id="modal--fail__payment" aria-modal="true">
        <div class="modal-dialog modal-md modal-dialog-centered login animated">
            <!--        <div class="image-login"></div>-->
            <div class="modal-content">
                <div class="modal-header modal-header-success-ct">
                    <div class="row marginauto modal-header-success-row-ct text-center">
                        <div class="col-md-12 text-center" style="position: relative">
                            <span>Mua thẻ không thành công</span>
                            <div class="close" data-dismiss="modal" aria-label="Close">
                                <img class="lazy img-close-ct close-modal-default"
                                     src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body modal-body-success-ct">
                    <div class="row marginauto justify-content-center">
                        <div class="col-auto">
                            <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/reject.png"
                                 alt="">
                        </div>
                    </div>
                    <div class="row marginauto modal-body-span-success-ct justify-content-center">
                        <div class="col-md-12 left-right text-center">
                            <span style="font-size: 14px" id="message--error--buy"></span>
                        </div>

                    </div>
                    <div class="row marginauto justify-content-center modal-footer-success-ct">

                        <div class="col-md-12 col-6 modal-footer-success-col-right-ct">
                            <div class="row marginauto modal-footer-success-row-ct">
                                <div class="col-md-12 left-right">
                                    <a href="javascript:void(0)" class="button-bg-ct"
                                       style="display: flex;justify-content: center"
                                       data-dismiss="modal"><span>Đóng</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/storecard-v2/buy-card.js?v={{time()}}"></script>--}}
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/storecard-v2/script_trong.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/storecard-v2/input.js"></script>
@endsection
