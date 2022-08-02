@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    <div class="container c-container" id="account-list">
        @if($data == null)
            <div class="item_buy">

                <div class="container pt-3">
                    <div class="row pb-3 pt-3">
                        <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">
                            @if(isset($message))
                                {{ $message }}
                            @else
                                Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                            @endif
                        </span>
                        </div>
                    </div>

                </div>

            </div>
        @else

        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/mua-acc" class="breadcrumb-link">Shop Account</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/mua-acc/{{ isset($data->custom->title) ? $data->custom->title :  $data->title }}" class="breadcrumb-link">Danh sách Nick Liên Quân</a>
            </li>
        </ul>
        <div class="head-mobile">
            <a href="/mua-acc" class="link-back"></a>

            <h1 class="head-title text-title">Shop Account</h1>

            <a href="/" class="home"></a>
        </div>

        {{--            Slider baner    --}}
        @include('frontend.widget.__slider__banner__account')
            <div class="booking_detail"></div>
{{--        Danh sách acount    --}}

            <section class="list-account">
                <div class="section-header justify-content-between  d-none d-lg-flex c-py-16">
                    <h2 class="section-title">{{ isset($data->custom->title) ? $data->custom->title :  $data->title }}</h2>
                    <form action="" class="form-search position-relative">
                        <input type="search" placeholder="Tìm kiếm" class="has-submit">
                        <button type="submit"></button>
                    </form>
                </div>
                <div class="filter-account c-my-16 d-none d-lg-flex">
                    <div class="filter-title text-title fw-700">
                        Chọn game muốn mua account
                    </div>
                    <div class="value-filter">
                        <div class="nick-findter-data" id="params-filter">

                        </div>
                        <div class="show-modal-filter noselect" data-toggle="modal" data-target="#modal-filter">Bộ lọc</div>
                    </div>
                </div>
                <div class="sort-account c-mb-16 d-none d-lg-flex">
                    <div class="text-title fw-700">
                        Sắp xếp theo:
                    </div>
                    <div class="value-sort">
                        <a href="#" class="selection active md">Mới nhất</a>
                        <a href="#" class="selection md">Cũ nhất</a>
                        <a href="#" class="selection md">Giá cao nhất</a>
                    </div>
                </div>

                <!-- Mobile -->
                <form action="" class="form-search c-mb-24 d-lg-none">
                    <input type="search" placeholder="Tìm kiếm" class="search">
                </form>
                <div class="text-title fw-700 c-mb-8 d-lg-none">Nick Freefire cực phẩm</div>
                <div class="mobile-tools c-mb-8 d-lg-none">
                    <label class="tool-filter c-mr-12 open-sheet" data-target="#sheet-filter">
                        Bộ lọc
                    </label>
                    <label class="tool-sort open-sheet" data-target="#sheet-sort">
                        Giá thấp nhất
                    </label>
                </div>
                <!-- End Mobile -->

                <div class="listing-account c-mb-16" id="account_data">
                    <div class="box-loading btn-loading c-my-24" style="margin: 0 auto">
                        <div class="loading">
                            <div class="loading-child"></div>
                        </div>
                    </div>
                    @include('frontend.pages.account.widget.__datalist')
                </div>
            </section>
            <!-- Modal Filter -->
            <div class="modal fade" id="modal-filter">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form id="data_sort" action="" class="form-filter">

                            <div class="modal-header">
                                <h2 class="modal-title center">Bộ lọc</h2>
                                <button type="button" class="close" data-dismiss="modal"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div class="input-group">
                                    <label class="form-label">
                                        Mã số
                                    </label>
                                    <input type="text" class="input-defautf-ct id" name="id_data" placeholder="Nhập mã số nick">
                                </div>

                                <div class="input-group">
                                    <label class="form-label">
                                        Giá tiền
                                    </label>
                                    <select name="price" class="price" id="">
                                        <option value="" selected disabled>Chọn giá tiền</option>
                                        <option value="0-50000">Dưới 50K</option>
                                        <option value="50000-200000">Từ 50K - 200K</option>
                                        <option value="200000-500000">Từ 200K - 500K</option>
                                        <option value="500000-1000000">Từ 500K - 1 Triệu</option>
                                        <option value="1000000-5000000">Trên 1 Triệu</option>
                                        <option value="5000000-10000000">Trên 5 Triệu</option>
                                        <option value="10000000">Trên 10 Triệu</option>
                                    </select>
                                </div>

                                <div class="input-group">
                                    <label class="form-label">
                                        Trạng thái
                                    </label>
                                    <select name="status" class="status" id="">
                                        <option value="" selected disabled>Chọn trạng thái</option>
                                        <option value="1">Chưa bán</option>
                                        <option value="2">Đã bán</option>
                                    </select>
                                </div>
                                @if(isset($dataAttribute) && count($dataAttribute) > 0)
                                    @foreach($dataAttribute as $val)
                                        @if($val->position == 'select')
                                            <div class="input-group">
                                                <label class="form-label">
                                                    {{ $val->title }}
                                                </label>
                                                <select class="account-filter-field" name="attribute_id_{{ $val->id }}"  data-title="{{ $val->title }}" id="">
                                                    <option value="" selected disabled>--Không chọn--</option>
                                                    @foreach($val->childs as $child)
                                                        <option value="{{ $child->id }}">{{ $child->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif

{{--                                <div class="input-group">--}}
{{--                                    <label class="form-label">--}}
{{--                                        Giá tiền--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="c-pt-36">--}}
{{--                                    <div class="slider-input" data-min="20" data-max="50" data-option="10,100" data-start="50,60"></div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="modal-footer c-mt-24 c-mt-lg-16">
                                <a href="javascript:void(0)" class="btn ghost js-reset-form button-not-bg-ct reset-find">Xoá bộ lọc</a>
                                <button type="button" class="btn primary js-submit-form btn-ap-dung">Xem kết quả</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sheet filter -->
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
                        <div class="sheet-body">
                            <!-- body -->
                            <div class="input-group">
                        <span class="form-label">
                            Mã số
                        </span>
                                <input type="text" name="id" placeholder="Nhập mã số nick">
                            </div>

                            <div class="input-group">
                        <span class="form-label">
                            Trạng thái
                        </span>
                                <select name="status" id="">
                                    <option value="">Chưa bán</option>
                                    <option value="">Đã bán</option>
                                </select>
                            </div>

                            <div class="input-group">
                        <span class="form-label">
                            Rank
                        </span>
                                <select name="rank" id="">
                                    <option value="">Tinh anh</option>
                                    <option value="">Cao thủ</option>
                                </select>
                            </div>

                            <div class="input-group">
                        <span class="form-label">
                            Giá tiền
                        </span>
                            </div>
                            <div class="c-px-16 c-mt-45">
                                <input type="text" class="rSlider-input d-none" name="price" id="sort-by-price-mobile">
                            </div>
                        </div>
                        <div class="sheet-footer">
                            <button class="btn ghost js-reset-form">Xoá bộ lọc</button>
                            <button class="btn primary js-submit-form">Xem kết quả</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Bottom sheet sort -->
            <div class="bottom-sheet" id="sheet-sort" aria-hidden="true" data-height="25">
                <div class="layer"></div>
                <div class="content-bottom-sheet bar-slide">
                    <form action="" id="form-sort">
                        <div class="sheet-header">
                            <h2 class="text-title center">
                                Sắp xếp theo
                            </h2>
                            <label class="close"></label>
                        </div>
                        <div class="sheet-body">
                            <!-- body -->
                            <div class="c-mb-8">
                                <label for="lowest_price" class="input-radio">
                                    <input type="radio" name="sort" id="lowest_price" checked>
                                    <span class="checkmark"></span>
                                    <span class="text-label">Giá thấp nhất</span>
                                </label>
                            </div>
                            <div class="c-mb-8">
                                <label for="highest_price" class="input-radio">
                                    <input type="radio" name="sort" id="highest_price">
                                    <span class="checkmark"></span>
                                    <span class="text-label">Giá cao nhất</span>
                                </label>
                            </div>
                            <div class="c-mb-8">
                                <label for="selling_well" class="input-radio">
                                    <input type="radio" name="sort" id="selling_well">
                                    <span class="checkmark"></span>
                                    <span class="text-label">Đang bán chạy</span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
{{--  Danh mục nick khác   --}}
        @include('frontend.pages.account.widget.__related__category')

        {{--            Dịch vụ khác   --}}
        @include('frontend.widget.__services__other')

            <input type="hidden" value="{{ $slug }}" name="slug" class="slug">
            {{--    <input type="hidden" value="{{ $slug_category }}" name="slug_category" class="slug_category">--}}
            <input type="hidden" name="id_data" class="id_data" value="">
            <input type="hidden" name="title_data" class="title_data" value="">
            <input type="hidden" name="price_data" class="price_data" value="">
            <input type="hidden" name="select_data" class="select_data" value="">
            <input type="hidden" name="status_data" class="status_data" value="">
            <input type="hidden" name="sort_by_data" class="sort_by_data" value="">

            {{--    Modal xác nhận thanh toán--}}
            <div class="modal fade modal-big modal__buyacount loadModal__acount" id="LoadModal">
                <div class="modal-dialog modal-dialog-centered modal-custom">
                    <div class="modal-content c-p-24 data__form__random">

                    </div>
                </div>
            </div>

            <!-- Modal 04 -->
            <div class="modal fade modal-small" id="notBuy">
                <div class="modal-dialog modal-dialog-centered modal-custom">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center p-0">
                            <img class="c-pt-16 c-pb-16" src="/assets/frontend/{{theme('')->theme_key}}/image/son/thatbai.png" alt="">
                        </div>
                        <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                            <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Mua thẻ nick thất bại</p>
                            <p class="fw-400 fz-13 c-mt-10 mb-0">Rất tiếc việc mua nick đã thất bại do tài khoản của bạn không đủ, vui lòng nạp tiền để tiếp tục giao dịch!</p>
                        </div>
                        <div class="modal-footer c-p-24">
                            <a href="/recharge-atm" class="btn secondary" data-dismiss="modal">Nạp ATM</a>
                            <a href="/nap-the" class="btn primary">Nạp tiền</a>
                        </div>
                    </div>
                </div>
            </div>

            <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/buyaccrandom.js?v={{time()}}"></script>
            <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/account-list.js?v={{time()}}"></script>

        @endif
    </div>


@endsection



