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
                            <h3>Thông tin hồ sơ</h3>
                        </div>
                        <div class="wapper profile">
                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">ID</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <input type="text" class="form-control" placeholder="ID" name="id" value="" id="info_id" readonly>
                                </div>
                            </div>

                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Tên tài khoản</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <input type="text" class="form-control" placeholder="Tên tài khoản" name="username" id="info_name" value="" readonly>
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <label class="mt-2">Số dư</label>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                                    <input type="text" class="form-control" readonly="" placeholder="Số dư" id="info_balance" name="balance" value="">
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container -->
    </section>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/profile.js?v={{time()}}"></script>

@endsection
