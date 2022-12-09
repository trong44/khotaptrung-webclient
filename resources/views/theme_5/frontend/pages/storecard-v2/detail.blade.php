@extends('frontend.layouts.master')
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_trong.css">
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/script_trong.js"></script>
@endsection
@section('content')
    <div class="container-fix container">
        {{--breadcrum--}}

        <ul class="breadcrum--list">
            <li class="breadcrum--item">
                <a href="/" class="breadcrum--link">Trang chủ</a>
            </li>
            <li class="breadcrum--item">
                <a href="/lich-su-giao-dich" class="breadcrum--link">Lịch sử giao dịch</a>
            </li>
            <li class="breadcrum--item">
                <a href="/the-cao-da-mua" class="breadcrum--link">Thẻ cào đã mua</a>
            </li>
            <li class="breadcrum--item">
                <a href="/the-cao-da-mua/detail" class="breadcrum--link">Chi tiết</a>
            </li>
        </ul>

        <div class="row m-0">
            {{--navbar--}}
            @include('theme_3.frontend.widget.__navbar__profile')
            {{--content--}}
            <div class="col-12 col-lg-9 p-0 order--detail">
                <div class="card--mobile__title">
                    <a href="/the-cao-da-mua" class="card--back">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt="">
                    </a>
                    <h4>Chi tiết</h4>
                </div>
                <div class="card --custom">
                    <div class="card--header">
                        <h4 class="card--header__title hidden-mobile">
                            Chi tiết đơn hàng
                        </h4>
                    </div>
                    <div class="card--body">
                        <div class="row">
                            <div class="col-12 col-lg-6 p_0 pl_1 card--detail">
                                <div class="card--rise">
                                    <div class="order__title">Mua thẻ 1</div>
                                    <div class="card__attr">
                                        <div class="card--value__attr">
                                            Mã thẻ:<span class="card__info">48563415693486451</span>
                                        </div>
                                        <div class="js-copy-text">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/copy-black.png" alt="">
                                        </div>
                                    </div>
                                    <div class="card__attr">
                                        <div class="card--value__attr">
                                            Serial:<span class="card__info">48563415693486451</span>
                                        </div>
                                        <div class="js-copy-text">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/copy-black.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card--rise">
                                    <div class="order__title">Mua thẻ 1</div>
                                    <div class="card__attr">
                                        <div class="card--value__attr">
                                            Mã thẻ:<span class="card__info">48563415693486451</span>
                                        </div>
                                        <div class="js-copy-text">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/copy-black.png" alt="">
                                        </div>
                                    </div>
                                    <div class="card__attr">
                                        <div class="card--value__attr">
                                            Serial:<span class="card__info">48563415693486451</span>
                                        </div>
                                        <div class="js-copy-text">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/copy-black.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card--rise">
                                    <div class="order__title">Mua thẻ 1</div>
                                    <div class="card__attr">
                                        <div class="card--value__attr">
                                            Mã thẻ:<span class="card__info">48563415693486451</span>
                                        </div>
                                        <div class="js-copy-text">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/copy-black.png" alt="">
                                        </div>
                                    </div>
                                    <div class="card__attr">
                                        <div class="card--value__attr">
                                            Serial:<span class="card__info">48563415693486451</span>
                                        </div>
                                        <div class="js-copy-text">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/copy-black.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card--rise">
                                    <div class="order__title">Mua thẻ 1</div>
                                    <div class="card__attr">
                                        <div class="card--value__attr">
                                            Mã thẻ:<span class="card__info">48563415693486451</span>
                                        </div>
                                        <div class="js-copy-text">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/copy-black.png" alt="">
                                        </div>
                                    </div>
                                    <div class="card__attr">
                                        <div class="card--value__attr">
                                            Serial:<span class="card__info">48563415693486451</span>
                                        </div>
                                        <div class="js-copy-text">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/copy-black.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 p_0 px_1">
                                <div class="card--rise --secondary">
                                    <div class="card--rise__title">
                                        Thanh toán cho đơn hàng <span class="order__id">#33415</span>
                                    </div>
                                    <div class="order__attr">
                                        <div class="order--name__attr">
                                            Mã số
                                        </div>
                                        <div class="order--value__attr">
                                            12412
                                        </div>
                                    </div>
                                    <div class="order__attr">
                                        <div class="order--name__attr">
                                            Mô tả
                                        </div>
                                        <div class="order--value__attr">
                                            2 thẻ Garena 20.000đ
                                        </div>
                                    </div>
                                    <div class="order__attr">
                                        <div class="order--name__attr">
                                            Trạng thái
                                        </div>
                                        <div class="order--value__attr">
                                            Thành công
                                        </div>
                                    </div>
                                    <div class="order__attr">
                                        <div class="order--name__attr">
                                            Số tiền
                                        </div>
                                        <div class="order--value__attr">
                                            40.000 đ
                                        </div>
                                    </div>
                                    <div class="order__attr">
                                        <div class="order--name__attr">
                                            Chiết khấu
                                        </div>
                                        <div class="order--value__attr">
                                            0%
                                        </div>
                                    </div>
                                    <div class="order__attr">
                                        <div class="order--name__attr">
                                            Ngày tạo
                                        </div>
                                        <div class="order--value__attr">
                                            19/12/2021 04:20
                                        </div>
                                    </div>
                                    <a href="/mua-the" class="btn -primary btn-big">Mua lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

