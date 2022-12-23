@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    {{--  Menu  --}}
    <section class="media-web">
        <div class="container container-fix menu-container-ct">
            <ul>
                <li><a href="/">Trang chủ</a></li>
                <li class="menu-container-li-ct"><img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="/lich-su-giao-dich">Lịch sử giao dịch</a></li>
                <li class="menu-container-li-ct"><img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="/dich-vu-da-mua">Dịch vụ đã mua</a></li>
            </ul>
        </div>
    </section>

    <section class="media-mobile">
        <div class="container container-fix banner-mobile-container-ct">

            <div class="row marginauto banner-mobile-row-ct">
                <div class="col-auto left-right" style="width: 10%" >
                    <a href="javascript:void(0)" class="previous-step-one box-account-mobile_open" style="line-height: 28px" onclick="openMenuProfile()">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" >
                    </a>
                </div>

                <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                    <h1>Dịch vụ đã mua</h1>
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
                                <div class="col-6 left-right">
                                    <span>Dịch vụ đã mua</span>
                                </div>
                                <div class="col-auto ml-auto pr-0">
                                    <span class="lammoi_lichsu" style="font-size: 13px;color: #ffffff" onClick="window.location.reload();"><i class="fas fa-redo mr-1" ></i>Làm mới</span>
                                </div>
                            </div>
                        </div>
                        <div class="scroll-into-view"></div>
                        <div class="col-md-12 logs-search left-right">

                            <div class="row marginauto">
                                <div class="col-12 left-right">
                                    <form class="search-txns">
                                        <div class="row marginauto body-form-search-ct">
                                            <div class="col-auto left-right">
                                                <input autocomplete="off" type="text" name="search" class="input-search-log-ct search" placeholder="Nhập từ khóa">
                                                <img   src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                                            </div>
                                            <div class="col-4 body-form-search-button-ct media-web">
                                                <button type="submit" class="timkiem-button-ct btn-timkiem" style="position: relative">
                                                    <span class="span-timkiem">Tìm kiếm</span>
                                                    <div class="row justify-content-center loading-data__timkiem">

                                                    </div>
                                                </button>
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
                                                    <img   src="/assets/frontend/{{theme('')->theme_key}}/image/nick/filter.png" alt="">
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

                            </div>
                        </div>

                        <div class="col-md-12 logs-table left-right">
                            <div class="row default-table" id="data_service_history" style="position: relative">
                                <div class="body-box-loadding result-amount-loadding" style="position: absolute;top: 50%;left: 50%">
                                    <div class="d-flex justify-content-center">
                                        <span class="pulser"></span>
                                    </div>
                                </div>
                                @include('frontend.pages.service.widget.__datalogs')
                            </div>
                        </div>

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
                            <img class=" img-close-nick-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>

                </div>

                <div class="modal-body modal-body-order-ct">
                    <form class="account_service_history__v2" id="data_sort">
                        <div class="row marginauto">

                            <div class="col-md-12 left-right">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                        <span>Mã ID</span>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct id-finter-nick">
                                        <input autocomplete="off" class="input-defautf-ct id" data-query="id" type="text" placeholder="Nhập mã số">
                                    </div>
                                </div>
                            </div>

                            @if(isset($datacate) && count($datacate) > 0)
                            <div class="col-md-12 left-right modal-nick-padding">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                        <span>Dịch vụ</span>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct service-finter-nick">
                                        <select class="wide service key" data-query="slug_category">
                                            <option value="">Chọn</option>
                                            @foreach($datacate as $val)
                                                <option value="{{ $val->id }}">{{ $val->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12 left-right modal-nick-padding">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                        <span>Trạng thái</span>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct status-finter-nick">
                                        <select class="wide status" data-query="status">
                                            <option value="">Chọn</option>
                                            <option value="0">Đã hủy</option>
                                            <option value="1">Đang chờ xử lý</option>
                                            <option value="2">Đang thực hiện</option>
                                            <option value="3">Từ chối</option>
                                            <option value="4">Hoàn tất</option>
                                            <option value="5">Thất bại</option>
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
                                                <input autocomplete="off" data-query="started_at" class="input-defautf-ct started_at" type="text" placeholder="Chọn">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-6 text-left body-title-detail-col-ct">
                                        <div class="row marginauto password-mobile">
                                            <div class="col-md-12 left-right body-title-detail-span-ct">
                                                <span>Đến ngày</span>
                                            </div>
                                            <div class="col-md-12 left-right body-title-detail-select-ct" style="position: relative">
                                                <input autocomplete="off" class="input-defautf-ct ended_at" data-query="ended_at" type="text" placeholder="Chọn">
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
                                                <a href="javascript:void(0)" class="button-not-bg-ct btn-reset reset-find">
                                                    <span class="span-reset">
                                                        Thiết lập lại
                                                    </span>
                                                    <div class="row justify-content-center loading-data__timkiem">

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                        <div class="row marginauto">
                                            <div class="col-md-12 left-right">
                                                <button class="button-default-modal-ct button-modal-nick openSuccess btn-ap-dung" type="submit">
                                                    <span class="span-ap-dung">Áp dụng</span>
                                                    <div class="row justify-content-center loading-data__timkiem">

                                                    </div>
                                                </button>
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

    <input type="hidden" class="started_at_day_dv" name="started_at_day_dv" value="{{ \Carbon\Carbon::now()->startOfDay() }}">
    <input type="hidden" class="end_at_day_dv" name="end_at_day_dv" value="{{ \Carbon\Carbon::now()->endOfDay() }}">
    <input type="hidden" class="started_at_yes_dv" name="started_at_yes_dv" value="{{ \Carbon\Carbon::yesterday()->startOfDay() }}">
    <input type="hidden" class="end_at_yes_dv" name="end_at_yes_dv" value="{{ \Carbon\Carbon::yesterday()->endOfDay()}}">
    <input type="hidden" class="started_at_month_dv" name="started_at_month_dv" value="{{ \Carbon\Carbon::now()->startOfMonth() }}">
    <input type="hidden" class="end_at_month_dv" name="end_at_month_dv" value="{{ \Carbon\Carbon::now()->endOfMonth() }}">

    <input type="hidden" name="id_data" class="id_data">
    <input type="hidden" name="key_data" class="key_data">
    <input type="hidden" name="status_data" class="status_data">
    <input type="hidden" name="started_at_data" class="started_at_data">
    <input type="hidden" name="ended_at_data" class="ended_at_data">
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/handle-history-table.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/cay-thue/logs--update.js"></script>
@endsection







