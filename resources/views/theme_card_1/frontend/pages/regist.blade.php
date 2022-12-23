@extends('frontend.layouts.master')

@section('content')
<div class="row">
    <div class="left main-tintuc-left">
        <h1 class="page_title">Đăng kí tài khoản thành viên</h1>
        <div class="card card-default">
            <div class="card-body">

                <form action="{{ url('/ajax/register') }}" method="POST" id="form-regist">
                    @csrf
                    <div class="regist_error text-center mt-2 mb-3"></div>
                    <div class="panel-body card-body">
                        <div class="form-group input-group">
                            <span class="input-group-addon">
                               <i class="fas fa-user"></i>
                            </span>
                            <input type="text" class="form-control" name="username" value="" placeholder="Tài khoản"  placeholder="Tên tài khoản ít nhât 4 kí tự..">
                        </div>


                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu" placeholder="Mật khẩu ít nhất 6 kí tự..">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu">
                        </div>
                        <div class="text-form text-center">
                            <p>----  Hoặc  ----</p>
                        </div>
                        <div class="form-group m-form__group text-center">
                            <a style="" href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}" class=""><i class="fab fa-facebook-square" style="font-size: 33px"></i></a>
                        </div>
                    </div>


                    <!-- /.col -->
                    <div class="col-xs-12 text-center mb-3">
                        <button type="submit" class="btn btn-primary" id="ctrregisterbtn">
                            <i class="fa fa-sign-in"></i> Đăng ký tài khoản
                        </button>
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
<script>

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
                    formSubmit.find('.regist_error').html('<strong style="color: red">'+data.message+'</strong>');

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
