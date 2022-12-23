@if(!App\Library\AuthCustom::check())
<!-- Modal -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-1"></div>
                <div class="col-10 text-center"><h6 class="modal-title">Đăng nhập</h6></div>
                <div class="col-1 ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <form id="formLogin"  class="formLogin" action="{{ url('/ajax/login') }}" method="POST">
                    @csrf
                    <div class=" text-center">
                        <div class="my-4 text-center">
                            <b class="text-danger"></b>
                            <span class="help-block text-danger notify-error login-error">
                                   <strong></strong>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Tài khoản hoặc email</label>
                        <input type="text" class="form-control"
                               placeholder="Tài khoản hoặc email" name="username">
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" id="password" class="form-control" autocomplete="off"
                               placeholder="Nhập mật khẩu" name="password">
                    </div>

{{--                    <div class="form-row form-group">--}}
{{--                        <div class="col-6">--}}
{{--                            <label class="form-check-label">--}}
{{--                                <input class="" type="checkbox" name="remember"> Ghi nhớ--}}
{{--                            </label>--}}

{{--                        </div>--}}
{{--                        <div class="col-6 text-right">--}}
{{--                            <a class="btn-a-forgot text-right" href="#" style="color:#007bff;">Bạn quên mật khẩu?</a>--}}
{{--                        </div>--}}

{{--                    </div>--}}


                    <button type="submit" class="btn btn-primary btn-block"><span
                            class="glyphicon glyphicon-off"></span> Đăng nhập
                    </button>
                    <div class="checkbox icheck" style="margin-top: 8px">
                        <label >
                            <input type="checkbox" name="remember_token" value="1">
                            <span style="margin-left: 4px;cursor: pointer">Ghi nhớ</span>
                        </label>
                    </div>

                    <div class="modal-bottom" style="margin-top: 15px">
                        <p class="text-center">

                            <a href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}" class="btn  btn-social btn-facebook btn-flat d-inline-block" style="margin-bottom:5px"><img
                                    src="/assets/frontend/{{theme('')->theme_key}}/image/facebook-icon.png" alt="" width="32px" height="32px">
                            </a>
                        </p>
                        <p class="text-center">
                            Bạn chưa có tài khoản. <a class="btn-a-register" href="#" data-dismiss="modal"
                                                      data-toggle="modal" data-target="#modal-register"
                                                      style="color:#007bff">Đăng kí ngay !</a>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-1"></div>
                <div class="col-10 text-center"><h6 class="modal-title">Đăng ký</h6></div>
                <div class="col-1 ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <div class="modal-body">
                <form id="formRegister" action="{{ url('/ajax/register') }}" method="POST">
                    @csrf
                    <div class=" text-center">
                        <div class="my-4 text-center">
                            <b class="text-danger"></b>
                            <span class="help-block text-danger notify-error register-error">
                                   <strong></strong>
                            </span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Tài khoản <span style="color: red">(*)</span></label>

                        <input type="text" class="form-control" autocomplete="off" placeholder="Tài khoản"
                               value="" name="username" required>
                    </div>


                    <div class="form-row">

                        <div class="form-group col-md-6 ">
                            <label>Mật khẩu <span style="color: red">(*)</span></label>
                            <input type="password" class="form-control" autocomplete="off" placeholder="Mật khẩu"
                                   value="" name="password" required>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>Xác nhân mật khẩu <span style="color: red">(*)</span></label>
                            <input type="password" class="form-control" autocomplete="off"
                                   placeholder="Xác nhận mật khẩu" name="password_confirmation" required>
                        </div>
                    </div>

{{--                    <div class="form-group">--}}
{{--                        <label>Email <span style="color: red">(*)</span></label>--}}
{{--                        <input type="email" class="form-control" autocomplete="off"--}}
{{--                               value="" placeholder="Email" name="email">--}}

