{{--<div class="top-days default-tab pr-fix-16 pl-fix-16">--}}
{{--    <ul class="nav justify-content-between row" role="tablist" >--}}
{{--        <li class="nav-item col-md-12 p-md-0" role="presentation">--}}
{{--            <a  class=" active pb-fix-8 d-flex justify-content-center" id="sevendays-tab" data-toggle="tab" href="#sevendays" role="tab" aria-selected="true"> TOP NẠP THẺ THÁNG 0{{Carbon\Carbon::now()->month}}</a>--}}
{{--        </li >--}}
{{--        <li class="nav-item col-md-4 p-md-0" role="presentation">--}}
{{--            <a  class="pb-fix-8 pb-fix-8 d-flex justify-content-center"  id="thirtyday-tab" data-toggle="tab" href="#thirtydays" role="tab" aria-selected="false"> 30 ngày</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item col-md-4 p-md-0" role="presentation">--}}
{{--            <a  class="pb-fix-8 pb-fix-8 d-flex justify-content-center" id="sixty-tab" data-toggle="tab" href="#sixtydays" role="tab" aria-selected="false">60 ngày</a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</div>--}}
{{--<div class="top-content tab-content">--}}
    <div class="tab-pane fade active show item-top mt-3 mt-fix-20" id="sevendays" role="tabpanel" aria-labelledby="sevendays-tab" >
        @if(isset($data))
            <ul class="nav flex-column">
                @foreach($data as $index => $item)
                    @if($index<8)
                        @if($index<3)
                            <li class="d-flex">
                                <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/top_star.png" alt=""></span>
                                <span class="top-name">{{$item->fullname ? $item->fullname : $item->username}}</span>
                                <span class="float-right top-amount">{{str_replace(',','.',number_format($item->amount))}}đ</span>
                            </li>
                        @else
                            <li class="d-flex">
                                <span class="top-rank"><div style="">{{$index+1}}</div></span>
                                <span class="top-name">{{$item->fullname ? $item->fullname : $item->username}}</span>
                                <span class="float-right top-amount">{{str_replace(',','.',number_format($item->amount))}}đ</span>
                            </li>
                        @endif

                    @endif
                @endforeach

            </ul>
        @endif
    </div>
{{--    <div class="tab-pane fade item-top mt-3" id="thirtydays" role="tabpanel" aria-labelledby="thirtyday-tab">--}}
{{--        <ul class="nav flex-column">--}}
{{--            <li class="d-flex">--}}
{{--                <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/top_star.png" alt=""></span>--}}
{{--                <span class="top-name">Tên dài hai dòng </span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}
{{--            <li class="d-flex">--}}
{{--                <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/top_star.png" alt=""></span>--}}
{{--                <span class="top-name">Tên dài </span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}
{{--            <li class="d-flex">--}}
{{--                <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/top_star.png" alt=""></span>--}}
{{--                <span class="top-name">Tên dài </span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}
{{--            <li class="d-flex">--}}
{{--                <span class="top-rank"><div style="">4</div></span>--}}
{{--                <span class="top-name">Tên dài hai dòng Tên dài hai dòng</span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}
{{--            <li class="d-flex">--}}
{{--                <span class="top-rank"><div style="">5</div></span>--}}
{{--                <span class="top-name">Tên dài hai dòngg</span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}
{{--            <li class="d-flex">--}}
{{--                <span class="top-rank"><div style="">6</div></span>--}}
{{--                <span class="top-name">Tên dài hai dòngg</span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}


{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="tab-pane  fade item-top mt-3" id="sixtydays"  role="tabpanel" aria-labelledby="sixty-tab">--}}
{{--        <ul class="nav flex-column">--}}
{{--            <li class="d-flex">--}}
{{--                <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/top_star.png" alt=""></span>--}}
{{--                <span class="top-name">Tên dài hai dòng </span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}
{{--            <li class="d-flex">--}}
{{--                <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/top_star.png" alt=""></span>--}}
{{--                <span class="top-name">Tên dài </span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}
{{--            <li class="d-flex">--}}
{{--                <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/top_star.png" alt=""></span>--}}
{{--                <span class="top-name">Tên dài </span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}
{{--            <li class="d-flex">--}}
{{--                <span class="top-rank"><div style="">4</div></span>--}}
{{--                <span class="top-name">Tên dài hai dòng Tên dài hai dòng</span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}
{{--            <li class="d-flex">--}}
{{--                <span class="top-rank"><div style="">5</div></span>--}}
{{--                <span class="top-name">Tên dài hai dòngg</span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}
{{--            <li class="d-flex">--}}
{{--                <span class="top-rank"><div style="">6</div></span>--}}
{{--                <span class="top-name">Tên dài hai dòngg</span>--}}
{{--                <span class="float-right top-amount">100.000.000đ</span>--}}
{{--            </li>--}}


{{--        </ul>--}}
{{--    </div>--}}
