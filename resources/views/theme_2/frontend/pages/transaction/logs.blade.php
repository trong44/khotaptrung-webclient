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
                <div class=" mb-4">
                    <div class="" id="history" style="min-height: 628px;">
                        <form class="form-charge form-charge__accounttxns account_content_transaction_history__v2">
                            <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                                <h4 class="title-style-left mb-3">Danh sách giao dịch</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <input type="text" placeholder="ID" name="id_txns" class="id_txns">
                                    </div>


                                    <div class="input-group date-ranger-picker ms-3">
                                        <input type="text" class="form-control border-end-0 started_at" name="started_at" placeholder="DD/MM/YYYY" value="">
                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-arrow-right"></i></span>
                                        <input type="text" class="form-control border-start-0 ended_at" name="ended_at" placeholder="DD/MM/YYYY" value="">
                                        <button class="btn bg-primary text-white" type="submit"><i class="las la-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div id="data_lich__su_history">
                            <div class="text-center ajax-loading-store load_spinner ajax-loading-data" >
                                <div class="cv-spinner">
                                    <span class="spinner"></span>
                                </div>
                            </div>
                            @include('frontend.pages.transaction.widget.__transaction_history')
                        </div>

                    </div><!-- END Tab Content History -->
                </div>
            </div>
        </div>
    </div>
    <div id="copy"></div>
    <div class="after"></div>


    {{--    transaction--}}
    <input type="hidden" name="id_txns_data" class="id_txns_data" value="">
    <input type="hidden" name="started_at_data" class="started_at_data" value="">
    <input type="hidden" name="ended_at_data" class="ended_at_data" value="">
    <input type="hidden" name="hidden_page" id="hidden_page_service" class="hidden_page_service" value="1" />


    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/txns-history.js?v={{time()}}"></script>

@endsection

