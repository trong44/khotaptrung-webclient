@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_trong.css">
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/script_trong.js"></script>
@endsection
@section('content')

    <div class="container-fix container">
        {{--breadcrum--}}
        <ul class="breadcrum--list">
            <li class="breadcrum--item">
                <a href="/" class="breadcrum--link">Trang chủ</a>
            </li>
            <li class="breadcrum--item">
                <a href="/lich-su-giao-dich" class="breadcrum--link">Lịch sử giao dịch</a>
            </li>
            <li class="breadcrum--item">
                <a href="/dich-vu-da-mua" class="breadcrum--link">Dịch vụ đã mua</a>
            </li>
            <li class="breadcrum--item">
                <a href="/inbox/send/{{$item->id}}" class="breadcrum--link">Nhắn tin</a>
            </li>
        </ul>
        <div class="row m-0">
            {{--navbar--}}
            @include('theme_3.frontend.widget.__navbar__profile')
            {{--content--}}
            <div class="col-12 col-lg-9 order--detail">
                <div class="card--mobile__title">
                    <a href="/dich-vu-da-mua" class="card--back">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt="">
                    </a>
                    <h4>Dịch vụ đã mua</h4>
                </div>
                <div class="card --custom">
                    <div class="card--header  hidden-mobile">
                        <h4 class="card--header__title">
                            Gửi tin nhắn
                        </h4>
                    </div>
                    <div class="card--body">
                        <div class="row">
                            <div class="col-12 col-lg-6 px-3 px-lg-3">
                                <div class="pt-0 pt-lg-3 pb-1 mb-2">
                                    <span class="text--sm__title">Thông tin tài khoản</span>
                                </div>
                                <div class="card--rise --gray m-0">
                                    @php
                                        $send_name=\App\Library\HelpersDecode::DecodeJson('send_name',$dataItem->itemconfig_ref->params);
                                        $send_type=\App\Library\HelpersDecode::DecodeJson('send_type',$dataItem->itemconfig_ref->params);
                                        $server_data=\App\Library\HelpersDecode::DecodeJson('server_data',$dataItem->itemconfig_ref->params);
                                    @endphp
                                    @if(\App\Library\HelpersDecode::DecodeJson('server_mode',$dataItem->itemconfig_ref->params)==1)
                                        <div class="order__attr">
                                            <div class="card__attr">
                                                <div class="card--value__attr">
                                                    Server:<span class="card__info">{{isset($server_data[$dataItem->position])?$server_data[$dataItem->position]:""}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(!empty($send_name)&& count($send_name)>0)
                                        @foreach( $send_name as $index=> $aSendName)

                                            @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,json_encode($dataItem->params)))
                                                @if($send_type[$index]==4)
                                                    <div class="col-md-12 left-right chat-box-col">
                                                        <small>{{$aSendName}}: </small>
                                                        <span>
                                                            <img src="{{\App\Library\Files::media(\App\Library\Helpers::DecodeJson('customer_data'.$index,json_encode($dataItem->params)))}}" alt="" style="max-width: 100px;max-height: 100px;">
                                                        </span>
                                                    </div>
                                                    <div class="order__attr">
                                                        <div class="card__attr">
                                                            <div class="card--value__attr">
                                                                {{$aSendName}}:
                                                                <span>
                                                                    <img src="{{\App\Library\Files::media(\App\Library\Helpers::DecodeJson('customer_data'.$index,json_encode($dataItem->params)))}}" alt="" style="max-width: 100px;max-height: 100px;">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($send_type[$index]==5)
                                                    <div class="order__attr">
                                                        <div class="card__attr">
                                                            <div class="card--value__attr">
                                                                {{$aSendName}}:<span class="card__info">******</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else

                                                    <div class="order__attr">
                                                        <div class="card__attr">
                                                            <div class="card--value__attr">
                                                                {{$aSendName}}:<span class="card__info">{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,json_encode($dataItem->params))}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @else
                                                @if($send_type[$index]==4)

                                                    <div class="order__attr">
                                                        <div class="card__attr">
                                                            <div class="card--value__attr">
                                                                {{$aSendName}}:
                                                                <span class="card__info">
                                                                    <a href="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,$dataItem->params)}}" target="_blank">
                                                                    <img src="{{\App\Library\Files::media(\App\Library\Helpers::DecodeJson('customer_data'.$index,$dataItem->params))}}" alt="" style="max-width: 100px;max-height: 100px;">
                                                                </a></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($send_type[$index]==5)
                                                    <div class="order__attr">
                                                        <div class="card__attr">
                                                            <div class="card--value__attr">
                                                                {{$aSendName}}:<span class="card__info">******</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="order__attr">
                                                        <div class="card__attr">
                                                            <div class="card--value__attr">
                                                                {{$aSendName}}:<span class="card__info">{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,$dataItem->params)?? null}}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif
                                            @endif
                                        @endforeach
                                    @endif

                                </div>
                                <form method="POST" id="chatFrom" enctype="multipart/form-data" action="/inbox/send/{{$item->id}}" accept-charset="UTF-8" class="form-horizontal form-charge">
                                    {{csrf_field()}}
                                <div class="pt-3 pb-1 mb-2">
                                    <span class="text--sm__title">Trao đổi dịch vụ: <span class="text--primary"><a href="/dich-vu-da-mua-{{$item->id}}">#{{$item->id}}</a></span></span>
                                </div>
                                <div class="mb-2">
                                    <span class="text--sm__title">Nội dung</span>
                                </div>
                                <textarea name="message" class="textarea--content" placeholder="Nhập nội dung nếu cần thiết"></textarea>
                                <div class="pt-2 mb-2">
                                    <span class="text--sm__title">Hình ảnh</span>
                                </div>
                                <input type="file" name="image" accept="image/*" multiple="" class="input--file">
                                <div class="pt-2 mt-1 d-flex align-items-center">
                                    <label class="input--checkbox mr-2">
                                        <input type="checkbox" name="complain" id="complain" hidden>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="label--checkbox__input ml-1" for="complain">Khiếu nại</label>
                                </div>
                                <div class="pt-3">
                                    <span class="text--sm__title">Mã bảo vệ</span>
                                </div>
                                <div class="mt-2 mb-4 d-flex align-items-center captcha--code__group">
                                    <input type="text" name="captcha" id="captcha" class="input--text input-defautf-ct" placeholder="Nhập mã bảo vệ">
                                    <div class="captcha--code ml-3 mr-2">
                                        <img src="{{captcha_src('flat')}}" id="imgcaptcha" alt="" class="captcha--code__image">
                                    </div>
                                    <a href="javascript:void(0)" class="captcha--refresh">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/captcha-refresh.png" onclick="document.getElementById('imgcaptcha').src ='{{captcha_src('flat')}}'+Math.random();document.getElementById('captcha').focus();" alt="" class="captcha--refresh__image">
                                    </a>
                                </div>
                                <button type="submit" class="btn -primary btn-big">Gửi tin nhắn</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="/assets/frontend/{{theme('')->theme_key}}/js/cay-thue/logs-detail.js"></script>
@endsection
