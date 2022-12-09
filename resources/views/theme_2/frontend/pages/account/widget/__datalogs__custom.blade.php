@if(empty($data->data))
    <div class="table-responsive">
        <table class="table table-hover table-custom-res">
            <thead><tr><th>Thời gian</th><th>ID</th><th>Game</th><th>Tài khoản</th><th>Trị giá</th><th>Trạng thái</th><th>Thao tác</th></tr></thead>
            <tbody>
                @php
                    $result = array();
                    foreach ($data as $element) {
                        $result[date('m/y',strtotime($element->published_at))][] = $element;
                    }
                    $prev = null;
                @endphp
                @forelse($result as $key => $group)
                    @if(date('m-y',strtotime($key)) != $prev)
                        <tr>
                            <td colspan="8"><b>Tháng {{date('m',strtotime($key))}}</b></td>
                        </tr>
                        @php
                            $prev = date('m-y',strtotime($key));
                        @endphp
                    @endif

                    @forelse($group as $item)
                        <tr>
                            <td>{{ formatDateTime($item->published_at) }}</td>
                            <td>
                                @if(isset($item->randId))
                                    #{{ $item->randId }}
                                @endif
                            </td>
                            <td>
                                @if(isset($item->groups))
                                    @foreach($item->groups as $val)
                                        @if($val->module == 'acc_category')
                                            {{ $val->title }}
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>
                                {{ str_replace(',','.',number_format($item->price)) }} đ
                            </td>
                            <td>
                                @if($item->status == 1)
                                @elseif($item->status == 2)
                                    <span class="badge badge-warning">Chờ xử lý</span>
                                @elseif($item->status == 3)
                                    <span class="badge badge-warning">Đang check thông tin</span>
                                @elseif($item->status == 4)
                                    <span class="badge badge-danger">Sai thông tin</span>
                                @elseif($item->status == 5)
                                    <span class="badge badge-danger">Đã xoá</span>
                                @elseif($item->status == 0)
                                    <span class="badge badge-success">Thành công</span>
                                @endif
                            </td>
                            <td>
                                @if($item->status == 0)
                                    <a class="badge badge-info show_chitiet" href="/lich-su-mua-account-{{ $item->randId }}">Chi tiết</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse

                @empty
                    <ul class="trans-list">
                        <li class="trans-item" style="height: auto">
                            <a href="javascript:void(0)">
                                <div class="text-left">
                                    <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                                        Không có dữ liệu
                                    </span>
                                </div>
                            </a>
                        </li>
                    </ul>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="col-md-12 left-right justify-content-end paginate__v1 paginate__v1_mobie frontend__panigate">

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
    </div>

@endif
