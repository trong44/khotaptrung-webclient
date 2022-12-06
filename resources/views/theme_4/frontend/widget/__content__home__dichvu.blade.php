@if(isset($data) && count($data) > 0)
    @php
        $total_key_service = 8;
        $flag_slide_service = 0;
        if(setting('sys_theme_service_list') != ''){
            if (setting('sys_theme_service_list') > 1){
                $total_key_service = (int)setting('sys_theme_service_list')*4;
            }elseif (setting('sys_theme_service_list') == 1){
                $flag_slide_service = 1;
            }
        }
    @endphp
<div class="d-flex justify-content-between">

    @if($flag_slide_service == 0)
        <div class="main-title">
            <h1>{{ $title??'Dịch vụ game' }}</h1>
        </div>
    @else
        <div class="main-title" style="margin-bottom: 0;">
            <h1>{{ $title??'Dịch vụ game' }}</h1>
        </div>
    @endif

    @if($flag_slide_service == 0)
    <div class="service-search d-none d-lg-block" style="padding-top: 24px;">
        <div class="input-group p-box">
            <input type="text" id="txtSearch" placeholder="Tìm dịch vụ" value="" class="" width="200px">
            <span class="icon-search"><i class="fas fa-search"></i></span>
        </div>
    </div>
    @else
        <div class="service-search d-none d-lg-block " style="font-size: 14px;line-height: 24px;font-weight: 600">
            <div class="input-group p-box">
                <a href="/dich-vu" class="dich__vu__home">Xem tất cả »</a>
            </div>
        </div>
    @endif
</div>
    @if($flag_slide_service == 0)
        <div class="entries" id="service__widget">
            <div class="row fix-border fix-border-dich-vu">

                <div class="col-md-12 left-right data-service-search">
                    <span style="color: rgb(238, 70, 35);">Dịch vụ cần tìm không tồn tại.</span>
                </div>
                @php
                $index = 0;
                @endphp
                @foreach($data as $key => $item)
                @if($key < 8)
                    @php
                        $index = 1;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-1" style="display: block">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h2 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                            @if(isset($item->total_order))
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;color: rgb(87, 87, 87)">Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}</p>
                                        @endif
                                    @endforeach

                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}</p>
                                @endif

                            @else
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($val)) }}</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: 0</p>
                                @endif

                            @endif
                        </a>
                    </div>
                @elseif($key < 16)
                    @php
                        $index = 2;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-2" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h2 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                            @if(isset($item->total_order))
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;color: rgb(87, 87, 87)">Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}</p>
                                        @endif
                                    @endforeach

                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}</p>
                                @endif

                            @else
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($val)) }}</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: 0</p>
                                @endif

                            @endif
                        </a>
                    </div>
                @elseif($key < 24)
                    @php
                        $index = 3;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-3" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h2 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                            @if(isset($item->total_order))
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;color: rgb(87, 87, 87)">Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}</p>
                                        @endif
                                    @endforeach

                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}</p>
                                @endif

                            @else
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($val)) }}</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: 0</p>
                                @endif

                            @endif
                        </a>
                    </div>
                @elseif($key < 32)
                    @php
                        $index = 4;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-4" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h2 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                            @if(isset($item->total_order))
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;color: rgb(87, 87, 87)">Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}</p>
                                        @endif
                                    @endforeach

                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}</p>
                                @endif

                            @else
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($val)) }}</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: 0</p>
                                @endif

                            @endif
                        </a>
                    </div>
                @elseif($key < 40)
                    @php
                        $index = 5;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-5" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h2 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                            @if(isset($item->total_order))
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;color: rgb(87, 87, 87)">Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}</p>
                                        @endif
                                    @endforeach

                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}</p>
                                @endif

                            @else
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($val)) }}</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: 0</p>
                                @endif

                            @endif
                        </a>
                    </div>
                @endif
                @endforeach


                <button id="btn-expand-serivce" class="expand-button" data-page-current="1" data-page-max="{{ $index }}">Xem thêm dịch vụ</button>

            </div>


            <div class="entries-search">
                <div class="row fix-border ">
                </div>
            </div>

        </div>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#btn-expand-serivce').on('click', function(e) {
                    var pageCurrrent=$(this).data('page-current');
                    var pageMax=$(this).data('page-max');
                    pageCurrrent=pageCurrrent+1;
                    $('#service__widget .item-page-'+pageCurrrent).fadeIn( "fast", function() {
                        // Animation complete
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
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h2 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                            @if(isset($item->total_order))
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;color: rgb(87, 87, 87)">Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}</p>
                                        @endif
                                    @endforeach

                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}</p>
                                @endif

                            @else
                                @if($item->params_plus)
                                    @foreach($item->params_plus as $key => $val)
                                        @if($key == 'fk_buy')
                                            <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: {{ str_replace(',','.',number_format($val)) }}</p>
                                        @endif
                                    @endforeach
                                @else
                                    <p style="margin-top: 8px;margin-bottom: 0;">Giao dịch: 0</p>
                                @endif

                            @endif
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    @endif
@endif
