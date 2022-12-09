@extends('frontend.layouts.master')

@section('content')
<div class="row my-3" >
    <div class="col-lg-3  col-sm-3 col-md-3 col-12">
        <div class="bg-white">
            @include('frontend.layouts.includes.menu_profile')
        </div>

    </div>
    <div class="col-lg-9  col-md-9 col-sm-12 col-12">
        <div class="bg-white">
            <div class="main-profile" style="min-height: 468px;padding:15px 20px">
                <div class="content-profile">
                    <h3>Thẻ cào đã mua</h3>
                    <hr class="lines">
                    <form class="form-horizontal form-find mb-4 form-store-card account_content_transaction_history__v2" role="form" method="get">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-2 c-square ">
                                    <span class="input-group-addon" id="basic-addon1">Thẻ cào</span>
                                    <input type="text" class="form-control c-square c-theme serial" name="serial" value="" autofocus placeholder="Mã thẻ, Serial...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-2 c-square">
                                    <div class="input-group date date-picker " data-date-format="dd/mm/yyyy" data-rtl="false">
                                        <span class="input-group-btn">
                                            <button class="btn default c-btn-square pl-2 pr-2 input-group-addon" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                        <input type="text" class="form-control c-square c-theme" name="started_at" autocomplete="off" autofocus placeholder="Từ ngày" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-2 c-square">
                                    <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-rtl="false">
                                        <span class="input-group-btn">
                                             <button class="btn default c-btn-square pl-2 pr-2 input-group-addon" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                        <input type="text" class="form-control c-square c-theme" name="ended_at" autocomplete="off" placeholder="Đến ngày" value="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-success c-theme-btn c-btn-square mb-2" value="Tìm kiếm">
                                <a class="btn c-btn-square mb-2 btn-danger" href="/the-cao-da-mua">Tất cả</a>
                            </div>
                        </div>
                    </form>
                    <div id="data_store_card" style="position: relative">
                        <div class="row justify-content-center position-absolute" style="top: 50%;left: 50%" id="loading-data">
                            {{--                                    <div class="loading"></div>--}}
                            <div class="loading-wrap mb-3">
                                <span class="modal-loader-spin mb-3"></span>
                            </div>
                        </div>
{{--                        @include('frontend.pages.storecard.widget.__store__card__history')--}}
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
<input type="hidden" name="id_storecard" class="id_storecard" value="">
<input type="hidden" name="started_at_storecard" class="started_at_storecard" value="">
<input type="hidden" name="ended_at_storecard" class="ended_at_storecard" value="">
<input type="hidden" name="hidden_page_storecard" id="hidden_page_storecard" class="hidden_page_storecard" value="1" />
<style>


</style>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/storecard/storecard-history.js?v={{time()}}"></script>
@endsection
