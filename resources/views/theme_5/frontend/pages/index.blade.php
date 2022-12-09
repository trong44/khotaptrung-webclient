@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')


    @if(setting('sys_theme_ver_page_build'))
        @php
            $dat = explode(',',setting('sys_theme_ver_page_build'));
            $data_title = null;
            $data_widget = null;
            foreach($dat as $key => $it){
                if ($key == 0){
                    $data_title = explode('|',$it);
                }else{
                    $data_widget = explode('|',$it);
                }
            }
        @endphp

        <div class="container c-container">
            <input type="search" placeholder="Tìm kiếm" class="search c-mt-16 d-lg-none">
        @if(isset($data_widget))
        @foreach($data_widget as $key => $value)
                @include('frontend.widget.'.$value.'',with(['title'=>$data_title[$key]]))
            @endforeach
        </div>
        @endif
    @else
        <div class="container c-container">
            <input type="search" placeholder="Tìm kiếm" class="search c-mt-16 d-lg-none">

            {{--        Slider banner  --}}
            @include('frontend.widget.__slider__banner__home')

            {{--        Dịch vụ nổi bật  --}}
            @include('frontend.widget.__dich__vu__noi__bat')


            {{--        Giá sốc  --}}
            @include('frontend.widget.__gia__soc')

            {{--        Dành cho bạn  --}}
            @include('frontend.widget.__danh__cho__ban')

            {{--        Dịch vụ  --}}
            @include('frontend.widget.__content__home__dichvu')

            {{--        Dịch vụ  --}}
            @include('frontend.widget.__content__home__dichvu__v2')

            {{--        Vòng quay  --}}
            @include('frontend.widget.__content__home__minigame')

            {{--        Mua thẻ  --}}
            @include('frontend.widget.__mua__the')

            {{--        Nạp thẻ  --}}
            @include('frontend.widget.__napthe')

            {{--        nick ngon giá re  --}}
            @include('frontend.widget.__content__home__game')

            {{--        Free fire  --}}
            @include('frontend.widget.__content__home__game__random')

            {{--        Tin tức  --}}
            @include('frontend.widget.__tin__tuc')

            {{--    Giới thiệu web       --}}
            @include('frontend.widget.__abount__us')

        </div>
    @endif

    @include('frontend.widget.__bonus')

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
                    <p class="modal-title center">Xác nhận nạp thẻ</p>
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