{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Số điện thoại <span style="color: red">(*)</span></label>--}}
{{--                        <input type="text" class="form-control" autocomplete="off"--}}
{{--                               value="" placeholder="Số điện thoại" maxlength="11"--}}
{{--                               name="phone">--}}
{{--                    </div>--}}


                    <button type="submit" class="btn btn-primary btn-block"><span
                            class="glyphicon glyphicon-off"></span> Đăng ký
                    </button>


                    <div class="modal-bottom">
                        <p class="text-center" style="margin-top: 15px">
                            Đã có tài khoản. <a class="btn-a-login" href="#" data-dismiss="modal" data-toggle="modal"
                                                data-target="#modal-login" style="color:#007bff">Đăng nhập tại đây !</a>
                        </p>
                    </div>


                </form>
            </div>

        </div>
    </div>
</div>
@endif
{{--Đăng nhập--}}
<script>
    $('.formLogin').submit(function (e) {

        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        let url2 = new URL(window.location.href);
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
                        if (data.return_url == null || data.return_url == '' || data.return_url == undefined){
                            window.location.reload();

                        }else{
                            window.location.href = data.return_url;
                        }
                    }else {
                        window.location.href = return_url;

                    }

                }else{
                    $('.login-error').html('<strong>'+data.message+'</strong>')

                }

            },
            error: function (data) {
                alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                btnSubmit.text('Đăng nhập');
            },
            complete: function (data) {

            }
        });
    });
</script>
{{--Đăng ký--}}

<script>
    $('#formRegister').submit(function (e) {
        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        let url2 = new URL(window.location.href);
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
                        if (data.return_url == null || data.return_url == '' || data.return_url == undefined){
                            window.location.reload();

                        }else{
                            window.location.href = data.return_url;
                        }
                    }else {
                        window.location.href = return_url;

                    }

                }else{
                    $('.register-error').html('<strong>'+data.message+'</strong>' )

                }

            },
            error: function (data) {
                alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                btnSubmit.text('Đăng ký');
            },
            complete: function (data) {

            }
        });
    });
</script>
{{--<script>--}}

{{--    $(".noty-pass .checkbox label").click(function () {--}}
{{--        alert();--}}
{{--        if ($("#check-pass").prop("checked") == false) {--}}
{{--            $("#check-pass").prop({checked: true});--}}
{{--            $("input#password").attr("type", "text");--}}
{{--        } else {--}}
{{--            $("#check-pass").prop({checked: false});--}}
{{--            $("input#password").attr("type", "password");--}}
{{--        }--}}
{{--    });--}}
{{--    $('.modal-auth').css('padding-left', 0)--}}


