@php
    $result = array();
    foreach ($data as $element) {
        $result[date('m/y',strtotime($element->created_at))][] = $element;
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
                <a href="/the-cao-da-mua-{{ $item->id }}">
                    <div class="text-left">
                    <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                        @if(isset($item->params))
                            @php
                                $telecome =\App\Library\HelpersDecode::DecodeJson('telecom',$item->params);
                            @endphp
                            {{ $telecome }} (#{{ $item->id }})
                        @endif
                    </span>
                        <span class="t-body-1 link-color">
                            @if($item->created_at)
                                {{date('d/m/Y - H:i', strtotime($item->created_at))}}
                            @endif
                    </span>
                    </div>
                    <div class="text-right">
                        <span class="fw-500 d-block c-mb-0">{{ number_format($item->real_received_price, 0, ',', '.') }}đ</span>
                        @switch($item->status)
                            @case(1)
                            <span class="success-color c-mb-0">Thành công</span>
                            @break
                            @case(0)
                            <span class="invalid-color c-mb-0">Thất bại</span>
                            @break
                            @case(3)
                            <span class="invalid-color c-mb-0">Đã hủy</span>
                            @break
                            @case(2)
                            <span class="warning-color c-mb-0">Đang chờ xử lý</span>
                            @break
                            @case(4)
                            <span class="invalid-color c-mb-0">Lỗi gọi nhà cung cấp</span>
                            @break
                            @case(5)
                            <span class="invalid-color c-mb-0">Lỗi hệ thống</span>
                            @break
                        @endswitch
                    </div>
                </a>
            </li>
        @empty
        @endforelse
    </ul>
@empty
@endforelse

