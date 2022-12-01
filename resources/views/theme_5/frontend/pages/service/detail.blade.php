@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data, 'data_seo_price' => $data_seo_price]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow"/>
@endsection
@if(\App\Library\HelpersDecode::DecodeJson('server_mode',$data->params) == "1")
    @php
        $server_data=\App\Library\HelpersDecode::DecodeJson('server_data',$data->params);
        $server_id = \App\Library\HelpersDecode::DecodeJson('server_id',$data->params);
    @endphp
@endif
@php
    $data_params = json_decode($data->params,true);
    $send_name = \App\Library\HelpersDecode::DecodeJson('send_name',$data->params);
    $send_type = \App\Library\HelpersDecode::DecodeJson('send_type',$data->params);
@endphp
@section('content')
    <script>
        let $params = <?php echo json_encode($data->params); ?>;
        $params = JSON.parse($params);
    </script>

    <div class="container c-container" id="service-detail">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/dich-vu" class="breadcrumb-link">Dịch vụ game</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/dich-vu/{{ @$data->slug}}" class="breadcrumb-link">{{@$data->title}}</a>
            </li>
        </ul>
        <div class="head-mobile">
            <a href="/dich-vu" class="link-back"></a>

            <p class="head-title text-title">Dịch vụ game</p>

            <a href="/" class="home"></a>
        </div>

        <section class="service-detail">
            @include('frontend.widget.__slider__banner__service')
            <div class="section-header d-none d-lg-block">
                <h1 class="section-title">
                    {{ @$data->title}}
                </h1>
            </div>
            <hr>
            <form action="/dich-vu/{{ $data->id }}/purchase" id="form-service-detail" method="POST">
                @csrf
                <input type="hidden" name="index" value="{{ count($send_name)  }}">
                <div class="row">
                    <div class="col-12 col-lg-8 c-pr-8 c-pr-lg-16">
                        <div class="text-title fw-700 title-color-lg c-py-16 c-py-lg-20">
                            Vui lòng chọn thông tin
                        </div>
                        <div class="card unset-lg">
                            <div class="card-body c-p-16 c-p-lg-0 d-flex flex-wrap mx-n2">
                                <!-- Kiểm tra máy chủ -->
                                @if( isset($server_data) && isset($server_id))
                                    <div class="input-group c-px-8 align-content-start">
                                        <div class="form-label">
                                            Chọn máy chủ
                                        </div>
                                        <select name="server" id="">
                                            @forelse($server_data as $k_server => $server)
                                                @if(!strpos($server_data[$k_server], '[DELETE]'))
                                                    <option
                                                        value="{{ $server_id[$k_server] }}">{{ $server_data[$k_server] }}</option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                @endif

                            <!-- Dữ liệu -->
                                <!-- 3 Dạng tiền tệ -->

                                @switch($data_params['filter_type'])
                                    @case('3')
                                    @break
                                <!-- 4 Dạng chọn một -->
                                    @case('4')
                                    <div class="input-group c-px-8">
                                        <div class="form-label">
                                            Chọn gói nạp:
                                        </div>
                                        <select name="selected" id="">
                                            @forelse($data_params['name'] as $k_name => $name)
                                                @if(!!$name)
                                                    <option value="{{ $k_name }}">{{ $name }}</option>
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    @break
                                <!-- 5 Dạng chọn nhiều -->
                                    <!-- Hiển thị ở block khác -->
                                    <!-- 6 Dạng chọn từ A->B (trong khoảng) -->
                                    @case('6')
                                    <div class="input-group c-px-8">
                                        <div class="form-label">
                                            Rank hiện tại
                                        </div>
                                        <select name="rank_from" id="" class="js-change-selected" data-type="0">
                                            @php
                                                $count = count($data_params['name']);
                                            @endphp
                                            @forelse($data_params['name'] as $k_name => $name)
                                                @if(!!$name)
                                                    @if($k_name < $count - 1)
                                                        <option value="{{ $k_name }}">{{ $name }}</option>
                                                    @endif
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="input-group c-px-8">
                                        <div class="form-label">
                                            Rank mong muốn
                                        </div>
                                        <select name="rank_to" id="" class="js-change-selected" data-type="1">
                                            @forelse($data_params['name'] as $k_name => $name)
                                                @if(!!$name)
                                                    @if($k_name > 0)
                                                        <option value="{{ $k_name }}">{{ $name }}</option>
                                                    @endif
                                                @endif
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    @break
                                <!-- 7 Dạng nhập tiền để thanh toán -->
                                    @case('7')
                                    <div class="input-group c-px-8">
                                        <div class="form-label">
                                            Nhập số tiền cần mua:
                                        </div>
                                        <input type="text" id="input_pack" name="selected" placeholder="Số tiền"
                                               value="{{ str_replace(',','.',number_format($data_params['input_pack_min'])) }}">
                                        <span>Số tiền thanh toán phải từ
                                        <span class="t-sub-3">{{number_format($data_params['input_pack_min'])}}đ</span>
                                        đến
                                        <span class="t-sub-3">{{number_format($data_params['input_pack_max'])}}đ</span>
                                    </span>
                                    </div>

                                    <div class="input-group c-px-8 align-content-start">
                                        <div class="form-label">
                                            Hệ số:
                                        </div>
                                        <input type="text" placeholder="Hệ số" id="txt-discount" disabled>
                                    </div>
                                    @break
                                @endswitch
                            </div>
                        </div>

                    @if($data_params['filter_type'] == '5')
                        <!-- service select mobile -->
                            <div class="d-block d-lg-none">
                                <div class="t-sub-1 title-color c-mb-8">
                                    {{ $data_params['filter_name'] }}
                                </div>
                                <div class="card c-py-16 c-pr-4" id="select-service">
                                    <div class="card-body scrollbar" style="--mh:400px">
                                        <!-- body -->
                                        @if(!empty($data_params['name']))
                                            @forelse($data_params['name'] as $k_name => $name)
                                                @if(!!$name)
                                                    <label class="input-checkbox c-mb-8">
                                                        <input type="checkbox" name="" value="{{ @$k_name }}">
                                                        <span class="checkmark"></span>
                                                        <span class="text-label text">{{ @$name }}</span>
                                                    </label>
                                                @endif
                                            @empty
                                            @endforelse
                                        @endif

                                    </div>
                                </div>
                                <div class="t-sub-3 invalid-color error-selected"></div>
                            </div>
                            <input type="hidden" name="selected">
                            <!-- end -->
                        @else
                        @endif

                        <p class="text-title fw-700 title-color-lg c-py-16  c-py-lg-20">
                            Thông tin người dùng
                        </p>
                        <div class="card unset-lg">
                            <div class="card-body c-p-16 c-p-lg-0 d-flex flex-wrap mx-n2">
                                @if(!empty($send_name) && !empty($send_type))
                                    @forelse($send_name as $k_send_name => $send_name_text)
                                        @switch($send_type[$k_send_name])
                                            @case('1')
                                            @case('2')
                                            @case('3')
                                            <div class="input-group c-px-8 align-content-end">
                                                <div class="form-label">
                                                    {{ @$send_name_text }}
                                                </div>
                                                <input type="text" name="customer_data{{$k_send_name}}" placeholder="{{$send_name_text}}">
                                                <div class="t-sub-3 invalid-color"></div>
                                            </div>
                                            @break
                                            @case('5')
                                            <div class="input-group c-px-8 align-content-end">
                                                <div class="form-label">
                                                    {{ @$send_name_text }}
                                                </div>
                                                <div class="toggle-password">
                                                    <input type="password" name="customer_data{{$k_send_name}}"
                                                           placeholder="{{$send_name_text}}">
                                                </div>
                                                <div class="t-sub-3 invalid-color"></div>
                                            </div>
                                            @break
                                        @endswitch
                                    @empty
                                    @endforelse
                                @endif
                            </div>
                        </div>
                        @if(!empty($send_name) && !empty($send_type))
                            @forelse($send_name as $k_send_name => $send_name_text)
                                @switch($send_type[$k_send_name])
                                    @case('7')
                                    <label class="input-checkbox c-mt-16 c-mb-lg-28">
                                        <input type="checkbox" name="customer_data{{$k_send_name}}" class="confirm-rule">
                                        <span class="checkmark"></span>
                                        <span class="text-label">{{ $send_name_text }}</span>
                                    </label>
                                    <div class="t-sub-3 invalid-color error-selected"></div>
                                    @break
                                @endswitch
                            @empty
                            @endforelse
                        @endif
                        <div class="d-none d-lg-block c-pb-22 c-pt-8">
                            <hr>
                        </div>
                        <div class="c-mb-16">
                            <h2 class="text-title-bold d-block d-lg-none c-mb-8">Chi tiết dịch vụ</h2>
                            <div class="card overflow-hidden detailViewBlock">
                                <div class="card-body c-px-16">
                                    <h2 class="text-title-bold d-none d-lg-block c-mb-24 detailViewBlockTitle">Chi tiết dịch vụ</h2>
                                    @if(substr($data->content, 1200))
                                    <div class="content-desc hide detailViewBlockContent">
                                    @else
                                    <div class="content-desc detailViewBlockContent">
                                    @endif
                                        {!! $data->content !!}
                                    </div>
                                </div>
                                @if(substr($data->content, 1200))
                                <div class="card-footer text-center">
                                    <span class="see-more" data-content="Xem thêm nội dung"></span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- Data Bot -->
                        <div id="table-bot">

                        </div>
                        <!-- end data bot -->
                    </div>
                    <div class="col-lg-4 c-pl-8 d-none d-lg-block">
                        <div class="js_sticky" data-top="140">

                            @if($data_params['filter_type'] == '5')
                                <h2 class="text-title fw-700 title-color-lg c-py-16">
                                    {{ $data_params['filter_name'] }}
                                </h2>
                                <div class="card service-select c-py-12 c-pr-8">
                                    <div class="card-body py-0">
                                        @if(!empty($data_params['name']))
                                            @forelse($data_params['name'] as $k_name => $name)
                                                @if(!!$name)
                                                    <label class="input-checkbox c-mb-8">
                                                        <input type="checkbox" name="" value="{{ @$k_name }}">
                                                        <span class="checkmark"></span>
                                                        <span class="text-label text">{{ @$name }}</span>
                                                    </label>
                                                @endif
                                            @empty
                                            @endforelse
                                        @endif
                                    </div>
                                </div>
                                <div class="t-sub-3 invalid-color error-selected"></div>
                            @endif
                                <div class="card section-pay c-mt-16">
                                    <div class="card-body c-p-16">
                                        <div class="text-title-bold">Báo giá: <span
                                                class="text-title secondary total__price c-ml-8">0 VND</span></div>
                                        <div class="c-py-12">
                                            <hr>
                                        </div>
                                        @if(\App\Library\AuthCustom::check())
                                            <a href="javascript:void(0)" class="btn primary show-confirm">Thanh toán</a>
                                        @else
                                            <a href="javascript:void(0)" class="btn primary" onclick="openLoginModal()">Thanh toán</a>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="footer-mobile c-p-16">
                <span class="fw-lg-500 d-inline-block">Báo giá:</span>
                <br>
                <div class="text-title-bold secondary d-inline-block total__price">0 VND</div>
                @if(\App\Library\AuthCustom::check())
                    <button type="button" class="btn primary show-confirm">Giao dịch ngay</button>
                @else
                    <button type="button" class="btn primary" onclick="openLoginModal()">Giao dịch ngay</button>
                @endif
            </div>
        </section>

        @include('frontend.pages.service.widget.__related')
    </div>


    @if(isset($data->note))

        <div class="modal fade modal-big modal-tra-gop" id="notiseviceModal">
            <div class="modal-dialog modal-dialog-centered modal-custom">
                <div class="modal-content c-p-24">
                    <div class="modal-header">
                        <h2 class="modal-title center">Thông báo</h2>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body py-0 pl-0 c-pr-8 c-mt-24" id="modal-body-scroll">
                        {!! $data->note !!}
                    </div>
                </div>
            </div>
        </div>
        <script>

            $(document).ready(function(){
                $('#notiseviceModal').modal('show');
            })

        </script>
    @endif

    <!-- Modal xác nhận thanh toán -->
    <div class="modal fade modal-big" id="orderModal">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content c-p-24">
                <div class="modal-header">
                    <p class="modal-title center">Xác nhận thanh toán</p>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                    <div class="dialog--content__title fw-700 fz-13 c-mb-12 text-title-theme">
                        Thông tin yêu cầu
                    </div>
                    <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                        <div class="card--attr justify-content-between d-flex text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Tài khoản
                            </div>
                            @if(\App\Library\AuthCustom::check())
                                <div
                                    class="card--attr__value fz-13 fw-500">{{ \App\Library\AuthCustom::getName() }}</div>
                            @else
                            @endif
                        </div>
                    </div>
                    <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fz-13 fw-400 text-center">
                                Dịch vụ
                            </div>
                            <div class="card--attr__value fz-13 fw-500">
                                {{@$data->title}}
                            </div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center text-order">
                                Gói
                            </div>
                            <div class="show-pack" style="max-width: 75%">

                            </div>
                        </div>
                    </div>
                    <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fz-13 fw-400 text-center">
                                Phương thức thanh toán
                            </div>
                            <div class="card--attr__value fz-13 fw-500">
                                Tài khoản Shopbrand
                            </div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Phí thanh toán
                            </div>
                            <div class="card--attr__value fz-13 fw-500">
                                Miễn phí
                            </div>
                        </div>
                    </div>
                    <div class="card--gray c-mb-0 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                        <div class="card--attr__total justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Tổng thanh toán
                            </div>
                            <div class="card--attr__value fz-13 fw-500">
                                <a href="javascript:void(0)" class="c-text-primary total__price total__price__modal">0 đ</a></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn primary submit-data-form">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Step Xác nhận -->
    <div class="step" id="step2">
        <div class="head-mobile">
            <a href="javascript:void(0) " class="link-back close-step"></a>

            <p class="head-title text-title">Xác nhận thanh toán</p>

            <a href="/" class="home"></a>
        </div>
        <div class="body-mobile">
            <div class="body-mobile-content c-p-16">
                <div class="dialog--content__title fw-700 fz-15 c-mb-12 text-title-theme">
                    Thông tin yêu cầu
                </div>
                <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                    <div class="card--attr justify-content-between d-flex text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center text-order">
                            Tài khoản
                        </div>
                        @if(\App\Library\AuthCustom::check())
                            <div
                                class="card--attr__value fz-13 fw-500">{{ \App\Library\AuthCustom::getName() }}</div>
                        @else
                        @endif
                    </div>
                </div>
                <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                    <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center text-order">
                            Dịch vụ
                        </div>
                        <div class="card--attr__value fz-13 fw-500">
                            {{@$data->title}}
                        </div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center text-order">
                            Gói
                        </div>
                        <div class="show-pack" style="max-width: 75%;">

                        </div>
                    </div>
                </div>
                <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content">
                    <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                        <div class="card--attr__name fz-13 fw-400 text-center text-order">
                            Phương thức thanh toán
                        </div>
                        <div class="card--attr__value fz-13 fw-500">
                            Tài khoản Shopbrand
                        </div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Phí thanh toán
                        </div>
                        <div class="card--attr__value fz-13 fw-500">
                            Miễn phí
                        </div>
                    </div>
                </div>
                <div class="card--gray c-mb-0 c-pt-8 c-pb-8 c-pl-12 brs-8 c-pr-12 g_mobile-content">
                    <div class="card--attr__total justify-content-between d-flex text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center text-order">
                            Tổng thanh toán
                        </div>
                        <div class="card--attr__value fz-13 fw-500">
                            <a href="javascript:void(0)" class="c-text-primary total__price total__price__modal">0 đ</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="footer-mobile">
            <div class="group-btn" style="--data-between: 12px">
                <button class="btn primary btn-success-mobile submit-data-form">Xác nhận</button>
            </div>
        </div>
    </div>
    <!-- Thanh toán thành công -->
    <div class="modal fade modal-small" id="orderSuccses">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content">
                <div class="modal-header justify-content-center p-0">
                    <img class="c-pt-20 c-pb-20" src="/assets/frontend/{{theme('')->theme_key}}/image/son/success.png" alt="">
                </div>
                <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                    <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Gửi yêu cầu thuê thành công</p>
                    <p class="fw-400 fz-13 c-mt-10 mb-0" id="modal-success-message"></p>
                </div>
                <div class="modal-footer c-p-24">
                    <a href="/dich-vu-da-mua" class="btn primary">Lịch sử</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Thanh toán thất bại -->
    <div class="modal fade modal-328" id="orderFailed">
        <div class="modal-dialog modal-dialog-centered c-px-sm-16">
            <div class="modal-content">
                <div class="modal-body text-center c-p-0">
                    <div class="banner">
                        <img width="143" height="114" class="" src="/assets/frontend/{{theme('')->theme_key}}/image/trong/modal-failed.png" alt="">
                    </div>
                    <p class="t-sub-1 title-color">Thanh toán thất bại</p>
                    <span class="t-body-1 res-message" id="modal-failed-message">

                    </span>
                </div>
                <div class="modal-footer group-btn c-mt-24" style="--data-between: 12px">
                    <button type="button" class="btn ghost" data-dismiss="modal">Đóng</button>
                    <a href="/nap-tien" class="btn primary">Nạp tiền</a>
                </div>
            </div>
        </div>
    </div>




    <a href="#orderModal" class="d-none show__modal" data-toggle="modal"></a>
    <span class="d-none js-step show__step" data-target="#step2"></span>


    <!-- Số dư -->
    @if(\App\Library\AuthCustom::check())
        <input id="surplus" type="hidden" value="{{ \App\Library\AuthCustom::user()->balance }}">
    @endif
@endsection
@section('scripts')
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/lib/validate-form/validate.js"></script>--}}
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/service/detail.js?v={{ time() }}"></script>
@endsection
