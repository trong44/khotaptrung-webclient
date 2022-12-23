@if(isset($data) && count($data) > 0)
<section class="outstanding-service c-pb-12 c-pb-lg-6 c-pb-12 c-pb-lg-6">
    <h2 class="section-title c-mb-24 c-mb-lg-8 fz-lg-20 lh-lg-24">{{ $title??'' }}</h2>
    <div class="row mx-n2">
        @foreach($data as $item)
        <div class="col-6 col-lg-2 c-px-8 c-mb-lg-12">
            @if($item->target == 1)
                <div class="service-item scale-thumb">
                    <div class="service-thumb">
                        <a target="_blank" href="{{ $item->url }}">
                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image_banner)}}" alt="" class="service-thumb-image">
                        </a>
                    </div>
                    <div class="service-name">
                        <a target="_blank" href="{{ $item->url }}">
                            <span class="service-name-text fz-lg-13">
                                {{ $item->title }}
                            </span>
                        </a>
                    </div>
                </div>
            @else
                <div class="service-item scale-thumb">
                    <div class="service-thumb">
                        <a href="{{ $item->url }}">
                            <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image_banner)}}" alt="" class="service-thumb-image">
                        </a>
                    </div>
                    <div class="service-name">
                        <a href="{{ $item->url }}">
                        <span class="service-name-text fz-lg-13">
                            {{ $item->title }}
                        </span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
        @endforeach

    </div>
</section>
@endif
