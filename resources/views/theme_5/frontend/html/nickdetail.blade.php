@extends('frontend.layouts.master')

@section('content')

    <form id="formBookingStepMobie" action="" method="POST">
        {{csrf_field()}}

        <fieldset id="fieldset-one">
            {{--  Header mobile  --}}
            <section class="media-mobile">
                <div class="container container-fix banner-mobile-container-ct">

                    <div class="row marginauto banner-mobile-row-ct">
                        <div class="col-auto left-right" style="width: 10%">
                            <a href="" class="previous-step-one" style="line-height: 28px">
                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/back.png" alt="" >
                            </a>
                        </div>

                        <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                            <h3>Danh sách Nick</h3>
                        </div>
                        <div class="col-auto left-right" style="width: 10%">
                        </div>
                    </div>

                </div>
            </section>

            {{--    Banner--}}

            {{--  Menu  --}}
            <section class="media-web">
                <div class="container container-fix menu-container-ct">
                    <ul>
                        <li><a href="">Trang chủ</a></li>
                        <li class="menu-container-li-ct"><img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/arrow-right.png" alt=""></li>
                        <li class="menu-container-li-ct"><a href="">Danh mục Shop Account</a></li>
                        <li class="menu-container-li-ct"><img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/arrow-right.png" alt=""></li>
                        <li class="menu-container-li-ct"><a href="">Liên quân mobile</a></li>
                        <li class="menu-container-li-ct"><img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/arrow-right.png" alt=""></li>
                        <li class="menu-container-li-ct"><a href="">Chi tiết Nick</a></li>
                    </ul>
                </div>
            </section>

            {{--   Bopđyy --}}
            <section>
                <div class="container container-fix body-container-ct">

{{--                    Web mobile --}}
                    <div class="row marginauto body-container-row-ct body-container-row-mobile-ct media-web">

                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-row-nick-detail-ct">

                                <div class="col-md-12 left-right">
                                    <div class="row marginauto body-header-nick-detail-ct">
                                        <div class="col-auto left-right">
                                            <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/caythue.png" alt="">
                                        </div>
                                        <div class="col-md-10 col-10 body-header-col-ct">
                                            <h3>Chi tiết Nick</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right" id="showdetailacc">
                                    <div class="row marginauto">
                                        <div class="col-lg-6 col-md-12 left-right">
                                            <div class="row marginauto">
                                                <div class="col-lg-12 col-md-12 left-right">
                                                    <div class="gallery" style="overflow: hidden">
                                                        <div class="swiper gallery-slider swiper-container-horizontal">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="swiper-slide">
                                                                    <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                                                    </a>
                                                                </div>
                                                            </div>

                                                            <div class="swiper-button-prev">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/back-detail.png" alt="">
                                                            </div>
                                                            <div class="swiper-button-next">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/pew-detail.png" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 left-right gallery-thumb-nick">
                                                    <div class="gallery-thumb" style="overflow: hidden">
                                                        <div class="swiper gallery-thumbs gallery-thumbsmaxheadth swiper-container-horizontal">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 gallery-footer">
                                                    <div class="row marginauto gallery-footer-row">
                                                        <div class="col-auto left-right">
                                                            <ul>
                                                                <li class="gallery-footer-fisrt-li">
                                                                    240.00đ
                                                                </li>
                                                                <li class="gallery-footer-two-li">
                                                                    160.000đ
                                                                </li>
                                                                <li class="gallery-footer-three-li">
                                                                    <span>Giảm 66%</span>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-12 gallery-footer-bottom">
                                                    <div class="row marginauto gallery-footer-row-bottom">
                                                        <div class="col-auto left-right">
                                                            <span>Rẻ vô đối, giá tốt nhất thị trường</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 left-right col-md-12">
                                            <div class="row marginauto">
                                                <div class="col-md-12 order-lg-1 order-12 left-right">
                                                    <div class="row marginauto gallery-right">
                                                        <div class="col-md-12 left-right">
                                                            <div class="row marginauto gallery-right-top">
                                                                <div class="col-md-12 left-right gallery-last-child">

                                                                    <div class="row marginauto gallery-right-top-header">
                                                                        <div class="col-md-12 left-right">
                                                                            <span>Mã số: 131590</span>
                                                                        </div>
                                                                        <div class="col-md-12 left-right">
                                                                            <small>MỤC: ACC FREE FIRE VIP - TỰ CHỌN</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-title">
                                                                        <div class="col-md-12 left-right">
                                                                            <span>Thông tin acc</span>
                                                                        </div>
                                                                    </div>

                                                                    {{--                                                    bat dau vonh lap   --}}

                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Rank</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>TINH ANH</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-white gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Tướng</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>91</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Trang phục</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>126</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-white gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Ngọc 90</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>Có</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Nick có tướng trong đá quý</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>Có</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-white gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Nick có trang phục trong đá quý</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>Có</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Nổi bật</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>Acc liên kết sđt đổi được</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 order-lg-12 order-1 left-right">
                                                    <div class="row marginauto justify-content-center gallery-right-footer">
                                                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                            <div class="row marginauto">
                                                                <div class="col-md-12 left-right">
                                                                    <button type="button" class="button-default-not-nick-ct media-web">Trả góp</button>
                                                                    <button type="button" class="button-default-not-nick-ct media-mobile button-next-step-one-tra-gop">Trả góp</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                                            <div class="row marginauto">
                                                                <div class="col-md-12 left-right">
                                                                    <button type="button" class="button-default-nick-ct media-web">Mua ngay</button>
                                                                    <button type="button" class="button-default-nick-ct media-mobile button-next-step-one">Mua ngay</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row marginauto justify-content-center gallery-right-footer">
                                                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                            <div class="row marginauto nick-detail-button">
                                                                <div class="col-md-12 left-right">
                                                                    <a href="/" class="button-not-bg-ct">
                                                                        <ul>
                                                                            <li><small>Thẻ cào</small></li>
                                                                            <li><span>300.000 đ</span></li>
                                                                        </ul>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                                            <div class="row marginauto nick-detail-button">
                                                                <div class="col-md-12 left-right">
                                                                    <a href="/" class="button-not-bg-ct">
                                                                        <ul>
                                                                            <li><small>ATM, Momo</small></li>
                                                                            <li><span>240.000 đ</span></li>
                                                                        </ul>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

