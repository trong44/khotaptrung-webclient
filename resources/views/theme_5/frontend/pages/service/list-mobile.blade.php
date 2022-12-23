@extends('frontend.layouts.master')

@section('meta_robots')
    <meta name="robots" content="index,follow"/>
@endsection
@section('content')
    <div class="container c-container" id="servicemobile">
        <div class="container c-container pl-0 pr-0">
            <input type="search" placeholder="Tìm kiếm" class="search c-mt-16">
            {{--            Slider banner    --}}
            <div class="">
                @include('frontend.widget.__slider__banner')
            </div>

            <div class="servicemobile--title c-pb-8 c-mt-28">
                <h3 class="fw-700 lh-24 fz-15 mb-0">Danh mục dịnh vụ</h3>
            </div>
            @include('frontend.widget.__slider__banner')

            <div class="menu-category">
                <ul class="row px-0 menu-category_fixm ">
                    @if(isset($data))
                        @forelse($data as $service)
                            @if($service->url != '/nap-the' && $service->url != '/recharge-atm' && $service->url != '/minigame')
                            <li class="col-4 c-px-8 c-pt-8 c-pb-8">
                                <a href="{{ $service->url }}">
                                    <div class=" c-pt-10 c-pb-10 brs-8 menu-category-item justify-content-center">
                                        <img src="{{@\App\Library\MediaHelpers::media($service->image_icon)}}" alt="{{@$service->slug}}">
                                        <p class="fw-400 mb-0 text-primary-color">{{@$service->title}}</p>
                                    </div>
                                </a>
                            </li>
                            @endif
                        @empty
                            <span class="text-danger">Không có kết quả nào</span>
                        @endforelse
                    @else
                        <span class="text-danger">{{ @$data->message }}</span>
                    @endif
                </ul>
            </div>
        </div>
    </div>

@endsection
