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
