@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
<div class="login-box">

    <!-- /.login-logo -->
    <div class="login-box-body box-custom text-center">
        <p class="login-box-msg">Đăng ký thành viên</p>
        <form action="{{ url('/ajax/register') }}" method="POST" id="form-regist">
            @csrf
            <div class="regist_error text-center  mb-3"></div>
            <div class="form-group m-form__group">
                <div class="m-input-icon m-input-icon--right">
                    <input type="text" class="form-control" name="username" value="" placeholder="Tài khoản"  placeholder="Tên tài khoản ít nhât 4 kí tự..">
                    <span class="m-input-icon__icon m-input-icon__icon--right"><span><i class="fas fa-user"></i></span></span>
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

            <!-- /.col -->
            <div class="col-xs-12 text-center mb-3">
                <button type="submit" style="font-family: 'Nunito', sans-serif;" class="btn btn-success">Đăng ký</button>
            </div>
            <!-- /.col -->
        </form>
    </div>
    <!-- /.login-box-body -->
</div><script>

    $('#form-regist').submit(function (e) {

        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');

        var loadingText = '<i class="fas fa-circle-notch fa-spin"></i> Đang xử lý...';
        btnSubmit.html(loadingText).prop('disabled', false);
        btnSubmit.attr("disabled", true);
        $.ajax({
            type: "POST",
            url: url,
            cache:false,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {
            },
            success: function (data) {

                if(data.status == 1){

                    window.location.href = data.return_url;
                }   else{
                    formSubmit.find('.regist_error').html('<strong style="color: #dd4b39">'+data.message+'</strong>');

                }
                btnSubmit.prop('disabled',false);
                btnSubmit.text('Đăng ký tài khoản');
            },
            error: function (data) {
                alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                btnSubmit.text('Đăng nhập');
            },
            complete: function (data) {
                btnSubmit.prop('disabled', false);
                btnSubmit.text('Đăng ký tài khoản');
            }
        });
    });
</script>
@endsection
