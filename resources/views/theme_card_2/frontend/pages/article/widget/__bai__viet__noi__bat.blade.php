
@if(isset($data))
<div class="relate-content">
    <h2>Bài viết nổi bật</h2>
    <hr class="lines">
    <div class="content-relate-item">
        @foreach($data as $item)
        <div class="row mb-3">
            <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                <div class="item-blog-img">
                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                    <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}">
                        @if(isset($item->image))
                        <img  src="{{\App\Library\MediaHelpers::media($item->image)}}" class="img-fluid swiper-lazy item_play_dif_slide_img_main">
                        @else
                            <img src="/assets/frontend/{{theme('')->theme_key}}/images/fff.jpg" alt=""  class="img-fluid swiper-lazy item_play_dif_slide_img_main">
                        @endif
                    </a>
                    @else
                        <a href="/tin-tuc/{{ $item->slug }}">
                            @if(isset($item->image))
                                <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt=""  class="img-fluid swiper-lazy item_play_dif_slide_img_main">
                            @else
                                <img src="/assets/frontend/{{theme('')->theme_key}}/images/fff.jpg" alt=""  class="img-fluid swiper-lazy item_play_dif_slide_img_main">
                            @endif
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 col-7">
                <div class="item-blog-content">
                    <h3>
                        <a href="javascript:void(0)">{{ $item->title }}</a>
                    </h3>
                    <p class="mt-1">{{ formatDateTime($item->created_at) }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="tag-content mt-5">
        <div class="content-blog-item">
            <h3>Danh mục:</h3>
            <hr class="lines">
        </div>
        <div class="tag-content-item">
            <ul class="tags">
                <li><a href=" https://muathegarena.com/blog/huong-dan " class="tag">Hướng dẫn </a></li>
                <li><a href=" https://muathegarena.com/blog/tin-tuc " class="tag">Tin Tức </a></li>
            </ul>
        </div>
    </div>
</div>
@endif
