@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@push('js')

@endpush

@section('content')
    <div class="site-content-body bg-white first last p-0">
        <div class="block-profile" >
            @include('frontend.widget.__menu_profile')
            <div class="block-content p-3">
                <div class="mb-4">
                    <div class="" id="tranfer_atm" role="tabpanel"  style="min-height: 700px;">
                        <form class="form-charge form__lsmt">
                            <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                                <h4 class="title-style-left mb-3 mt-3">Lịch sử nạp ATM</h4>
                            </div>
                        </form>


                        <div id="data_recharge_atm">
                            <div>
                                <div class="text-center ajax-loading-store load_spinner ajax-loading-data" >
                                    <div class="cv-spinner">
                                        <span class="spinner"></span>
                                    </div>
                                </div>
                            </div>
                            @include('frontend.pages.transfer.widget.__tranfer_history')
                        </div>

                    </div><!-- BEGIN Tab Content Item -->
                </div>
            </div>
        </div>
    </div>
    <div id="copy"></div>
    <div class="after"></div>


    <input type="hidden" name="id_tranfer_data" class="id_tranfer_data" value="">
    <input type="hidden" name="started_at_tranfer_data" class="started_at_tranfer_data" value="">
    <input type="hidden" name="ended_at_tranfer_data" class="ended_at_tranfer_data" value="">
    <input type="hidden" name="hidden_page_service_tranfer" id="hidden_page_service_tranfer" class="hidden_page_service_tranfer" value="1" />

    <script src="/assets/frontend/theme_2/js/transfer/log_recharge-atm.js?v={{time()}}"></script>



@endsection

