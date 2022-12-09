

<div class="table-responsive">
    <table class="table table-hover table-custom-res table-striped">
        <thead><tr><th>Thời gian</th><th>Nhà mạng</th><th>Mã thẻ</th><th>Serial</th><th>Mệnh giá</th><th>Kết quả</th><th>Thực nhận</th></tr></thead>
        <tbody>
        @if(empty($data->data))
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
                            <td>{{ $item->telecom_key }}</td>
                            <td>
                                @if(isset($arrpin) && count($arrpin))
                                    {{ $arrpin[$key] }}
                                @endif
                            </td>
                            <td>
                                @if(isset($item->serial))
                                    {{ $item->serial }}
                                @endif
                                {{--                            @if(isset($arrserial) && count($arrserial))--}}
                                {{--                            {{ $arrserial[$key] }}--}}
                                {{--                            @endif--}}
                            </td>
                            <td>

                                {{ str_replace(',','.',number_format($item->declare_amount)) }}
                            </td>
                            <td>
                                @if($item->status == 1)
                                    <span class="badge badge-primary">{{config('module.charge.status.1')}}</span>
                                @elseif($item->status == 0)
                                    <span class="badge badge-danger">{{config('module.charge.status.0')}}</span>
                                @elseif($item->status == 3)
                                    <span class="badge badge-danger">{{config('module.charge.status.3')}}</span>
                                @elseif($item->status == 2)
                                    <span class="badge badge-warning">{{config('module.charge.status.2')}}</span>
                                @elseif($item->status == 999)
                                    <span class="badge badge-danger">{{config('module.charge.status.999')}}</span>
                                @elseif($item->status == -999)
                                    <span class="badge badge-danger">{{config('module.charge.status.-999')}}</span>
                                @elseif($item->status == -1)
                                    <span class="badge badge-danger">{{config('module.charge.status.-1')}}</span>
                                @endif
                            </td>
                            <td>
                                @if(isset($item->real_received_amount))
                                    {{ str_replace(',','.',number_format($item->real_received_amount)) }} đ
                                @else
                                    0
                                @endif
                            </td>
                        </tr>
                        @php
                            $prev = $curr;
                        @endphp
                    @else
                        <tr>
                            <td>{{ formatDateTime($item->created_at) }}</td>
                            <td>{{ $item->telecom_key }}</td>
                            <td>
                                @if(isset($arrpin) && count($arrpin))
                                    {{ $arrpin[$key] }}
                                @endif
                            </td>
                            <td>
                                @if(isset($item->serial))
                                    {{ $item->serial }}
                                @endif
                                {{--                            @if(isset($arrserial) && count($arrserial))--}}
                                {{--                            {{ $arrserial[$key] }}--}}
                                {{--                            @endif--}}
                            </td>
                            <td>{{ str_replace(',','.',number_format($item->declare_amount)) }}</td>
                            <td>
                                @if($item->status == 1)
                                    <span class="badge badge-primary">{{config('module.charge.status.1')}}</span>
                                @elseif($item->status == 0)
                                    <span class="badge badge-danger">{{config('module.charge.status.0')}}</span>
                                @elseif($item->status == 3)
                                    <span class="badge badge-danger">{{config('module.charge.status.3')}}</span>
                                @elseif($item->status == 2)
                                    <span class="badge badge-warning">{{config('module.charge.status.2')}}</span>
                                @elseif($item->status == 999)
                                    <span class="badge badge-danger">{{config('module.charge.status.999')}}</span>
                                @elseif($item->status == -999)
                                    <span class="badge badge-danger">{{config('module.charge.status.-999')}}</span>
                                @elseif($item->status == -1)
                                    <span class="badge badge-danger">{{config('module.charge.status.-1')}}</span>
                                @endif
                            </td>
                            <td>
                                @if(isset($item->real_received_amount))
                                    {{ str_replace(',','.',number_format($item->real_received_amount)) }} đ
                                @else
                                    0
                                @endif
                            </td>
                        </tr>
                    @endif

                @endforeach
                {{--            @else--}}
                {{--                    <tr>--}}
                {{--                        <td colspan="8">--}}
                {{--                            <span style="color: red;font-size: 16px;">Không có dữ liệu!</span>--}}
                {{--                        </td>--}}
                {{--                    </tr>--}}
            @endif
        @endif
        </tbody>

    </table>
</div>

<div class="col-md-12 left-right justify-content-end paginate__v1 paginate__v1__ls paginate__v1_mobie frontend__panigate mt-3">
    @if(isset($data))
        @if($data->total()>1)
            <div class="row marinautooo paginate__history paginate__history__fix justify-content-center">
                <div class="col-auto paginate__category__col">
                    <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                        {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>


