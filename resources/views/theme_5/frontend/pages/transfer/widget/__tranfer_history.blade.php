
@if(empty($data->data))

<div class="col-md-12 left-right">
    <table class="table table-striped table-hover table-logs" id="table-default">
        <thead><tr><th>Thời gian</th><th>Chủ tài khoản</th><th>Ngân hàng</th><th>Số tài khoản</th><th>Tiền</th><th>Thực nhận</th><th>Trạng thái</th></tr></thead>
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
                        <td>HOANG NGOC KY</td>

                        <td>Techcombank</td>
                        <td>
                            19032218296688
                        </td>

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
                                <span class="badge badge-warning">{{config('module.tranfer.status.2')}}</span>
                            @elseif($item->status == 1)
                                <span class="badge badge-primary">{{config('module.tranfer.status.1')}}</span>
                            @elseif($item->status == 0)
                                <span class="badge badge-warning">{{config('module.tranfer.status.0')}}</span>
                            @elseif($item->status == 3)
                                <span class="badge badge-danger">{{config('module.tranfer.status.3')}}</span>
                            @endif
                        </td>
                    </tr>
                    @php
                        $prev = $curr;
                    @endphp
                @else
                    <tr>
                        <td>{{ formatDateTime($item->created_at) }}</td>
                        <td>HOANG NGOC KY</td>

                        <td>Techcombank</td>
                        <td>
                            19032218296688
                        </td>

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
                                <span class="badge badge-warning">{{config('module.tranfer.status.2')}}</span>
                            @elseif($item->status == 1)
                                <span class="badge badge-primary">{{config('module.tranfer.status.1')}}</span>
                            @elseif($item->status == 0)
                                <span class="badge badge-warning">{{config('module.tranfer.status.0')}}</span>
                            @elseif($item->status == 3)
                                <span class="badge badge-danger">{{config('module.tranfer.status.3')}}</span>
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

