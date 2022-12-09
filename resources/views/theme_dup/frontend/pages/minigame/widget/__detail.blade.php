
@switch($position)
    @case('rubywheel')

    <div class="item_play_title">
        <h1>{{$result->group->title}}</h1>
        <div class="item_play_line"></div>
    </div>
    <div class="item_play_online_out">
        <div class="item_play_online"></div>
        @php
            echo "Số người đang chơi: ".number_format($numPlay)." (".rand(3,10)." bạn chung)";
        @endphp
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <marquee style="padding: 10px 0">{!!$currentPlayList!!}</marquee>
            <div class="item_spin">
                <a class="ani-zoom" id="start-played">
                    <img class="lazy" style="cursor: pointer" src="{{\App\Library\MediaHelpers::media($result->group->image_icon)}}" alt="{{$result->group->title}}">
                </a>
                <img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}" alt="{{$result->group->title}}" id="rotate-play">
            </div>

            @if($result->checkVoucher==1)
                <div class="item_spin_sale-off">
                    <input type="text" placeholder="Nhập mã giảm giá">
                </div>
            @endif

            @if($result->checkPoint==1)
                <div class="item_spin_progress">
                    <div class="item_spin_progress_bubble {{$result->pointuser > 99 ? 'clickgif' : ''}}" style="width: {{$result->pointuser<100?$result->pointuser:'100'}}%"></div>
                    <div class="item_spin_progress_percent">{{$result->pointuser}}/100 point</div>
                </div>
                <div class="pyro" style="position: absolute;top: 0;left: 0;width: 182px;height: 37px;display:none"><div class="before"></div><div class="after"></div></div>
            @endif
            <div class="item_spin_dropdown">
                <select name="" id="numrolllop">
                    <option value="1">Mua X1/{{$result->group->price/1000}}k 1 lần quay</option>
                    @if($result->group->params->price_sticky_3 > 0))
                    <option value="3">Mua X3/{{$result->group->params->price_sticky_3/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_5 > 0))
                    <option value="5">Mua X5/{{$result->group->params->price_sticky_5/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_7 > 0))
                    <option value="7">Mua X7/{{$result->group->params->price_sticky_7/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_10 > 0))
                    <option value="10">Mua X10/{{$result->group->params->price_sticky_10/1000}}k 1 lần quay</option>
                    @endif
                </select>
            </div>
            <div class="item_spin_num_play">
                Giá {{number_format($result->group->price)}}/lượt chơi
            </div>

            <div class="item_play_try">
                @if($result->group->params->is_try == 1)
                    <a class="btn btn-primary num-play-try">Chơi thử</a>
                @endif
                <a class="btn btn-success" id="start-played"><i class="fas fa-bolt"></i> Quay ngay</a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="item_spin_category">
                <a href="#" class="btn btn-success thele" data-toggle="modal" data-target="#theleModal">
                    Thể lệ
                </a>
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#topquaythuongModal">
                    Top quay thưởng
                </a>
                <a href="{{route('getWithdrawItem',[$result->group->params->game_type])}}" class="btn btn-success">
                    Rút Vip
                </a>
                <a href="{{route('getLog',[$result->group->id])}}" class="btn btn-success">
                    Lịch sử quay
                </a>

            </div>
            <div class="item_spin_title">
                <p>Lượt quay gần đây</p>
            </div>
            <div class="item_spin_list">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Tài khoản</th>
                        <th>Giải thưởng</th>
                        <th>Thời gian</th>
                    </tr>

                    </thead>
                    <tbody>
                    @php
                        $count = 0;
                        $countname = 0;
                        $listname = explode(",",$result->group->params->user_wheel);
                        $listprice = explode(",",$result->group->params->user_wheel_order);
                    @endphp
                    @foreach($result->log as $item)
                        @php
                            $count++;
                            $add_time=strtotime($item->created_at)+rand(1,2);
                            $add_date= date('Y-m-d H:i:s',$add_time);
                        @endphp
                        @if($count==5 && isset($listname[$countname]) && $listname[$countname]!="" && isset($listprice[$countname]) && $listprice[$countname]!="")
                            <tr>
                                <td>{{substr(trim($listname[$countname]),0,3)."***".substr(trim($listname[$countname]),-2)}}</td>
                                <td>{{trim($listprice[$countname])}}</td>
                                <td>{{\Carbon\Carbon::parse($add_time)->format('Y-m-d H:i')}}</td>
                            </tr>
                        @endif
                        @php
                            if($count==5){
                                $count = 0;
                                $countname++;
                            }
                        @endphp
                        <tr>
                            <td>{{substr($item->author->username,0,3)."***".substr($item->author->username,-2)}}</td>
                            <td>{{$item->item_ref->parrent->title??""}}</td>
                            <td>{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <a class="item_spin_list_more"><i class="fas fa-arrow-down"></i> Xem thêm</a>
            <a  class="item_spin_list_less"><i class="fas fa-arrow-down"></i> Ẩn bớt</a>
        </div>
    </div>

    @break

    @case('flip')

    <div class="item_play_title">
        <p>{{$result->group->title}}</p>
        <div class="item_play_line"></div>

    </div>
    <div class="item_play_online_out">
        <div class="item_play_online"></div>
        @php
            echo "Số người đang chơi: ".number_format($numPlay)." (".rand(3,10)." bạn chung)";
        @endphp
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <marquee style="padding: 10px 0">{!!$currentPlayList!!}</marquee>
            <div class="row boxflip">
                @for ($i = 0; $i < count($result->group->items); $i++)
                    <div class='flipimg col-4 col-sm-4 col-lg-4 flip-box'>
                        <div data-inner=" inner{{$i}}" class="item_flip_inner">
                            <img class="lazy" class="imgnen" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}">
                            <img class="lazy" data-inner="inner{{$i}}" class="flip-box-front inner{{$i}} item_flip_inner_image" src="{{ \App\Library\MediaHelpers::media($result->group->params->image_static) }}">
                        </div>
                    </div>
                @endfor
            </div>
            <div class="row" id="boxfliphide" style="display: none;">
                @for ($i = 0; $i < count($result->group->items); $i++)
                    <div class='flipimg col-4 col-sm-4 col-lg-4 flip-box'>
                        <div data-inner=" inner{{$i}}" class="item_flip_inner">
                            <img class="lazy" class="imgnen" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}">
                            <img class="lazy" data-inner="inner{{$i}}" class="flip-box-front img_remove inner{{$i}} item_flip_inner_image" src="{{ \App\Library\MediaHelpers::media($result->group->params->image_static) }}">
                        </div>
                    </div>
                @endfor
            </div>
            @if($result->checkVoucher==1)
                <div class="item_spin_sale-off">
                    <input type="text" placeholder="Nhập mã giảm giá">
                </div>
            @endif

            @if($result->checkPoint==1)
                <div class="item_spin_progress">
                    <div class="item_spin_progress_bubble {{$result->pointuser > 99 ? 'clickgif' : ''}}" style="width: {{$result->pointuser<100?$result->pointuser:'100'}}%"></div>
                    <div class="item_spin_progress_percent">{{$result->pointuser==''?'0':$result->pointuser}}/100 point</div>
                </div>
                <div class="pyro" style="position: absolute;top: 0;left: 0;width: 182px;height: 37px;display:none"><div class="before"></div><div class="after"></div></div>
            @endif
            <div class="item_spin_dropdown">
                <select name="" id="numrolllop">
                    <option value="1">Mua X1/{{$result->group->price/1000}}k 1 lần lật</option>
                    @if($result->group->params->price_sticky_3 > 0))
                    <option value="3">Mua X3/{{$result->group->params->price_sticky_3/1000}}k 1 lần lật</option>
                    @endif
                    @if($result->group->params->price_sticky_5 > 0))
                    <option value="5">Mua X5/{{$result->group->params->price_sticky_5/1000}}k 1 lần lật</option>
                    @endif
                    @if($result->group->params->price_sticky_7 > 0))
                    <option value="7">Mua X7/{{$result->group->params->price_sticky_7/1000}}k 1 lần lật</option>
                    @endif
                    @if($result->group->params->price_sticky_10 > 0))
                    <option value="10">Mua X10/{{$result->group->params->price_sticky_10/1000}}k 1 lần lật</option>
                    @endif
                </select>
            </div>
            <div class="item_spin_num_play">
                Giá {{number_format($result->group->price)}}/lượt chơi
            </div>

            <div class="item_play_try">
                @if($result->group->params->is_try == 1)
                    <a class="btn btn-primary num-play-try">Chơi thử</a>
                @endif
                <a class="btn btn-success play" id="start-played"><i class="fas fa-bolt"></i> Chơi ngay</a>
                <!-- <a class="btn btn-success continue" style="display: none"><i class="fas fa-bolt"></i> Chơi tiếp</a> -->
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="item_spin_category">
                <a href="#" class="btn btn-success thele" data-toggle="modal" data-target="#theleModal">
                    Thể lệ
                </a>
                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#topquaythuongModal">
                    Top lật thưởng
                </a>
                <a href="{{route('getWithdrawItem',[$result->group->params->game_type])}}" class="btn btn-success">
                    Rút Vip
                </a>
                <a href="{{route('getLog',[$result->group->id])}}" class="btn btn-success">
                    Lịch sử lật
                </a>

            </div>
            <div class="item_spin_title">
                <p>Lượt lật gần đây</p>
            </div>
            <div class="item_spin_list">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            Tài khoản</th>
                        <th>Giải thưởng</th>
                        <th>Thời gian</th>
                    </tr>

                    </thead>
                    <tbody>
                    @php
                        $count = 0;
                        $countname = 0;
                        $listname = explode(",",$result->group->params->user_wheel);
                        $listprice = explode(",",$result->group->params->user_wheel_order);
                    @endphp
                    @foreach($result->log as $item)
                        @php
                            $count++;
                            $add_time=strtotime($item->created_at)+rand(1,2);
                            $add_date= date('Y-m-d H:i:s',$add_time);
                        @endphp
                        @if($count==5 && isset($listname[$countname]) && $listname[$countname]!="" && isset($listprice[$countname]) && $listprice[$countname]!="")
                            <tr>
                                <td>{{substr(trim($listname[$countname]),0,3)."***".substr(trim($listname[$countname]),-2)}}</td>
                                <td>{{trim($listprice[$countname])}}</td>
                                <td>{{\Carbon\Carbon::parse($add_time)->format('Y-m-d H:i')}}</td>
                            </tr>
                        @endif
                        @php
                            if($count==5){
                                $count = 0;
                                $countname++;
                            }
                        @endphp
                        <tr>
                            <td>{{substr($item->author->username,0,3)."***".substr($item->author->username,-2)}}</td>
                            <td>{{$item->item_ref->parrent->title??""}}</td>
                            <td>{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <a class="item_spin_list_more"><i class="fas fa-arrow-down"></i> Xem thêm</a>
            <a  class="item_spin_list_less"><i class="fas fa-arrow-down"></i> Ẩn bớt</a>
        </div>
    </div>

    @break

    @case('slotmachine')

    <div class="item_play_title">
        <h1>{{$result->group->title}}</h1>
        <div class="item_play_line"></div>
    </div>
    <div class="item_play_online_out">
        <div class="item_play_online"></div>
        @php
            echo "Số người đang chơi: ".number_format($numPlay)." (".rand(3,10)." bạn chung)";
        @endphp
    </div>
    <div class="row d-flex justify-content-between">
        <div class="col-lg-9 col-md-12">
            <marquee style="padding: 10px 0">{!!$currentPlayList!!}</marquee>
            <div class="item_slot" style="background: url({{\App\Library\MediaHelpers::media($result->group->params->image_background)}})" >
                <div class="item_slot_inner">
                    <div id="slot1"  class="item_slot_inner_img a1" style=""></div>
                    <div id="slot2" class="item_slot_inner_img a1" style=""></div>
                    <div id="slot3" class="item_slot_inner_img a1" style=""></div>
                </div>
            </div>
            @if($result->checkVoucher==1)
                <div class="item_spin_sale-off">
                    <input type="text" placeholder="Nhập mã giảm giá">
                </div>
            @endif

            @if($result->checkPoint==1)
                <div class="item_spin_progress">
                    <div class="item_spin_progress_bubble {{$result->pointuser > 99 ? 'clickgif' : ''}}" style="width: {{$result->pointuser<100?$result->pointuser:'100'}}%"></div>
                    <div class="item_spin_progress_percent">{{$result->pointuser}}/100 point</div>
                </div>
                <div class="pyro" style="position: absolute;top: 0;left: 0;width: 182px;height: 37px;display:none"><div class="before"></div><div class="after"></div></div>
            @endif
            <div class="item_spin_dropdown">
                <select name="" id="numrolllop">
                    <option value="1">Mua X1/{{$result->group->price/1000}}k 1 lần quay</option>
                    @if($result->group->params->price_sticky_3 > 0))
                    <option value="3">Mua X3/{{$result->group->params->price_sticky_3/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_5 > 0))
                    <option value="5">Mua X5/{{$result->group->params->price_sticky_5/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_7 > 0))
                    <option value="7">Mua X7/{{$result->group->params->price_sticky_7/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_10 > 0))
                    <option value="10">Mua X10/{{$result->group->params->price_sticky_10/1000}}k 1 lần quay</option>
                    @endif
                </select>
            </div>
            <div class="item_spin_num_play">
                Giá {{number_format($result->group->price)}}/lượt chơi
            </div>

            <div class="item_play_try">
                @if($result->group->params->is_try == 1)
                    <a class="btn btn-primary num-play-try">Chơi thử</a>
                @endif
                <a class="btn btn-success" id="start-played"><i class="fas fa-bolt"></i> Quay ngay</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="item_play_category thele">
                <a  class="col-sm-12 btn btn-success">Thể lệ</a>
            </div>
            <div class="item_play_category luotquay">
                <a class="btn btn-success col-sm-12" data-toggle="modal" data-target="#luotquayModal">Lượt chơi gần đây</a>
            </div>

            <div class="item_play_category">
                <a href="{{route('getLog',[$result->group->id])}}" class="col-sm-12 btn btn-success">Lịch sử trúng vật phẩm</a>
            </div>
            <div class="item_play_category">
                <a  class="col-sm-12 btn btn-success"  data-toggle="modal" data-target="#topquaythuongModal">Top quay thưởng</a>
            </div>
        </div>
    </div>

    @break

    @case('slotmachine5')

    <div class="item_play_title">
        <h1>{{$result->group->title}}</h1>
        <div class="item_play_line"></div>

    </div>
    <div class="item_play_online_out">
        <div class="item_play_online"></div>
        @php
            echo "Số người đang chơi: ".number_format($numPlay)." (".rand(3,10)." bạn chung)";
        @endphp
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-7">
            <marquee style="padding: 10px 0">{!!$currentPlayList!!}</marquee>
            <div class="item_play_spin_five_record" style="background-image: url({{\App\Library\MediaHelpers::media($result->group->params->image_background)}})" >
                <div class="item_five_record_inner">
                    <div id="slot1"  class="item_five_record_inner_img a1" style=""></div>
                    <div id="slot2" class="item_five_record_inner_img a1" style=""></div>
                    <div id="slot3" class="item_five_record_inner_img a1" style=""></div>
                    <div id="slot4" class="item_five_record_inner_img a1" style=""></div>
                    <div id="slot5" class="item_five_record_inner_img a1" style=""></div>
                </div>
                @if($result->checkVoucher==1)
                    <div class="item_play_spin_sale-off">
                        <input type="text" placeholder="Nhập mã giảm giá">
                    </div>
                @endif

                @if($result->checkPoint==1)
                    <div class="item_play_spin_progress">
                        <div class="item_play_spin_progress_bubble {{$result->pointuser > 99 ? 'clickgif' : ''}}" style="width: {{$result->pointuser<100?$result->pointuser:'100'}}%"></div>
                        <div class="item_play_spin_progress_percent">{{$result->pointuser}}/100 point</div>
                        <div class="pyro" style="position: absolute;top: 0;left: 0;width: 182px;height: 37px;display:none"><div class="before"></div><div class="after"></div></div>
                    </div>
                @endif
            </div>

            <div class="item_play_dropdown">
                <select name="" id="numrolllop">
                    <option value="1">Mua X1/{{$result->group->price/1000}}k 1 lần quay</option>
                    @if($result->group->params->price_sticky_3 > 0))
                    <option value="3">Mua X3/{{$result->group->params->price_sticky_3/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_5 > 0))
                    <option value="5">Mua X5/{{$result->group->params->price_sticky_5/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_7 > 0))
                    <option value="7">Mua X7/{{$result->group->params->price_sticky_7/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_10 > 0))
                    <option value="10">Mua X10/{{$result->group->params->price_sticky_10/1000}}k 1 lần quay</option>
                    @endif
                </select>
            </div>
            <div class="item_spin_num_play">
                Giá {{number_format($result->group->price)}}/lượt chơi
            </div>

            <div class="item_play_try">
                @if($result->group->params->is_try == 1)
                    <a class="btn btn-primary num-play-try">Chơi thử</a>
                @endif
                <a class="btn btn-success" id="start-played"><i class="fas fa-bolt"></i> Quay ngay</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="item_play_category thele">
                <a  class="col-sm-12 btn btn-success">Thể lệ</a>
            </div>
            <div class="item_play_category luotquay">
                <a class="btn btn-success col-sm-12" data-toggle="modal" data-target="#luotquayModal">Lượt chơi gần đây</a>
            </div>

            <div class="item_play_category">
                <a href="{{route('getLog',[$result->group->id])}}" class="col-sm-12 btn btn-success">Lịch sử trúng vật phẩm</a>
            </div>
            <div class="item_play_category">
                <a  class="col-sm-12 btn btn-success"  data-toggle="modal" data-target="#topquaythuongModal">Top quay thưởng</a>
            </div>
        </div>
    </div>

    @break

    @case('squarewheel')

    <div class="item_play_title">
        <h1>{{$result->group->title}}</h1>
        <div class="item_play_line"></div>

    </div>
    <div class="item_play_online_out">
        <div class="item_play_online"></div>
        @php
            echo "Số người đang chơi: ".number_format($numPlay)." (".rand(3,10)." bạn chung)";
        @endphp
    </div>
    <div class="row d-flex justify-content-between">
        <div class="col-lg-9 col-md-8">
            <marquee style="padding: 10px 0">{!!$currentPlayList!!}</marquee>
            <div class="item_square" style="display: flex; flex-wrap: wrap;" >
                <table id="squaredesktop" class="square">
                    <tr>
                        <td></td>
                        <td><div  data-num="1" class="gift1 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                        <td><div  data-num="2" class="gift2 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                        <td><div  data-num="3" class="gift3 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><div  data-num="12" class="gift12 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                        <td colspan="3"></td>
                        <td><div  data-num="4" class="gift4 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                    </tr>
                    <tr>
                        <td><div data-num="11" class="gift11 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                        <td colspan="3">
                            <div class="outer-btn">
                                <div class="play btn m-btn m-btn--custom m-btn--icon m-btn--pill" style="" id="start-played">
                                    <img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->image_icon)}}" alt="" style="">
                                </div>
                            </div>
                        </td>
                        <td><div  data-num="5" class="gift5 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                    </tr>
                    <tr>
                        <td><div  data-num="10" class="gift10 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                        <td colspan="3"></td>
                        <td><div  data-num="6" class="gift6 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><div  data-num="9" class="gift9 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                        <td><div  data-num="8" class="gift8 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                        <td><div  data-num="7" class="gift7 box"><img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}"/></div></td>
                        <td></td>
                    </tr>
                </table>


            </div>

            @if($result->checkVoucher==1)
                <div class="item_spin_sale-off">
                    <input type="text" placeholder="Nhập mã giảm giá">
                </div>
            @endif

            @if($result->checkPoint==1)
                <div class="item_spin_progress">
                    <div class="item_spin_progress_bubble {{$result->pointuser > 99 ? 'clickgif' : ''}}" style="width: {{$result->pointuser<100?$result->pointuser:'100'}}%"></div>
                    <div class="item_spin_progress_percent">{{$result->pointuser}}/100 point</div>
                </div>
                <div class="pyro" style="position: absolute;top: 0;left: 0;width: 182px;height: 37px;display:none"><div class="before"></div><div class="after"></div></div>
            @endif
            <div class="item_spin_dropdown">
                <select name="" id="numrolllop">
                    <option value="1">Mua X1/{{$result->group->price/1000}}k 1 lần quay</option>
                    @if($result->group->params->price_sticky_3 > 0))
                    <option value="3">Mua X3/{{$result->group->params->price_sticky_3/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_5 > 0))
                    <option value="5">Mua X5/{{$result->group->params->price_sticky_5/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_7 > 0))
                    <option value="7">Mua X7/{{$result->group->params->price_sticky_7/1000}}k 1 lần quay</option>
                    @endif
                    @if($result->group->params->price_sticky_10 > 0))
                    <option value="10">Mua X10/{{$result->group->params->price_sticky_10/1000}}k 1 lần quay</option>
                    @endif
                </select>
            </div>
            <div class="item_spin_num_play">
                Giá {{number_format($result->group->price)}}/lượt chơi
            </div>

            <div class="item_play_try">
                @if($result->group->params->is_try == 1)
                    <a class="btn btn-primary num-play-try">Chơi thử</a>
                @endif
                <a class="btn btn-success" id="start-played"><i class="fas fa-bolt"></i> Quay ngay</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="item_play_category">
                <a href="#" class="btn btn-success thele" data-toggle="modal" data-target="#theleModal">
                    Thể lệ
                </a>
            </div>
            <div class="item_play_category">
                <a class="btn btn-success col-sm-12" data-toggle="modal" data-target="#luotquayModal">Lượt chơi gần đây</a>
            </div>

            <div class="item_play_category">
                <a href="{{route('getLog',[$result->group->id])}}" class="col-sm-12 btn btn-success">Lịch sử chơi trúng vật phẩm</a>
            </div>
            <div class="item_play_category">
                <a  class="col-sm-12 btn btn-success"  data-toggle="modal" data-target="#topquaythuongModal">Top quay thưởng</a>
            </div>
        </div>


    </div>

    @break

    @case('smashwheel')
    @case('rungcay')
    @case('gieoque')

    <div class="item_play_title">
        <h1>{{$result->group->title}}</h1>
        <div class="item_play_line"></div>

    </div>
    <div class="item_play_online_out">
        <div class="item_play_online"></div>
        @php
            echo "Số người đang chơi: ".number_format($numPlay)." (".rand(3,10)." bạn chung)";
        @endphp
    </div>
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12">
            <marquee style="padding: 10px 0">{!!$currentPlayList!!}</marquee>
            <div class="item_play_spin">
                @if($result->checkVoucher==1)
                    <div class="item_play_spin_sale-off">
                        <input type="text" placeholder="Nhập mã giảm giá">
                    </div>
                @endif

                <div id="start-played" class="item_play_spin_shake">
                    <img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->image_icon)}}">
                </div>

                @if($result->checkPoint==1)
                    <div class="item_play_spin_progress">
                        <div class="item_play_spin_progress_bubble {{$result->pointuser > 99 ? 'clickgif' : ''}}" style="width: {{$result->pointuser<100?$result->pointuser:'100'}}%"></div>
                        <div class="item_play_spin_progress_percent">{{$result->pointuser==''?'0':$result->pointuser}}/100 point</div>
                    </div>
                @endif

                <img class="lazy" src="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}" id="lac_lixi" style="width: 100%;max-width: 100%;opacity: 1;background: url({{\App\Library\MediaHelpers::media($result->group->params->image_background)}}) no-repeat center center;background-size: contain;" alt="">
                <input type="hidden" value="{{\App\Library\MediaHelpers::media($result->group->params->image_static)}}" id="hdImageLD">
                <input type="hidden" value="{{\App\Library\MediaHelpers::media($result->group->params->image_animation)}}" id="hdImageDapLu">
            </div>
            <div class="pyro" style="position: absolute;top: 0;left: 0;width: 182px;height: 37px;display:none"><div class="before"></div><div class="after"></div></div>
            <div class="item_spin_dropdown">
                <select name="" id="numrolllop">
                    <option value="1">Mua X1/{{$result->group->price/1000}}k 1 lần chơi</option>
                    @if($result->group->params->price_sticky_3 > 0))
                    <option value="3">Mua X3/{{$result->group->params->price_sticky_3/1000}}k 1 lần chơi</option>
                    @endif
                    @if($result->group->params->price_sticky_5 > 0))
                    <option value="5">Mua X5/{{$result->group->params->price_sticky_5/1000}}k 1 lần chơi</option>
                    @endif
                    @if($result->group->params->price_sticky_7 > 0))
                    <option value="7">Mua X7/{{$result->group->params->price_sticky_7/1000}}k 1 lần chơi</option>
                    @endif
                    @if($result->group->params->price_sticky_10 > 0))
                    <option value="10">Mua X10/{{$result->group->params->price_sticky_10/1000}}k 1 lần chơi</option>
                    @endif
                </select>
            </div>
            <div class="item_spin_num_play">
                Giá {{number_format($result->group->price)}}/lượt chơi
            </div>

            <div class="item_play_try">
                @if($result->group->params->is_try == 1)
                    <a class="btn btn-primary num-play-try">Chơi thử</a>
                @endif
                <a class="btn btn-success" id="start-played"><i class="fas fa-bolt"></i> chơi ngay</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="item_play_category">
                <a href="#" class="col-sm-12 btn btn-success" data-toggle="modal" data-target="#theleModal">Thể lệ</a>
            </div>
            <div class="item_play_category">
                <a class="btn btn-success col-sm-12" data-toggle="modal" data-target="#luotquayModal">Lượt chơi gần đây</a>
            </div>
            <div class="item_play_category">
                <a href="{{route('getLog',[$result->group->id])}}" class="col-sm-12 btn btn-success">Lịch sử chơi</a>
            </div>
            <div class="item_play_category">
                <a href="#" class="col-sm-12 btn btn-success" data-toggle="modal" data-target="#topquaythuongModal">Top quay thưởng</a>
            </div>
        </div>
    </div>

    @break
