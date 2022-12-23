@if(isset($data) && count($data) > 0)
    <div id="blog" class="mb-5" style="margin-top: 70px">
        <div class="title-content">
            <h3>Tin tức</h3>
        </div>
        <div class="wapper-blog">
            <div class="row">
                @foreach($data as $key => $item)
                    @if($key < 8)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-2">
                            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}"
                                   title="Đổi thẻ game Appota bằng thẻ cào giá rẻ, uy tín, chất lượng">
                                    <img class="image" src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                         title="{{$item->title}}">
                                </a>
                            @else
                                <a href="/tin-tuc/{{ $item->slug }}">
                                    <img class="image" src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                         title="{{$item->title}}">
                                </a>
                            @endif
                            <div class="content-title mt-3">
                                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                    <p>
                                        <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}">{{ $item->title }}</a>
                                    </p>
                                @else
                                    <p>
                                        <a href="/tin-tuc/{{ $item->slug }}">{{ $item->title }}</a>
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <h5 style="float: right"><a class="hvr-underline-from-left see-more" href="/tin-tuc">Xem tất cả <i class="fas fa-angle-double-right"></i></a></h5>
        </div>
    </div>
@endif
