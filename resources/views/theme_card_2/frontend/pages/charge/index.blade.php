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
                            <h3>Nạp thẻ</h3>
                            <hr class="lines">
                            <div class="wapper profile">
                                <form enctype="multipart/form-data" class="recharge_card_pay" id="recharge-card-form" name="recharge-card-form">
                                    <input type="hidden" name="_token" value="xFq3elRKASTTapeLJdzOUIWmPQd26P46cExTroYU">
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-3 col-form-label">Tài khoản:</label>
                                        <div class="col-9">
                                            <input class="form-control m-input" type="text" value="Đỗ Hải Nam" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-3 col-form-label">Loại thẻ:</label>
                                        <div class="col-9">
                                            <select class="form-control m-input " name="type" id="type" required=""><option value="">-- Chọn loại thẻ --</option><option value="VIETNAMOBLIE">VIETNAMOBLIE</option><option value="GARENA">GARENA</option><option value="VIETTEL">VIETTEL</option><option value="VINAPHONE">VINAPHONE</option><option value="MOBIFONE">MOBIFONE</option><option value="VCOIN">VCOIN</option><option value="GATE">GATE</option><option value="ZING">ZING</option></select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-3 col-form-label">Mệnh giá:</label>
                                        <div class="col-9">
                                            <select class="form-control m-input " name="amount" id="amount" required="">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-3 col-form-label">Mã số thẻ:</label>
                                        <div class="col-9">
                                            <input class="form-control m-input refresh" name="pin" type="text" value="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-3 col-form-label">Số Serial:</label>
                                        <div class="col-9">
                                            <input class="form-control m-input refresh" name="serial" type="text" value="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <label for="" class="col-3 col-form-label">Mã bảo vệ:</label>
                                        <div class="col-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control m-input refresh" id="captcha" name="captcha" placeholder="Mã bảo vệ" maxlength="3" autocomplete="off" required="">
                                                <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2" style="padding: 1px; cursor: pointer">
                                                    <img src="https://muathegarena.com/captcha/flat?59A29AKC" height="30px" id="imgcaptcha" onclick="document.getElementById('imgcaptcha').src ='https://muathegarena.com/captcha/flat?EoaguwRZ'+Math.random();document.getElementById('captcha').focus();">
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group text-center">
                                        <button style="width:100%" type="submit" class="btn btn-recharge_card btn-success " data-loading-text="<i class='fa fa-spinner fa-spin '></i>"><span class="content-ajax">NẠP THẺ</span> <div class="m-loader m-loader--lg m-loader--success mb-3 mt-2 ajax-loader text-center" style="width: 30px;display: none"></div></button>
                                    </div>
                                </form>

                            </div>
                            <div id="content-cart" class="m-portlet__body">
                                <div style="overflow-x: auto" class="tab-content">
                                    <table class="table table-hover table-custom-res" id="deposit-table">
                                        <thead>
                                        <tr role="row">
                                            <th>Thời gian</th>

                                            <th>Kiểu nạp</th>
                                            <th>Nhà mạng</th>
                                            <th>Mã thẻ</th>
                                            <th>Serial</th>
                                            <th>Trị giá</th>
                                            <th>Kết quả</th>
                                            <th>Thực nhận</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr class="" style="background-color: #abe7ed;">
                                            <td colspan="2" class="row-date"><b>Tổng cộng các trang:</b></td>
                                            <td class="row-date-sub"><b> 0 thẻ </b></td>
                                            <td></td>
                                            <td></td>
                                            <td class="row-date-sub"><b> 0 </b></td>
                                            <td class="row-date-sub"><b> 0 </b></td>
                                            <td class="row-date-sub"><b> 0 </b></td>

                                        </tr>



                                        <tr>
                                            <td colspan="3"><b>Ngày 12/10/2022</b></td>









                                            <td><b>1 thẻ</b></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>0 </b></td>
                                            <td><b>0 </b></td>


                                        </tr>
                                        <tr>
                                            <td>15:25:43</td>

                                            <td>
                                                Nạp tự động
                                            </td>
                                            <td>VIETTEL</td>
                                            <td>98798798789798</td>
                                            <td>987987987897</td>
                                            <td>10,000</td>
                                            <td>

                                                <b class='text-danger'>Thẻ sai</b>

                                            </td>


                                            <td>
                                                <span class="c-font-bold text-info">+0đ</span>
                                            </td>

                                        </tr>




                                        </tbody>
                                    </table>
                                    <!-- END: PAGE CONTENT -->

                                    <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">

                                    </div>
                                    <!-- END: PAGE CONTENT -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
