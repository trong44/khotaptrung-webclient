<div class="modal fade modal-big" id="rechargeModal">
    <div class="modal-dialog modal-dialog-centered modal-custom">
        <div class="modal-content p-0">
            <div class="modal-header c-pl-24 c-pr-24 c-pt-24 c-pb-16" style="border-bottom: 1px solid #E4E5F0">
                <p class="modal-title center">Nạp tiền</p>
                <button type="button" class="close" data-dismiss="modal" style="right: 24px;top: 36px"></button>
            </div>
            <div class="modal-body pl-0 pr-0 c-pt-0 c-pb-24">
                <section class="section-category-tab">
                    <div class="c-mb-16 c-mb-lg-16">
                        <ul class="nav nav-tabs size-auto" role="tablist" style="width: 100%;margin: 0 auto">
                            <li class="nav-item" role="presentation">
                                <a class="tab active" data-toggle="tab" href="#charge_card_modal" role="tab" aria-selected="true">Nạp thẻ cào</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tab" data-toggle="tab" href="#atm_card_modal" role="tab" aria-selected="false">ATM tự động</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content c-pl-24 c-pl-lg-16 c-pr-24 c-pr-lg-16">
                        <div class="tab-pane fade show active" id="charge_card_modal" role="tabpanel">
                            <form class="w-100" action="" id="chargeCardModalForm">
                                <div class="row content-block">
                                    <div class="col-12 c-pr-8">
                                        <div class="money-form-group c-mb-16">
                                            <label class="text-form fz-13 fw-500 c-mb-4">Nhà cung cấp</label>
                                            <div class="col-md-12 p-0">
                                                <select class="select-form w-100" name="type" id="telecom_modal">
                                                    @forelse($data as $telecom)
                                                        <option value="{{ @$telecom->key }}">{{ @$telecom->title }}</option>
                                                    @empty
                                                        <option value="">Chưa cấu hình loại thẻ</option>
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="money-form-group c-mb-12">
                                            <label class="text-form fz-13 fw-500 c-mb-8">Chọn mệnh giá</label>
                                            <div class="col-md-12 p-0">
                                                <div class="row m-0 c-mx-n4" id="cardAmountModal">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="money-form-group c-mb-8">
                                            <label class="text-form fz-13 fw-500 c-mb-4 d-none d-lg-block">Mã số thẻ</label>
                                            <div class="col-md-12 p-0">
                                                <div class="input-group">
                                                    <input class="input-form w-100" name="pin" type="text" placeholder="Nhập mã số thẻ của bạn">
                                                    <p class="text-error c-mb-0 c-mt-4"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="money-form-group c-mb-8">
                                            <label class="text-form fz-13 fw-500 c-mb-4 d-none d-lg-block">Số sê-ri</label>
                                            <div class="col-md-12 p-0">
                                                <div class="input-group">
                                                    <input class="input-form w-100" name="serial" type="text" placeholder="Nhập mã số sê-ri trên thẻ">
                                                    <p class="text-error c-mb-0 c-mt-4"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="money-form-group">
                                            <label class="text-form fz-13 fw-500 c-mb-4 d-none d-lg-block">Mã bảo vệ</label>
                                            <div class="input-group">
                                                <div class="col-md-12 p-0 d-flex">
                                                    <div style="flex: 1;">
                                                        <input class="input-form w-100" name="captcha" type="text" placeholder="Nhập mã bảo vệ ">
                                                    </div>
                                                    <div class="captcha c-mx-8">
                                                        <div>
                                                        <span class="capchaImage">
                                                            {!! captcha_img('flat') !!}
                                                        </span>
                                                        </div>
                                                    </div>
                                                    <button class="refresh-captcha brs-8" type="button" id="reload_modal_btn">
                                                        <img class="spinImg paused" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/captcha_refresh.png" alt="">
                                                    </button>
                                                </div>
                                                <p class="text-error c-mb-0 c-mt-4"></p>
                                            </div>
                                        </div>
                                        <div class="group-btn c-mt-24 d-flex">
                                            @if (\App\Library\AuthCustom::check())
                                                <button class="btn primary" type="submit">Nạp ngay</button>
                                            @else
                                                <button class="btn primary" type="button" onclick="openLoginModal();" data-dismiss="modal">Nạp ngay</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="atm_card_modal" role="tabpanel">
                            @if (!\App\Library\AuthCustom::check())
                                <div class="row content-block">
                                    <div class="col-12 col-lg-12">
                                        <div class="atm-recharge-right c-p-16 brs-8">
                                            <div class="atm-recharge-guide">
                                                <img class="w-100 c-mb-16" src="/assets/frontend/{{theme('')->theme_key}}/image/phu/atm_recharge_guide.png" alt="">
                                                <p class="fz-13 fw-400">Để hoàn tất đơn nạp, bạn vui lòng chuyển khoản theo cú pháp sau:</p>
                                            </div>
                                            <div class="atm-recharge-content c-p-sm-12 brs-sm-8">
                                                @if (setting('sys_tranfer_content') != "")
                                                    {!! setting('sys_tranfer_content') !!}
                                                @endif
                                                <div class="atm-recharge-attr" style="text-align: center">
                                                    <p class="fz-14 fw-600 mb-0" style="color: red; max-width: 100% !important;">Vui lòng đăng nhập để nhận được nội dung chuyển tiền!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row text-center loader-container">
                                    <div class="col-12">
                                        <div class="loader position-relative" style="margin: 2rem 0">
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
                                <div class="row content-block d-none">
                                    <div class="col-12 col-lg-12">
                                        <div class="atm-recharge-right c-p-16 brs-8">
                                            <div class="atm-recharge-content c-p-sm-12 brs-sm-8">
                                                @if (setting('sys_tranfer_content') != "")
                                                    {!! setting('sys_tranfer_content') !!}
                                                @endif
                                                <div class="atm-recharge-attr d-flex justify-content-between align-items-center">
                                                    <p class="fz-13 fw-400 mb-0">Nội dung chuyển khoản</p>
                                                    <div class="fz-13 fw-500" id="transactionContentModal"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>
</div>
