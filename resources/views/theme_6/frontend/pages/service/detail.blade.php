@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data, 'data_seo_price' => $data_seo_price]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')

    @if($data == null)
        <div class="item_buy">
            <div class="container pt-3" style="padding-bottom: 600px">
                <div class="row pb-3 pt-3">
                    <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">
                            @if(isset($message))
                                {{ $message }}
                            @else
                                Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật dịch vụ thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                            @endif
                        </span>
                    </div>
                </div>

            </div>

        </div>
    @else

    <script src="/assets/frontend/{{theme('')->theme_key}}/rank/js/rslider.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/rank/js/select-chosen.js" type="text/javascript"></script>
    <link href="/assets/frontend/{{theme('')->theme_key}}/rank/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/rank/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/rank/css/chosen.css">
    <style type="text/css">
        @media only screen and (max-width: 640px) {
            .float_mb {
                float: left;
            }
        }
        .pay{
            display: block;
            background: #fb236a;
            border-radius: 17px;
            text-align: center;
            max-width: 118px;
            height: 30px;
            line-height: 30px;
            color: #fff;
            cursor: pointer;
        }
    </style>
    <script type="text/javascript">
        $(".pay").click(function(){
            $("#btnPurchase").click();
        })
    </script>
    <input type="hidden" name="slug_category" class="slug_category" value="{{ $data->slug }}">
    <div class="c-layout-page">
        <div class="news_breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-12 fixcssacount">
                        <ul class="news_breadcrumbs_theme news_breadcrumbs_theme__show">
                            <li><a href="/" class="news_breadcrumbs_theme_trangchu news_breadcrumbs_theme_trangchu_a">Trang chủ</a></li>
                            <li>/</li>
                            <li><a href="/dich-vu" class="news_breadcrumbs_theme_tintuc_a"><p class="news_breadcrumbs_theme_tintuc">Dịch vụ</p></a></li>
                            <li>/</li>
                            <li class="news_breadcrumbs_theme__li"><a href="javascript:void(0)" class="news_breadcrumbs_theme_title_a"><p class="news_breadcrumbs_theme_title">{{ $data->title }}</p></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN: PAGE CONTENT -->
        <div class="c-content-box c-size-lg c-overflow-hide c-bg-white font-roboto service-thumb">
            <div class="container">
                <div class="text-center showcontent mb-0  pt-4">
                    <h1 style="font-size: 30px;font-weight: bold;text-transform: uppercase;">DỊCH VỤ {{ $data->title }}</h1>
                    <div class="news_content_line m-auto"></div>
                    @if(isset($data->groups[0]->slug))
                        <div class="row d-sm-none  d-md-none  d-lg-none text-center">
                            <div class="col-md-12">
                                <p style="margin-top: 15px;font-size: 23px;text-align: center" class="bb"><i class="fa fa-server" aria-hidden="true"></i> <a href="/dich-vu/{{ $data->groups[0]->slug }}" style="color:#32c5d2">{{ $data->groups[0]->title }}</a></p>
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="/dich-vu/{{ $data->id }}/purchase" accept-charset="UTF-8" class="purchaseForm" enctype="multipart/form-data">
                        @csrf
                        <div class="container detail-service fixcssacount mt-4">
                            <div class="row">
                                <div class="col-md-7" style="margin-bottom:20px;">
                                    <div class="row">
                                        <div class="col-md-5 hidden-xs hidden-sm">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="news_image">
                                                        @if(isset($data->image))

                                                            <img src="{{\App\Library\MediaHelpers::media($data->image)}}" alt="{{ $data->title }}">
                                                        @else
                                                            <img src="https://nick.vn/storage/images/nfjY80CaXR_1623228739.jpg" alt="{{ $data->title }}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row__face">
                                                <p style="margin-top: 15px;" class="bb"><i class="fas fa-calendar-check" aria-hidden="true"></i> {{ $data->title }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            {{--                                    Kiểm tra máy chủ     --}}
                                            @if(\App\Library\HelpersDecode::DecodeJson('server_mode',$data->params) == "1")
                                                @php
                                                    $server_data=\App\Library\HelpersDecode::DecodeJson('server_data',$data->params);
                                                    $server_id = \App\Library\HelpersDecode::DecodeJson('server_id',$data->params);
                                                @endphp
                                                <span class="mb-15 control-label bb text-left" style="">Chọn máy chủ:</span>
                                                @if(!empty($server_data))
                                                    {{--                                        @dd($server_data)--}}
                                                    <div class="mb-15">
                                                        <select name="server[]" class="server-filter form-control t14" style="">
                                                            @for($i = 0; $i < count($server_data); $i++)
                                                                @if((strpos($server_data[$i], '[DELETE]') === false))
                                                                    <option value="{{$server_id[$i]}}">{{$server_data[$i]}}</option>
                                                                @endif
                                                            @endfor
                                                        </select>
                                                    </div>
                                                @endif
                                            @endif
                                            {{--                                dich vu may chu khac    --}}
                                            @if(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) == "4"){{--//dạng chọn một--}}
                                            @php
                                                $name=\App\Library\HelpersDecode::DecodeJson('name',$data->params);
                                                $price=\App\Library\HelpersDecode::DecodeJson('price',$data->params);
                                            @endphp
                                            @if(!empty($name))
                                                <span class="mb-15 control-label bb text-left" style="">{{\App\Library\HelpersDecode::DecodeJson('filter_name',$data->params)}}:</span>
                                                <div class="mb-15">
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
                                            <span class="mb-15 control-label bb text-left" style="">Nhập số tiền cần mua:</span>
                                            <div class="mb-15">
                                                <input autofocus="" value="{{old('input_pack',\App\Library\HelpersDecode::DecodeJson('input_pack_min',$data->params))}}" class="form-control t14 price " id="input_pack" type="text" placeholder="Số tiền">
                                                <span style="font-size: 14px; ">Số tiền thanh toán phải từ <b style="font-weight:bold;">{{ str_replace(',','.',number_format(\App\Library\HelpersDecode::DecodeJson('input_pack_min',$data->params))) }}đ</b>  đến <b style="font-weight:bold;">{{ str_replace(',','.',number_format(\App\Library\HelpersDecode::DecodeJson('input_pack_max',$data->params))) }}đ</b> </span>
                                            </div>
                                            <span class="mb-15 control-label bb text-left" style="">Hệ số:</span>
                                            <div class="mb-15">
                                                <input type="text" id="txtDiscount" class="form-control t14" placeholder="" value="" readonly="">
                                            </div>
                                            @elseif(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) == "5") {{--//dạng chọn nhiều--}}
                                            <span class="mb-15 control-label bb text-left" style="">{{\App\Library\HelpersDecode::DecodeJson('filter_name',$data->params)}}:</span>
                                            <div class="simple-checkbox s-filter">
                                                @php
                                                    $name=\App\Library\HelpersDecode::DecodeJson('name',$data->params);
                                                    $price=\App\Library\HelpersDecode::DecodeJson('price',$data->params);
                                                @endphp
                                                @if(!empty($name))
                                                    @for ($i = 0; $i < count($name); $i++)
                                                        @if($name[$i]!=null)
                                                            <p><input value="{{$i}}" type="checkbox" id="{{$i}}">
                                                                <label for="{{$i}}">{{$name[$i]}}{{isset($price[$i])? " - ".number_format($price[$i]). " VNĐ":""}}</label>
                                                            </p>
                                                        @endif

                                                    @endfor
                                                @endif
                                            </div>
                                            @elseif(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) =="6") {{--//dạng chọn a->b--}}

                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">

                                    <div class="row emply-btns">
                                        <div class="col-md-12 col-md-offset-2">
                                            <div class=" emply-btns text-center">
                                                <input type="hidden" name="value" value="">
                                                <input type="hidden" name="selected" value="">
                                                <input type="hidden" name="server">
                                                <a id="txtPrice" style="font-size: 20px;font-weight: bold;text-decoration: none;color: #FFFFFF" class="">Tổng: 0 VNĐ</a>
                                                <button id="btnPurchase" type="button" style="font-size: 20px;" class="followus"><i class="fa fa-credit-card" aria-hidden="true"></i> Thanh toán</button>
                                            </div>
                                        </div>
                                    </div>

                                    {{--                            <div class="row emply-btns box-body fixboxbody" style="">--}}
                                    {{--                                {!! $data->description !!}--}}
                                    {{--                            </div>--}}

                                </div>
                            </div>
                            @if(\App\Library\HelpersDecode::DecodeJson('filter_type',$data->params) =="6") {{--//dạng chọn a->b--}}
                            <div class="row">
                                <div class="col-md-12 float_mb">
                                    <script src="/assets/frontend/{{theme('')->theme_key}}/rank/js/rslider.js"></script>
                                    <script src="/assets/frontend/{{theme('')->theme_key}}/rank/js/select-chosen.js" type="text/javascript"></script>
                                    <link href="/assets/frontend/{{theme('')->theme_key}}/rank/css/style.css" rel="stylesheet" type="text/css"/>
                                    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/rank/css/style.css">
                                    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/rank/css/responsive.css">
                                    <link rel="stylesheet" type="text/css" href="/assets/frontend/{{theme('')->theme_key}}/rank/css/chosen.css">
                                    <span class="mb-15 control-label bb text-left" style="">{{\App\Library\HelpersDecode::DecodeJson('filter_name',$data->params)}}:</span>

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
                                            <div class="dropdown-field from-field">
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
                                            <div class="dropdown-field to-field">
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
                                                            <td style="width:150px;" class="m-datatable__cell">{{number_format(intval($price[$i+1])- intval($price[$i])). " VNĐ"}}</td>
                                                            <td class="m-datatable__cell">
                                                                @if(\App\Library\AuthCustom::check())
                                                                    <span class="pay">Thanh toán</span>
                                                                @else
                                                                    <a style="font-size: 20px;" class="followus pay" href="/login" title=""><i aria-hidden="true"></i> Đăng nhập</a>
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
                                            .pay{
                                                display: block;
                                                background: #fb236a;
                                                border-radius: 17px;
                                                text-align: center;
                                                max-width: 118px;
                                                height: 30px;
                                                line-height: 30px;
                                                color: #fff;
                                                cursor: pointer;
                                            }
                                        </style>
                                        <script type="text/javascript">
                                            $(".pay").click(function(){
                                                $("#btnPurchase").click();
                                            })
                                        </script>
                                    </div>
                                </div>
                                <input type="hidden" id="json_rank" name="custId" value="{{ json_encode($data) }}">
                            </div>
                            @endif
                        </div>

                        <div class="modal fade" id="homealert" role="dialog" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Xác nhận thông tin thanh toán</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div >
                                        <div class="row error__service">

                                        </div>
                                    </div>
                                    <div class="modal-body">

                                        @php
                                            $send_name=\App\Library\HelpersDecode::DecodeJson('send_name',$data->params);
                                            $send_type=\App\Library\HelpersDecode::DecodeJson('send_type',$data->params);
                                            $index = 0;
                                        @endphp
                                        @if(!empty($send_name)&& count($send_name)>0)

                                            @for ($i = 0; $i < count($send_name); $i++)
                                                @if($send_name[$i]!=null)
                                                    <span class="mb-15 control-label bb text-left" style="">{{$send_name[$i]}}:</span>
                                                    {{--check trường của sendname--}}
                                                    @if($send_type[$i]==1 || $send_type[$i]==2||$send_type[$i]==3)
                                                        @php
                                                            $index = $index + 1;
                                                        @endphp
                                                        <div class="mb-15">
                                                            <input type="text" required name="customer_data{{$i}}" class="form-control t14 " placeholder="{{$send_name[$i]}}" value="">
                                                        </div>

                                                    @elseif($send_type[$i]==4)
                                                        @php
                                                            $index = $index + 1;
                                                        @endphp
                                                        <div class="mb-15">
                                                            <input type="file" required accept="image/*" class="form-control" name="customer_data{{$i}}" placeholder="{{$send_name[$i]}}">
                                                        </div>
                                                    @elseif($send_type[$i]==5)
                                                        @php
                                                            $index = $index + 1;
                                                        @endphp
                                                        <div class="mb-15">
                                                            <input type="password" required class="form-control" name="customer_data{{$i}}" placeholder="{{$send_name[$i]}}">
                                                        </div>
                                                    @elseif($send_type[$i]==6)
                                                        @php
                                                            $index = $index + 1;
                                                        @endphp
                                                        @php
                                                            $send_data=\App\Library\HelpersDecode::DecodeJson('send_data'.$i,$data->params);
                                                        @endphp
                                                        <div class="mb-15">
                                                            <select name="customer_data{{$i}}" required class="mb-15 control-label bb text-left" style="">
                                                                @if(!empty($send_data))
                                                                    @for ($sn = 0; $sn < count($send_data); $sn++)
                                                                        <option value="{{$sn}}">{{$send_data[$sn]}}</option>
                                                                    @endfor
                                                                @endif
                                                            </select>
                                                        </div>
                                                    @endif

                                                @endif
                                            @endfor
                                        @else
                                            <p> Bạn thực sự muốn thanh toán?</p>
                                        @endif
                                    </div>

                                    <input type="hidden" name="index" value="{{ $index }}">
                                    <div class="modal-footer modal-footer__data">
                                        <div>
                                            @if(\App\Library\AuthCustom::check())
                                                <button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold loading" id="d3" style="" >Xác nhận thanh toán</button>
                                            @else
                                                <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login?return_url=/dich-vu/{{ $data->slug }}">Đăng nhập</a>
                                            @endif
                                        </div>

                                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            {{--            Tính toán  --}}



            {{--            Nội dung   --}}

            <div class="container fixcssacount">
                <div class="job-wide-devider">
                    {{--                    Bot   --}}

                    <div class="row marginauto">
                        <div class="col-md-12 left-right data-bot">

                        </div>
                    </div>

                    {{--MO tả --}}

                    <div class="row">
                        <div class="col-lg-12 column">
                            <div class="job-details">
                                <h2 style="margin-bottom: 23px;font-size: 20px;font-weight: bold;text-transform: uppercase;">Mô tả</h2>
                                <div class="news_content_line"></div>
                                <div class="article-content hidetext">
                                    {!! $data->content  !!}
                                </div>
                                <div style="text-align: center;margin: 15px 0">
                                    <span class="viewmore">Xem tất cả »</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{--            DỊCH VỤ KHÁC     --}}
            {{--        {!! widget('frontend.pages.service.widget.list_service_category',60) !!}--}}
            @include('frontend.pages.service.widget.__related')

        </div>

        <input style="display: none" type="text" value="1801" id="id_service">

        <!-- END: PAGE CONTENT -->
    </div>


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
                let s_discount = data["discount"];
                data.price.forEach((price_mark,idx) => {
                    if (price >= price_mark){
                        discount = s_discount[idx];
                    }
                })
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

    @endif

@endsection

