
@if(isset($dataitem) && count($dataitem) > 0)
    @foreach($dataitem->data as$key => $item)

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
                <div class="col-lg-4">
                    <!-- BEGIN Item Article -->
                    <div class="item-article mb-4">
                        <div class="item-thumb mb-2">
                            <div class="media-placeholder ratio-2-1">
                                <div class="bg item-image " >

                                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                    <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}">

                                        <img class="img-fluid" src="{{\App\Library\MediaHelpers::media($item->image)}}" title="{{ $item->title }}">
                                    </a>
                                    @else
                                        <a href="/tin-tuc/{{ $item->slug }}">
                                            <img class="img-fluid" src="{{\App\Library\MediaHelpers::media($item->image)}}" title="{{ $item->title }}">
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="item-content">
                            <h6 class="item-title">
                                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}">{{ $item->title }}</a>
                                @else
                                    <a href="/tin-tuc/{{ $item->slug }}">{{ $item->title }}</a>
                                @endif
                            </h6>
                        </div>
                    </div><!-- BEGIN Item Article -->
                </div>
            @endif
        @endif
    @endforeach
@endif

