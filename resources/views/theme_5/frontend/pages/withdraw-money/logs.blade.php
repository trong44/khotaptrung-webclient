@extends('frontend.layouts.master')

@section('content')
    <div class="background-history">
        <div class="container c-container-side c-pb-40">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/withdrawitem-slug" class="breadcrumb-link">Rút tiền ATM - Ví điện tử</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/profile-navbar" class="link-back"></a>

                <h1 class="head-title text-title">Rút tiền ATM - Ví điện tử</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>
                <div class="c-ml-16 c-ml-lg-0 c-history-right">

                    <div class="card unset-lg withdraw-money">
                        <div class="card-header d-none d-lg-block">
                            <h1 class="text-title-bold fz-20 lh-28">
                                Rút tiền ATM - Ví điện tử
                            </h1>
                        </div>
                        <div class="head-mobile">
                            <a href="#" class="link-back"></a>

                            <h1 class="head-title text-title">Rút tiền ATM - Ví điện tử</h1>

                            <a href="#" class="notify" data-notify="2"></a>
                        </div>
                        <div class="card-body c-px-16 c-py-0">
                            <ul class="nav nav-tabs size-auto c-pb-16" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="tab active" data-toggle="tab" href="#tab-1" role="tab" aria-selected="true">Rút tiền</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="tab" data-toggle="tab" href="#tab--2" role="tab" aria-selected="false">Lịch sử</a>
                                </li>
                            </ul>
                            <div class="tab-content withdraw-body">
                                <div class="tab-pane fade active show c-pt-16 c-pb-lg-50 c-mb-lg-50" id="tab-1" role="tabpanel">
                                    <div class="group-info">
                                        <span class="fw-400">Số tiền hiện có:</span>
                                        <span class="text-primary-color">10.000.000đ</span>
                                    </div>
                                    <p class="text-title title-color c-mt-16 c-mb-8">
                                        Chọn phương thức rút tiền
                                    </p>
                                    <div class="group-info">
                                        <div class="c-mb-12">
                                            <label for="atm" class="input-radio">
                                                <input type="radio" name="payment_method" id="atm" checked>
                                                <span class="checkmark"></span>
                                                <span class="text-label">Tài khoản ngân hàng</span>
                                            </label>
                                        </div>
                                        <div>
                                            <label for="wallet" class="input-radio">
                                                <input type="radio" name="payment_method" id="wallet">
                                                <span class="checkmark"></span>
                                                <span class="text-label">Ví điện tử</span>
                                            </label>
                                        </div>
                                    </div>
                                    <p class="text-title title-color c-mt-16 c-mb-4">
                                        Chọn tài khoản nhận tiền
                                    </p>
                                    <select name="" id="">
                                        <option value="">Techcombank - 1903 2345 24355</option>
                                    </select>
                                    <p class="text-title title-color c-mt-8 c-mb-4">
                                        Họ và tên chủ tài khoản
                                    </p>
                                    <input type="text" placeholder="Nhập họ tên chủ tài khoản nhận tiền">
                                    <p class="text-title title-color c-mt-8 c-mb-4">
                                        Nhập số tiền cần rút
                                    </p>
                                    <input type="text" placeholder="Nhập số tiền" numberic>
                                    <p class="text-title title-color c-mt-8 c-mb-4">
                                        Nhập nội dung rút tiền
                                    </p>
                                    <textarea name="" id="" style="height: 84px" placeholder="Vui lòng nhập nội dung (nếu có)"></textarea>

                                    <div class="footer-mobile">
                                        <div class="group-btn" >
                                            <button type="button" class="btn secondary open-sheet" data-toggle="modal" data-target="#modal-add-bank" data-target_2="#sheet-add-bank">Thêm NH/ Ví ĐT</button>
                                            <button type="button" class="btn primary" data-toggle="modal" data-target="#modal-success">Giao dịch</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab--2" role="tabpanel">
                                    <div class="c-history-title c-pb-16 c-pb-lg-12 media-web">
                                        <h3 class="fw-700 fz-20 fz-lg-16 lh-28 lh-lg-20 mb-0">Lịch sử rút vật phẩm</h3>
                                    </div>
                                    <div class="justify-content-between align-items-center c-pt-16 c-pb-16 c-mb-12 d-none d-lg-flex">
                                        <form action="" class="form-search history">
                                            <input type="search" placeholder="Tìm kiếm" class=" has-submit">
                                            <button type="submit"></button>
                                        </form>
                                        <div class="value-filter">
                                            <div class="show-modal-filter noselect" data-toggle="modal" data-target="#modal-filter">Bộ lọc</div>
                                        </div>
                                    </div>
                                    <div class="tags d-none d-lg-flex justify-content-end" id="params-filter">
                                        {{--                        <div class="tag">Mã số</div>--}}
                                        {{--                        <div class="tag">Trạng thái</div>--}}
                                        {{--                        <div class="tag">Rank</div>--}}
                                    </div>
                                    <div class="justify-content-between align-items-center c-pt-lg-16 c-pb-16 c-mb-16 d-flex d-lg-none">
                                        <form action="" class="form-search history">
                                            <input type="search" placeholder="Tìm kiếm" class="search">
                                            <button type="submit"></button>
                                        </form>
                                        <div class="value-filter c-ml-16">
                                            <button type="button" class="filter-history open-sheet" data-target="#sheet-filter" data-notify="0"></button>
                                        </div>
                                    </div>
                                    <div class="mr-n1 pb-3">
                                        <div class="history-content c-pt-16 mr-n2">
                                            <div class="text-title-bold fw-500 c-mb-12">Tháng 06</div>
                                            <ul class="trans-list">
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                                            <span class="fw-500 title-color d-block c-mb-0">
                                                Rút tiền về TK ngân hàng
                                            </span>
                                                            <span class="link-color">
                                                26/04/2021 - 16:05
                                            </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                <span class="fw-500 title-color d-block c-mb-0">
                    Rút tiền về TK ngân hàng
                </span>
                                                            <span class="link-color">
                    26/04/2021 - 16:05
                </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                <span class="fw-500 title-color d-block c-mb-0">
                    Rút tiền về TK ngân hàng
                </span>
                                                            <span class="link-color">
                    26/04/2021 - 16:05
                </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                <span class="fw-500 title-color d-block c-mb-0">
                    Rút tiền về TK ngân hàng
                </span>
                                                            <span class="link-color">
                    26/04/2021 - 16:05
                </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                <span class="fw-500 title-color d-block c-mb-0">
                    Rút tiền về TK ngân hàng
                </span>
                                                            <span class="link-color">
                    26/04/2021 - 16:05
                </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="text-title-bold fw-500 c-mb-12">Tháng 06</div>
                                            <ul class="trans-list">
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                                            <span class="fw-500 title-color d-block c-mb-0">
                                                Rút tiền về TK ngân hàng
                                            </span>
                                                            <span class="link-color">
                                                26/04/2021 - 16:05
                                            </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                                        <span class="fw-500 title-color d-block c-mb-0">
                                            Rút tiền về TK ngân hàng
                                        </span>
                                                            <span class="link-color">
                                            26/04/2021 - 16:05
                                        </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                                        <span class="fw-500 title-color d-block c-mb-0">
                                            Rút tiền về TK ngân hàng
                                        </span>
                                                            <span class="link-color">
                                            26/04/2021 - 16:05
                                        </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="text-title-bold fw-500 c-mb-12">Tháng 06</div>
                                            <ul class="trans-list">
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                                        <span class="fw-500 title-color d-block c-mb-0">
                                            Rút tiền về TK ngân hàng
                                        </span>
                                                            <span class="link-color">
                                            26/04/2021 - 16:05
                                        </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                                        <span class="fw-500 title-color d-block c-mb-0">
                                            Rút tiền về TK ngân hàng
                                        </span>
                                                            <span class="link-color">
                                            26/04/2021 - 16:05
                                        </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                                        <span class="fw-500 title-color d-block c-mb-0">
                                            Rút tiền về TK ngân hàng
                                        </span>
                                                            <span class="link-color">
                                            26/04/2021 - 16:05
                                        </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="text-title-bold fw-500 c-mb-12">Tháng 06</div>
                                            <ul class="trans-list">
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                                        <span class="fw-500 title-color d-block c-mb-0">
                                            Rút tiền về TK ngân hàng
                                        </span>
                                                            <span class="link-color">
                                            26/04/2021 - 16:05
                                        </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                                        <span class="fw-500 title-color d-block c-mb-0">
                                            Rút tiền về TK ngân hàng
                                        </span>
                                                            <span class="link-color">
                                            26/04/2021 - 16:05
                                        </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="trans-item">
                                                    <a href="/detail-prize-history">
                                                        <div class="text-left">
                                        <span class="fw-500 title-color d-block c-mb-0">
                                            Rút tiền về TK ngân hàng
                                        </span>
                                                            <span class="link-color">
                                            26/04/2021 - 16:05
                                        </span>
                                                        </div>
                                                        <div class="text-right">
                                                            <span class="fw-500 d-block c-mb-0">190.000đ</span>
                                                            <span class="success-color c-mb-0">Thành công</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <!-- Sheet Filter Mobile -->
                                    <div class="bottom-sheet" id="sheet-filter" aria-hidden="true" data-height="60">
                                        <div class="layer"></div>
                                        <div class="content-bottom-sheet bar-slide">
                                            <form action="" class="form-filter">
                                                <div class="sheet-header">
                                                    <h2 class="text-title center">
                                                        Bộ lọc
                                                    </h2>
                                                    <label class="close"></label>
                                                </div>
                                                <div class="sheet-body overflow-visible">
                                                    <!-- body -->
                                                    <div class="input-group">
                        <span class="form-label">
                            Loại giao dịch
                        </span>
                                                        <select name="service" id="">
                                                            <option value="">Chọn</option>
                                                        </select>
                                                    </div>

                                                    <div class="input-group">
                        <span class="form-label">
                            Trạng thái
                        </span>
                                                        <select name="status" id="">
                                                            <option value="">Chọn</option>
                                                            <option value="1">Đã bán</option>
                                                            <option value="0">Hủy</option>
                                                        </select>
                                                    </div>

                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="input-group">
                                <span class="form-label">
                                    Từ ngày
                                </span>
                                                                    <input type="text" class="date-right" placeholder="Chọn">
                                                                </div>
                                                            </td>
                                                            <td class="c-px-6 d-block"></td>
                                                            <td>
                                                                <div class="input-group">
                                <span class="form-label">
                                    Đến ngày
                                </span>
                                                                    <input type="text" class="date-right" placeholder="Chọn">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="sheet-footer">
                                                    <button class="btn secondary js-reset-form">Thiết lập lại</button>
                                                    <button class="btn primary js-submit-form">Xem kết quả</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Modal Filter -->
                                    <div class="modal fade" id="modal-filter">
                                        <div class="modal-dialog modal-dialog-centered c-px-sm-16">
                                            <form action="" class="form-filter">
                                                <div class="modal-content">
                                                    <div class="modal-header justify-content-center p-0">
                                                        <h2 class="modal-title center">Bộ lọc</h2>
                                                        <button type="button" class="close" data-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body c-p-0">
                                                        <div class="input-group">
                                                            <span class="form-label title-color">Loại giao dịch</span>
                                                            <select name="id" id="">
                                                                <option value="">Chọn</option>
                                                                <option value="ngoc-rong">Ngoc rong</option>
                                                                <option value="cf-online">CF Online</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-group">
                                                            <span class="form-label title-color">Trạng thái</span>
                                                            <select name="status" id="">
                                                                <option value="">Chọn</option>
                                                                <option value="1">Huy</option>
                                                                <option value="0">Thanh cong</option>
                                                            </select>
                                                        </div>

                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <div class="input-group">
                                                    <span class="form-label title-color">
                                                        Từ ngày
                                                    </span>
                                                                        <input type="text" name="startat" class="date-right" placeholder="Chọn">
                                                                    </div>
                                                                </td>
                                                                <td class="c-px-6 d-block"></td>
                                                                <td>
                                                                    <div class="input-group">
                                                    <span class="form-label title-color">
                                                        Đến ngày
                                                    </span>
                                                                        <input type="text" name="endat" class="date-right" placeholder="Chọn">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer group-btn c-mt-24" style="--data-between: 12px">
                                                        <button type="button" class="btn secondary js-reset-form">Thiết lập lại</button>
                                                        <button type="button" class="btn primary js-submit-form">Xem kết quả</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container c-container c-pb-44">
            @include('frontend.widget.__service__other__his')
        </div>
    </div>


    <div class="modal fade" id="modal-add-bank">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title center">Thêm ngân hàng/Ví điện tử</h2>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <hr class="mx-n4 c-mt-16">
                <ul class="nav nav-tabs size-auto c-pb-16 mx-n4" role="tablist">
                    <li class="nav-item w-50" role="presentation">
                        <a class="tab active lh-24" data-toggle="tab" href="#tab-add-bank" role="tab" aria-selected="true">Tài khoản ngân hàng</a>
                    </li>
                    <li class="nav-item w-50" role="presentation">
                        <a class="tab lh-24" data-toggle="tab" href="#tab-add-wallet" role="tab" aria-selected="false">Ví điện tử</a>
                    </li>
                </ul>

                <div class="tab-content withdraw-body">
                    <div class="tab-pane fade active show" id="tab-add-bank" role="tabpanel">
                        <div class="modal-body c-p-0">
                            <div class="input-group">
                                <span class="form-label title-color">Ngân hàng</span>
                                <select name="" id="">
                                    <option value="">Chọn ngân hàng nhận tiền</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="form-label title-color">Chủ tài khoản</span>
                                <input type="text" placeholder="Nhập tên chủ tài khoản nhận tiền">
                            </div>

                            <div class="input-group">
                                <span class="form-label title-color">Số tài khoản</span>
                                <input type="text" placeholder="Nhập tài khoản nhận tiền">
                            </div>

                            <div class="input-group">
                                <span class="form-label title-color">Chi nhánh</span>
                                <input type="text" placeholder="Nhập tài khoản nhận tiền">
                            </div>
                        </div>
                        <div class="text-title c-mt-4 c-mb-8">
                            Lưu ý
                        </div>
                        <span class="link-color">
                        Các thông tin trên bạn vui lòng cung cấp chính xác để không xảy ra lỗi khi xử lý yêu cầu rút tiền. Nếu nhập sai thông tin, ngân hàng sẽ hoàn trả lại tiền và không hoàn phí rút tiền
                    </span>
                        <div class="modal-footer c-mt-40">
                            <a class="btn primary">Thêm ngân hàng</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-add-wallet" role="tabpanel">
                        <div class="modal-body c-p-0">
                            <div class="input-group">
                                <span class="form-label title-color">Ví điện tử</span>
                                <select name="" id="">
                                    <option value="">Chọn loại ví điện tử</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <span class="form-label title-color">Số tài khoản ví</span>
                                <input type="text" placeholder="Nhập tên chủ tài khoản nhận tiền">
                            </div>

                            <div class="input-group">
                                <span class="form-label title-color">Xác nhận lại số tài khoản ví</span>
                                <input type="text" placeholder="Nhập tài khoản nhận tiền">
                            </div>
                        </div>
                        <div class="text-title c-mt-4 c-mb-8">
                            Lưu ý
                        </div>
                        <span class="link-color">
                        Rút về các ví điện tử, Tất cả thông tin gồm tên tài khoản, số điện thoại, hoặc email tài khoản ở ví đó
                    </span>
                        <div class="modal-footer c-mt-40">
                            <a class="btn primary">Thêm ví điện tử</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-328" id="modal-success">
        <div class="modal-dialog modal-dialog-centered c-px-sm-16">
            <div class="modal-content">
                <div class="modal-header justify-content-center p-0">
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center c-p-0">
                    <div class="banner">
                        <img class="" src="/assets/frontend/{{theme('')->theme_key}}/image/son/success.png" alt="">
                    </div>
                    <p class="text-title-bold">Gửi yêu cầu rút tiền thành công</p>
                    <span>
                    Yêu cầu rút tiền đã được gửi đến hệ thống <br>Bạn vui lòng chờ hệ thống xác nhận nha!
                </span>
                </div>
                <div class="modal-footer group-btn c-mt-24" style="--data-between: 12px">
                    <a href="/" class="btn secondary" data-dismiss="modal">Trang chủ</a>
                    <a href="" class="btn primary">Hỗ trợ</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-small" id="modal--success__password">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content">
                <div class="modal-header justify-content-center p-0">
                    {{--                    Ảnh thất bại    --}}
                    {{--                                        <img class="c-pt-16 c-pb-16" src="/assets/frontend/{{theme('')->theme_key}}/image/son/thatbai.png" alt="">--}}
                    {{--                    Ảnh Thành công    --}}
                    <img class="c-pt-20 c-pb-20" src="/assets/frontend/{{theme('')->theme_key}}/image/son/success.png" alt="">
                </div>
                <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                    {{--                    Content 1  --}}
                    {{--                    <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Mua thẻ thất bại</p>--}}
                    {{--                    <p class="fw-400 fz-13 c-mt-10 mb-0">Rất tiếc việc mua thẻ đã thất bại do tài khoản của bạn không đủ, vui lòng nạp tiền để tiếp tục giao dịch!</p>--}}
                    {{--                    Content 2  --}}
                    {{--                    <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Nạp thẻ thành công</p>--}}
                    {{--                    <p class="fw-400 fz-13 c-mt-10 mb-0">--}}
                    {{--                        Sau khi chuyển khoản thành công hệ thống sẽ xử lí từ 2 giây tới 2 phút và cộng tiền vào tài khoản của bạn. Nếu sai thông tin hoặc xảy ra lỗi, vui lòng liên hệ--}}
                    {{--                        <a class="c-text-primary" href="">fanpage</a> để được hỗ trợ.--}}
                    {{--                    </p>--}}
                    {{--                    Content 3  --}}
                    {{--                    <p class="fw-700 fz-15 fz-lg-15 fz-md-14 fz-sm-12 c-mt-12 mb-0 text-title-theme">Chúc mừng bạn đã quay trúng</p>--}}
                    {{--                    <p class="fw-400 fz-13 fz-lg-13 fz-md-12 fz-sm-11 c-mt-10 mb-0">Giải thưởng: 100.000 kim cương</p>--}}
                    {{--                    <p class="fw-400 fz-13 fz-lg-13 fz-md-12 fz-sm-11 mt-0 mb-0">Giải thưởng: 100.000 kim cương</p>--}}
                    {{--                    <p class="fw-400 fz-13 fz-lg-13 fz-md-12 fz-sm-11 mt-0 mb-0">Tổng nhận được: <a class="c-text-pink" href="javascript:void(0)">100.100 kim cương</a></p>--}}
                    {{--                    Content 4  --}}
                    <p class="fw-700 fz-15 fz-lg-15 fz-md-14 fz-sm-12 c-mt-12 mb-0 text-title-theme">Thay đổi mật khẩu thành công</p>
                    <p class="fw-400 fz-13 fz-lg-13 fz-md-12 fz-sm-11 c-mt-10 mb-0">Tài khoản của bạn đã được thay đổi mật khẩu, vui lòng đăng nhập lại để tiếp tục giao dịch</p>
                </div>
                <div class="modal-footer c-p-24">
                    {{--                <button class="btn ghost" data-dismiss="modal">Thoát</button>--}}
                    <a class="btn secondary" data-dismiss="modal" href="/">Trang chủ</a>
                    <button class="btn primary">Đăng nhập lại</button>
                </div>
            </div>
        </div>
    </div>
@endsection



