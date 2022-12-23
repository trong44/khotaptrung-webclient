@foreach($data??[] as $item)
    <div class="swiper-slide" >
        <a href="">
            <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt=""  class="img-fluid swiper-lazy w-100">
        </a>
    </div>
@endforeach





