@extends('frontend.layouts.master')
@push('js')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/profile.js?v={{time()}}"></script>
    <script>
        $(document).ready(function () {
            $('.account_thong-tin').addClass('active')
        })
    </script>
@endpush
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <div class="account">

        <div class="account_content">
            <div class="container">
                @include('frontend.layouts.includes.menu_profile')
                <div class="account_sidebar_content">
                    <div class="account_sidebar_content_title">
                        <p>Thông tin tài khoản</p>
                        <div class="account_sidebar_content_line"></div>
                    </div>
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th scope="row">ID của bạn:</th>
                            <th id="info_id"></th>
                        </tr>
                        <tr>
                            <th scope="row">Tên tài khoản</th>
                            <th id="info_name"></th>
                        </tr>

                        {{--                    <tr>--}}
                        {{--                        <th scope="row">Giới tính:</th>--}}
                        {{--                        <th><span>Nam</span></th>--}}
                        {{--                    </tr>--}}
                        {{--                    <tr>--}}
                        {{--                        <th scope="row">Giới tính:</th>--}}
                        {{--                        <th><span><i class="text-danger">Nam</i></span></th>--}}
                        {{--                    </tr>--}}
                        <tr>
                            <th scope="row">Số dư tài khoản:</th>
                            <th id="info_balance"></th>
                        </tr>
                        <tr>
                            <th scope="row">Mật khẩu</th>
                            <td>*** <a href="/changepassword" style="color: red;text-decoration: none;font-weight: 600;font-style: italic">Đổi mật khẩu</a></td>
                        </tr>
                        <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


@endsection
