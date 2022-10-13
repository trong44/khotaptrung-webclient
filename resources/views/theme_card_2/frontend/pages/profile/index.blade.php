@extends('frontend.layouts.master')
@section('content')
    <div id="profile" style="margin-top: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                    @include('frontend.layouts.includes.menu_profile')
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="main-profile" style="min-height: 296px;">
                        <div class="content-profile">
                            <h3>Thông tin tài khoản</h3>
                            <hr class="lines">
                            <table class="table table-striped m-table">
                                <tbody>
                                <tr>
                                    <th>ID của bạn:</th>
                                    <th>60527</th>
                                </tr>
                                <tr>
                                    <th>Tên của bạn:</th>
                                    <th>Đỗ Hải Nam</th>
                                </tr>
                                <tr>
                                    <th>Số dư tài khoản:</th>
                                    <th>0 VNĐ</th>
                                </tr>
                                <tr>
                                    <th>Ngày tham gia:</th>
                                    <th>
                                        31/05/2022
                                    </th>
                                </tr>
                                <tr>
                                    <th>Mật khẩu:</th>
                                    <th>**************    <button style="font-family: 'Nunito', sans-serif;" type="button" data-toggle="modal" data-target="#modal_password" class="btn btn-password btn-danger">Đổi mật khẩu</button></th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
