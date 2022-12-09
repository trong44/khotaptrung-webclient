@if(isset($data) && count($data) > 0)

    <div class="main-title" style="margin-top: 0;margin-bottom: 24px">
        <h2 style="font-size: 20px;text-transform: uppercase;margin-bottom: 0">Tài khoản liên quan</h2>
    </div>

    <div class="entries" style="margin-bottom: 0">


        <div class="slick-slider">
            @foreach($data as $item)

                <div class="item image">
                    <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                        <img style="width: 100%;height: 120px;border-radius: 8px" src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}" alt="{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}" width="120px">
                        <h3 class="text-title text-left">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</h3>
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

            @endforeach

        </div>
    </div>

@endif
