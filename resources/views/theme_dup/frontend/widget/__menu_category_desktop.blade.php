@php
    $total = 0;
    foreach($data??[] as $item){
        if ($item->parent_id == 0){
            $total = $total + 1;
        }
    }
@endphp
<header>
    <div class="nav-bar">
        @if($total <= 5)
        <div class="nav-bar-container container">
            <div class="nav-bar-brand">
                <a href="/">
                    <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" alt="">
                    {{--                    <img src="https://www.shopas.net/storage/images/6BdfImoiWl_1640248137.png" alt="">--}}
                </a>

            </div>

            <div class="nav-bar-category">
                <ul class="nav">
                    @foreach($data??[] as $item)

                        @if ($item->parent_id == 0)
                            @if($item->url == "/tin-tuc")
                                @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                    <li class="menu-item">
                                        <a href="{{ setting('sys_zip_shop') }}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                                    </li>
                                @else
                                    <li class="menu-item">
                                        <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                                    </li>
                                @endif
                            @else
                                <li class="menu-item">
                                    <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                                    <ul class="sub-menu" >
                                        @foreach ($data??[] as $key_child => $child_item)
                                            @if ($item->id == $child_item->parent_id)
                                                <li class="menu-item">
                                                    <a  href="{{$child_item->url}}" class="\">{{$child_item->title}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
                <div class="nav-bar-brand">
                    <a href="/">
                        <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" alt="">
                        {{--                    <img src="https://www.shopas.net/storage/images/6BdfImoiWl_1640248137.png" alt="">--}}
                    </a>

                </div>
                <form action="" id="formProfile">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="">
                </form>
                <ul class="nav">

                    <li class="nav-log-in">
                        <a href="#" id="info">
                            <div class="loading"></div>
                        </a>
                    </li>

                    <li class="nav-log-in">
                        <a href="#" id="logout">
                            <div class="loading"></div>
                        </a>
                    </li>

                    {{--                     <li class="nav-regist">--}}
                    {{--                        <a href="/register"><i class="fas fa-user"></i> Đăng ký</a>--}}
                    {{--                    </li> --}}
                    {{--                     @if (App\Library\AuthCustom::check())--}}
                    {{--                        <li class="nav-log-in">--}}
                    {{--                            <a href="/thong-tin" ><i class="fas fa-user"></i> {{App\Library\AuthCustom::user()->fullname ? Str::limit(App\Library\AuthCustom::user()->fullname,10) : Str::limit(App\Library\AuthCustom::getName(),10)}}  -    $ {{App\Library\AuthCustom::user()->balance ? str_replace(',','.',number_format(Str::limit(App\Library\AuthCustom::user()->balance,10))) : 0}} </a>--}}
                    {{--                        </li>--}}
                    {{--                        <li class="nav-regist">--}}
                    {{--                            <a href="/logout"><i class="fas fa-user"></i> Đăng xuất</a>--}}
                    {{--                        </li>--}}
                    {{--                    @else--}}
                    {{--                        <li class="nav-log-in">--}}
                    {{--                            <a href="/login" ><i class="fas fa-user"></i> Đăng nhập </a>--}}
                    {{--                        </li>--}}
                    {{--                        <li class="nav-regist">--}}
                    {{--                            <a href="/register"><i class="fas fa-user"></i> Đăng ký</a>--}}
                    {{--                        </li>--}}
                    {{--                            <li class="nav-log-in">--}}
                    {{--                                <a href="/login" ><div class="loading"></div></a>--}}
                    {{--                            </li>--}}
                    {{--                            <li class="nav-regist">--}}
                    {{--                                <a href="/register"><i class="fas fa-user"></i> Đăng ký</a>--}}
                    {{--                            </li>--}}

                    {{--                    @endif --}}

                </ul>
                {{--                @else--}}
                {{--                    <ul class="nav">--}}
                {{--                        <li class="nav-log-in">--}}
                {{--                            <a href="/" >--}}
                {{--                                <div class="info">--}}
                {{--                                    <i class="fas fa-user"></i> Nam Hải--}}
                {{--                                </div>--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                        <li class="nav-register">--}}
                {{--                            <a href="/logout"><i class="fas fa-user"></i> Đăng xuất</a>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                @endif--}}
            </div>
            <div class="nav-bar-category-mobile">
                <span>
                    <a href="#" id="info_mobile">
                        <div class="loading"></div>
                    </a>
                     <a href="#" id="logout_mobile">
                        <div class="loading"></div>
                    </a>
                </span>

                {{--                @if (App\Library\AuthCustom::check())--}}
                {{--                    <span>--}}
                {{--                        <a href="/profile"> {{App\Library\AuthCustom::user()->fullname ? Str::limit(App\Library\AuthCustom::user()->fullname,10) : Str::limit(App\Library\AuthCustom::getName(),10)}}  -   $ {{App\Library\AuthCustom::user()->balance ? str_replace(',','.',number_format(Str::limit(App\Library\AuthCustom::user()->balance,10))) : 0}} </a>--}}
                {{--                        <a href="/logout">Đăng xuất</a>--}}
                {{--                    </span>--}}
                {{--                @else--}}
                {{--                    <span>--}}
                {{--                        <a href="/login"> Đăng nhập</a>--}}
                {{--                        <a href="/register">Đăng ký</a>--}}
                {{--                    </span>--}}
                {{--                @endif--}}
                <label class="nav-bar-category-mobile-input" for="nav_mobile_input"><i class="fas fa-bars"></i></label>
                <input type="checkbox" hidden class="name_input" id="nav_mobile_input" >
                <nav class="nav_mobile">
                    <ul class="">
                        @include('frontend.widget.__menu_category_mobile')
                    </ul>
                    <ul class="">
                        <li>
                            <a href="#" id="info_tab_mobile"  class="nav_mobile-log-in">
                                <div class="loading"></div>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="logout_tab_mobile"  class="nav_mobile-log-in">
                                <div class="loading"></div>
                            </a>
                        </li>

                        {{--                        @if (App\Library\AuthCustom::check())--}}
                        {{--                           --}}
                        {{--                            <li><a href="/login" class="nav_mobile-log-in"><i class="fas fa-user"></i> {{App\Library\AuthCustom::user()->fullname ? Str::limit(App\Library\AuthCustom::user()->fullname,10) : Str::limit(App\Library\AuthCustom::getName(),10)}}  -   $ {{App\Library\AuthCustom::user()->balance ? str_replace(',','.',number_format(Str::limit(App\Library\AuthCustom::user()->balance,10))) : 0}} </a></li>--}}
                        {{--                            <li><a href="/logout" class="nav_mobile-log-in"><i class="fas fa-user"></i>   Đăng xuất</a></li>--}}
                        {{--                        @else--}}
                        {{--                            <li><a href="/login" class="nav_mobile-log-in"><i class="fas fa-user"></i>   Đăng nhập</a></li>--}}
                        {{--                            <li><a href="/regist" class="nav_mobile-log-in"><i class="fas fa-user"></i>   Đăng ký</a></li>--}}
                        {{--                        @endif--}}

                    </ul>
                </nav>
            </div>
            <form id="logout-form" action="{{ url('/ajax/logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
        @else
        <div class="nav-bar-container container-fluid">
                <div class="nav-bar-brand">
                    <a href="/">
                        <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" alt="">
                        {{--                    <img src="https://www.shopas.net/storage/images/6BdfImoiWl_1640248137.png" alt="">--}}
                    </a>

                </div>

                <div class="nav-bar-category">
                    <ul class="nav">
                        @foreach($data??[] as $item)

                            @if ($item->parent_id == 0)
                                @if($item->url == "/tin-tuc")
                                    @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                        <li class="menu-item">
                                            <a href="{{ setting('sys_zip_shop') }}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                                        </li>
                                    @else
                                        <li class="menu-item">
                                            <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="menu-item">
                                        <a href="{{$item->url}}" @if($item->target==1) target="_blank" @endif>{{$item->title}}</a>
                                        <ul class="sub-menu" >
                                            @foreach ($data??[] as $key_child => $child_item)
                                                @if ($item->id == $child_item->parent_id)
                                                    <li class="menu-item">
                                                        <a  href="{{$child_item->url}}" class="\">{{$child_item->title}}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                    <div class="nav-bar-brand">
                        <a href="/">
                            <img src="{{\App\Library\MediaHelpers::media(setting('sys_logo'))}}" alt="">
                            {{--                    <img src="https://www.shopas.net/storage/images/6BdfImoiWl_1640248137.png" alt="">--}}
                        </a>

                    </div>
                    <form action="" id="formProfile">
                        @csrf
                        <input type="hidden" name="user_id" id="user_id" value="">
                    </form>
                    <ul class="nav">

                        <li class="nav-log-in">
                            <a href="#" id="info">
                                <div class="loading"></div>
                            </a>
                        </li>

                        <li class="nav-log-in">
                            <a href="#" id="logout">
                                <div class="loading"></div>
                            </a>
                        </li>

                        {{--                     <li class="nav-regist">--}}
                        {{--                        <a href="/register"><i class="fas fa-user"></i> Đăng ký</a>--}}
                        {{--                    </li> --}}
                        {{--                     @if (App\Library\AuthCustom::check())--}}
                        {{--                        <li class="nav-log-in">--}}
                        {{--                            <a href="/thong-tin" ><i class="fas fa-user"></i> {{App\Library\AuthCustom::user()->fullname ? Str::limit(App\Library\AuthCustom::user()->fullname,10) : Str::limit(App\Library\AuthCustom::getName(),10)}}  -    $ {{App\Library\AuthCustom::user()->balance ? str_replace(',','.',number_format(Str::limit(App\Library\AuthCustom::user()->balance,10))) : 0}} </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="nav-regist">--}}
                        {{--                            <a href="/logout"><i class="fas fa-user"></i> Đăng xuất</a>--}}
                        {{--                        </li>--}}
                        {{--                    @else--}}
                        {{--                        <li class="nav-log-in">--}}
                        {{--                            <a href="/login" ><i class="fas fa-user"></i> Đăng nhập </a>--}}
                        {{--                        </li>--}}
                        {{--                        <li class="nav-regist">--}}
                        {{--                            <a href="/register"><i class="fas fa-user"></i> Đăng ký</a>--}}
                        {{--                        </li>--}}
                        {{--                            <li class="nav-log-in">--}}
                        {{--                                <a href="/login" ><div class="loading"></div></a>--}}
                        {{--                            </li>--}}
                        {{--                            <li class="nav-regist">--}}
                        {{--                                <a href="/register"><i class="fas fa-user"></i> Đăng ký</a>--}}
                        {{--                            </li>--}}

                        {{--                    @endif --}}

                    </ul>
                    {{--                @else--}}
                    {{--                    <ul class="nav">--}}
                    {{--                        <li class="nav-log-in">--}}
                    {{--                            <a href="/" >--}}
                    {{--                                <div class="info">--}}
                    {{--                                    <i class="fas fa-user"></i> Nam Hải--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                        </li>--}}
                    {{--                        <li class="nav-register">--}}
                    {{--                            <a href="/logout"><i class="fas fa-user"></i> Đăng xuất</a>--}}
                    {{--                        </li>--}}
                    {{--                    </ul>--}}
                    {{--                @endif--}}
                </div>
                <div class="nav-bar-category-mobile">
                <span>
                    <a href="#" id="info_mobile">
                        <div class="loading"></div>
                    </a>
                     <a href="#" id="logout_mobile">
                        <div class="loading"></div>
                    </a>
                </span>

                    {{--                @if (App\Library\AuthCustom::check())--}}
                    {{--                    <span>--}}
                    {{--                        <a href="/profile"> {{App\Library\AuthCustom::user()->fullname ? Str::limit(App\Library\AuthCustom::user()->fullname,10) : Str::limit(App\Library\AuthCustom::getName(),10)}}  -   $ {{App\Library\AuthCustom::user()->balance ? str_replace(',','.',number_format(Str::limit(App\Library\AuthCustom::user()->balance,10))) : 0}} </a>--}}
                    {{--                        <a href="/logout">Đăng xuất</a>--}}
                    {{--                    </span>--}}
                    {{--                @else--}}
                    {{--                    <span>--}}
                    {{--                        <a href="/login"> Đăng nhập</a>--}}
                    {{--                        <a href="/register">Đăng ký</a>--}}
                    {{--                    </span>--}}
                    {{--                @endif--}}
                    <label class="nav-bar-category-mobile-input" for="nav_mobile_input"><i class="fas fa-bars"></i></label>
                    <input type="checkbox" hidden class="name_input" id="nav_mobile_input" >
                    <nav class="nav_mobile">
                        <ul class="">
                            @include('frontend.widget.__menu_category_mobile')
                        </ul>
                        <ul class="">
                            <li>
                                <a href="#" id="info_tab_mobile"  class="nav_mobile-log-in">
                                    <div class="loading"></div>
                                </a>
                            </li>
                            <li>
                                <a href="#" id="logout_tab_mobile"  class="nav_mobile-log-in">
                                    <div class="loading"></div>
                                </a>
                            </li>

                            {{--                        @if (App\Library\AuthCustom::check())--}}
                            {{--                           --}}
                            {{--                            <li><a href="/login" class="nav_mobile-log-in"><i class="fas fa-user"></i> {{App\Library\AuthCustom::user()->fullname ? Str::limit(App\Library\AuthCustom::user()->fullname,10) : Str::limit(App\Library\AuthCustom::getName(),10)}}  -   $ {{App\Library\AuthCustom::user()->balance ? str_replace(',','.',number_format(Str::limit(App\Library\AuthCustom::user()->balance,10))) : 0}} </a></li>--}}
                            {{--                            <li><a href="/logout" class="nav_mobile-log-in"><i class="fas fa-user"></i>   Đăng xuất</a></li>--}}
                            {{--                        @else--}}
                            {{--                            <li><a href="/login" class="nav_mobile-log-in"><i class="fas fa-user"></i>   Đăng nhập</a></li>--}}
                            {{--                            <li><a href="/regist" class="nav_mobile-log-in"><i class="fas fa-user"></i>   Đăng ký</a></li>--}}
                            {{--                        @endif--}}

                        </ul>
                    </nav>
                </div>
                <form id="logout-form" action="{{ url('/ajax/logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        @endif
    </div>
</header>

