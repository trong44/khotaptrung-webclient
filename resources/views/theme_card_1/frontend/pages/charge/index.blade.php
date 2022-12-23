@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
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
                    <h3>Nạp thẻ</h3>
                    <hr class="lines">
                    <p style="text-align: center;color: red">*Chú ý: Nạp thẻ sai mệnh giá mất 100% giá trị thẻ</p>


                    <form action="{{route('postTelecomDepositAuto')}}" method="POST"  id="form-charge2"  class="form-horizontal form-charge">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-right font-weight-bold my-auto">Loại thẻ:</label>
                            <div class="col-md-6">
                                <select class="form-control  c-square c-theme" name="type" id="telecom">
                                    @if(isset($data) && $data !== null)
                                        @foreach($data as $val)
                                            <option value="{{$val->key}}">{{$val->title}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-right font-weight-bold my-auto">Mệnh giá:</label>
                            <div class="col-md-6">
                                <select class="form-control  c-square c-theme" name="amount" id="amount" required>
                                </select>
                                <!--<select class="form-control  c-square c-theme" name="amount" id="amount" required>
                                    <option value="">-- Chọn mệnh giá --</option>
                                    <option  value="10000">10,000 VNĐ</option>
                                    <option  value="20000">20,000 VNĐ</option>
                                    <option  value="30000">30,000 VNĐ</option>
                                    <option  value="50000">50,000 VNĐ</option>
                                    <option  value="100000">100,000 VNĐ</option>
                                    <option  value="200000">200,000 VNĐ</option>
                                    <option  value="300000">300,000 VNĐ</option>
                                    <option  value="500000">500,000 VNĐ</option>
                                    <option  value="1000000">1,000,000 VNĐ</option>
                                    <option  value="2000000">2,000,000 VNĐ</option>
                                    <option  value="5000000">5,000,000 VNĐ</option>
                                </select>-->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label text-right font-weight-bold my-auto">Mã số thẻ:</label>
                            <div class="col-md-6">
                                <input class="form-control  c-square c-theme " name="pin" type="text" maxlength="16"  placeholder=""  autofocus="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-right font-weight-bold my-auto">Số serial:</label>
                            <div class="col-md-6">
                                <input class="form-control c-square c-theme " name="serial" type="text" maxlength="16" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-right font-weight-bold my-auto">Mã bảo vệ (*):</label>
                            <div class="col-md-6">
                                <div class="input-group">

                                    <input type="text" class="form-control c-square" id="captcha" name="captcha" placeholder="Mã bảo vệ" maxlength="3" autocomplete="off" required="">
                                    <div style="    border: 1px solid #ced4da;height: 34px;display:flex">
                                        <div class="captcha_1">
                                          <span class="reload h-100 d-flex">

                                              {!! captcha_img('flat') !!}</span>

                                        </div>

                                    </div>
                                    <button type="button" class="btn reload"  id="reload_1" style="border-radius: 0;color: red;border: 1px solid #ced4da;height: 34px" >
                                        &#x21bb;
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="form-group c-margin-t-40 row">
                            <div class="col-md-3"></div>
                            <div class=" col-md-6">
                                <button type="submit" class="btn btn-success btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block" data-loading-text="<i class='fa fa-spinner fa-spin '></i>">
                                    Nạp thẻ
                                </button>

                            </div>
                        </div>
                    </form>
                    @if (setting('sys_charge_content') != "")
                        <div class="alert alert-info" role="alert">
                            {!! setting('sys_charge_content') !!}

                        </div>
                    @endif
                    <!-- END: PAGE CONTENT -->
                    <div class="paycartdata">
                        <div class="position-relative"  style="min-height: 200px" >
                            <table class="table table-hover table-custom-res table-striped">
                                <thead><tr><th>Thời gian</th><th>Nhà mạng</th><th>Mã thẻ</th><th>Serial</th><th>Mệnh giá</th><th>Kết quả</th><th>Thực nhận</th></tr></thead>

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

<input type="hidden" name="hidden_page_ls" id="hidden_page_service_nt" class="hidden_page_service_nt" value="1" />
<script src="/assets/frontend/{{theme('')->theme_key}}/js/charge/charge.js?v={{time()}}"></script>

@endsection
