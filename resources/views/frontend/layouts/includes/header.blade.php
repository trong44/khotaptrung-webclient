<header>
    <div class="nav-bar">
        <div class="nav-bar-container container">
            <div class="nav-bar-brand">
                <a href="/">
                    <img src="https://www.shopas.net/storage/images/6BdfImoiWl_1640248137.png" alt="">
                </a>

            </div>

            <div class="nav-bar-category">
                <ul class="nav">
                    <li class="menu-item">
                        <a href="/">Trang chủ</a>
                    </li>
                    <li class="menu-item">
                        <a href="/tin-tuc">Tin tức</a>
                        <ul class="sub-menu" >
                            <li class="menu-item">
                                <a  href="/blogs" class="\">Blogs</a>
                            </li>
                            <li class="menu-item">
                                <a  href="/dich-vu-game" class="\">Dịch vụ game</a>
                            </li>
                            <li class="menu-item">
                                <a  href="/dieu-khoan-su-dung" class="\">Điều khoản sử dụng</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="/lich-su-giao-dich">Tặng 100% giá trị thẻ nạp</a>
                    </li>

                </ul>
                @if(!session()->has('auth_token')){
                <ul class="nav">
                    <li class="nav-log-in">
                        <a href="/login" ><i class="fas fa-user"></i> Đăng nhập </a>
                    </li>
                    <li class="nav-regist">
                        <a href="/regist"><i class="fas fa-user"></i> Đăng ký</a>
                    </li>
                </ul>
                @else
                    <ul class="nav">
                        <li class="nav-log-in">
                            <a href="/" ><i class="fas fa-user"></i> Nam Hải </a>
                        </li>
                        <li class="nav-regist">
{{--                            <form action="{{route('logout')}}" method="Post">--}}
{{--                             @csrf--}}
{{--                                <button>--}}
{{--                                    Đnăg xuất--}}
{{--                                </button>--}}
{{--                            </form>--}}
                            <a href="/logout"><i class="fas fa-user"></i> Đăng xuất</a>
                        </li>
                    </ul>
                @endif
            </div>
            <div class="nav-bar-category-mobile">
                    <span>
                        <a href="/log-in">Đăng nhập</a>
                        <a href="/regist">Đăng ký</a>
                    </span>
                <label class="nav-bar-category-mobile-input" for="nav_mobile_input"><i class="fas fa-bars"></i></label>
                <input type="checkbox" hidden class="name_input" id="nav_mobile_input" >
                <nav class="nav_mobile">
                    <ul class="">
                        <li><a href="/">Trang chủ</a></li>
                        <li><a href="/lich-su-giao-dich">Tặng 100% gt thẻ nè</a></li>
                        <li><a href="/tin-tuc">tin tức</a></li>
                        <li>

                            <a data-toggle="collapse" class="nav_mobile-collapse" href="#menuchild_item" role="button" aria-expanded="true" aria-controls="collapseExample">nạp tiền</a>
                            <ul class="sub-menu collapse" id="menuchild_item">
                                <li class="menu-item">
                                    <a  href="/blogs" class="\">Blogs</a>
                                </li>
                                <li class="menu-item">
                                    <a  href="/dich-vu-game" class="\">Dịch vụ game</a>
                                </li>
                                <li class="menu-item">
                                    <a  href="/dieu-khoan-su-dung" class="\">Điều khoản sử dụng</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="">

                        <li><a href="/log-in" class="nav_mobile-log-in"><i class="fas fa-user"></i>   Đăng nhập</a></li>
                        <li><a href="/regist" class="nav_mobile-log-in"><i class="fas fa-user"></i>   Đăng ký</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</header>
