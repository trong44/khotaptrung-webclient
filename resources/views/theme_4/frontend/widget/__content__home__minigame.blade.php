@if(isset($data) && count($data) > 0)

    <div class="entries">
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
                            <h2 class="text-title text-left">{{ $item->title   }}</h2>
                            <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}</p>

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
                            <h2 class="text-title">{{ $item->title   }}</h2>
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
                            <h2 class="text-title">{{ $item->title   }}</h2>
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
                            <h2 class="text-title">{{ $item->title   }}</h2>
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
                            <h2 class="text-title">{{ $item->title   }}</h2>
                        </a>
                    </div>
                @endif
            @endforeach


            <button id="btn-expand-minigame" class="expand-button" data-page-current="1" data-page-max="{{ $index }}">Xem thêm minigame</button>

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
                $('.item-page-'+pageCurrrent).fadeIn( "fast", function() {
                    // Animation complete
                });
                $(this).data('page-current',pageCurrrent);
                if(pageCurrrent==pageMax){
                    $(this).remove();
                }
            });
        });

    </script>
@endif
