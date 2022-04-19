@extends('frontend.layouts.master')


@section('content')
    <div class="site-content-body bg-white first last p-0">
        <div class="block-profile">
            <div class="block-header">
                <div class="p-3 d-flex align-items-center">
                    <div class="me-3">
                        <img src="img/temp/avatar-80.png" class="rounded-circle avatar" alt="">
                    </div>
                    <div>
                        <h6 class="mb-0" id="info_name"></h6>
                        <p class="mb-0 text-secondary small" id="info_create"></p>
                    </div>
                    <div class="ms-auto">
                        <a href="buy.html" class="btn btn-outline-primary rounded-x ps-4 pe-4">Mua thẻ / data <i class="las la-angle-right"></i></a>
                    </div>
                </div>
                <!-- BEGIN Tabs -->
                <ul class="nav nav-qp-tabs mb-0 ps-3 pe-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="#" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true"><span><i class="las la-user"></i> <span>Thông tin tài khoản</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link data__giaodich" href="#" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab" aria-controls="history" aria-selected="true"><span><i class="las la-clock"></i> Lịch sử giao dịch</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link data__napthe" href="#" id="deposit-tab" data-bs-toggle="tab" data-bs-target="#deposit" type="button" role="tab" aria-controls="deposit" aria-selected="true"><span><i class="las la-clock"></i> Lịch sử nạp thẻ</span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="#" id="item-tab" data-bs-toggle="tab" data-bs-target="#item" type="button" role="tab" aria-controls="item" aria-selected="true"><span><i class="las la-credit-card"></i> Thẻ cào đã mua</span></a>
                    </li>
                </ul>
            </div>
            <div class="block-content p-3">
                <div class="tab-content mb-4">
                    <!-- BEGIN Tab Content Profile -->
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="{{route('changePasswordApi')}}" method="POST" id="form-changePassword">
                                    @csrf
                                    <div class="mb-4">
                                        <h6 class="title-style-collapse mb-3"><a href="#" class="d-block">Thông tin tài khoản</a></h6>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Số điện thoại</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control border-end-0" name="phone" placeholder=""  id="info_phone" value="" aria-label="" readonly>
                                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-mobile"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Kết nối với Facebook</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-transparent text-secondary pe-0">fb.com/</span>
                                                        <input type="text" class="form-control border-start-0 ps-0" name="facebook" placeholder="" value="" aria-label="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Địa chỉ Email</label>
                                                    <div class="input-group">
                                                        <input type="text" name="email" class="form-control border-end-0" placeholder="" value="" aria-label="" readonly>
                                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-envelope"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Mật khẩu cũ</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control border-end-0"  name="old_password" placeholder="Mật khẩu cũ" value="" aria-label="">
                                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-lock"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Mật khẩu mới</label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control border-end-0"  name="password" placeholder="Mật khẩu mới" value="" aria-label="">
                                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-lock"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Nhập lại mật khẩu </label>
                                                    <div class="input-group">
                                                        <input type="password" class="form-control border-end-0" name="password_confirmation" placeholder="Xác nhận mật khẩu" value="" aria-label="">
                                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-lock"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <h6 class="title-style-collapse mb-3"><a href="#" class="d-block">Thông tin cá nhân</a></h6>
                                        <div class="mb-3">
                                            <div class="form-check d-inline-block me-3">
                                                <input checked class="form-check-input" type="radio" name="gender" id="gender">
                                                <label class="form-check-label" style="padding: 4px">
                                                    Nam
                                                </label>
                                            </div>
                                            <div class="form-check d-inline-block">
                                                <input  class="form-check-input" type="radio" name="gender" id="gender">
                                                <label class="form-check-label" style="padding: 4px">
                                                    Nữ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Họ và tên</label>
                                                    <div class="input-group">
                                                    <input type="text" value="Đỗ Hải Nam" name="fullname" id="info_fullname" class="form-control" placeholder="" aria-label="" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-1">Ngày sinh</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control border-end-0" name="birtday" value="" placeholder="DD/MM/YYYY" aria-label="">
                                                        <span class="input-group-text bg-transparent text-secondary"><i class="las la-calendar"></i></span>
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
                        </div>                                        </div><!-- END Tab Content Profile -->
                    <!-- BEGIN Tab Content History -->
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <form class="form-charge form__txns">
                        <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                            <h4 class="title-style-left mb-3">Danh sách giao dịch</h4>
                            <div class="d-flex align-items-center mb-3">
                                <input type="text" placeholder="ID" name="id_txns" class="id_txns">
                                <div class="input-group date-ranger-picker ms-3">
                                    <input type="text" class="form-control border-end-0 started_at_txns" name="started_at_txns" placeholder="DD/MM/YYYY" value="">
                                    <span class="input-group-text bg-transparent text-secondary"><i class="las la-arrow-right"></i></span>
                                    <input type="text" class="form-control border-start-0 ended_at_txns" name="ended_at_txns" placeholder="DD/MM/YYYY" value="">
                                    <button class="btn bg-primary text-white" type="submit"><i class="las la-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                        </form>
                        @include('theme_2.frontend.pages.account.user.function.__lich__su__giao__dich__data')
                    </div><!-- END Tab Content History -->
                    <!-- BEGIN Tab Content Deposit -->
                    <div class="tab-pane fade data__giaodich" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
                        <form class="form-charge form__lsnt">
                        <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                            <h4 class="title-style-left mb-3">Lịch sử nạp thẻ abccccccccccccc</h4>
                            <div class="d-flex align-items-center mb-3">
                                <div class="input-group date-ranger-picker ms-3">
                                    <input type="text" name="started_at_lsnt" class="form-control border-end-0 started_at_lsnt" placeholder="DD/MM/YYYY" value="">
                                    <span class="input-group-text bg-transparent text-secondary"><i class="las la-arrow-right"></i></span>
                                    <input type="text" name="ended_at_lsnt" class="form-control border-start-0 ended_at_lsnt" placeholder="DD/MM/YYYY" value="">
                                    <button class="btn bg-primary text-white" type="button"><i class="las la-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                        </form>
                        <div id="data_napthe_history">
                            @include('frontend.pages.account.user.function.__lich__su__nap__the')
                        </div>

                    </div><!-- END Tab Content History -->
                    <!-- BEGIN Tab Content Item -->
                    <div class="tab-pane fade data__muathe" id="item" role="tabpanel" aria-labelledby="item-tab">
                        <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row">
                            <h4 class="title-style-left mb-3">Thẻ cào đã mua</h4>
                            <div class="d-flex align-items-center mb-3">
                                <select class="form-select" style="max-width: 160px">
                                    <option value="0">Loại thẻ cào</option>
                                </select>
                                <div class="input-group date-ranger-picker ms-3">
                                    <input type="text" class="form-control border-end-0" placeholder="DD/MM/YYYY" value="">
                                    <span class="input-group-text bg-transparent text-secondary"><i class="las la-arrow-right"></i></span>
                                    <input type="text" class="form-control border-start-0" placeholder="DD/MM/YYYY" value="">
                                    <button class="btn bg-primary text-white" type="button"><i class="las la-angle-right"></i></button>
                                </div>
                            </div>
                        </div>

                        @include('.theme_2.frontend.pages.account.user.function.__lich__su__mua__the')
                    </div><!-- BEGIN Tab Content Item -->
                </div>
            </div>
        </div>
    </div>
    <div class="after"></div>

    <input type="hidden" name="id_txns_data" class="id_txns_data" value="">
    <input type="hidden" name="started_at_txns_data" class="started_at_txns_data" value="">
    <input type="hidden" name="ended_at_txns_data" class="ended_at_txns_data" value="">
    <input type="hidden" name="hidden_page_service_txns" id="hidden_page_service_txns" class="hidden_page_service_txns" value="1" />

    <input type="hidden" name="started_at_lsnt_data" class="started_at_lsnt_data" value="">
    <input type="hidden" name="ended_at_lsnt_data" class="ended_at_lsnt_data" value="">
    <input type="hidden" name="hidden_page_service_lsnt" id="hidden_page_service_lsnt" class="hidden_page_service_lsnt" value="1" />

    <script src="/assets/frontend/theme_2/js/profile.js"></script>
    <script src="/assets/frontend/theme_2/js/account/txns-history.js"></script>
    <script src="/assets/frontend/theme_2/js/account/charge-history.js"></script>

    <script>

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
