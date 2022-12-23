
@if(empty($data->data))

    <div class="table-responsive">
        <table class="table table-hover table-custom-res">
            <thead><tr><th>Thời gian</th><th>ID</th><th>Tài khoản </th><th>Giao dịch</th><th>Số tiền</th><th>Số dư cuối</th><th>Nội dung</th><th>Trạng thái</th></tr></thead>
            <tbody>

            @php
                $prev = null;
            @endphp
            @if(isset($data) && count($data) > 0)
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
                            <td>#{{$item->id}}</td>
                            <td> {{ $item->user->username }} </td>
                            <td>
                                @foreach($config as $ils => $valls)
                                    @if($ils == $item->trade_type)
                                        {{ $valls }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @if($item->is_add==1)
                                    <span class="c-font-bold text-info">+{{ str_replace(',','.',number_format($item->amount)) }} đ</span>
                                @elseif($item->is_add==0)
                                    <span class="c-font-bold text-danger">-{{ str_replace(',','.',number_format($item->amount)) }} đ</span>
                                @endif
                            </td>
                            <td>{{ str_replace(',','.',number_format($item->last_balance)) }}đ</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                @foreach($status as $istls => $valstls)
                                    @if($istls == $item->status)
                                        @if($item->status == 1)
                                            <span class="badge badge-success">{{ $valstls }}</span>
                                        @elseif($item->status == 0)
                                            <span class="badge badge-danger">{{ $valstls }}</span>
                                        @elseif($item->status == 2)
                                            <span class="badge badge-warning">{{ $valstls }}</span>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        @php
                            $prev = $curr;
                        @endphp
                    @else
                        <tr>
                            <td>{{ formatDateTime($item->created_at) }}</td>
                            <td>#{{ $item->id }}</td>
                            <td> {{ $item->user->username }} </td>
                            <td>
                                @foreach($config as $ils => $valls)
                                    @if($ils == $item->trade_type)
                                        {{ $valls }}
                                    @endif
                                @endforeach
                            </td>
                            <td>

                                @if($item->is_add==1)
                                    <span class="c-font-bold text-info">+{{ str_replace(',','.',number_format($item->amount))}} đ</span>
                                @elseif($item->is_add==0)
                                    <span class="c-font-bold text-danger">-{{ str_replace(',','.',number_format($item->amount)) }} đ</span>
                                @endif
                            </td>
                            <td>{{ str_replace(',','.',number_format($item->last_balance)) }} đ</td>
                            <td>{{$item->description}}</td>
                            <td>
                                @foreach($status as $istls => $valstls)
                                    @if($istls == $item->status)
                                        @if($item->status == 1)
                                            <span class="badge badge-success">{{ $valstls }}</span>
                                        @elseif($item->status == 0)
                                            <span class="badge badge-danger">{{ $valstls }}</span>
                                        @elseif($item->status == 2)
                                            <span class="badge badge-warning">{{ $valstls }}</span>
                                        @endif
                                    @endif
                                @endforeach
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

    <script>
        function myFunction() {
            var copyText = document.getElementById("password");
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            navigator.clipboard.writeText(copyText.value);
        }
    </script>
@endif
