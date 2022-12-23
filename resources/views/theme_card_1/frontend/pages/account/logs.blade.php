@extends('frontend.layouts.master')
@section('content')
    <div class="row my-3" >
        <div class="col-lg-3  col-sm-3 col-md-3 col-12">
            @include('frontend.layouts.includes.menu_profile')
        </div>
        <div class="col-lg-9  col-md-9 col-sm-12 col-12">
            <div class="bg-white">
                <div class="menu-content" style="min-height: 468px;padding:15px 20px">
                    <div class="title">
                        <h3>Tài khoản đã mua</h3>
                    </div>
                    <div class="wapper-grid profile mt-3 mt-lg-0">

                        <div class="booking_detail"></div>
                        <form class="form-input-group form-charge__accountls">
                            <div class="row">
                                <div class="col-12 col-lg-4" style="padding-top: 8px; padding-bottom: 8px">
                                    <div class="input-group m-b-10">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <p class="input-group-btn-p">Mã tài khoản</p>
                                            </span>
                                            <input type="text" name="serial" class="form-control serial" placeholder="Mã tài khoản" style="height: 40px">
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-12 col-lg-4" style="padding-top: 8px; padding-bottom: 8px">
                                    <div class="input-group m-b-10">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <p class="input-group-btn-p">Trạng thái</p>
                                            </span>
                                            {{Form::select('status',array(''=>'-- Chọn trạng thái --')+config('module.acc.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'form-control status', 'style' => 'height: 40px' ))}}
                                        </div>
                                    </div>
                                
                                </div>
                                
                                <div class="col-12 col-lg-4" style="padding-top: 8px; padding-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <p class="input-group-btn-p">
                                            <i class="fa fa-calendar"></i>
                                        </p>
                                        </span>
                                        <input type="text" class="form-control input-group-addon started_at" name="started_at" autocomplete="off" placeholder="Từ ngày" style="height: 40px">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4" style="padding-top: 8px; padding-bottom: 8px">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                        <p class="input-group-btn-p">
                                            <i class="fa fa-calendar"></i>
                                        </p>
                                        </span>
                                        <input type="text" class="form-control input-group-addon ended_at" name="ended_at" autocomplete="off" placeholder="Đến ngày" style="height: 40px">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4" style="padding-top: 8px; padding-bottom: 8px">
                                    <div class="input-group m-b-10">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <p class="input-group-btn-p">Giá tiền</p>
                                            </span>
                                            {{Form::select('price',array(''=>'-- Chọn giá tiền --')+config('module.acc.price'),old('price', isset($data['price']) ? $data['price'] : null),array('class'=>'form-control price', 'style' => 'height: 40px' ))}}
                                        </div>
                                    </div>
                                
                                </div>

                                <div class="col-12 col-lg-4" style="padding-top: 8px; padding-bottom: 8px">
                                    <div class="input-group m-b-10">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <p class="input-group-btn-p">Danh mục</p>
                                            </span>
                                            <select name="key" class="form-control key" style="height: 40px">
                                                <option value="">--Tất cả game--</option>
                                                @foreach($datacategory as $val)
                                                    <option value="{{ $val->slug }}">{{ $val->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success btn-search " style="position: relative">
                                        Tìm kiếm
                                    </button>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-all position-relative" >
                                        Tất cả
                                    </a>
                                </div>
                            </div>
                        </form>

                        <div id="data_pay_account_history" style="position: relative">
                            <div class="body-box-loading result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
                                <div class="d-flex justify-content-center">
                                    <span class="pulser"></span>
                                </div>
                            </div>


                        </div>


                        <!-- END: PAGE CONTENT -->

                        <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">

                        </div>

                    </div>
                </div>
        
                <style>
                    .table-custom-res {
                        margin: auto;
                        overflow-x: auto;
                        width: 100%;
        
                    }
                </style>
                
                
            </div>
        </div>


    </div>
    
    <div class="modal fade" id="taikhoandamua_password" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-dialog__account" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding-left: 16px;padding-right: 16px">
                    <h5 class="modal-title" style="font-weight: 600">Xác nhận mua tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div class="form-horizontal form__show__chitiet" style="position: relative">
                        <div class="body-box-loading result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
                            <div class="d-flex justify-content-center">
                                <span class="pulser"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                </div>
                {{--                </form>--}}
            </div>
        </div>
    </div>
    <style>
        #taikhoandamua_password .modal-dialog {
            max-width: 600px;
        }

        #taikhoandamua_password .copy_acc {
            border: 1px solid #d0d7de;
            height: 40px;
        }

    </style>

    <input type="hidden" name="hidden_page" id="hidden_page_service" class="hidden_page_service" value="1" />

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/acc-history.js"></script>

@endsection
