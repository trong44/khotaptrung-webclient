@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')

<section>
    <div class="container">
        <div class="row user-manager">
            @include('frontend.widget.__menu_profile')

            <div class="col-12 col-md-8 col-lg-9  site-form " style="min-height: 212.568px;">
                <div class="menu-content" style="padding-bottom: 16px">
                    <div class="title">
                        <h3>NẠP VÍ / ATM</h3>
                    </div>
                    <div class="wapper profile">
                        <div class="alert alert-info " role="alert" style="margin-bottom: 40px">
                            @if (setting('sys_tranfer_content') != "")
                                {!! setting('sys_tranfer_content') !!}
                            @endif
                            <div class="transfer-code" style="justify-content: space-between;display: flex">

                            </div>
                        </div>
                    </div>
                    <div class="recharge_atm_data position-relative" id="recharge_atm_data" >
                        <div class="body-box-loadding result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
                            <div class="d-flex justify-content-center">
                                <span class="pulser"></span>
                            </div>
                        </div>
                        @include('frontend.pages.transfer.widget.__tranfer_history')
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</section>

<input type="hidden" name="hidden_page_atm" id="hidden_page_atm" value="1" />
<script src="/assets/frontend/theme_4/js/transfer/transfer.js?v={{time()}}"></script>


@endsection
