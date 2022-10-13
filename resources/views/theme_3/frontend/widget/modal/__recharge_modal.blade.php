<div class="modal fade show" id="rechargeModal" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered animated">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Nạp tiền</div>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-toggle="tab" href="#tab-modal-recharge" role="tab"
                       aria-selected="true">Nạp thẻ</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-toggle="tab" href="#tab-modal-atm" role="tab"
                       aria-selected="false">ATM</a>
                </li>
                {{--<li class="nav-item" role="presentation">
                    <a class="nav-link" data-toggle="tab" href="#tab-modal-wallet" role="tab"
                       aria-selected="false">Ví điện tử</a>
                </li>--}}
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="tab-modal-recharge" role="tabpanel">
                    <form action="{{route('postTelecomDepositAuto')}}" id="modal-form-charge">
                    @csrf
                    <div class="modal-body">
                            <div class="t-sub-2 mb-2">Nhà cung cấp</div>
                            <select name="type" class="select-form mb-fix-12" id="modal-telecom">
                                <!-- JS PASTE CODE HERE -->
                                @foreach($data as $val)
                                    <option value="{{$val->key}}">{{$val->title}}</option>
                                @endforeach
                            </select>

                            <div class="t-sub-2 mb-2">Chọn mệnh giá</div>
                            <div class="list-card-deno" id="modal-amounts">
                                <!-- JS PASTE CODE HERE -->
                            </div>

                            <div class="t-sub-2 mb-2">Mã số thẻ</div>
                            <input autocomplete="off" class="input-form w-100 mb-fix-12" name="pin" type="text" placeholder="Nhập mã số thẻ" required="">

                            <div class="t-sub-2 mb-2">Số seri</div>
                            <input autocomplete="off" class="input-form w-100 mb-fix-12" name="serial" type="text" placeholder="Nhập số seri thẻ" required="">

                            <div class="default-form-group">
                                <label class="text-form">Mã bảo vệ</label>
                                <div class="row p-0">
                                    <div class="col-md-12 d-flex ">
                                        <input class="input-form w-100" name="captcha" type="text" placeholder="Nhập mã bảo vệ" required>
                                        <div class="captcha captcha_1">
                                            <span class="reload fix_capcha">
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
                        <button type="submit" class="btn -primary btn-big submit-modal-form-charge">Nạp tiền</button>
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
                                        <div class="card--attr transfer-title">
                                            <div class="card--attr__name">
                                                Nội dung chuyển tiền
                                            </div>
                                            <div class="card--attr__value d-flex">
                                                <div class="card__info transfer-code mr-3" id=""></div>

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
