<div class="col-md-12 left-right">
    <div class="row marginauto body-detail-ct">

        <div class="col-md-12 text-left left-right">
            <div class="row body-detail-row-ct">
                @if (isset($data))
                    @foreach($data as $key => $item)

                        <div class="col-auto body-detail-nick-col-ct" data-title="{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}">
                            <a href="/minigame-{{ $item->slug }}" class="list-item-nick-hover">
                                <div class="row marginauto list-item-nick-hover-row">
                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                        @if(isset($item->image))
                                            <img onerror="imgError(this)" class="lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->title }}">
                                        @endif
                                    </div>
                                    <div class="col-md-12 left-right list-item-nick">
                                        <div class="row marginauto list-item-nick-body">
                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct body-detail-title-fixed">
                                                <span class="text-limit limit-1">{{ $item->title }}</span>
                                            </div>
                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                <div class="item-product__box-sale">
                                                    Đã bán: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}
                                                </div>
                                                <div class="item-product__box-price">

                                                    <div class="special-price">{{ str_replace(',','.',number_format(($item->price))) }} đ</div>

                                                    @if(isset($item->params->percent_sale))
                                                        <div class="old-price">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                                                    @else
                                                    @endif
                                                    @if(isset($item->params->percent_sale))
                                                        <div class="item-product__sticker-percent">
                                                            -{{ str_replace(',','.',number_format(($item->params->percent_sale))) }}%
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                <small>Đã bán: 40K</small>
                                            </div> --}}
                                            {{-- <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                <ul>
                                                    <li class="fist-li-account">15.000đ</li>
                                                    <li class="second-li-account">30.000đ</li>
                                                    <li class="three-li-account">-50%</li>
                                                </ul>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p>Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật minigame thường xuyên bạn vui lòng theo dõi web trong thời gian tới !</p>
                @endif
            </div>
        </div>

    </div>
</div>
