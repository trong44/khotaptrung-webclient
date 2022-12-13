@if(isset($data) && count($data) > 0)

<div class="box-product " >
    <div class="row list-minigame" >
        @foreach($data as $key => $item)
            @if($key == 0)
                <div class="list-minigame_box-left col-md-8 px-2">
            <div class="item-minigame_first y_content-item">
                <a href="/minigame-{{ $item->slug }}" class="y_item">
                    @if(isset($item->image))
                        <img class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}">
                    @endif
                    <div class="item-minigame-content y_caption">
                        <div class="item-minigame-name text-limit limit-1">{{ $item->title }}</div>
                        <div class="item-minigame-user">Đã chơi: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</div>
                        <div class="item-minigame-price">

                            <div class="special-price__minigame">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                            @if(isset($item->params->percent_sale))
                                <div class="old-price__minigame">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                            @else
                            @endif
                            @if(isset($item->params->percent_sale))
                                <div class="item-product__sticker-percent__minigame">
                                    -{{ $item->params->percent_sale }}%
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="item-minigame-top">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/minigame_top.png" alt=""> <div>Top 1</div>
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
                                        <img class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}">
                                    @endif
                                    <div class="item-minigame-content y_caption">
                                        <div class="item-minigame-name text-limit limit-1">{{ $item->title }}</div>
                                        <div class="item-minigame-user">Đã chơi: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</div>
                                        <div class="item-minigame-price">

                                            <div class="special-price__minigame">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                            @if(isset($item->params->percent_sale))
                                                <div class="old-price__minigame">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                                            @else
                                            @endif
                                            @if(isset($item->params->percent_sale))
                                                <div class="item-product__sticker-percent__minigame">
                                                    -{{ $item->params->percent_sale }}%
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="item-minigame-top">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/minigame_top.png" alt=""> <div>Top {{ $key + 1 }}</div>
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
                                        <img class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}">
                                    @endif
                                    <div class="item-minigame-content y_caption">
                                        <div class="item-minigame-name text-limit limit-1">{{ $item->title }}</div>
                                        <div class="item-minigame-user">Đã chơi: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</div>
                                        <div class="item-minigame-price">

                                            <div class="special-price__minigame">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                            @if(isset($item->params->percent_sale))
                                                <div class="old-price__minigame">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                                            @else
                                            @endif
                                            @if(isset($item->params->percent_sale))
                                                <div class="item-product__sticker-percent__minigame">
                                                    -{{ $item->params->percent_sale }}%
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="item-minigame-top">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/minigame_top.png" alt=""> <div>Top {{ $key + 1 }}</div>
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
                                <img class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}">
                            @endif
                            <div class="item-minigame-content">
                                <div class="item-minigame-name text-limit limit-1">{{ $item->title }}</div>
                                <div class="item-minigame-user">Đã chơi: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</div>
                                <div class="item-minigame-price">

                                    <div class="special-price__minigame">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                    @if(isset($item->params->percent_sale))
                                        <div class="old-price__minigame">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
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
                                <img class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}">
                            @endif
                            <div class="item-minigame-content">
                                <div class="item-minigame-name text-limit limit-1">{{ $item->title }}</div>
                                <div class="item-minigame-user">Đã chơi: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</div>
                                <div class="item-minigame-price">

                                    <div class="special-price__minigame">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                    @if(isset($item->params->percent_sale))
                                        <div class="old-price__minigame">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
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

@endif
