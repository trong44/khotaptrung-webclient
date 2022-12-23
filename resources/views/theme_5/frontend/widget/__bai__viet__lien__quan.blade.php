@if(isset($data))
<section class="related-posts">
    <div class="section-header c-mb-16">
        <div class="section-title title-color">Bài viết cùng chủ đề</div>
    </div>
    <div class="section-content">
        <div class="article-list mx-n2">
            @foreach($data as $val)

                @if ($val->id === $data_article->id)
                    @continue
                @endif
            <div class="article-item">
                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                <a href="{{ setting('sys_zip_shop') }}/{{ @$val->slug }}" class="scale-thumb">
                    <div class="card">
                        <div class="card-body c-p-16 c-p-lg-8">
                            <div class="article-thumb c-mb-16 c-mb-lg-0">
                                @if(isset($val->image))
                                <img onerror="imgError(this)" src="{{ @\App\Library\MediaHelpers::media($val->image)}}" class="article-thumb-image lazy" alt="article-thumbnail">
                                @else
                                <img onerror="imgError(this)" class="img-list-nick-category lazy" data-src="/assets/frontend/theme_5/image/images_1/no-image.png"  alt="No-image">
                                @endif
                            </div>
                            <div class="article-body">
                                <div class="article-title text-limit limit-2 limit-lg-3 fz-lg-13 lh-lg-20">
                                    {{ @$val->title }}
                                </div>
                                <div class="article-info c-mt-16 c-mt-lg-4">
                                    <div class="datetime">{{ date('d/m/Y',strtotime($val->created_at)) }}</div>
                                    <div class="author c-ml-4 bread-word text-limit limit-1">{{ @$val->author->username }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @else
                <a href="/tin-tuc/{{ @$val->slug }}" class="scale-thumb">
                        <div class="card">
                            <div class="card-body c-p-16 c-p-lg-8">
                                <div class="article-thumb c-mb-16 c-mb-lg-0">
                                    @if(isset($val->image))
                                        <img onerror="imgError(this)" src="{{ @\App\Library\MediaHelpers::media($val->image)}}" class="article-thumb-image lazy" alt="article-thumbnail">
                                    @else
                                        <img onerror="imgError(this)" class="img-list-nick-category lazy" data-src="/assets/frontend/theme_5/image/images_1/no-image.png"  alt="No-image">
                                    @endif
                                </div>
                                <div class="article-body">
                                    <div class="article-title text-limit limit-2 limit-lg-3 fz-lg-13 lh-lg-20">
                                        {{ @$val->title }}
                                    </div>
                                    <div class="article-info c-mt-16 c-mt-lg-4">
                                        <div class="datetime">{{ date('d/m/Y',strtotime($val->created_at)) }}</div>
                                        <div class="author c-ml-4 bread-word text-limit limit-1">{{ @$val->author->username }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
