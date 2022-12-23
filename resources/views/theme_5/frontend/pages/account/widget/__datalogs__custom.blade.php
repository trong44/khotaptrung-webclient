@php
    $result = array();
    foreach ($data as $element) {
        $result[date('m/y',strtotime($element->published_at))][] = $element;
    }
    $prev = null;
@endphp
@forelse($result as $key => $group)
    @if(date('m-y',strtotime($key)) != $prev)
        <div class="text-title-bold fw-500 c-mb-12">Tháng {{date('m',strtotime($key))}}</div>
        @php
            $prev = date('m-y',strtotime($key));
        @endphp
    @endif

    <ul class="trans-list">
        @forelse($group as $item)
            <li class="trans-item">
                <a href="/lich-su-mua-account-{{ $item->randId }}">
                    <div class="text-left">
                    <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                        @if(isset($item->groups))
                            @foreach($item->groups as $val)
                                @if($val->module == 'acc_category')
                                    {{ $val->title }} (#{{ $item->randId }})
                                @endif
                            @endforeach
                        @endif
                    </span>
                        <span class="t-body-1 link-color">
                        {{date('d/m/Y - H:i', strtotime($item->published_at))}}
                    </span>
                    </div>
                    <div class="text-right">
                        <span class="fw-500 d-block c-mb-0">{{ number_format($item->price, 0, ',', '.') }}đ</span>
                        @switch($item->status)
                            @case(1)
                            @break
                            @case(0)
                            <span class="success-color c-mb-0">Thành công</span>
                            @break
                            @case(2)
                            <span class="warning-color c-mb-0">Đang xử lý</span>
                            @break
                            @case(3)
                            <span class="warning-color c-mb-0">Đang check thông tin</span>
                            @break
                            @case(4)
                            <span class="invalid-color c-mb-0">Sai thông tin</span>
                            @break
                            @case(5)
                            <span class="invalid-color c-mb-0">Đã xóa</span>
                            @break
                        @endswitch
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
