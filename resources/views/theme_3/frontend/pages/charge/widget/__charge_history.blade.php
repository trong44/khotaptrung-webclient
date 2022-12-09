@if(empty($data->data))

    <div class="col-md-12 left-right">
        <table class="table table-striped table-hover table-logs" id="table-default">
            <thead>
            <tr>
                <th>Thời gian</th>
                <th>Kiểu nạp</th>
                <th>Nhà mạng</th>
                <th>Mã thẻ/Serial</th>
                <th class="text-right">Mệnh giá</th>
                <th class="text-right">Thực nhận</th>
                <th class="text-center">Trạng thái</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($data) && count($data) > 0)
                {{--@php
                    $prev = null;
                @endphp--}}
                @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ date('d/m/Y',strtotime($item->created_at)) }}<br>{{ date('H:i',strtotime($item->created_at)) }}</td>
                            <td>Nạp tự động</td>

                            <td>{{ $item->telecom_key }}</td>
                            <td>
                                <p>
                                    MT: @if(isset($arrpin) && count($arrpin))
                                        {{ $arrpin[$key] }}
                                        @endif
                                </p>
                                <p>
                                    SR: @if(isset($item->serial))
                                        {{ $item->serial }}
                                        @endif
                                </p>
                            </td>

                            <td class="text-right">
                                {{ str_replace(',','.',number_format($item->declare_amount)) }} đ
                            </td>
                            <td class="text-right">
                                @if(isset($item->real_received_amount))
                                    {{ str_replace(',','.',number_format($item->real_received_amount)) }} đ
                                @else
                                    0
                                @endif
                            </td>
                            <td class="text-center">
                                @if($item->status == 1)
                                    <span class="badge badge-primary">{{config('module.charge.status.1')}}</span>
                                @elseif($item->status == 0)
                                    <span class="badge badge-danger">{{config('module.charge.status.0')}}</span>
                                @elseif($item->status == 3)
                                    <span class="badge badge-danger">{{config('module.charge.status.3')}}</span>
                                @elseif($item->status == 2)
                                    <span class="badge badge-warning" style="position: relative;padding-left: 24px;padding-right: 4px">
                                    <div class="c_loading">
                                        <div class="c_loading-child"></div>
                                    </div>
                                    {{config('module.charge.status.2')}}</span>
                                @elseif($item->status == 999)
                                    <span class="badge badge-danger">{{config('module.charge.status.999')}}</span>
                                @elseif($item->status == -999)
                                    <span class="badge badge-danger">{{config('module.charge.status.-999')}}</span>
                                @elseif($item->status == -1)
                                    <span class="badge badge-danger">{{config('module.charge.status.-1')}}</span>
                                @endif
                            </td>
                        </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>


    <div class="col-md-12 left-right justify-content-end default-paginate-addpadding default-paginate">

        @if(isset($data))
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
