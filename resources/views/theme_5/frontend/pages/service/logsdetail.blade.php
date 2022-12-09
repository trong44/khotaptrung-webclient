@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <div class="background-history">
        <div class="container c-container-side">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/dich-vu-da-mua" class="breadcrumb-link">Dịch vụ đã mua</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/dich-vu-da-mua" class="link-back"></a>

                <h1 class="head-title text-title">Dịch vụ đã mua</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>
                @if(isset($data->itemconfig_ref->params))
                @php
                    $input_auto = \App\Library\HelpersDecode::DecodeJson('input_auto', $data->itemconfig_ref->params);
                @endphp
                <div class="c-ml-16 c-ml-lg-0 c-history-right">
                    <div
                        class="history-detail-title c-p-16 c-mb-16 brs-12 d-none d-sm-flex justify-content-between align-items-center">
                        <h1 class="fw-700 fz-20 lh-28 c-my-0">Chi tiết dịch vụ đã mua</h1>
                        <div class="d-none d-sm-block">
                            @if($data->status==1)
                                @if($input_auto==1 && ($data->itemconfig_ref->idkey!='' || $data->itemconfig_ref->idkey!=null ))
                                @else
                                    @if($data->gate_id == 1)

                                    @else
                                        <button class="btn ghost c-mr-10" id="btnDestroy" data-id="{{ $data->id }}">Hủy
                                            dịch vụ
                                        </button>
                                    @endif
                                @endif

                                <!-- modal cancel -->
                                    <div class="modal fade" id="destroyModal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content c-p-24">
                                                {{Form::open(array('url'=>'/dich-vu-da-mua-'.$data->id.'/destroy/','class'=>'m-form destroyForm','method'=>'post'))}}

                                                <div class="modal-header">
                                                    <h2 class="modal-title center">Hủy bỏ yêu cầu dịch vụ</h2>
                                                    <button type="button" class="close" data-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body pl-0 pr-0 c-pt-40 c-pb-40">
                                                    <div class="c-mt-8">
                                                        <label class="c-mb-4 fw-500 fz-13 lh-20">Lỗi thuộc về</label>
                                                        <div class="col-md-12 p-0">
                                                            <select name="mistake_by" class="mistake_by" id="">
                                                                <option value="" selected disabled>-- Không chọn --</option>
                                                                <option value="1">Khách</option>
                                                                <option value="0">QTV</option>
                                                                <option value="2">Game</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="c-mt-8">
                                                        <label class="c-mb-4 fw-500 fz-13 lh-20">Nội dung</label>
                                                        <div class="col-md-12 p-0">
                                                            <textarea name="note" id="" cols="9" rows="3"
                                                              placeholder="Nội dung hủy bỏ phải có ít nhất 10 ký tự"
                                                              style="height: 84px;">
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit"  class="btn primary">Xác nhận</button>
                                                </div>
                                                {{Form::close()}}
                                            </div>
                                        </div>
                                    </div>

                            @endif

                            @if($data->status==1)

                                @if($input_auto == 1 && ($data->itemconfig_ref->idkey!='' || $data->itemconfig_ref->idkey!=null ))

                                @else
                                    @if($data->gate_id == 1)

                                    @else
                                        <button class="btn primary btn-edit" id="btn-edit" data-id="{{ $data->id }}">Chỉnh sửa thông tin</button>
                                    @endif

