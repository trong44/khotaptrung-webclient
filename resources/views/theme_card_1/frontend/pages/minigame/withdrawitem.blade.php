@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    @if ($message = Session::get('success'))
        <div class="container">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    {{$message}}
                </div>
            </div>
        </div>
    @endif
    @if($messages=$errors->all())
        <div class="container">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    {{$messages[0]}}
                </div>
            </div>
        </div>
    @endif

    <section>
        <div class="container">

            <div class="row user-manager">
                @include('frontend.widget.__menu_profile')

                <div class="col-12 col-md-8 col-lg-9 site-form " style="min-height: 212.568px;">

                    <div class="menu-content">
                        <div class="title">
                            <h3>RÚT VẬT PHẨM GAME {{config('constants.game_type.'.$game_type)}}</h3>
                        </div>
                        <div class="booking_detail"></div>
                        <div class="wapper-grid profile">

                            <div class="form-group row" style="margin-top: 16px">
                                <label class="col-md-3 control-label">
                                    Chọn loại vật phẩm khác:
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group" style="width: 100%">
                                        <select name="game_type" id="game_type" class="form-control">
                                            @if(count($result->listgametype)>0)
                                                @foreach($result->listgametype as $item)
                                                    <option value="{{route('getWithdrawItem',[$item->parent_id])}}" {{$item->parent_id==$game_type?'selected':''}}>{{$item->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $("#game_type").change(function(){
                                        window.location.href = $( "select#game_type" ).val();
                                    });
                                </script>
                            </div>
                            <div class="text-center" style="color: #eb5d68;font-size: 16px;    margin: -8px auto 12px auto;    font-weight: 600;">Số {{isset($result->gametype->image)?$result->gametype->image:'vật phẩm'}} hiện có: {{ str_replace(',','.',number_format($result->number_item)) }} </div>
                            <form class="form-horizontal form-withdraw" method="POST">
                                {{csrf_field()}}

                                @php
                                    $service = null;
                                    $params = null;
                                    $server_id = null;
                                    $server_data = null;
                                    if (isset($result->service)){
                                        $service = $result->service;

                                        if (isset($service->params)){
                                            $params = $service->params;
                                            $server_data=\App\Library\HelpersDecode::DecodeJson('server_data',$params);
                                            $server_id = \App\Library\HelpersDecode::DecodeJson('server_id',$params);
                                        }

                                    }

                                @endphp

                                @if(isset($service))
                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                                    @if(isset($server_data) && isset($server_id) && count($server_data) && count($server_id))
                                        @if($service->idkey != 'roblox_buyserver')
                                            <div class="form-group row">
                                                <label class="col-md-3 control-label">
                                                    Chọn máy chủ:
                                                </label>
                                                <div class="col-md-6">
                                                    <div class="input-group" style="width: 100%">
                                                        <select name="server" class="server-filter form-control t14" style="">
                                                            @for($i = 0; $i < count($server_data); $i++)
                                                                @if((strpos($server_data[$i], '[DELETE]') === false))
                                                                    <option value="{{$server_id[$i]}}">{{$server_data[$i]}}</option>
                                                                @endif
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                        @endif
                                    @endif
                                @endif

                                <div class="form-group row">
                                    <label class="col-md-3 control-label">
                                        Gói muốn rút:
                                    </label>
                                    <div class="col-md-6">
                                        <div class="input-group" style="width: 100%">
                                            <select name="package" id="package" class="form-control">
                                                @if($result->package)
                                                    @foreach($result->package as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                @if(isset($result->gametype->idkey))
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">
                                            {{isset($result->gametype->idkey)?$result->gametype->idkey:'ID trong game:'}}
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group" style="width: 100%">
                                                <input name="idgame" type="text" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                @endif
                                @if(isset($result->gametype->position))
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">
                                            {{isset($result->gametype->position)?$result->gametype->position:'Số điện thoại ( nếu có ):'}}
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group" style="width: 100%">
                                                <input name="phone" type="text" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                @endif
                                <div class="form-group row " style="margin: 20px 0">
                                    <div class="col-md-6" style="    margin-left: 25%;">
                                        <button id="btn-confirm" class="btn btn-primary c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">Thực hiện</button>
                                        <script>
                                            $(".form-withdraw").submit(function(){
                                                $("#btn-confirm").prop( "disabled", true);
                                            });
                                        </script>
                                    </div>
                                </div>
                            </form>

                            <div class="" style="margin: 35px 0px;border: 1px solid #cccccc;padding: 15px">
                                {!!isset($result->gametype->description)?$result->gametype->description:''!!}
                            </div>

                            <table id="charge_recent" class="table table-striped table-custom-res">
                                <thead>
                                    <tr>
                                        <th>Thời gian</th>
                                        <th>ID</th>
                                        <th>Số vật phẩm rút</th>
                                        <th>Ghi chú</th>
                                        <th>Thông báo</th>
                                        <th>Trạng thái</th>
                                        <!-- <th>Thao tác</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($paginatedItems)
                                        @if(isset($result->withdraw_history->data) && count($result->withdraw_history->data))

                                            @foreach($result->withdraw_history->data as $item)
                                                <tr>
                                                    <td>{{date('d/m/Y H:i:s', strtotime($item->created_at))}}</td>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->price}}</td>
                                                    <td>{{$item->description}}</td>
                                                    <td>
                                                        @if ($item->content != "")
                                                            <button type="submit" data-msg="{{$item->content}}" class="btn btn-xs c-btn-square m-b-10 btn-success proccess_toggle" rel="{{$item->id}}" >Tiến độ</button>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if($item->payment_type == 13 || $item->payment_type == 12 || $item->payment_type == 11 || $item->payment_type == 14)
                                                            @if ($item->status == 0)
                                                                <a class="btn btn-sm c-btn-square m-b-10 btn-danger">Giao dịch thất bại</a>
                                                            @elseif($item->status == 1 )
                                                                <a class="btn btn-sm c-btn-square m-b-10 btn-warning">Chờ xử lý</a>
                                                            @elseif($item->status == 2 )
                                                                <a class="btn btn-sm c-btn-square m-b-10 btn-warning">Chờ xử lý</a>
                                                            @elseif($item->status == 6 )
                                                                <a class="btn btn-sm c-btn-square m-b-10 btn-warning">Chờ xử lý</a>
                                                            @elseif($item->status == 4 )
                                                                <a class="btn btn-sm c-btn-square m-b-10 btn-success">Hoàn thành</a>
                                                            @endif
                                                        @else
                                                            @if ($item->status == 0)
                                                                <a class="btn btn-sm c-btn-square m-b-10 btn-warning">{{config('constants.withdraw_status.0')}}</a>
                                                            @elseif($item->status == 1 )
                                                                <a class="btn btn-sm c-btn-square m-b-10 btn-success">{{config('constants.withdraw_status.1')}}</a>
                                                            @elseif($item->status == 2 )
                                                                <a class="btn btn-sm c-btn-square m-b-10 btn-danger">{{config('constants.withdraw_status.2')}}</a>
                                                            @elseif($item->status == 3 )
                                                                <a class="btn btn-sm c-btn-square m-b-10 btn-danger">{{config('constants.withdraw_status.3')}}</a>
                                                            @endif
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6">Hiện tại chưa phát sinh giao dịch</td>
                                            </tr>

                                        @endif
                                    @else
                                        <tr>
                                            <td colspan="6">Hiện tại chưa phát sinh giao dịch</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                {{ $paginatedItems!=null?$paginatedItems->links():'' }}
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div><!-- /.container -->
    </section>

<div class="modal fade" id="proccessModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Tiến độ</h4>
            </div>
            <div class="modal-body" style="font-family: helvetica, arial, sans-serif;color: #32c5d2;font-weight: bold;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">

        $("body").delegate(".proccess_toggle","click",function(){
            if($(this).attr('data-msg')!=''){
                $("#proccessModal .modal-body").html($(this).attr('data-msg'));
            }else{
                $("#proccessModal .modal-body").html('Chưa có thông báo tiến độ!');
            }
            $('#proccessModal').modal('show');
        })
        // $.ajax({
        //     url: '/withdrawitemajax-{{$game_type}}',
        //     datatype:'json',
        //     data:{
        //         _token: $('meta[name="csrf-token"]').attr('content')
        //     },
        //     type: 'post',
        //     success: function (data) {
        //         $('.account_sidebar_content').html(data.msg);
        //     }
        // })
</script>
@endsection
