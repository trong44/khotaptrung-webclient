@if(isset($data))
    <ul class="list-service">
        @foreach($data as $item)

        <li class="item-service">
            <a   @if($item->target == 1) target="_blank" href="{{ $item->url }}"  @elseif($item->target == 3) @if(!App\Library\AuthCustom::check()) onclick="openLoginModal();" href="#" @else href="{{ $item->url }}"   @endif @else href="{{ $item->url }}"   @endif>
                @if($item->image_icon)
                    <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                @else
                    <img class="lazy" data-src="/assets/frontend/{{theme('')->theme_key}}/image/service1.png" alt="">
                @endif
                <div>{{ $item->title }}</div>
            </a>

        </li>
        @endforeach
    </ul>



@endif
