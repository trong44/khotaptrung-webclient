<div class="modal fade show" id="rechargeModal" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered animated">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Nạp tiền</div>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation" style="width: 50%">
                    <a class="nav-link active" data-toggle="tab" href="#tab-modal-recharge" role="tab"
                       aria-selected="true">Nạp thẻ</a>
                </li>
                <li class="nav-item" role="presentation" style="width: 50%">
                    <a class="nav-link " data-toggle="tab" href="#tab-modal-atm" role="tab"
                       aria-selected="false">ATM</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="tab-modal-recharge" role="tabpanel">
                    <form action="{{route('postTelecomDepositAuto')}}" id="modal-form-charge">
                        @csrf
                        <div class="modal-body">
                            <div class="t-sub-2 mb-2">Nhà cung cấp</div>
                            <select name="type" class="form-control mb-fix-12" id="modal-telecom">
                                <!-- JS PASTE CODE HERE -->
                            </select>

                            <div class="t-sub-2 mb-2 mt-2">Chọn mệnh giá</div>
                            <div class="list-card-deno" id="modal-amounts">
                                <!-- JS PASTE CODE HERE -->
                            </div>

                            <div class="t-sub-2 mb-2">Mã số thẻ</div>
                            <input autocomplete="off" class="form-control input-form w-100 mb-fix-12" name="pin" type="text" placeholder="Nhập mã số thẻ" required="">

                            <div class="t-sub-2 mb-2 mt-2">Số seri</div>
                            <input autocomplete="off" class="form-control input-form w-100 mb-fix-12" name="serial" type="text" placeholder="Nhập số seri thẻ" required="">

                            <div class="default-form-group mt-2">
                                <label class="text-form fw-600" style="font-weight: 600">Mã bảo vệ</label>
                                <div class="row p-0">
                                    <div class="col-md-12 d-flex ">
                                        <input class="form-control input-form w-100" name="captcha" type="text" placeholder="Nhập mã bảo vệ" required>
                                        <div class="captcha captcha_1">
                                            <span class="reload">
                                                {!! captcha_img('flat') !!}
                                            </span>
                                        </div>
                                        <button class="refresh-captcha" id="modal-reload-captcha" type="button">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/captcha_refresh.png" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="text-invalid message-form mt-2"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-big submit-modal-form-charge" style="background: #32c5d2;width: 100%;border: 1px solid #32c5d2;">Nạp tiền</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="tab-modal-atm" role="tabpanel">
                    <div class="modal-body">
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
                                        <div class="card--attr transfer-title justify-content-center">
                                            {{--                                            <div class="card--attr__name">--}}
                                            {{--                                                Nội dung chuyển tiền--}}
                                            {{--                                            </div>--}}
                                            <div class="card--attr__value d-flex">
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
                </div>
                {{--<div class="tab-pane fade" id="tab-modal-wallet" role="tabpanel">

                </div>--}}
            </div>
        </div>
    </div>
</div>
