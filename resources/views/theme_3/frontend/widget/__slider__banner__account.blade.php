@if(isset($data))
<section class="media-web">
    <div class="container container-fix banner-container-ct">
        @foreach($data as $key => $item)
            @if($key == 0)
                <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
            @endif
        @endforeach
    </div>
</section>
{{--<div class="col-md-12 left-right media-mobile">--}}
{{--    <div class="row marginauto banner-container-ct">--}}
{{--        <div class="col-md-12 text-left left-right">--}}
{{--            @foreach($data as $key => $item)--}}
{{--                @if($key == 0)--}}
{{--                    <img class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endif
