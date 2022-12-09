<div class="col-md-12 left-right">
    <div class="row marginauto body-detail-ct">

        <div class="col-md-12 text-left left-right">
            <div class="row body-detail-row-ct">
                @if (isset($data))
                    @foreach ($data as $item)
                        <div class="col-auto body-detail-nick-col-ct" data-title="{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}">
                            <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}" class="list-item-nick-hover">
                                <div class="row marginauto list-item-nick-hover-row">
                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                        @if(isset($item->image))
                                            <img onerror="imgError(this)" class="lazy" src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) : \App\Library\MediaHelpers::media($item->image) }}" alt="">
                                        @else
                                            <img onerror="imgError(this)" class="img-list-nick-category lazy" src="/assets/frontend/theme_3/image/images_1/no-image.png" alt="No-image">
                                        @endif
                                    </div>
                                    <div class="col-md-12 left-right list-item-nick">
                                        <div class="row marginauto list-item-nick-body">
                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct body-detail-title-fixed">
                                                <span>{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</span>
                                            </div>
                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                @if(isset($item->items_count))
                                                    @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                                        <small>Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }}</small>
                                                    @else
                                                        <small>Số tài khoản: {{ $item->items_count }} </small>
                                                    @endif

                                                @else
                                                    <small>Số tài khoản: 9999 </small>
                                                @endif
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
                    <p>Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !</p>
                @endif
            </div>
        </div>

    </div>
</div>
