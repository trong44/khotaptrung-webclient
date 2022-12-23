@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    <div class="row my-3">
        <div class="col-xl-3  col-sm-3 col-md-3 col-12">
            <div class="bg-white">
                @include('frontend.layouts.includes.menu_profile')
            </div>

        </div>
        <div class="col-xl-9  col-md-9 col-sm-12 col-12">
            <div class="bg-white">
                <div class="main-profile" style="min-height: 468px;padding:15px 20px">

                    <div class="content-profile">
                        <h3>Nạp ATM</h3>
                        <hr class="lines">

                            <div class="alert alert-info" role="alert">
                                @if (setting('sys_tranfer_content') != "")
                                    {!! setting('sys_tranfer_content') !!}
                                @endif
                                <div class="transfer-code" style="justify-content: center;display: flex"></div>
                            </div>


                    <!-- END: PAGE CONTENT -->
                        <div class="recharge_atm_data">
                            @include('frontend.pages.transfer.widget.__tranfer_history')
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <input type="hidden" name="hidden_page_atm" id="hidden_page_atm" value="1" />
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/transfer/transfer.js?v={{time()}}"></script>

@endsection
