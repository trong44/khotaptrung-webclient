
@if(isset($data) )
    @foreach($data as $item)
<div class="blog-item mb-4">
    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="item-blog-img">
                @if(isset($item->url_redirect_301))
                <a href="{{ $item->url_redirect_301 }}">
                    <img class="lazy img-fluid" src="{{\App\Library\MediaHelpers::media($item->image)}}">
                </a>
                @else
                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                        <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}" class="lazy img-fluid" alt="">
                        </a>
                    @else
                        <a href="/tin-tuc/{{ $item->slug }}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}" class="lazy img-fluid" alt="">
                        </a>
                    @endif
                @endif
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-12">
            <h3>
                @if(isset($item->url_redirect_301))
                <a target="_blank" href="{{ $item->url_redirect_301 }}">{{ $item->title }}</a>
                @else
                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                        <a href="{{ setting('sys_zip_shop') }}/{{ $item->slug }}"> {{ $item->title }} </a>
                    @else
                        <a href="/tin-tuc/{{ $item->slug }}"> {{ $item->title }} </a>
                    @endif
                @endif
            </h3>
            <div class="note-item-blog">
                <p>
                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                        @if(isset($item->published_at))
                    <i class="fa fa-calendar mr-1"></i> {{ formatDateTime($item->published_at) }}
                        @else
                            <i class="fas fa-calendar-alt"></i> {{ formatDateTime($item->created_at) }}
                        @endif
                    @else
                        <i class="fas fa-calendar-alt"></i> {{ formatDateTime($item->created_at) }}
                    @endif
                    <span class="mx-3">|</span> Danh mục : {{ $item->groups[0]->title ?? '' }}
                </p>
                <div class="item-content">
                    <p>  {!! $item->seo_description !!}</p>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<hr>
    @endforeach
@else
    <div class="row pb-3 pt-3">
        <div class="col-md-12 text-center">
            <span style="color: red;font-size: 16px;">Không có dữ liệu !</span>
        </div>
    </div>
@endif
