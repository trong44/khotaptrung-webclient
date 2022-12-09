@if(isset($data) && count($data) > 0)

    <div class="content-items">
        <div class="container">
            <div class="items-title">
                <h2>Dịch vụ game</h2>
                <div class="items-title-lines"></div>
            </div>

            <div class="game-list row">
                @foreach($data as $item)

                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3  p-5 ppk">
                        <div class="game-list-content">
                            <div class="game-list-image">
                                <a class="account_category" href="/dich-vu/{{ $item->slug}}">
{{--                                                                                    Anh khuyen mai--}}

                                    @if(isset($item->image_icon))
                                        <img class="game-list-image-sticky lazy" data-original="{{\App\Library\MediaHelpers::media($item->image_icon)}}" alt="">
                                    @else

                                    @endif
                                    @if(isset($item->image))
                                        <img class="game-list-image-in lazy" data-original="{{\App\Library\MediaHelpers::media($item->image)}}" alt="">
                                    @else
                                        <img class="game-list-image-in lazy" data-original="/assets/frontend/{{theme('')->theme_key}}/images/ff.jpg" alt="">
                                    @endif
{{--                                                                                    Anh chinh --}}

                                </a>
                            </div>
                            <div class="game-list-title">
                                <a class="account_category" href="/dich-vu/{{ $item->slug   }}">
                                    <h3><strong class="limit-1 text-limit">{{ $item->title   }}</strong></h3>
                                </a>
                            </div>
                            <div class="game-list-description">
                                <div class="countime"></div>

                                @if(isset($item->total_order))
                                    @if($item->params_plus)
                                        @foreach($item->params_plus as $key => $val)
                                            @if($key == 'fk_buy')
                                                <p>Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}</p>
                                            @endif
                                        @endforeach

                                    @else
                                        <p>Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}</p>
                                    @endif

                                @else
                                    @if($item->params_plus)
                                        @foreach($item->params_plus as $key => $val)
                                            @if($key == 'fk_buy')
                                                <p>Giao dịch: {{ str_replace(',','.',number_format($val)) }}</p>
                                            @endif
                                        @endforeach
                                    @else
                                        <p>Giao dịch: 0</p>
                                    @endif

                                @endif


                            </div>
                            <div class="game-list-more">
                                <div class="game-list-more-view" >
                                    <a class="account_category" href="/dich-vu/{{ isset($item->custom->slug) ? $item->custom->slug :  $item->slug }}">

                                        @if(isset($item->custom) && isset($item->custom->meta))
                                            @foreach($item->custom->meta as $key =>$val)
                                                @if($key == "image_btn")
                                                    <img data-original="{{\App\Library\MediaHelpers::media($val)}}" alt="" class="lazy">
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
