@if($paginatedItems)
    @php
        $results = array();
        foreach ($data as $element) {
            $results[date('m/y',strtotime($element->created_at))][] = $element;
        }
        $prev = null;
    @endphp
@endif
<div class="history-content">
    @if($paginatedItems)
        @forelse($results as $key => $data)
            @if(date('m-y',strtotime($key)) != $prev)
                <div class="text-title-bold fw-500 c-mb-12">Tháng {{date('m',strtotime($key))}}</div>
                @php
                    $prev = date('m-y',strtotime($key));
                @endphp
            @endif

            <ul class="trans-list">
                @forelse($data as $item)
                    <li class="trans-item">
                        <a href="javascript:void(0)">
                            <div class="text-left">
                                <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                                    {{$item->content}}
                                </span>
                                <span class="t-body-1 link-color">
                                    {{date('d/m/Y - H:i', strtotime($item->created_at))}}
                                </span>
                            </div>
                            <div class="text-right">
                                <span class="fw-500 d-block c-mb-0">{{$item->price}}</span>
                                @if($item->payment_type == 13 || $item->payment_type == 12 || $item->payment_type == 11 || $item->payment_type == 14)
                                    @if ($item->status == 0)
                                        <span class="invalid-color c-mb-0">Giao dịch thất bại</span>
                                    @elseif($item->status == 1 )
                                        <span class="warning-color c-mb-0">Chờ xử lý</span>
                                    @elseif($item->status == 2 )
                                        <span class="warning-color c-mb-0">Chờ xử lý</span>
                                    @elseif($item->status == 4 )
                                        <span class="success-color c-mb-0">Hoàn thành</span>
                                    @endif
                                @else
                                    @switch($item->status)
                                        @case(0)
                                        <span class="warning-color c-mb-0">{{config('constants.withdraw_status.0')}}</span>
                                        @break
                                        @case(1)
                                        <span class="success-color c-mb-0">{{config('constants.withdraw_status.1')}}</span>
                                        @break
                                        @case(2)
                                        <span class="warning-color c-mb-0">{{config('constants.withdraw_status.2')}}</span>
                                        @break
                                        @case(3)
                                        <span class="invalid-color c-mb-0">{{config('constants.withdraw_status.3')}}</span>
                                        @break
                                    @endswitch
                                @endif
                            </div>
                        </a>
                    </li>
                @empty
                @endforelse
            </ul>
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
    @else
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
    @endif
    @if(isset($paginatedItems) && count($paginatedItems))
        <div class="c-pt-24 w-100">
            {{ $paginatedItems->appends(request()->query())->links('pagination::pagination_3_0') }}
        </div>
    @endif
</div>
