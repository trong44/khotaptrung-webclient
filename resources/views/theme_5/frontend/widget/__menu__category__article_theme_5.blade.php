
<div class="col-lg-4 d-none d-lg-block">
    @if(isset($data_detail) && count($data_detail) > 0)
        @foreach($data_detail as $val)
            @if(isset($val->data->data) && count($val->data->data) > 0)
                <div class="sub-article-block">
                    
                    <div class="sub-article-block-header d-flex justify-content-between align-items-center c-px-16 c-py-12">
                        <h2 class="fw-700 fz-24 lh-32">
                            {{ $val->categoryarticle->title }}
                        </h2>
                        <a href="/tin-tuc/{{ $val->categoryarticle->slug }}" class="link arr-right">Xem tất cả</a>
                    </div>

                    @foreach($val->data->data as $key=> $item)
                        @if($key >= 3)
                            @break
                        @endif
                        <div class="sub-article c-px-16">
                            <div class="row">
                                <div class="col-6 sub-article--thumbnail-container">
                                    <div class="sub-article--thumbnail">
                                        <a href="/tin-tuc/{{ $item->slug }}">
                                            <img onerror="imgError(this)"  data-src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="sub-article--thumbnail__image lazy">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 sub-article--info">
                                    <a href="/tin-tuc/{{ $item->slug }}" class="sub-article--title__link">
                                        {{ $item->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif
        @endforeach
    @endif
</div>
