@if(isset($data_service) && count($data_service) > 0)
    <div class="sub-article-block">

        <div class="sub-article-block-header d-flex justify-content-between align-items-center c-px-16 c-py-12">
            <h2 class="fw-700 fz-24 lh-32">
                Dịch vụ liên quan
            </h2>
            <a href="/dich-vu" class="link arr-right">Xem tất cả</a>
        </div>

        @foreach($data_service as $key => $val)
            @if($key >= 5)
                @break
            @endif
            <div class="sub-article c-px-16">
                <div class="row">
                    <div class="col-6 sub-article--thumbnail-container">
                        <div class="sub-article--thumbnail">
                            <a href="/dich-vu/{{ $val->slug }}">
                                <img onerror="imgError(this)"  data-src="{{\App\Library\MediaHelpers::media($val->image)}}" alt="" class="sub-article--thumbnail__image lazy">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 sub-article--info">
                        <a href="/dich-vu/{{ $val->slug }}" class="sub-article--title__link">
                            {{ $val->title }}
                        </a>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
@endif