{{--    $(document).ready(function () {--}}


{{--        $('#modal-register').on('show.bs.modal', function () {--}}

{{--            $('.panel-register').show();--}}
{{--            $('.panel-register-success').hide();--}}
{{--        });--}}

{{--        $('#formRegister').submit(function (e) {--}}
{{--            e.preventDefault();--}}
{{--            var formSubmit = $(this);--}}
{{--            var url = formSubmit.attr('action');--}}
{{--            var btnSubmit = formSubmit.find(':submit');--}}
{{--            btnSubmit.text('Đang xử lý...');--}}
{{--            btnSubmit.prop('disabled', true);--}}

{{--            $.ajax({--}}
{{--                type: "POST",--}}
{{--                url: url,--}}
{{--                data: formSubmit.serialize(), // serializes the form's elements.--}}
{{--                beforeSend: function (xhr) {--}}

{{--                },--}}
{{--                success: function (response) {--}}
{{--                    if (response.success) {--}}
{{--                        formSubmit.find('.notify-error').text(response.message);--}}
{{--                        setTimeout(location.reload.bind(location), 1000);--}}

{{--                    }--}}
{{--                },--}}
{{--                error: function (response) {--}}
{{--                    if (response.status === 422 || response.status === 429) {--}}
{{--                        let errors = response.responseJSON.errors;--}}

{{--                        jQuery.each(errors, function (index, itemData) {--}}
{{--                            console.log(itemData);--}}
{{--                            formSubmit.find('.notify-error').text('');--}}
{{--                            formSubmit.find('.notify-error').text(itemData[0]);--}}
{{--                            return false; // breaks--}}
{{--                        });--}}
{{--                    } else {--}}
{{--                        alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');--}}

{{--                    }--}}
{{--                },--}}
{{--                complete: function (data) {--}}
{{--                    btnSubmit.text('Đăng ký');--}}
{{--                    btnSubmit.prop('disabled', false);--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}
{{--        //login--}}
{{--        $('#formLogin').submit(function (e) {--}}

{{--            e.preventDefault();--}}

{{--            var formSubmit = $(this);--}}
{{--            var url = formSubmit.attr('action');--}}
{{--            var btnSubmit = formSubmit.find(':submit');--}}
{{--            btnSubmit.text('Đang xử lý...');--}}
{{--            btnSubmit.prop('disabled', true);--}}

{{--            $.ajax({--}}
{{--                type: "POST",--}}
{{--                url: url,--}}
{{--                data: formSubmit.serialize(), // serializes the form's elements.--}}
{{--                beforeSend: function (xhr) {--}}

{{--                },--}}
{{--                success: function (response) {--}}
{{--                    if (response.success) {--}}
{{--                        window.location.reload();--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (response) {--}}
{{--                    if (response.status === 422 || response.status === 429) {--}}
{{--                        let errors = response.responseJSON.errors;--}}

{{--                        jQuery.each(errors, function (index, itemData) {--}}
{{--                            formSubmit.find('.notify-error').text('');--}}
{{--                            formSubmit.find('.notify-error').text(itemData[0]);--}}
{{--                            formSubmit.find('#password').text('');--}}
{{--                            return false; // breaks--}}
{{--                        });--}}
{{--                    } else {--}}
{{--                        alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');--}}

{{--                    }--}}
{{--                },--}}
{{--                complete: function (data) {--}}
{{--                    btnSubmit.text('Đăng nhập');--}}
{{--                    btnSubmit.prop('disabled', false);--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}

{{--        //login--}}
{{--        $('#formForgot').submit(function (e) {--}}


{{--            e.preventDefault();--}}

{{--            var formSubmit = $(this);--}}
{{--            var url = formSubmit.attr('action');--}}
{{--            var btnSubmit = formSubmit.find(':submit');--}}
{{--            btnSubmit.text('Đang xử lý...');--}}
{{--            btnSubmit.prop('disabled', true);--}}

{{--            $.ajax({--}}
{{--                type: "POST",--}}
{{--                url: url,--}}
{{--                data: formSubmit.serialize(), // serializes the form's elements.--}}
{{--                beforeSend: function (xhr) {--}}

{{--                },--}}
{{--                success: function (response) {--}}
{{--                    if (response.success) {--}}
{{--                        formSubmit.find('.notify-success').text(response.message);--}}
{{--                    } else {--}}
{{--                        formSubmit.find('.notify-error').text(response.message);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function (response) {--}}
{{--                    if (response.status === 422 || response.status === 429) {--}}
{{--                        let errors = response.responseJSON.errors;--}}

{{--                        jQuery.each(errors, function (index, itemData) {--}}

{{--                            formSubmit.find('.notify-error').text('');--}}
{{--                            formSubmit.find('.notify-error').text(itemData[0]);--}}
{{--                            return false; // breaks--}}
{{--                        });--}}
{{--                    } else {--}}
{{--                        formSubmit.find('.notify-error').text('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');--}}
{{--                    }--}}
{{--                },--}}
{{--                complete: function (data) {--}}
{{--                    btnSubmit.text('Xác nhận');--}}
{{--                    btnSubmit.prop('disabled', false);--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}
{{--    });--}}
{{--</script>--}}
