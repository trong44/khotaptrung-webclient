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
                            <h3>Nạp thẻ</h3>
                            <hr class="lines">
                            @if (setting('sys_charge_content') != "")

                                    {!! setting('sys_charge_content') !!}


                            @endif
                            <div class="wapper profile">
                                <form action="{{route('postTelecomDepositAuto')}}" method="POST"  id="form-charge2"  class="recharge_card_pay" name="recharge-card-form">
                                    @csrf

                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-3 col-form-label">Loại thẻ:</label>
                                        <div class="col-9">
                                            <select class="form-control m-input " name="type" id="telecom" required="">
{{--                                                <option value="">-- Chọn loại thẻ --</option>--}}
                                                @if(isset($data) && $data !== null)
                                                    @foreach($data as $val)
                                                        <option value="{{$val->key}}">{{$val->title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-3 col-form-label">Mệnh giá:</label>
                                        <div class="col-9">
                                            <select class="form-control m-input " name="amount" id="amount" required="">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-3 col-form-label">Mã số thẻ:</label>
                                        <div class="col-9">
                                            <input class="form-control m-input refresh" name="pin" type="text" value="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-3 col-form-label">Số Serial:</label>
                                        <div class="col-9">
                                            <input class="form-control m-input refresh" name="serial" type="text" value="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-3 col-form-label">Mã bảo vệ:</label>
                                        <div class="col-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control m-input refresh" id="captcha" name="captcha" placeholder="Mã bảo vệ" maxlength="3" autocomplete="off" required="">
                                                <div style=" border: 1px solid #ced4da;height: 40px;display:flex">
                                                    <div class="captcha_1">
                                                      <span class="reload h-100 d-flex">
                                                        {!! captcha_img('flat') !!}
                                                      </span>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn reload"  id="reload_1" style="border-radius: 0;color: red;border: 1px solid #ced4da;height: 40px;background-color: white" >
                                                    &#x21bb;
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group text-center">
                                        <button style="width:100%" type="submit" class="btn btn-recharge_card btn-success " data-loading-text="<i class='fa fa-spinner fa-spin '></i>">
                                            NẠP THẺ
                                        </button>
                                    </div>
                                </form>

                            </div>


                            <!-- END: PAGE CONTENT -->
                            <div class="paycartdata m-portlet__body card-table" >
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
    </div>
    <input type="hidden" name="hidden_page_ls" id="hidden_page_service_nt" class="hidden_page_service_nt" value="1" />
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/charge/charge.js?v={{time()}}"></script>

@endsection
