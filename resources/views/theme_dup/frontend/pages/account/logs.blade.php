@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <div class="account">
        <div class="account_content">
            <div class="booking_detail"></div>
            <div class="container">
                @include('frontend.layouts.includes.menu_profile')
                <div class="account_sidebar_content">
                    <div class="account_sidebar_content_title">
                        <p>TÀI KHOẢN ĐÃ MUA</p>

                        <div class="account_sidebar_content_line"></div>
                    </div>

                    <div class="account_content_transaction_history">
                        <form class="form-charge form-charge__accountls account_content_transaction_history__v2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span >Mã tài khoản #</span>
                                        <input type="text" name="serial" class="form-control serial" placeholder="Mã tài khoản">

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span >Trạng thái</span>

                                        {{Form::select('status',array(''=>'-- Chọn trạng thái --')+config('module.acc.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'form-control status'))}}

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group date" id="transaction_history_start">
                                        <span class="input-group-btn input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                            <input type="text" class="form-control input-group-addon started_at" name="started_at" autocomplete="off" placeholder="Từ ngày">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <div class="input-group date" id="transaction_history_end">
                                        <span class="input-group-btn input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                        </span>
                                            <input type="text" class="form-control input-group-addon ended_at" name="ended_at" autocomplete="off" placeholder="Đến ngày">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span >Giá tiền</span>

                                        {{Form::select('price',array(''=>'-- Chọn giá tiền --')+config('module.acc.price'),old('price', isset($data['price']) ? $data['price'] : null),array('class'=>'form-control price'))}}

                                    </div>
                                </div>

                                <div class="col-md-4" id="datahtmlcategory">
                                    @if(isset($datacategory) && count($datacategory) > 0)
                                        <div class="input-group">
                                            <span >Game</span>
                                            <select name="key" class="form-control key">
                                                <option value="">--Tất cả game--</option>
                                                @foreach($datacategory as $val)
                                                    <option value="{{ $val->slug }}">{{ $val->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 item_buy_form_search">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <button type="submit" class="btn btn_timkiem" style="position: relative">
                                                    Tìm kiếm
                                                    <div class="row justify-content-center loading-data__timkiem">

                                                    </div>
                                                </button>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-all" style="position: relative">
                                                    Tất cả
                                                    <div class="row justify-content-center loading-data__all">
                                                    </div>
                                                </a>
                                            </div>

                                        </div>
                                        {{--                                        <div class="col-md-6">--}}
                                        {{--                                            <div class="row justify-content-end">--}}
                                        {{--                                                <div class="col-12 col-md-auto">--}}
                                        {{--                                                    <div class="input-group">--}}
                                        {{--                                                        <span class="input-group-addon">Sắp xếp theo</span>--}}
                                        {{--                                                        <select type="text" name="sort_by" class="form-control sort_by">--}}
                                        {{--                                                            <option value="">Chọn cách sắp xếp</option>--}}
                                        {{--                                                            <option value="random">Ngẫu nhiên</option>--}}
                                        {{--                                                            <option value="price_start">Giá tiền từ cao đến thấp</option>--}}
                                        {{--                                                            <option value="price_end">Giá tiền từ thấp đến cao</option>--}}
                                        {{--                                                            <option value="published_at">Ngày Mua</option>--}}
                                        {{--                                                            <option value="created_at_start">Mới nhất</option>--}}
                                        {{--                                                            <option value="created_at_end">Cũ nhất</option>--}}
                                        {{--                                                        </select>--}}
                                        {{--                                                    </div>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div id="data_pay_account_history" style="position: relative">
                            <div class="body-box-loadding result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
                                <div class="d-flex justify-content-center">
                                    <span class="pulser"></span>
                                </div>
                            </div>
                            @include('frontend.pages.account.widget.__datalogs')
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="taikhoandamua_password" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-dialog__account" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight: 600">Xác nhận mua tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div class="form-horizontal form__show__chitiet">

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
        }

        /*#tableacchstory{*/
        /*    display: none;*/
        /*}*/

    </style>
    <input type="hidden" name="serial_data" class="serial_data" value="">
    <input type="hidden" name="key_data" class="key_data" value="">
    <input type="hidden" name="price_data" class="price_data" value="">
    <input type="hidden" name="status_data" class="status_data" value="">
    <input type="hidden" name="started_at_data" class="started_at_data" value="">
    <input type="hidden" name="ended_at_data" class="ended_at_data" value="">
    <input type="hidden" name="hidden_page" id="hidden_page_service" class="hidden_page_service" value="1" />
    <input type="hidden" name="chitiet_data" class="chitiet_data" value="0" />
    <input type="hidden" name="sort_by_data" class="sort_by_data" value="">
    <input type="hidden" name="id_data" class="id_data" value="">

    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/acc-history.js"></script>
    {{--    <script src="/js/{{theme('')->theme_key}}/account/logs.js"></script>--}}
@endsection
