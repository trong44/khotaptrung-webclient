<div class="block-product gaming-recharge mt-fix-20">
    <div class="gaming-recharge-header d-flex">

        <div class="product-header d-flex d-md-flex">
                    <span>
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/muathegiare.svg" alt="">
                    </span>
            <h2 class="text-title" >{{ $title??'Nạp game giá rẻ nhé' }}</h2>
            <div class="navbar-spacer"></div>
        </div>
    </div>
    <div class="gaming-recharge-search">
        <div class="gaming-recharge-search-header">
            {{--            <p>Chọn game muốn nạp</p>--}}
        </div>
        <div class="gaming-recharge-search-form">
            <h6>Tìm kiếm</h6>
            <form action="" method="POST" class="gaming-recharge-form-detail" id="service-form">
                <div class="row marginauto body-form-search-ct">
                    <div class="col-md-auto col-12 left-right">
                        <input type="text" name="search" class="input-search-ct" id="keyword--search" placeholder="Tìm dịch vụ">
                        <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                    </div>
                    <div class="col-4 body-form-search-button-ct">
                        <button type="submit" class="timkiem-button-ct">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="box-product">
        <div class=" list-product d-flex flex-wrap" >
            @foreach($data as $service)
                <div class="col-auto body-detail-nick-col-ct js-service">
                    <a href="/dich-vu/{{ @$service->slug }}" class="list-item-nick-hover">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right default-overlay-nick-ct --fix-responsive">
                                <img onerror="imgError(this)" class="lazy" data-src="{{@\App\Library\MediaHelpers::media($service->image)}}" alt="{{ @$service->slug }}">
                            </div>
                            <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                <span>{{ @$service->title }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/service.js?" type="text/javascript"></script>
@endsection
