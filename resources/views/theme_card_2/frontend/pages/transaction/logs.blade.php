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
                        <h3>LỊCH SỬ GIAO DỊCH</h3>
                        <hr class="lines">
                        <form class="form-charge form-charge__accounttxns form-horizontal form-find m-b-20" role="form" method="get">
                            <div class="row mb-3">
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="input-group m-input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Giao dịch</span>
                                        </div>
                                        <select id="group_id" name="config" class="form-control c-square c-theme config">
                                            <option value="">--Tất cả --</option>
                                            @foreach($config as $i => $val)
                                                <option value="{{ $i }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="form-group m-form__group">
                                        <div class="input-group m-input-group date date-picker" data-rtl="false">
                                            <div class="input-group-prepend"><span class="input-group-text">Từ ngày</span></div>
                                            <input type="text" class="form-control c-square c-theme started_at" id="m_datepicker_1" name="started_at" autocomplete="off" data-date-format="dd/mm/yyyy" placeholder="Từ ngày" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="form-group m-form__group">
                                        <div class="input-group m-input-group date date-picker"
                                             data-date-format="dd/mm/yyyy" data-rtl="false">
                                            <div class="input-group-prepend"><span
                                                    class="input-group-text">Đến ngày</span></div>
                                            <input type="text" class="form-control c-square c-theme ended_at" id="m_datepicker_1" name="ended_at" autocomplete="off" data-date-format="dd/mm/yyyy" placeholder="Đến ngày" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="input-group m-input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Trạng thái</span>
                                        </div>
                                        <select id="group_id" name="status" class="form-control c-square c-theme status">
                                            <option value="">-- Tất cả --</option>
                                            @foreach($status as $ist => $valst)
                                                <option value="{{ $ist }}">{{ $valst }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">

                                    <button type="submit" class="btn btn-timkiem btn btn-success btn-sm m-btn m-btn--custom" style="position: relative">
                                        Tìm kiếm

                                    </button>
                                    <a style="font-family: 'Nunito', sans-serif" class="btn btn-danger btn-sm m-btn m-btn--custom btn-all" href="javascript:void(0)">Tất cả</a>
                                </div>
                            </div>


                        </form>
                        <div id="data_lich__su_history" class="card-table" style="position: relative">
                            <div class="row justify-content-center position-absolute" style="top: 50%;left: 50%" id="loading-data">
                                <div class="loading-wrap mb-3">
                                    <span class="modal-loader-spin mb-3"></span>
                                </div>
                            </div>
                            @include('frontend.pages.transaction.widget.__transaction_history')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="config_data" class="config_data" value="">
    <input type="hidden" name="status_data" class="status_data" value="">
    <input type="hidden" name="started_at_data" class="started_at_data" value="">
    <input type="hidden" name="ended_at_data" class="ended_at_data" value="">
    <input type="hidden" name="hidden_page" id="hidden_page_service" class="hidden_page_service" value="1" />
    <input type="hidden" name="sort_by_data" class="sort_by_data" value="">

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/transaction/txns-history.js"></script>

@endsection
