@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <div class="account">

        <div class="account_content">
            <div class="container">
                @include('frontend.layouts.includes.menu_profile')
                <div class="account_sidebar_content">
                    <div class="account_sidebar_content_title">
                        <p>THẺ CÀO ĐÃ NẠP</p>
                        <div class="account_sidebar_content_line"></div>
                    </div>
                    <div class="account_content_transaction_history">
                        <form class="form-charge_ls account_content_transaction_history__v2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span >Thẻ cào</span>
                                        <input type="text" name="serial" class="form-control serial" placeholder="Mã thẻ, Serial...">

                                    </div>
                                </div>
                                @if(isset($data_telecome) && count($data_telecome) > 0)
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span >Loại thẻ</span>
                                            <select name="key" class="form-control key">
                                                <option value="">--Tất cả loại thẻ--</option>
                                                @foreach($data_telecome as $val)
                                                    <option value="{{ $val->key }}">{{ $val->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span >Trạng thái</span>

                                        {{Form::select('status',array(''=>'-- Chọn trạng thái --')+config('module.charge.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'form-control status'))}}

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group date" id="transaction_history_start">
                                        <span class="input-group-btn input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                            <input type="text" class="form-control input-group-addon started_at" name="started_at" autocomplete="off" placeholder="Từ ngày">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group date" id="transaction_history_end">
                                        <span class="input-group-btn input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                        </span>
                                            <input type="text" class="form-control input-group-addon ended_at" name="ended_at" autocomplete="off" placeholder="Đến ngày">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn c-theme-btn c-btn-square m-b-10" type="submit">
                                        <i class="fas fa-search"></i> Tìm kiếm
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0)" class="btn c-btn-square m-b-10 btn-danger btn-hom-nay mb-2 mr-2"><i class="fas fa-calendar-alt"></i> Hôm nay</a>
                                    <a href="javascript:void(0)" class="btn c-btn-square m-b-10 btn-danger btn-hom-qua mb-2 mr-2"><i class="fas fa-calendar-alt"></i> Hôm qua </a>
                                    <a href="javascript:void(0)" class="btn c-btn-square m-b-10 btn-danger btn-thang-nay mb-2 mr-2"><i class="fas fa-calendar-alt"></i> Tháng này</a>
                                    <a href="javascript:void(0)" class="btn c-btn-square m-b-10 c-theme-btn btn-all mb-2 mr-2"><i class="fas fa-calendar-alt"></i> Tất cả</a>
                                </div>
                            </div>
                        </form>

                        <div id="data_pay_card_history_ls" style="position: relative">
                            <div class="body-box-loadding result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
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
