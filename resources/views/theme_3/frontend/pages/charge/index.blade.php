@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/lib_bootstrap.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/minigame.css">
@endsection
{{--@push('js')--}}

{{--@endpush--}}
@section('content')

    <div class="container container-fix">
        <div class="block-card-item " >
            <fieldset id="fieldset-one_transaction">
                <section class="media-mobile">
                    <div class=" banner-mobile-container-ct">
                        <div class="row marginauto banner-mobile-row-ct">
                            <div class="col-auto left-right box-account-mobile_open" style="width: 10%" >
                                <a href="/"><img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" ></a>
                            </div>

                            <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                                <h3>Nạp thẻ</h3>
                            </div>
                            <div class="col-auto left-right" style="width: 10%">

                            </div>
                        </div>
                    </div>
                </section>
                <section class="media-web mb-fix-16">
                    <div class=" menu-container-ct">
                        <ul class="d-flex" style="float: inherit">
                            <li><a href="/">Trang chủ</a></li>
                            <li class="menu-container-li-ct"><img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
{{--                            <li class="menu-container-li-ct"><a href="">Nạp tiền</a></li>--}}
{{--                            <li class="menu-container-li-ct"><img class="lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>--}}
                            <li class="menu-container-li-ct"><a href="" id="charge_title">@if(Request::is('nap-the')) Nạp thẻ cào @elseif(Request::is('recharge-atm'))  ATM tự động @endif</a></li>
                        </ul>
                    </div>
                </section>
                <div class="row">
                    <div class="col-lg-8 col-md-12"  style="min-height: 100%">
                        <div class=" block-product "  style="min-height: 532px">
                            <div class="product-header d-none d-md-flex">
                                <div class="row marginauto logs-title">
                                    <div class="col-6 left-right">
                                        <span>
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/charge_card_icon.png" alt="">
                                </span>
                                        <span class="text-title" >Nạp tiền</span>
                                    </div>
                                    <div class="col-auto ml-auto pr-0">
                                        <small class="lammoi_lichsu" style="font-size: 13px;color: #ffffff" onClick="window.location.reload();"><i class="fas fa-redo mr-1" ></i>Làm mới</small>
                                    </div>
                                </div>
                            </div>
                            <div class="box-product position-static" >
                                <div class="default-tab pr-fix-16 pl-fix-16">
{{--                                <ul class="nav justify-content-between row" role="tablist" >--}}
{{--                                    <li class="nav-item col-6 col-md-6 p-0  p-md-0" role="presentation">--}}
{{--                                        <a  class="nav-link @if(Request::is('nap-the')) active @endif  text-center " data-toggle="tab" href="#charge_card" id="nav_charge" role="tab" aria-selected="true">Nạp thẻ <span class="d-g-none">cào</span> </a>--}}
{{--                                    </li >--}}
{{--                                    <li class="nav-item col-6 col-md-6 p-0 p-md-0" role="presentation">--}}
{{--                                        <a  class="nav-link @if(Request::is('recharge-atm')) active @endif text-center "  data-toggle="tab" href="#atm_card" id="nav_charge_atm" role="tab" aria-selected="false"> ATM <span class="d-g-none">tự động</span> </a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
                                    @if (setting('sys_charge_content') && setting('sys_charge_content') != "")
                                        <ul class="nav justify-content-between row" role="tablist" >

                                            <li class="nav-item col-4 col-md-6 p-0  p-md-0" role="presentation">
                                                <a  class="nav-link active text-center " data-toggle="tab" href="#charge_card" role="tab" aria-selected="true">Nạp thẻ <span class="d-g-none">cào</span> </a>
                                            </li >
                                            <li class="nav-item col-4 col-md-6 p-0 p-md-0" role="presentation">
                                                <a  class="nav-link text-center "  data-toggle="tab" href="#atm_card" role="tab" aria-selected="false"> ATM <span class="d-g-none">tự động</span> </a>
                                            </li>
                                            <li class="nav-item col-4 col-md-6 p-0 p-md-0 d-lg-none" role="presentation">
                                                <a  class="nav-link text-center " data-toggle="tab" href="#intro_charge" role="tab" aria-selected="false">Thông báo</a>
                                            </li>
                                        </ul>
                                    @else
                                        <ul class="nav justify-content-between row" role="tablist" >
                                            <li class="nav-item col-6 col-md-6 p-0  p-md-0" role="presentation">
                                                <a  class="nav-link active text-center " data-toggle="tab" href="#charge_card" role="tab" aria-selected="true">Nạp thẻ <span class="d-g-none">cào</span> </a>
                                            </li >
                                            <li class="nav-item col-6 col-md-6 p-0 p-md-0" role="presentation">
                                                <a  class="nav-link text-center "  data-toggle="tab" href="#atm_card" role="tab" aria-selected="false"> ATM <span class="d-g-none">tự động</span> </a>
                                            </li>
                                        </ul>
                                    @endif
                            </div>
                                <div class=" tab-content">
                                <div class="tab-pane @if(Request::is('nap-the')) active show @endif fade   mt-3" id="charge_card" role="tabpanel" >
{{--                                    <div class="loading-data">--}}
{{--                                        <div class="loader">--}}
{{--                                            <div class="loading-spokes">--}}
{{--                                                <div class="spoke-container">--}}
{{--                                                    <div class="spoke"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="spoke-container">--}}
{{--                                                    <div class="spoke"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="spoke-container">--}}
{{--                                                    <div class="spoke"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="spoke-container">--}}
{{--                                                    <div class="spoke"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="spoke-container">--}}
{{--                                                    <div class="spoke"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="spoke-container">--}}
{{--                                                    <div class="spoke"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="spoke-container">--}}
{{--                                                    <div class="spoke"></div>--}}
{{--                                                </div>--}}
{{--                                                <div class="spoke-container">--}}
{{--                                                    <div class="spoke"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <form action="{{route('postTelecomDepositAuto')}}" method="POST" class="form-charge " id="form-charge2">
                                        @csrf
                                        <div class="box-charge-card row">
                                            <div class="col-md-6">
                                                <div class="default-form-group mb-fix-20">
                                                    <label class="text-form">Nhà cung cấp</label>
                                                    <div class="col-md-12 p-0" >
                                                        <select class="select-form w-100" name="type" id="telecom">
                                                            @foreach($data as $val)
                                                                <option value="{{$val->key}}">{{$val->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="default-form-group mb-fix-20  d-block d-lg-none">
                                                    <label class="text-form" >Chọn mệnh giá</label>
                                                    <div class="col-md-12 p-0" >
                                                        <div class="row m-0" id="amount_mobile">


                                                        </div>
                                                        <div class="amount-loading m-0 ">
                                                            <div class="loader">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="default-form-group mb-fix-20">
                                                    <label class="text-form">Mã số thẻ</label>
                                                    <div class="col-md-12 p-0">
                                                        <input class="input-form w-100" type="text" name="pin" placeholder="Nhập mã số thẻ" required>

                                                    </div>
                                                </div>
                                                <div class="default-form-group mb-fix-20">
                                                    <label class="text-form">Số Seri</label>
                                                    <div class="col-md-12 p-0">
                                                        <input class="input-form w-100" type="text" name="serial" placeholder="Nhập số seri thẻ" required>

                                                    </div>
                                                </div>
                                                <div class="default-form-group mb-fix-20">
                                                    <label class="text-form">Mã bảo vệ</label>
                                                    <div class="row p-0">
                                                        <div class="col-md-12 d-flex ">
                                                            <input class="input-form w-100" name="captcha" type="text" placeholder="Nhập mã bảo vệ" required>
                                                            <div class="captcha captcha_1" >
                                                            <span class="reload fix_capcha">
                                                                 {!! captcha_img('flat') !!}
                                                            </span>
                                                            </div>
                                                            <button class="refresh-captcha" id="reload_1" type="button">
                                                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/captcha_refresh.png" alt="">
                                                            </button>

                                                        </div>
{{--                                                        <div class="col-md-5 mt-md-fix-20 d-none d-md-block">--}}
{{--                                                            <button  class=" primary-button button-default-ct w-75 w-md-100"  type="submit" style="float: right">--}}
{{--                                                                Nạp ngay--}}
{{--                                                            </button>--}}
{{--                                                        </div>--}}
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6  d-none d-lg-flex" style="    justify-content: space-between;flex-direction: column;">
                                                <div class="default-form-group mb-fix-20">
                                                    <label class="text-form">Chọn mệnh giá</label>
                                                    <div class="col-md-12 p-0" >
                                                        <div class="row m-0 amount_charge" id="amount">


                                                        </div>
                                                        <div class="amount-loading ">
                                                            <div class="loader">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <button  class=" primary-button button-default-ct w-100 mb-fix-20"  type="submit" style="float: right">
                                                    Nạp ngay
                                                </button>

                                            </div>


{{--                                            <div class="default-form-group mb-fix-20">--}}
{{--                                                <label class="text-form">Mã bảo vệ</label>--}}
{{--                                                <div class="col-md-12 p-0 d-flex">--}}
{{--                                                    <input class="input-form w-100" name="captcha" type="text" placeholder="Nhập mã bảo vệ" required>--}}
{{--                                                    <div class="captcha captcha_1" >--}}
{{--                                                        <span class="reload">--}}
{{--                                                             {!! captcha_img('flat') !!}--}}
{{--                                                        </span>--}}
{{--                                                    </div>--}}
{{--                                                    <button class="refresh-captcha" id="reload_1" type="button">--}}
{{--                                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/captcha_refresh.png" alt="">--}}
{{--                                                    </button>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="default-form-group mb-fix-20 d-none d-md-block ">--}}
{{--                                                btn-charge-data--}}
{{--                                                <button  class="w-100 primary-button button-default-ct " type="submit">--}}
{{--                                                    Nạp ngay--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
                                            <div class="col-md-12 left-right padding-order-footer-mobile-ct fixcungbuttonmobile d-block d-md-none" style="padding-top: 0">
                                                <div class="row marginauto" style="padding: 12px 16px">
                                                    <div class="col-md-12 left-right">
                                                        <button id="charge_next" class="button-default-ct button-next-step-one" type="submit">Nạp ngay</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @include('frontend.widget.modal.__confirm_charge')
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane @if(Request::is('recharge-atm')) active show @endif fade mt-3" id="atm_card" role="tabpanel" >

                                    <form action="">
                                        <div class="box-charge-card">
                                            <div class="dialog--content mb-fix-20">
                                                <div class="card--gray">
                                                    @if (setting('sys_tranfer_content') != "")
                                                        {!! setting('sys_tranfer_content') !!}
                                                    @endif
                                                    <div class="error_transfer_code">
                                                        <p style="text-align: center; margin: auto; color: #000;font-weight: 600;font-size: 14px"> 
                                                            Vui lòng <span style="color: red; text-decoration: underline; cursor: pointer;" onclick="openLoginModal();">đăng nhập</span> để nhận được nội dung chuyển tiền
                                                        </p>
                                                    </div>
                                                    <div class="card--attr transfer-title" style="display: none;">
                                                        <div class="card--attr__name">
                                                            Nội dung chuyển tiền
                                                        </div>
                                                        <div class="card--attr__value d-flex " >
                                                            <div class="card__info transfer-code" id=""></div>

                                                            <div class="icon--coppy js-copy-text" aria-describedby="tippy-7" >
                                                                <img src="/assets/frontend/{{theme('')->theme_key}}/image/icons/copy-black.png" alt="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                    <div class="tab-pane fade  mt-3 detailViewBlock" id="intro_charge" role="tabpanel" >
                                        <div class="charge-content-img" style="">
                                        </div>

                                        <div class="col-md-12 left-right d-none">
                                            <span class="detailViewBlockTitle">Thông báo</span>
                                        </div>
                                        @if (setting('sys_charge_content') != "")
                                            <div class="charge-content-detail_mobile detailViewBlockContent" style="  ">
                                                <div class="" role="alert">
                                                    {!! setting('sys_charge_content') !!}
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-md-12 left-right text-center js-toggle-content noselect">
                                            <div class="view-more">
                                                <a href="javascript:void(0)" class="global__link__default">Xem thêm<i class="__icon__default --sm__default --link__default ml-1" style="--path : url(/assets/frontend/theme_3/image/svg/xemthem.svg)"></i></a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </div>
                         </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pl-0 d-g-md-none  " style="min-height: 100%">
                        <div class="charge-content" style="">
                            <div class="charge-content-img" style="">
                            </div>
                            {{--                @if(theme('')->theme_config->sys_theme_ver == 'sys_theme_ver3.2' )--}}
                            {{--                    --}}
                            {{--                @endif--}}
                            @if (setting('sys_charge_content') != "")
                                <div class="charge-content-detail" style="  ">
                                    <div class="" role="alert">
                                        {!! setting('sys_charge_content') !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                 </div>
             </fieldset>
            <fieldset id="fieldset-two-charge" style="background-color: white">
                <section>
                    <div class="container container-fix banner-mobile-container-ct">
                        <div class="row marginauto banner-mobile-row-ct">
                            <div class="col-auto left-right" style="width: 10%">
                                <img id="charge_prev" class="lazy previous-step-one" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" >
                            </div>

                            <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                                <h3>Xác nhận thanh toán</h3>
                            </div>
                            <div class="col-auto left-right" style="width: 10%">
                            </div>
                        </div>

                    </div>
                </section>

                <section>
                    <div class="row marginauto" style="padding: 12px 16px">

                        <div class="col-md-12 left-right title-order-ct">
                            <span>Thông tin nạp thẻ</span>
                        </div>
                        <div class="col-md-12 left-right padding-order-ct">
                            <div class="row marginauto">
                                <div class="col-md-12 left-right background-order-ct">
                                    <div class="row marginauto background-order-body-row-ct">
                                        <div class="col-auto left-right background-order-col-left-ct">
                                            <span>Nhà mạng</span>
                                        </div>
                                        <div class="col-auto left-right background-order-col-right-ct charge_name">

                                        </div>
                                    </div>

                                    <div class="row marginauto background-order-body-row-ct">
                                        <div class="col-auto left-right background-order-col-left-ct">
                                            <span>Mệnh giá</span>
                                        </div>
                                        <div class="col-auto left-right background-order-col-right-ct charge_amount">

                                        </div>
                                    </div>

                                    <div class="row marginauto background-order-body-row-ct">
                                        <div class="col-auto left-right background-order-col-left-ct">
                                            <span>Chiết khấu</span>
                                        </div>
                                        <div class="col-auto left-right background-order-col-right-ct charge_ratito">

                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 left-right padding-order-ct">
                            <div class="row marginauto">
                                <div class="col-md-12 left-right background-order-ct">
                                    <div class="row marginauto background-order-body-bottom-ct">
                                        <div class="col-auto left-right background-order-col-left-ct">
                                            <span>Phí thanh toán</span>
                                        </div>
                                        <div class="col-auto left-right background-order-col-right-ct">
                                            <small>Miễn phí</small>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 left-right padding-order-ct">
                            <div class="row marginauto">
                                <div class="col-md-12 left-right background-order-ct">
                                    <div class="row marginauto background-order-row-ct">
                                        <div class="col-auto left-right background-order-col-left-ct">
                                            <span>Số tiền thực nhận</span>
                                        </div>
                                        <div class="col-auto left-right background-order-col-right-ct charge_total">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right padding-order-footer-mobile-ct fixcungbuttonmobile">
                            <div class="row marginauto" style="padding: 12px 16px">
                                <div class="col-md-12 left-right">
                                    <button class="button-default-ct button-next-step-two btn-confirm-charge" type="button">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

              <input type="hidden" name="previous" class="input-back-step-two" value="Trang trước"/>

        </fieldset>

         </div>
    </div>

    <!-- Chỗ này cũng include vào master rồi nên cmt chỗ này -->
    {{--@include('theme_3.frontend.widget.modal.__success_charge')
    @include('theme_3.frontend.widget.modal.__reject_charge')
    @include('theme_3.frontend.widget.modal.__success_charge_atm')
    @include('theme_3.frontend.widget.modal.__success_wallet_card')--}}

    <script src="/assets/frontend/theme_3/js/charge/charge.js?v={{time()}}"></script>
{{--    <script src="/js/theme_3/charge/charge.js?v={{time()}}"></script>--}}
    <!-- Đem ra master chỗ này rồi  -->
{{--    <script src="/assets/frontend/theme_3/js/transfer/transfer.js?v={{time()}}"></script>--}}

@endsection