@endswitch

<div class="item_play_intro ">
    <div class="item_play_intro_content">
        {!!$result->group->content!!}
    </div>
    <span class="item_play_intro_viewmore">Xem tất cả »</span>
    <span class="item_play_intro_viewless">Thu gọn »</span>
</div>

@switch($position)
    @case('slotmachine')
    @case('slotmachine5')
    @case('squarewheel')
    @case('smashwheel')
    @case('rungcay')
    @case('gieoque')
    <div class="modal fade" id="luotquayModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center;margin: auto;padding-left: 60px">Lượt chơi gần đây</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                    <div class="c-content-title-1" style="margin: 0 auto">
                    </div>
                    <div class="list-roll-inner" style="width: 100%">
                        <table cellpadding="10" class="table table-striped">
                            <tbody>
                            <tr>
                                <th>Tài khoản</th>
                                <th>Giải thưởng</th>
                                <th>Thời gian</th>
                            </tr>
                            </tbody>
                            <tbody>
                            @php
                                $count = 0;
                                $countname = 0;
                                $listname = explode(",",$result->group->params->user_wheel);
                                $listprice = explode(",",$result->group->params->user_wheel_order);
                            @endphp
                            @foreach($result->log as $item)
                                @php
                                    $count++;
                                    $add_time=strtotime($item->created_at)+rand(1,2);
                                    $add_date= date('Y-m-d H:i:s',$add_time);
                                @endphp
                                @if($count==5 && isset($listname[$countname]) && $listname[$countname]!="" && isset($listprice[$countname]) && $listprice[$countname]!="")
                                    <tr>
                                        <td>{{substr(trim($listname[$countname]),0,3)."***".substr(trim($listname[$countname]),-2)}}</td>
                                        <td>{{trim($listprice[$countname])}}</td>
                                        <td>{{\Carbon\Carbon::parse($add_time)->format('Y-m-d H:i')}}</td>
                                    </tr>
                                @endif
                                @php
                                    if($count==5){
                                        $count = 0;
                                        $countname++;
                                    }
                                @endphp
                                <tr>
                                    <td>{{substr($item->author->username,0,3)."***".substr($item->author->username,-2)}}</td>
                                    <td>{{$item->item_ref->parrent->title??""}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng
                    </button>
                </div>
            </div>
        </div>
    </div>
@endswitch

<div class="modal fade" id="theleModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thể
                    Lệ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                {!! $result->group->params->thele !!}
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                        data-dismiss="modal">Đóng
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="noticeModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông
                    báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="middle nohuthang" style="text-align: center;padding: 15px 0;color: blue"></div>
            <div class="modal-body content-popup" style="font-family: helvetica, arial, sans-serif;">

            </div>
            <div class="modal-footer">
                <a href="#" id="btnWithdraw" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">Rút
                    quà</a>
                <button type="button"
                        class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                        data-dismiss="modal">Đóng
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="naptheModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông
                    báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body content-popup" style="font-family: helvetica, arial, sans-serif;">
                Bạn đã hết lượt chơi. Nạp thẻ để chơi tiếp!
            </div>
            <div class="modal-footer">
                <a href="/nap-the" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--pill">Nạp thẻ</a>
                <button type="button"
                        class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                        data-dismiss="modal">Đóng
                </button>
            </div>
        </div>
    </div>
</div>
<!--    popup-->
<div class="modal fade bd-example-modal-lg" id="topquaythuongModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p>Bảng xếp hạng {{ @$result->group->title }}</p>
                <!--                    <h4 style="text-transform: uppercase;margin: auto; padding-left: 28px;" class="modal-title"><span>Bảng xếp hạng vòng lật</span></h4>-->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="tap1" class="rank-modal-tab">
                    <ul role="tablist" class="nav nav-tabs">
                        <li role="presentation" class="active"><a id="tap1-tab-1" role="tab"
                                                                  aria-controls="tap1-pane-1" aria-selected="true"
                                                                  href="#"><span>Hôm nay</span></a></li>
                        <li role="presentation" class=""><a id="tap1-tab-2" role="tab" aria-controls="tap1-pane-2"
                                                            tabindex="-1" aria-selected="false" href="#"><span>7 ngày qua</span></a>
                        </li>
                        <li role="presentation" class=""><a id="tap1-tab-3" role="tab" aria-controls="tap1-pane-3"
                                                            tabindex="-1" aria-selected="false" href="#"><span>Quà đua Top</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tap1-pane-1" aria-labelledby="tap1-tab-1" role="tabpanel" aria-hidden="false"
                             class="tab-pane active in">
                            <div>

                                @if(count($topDayList)>0)
                                    <div class="top-info-section">
                                        <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/icon-user.png"
                                             class="" alt="top donate"><img class="lazy"
                                            src="/assets/frontend/{{theme('')->theme_key}}/image/no1_top_list.png"
                                            class="background-top1" alt="s">
                                        <p style="margin-top: 25px;"><span><a href="#" target="_blank"
                                                                              style="font-weight: bold;"
                                                                              rel="noopener noreferrer">
                                    {{$topDayList[0]['name']}}</a></span></p>
                                        <p style="font-weight: bold;font-size:15px">{{$topDayList[0]['numwheel']}}
                                            lượt quay</p>
                                    </div>
                                @endif
                                @if(count($topDayList)>1)
                                    <ul class="rank-list" style="max-height: 300px; overflow-y: scroll;">
                                        @foreach($topDayList as $item)
                                            @if($loop->index>0)
                                                <li>
                                                    <div class="pull-left">
                                                        <p class="pull-left" style="width: 25px;">
                                                            #{{$loop->index + 1}}</p>
                                                        <div class="avt avt-xs"><img class="lazy"
                                                                src="https://shopas.net/assets/backend/images/icon-user.png"
                                                                class="avt-img" alt="player duo"></div>
                                                        <p class="name-player-review hidden-over-name color-vip-1">{{$item['name']}}</p>
                                                    </div>
                                                    <p class="pull-right"
                                                       style="margin-right: 0px;float: right">{{$item['numwheel']}}
                                                        lượt</p>
                                                    <div class="clearfix"></div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div id="tap1-pane-2" aria-labelledby="tap1-tab-2" role="tabpanel" aria-hidden="true"
                             class="tab-pane">
                            <div>
                                @if(count($top7DayList)>0)
                                    <div class="top-info-section">
                                        <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/icon-user.png"
                                             class="" alt="top donate"><img class="lazy"
                                            src="/assets/frontend/{{theme('')->theme_key}}/image/no1_top_list.png"
                                            class="background-top1" alt="s">
                                        <p style="margin-top: 25px;"><span><a href="#" target="_blank"
                                                                              style="font-weight: bold;"
                                                                              rel="noopener noreferrer">
                                    {{$top7DayList[0]['name']}}</a></span></p>
                                        <p style="font-weight: bold;font-size:15px">{{$top7DayList[0]['numwheel']}}
                                            lượt quay</p>
                                    </div>
                                @endif
                                @if(count($top7DayList)>1)
                                    <ul class="rank-list" style="max-height: 300px; overflow-y: scroll;">
                                        @foreach($top7DayList as $item)
                                            @if($loop->index>0)
                                                <li>
                                                    <div class="pull-left">
                                                        <p class="pull-left" style="width: 25px;">
                                                            #{{$loop->index + 1}}</p>
                                                        <div class="avt avt-xs"><img class="lazy"
                                                                src="https://shopas.net/assets/backend/images/icon-user.png"
                                                                class="avt-img" alt="player duo"></div>
                                                        <p class="name-player-review hidden-over-name color-vip-1">{{$item['name']}}</p>
                                                    </div>
                                                    <p class="pull-right"
                                                       style="margin-right: 0px;float: right">{{$item['numwheel']}}
                                                        lượt</p>
                                                    <div class="clearfix"></div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <div id="tap1-pane-3" aria-labelledby="tap1-tab-3" role="tabpanel" aria-hidden="true"
                             class="tab-pane">
                            <div class="content-qdt">
                                {!!$result->group->params->phanthuong!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                        data-dismiss="modal">Đóng
                </button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="type_play" value="real">
<input type="hidden" name="checkPoint" value="{{$result->checkPoint}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@foreach(config('constants.'.'game_type') as $item => $key)
    <input type="hidden" id="withdrawruby_{{$item}}" value="{{$key}}">
@endforeach
<!-- script -->

{{--
rubywheel - Vòng quay
flip - Lật hình
slotmachine - Quay Xèng
slotmachine5 - Quay 5 giải
squarewheel - Quay vòng vòng
smashwheel - Đập lu , rung cây , gieo quẻ
--}}
@switch($position)
    @case('rubywheel')
    <script>
        function animate(options) {
            var start = performance.now();
            requestAnimationFrame(function animate(time) {
                var timeFraction = (time - start) / options.duration;
                if (timeFraction > 1) timeFraction = 1;
                var progress = options.timing(timeFraction)
                options.draw(progress);
                if (timeFraction < 1) {
                    requestAnimationFrame(animate);
                }
            });
        }

        $(document).ready(function (e) {

            var saleoffpass = "";
            //var saleoffmessage = "";
            var userpoint = 0;
            var numrollbyorder = 0;
            var roll_check = true;
            var num_loop = 4;
            var angle_gift = '';
            var num_gift = '{{count($result->group->items)}}';
            var gift_detail = '';
            var num_roll_remain = 0;
            var angles = 0;
            var arrxgt;
            var free_wheel = 0;
            var value_gif_bonus = '';
            var msg_random_bonus = '';
            //var arrDiscount = '';

            $('body').delegate('#start-played', 'click', function () {
                $('#type_play').val('real');
                play();
            });

            $('body').delegate('.num-play-try', 'click', function () {
                $('#type_play').val('try');
                play();
            });

            //Click nút quay
            function play() {
                if (roll_check) {
                    roll_check = false;
                    saleoffpass = $("#saleoffpass").val();
                    numrolllop = $("#numrolllop").val();
                    $.ajax({
                        url: '/minigame-play',
                        datatype: 'json',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: '{{$result->group->id}}',
                            numrolllop: numrolllop,
                            numrollbyorder: numrollbyorder,
                            typeRoll: $('#type_play').val(),
                            saleoffpass: saleoffpass,
                        },
                        type: 'POST',
                        success: function (data) {
                            if (data.status == 4) {
                                location.href = '/login?return_url=' + window.location.href;
                            } else if (data.status == 3) {
                                roll_check = true;
                                $('#naptheModal').modal('show')
                                return;
                            } else if (data.status == 0) {
                                roll_check = true;
                                $('#noticeModal .content-popup').text(data.msg);
                                $('#noticeModal').modal('show');
                                return;
                            }
                            numrollbyorder = parseInt(data.numrollbyorder) + 1;
                            gift_detail = data.gift_detail;
                            gift_revice = data.arr_gift;
                            //arrDiscount = data.arrDiscount;
                            arrxgt = data.xgt;
                            if (data.xgt > 0) {
                                xvalue = data.xgt[data.xgt.length - 1];
                            } else {
                                xvalue = 0;
                            }
                            value_gif_bonus = data.value_gif_bonus;
                            msg_random_bonus = data.msg_random_bonus;
                            xvalueaDD = data.xValue;
                            free_wheel = data.free_wheel;
                            num_roll_remain = gift_detail.num_roll_remain;
                            angles = 0;
                            angle_gift = gift_detail.order * (360 / num_gift);
                            loop();

                            if ($('#type_play').val() == 'real') {
                                userpoint = data.userpoint;
                                if (userpoint < 100) {
                                    $(".item_spin_progress_bubble").css("width", data.userpoint + "%")
                                } else {
                                    $(".item_spin_progress_bubble").css("width", "100%");
                                    $(".item_spin_progress_bubble").addClass('clickgif');
                                }
                                $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                                $("#saleoffpass").val("");
                                //saleoffmessage = data.saleMessage;
                            }
                        },
                        error: function () {
                            $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                            $('#noticeModal').modal('show');
                        }
                    })
                }
            };


            function getgifbonus() {
                if ($('#checkPoint').val() != "1") {
                    return;
                }
                $.ajax({
                    url: '/minigame-bonus',
                    datatype: 'json',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: '{{$result->group->id}}',
                    },
                    type: 'POST',
                    success: function (data) {
                        if (data.status == 0) {
                            $('#noticeModal .content-popup').text(data.msg);
                            $('#noticeModal').modal('show');
                            return;
                        }
                        $('#noticeModal .content-popup').append(data.msg + " - " + data.arr_gift[0].title);
                        //$("#noticeModalNoHu #btnWithdraw").hide();
                        $('#noticeModal').modal('show');
                        var userpoint = data.userpoint;
                        if (userpoint < 100) {
                            $(".item_spin_progress_bubble").css("width", data.userpoint + "%");
                            $(".item_spin_progress_bubble").removeClass('clickgif');
                        } else {
                            $(".item_spin_progress_bubble").css("width", "100%");
                            $(".item_spin_progress_bubble").addClass('clickgif');
                        }
                        $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                        $(".pyro").show();
                        setTimeout(function () {
                            $(".pyro").hide();
                        }, 6000)
                    },
                    error: function () {
                        $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                        $('#noticeModal').modal('show');
                    }
                })
            }

            function loop() {
                $('#rotate-play').css({
                    "transform": "rotate(" + angles + "deg)"
                });

                if ((parseInt(angles) - 10) <= -(((num_loop * 360) + angle_gift))) {
                    angles = parseInt(angles) - 2;
                } else {
                    angles = parseInt(angles) - 10;
                }

                if (angles >= -((num_loop * 360) + angle_gift)) {
                    requestAnimationFrame(loop);
                } else {
                    roll_check = true;

                    $("#btnWithdraw").show();
                    if (gift_detail.winbox == 0) {
                        $("#btnWithdraw").hide();
                    } else {
                        if (gift_detail.gift_type == 0) {
                            $("#btnWithdraw").html("Rút " + $("#withdrawruby_" + gift_detail.game_type).val());
                            $("#btnWithdraw").attr('href', '/withdrawitem-' + gift_detail.game_type);
                        } else if (gift_detail.gift_type == 1) {
                            $("#btnWithdraw").html("Kiểm tra nick trúng");
                            $("#btnWithdraw").attr('href', '/minigame-logacc-' + '{{$result->group->id}}');
                            // } else if (gift_detail.gift_type == 'nrocoin') {
                            //     $("#btnWithdraw").html("Rút vàng");
                            //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROCOIN").val());
                            // } else if (gift_detail.gift_type == 'nrogem') {
                            //     $("#btnWithdraw").html("Rút ngọc");
                            //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROGEM").val());
                            // } else if (gift_detail.gift_type == 'nroxu') {
                            //     $("#btnWithdraw").html("Rút xu");
                            //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NINJAXU").val());
                        } else if (gift_detail.gift_type == 2) {
                            $("#btnWithdraw").html("Load lại trang");
                            $("#btnWithdraw").removeAttr("href");
                            $("#btnWithdraw").addClass('reLoad');
                        } else {
                            $("#btnWithdraw").hide();
                        }

                    }
                    if (gift_revice.length > 0) {
                        $html = "";
                        $strDiscountcode = "";
                        // if(saleoffmessage.length > 0)
                        // {
                        //     $html += "<br/><span style='font-size: 14px;color: #f90707;font-style: italic;display: block;text-align: center;'>"+saleoffmessage+"</span><br/>";
                        // }

                        if ($('#type_play').val() == "real") {
                            if (gift_revice.length == 1) {
                                // if(arrDiscount[0] != "")
                                // {
                                //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[0]+"</b></span>";
                                // }
                                $html += "<span>Kết quả: " + gift_revice[0]["title"] + "</span><br/>";
                                if (gift_detail.winbox == 1) {
                                    $html += "<span>Mua X1: Nhận được " + gift_revice[0]['parrent'].params.value + "</span><br/>";
                                    //$html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]['parrent'].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>"+$strDiscountcode;
                                    $html += "<span>Tổng cộng: " + parseInt(gift_revice[0]['parrent'].params.value) * (parseInt(xvalueaDD[0])) + "</span>";
                                }
                            } else {
                                $totalRevice = 0;
                                $html += "<span>Kết quả: Nhận " + gift_revice.length + " phần thưởng cho " + gift_revice.length + " lượt quay.</span><br/>";
                                $html += "<span><b>Mua X" + gift_revice.length + ":</b></span><br/>";
                                for ($i = 0; $i < gift_revice.length; $i++) {
                                    // if(arrDiscount[$i] != "")
                                    // {
                                    //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[$i]+"</b></span>";
                                    // }
                                    $html += "<span>Lần quay " + ($i + 1) + ": " + gift_revice[$i]["title"];
                                    if (gift_revice[$i].winbox == 1) {
                                        $html += " - nhận được: " + gift_revice[$i]['parrent'].params.value + " X" + (parseInt(xvalueaDD[$i])) + " = " + parseInt(gift_revice[$i]['parrent'].params.value) * (parseInt(xvalueaDD[$i])) + "" + msg_random_bonus[$i] + "</span><br/>" + $strDiscountcode + "<br/>";
                                    } else {
                                        $html += "" + msg_random_bonus[$i] + "<br/>" + $strDiscountcode + "<br/>";
                                    }
                                    $totalRevice += parseInt(gift_revice[$i]['parrent'].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i]);
                                }

                                $html += "<span><b>Tổng cộng: " + $totalRevice + "</b></span>";
                            }
                        } else {
                            $("#btnWithdraw").hide();
                            if (gift_revice.length == 1) {
                                $html += "<span>Kết quả chơi thử: " + gift_revice[0]["title"] + "</span><br/>";
                                if (gift_detail.winbox == 1) {
                                    $html += "<span>Mua X1: Nhận được " + gift_revice[0]['parrent'].params.value + "</span><br/>";
                                    //$html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]['parrent'].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                                    $html += "<span>Tổng cộng: " + parseInt(gift_revice[0]['parrent'].params.value) * (parseInt(xvalueaDD[0])) + "</span>";
                                }
                            } else {
                                $totalRevice = 0;
                                $html += "<span>Kết quả chơi thử: Nhận " + gift_revice.length + " phần thưởng cho " + gift_revice.length + " lượt quay.</span><br/>";
                                $html += "<span><b>Mua X" + gift_revice.length + ":</b></span><br/>";
                                for ($i = 0; $i < gift_revice.length; $i++) {
                                    $html += "<span>Lần quay " + ($i + 1) + ": " + gift_revice[$i]['parrent'].title;
                                    if (gift_revice[$i].winbox == 1) {
                                        $html += " - nhận được: " + gift_revice[$i]['parrent'].params.value + " X" + (parseInt(xvalueaDD[$i])) + " = " + parseInt(gift_revice[$i]['parrent'].params.value) * (parseInt(xvalueaDD[$i])) + "" + msg_random_bonus[$i] + "</span><br/>";
                                    } else {
                                        $html += "" + msg_random_bonus[$i] + "<br/>";
                                    }
                                    $totalRevice += parseInt(gift_revice[$i]['parrent'].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i]);
                                }

                                $html += "<span><b>Tổng cộng: " + $totalRevice + "</b></span>";
                            }
                        }
                    }

                    $('#noticeModal .content-popup').html($html);

                    if (userpoint > 99) {
                        getgifbonus();
                    }
                    $('#noticeModal').modal('show');
                }
            }
        });
        $('body').delegate('.reLoad', 'click', function () {
            location.reload();
        })
    </script>
    @break

    @case('flip')
    @foreach($result->group->items as $item)
        <input type="hidden" class="image_gift"
               value="{{ \App\Library\MediaHelpers::media($item->parrent->image) }}">
    @endforeach
    <style type="text/css">
        .boxflip .active {
            animation: rotation 100ms infinite linear;
        }
        .boxflip .tran {
            opacity: 0!important;
        }

        @keyframes rotation {
            100%{ transform:rotatey(360deg); }
        }
    </style>
    <script type="text/javascript">
        var numrollbyorder = 0;
        document.addEventListener('touchmove', function (event) {
            if (event.scale !== 1) { event.preventDefault(); }
        }, false);
        var lastTouchEnd = 0;
        document.addEventListener('touchend', function (event) {
            var now = (new Date()).getTime();
            if (now - lastTouchEnd <= 300) {
                event.preventDefault();
            }
            lastTouchEnd = now;
        }, false);

        $(document).ready(function(e){
            initial();
            $('.play').click(function(){
                roll_check = true;
                $('.boxflip img.flip-box-front').each(function(){
                    $(this).attr('src','{{ \App\Library\MediaHelpers::media($result->group->params->image_static) }}');
                })
                $('.boxflip .flip-box-front').css({'transform': 'rotateY(0deg)'});
                $('.boxflip .flip-box-front').parent().css({'transform': 'rotateY(0deg)'});
                $('.boxflip .flip-box-front').prev().removeClass('transparent');
                $('.boxflip .flip-box-front').addClass('img_remove');
                $('.num-play-try').hide();
                $('.play').hide();
                //$('.continue').hide();
                $('#type_play').val('real');
            })
            $('.num-play-try').click(function(){
                roll_check = true;
                $('.boxflip img.flip-box-front').each(function(){
                    $(this).attr('src','{{ \App\Library\MediaHelpers::media($result->group->params->image_static) }}');
                })
                $('.boxflip .flip-box-front').css({'transform': 'rotateY(0deg)'});
                $('.boxflip .flip-box-front').parent().css({'transform': 'rotateY(0deg)'});
                $('.boxflip .flip-box-front').prev().removeClass('transparent');
                $('.boxflip img.flip-box-front').addClass('img_remove');
                $('.num-play-try').hide();
                $('.play').hide();
                //$('.continue').hide();
                $('#type_play').val('try');
            })
            function initial(){
                gift_list = [];
                $('.image_gift').each(function(){
                    gift_list.push({'image':$(this).val()})
                })
                gift_list = shuffle(gift_list);
                var i=0;
                $('.boxflip img.flip-box-front').each(function(){
                    $(this).attr('src',gift_list[i].image);
                    i++;
                })
            }
            var saleoffpass = "";
            var saleoffmessage = "";
            var gift_revice="";
            var userpoint = 0;
            var roll_check = true;
            var num_loop = 4;
            var angle_gift = '';
            var num_gift = '{{count($result->group->items)}}';
            var gift_detail = '';
            var gift_list = '';
            var num_roll_remain = 0;
            var angles = 0;
            var free_wheel = 0;
            var arrDiscount = '';
            //Click nút lật
            $('body').delegate('.img_remove', 'click', function(){
                $('.boxflip .flip-box-front').removeClass('img_remove');
                $('.boxflip .flip-box-front').removeClass('active');
                $('.boxflip .flip-box-front').addClass('noactive');
                saleoffpass = $("#saleoffpass").val();
                $(this).removeClass('noactive');
                $(this).addClass('active');
                if(roll_check){
                    roll_check = false;
                    numrolllop = $("#numrolllop").val();
                    $.ajax({
                        url: '/minigame-play',
                        datatype:'json',
                        data:{
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: '{{$result->group->id}}',
                            numrollbyorder: numrollbyorder,
                            typeRoll : $('#type_play').val(),
                            saleoffpass:saleoffpass,
                            numrolllop:numrolllop,
                        },
                        type: 'post',
                        success: function (data) {
                            gift_detail = data.gift_detail;
                            setTimeout(function(){
                                if(gift_detail != undefined){
                                    $('.boxflip .active').attr('src',gift_detail.image);
                                    $('.boxflip .active').css({'transform': 'rotateY(180deg)'});
                                    $('.boxflip .active').prev().addClass('transparent');
                                    $('.boxflip .active').parent().css({'transform': 'rotateY(180deg)'});
                                }
                                $('.boxflip .flip-box-front').prev().removeClass('transparent');
                                $('.boxflip .flip-box-front').removeClass('active');
                            },1000);
                            if (data.status == 4) {
                                location.href='/login';
                            } else if (data.status == 3) {
                                roll_check = true;
                                $('#naptheModal').modal('show');
                                return;
                            } else if (data.status == 0) {
                                roll_check = true;
                                $("#btnWithdraw").hide();
                                $('#noticeModal .content-popup').text(data.msg);
                                $('#noticeModal').modal('show');
                                $('.num-play-try').show();
                                $('.play').show();
                                //$('.continue').show();
                                // if($('#type_play').val() == "real")
                                // {
                                //     $('.continue').html("Chơi tiếp");
                                // }
                                // else
                                // {
                                //     $('.continue').html("Chơi thử tiếp");
                                // }
                                return;
                            }
                            numrollbyorder = parseInt(data.numrollbyorder) + 1;
                            free_wheel = data.free_wheel;
                            //arrDiscount = data.arrDiscount;
                            gift_list = data.listgift;
                            gift_list = shuffle(gift_list);
                            gift_revice = data.arr_gift;
                            arrxgt = data.xgt;
                            if (data.xgt > 0) {
                                xvalue = data.xgt[data.xgt.length - 1];
                            } else {
                                xvalue = 0;
                            }
                            value_gif_bonus = data.value_gif_bonus;
                            msg_random_bonus = data.msg_random_bonus;
                            xvalueaDD = data.xValue;
                            free_wheel = data.free_wheel;
                            num_roll_remain = gift_detail.num_roll_remain;

                            if($('#type_play').val()=='real'){
                                userpoint = data.userpoint;
                                if(userpoint<100){
                                    $(".item_spin_progress_bubble").css("width", userpoint + "%")
                                }else{
                                    $(".item_spin_progress_bubble").css("width", "100%");
                                    $(".item_spin_progress_bubble").addClass('clickgif');
                                }
                                $(".item_spin_progress_percent").html(userpoint + "/100 point");
                                $("#saleoffpass").val("");
                                //saleoffmessage = data.saleMessage;
                            }

                            setTimeout(function(){
                                var i=0;
                                $('.boxflip img.noactive').each(function(){
                                    $(this).attr('src',gift_list[i].image);
                                    $(this).css({'transform': 'rotateY(180deg)'});
                                    $(this).prev().addClass('transparent');
                                    $(this).parent().css({'transform': 'rotateY(180deg)'});
                                    i++;
                                });
                            }, 1500);

                            $("#btnWithdraw").show();
                            if (gift_detail.winbox == 0) {
                                $("#btnWithdraw").hide();
                            } else {
                                if (gift_detail.gift_type == 0) {
                                    $("#btnWithdraw").html("Rút " + $("#withdrawruby_" + gift_detail.game_type).val());
                                    $("#btnWithdraw").attr('href', '/withdrawitem-' + gift_detail.game_type);
                                } else if (gift_detail.gift_type == 1) {
                                    $("#btnWithdraw").html("Kiểm tra nick trúng");
                                    $("#btnWithdraw").attr('href', '/minigame-logacc-' + '{{$result->group->id}}');
                                    // } else if (gift_detail.gift_type == 'nrocoin') {
                                    //     $("#btnWithdraw").html("Rút vàng");
                                    //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROCOIN").val());
                                    // } else if (gift_detail.gift_type == 'nrogem') {
                                    //     $("#btnWithdraw").html("Rút ngọc");
                                    //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROGEM").val());
                                    // } else if (gift_detail.gift_type == 'nroxu') {
                                    //     $("#btnWithdraw").html("Rút xu");
                                    //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NINJAXU").val());
                                } else if (gift_detail.gift_type == 2) {
                                    $("#btnWithdraw").html("Load lại trang");
                                    $("#btnWithdraw").removeAttr("href");
                                    $("#btnWithdraw").addClass('reLoad');
                                } else {
                                    $("#btnWithdraw").hide();
                                }

                            }
                            if (gift_revice.length > 0) {
                                $html = "";
                                $strDiscountcode="";
                                // if(saleoffmessage.length > 0)
                                // {
                                //     $html += "<br/><span style='font-size: 14px;color: #f90707;font-style: italic;display: block;text-align: center;'>"+saleoffmessage+"</span><br/>";
                                // }

                                if($('#type_play').val() == "real")
                                {
                                    if(gift_revice.length == 1)
                                    {
                                        // if(arrDiscount[0] != "")
                                        // {
                                        //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[0]+"</b></span>";
                                        // }
                                        $html += "<span>Kết quả: "+gift_revice[0]["title"]+"</span><br/>";
                                        if(gift_detail.winbox == 1){
                                            $html += "<span>Mua X1: Nhận được "+gift_gift_revice[$i]['parrent'].title+"</span><br/>";
                                            //$html += "<span>Lật được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>"+$strDiscountcode;
                                            $html += "<span>Tổng cộng: "+parseInt(gift_revice[0]["parrent"].params.value)*(parseInt(xvalueaDD[0]))+"</span>";
                                        }
                                    }
                                    else
                                    {
                                        $totalRevice = 0;
                                        $html += "<span>Kết quả: Nhận "+gift_revice.length+" phần thưởng cho "+gift_revice.length+" lượt lật.</span><br/>";
                                        $html += "<span><b>Mua X"+gift_revice.length+":</b></span><br/>";
                                        for($i=0;$i<gift_revice.length;$i++)
                                        {
                                            // if(arrDiscount[$i] != "")
                                            // {
                                            //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[$i]+"</b></span>";
                                            // }
                                            $html += "<span>Lần lật "+($i + 1)+": "+gift_revice[$i]["title"];
                                            if(gift_revice[$i].winbox == 1){
                                                $html +=" - nhận được: "+gift_revice[$i]['parrent'].title+" X"+(parseInt(xvalueaDD[$i]))+" = "+parseInt(gift_revice[$i]['parrent'].title)*(parseInt(xvalueaDD[$i]))+""+msg_random_bonus[$i]+"</span><br/>"+$strDiscountcode+"<br/>";
                                            }
                                            else
                                            {
                                                $html +=""+msg_random_bonus[$i]+"<br/>"+$strDiscountcode+"<br/>";
                                            }
                                            $totalRevice +=  parseInt(gift_revice[$i]['parrent'].params.value)*(parseInt(xvalueaDD[$i]))+ parseInt(value_gif_bonus[$i]);
                                        }

                                        $html += "<span><b>Tổng cộng: "+$totalRevice+"</b></span>";
                                    }
                                }
                                else
                                {
                                    $("#btnWithdraw").hide();
                                    if(gift_revice.length == 1)
                                    {
                                        $html += "<span>Kết quả chơi thử: "+gift_revice[0]["title"]+"</span><br/>";
                                        if(gift_detail.winbox == 1){
                                            $html += "<span>Mua X1: Nhận được "+gift_revice[0]["parrent"].params.value+"</span><br/>";
                                            //$html += "<span>Lật được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                                            $html += "<span>Tổng cộng: "+parseInt(gift_revice[0]["parrent"].params.value)*(parseInt(xvalueaDD[0]))+"</span>";
                                        }
                                    }
                                    else
                                    {
                                        $totalRevice = 0;
                                        $html += "<span>Kết quả chơi thử: Nhận "+gift_revice.length+" phần thưởng cho "+gift_revice.length+" lượt lật.</span><br/>";
                                        $html += "<span><b>Mua X"+gift_revice.length+":</b></span><br/>";
                                        for($i=0;$i<gift_revice.length;$i++)
                                        {
                                            $html += "<span>Lần lật "+($i + 1)+": "+gift_revice[$i]["title"];
                                            if(gift_revice[$i].winbox == 1){
                                                $html +=" - nhận được: "+gift_revice[$i]['parrent'].title+" X"+(parseInt(xvalueaDD[$i]))+" = "+parseInt(gift_revice[$i]['parrent'].title)*(parseInt(xvalueaDD[$i]))+""+msg_random_bonus[$i]+"</span><br/>";
                                            }
                                            else
                                            {
                                                $html +=""+msg_random_bonus[$i]+"<br/>";
                                            }
                                            $totalRevice +=  parseInt(gift_revice[$i]['parrent'].params.value)*(parseInt(xvalueaDD[$i]))+ parseInt(value_gif_bonus[$i]);
                                        }

                                        $html += "<span><b>Tổng cộng: "+$totalRevice+"</b></span>";
                                    }
                                }
                            }

                            $('#noticeModal .content-popup').html($html);
                            if (userpoint > 99) {
                                getgifbonus();
                            }
                            setTimeout(function(){
                                $('#noticeModal').modal('show');
                                //$('.continue').show();
                                $('.num-play-try').show();
                                $('.play').show();
                                // if($('#type_play').val() == "real")
                                // {
                                //     $('.continue').html("Chơi tiếp");
                                // }
                                // else
                                // {
                                //     $('.continue').html("Chơi thử tiếp");
                                // }
                            },2500);
                        },
                        error: function(){
                            $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                            $('#noticeModal').modal('show');
                            roll_check = true;
                        }
                    })
                }
            });


            function getgifbonus() {
                if($('#checkPoint').val() != "1"){
                    return;
                }
                $.ajax({
                    url: '/minigame-bonus',
                    datatype: 'json',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: '{{$result->group->id}}',
                    },
                    type: 'POST',
                    success: function(data) {
                        if (data.status == 0) {
                            $('#noticeModal .content-popup').text(data.msg);
                            $('#noticeModal').modal('show');
                            return;
                        }
                        $('#noticeModal .content-popup').append(data.msg + " - " + data.arr_gift[0].title);
                        //$("#noticeModalNoHu #btnWithdraw").hide();
                        $('#noticeModal').modal('show');
                        var userpoint = data.userpoint;
                        if(userpoint<100){
                            $(".item_spin_progress_bubble").css("width", data.userpoint + "%");
                            $(".item_spin_progress_bubble").removeClass('clickgif');
                        }else{
                            $(".item_spin_progress_bubble").css("width", "100%");
                            $(".item_spin_progress_bubble").addClass('clickgif');
                        }
                        $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                        $(".pyro").show();
                        setTimeout(function(){
                            $(".pyro").hide();
                        },6000)
                    },
                    error: function() {
                        $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                        $('#noticeModal').modal('show');
                    }
                })
            }

            $('body').delegate('.reLoad','click',function(){
                location.reload();
            })

            function shuffle(array) {
                var currentIndex = array.length, temporaryValue, randomIndex;
                while (0 !== currentIndex) {
                    randomIndex = Math.floor(Math.random() * currentIndex);
                    currentIndex -= 1;
                    temporaryValue = array[currentIndex];
                    array[currentIndex] = array[randomIndex];
                    array[randomIndex] = temporaryValue;
                }
                return array;
            }

            // $('.continue').click(function(){
            //     $('.boxflip').html(document.getElementById('boxfliphide').innerHTML);
            //     $('.continue').hide();
            //     $('.play').hide();
            //     $('.num-play-try').hide();
            //     roll_check = true;
            // });
        });

    </script>
    @break

    @case('slotmachine')
    <script>
        function animate(options) {
            var start = performance.now();
            requestAnimationFrame(function animate(time) {
                var timeFraction = (time - start) / options.duration;
                if (timeFraction > 1) timeFraction = 1;
                var progress = options.timing(timeFraction)
                options.draw(progress);
                if (timeFraction < 1) {
                    requestAnimationFrame(animate);
                }
            });
        }

        $(document).ready(function(e) {
            $(".thele").on("click", function(){
                $("#theleModal").modal('show');
            })
            $(".tylevongquay").on("click", function(){
                $("#tylevongquayModal").modal('show');
            })
            $(".uytin").on("click", function(){
                $("#uytinModal").modal('show');
            })
            $(".luotquay").on("click", function(){
                $("#luotquayModal").modal('show');
            })
            $(".topquaythuong").on("click", function(){
                $("#topquaythuongModal").modal('show');
            })


            var tyleLoop = 0;
            var saleoffpass = "";
            //var saleoffmessage = "";
            var gift_revice="";
            var userpoint = 0;
            var numrollbyorder = 0;
            var roll_check = true;
            var num_loop = 3;
            var xvalue=0;
            var xvalueaDD = 0;
            var num = 0;
            var num_current = 0;
            var target = 0;
            var arrxgt;
            var free_wheel = 0;
            var typeRoll = "real";
            var value_gif_bonus='';
            var msg_random_bonus = '';
            var arrDiscount = '';
            var slot1_fake;
            var slot2_fake;
            var slot3_fake;
            //Click nút quay
            $('body').delegate('#start-played', 'click', function() {

                if (roll_check) {
                    //fakeLoop();
                    roll_check = false;
                    saleoffpass = $("#saleoffpass").val();
                    typeRoll = "real";
                    numrolllop = $("#numrolllop").val();
                    $.ajax({
                        url: '/minigame-play',
                        datatype: 'json',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: '{{$result->group->id}}',
                            numrolllop: numrolllop,
                            numrollbyorder: numrollbyorder,
                            typeRoll: typeRoll,
                            saleoffpass: saleoffpass,
                        },
                        type: 'POST',
                        success: function(data) {
                            if (data.status == 4) {
                                location.href='/login?return_url='+window.location.href;
                                return;
                            } else if (data.status == 3) {
                                roll_check = true;
                                $('#naptheModal').modal('show')
                                return;
                            } else if (data.status == 0) {
                                roll_check = true;
                                $('#noticeModal .content-popup').text(data.msg);
                                $('#noticeModal').modal('show');
                                return;
                            }
                            roll_check = true;
                            gift_detail = data.gift_detail;
                            var num1=0;
                            var num2=0;
                            var num3=0;
                            if(gift_detail.winbox == 0){
                                num1 = parseInt(gift_detail.order)+1;
                                num2 = num1 + 1;
                                if(num2 > parseInt('{{count($result->group->items)}}')){
                                    num2 = num2 - parseInt('{{count($result->group->items)}}');
                                }
                                num3 = num2 + 1;
                                if(num3 > parseInt('{{count($result->group->items)}}')){
                                    num3 = num3 - parseInt('{{count($result->group->items)}}');
                                }
                            }else{
                                num1 = parseInt(gift_detail.order)+1;
                                num2 = parseInt(gift_detail.order)+1;
                                num3 = parseInt(gift_detail.order)+1;
                            }



                            gift_revice = data.arr_gift;
                            numrollbyorder = parseInt(data.numrollbyorder) + 1;
                            arrxgt = data.xgt;
                            if (arrxgt > 0) {
                                xvalue = arrxgt[arrxgt.length - 1];
                            } else {
                                xvalue = 0;
                            }
                            value_gif_bonus = data.value_gif_bonus;
                            msg_random_bonus = data.msg_random_bonus;
                            xvalueaDD = data.xValue;
                            free_wheel = data.free_wheel;
                            userpoint = data.userpoint;
                            if(userpoint<100){
                                $(".item_spin_progress_bubble").css("width", data.userpoint + "%")
                            }else{
                                $(".item_spin_progress_bubble").css("width", "100%");
                                $(".item_spin_progress_bubble").addClass('clickgif');
                            }
                            $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                            $("#saleoffpass").val("");
                            tyleLoop = 1;
                            doSlot(num1,num2,num3);

                        },
                        error: function() {
                            $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                            $('#noticeModal').modal('show');
                        }
                    })
                }
            });


            function getgifbonus() {
                if($('#checkPoint').val() != "1"){
                    return;
                }
                $.ajax({
                    url: '/minigame-bonus',
                    datatype: 'json',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: '{{$result->group->id}}',
                    },
                    type: 'POST',
                    success: function(data) {
                        if (data.status == 0) {
                            $('#noticeModal .content-popup').text(data.msg);
                            $('#noticeModal').modal('show');
                            return;
                        }
                        $('#noticeModal .nohuthang').html(data.msg + " - " + data.arr_gift[0].title);
                        $('#noticeModal').modal('show');
                        var userpoint = data.userpoint;
                        if(userpoint<100){
                            $(".item_spin_progress_bubble").css("width", data.userpoint + "%");
                            $(".item_spin_progress_bubble").removeClass('clickgif');
                        }else{
                            $(".item_spin_progress_bubble").css("width", "100%");
                            $(".item_spin_progress_bubble").addClass('clickgif');
                        }
                        $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                        $(".pyro").show();
                        setTimeout(function(){
                            $(".pyro").hide();
                        },6000)
                    },
                    error: function() {
                        $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                        $('#noticeModal').modal('show');
                    }
                })
            }


            $('body').delegate('.num-play-try', 'click', function() {
                if (roll_check) {
                    //fakeLoop();
                    roll_check = false;
                    saleoffpass = $("#saleoffpass").val();
                    typeRoll = "try";
                    numrolllop = $("#numrolllop").val();
                    $.ajax({
                        url: '/minigame-play',
                        datatype: 'json',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: '{{$result->group->id}}',
                            numrolllop: numrolllop,
                            numrollbyorder: numrollbyorder,
                            typeRoll: typeRoll,
                            saleoffpass: saleoffpass,
                        },
                        type: 'POST',
                        success: function(data) {
                            if (data.status == 4) {
                                location.href='/login';
                                return;
                            } else if (data.status == 3) {
                                $('#naptheModal').modal('show')
                                return;
                            } else if (data.status == 0) {
                                roll_check = true;
                                $('#noticeModal .content-popup').text(data.msg);
                                $('#noticeModal').modal('show');
                                return;
                            }
                            roll_check = true;
                            gift_detail = data.gift_detail;
                            var num1=0;
                            var num2=0;
                            var num3=0;
                            if(gift_detail.winbox == 0){
                                num1 = parseInt(gift_detail.order)+1;
                                num2 = num1 + 1;
                                if(num2 > parseInt('{{count($result->group->items)}}')){
                                    num2 = num2 - parseInt('{{count($result->group->items)}}');
                                }
                                num3 = num2 + 1;
                                if(num3 > parseInt('{{count($result->group->items)}}')){
                                    num3 = num3 - parseInt('{{count($result->group->items)}}');
                                }
                            }else{
                                num1 = parseInt(gift_detail.order)+1;
                                num2 = parseInt(gift_detail.order)+1;
                                num3 = parseInt(gift_detail.order)+1;
                            }
                            tyleLoop = 1;
                            doSlot(num1,num2,num3);

                            gift_revice = data.arr_gift;
                            numrollbyorder = parseInt(data.numrollbyorder) + 1;
                            arrxgt = data.xgt;
                            if (arrxgt > 0) {
                                xvalue = arrxgt[arrxgt.length - 1];
                            } else {
                                xvalue = 0;
                            }
                            value_gif_bonus = data.value_gif_bonus;
                            msg_random_bonus = data.msg_random_bonus;
                            xvalueaDD = data.xValue;
                            free_wheel = data.free_wheel;
                            userpoint = data.userpoint;
                            if(userpoint<100){
                                $(".item_spin_progress_bubble").css("width", data.userpoint + "%")
                            }else{
                                $(".item_spin_progress_bubble").css("width", "100%");
                                $(".item_spin_progress_bubble").addClass('clickgif');
                            }
                            $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                            $("#saleoffpass").val("");

                        },
                        error: function() {
                            $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                            $('#noticeModal').modal('show');
                        }
                    })
                }
            });

            // function fakeLoop(){
            //     document.getElementById("slot1").className='a1'
            //     document.getElementById("slot2").className='a1'
            //     document.getElementById("slot3").className='a1'
            //     var i1 = 0;
            //     var i2 = 0;
            //     var i3 = 0;
            //     slot1_fake = setInterval(spin1_fake, 50);
            //     slot2_fake = setInterval(spin2_fake, 50);
            //     slot3_fake = setInterval(spin3_fake, 50);

            //     function spin1_fake() {
            //         i1++;
            //         slotTile = document.getElementById("slot1");
            //         if (slotTile.className=="a{{count($result->group->items)}}"){
            //             slotTile.className = "a0";
            //         }
            //         slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
            //     }
            //     function spin2_fake(){
            //         i2++;
            //         slotTile = document.getElementById("slot2");
            //         if (slotTile.className=="a{{count($result->group->items)}}"){
            //             slotTile.className = "a0";
            //         }
            //         slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
            //     }
            //     function spin3_fake(){
            //         i3++;
            //         slotTile = document.getElementById("slot3");
            //         if (slotTile.className=="a{{count($result->group->items)}}"){
            //             slotTile.className = "a0";
            //         }
            //         slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
            //     }
            // }


            function doSlot(one, two, three){
                // clearInterval(slot1_fake);
                // clearInterval(slot2_fake);
                // clearInterval(slot3_fake);
                document.getElementById("slot1").className='a1'
                document.getElementById("slot2").className='a1'
                document.getElementById("slot3").className='a1'
                var numChanges = randomInt(1,4)*parseInt('{{count($result->group->items)}}');
                var numeberSlot1 = numChanges+one
                var numeberSlot2 = numChanges+2*parseInt('{{count($result->group->items)}}')+two
                var numeberSlot3 = numChanges+4*parseInt('{{count($result->group->items)}}')+three
                var i1 = 0;
                var i2 = 0;
                var i3 = 0;
                slot1 = setInterval(spin1, 50);
                slot2 = setInterval(spin2, 50);
                slot3 = setInterval(spin3, 50);

                function spin1() {
                    i1++;
                    if (tyleLoop == 1) {
                        if (i1 >= numeberSlot1) {
                            clearInterval(slot1);
                            return null;
                        }
                    }
                    slotTile = document.getElementById("slot1");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
                function spin2(){
                    i2++;
                    if (tyleLoop == 1) {
                        if (i2 >= numeberSlot2) {
                            clearInterval(slot2);

                            return null;
                        }
                    }
                    slotTile = document.getElementById("slot2");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
                function spin3(){
                    i3++;
                    if (tyleLoop == 1) {
                        if (i3 >= numeberSlot3) {
                            clearInterval(slot3);
                            testWin();
                            return null;
                        }
                    }
                    slotTile = document.getElementById("slot3");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
            }

            function randomInt(min, max){
                return Math.floor((Math.random() * (max-min+1)) + min);
            }

            function testWin() {
                roll_check = true;

                $("#btnWithdraw").show();
                if (gift_detail.winbox == 0) {
                    $("#btnWithdraw").hide();
                } else {
                    if (gift_detail.gift_type == 0) {
                        $("#btnWithdraw").html("Rút " + $("#withdrawruby_" + gift_detail.game_type).val());
                        $("#btnWithdraw").attr('href', '/withdrawitem-' + gift_detail.game_type);
                    } else if (gift_detail.gift_type == 1) {
                        $("#btnWithdraw").html("Kiểm tra nick trúng");
                        $("#btnWithdraw").attr('href', '/minigame-logacc-' + '{{$result->group->id}}');
                        // } else if (gift_detail.gift_type == 'nrocoin') {
                        //     $("#btnWithdraw").html("Rút vàng");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROCOIN").val());
                        // } else if (gift_detail.gift_type == 'nrogem') {
                        //     $("#btnWithdraw").html("Rút ngọc");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROGEM").val());
                        // } else if (gift_detail.gift_type == 'nroxu') {
                        //     $("#btnWithdraw").html("Rút xu");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NINJAXU").val());
                    } else if (gift_detail.gift_type == 2) {
                        $("#btnWithdraw").html("Load lại trang");
                        $("#btnWithdraw").removeAttr("href");
                        $("#btnWithdraw").addClass('reLoad');
                    } else {
                        $("#btnWithdraw").hide();
                    }

                }


                if (gift_revice.length > 0) {
                    $html = "";
                    $strDiscountcode = "";
                    // if(saleoffmessage.length > 0)
                    // {
                    //     $html += "<br/><span style='font-size: 14px;color: #f90707;font-style: italic;display: block;text-align: center;'>"+saleoffmessage+"</span><br/>";
                    // }

                    if (typeRoll == "real") {
                        if (gift_revice.length == 1) {
                            // if(arrDiscount[0] != "")
                            // {
                            //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[0]+"</b></span>";
                            // }
                            $html += "<span>Kết quả: " + gift_revice[0]["title"] + "</span><br/>";
                            if (gift_detail.winbox == 1) {
                                $html += "<span>Mua X1: Nhận được " + gift_revice[0]["parrent"].params.value + "</span><br/>";
                                $html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                                $html += "<span>Tổng cộng: " + parseInt(gift_revice[0]["parrent"].params.value) * (parseInt(xvalueaDD[0])) + "</span>";
                            }
                        } else {
                            $totalRevice = 0;
                            $html += "<span>Kết quả: Nhận " + gift_revice.length + " phần thưởng cho " + gift_revice.length + " lượt quay.</span><br/>";
                            $html += "<span><b>Mua X" + gift_revice.length + ":</b></span><br/>";
                            for ($i = 0; $i < gift_revice.length; $i++) {
                                // if(arrDiscount[$i] != "")
                                // {
                                //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[$i]+"</b></span>";
                                // }
                                $html += "<span>Lần quay " + ($i + 1) + ": " + gift_revice[$i]["title"];
                                if (gift_revice[$i].winbox == 1) {
                                    $html += " - nhận được: " + gift_revice[$i]["parrent"].params.value + " X" + (parseInt(xvalueaDD[$i])) + " = " + parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + "" + msg_random_bonus[$i] + "</span><br/>"  + "<br/>";
                                } else {
                                    $html += "" + msg_random_bonus[$i] + "<br/>" + $strDiscountcode + "<br/>";
                                }
                                $totalRevice += parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i]);
                            }

                            $html += "<span><b>Tổng cộng: " + $totalRevice + "</b></span>";
                        }
                    } else {
                        $("#btnWithdraw").hide();
                        if (gift_revice.length == 1) {
                            $html += "<span>Kết quả chơi thử: " + gift_revice[0]["title"] + "</span><br/>";
                            if (gift_detail.winbox == 1) {
                                $html += "<span>Mua X1: Nhận được " + gift_revice[0]["parrent"].params.value + "</span><br/>";
                                $html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                                $html += "<span>Tổng cộng: " + parseInt(gift_revice[0]["parrent"].params.value) * (parseInt(xvalueaDD[0])) + "</span>";
                            }
                        } else {
                            $totalRevice = 0;
                            $html += "<span>Kết quả chơi thử: Nhận " + gift_revice.length + " phần thưởng cho " + gift_revice.length + " lượt quay.</span><br/>";
                            $html += "<span><b>Mua X" + gift_revice.length + ":</b></span><br/>";
                            for ($i = 0; $i < gift_revice.length; $i++) {
                                $html += "<span>Lần quay " + ($i + 1) + ": " + gift_revice[$i]["title"];
                                if (gift_revice[$i].winbox == 1) {
                                    $html += " - nhận được: " + gift_revice[$i]["parrent"].params.value + " X" + (parseInt(xvalueaDD[$i])) + " = " + parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + "" + msg_random_bonus[$i] + "</span><br/>";
                                } else {
                                    $html += "" + msg_random_bonus[$i] + "<br/>";
                                }
                                $totalRevice += parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i]);
                            }

                            $html += "<span><b>Tổng cộng: " + $totalRevice + "</b></span>";
                        }
                    }
                }

                $('#noticeModal .content-popup').html($html);

                if (userpoint > 99) {
                    getgifbonus();
                }
                $("#noticeModal").modal('show');
                $("#noticeModal").on("hidden.bs.modal", function () {
                    $('.modal-backdrop').remove();
                    $('body').removeClass( "modal-open" );
                });
                if (free_wheel < 1) {
                    $('.num-play-free').hide();
                } else {
                    $('.num-play-free').html("(Bạn còn " + free_wheel + " lượt quay miễn phí)");
                }
            }
        });

        $('body').delegate('.reLoad', 'click', function() {
            location.reload();
        })
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).on('scroll',function(){
                if($(window).width() > 1024){
                    if ($(this).scrollTop() > 100) {
                        $(".nav-bar-container").css("height","90px");
                        $(".nav-bar-category .nav li a").css("line-height","90px");
                        $("header .nav-bar").css("background-color","rgba(0,0,0,0.5)");
                        $(".nav-bar-brand").css("margin","14px");

                    } else {
                        $(".nav-bar-container").css("height","120px");
                        $(".nav-bar-category .nav li a").css("line-height","120px");
                        $(".nav-bar-brand").css("margin","20px 0");
                        $("header .nav-bar").css("background-color","rgba(0,0,0,0.8)");
                    }
                }

            });
            $('.item_play_intro_viewmore').click(function(){
                $('.item_play_intro_viewless').css("display","flex");
                $('.item_play_intro_viewmore').css("display","none");
                $(".item_play_intro_content").addClass( "showtext" );
            });
            $('.item_play_intro_viewless').click(function(){
                $('.item_play_intro_viewmore').css("display","flex");
                $('.item_play_intro_viewless').css("display","none");
                $(".item_play_intro_content").removeClass( "showtext");
            });
            $('.item_spin_list_more').click(function(){
                $('.item_spin_list').css("overflow","auto");
                $('.item_spin_list_less').css("display","block");
                $(".item_spin_list_more").css("display","none");
            });
            $('.item_spin_list_less').click(function(){
                $('.item_spin_list').css("overflow","hidden");
                $('.item_spin_list_less').css("display","none");
                $(".item_spin_list_more").css("display","block");
            });


        });
    </script>
    <script>
        $(".nav-tabs #tap1-tab-1").on("click",function(){
            $(".active").removeClass("active");
            $(this).parents("li").addClass("active");
            $(".tab-pane").hide();
            $("#tap1-pane-1").show();
        })
        $(".nav-tabs #tap1-tab-2").on("click",function(){
            $(".active").removeClass("active");
            $(this).parents("li").addClass("active");
            $(".tab-pane").hide();
            $("#tap1-pane-2").show();
        })
        $(".nav-tabs #tap1-tab-3").on("click",function(){
            $(".active").removeClass("active");
            $(this).parents("li").addClass("active");
            $(".tab-pane").hide();
            $("#tap1-pane-3").show();

        })
    </script>
    <style>
        @php
    $count = 0;
