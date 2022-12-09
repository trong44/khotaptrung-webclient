@if(isset($data) && count($data) > 0)
    <section class="acc-game-v2 c-pt-32 c-pt-lg-6">
        <div class="section-header c-mb-24 c-mb-lg-20 justify-content-between">
            <h2 class="section-title fz-lg-20 lh-lg-24">
                <i class="icon-title c-mr-8" style="--path:url(/assets/frontend/{{theme('')->theme_key}}/image/svg/acc-game.svg)"></i>
                {{ $title??'Dịch vụ' }}
            </h2>
            <a href="/dich-vu" class="link arr-right">Xem tất cả</a>
        </div>
        <div class="list-category">
            @foreach($data as $key => $item)
                    <div class="item-category c-px-8 c-mb-12 c-px-lg-6">
                        <div class="card">
                            <div class="card-body c-p-16 c-p-lg-12 scale-thumb">
                                <a href="/dich-vu/{{ $item->slug}}">
                                    <div class="card-thumb c-mb-8">
                                        <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="card-thumb-image">
                                    </div>
                                    <div class="card-attr">
                                        <div class="text-title text-limit limit-1 fw-700">
                                            {{ $item->title  }}
                                        </div>
                                        <div class="info-attr">
                                            @if(isset($item->total_order))
                                                @if($item->params_plus)
                                                    @foreach($item->params_plus as $key => $val)
                                                        @if($key == 'fk_buy')
                                                            Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}
                                                        @endif
                                                    @endforeach

                                                @else
                                                    Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}
                                                @endif

                                            @else
                                                @if($item->params_plus)
                                                    @foreach($item->params_plus as $key => $val)
                                                        @if($key == 'fk_buy')
                                                            Giao dịch: {{ str_replace(',','.',number_format($val)) }}
                                                        @endif
                                                    @endforeach
                                                @else
                                                    Giao dịch: 0
                                                @endif

                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </section>
    <div class="c-pt-8 border-bottom-destop c-pt-lg-2"></div>
@endif
