@if(isset($telecoms))
<div class="content__wrap mt-fix-20 content-store-card" id="content-store-card">
    <div class="row" id="screen--first">
        <div class="col-12 col-lg-12 col-xl-8 px-lg-3 section--type__card buy-card">
            <div class="card --custom card-mobile" style="min-height: 100%">
                <div class="card--header d-block">
                    <div class="card--header__title text-left">
                        <div class="title__icon"><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/muathegiare.svg" alt=""></div>

                        <h2 class="text-title text-left" style="margin: 0">{{ $title??'Mua thẻ nhanh' }}</h2>

                    </div>
                </div>

                <div class="card--body">
                    <ul class="nav nav-tabs tabs--cards" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="card-game-tab" data-toggle="tab" href="#card-game" role="tab" aria-controls="card-game" aria-selected="true">Thẻ game</a>
                        </li><li class="nav-item" role="presentation">
                            <a class="nav-link" id="card-phone-tab" data-toggle="tab" href="#card-phone" role="tab" aria-controls="card-phone" aria-selected="false">Thẻ điện thoại</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab--title">Chọn loại thẻ</div>
                        <div class="tab-pane fade show active select-tag-type" id="card-game" role="tabpanel" aria-labelledby="card-game-tab">
                            <ul class="cards__list row d-none d-lg-flex" id="cardGameListV2">
                                @foreach($telecoms as $key => $telecom)
                                    @if(isset($telecom->params->teltecom_type))

                                        @if($telecom->params->teltecom_type == 2)
                                            @if($key == 0)
                                                <li class="cards__item card__item-tag p_0">
                                                    <input type="radio" id="card-{{ $telecom->id }}" value="{{ $telecom->key }}" data-img="{{ $telecom->image }}" name="card-type" checked hidden>
                                                    <label for="card-{{ $telecom->id }}">
                                                        <img src="{{ $telecom->image }}" class="card--logo" alt="{{ $telecom->image }}">
                                                    </label>
                                                </li>
                                            @else
                                                <li class="cards__item card__item-tag p_0">
                                                    <input type="radio" id="card-{{ $telecom->id }}" value="{{ $telecom->key }}" data-img="{{ $telecom->image }}" name="card-type"  hidden>
                                                    <label for="card-{{ $telecom->id }}">
                                                        <img src="{{ $telecom->image }}" class="card--logo" alt="{{ $telecom->image }}">
                                                    </label>
                                                </li>
                                            @endif
                                        @endif

                                    @endif

                                @endforeach
{{--                                <div class="loader position-relative" style="margin: 2rem 0">--}}
{{--                                    <div class="loading-spokes">--}}
{{--                                        <div class="spoke-container">--}}
{{--                                            <div class="spoke"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="spoke-container">--}}
{{--                                            <div class="spoke"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="spoke-container">--}}
{{--                                            <div class="spoke"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="spoke-container">--}}
{{--                                            <div class="spoke"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="spoke-container">--}}
{{--                                            <div class="spoke"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="spoke-container">--}}
{{--                                            <div class="spoke"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="spoke-container">--}}
{{--                                            <div class="spoke"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="spoke-container">--}}
{{--                                            <div class="spoke"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </ul>
                            <div class="swiper slider--card__telecom d-lg-none swiper-container" >
                                <div class="swiper-wrapper" id="cardGameListMobileV2">

                                    @foreach($telecoms as $key => $telecom)
                                        @if(isset($telecom->params->teltecom_type))

                                        @if($telecom->params->teltecom_type == 2)
                                            @if($key == 0)
                                                 <div class="swiper-slide">
                                                     <div class="cards__item  w-100">
                                                         <input type="radio" id="card-mobile-{{ $telecom->id }}" value="{{ $telecom->key }}" data-img="{{ $telecom->image }}" name="card-type" checked hidden>

                                                          <label for="card-mobile-{{ $telecom->id }}">
                                                              <img src="{{ $telecom->image }}" class="card--logo" alt="{{ $telecom->title }}">
                                                          </label>
                                                     </div>
                                                  </div>
                                            @else
                                                <div class="swiper-slide">
                                                    <div class="cards__item  w-100">
                                                        <input type="radio" id="card-mobile-{{ $telecom->id }}" value="{{ $telecom->key }}" data-img="{{ $telecom->image }}" name="card-type" hidden>

                                                        <label for="card-mobile-{{ $telecom->id }}">
                                                            <img src="{{ $telecom->image }}" class="card--logo" alt="{{ $telecom->title }}">
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="card-phone" role="tabpanel" aria-labelledby="card-phone-tab">
                            <ul class="cards__list row d-none d-lg-flex" id="cardPhoneListV2">
                                @foreach($telecoms as $key => $telecom)
                                    @if(isset($telecom->params->teltecom_type))

                                    @if($telecom->params->teltecom_type != 2)
                                        @if($key == 0)
                                            <li class="cards__item card__item-tag p_0">
                                                <input type="radio" id="card-{{ $telecom->id }}" value="{{ $telecom->key }}" data-img="{{ $telecom->image }}" name="card-type" checked hidden>
                                                <label for="card-{{ $telecom->id }}">
                                                    <img src="{{ $telecom->image }}" class="card--logo" alt="{{ $telecom->image }}">
                                                </label>
                                            </li>
                                        @else
                                            <li class="cards__item card__item-tag p_0">
                                                <input type="radio" id="card-{{ $telecom->id }}" value="{{ $telecom->key }}" data-img="{{ $telecom->image }}" name="card-type"  hidden>
                                                <label for="card-{{ $telecom->id }}">
                                                    <img src="{{ $telecom->image }}" class="card--logo" alt="{{ $telecom->image }}">
                                                </label>
                                            </li>
                                        @endif
                                    @endif
                                    @else
                                        <li class="cards__item card__item-tag p_0">
                                            <input type="radio" id="card-{{ $telecom->id }}" value="{{ $telecom->key }}" data-img="{{ $telecom->image }}" name="card-type"  hidden>
                                            <label for="card-{{ $telecom->id }}">
                                                <img src="{{ $telecom->image }}" class="card--logo" alt="{{ $telecom->image }}">
                                            </label>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <div class="swiper slider--card__amount d-lg-none" >
                                <div class="swiper-wrapper" id="cardPhoneListMobileV2">

                                    @foreach($telecoms as $key => $telecom)
                                        @if(isset($telecom->params->teltecom_type))

                                            @if($telecom->params->teltecom_type != 2)
                                                @if($key == 0)
                                                    <div class="swiper-slide">
                                                        <div class="cards__item  w-100">
                                                            <input type="radio" id="card-mobile-{{ $telecom->id }}" value="{{ $telecom->key }}" data-img="{{ $telecom->image }}" name="card-type" checked hidden>

                                                            <label for="card-mobile-{{ $telecom->id }}">
                                                                <img src="{{ $telecom->image }}" class="card--logo" alt="{{ $telecom->title }}">
                                                            </label>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="swiper-slide">
                                                        <div class="cards__item  w-100">
                                                            <input type="radio" id="card-mobile-{{ $telecom->id }}" value="{{ $telecom->key }}" data-img="{{ $telecom->image }}" name="card-type" hidden>

                                                            <label for="card-mobile-{{ $telecom->id }}">
                                                                <img src="{{ $telecom->image }}" class="card--logo" alt="{{ $telecom->title }}">
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif

                                            @endif
                                        @else
                                            <div class="swiper-slide">
                                                <div class="cards__item  w-100">
                                                    <input type="radio" id="card-mobile-{{ $telecom->id }}" value="{{ $telecom->key }}" data-img="{{ $telecom->image }}" name="card-type" hidden>

                                                    <label for="card-mobile-{{ $telecom->id }}">
                                                        <img src="{{ $telecom->image }}" class="card--logo" alt="{{ $telecom->title }}">
                                                    </label>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-4  pl-lg-1 section--amount__card choose-card" >
            <div class="card --custom">
                <div class="card--body" id="amountWidget">
                    <div class="loader position-absolute" >
                        <div class="loading-spokes">
                            <div class="spoke-container">
                                <div class="spoke"></div>
                            </div>
                            <div class="spoke-container">
                                <div class="spoke"></div>
                            </div>
                            <div class="spoke-container">
                                <div class="spoke"></div>
                            </div>
                            <div class="spoke-container">
                                <div class="spoke"></div>
                            </div>
                            <div class="spoke-container">
                                <div class="spoke"></div>
                            </div>
                            <div class="spoke-container">
                                <div class="spoke"></div>
                            </div>
                            <div class="spoke-container">
                                <div class="spoke"></div>
                            </div>
                            <div class="spoke-container">
                                <div class="spoke"></div>
                            </div>
                        </div>
                    </div>
                    <div class="denos--wrap d-none">
                        <div class="denos--title">
                            Chọn mệnh giá
                        </div>
                        <ul class="deno__list row" id="cardAmountList">

                        </ul>
                        <div class="swiper slider--card__amount swiper-container">
                            <div class="swiper-wrapper" id="cardAmountListMobile">
{{--                                <div class="swiper-slide">--}}
{{--                                    <div class="deno__item ">--}}
{{--                                        <input type="radio" id="amount-3346" value="10000" data-discount="99.0" name="card-value" checked="" hidden="">--}}
{{--                                        <label for="amount-3346" class="deno__value card-item-value"><span>10.000 đ</span></label>--}}
{{--                                    </div>--}}

{{--                                </div>--}}


                            </div>
                        </div>

                        <div class="card--amount">
                            <span class="card--amount__title">
                                Số lượng thẻ
                            </span>
                            <div class="card--amount__group">
                                <button class="btn--amount -minus js-amount" data-action="minus">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/minus.png" alt="">
                                </button>
                                <input type="text" name="card-amount" class="input--amount" value="1" numberic="">
                                <button class="btn--amount -add js-amount" data-action="add">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/add.png" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="discount">
                            <input name="card-discount" type="hidden" value="">
                            <span class="discount--title">
                                Chiết khấu
                            </span>
                            <span class="discount--value">

                            </span>
                        </div>
                        <div class="price--total">
                            <span class="price--total__title">
                                Thành tiền
                            </span>
                            <span class="price--total__value">

                            </span>
                        </div>
                        @if (App\Library\AuthCustom::check())
                            <button type="button" class="btn -primary btn-big js_step" id="btn-confirm" data-go_to="step2" data-toggle="modal" data-target="#modal--confirm__payment" id="btn-confirm">Chọn mua</button>
                        @else
                            <button type="button" class="btn -primary btn-big js_step" id="btn-confirm" onclick="openLoginModal();" style="margin-top: 16px;">Chọn mua</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Xác Nhận Thanh Toán-->
    <div class="modal fade " id="modal--confirm__payment" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered animated">
            <div class="modal-content -custom dialog" style="margin-left: 16px;margin-right: 16px">
                <div class="dialog--header">
                    <div class="dialog--header__title">
                        Xác nhận thanh toán
                    </div>
                    <button type="button" class="close dialog__close" data-dismiss="modal">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/close.png" alt="">
                    </button>
                </div>
                <div class="dialog--content">
                    <div class="dialog--content__title">
                        Thông tin mua thẻ
                    </div>
                    <div class="card--gray">
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Loại thẻ
                            </div>
                            <div class="card--attr__value">
                                <div class="card--logo">
                                    <img id="confirmCard" src="/assets/frontend/{{theme('')->theme_key}}/image/cards-logo/zing.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Mệnh giá
                            </div>
                            <div class="card--attr__value" id="confirmPrice">

                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Số lượng
                            </div>
                            <div class="card--attr__value" id="confirmQuantity">

                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Chiết khấu
                            </div>
                            <div class="card--attr__value" id="confirmDiscount">

                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Thành tiền
                            </div>
                            <div class="card--attr__value" id="confirmTotal">

                            </div>
                        </div>
                    </div>
                    <div class="card--gray">
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Phương thức thanh toán
                            </div>
                            <div class="card--attr__value">
                                Tài khoản Shopbrand
                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Phí thanh toán
                            </div>
                            <div class="card--attr__value">
                                Miễn phí
                            </div>
                        </div>
                    </div>
                    <div class="card--gray">
                        <div class="card--attr__total">
                            <div class="card--attr__name">
                                Tổng thanh toán
                            </div>
                            <div class="card--attr__value" id="totalBill">

                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn -primary btn-big" data-dismiss="modal" data-toggle="modal" data-target="#modal--success__payment" id="confirmSubmitButton">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Mua Thành Công-->
    <div class="modal fade" id="modal--success__payment" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content -custom dialog">
                <div class="dialog--header">
                    <div class="dialog--header__title">
                        Mua thẻ thành công
                    </div>
                    <button type="button" class="close dialog__close" data-dismiss="modal">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/close.png" alt="">
                    </button>
                </div>
                <div class="dialog--content">
                    <div class="card--gray card__notify">
                        <div class="card__message">
                            Chúc mừng bạn đã giao dịch thành công
                        </div>
                        <div class="card--success__icon">
                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/success.png" alt="">
                        </div>
                    </div>
                    <div class="dialog--content__title">
                        Thông tin thẻ
                    </div>
                    <div class="card--gray">
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Loại thẻ
                            </div>
                            <div class="card--attr__value">
                                <div class="card--logo">
                                    <img id="successCard" src="" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Mệnh giá
                            </div>
                            <div class="card--attr__value" id="successPrice">

                            </div>
                        </div>
                        <div class="card--attr">
                            <div class="card--attr__name">
                                Số lượng
                            </div>
                            <div class="card--attr__value" id="successQuantity">

                            </div>
                        </div>
                    </div>
                    <div class="swiper slider--card">
                        <div class="swiper-wrapper">
{{--                            <div class="swiper-slide card__detail">--}}
{{--                                <div class="card--header__detail">--}}
{{--                                    <div class="card--info__wrap">--}}
{{--                                        <div class="card--logo">--}}
{{--                                            <img src="" alt="">--}}
{{--                                        </div>--}}
{{--                                        <div class="card--info">--}}
{{--                                            <div class="card--info__name">--}}

{{--                                            </div>--}}
{{--                                            <div class="card--info__value">--}}
{{--                                                đ--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card--gray">--}}
{{--                                    <div class="card--attr">--}}
{{--                                        <div class="card--attr__name">--}}
{{--                                            Mã thẻ--}}
{{--                                        </div>--}}
{{--                                        <div class="card--attr__value">--}}
{{--                                            <div class="card__info">--}}

{{--                                            </div>--}}
{{--                                            <div class="icon--coppy js-copy-text">--}}
{{--                                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/coppy.png" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card--attr">--}}
{{--                                        <div class="card--attr__name">--}}
{{--                                            Seri--}}
{{--                                        </div>--}}
{{--                                        <div class="card--attr__value">--}}
{{--                                            <div class="card__info">--}}

{{--                                            </div>--}}
{{--                                            <div class="icon--coppy js-copy-text">--}}
{{--                                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/coppy.png" alt="">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <button type="button" class="btn -primary btn-big" data-dismiss="modal">Mua thêm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Mua Thất Bại-->
    <div class="modal fade login show default-Modal" id="modal--fail__payment" aria-modal="true">
        <div class="modal-dialog modal-md modal-dialog-centered login animated">
            <!--        <div class="image-login"></div>-->
            <div class="modal-content">
                <div class="modal-header modal-header-success-ct">
                    <div class="row marginauto modal-header-success-row-ct text-center">
                        <div class="col-md-12 text-center" style="position: relative">
                            <span>Mua thẻ không thành công</span>
                            <div class="close" data-dismiss="modal" aria-label="Close">
                                <img class="lazy img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body modal-body-success-ct">
                    <div class="row marginauto justify-content-center">
                        <div class="col-auto">
                            <img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/reject.png" alt="">
                        </div>
                    </div>
                    <div class="row marginauto modal-body-span-success-ct justify-content-center">
                        <div class="col-md-12 left-right text-center">
                            <span style="font-size: 14px" id="message--error--buy"></span>
                        </div>

                    </div>
                    <div class="row marginauto justify-content-center modal-footer-success-ct">

                        <div class="col-md-12 col-6 modal-footer-success-col-right-ct">
                            <div class="row marginauto modal-footer-success-row-ct">
                                <div class="col-md-12 left-right">
                                    <a href="javascript:void(0)" class="button-bg-ct"
                                       style="display: flex;justify-content: center" data-dismiss="modal"><span>Đóng</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script>


</script>
