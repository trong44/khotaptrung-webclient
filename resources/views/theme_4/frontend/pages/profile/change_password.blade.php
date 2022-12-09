@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
<section>
    <div class="container">
        <div class="row user-manager">
            @include('frontend.widget.__menu_profile')
            <div class="col-12 col-md-8 col-lg-9 site-form " style="min-height: 212.568px;">
                <div class="menu-content">

                    <div class="title">
                        <h3>Đổi mật khẩu</h3>
                    </div>
                    <div class="wapper profile">
                        <div id="change-password-result">

                        </div>
                        <form method="POST" action="{{route('changePasswordApi')}}" id="form-changePassword" accept-charset="UTF-8" class="form-horizontal form-charge"><input name="_token" type="hidden" value="1d1UtKProIOHCYvd7GjOQ1mwzvuWei6FP3awwoKP">
                            @csrf
                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Mật khẩu cũ:</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <input class="form-control c-square c-theme " name="old_password" type="password"
                                           maxlength="32"
                                           required placeholder="Mật khẩu hiện tại">
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Mật khẩu mới:</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <input class="form-control c-square c-theme " name="password" type="password" maxlength="32"
                                           required placeholder="Mật khẩu mới">
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Xác nhận mật khẩu:</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <input class="form-control c-square c-theme " name="password_confirmation" type="password"
                                           maxlength="32"
                                           required placeholder="Xác nhận mật khẩu mới">
                                </div>
                            </div>
                            <div class="mb-4 text-center">
                                <button class="btn-submit" type="submit">Cập nhật</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>


    </div><!-- /.container -->
</section>
<script src="/assets/frontend/{{theme('')->theme_key}}/js/profile.js?v={{time()}}"></script>
<script>


</script>
@endsection
