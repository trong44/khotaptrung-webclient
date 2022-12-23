@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <section>
        <div class="container">

            <div class="row user-manager">
                @include('frontend.widget.__menu_profile')

                <div class="col-12 col-md-8 col-lg-9 site-form " style="min-height: 212.568px;">

                    <div class="menu-content">
                        <div class="title">
                            <h3>Dịch vụ đã mua</h3>
                        </div>
                        <div class="booking_detail"></div>
                        <div class="wapper-grid profile">

                            <form class="form-charge form-charge__accountls account_content_transaction_history__v2">

                                <div class="row">

                                    <div class="form-row mb-3 col-md-4">
                                        <div class="input-group date date-picker">
                                            <span class="input-group-btn">
                                            <p class="input-group-btn-p">Mã số</p>
                                            </span>
                                            <input type="text" class="form-control c-square c-theme serial" name="serial" placeholder="Mã số" autocomplete="off" value="">
                                        </div>
                                    </div>

                                    <div class="form-row mb-3 col-md-4">
                                        <div class="input-group date date-picker">
                                            <span class="input-group-btn">
                                            <p class="input-group-btn-p">Trạng thái</p>
                                            </span>
                                            {{Form::select('status',array(''=>'-- Chọn --')+config('module.acc.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'form-control max-heardss status'))}}
                                        </div>
                                    </div>

                                    <div class="form-row mb-3 col-md-4">

                                        <div class="input-group m-b-10 c-square">
                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
                                                 data-rtl="false">
                                            <span class="input-group-btn">
                                            <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                            </span>
                                                <input type="text" class="form-control c-square c-theme started_at" name="started_at"
                                                       autocomplete="off" placeholder="Từ ngày"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3 col-md-4">
                                        <div class="input-group m-b-10 c-square">
                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
                                                 data-rtl="false">
                                            <span class="input-group-btn">
                                            <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                            </span>
                                                <input type="text" class="form-control c-square c-theme ended_at" name="ended_at"
                                                       autocomplete="off" placeholder="Đến ngày"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3 col-md-4">
                                        <div class="input-group date date-picker">
                                            <span class="input-group-btn">
                                            <p class="input-group-btn-p">Giá tiền</p>
                                            </span>

                                            {{Form::select('price',array(''=>'-- Chọn --')+config('module.acc.price'),old('price', isset($data['price']) ? $data['price'] : null),array('class'=>'form-control max-heardss price'))}}

                                        </div>
                                    </div>
                                    @if(isset($datacategory) && count($datacategory) > 0)
                                    <div class="form-row mb-3 col-md-4">
                                        <div class="input-group date date-picker">
                                            <span class="input-group-btn">
                                            <p class="input-group-btn-p">Danh mục</p>
                                            </span>
                                            <select name="key" class="form-control key max-heardss">
                                                <option value="">-- Chọn --</option>
                                                @foreach($datacategory as $val)
                                                    <option value="{{ $val->slug }}">{{ $val->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success btn-search " style="position: relative">
                                            Tìm kiếm
                                            <div class="loading-data__timkiem justify-content-center">

                                            </div>
                                        </button>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-all position-relative" >
                                            Tất cả
                                            <div class="loading-data__timkiem justify-content-center">

                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </form>

                            <div id="data_pay_account_history" style="position: relative">
                                <div class="body-box-loadding result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
                                    <div class="d-flex justify-content-center">
                                        <span class="pulser"></span>
                                    </div>
                                </div>
{{--                                @include('frontend.pages.service.widget.__datalogs')--}}
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div><!-- /.container -->
    </section>

    <div class="modal fade" id="taikhoandamua_password" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-dialog__account" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding-left: 16px;padding-right: 16px">
                    <h5 class="modal-title" style="font-weight: 600">Xác nhận mua tài khoản</h5>
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
            height: 40px;
        }

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
