@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <div class="row my-3" >
        <div class="col-lg-3  col-sm-3 col-md-3 col-12">
            @include('frontend.layouts.includes.menu_profile')
        </div>
        <div class="col-lg-9  col-md-9 col-sm-12 col-12">
            <div class="bg-white">
                <div class="main-profile" style="min-height: 468px;padding:15px 20px">

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
                                <th id="info_balance"> </th>
                            </tr>

                            <tr>
                                <th>Mật khẩu:</th>
                                <th>******* <a href="/changepassword" style="color: red;text-decoration: none;font-weight: 600;font-style: italic">Đổi mật khẩu</a></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/profile.js?v={{time()}}"></script>

@endsection
