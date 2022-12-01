@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data, 'data_seo_price' => $data_seo_price]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')

<section>

    <link href="/assets/frontend/{{theme('')->theme_key}}/css/service.css" rel="stylesheet" type="text/css"/>

    <style type="text/css">
        @media only screen and (max-width: 640px) {
            .float_mb {
                float: left;
            }
        }
        .pay{
            display: block;
            background: rgb(238, 70, 35) !important;
            border-radius: 17px;
            text-align: center;
            max-width: 118px;
            height: 30px;
            line-height: 30px;
            color: #fff;
            cursor: pointer;
        }
    </style>

    <input type="hidden" name="slug_category" class="slug_category" value="{{ $data->slug }}">
    <div class="container">

        <nav aria-label="breadcrumb" style="margin-top: 10px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/dich-vu">Dịch vụ</a></li>

                <li class="breadcrumb-item active" aria-current="page">{{ $data->title }}</li>
            </ol>
        </nav>

        <div class="c-content-box c-overflow-hide c-bg-white font-roboto" style="padding-top: 16px">
            <div class="notify">

            </div>
            <div class="text-center" style="margin-bottom: 24px;margin-top: 0px;">
                <h1 style="font-size: 1.5rem;font-weight: bold;text-transform: uppercase">{{ $data->title }}</h1>
            </div>
            <form method="POST" action="/dich-vu/{{ $data->id }}/purchase" accept-charset="UTF-8" class="purchaseForm" enctype="multipart/form-data">
                @csrf
                <div class="detail-service">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="text-center">
                                <img style="width: 100%" src="{{\App\Library\MediaHelpers::media($data->image)}}" alt="{{ $data->title }}" alt="{{ $data->title }}">
                            </div>
                        </div>
                        <div class="col-md-5">

                            <div class="config">
                                {{--                                    Kiểm tra máy chủ     --}}
                                @if(\App\Library\HelpersDecode::DecodeJson('server_mode',$data->params) == "1")
                                    @php
                                        $server_data=\App\Library\HelpersDecode::DecodeJson('server_data',$data->params);
                                        $server_id = \App\Library\HelpersDecode::DecodeJson('server_id',$data->params);
                                    @endphp
                                <div class="form-group">
                                    <label style="font-weight: 700">Chọn máy chủ:</label>

                                    @if(!empty($server_data))
                                        <select name="server[]" class="server-filter form-control t14" style="">
                                            @for($i = 0; $i < count($server_data); $i++)
                                                @if((strpos($server_data[$i], '[DELETE]') === false))
                                                    <option value="{{$server_id[$i]}}">{{$server_data[$i]}}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    @endif
                                </div>

                                @endif

                                {{--                                dich vu may chu khac    --}}
                                @if(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) == "4"){{--//dạng chọn một--}}
                                @php
                                    $name=\App\Library\HelpersDecode::DecodeJson('name',$data->params);
                                    $price=\App\Library\HelpersDecode::DecodeJson('price',$data->params);
                                @endphp
                                    @if(!empty($name))
                                    <div class="form-group">
                                        <label style="font-weight: 700">{{\App\Library\HelpersDecode::DecodeJson('filter_name',$data->params)}}:</label>

                                        <select name="selected" class="s-filter form-control t14" style="">
                                            @for ($i = 0; $i < count($name); $i++)
                                                @if($name[$i]!=null)
                                                    <option value="{{$i}}">{{$name[$i]}}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                    @endif

                                @elseif(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) == "7"){{--////dạng nhập tiền thành toán--}}
                                <div class="form-group">
                                    <div class="row" style="width: 100%;margin: 0 auto">
                                        <div class="col-auto" style="width: 80%;padding-right: 8px;padding-left: 0">
                                            <label style="font-weight: 700">Nhập số tiền cần mua:</label>
                                            <input style="margin-bottom: 8px" autofocus="" value="{{old('input_pack',\App\Library\HelpersDecode::DecodeJson('input_pack_min',$data->params))}}" class="form-control t14 price " id="input_pack" type="text" placeholder="Số tiền">
                                            <span style="font-size: 14px;">Số tiền thanh toán phải từ <b style="font-weight:bold;">{{ str_replace(',','.',number_format(\App\Library\HelpersDecode::DecodeJson('input_pack_min',$data->params))) }}đ</b>  đến <b style="font-weight:bold;">{{ str_replace(',','.',number_format(\App\Library\HelpersDecode::DecodeJson('input_pack_max',$data->params))) }}đ</b> </span>
                                        </div>

                                        <div class="col-auto" style="width: 20%;padding-left: 8px;padding-right: 0">
                                            <label style="font-weight: 700">Hệ số:</label>
                                            <input type="text" id="txtDiscount" class="form-control t14" placeholder="" value="" readonly="">
                                        </div>
                                    </div>

                                </div>
                                @elseif(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) == "5") {{--//dạng chọn nhiều--}}
                                <div class="form-group">
                                    <label>{{\App\Library\HelpersDecode::DecodeJson('filter_name',$data->params)}}:</label>
                                    <div class="col-m-12 message-error" id="error-mes-checkbox"></div>
                                    <div class="simple-checkbox s-filter" style="border: 1px solid #ced4da;border-radius: 8px;padding: 8px 0px 8px 8px;">
                                        <div class="row" style="width: 100%;margin: 0 auto">
                                            <div class="col-md-12 left-right" id="chonnhieu">
                                                @php
                                                    $name=\App\Library\HelpersDecode::DecodeJson('name',$data->params);
                                                    $price=\App\Library\HelpersDecode::DecodeJson('price',$data->params);
                                                @endphp
                                                @if(!empty($name))
                                                    @for ($i = 0; $i < count($name); $i++)
                                                        @if($name[$i]!=null)
                                                            <p><input class="allgame" value="{{$i}}" type="checkbox" id="{{$i}}">
                                                                <label style="font-family: Roboto, Helvetica Neue, Helvetica, Arial;font-size: 14px" for="{{$i}}">{{$name[$i]}}{{isset($price[$i])? " - ".str_replace(',','.',number_format($price[$i])). " VNĐ":""}}</label>
                                                            </p>
                                                        @endif

                                                    @endfor
                                                @endif
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                @elseif(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) =="6") {{--//dạng chọn a->b--}}

                                @endif
{{-- Thông tin tài khoản  --}}
                                @php
                                    $send_name=\App\Library\HelpersDecode::DecodeJson('send_name',$data->params);
                                    $send_type=\App\Library\HelpersDecode::DecodeJson('send_type',$data->params);
                                    $index = 0;
                                @endphp
                                @if(!empty($send_name)&& count($send_name)>0)

                                    @for ($i = 0; $i < count($send_name); $i++)
                                        @if($send_name[$i]!=null)
                                            @if($i == 0 && \App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) == "5")
                                            <div class="form-group" style="padding-top: 16px">
                                            @else
                                            <div class="form-group">
                                            @endif
                                                @if($send_type[$i] !=7)
                                                    @if(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) == "5" && $i == 0)
                                                    <label style="font-weight: 700" class="form-group-tt">{{$send_name[$i]}}:</label>
                                                    @else
                                                        <label style="font-weight: 700">{{$send_name[$i]}}:</label>
                                                    @endif
                                                @endif
                                                @if($send_type[$i]==1 || $send_type[$i]==2||$send_type[$i]==3)
                                                    @php
                                                        $index = $index + 1;
                                                    @endphp
                                                    <input type="text" required name="customer_data{{$i}}" class="form-control t14 " placeholder="{{$send_name[$i]}}" value="">
                                                    <div class="error-message-text"></div>
                                                @elseif($send_type[$i]==4)
                                                    @php
                                                        $index = $index + 1;
                                                    @endphp
                                                    <input type="file" required accept="image/*" class="form-control" name="customer_data{{$i}}" placeholder="{{$send_name[$i]}}">
                                                @elseif($send_type[$i]==5)
                                                    @php
                                                        $index = $index + 1;
                                                    @endphp
                                                    <input type="password" required class="form-control " name="customer_data{{$i}}" placeholder="{{$send_name[$i]}}">
                                                    <div class="error-message-text"></div>
                                                @elseif($send_type[$i]==6)
                                                    @php
                                                        $index = $index + 1;
                                                    @endphp
                                                    @php
                                                        $send_data=\App\Library\HelpersDecode::DecodeJson('send_data'.$i,$data->params);
                                                    @endphp
                                                    <select name="customer_data{{$i}}" required class="mb-15 control-label bb">
                                                        @if(!empty($send_data))
                                                            @for ($sn = 0; $sn < count($send_data); $sn++)
                                                                <option value="{{$sn}}">{{$send_data[$sn]}}</option>
                                                            @endfor
                                                        @endif
                                                    </select>
                                                @elseif($send_type[$i]==7)
                                                    @php
                                                        $index = $index + 1;
                                                    @endphp
                                                    @php
                                                        $send_data=\App\Library\HelpersDecode::DecodeJson('send_data'.$i,$data->params);
                                                    @endphp
                                                    <div class="d-flex">
                                                        <input class="confirm-rules" name="customer_data{{$i}}" type="checkbox" id="customer_data{{$i}}">
                                                        <label style="margin-left: 8px;cursor: pointer" for="customer_data{{$i}}">{{$send_name[$i]}}</label>

                                                    </div>
                                                    <div class="error-message-checkbox"></div>
                                                @endif



                                            </div>
                                        @endif
                                    @endfor
                                @endif

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="">
                                <input type="hidden" name="value" value="">
                                <input type="hidden" name="selected" value="">
                                <input type="hidden" name="server">
                                <a id="txtPrice" style="font-size: 20px;font-weight: bold;display: block;margin-bottom: 15px"
                                   class="btn btn-success">Tổng: 0 Xu</a>
                                @if(App\Library\AuthCustom::check())
                                <button id="btnPurchase" type="button" style="font-size: 18px;font-weight: bold;display: block;margin-bottom: 15px;cursor: pointer" class="btn-auth" >
                                    <i class="fa fa-credit-card" aria-hidden="true"></i> Thanh toán
                                </button>
                                @else
                                    <a href="#" data-toggle="modal" data-target="#modal-login" style="font-size: 18px;font-weight: bold;display: block;margin-bottom: 15px;cursor: pointer" class="btn-auth"><i class="fa fa-credit-card" aria-hidden="true"></i> Thanh toán</a>
                                @endif
                            </div>

{{--                            <div class="row"--}}
{{--                                 style="color: #505050;padding:20px;line-height: 2;margin-top: 30px">--}}
{{--                                <p><span style="font-size:16px"><strong>Hệ thống b&aacute;n RP Li&ecirc;n Minh Huyền Thoại&nbsp;gi&aacute; rẻ, uy t&iacute;n, chiết khấu cao</strong>.</span></p>--}}

{{--                                <p><span style="font-size:16px"><strong>Đảm bảo RP sạch 100%.</strong>&nbsp;</span><span style="font-size:16px"><strong>Mọi giao dịch đều c&oacute; ảnh&nbsp;h&oacute;a đơn của GARENA&nbsp;gửi cho qu&yacute; kh&aacute;ch</strong>.</span></p>--}}

{{--                                <p><span style="font-size:16px">Ngo&agrave;i c&aacute;ch nạp RP - LOL ( Li&ecirc;n Minh )&nbsp;trực tiếp, c&aacute;c bạn c&oacute; thể <strong><a href="https://napgamegiare.net/mua-the">mua thẻ Garena</a></strong>&nbsp;gi&aacute; rẻ với chiết khấu l&ecirc;n đến 5% <strong><a href="https://napgamegiare.net/mua-the">tại đ&acirc;y</a></strong></span></p>--}}
{{--                            </div>--}}

                        </div>
                    </div>
                </div>

                    @if(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) =="6") {{--//dạng chọn a->b--}}
                    <div class="row" style="margin: 0 auto; width: 100%;padding-top: 24px">
                        <div class="col-md-12 left-right float_mb">
                            <script src="/assets/frontend/{{theme('')->theme_key}}/rank/js/rslider.js"></script>
                            <script src="/assets/frontend/{{theme('')->theme_key}}/rank/js/select-chosen.js" type="text/javascript"></script>
                            <link href="/assets/frontend/{{theme('')->theme_key}}/rank/css/style.css" rel="stylesheet" type="text/css"/>
                            <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/rank/css/style.css">
                            <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/rank/css/responsive.css">
                            <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/rank/css/chosen.css">
                            <span class="mb-15 control-label bb">{{\App\Library\HelpersDecode::DecodeJson('filter_name',$data->params)}}:</span>

                            <div class="range_slider" style="">
                                <div class="nstSlider" data-range_min="0" data-cur_min="0">
                                    <div class="bar" ></div>
                                    <div class="leftGrip"></div>
                                    <div class="rightGrip"></div>
                                </div>
                            </div>
                            @php
                                $name=\App\Library\HelpersDecode::DecodeJson('name',$data->params);
                                $price=\App\Library\HelpersDecode::DecodeJson('price',$data->params);
                            @endphp
                            <div class="row service-choice">
                                <div class="col-sm-6">
                                    <h5>Từ</h5>
                                    <div class="dropdown-field from-field" style="padding-top: 8px">
                                        <select class="from-chosen" name="rank_from">
                                            @if(!empty($name))
                                                @for ($i = 0; $i < count($name)-1; $i++)
                                                    @if($name[$i]!=null)
                                                        <option value="{{ $i }}">{{$name[$i]}}</option>
                                                    @endif
                                                @endfor
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="clear-fix"></div>
                                    <h5>đến</h5>
                                    <div class="dropdown-field to-field" style="padding-top: 8px">
                                        <select class="to-chosen" name="rank_to">
                                            @if(!empty($name))
                                                @for ($i = 1; $i < count($name); $i++)
                                                    @if($name[$i]!=null)
                                                        <option value="{{ $i }}">{{$name[$i]}}</option>
                                                    @endif
                                                @endfor
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h2>Bảng giá</h2>
                            <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                                <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                                    <thead class="m-datatable__head">
                                    <tr class="m-datatable__row">
                                        <th style="width:30px;" class="m-datatable__cell">
                                            #
                                        </th>
                                        <th class="m-datatable__cell">
                                            Tên
                                        </th>
                                        <th style="width:150px;" class="m-datatable__cell">
                                            Tiền công
                                        </th>
                                        <th style="width:150px;" class="m-datatable__cell">
                                            Thanh toán
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="m-datatable__body">
                                    @if(!empty($name))
                                        @for ($i = 0; $i < count($name)-1; $i++)
                                            @if($name[$i]!=null)
                                                <tr class="m-datatable__row m-datatable__row--even">
                                                    <td style="width:30px;" class="m-datatable__cell">{{$i+1}}</td>
                                                    <td class="m-datatable__cell">{{$name[$i]}} -> {{$name[$i+1]}}</td>
                                                    <td style="width:150px;" class="m-datatable__cell">{{ str_replace(',','.',number_format(intval($price[$i+1])- intval($price[$i]))). " VNĐ"}}</td>
                                                    <td class="m-datatable__cell">
                                                        @if(\App\Library\AuthCustom::check())
                                                            <span class="pay">Thanh toán</span>
                                                        @else
{{--                                                            <a href="#" data-toggle="modal" data-target="#modal-login" style="font-size: 18px;font-weight: bold;display: block;margin-bottom: 15px;cursor: pointer"><i class="fa fa-credit-card" aria-hidden="true"></i> Thanh toán</a>--}}

                                                            <a href="#" data-toggle="modal" data-target="#modal-login" style="font-size: 16px;" class="followus c-pay"><i aria-hidden="true"></i> Đăng nhập</a>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endif

                                        @endfor
                                    @endif
                                    </tbody>
                                </table>
                                <style type="text/css">
                                    @media only screen and (max-width: 640px) {
                                        .float_mb {
                                            float: left;
                                        }
                                    }
                                    .c-pay{
                                        display: block;
                                        background: rgb(238, 70, 35);
                                        border-radius: 17px;
                                        text-align: center;
                                        max-width: 118px;
                                        height: 30px;
                                        line-height: 30px;
                                        color: #fff;
                                        cursor: pointer;
                                        font-size: 16px;
                                    }

                                    .c-pay:hover{
                                        color: #fff!important;
                                    }
                                </style>
                                <script type="text/javascript">
                                    $(".pay").click(function(){
                                        $('#homealert').modal('show');
                                    })
                                </script>
                            </div>
                        </div>
                        <input type="hidden" id="json_rank" name="custId" value="{{ json_encode($data) }}">
                    </div>
                    @endif

                <!-- Modal -->
                    <div class="modal fade" id="homealert" role="dialog" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">


                                <div class="modal-header">
                                    <div class="col-1"></div>
                                    <div class="col-10 text-center"><h6 class="modal-title">Xác nhận thanh toán</h6></div>
                                    <div class="col-1 ">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <div >
                                    <div class="row error__service">

                                    </div>
                                </div>
                                <div class="modal-body">
                                    <p> Bạn thực sự muốn thanh toán?</p>

                                </div>
                                <div class="modal-footer">

                                    <input type="hidden" name="index" value="{{ $index }}">
                                    <button type="submit"
                                            class="btn btn-success c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" id="d3"
                                            style="">Xác nhận thanh toán
                                    </button>



                                    <button type="button"
                                            class="btn btn-danger c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                                            data-dismiss="modal">Đóng
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </form>

            <div class="job-wide-devider data-bot">

            </div>

            @include('frontend.pages.service.widget.__description')

            <div class="tab-vertical tutorial_area">
                <div class="panel-group" id="accordion">

                </div>
            </div>

            @include('frontend.widget.__dichvu__lienquan')

            @include('frontend.widget.__tai__khoan__lien__quan')


            @include('frontend.pages.service.widget.__binhluan')

        </div>

    </div><!-- /.container -->

    @if(isset($data->note))
        <div class="modal fade in" id="notiseviceModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">×</span>--}}
{{--                        </button>--}}
                    </div>
                    <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                        {!! $data->note !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
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
</section>



<script id="history-template" type="text/x-handlebars-template">
        <tr>
            <td class="text-danger"><b>@{{idCustomer}}</b></td>
            <td class="base-color"><b>@{{txtHistory}}</b></td>
        </tr>
    </script>
<script id="message-template" type="text/x-handlebars-template">
        <li class="clearfix">
            <div class="message-data align-right">
                <span class="message-data-time" > @{{time}} , Vừa xong</span> &nbsp; &nbsp;
                <span class="message-data-name" >Bạn</span> <i class="fa fa-circle me"></i>
            </div>
            <div class="message other-message float-right">
                @{{messageOutput}}            </div>
        </li>
    </script>

<script id="message-response-template" type="text/x-handlebars-template">
        <li>
            <div class="message-data">
                <span class="message-data-name"><i class="fa fa-circle online"></i> Khách</span>
                <span class="message-data-time"> @{{time}}, Vừa xong</span>
            </div>
            <div class="message my-message">
                @{{response}}            </div>
        </li>
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>

<script id="rendered-js">
    (function () {

        var chat = {
            messageToSend: '',
            messageResponses: [
                'Dịch vụ nạp uy tín ghê',
                'Uy tín không anh em.',
                'Vãi vừa ấn nạp xong vào game có ngay (y)',
                'Web uy tín đấy, vừa nạp 500k xong.',
                'Nãy có ông bạn nạp 500k xong vào nạp luôn, quá xịn admin ơi.',
                'Thanks admin <3 , uy tín lắm luôn',
                'Nhanh gọn uy tín, thanks admin',
                'Web xịn không scam nha mọi người',
                'Hàng sạch, thanks admin',
                'Vừa nạp xong, quá ngon',
                'Web ok không anh em, có scam không?',
                'Vừa chạy ra quán mua 500k thẻ nạp ăn luôn, ngon quá admin',
                'Nhập nhầm mã thẻ với serial báo admin xử lý trong vòng 1 nốt nhạc, uy tín quá admin ơi',
                'Cứ tưởng lừa đảo, nạp thử 200k nhận luôn kim cương trong 10s',
                '1 vote uy tín cho web nhé, quá ngon luôn',
                'Bị lừa nhiều rồi, giờ mới tìm được web uy tín, thanks ad',
                'Vừa nạp 100k xong',
                'Web ngon vl',
                'Anh em nào chưa nạp thì vào nạp ngay đi đang có khuyến mại',
                'Uy tín lắm admin',
                'Vote 10000k sao nhé, quá uy tín',
                'Có anh em nào vừa từ youtube qua đây nạp k',
                'Ông em vừa giới thiệu, nạp cái ăn luôn, ngon vc',
                'Uy tín nhé anh em',
                'Đã nạp thành công',
                'Đã nạp ở đây 20tr tiền thẻ, vote uy tín nhé',
                'Web nạp ngon thế này mà giờ mới biết',
                'Đã nạp, nhanh lắm nhé',
                'Ngon vcl, +5 sao cho admin',
                'Nghe anh em review ngon quá, tôi ra làm cái thẻ 500k nạp đây',
                'Không scam, web nạp thật, nhận thật nhé !',
                'Đã nạp và thấy ngon ngọt nhé ae',
                'Web này trùm nạp mẹ rồi',
                'Web được đấy anh em',
                'Thấy web được nhiều anh em nạp rồi, yên tâm nạp hehe',
                'Anh em không phải sợ đâu, tôi nạp nhiều web này rồi',
                'Web xịn không scam nha mọi người'
            ],

            init: function () {
                this.cacheDOM();
                this.bindEvents();
                this.render();
            },
            cacheDOM: function () {
                this.$chatHistory = $('.chat-history');
                this.$button = $('.btn-send-message');
                this.$textarea = $('#message-to-send');
                this.$chatHistoryList = this.$chatHistory.find('ul');
            },
            bindEvents: function () {
                this.$button.on('click', this.addMessage.bind(this));
                this.$textarea.on('keyup', this.addMessageEnter.bind(this));
            },
            render: function () {

                this.scrollToBottom();
                if (this.messageToSend.trim() !== '') {
                    var template = Handlebars.compile($("#message-template").html());
                    var context = {
                        messageOutput: this.messageToSend,
                        time: this.getCurrentTime()
                    };
                    this.$chatHistoryList.append(template(context));
                    this.scrollToBottom();
                    this.$textarea.val('');
                }
                // history-card
                var templateHistoryResponse = Handlebars.compile($("#history-template").html());
                var arrayTelCo = ['VIETTEL', 'VINAPHONE', 'MOBIFONE', 'VIETNAMOBILE', 'ZING'];
                var arrayPrice = ['10.000 đ', '20.000 đ', '30.000 đ', '50.000 đ', '100.000 đ', '200.000 đ', '300.000 đ', '500.000 đ', '1.000.000 đ'];
                var html = '';
                for (var i = 0; i < 10; i++) {
                    var contentHistory = {
                        idCustomer: '******' + Math.floor(100000 + Math.random() * 900000),
                        txtHistory: 'Nạp thành công thẻ ' + arrayTelCo[Math.floor(1 + Math.random() * arrayTelCo.length) - 1] + ' mệnh giá ' + arrayPrice[Math.floor(1 + Math.random() * arrayPrice.length) - 1]
                    }
                    html += templateHistoryResponse(contentHistory);
                }
                $('#tblHistory').html(html);
                setInterval(function () {
                    var html = '';
                    for (var i = 0; i < 10; i++) {
                        var contentHistory = {
                            idCustomer: '******' + Math.floor(100000 + Math.random() * 900000),
                            txtHistory: 'Nạp thành công thẻ ' + arrayTelCo[Math.floor(1 + Math.random() * arrayTelCo.length) - 1] + ' mệnh giá ' + arrayPrice[Math.floor(1 + Math.random() * arrayPrice.length) - 1]
                        }
                        html += templateHistoryResponse(contentHistory);
                    }
                    $('#tblHistory').html(html);
                }, 60000);

                setInterval(function () {
                    // responses
                    var templateResponse = Handlebars.compile($("#message-response-template").html());
                    var contextResponse = {
                        response: this.getRandomItem(this.messageResponses),
                        time: this.getCurrentTime()
                    };
                    this.$chatHistoryList.append(templateResponse(contextResponse));
                    this.scrollToBottom();
                }.bind(this), 5000);
            },

            addMessage: function () {
                this.messageToSend = this.$textarea.val();
                this.render();
            },
            addMessageEnter: function (event) {
                // enter was pressed
                if (event.keyCode === 13) {
                    this.addMessage();
                }
            },
            scrollToBottom: function () {
                $('.chat-scroll').scrollTop($('.chat-scroll')[0].scrollHeight);
            },
            getCurrentTime: function () {
                return new Date().toLocaleTimeString().
                replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3");
            },
            getRandomItem: function (arr) {
                return arr[Math.floor(Math.random() * arr.length)];
            }
        };

        chat.init();

    })();
    //# sourceURL=pen.js
</script>


<style type="text/css">

    @media        only screen and (max-width: 580px) {
        .hidetext {
            max-height: 220px;
            overflow: hidden;
        }
        .intro-text iframe{
            width: 100%;
            height: 220px;
        }
        .intro-text img {
            height: auto !important;
        }
    }
    @media        only screen and (min-width: 580px) {
        .hidetext {
            max-height: 220px;
            overflow: hidden;
        }
        .intro-text iframe{
            width: 100%;
            height: 641px;
        }
    }
    .showtext {
        max-height:initial;
    }
    .viewless,.viewmore{
        cursor: pointer;
        color: #f1c40f;
        padding-top: 10px;
        font-size: 18px;
    }

    .intro-text img {
        max-width: 90%;
    }
</style>

<script>



    $(document).ready(function () {

        $('body').on('click','#btnPurchase',function(){
            let is_ok = true;
            let html = '';

            let required = $('input[required]');
            if (required.length){
                required.each(function () {
                    $(this).toggleClass('invalid',!$(this).val().trim());
                    if (!$(this).val().trim()){
                        is_ok = false;
                        let text = $(this).parent().prev().text().trim().toLowerCase();
                        html = `<div class="row marginauto order-errors" style="padding-top:8px;width: 100%;margin: 0 auto"><div class="col-md-12 left-right default-span"><small style="color: rgb(238, 70, 35)">Vong lòng nhập thông tin.</small></div></div>`
                        $(this).next().html(html)
                    }else {
                        $(this).next().text('')
                    }
                });
            }

            if ($('.allgame[type=checkbox]').length){
                if (checkboxRequired('input.allgame[type=checkbox]')){
                    html = `<div class="row marginauto order-errors" style="padding-bottom: 8px;width: 100%;margin: 0 auto"><div class="col-md-12 left-right default-span"><small style="color: rgb(238, 70, 35)">Phải chọn ít nhất một gói dịch vụ</small></div></div>`;
                    is_ok = false;
                    $('#error-mes-checkbox').html(html)
                }else {
                    $('#error-mes-checkbox').html('');
                }
            }
            let html2 = '';
            let confirm_rules = $('.confirm-rules');

            // nếu không có nút confirm nào checked
            if (confirm_rules.length){
                if (!confirm_rules.is(':checked')){
                    console.log("đúng")
                    html2 = `<div class="row marginauto order-errors" style="width: 100%;margin: 0 auto"><div class="col-md-12 left-right default-span"><small style="color: rgb(238, 70, 35)">Vui lòng xác nhận thông tin trên</small></div></div>`;
                    is_ok = false;
                    $('.error-message-checkbox').html(html2)
                }else {
                    $('.error-message-checkbox').html('')
                }
            }

            if (is_ok){
                $('#homealert').modal('show');
            }

        });

        function checkboxRequired(selector) {
            let checkboxs = $(`${selector}:checked`);
            return !checkboxs.length;
        }
    });


    function Confirm(index, serverid) {
        $('[name="server"]').val(serverid);
        $('[name="selected"]').val(index);
        $('#btnPurchase').click();
    }

    var data = jQuery.parseJSON('{"input_auto":"1","idkey":"lienminh","image_oldest":"1","seo_description":"Hệ thống bán RP Liên Minh Huyền Thoại giá rẻ, uy tín, chiết khấu cao.  Đảm bảo RP sạch 100%. Nhận RP sau 30s thanh toán. Mọi giao dịch đều có ảnh hóa đơn của GARENA gửi cho quý khách. Mỗi ngày chúng tôi thực hiện đến 50.000 giao dịch mua RP LOL thành công","server_mode":"0","server_price":"0","server_id":["0"],"server_data":[null],"server_data_minValue":[null],"server_data_maxValue":[null],"filter_name":"RP LMHT","filter_type":"4","input_pack_min":null,"input_pack_max":null,"input_pack_rate":null,"id":["7","7","7","7","7","7",null],"name":["Gói 1 : 16 RP","Gói 2 : 32 RP","Gói 3 : 80 RP","Gói 4 : 168 RP","Gói 5 : 340 RP","Gói 6: 856 RP",null],"price":["7700","15400","38500","77000","154000","385000",null],"discount":["1","0","0","0","0","0",null],"total":["NaN",null,null,null,null,"NaN",null],"day":["0","0","0","0","0","0",null],"punish_price":["0","0","0","0","0","0",null],"praise_day":["0","10","0","20","0","50",null],"praise_price":["10","20","50","100","200","500",null],"send_name":["Tài khoản Garena","Mật khẩu Garena"],"send_type":["1","5"],"send_id0":[null],"send_data0":[null],"send_id1":[null],"send_data1":[null],"input_send_desc":"Khi mua ngọc tại web các bạn lưu ý để trong nick 1 ngọc và đứng tại siêu thị để nhận ngọc nhanh nhé","captcha":null}');



    var purchase_name = 'VNĐ';

    var server = -1;

    $(".server-filter").change(function (elm, select) {
        server = parseInt($(".server-filter").val());
        $('[name="server"]').val(server);
        UpdatePrice();
    });
    server = parseInt($(".server-filter").val());
    $('[name="server"]').val(server);

</script>

<input type="hidden" name="slug" id="slug" value="{{ $slug }}" />
<link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/service.css">
<script src="/assets/frontend/{{theme('')->theme_key}}/js/service/showdetailservice.js?v={{time()}}"></script>

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
        }
        else {
            var s_price = data["price"];
            price = parseInt(s_price[itemselect]);
        }
        $('[name="value"]').val('');
        $('[name="value"]').val(price);
        price = price.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        price = price.split('').reverse().join('').replace(/^[\.]/,'');
        $('#txtPrice').html('Tổng: ' + price + ' VNĐ');
        $('[name="selected"]').val($(".s-filter").val());

        $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
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
        }
        else {
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

                $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                    $(this).removeClass();
                });
            });
            $('#btnPurchase').prop('disabled', false);
        }
        else {
            $('#txtPrice').html('Tổng: 0 VNĐ');
            $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });
            $('#btnPurchase').prop('disabled', true);

        }
        price = price.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        price = price.split('').reverse().join('').replace(/^[\.]/,'');
        $('#txtPrice').html('Tổng: ' + price + ' VNĐ');
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
        var data =json.price;
        $('tbody tr.selected').removeClass('selected');
        for (var i = from + 1; i <= to; i++) {
            price += parseInt(data[i]-data[i-1]);
            $('tbody tr').eq(i - 1).addClass('selected');
        }
        $('[name="value"]').val('');
        $('[name="value"]').val(price);
        price = price.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        price = price.split('').reverse().join('').replace(/^[\.]/,'');
        $('#txtPrice').html('Tổng: ' + (price) + ' VNĐ');
        $('[name="selected"]').val(from + '|' + to);
        $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
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
    $('#txtPrice').html('');
    $('#txtPrice').html('Tổng: 0 ' + purchase_name);

    function UpdatePrice() {

        var container = $('.m-datatable__body').html('');


        if (data.server_mode == 1 && data.server_price == 1) {

            var s_price = data["price" + server];
            var s_discount = data["discount" + server];
        }
        else {
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

            $('#txtPrice').html('Tiền nhập không đúng');
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
        }
        else {
            var s_discount = data["discount"];
            let idx_server_selected = $('select.server-filter').val() * 1;
            discount = s_discount[idx_server_selected];
            total = price * discount;
        }

        $('[name="value"]').val('');
        $('[name="value"]').val(price);
        total = parseInt(total / 1000 * data.input_pack_rate);

        $('#txtDiscount').val(discount);
        total = total.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        total = total.split('').reverse().join('').replace(/^[\.]/,'');
        $('#txtPrice').html('');
        $('#txtPrice').html('Tổng: ' + total + " " + purchase_name);
        $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
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
