
<div class="block-card-item mt-fix-20">
    <div class="row">
        <div class="col-lg-8 col-md-12"  style="min-height: 100%">

            <div class=" block-product " style="min-height: 532px">
                <div class="product-header d-flex d-md-flex">
                    <span>
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/naptienindex.svg" alt="">
                    </span>
                    <h2 class="text-title" >{{ $title??'Nạp tiền' }}</h2>
                    <div class="navbar-spacer"></div>
                </div>
                <div class="box-product position-static" >
                    <div class="default-tab pr-fix-16 pl-fix-16">
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
                        <div class="tab-pane fade active show  mt-3" id="charge_card" role="tabpanel" >
{{--                            <div class="loading-data">--}}
{{--                                <div class="loader">--}}
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
{{--                            </div>--}}
                            <form action="{{route('postTelecomDepositAuto')}}" method="POST" class="form-charge " id="form-charge2">
                                @csrf
                                <div class="box-charge-card row">
                                    <div class="col-md-6">
                                        <div class="default-form-group mb-fix-20">
                                            <label class="text-form">Nhà cung cấp</label>
                                            <div class="col-md-12 p-0" >
                                                <select class="select-form w-100" name="type" id="telecom">
                                                    @if(isset($data))
                                                        @foreach($data as $val)
                                                            <option value="{{$val->key}}">{{$val->title}}</option>
                                                        @endforeach

                                                    @endif


                                                </select>
                                            </div>
                                        </div>
                                        <div class="default-form-group mb-fix-20 d-block d-lg-none">
                                            <label class="text-form">Chọn mệnh giá</label>
{{--                                            <div class="col-md-12 p-0" >--}}
{{--                                                <div class="row m-0 amount_charge" id="amount_mobile">--}}
{{--                                                    <div class="amount-loading">--}}
{{--                                                        <div class="loader">--}}
{{--                                                            <div class="loading-spokes">--}}
{{--                                                                <div class="spoke-container">--}}
{{--                                                                    <div class="spoke"></div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="spoke-container">--}}
{{--                                                                    <div class="spoke"></div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="spoke-container">--}}
{{--                                                                    <div class="spoke"></div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="spoke-container">--}}
{{--                                                                    <div class="spoke"></div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="spoke-container">--}}
{{--                                                                    <div class="spoke"></div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="spoke-container">--}}
{{--                                                                    <div class="spoke"></div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="spoke-container">--}}
{{--                                                                    <div class="spoke"></div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="spoke-container">--}}
{{--                                                                    <div class="spoke"></div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-md-12 p-0" >
                                                <div class="amount_charge " >
                                                    <div class="amount-loading m-0">
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
                                                    <div class="swiper slider--charge--card__amount swiper-container">
                                                        <div class="swiper-wrapper" id="amount_mobile" >


                                                        </div>

                                                    </div>

                                                </div>


                                            </div>
                                            <div class="row marginauto mt-2">
                                                <div class="col-md-12 canhbao__napthe__col">
                                                    <span>*Chú ý: Nạp thẻ sai mệnh giá mất 100% giá trị thẻ</span>
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
                                                <div class="col-md-5 mt-md-fix-20 d-block d-lg-none">
                                                    <div class="data_napthe_login">
                                                        <a  class="primary-button button-default-ct w-75 w-md-100 text-center" onclick="openLoginModal();" style="float: right">
                                                            Nạp ngay
                                                        </a>
                                                    </div>
                                                    <div class="data_napthe_home">
                                                        <button  class="primary-button button-default-ct w-75 w-md-100 text-center" type="submit" style="float: right">
                                                            Nạp ngay
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6  d-none d-lg-flex" style="    justify-content: space-between;flex-direction: column;">
                                        <div class="default-form-group mb-fix-20">
                                            <label class="text-form">Chọn mệnh giá</label>
                                            <div class="col-md-12 p-0" >
                                                <div class="row m-0 amount_charge" id="amount">


                                                </div>
                                                <div class="amount-loading">
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
                                            <div class="row marginauto mt-2">
                                                <div class="col-md-12 canhbao__napthe__col">
                                                    <span>*Chú ý: Nạp thẻ sai mệnh giá mất 100% giá trị thẻ</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="data_napthe_login">
                                            <a  class="primary-button button-default-ct w-100 mb-fix-20 text-center" onclick="openLoginModal();" style="float: right">
                                                Nạp ngay
                                            </a>
                                        </div>
                                        <div class="data_napthe_home">
                                            <button  class="primary-button button-default-ct w-100 mb-fix-20 text-center" type="submit" style="float: right">
                                                Nạp ngay
                                            </button>
                                        </div>


                                    </div>

                                    @include('frontend.widget.modal.__confirm_charge')
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade  mt-3 " id="atm_card" role="tabpanel" >
                            <form action="">
                                <div class="box-charge-card">
                                    {{--                                            <div class="atm-card-title mb-fix-20">--}}
                                    {{--                                                <span>Để hoàn tất đơn nạp, bạn vui lòng chuyển khoản theo cú pháp sau:</span>--}}
                                    {{--                                            </div>--}}
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
        <div class="col-lg-4 col-md-12 pl-0 d-g-md-none " style="min-height: 100%">
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
</div>
