
@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@push('style')
@endpush
@push('js')
    <script src="/assets/frontend/theme_1/js/charge/charge.js?v={{time()}}"></script>
@endpush

@section('content')
    <div class="account">
        <div class="account_content">
            <div class="container">
                @include('frontend.layouts.includes.menu_profile')
                <div class="account_sidebar_content">
                    <div class="account_pay_card">
                        <div class="account_sidebar_content_title">
                            <p>NẠP THẺ</p>
                            <div class="account_sidebar_content_line"></div>
                        </div>
                        @if (setting('sys_charge_content') != "")
                            <div class="alert alert-primary" role="alert">
                                {!! setting('sys_charge_content') !!}

                            </div>
                        @endif
{{--                        <div class="row justify-content-center" id="loading-data">--}}
{{--                            <div class="loading"></div>--}}
{{--                        </div>--}}
                        <div class="col-auto pl-0 pr-0 " id="form-content">
                            <form action="{{route('postTelecomDepositAuto')}}" method="POST" class="form-charge" id="form-charge2">
                                @csrf

                                <div class="form-group row ">
                                    <label class="col-md-3 control-label">
                                        Loại thẻ:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group" style="width: 100%">
                                            <select id="telecom" name="type" class="form-control">
                                                @foreach($data as $val)
                                                    <option value="{{$val->key}}">{{$val->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">
                                        Mệnh giá:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group" style="width: 100%">
                                            <select name="amount" id="amount" class="form-control">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">
                                        Mã số thẻ:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group" style="width: 100%">
                                            <input type="text" class="form-control" name="pin" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">
                                        Số Serial:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group" style="width: 100%">
                                            <input type="text" class="form-control"  name="serial" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">
                                        Mã bảo vệ:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group" style="width: 100%">
                                            <input type="text" class="form-control" name="captcha" id="captcha"  required>
                                            <div style="    border: 1px solid #ced4da;height: 38px;display:flex">
                                                <div class="captcha_1">
                                                  <span class="reload h-100 d-flex">
                {{--                                      <img src="{{captcha_src('flat')}}" onclick="document.getElementById('captchaCode').src = {{captcha_src('flat')}}+Math.random();document.getElementById('captcha').focus();" id="captchaCode" alt="" class="captcha">--}}

                                                            {!! captcha_img('flat') !!}
                                                  </span>

                                                </div>

                                            </div>
{{--                                            <button type="button" class="btn reload"  id="reload_1" style="border-radius: 4px;color: red" onclick="document.getElementById('captchaCode').src= {{captcha_src('flat')}}+Math.random()">--}}
{{--                                                &#x21bb;--}}
{{--                                            </button>--}}
                                            <button type="button" class="btn reload"  id="reload_1" style="border-radius: 4px;color: red" >
                                                &#x21bb;
                                            </button>

                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row " style="margin: 20px 0">
                                    <div class="col-md-6" style="    margin-left: 25%;">
                                        <button class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block " type="submit">Nạp thẻ</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="paycartdata">
                        <div class="position-relative"  style="min-height: 200px" >
                            <table class="table table-hover table-custom-res">
                                <thead><tr><th>Thời gian</th><th>Nhà mạng</th><th>Mã thẻ</th><th>Serial</th><th>Mệnh giá</th><th>Kết quả</th><th>Thực nhận</th></tr></thead>

                                <tbody>
                                    <div class="row justify-content-center position-absolute" style="top: 50%;left: 50%" id="loading-data">
                                        <div class="loading"></div>
                                    </div>
                                </tbody>
                            </table>
                        </div>
{{--                        @include('frontend.pages.charge.widget.__charge_history')--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="hidden_page_ls" id="hidden_page_service_nt" class="hidden_page_service_nt" value="1" />
@endsection
