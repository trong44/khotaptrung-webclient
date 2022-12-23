@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('seo_head')
        @include('frontend.widget.__seo_head')
@endsection
@section('content')

    <div class="site-content-body first last bg-white p-0">
        <div class="row align-items-stretch">
            <div class="col-lg-8">
                <div class="p-4 h-100">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="col-lg-6">
                            <form action="{{ url('/ajax/login') }}" method="post" id="form-login">
                                <h5 class="title-style-left mb-3"><strong>Đăng nhập</strong></h5>
                                @csrf
                                <div class="mb-3">
                                    <label class="label mb-1">Tên tài khoản</label>
                                    <div class="input-group">
                                        <input type="text" id="login_username" name="username" class="form-control border-end-0"  value="" required>
                                        <span class="input-group-text bg-transparent border-first-0"><i class="las la-user"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="label mb-1">Mật khẩu</label>
                                    <div class="input-group">
                                        <input type="password" id="login_password" name="password" class="form-control border-end-0" placeholder="" value="" required>
                                        <span class="input-group-text bg-transparent border-first-0"><i class="las la-lock"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn bg-warning-gradient text-white d-block pt-2 pb-2 text-uppercase rounded col-12" type="submit"><strong>Đăng nhập <i class="las la-angle-double-right"></i></strong></button>
                                </div>
                                <div class="checkbox icheck">
                                    <label style="display: flex">
                                        <input type="checkbox" name="remember_token" value="1" style="display: block">
                                        <span style="margin-left: 4px;cursor: pointer">Ghi nhớ</span>
                                    </label>
                                </div>
{{--                                <p>Không nhớ mất khẩu? <a href="#" class="forgot-link" data-bs-toggle="modal" data-bs-target="#forgotModal">Lấy lại mật khẩu</a></p>--}}
                                <div class="mb-3 is-devider"><span>Hoặc đăng nhập với</span></div>

                                <div class="row g-2">
                                    <div class="col-12">
                                        <a href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}" class="btn btn-outline-primary text-primary d-block btn-login"><i class="lab la-facebook"></i> Facebook</a>
                                    </div>
{{--                                    <div class="col-6">--}}
{{--                                        <a href="#" class="btn btn-outline-danger text-danger d-block btn-login"><i class="lab la-google"></i> Google</a>--}}
{{--                                    </div>--}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>

                $('#form-login').submit(function (e) {
                    e.preventDefault();
                    var formSubmit = $(this);
                    var url = formSubmit.attr('action');
                    var btnSubmit = formSubmit.find(':submit');
                    let url2 = new URL(window.location.href);

                    var return_url = url2.searchParams.get('return_url');
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
                                if (return_url == null || return_url == '' || return_url == undefined){

                                    if (return_url == null || return_url == '' || metapath == undefined){
                                        if (data.return_url == null || data.return_url == '' || data.return_url == undefined){
                                            window.location.href = '/';
                                        }else{
                                            window.location.href = data.return_url;
                                        }


                                    }else {
                                        window.location.href = return_url;

                                    }

                                }else {
                                    window.location.href = return_url;

                                }
                            }else{
                                swal({
                                    title: "Có lỗi xảy ra !",
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
                            btnSubmit.text('Đăng nhập');
                        },
                        complete: function (data) {
                            // $('#form-login').trigger("reset");
                            btnSubmit.html('<strong>Đăng nhập <i class="las la-angle-double-right"></i></strong>').prop('disabled', false);
                            btnSubmit.attr("disabled", false);
                        }
                    });
                });
            </script>
            <div class="col-lg-4">
                <div class="p-4 bg-light h-100">
                    <form action="{{ url('/ajax/register') }}" method="POST" id="form-regist">
                        @csrf
                        <h5 class="title-style-left mb-3"><strong>Tạo tài khoản mới</strong></h5>
                        <div class="mb-3">
                            <label class="label mb-1">Tên tài khoản</label>
                            <div class="input-group">
                                <input type="text" id="username" name="username" class="form-control border-end-0" placeholder="" value="" required>
                                <span class="input-group-text bg-white border-first-0"><i class="las la-user"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="label mb-1">Mật khẩu</label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control border-end-0" placeholder="" value="" required>
                                <span class="input-group-text bg-white border-first-0"><i class="las la-lock"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="label mb-1">Nhập lại mật khẩu</label>
                            <div class="input-group">
                                <input type="password" id="password_repeat" name="password_confirmation" class="form-control border-end-0" placeholder="" value="" required>
                                <span class="input-group-text bg-white border-first-0"><i class="las la-lock"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn bg-primary-gradient text-white d-block pt-2 pb-2 text-uppercase rounded col-12" type="submit"><strong>Đăng ký ngay <i class="las la-angle-double-right"></i></strong></button>
                        </div>
                    </form>
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
            let url2 = new URL(window.location.href);
            var loadingText = '<i class="fas fa-circle-notch fa-spin"></i> Đang xử lý...';
            btnSubmit.html(loadingText).prop('disabled', false);
            btnSubmit.attr("disabled", true);
            var return_url = url2.searchParams.get('return_url');
            $.ajax({
                type: "POST",
                url: url,
                cache:false,
                data: formSubmit.serialize(), // serializes the form's elements.
                beforeSend: function (xhr) {
                },
                success: function (data) {
                    if(data.status == 1){
                        if (return_url == null || return_url == '' || return_url == undefined){

                            if (return_url == null || return_url == '' || metapath == undefined){
                                window.location.href = '/';
                            }else {
                                window.location.href = return_url;

                            }

                        }else {
                            window.location.href = return_url;

                        }

                    }else{
                        swal({
                            title: "Có lỗi xảy ra !",
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
                    btnSubmit.text('Đăng ký');
                },
                complete: function (data) {
                    btnSubmit.html('<strong>Đăng ký ngay <i class="las la-angle-double-right"></i></strong>').prop('disabled', false);
                    btnSubmit.attr("disabled", false);
                }
            });
        });
    </script>
    <div class="after"></div>
@endsection
