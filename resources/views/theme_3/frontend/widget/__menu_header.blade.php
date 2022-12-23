@if(isset($data))
<ul class="nav header-main-nav d-none d-lg-flex menu-fix-theme">
    @foreach($data as $item => $child_item)
    <li class="nav-item item-about {{ '/'.request()->path() == $child_item->url ? 'active' : ''}} ">
        <a href="{{ $child_item->url }}">
            <div class="d-flex">
                @if($child_item->image_icon)
                    <img src="{{\App\Library\MediaHelpers::media($child_item->image_icon)}}" alt="">
                @else
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/discount-tag.svg" alt="">
                @endif

                <div class="item-about-title">{{ $child_item->title }}</div>
            </div>

        </a>
    </li>

    @endforeach
</ul>
@endif