@endphp
@foreach($result->group->items as $gift)
    @php
        $count++;
    @endphp
    .a{{$count}}{background-image: url("{{\App\Library\MediaHelpers::media($gift->parrent->image)}}") !important;}
        @endforeach
#slot1,#slot2,#slot3{
            display: inline-block;
            margin-top: 2px;
            margin-left: 1px;
            margin-right: 45px;
            margin: 0 36px;
            background-size: 100px 79px;
            width: 100px;
            height: 79px;
            padding: 0 28px;
        }
    </style>
    @break

    @case('slotmachine5')
    <script>
        function animate(options) {
            var start = performance.now();
            requestAnimationFrame(function animate(time) {
                var timeFraction = (time - start) / options.duration;
                if (timeFraction > 1) timeFraction = 1;
                var progress = options.timing(timeFraction)
                options.draw(progress);
                if (timeFraction < 1) {
                    requestAnimationFrame(animate);
                }
            });
        }

        $(document).ready(function(e) {
            $(".thele").on("click", function(){
                $("#theleModal").modal('show');
            })
            $(".tylevongquay").on("click", function(){
                $("#tylevongquayModal").modal('show');
            })
            $(".uytin").on("click", function(){
                $("#uytinModal").modal('show');
            })
            $(".luotquay").on("click", function(){
                $("#luotquayModal").modal('show');
            })
            $(".topquaythuong").on("click", function(){
                $("#topquaythuongModal").modal('show');
            })


            var tyleLoop = 0;
            var saleoffpass = "";
            //var saleoffmessage = "";
            var gift_revice="";
            var userpoint = 0;
            var numrollbyorder = 0;
            var roll_check = true;
            var num_loop = 3;
            var xvalue=0;
            var xvalueaDD = 0;
            var num = 0;
            var num_current = 0;
            var target = 0;
            var arrxgt;
            var free_wheel = 0;
            var typeRoll = "real";
            var value_gif_bonus='';
            var msg_random_bonus = '';
            var arrDiscount = '';
            var slot1_fake;
            var slot2_fake;
            var slot3_fake;
            var slot4_fake;
            var slot5_fake;
            //Click nút quay
            $('body').delegate('#start-played', 'click', function() {

                if (roll_check) {
                    fakeLoop();
                    roll_check = false;
                    saleoffpass = $("#saleoffpass").val();
                    typeRoll = "real";
                    numrolllop = $("#numrolllop").val();
                    $.ajax({
                        url: '/minigame-play',
                        datatype: 'json',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: '{{$result->group->id}}',
                            numrolllop: numrolllop,
                            numrollbyorder: numrollbyorder,
                            typeRoll: typeRoll,
                            saleoffpass: saleoffpass,
                        },
                        type: 'POST',
                        success: function(data) {
                            if (data.status == 4) {
                                location.href='/login?return_url='+window.location.href;
                                return;
                            } else if (data.status == 3) {
                                roll_check = true;
                                $('#naptheModal').modal('show')
                                return;
                            } else if (data.status == 0) {
                                roll_check = true;
                                $('#noticeModal .content-popup').text(data.msg);
                                $('#noticeModal').modal('show');
                                return;
                            }
                            roll_check = true;
                            gift_detail = data.gift_detail;
                            var num1=0;
                            var num2=0;
                            var num3=0;
                            if(gift_detail.winbox == 0){
                                var num1 = parseInt(gift_detail.order)+1;
                                var num2 = randomExpert(1,parseInt('{{count($result->group->items)}}'),num1,'999999');
                                var num3 = randomExpert(1,parseInt('{{count($result->group->items)}}'),num1,num2);
                                var num4 = randomExpert(1,parseInt('{{count($result->group->items)}}'),num1,num2);
                                var num5 = randomExpert(1,parseInt('{{count($result->group->items)}}'),num1,num2);
                            }else{
                                var num1 = parseInt(gift_detail.order)+1;
                                var num2 = parseInt(gift_detail.order)+1;
                                var num3 = parseInt(gift_detail.order)+1;
                                var num4=0;
                                var num5=0;
                                if(xvalue == 1)
                                {
                                    num4 = parseInt(gift_detail.order)+1;
                                }
                                else
                                {
                                    if(num1>4)
                                    {
                                        num4 =  randomExpert(1,parseInt('{{count($result->group->items)-4}}'),num1,'999999');
                                    }
                                    else
                                    {
                                        num4 =  randomExpert(4,parseInt('{{count($result->group->items)}}'),num1,'999999');
                                    }
                                }
                                if(xvalue == 2)
                                {
                                    num4 = parseInt(gift_detail.order)+1;
                                    num5 = parseInt(gift_detail.order)+1;
                                }
                                else
                                {
                                    if(num1>4)
                                    {
                                        num5 =  randomExpert(1,parseInt('{{count($result->group->items)-4}}'),num1,'999999');
                                    }
                                    else
                                    {
                                        num5 =  randomExpert(4,parseInt('{{count($result->group->items)}}'),num1,'999999');
                                    }
                                }
                            }



                            gift_revice = data.arr_gift;
                            numrollbyorder = parseInt(data.numrollbyorder) + 1;
                            arrxgt = data.xgt;
                            if (arrxgt > 0) {
                                xvalue = arrxgt[arrxgt.length - 1];
                            } else {
                                xvalue = 0;
                            }
                            value_gif_bonus = data.value_gif_bonus;
                            msg_random_bonus = data.msg_random_bonus;
                            xvalueaDD = data.xValue;
                            free_wheel = data.free_wheel;
                            userpoint = data.userpoint;
                            if(userpoint<100){
                                $(".item_play_spin_progress_bubble ").css("width", data.userpoint + "%")
                            }else{
                                $(".item_play_spin_progress_bubble ").css("width", "100%");
                                $(".item_play_spin_progress_bubble ").addClass('clickgif');
                            }
                            $(".item_play_spin_progress_percent").html(data.userpoint + "/100 point");
                            $("#saleoffpass").val("");
                            tyleLoop = 1;
                            doSlot(num1,num2,num3,num4,num5);

                        },
                        error: function() {
                            $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                            $('#noticeModal').modal('show');
                        }
                    })
                }
            });


            function getgifbonus() {
                if($('#checkPoint').val() != "1"){
                    return;
                }
                $.ajax({
                    url: '/minigame-bonus',
                    datatype: 'json',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: '{{$result->group->id}}',
                    },
                    type: 'POST',
                    success: function(data) {
                        if (data.status == 0) {
                            $('#noticeModal .content-popup').text(data.msg);
                            $('#noticeModal').modal('show');
                            return;
                        }
                        $('#noticeModal .nohuthang').html(data.msg + " - " + data.arr_gift[0].title);
                        $('#noticeModal').modal('show');
                        var userpoint = data.userpoint;
                        if(userpoint<100){
                            $(".item_play_spin_progress_bubble ").css("width", data.userpoint + "%");
                            $(".item_play_spin_progress_bubble ").removeClass('clickgif');
                        }else{
                            $(".item_play_spin_progress_bubble ").css("width", "100%");
                            $(".item_play_spin_progress_bubble ").addClass('clickgif');
                        }
                        $(".item_play_spin_progress_percent").html(data.userpoint + "/100 point");
                        $(".pyro").show();
                        setTimeout(function(){
                            $(".pyro").hide();
                        },6000)
                    },
                    error: function() {
                        $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                        $('#noticeModal').modal('show');
                    }
                })
            }


            $('body').delegate('.num-play-try', 'click', function() {
                if (roll_check) {
                    fakeLoop();
                    roll_check = false;
                    saleoffpass = $("#saleoffpass").val();
                    typeRoll = "try";
                    numrolllop = $("#numrolllop").val();
                    $.ajax({
                        url: '/minigame-play',
                        datatype: 'json',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: '{{$result->group->id}}',
                            numrolllop: numrolllop,
                            numrollbyorder: numrollbyorder,
                            typeRoll: typeRoll,
                            saleoffpass: saleoffpass,
                        },
                        type: 'POST',
                        success: function(data) {
                            if (data.status == 4) {
                                location.href='/login?return_url='+window.location.href;
                                return;
                            } else if (data.status == 3) {
                                $('#naptheModal').modal('show')
                                return;
                            } else if (data.status == 0) {
                                roll_check = true;
                                $('#noticeModal .content-popup').text(data.msg);
                                $('#noticeModal').modal('show');
                                return;
                            }
                            roll_check = true;
                            gift_detail = data.gift_detail;
                            var num1=0;
                            var num2=0;
                            var num3=0;
                            if(gift_detail.winbox == 0){
                                var num1 = parseInt(gift_detail.order)+1;
                                var num2 = randomExpert(1,parseInt('{{count($result->group->items)}}'),num1,'999999');
                                var num3 = randomExpert(1,parseInt('{{count($result->group->items)}}'),num1,num2);
                                var num4 = randomExpert(1,parseInt('{{count($result->group->items)}}'),num1,num2);
                                var num5 = randomExpert(1,parseInt('{{count($result->group->items)}}'),num1,num2);
                            }else{
                                var num1 = parseInt(gift_detail.order)+1;
                                var num2 = parseInt(gift_detail.order)+1;
                                var num3 = parseInt(gift_detail.order)+1;
                                var num4=0;
                                var num5=0;
                                if(xvalue == 1)
                                {
                                    num4 = parseInt(gift_detail.order)+1;
                                }
                                else
                                {
                                    if(num1>4)
                                    {
                                        num4 =  randomExpert(1,parseInt('{{count($result->group->items)-4}}'),num1,'999999');
                                    }
                                    else
                                    {
                                        num4 =  randomExpert(4,parseInt('{{count($result->group->items)}}'),num1,'999999');
                                    }
                                }
                                if(xvalue == 2)
                                {
                                    num4 = parseInt(gift_detail.order)+1;
                                    num5 = parseInt(gift_detail.order)+1;
                                }
                                else
                                {
                                    if(num1>4)
                                    {
                                        num5 =  randomExpert(1,parseInt('{{count($result->group->items)-4}}'),num1,'999999');
                                    }
                                    else
                                    {
                                        num5 =  randomExpert(4,parseInt('{{count($result->group->items)}}'),num1,'999999');
                                    }
                                }
                            }


                            gift_revice = data.arr_gift;
                            numrollbyorder = parseInt(data.numrollbyorder) + 1;
                            arrxgt = data.xgt;
                            if (arrxgt > 0) {
                                xvalue = arrxgt[arrxgt.length - 1];
                            } else {
                                xvalue = 0;
                            }
                            value_gif_bonus = data.value_gif_bonus;
                            msg_random_bonus = data.msg_random_bonus;
                            xvalueaDD = data.xValue;
                            free_wheel = data.free_wheel;
                            userpoint = data.userpoint;
                            if(userpoint<100){
                                $(".item_play_spin_progress_bubble ").css("width", data.userpoint + "%")
                            }else{
                                $(".item_play_spin_progress_bubble ").css("width", "100%");
                                $(".item_play_spin_progress_bubble ").addClass('clickgif');
                            }
                            $(".item_play_spin_progress_percent").html(data.userpoint + "/100 point");
                            $("#saleoffpass").val("");

                            tyleLoop = 1;
                            doSlot(num1,num2,num3,num4,num5);

                        },
                        error: function() {
                            $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                            $('#noticeModal').modal('show');
                        }
                    })
                }
            });

            function fakeLoop(){
                document.getElementById("slot1").className='a1'
                document.getElementById("slot2").className='a1'
                document.getElementById("slot3").className='a1'
                document.getElementById("slot4").className='a1'
                document.getElementById("slot5").className='a1'
                var i1 = 0;
                var i2 = 0;
                var i3 = 0;
                var i4 = 0;
                var i5 = 0;
                slot1_fake = setInterval(spin1_fake, 50);
                slot2_fake = setInterval(spin2_fake, 50);
                slot3_fake = setInterval(spin3_fake, 50);
                slot4_fake = setInterval(spin4_fake, 50);
                slot5_fake = setInterval(spin5_fake, 50);
                function spin1_fake() {
                    i1++;
                    slotTile = document.getElementById("slot1");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
                function spin2_fake(){
                    i2++;
                    slotTile = document.getElementById("slot2");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
                function spin3_fake(){
                    i3++;
                    slotTile = document.getElementById("slot3");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
                function spin4_fake(){
                    i4++;
                    slotTile = document.getElementById("slot4");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
                function spin5_fake(){
                    i5++;
                    slotTile = document.getElementById("slot5");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
            }


            function doSlot(one, two, three,four,five){
                clearInterval(slot1_fake);
                clearInterval(slot2_fake);
                clearInterval(slot3_fake);
                clearInterval(slot4_fake);
                clearInterval(slot5_fake);
                document.getElementById("slot1").className='a1'
                document.getElementById("slot2").className='a1'
                document.getElementById("slot3").className='a1'
                document.getElementById("slot4").className='a1'
                document.getElementById("slot5").className='a1'
                var numChanges = randomInt(1,4)*parseInt('{{count($result->group->items)}}');
                var numeberSlot1 = numChanges+one
                var numeberSlot2 = numChanges+2*parseInt('{{count($result->group->items)}}')+two;
                var numeberSlot3 = numChanges+4*parseInt('{{count($result->group->items)}}')+three;
                var numeberSlot4 = numChanges+6*parseInt('{{count($result->group->items)}}')+four;
                var numeberSlot5 = numChanges+8*parseInt('{{count($result->group->items)}}')+five;
                var i1 = 0;
                var i2 = 0;
                var i3 = 0;
                var i4 = 0;
                var i5 = 0;
                slot1 = setInterval(spin1, 50);
                slot2 = setInterval(spin2, 50);
                slot3 = setInterval(spin3, 50);
                slot4 = setInterval(spin4, 50);
                slot5 = setInterval(spin5, 50);

                function spin1() {
                    i1++;
                    if (tyleLoop == 1) {
                        if (i1 >= numeberSlot1) {
                            clearInterval(slot1);
                            return null;
                        }
                    }
                    slotTile = document.getElementById("slot1");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
                function spin2(){
                    i2++;
                    if (tyleLoop == 1) {
                        if (i2 >= numeberSlot2) {
                            clearInterval(slot2);

                            return null;
                        }
                    }
                    slotTile = document.getElementById("slot2");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
                function spin3(){
                    i3++;
                    if (tyleLoop == 1) {
                        if (i3 >= numeberSlot3) {
                            clearInterval(slot3);
                            return null;
                        }
                    }
                    slotTile = document.getElementById("slot3");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
                function spin4(){
                    i4++;
                    if (tyleLoop == 1) {
                        if (i4 >= numeberSlot4) {
                            clearInterval(slot4);
                            return null;
                        }
                    }
                    slotTile = document.getElementById("slot4");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
                function spin5(){
                    i5++;
                    if (tyleLoop == 1) {
                        if (i5 >= numeberSlot5) {
                            clearInterval(slot5);
                            testWin(one);
                            return null;
                        }
                    }
                    slotTile = document.getElementById("slot5");
                    if (slotTile.className=="a{{count($result->group->items)}}"){
                        slotTile.className = "a0";
                    }
                    slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
                }
            }

            function randomInt(min, max){
                return Math.floor((Math.random() * (max-min+1)) + min);
            }

            function randomExpert(min, max, expert, expert1){
                var value = Math.floor((Math.random() * (max-min+1)) + min);
                if(value == expert){
                    randomExpert(min, max, expert, expert1);
                }
                if(value == expert1){
                    randomExpert(min, max, expert, expert1);
                }
                return value;
            }

            function testWin(num1) {
                if(xvalue == 0)
                {
                    //Đổi class phần thưởng của 4,5 nếu trùng class phần thưởng nhận được(1)
                    if($("#slot4").attr('class') == $("#slot1").attr('class'))
                    {
                        if(num1>4)
                        {
                            document.getElementById("slot4").className = "a"+(num1-1);
                        }
                        else
                        {
                            document.getElementById("slot4").className = "a"+(num1+1);
                        }
                    }
                    if($("#slot5").attr('class') == $("#slot1").attr('class'))
                    {

                        if(num1>4)
                        {
                            document.getElementById("slot5").className = "a"+(num1-1);
                        }
                        else
                        {
                            document.getElementById("slot5").className = "a"+(num1+1);
                        }
                    }
                }
                if(xvalue == 1)
                {
                    //Đổi class phần thưởng của 5 nếu trùng class phần thưởng nhận được(1)
                    if($("#slot5").attr('class') == $("#slot1").attr('class'))
                    {

                        if(num1>4)
                        {
                            document.getElementById("slot5").className = "a"+(num1-1);
                        }
                        else
                        {
                            document.getElementById("slot5").className = "a"+(num1+1);
                        }
                    }
                }
                roll_check = true;

                $("#btnWithdraw").show();
                if (gift_detail.winbox == 0) {
                    $("#btnWithdraw").hide();
                } else {
                    if (gift_detail.gift_type == 0) {
                        $("#btnWithdraw").html("Rút " + $("#withdrawruby_" + gift_detail.game_type).val());
                        $("#btnWithdraw").attr('href', '/withdrawitem-' + gift_detail.game_type);
                    } else if (gift_detail.gift_type == 1) {
                        $("#btnWithdraw").html("Kiểm tra nick trúng");
                        $("#btnWithdraw").attr('href', '/minigame-logacc-' + '{{$result->group->id}}');
                        // } else if (gift_detail.gift_type == 'nrocoin') {
                        //     $("#btnWithdraw").html("Rút vàng");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROCOIN").val());
                        // } else if (gift_detail.gift_type == 'nrogem') {
                        //     $("#btnWithdraw").html("Rút ngọc");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROGEM").val());
                        // } else if (gift_detail.gift_type == 'nroxu') {
                        //     $("#btnWithdraw").html("Rút xu");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NINJAXU").val());
                    } else if (gift_detail.gift_type == 2) {
                        $("#btnWithdraw").html("Load lại trang");
                        $("#btnWithdraw").removeAttr("href");
                        $("#btnWithdraw").addClass('reLoad');
                    } else {
                        $("#btnWithdraw").hide();
                    }

                }


                if (gift_revice.length > 0) {
                    $html = "";
                    $strDiscountcode = "";
                    // if(saleoffmessage.length > 0)
                    // {
                    //     $html += "<br/><span style='font-size: 14px;color: #f90707;font-style: italic;display: block;text-align: center;'>"+saleoffmessage+"</span><br/>";
                    // }

                    if (typeRoll == "real") {
                        if (gift_revice.length == 1) {
                            // if(arrDiscount[0] != "")
                            // {
                            //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[0]+"</b></span>";
                            // }
                            $html += "<span>Kết quả: " + gift_revice[0]["title"] + "</span><br/>";
                            if (gift_detail.winbox == 1) {
                                $html += "<span>Mua X1: Nhận được " + gift_revice[0]["parrent"].params.value + "</span><br/>";
                                $html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                                $html += "<span>Tổng cộng: " + parseInt(gift_revice[0]["parrent"].params.value) * (parseInt(xvalueaDD[0])) + "</span>";
                            }
                        } else {
                            $totalRevice = 0;
                            $html += "<span>Kết quả: Nhận " + gift_revice.length + " phần thưởng cho " + gift_revice.length + " lượt quay.</span><br/>";
                            $html += "<span><b>Mua X" + gift_revice.length + ":</b></span><br/>";
                            for ($i = 0; $i < gift_revice.length; $i++) {
                                // if(arrDiscount[$i] != "")
                                // {
                                //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[$i]+"</b></span>";
                                // }
                                $html += "<span>Lần quay " + ($i + 1) + ": " + gift_revice[$i]["title"];
                                if (gift_revice[$i].winbox == 1) {
                                    $html += " - nhận được: " + gift_revice[$i]["parrent"].params.value + " X" + (parseInt(xvalueaDD[$i])) + " = " + parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + "" + msg_random_bonus[$i] + "</span><br/>"  + "<br/>";
                                } else {
                                    $html += "" + msg_random_bonus[$i] + "<br/>" + $strDiscountcode + "<br/>";
                                }
                                $totalRevice += parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i]);
                            }

                            $html += "<span><b>Tổng cộng: " + $totalRevice + "</b></span>";
                        }
                    } else {
                        $("#btnWithdraw").hide();
                        if (gift_revice.length == 1) {
                            $html += "<span>Kết quả chơi thử: " + gift_revice[0]["title"] + "</span><br/>";
                            if (gift_detail.winbox == 1) {
                                $html += "<span>Mua X1: Nhận được " + gift_revice[0]["parrent"].params.value + "</span><br/>";
                                $html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                                $html += "<span>Tổng cộng: " + parseInt(gift_revice[0]["parrent"].params.value) * (parseInt(xvalueaDD[0])) + "</span>";
                            }
                        } else {
                            $totalRevice = 0;
                            $html += "<span>Kết quả chơi thử: Nhận " + gift_revice.length + " phần thưởng cho " + gift_revice.length + " lượt quay.</span><br/>";
                            $html += "<span><b>Mua X" + gift_revice.length + ":</b></span><br/>";
                            for ($i = 0; $i < gift_revice.length; $i++) {
                                $html += "<spasn>Lần quay " + ($i + 1) + ": " + gift_revice[$i]["title"];
                                if (gift_revice[$i].winbox == 1) {
                                    $html += " - nhận được: " + gift_revice[$i]["parrent"].params.value + " X" + (parseInt(xvalueaDD[$i])) + " = " + parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + "" + msg_random_bonus[$i] + "</span><br/>";
                                } else {
                                    $html += "" + msg_random_bonus[$i] + "<br/>";
                                }
                                $totalRevice += parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i]);
                            }

                            $html += "<span><b>Tổng cộng: " + $totalRevice + "</b></span>";
                        }
                    }
                }

                $('#noticeModal .content-popup').html($html);

                if (userpoint > 99) {
                    getgifbonus();
                }
                $("#noticeModal").modal('show');
                $("#noticeModal").on("hidden.bs.modal", function () {
                    $('.modal-backdrop').remove();
                    $('body').removeClass( "modal-open" );
                });
                if (free_wheel < 1) {
                    $('.num-play-free').hide();
                } else {
                    $('.num-play-free').html("(Bạn còn " + free_wheel + " lượt quay miễn phí)");
                }
            }
        });

        $('body').delegate('.reLoad', 'click', function() {
            location.reload();
        })
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).on('scroll',function(){
                if($(window).width() > 1024){
                    if ($(this).scrollTop() > 100) {
                        $(".nav-bar-container").css("height","90px");
                        $(".nav-bar-category .nav li a").css("line-height","90px");
                        $("header .nav-bar").css("background-color","rgba(0,0,0,0.5)");
                        $(".nav-bar-brand").css("margin","14px");

                    } else {
                        $(".nav-bar-container").css("height","120px");
                        $(".nav-bar-category .nav li a").css("line-height","120px");
                        $(".nav-bar-brand").css("margin","20px 0");
                        $("header .nav-bar").css("background-color","rgba(0,0,0,0.8)");
                    }
                }

            });
            $('.item_play_intro_viewmore').click(function(){
                $('.item_play_intro_viewless').css("display","flex");
                $('.item_play_intro_viewmore').css("display","none");
                $(".item_play_intro_content").addClass( "showtext" );
            });
            $('.item_play_intro_viewless').click(function(){
                $('.item_play_intro_viewmore').css("display","flex");
                $('.item_play_intro_viewless').css("display","none");
                $(".item_play_intro_content").removeClass( "showtext");
            });
            $('.item_spin_list_more').click(function(){
                $('.item_spin_list').css("overflow","auto");
                $('.item_spin_list_less').css("display","block");
                $(".item_spin_list_more").css("display","none");
            });
            $('.item_spin_list_less').click(function(){
                $('.item_spin_list').css("overflow","hidden");
                $('.item_spin_list_less').css("display","none");
                $(".item_spin_list_more").css("display","block");
            });


        });
    </script>
    <script>
        $(".nav-tabs #tap1-tab-1").on("click",function(){
            $(".active").removeClass("active");
            $(this).parents("li").addClass("active");
            $(".tab-pane").hide();
            $("#tap1-pane-1").show();
        })
        $(".nav-tabs #tap1-tab-2").on("click",function(){
            $(".active").removeClass("active");
            $(this).parents("li").addClass("active");
            $(".tab-pane").hide();
            $("#tap1-pane-2").show();
        })
        $(".nav-tabs #tap1-tab-3").on("click",function(){
            $(".active").removeClass("active");
            $(this).parents("li").addClass("active");
            $(".tab-pane").hide();
            $("#tap1-pane-3").show();

        })
    </script>
    <style>
        @php
    $count = 0;
