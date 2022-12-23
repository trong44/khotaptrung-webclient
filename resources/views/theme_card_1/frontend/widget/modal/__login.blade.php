<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="panel panel-primary card">
                <div class="modal-header panel-heading">
                    <div class="modal-title card-title" id="myModalLabel" style="color:white;"><i class="fa fa-sign-in"></i> Đăng nhập</div>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                </div>
                <form id="form-login-modal" role="form" action="{{ url('/ajax/login') }}" method="POST">
                    @csrf
                    <div class="login_error text-center mt-3"  >

                    </div>
                    <div class="panel-body card-body">
                        <div class="alert alert-danger" id="divnotify"><i class="fa fa-info-circle fa-lg"></i><span></span></div>
                        <div class="form-group">
                            <label for="ctrlusername">Tài khoản</label>
                            <input type="text" name="username" id="ctrlusername" class="form-control" placeholder="Tài khoản đăng nhập" tabindex="1"   autofocus="autofocus" />
                        </div>
                        <div class="form-group">
                            <label for="ctrlpass">Mật khẩu:</label>
                            <input type="password" name="password" id="ctrlpass" class="form-control" autocomplete="off" placeholder="Mật khẩu" tabindex="2" />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="ctrlloginbtn" tabindex="3"><i class="fa fa-sign-in"></i> Đăng nhập</button>
                            &nbsp;
                        </div>
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember_token" value="1">
                                Ghi nhớ
                            </label>
                        </div>
                        <div class="text-form text-center">
                            <p>----  Hoặc  ----</p>
                        </div>
                        <div class="form-group m-form__group text-center">
                            <a style="" href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}" class=""><i class="fab fa-facebook-square" style="font-size: 33px"></i></a>
                        </div>

                        <!-- <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#forgotyourpassword">Quên mật khẩu?</a> -->
                    </div>
                    <div class="panel-footer card-footer">
                        <a class="float-right" href="#" data-toggle="modal" data-target="#signup" data-dismiss="modal"><i class="fa fa-share-square-o"></i> Bạn chưa có tài khoản? Đăng ký ngay</a>
                        <div class="clearfix"></div>
                    </div>
                </form>
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
                    window.location.href = data.return_url;
                }   else{
                    formSubmit.find('.login_error').html('<strong style="color: red">'+data.message+'</strong>');

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
