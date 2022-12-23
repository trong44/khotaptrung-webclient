@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    {{--    aaaaaaaaaaaa--}}
    <div class="log-in container" >
        <div class="log-in-body">
            <p>Đăng nhập hệ thống</p>
            <form action="/ajax/login" method="POST" id="form-login">
                <div class="login_error"></div>
{{--            <p style="color: red;font-size: 14px">    {{ $errors->first() }}</p>--}}
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tài khoản" name="username" required>
                    <span><i class="fas fa-user"></i></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password" required>
                    <span><i class="fas fa-lock"></i></span>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="checkbox icheck">
                            <label >
                                <input type="checkbox" name="remember_token" value="1">
                                Ghi nhớ
                            </label>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <a href="">Quên mật khẩu</a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-primary btn-block btn-flat" type="submit">Đăng nhập</button>
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

    <script>

        $('#form-login').submit(function (e) {
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
                        $('.login_error').html(html)
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
