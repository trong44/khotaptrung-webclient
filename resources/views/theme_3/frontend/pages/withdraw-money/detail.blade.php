@extends('theme_3.frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/breadcrumb.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/withdraw_money.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/layout_page.css">
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_phu/withdraw_money.js"></script>
@endsection
@section('content')
    <div class="container_page container">
        {{--breadcrumb--}}
        <section class="breadcrumb-container">
            <ul class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="">Rút tiền ATM-Ví</a></li>
            </ul>
        </section>
        <section class="breadcrumb-mobile">
            <a href="/" style="display: block">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/back.svg" alt="">
            </a>
            <h1>Rút tiền ATM - Ví điện tử</h1>
        </section>
        <div class="row">
            {{--navbar--}}
            @include('frontend.widget.__navbar__profile')
            {{--content--}}
            <div class="col-12 col-lg-9">
                <div class="withdraw-content" id="withdrawMoney">
                    <div class="withdraw-header row no-gutters">
                        <div class="col-6">
                            <div class="listed-type listed-type-active">
                                Rút tiền ATM - Ví
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="listed-type">
                                Lịch sử
                            </div>
                        </div>
                        <div class="type-listing"></div>
                    </div>
                    <div class="withdraw-body">
                        <div class="withdraw-tab-container">
                            <div class="withdraw-tab-header">
                                Số tiền hiện có: <span>10.000.000 đ</span>
                            </div>
                            <div class="withdraw-tab">
                                <div class="input-block">
                                    <h6>Chọn phương thức rút tiền</h6>
                                    <div class="radio-container">
                                        <div class="radio-block">
                                            <input type="radio" name="transaction_type" value="0" id="bankAccountRadio">
                                            <label for="bankAccountRadio">Tài khoản Ngân hàng</label>
                                        </div>
                                        <div class="radio-block">
                                            <input type="radio" name="transaction_type" value="1" id="walletRadio">
                                            <label for="walletRadio">Ví điện tử</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-block">
                                    <h6>Chọn tài khoản nhận tiền</h6>
                                    <select class="select-primary withdraw-select" id="bankAccountSelect" name="">
                                        <option value="">1903 0004 1234 - Techcombank</option>
                                        <option value="">1903 0004 1234 - Techcombank</option>
                                        <option value="">1903 0004 1234 - Techcombank</option>
                                    </select>
                                </div>
                                <div class="input-block">
                                    <h6>Số tiền muốn rút</h6>
                                    <input type="text" name="" class="withdraw-inputs input-primary" placeholder="Nhập số tiền muốn rút">
                                    <div class="withdraw-reminder">Số tiền rút từ 100,000đ đến 10,000,000đ</div>
                                    <div class="withdraw-reminder mt-0">Phí rút tiền: 0đ (Không trừ vào số tiền rút)</div>
                                </div>
                                <div class="input-block">
                                    <h6>Nội dung rút tiền</h6>
                                    <textarea class="textarea-primary" name="" id="" rows="2" placeholder="Nhập nội dung nếu cần thiết"></textarea>
                                </div>
                                <div class="input-block input-block-password">

                                </div>
                                <div class="input-block capcha-block">
                                    <h6>Mã bảo vệ</h6>
                                    <div class="col-md-12 p-0 d-flex">
                                        <input type="text" name="" class="withdraw-inputs input-primary" placeholder="Nhập mã bảo vệ ">
                                        <div class="withdraw-capcha">
                                            <div>
                                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/capcha_example.png" alt="">
                                            </div>
                                        </div>
                                        <button class="withdraw-refresh-capcha">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/captcha_refresh.png" alt="">
                                        </button>
                                    </div>
                                </div>
                                <div class="input-button row">
                                    <div class="col-6" style="padding-right: 5px">
                                        <button class="button-secondary" type="button" id="addBankAccount">Thêm Ngân hàng/Ví</button>
                                    </div>
                                    <div class="col-6" style="padding-left: 5px">
                                        <button class="button-primary" type="submit" id="withdrawMoneyButton">Thực hiện</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="history-tab-container" style="display: none">
                            <div class="history-tab-filter">
                                <div class="history-search">
                                    <h6>Tìm kiếm</h6>
                                    <form class="search-form">
                                        <input type="text" class="input-primary" placeholder="Nhập từ khóa" name="">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                                        <button class="button-primary">Tìm kiếm</button>
                                    </form>
                                </div>
                                <div class="history-filter">
                                    <p>Bộ lọc</p>
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/nick/filter.png" alt="">
                                    <span class="filter-count" style="display: none">0</span>
                                </div>
                            </div>
                            <div class="current-filter"></div>
                            <div class="history-table-container">
                                <div class="history-table">
                                    <div class="history-head row no-gutters">
                                        <div class="history-head-item item-left col-2">
                                            <p>
                                                Thời gian
                                            </p>
                                        </div>
                                        <div class="history-head-item history-head-sm item-left col-1">
                                            <p>
                                                ID
                                            </p>
                                        </div>
                                        <div class="history-head-item item-left col-2">
                                            <p>
                                                Chủ tài khoản
                                            </p>
                                        </div>
                                        <div class="history-head-item item-left col-2">
                                            <p>
                                                Ngân hàng/Ví
                                            </p>
                                        </div>
                                        <div class="history-head-item history-head-sm item-left col-1">
                                            <p>
                                                Số tiền
                                            </p>
                                        </div>
                                        <div class="history-head-item item-right col-2">
                                            <p>
                                                Nội dung
                                            </p>
                                        </div>
                                        <div class="history-head-item item-right col-2">
                                            <p>
                                                Trạng thái
                                            </p>
                                        </div>
                                    </div>
                                    <div class="history-content">
                                        {{-- Empty State of table --}}
                                        {{-- <div class="history-item empty-state row no-gutters">
                                            <p>Tài khoản của quý khách chưa phát sinh giao dịch</p>
                                        </div> --}}
                                        <div class="history-item row no-gutters">
                                            <div class="col-2 history-item-data">
                                                <p>26/04/2021 - 16:05</p>
                                            </div>
                                            <div class="col-1 history-item-data history-data-sm">
                                                <p>#54256453</p>
                                            </div>
                                            <div class="col-2 history-item-data">
                                                <p>Tran Van Dai Gia Tien Le</p>
                                            </div>
                                            <div class="col-2 history-item-data">
                                                <p>Techcombank</p>
                                            </div>
                                            <div class="col-1 history-item-data history-data-sm">
                                                <p style="font-weight: 600">190.000đ</p>
                                            </div>
                                            <div class="col-2 history-item-data data-right">
                                                <p class="transaction-content" style="font-weight: 600">Chuyển tiền cho Anh ABC</p>
                                            </div>
                                            <div class="col-2 history-item-data data-right">
                                                <span class="status-success">Thành công</span>
                                            </div>
                                        </div>
                                        <div class="history-item row no-gutters">
                                            <div class="col-2 history-item-data">
                                                <p>26/04/2021 - 16:05</p>
                                            </div>
                                            <div class="col-1 history-item-data history-data-sm">
                                                <p>#54256453</p>
                                            </div>
                                            <div class="col-2 history-item-data">
                                                <p>Tran Van Dai Gia Tien Le</p>
                                            </div>
                                            <div class="col-2 history-item-data">
                                                <p>Techcombank</p>
                                            </div>
                                            <div class="col-1 history-item-data history-data-sm">
                                                <p style="font-weight: 600">190.000đ</p>
                                            </div>
                                            <div class="col-2 history-item-data data-right">
                                                <p class="transaction-content" style="font-weight: 600">Chuyển tiền cho Anh ABC</p>
                                            </div>
                                            <div class="col-2 history-item-data data-right">
                                                <span class="status-pending">Chờ xử lý</span>
                                            </div>
                                        </div>
                                        <div class="history-item row no-gutters">
                                            <div class="col-2 history-item-data">
                                                <p>26/04/2021 - 16:05</p>
                                            </div>
                                            <div class="col-1 history-item-data history-data-sm">
                                                <p>#54256453</p>
                                            </div>
                                            <div class="col-2 history-item-data">
                                                <p>Tran Van Dai Gia Tien Le</p>
                                            </div>
                                            <div class="col-2 history-item-data">
                                                <p>Techcombank</p>
                                            </div>
                                            <div class="col-1 history-item-data history-data-sm">
                                                <p style="font-weight: 600">190.000đ</p>
                                            </div>
                                            <div class="col-2 history-item-data data-right">
                                                <p class="transaction-content" style="font-weight: 600">Chuyển tiền cho Anh ABC</p>
                                            </div>
                                            <div class="col-2 history-item-data data-right">
                                                <span class="status-failed">Thất bại</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="history-pagination-container">
                                <ul class="history-pagination">
                                    <li class="pagination-item disabled">
                                        <a href="#" class="pagination-link">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/arrows/pg-back.png" alt="">
                                        </a>
                                    </li>
                                    <li class="pagination-item active">
                                        <a href="#" class="pagination-link">
                                            1
                                        </a>
                                    </li>
                                    <li class="pagination-item">
                                        <a href="#" class="pagination-link">
                                            2
                                        </a>
                                    </li>
                                    <li class="pagination-item">
                                        <a href="#" class="pagination-link">
                                            3
                                        </a>
                                    </li>
                                    <li class="pagination-item disabled pagination-etc">
                                        <a href="#" class="pagination-link">
                                            ...
                                        </a>
                                    </li>
                                    <li class="pagination-item">
                                        <a href="#" class="pagination-link">
                                            14
                                        </a>
                                    </li>
                                    <li class="pagination-item">
                                        <a href="#" class="pagination-link">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/arrows/pg-next.png" alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade rotation-modal" id="withdrawMoneyFilter" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header rotation-modal-header">
                    <h5 class="modal-title">Bộ lọc</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/close.png" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="filterForm">
                        <div class="filter-input-block">
                            <h5>Loại giao dịch</h5>
                            <select class="select-primary filter-dropdown transaction-type-dropdown" id="transactionTypeInput" name="transaction_type" id="">
                                <option value="" selected disabled>Chọn</option>
                                <option value="0">Rút kim cương</option>
                                <option value="1">Rút abc</option>
                            </select>
                        </div>
                        <div class="filter-input-block">
                            <h5>Trạng thái</h5>
                            <select class="select-primary filter-dropdown transaction-status-dropdown" id="transactionStatusInput" name="transaction_status" id="">
                                <option value="" selected disabled>Chọn</option>
                                <option value="0">Thành công</option>
                                <option value="1">Thất bại</option>
                            </select>
                        </div>
                        <div class="filter-date-block row no-gutters">
                            <div class="col-6" style="position: relative">
                                <h5>Từ ngày</h5>
                                <input class="input-primary" id="filterStartDate" type="text" name="start_date" id="" placeholder="Chọn" autocomplete="off" onkeydown="return false">
                                <label for="filterStartDate" class="filter-block-img-left">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/calendar.svg" alt="">
                                </label>
                            </div>
                            <div class="col-6 input-date-right" style="text-align: right; position: relative">
                                <h5>Đến ngày</h5>
                                <input class="input-primary" id="filterEndDate" type="text" name="end_date" id="" placeholder="Chọn" autocomplete="off" onkeydown="return false">
                                <label for="filterEndDate" class="filter-block-img-right">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/calendar.svg" alt="">
                                </label>
                            </div>
                        </div>
                        <div class="rotation-modal-btn row no-gutters">
                            <div class="col-6">
                                <button class="button-secondary" type="button" id="resetFormBtn">Thiết lập lại</button>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <button class="button-primary" type="submit">Áp dụng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade rotation-modal" id="addAccountModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header rotation-modal-header">
                    <h5 class="modal-title">Thêm tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/close.png" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-change row no-gutters">
                        <div class="col-6">
                            <div class="form-change-button form-change-button-active">Tài khoản ngân hàng</div>
                        </div>
                        <div class="col-6">
                            <div class="form-change-button">Ví điện tử</div>
                        </div>
                        <div class="form-listing"></div>
                    </div>
                    <form action="#" method="POST" id="bankAccountForm">
                        <div class="account-input-block">
                            <h5>Ngân hàng</h5>
                            <select class="select-primary account-bank-dropdown" id="accountBankDropdown" name="transaction_type" id="">
                                <option value="" selected disabled>Chọn ngân hàng nhận tiền</option>
                                <option value="0">Rút kim cương</option>
                                <option value="1">Rút abc</option>
                            </select>
                        </div>
                        <div class="account-input-block">
                            <h5>Chủ tài khoản</h5>
                            <input type="text" class="input-primary" placeholder="Nhập tên chủ tài khoản">
                        </div>
                        <div class="account-input-block">
                            <h5>Số tài khoản</h5>
                            <input type="text" class="input-primary" placeholder="Nhập số tài khoản">
                        </div>
                        <div class="account-input-block">
                            <h5>Chi nhánh</h5>
                            <input type="text" class="input-primary" placeholder="Nhập chi nhánh">
                        </div>
                        <div class="account-modal-notify">
                            <h6>Lưu ý</h6>
                            <p>Các thông tin trên bạn vui lòng cung cấp chính xác để không xảy ra lỗi khi xử lý yêu cầu rút tiền. Nếu nhập sai thông tin, ngân hàng sẽ hoàn trả lại tiền và không hoàn phí rút tiền</p>
                        </div>
                        <div class="rotation-modal-btn row no-gutters">
                            <div class="col-12">
                                <button class="button-primary" type="submit">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                    <form action="#" method="POST" id="walletAccountForm" style="display: none">
                        <div class="account-input-block">
                            <h5>Ví điện tử</h5>
                            <select class="select-primary account-bank-dropdown" id="walletBankDropdown" name="transaction_type" id="">
                                <option value="" selected disabled>Chọn loại ví điện tử</option>
                                <option value="0">Rút kim cương</option>
                                <option value="1">Rút abc</option>
                            </select>
                        </div>
                        <div class="account-input-block">
                            <h5>Tài khoản ví</h5>
                            <input type="text" class="input-primary" placeholder="Nhập số tài khoản ví">
                        </div>
                        <div class="account-input-block">
                            <h5>Xác nhận số tài khoản ví</h5>
                            <input type="text" class="input-primary" placeholder="Nhập lại số tài khoản ví">
                        </div>
                        <div class="account-modal-notify">
                            <h6>Lưu ý</h6>
                            <p>Rút về các ví điện tử. Tất cả thông tin gồm tên tài khoản hoặc số điện thoại hoặc email tài khoản ở ví đó.</p>
                        </div>
                        <div class="rotation-modal-btn row no-gutters">
                            <div class="col-12">
                                <button class="button-primary" type="submit">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade rotation-modal" id="withdrawResult" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header rotation-modal-header">
                    <h5 class="modal-title">Gửi yêu cầu rút tiền thành công</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="assets/{{theme('')->theme_key}}/image/images_1/close.png" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="rotation-prize-img">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/verify 1.png" alt="">
                    </div>
                    <div class="rotation-prize-detail">
                        <p>Yêu cầu rút tiền đã được gửi đến hệ thống</p>
                        <p>Bạn vui lòng chờ hệ thống xác nhận nha!</p>
                    </div>
                    <div class="rotation-modal-btn row no-gutters">
                        <div class="col-6">
                            <button class="button-secondary">
                                <a href="/" style="display: block">
                                    Về trang chủ
                                </a>
                            </button>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <button class="button-primary">
                                <a href="#" style="display: block">
                                    Hỗ trợ
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
