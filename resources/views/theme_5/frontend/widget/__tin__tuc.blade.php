@if(isset($data))

<section class="news c-pt-32 c-pt-lg-24 c-mb-lg-6">

    <div class="section-header c-mb-24 c-mb-lg-24 justify-content-between">
        <h2 class="section-title">
            <i class="icon-title c-mr-8" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/svg/speaker.svg)"></i>
            {{ $title??'Tin tức' }}

        </h2>
        <a href="/tin-tuc" class="link arr-right">Xem thêm</a>
    </div>
    <!-- Desktop -->
    <div class="swiper js-swiper-news card-list d-none d-lg-block">
        <div class="swiper-wrapper">
            @foreach($data as $key => $item)
                <div class="swiper-slide">
                    <div class="card news">
                        <a href="/tin-tuc/{{ $item->slug }}" class="news-link scale-thumb">
                            <div class="card-body">
                                <div class="news-thumb">
                                    <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="news-thumb-image">
                                </div>
                                <div>
                                    <div class="news-title c-mt-12 c-mb-4 text-limit limit-2 c_max-header-tin-tuc">{{ $item->title }} </div>
                                    <div class="datetime">
                                        {{ formatDateTime($item->created_at) }}
                                    </div>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="navigation slider-next"></div>
        <div class="navigation slider-prev"></div>
    </div>
    <!-- End Desktop -->
    <!-- Mobile -->
    <ul class="news-list d-block d-lg-none">

        @foreach($data as $key => $item)
            <li class="news-item">
                <a href="/tin-tuc/{{ $item->slug }}" class="news-link">
                    <div class="news-article">
                        <div class="article-thumb-wrap">
                            <div class="news-thumb">
                                <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="news-thumb-image">
                            </div>
                        </div>
                        <div class="news-info">
                            <div class="news-title text-limit limit-3 fz-lg-13 lh-lg-20 c-mb-4">{{ $item->title }}</div>
                            <div class="datetime">{{ formatDateTime($item->created_at) }}</div>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach

    </ul>
    <!-- End Mobile -->
</section>
<div class="c-pt-8 border-bottom-destop"></div>
@endif

