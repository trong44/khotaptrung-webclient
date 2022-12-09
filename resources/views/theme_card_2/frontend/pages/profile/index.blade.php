@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
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
                                    <th id="info_id"></th>
                                </tr>
                                <tr>
                                    <th>Tên của bạn:</th>
                                    <th id="info_name"></th>
                                </tr>
                                <tr>
                                    <th>Số dư tài khoản:</th>
                                    <th id="info_balance"></th>
                                </tr>

                                <tr>
                                    <th>Mật khẩu:</th>
{{--                                    <th>**************    <button style="font-family: 'Nunito', sans-serif;" type="button" data-toggle="modal" data-target="#modal_password" class="btn btn-password btn-danger">Đổi mật khẩu</button></th>--}}
                                    <th>**************    <a href="/changepassword" class="btn btn-password btn-danger">Đổi mật khẩu</a></th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/profile.js?v={{time()}}"></script>

@endsection
