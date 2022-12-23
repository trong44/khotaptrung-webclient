@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
<div class="row my-3">
    <div class="col-xl-3  col-sm-3 col-md-3 col-12">
        <div class="bg-white">
            @include('frontend.layouts.includes.menu_profile')
        </div>

    </div>
    <div class="col-xl-9  col-md-9 col-sm-12 col-12">
        <div class="bg-white">
            <div class="main-profile" style="min-height: 468px;padding:15px 20px">

                <div class="content-profile">
                    <h3>Lịch sử nạp thẻ</h3>
                    <hr class="lines">
                    <form class="form-charge_ls account_content_transaction_history__v2 form-horizontal form-find mb-4" >
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-2 c-square ">
                                    <span class="input-group-addon" id="basic-addon1">Thẻ cào</span>
                                    <input type="text" class="form-control c-square c-theme serial" name="serial" value="" autofocus placeholder="Mã thẻ,Serial...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-2 c-square">
                                    <span class="input-group-addon" id="basic-addon1">Loại thẻ</span>
                                    <select name="key" class="form-control c-square c-theme key">.
                                        <option value=""> Tất cả loại thẻ</option>
                                        @foreach($data_telecome as $val)
                                            <option value="{{ $val->key }}">{{ $val->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-2 c-square">
                                    <span class="input-group-addon" id="basic-addon1">Trạng thái</span>
                                    {{Form::select('status',array(''=>'-- Chọn trạng thái --')+config('module.charge.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'form-control status c-square c-theme status'))}}

                                    {{--                                    <select name="status" id="status" class="form-control c-square c-theme">.--}}

                                    {{--                                    </select>--}}
                                </div>
                            </div>

                            {{--                            <div class="col-md-4">--}}
{{--                                <div class="input-group mb-2 c-square">--}}
{{--                                    <span class="input-group-addon" id="basic-addon1">Kiểu nạp </span>--}}
{{--                                    <select name="type_charge" id="type_charge" class="form-control c-square c-theme"    onchange="get_list_status();" onblur="get_list_status();">--}}

{{--                                        <option value="0" selected>--}}
{{--                                            Nạp tự động--}}
{{--                                        </option>--}}
{{--                                        <option value="1" >--}}
{{--                                            Nạp chậm--}}
{{--                                        </option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>

                        <div class="row ">

                            <div class="col-md-4">
                                <div class="input-group mb-2 c-square">
                                    <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-rtl="false">
                                        <span class="input-group-btn">
                                            <button class="btn default c-btn-square pl-2 pr-2 input-group-addon" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                        <input type="text" class="form-control c-square c-theme started_at" name="started_at" autocomplete="off" autofocus placeholder="Từ ngày" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-2 c-square">
                                    <div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
                                         data-rtl="false">
                                    <span class="input-group-btn">
                                         <button class="btn default c-btn-square pl-2 pr-2 input-group-addon" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                        <input type="text" class="form-control c-square c-theme ended_at" name="ended_at" autocomplete="off" placeholder="Đến ngày" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <button class="btn c-theme-btn c-btn-square btn-success c-theme-btn c-btn-square mb-2" type="submit">
                                    <i class="fas fa-search"></i> Tìm kiếm
                                </button>
                                <a href="javascript:void(0)" class="btn c-btn-square mb-2 btn-danger btn-all "><i class="fas fa-calendar-alt"></i> Tất cả</a>
                            </div>
                        </div>


                    </form>

                    <div id="data_pay_card_history_ls" style="position: relative">
                        <div class="row justify-content-center position-absolute" style="top: 50%;left: 50%" id="loading-data">
                            {{--                                    <div class="loading"></div>--}}
                            <div class="loading-wrap mb-3">
                                <span class="modal-loader-spin mb-3"></span>
                            </div>
                        </div>
                        @include('frontend.pages.charge.widget.__charge_history')
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
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
