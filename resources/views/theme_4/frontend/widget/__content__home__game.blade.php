@if(isset($data) && count($data) > 0)

    <div class="entries">
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
                        <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                            <img src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}"
                                 alt="{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}" class="entries_item-img">
                            <h2 class="text-title text-left">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</h2>

                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: 0 </p>
                            @endif
                        </a>
                    </div>
                @elseif($key < 16)
                    @php
                        $index = 2;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_nick item-page-nick-2" style="display: none">
                        <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                            <img src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}"
                                 alt="{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}" class="entries_item-img">
                            <h2 class="text-title text-left">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</h2>

                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: 0 </p>
                            @endif
                        </a>
                    </div>
                @elseif($key < 24)
                    @php
                        $index = 3;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_nick item-page-nick-3" style="display: none">
                        <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                            <img src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}"
                                 alt="{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}" class="entries_item-img">
                            <h2 class="text-title text-left">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</h2>

                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: 0 </p>
                            @endif
                        </a>
                    </div>
                @elseif($key < 32)
                    @php
                        $index = 4;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_nick item-page-nick-4" style="display: none">
                        <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                            <img src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}"
                                 alt="{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}" class="entries_item-img">
                            <h2 class="text-title text-left">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</h2>

                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: 0 </p>
                            @endif
                        </a>
                    </div>
                @elseif($key < 40)
                    @php
                        $index = 5;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_nick item-page-nick-5" style="display: none">
                        <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                            <img src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}"
                                 alt="{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}" class="entries_item-img">
                            <h2 class="text-title text-left">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</h2>

                            @if(isset($item->items_count))
                                @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                    <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                @else
                                    <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ $item->items_count }} </p>
                                @endif

                            @else
                                <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: 0 </p>
                            @endif
                        </a>
                    </div>
                @endif
            @endforeach


            <button id="btn-expand-serivce-nick" class="expand-button" data-page-current="1" data-page-max="{{ $index }}">
                Xem thêm danh mục
            </button>


            <script type="text/javascript">
                $(document).ready(function () {
                    $('#btn-expand-serivce-nick').on('click', function(e) {
                        var pageCurrrent=$(this).data('page-current');
                        var pageMax=$(this).data('page-max');
                        pageCurrrent=pageCurrrent+1;
                        $('.item-page-nick-'+pageCurrrent).fadeIn( "fast", function() {
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
@endif
