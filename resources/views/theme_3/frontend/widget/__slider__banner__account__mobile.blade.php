@if(isset($data))
    <div class="col-md-12 left-right media-mobile">
        <div class="row marginauto banner-container-ct">
            <div class="col-md-12 text-left left-right">
                @foreach($data as $key => $item)
                    @if($key == 0)
                        <img onerror="imgError(this)" class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif

