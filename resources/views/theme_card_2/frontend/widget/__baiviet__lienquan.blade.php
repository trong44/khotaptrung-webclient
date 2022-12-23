
    <div class="relate-content">
        <h2>Bài viết nổi bật</h2>
        <hr class="lines">
        <div class="content-relate-item">
            @if(isset($data) && count($data) > 0)
                @foreach($data as$key => $item)

                    @php
                        $index = 6;
                         if ($slug == $item->slug){
                             $index = 7;
                         }
                         if ($id != $item->id ){
                             $index = 7;
                         }
                    @endphp
                    @if($key < $index)
                        @if($item->id != $id)
                <div class="row mb-3">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-5">
                        <div class="item-blog-img">
                            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}">
                                    <img src="{{\App\Library\MediaHelpers::media($item->image)}}" class="img-fluid" alt="">
                                </a>
                            @else
                                <a href="/tin-tuc/{{ $item->slug }}">
                                    <img src="{{\App\Library\MediaHelpers::media($item->image)}}" class="img-fluid" alt="">
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-7">
                        <div class="item-blog-content">
                            <h3>
                                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                    <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}"
                                       rel="nofollow">{{ $item->title }}
                                    </a>
                                @else
                                    <a href="/tin-tuc/{{ $item->slug }}" class="post-link">{{ $item->title }}</a>
                                @endif
                            </h3>
                            <p class="mt-1">{{ formatDateTime($item->created_at) }}</p>
                        </div>
                    </div>
                </div>
                        @endif
                    @endif
            @endforeach
            @endif

        </div>

    </div>


