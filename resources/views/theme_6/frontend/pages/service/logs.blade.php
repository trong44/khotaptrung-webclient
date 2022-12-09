@extends('frontend.layouts.master')
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
                        <p>DỊCH VỤ ĐÃ MUA</p>
                        <div class="account_sidebar_content_line"></div>
                    </div>
                    <div class="booking_detail"></div>
                    <div class="account_content_transaction_history">
                        <form class="form-charge account_content_transaction_history__v2 account_service_history__v2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span >Mã ID</span>
                                        <input type="text" name="id" class="form-control id" placeholder="Mã ID">

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span >-- Trạng thái --</span>
                                        <select type="text" name="status" class="form-control status">
                                            <option value="">Chọn trạng thái</option>
                                            <option value="0">Đã hủy</option>
                                            <option value="1">Đang chờ xử lý</option>
                                            <option value="2">Đang thực hiện</option>
                                            <option value="3">Từ chối</option>
                                            <option value="4">Hoàn tất</option>
                                            <option value="5">Thất bại</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-4 data__service__cate">
                                    @if(isset($datacate) && count($datacate) > 0)
                                        <div class="input-group">
                                            <span >Loại dịch vụ</span>
                                            <select name="key" class="form-control key">
                                                <option value="">-- Tất cả các dịch vụ --</option>
                                                @foreach($datacate as $val)
                                                    <option value="{{ $val->slug }}">{{ $val->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
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
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <button class="btn c-theme-btn c-btn-square m-b-10 btn-timkiem" type="submit" style="position: relative"><i class="fas fa-search"></i>
                                        Tìm kiếm
                                        <div class="row justify-content-center loading-data__timkiem">

                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="javascript:void(0)" class="btn c-btn-square m-b-10 btn-danger btn-hom-nay mb-2 mr-2" style="position: relative">
                                        <i class="fas fa-calendar-alt"></i> Hôm nay
                                        <div class="row justify-content-center loading-data__timkiem">

                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="btn c-btn-square m-b-10 btn-danger btn-hom-qua mb-2 mr-2" style="position: relative">
                                        <i class="fas fa-calendar-alt"></i> Hôm qua
                                        <div class="row justify-content-center loading-data__timkiem">

                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="btn c-btn-square m-b-10 btn-danger btn-thang-nay mb-2 mr-2" style="position: relative">
                                        <i class="fas fa-calendar-alt"></i> Tháng này
                                        <div class="row justify-content-center loading-data__timkiem">

                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="loaddingtatca btn c-btn-square m-b-10 c-theme-btn btn-all mb-2 mr-2" style="position: relative">
                                        <i class="fas fa-calendar-alt"></i> Tất cả
                                        <div class="row justify-content-center loading-data__timkiem">

                                        </div>
                                    </a>
                                </div>
                            </div>
                        </form>

                        <div id="data_service_history" style="position: relative">
                            <div class="body-box-loadding result-amount-loadding" style="position: absolute;top: 100%;left: 50%">
                                <div class="d-flex justify-content-center">
                                    <span class="pulser"></span>
                                </div>
                            </div>
                            @include('frontend.pages.service.widget.__datalogs')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @if ($content = Session::get('content'))
        <div class="modal fade" id="noticeAfterModal" style="display: none;" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                    <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                        {!!$content!!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#noticeAfterModal').modal('show');
            });
        </script>
    @endif

    <input type="hidden" class="started_at_day_dv" name="started_at_day_dv" value="{{ \Carbon\Carbon::now()->startOfDay() }}">
    <input type="hidden" class="end_at_day_dv" name="end_at_day_dv" value="{{ \Carbon\Carbon::now()->endOfDay() }}">
    <input type="hidden" class="started_at_yes_dv" name="started_at_yes_dv" value="{{ \Carbon\Carbon::yesterday()->startOfDay() }}">
    <input type="hidden" class="end_at_yes_dv" name="end_at_yes_dv" value="{{ \Carbon\Carbon::yesterday()->endOfDay()}}">
    <input type="hidden" class="started_at_month_dv" name="started_at_month_dv" value="{{ \Carbon\Carbon::now()->startOfMonth() }}">
    <input type="hidden" class="end_at_month_dv" name="end_at_month_dv" value="{{ \Carbon\Carbon::now()->endOfMonth() }}">

    <input type="hidden" name="id_data" class="id_data">
    <input type="hidden" name="key_data" class="key_data">
    <input type="hidden" name="status_data" class="status_data">
    <input type="hidden" name="started_at_data" class="started_at_data">
    <input type="hidden" name="ended_at_data" class="ended_at_data">
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/service/service-history.js"></script>
@endsection

