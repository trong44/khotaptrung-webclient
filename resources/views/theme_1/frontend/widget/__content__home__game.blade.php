
@if(isset($data) && count($data) > 0)

    <div class="content-items">
        <div class="container">
            <div class="items-title">
                <h2>Danh mục game</h2>
                <div class="items-title-lines"></div>
            </div>

            <div class="game-list row">

                @foreach($data as $item)

                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3  p-5 ppk">
                        <div class="game-list-content">
                            <div class="game-list-image game-list-image__game">
                                @if(isset($item->lm_auto))
                                    @if($item->lm_auto == 1)
                                        <a class="account_category" href="/mua-acc/{{ config('module.acc.slug-auto') }}">
                                            {{--                                                Anh khuyen mai--}}
                                            @if(isset($item->image_icon))
                                                @if(isset($item->custom->image_icon))
                                                    <img class="game-list-image-sticky lazy" data-original="{{ \App\Library\MediaHelpers::media($item->custom->image_icon) }}" alt="">
                                                @else
                                                    <img class="game-list-image-sticky" data-original="{{ \App\Library\MediaHelpers::media($item->image_icon) }}" alt="">
                                                @endif
                                            @endif
                                            @if(isset($item->image))
                                                <img class="game-list-image-in lazy" data-original="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}" alt="">
                                            @else
                                                <img class="game-list-image-in" data-original="/assets/frontend/{{theme('')->theme_key}}/images/ff.jpg" alt="">
                                            @endif
                                            {{--                                                Anh chinh --}}

                                        </a>
                                    @else
                                        <a class="account_category" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                            {{--                                                Anh khuyen mai--}}
                                            @if(isset($item->image_icon))
                                                @if(isset($item->custom->image_icon))
                                                    <img class="game-list-image-sticky lazy" data-original="{{ \App\Library\MediaHelpers::media($item->custom->image_icon) }}" alt="">
                                                @else
                                                    <img class="game-list-image-sticky" data-original="{{ \App\Library\MediaHelpers::media($item->image_icon) }}" alt="">
                                                @endif
                                            @else

                                            @endif
                                            @if(isset($item->image))
                                                <img class="game-list-image-in lazy" data-original="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}" alt="">
                                            @else
                                                <img class="game-list-image-in" data-original="/assets/frontend/{{theme('')->theme_key}}/images/ff.jpg" alt="">
                                            @endif
                                            {{--                                                Anh chinh --}}

                                        </a>
                                    @endif
                                @else
                                    <a class="account_category" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                        {{--                                                Anh khuyen mai--}}
                                        @if(isset($item->image_icon))
                                            @if(isset($item->custom->image_icon))
                                                <img class="game-list-image-sticky lazy" data-original="{{ \App\Library\MediaHelpers::media($item->custom->image_icon) }}" alt="">
                                            @else
                                                <img class="game-list-image-sticky" data-original="{{ \App\Library\MediaHelpers::media($item->image_icon) }}" alt="">
                                            @endif
                                        @else

                                        @endif
                                        @if(isset($item->image))
                                            <img class="game-list-image-in lazy" data-original="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}" alt="">
                                        @else
                                            <img class="game-list-image-in" data-original="/assets/frontend/{{theme('')->theme_key}}/images/ff.jpg" alt="">
                                        @endif
                                        {{--                                                Anh chinh --}}

                                    </a>
                                @endif
                            </div>
                            <div class="game-list-title">
                                @if(isset($item->lm_auto))
                                    @if($item->lm_auto == 1)
                                        <a class="account_category" href="/mua-acc/{{ config('module.acc.slug-auto') }}">
                                            <h3><strong class="limit-1 text-limit">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</strong></h3>
                                        </a>
                                    @else
                                        <a class="account_category" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                            <h3><strong class="limit-1 text-limit">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</strong></h3>
                                        </a>
                                    @endif
                                @else
                                    <a class="account_category" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                        <h3><strong class="limit-1 text-limit">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</strong></h3>
                                    </a>
                                @endif
                            </div>
                            <div class="game-list-description">
                                <div class="countime"></div>

                                @if(isset($item->items_count))
                                    @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                        <p>Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                    @else
                                        <p>Số tài khoản: {{ $item->items_count }} </p>
                                    @endif

                                @else
                                    <p>Số tài khoản: 0 </p>
                                @endif
                            </div>
                            @if($item->display_type == 2)

                                @if(isset($item->params) && isset($item->params->price))
                                    <div class="row marginauto price-minigame">
                                        <div class="col-md-12 left-right">
                                            <span class="oldPrice">{{ str_replace(',','.',number_format($item->price_old??$item->price)) }} đ</span>
                                            <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                        </div>

                                    </div>
                                @endif
                            @else
                                <div class="row marginauto price-minigame">
                                    <div class="col-md-12 left-right">
                                        <span class="oldPrice" style="color: transparent"></span>
                                        <span class="newPrice" style="border: none"></span>
                                    </div>
                                </div>
                            @endif
                            <div class="game-list-more">
                                <div class="game-list-more-view" >
                                    <a class="account_category" href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">

                                        @if(isset($item->custom) && isset($item->custom->meta) && isset($item->custom->meta->image_btn))
                                            @foreach($item->custom->meta as $key =>$val)
                                                @if($key == "image_btn")
                                                    <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" class="lazy">
                                                @endif
                                            @endforeach
                                        @else
                                            @if(isset(theme('')->theme_config->sys_button_home))
                                                @if(theme('')->theme_config->sys_button_home == 'sys_button_home_text')
                                                    <div class="col-xs-12 w-75 m-auto">
                                                        <div class="btn-view-more mt-3">
                                                            Xem tất cả
                                                        </div>
                                                    </div>
                                                @else
                                                    <img src="/assets/frontend/{{theme('')->theme_key}}/images/muangay.jpg" alt="">

                                                @endif
                                            @else
                                                <img src="/assets/frontend/{{theme('')->theme_key}}/images/muangay.jpg" alt="">
                                            @endif
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endif






{{--<script>--}}
{{--    $(document).ready(function(){--}}
{{--        var key = 1;--}}

{{--        $(function() {--}}
{{--            $('.content-items').each(function(key,value){--}}

{{--                $(this).attr('id', 'target_'+key);--}}
{{--            });--}}
{{--        });--}}
{{--    })--}}
{{--</script>--}}
