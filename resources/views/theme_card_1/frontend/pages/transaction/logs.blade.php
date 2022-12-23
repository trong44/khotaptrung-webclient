@extends('frontend.layouts.master')

@section('content')
<div class="row my-3" >
    <div class="col-xl-3  col-sm-3 col-md-3 col-12">
        <div class="bg-white">
            @include('frontend.layouts.includes.menu_profile')
        </div>

    </div>
    <div class="col-xl-9  col-md-9 col-sm-12 col-12">
        <div class="bg-white">
            <div class="main-profile" style="min-height: 468px;padding:15px 20px">
                <div class="content-profile">
                    <h3>Lịch sử giao dịch</h3>
                    <hr class="lines">
                    <form class="form-charge form-charge__accounttxns account_content_transaction_history__v2 form-horizontal form-find mb-4 " role="form" method="get">
                        <div class="row">
                            @if(isset($config))
                            <div class="col-md-4">
                                <div class="input-group mb-2 c-square">
                                    <span class="input-group-addon" id="basic-addon1">Giao dịch</span>
                                    <select name="config" class="form-control c-square c-theme config">
                                        <option value="">--Tất cả --</option>
                                        @foreach($config as $i => $val)
                                            <option value="{{ $i }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-4">
                                <div class="input-group mb-2 c-square">
                                    <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-rtl="false">
                                        <span class="input-group-btn">
                                              <button class="btn default c-btn-square pl-2 pr-2 input-group-addon" type="button">
                                                  <i class="fa fa-calendar"></i>
                                              </button>
                                        </span>
                                        <input type="text" class="form-control c-square c-theme started_at" name="started_at" autocomplete="off" placeholder="Từ ngày" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-2 c-square">
                                    <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-rtl="false">
                                        <span class="input-group-btn">
                                            <button class="btn default c-btn-square pl-2 pr-2 input-group-addon" type="button">
                                                <i class="fa fa-calendar"></i>
                                            </button>
                                        </span>
                                        <input type="text" class="form-control c-square c-theme ended_at" name="ended_at" autocomplete="off" placeholder="Đến ngày" value="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-2 c-square">
                                <span class="input-group-addon" id="basic-addon1">Trạng thái</span>
                                <select name="status" class="form-control status  c-square c-theme config">
                                    <option value="">--Tất cả --</option>
                                    @foreach($status as $ist => $valst)
                                        <option value="{{ $ist }}">{{ $valst }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-timkiem btn-success c-theme-btn c-btn-square mb-2" style="position: relative">
                                    Tìm kiếm
                                    <div class="row justify-content-center loading-data__timkiem">
                                    </div>
                                </button>
{{--                                <input type="submit" class="btn btn-success c-theme-btn c-btn-square mb-2" value="Tìm kiếm">--}}
                                <a class="btn c-btn-square mb-2 btn-danger btn-all" href="javascript:void(0)" >Tất cả</a>
                            </div>
                        </div>


                    </form>

                    <div id="data_lich__su_history" style="position: relative">
                        <div class="row justify-content-center position-absolute" style="top: 50%;left: 50%" id="loading-data">
                            <div class="loading-wrap mb-3">
                                <span class="modal-loader-spin mb-3"></span>
                            </div>
                        </div>
                        @include('frontend.pages.transaction.widget.__transaction_history')
                    </div>

{{--                    <table class="table table-hover table-custom-res">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <th>Thời gian</th>--}}
{{--                            <th>ID</th>--}}
{{--                            <th>Tài khoản</th>--}}
{{--                            <th>Giao dịch</th>--}}
{{--                            <th>Số tiền</th>--}}
{{--                            <th>Số dư cuối</th>--}}
{{--                            <th>Nội dung</th>--}}
{{--                            <th>Trạng thái</th>--}}
{{--                        </tr>--}}


{{--                        </tbody>--}}
{{--                        <tbody>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                    <!-- END: PAGE CONTENT -->--}}
{{--                    <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">--}}

{{--                    </div>--}}



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
