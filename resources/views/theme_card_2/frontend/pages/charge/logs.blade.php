@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
<div id="profile">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                @include('frontend.layouts.includes.menu_profile')
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="content-profile" style="min-height: 468px;">
                    <h3>THẺ CÀO ĐÃ NẠP</h3>
                    <hr class="lines">
                    <form class="form-charge_ls form-horizontal form-find m-b-20" role="form" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="input-group m-input-group mb-4">
                                    <div class="input-group-prepend"><span class="input-group-text">Thẻ cào</span></div>
                                    <input type="text" class="form-control c-square c-theme serial" name="serial" value=""
                                           autofocus placeholder="Mã thẻ,Serial...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group m-input-group mb-4">
                                    <div class="input-group-prepend"><span class="input-group-text">Loại thẻ</span></div>
                                    <select name="key" class="form-control c-square c-theme key">.
                                        <option value=""> Tất cả loại thẻ</option>
                                        @foreach($data_telecome as $val)
                                            <option value="{{ $val->key }}">{{ $val->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group m-input-group mb-4">
                                    <div class="input-group-prepend"><span class="input-group-text">Trạng thái</span></div>

                                    {{Form::select('status',array(''=>'-- Chọn trạng thái --')+config('module.charge.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'form-control c-square c-theme status'))}}


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group m-form__group">
                                    <div class="input-group m-input-group date date-picker"
                                         data-rtl="false">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                        <input type="text" class="form-control c-square c-theme started_at" id="m_datepicker_1" name="started_at" autocomplete="off" data-date-format="dd/mm/yyyy"  placeholder="Từ ngày" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group m-form__group">
                                    <div class="input-group m-input-group date date-picker" data-date-format="dd/mm/yyyy"
                                         data-rtl="false">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                        <input type="text" class="form-control c-square c-theme ended_at" id="m_datepicker_1" name="ended_at"
                                               autocomplete="off" data-date-format="dd/mm/yyyy"  placeholder="Đến ngày" value="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <button class="btn btn-success btn-sm m-btn m-btn--custom " type="submit">
                                    <i class="fas fa-search"></i> Tìm kiếm
                                </button>
{{--                                <input style="font-family: 'Nunito', sans-serif" type="submit" class="btn btn-success btn-sm m-btn m-btn--custom" value="Tìm kiếm">--}}
                                <a style="font-family: 'Nunito', sans-serif" class="btn btn-danger btn-sm m-btn m-btn--custom btn-all" href="javascript:void(0)">Tất cả</a>
                            </div>
                        </div>


                    </form>
                    <div id="data_pay_card_history_ls" class="card-table" style="position: relative">
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
