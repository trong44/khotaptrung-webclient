@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
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
                <a href="/dich-vu-da-mua-{{$data->id}}" class="breadcrum--link">Chi tiết dịch vụ</a>
            </li>
        </ul>
        <div class="row m-0 ">
            {{--navbar--}}
            @include('theme_3.frontend.widget.__navbar__profile')
            {{--content--}}
            <div class="col-12 col-lg-9 p-0 order--detail">
                <div class="card--mobile__title">
                    <a href="/dich-vu-da-mua" class="card--back">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/back.png" alt="">
                    </a>
                    <h4>Dịch vụ đã mua</h4>
                </div>
                <div class="card --custom">
                    <div class="card--header pr-2">
                        <h4 class="card--header__title hidden-mobile">
                            Chi tiết đơn hàng
                        </h4>
                    </div>
                    <div class="card--body">
                        @if(isset($data->itemconfig_ref->params))
                        <div class="row">
                            <div class="col-12 col-lg-6 p-0 px-lg-3">
                                <div class="card--rise --secondary">
                                    <div class="card--rise__title">
                                        Chi tiết yêu cầu <span class="order__id">#{{$data->id}}</span>
                                    </div>
                                    @if(isset($data->tranid))
                                    <div class="card--rise__title">
                                        Mã giao dịch SMS: <span class="order__id">#{{$data->tranid}}</span>
                                    </div>
                                    @endif
                                    <div class="order__attr">
                                        <div class="order--name__attr">
                                            Tên dịch vụ
                                        </div>
                                        <div class="order--value__attr">
                                            <a href="/dich-vu/{{(isset($data->itemconfig_ref->slug)?$data->itemconfig_ref->slug:"Lỗi")}}">{{$data->itemconfig_ref->title}}</a>
                                        </div>
                                    </div>
                                    <div class="order__attr">
                                        <div class="order--name__attr">
                                            Công việc
                                        </div>
                                        <div class="order--value__attr">
                                            <div class="row marginauto">
                                                @if(!empty($data->workname) && count($data->workname)>0)
                                                    @foreach( $data->workname as $index=> $aWorkName)
                                                <div class="col-md-12 left-right work-col">
                                                     {{$aWorkName->title }} : {{ str_replace(',','.',number_format($aWorkName->unit_price)) }} đ
                                                </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                    <div class="card--rise --gray mt-lg-4 mt-3">
                                        <div class="card--rise__title">
                                            Tiến độ
                                        </div>
                                        <ul class="order--timelines">
                                            @if(!empty($data->workflow) && count($data->workflow)>0)
                                                @foreach( $data->workflow as $index=> $aWorkFlow)
                                                    <li class="order--timeline">
                                                        <div class="order--status">
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
                                                        </div>
                                                        <div class="order--date">
                                                            {{ formatDateTime($aWorkFlow->created_at) }}
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @php
                                $send_name=\App\Library\HelpersDecode::DecodeJson('send_name',$data->itemconfig_ref->params);
                                $send_type=\App\Library\HelpersDecode::DecodeJson('send_type',$data->itemconfig_ref->params);
                                $server_data=\App\Library\HelpersDecode::DecodeJson('server_data',$data->itemconfig_ref->params);
                            @endphp
                            <div class="col-12 col-lg-6 px-1 pr-lg-3">

                                <div class="row marginauto mb-4 chat-box">
                                    <div class="col-md-12 left-right">
                                        <div class="row marginauto chat-box-row">
                                            <div class="col-md-12 left-right chat-box-col">
                                                <span>Thông tin đính kèm</span>
                                            </div>
                                            @if(\App\Library\HelpersDecode::DecodeJson('server_mode',$data->itemconfig_ref->params)==1)
                                                <div class="col-md-12 left-right chat-box-col">
                                                    <small>Server: </small><span>{{isset($server_data[$data->position])?$server_data[$data->position]:""}}</span>
                                                </div>
                                            @endif

                                            @if(!empty($send_name)&& count($send_name)>0)
                                                @foreach( $send_name as $index=> $aSendName)

                                                    @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,json_encode($data->params)))
                                                        @if($send_type[$index]==4)
                                                            <div class="col-md-12 left-right chat-box-col">
                                                                <small>{{$aSendName}}: </small>
                                                                <span>
                                                                    <img src="{{\App\Library\Files::media(\App\Library\Helpers::DecodeJson('customer_data'.$index,json_encode($data->params)))}}" alt="" style="max-width: 100px;max-height: 100px;">
                                                                </span>
                                                            </div>
                                                        @elseif($send_type[$index]==5)
                                                            <div class="col-md-12 left-right chat-box-col">
                                                                <small>{{$aSendName}}: </small><span>******</span>
                                                            </div>
                                                        @else
                                                            <div class="col-md-12 left-right chat-box-col">
                                                                <small>{{$aSendName}}: </small><span>{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,json_encode($data->params))}}</span>
                                                            </div>
                                                        @endif
                                                    @else
                                                        @if($send_type[$index]==4)
                                                            <small>{{$aSendName}}: </small>
                                                            <span>
                                                                <a href="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$index,$data->params)}}" target="_blank">
                                                                    <img src="{{\App\Library\Files::media(\App\Library\Helpers::DecodeJson('customer_data'.$index,$data->params))}}" alt="" style="max-width: 100px;max-height: 100px;">
                                                                </a>
                                                            </span>


                                                        @elseif($send_type[$index]==5)
                                                            <div class="col-md-12 left-right chat-box-col">
                                                                <small>{{$aSendName}}: </small><span>******</span>
                                                            </div>
                                                        @else
                                                            <div class="col-md-12 left-right chat-box-col">
                                                                <small>{{$aSendName}}: </small><span>{{gettype($data->params) =='string' ? \App\Library\HelpersDecode::DecodeJson('customer_data'.$index,$data->params) : json_decode(json_encode($data->params),true)['customer_data'.$index] }}</span>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="row marginauto mb-4 chat-box">
                                   <div class="col-md-12 left-right">
                                       <div class="row marginauto header-chat">
                                           <div class="col-md-12 left-right chat-box-col">
                                               <span>Trao đổi dịch vụ</span><small><a href="/dich-vu-da-mua-{{$itemInbox->id}}">#{{$itemInbox->id}}</a></small>
                                           </div>
                                       </div>
                                       <div class="row marginauto body-chat">
                                           <div class="col-md-12 left-right chat-hover">
                                                <div class="row marginauto" id="chat-scroll">
                                                    @forelse($inbox  ?: [] as $aInbox)
                                                        @if($aInbox->user->id == $conversation->author_id)
                                                            <div class="col-md-12 left-right body-chat-col">
                                                                <div class="row marginauto">
                                                                    <div class="col-md-12 left-right body-chat-title">
                                                                        <span>Người yêu cầu order</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right body-chat-content">
                                                                        <small>{{\App\Library\Helpers::ConvertToAgoTime($aInbox->created_at)}}: </small><span> {{$aInbox->message}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif($aInbox->user->id == $conversation->buyer_id)
                                                            <div class="col-md-12 left-right body-chat-col body-chat-col-dark">
                                                                <div class="row marginauto">
                                                                    <div class="col-md-12 left-right body-chat-title">
                                                                        <span>Người thực hiện</span>
                                                                    </div>
                                                                    <div class="col-md-12 left-right body-chat-content">
                                                                        <small>{{\App\Library\Helpers::ConvertToAgoTime($aInbox->created_at)}}: </small><span>{{$aInbox->message}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="row marginauto">
                                                                <div class="col-md-12 left-right body-chat-title">
                                                                    <span>Người hỗ trợ</span>
                                                                </div>
                                                                <div class="col-md-12 left-right body-chat-content">
                                                                    <small>{{\App\Library\Helpers::ConvertToAgoTime($aInbox->created_at)}}: </small><span> {{$aInbox->message}}</span>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    @empty
                                                        <div class="col-md-12 left-right body-chat-col">
                                                            <div class="row marginauto">
                                                                <div class="col-md-12 left-right body-chat-title">
                                                                    <span>Chưa có nội dung trao đổi</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforelse
                                                </div>
                                           </div>
                                       </div>
                                   </div>
                                </div>
                                <div class="mx-2 mx-lg-0">
                                    <div class="row marginauto justify-content-center">
                                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                            <div class="row marginauto modal-footer-success-row-not-ct">
                                                <div class="col-md-12 left-right">
                                                    <a href="javascript:void(0)" class="button-not-bg-ct btn-delete"><span>Hủy</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                            <div class="row marginauto">
                                                <div class="col-md-12 left-right">
                                                    <button class="button-default-modal-ct button-modal-nick btn-open-edit media-mobile" type="button">Chỉnh sửa</button>

                                                    <button class="button-default-modal-ct button-modal-nick btn-open-edit media-web" type="button">Chỉnh sửa thông tin</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="row">
                                <div class="col-12 col-lg-6 p-0 px-lg-3">
                                    <div class="card--rise --secondary">
                                        <div class="card--rise__title">
                                            <span class="order__id">Không có dữ liệu</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade login show small-log-Modal order-modal" id="openDelete" aria-modal="true">

            <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
                <!--        <div class="image-login"></div>-->
                <div class="modal-content">
                    <div class="modal-header p-0" style="border-bottom: 0">
                        <div class="row marginauto modal-header-nick-ct">
                            <div class="col-12 left-right text-center" style="position: relative">
                                <span>Hủy bỏ yêu cầu dịch vụ</span>
{{--                                <img class="lazy img-close-nick-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">--}}
                            </div>
                            <div class="error__deleteserrvice" style="width: 100%;text-align: center;margin-bottom: 0">

                            </div>
                        </div>

                    </div>

                    <div class="modal-body modal-body-order-ct">
                        {{Form::open(array('url'=>'/dich-vu-da-mua-'.$data->id.'/destroy/','class'=>'m-form destroyForm','method'=>'post'))}}
                            <div class="row marginauto">

                                <div class="col-md-12 left-right">
                                    <div class="row marginauto">
                                        <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                            <span>Lỗi thuộc về</span>
                                        </div>
                                        <div class="col-12 left-right background-nick-col-bottom-ct id-finter-nick">
                                            {{Form::select('mistake_by',array(''=>'Chọn')+config('module.service.mistake_by'),Request::get('mistake_by'),array('required'=>'','class'=>"wide"))}}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right modal-nick-padding">
                                    <div class="row marginauto">
                                        <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
{{--                                            <span>Trạng thái</span>--}}
                                        </div>
                                        <div class="col-12 left-right background-nick-col-bottom-ct status-finter-nick">
                                            <textarea name="note" class="textarea-default" id="" placeholder="Nội dung ít nhất 10 ký tự"></textarea>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12 left-right padding-nicks-footer-ct">

                                    <div class="row marginauto pt-4-lg pt-sm-3 pt-0 justify-content-center">
                                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                            <div class="row marginauto modal-footer-success-row-not-ct">
                                                <div class="col-md-12 left-right">
                                                    <a href="javascript:void(0)" class="button-not-bg-ct btn-close reset-find">
                                                    <span class="span-reset">
                                                        Đóng
                                                    </span>
                                                        <div class="row justify-content-center loading-data__timkiem">

                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                            <div class="row marginauto">
                                                <div class="col-md-12 left-right">
                                                    <button class="button-default-modal-ct button-modal-nick openSuccess btn-ap-dung" type="submit">
                                                        <span class="span-ap-dung">Xác nhận</span>
                                                        <div class="row justify-content-center loading-data__timkiem">

                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        {{Form::close()}}

                    </div>
                </div>
            </div>

        </div>

        <div class="modal fade login show small-log-Modal order-modal" id="openEdit" aria-modal="true">

            <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
                <!--        <div class="image-login"></div>-->
                <div class="modal-content">
                    <div class="modal-header p-0" style="border-bottom: 0">
                        <div class="row marginauto modal-header-nick-ct">
                            <div class="col-12 left-right text-center" style="position: relative">
                                <span>Chỉnh sửa thông tin</span>
                                {{--                                <img class="lazy img-close-nick-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">--}}
                            </div>
                            <div class="error__editerrvice" style="width: 100%;text-align: center;margin-bottom: 0">

                            </div>
                        </div>

                    </div>

                    <div class="modal-body modal-body-order-ct">

                        {{Form::open(array('url'=>'/dich-vu-da-mua-'.$data->id.'/edit/','class'=>'m-form editForm','method'=>'post'))}}
                        <div class="row marginauto">
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

                                        @if($send_type[$i]==1 || $send_type[$i]==2||$send_type[$i]==3)

                                            <div class="col-md-12 pt-lg-3 pt-2 left-right">
                                                <div class="row marginauto">
                                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                                        <span>{{$send_name[$i]}}</span>
                                                    </div>
                                                    <div class="col-12 left-right background-nick-col-bottom-ct status-finter-nick">
                                                        @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)) || \App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)) == '')
                                                            <input autocomplete="off" required class="input-defautf-ct id" name="customer_data{{$i}}" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))}}" type="text" placeholder="{{$send_name[$i]}}">
                                                        @else
                                                            <input autocomplete="off" required class="input-defautf-ct id" name="customer_data{{$i}}" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)}}" type="text" placeholder="{{$send_name[$i]}}">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                        @elseif($send_type[$i]==4)
                                            <div class="col-md-12 pt-lg-3 pt-2 left-right">
                                                <div class="row marginauto">
                                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                                        <span>Hình ảnh</span>
                                                    </div>
                                                    <div class="col-12 left-right background-nick-col-bottom-ct status-finter-nick" style="position: relative">

                                                        @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)))
                                                            <input type="file" required accept="image/*" name="customer_data{{$i}}" class="input--file" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))}}">
                                                        @else
                                                            <input type="file" required accept="image/*" name="customer_data{{$i}}" class="input--file" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)}}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($send_type[$i]==5)
                                            <div class="col-md-12 pt-lg-3 pt-2 left-right">
                                                <div class="row marginauto">
                                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                                        <span>{{$send_name[$i]}}</span>
                                                    </div>
                                                    <div class="col-12 left-right background-nick-col-bottom-ct status-finter-nick" style="position: relative">
                                                        @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)) || \App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)) == '')
                                                            <input required autocomplete="off" id="password" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))}}" name="customer_data{{$i}}" class="input-defautf-ct password" type="password" placeholder="{{$send_name[$i]}}">
                                                            <div class="show-btn-password"><img class="lazy" src="/assets/frontend/theme_3/image/images_1/eye-show.svg" alt=""></div>
                                                        @else
                                                            <input required autocomplete="off" id="password" value="{{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)}}" name="customer_data{{$i}}" class="input-defautf-ct password" type="password" placeholder="{{$send_name[$i]}}">
                                                            <div class="show-btn-password"><img class="lazy" src="/assets/frontend/theme_3/image/images_1/eye-show.svg" alt=""></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($send_type[$i]==6)

                                            @php
                                                if (\App\Library\HelpersDecode::DecodeJson('send_data'.$i,json_encode($data->params))){
                                                    $send_data=\App\Library\HelpersDecode::DecodeJson('send_data'.$i,json_encode($data->params));
                                                }else{
                                                    $send_data=\App\Library\HelpersDecode::DecodeJson('send_data'.$i,$data->params);
                                                }

                                            @endphp

                                            <div class="col-md-12 pt-lg-3 pt-2 left-right">
                                                <div class="row marginauto">
                                                    <div class="col-12 left-right background-nick-col-top-ct body-title-detail-span-ct">
                                                        <span>Lỗi thuộc về</span>
                                                    </div>
                                                    <div class="col-12 left-right background-nick-col-bottom-ct id-finter-nick">
                                                        <select name="customer_data{{$i}}" required class="wide">
                                                            <option>Chọn</option>
                                                            @if(\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params)))
                                                                <option value="{{$sn}}" {{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,json_encode($data->params))==$sn?"selected":""}}>{{$send_data[$sn]}}</option>
                                                            @else
                                                                <option value="{{$sn}}" {{\App\Library\HelpersDecode::DecodeJson('customer_data'.$i,$data->params)==$sn?"selected":""}}>{{$send_data[$sn]}}</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-12 pt-lg-3 pt-2 left-right">
                                                <label for="tuychon-01" class="input-ratio-ct">
                                                    <ul>
                                                        <li>{{$send_name[$i]}}</li>
                                                    </ul>
                                                    <input id="tuychon-01" type="checkbox" class="allgame" name="option" value="on">
                                                    <span class="input-ratio-checkmark-ct"></span>
                                                </label>
                                            </div>
                                        @endif
                                    @endif
                                @endfor
                            @endif

                            <div class="col-md-12 left-right padding-nicks-footer-ct">

                                <div class="row marginauto pt-4-lg pt-sm-3 pt-0 justify-content-center">
                                    <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                        <div class="row marginauto modal-footer-success-row-not-ct">
                                            <div class="col-md-12 left-right">
                                                <a href="javascript:void(0)" class="button-not-bg-ct btn-close reset-find">
                                                    <span class="span-reset">
                                                        Đóng
                                                    </span>
                                                    <div class="row justify-content-center loading-data__timkiem">

                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                        <div class="row marginauto">
                                            <div class="col-md-12 left-right">
                                                <button class="button-default-modal-ct button-modal-nick openSuccess btn-ap-dung" type="submit">
                                                    <span class="span-ap-dung">Xác nhận</span>
                                                    <div class="row justify-content-center loading-data__timkiem">

                                                    </div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{Form::close()}}

                    </div>
                </div>
            </div>

        </div>

        <script src="/assets/frontend/{{theme('')->theme_key}}/js/cay-thue/logs-detail.js"></script>
@endsection

