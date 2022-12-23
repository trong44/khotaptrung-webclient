<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ĐĂNG NHẬP HỆ THỐNG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="form-login-modal" role="form" action="{{ url('/ajax/login') }}" method="POST">
                    @csrf
                    <p class="help-block mb-2 login_error" style="text-align: center;color: #dd4b39">
                        <strong></strong>
                    </p>
                    <div class="form-group m-form__group">
                        <label for="exampleInputEmail1">Tài Khoản: </label>
                        <input type="text" class="form-control m-input" name="username" placeholder="" required value>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="">Mật khẩu: </label>
                        <input id="password-field" type="password" name="password" class="form-control m-input" required
                               placeholder="">
                        <span id="show-password" toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
{{--                        <span style="float:right" class="m-form__help_acount"><a--}}
{{--                                href="https://muathegarena.com/password/reset"><i style="font-weight:bold"> Quên mật khẩu </i></a></span>--}}
                    </div>
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember_token" value="1">
                            Ghi nhớ
                        </label>
                    </div>
                    <div style="margin-top: 35px" class="form-group m-form__group text-center">
                        <button type="submit" class="btn btn-success btn-login">Đăng nhập</button>
                    </div>
                </form>
                <div class="text-form text-center">
                    <p>---- Hoặc ----</p>
                </div>
                <div class="form-group m-form__group text-center">
                    <a style="font-family:'Nunito', sans-serif;background-color:#4267b2"
                       href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}" class="btn btn-success">Login Facebook</a>
                    <a href="/register">
                        <button type="button" class="btn btn-secondary">Tạo tài khoản</button>
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#form-login-modal').on('submit',function (e) {

        e.preventDefault();
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');

        var loadingText = '<i class="fas fa-circle-notch fa-spin"></i> Đang xử lý...';
        btnSubmit.html(loadingText).prop('disabled', false);
        btnSubmit.attr("disabled", true);

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
                    // if (return_url == null || return_url == '' || return_url == undefined){
                    //     if (data.return_url == null || data.return_url == '' || data.return_url == undefined){
                    //         window.location.reload();
                    //     }else{
                    //         window.location.href = data.return_url;
                    //     }
                    // }else {
                    //     window.location.href = return_url;
                    //
                    // }
                    window.location.href = return_url;
                }   else{
                    formSubmit.find('.login_error').html('<strong style="color: red;text-align: center;">'+data.message+'</strong>');

                }
                btnSubmit.prop('disabled',false);
                btnSubmit.text('Đăng nhập');
            },
            error: function (data) {
                console.log('Kết nối với hệ thống thất bại.Xin vui lòng thử lại')
                // alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                btnSubmit.prop('disabled', false);
                btnSubmit.text('Đăng nhập');
            },
            complete: function (data) {

            }
        });
    });
</script>
