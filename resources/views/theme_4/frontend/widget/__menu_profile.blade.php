<div class="col-12 col-md-4 col-lg-3  site-menu">

    <div class="menu-link">
        <div class="">
            <a href="#" class="menu-control">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="root-left c-font-uppercase">Menu tài khoản</h3>
                    <i class="fas fa-chevron-down"></i>
                </div>

            </a>

        </div>

        <ul class="nav list-menu-link">
            @foreach($data??[] as $item)
                <li class="nav-item {{ '/'.request()->path() == $item->url ? 'active' : ''}}">
                    @if($item->parent_id == 0)
                    <a href="{{ $item->url }}" class="">
                        @if($item->url == '/thong-tin')
                            <i class="far fa-address-book"></i>
                        @elseif($item->url == '/user/change-password')
                            <i class="fas fa-cogs"></i>
                        @elseif($item->url == '/lich-su-giao-dich')
                            <i class="far fa-clock"></i>
                        @elseif($item->url == '/lich-su-nap-the')
                            <i class="fas fa-file-invoice-dollar"></i>
                        @elseif($item->url == '/dich-vu-da-mua')
                            <i class="fas fa-shopping-bag"></i>
                        @elseif($item->url == '/nap-the')
                            <i class="fas fa-ticket-alt"></i>
                        @elseif($item->url == '/recharge-atm')
                            <i class="fas fa-ticket-alt"></i>
                        @elseif($item->url == '/the-cao-da-mua')
                            <i class="fas fa-history"></i>
                        @elseif($item->url == '/lich-su-mua-account')
                            <i class="fas fa-shopping-bag"></i>
                        @endif

                        {{ $item->title }}
                    </a>
                    @endif
                </li>
            @endforeach

        </ul>

    </div>

</div>


