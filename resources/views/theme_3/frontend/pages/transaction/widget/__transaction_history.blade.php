@if(empty($data->data))

    <table class="table table-striped table-hover table-logs" id="table-default">
        <thead><tr><th>Thời gian</th><th>ID</th><th>Tài khoản</th><th>Giao dịch</th><th class="text-right">Số tiền</th><th class="text-right">Số dư cuối</th><th>Nội dung</th><th>Trạng thái</th></tr></thead>
        <tbody>
        {{--@php
            $prev = null;
        @endphp--}}
        @if(isset($data) && count($data) > 0)
            @foreach ($data as $item)
                <tr>
                    <td>{{ date('d/m/Y',strtotime($item->created_at)) }}<br>{{ date('H:i:s',strtotime($item->created_at)) }}</td>
                    <td>#{{$item->id}}</td>

                    <td>{{ $item->user->username }}</td>
                    <td>
                        @foreach($config as $ils => $valls)
                            @if($ils == $item->trade_type)
                                {{ $valls }}
                            @endif
                        @endforeach
                    </td>

                    <td class="text-right">
                        @if($item->is_add==1)
                            <span class="c-font-bold text-info" style="white-space: nowrap">+{{ str_replace(',','.',number_format($item->amount)) }} đ</span>
                        @elseif($item->is_add==0)
                            <span class="c-font-bold text-danger" style="white-space: nowrap">-{{ str_replace(',','.',number_format($item->amount)) }} đ</span>
                        @endif
                    </td>
                    <td class="text-right">
                        {{ str_replace(',','.',number_format($item->last_balance)) }}đ
                    </td>
                    <td class="bread-word">
                        {{ $item->description }}
                    </td>
                    <td>
                        @foreach($status as $istls => $valstls)
                            @if($istls == $item->status)
                                @if($item->status == 1)
                                    <span class="badge badge-success">{{ $valstls }}</span>
                                @elseif($item->status == 0)
                                    <span class="badge badge-danger">{{ $valstls }}</span>
                                @elseif($item->status == 2)
                                    <span class="badge badge-warning" style="position: relative;padding-left: 24px;padding-right: 4px">
                                    <div class="c_loading">
                                        <div class="c_loading-child"></div>
                                    </div>
                                    {{ $valstls }}</span>
                                @endif
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        @else

        @endif

        </tbody>
    </table>


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

    <script>
        function myFunction() {
            var copyText = document.getElementById("password");
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            navigator.clipboard.writeText(copyText.value);
        }
        $(document).ready(function (e) {

        })

    </script>
@endif
