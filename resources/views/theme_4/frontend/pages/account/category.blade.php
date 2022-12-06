@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    <section>
        <div class="container">

            <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->

            <nav aria-label="breadcrumb" style="margin-top: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="/mua-acc">Mua acc</a></li>
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


