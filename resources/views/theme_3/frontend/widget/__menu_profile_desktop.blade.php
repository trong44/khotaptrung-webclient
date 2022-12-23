@if(isset($data))
    @foreach($data??[] as $item)
        @if ($item->parent_id == 0)
<div class="account-menu_nav mb-fix-16">
    <div class="account-menu_parent mb-fix-12">
{{--        <img src="/assets/frontend/{{theme('')->theme_key}}/image/account_info.png" alt=""> --}}
        <img src="{{\App\Library\MediaHelpers::media($item->image_icon??'' )}}" alt=""> {{$item->title}}
    </div>
    @foreach ($data as $key_child => $child_item)
        @if ($item->id == $child_item->parent_id)
            <div class="account-menu_child pt-fix-4 pb-fix-4">
                <a href="{{$child_item->url?$child_item->url:$child_item->slug}}">
                    <div class="pr-fix-8"><img src="/assets/frontend/{{theme('')->theme_key}}/image/arrow-right.png" alt=""> </div> <span> {{$child_item->title}}</span>
                </a>

            </div>

        @endif
    @endforeach
</div>
        @endif
    @endforeach
@endif
