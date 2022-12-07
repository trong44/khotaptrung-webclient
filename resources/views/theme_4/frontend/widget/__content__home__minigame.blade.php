@if(isset($data) && count($data) > 0)

    @php
        $total_key_minigame = 8;
        $flag_slide_minigame = 0;
        if(setting('sys_theme_minigame_list') != ''){
            if (setting('sys_theme_minigame_list') > 1){
                $total_key_minigame = (int)setting('sys_theme_minigame_list')*4;
            }elseif (setting('sys_theme_minigame_list') == 1){
                $flag_slide_minigame = 1;
            }
        }
    @endphp

    <div class="d-flex justify-content-between" style="padding-top: 24px">
        @if($flag_slide_minigame == 0)
            <div class="main-title">
                <h1>{{ $title??'Dịch vụ minigame' }}</h1>
            </div>
        @else
            <div class="main-title" style="margin-bottom: 0;">
                <h1>{{ $title??'Dịch vụ minigame' }}</h1>
            </div>
        @endif

        @if($flag_slide_minigame == 0)
        <div class="service-search d-none d-lg-block">
            <div class="input-group p-box">
                <input type="text" id="txtSearchMinigame" placeholder="Tìm minigame" value="" class="" width="200px">
                <span class="icon-search"><i class="fas fa-search"></i></span>
            </div>
        </div>
        @else
            <div class="service-search d-none d-lg-block " style="font-size: 14px;line-height: 24px;font-weight: 600">
                <div class="input-group p-box">
                    <a href="/minigame" class="dich__vu__home">Xem tất cả »</a>
                </div>
            </div>
        @endif
    </div>
    @if($flag_slide_minigame == 0)
        <div class="entries" id="minigame__widget">
            <div class="row fix-border fix-border-dich-vu">

                <div class="col-md-12 left-right data-nick-search">
                    <span style="color: rgb(238, 70, 35);">Minigame cần tìm không tồn tại.</span>
                </div>
                @php
                    $index = 0;
                @endphp
                @foreach($data as $key => $item)
                    @if($key < 8)
                        @php
                            $index = 1;
                        @endphp
                        <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_minigame item-page-1" style="display: block">
                            <a href="/minigame-{{ $item->slug}}">
                                <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                     alt="{{ $item->slug   }}" class="entries_item-img">
                                <h2 class="text-title" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                                <p style="margin-bottom: 12px;margin-top: 4px;color: rgb(87, 87, 87)">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>
                                @if(isset($item->params->percent_sale))
                                    <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                                @else
                                @endif
                                <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>

                            </a>
                        </div>
                    @elseif($key < 16)
                        @php
                            $index = 2;
                        @endphp
                        <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_minigame item-page-2" style="display: none">
                            <a href="/minigame-{{ $item->slug}}">
                                <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                     alt="{{ $item->slug   }}" class="entries_item-img">
                                <h2 class="text-title" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                                <p style="margin-bottom: 12px;margin-top: 4px;color: rgb(87, 87, 87)">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>
                                @if(isset($item->params->percent_sale))
                                    <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                                @else
                                @endif
                                <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>

                            </a>
                        </div>
                    @elseif($key < 24)
                        @php
                            $index = 3;
                        @endphp
                        <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_minigame item-page-3" style="display: none">
                            <a href="/minigame-{{ $item->slug}}">
                                <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                     alt="{{ $item->slug   }}" class="entries_item-img">
                                <h2 class="text-title" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                                <p style="margin-bottom: 12px;margin-top: 4px;color: rgb(87, 87, 87)">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>
                                @if(isset($item->params->percent_sale))
                                    <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                                @else
                                @endif
                                <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>

                            </a>
                        </div>
                    @elseif($key < 32)
                        @php
                            $index = 4;
                        @endphp
                        <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_minigame item-page-4" style="display: none">
                            <a href="/minigame-{{ $item->slug}}">
                                <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                     alt="{{ $item->slug   }}" class="entries_item-img">
                                <h2 class="text-title" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                                <p style="margin-bottom: 12px;margin-top: 4px;color: rgb(87, 87, 87)">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>
                                @if(isset($item->params->percent_sale))
                                    <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                                @else
                                @endif
                                <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>

                            </a>
                        </div>
                    @elseif($key < 40)
                        @php
                            $index = 5;
                        @endphp
                        <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_minigame item-page-5" style="display: none">
                            <a href="/minigame-{{ $item->slug}}">
                                <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                     alt="{{ $item->slug   }}" class="entries_item-img">
                                <h2 class="text-title" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                                <p style="margin-bottom: 12px;margin-top: 4px;color: rgb(87, 87, 87)">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>
                                @if(isset($item->params->percent_sale))
                                    <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                                @else
                                @endif
                                <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>

                            </a>
                        </div>
                    @endif
                @endforeach

                @if(count($data) > 8)
                <button id="btn-expand-minigame" class="expand-button" data-page-current="1" data-page-max="{{ $index }}">Xem thêm minigame</button>
                @endif
            </div>


            <div class="entries-search">
                <div class="row fix-border-minigame">
                </div>
            </div>

        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#btn-expand-minigame').on('click', function(e) {
                    var pageCurrrent=$(this).data('page-current');
                    var pageMax=$(this).data('page-max');
                    pageCurrrent=pageCurrrent+1;
                    $('#minigame__widget .item-page-'+pageCurrrent).fadeIn( "fast", function() {

                    });
                    $(this).data('page-current',pageCurrrent);
                    if(pageCurrrent==pageMax){
                        $(this).remove();
                    }
                });
                $('body').on('click','#btn-expand-minigame-search',function(){

                    var pageCurrrent=$(this).data('page-current');
                    var pageMax=$(this).data('page-max');
                    pageCurrrent=pageCurrrent+1;
                    $('.dis-block').each(function (i,elm) {
                        if (pageCurrrent == 2){
                            if (i < 16){
                                $(this).css('display','block');
                            }
                        }else if (pageCurrrent == 3){
                            if (i < 24){
                                $(this).css('display','block');
                            }
                        }else if (pageCurrrent == 4){
                            if (i < 32){
                                $(this).css('display','block');
                            }
                        }else if (pageCurrrent == 5){
                            if (i < 40){
                                $(this).css('display','block');
                            }
                        }
                    });

                    $(this).data('page-current',pageCurrrent);
                    if(pageCurrrent==pageMax){
                        $(this).remove();
                    }
                });
            });

        </script>
    @else
        <div class="entries" style="margin-bottom: 0">
            <div class="slick-slider">
                @foreach($data as $item)

                    <div class="item image entries_item" style="padding-bottom: 16px">
                        <a href="/minigame-{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h2 class="text-title" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                            <p style="margin-bottom: 12px;margin-top: 4px;color: rgb(87, 87, 87)">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>
                            @if(isset($item->params->percent_sale))
                                <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                            @else
                            @endif
                            <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>

                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    @endif
@endif
