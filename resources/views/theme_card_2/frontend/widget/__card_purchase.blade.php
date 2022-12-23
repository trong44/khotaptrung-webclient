<div class="">
    <form method="POST" action="{{route('postStoreCard')}}" enctype="multipart/form-data" class="recharge_supplier" id="recharge_supplier" name="recharge_supplier">
        @csrf
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="content-supplier">
                    <div class="title-content">
                        <h1 style="display:none">Mua thẻ Garena online giá rẻ bằng thẻ cào điện thoại, atm, paypal, ví điện tử</h1>
                        <h2 style="color: #2F6A7C;font-size: 20px;font-weight: 700;">Chọn mua thẻ từ nhà cung cấp</h2>
                    </div>
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


{{--                            <li>--}}
{{--                                <div class="nav-link link-supplier text-center"><input--}}
{{--                                        name="telecom_key" value="GARENA" id="myCheckbox0" type="radio"><label--}}
{{--                                        class="item-wapper GARENA" for="myCheckbox0"--}}
{{--                                        onclick="reply_click(this.id)" id="GARENA"><img--}}
{{--                                            class="img-fluid"--}}
{{--                                            src="/assets/frontend/theme_card_2/image/garena.png"></label>--}}
{{--                                </div>--}}
{{--                            </li>--}}

                        </ul>
                    </div>
                </div>
                <div class="content-supplier">
                    <div class="title-content">
                        <h3>Chọn mệnh giá</h3>
                    </div>
                    <div id="render-supplier" class="wapper-content justify-content-center position-relative">
                        <div class="loading-wrap mb-3">
                            <span class="modal-loader-spin mb-3"></span>
                        </div>
{{--                        <h5 style="color: #2F6A7C">Vui lòng chọn nhà cung cấp</h5>--}}
                    </div>
                    <div id="button" class="my-5"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="content-pay-cart">
                    <div class="title-content-pay text-center d-none d-lg-block">
                        <h3>CHI TIẾT GIAO DỊCH</h3>
                    </div>
                    <div class="wapper-content-pay d-none d-lg-block">
                        <div class="item-pay">
                            <div class="row">
                                <div class="col-6">
                                    <h6>Loại mã thẻ:</h6>
                                </div>
                                <div class="col-6">
                                    <h6 class="denominations">Chưa chọn</h6>
                                </div>
                            </div>
                        </div>
                        <div class="item-pay">
                            <div class="row">
                                <div class="col-6">
                                    <h6>Mệnh giá:</h6>
                                </div>
                                <div class="col-6">
                                    <h6 class="price_supplier">Chưa chọn</h6>
                                </div>
                            </div>
                        </div>
                        <div class="item-pay">
                            <div class="row">
                                <div class="col-6">
                                    <h6>Phí giao dịch:</h6>
                                </div>
                                <div class="col-6">
                                    <h6>Miễn phí</h6>
                                </div>
                            </div>
                        </div>
                        <div class="item-pay">
                            <div class="row">
                                <div class="col-6">
                                    <h6>Giảm giá: </h6>
                                </div>
                                <div class="col-6">
                                    <h6><span class="price_sale">0</span> VNĐ</h6>
                                </div>
                            </div>
                        </div>
                        <div class="item-pay">
                            <div class="row">
                                <div class="col-6">
                                    <h6>Số lượng:</h6>
                                </div>
                                <div class="col-6">
                                    <h6 class="render_quantity">1</h6>
                                </div>
                            </div>
                        </div>
                        <div class="sum-total-pay">
                            <div class="row">
                                <div class="col-6">
                                    <h6 style="font-size: 18px;">Tổng tiền:</h6>
                                </div>
                                <div class="col-6">
                                    <span class="total_price">0</span> <span>VNĐ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wapper-pay text-center position-relative">
                        <button type="button" data-toggle="modal"  class="btn btn-success " id="store_pay" style="background-color:#30C1CE ;height: 42px;">
                            <div class="loading-wrap ">
                                <span class="modal-loader-spin "></span>
                            </div>
                            {{--                            Thanh toán ngay--}}
                        </button>
{{--                        <button --}}
{{--                                type="button" data-toggle="modal" data-target="#modalLogin"--}}
{{--                                class="btn btn-success">ĐĂNG NHẬP ĐỂ THANH TOÁN--}}
{{--                        </button>--}}
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="modal fade" id="modal_pay" tabindex="-1" role="dialog">--}}
{{--            <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h4 class="modal-title">Xác nhận thanh toán</h4>--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true">&times;</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <p class="d-none d-lg-block d-none d-md-block">Bạn thực sự muốn thanh toán ?</p>--}}
{{--                        <div class="tbl_card_discount hidden-lg d-md-none">--}}
{{--                            <table class="info-payment">--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td>Loại thẻ:</td>--}}
{{--                                    <td class="denominations">Chưa chọn</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>Phí giao dịch:</td>--}}
{{--                                    <td>Miễn phí</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>Chiết khấu:</td>--}}
{{--                                    <td class="ratio">0</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td>Số lượng:</td>--}}
{{--                                    <td class="render_quantity">1</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td><span style="font-size: 19px">Tổng tiền:</span></td>--}}
{{--                                    <td><span style="font-size: 19px;color: #F25922" class="total_price">0 VNĐ</span></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}


{{--                    </div>--}}
{{--                    <div class="modal-footer text-center">--}}
{{--                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>--}}
{{--                        <button type="submit" class="btn btn-primary" id="btnBuy">Thanh toán</button>--}}
{{--                    </div>--}}
{{--                </div><!-- /.modal-content -->--}}
{{--            </div><!-- /.modal-dialog -->--}}
{{--        </div><!-- /.modal -->--}}


        <div class="modal fade show" id="modal_pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">XÁC NHẬN THANH TOÁN</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="d-none d-lg-block">Bạn thực sự muốn thanh toán ?</p>
                        <div class="wapper-content-pay d-lg-none">
                            <div class="item-pay">
                                <div class="row">
                                    <div class="col-6">
                                        <h6>Loại mã thẻ:</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="denominations">Chưa chọn</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item-pay">
                                <div class="row">
                                    <div class="col-6">
                                        <h6>Mệnh giá:</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="price_supplier">Chưa chọn</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item-pay">
                                <div class="row">
                                    <div class="col-6">
                                        <h6>Phí giao dịch:</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6>Miễn phí</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item-pay">
                                <div class="row">
                                    <div class="col-6">
                                        <h6>Giảm giá: </h6>
                                    </div>
                                    <div class="col-6">
                                        <h6><span class="price_sale">0</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item-pay">
                                <div class="row">
                                    <div class="col-6">
                                        <h6>Số lượng:</h6>
                                    </div>
                                    <div class="col-6">
                                        <h6 class="render_quantity">1</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="sum-total-pay">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 style="font-size: 18px;">Tổng tiền:</h6>
                                    </div>
                                    <div class="col-6">
                                        <span class="total_price">0</span> <span>VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button style="font-family: 'Nunito', sans-serif;background-color:#30C1CE ;" type="submit" class="btn btn-success"><span class="content-ajax">Đồng ý</span> <div class="m-loader m-loader--lg mb-3 mt-2 ajax-loader" style="width: 30px; display: none;"></div></button>
                    </div>
                </div>
            </div>
        </div>
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
