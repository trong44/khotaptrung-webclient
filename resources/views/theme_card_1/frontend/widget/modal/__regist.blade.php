<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="panel panel-primary card">
                <div class="modal-header panel-heading">
                    <div class="modal-title card-title" id="myModalLabel" style="color:white;"><i class="fa fa-sign-in"></i> Đăng ký tài khoản</div>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                </div>
                <form action="{{ url('/ajax/register') }}" method="POST" id="form-regist">
                    @csrf
                    <div class="regist_error text-center mt-3"></div>
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


                        <!-- /.col -->
                        <div class="col-xs-12  mb-3">
                            <button type="submit" class="btn btn-primary" id="ctrregisterbtn">
                                <i class="fa fa-sign-in"></i> Đăng ký tài khoản
                            </button>
                        </div>
                        <div class="text-form text-center">
                            <p>----  Hoặc  ----</p>
                        </div>
                        <div class="form-group m-form__group text-center">
                            <a style="" href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}" class=""><i class="fab fa-facebook-square" style="font-size: 33px"></i></a>
                        </div>
                    </div>
                    <div class="panel-footer card-footer">
                        <a class="float-right" href="#" data-toggle="modal" data-target="#signin" data-dismiss="modal"><i class="fa fa-share-square-o"></i> Bạn đã có tài khoản? Đăng nhập ngay</a>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /.col -->
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
