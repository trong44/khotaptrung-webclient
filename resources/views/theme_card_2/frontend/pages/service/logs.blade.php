@extends('frontend.layouts.master')
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
                    <div class="content-profile" style="min-height: 468px;">
                        <h3>Dịch vụ đã mua</h3>
                        <hr class="lines">
                        <div class="booking_detail"></div>
                        <form class="form-charge account_content_transaction_history__v2 account_service_history__v2">
                            <div class="row mb-3">


                                <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="margin-bottom: 8px">
                                    <div class="input-group m-input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Mã ID</span>
                                        </div>
                                        <input type="text" name="id" class="form-control id" placeholder="Mã ID">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="margin-bottom: 8px">
                                    <div class="input-group m-input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Trạng thái</span>
                                        </div>
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

                                <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="margin-bottom: 8px">
                                    <div class="input-group m-input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Trạng thái</span>
                                        </div>
                                        <select name="key" class="form-control key">
                                            <option value="">-- Tất cả các dịch vụ --</option>
                                            @foreach($datacate as $val)
                                                <option value="{{ $val->slug }}">{{ $val->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>




                                <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="margin-bottom: 8px">
                                    <div class="form-group m-form__group">
                                        <div class="input-group m-input-group date date-picker" data-rtl="false">
                                            <div class="input-group-prepend"><span class="input-group-text">Từ ngày</span></div>
                                            <input type="text" class="form-control c-square c-theme started_at" id="m_datepicker_1" name="started_at" autocomplete="off" data-date-format="dd/mm/yyyy" placeholder="Từ ngày" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 col-12" style="margin-bottom: 8px">
                                    <div class="form-group m-form__group">
                                        <div class="input-group m-input-group date date-picker"
                                             data-date-format="dd/mm/yyyy" data-rtl="false">
                                            <div class="input-group-prepend"><span
                                                    class="input-group-text">Đến ngày</span></div>
                                            <input type="text" class="form-control c-square c-theme ended_at" id="m_datepicker_1" name="ended_at" autocomplete="off" data-date-format="dd/mm/yyyy" placeholder="Đến ngày" value="">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">

                                    <button type="submit" class="btn btn-timkiem btn btn-success btn-sm m-btn m-btn--custom" style="position: relative">
                                        Tìm kiếm

                                    </button>
                                    <a style="font-family: 'Nunito', sans-serif" class="btn btn-danger btn-sm m-btn m-btn--custom btn-all" href="javascript:void(0)">Tất cả</a>
                                </div>
                            </div>


                        </form>
                        <div id="data_service_history" class="card-table" style="position: relative">
                            <div class="row justify-content-center position-absolute" style="top: 50%;left: 50%" id="loading-data">
                                <div class="loading-wrap mb-3">
                                    <span class="modal-loader-spin mb-3"></span>
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



