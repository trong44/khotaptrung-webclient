@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <div class="row my-3" >
        <div class="col-lg-3  col-sm-3 col-md-3 col-12">
            @include('frontend.layouts.includes.menu_profile')
        </div>
        <div class="col-xl-9  col-md-9 col-sm-12 col-12">
        <div class="bg-white">
            <div class="main-profile" style="min-height: 468px;padding:15px 20px">
                <div class="content-profile">
                    <h3>Đổi mật khẩu</h3>
                    <hr class="lines">
                    <form method="POST" action="{{route('changePasswordApi')}}"  class="form-horizontal form-charge" id="form-changePassword">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-right "><b>Mật khẩu cũ:</b></label>
                            <div class="col-md-6">
                                <input class="form-control c-square c-theme " name="old_password" type="password" maxlength="32" required placeholder="Mật khẩu hiện tại">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label text-right"><b>Mật khẩu mới:</b></label>
                            <div class="col-md-6">
                                <input class="form-control c-square c-theme " name="password" type="password" maxlength="32" required placeholder="Mật khẩu mới">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-right"><b>Xác nhận:</b></label>
                            <div class="col-md-6">
                                <input class="form-control c-square c-theme " name="password_confirmation" type="password" maxlength="32" required placeholder="Xác nhận mật khẩu mới">
                            </div>
                        </div>
                        <div class="form-group c-margin-t-40 row">
                            <div class="col-md-3 "></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block" data-loading-text="<i class='fa fa-spinner fa-spin '></i>">
                                    Đổi mật khẩu
                                </button>
                            </div>
                        </div>
                    </form>
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
                            swal({
                                title: "Đổi mật khẩu thành công !",
                                text: data.message,
                                icon: "success",
                            })
                        }else{
                            swal({
                                title: "Đổi mật khẩu thất bại !",
                                text: data.message,
                                icon: "error",
                                buttons: {
                                    cancel: "Đóng",
                                },
                            })
                        }

                    },
                    error: function (data) {
                        alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                        btnSubmit.prop('disabled',false);
                        btnSubmit.text('Đăng nhập');
                        formSubmit.trigger("reset");

                    },
                    complete: function (data) {
                        $('.changepassword_error').html()
                        btnSubmit.prop('disabled',false);
                        btnSubmit.text('Đổi mật khẩu');
                        formSubmit.trigger("reset");

                    }
                });
            });
        </script>
@endsection