{{--                    Mobile    --}}
                    <div class="row marginauto body-container-row-ct body-container-row-mobile-ct media-mobile">

                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-row-nick-detail-ct">
                                <div class="col-md-12 left-right">
                                    <div class="row marginauto body-header-nick-detail-title-mobile body-header-nick-detail-ct">
                                        <div class="col-auto left-right">
                                            <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/caythue.png" alt="">
                                        </div>
                                        <div class="col-md-10 col-10 body-header-col-ct">
                                            <h3>Chi tiết Nick</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 left-right">
                            <div class="gallery" style="overflow: hidden">
                                <div class="swiper gallery-slider swiper-container-horizontal">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="swiper-slide">
                                            <a data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-row-nick-detail-ct">

                                <div class="col-md-12 left-right" id="showdetailacc">
                                    <div class="row marginauto">
                                        <div class="col-12 left-right">
                                            <div class="row marginauto">

                                                <div class="col-lg-12 col-md-12 left-right gallery-thumb-nick">
                                                    <div class="gallery-thumb" style="overflow: hidden">
                                                        <div class="swiper gallery-thumbs gallery-thumbsmaxheadth swiper-container-horizontal">
                                                            <div class="swiper-wrapper">
                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>

                                                                <div class="swiper-slide">
                                                                    <a class="" data-fancybox="gallerycoverDetail" href="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg">
                                                                        <div class="row marginauto">
                                                                            <div class="col-md-12 left-right default-overlay-ct">
                                                                                <img src="https://media-tt.nick.vn/storage/upload/product-acc/864/images/0qBPw7AiOQ_1632531413.jpg" alt="" class="lazy">
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 gallery-footer">
                                                    <div class="row marginauto gallery-footer-row">
                                                        <div class="col-auto left-right">
                                                            <ul>
                                                                <li class="gallery-footer-fisrt-li">
                                                                    240.00đ
                                                                </li>
                                                                <li class="gallery-footer-two-li">
                                                                    160.000đ
                                                                </li>
                                                                <li class="gallery-footer-three-li">
                                                                    <span>Giảm 66%</span>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-12 gallery-footer-bottom">
                                                    <div class="row marginauto gallery-footer-row-bottom">
                                                        <div class="col-auto left-right">
                                                            <span>Rẻ vô đối, giá tốt nhất thị trường</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 left-right">
                                            <div class="row marginauto">
                                                <div class="col-md-12 order-lg-1 order-12 left-right">
                                                    <div class="row marginauto gallery-right">
                                                        <div class="col-md-12 left-right">
                                                            <div class="row marginauto gallery-right-top">
                                                                <div class="col-md-12 left-right gallery-last-child">

                                                                    <div class="row marginauto gallery-right-top-header">
                                                                        <div class="col-md-12 left-right">
                                                                            <span>Mã số: 131590</span>
                                                                        </div>
                                                                        <div class="col-md-12 left-right">
                                                                            <small>MỤC: ACC FREE FIRE VIP - TỰ CHỌN</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-title">
                                                                        <div class="col-md-12 left-right">
                                                                            <span>Thông tin acc</span>
                                                                        </div>
                                                                    </div>

                                                                    {{--                                                    bat dau vonh lap   --}}

                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Rank</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>TINH ANH</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-white gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Tướng</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>91</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Trang phục</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>126</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-white gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Ngọc 90</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>Có</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Nick có tướng trong đá quý</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>Có</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-white gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Nick có trang phục trong đá quý</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>Có</span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row marginauto gallery-right-top-body-black gallery-right-top-body-span">
                                                                        <div class="col-auto gallery-col-auto-left left-right">
                                                                            <small>Nổi bật</small>
                                                                        </div>
                                                                        <div class="col-auto gallery-col-auto-right left-right">
                                                                            <span>Acc liên kết sđt đổi được</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 order-lg-12 order-1 left-right">
                                                    <div class="row marginauto justify-content-center gallery-right-footer">
                                                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                            <div class="row marginauto">
                                                                <div class="col-md-12 left-right">
                                                                    <button type="button" class="button-default-not-nick-ct media-web">Trả góp</button>
                                                                    <button type="button" class="button-default-not-nick-ct media-mobile button-next-step-one-tra-gop">Trả góp</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                                            <div class="row marginauto">
                                                                <div class="col-md-12 left-right">
                                                                    <button type="button" class="button-default-nick-ct media-web">Mua ngay</button>
                                                                    <button type="button" class="button-default-nick-ct media-mobile button-next-step-one">Mua ngay</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row marginauto justify-content-center gallery-right-footer">
                                                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                                            <div class="row marginauto nick-detail-button">
                                                                <div class="col-md-12 left-right">
                                                                    <a href="/" class="button-not-bg-ct">
                                                                        <ul>
                                                                            <li><small>Thẻ cào</small></li>
                                                                            <li><span>300.000 đ</span></li>
                                                                        </ul>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                                            <div class="row marginauto nick-detail-button">
                                                                <div class="col-md-12 left-right">
                                                                    <a href="/" class="button-not-bg-ct">
                                                                        <ul>
                                                                            <li><small>ATM, Momo</small></li>
                                                                            <li><span>240.000 đ</span></li>
                                                                        </ul>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section>
                <div class="container container-fix body-container-ct">
                    <div class="row marginauto body-container-row-ct">
                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-row-ct footer-row-ct">
                                <div class="col-md-12 left-right">
                                    <span>Mô tả sản phẩm Nick Liên quân mobile | Mã số: 121590</span>
                                </div>
                                <div class="col-md-12 left-right footer-row-col-ct content-video-in">
                                    <p><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif; font-variant-east-asian:normal; font-variant-numeric:normal; white-space:pre-wrap">Xã hội ngày càng phát triển, đời sống tinh thần được quan tâm và chú trọng nhiều hơn. Các trò chơi điện tử trực tuyến được ra đời nhằm mục đích giải trí và thư giãn sau những giờ học và làm việc mệt mỏi đầy áp lực. Kích thích tâm trí phát triển và sáng tạo, kéo theo sự phát triển của ngành công nghiệp sản xuất game online - đặc biệt là các game mobile với nhiều hình thức khác nhau như game đối kháng, game chiến thuật,&nbsp; game thẻ bài, game kiếm hiệp hay game sinh tồn. Vì lẽ ấy mà nhu cầu </span><span style="font-family:Arial,Helvetica,sans-serif; font-variant-east-asian:normal; font-variant-numeric:normal; white-space:pre-wrap"><em>nạp game, mua nick, mua bán thẻ hay trò chơi thử may cùng những dịch vụ hấp dẫn</em></span><span style="font-family:Arial,Helvetica,sans-serif; font-variant-east-asian:normal; font-variant-numeric:normal; white-space:pre-wrap"> là không thể thiếu và ngày càng tăng cao đặc biệt là gen Z hiện nay - những vật phẩm đua top trend hay những kiện tướng xuất sắc muốn có được khi các game thủ chinh phục ván game của mình. Cùng </span><span style="font-family:Arial,Helvetica,sans-serif; font-variant-east-asian:normal; font-variant-numeric:normal; white-space:pre-wrap"><strong style="font-weight:700">WEBNICK.VN</strong></span><span style="font-family:Arial,Helvetica,sans-serif; font-variant-east-asian:normal; font-variant-numeric:normal; white-space:pre-wrap"> tìm hiểu cụ thể các thông tin và dịch vụ </span><span style="font-family:Arial,Helvetica,sans-serif; font-variant-east-asian:normal; font-variant-numeric:normal; white-space:pre-wrap"><strong style="font-weight:700">WEBNICK.VN</strong></span><span style="font-family:Arial,Helvetica,sans-serif; font-variant-east-asian:normal; font-variant-numeric:normal; white-space:pre-wrap">&nbsp; mang lại nhé !</span></span></span></p>

                                    <p style="line-height:1.38"><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-variant:normal; white-space:pre-wrap"><strong style="font-weight:700"><em style="font-style:italic"><span style="text-decoration:none">Các dịch vụ đặc biệt đến từ webkick.vn</span></em></strong></span></span></span></span></p>

                                    <p style="line-height:1.38"><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-variant:normal; white-space:pre-wrap"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Các dịch vụ độc đáo và duy nhất đến từ WEBNICK.VN như: <em>bán acc all game</em>, </span></span></span></span><span style="font-variant:normal; white-space:pre-wrap"><span style="font-weight:400"><em style="font-style:italic"><span style="text-decoration:none">bán vàng, bán ngọc, làm phiếu giảm giá, </span></em></span></span><span style="font-variant:normal; white-space:pre-wrap"><span style="font-weight:400"><em style="font-style:italic"><span style="text-decoration:none">làm thuê Capsule vàng, cày thuê tốc chiến, mua skin, nạp kim cương, nạp quân huy,... </span></em></span></span><span style="font-variant:normal; white-space:pre-wrap"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Tất cả được hỗ trợ 24/24 bởi đội ngũ chuyên nghiệp của chúng tôi. Bất cứ khi nào bạn cần WEBNICK.VN luôn sẵn sàng phục vụ !&nbsp;</span></span></span></span></span></span></span></p>

                                    <p style="line-height:1.38; margin-bottom:16px"><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-variant:normal; white-space:pre-wrap"><strong style="font-weight:700"><em style="font-style:italic"><span style="text-decoration:none">Đến với Webnick.vn sự lựa chọn hàng đầu cho việc nạp game, hay mua bán nick cùng các dịch vụ khác</span></em></strong></span></span></span></span></p>

                                    <p style="line-height:1.38; margin-bottom:16px"><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-variant:normal; white-space:pre-wrap"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Mục đích được xuất phát từ tâm lý nên hiện nay, có rất nhiều địa chỉ nạp tiền vào game hay mua bán nick cùng những dịch vụ hấp dẫn như: các group, fanpage facebook, các nhóm zalo hay các website nạp game trực tuyến,... Tuy nhiên, giữa vô vàn địa chỉ kể trên, thì người chơi khi nạp tiền vào game, mua bán nick không tránh khỏi những địa chỉ kém uy tín, bị lừa đảo trong quá trình nạp game, mua nick hay trao đổi các dịch vụ khác. Vì lẽ ấy, các game thủ phải cực kỳ tỉnh táo để lựa chọn những website uy tín, chuyên nạp game, mua bán nick cùng dịch vụ hấp dẫn chính hãng, uy tín, giá rẻ để thực hiện giao dịch.&nbsp;</span></span></span></span></span></span></span></p>

                                    <p style="line-height:1.38; margin-bottom:16px"><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-variant:normal; white-space:pre-wrap"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Xuất phát từ tâm lý khách hàng WEBNICK.VN đã ra đời nhằm mục đích chăm sóc và phục vụ những mong muốn và yêu cầu của khách hàng. Website WEBNICK.VN đã sẵn sàng xử lý và phục vụ các game thủ. Một trong những website uy tín, chất lượng chuyên cung cấp tiền nạp game, mua bán nick cùng dịch vụ uy tín, đảm bảo 100%. Hằng ngày, tại website thực hiện hơn 30.000+ giao dịch&nbsp; thành công của nhiều game thủ từ trong và ngoài nước.</span></span></span></span></span></span></span></p>

                                    <p style="line-height:1.38; margin-bottom:5px"><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-variant:normal; white-space:pre-wrap"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Với dịch vụ đa dạng, phong phú của nhiều game như: nạp Quân huy Liên Quân, nạp kc BnS, nạp UC PUBG Mobile, mua Xu ninja school, mua Ngọc NRO, mua vàng NRO, nạp kim cương free fire, nạp Play Together, mua Robux, .... Thời gian giao dịch và nhận tiền game trong game chưa đến 60 giây. Các game thủ hoàn toàn có thể yên tâm về số tiền bỏ vào game này. Chúng tôi xin đảm bảo tiền game được bán ra bởi shop nạp game hay tài khoản với các dịch vụ là hoàn toàn sạch và an toàn 100% bởi lẽ, chúng tôi là đại lý nạp game, bán nick được ủy quyền chính thức bởi các diễn đàn Game chuyên nghiệp.</span></span></span></span></span></span></span></p>

                                    <p style="line-height:1.38; margin-bottom:5px"><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-variant:normal; white-space:pre-wrap"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Bên cạnh việc nạp game uy tín, chất lượng, giá rẻ cùng giao dịch nhanh chóng, dễ dàng. Bạn còn dễ dàng mua được thẻ game của các diễn đàn khác như: Garena, Zing, Funcard, Gate, Carot, Appota, Scoin, Soha, Vcoin, Gosu với card điện thoại: Vinaphone, Viettel, Mobi.</span></span></span></span></span></span></span></p>

                                    <p style="line-height:1.8; margin-bottom:8px; margin-top:8px"><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-variant:normal; white-space:pre-wrap"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Cùng với những dịch vụ hết sức tuyệt vời khi sử dụng dịch vụ tại WEBNICK.VN, chúng tôi hy vọng WEBNICK.VN sẽ làm cho bạn thật hài lòng và nâng tầm trải nghiệm của bạn. Còn chần chờ gì nữa mà không đến shop của chúng tôi để nạp game, mua nick cùng với dịch vụ hấp dẫn đi nào ! WEBNICK.VN hân hạnh được phục vụ tất cả khách hàng khi đến. WEBNICK.VN nắm bắt tâm lý - lắng nghe khách hàng - uy tín trách nhiệm - sự lựa chọn hàng đầu của mọi game thủ đi đến con đường chuyên nghiệp. </span></span></span></span><span style="font-variant:normal; white-space:pre-wrap"><span style="font-weight:400"><span style="font-style:normal"><span style="text-decoration:none">Khám phá thế giới ảo và đắm chìm để giải trí với mức giá hợp lý cùng dịch vụ thân thiện xuất phát từ lòng hiếu khách cùng sự tỉ mỉ, tận tâm tuyệt đối chính là điều hành khách có thể kì vọng ở WEBNICK.VN. Và&nbsp; hơn hết chúng tôi tin rằng điều đó mang ý nghĩa </span></span></span></span><span style="font-variant:normal; white-space:pre-wrap"><span style="font-weight:400"><em style="font-style:italic"><span style="text-decoration:none">“Hơn cả sự trải nghiệm”</span></em></span></span></span></span></span></p>

                                    <p style="line-height:1.8; margin-bottom:8px; margin-top:8px"><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-variant:normal; white-space:pre-wrap"><strong style="font-weight:700"><span style="font-style:normal"><span style="text-decoration:none">Hotline:&nbsp;</span></span></strong></span></span></span></span></p>

                                    <p style="line-height:1.8; margin-bottom:8px; margin-top:8px"><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="white-space:pre-wrap"><strong>Fanpage: </strong></span></span></span></span></p>

                                    <p style="line-height:1.8; margin-bottom:8px; margin-top:8px"><span style="color:#ffffff"><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-variant:normal; white-space:pre-wrap"><strong style="font-weight:700"><span style="font-style:normal"><span style="text-decoration:none">Website: webnick.vn</span></span></strong></span></span></span></span></p>
                                </div>

                                <div class="col-md-12 left-right text-center">
                                    <div class="view-more">
                                        Xem thêm <img src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/jump-down.png" alt="">
                                    </div>
                                    <div class="view-less">
                                        Thu gọn <img src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/jump-down-down.png" alt="">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="media-mobile">
                <div class="row marginauto intermediary-ct" style="height: 20px;background: #EFEFEF">

                </div>
            </section>

            <section>
                <div class="container container-fix body-container-ct">
                    <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">
                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-row-ct media-ctbg-ct">

                                <div class="col-md-12 left-right napgamekhac">
                                    <div class="row marginauto">
                                        <div class="col-md-12 text-left left-right">
                                            <span>Tài khoản đồng giá</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right">
                                    <div class="row nick-sider-header">
                                        <div class="swiper-container list-dong-gia col-md-12 text-left left-right">
                                            <div class="swiper-wrapper">

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="media-mobile">
                <div class="row marginauto intermediary-ct" style="height: 20px;background: #EFEFEF">

                </div>
            </section>

            <section>
                <div class="container container-fix body-container-ct">
                    <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">
                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-row-ct media-ctbg-ct">

                                <div class="col-md-12 left-right napgamekhac">
                                    <div class="row marginauto">
                                        <div class="col-md-12 text-left left-right">
                                            <span>Tài khoản siêu ưu đãi trong ngày</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right">
                                    <div class="row nick-sider-header">
                                        <div class="swiper-container list-dong-gia col-md-12 text-left left-right">
                                            <div class="swiper-wrapper">

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="media-mobile">
                <div class="row marginauto intermediary-ct" style="height: 20px;background: #EFEFEF">

                </div>
            </section>

            <section class="bottom-nick-slider">
                <div class="container container-fix body-container-ct">
                    <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">
                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-row-ct media-ctbg-ct">

                                <div class="col-md-12 left-right napgamekhac">
                                    <div class="row marginauto">
                                        <div class="col-md-12 text-left left-right">
                                            <span>Tài khoản siêu ưu đãi trong ngày</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right">
                                    <div class="row nick-sider-header">
                                        <div class="swiper-container list-da-xem col-md-12 text-left left-right">
                                            <div class="swiper-wrapper">

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="swiper-slide body-detail-nick-slider-ct">
                                                    <a href="" class="list-item-nick-hover">
                                                        <div class="row marginauto list-item-nick">
                                                            <div class="col-md-12 left-right default-overlay-nick-ct">
                                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                            </div>
                                                            <div class="col-md-12 left-right">
                                                                <div class="row marginauto list-item-nick-body">
                                                                    <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                        <span>Nick ngon giá rẻ</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>ID: #1365898</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Rank: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Tướng: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>Ngọc: 91</small>
                                                                    </div>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <ul>
                                                                            <li class="fist-li-account">15.000đ</li>
                                                                            <li class="second-li-account">30.000đ</li>
                                                                            <li class="three-li-account">-50%</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <div class="modal fade login show order-modal" id="openOrder" aria-modal="true">

                <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
                    <!--        <div class="image-login"></div>-->
                    <div class="modal-content">
                        <div class="modal-header p-0" style="border-bottom: 0">
                            <div class="row marginauto modal-header-order-ct">
                                <div class="col-12 span__donhang text-center" style="position: relative">
                                    <span>Xác nhận thanh toán</span>
                                    <img class="lazy img-close-ct" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/close.png" alt="">
                                </div>
                            </div>

                        </div>

                        <div class="modal-body modal-body-order-ct">
                            <div class="row marginauto">

                                <div class="col-md-12 left-right title-order-ct">
                                    <span>Thông tin acc</span>
                                </div>

                                <div class="col-md-12 left-right" id="order-errors">
                                    <div class="row marginauto order-errors">
                                        <div class="col-md-12 left-right">
                                            <small>Lỗi rồi em ơi</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">
                                            <div class="row marginauto background-order-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Tài khoản</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>Nam Hải</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">
                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Game</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/mobilegame.png" alt="">
                                                </div>
                                            </div>

                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Rank</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>Tinh Anh</small>
                                                </div>
                                            </div>

                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Số lượng</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>01</small>
                                                </div>
                                            </div>

                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Chiết khấu</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>3%</small>
                                                </div>
                                            </div>

                                            <div class="row marginauto background-order-body-bottom-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Thành tiền</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>100.000 đ</small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">

                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Phương thức thanh toán</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>Tài khoản Shopbrand</small>
                                                </div>
                                            </div>

                                            <div class="row marginauto background-order-body-bottom-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Phí thanh toán</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>Miễn phí</small>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">
                                            <div class="row marginauto background-order-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Tài khoản</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <span>97.000 đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-footer-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right">
                                            <button class="button-default-ct openSuccess" type="button">Xác nhận</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="modal fade login show order-modal" id="traGop" aria-modal="true">

                <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
                    <!--        <div class="image-login"></div>-->
                    <div class="modal-content">
                        <div class="modal-header p-0" style="border-bottom: 0">
                            <div class="row marginauto modal-header-order-ct">
                                <div class="col-12 span__donhang text-center" style="position: relative">
                                    <span>Xác nhận thanh toán</span>
                                    <img class="lazy img-close-ct" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/close.png" alt="">
                                </div>
                            </div>

                        </div>

                        <div class="modal-body modal-body-order-ct">
                            <div class="row marginauto">

                                <div class="col-md-12 left-right title-order-ct">
                                    <span>Thông tin tài khoản #521479</span>
                                </div>

                                <div class="col-md-12 left-right" id="order-errors">
                                    <div class="row marginauto order-errors">
                                        <div class="col-md-12 left-right">
                                            <small>Lỗi rồi em ơi</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">
                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Nhà phát hành</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/zing.png" alt="">
                                                </div>
                                            </div>

                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Tên game</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>Ngọc rồng</small>
                                                </div>
                                            </div>

                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Số lượng</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>01</small>
                                                </div>
                                            </div>

                                            <div class="row marginauto background-order-body-bottom-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Tổng tiền</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>250.000 đ</small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 left-right title-tra-gop">
                                    <span>Thông tin trả góp</span>
                                </div>

                                <div class="col-md-12 left-right">
                                    <div class="row body-title-detail-ct">

                                        <div class="col-md-6 text-left body-title-detail-nick-col-ct">
                                            <div class="row marginauto">
                                                <div class="col-md-12 left-right body-title-detail-span-ct">
                                                    <span>Trả trước</span>
                                                </div>
                                                <div class="col-md-12 left-right body-title-detail-select-ct">
                                                    <input readonly autocomplete="off" class="input-defautf-ct input-modal-defautf-ct-play" type="text" placeholder="50.000">
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-6 text-left body-title-detail-nick-col-ct">
                                            <div class="row marginauto password-mobile">
                                                <div class="col-md-12 left-right body-title-detail-span-ct">
                                                    <span>Trả lần 2</span>
                                                </div>
                                                <div class="col-md-12 left-right body-title-detail-select-ct" style="position: relative">
                                                    <input readonly autocomplete="off" class="input-defautf-ct" type="text" placeholder="200.000">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 left-right title-tra-gop">
                                    <small>Nếu bạn chưa hoàn tất thanh toán toàn bộ trước thời hạn 01/06/2022 00:00:00, giao dịch sẽ bị hủy bỏ và bạn sẽ nhận tiền hoàn lại bằng 20% số tiền trả ban đầu.</small>
                                </div>

                                <div class="col-md-12 left-right">
                                    <div class="row body-title-detail-ct">
                                        <div class="col-md-12 left-right body-title-detail-span-ct body-title-detail-col-ng-ct">
                                            <span>Mã bảo vệ</span>
                                        </div>
                                        <div class="col-auto text-left body-title-detail-col-left-ng-ct chitiet-nick-input">
                                            <div class="row marginauto">
                                                <div class="col-md-12 left-right body-title-detail-select-ct">
                                                    <input autocomplete="off" class="input-defautf-ct" type="text" placeholder="Nhập mã bảo vệ">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-auto text-left body-title-detail-col-center-ng-ct">
                                            <div class="row marginauto password-mobile capcha-image-bg">
                                                <div class="col-md-12 left-right body-title-detail-select-ct">
                                                    <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/capcha.png" alt="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-auto text-left body-title-detail-col-right-ng-ct">
                                            <div class="row marginauto password-mobile capcha-image-bg">
                                                <div class="col-md-12 left-right body-title-detail-select-ct">
                                                    <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/rf-capcha.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right title-tra-gop-body">
                                    <span>Thông tin trả góp</span>
                                </div>

                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">

                                            <div class="row marginauto tragop-order-body-row-ct">
                                                <div class="col-md-12 left-right background-order-col-left-ct">
                                                    <ul id="tra-gop-scroll">
                                                        <li>Trả góp ban đầu 20% giá trị tài khoản dự kiến mua để giữ tài khoản. Áp dụng cho tài khoản trị giá từ 200.000đ trở lên.</li>
                                                        <li>Thời gian trả góp: 7 ngày. Không tính ngày xác nhận trả góp.</li>
                                                        <li>Phí trả góp: 0%</li>
                                                        <li>Trong thời gian trả góp bạn phải hoàn tất phần còn lại để giao dịch hoàn tất.</li>
                                                        <li>Trường hợp quá thời gian trả góp giao dịch của bạn sẽ tự động bị hủy bỏ và hoàn lại 20% số tiền đã góp ban đầu.Lúc này tài khoản được tự do. (Ví dụ: tài khoản cần mua trị giá 1 triệu, trả góp ban đầu 200.000đ.</li>
                                                        <li>Nếu quá thời gian giao dịch trả góp bị hủy bỏ thì bạn sẽ nhận lại 20% tức 40.000đ trong tài khoản) Quy trình giao dịch đều xử lý tự động, bạn không thể gọi hỗ trợ gia hạn thêm ngày trả góp hoặc đổi khác quy định trên.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-footer-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right">
                                            <button class="button-default-ct openSuccess" type="button">Xác nhận</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="modal fade login show order-modal" id="successModal" aria-modal="true">

                <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
                    <!--        <div class="image-login"></div>-->
                    <div class="modal-content">
                        <div class="modal-header p-0" style="border-bottom: 0">
                            <div class="row marginauto modal-header-order-ct">
                                <div class="col-12 span__donhang text-center" style="position: relative">
                                    <span>Mua tài khoản thành công</span>
                                    <img class="lazy img-close-ct" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/close.png" alt="">
                                </div>
                            </div>

                        </div>

                        <div class="modal-body modal-body-order-ct">
                            <div class="row marginauto">

                                <div class="col-md-12 left-right image-success">
                                    <div class="row marginauto justify-content-center">
                                        <div class="col-auto">
                                            <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/group.png" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right title-tra-gop-success">
                                    <div class="row body-title-detail-ct">
                                        <div class="col-md-12 text-left body-title-detail-col-ct">
                                            <div class="row marginauto">
                                                <div class="col-md-12 left-right body-title-detail-span-ct">
                                                    <span>Tài khoản</span>
                                                </div>
                                                <div class="col-md-12 left-right body-title-detail-select-ct email-success-nick">
                                                    <input readonly autocomplete="off" class="input-defautf-ct" id="email" type="text" value="namok@gmail.com">
                                                    <img class="lazy " src="/assets/{{env('THEME_VERSION')}}/image/nick/copy.png" alt="" id="getCopyemail">
                                                </div>
                                                <div class="row marginauto title-tra-gop-success-row">
                                                    <div class="col-md-12 left-right body-title-detail-span-ct">
                                                        <span>Mật khẩu</span>
                                                    </div>
                                                    <div class="col-md-12 left-right body-title-detail-select-ct taikhoan-success-nick">
                                                        <input id="password" readonly autocomplete="off" class="input-defautf-ct" type="password" value="123456" placeholder="******">
                                                        <img class="lazy img-copy" src="/assets/{{env('THEME_VERSION')}}/image/nick/copy.png" alt="" id="getCopypass">
                                                        <div class="getCopypass">
                                                            <img class="lazy img-show-password" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/eyehide.png" alt="" id="getShowpass">
                                                        </div>


                                                    </div>
                                                </div></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12 left-right">
                                    <div class="row body-title-detail-ct">

                                        <div class="col-md-6 text-left body-title-detail-nick-col-ct">
                                            <div class="row marginauto">
                                                <div class="col-md-12 left-right body-title-detail-span-ct">
                                                    <span>Trả trước</span>
                                                </div>
                                                <div class="col-md-12 left-right body-title-detail-select-ct">
                                                    <input readonly autocomplete="off" class="input-defautf-ct input-modal-defautf-ct-play" type="text" placeholder="50.000">
                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-6 text-left body-title-detail-nick-col-ct">
                                            <div class="row marginauto password-mobile">
                                                <div class="col-md-12 left-right body-title-detail-span-ct">
                                                    <span>Trả lần 2</span>
                                                </div>
                                                <div class="col-md-12 left-right body-title-detail-select-ct" style="position: relative">
                                                    <input readonly autocomplete="off" class="input-defautf-ct" type="text" placeholder="200.000">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 left-right title-tra-gop text-center">
                                    <small>Đã lấy mật khẩu lúc: 05-05-2022, 121:32:56</small>
                                </div>

                                <div class="col-md-12 left-right padding-order-28-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">
                                            <div class="row marginauto title-success-thanh-cong">
                                                <div class="col-md-12 left-right">
                                                    <span>Để tránh các trường hợp xấu xảy ra, quý khách vui lòng thêm thông tin (Email và Số điện thoại) Để đảm bảo không có vấn đề sau khi giao dịch tại shop! Xin cảm ơn!</span>
                                                </div>
                                                <div class="col-md-12 left-right padding-order-ct">
                                                    <span>Để tránh các trường hợp xấu xảy ra, quý khách vui lòng thêm thông tin (Email và Số điện thoại) Để đảm bảo không có vấn đề sau khi giao dịch tại shop! Xin cảm ơn!</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 left-right">
                                    <div class="row marginauto justify-content-center gallery-right-footer">
                                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                            <div class="row marginauto modal-footer-success-row-not-ct">
                                                <div class="col-md-12 left-right">
                                                    <a href="/" class="button-not-bg-ct"><span>Đóng</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                            <div class="row marginauto modal-footer-success-row-ct">
                                                <div class="col-md-12 left-right">
                                                    <a href="/" class="button-bg-ct"><span>Đổi mật khẩu</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <input type="hidden" name="previous" class="input-back-step-two" value="Trang trước"/>


        </fieldset>

        <fieldset id="fieldset-two">

            <section>
                <div class="container container-fix banner-mobile-container-ct">
                    <div class="row marginauto banner-mobile-row-ct">
                        <div class="col-auto left-right" style="width: 10%">
                            <img class="lazy previous-step-one" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/back.png" alt="" >
                        </div>

                        <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                            <h3>Xác nhận thanh toán</h3>
                        </div>
                        <div class="col-auto left-right" style="width: 10%">
                        </div>
                    </div>

                </div>
            </section>

            <section class="max-header-fix">
                <div class="row marginauto" style="padding: 12px 16px">

                    <div class="col-md-12 left-right title-order-ct">
                        <span>Thông tin acc</span>
                    </div>

                    <div class="col-md-12 left-right" id="order-errors">
                        <div class="row marginauto order-errors">
                            <div class="col-md-12 left-right">
                                <small>Lỗi rồi em ơi</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right background-order-ct">
                                <div class="row marginauto background-order-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Tài khoản</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>Nam Hải</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right background-order-ct">
                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Game</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/mobilegame.png" alt="">
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Rank</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>Tinh Anh</small>
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Số lượng</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>01</small>
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Chiết khấu</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>3%</small>
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-bottom-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Thành tiền</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>100.000 đ</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right background-order-ct">

                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Phương thức thanh toán</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>Tài khoản Shopbrand</small>
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-bottom-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Phí thanh toán</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>Miễn phí</small>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right background-order-ct">
                                <div class="row marginauto background-order-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Tài khoản</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <span>97.000 đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-footer-ct fixcungbuttonmobile">
                        <div class="row marginauto" style="padding: 12px 16px">
                            <div class="col-md-12 left-right">
                                <button class="button-default-ct button-next-step-two" type="button">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <input type="hidden" name="previous" class="input-back-step-two" value="Trang trước"/>

        </fieldset>

        <fieldset id="fieldset-three">

            <section>
                <div class="container container-fix banner-mobile-container-ct">
                    <div class="row marginauto banner-mobile-row-ct">
                        <div class="col-auto left-right" style="width: 10%">
                            <img class="lazy previous-step-one-tra-gop" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/back.png" alt="" >
                        </div>

                        <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                            <h3>Xác nhận thanh toán</h3>
                        </div>
                        <div class="col-auto left-right" style="width: 10%">
                        </div>
                    </div>

                </div>
            </section>

            <section>
                <div class="row marginauto" style="padding: 12px 16px">

                    <div class="col-md-12 left-right title-order-ct">
                        <span>Thông tin tài khoản #521479</span>
                    </div>

                    <div class="col-md-12 left-right" id="order-errors">
                        <div class="row marginauto order-errors">
                            <div class="col-md-12 left-right">
                                <small>Lỗi rồi em ơi</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right background-order-ct">
                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Nhà phát hành</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/zing.png" alt="">
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Tên game</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>Ngọc rồng</small>
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Số lượng</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>01</small>
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-bottom-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Tổng tiền</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>250.000 đ</small>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 left-right title-tra-gop">
                        <span>Thông tin trả góp</span>
                    </div>

                    <div class="col-md-12 left-right">
                        <div class="row body-title-detail-ct">

                            <div class="col-md-6 text-left body-title-detail-nick-col-ct">
                                <div class="row marginauto">
                                    <div class="col-md-12 left-right body-title-detail-span-ct">
                                        <span>Trả trước</span>
                                    </div>
                                    <div class="col-md-12 left-right body-title-detail-select-ct">
                                        <input readonly autocomplete="off" class="input-defautf-ct input-modal-defautf-ct-play" type="text" placeholder="50.000">
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-6 text-left body-title-detail-nick-col-ct">
                                <div class="row marginauto password-mobile">
                                    <div class="col-md-12 left-right body-title-detail-span-ct">
                                        <span>Trả lần 2</span>
                                    </div>
                                    <div class="col-md-12 left-right body-title-detail-select-ct" style="position: relative">
                                        <input readonly autocomplete="off" class="input-defautf-ct" type="text" placeholder="200.000">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 left-right">
                        <div class="row body-title-detail-ct">
                            <div class="col-md-12 left-right body-title-detail-span-ct body-title-detail-col-ng-ct">
                                <span>Mã bảo vệ</span>
                            </div>
                            <div class="col-auto text-left body-title-detail-col-left-ng-ct chitiet-nick-input">
                                <div class="row marginauto">
                                    <div class="col-md-12 left-right body-title-detail-select-ct">
                                        <input autocomplete="off" class="input-defautf-ct" type="text" placeholder="Nhập mã bảo vệ">
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto text-left body-title-detail-col-center-ng-ct">
                                <div class="row marginauto password-mobile capcha-image-bg">
                                    <div class="col-md-12 left-right body-title-detail-select-ct">
                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/capcha.png" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto text-left body-title-detail-col-right-ng-ct">
                                <div class="row marginauto password-mobile capcha-image-bg">
                                    <div class="col-md-12 left-right body-title-detail-select-ct">
                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/rf-capcha.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 left-right padding-order-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right background-order-ct">
                                <div class="row marginauto thong-tin-tra-gop-mobile">
                                    <div class="col-6 left-right">
                                        <span>Quy định trả góp</span>
                                    </div>
                                    <div class="col-auto left-right data-scroll-mobile">
                                        <div class="row marginauto up-scroll-mobile"><div class="col-auto left-right"><img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/up.png" alt=""></div></div>
                                    </div>
                                </div>
                                <div class="row marginauto tragop-order-body-row-ct">
                                    <div class="col-md-12 left-right background-order-col-left-ct">
                                        <ul id="tra-gop-scroll-mobile">
                                            <li>Trả góp ban đầu 20% giá trị tài khoản dự kiến mua để giữ tài khoản. Áp dụng cho tài khoản trị giá từ 200.000đ trở lên.</li>
                                            <li>Thời gian trả góp: 7 ngày. Không tính ngày xác nhận trả góp.</li>
                                            <li>Phí trả góp: 0%</li>
                                            <li>Trong thời gian trả góp bạn phải hoàn tất phần còn lại để giao dịch hoàn tất.</li>
                                            <li>Trường hợp quá thời gian trả góp giao dịch của bạn sẽ tự động bị hủy bỏ và hoàn lại 20% số tiền đã góp ban đầu.Lúc này tài khoản được tự do. (Ví dụ: tài khoản cần mua trị giá 1 triệu, trả góp ban đầu 200.000đ.</li>
                                            <li>Nếu quá thời gian giao dịch trả góp bị hủy bỏ thì bạn sẽ nhận lại 20% tức 40.000đ trong tài khoản) Quy trình giao dịch đều xử lý tự động, bạn không thể gọi hỗ trợ gia hạn thêm ngày trả góp hoặc đổi khác quy định trên.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-footer-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right">
                                <button class="button-default-ct button-next-step-two-tra-gop" type="button">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <input type="hidden" name="previous" class="input-back-step-two-tra-gop" value="Trang trước"/>

        </fieldset>

    </form>

    <script src="/assets/{{env('THEME_VERSION')}}/js/nick/nick-detail.js?v={{time()}}"></script>
@endsection





