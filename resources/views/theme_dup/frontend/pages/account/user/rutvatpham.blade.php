@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
<div class="account">

    <div class="account_content">
        <div class="container">
            @include('frontend.pages.account.sidebar')
            <div class="account_sidebar_content">
                <div class="account_sidebar_content_title">
                    <p>RÚT KIM CƯƠNG FREE FIRE</p>
                    <div class="account_sidebar_content_line"></div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Chọn loại vật phẩm khác:
                    </label>
                    <div class="col-md-6">
                        <div class="input-group" style="width: 100%">
                            <select name="" id="" class="form-control">
                                <option value="">--Tất cả--</option>
                                <option value="1">Nạp thẻ tự động</option>
                                <option value="2">Nạp thẻ chậm</option>
                                <option value="">Chuyển tiền</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="text-center" style="color: #eb5d68;font-size: 22px">Số kim cương hiện có: 0</div>

                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Gói muốn rút:

                    </label>
                    <div class="col-md-6">
                        <div class="input-group" style="width: 100%">
                            <select name="" id="" class="form-control">
                                <option value="">Bảng quy đổi kim cương</option>
                                <option value="1">Nạp thẻ tự động</option>
                                <option value="2">Nạp thẻ chậm</option>
                                <option value="">Chuyển tiền</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        ID trong game:

                    </label>
                    <div class="col-md-6">
                        <div class="input-group" style="width: 100%">
                            <input type="text" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-md-3 control-label">
                        Số điện thoại ( nếu có ):

                    </label>
                    <div class="col-md-6">
                        <div class="input-group" style="width: 100%">
                            <input type="text" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="form-group row " style="margin-top: 40px">
                    <div class="col-md-6" style="    margin-left: 25%;">
                        <button class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block ">Thực hiện</button>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
