@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <div class="log-in container" >
        <div class="log-in-body">
            <p>Đăng ký thành viên</p>
{{--            <p style="color: red;font-size: 14px">    {{ $errors->first() }}</p>--}}
            <form action="{{ url('/ajax/register') }}" method="POST" id="form-regist">
                <div class="regist_error"></div>
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Tài khoản của web" required>
                    <span><i class="fas fa-user"></i></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                    <span><i class="fas fa-lock"></i></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu" required>
                    <span><i class="fas fa-user"></i></span>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary btn-block btn-flat">Đăng Ký</button>
                    </div>
                </div>
            </form>
            <div class="social-auth">
                <p>- HOẶC -</p>
                <a class="btn  btn-social btn-facebook btn-flat d-inline-block" href="http://fb.nhapnick.com/{{str_replace(".","_",Request::getHost())}}"><i class="fab fa-facebook"></i> Login FB</a>
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
                        // var metapath = $('meta[name="path"]').attr('content');
                        //
                        // if (metapath == null || metapath == '' || metapath == undefined){
                        //     window.location.href = '/';
                        // }else {
                        //     window.location.href = metapath;
                        //
                        // }
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
                        let html = '';
                        html +='';
                        html += '<p style="color: red;text-align: center;font-size: 14px">'+ data.message +'</p>';
                        $('.regist_error').html(html)
                    }

                    // if(data.status == 1){
                    //     alert(da);
                    // }
                    // else{
                    //     alert(data);
                    //     btnSubmit.text('Thanh toán');
                    //     btnSubmit.prop('disabled', false);
                    // }
                },
                error: function (data) {
                    alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                    btnSubmit.text('Đăng nhập');
                },
                complete: function (data) {
                    $('#reload').trigger('click');
                    $('#form-charge-input').trigger("reset");
                }
            });
        });
    </script>

@endsection
