@if(empty($data->data))


    <div class="table-responsive">
        <table class="table table-hover table-custom-res">
            <thead><tr><th>Thời gian</th><th>ID</th><th>MGD SMS</th><th>Dịch vụ</th><th>Trị giá</th><th>Thạng thái</th><th>Thao tác</th></tr></thead>
            <tbody>
            @php
                $prev = null;
            @endphp
            @if(isset($data) && count($data) > 0)
                {{--                @dd($data)--}}
                @foreach ($data as $item)

                    @php
                        $curr = \App\Library\Helpers::formatDate($item->created_at);
                    @endphp
                    @if($curr != $prev)
                        <tr>
                            <td colspan="8"><b>Ngày {{$curr}}</b></td>
                        </tr>
                        <tr>
                            <td>{{ formatDateTime($item->created_at) }}</td>
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
                            {{--                        <td>{{ $item->title }}</td>--}}
                            <td>{{ str_replace(',','.',number_format($item->price)) }} đ</td>
                            <td>
                                @if($item->status == 1)
                                    <span class="badge badge-warning">Đang chờ xử lý</span>
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
                                <a href="/dich-vu-da-mua-{{$item->id}}" class="badge badge-info show_chitiet">Chi tiết</a>
                            </td>
                        </tr>
                        @php
                            $prev = $curr;
                        @endphp
                    @else
                        <tr>
                            <td>{{ formatDateTime($item->created_at) }}</td>
                            <td>
                                @if(isset($item->id))
                                    #{{ $item->id }}
                                @endif
                            </td>
                            <td>

                            </td>
                            <td>
                                @if(isset($item->itemconfig_ref))
                                    {{ $item->itemconfig_ref->title }}
                                @endif
                            </td>
                            {{--                        <td>{{ $item->title }}</td>--}}
                            <td>{{ str_replace(',','.',number_format($item->price)) }} đ</td>
                            <td>
                                @if($item->status == 1)
                                    <span class="badge badge-warning">Đang chờ xử lý</span>
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
                                @endif
                            </td>
                            <td>
                                <a href="/dich-vu-da-mua-{{$item->id}}" class="badge badge-info show_chitiet">Chi tiết</a>
                            </td>
                        </tr>
                    @endif

                @endforeach
            @else

            @endif

            </tbody>
        </table>
    </div>

    <div class="col-md-12 left-right justify-content-end paginate__v1 paginate__v1_mobie frontend__panigate">

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

@endif




