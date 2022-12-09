@foreach($data??[] as $key => $item)
    @if($key == 0)
        <div class="slider-banner">
            <div class="item">
                <a href="/" alt="Banner">
                    <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="Banner">
                </a>
            </div>
        </div>
    @endif
@endforeach







