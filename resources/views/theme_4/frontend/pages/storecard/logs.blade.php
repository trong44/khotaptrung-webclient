@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
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
                        <h3>Lịch sử mua thẻ</h3>
                    </div>
                    <div class="wapper-grid profile">

                        <form class="form-store-card account_content_transaction_history__v2">

                            <div class="row">

                                <div class="form-row mb-3 col-md-4">

                                    <div class="col-12">
                                        <input type="text" class="form-control c-square c-theme" name="serial"
                                               value=""
                                               placeholder="Mã thẻ, Serial...">
                                    </div>
                                </div>



                                <div class="form-row mb-3 col-md-4">

                                    <div class="col-12">
                                        <div class="input-group m-b-10 c-square">
                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
                                                 data-rtl="false">
                                            <span class="input-group-btn">
                                            <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                            </span>
                                                <input type="text" class="form-control c-square c-theme" name="started_at"
                                                       autocomplete="off" placeholder="Từ ngày"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row mb-3 col-md-4">

                                    <div class="col-12">
                                        <div class="input-group m-b-10 c-square">
                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
                                                 data-rtl="false">
                                            <span class="input-group-btn">
                                            <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                            </span>
                                                <input type="text" class="form-control c-square c-theme" name="ended_at"
                                                       autocomplete="off" placeholder="Đến ngày"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <button class="btn c-theme-btn c-btn-square m-b-10" type="submit">
                                        <i class="fas fa-search"></i> Tìm kiếm
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div id="data_store_card" style="position: relative">
                            <div class="body-box-loadding result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
                                <div class="d-flex justify-content-center">
                                    <span class="pulser"></span>
                                </div>
                            </div>
{{--                            @include('frontend.pages.storecard.widget.__store__card__history')--}}
                        </div>

                        <!-- END: PAGE CONTENT -->

                    </div>
                </div>
            </div>
        </div>


    </div><!-- /.container -->

    <input type="hidden" name="id_storecard" class="id_storecard" value="">
    <input type="hidden" name="started_at_storecard" class="started_at_storecard" value="">
    <input type="hidden" name="ended_at_storecard" class="ended_at_storecard" value="">
    <input type="hidden" name="hidden_page_storecard" id="hidden_page_storecard" class="hidden_page_storecard" value="1" />

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/storeCard/storecard-history.js?v={{time()}}"></script>

</section>
@endsection
