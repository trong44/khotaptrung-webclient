
@if(isset($data))
    @foreach($data as $key => $item)
        @if($key == 0)
            @if(isset($item->url))
            <a href="{{ $item->url }}">
                <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
            </a>
            @else
                <a href="javascript:void(0);">
                    <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                </a>
            @endif
        @endif
    @endforeach
@else
    <a href="javascript:void(0);">
        <img src="/assets/frontend/theme_3/image/image_60.png" alt="">
    </a>
@endif
