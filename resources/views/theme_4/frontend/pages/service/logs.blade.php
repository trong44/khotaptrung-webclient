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

                        <form class="form-charge account_content_transaction_history__v2 account_service_history__v2">

                            <div class="row">

                                <div class="form-row mb-3 col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <p class="input-group-btn-p">Giao dịch:</p>
                                        </span>

                                        <input type="text" class="form-control c-square c-theme id" name="id" placeholder="Mã ID">
                                    </div>
                                </div>
                                @if(isset($datacate) && count($datacate) > 0)
                                <div class="form-row mb-3 col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <p class="input-group-btn-p">Dịch vụ:</p>
                                        </span>

                                        <select id="group_id" name="key" class="form-control c-square c-theme key" style="height: 40px">
                                            <option value="">-- Chọn --</option>
                                            @foreach($datacate as $val)
                                                <option value="{{ $val->slug }}">{{ $val->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-row mb-3 col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <p class="input-group-btn-p">Dịch vụ:</p>
                                        </span>

                                        <select class="form-control c-square c-theme status" name="status" style="height: 40px">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="0">Đã hủy</option>
                                            <option value="1">Đang chờ xử lý</option>
                                            <option value="2">Đang thực hiện</option>
                                            <option value="3">Từ chối</option>
                                            <option value="4">Hoàn tất</option>
                                            <option value="5">Thất bại</option>
                                        </select>
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

                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success btn-timkiem " style="position: relative">
                                        Tìm kiếm
                                        <div class=" justify-content-center loading-data__timkiem">

                                        </div>
                                    </button>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-all" style="position: relative">
                                        Tất cả
                                        <div class=" justify-content-center loading-data__timkiem">

                                        </div>
                                    </a>
                                </div>
                            </div>

                        </form>

                        <div id="data_service_history" style="position: relative">
                            <div class="body-box-loadding result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
                                <div class="d-flex justify-content-center">
                                    <span class="pulser"></span>
                                </div>
                            </div>
                            @include('frontend.pages.service.widget.__datalogs')
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div><!-- /.container -->
</section>

<input type="hidden" class="started_at_day_dv" name="started_at_day_dv" value="{{ \Carbon\Carbon::now()->startOfDay() }}">
<input type="hidden" class="end_at_day_dv" name="end_at_day_dv" value="{{ \Carbon\Carbon::now()->endOfDay() }}">
<input type="hidden" class="started_at_yes_dv" name="started_at_yes_dv" value="{{ \Carbon\Carbon::yesterday()->startOfDay() }}">
<input type="hidden" class="end_at_yes_dv" name="end_at_yes_dv" value="{{ \Carbon\Carbon::yesterday()->endOfDay()}}">
<input type="hidden" class="started_at_month_dv" name="started_at_month_dv" value="{{ \Carbon\Carbon::now()->startOfMonth() }}">
<input type="hidden" class="end_at_month_dv" name="end_at_month_dv" value="{{ \Carbon\Carbon::now()->endOfMonth() }}">

<input type="hidden" name="id_data" class="id_data">
<input type="hidden" name="key_data" class="key_data">
<input type="hidden" name="status_data" class="status_data">
<input type="hidden" name="started_at_data" class="started_at_data">
<input type="hidden" name="ended_at_data" class="ended_at_data">
<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
<script src="/assets/frontend/{{theme('')->theme_key}}/js/service/service-history.js"></script>
@endsection
