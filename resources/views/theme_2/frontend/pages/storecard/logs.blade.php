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
                    <div class="data__muathe_tab" id="item"  style="min-height: 700px;">
                        <form class="form-store-card">
                            <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                                <h4 class="title-style-left mb-3">Thẻ cào đã mua</h4>
{{--                                <div class="d-flex align-items-center mb-3">--}}
{{--                                    <input type="text" placeholder="ID" name="id_lsmt" class="id_lsmt">--}}
{{--                                    <div class="input-group date-ranger-picker ms-3">--}}

{{--                                        <input type="text" class="form-control border-end-0 started_at_lsmt" name="started_at" placeholder="DD/MM/YYYY" value="" autocomplete="off">--}}
{{--                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-arrow-right"></i></span>--}}
{{--                                        <input type="text" class="form-control border-start-0 ended_at_lsmt" name="ended_at" placeholder="DD/MM/YYYY" value=""  autocomplete="off">--}}
{{--                                        <button class="btn bg-primary text-white" type="submit"><i class="las la-angle-right"></i></button>--}}
{{--                                        <input type="hidden" name="log" value="store-card">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </form>

                        <div id="data_store_card">
                            <div class="text-center ajax-loading-store load_spinner ajax-loading-data" >
                                <div class="cv-spinner">
                                    <span class="spinner"></span>
                                </div>
                            </div>
                            @include('frontend.pages.storecard.widget.__store__card__history')
                        </div>

                    </div><!-- BEGIN Tab Content Item -->
                </div>
            </div>
        </div>
    </div>
    <div id="copy"></div>
    <div class="after"></div>



    {{--    store card--}}
    <input type="hidden" name="id_storecard" class="id_storecard" value="">
    <input type="hidden" name="started_at_storecard" class="started_at_storecard" value="">
    <input type="hidden" name="ended_at_storecard" class="ended_at_storecard" value="">
    <input type="hidden" name="hidden_page_storecard" id="hidden_page_storecard" class="hidden_page_storecard" value="1" />

    <script src="/assets/frontend/theme_2/js/store_card/storecard-history.js?v={{time()}}"></script>

@endsection

