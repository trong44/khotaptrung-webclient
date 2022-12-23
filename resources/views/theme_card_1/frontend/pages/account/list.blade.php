@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('content')
    
    <section>
        <div class="container">


            @if($data == null)
                Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
            @else
                <nav aria-label="breadcrumb" style="margin-top: 10px;">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="/mua-acc">Mua acc</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ isset($data->custom->title) ? $data->custom->title :  $data->title }}</li>
                    </ol>
                </nav>
                <div class="booking_detail"></div>
                {{-- Form filter --}}

                <form class="form-input-group form-group__accountlist">

                    <div class="row" style="width: 100%;margin: 0 auto" id="load_attribute">

                        @include('frontend.pages.account.widget.account_load_attribute_to_filter')

                    </div>

                    <div class="row mb-4" style="padding-top: 16px">
                        <div class="col-12 col-lg-4" style="padding-left: 8px; padding-right: 8px">
                            <button type="submit" class="btn btn-success btn-timkiem " style="position: relative">
                                Tìm kiếm
                                <div class="row justify-content-center loading-data__timkiem"></div>
                            </button>
                            <a href="javascript:void(0)" class="btn btn-danger btn-all" style="position: relative">
                                Tất cả
                                <div class="row justify-content-center loading-data__timkiem"></div>
                            </a>
                        </div>
                    </div>
                </form>

                {{-- Account List --}}

                <div class="row">
                    <div class="acc-list" id="account_data" style="width: 100%">
                        <div class="body-box-loadding result-amount-loadding">
                            <div class="d-flex justify-content-center">
                                <span class="pulser"></span>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

        </div>
    </section>

    <input type="hidden" name="hidden_page" id="hidden_page_service" value="1" />
    <input type="hidden" value="{{ $slug }}" name="slug" class="slug">
    <input type="hidden" name="id_data" class="id_data" value="">
    <input type="hidden" name="title_data" class="title_data" value="">
    <input type="hidden" name="price_data" class="price_data" value="">
    <input type="hidden" name="select_data" class="select_data" value="">
    <input type="hidden" name="status_data" class="status_data" value="">
    <input type="hidden" name="sort_by_data" class="sort_by_data" value="">

    {{--        Lm auto  --}}

    <input type="hidden" name="champions_data" class="champions_data" value="">
    <input type="hidden" name="skill_data" class="skill_data" value="">
    <input type="hidden" name="tftcompanions_data" class="tftcompanions_data" value="">
    <input type="hidden" name="tftdamageskins_data" class="tftdamageskins_data" value="">
    <input type="hidden" name="tftmapskins_data" class="tftmapskins_data" value="">

    <div class="modal fade modal__account modal__buyacount loadModal__acount" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog__account" role="document">
            <div class="loader" style="text-align: center"><img src="/assets/frontend/{{theme('')->theme_key}}/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
            <div class="modal-content modal-content_accountlist data__form__random">

            </div>
        </div>
    </div>

    <div class="modal fade modal__account" role="dialog" id="successModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog__account" role="document">
            <div class="modal-content modal-content_accountlist">

                <div class="modal-header">
                    <span class="nick-modal-header">Thanh toán thành công</span>
                    <img data-dismiss="modal" class="nick-modal-header-close" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/close.svg" alt="">
                </div>

                <div class="modal-body">
                    <div class="modal-account-success-image d-flex justify-content-center w-100">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/group.png" alt="">
                    </div>
                    <div class="input-group nick-success-input-group" style="width: 100%">
                        <label>ID tài khoản</label>
                        <input id="nickIdInput" type="text" class="form-control" style="width:100%" readonly>
                    </div>
                    <div class="nick-notify-success-block">
                        <p>Nick của bạn được sẽ gửi tới trang Lịch sử mua Nick, vui lòng kiểm tra và đăng nhập vào Game, thay đổi mật khẩu để bảo mật cho tài khoản đã mua</p>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="d-flex justify-content-center w-100">
                        <a class="btn-nick btn-secondary" href="/">Trang chủ</a>
                        <a class="btn-nick btn-primary" href="/lich-su-mua-account">Lịch sử</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/account-list.js?v={{time()}}"></script>
@endsection