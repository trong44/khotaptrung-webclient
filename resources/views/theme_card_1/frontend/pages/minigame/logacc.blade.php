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
                            <h3>LỊCH SỬ CHƠI {{$group->title}} TRÚNG ACC</h3>
                        </div>
                        <div class="booking_detail"></div>
                        <div class="wapper-grid profile">

                            <form class="form-charge account_content_transaction_history__v2 account_service_history__v2">
                                <div class="row" style="margin-top: 16px">
                                    <div class="form-row mb-3 col-md-4" style="margin-left: 2px">
                                        <div class="input-group">
                                        <span class="input-group-btn">
                                        <p class="input-group-btn-p" style="background-color: #eeeeee;">Loại rút:</p>
                                        </span>
                                            <select style="height: 40px" name="type" id="type" class="form-control">
                                                <option value="1">Log trúng vật phẩm</option>
                                                <option selected>Log trúng acc</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3 col-md-4" style="margin-left: 2px">
                                        <div class="input-group">
                                        <span class="input-group-btn">
                                        <p class="input-group-btn-p" style="background-color: #eeeeee;">Vòng quay:</p>
                                        </span>

                                            <select style="height: 40px" name="id" id="id" class="form-control">
                                                @foreach($group_api as $item)
                                                    <option value="{{route('getLogAcc',['id' => $item->id])}}" {{$group->id==$item->id?'selected':''}}>{{$item->title}}</option>
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
                                            window.location.href = $( "select#id" ).val().replace('logacc','log');
                                        });
                                    </script>
                                </div>
                            </form>
                            <form action="{{route('getLog',[$group->id])}}" method="get" class=" account_content_transaction_history__v2">
                                <div class="row" style="padding-top: 16px;">

                                    <div class="form-row mb-3 col-md-4" style="margin-left: 2px">

                                        <div class="input-group m-b-10 c-square">
                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
                                                 data-rtl="false">
                                            <span class="input-group-btn" style="background-color: #eeeeee;height: 40px">
                                            <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                            </span>
                                                <input type="text" class="form-control c-square c-theme started_at" name="started_at"
                                                       autocomplete="off" placeholder="Từ ngày"
                                                       value="" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3 col-md-4">

                                        <div class="input-group m-b-10 c-square">
                                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
                                                 data-rtl="false">
                                            <span class="input-group-btn" style="background-color: #eeeeee;height: 40px">
                                            <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
                                                    class="fa fa-calendar"></i></button>
                                            </span>
                                                <input type="text" class="form-control c-square c-theme ended_at" name="ended_at"
                                                       autocomplete="off" placeholder="Đến ngày"
                                                       value="" style="height: 40px">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3 col-md-4">
                                        <div class="input-group mb-2 c-square">
                                            <span class="input-group-addon" style="background-color: #eeeeee;height: 40px" id="basic-addon1">Tên quà:</span>
                                            <input style="height: 40px" type="text" class="form-control input-group-addon c__input-group-addon" name="gift_name" autocomplete="off" placeholder="Tên quà" value="{{request('gift_name')}}">

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
                                        <th>Tài khoản</th>
                                        <th>Mật khẩu</th>
                                        <th>Phần thưởng</th>
                                        <th>Danh mục</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($result->data) && count($result->data))
                                            @foreach($result->data as $item)
                                                <tr>
                                                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i')}}</td>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->item_acc->title}}</td>
                                                    <td>{{$item->item_acc->position}}</td>
                                                    <td>{{$item->item_ref->children[0]->title??""}}</td>
                                                    <td>{{$item->group->title}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5">Chưa phát sinh giao dịch</td>
                                            </tr>
                                        @endif
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
    $('#transaction_history_end').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        useCurrent: false,
        icons:
            { time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                clear: 'fas fa-trash',
                close: 'far fa-times' },
        // minDate: moment()
    });
    $('#transaction_history_start').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        useCurrent: false,
        icons:
            { time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                clear: 'fas fa-trash',
                close: 'far fa-times' },
        // minDate: moment()

    });
</script>
@endsection
