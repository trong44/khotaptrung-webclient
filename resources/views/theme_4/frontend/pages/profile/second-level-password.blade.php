@extends('frontend.layouts.master')
@section('content')

<section>
    <div class="container">




        <div class="row user-manager">

            @include('frontend.pages.widget.__menu_profile')

            <div class="col-12 col-md-8 col-lg-9 site-form " style="min-height: 212.568px;">

                <div class="menu-content">
                    <div class="title">
                        <h3>Đổi mật khẩu cấp 2</h3>
                    </div>
                    <div class="wapper profile">









                        <form method="POST" action="https://napgamegiare.net/user/update-password2" accept-charset="UTF-8" class="form-horizontal form-charge"><input name="_token" type="hidden" value="1d1UtKProIOHCYvd7GjOQ1mwzvuWei6FP3awwoKP">

                            <p style="text-align: center">Cập nhật mật khẩu cấp 2 cho lần đầu tiên <span
                                    style="color:red">(*)</span></p>



                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Mật khẩu cấp 2 mới:</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <input class="form-control c-square c-theme " name="password2" type="password"
                                           maxlength="32"
                                           required placeholder="Mật khẩu cấp 2 mới">
                                </div>
                            </div>

                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Xác nhận:</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <input class="form-control c-square c-theme " name="password_confirmation2"
                                           type="password"
                                           maxlength="32"
                                           required placeholder="Mật khẩu cấp 2 mới">
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
                                    <span class="input-group-text" style="padding: 3px;background: none"><img
                                            src="/captcha/flat?eb9AEN8C" height="30px" id="imgcaptcha"
                                            onclick="document.getElementById('imgcaptcha').src ='/captcha/flat?EhjAauu9'+Math.random();document.getElementById('captcha').focus();"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="mb-4 text-center">
                                <button class="btn-submit" type="submit">Cập nhật</button>
                            </div>


                        </form>





                    </div>
                </div>
            </div>
        </div>


    </div><!-- /.container -->
</section>

@endsection
