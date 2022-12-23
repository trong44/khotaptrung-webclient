@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow"/>
@endsection
@section('content')
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

    {{--    @dd($data_params)--}}
    <input type="hidden" id="data_params" value="{{ $data->params }}">
    @if (\App\Library\AuthCustom::check())
        <input type="hidden" id="userBalance" value="{{ App\Library\AuthCustom::user()->balance }}">
    @endif
    <input type="hidden" name="slug" id="slug" value="{{ $slug }}"/>
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
            {{--            Slider baner    --}}
            @include('frontend.widget.__slider__banner__service')
            <div class="section-header d-none d-lg-block">
                <h1 class="section-title">
                    {{ @$data->title }}
                </h1>
            </div>
            <hr>
            <div class="text-title fw-700 title-color-lg c-py-16 c-py-lg-20">
                Vui lòng chọn thông tin
            </div>
            <form action="/dich-vu/{{ $data->id }}/purchase" method="POST" id="formDataService">
                @csrf
                <input type="hidden" name="index" value="{{ count($send_name)}}">
                <div class="row">
                    <div class="col-12 col-lg-8 c-pr-8 c-pr-lg-16">
                        @if(\App\Library\HelpersDecode::DecodeJson('server_mode',$data->params) == "1")
                            @php
                                $server_data=\App\Library\HelpersDecode::DecodeJson('server_data',$data->params);
                                $server_id = \App\Library\HelpersDecode::DecodeJson('server_id',$data->params);
                            @endphp
                            <span class=" mb-15 control-label bb">Chọn máy chủ:</span>
                            @if(!empty($server_data))
                                {{--                                        @dd($server_data)--}}
                                <div class="mb-15 c-pt-8 c-pb-8">
                                    <select name="server" class="server-filter t14" style="">
                                        @for($i = 0; $i < count($server_data); $i++)
                                            @if((strpos($server_data[$i], '[DELETE]') === false))
                                                <option value="{{$server_id[$i]}}">{{$server_data[$i]}}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>
                            @endif
                        @endif

                        @if(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) == "4"){{--//dạng chọn một--}}
                        @php
                            $name=\App\Library\HelpersDecode::DecodeJson('name',$data->params);
                            $price=\App\Library\HelpersDecode::DecodeJson('price',$data->params);
                        @endphp
                        @if(!empty($name))
                            <span class="mb-15 control-label bb">{{\App\Library\HelpersDecode::DecodeJson('filter_name',$data->params)}}:</span>
                            <div class="mb-15 c-pt-8">
                                <select name="selected" class="s-filter t14" style="">
                                    @for ($i = 0; $i < count($name); $i++)
                                        @if($name[$i]!=null)
                                            <option value="{{$i}}">{{$name[$i]}}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                        @endif

                        @elseif(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) == "7"){{--////dạng nhập tiền thành toán--}}
                        <span class="mb-15 control-label bb">Nhập số tiền cần mua:</span>
                        <div class="mb-15 c-pt-8 c-pb-8">
                            <input autofocus=""
                                   value="{{old('input_pack',\App\Library\HelpersDecode::DecodeJson('input_pack_min',$data->params))}}"
                                   class=" t14 price " id="input_pack" type="text" placeholder="Số tiền">
                            <div class="c-pt-4">
                                <span style="font-size: 14px;">Số tiền thanh toán phải từ <b style="font-weight:bold;">{{ str_replace(',','.',number_format(\App\Library\HelpersDecode::DecodeJson('input_pack_min',$data->params))) }}đ</b>  đến <b
                                        style="font-weight:bold;">{{ str_replace(',','.',number_format(\App\Library\HelpersDecode::DecodeJson('input_pack_max',$data->params))) }}đ</b> </span>
                            </div>
                        </div>
                        <span class="mb-15 control-label bb">Hệ số:</span>
                        <div class="mb-15 c-pt-8 c-pb-8">
                            <input type="text" id="txt-discount" class=" t14" placeholder="" value=""
                                   readonly="">
                        </div>

                        @elseif(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) =="6") {{--//dạng chọn a->b--}}
                        <div class="col-md-12 left-right">
                            <div class="row body-title-detail-ct">
                                <div
                                    class="col-auto text-left detail-service-col body-title-detail-col-ct">
                                    <div class="row marginauto">
                                        <div
                                            class="col-md-12 left-right body-title-detail-span-ct">
                                            <span>Rank hiện tại</span>
                                        </div>
                                        <div
                                            class="col-md-12 left-right body-title-detail-select-ct data-select-rank-start">
                                            <select class="wide js-selected" name="rank_from">
                                                @forelse($data_params['name'] as $k_name => $name)
                                                    @if(!!$name)
                                                        <option value="{{ $k_name }}">{{ $name }}</option>
                                                    @endif
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>

                                        <div class="col-m-12 rank-start-error">

                                        </div>

                                    </div>


                                </div>

                                <div
                                    class="col-auto text-left detail-service-col media-col-558 body-title-detail-col-ct">
                                    <div class="row marginauto">
                                        <div
                                            class="col-md-12 left-right body-title-detail-span-ct">
                                            <span>Rank mong muốn</span>
                                        </div>
                                        <div
                                            class="col-md-12 left-right body-title-detail-select-ct data-select-rank-end">
                                            <select class="wide js-selected" name="rank_to">
                                                @forelse($data_params['name'] as $k_name => $name)
                                                    @if(!!$name)
                                                        <option value="{{ $k_name }}">{{ $name }}</option>
                                                    @endif
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="col-m-12 rank-end-error">

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endif


                        <!-- service select mobile -->
                            @if(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) == "5")
                        <div class="d-block d-lg-none">
                            <div class="t-sub-1 title-color c-mb-8 fz-lg-13">
                                Tùy chọn mở rộng
                            </div>
                            <div class="card service-select c-py-16 c-pr-4" id="select-service">
                                <div class="" style="--mh:400px">
                                    <!-- body -->
                                    {{--//dạng chọn nhiều--}}
                                        <div class="card-body py-0 s-filter select-multi">
                                            @php
                                                $name=\App\Library\HelpersDecode::DecodeJson('name',$data->params);
                                                $price=\App\Library\HelpersDecode::DecodeJson('price',$data->params);
                                            @endphp
                                            @if(!empty($name))
                                                @for ($i = 0; $i < count($name); $i++)
                                                    @if($name[$i]!=null)
                                                        <label class="input-checkbox c-mb-8">
                                                            <input value="{{$i}}" type="checkbox" name="select">
                                                            <span class="checkmark"></span>
                                                            <span class="text-label text"
                                                                  for="{{$i}}">{{$name[$i]}}{{isset($price[$i])? " - ".number_format($price[$i]). " VNĐ":""}}</span>
                                                        </label>
                                                    @endif
                                                @endfor
                                            @endif
                                        </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!-- end -->

{{--                        <h2 class="text-title fw-700 title-color-lg c-py-16  c-py-lg-20">--}}
{{--                            Tuỳ chọn tướng (với Game Moba)--}}
{{--                        </h2>--}}
{{--                        <div class="card unset-lg">--}}
{{--                            <div class="card-body c-p-16 c-p-lg-0 d-flex flex-wrap mx-n2">--}}

{{--                                @php--}}
{{--                                    $send_name=\App\Library\HelpersDecode::DecodeJson('send_name',$data->params);--}}
{{--                                    $send_type=\App\Library\HelpersDecode::DecodeJson('send_type',$data->params);--}}
{{--                                    $index = 0;--}}
{{--                                @endphp--}}
{{--                                @if(!empty($send_name)&& count($send_name)>0)--}}
{{--                                    @for ($i = 0; $i < count($send_name); $i++)--}}
{{--                                        @if($send_name[$i]!=null)--}}
{{--                                            --}}{{--check trường của sendname--}}
{{--                                            @if($send_type[$i]==1 || $send_type[$i]==2||$send_type[$i]==3)--}}
{{--                                                @php--}}
{{--                                                    $index = $index + 1;--}}
{{--                                                @endphp--}}
{{--                                            <div class="col-md-6 c-pl-lg-8 c-pr-lg-8 c-pb-lg-8">--}}
{{--                                                <span class="">--}}
{{--                                                    {{$send_name[$i]}}--}}
{{--                                                </span>--}}
{{--                                                <div class="mb-15">--}}
{{--                                                    <input id="username"  type="text" required_service name="customer_data{{$i}}" class=" t14 " placeholder="{{$send_name[$i]}}" value="">--}}
{{--                                                    <div class="error"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            @elseif($send_type[$i]==4)--}}
{{--                                                @php--}}
{{--                                                    $index = $index + 1;--}}
{{--                                                @endphp--}}
{{--                                            <div class="col-md-6 c-pl-lg-8 c-pr-lg-8 c-pb-lg-8">--}}
{{--                                                <span>--}}
{{--                                                    {{$send_name[$i]}}--}}
{{--                                                </span>--}}
{{--                                                <div class="mb-15">--}}
{{--                                                    <input type="file" required_service accept="image/*" class="" name="customer_data{{$i}}" placeholder="{{$send_name[$i]}}">--}}
{{--                                                    <div class="error"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            @elseif($send_type[$i]==5)--}}
{{--                                                @php--}}
{{--                                                    $index = $index + 1;--}}
{{--                                                @endphp--}}
{{--                                                <div class="col-md-6 c-pl-lg-8 c-pr-lg-8 c-pb-lg-8">--}}
{{--                                                    <span>--}}
{{--                                                        {{$send_name[$i]}}--}}
{{--                                                    </span>--}}
{{--                                                    <div class="mb-15 toggle-password">--}}
{{--                                                        <input id="password" type="password" required_service class="" name="customer_data{{$i}}" placeholder="{{$send_name[$i]}}">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="error"></div>--}}
{{--                                                </div>--}}
{{--                                            @elseif($send_type[$i]==6)--}}
{{--                                                @php--}}
{{--                                                    $index = $index + 1;--}}
{{--                                                @endphp--}}
{{--                                                @php--}}
{{--                                                    $send_data=\App\Library\HelpersDecode::DecodeJson('send_data'.$i,$data->params);--}}
{{--                                                @endphp--}}
{{--                                                <div class="col-md-6 c-pl-lg-8 c-pr-lg-8 c-pb-lg-8">--}}
{{--                                                    <span>--}}
{{--                                                        {{$send_name[$i]}}--}}
{{--                                                    </span>--}}
{{--                                                    <div class="mb-15">--}}
{{--                                                        <select name="customer_data{{$i}}" class="mb-15 control-label bb">--}}
{{--                                                            @if(!empty($send_data))--}}
{{--                                                                @for ($sn = 0; $sn < count($send_data); $sn++)--}}
{{--                                                                    <option value="{{$sn}}">{{$send_data[$sn]}}</option>--}}
{{--                                                                @endfor--}}
{{--                                                            @endif--}}
{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @elseif($send_type[$i]==7)--}}
{{--                                                @php--}}
{{--                                                    $index = $index + 1;--}}
{{--                                                @endphp--}}
{{--                                                @php--}}
{{--                                                    $send_data=\App\Library\HelpersDecode::DecodeJson('send_data'.$i,$data->params);--}}
{{--                                                @endphp--}}
{{--                                            <div class="col-6 col-md-6 c-pl-lg-8 c-pr-lg-8 c-pb-lg-8">--}}
{{--                                                <label class="input-checkbox c-my-16 c-mb-lg-28">--}}
{{--                                                    <input type="checkbox" id="confirm" name="customer_data{{$i}}" required>--}}
{{--                                                    <span class="checkmark"></span>--}}
{{--                                                    <span class="text-label">Bạn đã đọc kỹ quy định và chuẩn bị đầy đủ vật phẩm, phụ kiện theo yêu cầu của shop chưa?</span>--}}
{{--                                                </label>--}}
{{--                                                <div class="error"></div>--}}
{{--                                            </div>--}}
{{--                                            @endif--}}
{{--                                        @endif--}}
{{--                                    @endfor--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="d-none d-lg-block c-pb-22 c-pt-2"></div>
                        <div class="c-mb-16">
                            <h2 class="text-title-bold d-block d-lg-none c-mb-8">Chi tiết dịch vụ</h2>
                            <div class="card overflow-hidden detailViewBlock">
                                <div class="card-body c-px-16">
                                    <h2 class="text-title-bold d-none d-lg-block c-mb-24 detailViewBlockTitle">Chi tiết dịch vụ</h2>
                                    @if(substr($data->description, 1200))
                                    <div class="content-desc hide detailViewBlockContent">
                                    @else
                                    <div class="content-desc detailViewBlockContent">
                                    @endif
                                        {!! $data->description !!}
                                    </div>
                                </div>
                                @if(substr($data->description, 1200))
                                <div class="card-footer text-center">
                                    <span class="see-more open-sheet" data-content="Xem thêm nội dung" data-target="#sheet-description"></span>
                                </div>
                                @endif
                            </div>
                            <!-- handle bottom sheet -->
                            <div class="bottom-sheet" id="sheet-description" aria-hidden="true" data-height="80">
                                <div class="layer"></div>
                                <div class="content-bottom-sheet bar-slide" >
                                    <div class="sheet-header">
                                        <h2 class="text-title center">
                                            Chi tiết dịch vụ
                                        </h2>
                                        <label for="check-bottom-sheet" class="close"></label>
                                    </div>
                                    <div class="sheet-body">
                                        <!-- body -->
                                        <div>
                                            {!! $data->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Bot -->
                                <div class="col-md-12 left-right data-bot"></div>
                        <!-- end data bot -->
                    </div>
                    @if(isset($data))
                        @forelse($data as $key  => $item)

                        @empty

                        @endforelse
                    @endif
                    <div class="col-lg-4 c-pl-8 d-none d-lg-block">
                        <div class="js_sticky" data-top="140">
                            <div class="card section-pay">
                                <div class="card-body c-p-16">
                                    <div class="text-title-bold d-inline-block">Báo giá:</div>
                                    <br>
                                    <input class="text-title secondary" type="hidden" name="value" value="">
                                    <input class="text-title" type="hidden" name="selected" value="">
                                    <input class="text-title" type="hidden" name="server">
                                    <div  style="color: #f473b9;font-weight: 500" class="txtPrice d-inline-block">0
                                        VNĐ
                                    </div>
                                    @if (!\App\Library\AuthCustom::check())
                                        <button type="button" class="btn primary" onclick="openLoginModal();">Thanh toán</button>
                                    @else
                                        <button type="button" id="btnPurchase" class="btn primary btnPay">Thanh toán</button>
                                    @endif
                                </div>
                            </div>


                            <h2 class="text-title fw-700 title-color-lg c-mb-14 c-mt-16">
                                Tùy chọn mở rộng (đối với Game Ngọc Rồng)
                            </h2>
                            @if(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) == "5") {{--//dạng chọn nhiều--}}
                            <div class="card service-select c-py-12 c-pr-8 select-multi">
                                <div class="card-body py-0 s-filter">
                                    @php
                                        $name=\App\Library\HelpersDecode::DecodeJson('name',$data->params);
                                        $price=\App\Library\HelpersDecode::DecodeJson('price',$data->params);
                                    @endphp
                                    @if(!empty($name))
                                        @for ($i = 0; $i < count($name); $i++)
                                            @if($name[$i]!=null)
                                                <label class="input-checkbox">
                                                    <input value="{{$i}}" type="checkbox" name="select" id="{{$i}}">
                                                    <span class="checkmark"></span>
                                                    <label class="c-ml-30 text-label"
                                                           for="{{$i}}">{{$name[$i]}}{{isset($price[$i])? " - ".number_format($price[$i]). " VNĐ":""}}</label>
                                                </label>
                                            @endif
                                        @endfor
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
            <div class="footer-mobile c-p-20">
                <span class="fw-lg-500 d-inline-block">Báo giá:</span>
                <br>
                <input class="text-title secondary" type="hidden" name="value" value="">
                <input class="text-title" type="hidden" name="selected" value="">
                <input class="text-title" type="hidden" name="server">
                <div style="color: #f473b9;font-weight: 500" class="text-title-bold secondary d-inline-block txtPrice">0 VNĐ</div>
                @if (!\App\Library\AuthCustom::check())
                    <button type="button" class="btn primary" onclick="openLoginModal();">Giao dịch ngay</button>
                @else
                    <button type="button" class="btn primary js-step btnPay">Giao dịch ngay</button>
                @endif
            </div>
        </section>

        @include('frontend.pages.service.widget.__related')
    </div>

    {{--    Modal xác nhận thanh toán--}}
    <div class="modal fade modal-big" id="orderModal">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content c-p-24">
                <div class="modal-header">
                    <p class="modal-title center">Xác nhận thanh toán</p>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
                <div class="modal-body pl-0 pr-0 c-pt-24 c-pb-24">
                    <div class="dialog--content__title fw-700 fz-13 c-mb-12 text-title-theme">
                        Thông tin dịch vụ thuê
                    </div>
                    <div class="col-md-12 left-right modal__error__message">
                        <div class="row marginauto order-errors">
                            <div class="col-md-12 left-right" style="color:#DA4343">
                                <small></small>
                            </div>
                        </div>
                    </div>
                    <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                        <div class="card--attr__total justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Tài khoản
                            </div>
                            <div class="card--attr__value fz-13 fw-500"><a href="javascript:void(0)"
                                                                           class="c-text-primary">{{ @App\Library\AuthCustom::getName() }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12">
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Dịch vụ
                            </div>
                            <div class="card--attr__value fz-13 fw-500">{{@$data->title}}</div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Gói
                            </div>
                            <div class="card--attr__value fz-13 fw-500 service_pack"></div>
                        </div>
                        <div class="card--attr justify-content-between d-flex c-mb-16 text-center">
                            <div class="card--attr__name fw-400 fz-13 text-center">
                                Thành tiền
                            </div>
                            <div class="card--attr__value fz-13 fw-500 total--price">0 đ</div>
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
                            <div class="card--attr__value fz-13 fw-500"><a href="javascript:void(0)"
                                                                           class="c-text-primary total--price">0 đ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button style="width: 100%" type="button" class="btn primary submit-form">Xác nhận</button>
                    <div class="button-next-step-two d-none"></div>
                    <div class="openSuccess d-none"></div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal thuê dịch vụ thành công --}}
    <div class="modal fade login show default-Modal" id="successModal" aria-modal="true">
        <div class="modal-dialog modal-md modal-dialog-centered login animated">
            <!--        <div class="image-login"></div>-->
            <div class="modal-content c-mr-lg-12 c-ml-lg-12">
                <div class="modal-header modal-header-success-ct">
                    <div class="row marginauto modal-header-success-row-ct justify-content-center">
                        <div class="col-md-12 text-center">
                            {{--                            <span>Gửi yêu cầu thuê dịch vụ thành công</span>--}}
                        </div>
                    </div>
                </div>
                <div class="modal-body modal-body-success-ct">
                    <div class="row marginauto justify-content-center">
                        <div class="col-auto">
                            <img onerror="imgError(this)" class="lazy"
                                 src="/assets/frontend/{{theme('')->theme_key}}/image/duong/image-success-service.png"
                                 alt="">
                        </div>
                    </div>
                    <div class="row marginauto modal-body-span-success-ct justify-content-center">
                        <div class="col-md-12 text-center js-message-res successful-service-title">
                            <span></span>
                        </div>
                        <div class="successful-service">
                            <p>Yêu cầu thuê đã được gửi đến Shop Cày Thuê Bạn vui lòng kiểm tra Email để xác nhận nha!</p>
                        </div>
                    </div>
                    <div class="row marginauto justify-content-center modal-footer-success-ct">
                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct c-pl-8 c-pr-8">
                            <div class="row marginauto modal-footer-success-row-not-ct">
                                <div class="col-md-12 left-right successful-service-tag">
                                    <a href="/" class="button-not-bg-ct"><span style="color: #0E3EDA;">Yêu cầu hỗ trợ</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct c-pl-8 c-pr-8">
                            <div class="row marginauto modal-footer-success-row-ct">
                                <div class="col-md-12 left-right successful-service-tag1">
                                    <a href="/" class="button-bg-ct"><span style="color: #FFFFFF;">Trang chủ</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal thông báo số dư không đủ --}}
    <div class="modal fade modal-small" id="notBuy">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content">
                <div class="modal-header justify-content-center p-0">
                    <img class="c-pt-16 c-pb-16" src="/assets/frontend/{{theme('')->theme_key}}/image/son/thatbai.png" alt="">
                </div>
                <div class="modal-body text-center c-pl-24 c-pr-24 pt-0 pb-0">
                    <p class="fw-700 fz-15 c-mt-12 mb-0 text-title-theme">Mua thẻ nick thất bại</p>
                    <p class="fw-400 fz-13 c-mt-10 mb-0">Rất tiếc việc mua nick đã thất bại do tài khoản của bạn không đủ, vui lòng nạp tiền để tiếp tục giao dịch!</p>
                </div>
                <div class="modal-footer c-p-24">
                    <button class="btn primary handle-recharge-modal" data-tab="1" data-dismiss="modal">Nạp tiền</button>
                </div>
            </div>
        </div>
    </div>

    {{--  sử lý step  --}}
    <span class="d-none js-step stepService" data-target="#stepService"></span>
    <div class="step " id="stepService">
        <div class="head-mobile">
            <a href="javascript:void(0) " class="link-back close-step"></a>

            <p class="head-title text-title">Xác nhận thanh toán</p>

            <a href="/" class="home"></a>
        </div>
        <div class="body-mobile">
            <div class="body-mobile-content c-p-16">
                <div class="dialog--content__title fw-700 fz-15 c-mb-12 text-title-theme">
                    Thông tin dịch vụ thuê
                </div>
                <div class="col-md-12 left-right modal__error__message">
                    <div class="row marginauto order-errors">
                        <div class="col-md-12 left-right" style="color:#DA4343">
                            <small></small>
                        </div>
                    </div>
                </div>
                <div class="card--gray c-mb-0 c-pt-8 c-pb-8 c-pl-12 brs-8 c-pr-12 g_mobile-content">
                    <div class="card--attr__total justify-content-between d-flex text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center text-order">
                            Tài khoản
                        </div>
                        <div class="card--attr__value fz-13 fw-500">
                            <a href="javascript:void(0)" class="c-text-primary">{{ @App\Library\AuthCustom::getName() }}</a>
                        </div>
                    </div>
                </div>
                <div class="card--gray c-mb-16 c-pt-8 c-pb-8 c-pl-12 c-pr-12 brs-8 g_mobile-content c-mt-lg-16">

                    <div class="card--attr justify-content-between d-flex c-mb-8 text-center">
                        <div class="card--attr__name fw-400 fz-13 text-center text-order">
                            Dịch vụ
                        </div>
                        <div class="card--attr__value fz-13 fw-500">{{@$data->title}}</div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-8 text-cente text-order">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Gói
                        </div>
                        <div class="card--attr__value fz-13 fw-500 service_pack c-ml-lg-20"></div>
                    </div>
                    <div class="card--attr justify-content-between d-flex c-mb-8 text-center text-order">
                        <div class="card--attr__name fw-400 fz-13 text-center">
                            Thành tiền
                        </div>
                        <div class="card--attr__value fz-13 fw-500 total--price">0 đ</div>
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
                        <div class="card--attr__value fz-13 fw-500"><a href="javascript:void(0)"
                                                                       class="c-text-primary total--price">0 đ</a></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="footer-mobile">
            <div class="group-btn" style="--data-between: 12px">
                <button class="btn primary btn-success-mobile submit-form">Xác nhận</button>
            </div>
        </div>
    </div>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_duong/service_detail.js?v={{time()}}"></script>
    <script>
        function Confirm(index, serverid) {
            $('[name="server"]').val(serverid);
            $('[name="selected"]').val(index);
            $('#btnPurchase').click();
        }
        var data = jQuery.parseJSON('{!! $data->params !!}');
            @if(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) =="7")
        var purchase_name = '{{\App\Library\HelpersDecode::DecodeJson('filter_name',$data->params)}}';
            @else
        var purchase_name = 'VNĐ';
            @endif
        var server = -1;
        $(".server-filter").change(function (elm, select) {
            server = parseInt($(".server-filter").val());
            $('[name="server"]').val(server);
            UpdatePrice();
        });
        server = parseInt($(".server-filter").val());
        $('[name="server"]').val(server);
    </script>
    @if(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) =="1")

    @elseif(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) =="4"){{--//dạng chọn một--}}
    <script>
        var itemselect = -1;
        $(document).ready(function () {
            $(".s-filter").change(function (elm, select) {
                itemselect = parseInt($(".s-filter").val());
                UpdatePrice();
            });
            itemselect = parseInt($(".s-filter").val());
            UpdatePrice();
        });
        function UpdatePrice() {
            var price = 0;
            if (itemselect == -1) {
                return;
            }
            if (data.server_mode == 1 && data.server_price == 1) {
                var s_price = data["price" + server];
                price = parseInt(s_price[itemselect]);
            } else {
                var s_price = data["price"];
                price = parseInt(s_price[itemselect]);
            }
            $('[name="value"]').val('');
            $('[name="value"]').val(price);
            price = price.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            price = price.split('').reverse().join('').replace(/^[\.]/, '');
            $('.txtPrice').html(price + ' VNĐ');
            $('[name="selected"]').val($(".s-filter").val());
            // $('.txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            //     $(this).removeClass();
            // });
            $('tbody tr.selected').removeClass('selected');
            $('tbody tr').eq(itemselect).addClass('selected');
        }
        function ConfirmBuy(value) {
            var index = $('.server-filter').val();
            Confirm(value, index);
        }
    </script>

    @elseif(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) =="5"){{--//dạng chọn nhiều--}}
    <script>
        $('.s-filter input[type="checkbox"]').change(function () {
            UpdatePrice();
        });
        function UpdatePrice() {
            var price = 0;
            var itemselect = '';
            if (data.server_mode == 1 && data.server_price == 1) {
                var s_price = data["price" + server];
            } else {
                var s_price = data["price"];
            }
            if ($('.s-filter input[type="checkbox"]:checked').length > 0) {
                $('.s-filter input[type="checkbox"]:checked').each(function (idx, elm) {
                    price += parseInt(s_price[$(elm).val()]);
                    if (itemselect != '') {
                        itemselect += '|';
                    }
                    itemselect += $(elm).val();
                    $('[name="value"]').val('');
                    $('[name="value"]').val(price);
                    $('[name="selected"]').val(itemselect);
                    // $('.txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                    //     $(this).removeClass();
                    // });
                });
                $('#btnPurchase').prop('disabled', false);
            } else {
                $('.txtPrice').html('0 VNĐ');
                // $('.txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                //     $(this).removeClass();
                // });
                $('#btnPurchase').prop('disabled', true);
            }
            price = price.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            price = price.split('').reverse().join('').replace(/^[\.]/, '');
            $('.txtPrice').html(price + ' VNĐ');
        }
    </script>
    @elseif(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) =="6"){{--//dạng chọn a->b--}}
    <script>
        var json = JSON.parse(JSON.parse($("#json_rank").val()).params);
        var data = json.price;
        $('.nstSlider').attr('data-range_max', data.length - 1);
        $('.nstSlider').attr('data-cur_max', data.length - 1);
        $('.nstSlider').nstSlider({
            "crossable_handles": false,
            "left_grip_selector": ".leftGrip",
            "right_grip_selector": ".rightGrip",
            "value_bar_selector": ".bar",
            "value_changed_callback": function (cause, leftValue, rightValue) {
                from = leftValue;
                to = rightValue;
                $(".from-chosen").val(from);
                $(".to-chosen").val(to);
                $(".to-chosen").trigger("chosen:updated");
                $(".from-chosen").trigger("chosen:updated");
                UpdatePrice1();
            }
        });
        var from = 0, to = 1;
        $(document).ready(() => {
            $(".from-chosen").chosen({disable_search_threshold: 10});
            $(".from-chosen").change((elm, select) => {
                from = parseInt($(".from-chosen").val());
                if (to <= from) {
                    to = from + 1;
                    $(".to-chosen").val(to);
                    //$(".to-chosen").chosen('update');
                    $(".to-chosen").trigger("chosen:updated");
                }
                $('.nstSlider').nstSlider('set_position', from, to);
                UpdatePrice1();
            });
            $(".to-chosen").chosen({disable_search_threshold: 10});
            $(".to-chosen").change((elm, select) => {
                to = parseInt($(".to-chosen").val());
                if (to <= from) {
                    from = to - 1;
                    $(".from-chosen").val(from);
                    $(".from-chosen").trigger("chosen:updated");
                }
                $('.nstSlider').nstSlider('set_position', from, to);
                UpdatePrice1();
            });
            UpdatePrice1();
        });
        function UpdatePrice1() {
            var price = 0;
            var data = json.price;
            $('tbody tr.selected').removeClass('selected');
            for (var i = from + 1; i <= to; i++) {
                price += parseInt(data[i] - data[i - 1]);
                $('tbody tr').eq(i - 1).addClass('selected');
            }
            $('[name="value"]').val('');
            $('[name="value"]').val(price);
            price = price.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            price = price.split('').reverse().join('').replace(/^[\.]/, '');
            $('.txtPrice').html(price + ' VNĐ');
            $('[name="selected"]').val(from + '|' + to);
            // $('.txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            //     $(this).removeClass();
            // });
            $('.nstSlider').nstSlider('set_position', from, to);
            $(".from-chosen").val(from);
            $(".to-chosen").val(to);
            $(".to-chosen").trigger("chosen:updated");
            $(".from-chosen").trigger("chosen:updated");
        }
    </script>

    @elseif(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) =="7"){{--//dạng nhập tiền thành toán--}}
    <script>
        var min = parseInt('{{\App\Library\HelpersDecode::DecodeJson('input_pack_min',$data->params)}}');
        var max = parseInt('{{\App\Library\HelpersDecode::DecodeJson('input_pack_max',$data->params)}}');
        $('.txtPrice').html('');
        $('.txtPrice').html('Tổng: 0 ' + purchase_name);
        function UpdatePrice() {
            var container = $('.m-datatable__body').html('');
            if (data.server_mode == 1 && data.server_price == 1) {
                var s_price = data["price" + server];
                var s_discount = data["discount" + server];
            } else {
                var s_price = data["price"];
            }
            for (var i = 0; i < data.name.length; i++) {
                var price = s_price[i];
                var discount = s_price[i];
                if (s_price != null && s_discount != null) {
                    var ptemp = '';
                    if (data.length == 1) {
                        ptemp = '<td style="width:180px;" class="m-datatable__cell"> <a class="btn-style border-color" href="/service/purchase/2.html?selected=' + price + '&server=' + server + '">Thanh toán</a> </td> </tr>';
                    } else {
                        ptemp = '<td style="width:180px;" class="m-datatable__cell"> <a onclick="Confirm(' + price + ',' + server + ')" class="btn-style border-color">Thanh toán</a> </td> </tr>';
                    }
                    var temp = '<tr class="m-datatable__row m-datatable__row--even">' +
                        '<td style="width:30px;" class="m-datatable__cell">' + (i + 1) + '</td>' +
                        '<td class="m-datatable__cell">' + data.name[i] + '</td>' +
                        '<td style="width:150px;" class="m-datatable__cell">' + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ</td>' +
                        '<td style="width:250px;" class="m-datatable__cell">' + discount + '</td>' +
                        '<td style="width:180px;" class="m-datatable__cell">' + (parseInt(price * discount / 1000 * data.input_pack_rate)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' ' + purchase_name + '</td>' + ptemp
                    $(temp).appendTo(container);
                }
            }
            UpdateTotal();
        }
        function UpdateTotal() {
            var price = parseInt($('#input_pack').val().replace(/,/g, ''));
            if (typeof price != 'number' || price < min || price > max) {
                $('button[type="submit"]').addClass('not-allow');
                $('.txtPrice').html('Tiền nhập sai');
                return;
            } else {
                $('button[type="submit"]').removeClass('not-allow');
            }
            var total = 0;
            var index = 0;
            var current = 0;
            var discount = 0;
            if (data.server_mode == 1 && data.server_price == 1) {
                var s_price = data["price" + server];
                var s_discount = data["discount" + server];
                for (var i = 0; i < s_price.length; i++) {
                    if (price >= s_price[i] && s_price[i] != null) {
                        current = s_price[i];
                        index = i;
                        discount = s_discount[i];
                        total = price * s_discount[i];
                    }
                }
            } else {
                var s_price = data["price"];
                var s_discount = data["discount"];
                discount = s_discount[0];
                for (let i = 0; i< s_price.length; i++){

                    if (i > 0){
                        if (price >= s_price[i]){
                            discount = s_discount[i];
                        }
                    }
                }
                // discount = s_discount;
                total = price * discount;
            }
            $('[name="value"]').val('');
            $('[name="value"]').val(price);
            total = parseInt(total / 1000 * data.input_pack_rate);
            $('#txtDiscount').val(discount);
            total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            total = total.split('').reverse().join('').replace(/^[\.]/, '');
            $('.txtPrice').html('');
            $('.txtPrice').html(total + " " + purchase_name);
            // $('.txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            //     $(this).removeClass();
            // });
            $('[name="selected"]').val(price);
            $('.m-datatable__body tbody tr.selected').removeClass('selected');
            $('.m-datatable__body tbody tr').eq(index).addClass('selected');
        }
        $('#input_pack').bind('focus keyup', function () {
            UpdateTotal();
        });
        $(document).ready(function () {
            UpdatePrice();
        });
        function ConfirmBuy(value) {
            var index = $('.server-filter').val();
            Confirm(value, index);
        }
    </script>
    @endif
@endsection

@section('scripts')
    <script>
        $('body').on('click', '#service-detail .btn-success-service', function (e) {
            e.preventDefault();
            $('#orderModal').modal('show');
        })
        $('body').on('click', '.btn-success-mobile', function (e) {
            e.preventDefault();
            $('#orderSuccses').modal('show');
        })
    </script>
@endsection
