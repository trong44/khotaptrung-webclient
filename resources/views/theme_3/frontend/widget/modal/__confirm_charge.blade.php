<div class="modal fade login show order-modal" id="openCharge" aria-modal="true">

    <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
        <!--        <div class="image-login"></div>-->
        <div class="modal-content">
            <div class="modal-header p-0" style="border-bottom: 0">
                <div class="row marginauto modal-header-order-ct">
                    <div class="col-12 span__donhang text-center" style="position: relative">
                        <span>Xác nhận thanh toán</span>
                        <div class="close" data-dismiss="modal" aria-label="Close">
                            <img class="lazy img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body modal-body-order-ct">
                <div class="row marginauto">

                    <div class="col-md-12 left-right padding-order-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right background-order-ct">
                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Nhà mạng</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct charge_name" id="">
{{--                                        <small>10.000 đ</small>--}}
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Mệnh giá</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct charge_amount" id="">
{{--                                        <small>10.000 đ</small>--}}
                                    </div>
                                </div>

                                <div class="row marginauto background-order-body-row-ct">
                                    <div class="col-auto left-right background-order-col-left-ct">
                                        <span>Chiết khấu</span>
                                    </div>
                                    <div class="col-auto left-right background-order-col-right-ct charge_ratito" id="">
{{--                                        <small>3%</small>--}}
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
{{--                                        <span>97.000 đ</span>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 left-right padding-order-footer-ct">
                        <div class="row marginauto">
                            <div class="col-md-12 left-right">
                                <button class="button-default-nick-ct btn-confirm-charge" id="" type="button">Xác nhận</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
