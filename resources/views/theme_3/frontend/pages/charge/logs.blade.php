@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow"/>
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
                <li class="menu-container-li-ct"><a href="/lich-su-nap-the">Lịch sử nạp thẻ</a></li>
            </ul>
        </div>
    </section>

    <section class="media-mobile">
        <div class="container container-fix banner-mobile-container-ct">

            <div class="row marginauto banner-mobile-row-ct">
                <div class="col-auto left-right" style="width: 10%">
                    <a href="javascript:void(0)" class="previous-step-one box-account-mobile_open"
                       style="line-height: 28px" onclick="openMenuProfile()">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png"
                             alt="">
                    </a>
                </div>

                <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                    <h1>Lịch sử nạp thẻ</h1>
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
                                    <span>Lịch sử nạp thẻ</span>
                                </div>
                                <div class="col-auto ml-auto pr-0">
                                    <span class="lammoi_lichsu" style="font-size: 13px;color: #ffffff"
                                          onClick="window.location.reload();"><i
                                            class="fas fa-redo mr-1"></i>Làm mới</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 logs-search left-right">

                            <div class="row marginauto">
                                <div class="col-12 left-right">
                                    <form class="search-txns">
                                        <div class="row marginauto body-form-search-ct">
                                            <div class="col-auto left-right">
                                                <input autocomplete="off" type="text" name="search"
                                                       class="input-search-log-ct search" placeholder="Nhập từ khóa">
                                                <img class="lazy"
                                                     src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png"
                                                     alt="">
                                            </div>
                                            <div class="col-4 body-form-search-button-ct media-web">
                                                <button type="submit" class="timkiem-button-ct btn-timkiem"
                                                        style="position: relative">
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
                                                <li class="margin-findter" style="position: relative">
                                                    <img class="lazy"
                                                         src="/assets/frontend/{{theme('')->theme_key}}/image/nick/filter.png"
                                                         alt="">
                                                    <span class="overlay-find"
                                                          style="    position: absolute;right: -4px;top: -4px;">
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

                        {{--                        Co dữ liệu   --}}

                        <div class="col-md-12 logs-table left-right">
                            <div class="row default-table" id="data_pay_card_history_ls" style="position: relative">
                                <div class="body-box-loadding result-amount-loadding"
                                     style="position: absolute;top: 50%;left: 50%">
                                    <div class="d-flex justify-content-center">
                                        <span class="pulser"></span>
                                    </div>
                                </div>
                                @include('frontend.pages.charge.widget.__charge_history')
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
                            <img class="lazy img-close-nick-ct close-modal-default"
                                 src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>

                </div>

                <div class="modal-body modal-body-order-ct">
                    <form class="form-charge_ls account_content_transaction_history__v2" id="data_sort">
                        <div class="row marginauto">

                            <div class="col-md-12 left-right">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                        <span>Thẻ cào</span>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct id-finter-nick">
                                        <input autocomplete="off" data-query="serial" class="input-defautf-ct serial"
                                               type="text" placeholder="Nhập mã Serial">
                                    </div>
                                </div>
                            </div>

                            @if(isset($data_telecome) && count($data_telecome) > 0)
                                <div class="col-md-12 left-right modal-nick-padding">
                                    <div class="row marginauto">
                                        <div
                                            class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                            <span>Loại thẻ</span>
                                        </div>
                                        <div
                                            class="col-12 left-right background-nick-col-bottom-ct transaction-finter-nick">

                                            <select class="wide transaction" data-query="key">
                                                <option value="">Chọn</option>
                                                @foreach($data_telecome as $val)
                                                    <option value="{{ $val->key }}">{{ $val->title }}</option>
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
                                        <select data-query="status" class="wide status">
                                            <option value="">Chọn</option>
                                            @foreach(config('module.charge.status') as $key => $item)
                                                <option value="{{ $key }}">{{ $item }}</option>
                                            @endforeach
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
                                                <input autocomplete="off" data-query="started_at"
                                                       class="input-defautf-ct started_at" type="text"
                                                       placeholder="Chọn">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-6 text-left body-title-detail-col-ct">
                                        <div class="row marginauto password-mobile">
                                            <div class="col-md-12 left-right body-title-detail-span-ct">
                                                <span>Đến ngày</span>
                                            </div>
                                            <div class="col-md-12 left-right body-title-detail-select-ct"
                                                 style="position: relative">
                                                <input autocomplete="off" class="input-defautf-ct ended_at"
                                                       data-query="ended_at" type="text" placeholder="Chọn">
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
                                                <a href="javascript:void(0)"
                                                   class="button-not-bg-ct btn-reset reset-find">
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
                                                <button
                                                    class="button-default-modal-ct button-modal-nick openSuccess btn-ap-dung"
                                                    type="submit">
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

    <input type="hidden" class="started_at_day_ls" name="started_at_day_ls"
           value="{{ \Carbon\Carbon::now()->startOfDay()->format('d/m/Y H:i:s') }}">
    <input type="hidden" class="end_at_day_ls" name="end_at_day_ls"
           value="{{ \Carbon\Carbon::now()->endOfDay()->format('d/m/Y H:i:s')}}">
    <input type="hidden" class="started_at_yes_ls" name="started_at_yes"
           value="{{ \Carbon\Carbon::yesterday()->startOfDay()->format('d/m/Y H:i:s') }}">
    <input type="hidden" class="end_at_yes_ls" name="end_at_yes_ls"
           value="{{ \Carbon\Carbon::yesterday()->endOfDay()->format('d/m/Y H:i:s')}}">
    <input type="hidden" class="started_at_month_ls" name="started_at_month_ls"
           value="{{ \Carbon\Carbon::now()->startOfMonth()->format('d/m/Y H:i:s') }}">
    <input type="hidden" class="end_at_month_ls" name="end_at_month_ls"
           value="{{ \Carbon\Carbon::now()->endOfMonth()->format('d/m/Y H:i:s') }}">

    <input type="hidden" name="serial_data_ls" class="serial_data_ls">
    <input type="hidden" name="key_data_ls" class="key_data_ls">
    <input type="hidden" name="status_data_ls" class="status_data_ls">
    <input type="hidden" name="started_at_data_ls" class="started_at_data_ls">
    <input type="hidden" name="ended_at_data_ls" class="ended_at_data_ls">
    <input type="hidden" name="hidden_page" id="hidden_page" value="1"/>

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/handle-history-table.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/charge/logs--update.js?v={{time()}}"></script>
@endsection







