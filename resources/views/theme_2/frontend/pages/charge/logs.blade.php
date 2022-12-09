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
                <div class="tab-content mb-4">
                    <div class="data__napthe_tab" id="deposit"  style="min-height: 700px;">
                        <form class="form-charge form__lsnt">
                            <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                                <h4 class="title-style-left mb-3">Lịch sử nạp thẻ</h4>
                                <div class="d-flex align-items-center mb-3">
                                    <div class="input-group date-ranger-picker ms-3">
                                        <input type="text" name="started_at" class="form-control input-group-addon border-end-0 started_at" placeholder="DD/MM/YYYY" value="" autocomplete="off">
                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-arrow-right"></i></span>
                                        <input type="text" name="ended_at" class="form-control input-group-addon           border-start-0 ended_at" placeholder="DD/MM/YYYY" value="" autocomplete="off">
                                        <button class="btn bg-primary text-white" type="submit"><i class="las la-angle-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div id="data_charge_history">
                            <div class="text-center ajax-loading-store load_spinner ajax-loading-data">
                                <div class="cv-spinner">
                                    <span class="spinner"></span>
                                </div>
                            </div>
                            @include('frontend.pages.charge.widget.__charge_history')
                        </div>

                    </div><!-- END Tab Content History -->
                </div>
            </div>
        </div>
    </div>
    <div id="copy"></div>
    <div class="after"></div>



    {{--    charge--}}
    <input type="hidden" name="started_at_lsnt_data" class="started_at_data_lsnt" value="">
    <input type="hidden" name="ended_at_lsnt_data" class="ended_at_data_lsnt" value="">
    <input type="hidden" name="hidden_page_service_lsnt" id="hidden_page_service_lsnt" class="hidden_page_service_lsnt" value="1" />

    <script src="/assets/frontend/theme_2/js/account/charge-history.js?v={{time()}}"></script>




@endsection

