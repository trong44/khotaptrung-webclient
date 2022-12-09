@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/select-nice/select-nice.css">
    <div class="site-content-body bg-white first last p-0">
        <div class="block-profile">
            @include('frontend.widget.__menu_profile')
            <div class="block-content p-3">
                <div class=" mb-4">
                    <div class="" id="history" style="min-height: 628px;">

                        <h4 class="title-style-left" style="margin-bottom: 0">Lịch sử chơi {{$group->title}} trúng vật phẩm</h4>

                        <div class="c-history-right-body brs-12 brs-lg-0 c-p-16">

                            <div class="row marginauto c-mt-lg-16">
                                <div class="col-12 left-right pl-0 pr-0">
                                    <div class="row marginauto">
                                        <div class="col-md-5 pl-0 c-pr-4 c-pr-lg-2 col-6 logs-vat-pham-left" style="padding-left: 0">
                                            <div class="row marginauto">
                                                <div class="col-12 left-right c-pr-4 background-nick-col-bottom-ct status-finter-nick">
                                                    <select name="type" id="type" class="wide">
                                                        <option value="1">Log trúng vật phẩm</option>
                                                        <option selected>Log trúng acc</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 pr-0 c-pl-4 c-pl-lg-2 col-6 logs-vat-pham-right">
                                            <div class="row marginauto">
                                                <div class="col-12 c-pl-4 left-right background-nick-col-bottom-ct status-finter-nick">
                                                    <select name="id" id="id" class="wide">
                                                        @foreach($group_api as $item)
                                                            <option value="{{route('getLogAcc',['id' => $item->id])}}" {{$group->id==$item->id?'selected':''}}>{{$item->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" id="group_id" value="{{$group->id}}">
                                        <script type="text/javascript">
                                            $("#id").change(function(){
                                                window.location.href = $( "select#id" ).val();
                                            });
                                            $("#type").change(function(){
                                                window.location.href = $( "select#id" ).val().replace('logacc','log');
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>

                            <form action="{{route('getLog',[$group->id])}}" method="get" class=" account_content_transaction_history__v2">
                                <div class="row" style="padding-top: 16px">

                                    <div class="c-mt-lg-16 col-6 col-lg-4 d-flex flex-column justify-content-end">
                                        <div class="position-relative">
                                            <input type="text" name="started_at" class="date-left started_at" placeholder="Từ ngày">
                                        </div>
                                    </div>
                                    <div class="c-mt-lg-16 col-6 col-lg-4 d-flex flex-column justify-content-end">
                                        <div class="position-relative">
                                            <input type="text" name="ended_at" class="date-left ended_at" placeholder="Đến ngày">
                                        </div>
                                    </div>

                                    <div class="col-6 col-lg-4">
                                        <input type="text" class="form-control input-group-addon" name="gift_name" autocomplete="off" placeholder="Tên quà" value="{{request('gift_name')}}">
                                    </div>
                                </div>
                                <div class="row c-mt-16">
                                    <div class="col-12 item_buy_form_search">
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn primary btn_timkiem" style="position: relative">
                                                    Tìm kiếm
                                                </button>
                                                <a href="{{url()->current()}}" class="btn c-btn-square m-b-10 btn-danger" style="color: #ffffff">Tất cả</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                            @php
                                $results = array();
                                foreach ($result->data as $element) {
                                    $results[date('m/y',strtotime($element->created_at))][] = $element;
                                }
                                $prev = null;
                            @endphp
                            <div class="mr-n1 pb-3">
                                <div class="history-content c-pt-16 mr-n2">
                                    @forelse($results as $key => $data)
                                        @if(date('m-y',strtotime($key)) != $prev)
                                            <div class="text-title-bold fw-500 c-mb-12">Tháng {{date('m',strtotime($key))}}</div>
                                            @php
                                                $prev = date('m-y',strtotime($key));
                                            @endphp
                                        @endif

                                        <ul class="trans-list">
                                            @forelse($data as $item)
                                                <li class="trans-item">
                                                    <a href="javascript:void(0)">
                                                        <div class="text-left">
                                                    <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                                                        {{$item->item_ref->title??""}}
                                                    </span>
                                                            <span class="t-body-1 link-color">
                                                        {{date('d/m/Y - H:i', strtotime($item->created_at))}}
                                                    </span>
                                                        </div>
                                                        <div class="text-right">
                                                        <span class="fw-500 d-block c-mb-0">@if(isset($item->item_ref) && isset($item->item_ref->parrent) && isset($item->item_ref->parrent->params))
                                                                @if($item->item_ref->parrent->params->gift_type == 0)
                                                                    @php
                                                                        $value = $item->item_ref->parrent->params->value;
                                                                        $bonus = 0;
                                                                        if (isset($item->value_gif_bonus)){
                                                                            $bonus = $item->value_gif_bonus;
                                                                        }
                                                                        $total_vp = $value + $bonus;
                                                                    @endphp
                                                                    {{ $total_vp }}
                                                                @else
                                                                    {{$item->item_ref->parrent->params->value??""}}
                                                                @endif
                                                            @endif</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    @empty
                                        <ul class="trans-list">
                                            <li class="trans-item" style="height: auto">
                                                <a href="javascript:void(0)">
                                                    <div class="text-left">
                                                <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                                                    Không có dữ liệu
                                                </span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    @endforelse
                                    <div class="row marinautooo paginate__history paginate__history__fix justify-content-end">
                                        <div class="col-auto paginate__category__col">
                                            <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                                @if(isset($paginatedItems) && count($paginatedItems))
                                                    {{ $paginatedItems->appends(request()->query())->links('pagination::pagination_3_0') }}
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
    </div>


@endsection

{{--@section('scripts')--}}
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/account-history.js"></script>--}}
{{--@endsection--}}












