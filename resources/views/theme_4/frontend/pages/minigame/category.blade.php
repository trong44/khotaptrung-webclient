@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    <style>

    </style>

    <section>
        <div class="container">

            <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->

            <nav aria-label="breadcrumb" style="margin-top: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="/minigame">Minigame</a></li>
                </ol>
            </nav>

            <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: BLOG LISTING -->

            <div class="c-content-box c-size-md">

                <div class="container" style="padding-bottom: 24px">

                    <div class="row">
                        <div class="col-md-12 col-xs-12 left-right">
                            <div class="row" style="width: 100%;margin: 0 auto">
                                <div class="art-list" style="width: 100%">

                                    <div class="d-flex justify-content-between">
                                        <div class="main-title">
                                            <h1>Danh sách minigame</h1>
                                        </div>
                                        <div class="service-search d-none d-lg-block">
                                            <div class="input-group p-box">
                                                <input type="text" id="txtSearchMinigame" placeholder="Tìm minigame" value="" class="" width="200px">
                                                <span class="icon-search"><i class="fas fa-search"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    @if(isset($data) && count($data) > 0)
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
                                                            <h2 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                                                            <p style="margin-bottom: 12px;margin-top: 4px;color: rgb(87, 87, 87)">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>
                                                            @if(isset($item->params->percent_sale))
                                                                <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                                                                <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                                            @else
                                                                <span class="newPrice" style="margin-left: 0">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                                            @endif


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
                                                            <h2 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                                                            <p style="margin-bottom: 12px;margin-top: 4px;color: rgb(87, 87, 87)">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>
                                                            @if(isset($item->params->percent_sale))
                                                                <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                                                                <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                                            @else
                                                                <span class="newPrice" style="margin-left: 0">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                                            @endif

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
                                                            <h2 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                                                            <p style="margin-bottom: 12px;margin-top: 4px;color: rgb(87, 87, 87)">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>
                                                            @if(isset($item->params->percent_sale))
                                                                <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                                                                <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                                            @else
                                                                <span class="newPrice" style="margin-left: 0">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                                            @endif

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
                                                            <h2 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                                                            <p style="margin-bottom: 12px;margin-top: 4px;color: rgb(87, 87, 87)">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>
                                                            @if(isset($item->params->percent_sale))
                                                                <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                                                                <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                                            @else
                                                                <span class="newPrice" style="margin-left: 0">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                                            @endif

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
                                                            <h2 class="text-title text-limit limit-1" style="color: rgb(87, 87, 87)">{{ $item->title   }}</h2>
                                                            <p style="margin-bottom: 12px;margin-top: 4px;color: rgb(87, 87, 87)">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>
                                                            @if(isset($item->params->percent_sale))
                                                                <span class="oldPrice">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</span>
                                                                <span class="newPrice">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                                            @else
                                                                <span class="newPrice" style="margin-left: 0">{{ str_replace(',','.',number_format($item->price)) }} đ</span>
                                                            @endif

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
                                                    // Animation complete
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
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END: BLOG LISTING  -->

            <!-- END: PAGE CONTENT -->




        </div><!-- /.container -->
    </section>
@endsection


