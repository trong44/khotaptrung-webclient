@if(isset($data))
    <ul class="m-nav m-nav--skin-light">

        {{--    <li class="m-nav__section m--hide">--}}
        {{--        <span class="m-nav__section-text">Section</span>--}}
        {{--    </li>--}}
        @foreach($data as $item => $child_item)
            <li class="m-nav__item">
                <a href="{{ $child_item->url }}" class="m-nav__link p-0">
                    {{--            @if($child_item->image_icon)--}}
                    {{--                <img src="{{\App\Library\MediaHelpers::media($child_item->image_icon)}}" alt="">--}}
                    {{--            @endif--}}
                    <span class="m-nav__link-title">
                <span class="m-nav__link-wrap">
                    <div class="icon-sidebar" style="--path:url({{ $child_item->image_icon??'' }})"></div>
                    <span class="m-nav__link-text">{{ $child_item->title }}</span>
                </span>
            </span>
                </a>
            </li>
        @endforeach

        <li class="m-nav__item account_logout">

        </li>
    </ul>
@endif
