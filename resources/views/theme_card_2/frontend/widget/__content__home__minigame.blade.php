@if(isset($data) && count($data) > 0)
    <div class="d-flex justify-content-between mobile__content wapper-blog_c">
        <div class="main-title">
            <h2 style="color: #2F6A7C;">{{ $title??'Minigame' }}</h2>
        </div>
        <h5 style="margin-bottom: 0;line-height: 30px">
            <a class="hvr-underline-from-left see-more" href="/minigame" style="color: #2F6A7C;font-size: 14px">Xem tất cả »
            </a>
        </h5>
    </div>

    @php
        $total_key_minigame = 8;
        $flag_slide_minigame = 0;
        if(setting('sys_theme_minigame_list') != ''){
            if (setting('sys_theme_minigame_list') > 1){
                $total_key_minigame = (int)setting('sys_theme_minigame_list')*4;
            }elseif (setting('sys_theme_minigame_list') == 1){
                $flag_slide_minigame = 1;
            }
        }
    @endphp
    @if($flag_slide_minigame == 0)
        <div class="item_buy_list row">
            @foreach($data as $key => $item)
                @if($key < $total_key_minigame)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 ppk">
                        <div class="game-list-content">
                            <div class="game-list-image">
                                <a class="account_category" href="/minigame-{{ $item->slug}}">
                                    <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                         alt="{{ $item->slug   }}" class="game-list-image-in lazy">
                                </a>
                            </div>
                            <div class="game-list-title" style="padding-left: 8px;padding-right: 8px">
                                <a class="account_category text-limit limit-1" href="/dich-vu/{{ $item->slug}}">
                                    <h3 style="padding-bottom: 0"><strong>{{ $item->title }}</strong></h3>
                                </a>
                            </div>
                            <div class="game-list-description" style="margin-bottom: 8px">
                                <div class="countime"></div>
                                <span>Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <div class="container swiper  item_play_dif__img swiper-minigame-home swiper-banner swiper-container">
            <div class="swiper-wrapper">
                @foreach ($data as $item)
                    <div class="swiper-slide fixcssacount fixslidercsssev">
                        <div class="game-list-content">
                            <div class="game-list-image">
                                <a class="account_category" href="/minigame-{{ $item->slug}}">
                                    <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                         alt="{{ $item->slug   }}" class="game-list-image-in lazy">
                                </a>
                            </div>
                            <div class="game-list-title" style="padding-left: 8px;padding-right: 8px">
                                <a class="account_category text-limit limit-1" href="/dich-vu/{{ $item->slug}}">
                                    <h3 style="padding-bottom: 0"><strong>{{ $item->title }}</strong></h3>
                                </a>
                            </div>
                            <div class="game-list-description" style="margin-bottom: 8px">
                                <div class="countime"></div>
                                <span>Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</span>
                                <div class="price">
                                    @if(isset($item->params->percent_sale))
                                        <div class="price-current">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                        <div class="price-old c-mr-8">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                                        <div class="discount">{{ $item->params->percent_sale }}%</div>
                                    @else
                                        <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="navigation slider-next "></div>
            <div class="navigation slider-prev "></div>
        </div>
    @endif

@endif
