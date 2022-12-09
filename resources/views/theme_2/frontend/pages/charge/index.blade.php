@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $('.item-nap-the').addClass('active')
        });
    </script>
@endpush
@section('content')
    <div class="site-content-body bg-white first last">
        <h4 class="title-style-left mb-3">Nạp tiền vào tài khoản</h4>
        <div class="row">
            <div class="col-lg-8">
                <!-- BEGIN Tabs -->
                <ul class="nav nav-qp-tabs mb-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="#" id="deposit-via-card-tab" data-bs-toggle="tab" data-bs-target="#deposit-via-card" type="button" role="tab" aria-controls="deposit via card" aria-selected="true"><span><i class="las la-receipt"></i> Nạp bằng thẻ</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#" id="deposit-tab" data-bs-toggle="tab" data-bs-target="#deposit" type="button" role="tab" aria-controls="deposit" aria-selected="true"><span><i class="las la-money-check-alt"></i> <span>Nạp ATM - Ví</span></a>
                    </li>
                </ul>
                <div class="tab-content mb-4">
                    <!-- BEGIN Tab Content Deposit -->
                    <div class="tab-pane fade show active" id="deposit-via-card" role="tabpanel" aria-labelledby="deposit-via-card-tab">
                        @if (setting('sys_charge_content') != "")
                            <div class="" role="alert">
                                {!! setting('sys_charge_content') !!}
                            </div>
                        @endif

                        <form action="{{route('postTelecomDepositAuto')}}" method="POST"  id="form-charge"class="form-horizontal form-charge">
                            @csrf
                            <div class="mb-3">
                                <h6 class="text-uppercase mb-2">I. Thông tin loại thẻ</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-1 text-secondary">Loại thẻ</label>
                                            <select class="form-select" id="telecom" name="type">


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-1 text-secondary">Mệnh giá thẻ</label>
                                            <select class="form-select" name="amount" id="amount" required></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-uppercase mb-2">II. Thông tin thẻ</h6>
                                <div class="border p-3 shadow-sm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="mb-1 text-secondary">Mã số thẻ</label>
                                                <input type="text" class="form-control" name="pin" maxlength="16"  autofocus="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="mb-1 text-secondary">Số Seri</label>
                                                <input class="form-control"  name="serial" type="text" maxlength="16" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <label class="mb-1 text-secondary">Mã bảo mật</label>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="d-flex mb-1 justify-content-between align-items-center">
                                                <div class="input-group" style="width: 100%">
                                                    <div class="captcha">
                                                      <span class="reload"  id="">
                                                        {!! captcha_img() !!}
                                                      </span>
                                                    </div>
                                                    <button type="button" class="btn reload"  id="reload_2" style="border-radius: 4px;color: red;margin-left: 4px;    font-size: 18px;">
                                                        &#x21bb;
                                                    </button>
                                                </div>
                                                <div>
                                                    <input type="text" id="capcha" name="captcha" class="form-control text-end" placeholder="#" value="" autocomplete="off" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-4">
                                <button type="submit" class="btn bg-warning-gradient ps-4 pe-4 text-white pt-2 pb-2 rounded">Nạp tiền <i class="las la-angle-double-right"></i></button>
                            </div>
                        </form>
                    </div><!-- END Tab Content Deposit -->
                    <div class="tab-pane fade" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
                        @if (setting('sys_tranfer_content') != "") {!! setting('sys_tranfer_content') !!} @endif

                        <p style="text-align:center">Nội dung thanh toán: <strong class="transfer-code">  </strong></p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- BEGIN History -->
            {{--                <div class="mb-4 p-3 bg-light rounded">--}}
            {{--                    <h6 class="text-warning mb-0"><i class="las la-clock"></i> Lịch sử nạp tiền</h6>--}}
            {{--                    <ul class="list-item-default mb-3">--}}
            {{--                        <li class="item">--}}
            {{--                            <div class="item-title"><a href="#">Nạp tiền từ tài khoản Vietcombank</a></div>--}}
            {{--                            <div class="item-meta small text-secondary">10:20 21/21/2020</div>--}}
            {{--                            <div class="icon"><i class="las la-angle-right"></i></div>--}}
            {{--                        </li>--}}
            {{--                        <li class="item">--}}
            {{--                            <div class="item-title"><a href="#">Nạp tiền từ tài khoản Vietcombank</a></div>--}}
            {{--                            <div class="item-meta small text-secondary">10:20 21/21/2020</div>--}}
            {{--                            <div class="icon"><i class="las la-angle-right"></i></div>--}}
            {{--                        </li>--}}
            {{--                        <li class="item">--}}
            {{--                            <div class="item-title"><a href="#">Nạp tiền từ tài khoản Vietcombank</a></div>--}}
            {{--                            <div class="item-meta small text-secondary">10:20 21/21/2020</div>--}}
            {{--                            <div class="icon"><i class="las la-angle-right"></i></div>--}}
            {{--                        </li>--}}
            {{--                    </ul>--}}
            {{--                    <p class="text-center mb-0"><a href="#">Xem tất cả</a></p>--}}
            {{--                </div>--}}
            <!-- BEGIN Support Block -->
                <div class="mb-4">
                    <h6 class="title-style-tab"><span><i class="las la-info-circle"></i> Hỗ trợ</span></h6>
                    <!-- BEGIN Support Item -->
                    <div class="item-block-support hotline d-flex p-2 justify-content-between align-items-center mb-2">
                        <div class="item-icon">
                            <i class="las la-phone-volume"></i>
                        </div>
                        <div class="item-content">
                            <div class="op-7 text-end">Hotline</div>
                            <a href="tel:{{setting('sys_phone')}}" class="d-block main-text text-end text-danger"><strong>{{setting('sys_phone')}}</strong></a>
                        </div>
                    </div><!-- END Support Item -->
                    <!-- BEGIN Support Item -->
                    <div class="item-block-support facebook d-flex p-2 justify-content-between align-items-center mb-2">
                        <div class="item-icon">
                            <i class="lab la-facebook-f"></i>
                        </div>
                        <div class="item-content">
                            <div class="op-7 text-end">Facebook</div>
                            <a href="{{setting('sys_fanpage')}}" class="d-block main-text text-end" target="_blank"><strong>{{\Request::server("HTTP_HOST")}}</strong></a>
                        </div>
                    </div><!-- END Support Item -->
                </div><!-- BEGIN Support Block -->
            </div>
        </div>
    </div>
    <div class="after"></div>
    <script src="/assets/frontend/theme_2/js/charge/charge.js?v={{time()}}"></script>
    <script src="/assets/frontend/theme_2/js/transfer/transfer.js?v={{time()}}"></script>

    <div id="copy"></div>
@endsection
