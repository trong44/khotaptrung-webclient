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
                <li class="menu-container-li-ct"><a href="">Tài khoản đã mua</a></li>
            </ul>
        </div>
    </section>

    <section class="media-mobile">
        <div class="container container-fix banner-mobile-container-ct">

            <div class="row marginauto banner-mobile-row-ct">
                <div class="col-auto left-right" style="width: 10%">
                    <a href="javascript:void(0)" class="previous-step-one box-account-mobile_open"
                       style="line-height: 28px" onclick="openMenuProfile()">
                        <img   src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png"
                             alt="">
                    </a>
                </div>

                <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                    <h1>Tài khoản đã mua</h1>
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
                                    <span>Tài khoản đã mua</span>
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
                                                <input autocomplete="off" type="text" name="search"
                                                       class="input-search-log-ct search" placeholder="Nhập từ khóa">
                                                <img
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
                                                <li class="margin-findter">
                                                    <img
                                                         src="/assets/frontend/{{theme('')->theme_key}}/image/nick/filter.png"
                                                         alt="">
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
                                {{--                                        <div class="col-auto prepend-nick" style="position: relative"><a href="">Từ 500K - 1 Triệu</a><img class="  close-item-nick" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/close.png" alt=""></div>--}}
                            </div>
                        </div>

                        <div class="col-md-12 logs-table left-right">
                            <div class="row default-table" id="data_pay_account_history" style="position: relative">
                                <div class="body-box-loadding result-amount-loadding"
                                     style="position: absolute;top: 50%;left: 50%">
                                    <div class="d-flex justify-content-center">
                                        <span class="pulser"></span>
                                    </div>
                                </div>
                                @include('frontend.pages.account.widget.__datalogs__custom')

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
                            <img class=" img-close-nick-ct close-modal-default"
                                 src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>

                </div>

                <div class="modal-body modal-body-order-ct">
                    <form class="form-charge__accountls" id="data_sort">
                        <div class="row marginauto">

                            <div class="col-md-12 left-right">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                        <span>Mã tài khoản</span>
                                    </div>
                                    <div
                                        class="col-12 left-right background-nick-col-bottom-ct transaction-finter-nick">
                                        <input type="text" data-query="serial" class="input-defautf-ct serial"
                                               placeholder="Mã tài khoản">
                                    </div>
                                </div>
                            </div>
                            @if(isset($datacategory) && count($datacategory) > 0)
                                <div class="col-md-12 left-right">
                                    <div class="row marginauto modal-nick-padding">
                                        <div
                                            class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                            <span>Game</span>
                                        </div>
                                        <div class="col-12 left-right background-nick-col-bottom-ct game-finter-nick">
                                            <select class="wide game key" data-query="key">
                                                <option value="">Chọn</option>
                                                @foreach($datacategory as $val)
                                                    <option value="{{ $val->slug }}">{{ $val->title }}</option>
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

                                        <select class="wide" data-query="status">
                                            <option value="">Chọn</option>
                                            @forelse(config('module.acc.status') as $key  => $item)
                                                <option value="{{ $key }}"> {{ $item }}</option>
                                            @empty

                                            @endforelse
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
                                        {{Form::select('price',array(''=>'Chọn')+config('module.acc.price'),old('price', isset($data['price']) ? $data['price'] : null),array('class'=>'wide price'))}}
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

    <div class="modal fade login show order-modal" id="showPassword" aria-modal="true">

        <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
            <!--        <div class="image-login"></div>-->
            <div class="modal-content">
                <div class="modal-header p-0" style="border-bottom: 0">
                    <div class="row marginauto modal-header-order-ct">
                        <div class="col-12 span__donhang text-center" style="position: relative">
                            <span>Mua tài khoản thành công</span>
                            <img class=" img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>

                </div>

                <div class="modal-body modal-body-order-ct">
                    <div class="row marginauto">

                        <div class="col-md-12 left-right image-success">
                            <div class="row marginauto justify-content-center">
                                <div class="col-auto">
                                    <img class=" " src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/group.png" alt="">
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
                                        <div class="col-md-12 left-right body-title-detail-select-ct email-success-nick  data-tai-khoan">
                                            <input readonly autocomplete="off" class="input-defautf-ct" type="text" value="">
                                            <img class="  js_copy_input" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/copy.png" alt="icon_copy" data-tippy-content="Đã copy tài khoản">
                                        </div>
                                        <div class="col-md-12 left-right">
                                            <div class="row marginauto title-tra-gop-success-row">
                                                <div class="col-md-12 left-right body-title-detail-span-ct">
                                                    <span>Mật khẩu</span>
                                                </div>
                                                <div class="col-md-12 left-right body-title-detail-select-ct taikhoan-success-nick data-password">
{{--                                                    <input id="password" readonly autocomplete="off" class="input-defautf-ct" type="password" value="******" placeholder="******">--}}
{{--                                                    <img class="  img-copy js_copy_input" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/copy.png" alt="icon_copy" id="getCopypass">--}}
{{--                                                    <div class="getCopypass">--}}
{{--                                                        <img class="  img-show-password" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/eyehide.png" alt="" id="getShowpass">--}}
{{--                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 left-right data-child">
                                            {{--                                            <div class="row marginauto add-child">--}}
                                            {{--                                                <div class="col-md-12 left-right body-title-detail-span-ct"><span>Tài khoản</span></div>--}}
                                            {{--                                                <div class="col-md-12 left-right body-title-detail-select-ct email-success-nick">--}}
                                            {{--                                                    <input readonly autocomplete="off" class="input-defautf-ct" id="email" type="text" value="namok@gmail.com">--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>

                                        <div class="col-md-12 left-right data-ttbxung">
                                            {{--                                            <div class="row marginauto add-child">--}}
                                            {{--                                                <div class="col-md-12 left-right body-title-detail-span-ct"><span>Tài khoản</span></div>--}}
                                            {{--                                                <div class="col-md-12 left-right body-title-detail-select-ct email-success-nick  data-child">--}}
                                            {{--                                                    <input readonly autocomplete="off" class="input-defautf-ct" id="email" type="text" value="namok@gmail.com">--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right title-tra-gop text-center data-time">
                            {{--                            <small>Đã lấy mật khẩu lúc: 05-05-2022, 121:32:56</small>--}}
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

                        <div class="col-md-12 left-right data-button">
                            {{--JS PASTE CODE HERE--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/logs.js"></script>--}}
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/handle-history-table.js?v={{time()}}"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/logs--update.js?v={{time()}}"></script>
@endsection





