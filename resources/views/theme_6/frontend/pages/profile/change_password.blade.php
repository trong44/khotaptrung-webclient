
@extends('frontend.layouts.master')
@push('style')
@endpush
@push('js')

@endpush
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <div class="account">
        <div class="account_content">
            <div class="container">
                @include('frontend.layouts.includes.menu_profile')
                <div class="account_sidebar_content">
                    <div class="account_pay_card">
                        <div class="account_sidebar_content_title">
                            <p>Đổi mật khẩu</p>
                            <div class="account_sidebar_content_line"></div>
                        </div>

                        <div class="changepassword_error"></div>
                        <div class="col-auto pl-0 pr-0" id="form-content">
                            <form action="{{route('changePasswordApi')}}" method="POST" id="form-changePassword">
                                @csrf

                                <div class="form-group row ">
                                    <label class="col-md-3 control-label">
                                        Mật khẩu cũ:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group" style="width: 100%">
                                            <input type="password" class="form-control" name="old_password" placeholder="Mật khẩu cũ" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-md-3 control-label">
                                        Mật khẩu mới:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group" style="width: 100%">
                                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu mới" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-md-3 control-label">
                                        Xác nhận mật khẩu:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group" style="width: 100%">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row " style="margin-top: 40px">
                                    <div class="col-md-6" style="    margin-left: 25%;">
                                        <button class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block " type="submit">Đổi mật khẩu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $('#form-changePassword').submit(function (e) {
            e.preventDefault();
            var formSubmit = $(this);
            var url = formSubmit.attr('action');
            var btnSubmit = formSubmit.find(':submit');
            $.ajax({
                type: "POST",
                url: url,
                cache:false,
                data: formSubmit.serialize(), // serializes the form's elements.
                beforeSend: function (xhr) {
                },
                success: function (data) {

                    if(data.status == 1){
                        swal({
                            title: "Thành công !",
                            text: data.message,
                            icon: "success",
                        })
                        let html = '';
                        html +='';
                        $('.changepassword_error').html(html)
                        // window.location.href = '/';

                    }else{
                        let html = '';
                        html +='';
                        html += '<p style="color: red;text-align: center;font-size: 14px;font-weight: 600">'+ data.message +'</p>';
                        $('.changepassword_error').html(html)
                    }

                },
                error: function (data) {
                    alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                    btnSubmit.text('Đăng nhập');
                },
                complete: function (data) {
                    $('.changepassword_error').html()
                    formSubmit.trigger("reset");
                }
            });
        });
    </script>
@endsection
