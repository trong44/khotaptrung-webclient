
@if(empty($data->data))

<div class="col-md-12 left-right">
    <table class="table table-striped table-hover table-logs" id="table-default">
        <thead><tr><th>Thời gian</th><th>Tiền</th><th>Thực nhận</th><th>Trạng thái</th></tr></thead>
        <tbody>
        @if(isset($data) && count($data) > 0)
            @php
                $prev = null;
            @endphp
            @foreach ($data as $key => $item)
                @php
                    $curr = \App\Library\Helpers::formatDate($item->created_at);
                @endphp
                @if($curr != $prev)
                    <tr>
                        <td colspan="8" class="text-left"><b>Ngày {{$curr}}</b></td>
                    </tr>
                    <tr>
                        <td>{{ formatDateTime($item->created_at) }}</td>
                        <td>
                            {{ str_replace(',','.',number_format($item->price)) }} đ
                        </td>
                        <td>
                            @if(isset($item->real_received_price))
                                {{ str_replace(',','.',number_format($item->real_received_price)) }} đ
                            @else
                                0
                            @endif
                        </td>
                        <td>
                            @if($item->status == 2 )
                                <span class="badge badge-warning" style="position: relative;padding-left: 24px;padding-right: 4px">
                                    <div class="c_loading">
                                        <div class="c_loading-child"></div>
                                    </div>
                                    {{config('module.transfer.status.0')}}</span>
                            @elseif($item->status == 1)
                                <span class="badge badge-primary">{{config('module.transfer.status.2')}}</span>
                            @elseif($item->status == 0)
                                <span class="badge badge-warning" style="position: relative;padding-left: 24px;padding-right: 4px">
                                    <div class="c_loading">
                                        <div class="c_loading-child"></div>
                                    </div>
                                    {{config('module.transfer.status.0')}}</span>
                            @elseif($item->status == 3)
                                <span class="badge badge-danger">{{config('module.transfer.status.3')}}</span>
                            @endif
                        </td>
                    </tr>
                    @php
                        $prev = $curr;
                    @endphp
                @else
                    <tr>
                        <td>{{ formatDateTime($item->created_at) }}</td>
                        <td>
                            {{ str_replace(',','.',number_format($item->price)) }} đ
                        </td>
                        <td>
                            @if(isset($item->real_received_price))
                                {{ str_replace(',','.',number_format($item->real_received_price)) }} đ
                            @else
                                0
                            @endif
                        </td>
                        <td>
                            @if($item->status == 2 )
                                <span class="badge badge-warning">{{config('module.transfer.status.2')}}</span>
                            @elseif($item->status == 1)
                                <span class="badge badge-primary">{{config('module.transfer.status.1')}}</span>
                            @elseif($item->status == 0)
                                <span class="badge badge-warning">{{config('module.transfer.status.0')}}</span>
                            @elseif($item->status == 3)
                                <span class="badge badge-danger">{{config('module.transfer.status.3')}}</span>
                            @endif
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif

        </tbody>
    </table>
</div>

<div class="col-md-12 left-right justify-content-end default-paginate-addpadding default-paginate">

    @if(isset($data) )
        @if($data->total()>1)
            <div class="row marinautooo justify-content-center">
                <div class="col-auto">
                    <div class="data_paginate paginate__v1 paging_bootstrap paginations_custom" style="text-align: center">
                        {{ $data->appends(request()->query())->links('pagination::bootstrap-default-4') }}
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>

@endif

