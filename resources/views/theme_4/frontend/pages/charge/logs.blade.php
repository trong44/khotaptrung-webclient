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
                        <h3>Lịch sử nạp thẻ</h3>
                    </div>
                    <div class="wapper-grid profile mt-3 mt-lg-0">

                        <form class="form-charge form-horizontal form-find form-charge_ls account_content_transaction_history__v2" role="form" method="get">

                            <div class="row">
                                <div class="form-row mb-3 col-md-4">
                                    <div class="input-group">
                                     <span class="input-group-btn">
                                         <p class="input-group-btn-p">Thẻ cào</p>
                                    </span>
                                        <input type="text" class="form-control c-square c-theme" name="find"
                                               value=""
                                               autofocus placeholder="Mã thẻ,Serial...">
                                    </div>
                                </div>

                                @if(isset($data_telecome) && count($data_telecome) > 0)
                                <div class="form-row mb-3 col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <p class="input-group-btn-p">Loại thẻ</p>
                                        </span>
                                        <select  name="key" class="form-control c-square c-theme key">.
                                            <option value=""> Tất cả loại thẻ</option>
                                            @foreach($data_telecome as $val)
                                                <option value="{{ $val->key }}">{{ $val->title }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-row mb-3 col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <p class="input-group-btn-p">Trạng thái</p>
                                        </span>
                                        {{Form::select('status',array(''=>'-- Chọn trạng thái --')+config('module.charge.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'form-control status'))}}
                                    </div>
                                </div>

                                <div class="form-row mb-3 col-md-4">
                                    <div class="col-12">
                                        <label class="mt-2">Từ:</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group m-b-10 c-square date date-picker">
                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
                                                 data-rtl="false">
                                            <span class="input-group-btn">
                                            <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                            </span>
                                                <input type="text" class="form-control c-square c-theme started_at" name="started_at" autocomplete="off" placeholder="Từ ngày" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row mb-3 col-md-4 ">
                                    <div class="col-12">
                                        <label class="mt-2">Đến:</label>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group m-b-10 c-square date date-picker">
                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
                                                 data-rtl="false">
                                            <span class="input-group-btn">
                                            <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                            </span>
                                                <input type="text" class="form-control c-square c-theme ended_at" name="ended_at" autocomplete="off" placeholder="Đến ngày" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <button  class="btn btn-success c-theme-btn c-btn-square m-b-10 btn-search position-relative" type="submit">
                                        Tìm kiếm
                                        <div class="loading-data__timkiem justify-content-center">
                                        </div>
                                    </button>

                                    <a class="btn btn-danger btn-all position-relative" href="javascript:void(0)">
                                        Tất cả
                                        <div class="loading-data__timkiem justify-content-center">
                                        </div>
                                    </a>
                                </div>
                            </div>

{{--                            <div class="row mb-4">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <a class="btn btn-info c-theme-btn c-btn-square m-b-10 btn-hom-nay" style="margin-left: 0px" href="javascript:void(0)"><i--}}
{{--                                            class="glyphicon glyphicon-calendar"></i> Hôm nay</a>--}}
{{--                                    <a class="btn btn-info c-theme-btn c-btn-square m-b-10 btn-hom-qua" style="margin-left: 0px" href="javascript:void(0)"><i--}}
{{--                                            class="glyphicon glyphicon-calendar"></i> Hôm qua</a>--}}
{{--                                    <a class="btn btn-info c-theme-btn c-btn-square m-b-10 btn-thang-nay" style="margin-left: 0px" href="javascript:void(0)"><i--}}
{{--                                            class="glyphicon glyphicon-calendar"></i> Tháng này</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </form>

                        <div id="data_pay_card_history_ls" style="position: relative">
                            <div class="body-box-loading result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
                                <div class="d-flex justify-content-center">
                                    <span class="pulser"></span>
                                </div>
                            </div>
                            @include('frontend.pages.charge.widget.__charge_history')
                        </div>


                        <!-- END: PAGE CONTENT -->

                        <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <style>
            .table-custom-res {
                margin: auto;
                overflow-x: auto;
                width: 100%;

            }
        </style>


    </div><!-- /.container -->
</section>
<input type="hidden" class="started_at_day_ls" name="started_at_day_ls" value="{{ \Carbon\Carbon::now()->startOfDay()->format('d/m/Y H:i:s') }}">
<input type="hidden" class="end_at_day_ls" name="end_at_day_ls" value="{{ \Carbon\Carbon::now()->endOfDay()->format('d/m/Y H:i:s')}}">
<input type="hidden" class="started_at_yes_ls" name="started_at_yes" value="{{ \Carbon\Carbon::yesterday()->startOfDay()->format('d/m/Y H:i:s') }}">
<input type="hidden" class="end_at_yes_ls" name="end_at_yes_ls" value="{{ \Carbon\Carbon::yesterday()->endOfDay()->format('d/m/Y H:i:s')}}">
<input type="hidden" class="started_at_month_ls" name="started_at_month_ls" value="{{ \Carbon\Carbon::now()->startOfMonth()->format('d/m/Y H:i:s') }}">
<input type="hidden" class="end_at_month_ls" name="end_at_month_ls" value="{{ \Carbon\Carbon::now()->endOfMonth()->format('d/m/Y H:i:s') }}">

<input type="hidden" name="serial_data_ls" class="serial_data_ls">
<input type="hidden" name="key_data_ls" class="key_data_ls">
<input type="hidden" name="status_data_ls" class="status_data_ls">
<input type="hidden" name="started_at_data_ls" class="started_at_data_ls">
<input type="hidden" name="ended_at_data_ls" class="ended_at_data_ls">
<input type="hidden" name="hidden_page_ls" id="hidden_page_service_ls" class="hidden_page_service" value="1" />
<script src="/assets/frontend/{{theme('')->theme_key}}/js/charge/charge-history.js"></script>
@endsection
