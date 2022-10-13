@extends('frontend.layouts.master')

@section('content')
<div class="row">
    <div class="left main-tintuc-left">
        <h1 class="page_title">Đăng kí tài khoản thành viên</h1>
        <div class="card card-default">
            <div class="card-body">
                 <span class="help-block" style="color: #dd4b39;text-align: center">
                    <strong></strong>
                </span>

                <form action="https://thegarenagiare.com/register" method="POST">
                    <input type="hidden" name="_token" value="KzPoBJUVTzihxXOnHoyzwsRTjhYM1SEHfEDrtE6n">

                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="username" value="" placeholder="Tài khoản"  placeholder="Tên tài khoản ít nhât 4 kí tự..">

                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fas fa-mobile-alt"></i></span>
                        <input type="text" class="form-control number" maxlength="11" name="phone" value="" placeholder="Số điện thoại" >

                    </div>

                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu" placeholder="Mật khẩu ít nhất 6 kí tự..">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu">
                    </div>

                    <div class="form-group m-form__group ">
                        <div class="m-input-icon m-input-icon--right">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-shield-alt"></i></span>
                                <input type="text" class="form-control c-square" id="captcha" name="captcha" placeholder="Mã bảo vệ" maxlength="3" autocomplete="off" required="">
                                <span class="input-group-addon" style="padding: 1px;">
                                            <img  src="https://thegarenagiare.com/captcha/flat?GcE6rhuR" height="30px" style="max-width: unset !important;height: 30px !important;" id="imgcaptcha" onclick="document.getElementById('imgcaptcha').src ='https://thegarenagiare.com/captcha/flat?WNLo2hIC'+Math.random();document.getElementById('captcha').focus();">
                                    </span>
                            </div>
                        </div>
                    </div>


                    <!-- /.col -->
                    <div class="col-xs-12 text-center mb-3">
                        <button type="submit" class="btn btn-primary" id="ctrregisterbtn"><i class="fa fa-sign-in"></i> Đăng ký tài khoản</button>
                    </div>
                    <!-- /.col -->
                </form>
            </div>

            <div class="panel-footer">

                <div class="clearfix"></div>
            </div>
        </div>
    </div>

</div>
@endsection
