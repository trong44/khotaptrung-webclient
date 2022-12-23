@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <div id="profile" style="margin-top: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                    @include('frontend.layouts.includes.menu_profile')
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="main-profile" style="min-height: 296px;">
                        <div class="content-profile">
                            <h3>Nạp ATM</h3>
                            <hr class="lines">
                            <div class="wapper profile">
                                @if (setting('sys_tranfer_content') != "")
                                    {!! setting('sys_tranfer_content') !!}
                                @endif
                                <div class="transfer-code" style="justify-content: center;display: flex"></div>
                            </div>


                            <!-- END: PAGE CONTENT -->
{{--                            <div class="recharge_atm_data">--}}
{{--                                @include('frontend.pages.transfer.widget.__tranfer_history')--}}
{{--                            </div>--}}
                            <!-- END: PAGE CONTENT -->
                            <div class="recharge_atm_data m-portlet__body card-table" >
                                <div class="position-relative"  style="min-height: 200px" >
                                    <table class="table table-hover table-custom-res table-striped">
                                        <thead>
                                            <tr>
                                                <th>Thời gian</th>
                                                <th>Số tiền</th>
                                                <th>Thực nhận</th>
                                                <th>Trạng thái</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                        <div class="row justify-content-center position-absolute" style="top: 50%;left: 50%" id="loading-data">
                                            {{--                                    <div class="loading"></div>--}}
                                            <div class="loading-wrap mb-3">
                                                <span class="modal-loader-spin mb-3"></span>
                                            </div>
                                        </div>
                                        </tbody>
                                    </table>
                                </div>
                                {{--                                                @include('frontend.pages.charge.widget.__charge_history')--}}
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="hidden_page_atm" id="hidden_page_atm" value="1" />
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/transfer/transfer.js?v={{time()}}"></script>

@endsection
