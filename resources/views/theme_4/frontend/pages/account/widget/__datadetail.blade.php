@if(isset($data))

    @if($data->status == 1)
    <div class="entries">
        <div class="row marginauto">
            <div class="col-lg-6 col-md-12 shop_product_detailS__col">
                <div class="gallery" style="overflow: hidden">
                    <div class="swiper gallery-slider">
                        <div class="swiper-wrapper">
                            @foreach(explode('|',$data->image_extension) as $val)
                                <div class="swiper-slide">
                                    <a data-fancybox="gallerycoverDetail" href="{{\App\Library\MediaHelpers::media($val)}}">
                                        <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" >
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <div class="swiper-button-prev">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="swiper-button-next">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>

                    <div class="swiper gallery-thumbs gallery-thumbsmaxheadth">
                        <div class="swiper-wrapper">
                            @foreach(explode('|',$data->image_extension) as $val)
                                <div class="swiper-slide">
                                    <a data-fancybox="gallerycoverDetail" href="{{\App\Library\MediaHelpers::media($val)}}">
                                        <img src="{{\App\Library\MediaHelpers::media($val)}}" alt="" class="lazy">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 gallery__right">
                <div class="row gallery__row fixcssacount">
                    <div class="col-md-12">
                        <div class="row gallery__01">
                            <div class="col-md-12 gallery__01__row">
                                <div class="row">
                                    <div class="col-auto">
                                        <span class="gallery__01__span">Mã số:</span>
                                    </div>
                                    <div class="col-md-8 col-8 pl-0">
                                        <span class="gallery__01__span">#{{ $data->randId }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 gallery__01__row2">
                                <div class="row">
                                    <div class="col-auto">
                                        <span class="gallery__02__span">Danh mục:</span>
                                    </div>
                                    <div class="col-md-8 col-8  pl-0">
                                        <a class="theashow"  href="/mua-acc/{{ isset($data->category->custom->slug) ? $data->category->custom->slug :  $data->category->slug }}"><span class="gallery__02__span">{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 gallery__pt">
                        <div class="row gallery__02">
                            <div class="col-md-12 gallery__01__row">
                                <div class="row">
                                    @if(isset($card_percent))
                                        @if($card_percent == 0)
                                            <div class="col-md-5 col-sm-5 col-5">
                                                <div class="row text-left">
                                                    <div class="col-md-12">
                                                        <span class="gallery__02__span__02">THẺ CÀO</span>
                                                    </div>
                                                    <div class="col-md-12">

                                                        <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($data->price))) }} CARD</span>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-2 gallery__01__span__02md">
                                                <div class="row text-center">
                                                    <div class="col-md-12">
                                                        <span class="hoac">Hoặc</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-5">
                                                <div class="row text-right">
                                                    <div class="col-md-12">
                                                        <span class="gallery__02__span__02">ATM</span>
                                                    </div>
                                                    <div class="col-md-12">

                                                        @if(isset($data->price_atm))
                                                            <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($data->price_atm))) }} ATM</span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-5 col-sm-5 col-5">
                                                <div class="row text-left">
                                                    <div class="col-md-12">
                                                        <span class="gallery__02__span__02">ATM</span>
                                                    </div>
                                                    <div class="col-md-12">
                                                        @if(isset($data->price_atm))
                                                            <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($data->price_atm))) }} ATM</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="col-md-5 col-sm-5 col-5">
                                            <div class="row text-left">
                                                <div class="col-md-12">
                                                    <span class="gallery__02__span__02">THẺ CÀO</span>
                                                </div>
                                                <div class="col-md-12">

                                                    <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($data->price))) }} CARD</span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-2 gallery__01__span__02md">
                                            <div class="row text-center">
                                                <div class="col-md-12">
                                                    <span class="hoac">Hoặc</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-5 col-5">
                                            <div class="row text-right">
                                                <div class="col-md-12">
                                                    <span class="gallery__02__span__02">ATM</span>
                                                </div>
                                                <div class="col-md-12">

                                                    @if(isset($atm_percent))
                                                        <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($atm_percent*$data->price_atm/100))) }} ATM</span>
                                                    @else
                                                        @if(isset($data->price_atm))
                                                            <span class="gallery__01__span__02">{{ str_replace(',','.',number_format(round($data->price_atm))) }} ATM</span>
                                                        @endif
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>

                    @if(isset($data->groups))
                        <?php $att_values = $data->groups ?>
                        @foreach($att_values as $att_value)
                            @if(isset($att_value->module) && $att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                @if(isset($att_value->parent))
                                    <div class="col-md-12">
                                        <div class="row gallery__03">
                                            <div class="col-md-12 gallery__01__row">
                                                <div class="row">
                                                    <div class="col-auto span__dangky__auto">
                                                        <i class="fas fa-angle-right"></i>
                                                    </div>
                                                    <div class="col-md-4 col-4 pl-0">
                                                        <span class="span__dangky">{{ $att_value->parent->title??null }}</span>
                                                    </div>
                                                    <div class="col-md-6 col-6 pl-0">
                                                        <span class="span__dangky">{{ $att_value->title??null }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @endif

                    @if(isset($data->params) && isset($data->params->ext_info))
                        <?php $params = json_decode(json_encode($data->params->ext_info),true) ?>
                        @if(isset($dataAttribute))
                            @foreach($dataAttribute as $index=>$att)
                                @if($att->position == 'text')
                                    @if(isset($att->childs))
                                        @foreach($att->childs as $child)
                                            @foreach($params as $key => $param)
                                                @if($key == $child->id && $child->is_slug_override == null)

                                                    <div class="col-md-12">
                                                        <div class="row gallery__03">
                                                            <div class="col-md-12 gallery__01__row">
                                                                <div class="row">
                                                                    <div class="col-auto span__dangky__auto">
                                                                        <i class="fas fa-angle-right"></i>
                                                                    </div>
                                                                    <div class="col-md-4 col-4 pl-0">
                                                                        <span class="span__dangky">{{ $child->title??'' }}</span>
                                                                    </div>
                                                                    <div class="col-md-6 col-6 pl-0">
                                                                        <span class="span__dangky">{{ $param }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endif


                    <div class="col-md-12 gallery__bottom">
                        <div class="row text-center">
                            <div class="col-md-12 gallery__01__row">
                                <div class="row gallery__01__row2">
                                    <div class="col-md-12 pl-0 pr-0">
                                        @if(App\Library\AuthCustom::check())
                                            <button class="btn btn-danger gallery__bottom__span gallery__bottom__span_bg buyacc" style="position: relative;" data-id="{{ encodeItemID($data->id) }}"><i class="fas fa-cart-arrow-down"></i>&ensp;Mua ngay
                                                <div class="row justify-content-center loading-data__buyacc">
                                                </div>
                                            </button>
                                        @else
                                            <button class="btn btn-danger gallery__bottom__span gallery__bottom__span_bg nick-checkdangnhap" style="position: relative;"><i class="fas fa-cart-arrow-down"></i>&ensp;Mua ngay
                                                <div class="row justify-content-center loading-data__buyacc">
                                                </div>
                                            </button>
                                        @endif


                                    </div>
                                    <div class="col-md-12 pl-0 pr-0 gallery__bottom">
                                        <div class="row atmvdtntc">
                                            <div class="col-md-6 col-sm-6 col-6 atmvdt">
                                                @if(App\Library\AuthCustom::check())
                                                    <a data-toggle="modal" data-target="#rechargeModal" data-dismiss="modal" class="btn btn-warning gallery__bottom__span_bg__2 gallery__bottom__span" style="color:#FFFFFF;">ATM - VÍ ĐIỆN TỬ</a>
                                                @else
                                                    <a href="/login" class="btn btn-warning gallery__bottom__span_bg__2 gallery__bottom__span" style="color:#FFFFFF;">ATM - VÍ ĐIỆN TỬ</a>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-6 ntc">
                                                @if(App\Library\AuthCustom::check())
                                                    <a data-toggle="modal" data-target="#rechargeModal" data-dismiss="modal" class="btn btn-warning gallery__bottom__span_bg__2 gallery__bottom__span" style="color:#FFFFFF;">NẠP THẺ CÀO</a>
                                                @else
                                                    <a href="/login" class="btn btn-warning gallery__bottom__span_bg__2 gallery__bottom__span" style="color:#FFFFFF;">NẠP THẺ CÀO</a>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade modal__buyacount loadModal__acount" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog__account" role="document">
                    <div class="loader" style="text-align: center"><img src="/assets/frontend/{{theme('')->theme_key}}/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
                    <div class="modal-content modal-content_accountlist">

                        <form class="formDonhangAccount" action="/ajax/acc/{{ $data->randId }}/databuy" method="POST">
                            {{ csrf_field() }}

                            <div class="modal-header" style="padding-left: 16px;padding-right: 16px">
                                <h4 class="modal-title">Xác nhận mua tài khoản</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="c-content-tab-4 c-opt-3" role="tabpanel">
                                    <ul class="nav nav-justified nav-justified__ul" role="tablist">
                                        <li role="presentation" class="active justified__ul_li">
                                            <a href="#paymentv2" role="tab" data-toggle="tab" aria-selected="true" class="c-font-16 active">Thanh toán</a>
                                        </li>
                                        <li role="presentation" class="justified__ul_li">
                                            <a href="#info2" role="tab" data-toggle="tab" aria-selected="false" class="c-font-16">Thông tin tài khoản</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active show" id="paymentv2">
                                            <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                                                <li class="c-font-dark">
                                                    <table class="table table-striped">
                                                        <tbody><tr>
                                                            <th colspan="2">Thông tin tài khoản #{{ $data->randId }}</th>
                                                        </tr>
                                                        </tbody><tbody>
                                                        @if(isset($data->params))
                                                            @if(isset($data->params->rank_info) && count($data->params->rank_info))
                                                                <tr>
                                                                    <td>Nhà phát hành:</td>
                                                                    <th>Garena</th>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Nhà phát hành:</td>
                                                                    <th>{{  @$data->groups[0]->title }}</th>
                                                                </tr>
                                                            @endif
                                                        @endif
                                                        <tr>
                                                            <td>Tên game:</td>

                                                            <th>{{ isset($data->category->custom->title) ? $data->category->custom->title :  $data->category->title }}</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Giá tiền:</td>
                                                            <th style="color: rgb(238, 70, 35)">
                                                                @if(isset($data->category->params->price) && isset($data->category->params))
                                                                    {{ str_replace(',','.',number_format($data->category->params->price)) }} đ
                                                                @else
                                                                    {{ str_replace(',','.',number_format($data->price)) }} đ
                                                                @endif
                                                            </th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </li>
                                            </ul>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="info2">
                                            <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                                                <li class="c-font-dark">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                        <tr>
                                                            <th colspan="2">Chi tiết tài khoản #{{ $data->randId }}</th>
                                                        </tr>
                                                        @if(isset($data->groups))
                                                            <?php $att_values = $data->groups ?>

                                                            @foreach($att_values as $att_value)
                                                                @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                                                    @if(isset($att_value->parent))
                                                                        <tr>
                                                                            <td style="width:50%">{{ $att_value->parent->title??null }}:</td>
                                                                            <td class="text-danger" style="font-weight: 700">{{ $att_value->title??null }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                        @if(isset($data->params) && isset($data->params->ext_info))
                                                            <?php $params = json_decode(json_encode($data->params->ext_info),true) ?>
                                                            @if(isset($dataAttribute))
                                                                @foreach($dataAttribute as $index=>$att)
                                                                    @if($att->position == 'text')
                                                                        @if(isset($att->childs))
                                                                            @foreach($att->childs as $child)
                                                                                @foreach($params as $key => $param)
                                                                                    @if($key == $child->id && $child->is_slug_override == null)
                                                                                        <tr>
                                                                                            <td style="width:50%">{{ $child->title??'' }}:</td>
                                                                                            <td class="text-danger" style="font-weight: 700">{{ $param }}</td>
                                                                                        </tr>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endforeach
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group form-group_buyacc ">
                                    @if(App\Library\AuthCustom::check())

                                        @if(App\Library\AuthCustom::user()->balance < $data->price)
                                            <div class="col-md-12"><label class="form-control-label text-danger" style="text-align: center;margin: 10px 0; ">Bạn không đủ số dư để mua tài khoản này. Bạn hãy click vào nút nạp thẻ để nạp thêm và mua tài khoản.</label></div>
                                        @else
                                            <div class="col-md-12"><label class="form-control-label" style="text-align: center;margin: 10px 0; ">Tài khoản của bạn chưa cấu hình bảo mật ODP nên chỉ cần click vào nút xác nhận mua để hoàn tất giao dịch</label></div>
                                        @endif

                                    @else
                                        <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">Bạn phải đăng nhập mới có thể mua tài khoản tự động.</label>
                                    @endif

                                </div>

                                <div style="clear: both"></div>
                            </div>

                            <div class="modal-footer">

                                @if(App\Library\AuthCustom::check())

                                    @if(App\Library\AuthCustom::user()->balance < $data->price)
                                        <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold gallery__bottom__span_bg__2 btn-success" data-toggle="modal" data-target="#rechargeModal" data-dismiss="modal" id="d3">Nạp thẻ cào</a>
                                        <a class="btn c-bg-green-4 c-font-white c-btn-square c-btn-uppercase c-btn-bold load-modal gallery__bottom__span_bg__2 btn-success" style="color: #FFFFFF" data-toggle="modal" data-target="#rechargeModal" data-dismiss="modal">Nạp từ ATM - Ví điện tử</a>
                                    @else
                                        <button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold loginBox__layma__button__displayabs" style="background: rgb(238, 70, 35);color: #ffffff;position: relative"  id="d3">Xác nhận mua<div class="row justify-content-center loading-data__muangay"></div></button>
                                    @endif
                                @else
                                    <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold nick-checkdangnhap" style="background: rgb(238, 70, 35);color: #ffffff" href="javascript:void(0)">Đăng nhập</a>
                                @endif
                                <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($data->description))
        <div class="article-content content_post" style="padding-top: 24px">
            <h1>Chi tiết</h1>
            <div class="special-text-nick">
                {!! $data->description !!}
            </div>
            <button id="btn-expand-content-nick" class="expand-button">
                Xem thêm nội dung
            </button>

        </div>
    @endif

    @else
        <div class="container pt-3">
            <div class="row pb-3 pt-3">
                <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">
                            @if(isset($message))
                                {{ $message }}
                            @else
                                Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                            @endif
                        </span>
                </div>
            </div>

        </div>
    @endif
@endif


<script src="/assets/frontend/{{theme('')->theme_key}}/js/account/slider.js"></script>
