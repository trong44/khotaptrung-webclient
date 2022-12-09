<div class="modal fade" id="recharge_card" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NẠP TIỀN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="" class="m-portlet__body">
                    <ul class="nav nav-pills nav-fill nav-pills--success" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#" data-target="#scratch_cards">NẠP THẺ CÀO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#atm">ATM</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active recharge_card" id="scratch_cards" role="tabpanel">
                            <div id="render-errors">

                            </div>
                            <div class="text-center">
                                {!! setting('sys_charge_content') !!}
                            </div>
                            <form action="{{route('postTelecomDepositAuto')}}" id="modal-form-charge" class="recharge_card_pay">
                                @csrf
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Loại thẻ:</label>
                                    <div class="col-9">
                                        <select class="form-control m-input " name="type" id="modal-telecom" required>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Mệnh giá:</label>
                                    <div class="col-9">
                                        <select class="form-control m-input " name="amount"  id="modal-amounts" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Mã số thẻ:</label>
                                    <div class="col-9">
                                        <input class="form-control m-input refresh" name="pin" type="text" value="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Số Serial:</label>
                                    <div class="col-9">
                                        <input class="form-control m-input refresh" name="serial" type="text" value="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <label for="" class="col-3 col-form-label">Mã bảo vệ:</label>
                                    <div class="col-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control m-input refresh" id="captcha" name="captcha" placeholder="Mã bảo vệ" maxlength="3" autocomplete="off" required="">
                                            <div style=" border: 1px solid #ced4da;height: 40px;display:flex">
                                                <div class="captcha_1">
                                                      <span class="reload h-100 d-flex">
                                                        {!! captcha_img('flat') !!}
                                                      </span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn reload"  id="reload_1" style="border-radius: 0;color: red;border: 1px solid #ced4da;height: 40px;background-color: white" >
                                                &#x21bb;
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-invalid message-form mt-2" style="    text-align: center; color: #dd4b39;font-weight: 500;    margin-bottom: 16px;"></div>

                                <div class="form-group m-form__group text-center">
                                    <button style="width:100%" type="submit" class="btn submit-modal-form-charge btn-success " data-loading-text="<i class='fa fa-spinner fa-spin '></i>"><span class="content-ajax">NẠP THẺ</span> </button>
                                </div>
                            </form>
                        </div>
                        <div style="font-weight: bold" class="tab-pane text-center" id="atm" role="tabpanel">
                            @if (setting('sys_tranfer_content') != "")
                                {!! setting('sys_tranfer_content') !!}
                            @endif
                            <div class="transfer-code" style="justify-content: center;display: flex"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/lich-su-giao-dich"><button type="button" class="btn btn-success">LỊCH SỬ GIAO DỊCH</button></a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
