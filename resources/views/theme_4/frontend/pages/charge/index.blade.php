@extends('frontend.layouts.master')
{{--@push('js')--}}
{{--@endpush--}}
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
<section>
    <div class="container">

        <div class="row user-manager">

            @include('frontend.widget.__menu_profile')

            <div class="col-12 col-md-8 col-lg-9  site-form " style="min-height: 212.568px;">
                <div class="menu-content">
                    <div class="title">
                        <h3>Nạp thẻ</h3>
                    </div>


                    <div class="wapper profile">
                        @if (setting('sys_charge_content') != "")
                            <div class="alert alert-info " role="alert" style="margin-bottom: 40px">
                                {!! setting('sys_charge_content') !!}

                            </div>
                        @endif
                        <div id="charge-result">

                        </div>

                        <form action="{{route('postTelecomDepositAuto')}}" method="POST"  class="form-horizontal form-charge" id="form-charge">
                            @csrf
                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Loại thẻ:</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <select class="form-control  c-square c-theme" id="telecom" name="type">
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Mệnh giá:</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <select class="form-control  c-square c-theme" name="amount" id="amount" required>
                                    </select>
                                </div>
                            </div>


                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Mã số thẻ:</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <input class="form-control  c-square c-theme " name="pin" type="text" maxlength="16"
                                           required placeholder="">
                                </div>
                            </div>

                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Số serial:</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <input class="form-control c-square c-theme " name="serial" type="text" maxlength="16"
                                           placeholder="">
                                </div>
                            </div>

                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Mã bảo vệ (*):</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">

                                    <div class="input-group mb-3">

                                        <input type="text" class="form-control m-input refresh" id="captcha" name="captcha"
                                               placeholder="Mã bảo vệ" maxlength="3" autocomplete="off" required="">
                                        <div class="input-group-append">
                                            <div style="    border: 1px solid #ced4da;display:flex">
                                                <div class="captcha_1">
                                                  <span class="reload">
                {{--                                      <img src="{{captcha_src('flat')}}" onclick="document.getElementById('captchaCode').src = {{captcha_src('flat')}}+Math.random();document.getElementById('captcha').focus();" id="captchaCode" alt="" class="captcha">--}}

                                                      {!! captcha_img('flat') !!}
                                                  </span>

                                                </div>

                                            </div>

                                            <button type="button" class="btn reload"  id="reload_1" style="border-radius: 4px;color: red;background-color: transparent" >
                                                &#x21bb;
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="mb-4 text-center">
                                <button class="btn-submit" type="submit" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing Order">Cập nhật
                                </button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container -->
</section>
<script src="/assets/frontend/theme_4/js/charge/charge.js?v={{time()}}"></script>

<script>
    $(".form-charge").submit(function () {
        var loadingText = '<i class="fas fa-circle-notch fa-spin"></i> Đang xử lý...';
        $('.btn-submit').html(loadingText).prop('disabled', false);
        $('.btn-submit').attr("disabled", true);

    });
</script>


{{--<script>--}}
{{--    GetAmount();--}}
{{--    $("#type").on('change', function () {--}}

{{--        GetAmount();--}}

{{--    });--}}

{{--    function GetAmount() {--}}

{{--        var telecom_key = $("#type").val();--}}


{{--        var getamount = $.get("/nap-the/get-auto-amount?telecom_key=" + telecom_key, function (data, status) {--}}

{{--            $("#amount").find('option').remove();--}}
{{--            $("#amount").html(data).val($("#amount option:first").val());--}}
{{--            ;--}}

{{--        }).done(function () {--}}

{{--        }).fail(function () {--}}

{{--            alert("Không tìm thấy mệnh giá phù hợp");--}}
{{--        })--}}
{{--    }--}}
{{--</script>--}}
@endsection




