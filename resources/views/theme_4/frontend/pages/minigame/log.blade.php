@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <section>
        <div class="container">

            <div class="row user-manager">
                @include('frontend.widget.__menu_profile')

                <div class="col-12 col-md-8 col-lg-9 site-form " style="min-height: 212.568px;">

                    <div class="menu-content">
                        <div class="title">
                            <h3>LỊCH SỬ CHƠI {{$group->title}} TRÚNG VẬT PHẨM</h3>
                        </div>
                        <div class="booking_detail"></div>
                        <div class="wapper-grid profile">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <select name="type" id="type" class="form-control">
                                            <option selected>Log trúng vật phẩm</option>
                                            <option value="1">Log trúng acc</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <select name="id" id="id" class="form-control">
                                            @foreach($group_api as $item)
                                                <option value="{{route('getLog',['id' => $item->id])}}" {{$group->id==$item->id?'selected':''}}>{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="group_id" value="{{$group->id}}">
                                <script type="text/javascript">
                                    $("#id").change(function(){
                                        window.location.href = $( "select#id" ).val();
                                    });
                                    $("#type").change(function(){
                                        var link = $( "select#id" ).val().replace('log','logacc')
                                        window.location.href = link;
                                    });
                                </script>
                            </div>
                            <form action="{{route('getLog',[$group->id])}}" method="get" class=" account_content_transaction_history__v2">
                                <div class="row" style="margin-top: 8px;margin-bottom: 8px">

                                    <div class="form-row mb-3 col-md-4">

                                        <div class="input-group m-b-10 c-square">
                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
                                                 data-rtl="false">
                                            <span class="input-group-btn">
                                            <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                            </span>
                                                <input type="text" class="form-control c-square c-theme started_at" name="started_at"
                                                       autocomplete="off" placeholder="Từ ngày"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3 col-md-4">
                                        <div class="input-group m-b-10 c-square">
                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
                                                 data-rtl="false">
                                            <span class="input-group-btn">
                                            <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                            </span>
                                                <input type="text" class="form-control c-square c-theme ended_at" name="ended_at"
                                                       autocomplete="off" placeholder="Đến ngày"
                                                       value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3 col-md-4">
                                        <div class="input-group date date-picker">
                                        <span class="input-group-btn">
                                        <p class="input-group-btn-p">Tên quà:</p>
                                        </span>

                                        <input type="text" class="form-control input-group-addon" name="gift_name" autocomplete="off" placeholder="Tên quà" value="{{request('gift_name')}}">

                                        </div>
                                    </div>


                                </div>
                                <div class="row" style="margin-bottom: 8px">
                                    <div class="col-md-4">
                                        <input type="submit" style="margin-right: 16px" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm" >
                                        <a href="{{url()->current()}}" class="btn c-btn-square m-b-10 btn-danger">Tất cả</a>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table table-hover table-custom-res">
                                    <thead>
                                    <tr>
                                        <th>Thời gian</th>
                                        <th>ID</th>
                                        <th>Phần thưởng </th>
                                        <th>Số vật phẩm </th>
                                        <th>Danh mục</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($result->data as $item)
                                        <tr>
                                            <td>{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i')}}</td>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->item_ref->title??""}}</td>
                                            <td>
                                                @if(isset($item->item_ref) && isset($item->item_ref->parrent) && isset($item->item_ref->parrent->params))
                                                    @if($item->item_ref->parrent->params->gift_type == 0)
                                                        @php
                                                            $value = $item->item_ref->parrent->params->value;
                                                            $bonus = 0;
                                                            if (isset($item->value_gif_bonus)){
                                                                $bonus = $item->value_gif_bonus;
                                                            }
                                                            $total_vp = $value + $bonus;
                                                        @endphp
                                                        {{ str_replace(',','.',number_format($total_vp)) }}
                                                    @else
                                                        {{$item->item_ref->parrent->params->value??""}}
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($item->group))
                                                    {{$item->group->title}}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-12 left-right justify-content-end paginate__v1 paginate__v1_mobie frontend__panigate">
                                    <div class="row marinautooo paginate__history paginate__history__fix justify-content-center">
                                        <div class="col-auto paginate__category__col">
                                            <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                                {{ $paginatedItems->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div><!-- /.container -->
    </section>

<script>
    // $(function () {

</script>
@endsection
