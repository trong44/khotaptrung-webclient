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
                        <h3>Biến động số dư</h3>
                    </div>
                    <div class="booking_detail"></div>
                    <div class="wapper-grid profile">

                        <form class="form-charge form-charge__accounttxns account_content_transaction_history__v2">

                            <div class="row">

                                @if(isset($config))
                                <div class="form-row mb-3 col-md-4">
                                    <div class="input-group date date-picker">
                                        <span class="input-group-btn">
                                        <p class="input-group-btn-p">Giao dịch:</p>
                                        </span>

                                        <select name="config" class="form-control c-square c-theme config" style="height: 40px">
                                            <option value="">-- Tất cả --</option>
                                            @foreach($config as $i => $val)
                                                <option value="{{ $i }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
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
                                        <div class="loading-data__timkiem justify-content-center">
                                        </div>
                                    </button>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-all position-relative" style="position: relative">
                                        Tất cả
                                        <div class="loading-data__timkiem justify-content-center">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </form>


                        <div id="data_lich__su_history" class="table-responsive" style="position: relative">
                            <div class="body-box-loadding result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
                                <div class="d-flex justify-content-center">
                                    <span class="pulser"></span>
                                </div>
                            </div>
                            @include('frontend.pages.transaction.widget.__transaction_history')
                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div><!-- /.container -->
</section>

<input type="hidden" name="config_data" class="config_data" value="">
<input type="hidden" name="status_data" class="status_data" value="">
<input type="hidden" name="started_at_data" class="started_at_data" value="">
<input type="hidden" name="ended_at_data" class="ended_at_data" value="">
<input type="hidden" name="hidden_page" id="hidden_page_service" class="hidden_page_service" value="1" />
<input type="hidden" name="sort_by_data" class="sort_by_data" value="">

<script src="/assets/frontend/{{theme('')->theme_key}}/js/account/txns-history.js"></script>

@endsection
