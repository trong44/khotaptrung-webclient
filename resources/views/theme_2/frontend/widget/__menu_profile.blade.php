<div class="block-header">
    <div class="p-3 d-flex align-items-center">
        <div class="me-3">
            <img src="img/temp/avatar-80.png" class="rounded-circle avatar" alt="">
        </div>
        <div>
            <h6 class="mb-0" id="info_name"></h6>
            <p class="mb-0 text-secondary small" id="info_create"></p>
        </div>
        <div class="ms-auto">
            <a href="/" class="btn btn-outline-primary rounded-x ps-4 pe-4">Mua thẻ / data <i class="las la-angle-right"></i></a>
        </div>
    </div>
    <!-- BEGIN Tabs -->

    @if(isset($data))
    <ul class="nav nav-qp-tabs mb-0 ps-3 pe-3" role="tablist">
{{--        @foreach ($data as $key_child => $child_item)--}}
{{--        <li class="nav-item" role="presentation">--}}
{{--            <a class="nav-link {{ '/'.request()->path() == $child_item->url ? 'active' : ''}}" href="{{$child_item->url?$child_item->url:$child_item->slug}}" id="profile-tab" type="button" ><span><i class="las la-user"></i> {{$child_item->title}}</span></a>--}}
{{--        </li>--}}
        <li class="nav-item" role="presentation">
            <a class="nav-link @if(Request::is('thong-tin')) active @endif " href="/thong-tin" id="history-tab" type="button" ><span><i class="las la-user"></i> Thông tin tài khoản</span></a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link @if(Request::is('lich-su-giao-dich')) active @endif " href="/lich-su-giao-dich" id="history-tab" type="button" ><span><i class="las la-clock"></i> Lịch sử giao dịch</span></a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link  @if(Request::is('lich-su-nap-the')) active @endif " href="/lich-su-nap-the" id="deposit-tab"  type="button" ><span><i class="las la-clock"></i> Lịch sử nạp thẻ</span></a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link  @if(Request::is('the-cao-da-mua')) active @endif " href="/the-cao-da-mua" id="item-tab" type="button" role="tab" ><span><i class="las la-credit-card"></i> Thẻ cào đã mua</span></a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link  @if(Request::is('lich-su-atm-tu-dong')) active @endif " href="/lich-su-atm-tu-dong" id="tranfer-tab" type="button" ><span><i class="las la-credit-card"></i> Lịch sử nạp ATM</span></a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link  @if(Request::is('dich-vu-da-mua')) active @endif " href="/dich-vu-da-mua"  type="button" ><span><i class="las la-credit-card"></i> Dịch vụ đã mua</span></a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link  @if(Request::is('lich-su-mua-account')) active @endif " href="/lich-su-mua-account" id="tranfer-tab" type="button" ><span><i class="las la-credit-card"></i> Lịch sử mua acc</span></a>
        </li>
{{--        <li class="nav-item" role="presentation">--}}
{{--            <a class="nav-link  @if(Request::is('minigame-log')) active @endif " href="/minigame-log" id="tranfer-tab" type="button" ><span><i class="las la-credit-card"></i> Lịch sử minigame</span></a>--}}
{{--        </li>--}}
{{--        @endforeach--}}

    </ul>
    @endif
</div>
