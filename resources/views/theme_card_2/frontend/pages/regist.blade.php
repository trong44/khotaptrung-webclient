@extends('frontend.layouts.master')
@section('content')
<div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body box-custom text-center">
        <p class="login-box-msg">Đăng ký thành viên</p>
        <span class="help-block" style="color: #dd4b39">
                   <strong></strong>
            </span>

        <form action="https://v1.muathezing.com/register" method="POST">
            <input type="hidden" name="_token" value="53HfbbhAoG2rLACF8qXfVKeQr6Sc829N7LsrwaxC">
            <div class="form-group m-form__group">
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" class="form-control" name="username" value="" placeholder="Tài khoản"  placeholder="Tên tài khoản ít nhât 4 kí tự..">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="fas fa-user"></i></span></span>
                </div>
            </div>
            <div class="form-group m-form__group">
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" class="form-control number" maxlength="11" name="phone" value="" placeholder="Số điện thoại" >
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="fas fa-mobile-alt"></i></span></span>
                </div>
            </div>
            <div class="form-group m-form__group">
                <div class="m-input-icon m-input-icon--right">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" placeholder="Mật khẩu ít nhất 6 kí tự..">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="fas fa-lock"></i></span></span>
                </div>
            </div>
            <div class="form-group m-form__group">
                <div class="m-input-icon m-input-icon--right">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="fas fa-lock"></i></span></span>
                </div>
            </div>

            <div class="form-group m-form__group  row">

                <div class="col-md-7">
                    <div class="input-group">
                        <input type="text" class="form-control c-square" id="captcha" name="captcha" placeholder="Mã bảo vệ" maxlength="3" autocomplete="off" required="">
                        <span class="input-group-addon" style="padding: 1px;">
                            <img src="https://v1.muathezing.com/captcha/flat?TxVpUWml" height="30px" id="imgcaptcha" onclick="document.getElementById('imgcaptcha').src ='https://v1.muathezing.com/captcha/flat?pYCepuvP'+Math.random();document.getElementById('captcha').focus();">
                        </span>
                    </div>
                </div>

            </div>
            <!-- /.col -->
            <div class="col-xs-12 text-center mb-3">
                <button type="submit" style="font-family: 'Nunito', sans-serif;" class="btn btn-success">Đăng ký</button>
            </div>
            <!-- /.col -->
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
@endsection
