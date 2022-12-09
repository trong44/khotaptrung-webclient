@extends('frontend.layouts.master')

@section('content')


    <div class="background-history">
        <div class="container c-container-side c-mb-24 c-mb-lg-0">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/lich-su-mua-nick" class="breadcrumb-link">Tài khoản trả góp</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/profile" class="link-back"></a>

                <h1 class="head-title text-title">Shop Account</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>
                <div class="c-ml-16 c-ml-lg-0 c-history-right">
                    <div class="c-history-right-body brs-12 brs-lg-0 c-p-16">
                        <div class="c-history-title c-pb-16 c-pb-lg-12">
                            <h3 class="fw-700 fz-20 fz-lg-16 lh-28 lh-lg-20 mb-0">Tài khoản trả góp</h3>
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
                        <div class="tags d-none d-lg-flex justify-content-end c-mb-12">
                            <div class="tag">Mã số</div>
                            <div class="tag">Trạng thái</div>
                            <div class="tag">Rank</div>
                        </div>
                        <div class="justify-content-between align-items-center c-pt-lg-16 c-pb-16 c-mb-16 d-flex d-lg-none">
                            <form action="" class="form-search history">
                                <input type="search" placeholder="Tìm kiếm" class="search">
                                <button type="submit"></button>
                            </form>
                            <div class="value-filter c-ml-16">
                                <button type="button" class="filter-history open-sheet" data-target="#sheet-filter" data-notify="2"></button>
                            </div>
                        </div>
                        <div class="mr-n1 pb-3">
                            <div class="history-content c-pt-16 mr-n2">
                                <div class="text-title-bold fw-500 c-mb-12">Tháng 06</div>
                                <ul class="trans-list">
                                    <li class="trans-item">
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <a href="/lich-su-tra-gop/chi-tiet">
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
                                        <p class="text-title center">
                                            Bộ lọc
                                        </p>
                                        <label class="close"></label>
                                    </div>
                                    <div class="sheet-body overflow-visible">
                                        <!-- body -->
                                        <div class="input-group">
                        <span class="form-label">
                            Loại giao dịch
                        </span>
                                            <select name="" id="">
                                                <option value="">Chọn</option>
                                            </select>
                                        </div>

                                        <div class="input-group">
                        <span class="form-label">
                            Trạng thái
                        </span>
                                            <select name="status" id="">
                                                <option value="">Chọn</option>
                                                <option value="">Đã bán</option>
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
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center p-0">
                                        <p class="modal-title center">Bộ lọc</p>
                                        <button type="button" class="close" data-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body c-p-0">
                                        <div class="input-group">
                                            <span class="form-label title-color">Loại giao dịch</span>
                                            <select name="" id="">
                                                <option value="">Chọn</option>
                                            </select>
                                        </div>

                                        <div class="input-group">
                                            <span class="form-label title-color">Trạng thái</span>
                                            <select name="" id="">
                                                <option value="">Chọn</option>
                                            </select>
                                        </div>

                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                <span class="form-label title-color">
                                    Từ ngày
                                </span>
                                                        <input type="text" class="date-right" placeholder="Chọn">
                                                    </div>
                                                </td>
                                                <td class="c-px-6 d-block"></td>
                                                <td>
                                                    <div class="input-group">
                                <span class="form-label title-color">
                                    Đến ngày
                                </span>
                                                        <input type="text" class="date-right" placeholder="Chọn">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        {{--            Dịch vụ khác   --}}
        <div class="container c-container">
            @include('frontend.widget.__service__other__his')
        </div>

    </div>
@endsection


