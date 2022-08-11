@if(!App\Library\AuthCustom::check())
<div class="modal fade" id="loginModal">
    <div class="modal-dialog modal-lg modal-dialog-centered animated">
        <div class="modal-content">
            <div class="modal-login-container" id="modal-login-container">
                <div class="modal-login-form-container sign-up-container">
                    <img class="close-login-modal" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/close_dark.svg" alt="">
                    <form class="modal-login-form formRegister" id="formRegister" action="{{route('register')}}" method="POST">
                        @csrf
                        <p>Đăng ký</p>
                        <p class="modal-login-error text-center registError" id="registError"></p>
                        {{-- <div class="social-container">
                            <a href="" class="social">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/fb_icon.svg" alt="">
                            </a>
                            <a href="" class="social">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/google_icon.svg" alt="">
                            </a>
                            <a href="" class="social">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/discord_icon.svg" alt="">
                            </a>
                        </div>
                        <span>Hoặc đăng ký bằng tài khoản</span> --}}
                        <input class="input-primary" type="text" name="username" placeholder="Nhập tên tài khoản" required>

{{--                        <input class="input-primary" type="text" name="email" placeholder="Nhập email">--}}
{{--                        <p class="modal-login-error" id="emailRegisterError"></p>--}}
{{--                        <input class="input-primary" type="text" name="phone" placeholder="Nhập số điện thoại">--}}
{{--                        <p class="modal-login-error" id="phoneRegisterError"></p>--}}
                        <div class="password-input-container">
                            <input class="input-primary" type="password" name="password" placeholder="Nhập mật khẩu của bạn" autocomplete="off" required>
                            <img class="password-input-hide" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-show.svg" alt="" style="display: none">
                            <img class="password-input-show" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-hide.svg" alt="" >
                        </div>
                        <div class="password-input-container">
                            <input class="input-primary" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu của bạn" autocomplete="off" required>
                            <img class="password-input-hide" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-show.svg" alt="" style="display: none">
                            <img class="password-input-show" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-hide.svg" alt="" >
                        </div>
{{--                        <p class="modal-login-error" id="passwordRegisterError"></p>--}}
                        <button type="submit">Đăng ký</button>
                    </form>
                </div>
                <div class="modal-login-form-container sign-in-container"   >
                    <form class="modal-login-form formLogin" action="{{route('login')}}" id="formLogin"  method="POST">
                        @csrf
                        <p>Đăng nhập</p>
                        <p class="modal-login-error text-center LoginError" id="LoginError" ></p>
                        <input class="input-primary" type="text" name="username" placeholder="Nhập tên tài khoản" autocomplete="off" required>

                        <div class="password-input-container">
                            <input class="input-primary" type="password" name="password" placeholder="Nhập mật khẩu" autocomplete="off">
                            <img class="password-input-hide" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-show.svg" alt="" style="display: none" required>
                            <img class="password-input-show" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-hide.svg" alt="" >
                        </div>
{{--                        <p class="modal-login-error" id="passwordError"></p>--}}
{{--                        <a class="modal-login-forget-password" id="span_resetPass">Quên mật khẩu?</a>--}}
                        <button type="submit">Đăng nhập</button>
                        <span>Hoặc đăng nhập qua</span>
                        <div class="social-container">
                            <a href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}" class="social">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/fb_icon.svg" alt="">
                            </a>
                        </div>
                    </form>
                </div>
                <div class="modal-login-overlay-container">
                    <div class="modal-login-overlay">
                        <div class="modal-login-overlay-panel modal-login-overlay-left" style="background-image: url('/assets/frontend/{{theme('')->theme_key}}/image/images_1/login_modal_bg.png')">
                            <p class="modal-login-suggestion">Bạn đã có tài khoản?</p>
                            <p>Đăng nhập tại đây</p>
                            <button id="signIn">Đăng nhập</button>
                        </div>
                        <div class="modal-login-overlay-panel modal-login-overlay-right" style="background-image: url('/assets/frontend/{{theme('')->theme_key}}/image/images_1/login_modal_bg.png')">
                            <img class="close-login-modal" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/close.svg" alt="">
                            <p class="modal-login-suggestion">Bạn chưa có tài khoản?</p>
                            <p>Vui lòng đăng ký ngay tại đây</p>
                            <button id="signUp">Đăng ký</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-auth">

    <section class="media-mobile">
        <div class=" banner-mobile-container-ct">
            <div class="row marginauto banner-mobile-row-ct">
                <div class="col-auto left-right box-account-mobile_open" style="width: 10%" onclick="openLoginModal()" >
                    <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" >
                </div>

                <div class="col-auto left-right banner-mobile-span text-center text-login" style="width: 80%">
                    <h3>Đăng nhập</h3>
                </div>
                <div class="col-auto left-right" style="width: 10%">
                </div>
            </div>
        </div>
    </section>
    <div class="mobile-auth-nav">
        <div class="auth-nav-option auth-nav-option-active auth-nav-login">
            Đăng nhập
        </div>
        <div class="auth-nav-option auth-nav-regist" >
            Đăng ký
        </div>
    </div>
    <div class="mobile-auth-form">
        <form class="modal-login-form formLogin" id="formLoginMobile" action="{{route('login')}}" method="POST">
            @csrf
            <p class="modal-login-error text-center LoginError" id="LoginError" ></p>
            <input class="input-primary" type="text" name="username" placeholder="Nhập tên tài khoản" autocomplete="off" required>
            <div class="password-input-container">
                <input class="input-primary" type="password" name="password" placeholder="Nhập mật khẩu" autocomplete="off" required>
                <img class="password-input-hide" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-show.svg" alt="" style="display: none">
                <img class="password-input-show" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-hide.svg" alt="" >
            </div>
{{--            <p class="modal-login-error" id="passwordError"></p>--}}
{{--            <a class="modal-login-forget-password" id="span_resetPass">Quên mật khẩu?</a>--}}
            <button type="submit">Đăng nhập</button>
            <p>Hoặc đăng nhập qua</p>
            <div class="social-container">
                <a href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}" class="social">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/fb_icon.svg" alt="">
                </a>
            </div>
            <p id="changeFormRegister" class="mobile-auth-change-form">Bạn chưa có tài khoản? <span>Đăng ký tại đây</span></p>
        </form>
        <form class="modal-login-form formRegister" id="formRegisterMobile" action="{{route('register')}}" method="POST" style="display: none">
            @csrf
            <p class="modal-login-error text-center registError" id="registError"></p>
            <input class="input-primary" type="text" name="username" placeholder="Nhập tên tài khoản" required>
{{--            <p class="modal-login-error" id="usernameRegisterErrorMobile"></p>--}}
{{--            <input class="input-primary" type="text" name="email" placeholder="Nhập email">--}}
{{--            <p class="modal-login-error" id="emailRegisterErrorMobile"></p>--}}
{{--            <input class="input-primary" type="text" name="phone" placeholder="Nhập số điện thoại">--}}
{{--            <p class="modal-login-error" id="phoneRegisterErrorMobile"></p>--}}
            <div class="password-input-container">
                <input class="input-primary" type="password" name="password" placeholder="Nhập mật khẩu của bạn" autocomplete="off" required>
                <img class="password-input-hide" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-show.svg" alt="" style="display: none">
                <img class="password-input-show" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-hide.svg" alt="" >
            </div>
            <div class="password-input-container">
                <input class="input-primary" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu của bạn" autocomplete="off" required>
                <img class="password-input-hide" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-show.svg" alt="" style="display: none">
                <img class="password-input-show" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-hide.svg" alt="" >
            </div>
{{--            <p class="modal-login-error" id="passwordRegisterError"></p>--}}
            <button type="submit">Đăng ký</button>
            <p id="changeFormLogin" class="mobile-auth-change-form">Bạn đã có tài khoản? <span>Đăng nhập tại đây</span></p>
        </form>
    </div>
</div>
@endif
<script>

    $('.formLogin').submit(function (e) {

        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        let url2 = new URL(window.location.href);
        $('.modal-loader-container').css('display','flex')
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
                    $('.LoginError').html(data.message)

                }

            },
            error: function (data) {
                alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                btnSubmit.text('Đăng nhập');
            },
            complete: function (data) {
                $('#form-login').trigger("reset");
                $('.modal-loader-container').css('display','none')
            }
        });
    });
    $('.formRegister').submit(function (e) {
        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        let url2 = new URL(window.location.href);
        $('.modal-loader-container').css('display','flex')
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
                    $('.registError').html(data.message)

                }

            },
            error: function (data) {
                alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                btnSubmit.text('Đăng ký');
            },
            complete: function (data) {
                $('#reload').trigger('click');
                $('#form-regist').trigger("reset");
                $('.modal-loader-container').css('display','none')
            }
        });
    });
</script>
