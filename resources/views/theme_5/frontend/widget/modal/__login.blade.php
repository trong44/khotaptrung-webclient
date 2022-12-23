@if(!App\Library\AuthCustom::check())
<div class="modal fade" id="loginModal">
    <div class="modal-dialog modal-lg modal-dialog-centered animated">
        <div class="modal-content">
            <div class="modal-login-container" id="modal-login-container">
                <div class="modal-login-form-container sign-up-container">
                    <img class="close-login-modal" src="/assets/frontend/{{theme('')->theme_key}}/image/son/close.svg" alt="">
                    <form class="modal-login-form formRegister" id="formRegister" action="{{ url('/ajax/register') }}" method="POST">
                        @csrf
                        <p class="fw-700 fz-24 fz-lg-24 fz-md-18 fz-sm-16 color-pink lh-24">Đăng ký</p>
                        <small class="fz-13 fz-md-12 fz-sm-10 fw-400 c-mb-12">Vui lòng đăng nhập để sử dụng dịch vụ của chúng tôi</small>

                        <p class="modal-login-error text-center registError" id="registError"></p>
                        <span class="input-group w-100 ">
                            <input class="input-primary c-mt-12" type="text" name="username" placeholder="Nhập tên tài khoản" autocomplete="off" required>
                            <span class="text-error c-mt-4"></span>
                        </span>
                        <div class="w-100 input-group">
                            <div class="password-input-container c-mt-8">
                                <input class="input-primary" type="password" name="password" placeholder="Nhập mật khẩu của bạn" autocomplete="off" required>
                                <img class="password-input-hide" src="/assets/frontend/{{theme('')->theme_key}}/image/son/eye-show.svg" alt="" style="display: none">
                                <img class="password-input-show" src="/assets/frontend/{{theme('')->theme_key}}/image/son/eye-hide.svg" alt="" >
                            </div>
                            <span class="text-error c-mt-4"></span>
                        </div>
                        <div class="w-100 input-group">
                            <div class="password-input-container c-mt-8">
                                <input class="input-primary" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu của bạn" autocomplete="off" required>
                                <img class="password-input-hide" src="/assets/frontend/{{theme('')->theme_key}}/image/son/eye-show.svg" alt="" style="display: none">
                                <img class="password-input-show" src="/assets/frontend/{{theme('')->theme_key}}/image/son/eye-hide.svg" alt="" >
                            </div>
                            <span class="text-error c-mt-4"></span>
                        </div>
                        <button type="submit" class="btn pink btn-pink-default c-mt-16">Đăng ký</button>
                    </form>
                </div>
                <div class="modal-login-form-container sign-in-container"   >
                    <form class="modal-login-form formLogin" action="{{ url('/ajax/login') }}" id="formLogin"  method="POST">
                        @csrf
                        <p class="fw-700 fz-24 fz-lg-24 fz-md-18 fz-sm-16 lh-32">Đăng nhập</p>

                        <small class="fz-13 fz-md-12 fz-sm-10 fw-400 c-mb-12">Vui lòng đăng ký để sử dụng dịch vụ của chúng tôi</small>

                        <p class="modal-login-error text-center LoginError" id="LoginError" ></p>

                        <span class="input-group w-100 ">
                            <input class="input-primary c-mt-12" type="text" name="username" placeholder="Nhập tên tài khoản" autocomplete="off" required>
                            <span class="text-error c-mt-4"></span>
                        </span>
                        <div class="w-100 input-group">
                            <div class="password-input-container c-mt-8 ">
                                <input class="input-primary" type="password" name="password" placeholder="Nhập mật khẩu" autocomplete="off" required>
                                <img class="password-input-hide" src="/assets/frontend/{{theme('')->theme_key}}/image/son/eye-show.svg" alt="" style="display: none" required>
                                <img class="password-input-show" src="/assets/frontend/{{theme('')->theme_key}}/image/son/eye-hide.svg" alt="" >

                            </div>
                            <span class="text-error c-mt-4"></span>
                        </div>
                        <button type="submit" class="btn primary c-mt-16 c-mt-md-14 c-mt-sm-14 btn-primary-default">Đăng nhập</button>
                        <span class="login-via fw-400 fz-13 fz-md-12 fz-sm-10 c-mt-24 c-mt-lg-20 c-mt-md-16 c-mt-sm-8">Hoặc đăng nhập qua</span>
                        <div class="social-container c-mt-24 c-mt-lg-20 c-mt-md-16">
                            <a href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}" class="social">
                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/facebook.svg" alt="">
                            </a>
                        </div>
                    </form>
                </div>
                <div class="modal-login-overlay-container">
                    <div class="modal-login-overlay">
                        <div class="modal-login-overlay-panel modal-login-overlay-left" style="background-image: url('/assets/frontend/{{theme('')->theme_key}}/image/son/bglogin.png')">
                            <p class="modal-login-suggestion fw-700 fz-24 fz-lg-20 fz-md-18 fz-sm-16 c-mt-24 c-mt-lg-20 c-mt-md-16 c-mt-sm-8 mb-0 lh-36">
                            <span  class="fz-24 " style="color: var(--primary-color);">{{\Request::server ("HTTP_HOST")}}</span> xin chào</p>
                            <p class="fw-400 fz-13 fz-md-12 fz-sm-10 c-mb-24 c-mb-lg-20 c-mb-md-16 c-md-sm-8">Bạn đã có tài khoản, vui lòng đăng nhập tại đây</p>
                            <button class="btn primary btn-primary-default" id="signIn">Đăng nhập</button>
                        </div>
                        <div class="modal-login-overlay-panel modal-login-overlay-right" style="background-image: url('/assets/frontend/{{theme('')->theme_key}}/image/son/bglogin.png')">
                            <img class="close-login-modal" src="/assets/frontend/{{theme('')->theme_key}}/image/son/close.svg" alt="">
                            <p class="modal-login-suggestion fw-700 fz-24 fz-lg-20 fz-md-18 fz-sm-16 c-mt-24 c-mt-lg-20 c-mt-md-16 c-mt-sm-8 mb-0 lh-36">
                            <span  class="fz-24" style="color: var(--primary-color);">{{\Request::server ("HTTP_HOST")}}</span> xin chào</p>
                            <p class="fw-400 fz-13 fz-md-12 fz-sm-10 c-mb-32 c-mb-lg-20 c-mb-md-16 c-md-sm-8">Vui lòng đăng ký ngay tại đây</p>
                            <button class="btn pink btn-pink-default" id="signUp">Đăng ký</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-auth step">
    <div class="head-mobile">
        <a href="javascript:void(0);" class="link-back close-step"></a>
        <p class="head-title text-title">Đăng nhập</p>
    </div>
    <small class="fz-13 fz-md-12 fz-sm-10 fw-400 c-mb-12">Vui lòng đăng ký để sử dụng dịch vụ của chúng tôi</small>

    <div class="mobile-auth-form c-px-16 c-pt-50">

        <form action="{{ url('/ajax/register') }}" method="POST" id="formRegisterMobile" class="flex-column justify-content-center aligin-items-center text-center formRegister">
            @csrf
            <div class="c-mt-40">
                <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" alt="" class="d-lg-block d-none"  style="width: 100px">
                <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo_mobile'))}}" alt="" class="d-lg-none"  style="width: 100px">
            </div>
            <p class="fw-500 fz-15 lh-24 c-mt-24 c-mb-20">Đăng ký để trải nghiệm tốt nhất<br> dịch vụ của chúng tôi!</p>

            <p class="text-error c-mb-20 registError" id="registError"></p>
            <span class="input-group w-100 c-mb-16">
                <input class="" type="text" name="username" placeholder="Nhập tên tài khoản" autocomplete="off">
                <span class="text-error c-mt-4"></span>
            </span>

            <span class="input-group w-100 c-mb-16">
                <span class="toggle-password w-100">
                    <input class="" type="password" name="password" placeholder="Nhập mật khẩu của bạn" autocomplete="off">
                </span>
                <span class="text-error c-mt-4"></span>
            </span>

            <span class="input-group w-100 c-mb-16">
                <span class="toggle-password w-100">
                    <input class="" type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu của bạn" autocomplete="off">
                </span>
                <span class="text-error c-mt-4"></span>
            </span>

            <button type="submit" class="btn primary">Đăng ký</button>
            <p class="mobile-auth-change-form fw-400 fz-12 lh-16 c-mt-24" >Bạn đã có tài khoản? <span class="changeFormLogin">Đăng nhập tại đây</span></p>
        </form>

        <form action="{{ url('/ajax/login') }}" id="formLoginMobile" class="flex-column justify-content-center aligin-items-center text-center formLogin">
            @csrf
            <div class="c-mt-40">
                <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" alt="" class="d-lg-block d-none"  style="width: 100px">
                <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo_mobile'))}}" alt="" class="d-lg-none" style="width: 100px">
            </div>
            <p class="fw-500 fz-15 lh-24 c-mt-24 c-mb-20">Đăng nhập để tiến hành giao dịch! </p>

            <span class="LoginError text-error c-mb-20"></span>

            <span class="input-group w-100 c-mb-16">
                <input class="" type="text" name="username" placeholder="Nhập tên tài khoản" autocomplete="off">
                <span class="text-error c-mt-4"></span>
            </span>

            <span class="input-group w-100 c-mb-16">
                <span class="toggle-password w-100">
                    <input class="" type="password" name="password" placeholder="Nhập mật khẩu của bạn" autocomplete="off">
                </span>
                <span class="text-error c-mt-4"></span>
            </span>

{{--            <p class="forgot-text c-mb-24 fz-12 fw-400 lh-16">Quên mật khẩu?</p>--}}

            <button type="submit" class="btn primary">Đăng nhập</button>

            <div class="login-line d-flex align-items-center c-mt-24 c-px-25">
                <span class="d-block"></span>
                <p class="c-mb-0 fz-13 fw-400 c-mx-8">Hoặc đăng nhập qua</p>
                <span class="d-block"></span>
            </div>

            <div class="social-container c-mt-16">

                <a href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}" class="d-inline-flex justify-content-center aligin-items-center c-mx-10">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/son/facebook.svg" alt="">
                </a>
            </div>


            <p  class="mobile-auth-change-form fw-400 fz-12 lh-16 c-mt-16">Bạn chưa có tài khoản? <span class="changeFormRegister">Đăng ký tại đây</span></p>
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

