<div class="item">
    <div class="index_title">
        <span><img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/ic_h1.svg" alt="mua thẻ điện thoại online"></span>
        <h2 style="padding-top: 62px">{{ $title??'Mua thẻ online' }}</h2>
    </div>
    <div class="card_process">
        <div class="">
            <form method="POST" action="{{route('postStoreCard')}}"  enctype="multipart/form-data" class="recharge_supplier" id="recharge_supplier" name="recharge_supplier">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-12">
                        <div class="content-supplier">
                            <div id="supplier-flex">
                                <ul id="tab-supplier" class="nav nav-pills nav-pills--success">
                                    @foreach($telecoms as $key => $telecom)
                                        @if($key == 0)
                                            <li>
                                                <div class="nav-link link-supplier text-center">
                                                    <input name="telecom" value="{{ $telecom->key }}" id="myCheckbox{{ $telecom->id }}" type="radio" >
                                                    <label class="item-wapper label-{{ $telecom->key }} store-telecom{{$key}}" for="myCheckbox{{ $telecom->id }}" onclick="reply_click(this.id)" id="{{ $telecom->key }}">
                                                        <img class="img-fluid" src="{{ $telecom->image }}" alt="{{ $telecom->key }}">
                                                    </label>
                                                </div>
                                            </li>
                                        @else
                                            <li>
                                                <div class="nav-link link-supplier text-center">
                                                    <input name="telecom" value="{{ $telecom->key }}" id="myCheckbox{{ $telecom->id }}" type="radio">
                                                    <label class="item-wapper label-{{ $telecom->key }} store-telecom{{$key}}" for="myCheckbox{{ $telecom->id }}" onclick="reply_click(this.id)" id="{{ $telecom->key }}">
                                                        <img class="img-fluid" src="{{ $telecom->image }}" alt="{{ $telecom->key }}">
                                                    </label>
                                                </div>
                                            </li>
                                        @endif

                                    @endforeach


                                    {{--                                <li>--}}
                                    {{--                                    <div class="nav-link link-supplier text-center">--}}
                                    {{--                                        <input name="telecom_key" value="VIETTEL" id="myCheckbox3" type="radio">--}}
                                    {{--                                        <label class="item-wapper label-VIETTEL" for="myCheckbox3" onclick="reply_click(this.id)" id="VIETTEL">--}}
                                    {{--                                            <img class="img-fluid" src="/telecom/O6UHiMStn3_1619169265.png">--}}
                                    {{--                                        </label>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="content-supplier">
                            <div class="title-content mt-3">
                                <h3 class="menhgia_title">
                                    Chọn mệnh giá thẻ <span style="color: #F25922;" class="denominations"></span>
                                </h3>
                            </div>
                            <div id="render-supplier" class="wapper-content justify-content-center position-relative">
                                <div class="loading-wrap mb-3">
                                    <span class="modal-loader-spin mb-3"></span>
                                </div>
                                {{--                            <div class="text-center">--}}
                                {{--                                <input type="radio" name="amount" class="amount" id="CheckboxSupplier0" value="20000" rel-ratio="99.0">--}}
                                {{--                                <input style="display: none" type="text" id="price_20000" class="ratio_default" value="99.0">--}}
                                {{--                                <label class="item-content" for="CheckboxSupplier0">--}}
                                {{--                                    <h5>20,000 VNĐ </h5>--}}
                                {{--                                    <p>Giá: <span>19,800 VNĐ</span></p>--}}
                                {{--                                </label>--}}
                                {{--                            </div>--}}

                            </div>
                            <div id="button" class="mt-5 mb-4" ></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="tbl_card_discount active hidden-xs d-none d-md-block" id="vt_discount">
                            <h3 class="text-center text-uppercase">Bảng chi tiết giao dịch</h3>
                            <p class="text-center">(Dành cho khách hàng là thành viên của hệ thống)</p>
                            <hr>
                            <table class="info-payment">
                                <tbody>
                                <tr>
                                    <td>Loại thẻ:</td>
                                    <td class="denominations">Chưa chọn</td>
                                </tr>
                                <tr>
                                    <td>Mệnh giá:</td>
                                    <td class="price_supplier">Chưa chọn</td>

                                </tr>
                                <tr>
                                    <td>Phí giao dịch:</td>
                                    <td>Miễn phí</td>

                                </tr>
                                <tr>
                                    <td>Chiết khấu:</td>
                                    <td class="ratio">0</td>

                                </tr>

                                <tr>
                                    <td>Số lượng:</td>
                                    <td class="render_quantity">1</td>

                                </tr>
                                <tr>
                                    <td><span style="font-size: 19px">Tổng tiền:</span></td>
                                    <td><span style="font-size: 19px;color: #F25922" class="total_price">0 VNĐ</span></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="wapper-pay text-center position-relative">
                            {{--                        <button type="button" data-toggle="modal" data-target="#signin" class="btn "   >--}}
                            {{--                            Đăng nhập để thanh toán--}}
                            {{--                        </button>--}}

                            <button type="button" data-toggle="modal"  class="btn " id="store_pay">
                                <div class="loading-wrap ">
                                    <span class="modal-loader-spin "></span>
                                </div>
                                {{--                            Thanh toán ngay--}}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal_pay" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Xác nhận thanh toán</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="d-none d-lg-block d-none d-md-block">Bạn thực sự muốn thanh toán ?</p>
                                <div class="tbl_card_discount hidden-lg d-md-none">
                                    <table class="info-payment">
                                        <tbody>
                                        <tr>
                                            <td>Loại thẻ:</td>
                                            <td class="denominations">Chưa chọn</td>
                                        </tr>
                                        <tr>
                                            <td>Phí giao dịch:</td>
                                            <td>Miễn phí</td>
                                        </tr>
                                        <tr>
                                            <td>Chiết khấu:</td>
                                            <td class="ratio">0</td>
                                        </tr>
                                        <tr>
                                            <td>Số lượng:</td>
                                            <td class="render_quantity">1</td>
                                        </tr>
                                        <tr>
                                            <td><span style="font-size: 19px">Tổng tiền:</span></td>
                                            <td><span style="font-size: 19px;color: #F25922" class="total_price">0 VNĐ</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                            <div class="modal-footer text-center">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-primary" id="btnBuy">Thanh toán</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </form>

            <div class="modal fade" id="showInfor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">MUA THẺ THÀNH CÔNG</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body table-action">
                            <div id="showInforDetails"></div>
                            <table class="table m-table m-table--head-bg-success text-center">
                                <thead>
                                <tr class="text-center" style="background-color: #eef1f5;">
                                    <td colspan="2" ><b>THÔNG TIN ĐƠN HÀNG</b></td>
                                </tr>
                                </thead>
                                <tbody>
                                {{--                            <tr>--}}
                                {{--                                <td width="40%"><b>Mã số</b></td>--}}
                                {{--                                <td id="id-item"></td>--}}
                                {{--                            </tr>--}}
                                <tr>
                                    <td><b>Mô tả</b></td>
                                    <td id="description-item" class="denominations"></td>
                                </tr>
                                <tr>
                                    <td><b>Trạng thái</b></td>
                                    <td><span class="btn btn-success btn-sm m-btn m-btn--custom ">Hoàn thành</span></td>
                                </tr>
                                <tr>
                                    <td><b>Mệnh giá</b></td>
                                    {{--                                <td id="money-item" class="price_supplier"></td>--}}
                                    <td class="price_supplier"></td>
                                </tr>
                                <tr>
                                    <td><b>Số tiền</b></td>
                                    <td  class="total_price"></td>
                                </tr>
                                <tr>
                                    <td><b>Chiết khấu</b></td>
                                    {{--                                <td id="txns-item"></td>--}}
                                    <td class="ratio"></td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table m-table m-table--head-bg-success table-striped">
                                <thead>
                                <tr class="text-center" style="background-color: #eef1f5;">
                                    <td colspan="3" ><b>DANH SÁCH MÃ THẺ</b></td>
                                </tr>
                                <tr class="text-center">
                                    <td></td>
                                    <td>Mã thẻ</td>
                                    <td>Serial</td>
                                </tr>
                                </thead>
                                <tbody id="store_card" class="text-center">

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>


