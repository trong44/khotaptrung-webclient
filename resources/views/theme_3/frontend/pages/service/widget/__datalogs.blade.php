@if(empty($data->data))

    <div class="col-md-12 left-right">
        <table class="table table-striped table-hover table-logs" id="table-default">
            <thead><tr><th>Thời gian</th><th>ID</th><th>Mã GD SMS</th><th>Dịch vụ</th><th class="text-right">Trị giá</th><th>Trạng thái</th><th class="text-center">Thao tác</th></tr></thead>
            <tbody>
            {{--@php
                $prev = null;
            @endphp--}}
            @if(isset($data) && count($data) > 0)
                @foreach ($data as $item)
                    <tr>
                        <td>{{ date('d/m/Y',strtotime($item->created_at)) }}<br>{{ date('H:i:s',strtotime($item->created_at)) }}</td>
                        <td>
                            @if(isset($item->id))
                                #{{ $item->id }}
                            @endif
                        </td>

                        <td>
                            @if(isset($item->tranid))
                                {{$item->tranid}}
                            @endif
                        </td>
                        <td>
                            @if(isset($item->itemconfig_ref))
                                {{ $item->itemconfig_ref->title }}
                            @endif
                        </td>
                        {{--                        <td>--}}
                        {{--                            Liên Quân--}}
                        {{--                        </td>--}}
                        <td class="text-right">
                            {{ str_replace(',','.',number_format($item->price)) }} đ
                        </td>
                        <td>
                            @if($item->status == 1)

                                <span class="badge badge-warning" style="position: relative;padding-left: 24px;padding-right: 4px">
                                    <div class="c_loading">
                                        <div class="c_loading-child"></div>
                                    </div>
                                    Đang chờ xử lý</span>
                            @elseif($item->status == 2)

                                <span class="badge badge-warning">Đang thực hiện</span>
                            @elseif($item->status == 3)
                                <span class="badge badge-danger">Từ chối</span>
                            @elseif($item->status == 4)
                                <span class="badge badge-success">Hoàn tất</span>
                            @elseif($item->status == 5)
                                <span class="badge badge-dark">Thất bại</span>
                            @elseif($item->status == 0)
                                <span class="badge badge-danger">Đã hủy</span>
                            @elseif($item->status == 7)
                                <span class="badge badge-dark">Kết nối với NCC thất bại</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="/dich-vu-da-mua-{{$item->id}}" class="btn -secondary action-table openHoanTien m-auto">Chi tiết</a>
                                <a href="/inbox/send/{{$item->id}}" class="btn -secondary action-table ml-2  openTTTraGop m-auto">Nhắn tin</a>
                            </div>
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




