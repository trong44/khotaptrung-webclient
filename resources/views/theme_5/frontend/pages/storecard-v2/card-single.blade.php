@extends('frontend.layouts.master')
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/trong/buy-card-v2.css">
@endsection
@section('content')
    <div class="c-container container">
        <!-- head mobile -->
        <div class="head-mobile">
            <a href="/mua-the-{{@$key}}" class="link-back"></a>

            <h1 class="head-title t-sub-2 text-capitalize">
                Thẻ {{ @$key }} {{ @$value }}
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
                <a href="/mua-the-{{ @$key }}" class="breadcrumb-link text-capitalize">Thẻ {{ @$key }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="" class="breadcrumb-link text-capitalize">Thẻ {{ @$key }} {{ @$value }}</a>
            </li>
        </ul>
        <!-- end breadcrum -->
        <!-- Banner -->
    @include('frontend.widget.__slider__banner__napthe')
    <!-- End -->
        <div class="c-mt-32 d-block d-lg-none">
            <p class="t-title-1 c-mb-0 c-pb-8 text-capitalize">
                Thẻ {{ @$key }} {{ @$value }}
            </p>
            <hr class="c-mx-n16">
        </div>
        <div class="content-wrap c-mt-24">
            <!-- Nav danh mục -->
            <div class="nav-buy-card c-mb-16 d-none d-lg-block">
                <div class="card">
                    <div class="c-px-16 c-py-12">
                        <div class="t-title-1 title-color">Danh mục thẻ</div>
                    </div>
                    <div class="card-body c-p-0">
                        <a class="section--card p-lg-3" data-toggle="collapse" href="#card--game__nav" role="button" aria-expanded="true">
                            <span class="t-sub-1">
                                THẺ GAME
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="icon-default size-20" style="--path : url(/assets/frontend/theme_5/image/svg/arrow-down.svg)"></i>
                            </span>
                        </a>
                        <ul class="collapse card-list show is-load" id="card--game__nav">
                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                            <!-- JS PASTE HTML HERE -->
                        </ul>

                        <a class="section--card p-lg-3" data-toggle="collapse" href="#card--phone__nav" role="button" aria-expanded="true">
                            <span class="t-sub-1">
                                THẺ ĐIỆN THOẠI
                            </span>
                            <span class="d-flex align-items-center">
                                <i class="icon-default size-20" style="--path : url(/assets/frontend/theme_5/image/svg/arrow-down.svg)"></i>
                            </span>
                        </a>
                        <ul class="collapse card-list show is-load" id="card--phone__nav">
                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                            <!-- JS PASTE HTML HERE -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End nav danh mục -->
            {{--            PAGE CONTENT--}}
            <div class="page--card__content">
                <!-- Các mệnh giá thẻ -->
                <div class="row c-mx-n8">

                    <div class="col-12 col-lg-3 c-px-8 c-mb-16 list-card is-load" id="card-single">
                        <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                        <!-- JS PASTE HTML HERE -->
                    </div>
                    <!-- Desktop -->
                    <div class="col-12 col-lg-9 c-pl-24 d-none d-lg-block">
                        <div class="t-title-2 c-mb-12">
                            Thẻ Garena là gì ?
                        </div>
                        <span class="t-body-1">
                                Nạp mỗi thẻ  Garena 20.000 đ trong tài khoản Garena của bạn. Bạn có thể sử dụng Xu cho tất cả các game do Garena phát hành.
                            <br>
                            <br>
                                Khách hàng ở Việt Nam có thể sử dụng thẻ ATM nội địa (đã đăng ký Internet banking) hoặc thẻ tín dụng Visa, Master để mua Zing Card
                            <br>
                            <br>
                                Khách hàng ở ngoài nước có thể mua thẻ Zing bằng Paypal, thẻ Visa và MasterCard
                        </span>
                    </div>

                    <!-- Mobile -->
                    <div class="col-12 c-px-0 d-block d-lg-none">
                        <div class="card">
                            <div class="card-body c-p-16">
                                <div class="t-title-2 c-mb-12">
                                    Thẻ Garena là gì ?
                                </div>
                                <span class="t-body-1">
                                Nạp mỗi thẻ  Garena 20.000 đ trong tài khoản Garena của bạn. Bạn có thể sử dụng Xu cho tất cả các game do Garena phát hành.
                            <br>
                            <br>
                                Khách hàng ở Việt Nam có thể sử dụng thẻ ATM nội địa (đã đăng ký Internet banking) hoặc thẻ tín dụng Visa, Master để mua Zing Card
                            <br>
                            <br>
                                Khách hàng ở ngoài nước có thể mua thẻ Zing bằng Paypal, thẻ Visa và MasterCard
                        </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-other c-mb-16 unset-lg">
                    <div class="card-body c-px-16 c-px-lg-0 c-py-0">
                        <h2 class="t-title-2 c-py-12">
                            Thẻ cùng loại
                        </h2>
                        <hr>
                        <div class="swiper swiper-card c-my-12">
                            <div class="swiper-wrapper is-load" id="card-other">
                                <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                                <!-- JS PASTE HTML HERE -->
                            </div>
                        </div>
                        <div class="navigation slider-prev"></div>
                        <div class="navigation slider-next"></div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" value="detail" data-key="{{ @$key }}" data-amount="{{@$value}}" id="is_view">

        <!-- Modal-confirm -->
        <div class="modal fade modal-big" id="modal-confirm">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content c-p-24">
                    <div class="modal-header">
                        <h2 class="modal-title center">Xác nhận thanh toán</h2>
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
        <span class="d-none js-step" data-target="#step-confirm"></span>
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
                        <div class="t-body-2 t-type-card">Zing</div>
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
                            <img width="143" height="114" class="" src="/assets/frontend/{{theme('')->theme_key}}/image/trong/modal-failed.png" alt="">
                        </div>
                        <p class="t-sub-1 title-color">Mua thẻ thất bại</p>
                        <span class="t-body-1 res-message">

                    </span>
                    </div>
                    <div class="modal-footer group-btn c-mt-24" style="--data-between: 12px">
                        <button type="button" class="btn ghost" data-dismiss="modal">Đóng</button>
                        <a href="/nap-tien" class="btn primary">Nạp tiền</a>
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
            <script src="/assets/frontend/{{theme('')->theme_key}}/js/store-card-v2/main.js"></script>
@endsection