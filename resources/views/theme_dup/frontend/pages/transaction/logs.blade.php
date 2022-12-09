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
                        <p>LỊCH SỬ GIAO DỊCH</p>
                        <div class="account_sidebar_content_line"></div>
                    </div>
                    <div class="booking_detail"></div>
                    <div class="account_content_transaction_historyv2">
                        <form class="form-charge form-charge__accounttxns account_content_transaction_history__v2">
                            <div class="row">
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

                                <div class="col-md-4 data__config">
                                    @if(isset($config))
                                        <div class="input-group">
                                            <span >Giao dịch</span>
                                            <select name="config" class="form-control config">
                                                <option value="">--Tất cả --</option>
                                                @foreach($config as $i => $val)
                                                    <option value="{{ $i }}">{{ $val }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-4 data__status">
                                    @if(isset($status))
                                        <div class="input-group">
                                            <span >Trạng thái</span>
                                            <select name="status" class="form-control status">
                                                <option value="">--Tất cả --</option>
                                                @foreach($status as $ist => $valst)
                                                    <option value="{{ $ist }}">{{ $valst }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>


                            </div>

                            <div class="row">

                                <div class="col-12 item_buy_form_search">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <button type="submit" class="btn btn-timkiem" style="position: relative">
                                                    Tìm kiếm
                                                    <div class="row justify-content-center loading-data__timkiem">

                                                    </div>
                                                </button>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-all" style="position: relative">
                                                    Tất cả
                                                    <div class="row justify-content-center loading-data__timkiem">

                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>

                        <div id="data_lich__su_history" style="position: relative">
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
    </div>

    <input type="hidden" name="config_data" class="config_data" value="">
    <input type="hidden" name="status_data" class="status_data" value="">
    <input type="hidden" name="started_at_data" class="started_at_data" value="">
    <input type="hidden" name="ended_at_data" class="ended_at_data" value="">
    <input type="hidden" name="hidden_page" id="hidden_page_service" class="hidden_page_service" value="1" />
    <input type="hidden" name="sort_by_data" class="sort_by_data" value="">

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/txns-history.js"></script>

@endsection

