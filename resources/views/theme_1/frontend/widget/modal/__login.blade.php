@if(!App\Library\AuthCustom::check())
<!-- Modal -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-1"></div>
                <div class="col-10 text-center">
                    <h6 class="modal-title">Đăng nhập</h6>
                </div>
                <div class="col-1 ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="log-in container" >
                    <div class="log-in-body">
                        <form action="{{ url('/ajax/login') }}" method="POST" id="form-login-modal">
                            <div class="login_error">

                            </div>
                            @csrf
                            <div class="form-login">
                                <label>Tài khoản</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tài khoản" name="username" required>
                                    <span><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Mật khẩu</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
                                    <span><i class="fas fa-lock"></i></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="">Quên mật khẩu</a>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary btn-block btn-flat pt-" type="submit">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                        <div class="social-auth">
                            <p>- HOẶC -</p>
                            <a class="btn  btn-social btn-facebook btn-flat d-inline-block" href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}"><i class="fab fa-facebook"></i> Login FB</a>
                            <a class="btn  btn-google btn-facebook btn-flat d-inline-block" href="/register"><i class="fas fa-key"></i> Đăng ký tài khoản</a>

                        </div>


                    </div>
                </div>
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
                <form id="formRegister-modal" action="{{ url('/ajax/register') }}" method="POST">
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
    $('html').on('click','.open-modal-login',function (e) {
        e.preventDefault();
        $('#modal-login').modal('show');
    });

    $('#form-login-modal').on('submit',function (e) {

        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        btnSubmit.prop('disabled',true);
        btnSubmit.text('Đang xử lí...');
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

                }   else{
                    formSubmit.find('.login_error').html('<strong style="color: red">'+data.message+'</strong>');

                }
                btnSubmit.prop('disabled',false);
                btnSubmit.text('Đăng nhập');
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
    $('#formRegister-modal').submit(function (e) {
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
