@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <section>
        <div class="container">

            <div class="row user-manager">
                @include('frontend.widget.__menu_profile')

                <div class="col-12 col-md-8 col-lg-9 site-form " style="min-height: 212.568px;background: #ffffff;border-radius: 8px">
                    <div class="account_sidebar_content" style="padding: 16px 8px">
                        @if(isset($data->itemconfig_ref->params))
                        <div class="c-layout-sidebar-content ">
                            <!-- BEGIN: PAGE CONTENT -->
                            <!-- BEGIN: CONTENT/SHOPS/SHOP-ORDER-HISTORY-2 -->
                            <div class="account_sidebar_content_title">
                                <p>Chi tiết yêu cầu #{{$data->id}} @if(isset($data->tranid)) - Mã giao dịch SMS: #{{$data->tranid}} @endif </p>
                                <div class="account_sidebar_content_line"></div>
                            </div>

                            @php
                                $input_auto = \App\Library\HelpersDecode::DecodeJson('input_auto', $data->itemconfig_ref->params);
                            @endphp

                            <div class="account_content_transaction_history">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if($data->status==1)
                                            @if($input_auto==1 && ($data->itemconfig_ref->idkey!='' || $data->itemconfig_ref->idkey!=null ))
                                            @else
                                                @if($data->gate_id == 1)

                                                @else
                                                    <div class="btnDestroy__data">
                                                        <button class="btn btn-danger" type="button" id="btnDestroy" data-id="7630" title="">Hủy bỏ yêu cầu</button>
                                                    </div>
                                                @endif
                                            @endif
                                                <script>
                                                    $(document).on('click', '#btnDestroy',function(event){
                                                        $('#destroyModal').modal('show');
                                                    })
                                                </script>
                                                <div class="modal fade" id="destroyModal">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" action="https://frontend.dev.tichhop.pro/dich-vu-da-mua-7630/destroy" accept-charset="UTF-8" class="m-form destroyForm"><input name="_token" type="hidden" value="mXWkGqxgoRV3z7iAG5N7BnuVR0ih8IaDY2UcyyLc">
                                                                <div class="modal-header" style="padding-left: 16px;padding-right: 16px">
                                                                    <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;text-align: center">Chỉnh sửa thông tin</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="error__deleteserrvice" style="width: 100%;text-align: center;margin-bottom: 0">

                                                                </div>
                                                                <div class="modal-body" style="padding-right: 16px;padding-left: 16px">

                                                                    <span class="mb-15 control-label bb" style="font-size: 14px;color: black;padding-bottom: 8px;">Lỗi thuộc về:</span>
                                                                    <div class="mb-15" style="margin-top: 8px">
                                                                        <select required="" class="form-control" name="mistake_by"><option value="" selected="selected">-- Không chọn --</option><option value="1">Khách</option><option value="0">QTV</option><option value="2">Game</option></select>
                                                                    </div>
                                                                    <span class="mb-15 control-label bb">Nội dung:</span>
                                                                    <textarea style="min-height:100px;" type="text" class="form-control" name="note" placeholder="Nội dung ít nhất 10 ký tự"></textarea>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" style="background: rgb(238, 70, 35);border: 2px solid rgb(238, 70, 35);color: #ffffff">Xác nhận</button>
                                                                    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                        @endif



                                    </div>
                                </div>
                            </div>

                            <div class="padding-left" style="font-family: Roboto, sans-serif;">
                                <div class="cand-details" id="about" style="float: left;width: 100%">
                                    <h2>Tên dịch vụ</h2>
                                    <p><a class="thea_dichvu" href="/dich-vu/{{(isset($data->itemconfig_ref->slug)?$data->itemconfig_ref->slug:"Lỗi")}}">{{$data->itemconfig_ref->title}}</a></p>

                                    <h2>Công việc</h2>
                                    <div class="edu-history-sec" id="education">
                                        @if(!empty($data->workname) && count($data->workname)>0)
                                            @foreach( $data->workname as $index=> $aWorkName)
                                                <div class="edu-history">
                                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                    <div class="edu-hisinfo">
                                                        <h3>{{$aWorkName->title}}</h3>
                                                        <i>{{ str_replace(',','.',number_format($aWorkName->unit_price)) }} VNĐ</i>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                    <h2>Thông tin đính kèm</h2>
                                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                                        <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                                            <thead class="m-datatable__head">
                                            <tr class="m-datatable__row">
                                                <th style="width:50px;" class="m-datatable__cell">
                                                    #
                                                </th>
                                                <th class="m-datatable__cell">
                                                    Tên thông tin
                                                </th>
                                                <th style="width:150px;" class="m-datatable__cell">
                                                    Nội dung
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="m-datatable__body">
                                            @php
                                                $send_name=\App\Library\HelpersDecode::DecodeJson('send_name',$data->itemconfig_ref->params);
                                                $send_type=\App\Library\HelpersDecode::DecodeJson('send_type',$data->itemconfig_ref->params);
                                                $server_data=\App\Library\HelpersDecode::DecodeJson('server_data',$data->itemconfig_ref->params);
                                            @endphp

                                            @if(\App\Library\HelpersDecode::DecodeJson('server_mode',$data->itemconfig_ref->params)==1)
                                                <tr>
                                                    <td>1</td>
                                                    <td> Server</td>
                                                    <td>
                                                        {{isset($server_data[$data->position])?$server_data[$data->position]:""}}
                                                    </td>
                                                </tr>
                                            @endif

                                            @if(!empty($send_name)&& count($send_name)>0)


                                                @foreach( $send_name as $index=> $aSendName)

                                                    <tr>
                                                        @if(\App\Library\HelpersDecode::DecodeJson('server_mode',$data->itemconfig_ref->params)==1)
                                                            <td> {{$index+1+1}} </td>
                                                        @else
                                                            <td> {{$index+1}} </td>
                                                        @endif

                                                        <td> {{$aSendName}} </td>
                                                        <td>

                                                            @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,json_encode($data->params)))

                                                                @if($send_type[$index]==4)
                                                                    <a href="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,json_encode($data->params))}}" target="_blank">
                                                                        {{--                                                                <img src="{{\App\Library\Files::media(\App\Library\Helpers::DecodeJson('customer_data'.$index,$data->params))}}" alt="" style="max-width: 100px;max-height: 100px;">--}}
                                                                    </a>
                                                                @elseif($send_type[$index]==5)
                                                                    ******
                                                                @else
                                                                    {{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,json_encode($data->params))}}
                                                                @endif
                                                            @else

                                                                @if($send_type[$index]==4)

                                                                    <a href="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,$data->params)}}" target="_blank">
                                                                        {{--                                                                <img src="{{\App\Library\Files::media(\App\Library\Helpers::DecodeJson('customer_data'.$index,$data->params))}}" alt="" style="max-width: 100px;max-height: 100px;">--}}
                                                                    </a>
                                                                @elseif($send_type[$index]==5)
                                                                    ******
                                                                @else
                                                                    {{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,$data->params)?? null}}

                                                                @endif
                                                            @endif
                                                        </td>


                                                    </tr>

                                                @endforeach
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="m-separator m-separator--dashed"></div>

                                    <div style="text-align: right">
                                        @if($data->status==1)

                                            @if($input_auto==1 && ($data->itemconfig_ref->idkey!='' ||$data->itemconfig_ref->idkey!=null ))
                                            @else

                                                @if($data->itemconfig_ref->idkey =='nrogem')
                                                @else
                                                    <button class="btn btn-brand btn-edit" id="btn-edit" data-id="7630">Chỉnh sửa thông tin</button>
                                                @endif
                                            @endif
                                                <script>
                                                    $(document).on('click', '#btn-edit',function(event){
                                                        $('#edit_info').modal('show');
                                                    })
                                                </script>
                                                <div class="modal fade" id="edit_info">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form method="POST" action="https://frontend.dev.tichhop.pro/dich-vu-da-mua-7630/edit" accept-charset="UTF-8" class="m-form editForm"><input name="_token" type="hidden" value="mXWkGqxgoRV3z7iAG5N7BnuVR0ih8IaDY2UcyyLc">
                                                                <div class="modal-header" style="padding-left: 16px;padding-right: 16px">
                                                                    <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;text-align: center">Chỉnh sửa thông tin</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="error__editerrvice" style="width: 100%;text-align: center;margin-bottom: 0">

                                                                </div>
                                                                <div class="modal-body text-left" style="padding-right: 16px;padding-left: 16px">

                                                                    <span class="mb-15 control-label bb fw-500" style="color: black;font-weight: bold">Tài Khoản đăng nhập game:</span>


                                                                    <div class="mb-15 pt-3 pb-2">
                                                                        <input type="text" required name="customer_data0" value="namdh@hqplay.vn" class="form-control t14 " placeholder="Tài Khoản đăng nhập game" value="">
                                                                    </div>


                                                                    <span class="mb-15 control-label bb fw-500" style="color: black;font-weight: bold">Mật khẩu game:</span>


                                                                    <div class="mb-15 pt-3 pb-2">
                                                                        <input type="password" required class="form-control" name="customer_data1" value="123@@123" placeholder="Mật khẩu game">
                                                                    </div>

                                                                    <span class="mb-15 control-label bb">Bạn Đã Đọc Kĩ Quy Định Và Chuẩn Bị Đầy Đủ Vật Phẩm, Phụ Kiện Theo Yêu Cầu Của Shop Chưa?:</span>


                                                                    <div class="mb-15 pt-3 pb-2">
                                                                        <input type="text" required name="customer_data2" value="321312" class="form-control t14 " placeholder="Bạn Đã Đọc Kĩ Quy Định Và Chuẩn Bị Đầy Đủ Vật Phẩm, Phụ Kiện Theo Yêu Cầu Của Shop Chưa?" value="">
                                                                    </div>


                                                                    <input type="hidden" name="index" class="index" value="3">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" id="d3" style="background: rgb(238, 70, 35);border: 2px solid rgb(238, 70, 35);color: #ffffff">Cập nhật</button>
                                                                    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                        @endif



                                    </div>

                                    <h2>Tiến độ</h2>

                                    @if(!empty($data->workflow) && count($data->workflow)>0)
                                        @foreach( $data->workflow as $index=> $aWorkFlow)

                                            <div class="edu-history style2">
                                                <i></i>
                                                <div class="edu-hisinfo">
                                                    <h3>
                                                        @if($aWorkFlow->status==0)
                                                            {{config('module.service.purchase_status.0')}}
                                                        @elseif($aWorkFlow->status==1)
                                                            {{config('module.service.purchase_status.1')}}
                                                        @elseif($aWorkFlow->status==2)
                                                            {{config('module.service.purchase_status.2')}}
                                                        @elseif($aWorkFlow->status==3)
                                                            {{config('module.service.purchase_status.3')}}
                                                        @elseif($aWorkFlow->status==4)
                                                            {{config('module.service.purchase_status.4')}}
                                                        @elseif($aWorkFlow->status==5)
                                                            {{config('module.service.purchase_status.5')}}
                                                        @endif
                                                        @if($aWorkFlow->content!="")
                                                            -:- {{$aWorkFlow->content}}
                                                        @endif
                                                    </h3>
                                                    <i>{{ formatDateTime($aWorkFlow->created_at) }}</i>
                                                </div>
                                            </div>

                                        @endforeach
                                    @endif

                                    <div style="text-align: right">
                                    </div>
                                    <h2>Trao đổi  <a href="/inbox/send/{{$data->id}}" class="btn btn-brand btn-edit" >Nhắn tin</a></h2>
                                    <div class="edu-history-sec" id="awards">
                                        <span>Chưa có nội dung</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @else
                            <span style="color: red;font-size: 16px">Không có dữ liệu</span>
                        @endif
                    </div>
                </div>

            </div>

        </div><!-- /.container -->
    </section>
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/historydetail.css">
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/service/service-history-detail.js"></script>
@endsection

