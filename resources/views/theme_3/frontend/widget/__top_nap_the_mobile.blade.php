<div class="top-list row d-md-none d-block mt-fix-20">
    <div class=" col-md-12" >
        <p class="text-center"><img src="/assets/frontend/{{theme('')->theme_key}}/image/star_top.png" alt=""> Top nạp T{{Carbon\Carbon::now()->month}}</p>
{{--        <div class="top-days default-tab">--}}
{{--            <ul class="nav justify-content-between row pr-fix-16 pl-fix-16" role="tablist" >--}}
{{--                <li class="nav-item col-md-12 p-md-0" role="presentation">--}}
{{--                    <a  class=" active pb-fix-8 d-flex justify-content-center" id="sevendays-tab" data-toggle="tab" href="#sevendays" role="tab" aria-selected="true"> TOP NẠP THẺ THÁNG 0{{Carbon\Carbon::now()->month}}</a>--}}
{{--                </li >--}}
{{--                <li class="nav-item col-4 col-md-4 p-0 p-md-0" role="presentation">--}}
{{--                    <a  class="pb-fix-8 d-flex justify-content-center"  id="thirtyday-minigame-tab" data-toggle="tab" href="#thirtydays-minigame" role="tab" aria-selected="false"> 30 ngày</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item col-4 col-md-4 p-0 p-md-0" role="presentation">--}}
{{--                    <a  class=" pb-fix-8 d-flex justify-content-center" id="sixty-minigame-tab" data-toggle="tab" href="#sixtydays-minigame" role="tab" aria-selected="false">60 ngày</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
        <div class="top-content tab-content mt-fix-20">
            <div class="tab-pane fade active show item-top mt-3" id="sevendays-minigame" role="tabpanel" aria-labelledby="sevendays-minigame-tab" >
                <div class="item-top-content">
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

                <div class="footer-row-ct d-lg-none d-block">
                    <div  class="col-md-12 left-right text-center js-toggle-content">
                        <div class="view-more-top ">
                            Xem thêm <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/xemthem.svg" alt="">
                        </div>
                        <div class="view-less-top ">
                            Rút gọn <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/rutgon.svg" alt="">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
