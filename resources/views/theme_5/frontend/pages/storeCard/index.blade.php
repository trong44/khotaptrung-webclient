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
                <a href="" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="" class="breadcrumb-link">Mua thẻ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="" class="breadcrumb-link">Thẻ game</a>
            </li>
        </ul>

        @include('frontend.widget.__slider__banner')
        <div class="row c-mt-16">
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
            <div class="head-mobile">
                <a href="#" class="link-back close-step"></a>

                <h1 class="head-title text-title">Mua thẻ</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="col-12 col-lg-9 c-pl-12 c-p-sm-0">
                <div class="tab-content c-px-sm-16">
                    <div class="tab-pane fade active show" id="gameCard" role="tabpanel">
                        <form action="">
                            <div class="row">
                                <div class="col-12 col-md-6 c-pr-12 c-pl-12">
                                    <div class="buy-card-section c-mb-16 c-mb-sm-0">
                                        <label class="text-form fz-13 fw-500 c-py-16 c-mb-sm-0 c-pb-sm-8">Chọn loại thẻ</label>
                                        <div class="col-md-12 p-0 is-load type-card">
                                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                                            <div class="row m-0">
                                                <!-- JS Paste HTML vào đây -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 c-pl-12 c-pr-sm-12">
                                    <div class="buy-card-section c-mb-16">
                                        <label class="text-form fz-13 fw-500 c-py-16 c-mb-sm-0 c-py-sm-8">Chọn mệnh giá</label>
                                        <div class="col-md-12 p-0 is-load amount-card">
                                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                                            <div class="row m-0">
                                                <!-- JS Paste HTML vào đây -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buy-card-info c-p-16 c-mb-20 brs-12">
                                        <div class="buy-card-info-block d-flex justify-content-between align-items-center c-mb-12">
                                            <span class="buy-card-info-title fw-500 fz-13">Số lượng thẻ</span>
                                            <div class="js-quantity">
                                                <button class="js-quantity-minus" type="button"></button>
                                                <input type="text" name="card-amount" class="js-quantity-input" value="1" numberic>
                                                <button class="js-quantity-add" type="button"></button>
                                            </div>
                                        </div>
                                        <div class="buy-card-info-block d-flex justify-content-between align-items-center c-mb-12">
                                            <input name="card-discount" type="hidden" value="">
                                            <span class="buy-card-info-title fw-500 fz-13">Chiết khấu</span>
                                            <span class="buy-card-discount fw-400 fz-13 js-text-discount">0%</span>
                                        </div>
                                        <div class="buy-card-info-block d-flex justify-content-between align-items-center">
                                            <span class="buy-card-info-title fw-500 fz-13">Thành tiền</span>
                                            <span class="buy-card-total fw-500 fz-15 js-text-total">0đ</span>
                                        </div>
                                    </div>
                                    <button class="btn primary w-100 d-none d-lg-block" type="button" data-toggle="modal" data-target="#modal-confirm">
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
                                        <div class="col-md-12 p-0 type-card is-load">
                                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                                            <div class="row m-0">
                                                <!-- JS Paste HTML vào đây -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 c-pl-12 c-pr-sm-12">
                                    <div class="buy-card-section c-mb-16">
                                        <label class="text-form fz-13 fw-500 c-py-16 c-mb-sm-0 c-py-sm-8">Chọn mệnh giá</label>
                                        <div class="col-md-12 p-0 is-load amount-card">
                                            <div class="loading-wrap"><span class="modal-loader-spin"></span></div>
                                            <div class="row m-0">
                                                <!-- JS Paste HTML vào đây -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buy-card-info c-p-16 c-mb-20 brs-12">
                                        <div class="buy-card-info-block d-flex justify-content-between align-items-center c-mb-12">
                                            <span class="buy-card-info-title fw-500 fz-13">Số lượng thẻ</span>
                                            <div class="js-quantity">
                                                <button class="js-quantity-minus" type="button"></button>
                                                <input type="text" name="card-amount" class="js-quantity-input" value="1" numberic>
                                                <button class="js-quantity-add" type="button"></button>
                                            </div>
                                        </div>
                                        <div class="buy-card-info-block d-flex justify-content-between align-items-center c-mb-12">
                                            <input name="card-discount" type="hidden" value="">
                                            <span class="buy-card-info-title fw-500 fz-13">Chiết khấu</span>
                                            <span class="buy-card-discount fw-400 fz-13 js-text-discount">0%</span>
                                        </div>
                                        <div class="buy-card-info-block d-flex justify-content-between align-items-center">
                                            <span class="buy-card-info-title fw-500 fz-13">Thành tiền</span>
                                            <span class="buy-card-total fw-500 fz-15 js-text-total">0đ</span>
                                        </div>
                                    </div>
                                    <button class="btn primary w-100 d-none d-lg-block" type="button" data-toggle="modal" data-target="#modal-confirm">
                                        Mua ngay
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-title-bold fz-20 lh-28 d-none d-lg-block c-mb-8">Mô tả dịch vụ</h2>
        <div class="card overflow-hidden d-none d-lg-block">
            <div class="card-body c-px-16">
                <div class="content-desc">
                    Garena Liên Quân Mobile có nguồn gốc từ trò chơi Vương Giả Vinh Diệu (Honor of Kings) của Tencent Games phát triển và phát hành tại Trung Quốc. Vì trò chơi Vương Giả Vinh Diệu có những nhân vật trong lịch sử Trung Quốc nên không phát hành ở nước ngoài. Vì vậy Tencent Games đã thay đổi, cải thiện hình ảnh các nhân vật lên quốc tế hóa và phân phối cho Garena phát hành tại thị trường Đài Loan với tên Truyền Thuyết Đối Quyết (tiếng Trung: 傳說對決) vào ngày 14/10/2016. Về sau trò chơi được Garena phát hành ở các nước Đông Nam Á còn lại và do chính Tencent Games phát hành ở Châu Âu, Châu Mỹ và Ấn Độ.
                    <br>
                    <br>
                    Vào tháng 4 năm 2017, nhà phát triển Tencent Games mua lại bản quyền hình ảnh các nhân vật siêu anh hùng đến từ công ty DC Comics, cho ra mắt ở máy chủ thử nghiệm với các vị tướng độc quyền DC như Batman, Superman, Joker, Wonder Woman, The Flash rồi phát hành rộng rãi lên các máy chủ chính thức.
                    <br>
                    <br>
                    Ngày 29 tháng 7 năm 2018 được đánh dấu như là ngày kỷ niệm sinh nhật Liên Quân đầu tiên trên toàn thế giới, đồng thời đây cũng là ngày trận chung kết AWC 2018 diễn ra tại Los Angeles, Hoa Kỳ.
                    <br>
                    Garena Liên Quân Mobile có nguồn gốc từ trò chơi Vương Giả Vinh Diệu (Honor of Kings) của Tencent Games phát triển và phát hành tại Trung Quốc. Vì trò chơi Vương Giả Vinh Diệu có những nhân vật trong lịch sử Trung Quốc nên không phát hành ở nước ngoài. Vì vậy Tencent Games đã thay đổi, cải thiện hình ảnh các nhân vật lên quốc tế hóa và phân phối cho Garena phát hành tại thị trường Đài Loan với tên Truyền Thuyết Đối Quyết (tiếng Trung: 傳說對決) vào ngày 14/10/2016. Về sau trò chơi được Garena phát hành ở các nước Đông Nam Á còn lại và do chính Tencent Games phát hành ở Châu Âu, Châu Mỹ và Ấn Độ.
                    <br>
                    <br>
                    Vào tháng 4 năm 2017, nhà phát triển Tencent Games mua lại bản quyền hình ảnh các nhân vật siêu anh hùng đến từ công ty DC Comics, cho ra mắt ở máy chủ thử nghiệm với các vị tướng độc quyền DC như Batman, Superman, Joker, Wonder Woman, The Flash rồi phát hành rộng rãi lên các máy chủ chính thức.
                    <br>
                    <br>
                    Ngày 29 tháng 7 năm 2018 được đánh dấu như là ngày kỷ niệm sinh nhật Liên Quân đầu tiên trên toàn thế giới, đồng thời đây cũng là ngày trận chung kết AWC 2018 diễn ra tại Los Angeles, Hoa Kỳ.
                    <br>
                </div>
            </div>
            <div class="card-footer text-center">
                <span class="see-more" data-content="Xem thêm nội dung"></span>
            </div>
        </div>
        <div class="c-my-32 d-none d-lg-block">
            @include('frontend/widget/__services__other')
        </div>
    </div>

    <!-- Button Mobile -->
    <div class="footer-mobile group-btn">
        <button class="btn primary js-step" data-target="#step-confirm" type="button">Mua ngay</button>
    </div>
    <!-- Modal Xác nhận-->
    <div class="modal fade" id="modal-confirm">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content c-p-24">
                <div class="modal-header">
                    <h2 class="modal-title center">Xác nhận thanh toán</h2>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                    <div class="dialog--content__title fw-700 fz-13 c-mb-12 text-title-theme">
                        Thông tin mua thẻ
                    </div>
                    <div class="card card-dark c-px-12 c-py-4 c-mb-16">
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
                            <div class="t-body-2 t-discount-card">03 %</div>
                        </div>
                        <div class="d-flex justify-content-between c-py-4">
                            <div class="t-body-1 link-color">Mệnh giá</div>
                            <div class="t-body-2 t-amount-card">0 đ</div>
                        </div>
                    </div>
                    <div class="card card-dark c-px-12 c-py-4 c-mb-16">
                        <div class="d-flex justify-content-between c-py-4">
                            <div class="t-body-1 link-color">Phương thức thanh toán</div>
                            <div class="t-body-2">Tài khoản Shopbrand</div>
                        </div>
                        <div class="d-flex justify-content-between c-py-4">
                            <div class="t-body-1 link-color">Phí thanh toán</div>
                            <div class="t-body-2">Miễn phí</div>
                        </div>
                    </div>
                    <div class="card card-dark c-px-12 c-py-4">
                        <div class="d-flex justify-content-between c-py-4">
                            <div class="t-body-1 link-color">Số tiền thanh toán</div>
                            <div class="t-body-2 text-primary-color t-total-card">0đ</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn primary submit-buy-card" type="button">Xác nhận</button>
                </div>
            </div>
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

    <!-- Step Mobile -->
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
                    <div class="t-body-2 t-discount-card">03 %</div>
                </div>
                <div class="d-flex justify-content-between c-py-4">
                    <div class="t-body-1 link-color">Mệnh giá</div>
                    <div class="t-body-2 t-amount-card">0 đ</div>
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
            <button class="btn primary submit-buy-card" type="button">Xác nhận</button>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/store-card/buy-card.js?v={{time()}}"></script>
@endsection