@endphp
@foreach($result->group->items as $gift)
    @php
        $count++;
    @endphp
    .a{{$count}}{background-image: url("{{\App\Library\MediaHelpers::media($gift->parrent->image)}}") !important;}
        @endforeach
#slot1,#slot2,#slot3,#slot4,#slot5{
            display: inline-block;
            margin-top: 2px;
            margin-left: 1px;
            margin-right: 45px;
            margin: 0 6px;
            background-size: 100px 93px;
            width: 100px;
            height: 93px;
            background-repeat: no-repeat;
        }
    </style>
    @break

    @case('squarewheel')
    <script>
        $(document).ready(function(e) {
            @if(isset($result->group->items) && count($result->group->items)>0)
            @foreach($result->group->items as $index=>$item)
            $('.gift'+({{$index}}+1)).attr('id',"id"+{{$item->item_id}});
            $('.gift'+({{$index}}+1)+' img').attr('src','{{\App\Library\MediaHelpers::media($item->parrent->image)}}');
            @endforeach
            @endif
            $(".thele").on("click", function(){
                $("#theleModal").modal('show');
            })
            $(".tylevongquay").on("click", function(){
                $("#tylevongquayModal").modal('show');
            })
            $(".uytin").on("click", function(){
                $("#uytinModal").modal('show');
            })
            $(".luotquay").on("click", function(){
                $("#luotquayModal").modal('show');
            })
            $(".topquaythuong").on("click", function(){
                $("#topquaythuongModal").modal('show');
            })

            var num_loop = 3;
            var num = 0;
            var num_current = 0;
            var target = 0;
            var time = 400
            var runtime ='';
            var runrealtime ='';

            var gift_revice = "";
            var saleoffpass = "";
            var userpoint = 0;
            var numrollbyorder = 0;
            var roll_check = true;
            var angle_gift = '';
            var num_gift = '{{count($result->group->items)}}';
            var gift_detail = '';
            var num_roll_remain = 0;
            var angles = 0;
            var arrxgt;
            var typeRoll = "real";
            var free_wheel = 0;
            var value_gif_bonus = '';
            var msg_random_bonus = '';
            var startat = 0;

            //Click nút quay
            $('body').delegate('#start-played', 'click', function() {

                if (roll_check) {
                    num_current = startat;
                    num = startat;
                    startat = 0;
                    //fakeLoop();
                    roll_check = false;
                    saleoffpass = $("#saleoffpass").val();
                    typeRoll = "real";
                    numrolllop = $("#numrolllop").val();
                    $.ajax({
                        url: '/minigame-play',
                        datatype: 'json',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: '{{$result->group->id}}',
                            numrolllop: numrolllop,
                            numrollbyorder: numrollbyorder,
                            typeRoll: typeRoll,
                            saleoffpass: saleoffpass,
                        },
                        type: 'POST',
                        success: function(data) {

                            if (data.status == 4) {
                                location.href='/login?return_url='+window.location.href;
                                return;
                            } else if (data.status == 3) {
                                clearTimeout(runtime);
                                roll_check = true;
                                $('#naptheModal').modal('show')
                                return;
                            } else if (data.status == 0) {
                                clearTimeout(runtime);
                                roll_check = true;
                                $('#noticeModal .content-popup').text(data.msg);
                                $('#noticeModal').modal('show');
                                return;
                            }
                            numrollbyorder = parseInt(data.numrollbyorder) + 1;
                            gift_detail = data.gift_detail;
                            gift_revice = data.arr_gift;
                            arrxgt = data.xgt;
                            if (data.xgt > 0) {
                                xvalue = data.xgt[data.xgt.length - 1];
                            } else {
                                xvalue = 0;
                            }

                            value_gif_bonus = data.value_gif_bonus;
                            msg_random_bonus = data.msg_random_bonus;
                            xvalueaDD = data.xValue;
                            free_wheel = data.free_wheel;
                            num_roll_remain = gift_detail.num_roll_remain;
                            var targetId = gift_detail.id;
                            target = parseInt($('#id'+targetId).attr('data-num'));
                            loop();

                            userpoint = data.userpoint;
                            if(userpoint<100){
                                $(".item_spin_progress_bubble").css("width", data.userpoint + "%")
                            }else{
                                $(".item_spin_progress_bubble").css("width", "100%");
                                $(".item_spin_progress_bubble").addClass('clickgif');
                            }
                            $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                            $("#saleoffpass").val("");
                        },
                        error: function() {
                            $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                            $('#noticeModal').modal('show');
                        }
                    })
                }
            });


            function getgifbonus() {
                $.ajax({
                    url: '/minigame-bonus',
                    datatype: 'json',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: '{{$result->group->id}}',
                    },
                    type: 'POST',
                    success: function(data) {
                        if (data.status == 0) {
                            $('#noticeModal .content-popup').text(data.msg);
                            $('#noticeModal').modal('show');
                            return;
                        }
                        $('#noticeModal .nohuthang').html(data.msg + " - " + data.arr_gift[0].title);
                        $('#noticeModal').modal('show');
                        var userpoint = data.userpoint;
                        if(userpoint<100){
                            $(".item_spin_progress_bubble").css("width", data.userpoint + "%");
                            $(".item_spin_progress_bubble").removeClass('clickgif');
                        }else{
                            $(".item_spin_progress_bubble").css("width", "100%");
                            $(".item_spin_progress_bubble").addClass('clickgif');
                        }
                        $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                        $(".pyro").show();
                        setTimeout(function(){
                            $(".pyro").hide();
                        },6000)
                    },
                    error: function() {
                        $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                        $('#noticeModal').modal('show');
                    }
                })
            }


            $('body').delegate('.num-play-try', 'click', function() {
                if (roll_check) {
                    num_current = startat;
                    num = startat;
                    startat = 0;
                    //fakeLoop();
                    roll_check = false;
                    saleoffpass = $("#saleoffpass").val();
                    typeRoll = "try";
                    numrolllop = $("#numrolllop").val();
                    $.ajax({
                        url: '/minigame-play',
                        datatype: 'json',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: '{{$result->group->id}}',
                            numrolllop: numrolllop,
                            numrollbyorder: numrollbyorder,
                            typeRoll: typeRoll,
                            saleoffpass: saleoffpass,
                        },
                        type: 'POST',
                        success: function(data) {

                            if (data.status == 4) {
                                location.href='/login?return_url='+window.location.href;
                                return;
                            } else if (data.status == 3) {
                                clearTimeout(runtime);
                                roll_check = true;
                                $('#naptheModal').modal('show')
                                return;
                            } else if (data.status == 0) {
                                clearTimeout(runtime);
                                roll_check = true;
                                $('#noticeModal .content-popup').text(data.msg);
                                $('#noticeModal').modal('show');
                                return;
                            }
                            numrollbyorder = parseInt(data.numrollbyorder) + 1;
                            gift_detail = data.gift_detail;
                            gift_revice = data.arr_gift;
                            arrxgt = data.xgt;
                            if (data.xgt > 0) {
                                xvalue = data.xgt[data.xgt.length - 1];
                            } else {
                                xvalue = 0;
                            }

                            value_gif_bonus = data.value_gif_bonus;
                            msg_random_bonus = data.msg_random_bonus;
                            xvalueaDD = data.xValue;
                            free_wheel = data.free_wheel;
                            num_roll_remain = gift_detail.num_roll_remain;
                            var targetId = gift_detail.id;
                            target = parseInt($('#id'+targetId).attr('data-num'));
                            loop();

                            userpoint = data.userpoint;
                            if(userpoint<100){
                                $(".item_spin_progress_bubble").css("width", data.userpoint + "%")
                            }else{
                                $(".item_spin_progress_bubble").css("width", "100%");
                                $(".item_spin_progress_bubble").addClass('clickgif');
                            }
                            $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                            $("#saleoffpass").val("");
                        },
                        error: function() {
                            $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                            $('#noticeModal').modal('show');
                        }
                    })
                }
            });


            // function fakeLoop(){
            //     num++;
            //     num_current++;
            //     if(num_current>11){
            //         num_current = 0;
            //     }
            //     $('.box img').removeClass('active');
            //     $('.gift'+(num_current)+' img').addClass('active');

            //     if(num<4){
            //         time = 400
            //     }else if(num<8){
            //         time = 200
            //     }else if(num>7){
            //         time = 60
            //     }
            //     runtime = setTimeout(function(){
            //         fakeLoop();
            //     },time);
            // }


            function loop() {
                clearTimeout(runtime);
                if(num<(parseInt(num_loop*12)+target)){
                    num++;
                    num_current++;
                    $('.box img').removeClass('active');
                    $('.gift'+(num_current)+' img').addClass('active');
                    var time = 400
                    if(num<4){
                        time = 400
                    }else if(num<8){
                        time = 200
                    }else if(num>7){
                        time = 60
                    }

                    if(num>((num_loop*12)+target-7) && num<((num_loop*12)+target-3)){
                        time = 200;
                    }

                    if(num>((num_loop*12)+target-4)){
                        time = 400
                    }
                    runrealtime = setTimeout(function(){
                        loop();
                    },time);

                    if(num_current==12){
                        num_current=0;
                    }
                } else {
                    roll_check = true;
                    startat = target;
                    $("#btnWithdraw").show();
                    if (gift_detail.winbox == 0) {
                        $("#btnWithdraw").hide();
                    } else {
                        if (gift_detail.gift_type == 0) {
                            $("#btnWithdraw").html("Rút " + $("#withdrawruby_" + gift_detail.game_type).val());
                            $("#btnWithdraw").attr('href', '/withdrawitem-' + gift_detail.game_type);
                        } else if (gift_detail.gift_type == 1) {
                            $("#btnWithdraw").html("Kiểm tra nick trúng");
                            $("#btnWithdraw").attr('href', '/logaccgame?id=' + '{{$result->group->id}}');
                            // } else if (gift_detail.gift_type == 'nrocoin') {
                            //     $("#btnWithdraw").html("Rút vàng");
                            //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROCOIN").val());
                            // } else if (gift_detail.gift_type == 'nrogem') {
                            //     $("#btnWithdraw").html("Rút ngọc");
                            //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROGEM").val());
                            // } else if (gift_detail.gift_type == 'nroxu') {
                            //     $("#btnWithdraw").html("Rút xu");
                            //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NINJAXU").val());
                        } else if (gift_detail.gift_type == 2) {
                            $("#btnWithdraw").html("Load lại trang");
                            $("#btnWithdraw").removeAttr("href");
                            $("#btnWithdraw").addClass('reLoad');
                        } else {
                            $("#btnWithdraw").hide();
                        }

                    }
                    if (gift_revice.length > 0) {
                        $html = "";
                        $strDiscountcode="";
                        // if(saleoffmessage.length > 0)
                        // {
                        //     $html += "<br/><span style='font-size: 14px;color: #f90707;font-style: italic;display: block;text-align: center;'>"+saleoffmessage+"</span><br/>";
                        // }

                        if(typeRoll == "real")
                        {
                            if(gift_revice.length == 1)
                            {
                                // if(arrDiscount[0] != "")
                                // {
                                //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[0]+"</b></span>";
                                // }
                                $html += "<span>Kết quả: "+gift_revice[0]["title"]+"</span><br/>";
                                if(gift_detail.winbox == 1){
                                    $html += "<span>Mua X1: Nhận được "+gift_revice[0]["parrent"].params.value+"</span><br/>";
                                    //$html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>"+$strDiscountcode;
                                    $html += "<span>Tổng cộng: "+parseInt(gift_revice[0]["parrent"].params.value)*(parseInt(xvalueaDD[0]))+"</span>";
                                }
                            }
                            else
                            {
                                $totalRevice = 0;
                                $html += "<span>Kết quả: Nhận "+gift_revice.length+" phần thưởng cho "+gift_revice.length+" lượt quay.</span><br/>";
                                $html += "<span><b>Mua X"+gift_revice.length+":</b></span><br/>";
                                for($i=0;$i<gift_revice.length;$i++)
                                {
                                    // if(arrDiscount[$i] != "")
                                    // {
                                    //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[$i]+"</b></span>";
                                    // }
                                    $html += "<span>Lần quay "+($i + 1)+": "+gift_revice[$i]["title"];
                                    if(gift_revice[$i].winbox == 1){
                                        $html +=" - nhận được: "+gift_revice[$i]["parrent"].params.value+" X"+(parseInt(xvalueaDD[$i]))+" = "+parseInt(gift_revice[$i]["parrent"].params.value)*(parseInt(xvalueaDD[$i]))+""+msg_random_bonus[$i]+"</span><br/>"+$strDiscountcode+"<br/>";
                                    }
                                    else
                                    {
                                        $html +=""+msg_random_bonus[$i]+"<br/>"+$strDiscountcode+"<br/>";
                                    }
                                    $totalRevice +=  parseInt(gift_revice[$i]["parrent"].params.value)*(parseInt(xvalueaDD[$i]))+ parseInt(value_gif_bonus[$i]);
                                }

                                $html += "<span><b>Tổng cộng: "+$totalRevice+"</b></span>";
                            }
                        }
                        else
                        {
                            $("#btnWithdraw").hide();
                            if(gift_revice.length == 1)
                            {
                                $html += "<span>Kết quả chơi thử: "+gift_revice[0]["title"]+"</span><br/>";
                                if(gift_detail.winbox == 1){
                                    $html += "<span>Mua X1: Nhận được "+gift_revice[0]["parrent"].params.value+"</span><br/>";
                                    //$html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                                    $html += "<span>Tổng cộng: "+parseInt(gift_revice[0]["parrent"].params.value)*(parseInt(xvalueaDD[0]))+"</span>";
                                }
                            }
                            else
                            {
                                $totalRevice = 0;
                                $html += "<span>Kết quả chơi thử: Nhận "+gift_revice.length+" phần thưởng cho "+gift_revice.length+" lượt quay.</span><br/>";
                                $html += "<span><b>Mua X"+gift_revice.length+":</b></span><br/>";
                                for($i=0;$i<gift_revice.length;$i++)
                                {
                                    $html += "<span>Lần quay "+($i + 1)+": "+gift_revice[$i]['parrent'].title;
                                    if(gift_revice[$i].winbox == 1){
                                        $html +=" - nhận được: "+gift_revice[$i]["parrent"].params.value+" X"+(parseInt(xvalueaDD[$i]))+" = "+parseInt(gift_revice[$i]["parrent"].params.value)*(parseInt(xvalueaDD[$i]))+""+msg_random_bonus[$i]+"</span><br/>";
                                    }
                                    else
                                    {
                                        $html +=""+msg_random_bonus[$i]+"<br/>";
                                    }
                                    $totalRevice +=  parseInt(gift_revice[$i]["parrent"].params.value)*(parseInt(xvalueaDD[$i]))+ parseInt(value_gif_bonus[$i]);
                                }

                                $html += "<span><b>Tổng cộng: "+$totalRevice+"</b></span>";
                            }
                        }
                    }

                    $('#noticeModal .content-popup').html($html);

                    if (userpoint > 99) {
                        getgifbonus();
                    }
                    $('#noticeModal').modal('show');
                    if (free_wheel < 1) {
                        $('.num-play-free').hide();
                    } else {
                        $('.num-play-free').html("(Bạn còn " + free_wheel + " lượt quay miễn phí)");
                    }
                    if (num_roll_remain == 0) {
                        $('.deposit-btn').show();
                    } else {
                        $('.deposit-btn').hide();
                    }
                }
            }
        });

        $('body').delegate('.reLoad', 'click', function() {
            location.reload();
        })
    </script>
    <style>
        .box img.active{box-shadow:0 0 1px #fff, 0 0 2px #fff, 0 0 45px #f00, 0 0 30px #ff0013, 0 0 25px #f10303}
    </style>
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).on('scroll',function(){
                if($(window).width() > 1024){
                    if ($(this).scrollTop() > 100) {
                        $(".nav-bar-container").css("height","90px");
                        $(".nav-bar-category .nav li a").css("line-height","90px");
                        $("header .nav-bar").css("background-color","rgba(0,0,0,0.5)");
                        $(".nav-bar-brand").css("margin","14px");

                    } else {
                        $(".nav-bar-container").css("height","120px");
                        $(".nav-bar-category .nav li a").css("line-height","120px");
                        $(".nav-bar-brand").css("margin","20px 0");
                        $("header .nav-bar").css("background-color","rgba(0,0,0,0.8)");
                    }
                }

            });
            $('.item_play_intro_viewmore').click(function(){
                $('.item_play_intro_viewless').css("display","flex");
                $('.item_play_intro_viewmore').css("display","none");
                $(".item_play_intro_content").addClass( "showtext" );
            });
            $('.item_play_intro_viewless').click(function(){
                $('.item_play_intro_viewmore').css("display","flex");
                $('.item_play_intro_viewless').css("display","none");
                $(".item_play_intro_content").removeClass( "showtext");
            });
            $('.item_spin_list_more').click(function(){
                $('.item_spin_list').css("overflow","auto");
                $('.item_spin_list_less').css("display","block");
                $(".item_spin_list_more").css("display","none");
            });
            $('.item_spin_list_less').click(function(){
                $('.item_spin_list').css("overflow","hidden");
                $('.item_spin_list_less').css("display","none");
                $(".item_spin_list_more").css("display","block");
            });


        });
    </script>
    <script>
        $(".nav-tabs #tap1-tab-1").on("click",function(){
            $(".active").removeClass("active");
            $(this).parents("li").addClass("active");
            $(".tab-pane").hide();
            $("#tap1-pane-1").show();
        })
        $(".nav-tabs #tap1-tab-2").on("click",function(){
            $(".active").removeClass("active");
            $(this).parents("li").addClass("active");
            $(".tab-pane").hide();
            $("#tap1-pane-2").show();
        })
        $(".nav-tabs #tap1-tab-3").on("click",function(){
            $(".active").removeClass("active");
            $(this).parents("li").addClass("active");
            $(".tab-pane").hide();
            $("#tap1-pane-3").show();

        })
    </script>
    @break

    @case('smashwheel')
    @case('rungcay')
    @case('gieoque')
    <script>
        $(document).ready(function(e) {

            var saleoffpass = "";
            //var saleoffmessage = "";
            var userpoint = 0;
            var numrollbyorder = 0;
            var roll_check = true;
            var num_loop = 4;
            var angle_gift = '';
            var num_gift = '{{count($result->group->items)}}';
            var gift_detail = '';
            var num_roll_remain = 0;
            var angles = 0;
            var arrxgt;
            var free_wheel = 0;
            var value_gif_bonus = '';
            var msg_random_bonus = '';
            //var arrDiscount = '';

            $('body').delegate('#start-played', 'click', function() {
                $('#type_play').val('real');
                play();
            });

            $('body').delegate('.num-play-try', 'click', function() {
                $('#type_play').val('try');
                play();
            });

            //Click nút chơi
            function play(){
                if (roll_check) {
                    $('#lac_lixi').attr('src',$("#hdImageDapLu").val());
                    roll_check = false;
                    saleoffpass = $("#saleoffpass").val();
                    numrolllop = $("#numrolllop").val();
                    $.ajax({
                        url: '/minigame-play',
                        datatype: 'json',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id: '{{$result->group->id}}',
                            numrolllop: numrolllop,
                            numrollbyorder: numrollbyorder,
                            typeRoll: $('#type_play').val(),
                            saleoffpass: saleoffpass,
                        },
                        type: 'POST',
                        success: function(data) {
                            if (data.status == 4) {
                                location.href='/login?return_url='+window.location.href;
                            } else if (data.status == 3) {
                                $('#lac_lixi').attr('src',$("#hdImageLD").val());
                                roll_check = true;
                                $('#naptheModal').modal('show')
                                return;
                            } else if (data.status == 0) {
                                $('#lac_lixi').attr('src',$("#hdImageLD").val());
                                roll_check = true;
                                $('#noticeModal .content-popup').text(data.msg);
                                $('#noticeModal').modal('show');
                                return;
                            }
                            numrollbyorder = parseInt(data.numrollbyorder) + 1;
                            gift_detail = data.gift_detail;
                            console.log(gift_detail);
                            if(gift_detail.image.length > 0)
                            {
                                $('#lac_lixi').attr('src',gift_detail.image);
                            }
                            gift_revice = data.arr_gift;
                            //arrDiscount = data.arrDiscount;
                            arrxgt = data.xgt;
                            if (data.xgt > 0) {
                                xvalue = data.xgt[data.xgt.length - 1];
                            } else {
                                xvalue = 0;
                            }
                            value_gif_bonus = data.value_gif_bonus;
                            msg_random_bonus = data.msg_random_bonus;
                            xvalueaDD = data.xValue;
                            free_wheel = data.free_wheel;
                            num_roll_remain = gift_detail.num_roll_remain;
                            angles = 0;
                            angle_gift = gift_detail.order * (360 / num_gift);
                            loop();

                            if($('#type_play').val()=='real'){
                                userpoint = data.userpoint;
                                if(userpoint<100){
                                    $(".item_spin_progress_bubble").css("width", data.userpoint + "%")
                                }else{
                                    $(".item_spin_progress_bubble").css("width", "100%");
                                    $(".item_spin_progress_bubble").addClass('clickgif');
                                }
                                $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                                $("#saleoffpass").val("");
                                //saleoffmessage = data.saleMessage;
                            }
                        },
                        error: function() {
                            $('#lac_lixi').attr('src',$("#hdImageLD").val());
                            $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                            $('#noticeModal').modal('show');
                        }
                    })
                }
            };


            function getgifbonus() {
                if($('#checkPoint').val() != "1"){
                    return;
                }
                $.ajax({
                    url: '/minigame-bonus',
                    datatype: 'json',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: '{{$result->group->id}}',
                    },
                    type: 'POST',
                    success: function(data) {
                        if (data.status == 0) {
                            $('#noticeModal .content-popup').text(data.msg);
                            $('#noticeModal').modal('show');
                            return;
                        }
                        gift_detail = data.gift_detail;
                        if(gift_detail.image.length > 0)
                        {
                            $('#lac_lixi').attr('src',gift_detail.image);
                        }
                        $('#noticeModal .content-popup .appendContent').append(data.msg + " - " + data.arr_gift[0].title);
                        //$("#noticeModalNoHu #btnWithdraw").hide();
                        $('#noticeModal').modal('show');
                        var userpoint = data.userpoint;
                        if(userpoint<100){
                            $(".item_spin_progress_bubble").css("width", data.userpoint + "%");
                            $(".item_spin_progress_bubble").removeClass('clickgif');
                        }else{
                            $(".item_spin_progress_bubble").css("width", "100%");
                            $(".item_spin_progress_bubble").addClass('clickgif');
                        }
                        $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                        $(".pyro").show();
                        setTimeout(function(){
                            $(".pyro").hide();
                        },6000)
                    },
                    error: function() {
                        $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                        $('#noticeModal').modal('show');
                    }
                })
            }

            function loop() {
                roll_check = true;

                $("#btnWithdraw").show();
                if (gift_detail.winbox == 0) {
                    $("#btnWithdraw").hide();
                } else {
                    if (gift_detail.gift_type == 0) {
                        $("#btnWithdraw").html("Rút " + $("#withdrawruby_" + gift_detail.game_type).val());
                        $("#btnWithdraw").attr('href', '/withdrawitem-' + gift_detail.game_type);
                    } else if (gift_detail.gift_type == 1) {
                        $("#btnWithdraw").html("Kiểm tra nick trúng");
                        $("#btnWithdraw").attr('href', '/minigame-logacc-' + '{{$result->group->id}}');
                        // } else if (gift_detail.gift_type == 'nrocoin') {
                        //     $("#btnWithdraw").html("Rút vàng");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROCOIN").val());
                        // } else if (gift_detail.gift_type == 'nrogem') {
                        //     $("#btnWithdraw").html("Rút ngọc");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROGEM").val());
                        // } else if (gift_detail.gift_type == 'nroxu') {
                        //     $("#btnWithdraw").html("Rút xu");
                        //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NINJAXU").val());
                    } else if (gift_detail.gift_type == 2) {
                        $("#btnWithdraw").html("Load lại trang");
                        $("#btnWithdraw").removeAttr("href");
                        $("#btnWithdraw").addClass('reLoad');
                    } else {
                        $("#btnWithdraw").hide();
                    }

                }
                if (gift_revice.length > 0) {
                    $html = "";
                    $strDiscountcode="";
                    // if(saleoffmessage.length > 0)
                    // {
                    //     $html += "<br/><span style='font-size: 14px;color: #f90707;font-style: italic;display: block;text-align: center;'>"+saleoffmessage+"</span><br/>";
                    // }

                    if($('#type_play').val() == "real")
                    {
                        if(gift_revice.length == 1)
                        {
                            // if(arrDiscount[0] != "")
                            // {
                            //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[0]+"</b></span>";
                            // }
                            $html += "<span>Kết quả: "+gift_revice[0]["title"]+"</span><br/>";
                            if(gift_detail.winbox == 1){
                                $html += "<span>Mua X1: Nhận được "+gift_revice[0]["parrent"].params.value+"</span><br/>";
                                //$html += "<span>chơi được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>"+$strDiscountcode;
                                $html += "<span>Tổng cộng: "+parseInt(gift_revice[0]["parrent"].params.value)*(parseInt(xvalueaDD[0]))+"</span>";
                            }
                        }
                        else
                        {
                            $totalRevice = 0;
                            $html += "<span>Kết quả: Nhận "+gift_revice.length+" phần thưởng cho "+gift_revice.length+" lượt chơi.</span><br/>";
                            $html += "<span><b>Mua X"+gift_revice.length+":</b></span><br/>";
                            for($i=0;$i<gift_revice.length;$i++)
                            {
                                // if(arrDiscount[$i] != "")
                                // {
                                //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[$i]+"</b></span>";
                                // }
                                $html += "<span>Lần chơi "+($i + 1)+": "+gift_revice[$i]["title"];
                                if(gift_revice[$i].winbox == 1){
                                    $html +=" - nhận được: "+gift_revice[$i]["parrent"].params.value+" X"+(parseInt(xvalueaDD[$i]))+" = "+parseInt(gift_revice[$i]["parrent"].params.value)*(parseInt(xvalueaDD[$i]))+""+msg_random_bonus[$i]+"</span><br/>"+$strDiscountcode+"<br/>";
                                }
                                else
                                {
                                    $html +=""+msg_random_bonus[$i]+"<br/>"+$strDiscountcode+"<br/>";
                                }
                                $totalRevice +=  parseInt(gift_revice[$i]["parrent"].params.value)*(parseInt(xvalueaDD[$i]))+ parseInt(value_gif_bonus[$i]);
                            }

                            $html += "<span><b>Tổng cộng: "+$totalRevice+"</b></span>";
                        }
                    }
                    else
                    {
                        $("#btnWithdraw").hide();
                        if(gift_revice.length == 1)
                        {
                            $html += "<span>Kết quả chơi thử: "+gift_revice[0]["title"]+"</span><br/>";
                            if(gift_detail.winbox == 1){
                                $html += "<span>Mua X1: Nhận được "+gift_revice[0]["parrent"].params.value+"</span><br/>";
                                //$html += "<span>chơi được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                                $html += "<span>Tổng cộng: "+parseInt(gift_revice[0]["parrent"].params.value)*(parseInt(xvalueaDD[0]))+"</span>";
                            }
                        }
                        else
                        {
                            $totalRevice = 0;
                            $html += "<span>Kết quả chơi thử: Nhận "+gift_revice.length+" phần thưởng cho "+gift_revice.length+" lượt chơi.</span><br/>";
                            $html += "<span><b>Mua X"+gift_revice.length+":</b></span><br/>";
                            for($i=0;$i<gift_revice.length;$i++)
                            {
                                $html += "<span>Lần chơi "+($i + 1)+": "+gift_revice[$i]["title"];
                                if(gift_revice[$i].winbox == 1){
                                    $html +=" - nhận được: "+gift_revice[$i]["parrent"].params.value+" X"+(parseInt(xvalueaDD[$i]))+" = "+parseInt(gift_revice[$i]["parrent"].params.value)*(parseInt(xvalueaDD[$i]))+""+msg_random_bonus[$i]+"</span><br/>";
                                }
                                else
                                {
                                    $html +=""+msg_random_bonus[$i]+"<br/>";
                                }
                                $totalRevice +=  parseInt(gift_revice[$i]["parrent"].params.value)*(parseInt(xvalueaDD[$i]))+ parseInt(value_gif_bonus[$i]);
                            }

                            $html += "<span><b>Tổng cộng: "+$totalRevice+"</b></span>";
                        }
                    }
                }

                $('#noticeModal .content-popup').html($html);

                if (userpoint > 99) {
                    getgifbonus();
                }
                $('#noticeModal').modal('show');
            }
        });

        $('body').delegate('.reLoad', 'click', function() {
            location.reload();
        })
    </script>
    @break
    @default
@endswitch
