@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@push('js')

@endpush

@section('content')
    <div class="site-content-body bg-white first last p-0">
        <div class="block-profile" >
            @include('frontend.widget.__menu_profile')
            <div class="block-content p-3">
                <div class=" mb-4">
                    <div class="" id="profile">
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="{{route('changePasswordApi')}}" method="POST" id="form-changePassword">
                                    @csrf
                                    <div class="mb-4">
                                        <h6 class="title-style-collapse mb-3"><a href="#" class="d-block">Thông tin tài khoản</a></h6>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Mật khẩu cũ</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control border-end-0"  name="old_password" placeholder="Mật khẩu cũ" value="" aria-label="" required>
                                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-lock"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Mật khẩu mới</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control border-end-0"  name="password" placeholder="Mật khẩu mới" value="" aria-label="" required>
                                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-lock"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Nhập lại mật khẩu </label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control border-end-0" name="password_confirmation" placeholder="Xác nhận mật khẩu" value="" aria-label="" required>
                                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-lock"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <h6 class="title-style-collapse mb-3"><a href="#" class="d-block">Thông tin cá nhân</a></h6>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Tên tài khoản</label>
                                                    <div class="input-group">
                                                        <input type="text" value="Đỗ Hải Nam" name="fullname" id="info_fullname" class="form-control" placeholder="" aria-label="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <button type="submit" class="btn bg-warning-gradient ps-4 pe-4 text-white pt-2 pb-2 rounded">Lưu thông tin <i class="las la-angle-double-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- END Tab Content Profile -->

                </div>
            </div>
        </div>
    </div>
    <div id="copy"></div>
    <div class="after"></div>



    <script src="/assets/frontend/theme_2/js/profile.js?v={{time()}}"></script>


    <script>
        $('body').on('click','i.la-copy',function(e){
            data = $(this).data('id');
            var $temp = $("<input>");
            $("body #copy").html($temp);
            $temp.val($.trim(data)).select();
            document.execCommand("copy");
            $temp.remove();
            toastr.success('Sao chép thành công!');
        });


        $('#form-changePassword').submit(function (e) {
            e.preventDefault();
            var formSubmit = $(this);
            var url = formSubmit.attr('action');
            var btnSubmit = formSubmit.find(':submit');
            $.ajax({
                type: "POST",
                url: url,
                cache:false,
                data: formSubmit.serialize(), // serializes the form's elements.
                beforeSend: function (xhr) {
                },
                success: function (data) {
                    console.log(data)
                    // alert(data)
                    if(data.status == 1){
                        swal({
                            title: "Thành công !",
                            text: data.message,
                            icon: "success",
                        })
                        // let html = '';
                        // html +='';
                        // $('.changepassword_error').html(html)
                        // window.location.href = '/';

                    }else{
                        swal({
                            title: "Cố lỗi xảy ra !",
                            text: data.message,
                            icon: "error",
                        })

                        // let html = '';
                        // html +='';
                        // html += '<p style="color: red;text-align: center;font-size: 14px;font-weight: 600">'+ data.message +'</p>';
                        // $('.changepassword_error').html(html)
                    }

                },
                error: function (data) {
                    alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                    btnSubmit.text('Đăng nhập');
                },
                complete: function (data) {
                    $('.changepassword_error').html()
                    formSubmit.trigger("reset");
                }
            });
        });
    </script>
@endsection

