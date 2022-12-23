{{--@foreach($data??[] as $item)--}}
{{--    @if ($item->parent_id == 0)--}}
{{--        <div class="col-6 col-sm-6 col-xl-6 col-lg-12 col-xl-12 ">--}}
{{--            <div class="account_sidebar_menu_title">--}}
{{--                <p>{{$item->title}}</p>--}}
{{--            </div>--}}
{{--            <div class="account_sidebar_menu_nav">--}}
{{--                <ul>--}}
{{--                    @foreach ($data as $key_child => $child_item)--}}
{{--                        @if ($item->id == $child_item->parent_id)--}}
{{--                            <li>--}}
{{--                                <a   href="{{$child_item->url?$child_item->url:$child_item->slug}}"class="account_{{substr($child_item->url, 1)}}">{{$child_item->title}}</a>--}}
{{--                            </li>--}}
{{--                            <script>--}}

{{--                            </script>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}


{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--@endforeach--}}

@if(isset($data))
    @foreach($data??[] as $item)
        @if ($item->parent_id == 0)
            <div class="col-md-12 left-right nav-bar-hr">
                {{--                                    Vong lap thang bố--}}
                <div class="row marginauto nav-bar-nick nav-bar-parent">
                    <div class="col-md-12 left-right">
                        <div class="row marginauto nav-bar-parent-title">
                            <div class="col-12 left-right">
                                <span>{{$item->title}}</span>
                            </div>
                        </div>
                    </div>

                </div>

                {{--                                    Vong lap thang con--}}
                @foreach ($data as $key_child => $child_item)
                    @if ($item->id == $child_item->parent_id)
                <div class="row marginauto nav-bar-nick nav-bar-child add-active_{{ $child_item->slug }} {{ '/'.request()->path() == $child_item->url ? 'active' : ''}}">
                    <div class="col-12 left-right">
                        <a href="{{$child_item->url?$child_item->url:$child_item->slug}}" class="">
                            <div class="row marginauto">
                                <div class="col-auto left-right global__link__profile">
                                    <i class="__icon__profile --sm__profile --link__profile" style="--path : url({{ $child_item->image_icon??'' }})"></i>
                                </div>
                                <div class="col-10 nav-bar-log-top-body-col">
                                    <span>{{$child_item->title}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                    @endif
                @endforeach
                {{--                                    Vong lap thang con--}}


            </div>
        @endif
    @endforeach
    <div class="row marginauto nav-bar-nick nav-bar-child d-block d-lg-none" style="margin-top: -20px">
        <div class="col-md-12 left-right">
            <li class="login_menu" style="list-style: none">
                {{--                <a href="">--}}
                {{--                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/menu_category6.png" alt="">--}}
                {{--                    <span>Đăng nhập/ Đăng ký</span>--}}
                {{--                </a>--}}
            </li>
        </div>

    </div>
@endif
