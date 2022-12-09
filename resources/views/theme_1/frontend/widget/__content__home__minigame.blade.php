
@if(isset($data) && count($data) > 0)
<div class="content-items content-items-spin">
    <div class="container">
        <div class="items-title">
            <h2>Danh mục minigame</h2>
            <div class="items-title-lines"></div>
        </div>
        <div class="game-list row">
            @foreach($data as $item)
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3  p-5 ppk">
                    <div class="game-list-content">
                        <div class="game-list-image">
                            <a class="account_category" href="/minigame-{{ $item->slug }}">
{{--                                                                                Anh khuyen mai--}}
                                @if(isset($item->params->image_percent_sale))
                                    <img class="game-list-image-sticky lazy" src="{{\App\Library\MediaHelpers::media($item->params->image_percent_sale)}}" alt="">
                                @else

                                @endif
                                @if(isset($item->image))
                                    <img class="game-list-image-in lazy" data-original="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                                @else
                                    <img class="game-list-image-in lazy" data-original="/assets/frontend/{{theme('')->theme_key}}/images/ff.jpg" alt="">
                                @endif
{{--                                                                                Anh chinh--}}

                            </a>
                        </div>
                        <div class="game-list-title">
                            <a class="account_category" href="/minigame-{{ $item->slug }}">
                                <h3><strong>{{ $item->title }}</strong></h3>
                            </a>
                        </div>
                        <div class="game-list-description">
                            <div class="countime"></div>
                            <p>Đã quay:  {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}} </p>

                            <div class="row marginauto price-minigame">
                                <div class="col-md-12 left-right">
                                    @if(isset($item->params->percent_sale))
                                    <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                                    @else
                                    @endif
                                    <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                </div>

                            </div>
                        </div>
                        <div class="game-list-more">
                            <div class="game-list-more-view" >
                                <a class="account_category" href="/minigame-{{ $item->slug }}">
                                    @if(isset($item->params->image_view_all))
                                        <img src="{{\App\Library\MediaHelpers::media($item->params->image_view_all)}}" alt="" class="lazy">
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
