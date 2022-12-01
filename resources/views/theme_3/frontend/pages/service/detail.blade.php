@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data, 'data_seo_price' => $data_seo_price]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('scripts')

{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/format-currency.js" type="text/javascript"></script>--}}
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/service.js?v={{time()}}" type="text/javascript"></script>
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/validate.js" type="text/javascript"></script>--}}



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
    <input type="hidden" name="slug" id="slug" value="{{ $slug }}" />

    @if(isset($data->note))
        <div class="modal fade login show order-modal" id="notiseviceModal" aria-modal="true">

            <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
                <!--        <div class="image-login"></div>-->
                <div class="modal-content">
                    <div class="modal-header p-0" style="border-bottom: 0">
                        <div class="row marginauto modal-header-order-ct">
                            <div class="col-12 span__donhang text-center" style="position: relative">
                                <span>Thông báo</span>
                                <img data-dismiss="modal" class="lazy img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                            </div>
                        </div>

                    </div>

                    <div class="modal-body modal-body-order-ct">
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

    <fieldset id="fieldset-one">
            <section class="media-mobile">
                <div class="container container-fix banner-mobile-container-ct">
                    <div class="row marginauto banner-mobile-row-ct">
                        <div class="col-auto left-right" style="width: 10%">
                            <a href="/dich-vu"><img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt=""></a>
                        </div>

                        <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                            <p>Dịch vụ</p>
                        </div>
                        <div class="col-auto left-right" style="width: 10%">
                        </div>
                    </div>
                </div>
            </section>
            <section class="media-web">
                <div class="container container-fix menu-container-ct pl-0">
                    <ul class="mb-3">
                        <li><a href="/">Trang chủ</a></li>
                        <li class="menu-container-li-ct"><img
                                                              src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png"
                                                              alt=""></li>
                        <li class="menu-container-li-ct"><a href="/dich-vu">Dịch vụ</a></li>
                        <li class="menu-container-li-ct"><img
                                                              src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png"
                                                              alt=""></li>
                        <li class="menu-container-li-ct"><a href="/dich-vu/{{ @$data->slug }}">{{ @$data->title }}</a>
                        </li>
                    </ul>
                </div>
            </section>

            {{--   Bopdy --}}
            <section id="service-detail">
                <div class="container container-fix body-container-ct">
                    <div class="row marginauto body-row-ct body-container-row-ct body-container-row-mobile-ct">
                        <div class="col-lg-12 col-12 body-container-detail-left-ct px-0">
                            <form action="/dich-vu/{{ $data->id }}/purchase" method="POST" id="formDataService">
                                @csrf
                                <input type="hidden" name="index" value="{{ count($send_name)  }}">
                                <div class="row marginauto web-media-ct-fix web-media-ct">
                                    <div class="col-md-12 left-right">
                                        <div class="row marginauto">
                                            <div class="col-md-12 left-right">
                                                <div class="row marginauto body-header-ct">
                                                    <div class="col-auto left-right">
                                                        <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/caythue.png" alt="">
                                                    </div>
                                                    <div class="col-md-10 col-10 body-header-col-ct">
                                                        <h1>{{ @$data->title }}</h1>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3 px-0 detail-service-content">
                                                <div class="col-12 col-lg-4 pl-0 pr-fix-10">
                                                    <div class="row marginauto banner-container-ct p-0">
                                                        <div class="col-md-12 text-left left-right">
                                                            <img onerror="imgError(this)" class="lazy" src="{{\App\Library\MediaHelpers::media($data->image)}}" alt="Banner">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 pl-fix-10 pr-fix-10">
                                                    <div class="card card-block">
                                                        <div class="card-body p-3">
                                                            {{-- Kiểm tra máy chủ --}}
                                                            @if( isset($server_data) && isset($server_id))
                                                                <div class="col-md-12 left-right">
                                                                    <div class="row marginauto">

                                                                        <div class="col-md-12 text-left left-right mb-fix-12">

                                                                            <div class="row marginauto ">
                                                                                <div
                                                                                    class="col-md-12 left-right body-title-detail-span-ct">
                                                                                    <span>Chọn máy chủ</span>
                                                                                </div>
                                                                                <div class="col-md-12 left-right body-title-detail-select-ct data-select-server">
                                                                                    <select class="wide" name="server">
                                                                                        @forelse($server_data as $k_server => $server)
                                                                                            @if(!strpos($server_data[$k_server], '[DELETE]'))
                                                                                                <option value="{{ $server_id[$k_server] }}">{{ $server_data[$k_server] }}</option>
                                                                                            @endif
                                                                                        @empty
                                                                                        @endforelse
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-m-12 server-error"></div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @switch($data_params['filter_type'])
                                                                {{--                                                3 Dạng tiền tệ   --}}
                                                                {{--                                                4 Dạng chọn một --}}
                                                                {{--                                                5 Dạng chọn nhiều   --}}
                                                                {{--                                                6 Dạng chọn từ A->B (trong khoảng) --}}
                                                                {{--                                                7 Dạng nhập tiền để thanh toán  --}}
                                                                @case('3')
                                                                @break
                                                                @case('4')
                                                                <div class="col-md-12 left-right">
                                                                    <div class="row marginauto form-group">
                                                                        <div class="col-md-12 text-left left-right">
                                                                            <div class="row marginauto">
                                                                                <div
                                                                                    class="col-md-12 left-right body-title-detail-span-ct">
                                                                                    <span>Chọn gói nạp:</span>
                                                                                </div>
                                                                                <div
                                                                                    class="col-md-12 left-right body-title-detail-select-ct data-select-server">
                                                                                    <select class="wide" name="selected">
                                                                                        @forelse($data_params['name'] as $k_name => $name)
                                                                                            @if(!!$name)
                                                                                                <option value="{{ $k_name }}">{{ $name }}</option>
                                                                                            @endif
                                                                                        @empty
                                                                                        @endforelse
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-m-12 server-error">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @break
                                                                @case('5')
                                                                <div class="col-md-12 left-right" id="select-multi">
                                                                    <div class="row marginauto">
                                                                        <div class="col-md-12 text-left left-right">
                                                                            <div class="row marginauto form-group">
                                                                                <div class="col-md-12 left-right body-title-detail-span-ct">
                                                                                    <span>{{ $data_params['filter_name'] }}</span>
                                                                                    <hr>
                                                                                </div>
                                                                                <div class="col-md-12 left-right pr-1">
                                                                                    <div class="row body-title-detail-checkbox-ct">
                                                                                        @if(!empty($data_params['name']))
                                                                                            @forelse($data_params['name'] as $k_name => $name)
                                                                                                @if(!!$name)
                                                                                                    <div class="col-auto body-title-detail-checkbox-col-ct">
                                                                                                        <label for="{{$name . $k_name}}" class="input-ratio-ct">
                                                                                <span class="label--checkbox">
                                                                                    <div class="label--checkbox__name">
                                                                                        {{ $name }}
                                                                                    </div>
                                                                                    @if(substr($name,50))
                                                                                        <span
                                                                                            class="checkbox-info-ct label--checkbox__tippy d-none d-lg-block"
                                                                                            data-tippy-content="{{ $name }}">
                                                                                            <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/infor.png" alt="">
                                                                                        </span>

                                                                                    @endif
                                                                                </span>
                                                                                                            <input
                                                                                                                id="{{$name . $k_name}}"
                                                                                                                type="checkbox"
                                                                                                                class="allgame"
                                                                                                                value="{{ $k_name }}">
                                                                                                            <span class="input-ratio-checkmark-ct --overwrite"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                @endif
                                                                                            @empty
                                                                                            @endforelse
                                                                                            <input type="hidden" name="selected">
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="col-m-12 message-error" id="error-mes-checkbox"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @break
                                                                @case('6')
                                                                <div class="col-md-12 left-right">
                                                                    <div class="row body-title-detail">
                                                                        <div
                                                                            class="col-auto text-left detail-service-col body-title-detail-col-ct">
                                                                            <div class="row marginauto">
                                                                                <div
                                                                                    class="col-md-12 left-right body-title-detail-span-ct">
                                                                                    <span>Rank hiện tại</span>
                                                                                </div>
                                                                                <div
                                                                                    class="col-md-12 left-right body-title-detail-select-ct data-select-rank-start">
                                                                                    @php
                                                                                    $count = count($data_params['name']);
                                                                                    @endphp
                                                                                    <select class="wide js-selected" data-type="0" name="rank_from">
                                                                                        @forelse($data_params['name'] as $k_name => $name)
                                                                                            @if(!!$name)
                                                                                                @if($k_name < $count -1)
                                                                                                <option value="{{ $k_name }}">{{ $name }}</option>
                                                                                                @endif
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
                                                                                    <select class="wide js-selected" data-type="1" name="rank_to">
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
                                                                                <div class="col-m-12 rank-end-error">

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                @break
                                                                @case('7')
                                                                <div class="col-md-12 left-right">
                                                                    <div class="row marginauto mb-fix-12">
                                                                        <div class="col-md-12 left-right body-title-detail-span-ct">
                                                                            <span>Nhập số tiền cần mua:</span>
                                                                        </div>
                                                                        <div class="col-md-12 left-right body-title-detail-select-ct">
                                                                            <input autocomplete="off" class="input-defautf-ct mb-2"
                                                                                   id="input_pack"
                                                                                   value="{{ number_format($data_params['input_pack_min'],0,"",".") }}"
                                                                                   name="selected"
                                                                                   type="text"
                                                                                   placeholder="Số tiền"
                                                                                   numberic
                                                                                   currency
                                                                                   required>
                                                                            <span id="text-pack">
                                                            Số tiền thanh toán phải từ
                                                            <b style="font-weight:bold;">{{number_format($data_params['input_pack_min'])}}đ</b>
                                                            đến
                                                            <b style="font-weight:bold;">{{number_format($data_params['input_pack_max'])}}đ</b>
                                                        </span>
                                                                        </div>
                                                                        <div class="col-m-12 server-error">

                                                                        </div>
                                                                    </div>
                                                                    <div class="row marginauto">
                                                                        <div class="col-md-12 left-right body-title-detail-span-ct">
                                                                            <span>Hệ số:</span>
                                                                        </div>
                                                                        <div
                                                                            class="col-md-12 left-right body-title-detail-select-ct data-select-server">
                                                                            <input autocomplete="off" class="input-defautf-ct" id="txt-discount" disabled required>
                                                                        </div>
                                                                        <div class="col-m-12 server-error">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @break
                                                                @default
                                                            @endswitch
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4 pr-0 pl-fix-10">
                                                    <div class="card card-block">
                                                        <div class="card-body p-3">
                                                            <div class="col-md-12 left-right">
                                                                <div class="row body-title-detail" id="section-data-send">
                                                                    @if(!empty($send_name) && !empty($send_type))
                                                                        @forelse($send_name as $k_send_name => $send_name_text)
                                                                            @switch($send_type[$k_send_name])
                                                                                @case('1')
                                                                                @case('2')
                                                                                @case('3')
                                                                                <div class="col-auto text-left body-title-detail-col-ct w-100">
                                                                                    <div class="row marginauto">
                                                                                        <div class="col-md-12 left-right body-title-detail-span-ct">
                                                                                            <span>{{$send_name_text}}</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-12 left-right body-title-detail-select-ct">
                                                                                            <input autocomplete="off" class="input-defautf-ct username" name="customer_data{{$k_send_name}}" type="text" placeholder="{{$send_name_text}}" required>
                                                                                        </div>
                                                                                        <div class="col-md-12 left-right message-error">

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @break
                                                                                @case('5')
                                                                                <div class="col-auto text-left body-title-detail-col-ct  w-100">
                                                                                    <div class="row marginauto password-mobile">
                                                                                        <div class="col-md-12 left-right body-title-detail-span-ct">
                                                                                            <span>{{$send_name_text}}</span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-12 left-right body-title-detail-select-ct"
                                                                                            style="position: relative">
                                                                                            <input autocomplete="off" id="password"
                                                                                                   name="customer_data{{$k_send_name}}"
                                                                                                   class="input-defautf-ct password"
                                                                                                   type="password"
                                                                                                   placeholder="{{$send_name_text}}" required>
                                                                                            <div class="show-btn-password">
                                                                                                <img class="lazy"
                                                                                                     src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-show.svg"
                                                                                                     alt="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="col-md-12 left-right pw-error"></div>
                                                                                    </div>
                                                                                </div>
                                                                                @break
                                                                                @case('7')

                                                                                <div class="col-md-12 left-right " id="confirm-rules">
                                                                                    <div class="row body-title-detail-checkbox-ct m-0 p-0">
                                                                                        <div class="col-auto body-title-detail-checkbox-col-ct">
                                                                                            <label for="customer_data{{$k_send_name}}" class="input-ratio-ct">
                                                                                <span class="label--checkbox" >
                                                                                    <div class="label--checkbox__name">
                                                                                        {{ $send_name_text }}
                                                                                    </div>
                                                                                </span>
                                                                                                <input id="customer_data{{$k_send_name}}" type="checkbox" class="confirm-rules" name="customer_data{{$k_send_name}}">
                                                                                                <span class="input-ratio-checkmark-ct --overwrite"></span>
                                                                                            </label>
                                                                                            <div class="error-message"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @break
                                                                                @default
                                                                            @endswitch
                                                                        @empty
                                                                        @endforelse
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 left-right body-title-ct">
                                                                <div class="row marginauto">
                                                                    <div class="col-md-12 text-left left-right">
                                                                        <div class="row marginauto">
                                                                            <div class="col-auto left-right body-title-detail-span-ct">
                                                                                <span>Tổng:</span>
                                                                            </div>
                                                                            <div
                                                                                class="col-auto left-right body-title-detail-span-ct body-title-detail-span-right-ct">
                                                                                <small id="txt-price">0 đ</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 left-right mobile- body-title-ct">
                                                                <div class="row marginauto">
                                                                    <div class="col-md-12 text-left left-right">
                                                                        @if(App\Library\AuthCustom::check())
                                                                            <button class="button-default-ct btn-data  media-web open-modal" type="button">Thanh toán</button>
                                                                            <button class="button-default-ct btn-data media-mobile" type="button">Thanh toán</button>
                                                                            <div class="button-next-step-one d-none"></div>
                                                                        @else
                                                                            <button class="button-default-ct media-web open-modal" type="button" onclick="openLoginModal();">Thanh toán</button>
                                                                            <button class="button-default-ct media-mobile" type="button" onclick="openLoginModal();">Thanh toán</button>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                    {{--                block 2           --}}
                    @if(isset($data->description))
                    <div class="marginauto body-detail-right-ct detail-ser-content mt-3">

                        <div class="col-md-12 left-right">
                            <div class="row marginauto">
                                <div class="col-md-12 col-8 body-header-col-km-left-ct">
                                    <small>Chi tiết dịch vụ</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right card--desc px-3 px-lg-0">
                            <div class="row marginauto body-title-ct show-detail-caythue-ct-fix">
                                <div
                                    class="col-md-12 text-left left-right content-video-in double-click content-video-in ">
                                    {!! @$data->description !!}
                                </div>
                                <div class="col-md-12 left-right text-center js-toggle-content">
                                </div>
                            </div>
                        </div>

                    </div>
                    @endif
                    {{--                block 3           --}}
                    <div class="body-detail-right-ct mt-fix-20 mx-lg-auto">

                        {{-- BOT --}}
                        <div class="col-md-12 left-right px-3 px-lg-0" id="table-bot">

                        </div>
                        {{--End BOT--}}

                        @if(isset($data->content))
                            <section>
                                <div class="container container-fix body-container-ct pt-0">
                                    <div class="row marginauto body-container-row-ct pt-0">
                                        <div class="col-md-12 left-right detailViewBlock">
                                            <div class="row marginauto body-row-ct footer-row-ct p-0">
                                                <div class="col-md-12 left-right">
                                                    <span class="detailViewBlockTitle">Mô tả dịch vụ</span>
                                                </div>
                                                @if(substr($data->content,1200))
                                                    <div class="col-md-12 left-right footer-row-col-ct content-video-in content-video-in-add detailViewBlockContent">
                                                        @else
                                                            <div class="col-md-12 left-right footer-row-col-ct content-video-in  detailViewBlockContent">
                                                                @endif
                                                                {!!  $data->content !!}
                                                            </div>
                                                            @if(substr($data->content,1200))
                                                                <div class="col-md-12 left-right text-center js-toggle-content noselect">
                                                                    <div class="view-more">
                                                                        <a href="javascript:void(0)" class="global__link__default">Xem thêm<i class="__icon__default --sm__default --link__default ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/xemthem.svg)"></i></a>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                    </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif

                    </div>
                </div>
            </section>


            @include('frontend.pages.service.widget.__related',['current_id'=>$data->id])

            <div class="modal fade login show default-Modal" id="successModal" aria-modal="true">
                <div class="modal-dialog modal-md modal-dialog-centered login animated">
                    <!--        <div class="image-login"></div>-->
                    <div class="modal-content">
                        <div class="modal-header modal-header-success-ct">
                            <div class="row marginauto modal-header-success-row-ct justify-content-center">
                                <div class="col-md-12 text-center">
                                    <span>Gửi yêu cầu thuê thành công</span>
                                </div>
                            </div>
                        </div>

                        <div class="modal-body modal-body-success-ct">
                            <div class="row marginauto justify-content-center">
                                <div class="col-auto">
                                    <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/group.png" alt="">
                                </div>
                            </div>
                            <div class="row marginauto modal-body-span-success-ct justify-content-center">
{{--                                <div class="col-md-12 text-center">--}}
{{--                                    <span>Yêu cầu thuê đã được gửi đến </span><small>Shop Cày Thuê</small>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-12 text-center">--}}
{{--                                    <span>Bạn vui lòng kiểm tra Email để xác nhận nha!</span>--}}
{{--                                </div>--}}
                                <div class="col-md-12 text-center js-message-res">
                                    <span></span>
                                </div>
                            </div>
                            <div class="row marginauto justify-content-center modal-footer-success-ct">
                                <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                    <div class="row marginauto modal-footer-success-row-not-ct">
                                        <div class="col-md-12 left-right">
                                            <a href="/" class="button-not-bg-ct"><span>Về trang chủ</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                    <div class="row marginauto modal-footer-success-row-ct">
                                        <div class="col-md-12 left-right">
                                            <a href="/dich-vu-da-mua" class="button-bg-ct"><span>Lịch sử</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade login show order-modal" id="openOrder" aria-modal="true">

                <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
                    <!--        <div class="image-login"></div>-->
                    <div class="modal-content">
                        <div class="modal-header p-0" style="border-bottom: 0">
                            <div class="row marginauto modal-header-order-ct">
                                <div class="col-12 span__donhang text-center" style="position: relative">
                                    <span>XÁC NHẬN THANH TOÁN</span>
                                    <img class="lazy img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                                </div>
                            </div>

                        </div>

                        <div class="modal-body modal-body-order-ct">
                            <div class="row marginauto">

                                <div class="col-md-12 left-right title-order-ct">
                                    <span>Thông tin yêu cầu</span>
                                </div>

                                <div class="col-md-12 left-right modal__error__message">
                                    <div class="row marginauto order-errors">
                                        <div class="col-md-12 left-right">
                                            <small></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">
                                            <div class="row marginauto background-order-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Tài khoản</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>{{ @App\Library\AuthCustom::getName() }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">
                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Dịch vụ</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>{{ @$data->title }}</small>
                                                </div>
                                            </div>

                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Gói</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct service_pack text-right">

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">

                                            <div class="row marginauto background-order-body-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Phương thức thanh toán</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>Tài khoản Shopbrand</small>
                                                </div>
                                            </div>

                                            <div class="row marginauto background-order-body-bottom-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Phí thanh toán</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <small>Miễn phí</small>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right background-order-ct">
                                            <div class="row marginauto background-order-row-ct">
                                                <div class="col-auto left-right background-order-col-left-ct">
                                                    <span>Tổng thanh toán</span>
                                                </div>
                                                <div class="col-auto left-right background-order-col-right-ct">
                                                    <span class="total--price">0 đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right padding-order-footer-ct">
                                    <div class="row marginauto">
                                        <div class="col-md-12 left-right">
                                            <button class="btn -primary btn-big submit-form" type="button">Xác nhận</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>


        <fieldset id="fieldset-two">

            <section>
                <div class="container container-fix banner-mobile-container-ct">
                    <div class="row marginauto banner-mobile-row-ct">
                        <div class="col-auto left-right" style="width: 10%">
                            <img class="lazy previous-step-one"
                                 src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="">
                        </div>

                        <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                            <p>Dịch vụ</p>
                        </div>
                        <div class="col-auto left-right" style="width: 10%">
                        </div>
                    </div>

                </div>
            </section>

            <section class="max-header-fix">
                <div class="row marginauto" style="padding: 12px 16px">

                    <div class="col-md-12 left-right title-order-ct">
                        <span>Thông tin yêu cầu</span>
                    </div>

                    <div class="col-md-12 left-right modal__error__message">
                        <div class="row marginauto order-errors">
                            <div class="col-md-12 left-right">
                                <small></small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right background-order-ct">
                                <div class="row marginauto background-order-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Tài khoản</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>{{ @App\Library\AuthCustom::getName() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right background-order-ct">
                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Dịch vụ</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>{{ @$data->title }}</small>
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Gói</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct service_pack">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right background-order-ct">

                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Phương thức thanh toán</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>Tài khoản Shopbrand</small>
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-bottom-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Phí thanh toán</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct">
                                        <small>Miễn phí</small>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right background-order-ct">
                                <div class="row marginauto background-order-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Tài khoản</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct total--price">
                                        <span>0 đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-footer-mobile-ct fixcungbuttonmobile">
                        <div class="row marginauto" style="padding: 12px 16px">
                            <div class="col-md-12 left-right">
                                <button class="button-default-ct submit-form" type="button">Xác nhận</button>
                                <div class="button-next-step-two d-none"></div>
                                <div class="openSuccess d-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <input type="hidden" name="previous" class="input-back-step-two" value="Trang trước"/>

        </fieldset>
    @if(\App\Library\AuthCustom::check())
        <input id="surplus" type="hidden" value="{{ \App\Library\AuthCustom::user()->balance }}">
    @endif
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/cay-thue/cay-thue-detail.js?v={{time()}}"></script>--}}
{{--    <script src="/js/{{theme('')->theme_key}}/cay-thue/cay-thue-detail.js" type="text/javascript"></script>--}}
@endsection



