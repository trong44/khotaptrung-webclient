@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')

    <div class="account">
        <div class="account_content">
            <div class="container">
                @include('frontend.pages.account.sidebar')

                <div class="account_sidebar_content">
                    <!-- BEGIN: PAGE CONTENT -->
                    <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
                    <div class="c-content-title-1">
                        <h3 class="c-font-uppercase c-font-bold" style="font-size: 18px;font-weight: bold">Tin nhắn - Thông báo</h3>
                        <div class="c-line-left"></div>
                    </div>
                    <form class="form_get_show_service">
                        <div class="row">
                            <div class="col-6 item_buy_form_search">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                    Tìm kiếm
                                    </span>
                                    <input type="text" name="title" class="form-control title" placeholder="Tìm kiếm">
                                </div>
                            </div>
                            <div class="col-3 item_buy_form_search">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-category-service btn-timkiem" style="position: relative">
                                        Tìm kiếm
                                        <div class="row justify-content-center loading-data__timkiem">
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
{{--                    <form class="form-inline form-find m-b-20" role="form" method="get">--}}
{{--                        <span class="input-group-addon" id="basic-addon1">Tìm kiếm</span>--}}
{{--                        <div class="input-group">--}}
{{--                            <span class="input-group-addon">--}}
{{--                                Tìm kiếm--}}
{{--                            </span>--}}
{{--                            <input type="text" name="id" class="form-control title" placeholder="ID dịch vụ hoặc acc game...">--}}
{{--                        </div>--}}

{{--                        <input type="submit" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">--}}
{{--                    </form>--}}
                    <table class="table table-hover table-custom-res">
                        <thead>
                        <tr>
                            <th>Thời gian</th>
                            <th>Loại</th>
                            <th>Danh mục</th>
                            <th>Nội dung</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $seen= \App\Library\AuthCustom::getName();
                        @endphp
                        @php
                            $prev = null;
                        @endphp
                        @if(isset($conversation))
                            @forelse($conversation as $item)
                                @php
                                    $curr = \App\Library\Helpers::FormatDateTime('d/m/Y',$item->updated_at)
                                @endphp
                                @if($curr != $prev)
                                    <tr>
                                        <td colspan="8"><b>Ngày {{$curr}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>{{\App\Library\Helpers::FormatDateTime('H:i:s',$item->updated_at)}}</td>
                                        <td>
                                            @if($item->type==1)
                                                <a href="/user/inbox/{{$item->id}}"  class="btn btn-success c-font-white c-btn-square btn-xs p-quantity">Dịch vụ #{{$item->conversation_id}}
                                                    @php
                                                        $counter=0
                                                    @endphp
                                                    @foreach($item->inbox?$item->inbox:[] as $aInb)
                                                        @if(strpos($aInb->seen,$seen)===false)
                                                            @php
                                                                $counter++;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    @if($counter>0)
                                                        <span id="quantity_noti" class="quantity">
                                                        {{$counter}}
											    </span>
                                                    @endif

                                                </a>
                                            @else
                                                <a href="/user/inbox/{{$item->id}}"  class="btn btn-info c-font-white c-btn-square btn-xs p-quantity">Acc game #{{$item->conversation_id}}
                                                    @php
                                                        $counter=0
                                                    @endphp
                                                    @foreach($item->inbox?$item->inbox:[] as $aInb)
                                                        @if(strpos($aInb->seen,$seen)===false)
                                                            @php
                                                                $counter++;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    @if($counter>0)
                                                        <span id="quantity_noti" class="quantity">
                                                        {{$counter}}
											    </span>
                                                    @endif
                                                </a>
                                            @endif


                                        </td>
                                        <td>{{isset($item->item[0]->groups[0]->title)?$item->item[0]->groups[0]->title:""}}</td>
                                        <td>{{isset($item->inbox[0]->message)?str_limit($item->inbox[0]->message,10,"..."):""}}</td>
                                        <td>
                                            <a href="/user/inbox/{{$item->id}}" class="btn btn-danger c-font-white c-btn-square btn-xs">Xem</a>
                                        </td>
                                    </tr>

                                    @php
                                        $prev = $curr;
                                    @endphp
                                @else
                                    <tr>
                                        <td>{{\App\Library\Helpers::FormatDateTime('H:i:s',$item->updated_at)}}</td>
                                        <td>
                                            @if($item->type==1)
                                                <a href="/user/inbox/{{$item->id}}"  class="btn btn-success c-font-white c-btn-square btn-xs p-quantity">Dịch vụ #{{$item->conversation_id}}
                                                    @php
                                                        $counter=0
                                                    @endphp
                                                    @foreach($item->inbox?$item->inbox:[] as $aInb)
                                                        @if(strpos($aInb->seen,$seen)===false)
                                                            @php
                                                                $counter++;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    @if($counter>0)
                                                        <span id="quantity_noti" class="quantity">
                                                        {{$counter}}
											    </span>
                                                    @endif

                                                </a>
                                            @else
                                                <a href="/user/inbox/{{$item->id}}"  class="btn btn-info c-font-white c-btn-square btn-xs p-quantity">Acc game #{{$item->conversation_id}}
                                                    @php
                                                        $counter=0
                                                    @endphp
                                                    @foreach($item->inbox?$item->inbox:[] as $aInb)
                                                        @if(strpos($aInb->seen,$seen)===false)
                                                            @php
                                                                $counter++;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    @if($counter>0)
                                                        <span id="quantity_noti" class="quantity">
                                                        {{$counter}}
											    </span>
                                                    @endif
                                                </a>
                                            @endif


                                        </td>
                                        <td>{{isset($item->item[0]->groups[0]->title)?$item->item[0]->groups[0]->title:""}}</td>
                                        <td>{{isset($item->inbox[0]->message)?str_limit($item->inbox[0]->message,10,"..."):""}}</td>
                                        <td>
                                            <a href="/user/inbox/{{$item->id}}" class="btn btn-danger c-font-white c-btn-square btn-xs">Xem</a>
                                        </td>
                                    </tr>
                                @endif

                            @empty
                                <tr>

                                    <td colspan="4">Không có dữ liệu</td>
                                </tr>
                            @endforelse
                        @else
                            <tr>

                                <td colspan="4" style="color: red">Không có dữ liệu</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                    <!-- END: PAGE CONTENT -->
                </div>
            </div>
        </div>
    </div>

    <!-- END: PAGE CONTENT -->

@endsection

