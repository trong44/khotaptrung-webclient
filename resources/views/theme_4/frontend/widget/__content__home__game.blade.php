@if(isset($data) && count($data) > 0)

    @php
        $total_key_nick = 8;
        $flag_slide_nick = 0;
        if(setting('sys_theme_nick_list') != ''){
            if (setting('sys_theme_nick_list') > 1){
                $total_key_nick = (int)setting('sys_theme_nick_list')*4;
            }elseif (setting('sys_theme_nick_list') == 1){
                $flag_slide_nick = 1;
            }
        }
    @endphp

    <div class="d-flex justify-content-between" style="padding-top: 24px;">
        @if($flag_slide_nick == 0)
        <div class="main-title">
            <h1>{{ $title??'Danh mục game' }}</h1>
        </div>
        @else
            <div class="main-title" style="margin-bottom: 0;">
                <h1>{{ $title??'Danh mục game' }}</h1>
            </div>
        @endif
        @if($flag_slide_nick == 0)
        <div class="service-search d-none d-lg-block">
            <div class="input-group p-box">
                <input type="text" id="txtSearchNick" placeholder="Tìm danh mục game" value="" class="" width="200px">
                <span class="icon-search"><i class="fas fa-search"></i></span>
            </div>
        </div>
        @else
            <div class="service-search d-none d-lg-block " style="font-size: 14px;line-height: 24px;font-weight: 600">
                <div class="input-group p-box">
                    <a href="/mua-acc" class="dich__vu__home">Xem tất cả »</a>
                </div>
            </div>
        @endif
    </div>
    @if($flag_slide_nick == 0)
    <div class="entries" id="nick__widget">
        <div class="row fix-border fix-border-nick">
            <div class="col-md-12 left-right data-nick-search">
                <span style="color: rgb(238, 70, 35);">Dịch vụ game cần tìm không tồn tại.</span>
            </div>
            @php
                $index = 0;
            @endphp
            @foreach($data as $key => $item)
                @if($key < 8)
                    @php
                        $index = 1;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_nick item-page-nick-1" style="display: block">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img style="width: 100%;border-radius: 8px" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title   }}" class="entries_item-img">
                            <h3 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h3>
                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: 0 </p>
                            @endif
                        </a>
                    </div>
                @elseif($key < 16)
                    @php
                        $index = 2;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_nick item-page-nick-2" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img style="width: 100%;border-radius: 8px" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title   }}" class="entries_item-img">
                            <h3 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h3>
                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: 0 </p>
                            @endif
                        </a>
                    </div>
                @elseif($key < 24)
                    @php
                        $index = 3;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_nick item-page-nick-3" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img style="width: 100%;border-radius: 8px" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title   }}" class="entries_item-img">
                            <h3 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h3>
                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: 0 </p>
                            @endif
                        </a>
                    </div>
                @elseif($key < 32)
                    @php
                        $index = 4;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_nick item-page-nick-4" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img style="width: 100%;border-radius: 8px" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title   }}" class="entries_item-img">
                            <h3 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h3>
                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: 0 </p>
                            @endif
                        </a>
                    </div>
                @elseif($key < 40)
                    @php
                        $index = 5;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_nick item-page-nick-5" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img style="width: 100%;border-radius: 8px" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title   }}" class="entries_item-img">
                            <h3 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h3>
                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: 0 </p>
                            @endif
                        </a>
                    </div>
                @endif
            @endforeach

            @if(count($data) > 8)
            <button id="btn-expand-serivce-nick" class="expand-button" data-page-current="1" data-page-max="{{ $index }}">
                Xem thêm danh mục
            </button>
            @endif

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#btn-expand-serivce-nick').on('click', function(e) {
                        var pageCurrrent=$(this).data('page-current');
                        var pageMax=$(this).data('page-max');
                        pageCurrrent=pageCurrrent+1;
                        $('#nick__widget .item-page-nick-'+pageCurrrent).fadeIn( "fast", function() {
                            // Animation complete
                        });
                        $(this).data('page-current',pageCurrrent);
                        if(pageCurrrent==pageMax){
                            $(this).remove();
                        }
                    });
                });

            </script>
        </div>


        <div class="entries-search">
            <div class="row fix-border ">
            </div>
        </div>

    </div>
    @else

        <div class="entries" style="margin-bottom: 0">
            <div class="slick-slider">
                @foreach($data as $item)

                    <div class="item image entries_item" style="padding-bottom: 16px">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img style="width: 100%;border-radius: 8px" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title   }}" class="entries_item-img">
                            <h3 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h3>
                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p style="margin-bottom: 0;margin-top: 4px;color: rgb(87, 87, 87)">Số tài khoản: 0 </p>
                            @endif
                        </a>
                    </div>
                @endforeach

            </div>
        </div>

    @endif
@endif
