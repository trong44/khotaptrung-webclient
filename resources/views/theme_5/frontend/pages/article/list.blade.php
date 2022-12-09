@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/article.js"></script>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/article/main.js"></script>
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/lib/swiper/swiper.min.css">
@endsection

@section('content')
    <div class="c-container container">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/" class="breadcrumb-link">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javascript:void(0)" class="breadcrumb-link">Tin tức</a>
            </li>
        </ul>
        <div class="head-mobile">
            <a href="/service-mobile" class="link-back"></a>

            <h1 class="head-title text-title">Tin tức</h1>

            <a href="/" class="home"></a>
        </div>

        @include('frontend.widget.__slide__news')
     <div class="row">
        <div class="col-12 col-lg-8" id="list-article">
             <div class="card --custom c-mt-24" style="display: none" id="weeky-hot-games">
                <div class="card--header">
                    <div class="card--header__title">
                        Game hot trong tuần
                    </div>
                </div>
                <div class="card--body weeky-hot-game-article">
                    <div>
                        <div class="swiper-container swiper-weekly-hot-games">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" >
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/duong/image_article/image_52.png" alt="">
                                    </a>
                                </div>
                                <div class="swiper-slide" >
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/duong/image_article/image_53.png" alt="">
                                    </a>
                                </div>
                                <div class="swiper-slide" >
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/duong/image_article/image_54.png" alt="">
                                    </a>
                                </div>
                                <div class="swiper-slide" >
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/duong/image_article/image_55.png" alt="">
                                    </a>
                                </div>
                                <div class="swiper-slide" >
                                    <a href="javascript:void(0);">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/duong/image_article/image_56.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card--mobile__title c-pt-16">
            <h4>Tin mới cập nhật</h4>
        </div>
        <div class="row flex-column-reverse " id="card--body__news">
            <div class=" px-0 mt-lg-0" id="list-article" style="max-width: 100%">
                <div class=" --custom p-3" id="new-article-update">
                    @include('frontend.widget.__menu__category__article')

                    <div class="tab-content-title mt-4">
                        <div class="card--body">
                            @if(isset($data) && count($data))
                                @forelse($data as $key=> $item)
                                    <div class="item-article c-mt-16">
                                        <a href="/tin-tuc/{{ $item->slug }}">
                                            <div class="card">
                                                <div class="card-body c-p-16 c-p-lg-8">
                                                    <div class="article-thumb c-mb-lg-0">
                                                        <img onerror="imgError(this)" src="{{ @\App\Library\MediaHelpers::media($item->image)}}" class="article-thumb-image" alt="article-thumbnail">
                                                    </div>
                                                    <div class="article-body" style="flex: 1">
                                                        <div class="article-title text-limit limit-2 limit-lg-3 fz-lg-13 lh-lg-20 c-ml-12">
                                                            {{ @$item->title }}
                                                        </div>
                                                        <div class="article--description d-none d-lg-block c-pt-16 c-ml-12">
                                                            {!! $item->description !!}
                                                        </div>
                                                        <div class="article-info c-mt-16 c-mt-lg-6 c-ml-12">
                                                            <div class="datetime">{{ date('d/m/Y',strtotime($item->created_at)) }}</div>
                                                            <div class="author c-ml-4 bread-word text-limit limit-1">{{ @$item->author->username }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <div class="t-body-2 link-color text-center c-pt-16 c-pb-24">
                                        Bạn chờ chúng tớ cập nhật chúng tớ cập nhật thêm tin nhé ^^.
                                    </div>
                                @endforelse
                            @endif
                        </div>
                    </div>
                    <div class="c-pt-32">
                        @if(isset($data) && count($data))
                            {{ $data->appends(request()->query())->links('pagination::pagination_3_0') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
        @include('frontend.widget.__menu__category__article_theme_5')
     </div>
    </div>
@endsection



