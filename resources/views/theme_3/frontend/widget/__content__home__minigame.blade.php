@if(isset($data) && count($data) > 0)

<div class="block-mini-game mt-fix-20">
    <div class="row">
        <div class="col-lg-12 col-md-12" >
            <div class=" block-product ">
                <div class="product-header d-flex">
                        <span>
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/vongquayindex.svg" alt="">
                        </span>
                    <h2 class="text-title" >{{ $title??'Vòng quay may mắn' }}</h2>
                    <div class="navbar-spacer"></div>

                    <div class="text-view-more">

                        <a href="/minigame" class="global__link">Xem thêm<i class="__icon --sm --link ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/arrowright.svg)"></i></a>

                    </div>
                </div>
                <div class="box-product " >
                    <div class="row list-product list-minigame" >

                        @foreach($data as $key => $item)
                            @if($key == 0)
                            <div class="list-minigame_box-left col-md-8 px-2">
                            <div class="item-minigame_first y_content-item">
                                <a href="/minigame-{{ $item->slug }}" class="y_item">

                                    @if(isset($item->image))
                                        <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}">
                                    @endif

                                    <div class="item-minigame-content y_caption">
                                        <div class="item-minigame-name">{{ $item->title }}</div>
                                        <div class="item-minigame-user">Đã chơi: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</div>
                                        <div class="item-minigame-price">


                                            <div class="special-price__minigame">{{ str_replace(',','.',number_format($item->price)) }} đ</div>

                                            @if(isset($item->params->percent_sale))
                                            <div class="old-price__minigame">
                                                {{ str_replace(',','.',number_format($item->price/((100 - $item->params->percent_sale)/100))) }} đ
                                            </div>
                                            @else
                                            @endif
                                            @if(isset($item->params->percent_sale))
                                            <div class="item-product__sticker-percent__minigame">
                                                -{{ $item->params->percent_sale }}%
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>


                            </div>
                        </div>
                            @endif
                        @endforeach

                        <div class="list-minigame_box-right col-md-4">
                            <div class="row">

                                @foreach($data as $key => $item)
                                    @if($key == 1 || $key == 2)
                                        <div class="col-md-12 pr-fix-8 pl-fix-8 ">
                                    <div class="item-minigame_second y_content-item">
                                        <a href="/minigame-{{ $item->slug }}" class="y_item">
                                            @if(isset($item->image))
                                                <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}">
                                            @endif
                                            <div class="item-minigame-content y_caption">
                                                <div class="item-minigame-name">{{ $item->title }}</div>
                                                <div class="item-minigame-user">Đã chơi: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</div>
                                                <div class="item-minigame-price">

                                                    <div class="special-price__minigame">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                    @if(isset($item->params->percent_sale))
                                                        <div class="old-price__minigame">
                                                            {{ str_replace(',','.',number_format($item->price/((100 - $item->params->percent_sale)/100))) }} đ
                                                        </div>
                                                    @else
                                                    @endif
                                                    @if(isset($item->params->percent_sale))
                                                        <div class="item-product__sticker-percent__minigame">
                                                            -{{ $item->params->percent_sale }}%
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>

                                    </div>

                                </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>

                        <div class="list-minigame_box-right col-md-12">
                            <div class="row">
                                @foreach($data as $key => $item)
                                    @if($key == 3 || $key == 4 || $key == 5)
                                        <div class="col-md-4 pr-fix-8 pl-fix-8 ">
                                            <div class="item-minigame_second y_content-item">
                                                <a href="/minigame-{{ $item->slug }}" class="y_item">
                                                    @if(isset($item->image))
                                                        <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}">
                                                    @endif
                                                    <div class="item-minigame-content y_caption">
                                                        <div class="item-minigame-name">{{ $item->title }}</div>
                                                        <div class="item-minigame-user">Đã chơi: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</div>
                                                        <div class="item-minigame-price">

                                                            <div class="special-price__minigame">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                            @if(isset($item->params->percent_sale))
                                                                <div class="old-price__minigame">
                                                                    {{ str_replace(',','.',number_format($item->price/((100 - $item->params->percent_sale)/100))) }} đ
                                                                </div>
                                                            @else
                                                            @endif
                                                            @if(isset($item->params->percent_sale))
                                                                <div class="item-product__sticker-percent__minigame">
                                                                    -{{ $item->params->percent_sale }}%
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </a>

                                            </div>

                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>

                    </div>
                    <div class="list-minigame_mobile">
                        @foreach($data as $key => $item)
                            @if($key == 0)
                        <div class="list-minigame_box-left w-100">
                            <div class="item-minigame_first">
                                <a href="/minigame-{{ $item->slug }}">

                                    @if(isset($item->image))
                                        <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}">
                                    @endif

                                    <div class="item-minigame-content">
                                        <div class="item-minigame-name">{{ $item->title }}</div>
                                        <div class="item-minigame-user">Đã chơi: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</div>
                                        <div class="item-minigame-price">


                                            <div class="special-price__minigame">{{ str_replace(',','.',number_format($item->price)) }} đ</div>

                                            @if(isset($item->params->percent_sale))
                                                <div class="old-price__minigame">
                                                    {{ str_replace(',','.',number_format($item->price/((100 - $item->params->percent_sale)/100))) }} đ
                                                </div>
                                            @else
                                            @endif
                                            @if(isset($item->params->percent_sale))
                                                <div class="item-product__sticker-percent__minigame">
                                                    -{{ $item->params->percent_sale }}%
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>


                        </div>
                            @endif
                        @endforeach
                        <div class="list-minigame_box-right minigame-swiper swiper-container">
                            <div class="swiper-wrapper">
                                @foreach($data as $key => $item)
                                    @if($key > 0 && $key < 5)
                                <div class="swiper-slide">
                                    <div class="item-minigame_second">
                                        <a href="/minigame-{{ $item->slug }}">

                                            @if(isset($item->image))
                                                <img onerror="imgError(this)" class="lazy" data-src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}">
                                            @endif

                                            <div class="item-minigame-content">
                                                <div class="item-minigame-name">{{ $item->title }}</div>
                                                <div class="item-minigame-user">Đã chơi: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</div>
                                                <div class="item-minigame-price">


                                                    <div class="special-price__minigame">{{ str_replace(',','.',number_format($item->price)) }} đ</div>

                                                    @if(isset($item->params->percent_sale))
                                                        <div class="old-price__minigame">
                                                            {{ str_replace(',','.',number_format($item->price/((100 - $item->params->percent_sale)/100))) }} đ
                                                        </div>
                                                    @else
                                                    @endif
                                                    @if(isset($item->params->percent_sale))
                                                        <div class="item-product__sticker-percent__minigame">
                                                            -{{ $item->params->percent_sale }}%
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endif
