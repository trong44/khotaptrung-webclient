@if(isset($data) && count($data) > 0)
    {{--    @dd($data)--}}
    @foreach($data as $items)
        <div class="content-items" id="freefire_taget">
            <div class="container">
                <div class="items-title">
                    <h4>{{ $items->title }}</h4>
                    <div class="items-title-lines"></div>
                </div>
                <div class="game-list row">
                    @foreach($items->items as $item)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3  p-5 ppk">
                            <div class="game-list-content">
                                <div class="game-list-image">
                                    <a href="/{{ $item->slug }}">
                                        {{--                                                Anh khuyen mai--}}
                                        @if(isset($item->image_extension))
                                            <img class="game-list-image-sticky" src="{{  config('api.url_media').$item->image_extension }}" alt="">
                                        @else
                                            <img class="game-list-image-sticky" src="https://www.shopas.net/storage/images/pBYgoKE7bt_1621190862.png" alt="">
                                        @endif
                                        @if(isset($item->image))
                                            <img class="game-list-image-in" src="{{  config('api.url_media').$item->image }}" alt="">
                                        @else
                                            <img class="game-list-image-in" src="https://www.shopas.net//storage/images/MyCKUlGT8Q_1642732819.gif" alt="">
                                        @endif
                                        {{--                                                Anh chinh --}}

                                    </a>
                                </div>
                                <div class="game-list-title">
                                    <a href="/{{ $item->slug }}">
                                        <p><strong>{{ $item->title }}</strong></p>
                                    </a>
                                </div>
                                <div class="game-list-description">
                                    <div class="countime"> </div>
                                    <p>Đã quay: 9999</p>
                                    <span class="game-list-description-old-price">8686đ</span>
                                    <span class="game-list-description-new-price">6868đ</span>
                                </div>
                                <div class="game-list-more">
                                    <div class="game-list-more-view" >
                                        <a href="/{{ $item->slug }}">
                                            <img src="https://www.shopas.net//storage/images/7Zsng4N5vn_1623839229.gif" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endif
