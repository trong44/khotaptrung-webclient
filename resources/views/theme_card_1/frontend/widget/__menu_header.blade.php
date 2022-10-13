@if(isset($data))
<ul class="mini_menu">
    <li class="money_sum">  </li>
    @foreach($data as $item => $child_item)
    <li>
        <a rel="nofollow" href="{{ $child_item->url }}">
            @if($child_item->image_icon)
                <img src="{{\App\Library\MediaHelpers::media($child_item->image_icon)}}" alt="">

            @endif
                {{ $child_item->title }}
        </a>
    </li>
    @endforeach
    <li class="account_logout"></li>
</ul>
@endif
