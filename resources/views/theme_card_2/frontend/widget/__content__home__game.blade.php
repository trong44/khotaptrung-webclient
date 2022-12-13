@if(isset($data) && count($data) > 0)

    <!--popup work start here-->
    <div class="d-flex justify-content-between mobile__content wapper-blog_c">
        <div class="main-title">
            <h2 style="color: #2F6A7C;">{{ $title??'Danh mục game' }}</h2>
        </div>
        <h5 style="margin-bottom: 0;line-height: 30px">
            <a class="hvr-underline-from-left see-more" href="/mua-acc" style="color: #2F6A7C;font-size: 14px">Xem tất cả »
            </a>
        </h5>
    </div>

    @php
        $total_key_nick = 8;
        $flag_slide_nick = 0;
        if(setting('sys_theme_nick_list') != ''){
            if (setting('sys_theme_nick_list') > 1){
                $total_key_nick = (int)setting('sys_theme_nick_list')*4;
            }elseif (setting('sys_theme_nick_list') == 1){
                $flag_slide_nick = 1;
            }
        }
    @endphp


    @if($flag_slide_nick == 0)
        <div class="item_buy_list row" style="padding-top: 8px">
            @foreach($data as $key => $item)
                @if($key < $total_key_nick)
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 ppk">
                    <div class="game-list-content">
                        <div class="game-list-image">
                            <a class="account_category" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                {{--                                                Anh khuyen mai--}}
                                @if(isset($item->image_icon))
                                    <img class="game-list-image-sticky lazy" src="{{ isset($item->custom->image_icon) ?  \App\Library\MediaHelpers::media($item->custom->image_icon) :  \App\Library\MediaHelpers::media($item->image_icon) }}" alt="">
                                @else
                                    <img class="game-list-image-sticky" src="/assets/frontend/{{theme('')->theme_key}}/images/giamgia.png" alt="">
                                @endif
                                @if(isset($item->image))
                                    <img class="game-list-image-in lazy" src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) : \App\Library\MediaHelpers::media($item->image) }}" alt="">
                                @else
                                    <img class="game-list-image-in" src="/assets/frontend/{{theme('')->theme_key}}/images/ff.jpg" alt="">
                                @endif
                                {{--                                                Anh chinh --}}
                            </a>
                        </div>
                        <div class="game-list-title" style="padding-left: 8px;padding-right: 8px;">
                            <a class="account_category text-limit limit-1" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                <h3 style="padding-bottom: 0"><strong>{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</strong></h3>
                            </a>
                        </div>
                        <div class="game-list-description" style="margin-bottom: 8px">
                            <div class="countime"></div>

                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p style="color: #212529;">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p style="color: #212529;">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p style="color: #FFFFFF">Số tài khoản: 9999</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @else
        <div class="container swiper  item_play_dif__img swiper-account-home swiper-banner swiper-container">
            <div class="swiper-wrapper">
                @foreach ($data as $item)
                    <div class="swiper-slide fixcssacount fixslidercsssev">
                        <div class="game-list-content">
                            <div class="game-list-image">
                                <a class="account_category" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                    {{--                                                Anh khuyen mai--}}
                                    @if(isset($item->image_icon))
                                        <img class="game-list-image-sticky lazy" src="{{ isset($item->custom->image_icon) ?  \App\Library\MediaHelpers::media($item->custom->image_icon) :  \App\Library\MediaHelpers::media($item->image_icon) }}" alt="">
                                    @else
                                        <img class="game-list-image-sticky" src="/assets/frontend/{{theme('')->theme_key}}/images/giamgia.png" alt="">
                                    @endif
                                    @if(isset($item->image))
                                        <img class="game-list-image-in lazy" src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) : \App\Library\MediaHelpers::media($item->image) }}" alt="">
                                    @else
                                        <img class="game-list-image-in" src="/assets/frontend/{{theme('')->theme_key}}/images/ff.jpg" alt="">
                                    @endif
                                    {{--                                                Anh chinh --}}
                                </a>
                            </div>
                            <div class="game-list-title" style="padding-left: 8px;padding-right: 8px;">
                                <a class="account_category text-limit limit-1" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                    <h3 style="padding-bottom: 0"><strong>{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</strong></h3>
                                </a>
                            </div>
                            <div class="game-list-description" style="margin-bottom: 8px">
                                <div class="countime"></div>

                                @if(isset($item->items_count))
                                    @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                        <p style="color: #212529;">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                    @else
                                        <p style="color: #212529;">Số tài khoản: {{ $item->items_count }} </p>
                                    @endif

                                @else
                                    <p style="color: #FFFFFF">Số tài khoản: 9999</p>
                                @endif
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
