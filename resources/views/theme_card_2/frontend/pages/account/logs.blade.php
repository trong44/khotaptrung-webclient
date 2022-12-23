@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    @extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <div id="profile" style="margin-top: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                    @include('frontend.layouts.includes.menu_profile')
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="content-profile" style="min-height: 468px;">
                        <h3>TÀI KHOẢN ĐÃ MUA</h3>
                        <hr class="lines">

                        <div class="booking_detail"></div>

                        <form class="form-charge form-charge__accountls account_content_transaction_history__v2">
                            <div class="row mb-3">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="margin-bottom: 8px">
                                    <div class="input-group m-input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Mã tài khoản</span>
                                        </div>
                                        <input type="text" name="serial" class="form-control serial" placeholder="Mã tài khoản">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="margin-bottom: 8px">
                                    <div class="input-group m-input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Trạng thái</span>
                                        </div>
                                        {{Form::select('status',array(''=>'-- Chọn trạng thái --')+config('module.acc.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'form-control status'))}}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="margin-bottom: 8px">
                                    <div class="input-group m-input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Trạng thái</span>
                                        </div>
                                        {{Form::select('price',array(''=>'-- Chọn giá tiền --')+config('module.acc.price'),old('price', isset($data['price']) ? $data['price'] : null),array('class'=>'form-control price'))}}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="margin-bottom: 8px">
                                    <div class="form-group m-form__group">
                                        <div class="input-group m-input-group date date-picker" data-rtl="false">
                                            <div class="input-group-prepend"><span class="input-group-text">Từ ngày</span></div>
                                            <input type="text" class="form-control c-square c-theme started_at" id="m_datepicker_1" name="started_at" autocomplete="off" data-date-format="dd/mm/yyyy" placeholder="Từ ngày" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="margin-bottom: 8px">
                                    <div class="form-group m-form__group">
                                        <div class="input-group m-input-group date date-picker"
                                             data-date-format="dd/mm/yyyy" data-rtl="false">
                                            <div class="input-group-prepend"><span
                                                    class="input-group-text">Đến ngày</span></div>
                                            <input type="text" class="form-control c-square c-theme ended_at" id="m_datepicker_1" name="ended_at" autocomplete="off" data-date-format="dd/mm/yyyy" placeholder="Đến ngày" value="">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">

                                    <button type="submit" class="btn btn-timkiem btn btn-success btn-sm m-btn m-btn--custom btn_timkiem" style="position: relative">
                                        Tìm kiếm

                                    </button>
                                    <a style="font-family: 'Nunito', sans-serif" class="btn btn-danger btn-sm m-btn m-btn--custom btn-all" href="javascript:void(0)">Tất cả</a>
                                </div>
                            </div>


                        </form>
                        <div id="data_pay_account_history" class="card-table" style="position: relative">
                            <div class="row justify-content-center position-absolute" style="top: 50%;left: 50%" id="loading-data">
                                <div class="loading-wrap mb-3">
                                    <span class="modal-loader-spin mb-3"></span>
                                </div>
                            </div>
                            @include('frontend.pages.account.widget.__datalogs')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="taikhoandamua_password" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-dialog__account" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight: 600;color: #2F6A7C;">Xác nhận mua tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div class="form-horizontal form__show__chitiet">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                </div>
                {{--                </form>--}}
            </div>
        </div>
    </div>
    <style>
        #taikhoandamua_password .modal-dialog {
            max-width: 600px;
        }

        #taikhoandamua_password .copy_acc {
            border: 1px solid #d0d7de;
        }

        /*#tableacchstory{*/
        /*    display: none;*/
        /*}*/

    </style>
    <input type="hidden" name="serial_data" class="serial_data" value="">
    <input type="hidden" name="key_data" class="key_data" value="">
    <input type="hidden" name="price_data" class="price_data" value="">
    <input type="hidden" name="status_data" class="status_data" value="">
    <input type="hidden" name="started_at_data" class="started_at_data" value="">
    <input type="hidden" name="ended_at_data" class="ended_at_data" value="">
    <input type="hidden" name="hidden_page" id="hidden_page_service" class="hidden_page_service" value="1" />
    <input type="hidden" name="chitiet_data" class="chitiet_data" value="0" />
    <input type="hidden" name="sort_by_data" class="sort_by_data" value="">
    <input type="hidden" name="id_data" class="id_data" value="">

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/acc-history.js"></script>

@endsection


