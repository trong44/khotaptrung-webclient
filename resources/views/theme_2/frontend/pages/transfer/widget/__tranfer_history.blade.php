@if(empty($data->data))

    <div class="table-responsive">
        <table cellspacing="0" cellpadding="0" class="table table-hover">
            <thead>
            <tr>
                <th>Thời gian</th>
                <th>Số tiền</th>
                <th>Thực nhận</th>
                <th>Trạng thái</th>
            </tr>
            </thead>
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
                            <td colspan="8"><b>Ngày {{$curr}}</b></td>
                        </tr>
                        <tr>
                            <td>{{ formatDateTime($item->created_at) }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ formatPrice((int)$item->price) }} đ</td>
                            <td>
                                @if($item->status == 2 )
                                    <b class="text-warning">{{config('module.transfer.status.2')}}</b>
                                @elseif($item->status == 1)
                                    <b class="text-info">{{config('module.transfer.status.1')}}</b>
                                @elseif($item->status == 0)
                                    <b class="text-warning">{{config('module.transfer.status.0')}}</b>
                                @elseif($item->status == 3)
                                    <b class="text-danger">{{config('module.transfer.status.3')}}</b>
                                @endif
                            </td>
                        </tr>
                        @php
                            $prev = $curr;
                        @endphp
                    @else
                        <tr>
                            <td>{{ formatDateTime($item->created_at) }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ formatPrice((int)$item->price) }} đ</td>
                            <td>
                                @if($item->status == 2 )
                                    <b class="text-warning">{{config('module.transfer.status.2')}}</b>
                                @elseif($item->status == 1)
                                    <b class="text-info">{{config('module.transfer.status.1')}}</b>
                                @elseif($item->status == 0)
                                    <b class="text-warning">{{config('module.transfer.status.0')}}</b>
                                @elseif($item->status == 3)
                                    <b class="text-danger">{{config('module.transfer.status.3')}}</b>
                                @endif
                            </td>
                        </tr>
                    @endif

                @endforeach

            @else
                <tr class="data-card">
                    <td colspan="8">
                        <span style="color: red;font-size: 16px;">Không có dữ liệu!</span>
                    </td>
                </tr>
            @endif

            </tbody>
        </table>
    </div>

@endif
<div class="row">
    <div class="col-md-12 left-right justify-content-end">
        <div class="d-flex justify-content-between align-items-md-center flex-column flex-md-row mt-2  pt-3">
            <div class="text-secondary mb-2">
                @if(isset($total) && isset($per_page))
                    Hiển thị {{ $per_page }} / {{ $total }} kết quả
                @endif
            </div>


            <nav class="page-pagination mb-2 paginate__v1_index_transfer paginate__v1_mobie frontend__panigate">
                @if(isset($data))
                    @if($data->total()>1)
                        <div class="row marinautooo paginate__history paginate__history__fix justify-content-end">
                            <div class="col-auto paginate__category__col">
                                <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                    {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </nav>
        </div>
    </div>
</div>