{{--                                    @if($data->itemconfig_ref->idkey =='nrogem')--}}
{{--                                        --}}
{{--                                    @else--}}
{{--                                        --}}
{{--                                    @endif--}}
                                @endif

                                <!-- modal update info -->
                                    <div class="modal fade " id="edit_info" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-custom">
                                            <div class="modal-content c-p-24">
                                                {{Form::open(array('url'=>'/dich-vu-da-mua-'.$data->id.'/edit/','class'=>'m-form editForm','method'=>'post'))}}
                                                <div class="modal-header">
                                                    <h2 class="modal-title center">Chỉnh sửa thông tin</h2>
                                                    <button type="button" class="close" data-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body pl-0 pr-0 c-pt-12 c-pb-40">
                                                    @php
                                                        $send_name=\App\Library\HelpersDecode::DecodeJson('send_name',$data->itemconfig_ref->params);
                                                        $send_type=\App\Library\HelpersDecode::DecodeJson('send_type',$data->itemconfig_ref->params);
                                                        $index = 0;
                                                    @endphp
                                                    @if(!empty($send_name)&& count($send_name)>0)
                                                        @for ($i = 0; $i < count($send_name); $i++)
                                                            @if($send_name[$i]!=null)
                                                                @php
                                                                    $index = $index + 1;
                                                                @endphp
                                                                <div class="c-mt-12">
                                                                    <label class="c-mb-4 fw-500 fz-13 lh-20">{{$send_name[$i]}}</label>
                                                                    <div class="col-md-12 p-0">

                                                                        @if($send_type[$i]==1 || $send_type[$i]==2||$send_type[$i]==3)
                                                                            @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)))
                                                                                <input required type="text" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))}}" name="customer_data{{$i}}" placeholder="{{$send_name[$i]}}">
                                                                            @else
                                                                                <input required type="text" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)}}" name="customer_data{{$i}}" placeholder="{{$send_name[$i]}}">
                                                                            @endif
                                                                        @elseif($send_type[$i]==4)
                                                                            @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)))
                                                                                <input type="file" required accept="image/*" class="form-control" name="customer_data{{$i}}" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))}}" placeholder="{{$send_name[$i]}}">
                                                                            @else
                                                                                <input type="file" required accept="image/*" class="form-control" name="customer_data{{$i}}" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)}}" placeholder="{{$send_name[$i]}}">
                                                                            @endif
                                                                        @elseif($send_type[$i]==5)
                                                                            @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)))
                                                                                <input class="input-primary" type="password" name="customer_data{{$i}}" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))}}" placeholder="{{$send_name[$i]}}">
                                                                            @else
                                                                                <input class="input-primary" type="password" name="customer_data{{$i}}" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)}}" placeholder="{{$send_name[$i]}}">
                                                                            @endif
                                                                        @elseif($send_type[$i]==6)
                                                                            @php
                                                                                if (\App\Library\HelpersDecode::DecodeJson('send_data'.$i,json_encode($data->params))){
                                                                                    $send_data=\App\Library\HelpersDecode::DecodeJson('send_data'.$i,json_encode($data->params));
                                                                                }else{
                                                                                    $send_data=\App\Library\HelpersDecode::DecodeJson('send_data'.$i,$data->params);
                                                                                }
                                                                            @endphp
                                                                            <select name="customer_data{{$i}}" id="">
                                                                                @if(!empty($send_data))
                                                                                    @for ($sn = 0; $sn < count($send_data); $sn++)
                                                                                        @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)))
                                                                                            <option value="{{$sn}}" {{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))==$sn?"selected":""}}>{{$send_data[$sn]}}</option>
                                                                                        @else
                                                                                            <option value="{{$sn}}" {{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)==$sn?"selected":""}}>{{$send_data[$sn]}}</option>
                                                                                        @endif
                                                                                    @endfor
                                                                                @endif
                                                                            </select>
                                                                        @endif

                                                                    </div>
                                                                </div>

                                                            @endif
                                                        @endfor
                                                    @endif

                                                    <input type="hidden" name="index" class="index" value="{{ $index }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn primary">Xem kết quả</button>
                                                </div>
                                                {{Form::close()}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->

                            @endif


                        </div>
                    </div>
                    <div class="history-detail-content brs-12">
                        <div class="history-detail-subtitle lh-24 c-pt-16 c-pb-12 c-px-16 fw-500 fz-15 d-none d-sm-block">
                            {{$data->itemconfig_ref->title}}
                        </div>
                        <div class="c-px-16 c-pb-24">
                            <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                                Thông tin giao dịch
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Mã ID</p>
                                    <div class="fw-500 fz-13">#{{$data->id}}</div>
                                </div>
                                @if(isset($data->tranid))
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Mã giao dịch SMS</p>
                                    <div class="fw-500 fz-13">{{$data->tranid??''}}</div>
                                </div>
                                @endif
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Tên dịch vụ</p>
                                    <div class="fw-500 fz-13">{{$data->itemconfig_ref->title}}</div>
                                </div>
                            </div>
                            @php
                                $send_name=\App\Library\HelpersDecode::DecodeJson('send_name',$data->itemconfig_ref->params);
                                $send_type=\App\Library\HelpersDecode::DecodeJson('send_type',$data->itemconfig_ref->params);
                                $server_data=\App\Library\HelpersDecode::DecodeJson('server_data',$data->itemconfig_ref->params);
                            @endphp
                            <div class="history-detail-info-block brs-12 c-p-16">
                                @if(\App\Library\HelpersDecode::DecodeJson('server_mode',$data->itemconfig_ref->params)==1)
                                    <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                        <p class="fz-13 fw-400 mb-0">Server</p>
                                        <div class="fw-500 fz-13">{{isset($server_data[$data->position])?$server_data[$data->position]:""}}</div>
                                    </div>
                                @endif
                                @if(!empty($send_name)&& count($send_name)>0)
                                    @foreach( $send_name as $index=> $aSendName)
                                            <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                                <p class="fz-13 fw-400 mb-0">{{$aSendName}}</p>
                                                @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,json_encode($data->params)))
                                                    @if($send_type[$index]==4)
                                                        <div class="fw-500 fz-13">
                                                            <a href="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,json_encode($data->params))}}" target="_blank"></a>
                                                        </div>
                                                    @elseif($send_type[$index]==5)
                                                        ******
                                                    @else
                                                        {{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,json_encode($data->params))}}
                                                    @endif
                                                @else
                                                    @if($send_type[$index]==4)
                                                        <div class="fw-500 fz-13">
                                                            <a href="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,$data->params)}}" target="_blank"></a>
                                                        </div>
                                                    @elseif($send_type[$index]==5)
                                                        ******
                                                    @else
                                                        {{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,$data->params)}}
                                                    @endif
                                                @endif
                                            </div>
                                    @endforeach
                                @endif

                            </div>
                            <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                                Công việc
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16">
                                <ul class="order--timelines m-0 c-pl-22">
                                    @if(!empty($data->workname) && count($data->workname)>0)
                                        @foreach( $data->workname as $index=> $aWorkName)
                                            <li class="order--timeline">
                                                <div class="order--status fz-13 fw-500">
                                                    {{$aWorkName->title}}
                                                </div>
                                                <div class="order--date fz-13 fw-400">
                                                    {{ str_replace(',','.',number_format($aWorkName->unit_price)) }} đ
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                                Tiến độ
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16">
                                <ul class="order--timelines m-0 c-pl-22">
                                    @if(!empty($data->workflow) && count($data->workflow)>0)
                                        @foreach( $data->workflow as $index=> $aWorkFlow)
                                            @if($aWorkFlow->status==0)
                                                <li class="order--timeline">
                                                    <div class="order--status fz-13 fw-500">
                                                        Đã hủy -:- {{$aWorkFlow->content}}
                                                    </div>
                                                    <div class="order--date fz-13 fw-400">
                                                        {{ formatDateTime($aWorkFlow->created_at) }}
                                                    </div>
                                                </li>
                                            @elseif($aWorkFlow->status==1)
                                                <li class="order--timeline">
                                                    <div class="order--status fz-13 fw-500">
                                                        Đang chờ
                                                    </div>
                                                    <div class="order--date fz-13 fw-400">
                                                        {{ formatDateTime($aWorkFlow->created_at) }}
                                                    </div>
                                                </li>
                                            @elseif($aWorkFlow->status==2)
                                                <li class="order--timeline">
                                                    <div class="order--status fz-13 fw-500">
                                                        Đang thực hiện -:- {{$aWorkFlow->content}}
                                                    </div>
                                                    <div class="order--date fz-13 fw-400">
                                                        {{ formatDateTime($aWorkFlow->created_at) }}
                                                    </div>
                                                </li>
                                            @elseif($aWorkFlow->status==3)
                                                <li class="order--timeline">
                                                    <div class="order--status fz-13 fw-500">
                                                        Từ chối -:- {{$aWorkFlow->content}}
                                                    </div>
                                                    <div class="order--date fz-13 fw-400">
                                                        {{ formatDateTime($aWorkFlow->created_at) }}
                                                    </div>
                                                </li>
                                            @elseif($aWorkFlow->status==4)
                                                <li class="order--timeline">
                                                    <div class="order--status fz-13 fw-500">
                                                        Hoàn thành -:- {{$aWorkFlow->content}}
                                                    </div>
                                                    <div class="order--date fz-13 fw-400">
                                                        {{ formatDateTime($aWorkFlow->created_at) }}
                                                    </div>
                                                </li>
                                            @elseif($aWorkFlow->status==5)
                                                <li class="order--timeline">
                                                    <div class="order--status fz-13 fw-500">
                                                        Thất bại -:- {{$aWorkFlow->content}}
                                                    </div>
                                                    <div class="order--date fz-13 fw-400">
                                                        {{ formatDateTime($aWorkFlow->created_at) }}
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif


                                </ul>
                            </div>
                            <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                                Trao đổi dịch vụ<span class="d-none d-sm-inline-block">: Dịch vụ số #{{$data->id}}</span>
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                                <div class="service-change-title c-px-16 c-py-8 fw-500 fz-15 lh-24">
                                    Dịch vụ <span>#{{$data->id}}</span>
                                </div>
                                <div class="service-change-detail scrollbar">
                                    @forelse($inbox  ?: [] as $aInbox)

                                        <div id="msg{{$aInbox->id}}" class="service-change-detail-item c-py-8 c-px-16">
                                            @if($conversation->type==1)
                                                @if($aInbox->user->id == $conversation->author_id)
                                                    <div class="fw-500 fz-13">Người yêu cầu order</div>
                                                @elseif($aInbox->user->id == $conversation->buyer_id)
                                                    <div class="fw-500 fz-13">Người thực hiện</div>
                                                @else
                                                    <div class="fw-500 fz-13">Người hỗ trợ</div>
                                                @endif
                                            @else
                                                @if($aInbox->user->user_id==$conversation->author_id)
                                                    <div class="fw-500 fz-13">Người bán</div>
                                                @elseif($aInbox->user->user_id==$conversation->buyer_id)
                                                    <div class="fw-500 fz-13">Người mua</div>
                                                @else
                                                    <div class="fw-500 fz-13">Người hỗ trợ</div>
                                                @endif
                                            @endif

                                            <p class="fw-400 fz-13 c-mb-0"><span
                                                    class="service-change-time c-mr-12">{{\App\Library\Helpers::ConvertToAgoTime($aInbox->created_at)}}</span>{{$aInbox->message}}
                                                bạn ơi</p>

                                        </div>
                                        @if(isset($aInbox) && $aInbox->image != "")
                                            <div class="mess-gallery m-t-20">
                                                @foreach(explode('|', $aInbox->image) as $img)
                                                    <a href="{{$img}}" target="_blank"><img src="{{\App\Library\Files::media($img)}}" style="max-height: 200px; max-width: 100%;">
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    @empty
                                        <div class="service-change-detail-item c-py-8 c-px-16">
                                            <div class="fw-500 fz-13">Chưa có nội dung trao đổi</div>
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <button class="service-change-message-btn btn secondary c-px-50 open-sheet" data-toggle="modal" data-target="#modal-send-message" data-target_2="#sheet-send-message">Nhắn tin</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <!-- Modal -->

            <!-- modal send message -->
            <div class="modal fade" id="modal-send-message" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-custom">
                    <form method="POST" id="chatFrom" enctype="multipart/form-data" action="/inbox/send/{{$data->id}}" accept-charset="UTF-8" class="form-horizontal form-charge">
                        {{csrf_field()}}
                    <div class="modal-content c-p-24">
                        <div class="modal-header">
                            <h2 class="modal-title center">Gửi tin nhắn</h2>
                            <button type="button" class="close" data-dismiss="modal"></button>
                        </div>
                        <div class="modal-body pl-0 pr-0 c-pt-12 c-pb-24">
                            <div class="c-mt-12">
                                <label class="c-mb-4 fw-500 fz-13 lh-20">Nội dung</label>
                                <div class="col-md-12 p-0">
                                <textarea name="message" type="email" id="" cols="9" rows="3" placeholder="placeholder"
                                          style="height: 93px;"></textarea>
                                </div>
                            </div>
                            <div class="c-mt-12">
                                <label class="c-mb-4 fw-500 fz-13 lh-20">Hình ảnh</label>
                                <div class="col-md-12 p-0 position-relative">
                                    <input type="file" name="image" accept="image/*" multiple="">
{{--                                    <input type="text" name="" id="" placeholder="Nội dung hủy bỏ phải có ít nhất 10 ký tự">--}}
{{--                                    <img class="img-error-service" src="/assets/frontend/{{theme('')->theme_key}}/image/son/mocicon.svg"--}}
{{--                                         alt="">--}}
                                </div>
                            </div>
                            <div class="c-mt-8">
                                <div class="col-md-12 p-0 position-relative">
                                    <label class="input-checkbox">
                                        <input id="complain" type="checkbox" name="complain">
                                        <span class="checkmark"></span>
                                        <span class="text-label c-cursor w-100">Khiếu nại</span>
                                    </label>
                                </div>
                            </div>
                            <div class="c-mt-12">
                                <label class="c-mb-4 fw-500 fz-13 lh-20">Mã bảo vệ</label>
                                <div class="col-md-12 p-0 d-flex">
                                    <input class="input-form w-100" type="text" placeholder="Nhập mã bảo vệ">
                                    <div class="c-ml-8 c-mr-8">
                                        <div class="brs-8 overflow-hidden">
                                <span class="brs-8">
                                    <img src="{{captcha_src('flat')}}" id="imgcaptcha" onclick="document.getElementById('imgcaptcha').src ='{{captcha_src('flat')}}'+Math.random();document.getElementById('captcha').focus();">
                                </span>
                                        </div>
                                    </div>
                                    <button class="refresh-captcha brs-8" id="reload">
                                        <img  src="/assets/frontend/{{theme('')->theme_key}}/image/nam/refresh_captcha.svg" alt="">
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn primary">Gửi tin nhắn</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>


            <div class="footer-mobile group-btn c-px-16 d-flex d-lg-none" style="--data-between: 12px">
                @if($data->status==1)
                    @if($input_auto==1 && ($data->itemconfig_ref->idkey!='' || $data->itemconfig_ref->idkey!=null ))
                    @else
                        @if($data->gate_id == 1)

                        @else
                            <button class="btn ghost open-sheet" data-target="#sheet-cancel-service">Huỷ dịch vụ</button>
                        @endif
                    @endif
                @endif
                @if($data->status==1)

                    @if($input_auto==1 && ($data->itemconfig_ref->idkey!='' ||$data->itemconfig_ref->idkey!=null ))
                    @else

                        @if($data->itemconfig_ref->idkey =='nrogem')
                        @else
                            <button class="btn primary open-sheet" data-target="#sheet-update-info">Chỉnh sửa thông tin</button>
                        @endif
                    @endif
                @endif
            </div>

            <!-- Sheet -->

            @if(isset($data->itemconfig_ref->params))
            <!-- sheet cancel -->
            <div class="bottom-sheet" id="sheet-cancel-service" aria-hidden="true" data-height="50">
                <div class="layer"></div>
                <div class="content-bottom-sheet bar-slide">
                    {{Form::open(array('url'=>'/dich-vu-da-mua-'.$data->id.'/destroy/','class'=>'m-form destroyForm','method'=>'post'))}}
                    <div class="sheet-header">
                        <h2 class="text-title center">
                            Huỷ bỏ yêu cầu dịch vụ
                        </h2>
                        <label for="check-bottom-sheet" class="close"></label>
                    </div>
                    <div class="sheet-body" style="bottom: 100px;">
                        <!-- body -->
                        <div class="input-group">
                                                    <span class="form-label">
                                                        Lỗi thuộc về
                                                    </span>
                            <select name="mistake_by" class="mistake_by" id="">
                                <option value="" selected disabled>-- Không chọn --</option>
                                <option value="1">Khách</option>
                                <option value="0">QTV</option>
                                <option value="2">Game</option>
                            </select>
                        </div>

                        <div class="input-group">
                                                    <span class="form-label">
                                                        Nội dung
                                                    </span>
                            <textarea name="note" id="" cols="30" rows="10" style="height: 84px" placeholder="Nội dung hủy bỏ phải có ít nhất 10 ký tự"></textarea>
                        </div>
                    </div>
                    <div class="sheet-footer">
                        <button type="submit" class="btn primary">Xác nhận</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>

            <!-- sheet update info -->
            <div class="bottom-sheet" id="sheet-update-info" aria-hidden="true" data-height="55">
                <div class="layer"></div>
                <div class="content-bottom-sheet bar-slide">
                    {{Form::open(array('url'=>'/dich-vu-da-mua-'.$data->id.'/edit/','class'=>'m-form editForm','method'=>'post'))}}
                    <div class="sheet-header">
                        <h2 class="text-title center">
                            Chỉnh sửa thông tin
                        </h2>
                        <label class="close"></label>
                    </div>
                    <div class="sheet-body">
                        <!-- body -->
                        @php
                            $send_name=\App\Library\HelpersDecode::DecodeJson('send_name',$data->itemconfig_ref->params);
                            $send_type=\App\Library\HelpersDecode::DecodeJson('send_type',$data->itemconfig_ref->params);
                            $index = 0;
                        @endphp
                        @if(!empty($send_name)&& count($send_name)>0)
                            @for ($i = 0; $i < count($send_name); $i++)
                                @if($send_name[$i]!=null)
                                    @php
                                        $index = $index + 1;
                                    @endphp
                                    <div class="input-group">
                                                                <span class="form-label">
                                                                    {{$send_name[$i]}}
                                                                </span>
                                        @if($send_type[$i]==1 || $send_type[$i]==2||$send_type[$i]==3)
                                            @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)))
                                                <input required type="text" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))}}" name="customer_data{{$i}}" placeholder="{{$send_name[$i]}}">
                                            @else
                                                <input required type="text" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)}}" name="customer_data{{$i}}" placeholder="{{$send_name[$i]}}">
                                            @endif
                                        @elseif($send_type[$i]==4)
                                            @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)))
                                                <input type="file" required accept="image/*" class="form-control" name="customer_data{{$i}}" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))}}" placeholder="{{$send_name[$i]}}">
                                            @else
                                                <input type="file" required accept="image/*" class="form-control" name="customer_data{{$i}}" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)}}" placeholder="{{$send_name[$i]}}">
                                            @endif
                                        @elseif($send_type[$i]==5)
                                            @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)))
                                                <input class="input-primary" type="password" name="customer_data{{$i}}" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))}}" placeholder="{{$send_name[$i]}}">
                                            @else
                                                <input class="input-primary" type="password" name="customer_data{{$i}}" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)}}" placeholder="{{$send_name[$i]}}">
                                            @endif
                                        @elseif($send_type[$i]==6)
                                            @php
                                                if (\App\Library\HelpersDecode::DecodeJson('send_data'.$i,json_encode($data->params))){
                                                    $send_data=\App\Library\HelpersDecode::DecodeJson('send_data'.$i,json_encode($data->params));
                                                }else{
                                                    $send_data=\App\Library\HelpersDecode::DecodeJson('send_data'.$i,$data->params);
                                                }
                                            @endphp
                                            <select name="customer_data{{$i}}" id="">
                                                @if(!empty($send_data))
                                                    @for ($sn = 0; $sn < count($send_data); $sn++)
                                                        @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)))
                                                            <option value="{{$sn}}" {{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))==$sn?"selected":""}}>{{$send_data[$sn]}}</option>
                                                        @else
                                                            <option value="{{$sn}}" {{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)==$sn?"selected":""}}>{{$send_data[$sn]}}</option>
                                                        @endif
                                                    @endfor
                                                @endif
                                            </select>
                                        @endif
                                    </div>
                                @endif
                            @endfor
                        @endif

                    </div>
                    <div class="sheet-footer">
                        <button type="submit" class="btn primary">Xác nhận</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>

            <!-- sheet send message -->
            <div class="bottom-sheet" id="sheet-send-message" aria-hidden="true" data-height="60">
                <div class="layer"></div>
                <div class="content-bottom-sheet bar-slide">
                    <form method="POST" id="chatFrom" enctype="multipart/form-data" action="/inbox/send/{{$data->id}}" accept-charset="UTF-8" class="form-horizontal form-charge">
                        {{csrf_field()}}
                        <div class="sheet-header">
                            <h2 class="text-title center">
                                Gửi tin nhắn
                            </h2>
                            <label for="check-bottom-sheet" class="close"></label>
                        </div>
                        <div class="sheet-body">
                            <!-- body -->
                            <label class="c-mb-4 fw-500 fz-13 lh-20">Nội dung</label>
                            <div class="col-md-12 p-0">
                                <textarea name="message" type="email" cols="9" rows="3" placeholder="placeholder" style="height: 84px;"></textarea>
                            </div>
                            <div class="c-mt-12">
                                <label class="c-mb-4 fw-500 fz-13 lh-20">Hình ảnh</label>
                                <div class="col-md-12 p-0 position-relative">
                                    <input type="file" name="image" accept="image/*" multiple="">
                                </div>
                            </div>
                            <div class="c-mt-8">
                                <div class="col-md-12 p-0 position-relative">
                                    <label class="input-checkbox">
                                        <input type="checkbox" checked="" name="select">
                                        <span class="checkmark"></span>
                                        <span class="text-label">Khiếu nại</span>
                                    </label>
                                </div>
                            </div>
                            <div class="c-mt-12">
                                <label class="c-mb-4 fw-500 fz-13 lh-20">Mã bảo vệ</label>
                                <div class="col-md-12 p-0 d-flex">
                                    <input class="input-form w-100" type="text" placeholder="Nhập mã bảo vệ">
                                    <div class="c-ml-8 c-mr-8">
                                        <div class="brs-8 overflow-hidden">
                                        <span class="brs-8">
                                            <img src="{{captcha_src('flat')}}" id="imgcaptcha" onclick="document.getElementById('imgcaptcha').src ='{{captcha_src('flat')}}'+Math.random();document.getElementById('captcha').focus();">
                                        </span>
                                        </div>
                                    </div>
                                    <button class="refresh-captcha brs-8" id="reload">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/nam/refresh_captcha.svg" alt="">
                                    </button>

                                </div>
                            </div>
                        </div>
                        <div class="sheet-footer">
                            <button type="submit" class="btn primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
        <!-- Dịch vụ khác -->
        <div class="container d-none d-lg-block c-container c-mt-24 c-mt-lg-16">
            @include('frontend.widget.__service__other__his')
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/service/service-history-detail.js"></script>

    <script>

        $(document).ready(function () {




            $('#chatFrom').submit(function (e) {
                e.preventDefault();
                var formSubmit = $(this);
                var url = formSubmit.attr('action');
                var btnSubmit = formSubmit.find(':submit');
                btnSubmit.prop('disabled', true);

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formSubmit.serialize(), // serializes the form's elements.
                    beforeSend: function (xhr) {

                    },
                    success: function (response) {

                        if(response.status == 1){

                            swal({
                                title: "Gửi tin nhắn thành công",
                                type: "success",
                                confirmButtonText: "Về dịch vụ đã mua",
                                showCancelButton: true,
                                cancelButtonText: "Đóng",
                            })
                                .then((result) => {
                                    if (result.value) {
                                        window.location = '/dich-vu-da-mua';
                                    } else if (result.dismiss === "Đóng") {
                                        location.reload();
                                    }else {
                                        location.reload();
                                    }
                                })
                        }
                        else if (response.status == 2){
                            $('.loadModal__acount').modal('hide');

                            swal(
                                'Thông báo!',
                                response.message,
                                'warning'
                            )
                            $('.loginBox__layma__button__displayabs').prop('disabled', false);
                        }else {
                            $('.loadModal__acount').modal('hide');
                            swal(
                                'Lỗi!',
                                response.message,
                                'error'
                            )
                            $('.loginBox__layma__button__displayabs').prop('disabled', false);
                        }
                        $('.loading-data__muangay').html('');
                    },
                    error: function (response) {
                        if(response.status === 422 || response.status === 429) {
                            let errors = response.responseJSON.errors;

                            jQuery.each(errors, function(index, itemData) {

                                formSubmit.find('.notify-error').text(itemData[0]);
                                return false; // breaks
                            });
                        }else if(response.status === 0){
                            alert(response.message);
                            $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+response.message+'</span>');
                        }
                        else {
                            $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+'Kết nối với hệ thống thất bại.Xin vui lòng thử lại'+'</span>');
                        }
                    },
                    complete: function (data) {
                        btnSubmit.prop('disabled', false);
                    }
                })


            })
        })

    </script>
@endsection


