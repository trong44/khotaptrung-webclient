@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('content')

    {{--  Menu  --}}
    <section class="media-web">
        <div class="container container-fix menu-container-ct">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li class="menu-container-li-ct"><img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="/lich-su-giao-dich">Lịch sử giao dịch</a></li>
                <li class="menu-container-li-ct"><img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="/lich-su-tra-gop">Tài khoản trả góp</a></li>
            </ul>
        </div>
    </section>

    <section class="media-mobile">
        <div class="container container-fix banner-mobile-container-ct">

            <div class="row marginauto banner-mobile-row-ct">
                <div class="col-auto left-right" style="width: 10%">
                    <a href="javascript:void(0)" class="previous-step-one" style="line-height: 28px" onclick="openMenuProfile()">
                        <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" >
                    </a>
                </div>

                <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                    <h1>Tài khoản trả góp</h1>
                </div>
                <div class="col-auto left-right" style="width: 10%">
                </div>
            </div>

        </div>
    </section>

    {{--   Bopdy --}}
    <section>
        <div class="container container-fix body-container-ct">
            <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">
                @include('theme_3.frontend.widget.__navbar__profile')

                <div class="col-lg-9 col-12 body-container-detail-right-ct">
                    <div class="row marginauto logs-content">
                        <div class="col-md-12 left-right">
                            <div class="row marginauto logs-title">
                                <div class="col-md-12 left-right">
                                    <span>Tài khoản trả góp</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 logs-search left-right">

                            <div class="row marginauto">
                                <div class="col-12 left-right">
                                    <form action="" method="POST">
                                        <div class="row marginauto body-form-search-ct">
                                            <div class="col-auto left-right">
                                                <input autocomplete="off" type="text" name="search" class="input-search-log-ct" placeholder="Nhập từ khóa">
                                                <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                                            </div>
                                            <div class="col-4 body-form-search-button-ct media-web">
                                                <button type="submit" class="timkiem-button-ct">Tìm kiếm</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto ml-auto left-right">

                                    <div class="row marginauto justify-content-end nick-findter-row">

                                        <div class="col-auto nick-findter" style="position: relative">
                                            <ul>
                                                <li class="li-boloc">Bộ lọc</li>
                                                <li class="margin-findter">
                                                    <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/filter.png" alt="">
                                                    <span class="overlay-find">
                                                        0
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="row marginauto nick-findter-data">
                                {{--                                        <div class="col-auto prepend-nick" style="position: relative"><a href="">Từ 500K - 1 Triệu</a><img class="lazy close-item-nick" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/close.png" alt=""></div>--}}
                            </div>
                        </div>

                        <div class="col-md-12 logs-table left-right">
                            <div class="row default-table">
                                <div class="col-md-12 left-right">
                                    <table class="table table-responsive table-striped table-hover table-logs" id="table-default">
                                        <thead>
                                        <tr>
                                            <th>Thời gian</th>
                                            <th>ID</th>
                                            <th>Game</th>
                                            <th>Tài khoản</th>
                                            <th>Trị giá</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>09-02-2022 08:32</td>
                                            <td>#4171</td>

                                            <td>Bán đồ ngọc rồng</td>
                                            <td>
                                                sonbt@hqplay.vn
                                            </td>

                                            <td class="text-right">
                                                1.000.000 đ
                                            </td>
                                            <td><span class="badge badge-danger">Thất bại</span></td>
                                            <td class="text-right">
                                                <a class="refund-default openHoanTien">Hoàn tiền</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09-02-2022 08:32</td>
                                            <td>#4171</td>

                                            <td>Bán đồ ngọc rồng</td>
                                            <td>
                                                sonbt@hqplay.vn
                                            </td>

                                            <td class="text-right">
                                                1.000.000 đ
                                            </td>
                                            <td><span class="badge badge-warning">Đang trả góp</span></td>
                                            <td class="text-right">
                                                <a class="refund-default openHoanTien">Hoàn tiền</a>
                                                <a class="refund-default refund-default-tt openTTTraGop">Tất toán</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09-02-2022 08:32</td>
                                            <td>#4171</td>

                                            <td>Bán đồ ngọc rồng</td>
                                            <td>
                                                sonbt@hqplay.vn
                                            </td>

                                            <td class="text-right">
                                                1.000.000 đ
                                            </td>
                                            <td><span class="badge badge-success">Thành công</span></td>
                                            <td class="text-right">
                                                <a class="refund-default openPassword">Mật khẩu</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09-02-2022 08:32</td>
                                            <td>#4171</td>

                                            <td>Bán đồ ngọc rồng</td>
                                            <td>
                                                sonbt@hqplay.vn
                                            </td>

                                            <td class="text-right">
                                                1.000.000 đ
                                            </td>
                                            <td><span class="badge badge-success">Thành công</span></td>
                                            <td class="text-right">
                                                <a class="refund-default openPassword">Mật khẩu</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09-02-2022 08:32</td>
                                            <td>#4171</td>

                                            <td>Bán đồ ngọc rồng</td>
                                            <td>
                                                sonbt@hqplay.vn
                                            </td>

                                            <td class="text-right">
                                                1.000.000 đ
                                            </td>
                                            <td><span class="badge badge-success">Thành công</span></td>
                                            <td class="text-right">
                                                <a class="refund-default openPassword">Mật khẩu</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09-02-2022 08:32</td>
                                            <td>#4171</td>

                                            <td>Bán đồ ngọc rồng</td>
                                            <td>
                                                sonbt@hqplay.vn
                                            </td>

                                            <td class="text-right">
                                                1.000.000 đ
                                            </td>
                                            <td><span class="badge badge-success">Thành công</span></td>
                                            <td class="text-right">
                                                <a class="refund-default openPassword">Mật khẩu</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09-02-2022 08:32</td>
                                            <td>#4171</td>

                                            <td>Bán đồ ngọc rồng</td>
                                            <td>
                                                sonbt@hqplay.vn
                                            </td>

                                            <td class="text-right">
                                                1.000.000 đ
                                            </td>
                                            <td><span class="badge badge-success">Thành công</span></td>
                                            <td class="text-right">
                                                <a class="refund-default openPassword">Mật khẩu</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09-02-2022 08:32</td>
                                            <td>#4171</td>

                                            <td>Bán đồ ngọc rồng</td>
                                            <td>
                                                sonbt@hqplay.vn
                                            </td>

                                            <td class="text-right">
                                                1.000.000 đ
                                            </td>
                                            <td><span class="badge badge-success">Thành công</span></td>
                                            <td class="text-right">
                                                <a class="refund-default openPassword">Mật khẩu</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09-02-2022 08:32</td>
                                            <td>#4171</td>

                                            <td>Bán đồ ngọc rồng</td>
                                            <td>
                                                sonbt@hqplay.vn
                                            </td>

                                            <td class="text-right">
                                                1.000.000 đ
                                            </td>
                                            <td><span class="badge badge-success">Thành công</span></td>
                                            <td class="text-right">
                                                <a class="refund-default openPassword">Mật khẩu</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>09-02-2022 08:32</td>
                                            <td>#4171</td>

                                            <td>Bán đồ ngọc rồng</td>
                                            <td>
                                                sonbt@hqplay.vn
                                            </td>

                                            <td class="text-right">
                                                1.000.000 đ
                                            </td>
                                            <td><span class="badge badge-success">Thành công</span></td>
                                            <td class="text-right">
                                                <a class="refund-default openPassword">Mật khẩu</a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right justify-content-end default-paginate">
                            <div class="row marinautooo justify-content-center">
                                <div class="col-auto">
                                    <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                        <ul class="pagination pagination-sm">
                                            <li class="page-item disabled">
                                                <a href="" class="page-link">
                                                </a>
                                            </li>
                                            <li class="page-item active">
                                                <span class="page-link">1</span>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="https://webnick.vn/mua-acc/nick-lien-quan?page=2">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="https://webnick.vn/mua-acc/nick-lien-quan?page=3">3</a>
                                            </li>
                                            <li class="page-item disabled hidden-xs">
                                                <span class="page-link">...</span>
                                            </li>
                                            <li class="page-item hidden-xs">
                                                <a class="page-link" href="https://webnick.vn/mua-acc/nick-lien-quan?page=14">14</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="https://webnick.vn/mua-acc/nick-lien-quan?page=2" rel="next"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--                        <div class="col-md-12 logs-table left-right">--}}
                        {{--                            <div class="row marginauto default-table">--}}
                        {{--                                <div class="col-md-12 left-right">--}}
                        {{--                                    <table class="table table-responsive-lg table-striped table-hover table-logs">--}}
                        {{--                                        <thead>--}}
                        {{--                                        <tr>--}}
                        {{--                                            <th>Thời gian</th>--}}
                        {{--                                            <th>Kiểu nạp</th>--}}
                        {{--                                            <th>Nhà mạng</th>--}}
                        {{--                                            <th>Mã thẻ/Serial</th>--}}
                        {{--                                            <th>Mệnh giá</th>--}}
                        {{--                                            <th>THực nhận</th>--}}
                        {{--                                            <th>Trạng thái</th>--}}
                        {{--                                        </tr>--}}
                        {{--                                        </thead>--}}
                        {{--                                        <tbody>--}}

                        {{--                                        <tr style="width: 100%" id="table-notdata">--}}
                        {{--                                            <td colspan="7"><span>Tài khoản của quý khách chưa phát sinh giao dịch</span></td>--}}
                        {{--                                        </tr>--}}
                        {{--                                        </tbody>--}}
                        {{--                                    </table>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade login show small-log-Modal modal-logs-txns" id="openFinter" aria-modal="true">

        <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
            <!--        <div class="image-login"></div>-->
            <div class="modal-content">
                <div class="modal-header p-0" style="border-bottom: 0">
                    <div class="row marginauto modal-header-nick-ct">
                        <div class="col-12 left-right text-center" style="position: relative">
                            <span>Bộ lọc</span>
                            <img class="lazy img-close-nick-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>

                </div>

                <div class="modal-body modal-body-order-ct">
                    <form action="">
                        <div class="row marginauto">

                            <div class="col-md-12 left-right">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                        <span>Mã tài khoản</span>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct transaction-finter-nick">
                                        <select class="wide transaction" name="transaction">
                                            <option>Chọn</option>
                                            <option value="1">#123456</option>
                                            <option value="2">#654321</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right modal-nick-padding">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                        <span>Game</span>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct game-finter-nick">
                                        <select class="wide game" name="game">
                                            <option>Chọn</option>
                                            <option value="1">Liên minh huyền thoại</option>
                                            <option value="2">Freefile</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right modal-nick-padding">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                        <span>Trạng thái</span>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct status-finter-nick">
                                        <select class="wide status" name="status">
                                            <option>Chọn</option>
                                            <option value="1">Chưa bán</option>
                                            <option value="2">Đã bán</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right modal-nick-padding">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                        <span>Số tiền</span>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct price-finter-nick">
                                        <select class="wide price" name="price">
                                            <option>Chọn</option>
                                            <option value="1">50.000 đ</option>
                                            <option value="2">100.000 đ</option>
                                            <option value="3">200.000 đ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 left-right">
                                <div class="row body-title-detail-ct">

                                    <div class="col-md-6 text-left body-title-detail-col-ct">
                                        <div class="row marginauto">
                                            <div class="col-md-12 left-right body-title-detail-span-ct">
                                                <span>Từ ngày</span>
                                            </div>
                                            <div class="col-md-12 left-right body-title-detail-select-ct">
                                                <input autocomplete="off" name="started_at" class="input-defautf-ct started_at" type="text" placeholder="Chọn">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-6 text-left body-title-detail-col-ct">
                                        <div class="row marginauto password-mobile">
                                            <div class="col-md-12 left-right body-title-detail-span-ct">
                                                <span>Đến ngày</span>
                                            </div>
                                            <div class="col-md-12 left-right body-title-detail-select-ct" style="position: relative">
                                                <input autocomplete="off" class="input-defautf-ct ended_at" type="text" placeholder="Chọn">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12 left-right padding-nicks-footer-ct">

                                <div class="row marginauto justify-content-center">
                                    <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                        <div class="row marginauto modal-footer-success-row-not-ct">
                                            <div class="col-md-12 left-right">
                                                <a href="javascript:void(0)" class="button-not-bg-ct reset-find"><span>Thiết lập lại</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                        <div class="row marginauto">
                                            <div class="col-md-12 left-right">
                                                <button class="button-default-modal-ct button-modal-nick openSuccess" type="button">Áp dụng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <div class="modal fade login show order-modal" id="huyTraGop" aria-modal="true">

        <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
            <!--        <div class="image-login"></div>-->
            <div class="modal-content">
                <div class="modal-header p-0" style="border-bottom: 0">
                    <div class="row marginauto modal-header-order-ct">
                        <div class="col-12 span__donhang text-center" style="position: relative">
                            <span>Hủy bỏ trả góp và hoàn tiền</span>
                            <img class="lazy img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>

                </div>

                <div class="modal-body modal-body-order-ct">
                    <div class="row marginauto">

                        <div class="col-md-12 left-right title-order-ct delete-account">
                            <span>Thông tin acc đã mua</span>
                            <p>#1085 - (Acc #523961)</p>
                        </div>

                        <div class="col-md-12 left-right" id="order-errors">
                            <div class="row marginauto order-errors">
                                <div class="col-md-12 left-right">
                                    <small>Lỗi rồi em ơi</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right">
                            <div class="row body-title-detail-ct">

                                <div class="col-md-12 text-left body-title-detail-nick-col-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right body-title-detail-span-ct">
                                            <span>Đã thanh toán</span>
                                        </div>
                                        <div class="col-md-12 left-right body-title-detail-select-ct">
                                            <input readonly autocomplete="off" class="input-defautf-ct" type="text" placeholder="40.000 đ">
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-12 text-left padding-logs-tra-gop body-title-detail-nick-col-ct">
                                    <div class="row marginauto password-mobile">
                                        <div class="col-md-12 left-right body-title-detail-span-ct">
                                            <span>Hoàn tiền</span>
                                        </div>
                                        <div class="col-md-12 left-right body-title-detail-select-ct" style="position: relative">
                                            <input readonly autocomplete="off" class="input-defautf-ct" type="text" placeholder="8.000 đ">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

{{--                        <div class="col-md-12 left-right title-tra-gop">--}}
{{--                            <small>Nếu bạn chưa hoàn tất thanh toán toàn bộ trước thời hạn 01/06/2022 00:00:00, giao dịch sẽ bị hủy bỏ và bạn sẽ nhận tiền hoàn lại bằng 20% số tiền trả ban đầu.</small>--}}
{{--                        </div>--}}

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
                                            <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/capcha.png" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-auto text-left body-title-detail-col-right-ng-ct">
                                    <div class="row marginauto password-mobile capcha-image-bg">
                                        <div class="col-md-12 left-right body-title-detail-select-ct">
                                            <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/rf-capcha.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right padding-order-ct">
                            <div class="row marginauto">
                                <div class="col-md-12 left-right background-order-ct">
                                    <div class="row marginauto logs-tra-gop-row">
                                        <div class="col-md-12 left-right small-logs-tra-gop">
                                            <small>Đúng 01-01-2022, 00:00:00 giao dịch sẽ tự động hủy bỏ và hoàn lại tiền hoặc quý khách có thể hủy bỏ giao dịch tại đây.</small>
                                        </div>
                                        <div class="col-md-12 left-right span-logs-tra-gop">
                                            <span>Đúng 01-01-2022, 00:00:00 giao dịch sẽ tự động hủy bỏ và hoàn lại tiền hoặc quý khách có thể hủy bỏ giao dịch tại đây.</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 left-right padding-order-footer-logs-ct">
                            <div class="row marginauto">
                                <div class="col-md-12 left-right">
                                    <button class="button-default-modal-ct openSuccess" type="button">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="modal fade login show order-modal" id="ttTraGop" aria-modal="true">

        <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
            <!--        <div class="image-login"></div>-->
            <div class="modal-content">
                <div class="modal-header p-0" style="border-bottom: 0">
                    <div class="row marginauto modal-header-order-ct">
                        <div class="col-12 span__donhang text-center" style="position: relative">
                            <span>Thanh toán trả góp</span>
                            <img class="lazy img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>

                </div>

                <div class="modal-body modal-body-order-ct">
                    <div class="row marginauto">

                        <div class="col-md-12 left-right title-order-ct delete-account">
                            <span>Thông tin acc đã mua</span>
                            <p>#1085 - (Acc #523961)</p>
                        </div>

                        <div class="col-md-12 left-right" id="order-errors">
                            <div class="row marginauto order-errors">
                                <div class="col-md-12 left-right">
                                    <small>Lỗi rồi em ơi</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right">
                            <div class="row body-title-detail-ct">

                                <div class="col-md-12 text-left body-title-detail-nick-col-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right body-title-detail-span-ct">
                                            <span>Đã thanh toán</span>
                                        </div>
                                        <div class="col-md-12 left-right body-title-detail-select-ct">
                                            <input readonly autocomplete="off" class="input-defautf-ct" type="text" placeholder="40.000 đ">
                                        </div>
                                    </div>


                                </div>

                                <div class="col-md-12 text-left padding-logs-tra-gop body-title-detail-nick-col-ct">
                                    <div class="row marginauto password-mobile">
                                        <div class="col-md-12 left-right body-title-detail-span-ct">
                                            <span>Hoàn tiền</span>
                                        </div>
                                        <div class="col-md-12 left-right body-title-detail-select-ct" style="position: relative">
                                            <input readonly autocomplete="off" class="input-defautf-ct" type="text" placeholder="8.000 đ">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{--                        <div class="col-md-12 left-right title-tra-gop">--}}
                        {{--                            <small>Nếu bạn chưa hoàn tất thanh toán toàn bộ trước thời hạn 01/06/2022 00:00:00, giao dịch sẽ bị hủy bỏ và bạn sẽ nhận tiền hoàn lại bằng 20% số tiền trả ban đầu.</small>--}}
                        {{--                        </div>--}}

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
                                            <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/capcha.png" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-auto text-left body-title-detail-col-right-ng-ct">
                                    <div class="row marginauto password-mobile capcha-image-bg">
                                        <div class="col-md-12 left-right body-title-detail-select-ct">
                                            <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/rf-capcha.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right padding-order-ct">
                            <div class="row marginauto">
                                <div class="col-md-12 left-right background-order-ct">
                                    <div class="row marginauto logs-tra-gop-row">
                                        <div class="col-md-12 left-right small-logs-tra-gop">
                                            <small>Bạn phải tất toán giao dịch trước 16-03-200, 00:00:00 trước khi giao dịch bị hủy bỏ.</small>
                                        </div>
                                        <div class="col-md-12 left-right span-logs-tra-gop">
                                            <span>Tài khoản chưa được cấu hình ODP, Click “ Tất toán trả góp” để hoàn thành trả góp.</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 left-right padding-order-footer-logs-ct">
                            <div class="row marginauto">
                                <div class="col-md-12 left-right">
                                    <button class="button-default-modal-ct" type="button">Tất toán trả góp</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade login show order-modal" id="showPassword" aria-modal="true">

        <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
            <!--        <div class="image-login"></div>-->
            <div class="modal-content">
                <div class="modal-header p-0" style="border-bottom: 0">
                    <div class="row marginauto modal-header-order-ct">
                        <div class="col-12 span__donhang text-center" style="position: relative">
                            <span>Mua tài khoản thành công</span>
                            <img class="lazy img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>

                </div>

                <div class="modal-body modal-body-order-ct">
                    <div class="row marginauto">

                        <div class="col-md-12 left-right image-success">
                            <div class="row marginauto justify-content-center">
                                <div class="col-auto">
                                    <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/group.png" alt="">
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
                                            <img class="lazy " src="/assets/frontend/{{theme('')->theme_key}}/image/nick/copy.png" alt="" id="getCopyemail">
                                        </div>
                                        <div class="row marginauto title-tra-gop-success-row">
                                            <div class="col-md-12 left-right body-title-detail-span-ct">
                                                <span>Mật khẩu</span>
                                            </div>
                                            <div class="col-md-12 left-right body-title-detail-select-ct taikhoan-success-nick">
                                                <input id="password" readonly autocomplete="off" class="input-defautf-ct" type="password" value="123456" placeholder="******">
                                                <img class="lazy img-copy" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/copy.png" alt="" id="getCopypass">
                                                <div class="getCopypass">
                                                    <img class="lazy img-show-password" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/eyehide.png" alt="" id="getShowpass">
                                                </div>


                                            </div>
                                        </div></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right title-tra-gop text-center">
                            <small>Đã lấy mật khẩu lúc: 05-05-2022, 121:32:56</small>
                        </div>

                        <div class="col-md-12 left-right padding-order-16-ct">
                            <div class="row marginauto">
                                <div class="col-md-12 left-right background-order-ct">
                                    <div class="row marginauto title-success-thanh-cong">
                                        <div class="col-md-12 left-right">
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
                                            <a href="javascript:void(0)" class="button-not-bg-ct close-modal-default"><span>Đóng</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                    <div class="row marginauto modal-footer-success-row-ct">
                                        <div class="col-md-12 left-right">
                                            <a href="/change-password" class="button-bg-ct"><span>Đổi mật khẩu</span></a>
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

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/logs-installment.js"></script>

@endsection







