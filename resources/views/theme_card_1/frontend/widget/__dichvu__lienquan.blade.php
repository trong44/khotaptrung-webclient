@if(isset($data) && count($data) > 0)

<div class="main-title" style="margin-top: 0;margin-bottom: 24px">
    <h2 style="font-size: 20px;text-transform: uppercase;margin-bottom: 0">Các dịch vụ liên quan</h2>
</div>

<div class="entries" style="margin-bottom: 0">

  <div class="swiper swiper-container swiper-list-item swiper-service-related overflow-hidden" style="background: none;box-shadow: none">
    <div class=" swiper-wrapper">
        @foreach($data as $item)

        <div class="list-item image swiper-slide">
            <a href="/dich-vu/{{ $item->slug}}">
                <img style="width: 100%;border-radius: 8px" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title   }}" class="entries_item-img list-item-img">
                <div>
                    <h3 class="text-title">{{ $item->title}}</h3>
                </div>
            </a>

        </div>

        @endforeach

    </div>

    <div class="navigation swiper-list-prev"></div>
    <div class="navigation swiper-list-next"></div>

  </div>
</div>
<script>
    new Swiper('.swiper-list-item', {
        autoplay: false,
        updateOnImagesReady: true,
        watchSlidesVisibility: false,
        lazyLoadingInPrevNext: false,
        lazyLoadingOnTransitionStart: false,
        loop: false,
        centeredSlides: false,
        slidesPerView: 4,
        speed: 800,
        spaceBetween: 16,
        freeMode: true,
        touchMove: true,
        freeModeSticky:true,
        grabCursor: true,
        observer: true,
        observeParents: true,
        keyboard: {
            enabled: true,
        },
        breakpoints: {

            992: {
                slidesPerView: 4,
            },
            768: {
                slidesPerView: 3,
            },

            480: {
                slidesPerView: 1.8,
                spaceBetween: 6,
            }
        },
        navigation: {
            nextEl: ".swiper-list-acc .swiper-list-next",
            prevEl: ".swiper-list-acc .swiper-list-prev",
        },
    });
</script>
@endif
@section('scripts')

@endsection
