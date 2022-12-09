<div class="history-table-container px-0 mt-3">
    <div class="history-table">
        <div class="history-head row no-gutters">
            <div class="history-head-item item-left col-2 py-0">
                <p>
                    Thời gian
                </p>
            </div>
            <div class="history-head-item item-left col-2  py-0">
                <p>
                    ID
                </p>
            </div>
            <div class="history-head-item item-right col-3  py-0">
                <p class="text-right">
                    Số vật phẩm
                </p>
            </div>
            <div class="history-head-item item-right col-3  py-0">
                <p class="text-right">
                    Thông báo
                </p>
            </div>
            <div class="history-head-item item-right col-2  py-0">
                <p>
                    Trạng thái
                </p>
            </div>
        </div>
        <div class="history-content">
            {{-- Empty State of table --}}
            {{-- <div class="history-item empty-state row no-gutters">
                <p>Tài khoản của quý khách chưa phát sinh giao dịch</p>
            </div> --}}
            @if($paginatedItems)
                @foreach($data as $item)
                    <div class="history-item row no-gutters">
                        <div class="col-2 history-item-data data-left">
                            <p>{{date('d/m/Y H:i:s', strtotime($item->created_at))}}</p>
                        </div>
                        <div class="col-2 history-item-data data-left">
                            <p>#{{$item->id}}</p>
                        </div>
                        <div class="col-3 history-item-data data-right">
                            <p>{{$item->price}}</p>
                        </div>
                        <div class="col-3 history-item-data data-right">
                            <p>
                                @if ($item->content != "")
                                    <button type="submit" data-msg="{{$item->content}}" class="btn btn-xs c-btn-square m-b-10 btn-success proccess_toggle" rel="{{$item->id}}">Tiến độ
                                    </button>
                                @endif
                            </p>
                        </div>
                        <div class="col-2 history-item-data data-right">
                            @if($item->payment_type == 13 || $item->payment_type == 12 || $item->payment_type == 11 || $item->payment_type == 14)
                                @if ($item->status == 0)
                                    <a class="btn btn-xs c-btn-square m-b-10 btn-danger">Giao dịch thất bại</a>
                                @elseif($item->status == 1 )
                                    <a class="btn btn-xs c-btn-square m-b-10 btn-warning">Chờ xử lý</a>
                                @elseif($item->status == 2 )
                                    <a class="btn btn-xs c-btn-square m-b-10 btn-warning">Chờ xử lý</a>
                                @elseif($item->status == 4 )
                                    <a class="btn btn-xs c-btn-square m-b-10 btn-success">Hoàn thành</a>
                                @endif
                            @else
                                @if ($item->status == 0)
                                    <a class="btn btn-xs c-btn-square m-b-10 btn-warning">{{config('constants.withdraw_status.0')}}</a>
                                @elseif($item->status == 1 )
                                    <span class="status-success">{{config('constants.withdraw_status.1')}}</span>
                                @elseif($item->status == 2 )
                                    <span class="status-failed">{{config('constants.withdraw_status.2')}}</span>
                                @elseif($item->status == 3 )
                                    <span class="status-failed">{{config('constants.withdraw_status.3')}}</span>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="history-item empty-state row no-gutters">
                    <p>Tài khoản của quý khách chưa phát sinh giao dịch.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@if(isset($paginatedItems))
    <div class="col-md-12 left-right justify-content-end default-paginate-addpadding default-paginate">
        <div class="row marinautooo justify-content-center">
            <div class="col-auto">
                <div class="data_paginate paginate__v1 paging_bootstrap paginations_custom" style="text-align: center">
                    {{ $paginatedItems->appends(request()->query())->links('pagination::bootstrap-default-4') }}
                </div>
            </div>
        </div>
    </div>
@endif
