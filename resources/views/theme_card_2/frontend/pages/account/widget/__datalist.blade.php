@if(empty($data->data))

    @if(isset($items) && count($items) > 0)

        <div class="item_buy_list row">
            @foreach ($items as $item)

                {{--                Nick random--}}
                @if($item->status == 1)
                    @if($data->display_type == 2)

                        <div class="col-6 fixcssacount col-sm-6 col-lg-3">
                            <div class="item_buy_list_in" style="position: relative">
                                @if(isset($item->groups) || (isset($item->params) && isset($item->params->ext_info)))
                                    <div class="tooltipaccount hide tooltipaccount{{ $item->randId }}">
                                        <h3 style="position: relative;text-align: center" >Thông tin tài khoản</h3>
                                        {{--                                    <span class="close close_position close{{ $item->randId }}"><i class="fas fa-times"></i></span>--}}

                                        <div class="slider-container">
                                            <div class="slider-turn" style="width: 100%">
                                                <?php
                                                $index = 0;
                                                ?>
                                                @if(isset($item->groups))
                                                    <?php
                                                    $att_values = $item->groups;
                                                    ?>
                                                    @foreach($att_values as $att_value)

                                                        @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                                            @if(isset($att_value->parent))
                                                                <?php
                                                                $index = $index + 1;
                                                                ?>
                                                                @if($index < 5)
                                                                    <div class="row" style="margin: 0 auto;width: 100%">
                                                                        <div class="col-auto text-left =fixcssacount item_buy_list_info_inacc">
                                                                            {{ $att_value->parent->title??null }} :
                                                                        </div>
                                                                        <div class="col-auto text-right fixcssacount  right" style="color: #666;font-weight: 600;margin-left: auto">
                                                                            {{ $att_value->title??null }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif

                                                @if(isset($item->params) && isset($item->params->ext_info))
                                                    <?php
                                                    $params = json_decode(json_encode($item->params->ext_info),true);
                                                    ?>
                                                    @if($index < 5)

                                                        @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                                            @foreach($dataAttribute as $index=>$att)
                                                                @if($att->position == 'text')
                                                                    @if(isset($att->childs))
                                                                        @foreach($att->childs as $child)
                                                                            @foreach($params as $key => $param)
                                                                                @if($key == $child->id && $child->is_slug_override == null)
                                                                                    <?php
                                                                                    $index++;
                                                                                    ?>
                                                                                    @if($index < 5)
                                                                                        <div class="row" style="margin: 0 auto;width: 100%">
                                                                                            <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                                                                {{ $child->title??null }} :
                                                                                            </div>
                                                                                            <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                                                                {{ $param??null }}
                                                                                            </div>
                                                                                        </div>

                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        @endforeach
                                                                    @endif

                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        if ($(window).width() >= 1200) {
                                            $(".close{{ $item->randId }}").on("click", function(e) {
                                                $('.tooltipaccount{{ $item->randId }}').addClass('hide');
                                            });
                                            $(".item_buy_list_img-main{{ $item->randId }}")
                                                .on('mouseenter', function() {
                                                    $('.tooltipaccount{{ $item->randId }}').removeClass('hide');
                                                })
                                                .on('mouseout', function() {
                                                    $('.tooltipaccount{{ $item->randId }}').addClass('hide');
                                                });
                                        }


                                    </script>
                                @endif
                                <div class="item_buy_list_img item_buy_list_img_custom">
                                    <a href="javascript:void(0)" class="buyacc" data-id="{{ $item->randId }}">
                                        @if(isset($data->params->thumb_default) && isset($data->params))
                                            <img class="item_buy_list_img-main item_buy_list_img-main{{ $item->randId }} " src="{{\App\Library\MediaHelpers::media($data->params->thumb_default)}}" alt="{{ $item->randId }}" >
                                        @else

                                            @if(isset($item->image))
                                                <img class="item_buy_list_img-main item_buy_list_img-main{{ $item->randId }}" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->randId }}">
                                            @else
                                                {{--                                                <img class="item_buy_list_img-main item_buy_list_img-main{{ $item->randId }}" data-original="https://shopas.net/storage/images/CGuYto7yjj_1645585924.jpg" alt="{{ $item->title }}">--}}
                                            @endif
                                        @endif

                                        <span>MS: {{ $item->randId }}</span>
                                    </a>
                                </div>
                                <div class="item_buy_list_description">
                                    bảo hành 100%,lỗi hoàn tiền
                                </div>

                                <div class="item_buy_list_info hidelistacountrandom">
                                    <div class="row item_buy_list_info__row">
                                        <?php
                                        $index = 0;
                                        ?>
                                        @if(isset($item->groups))
                                            <?php
                                            $att_values = $item->groups;
                                            ?>
                                            @foreach($att_values as $att_value)

                                                @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                                    @if(isset($att_value->parent))
                                                        <?php
                                                        $index = $index + 1;
                                                        ?>
                                                        @if($index < 5)
                                                            <div class="row" style="margin: 0 auto;width: 100%">
                                                                <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                                    {{ $att_value->parent->title??null }} :
                                                                </div>
                                                                <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                                    {{--                                                                                                        {{ $att_value->title??null }}--}}
                                                                    {{ isset($att_value->title) ? \Str::limit($att_value->title,12) : null }}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif

                                        @if(isset($item->params) && isset($item->params->ext_info))
                                            <?php
                                            $params = json_decode(json_encode($item->params->ext_info),true);
                                            ?>
                                            @if($index < 5)

                                                @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                                    @foreach($dataAttribute as $index=>$att)
                                                        @if($att->position == 'text')
                                                            @if(isset($att->childs))
                                                                @foreach($att->childs as $child)
                                                                    @foreach($params as $key => $param)
                                                                        @if($key == $child->id && $child->is_slug_override == null)
                                                                            <?php
                                                                            $index++;
                                                                            ?>
                                                                            @if($index < 5)
                                                                                <div class="row" style="margin: 0 auto;width: 100%">
                                                                                    <div class="col-6 text-left fixcssacount item_buy_list_info_inacc">
                                                                                        {{ $child->title??null }} :
                                                                                    </div>
                                                                                    <div class="col-6 text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600">
                                                                                        {{ isset($param) ? \Str::limit($param,12) : null }}
                                                                                    </div>
                                                                                </div>

                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @endif

                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <div class="item_buy_list_more">
                                    <div class="row">
                                        <div class="col-12 fixcssacount">
                                            {{--                                            <div class="item_buy_list_price2 p7">--}}
                                            {{--                                                {{ str_replace(',','.',number_format($item->price)) }}đ--}}
                                            {{--                                            </div>--}}

                                            <div class="item_buy_list_price text-limit limit-1">
                                                @if(isset($data->price))
                                                    <span>{{ str_replace(',','.',number_format($data->price_old??$data->price)) }}đ </span>
                                                    {{ str_replace(',','.',number_format($data->price)) }}đ
                                                @endif
                                            </div>

                                        </div>
                                        <a href="javascript:void(0)" class="col-12 buyacc fixcssacount" data-id="{{ $item->randId }}">
                                            <div class="item_buy_list_view">
                                                Mua ngay
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="formDonhangAccount{{ $item->randId }} hide">
                            @if(App\Library\AuthCustom::check() && App\Library\AuthCustom::user()->balance >= $data->price)
                            <form class="formDonhangAccount" action="/ajax/acc/{{ $item->randId }}/databuy" data-ranid="{{ $item->randId }}" method="POST">
                            @else
                            <form class="formDonhangAccount">
                            @endif
                                {{ csrf_field() }}

                                <div class="modal-header">
                                    <span class="nick-modal-header">Xác nhận mua tài khoản</span>
                                    <img data-dismiss="modal" class="nick-modal-header-close" src="/assets/frontend/{{theme('')->theme_key}}/image/svg/close.svg" alt="">
                                </div>

                                <div class="modal-body">
                                    <div class="c-content-tab-4 c-opt-3" role="tabpanel">
                                        <ul class="nav nav-justified nav-justified__ul" role="tablist">
                                            <li role="presentation" class="active justified__ul_li">
                                                <a href="#paymentv2{{ $item->randId }}" role="tab" data-toggle="tab" aria-selected="true" class="c-font-16 active paymentv2{{ $item->randId }}">Thanh toán</a>
                                            </li>
                                            <li role="presentation" class="justified__ul_li">
                                                <a href="#infov2{{ $item->randId }}" role="tab" data-toggle="tab" aria-selected="false" class="c-font-16 infov2{{ $item->randId }}">Thông tin tài khoản</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active show tabpaymentv2{{ $item->randId }}" id="paymentv2{{ $item->randId }}">
                                                <p class="c-tab-header-account">Thông tin tài khoản #{{ $item->randId }}</p>
                                                <div class="table-nick-properties">
                                                    <div class="table-nick-items justify-content-between d-flex">
                                                        <div class="table-properties-name">Nhà phát hành</div>
                                                        @php
                                                            $title_nph = '';
                                                            if (isset($item->groups) && count($item->groups)){
                                                                foreach ($item->groups as $t_group){
                                                                    if ($t_group->module == "acc_provider"){
                                                                        $title_nph = $t_group->title;
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        <div class="table-properties-value">
                                                            {{ $title_nph }}
                                                        </div>
                                                    </div>
                                                    <div class="table-nick-items justify-content-between d-flex">
                                                        <div class="table-properties-name">Tên game</div>
                                                        <div class="table-properties-value">
                                                            {{ isset($data->custom->title) ? $data->custom->title :  $data->title }}
                                                        </div>
                                                    </div>
                                                    <div class="table-nick-items justify-content-between d-flex">
                                                        <div class="table-properties-name">Giá tiền</div>
                                                        <div class="table-properties-value">
                                                            @if(isset($data->price))
                                                                {{ str_replace(',','.',number_format($data->price)) }}đ
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="c-account-price-block justify-content-between d-flex">
                                                    <div class="c-account-price-title">Số tiền cần thanh toán</div>
                                                        <div class="c-account-price-value">
                                                            @if(isset($data->category->params->price) && isset($data->category->params))
                                                                {{ str_replace(',','.',number_format($data->category->params->price)) }} đ
                                                            @else
                                                                {{ str_replace(',','.',number_format($data->price)) }} đ
                                                            @endif
                                                        </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade tabinfov2{{ $item->randId }}" id="infov2{{ $item->randId }}">
                                                <p class="c-tab-header-account">Chi tiết tài khoản #{{ $item->randId }}</p>
                                                <div class="table-nick-properties">

                                                    @if(isset($item->groups))
                                                        <?php $att_values = $item->groups ?>
                                                        @foreach($att_values as $att_value)
                                                            @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                                                @if(isset($att_value->parent))
                                                                    <div class="table-nick-items justify-content-between d-flex">
                                                                        <div class="table-properties-name">{{ $att_value->parent->title??null }}</div>
                                                                        <div class="table-properties-value">
                                                                            {{ $att_value->title??null }}
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    @if(isset($item->params) && isset($item->params->ext_info))
                                                        <?php $params = json_decode(json_encode($item->params->ext_info),true) ?>
                                                        @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                                            @foreach($dataAttribute as $index=>$att)
                                                                @if($att->position == 'text')
                                                                    @if(isset($att->childs))
                                                                        @foreach($att->childs as $child)
                                                                            @foreach($params as $key => $param)
                                                                                @if($key == $child->id)
                                                                                    <div class="table-nick-items justify-content-between d-flex">
                                                                                        <div class="table-properties-name">{{ $child->title }}</div>
                                                                                        <div class="table-properties-value">
                                                                                            {{ $param }}
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

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        $(document).ready(function () {
                                            $(document).on('click', '.paymentv2{{ $item->randId }}',function(e){
                                                e.preventDefault();
                                                $('.tabpaymentv2{{ $item->randId }}').addClass('in');
                                                $('.tabpaymentv2{{ $item->randId }}').addClass('active');
                                                $('.tabpaymentv2{{ $item->randId }}').addClass('show');
                                                $('.tabinfov2{{ $item->randId }}').removeClass('show');
                                                $('.tabinfov2{{ $item->randId }}').removeClass('active');
                                                $('.tabinfov2{{ $item->randId }}').removeClass('in');
                                            });
                                            $(document).on('click', '.infov2{{ $item->randId }}',function(e){
                                                e.preventDefault();
                                                $('.tabinfov2{{ $item->randId }}').addClass('in');
                                                $('.tabinfov2{{ $item->randId }}').addClass('active');
                                                $('.tabinfov2{{ $item->randId }}').addClass('show');
                                                $('.tabpaymentv2{{ $item->randId }}').removeClass('show');
                                                $('.tabpaymentv2{{ $item->randId }}').removeClass('active');
                                                $('.tabpaymentv2{{ $item->randId }}').removeClass('in');
                                            });
                                        })
                                    </script>
                                </div>

                                <div class="modal-footer">
                                    @if(App\Library\AuthCustom::check())

                                        @if(App\Library\AuthCustom::user()->balance < $data->price)
                                        <div class="nick-footer-notify">
                                            <p style="color: #DA4343;">Số dư tài khoản không đủ để thanh toán vui lòng nạp tiền để tiếp tục giao dịch</p>
                                        </div>
                                        <div class="d-flex justify-content-center w-100">
                                            <button class="btn-nick btn-ghost" disabled>Thanh toán</button>
                                            <button style="cursor: pointer" class="btn-nick btn-primary" data-toggle="modal" data-target="#recharge_card" data-dismiss="modal">Nạp tiền</button>
                                        </div>
                                        @else
                                            <div class="nick-footer-notify">
                                                <p style="color: #1473CC;">Tài khoản của bạn chưa cấu hình ODP nên chỉ cần click vào nút xác nhận mua để hoàn tất giao dịch</p>
                                            </div>
                                            <button type="submit" class="btn-nick btn-primary loginBox__layma__button__displayabs" style="position: relative">Thanh toán</button>
                                        @endif
                                    @else
                                        <a class="btn-nick btn-primary" href="/login?return_url=/acc/{{ $item->randId }}">Đăng nhập</a>
                                    @endif
                                </div>
                            </form>
                        </div>

                        <style>
                            .tooltipaccount h3 {
                                font-size: 18px;
                                font-weight: 700;
                                color: #666;
                                margin: 16px;
                            }
                            .tooltipaccount a {
                                text-decoration: none;
                                color: #3476CA;
                            }
                            .tooltipaccount a:hover {
                                color: #6CB5F3;
                            }
                            .tooltipaccount{
                                position: absolute;
                                width: 100%;
                                height: auto;
                                left: 100%;
                                top: 40px;
                                z-index: 9;
                                background-color: #FFFFFF!important;
                                border-radius: 6px;
                                box-shadow: 0px 0px 24px rgba(0, 0, 0, 0.4);
                            }
                            .tooltipaccount:before {
                                content: '';
                                position: absolute;
                                left: -14px;
                                top: 28px;
                                border-style: solid;
                                border-width: 10px 14px 10px 0;
                                border-color: rgba(0, 0, 0, 0) #FFFFFF; rgba(0, 0, 0, 0) rgba(0, 0, 0, 0);
                            }
                            .tooltipaccount p {
                                width: 350px;
                                font-size: 16px;
                                color: #a8aab2;
                                font-weight: 400;
                                line-height: 28px;
                                float: left;
                                margin: 0;
                            }
                            .tooltipaccount .bottom {
                                display: -webkit-box;
                                display: -moz-box;
                                display: -ms-flexbox;
                                display: -webkit-flex;
                                display: flex;
                                width: 100%;
                                bottom: 0;
                                position: absolute;
                            }
                            .tooltipaccount .bottom .step {
                                flex: 3;
                                -webkit-flex: 3;
                                -ms-flex: 3;
                                width: 100%;
                                height: 54px;
                                background-color: #373942;
                                border-bottom-left-radius: 6px;
                                display: flex;
                            }
                            .tooltipaccount .bottom .step span {
                                flex: 1;
                                -webkit-flex: 1;
                                -ms-flex: 1;
                                line-height: 54px;
                                color: #fff;
                                margin-left: 25px;
                                font-size: 18px;
                            }
                            .tooltipaccount .bottom .step ul {
                                flex: 2;
                                -webkit-flex: 2;
                                -ms-flex: 2;
                                list-style: none;
                                height: 10px;
                                margin: 23px 0;
                                padding-left: 15px;
                            }
                            .tooltipaccount .bottom .step ul li {
                                position: relative;
                                height: 7px;
                                width: 7px;
                                margin: 0 10px;
                                float: left;
                                border-radius: 50%;
                                background: none;
                                border: 1px solid #535560;
                            }
                            .tooltipaccount .bottom .step ul li:first-child:before {
                                width: 0;
                            }
                            .tooltipaccount .bottom .step ul li:before {
                                content: '';
                                position: absolute;
                                width: 20px;
                                border-top: 1px solid #535560;
                                left: -21px;
                                top: 3px;
                            }
                            .tooltipaccount .bottom .step ul li.true {
                                background-color: #7a7d86;
                            }
                            .tooltipaccount .bottom .step ul li.active {
                                background-color: #fff;
                                box-shadow: 0 0 6px rgba(255, 255, 255, 0.78);
                            }
                            .tooltipaccount .close {
                                cursor: pointer;
                            }
                            .close_position{
                                font-size: 16px!important;
                                position: absolute;
                                top: 16px;
                                right: 16px;
                            }
                            .tooltipaccount .btn {
                                flex: 1;
                                background-color: #6cb5f3;
                                border: 0;
                                margin: 0;
                                padding: 0;
                                text-transform: uppercase;
                                color: #fff;
                                font-weight: bold;
                                border-bottom-right-radius: 6px;
                                cursor: pointer;
                                transition: all 0.3s;
                            }
                            .tooltipaccount .btn:hover {
                                background-color: #6BA5D6;
                                transition: all 0.3s;
                            }
                            .tooltipaccount .btn:active {
                                background-color: #5F8AAF;
                            }
                            .tooltipaccount .slider-container {
                                width: 100%;
                                padding-bottom: 16px;
                                overflow: hidden;
                            }
                        </style>

                    @else
                        {{--                    Nick thường--}}

                        <div class="col-6 fixcssacount col-sm-6 col-lg-3">
                            <div class="item_buy_list_in">
                                <div class="item_buy_list_img item_buy_list_img_custom">
                                    <a href="/acc/{{ $item->randId }}">
                                        @if(isset($item->image))

                                            <img class="item_buy_list_img-main" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->randId }}">
                                        @else
                                            {{--                                            <img class="item_buy_list_img-main" data-original="https://shopas.net/storage/images/CGuYto7yjj_1645585924.jpg" alt="{{ $item->title }}">--}}
                                        @endif

                                        <span>MS: {{ $item->randId }}</span>
                                    </a>
                                </div>
                                @php
                                    $checkindex = 0;
                                @endphp
                                @if(isset($item->params) && isset($item->params->ext_info))
                                    <?php
                                    $params = json_decode(json_encode($item->params->ext_info),true);
                                    ?>
                                    @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                        @foreach($dataAttribute as $index=>$att)
                                            @if($att->position == 'text')
                                                @if(isset($att->childs))
                                                    @foreach($att->childs as $child)

                                                        @if($child->slug == "noi-bat")

                                                            @foreach($params as $key => $param)
                                                                @if($key == $child->id && $child->is_slug_override == null)
                                                                    @php
                                                                        $checkindex = 1;
                                                                    @endphp
                                                                    <div class="item_buy_list_description">
                                                                        {{ isset($param) ? \Str::limit($param,25) : null }}
                                                                    </div>

                                                                @endif
                                                            @endforeach
                                                        @else

                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @else

                                @endif
                                @if($checkindex == 0)
                                    <div class="item_buy_list_description">
                                        bảo hành 100%,lỗi hoàn tiền
                                    </div>
                                @endif

                                <div class="item_buy_list_info item_buy_list_info_custom">
                                    <div class="row item_buy_list_info__row">
                                        <?php
                                        $total = 0;
                                        ?>

                                        @if(isset($item->groups))
                                            <?php
                                            $att_values = $item->groups;
                                            ?>

                                            {{--                                            @dd($att_values)--}}
                                            @foreach($att_values as $att_value)
                                                {{--            @dd($att_value)--}}
                                                @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                                    {{--                                                        @dd($att_value->parent)--}}
                                                    @if(isset($att_value->parent))
                                                        @if($total < 4)
                                                            <?php
                                                            $total = $total + 1;
                                                            ?>
                                                            <div class="row" style="margin: 0 auto;width: 100%">
                                                                <div class="col-auto text-left fixcssacount item_buy_list_info_inacc"">
                                                                    {{ $att_value->parent->title??null }} :
                                                                </div>
                                                                <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                                    {{--                                                                    {{ $att_value->title??null }}--}}
                                                                    {{ isset($att_value->title)? \Str::limit($att_value->title,16) : null }}
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                        @if(isset($item->params))
                                            @if($data->slug == "nick-lien-minh")
                                                @if(isset($item->params->rank_info))

                                                    @foreach($item->params->rank_info as $rank_info)
                                                        @if($rank_info->queueType == "RANKED_TFT")
                                                        @elseif($rank_info->queueType == "RANKED_SOLO_5x5")
                                                            <?php
                                                            $total = $total + 1;
                                                            ?>
                                                            <div class="row" style="margin: 0 auto;width: 100%">
                                                                <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                                    Rank :
                                                                </div>
                                                                <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                                    {{--                                                                                        {{ $param??null }}--}}
                                                                    @if($rank_info->tier == "NONE")
                                                                        CHƯA CÓ RANK
                                                                    @else
                                                                        {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if(isset($item->params->rank_level))
                                                @endif
                                                @if(isset($item->params->count))
                                                    @if(isset($item->params->count->champions))
                                                        <?php
                                                        $total = $total + 1;
                                                        ?>
                                                        <div class="row" style="margin: 0 auto;width: 100%">
                                                            <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                                Số tướng :
                                                            </div>
                                                            <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                                {{--                                                                                        {{ $param??null }}--}}
                                                                {{ $item->params->count->champions }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if(isset($item->params->count->skins))
                                                        <?php
                                                        $total = $total + 1;
                                                        ?>
                                                        <div class="row" style="margin: 0 auto;width: 100%">
                                                            <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                                Trang phục :
                                                            </div>
                                                            <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                                {{--                                                                                        {{ $param??null }}--}}
                                                                {{ $item->params->count->skins }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            @elseif($data->slug == "nick-ninja-school")

                                                @php
                                                    $server = null;
                                                    $info = array();

                                                    $params = $item->params;
                                                    if (isset($params->server)){
                                                        $server = $params->server;
                                                    }
                                                    if (isset($params->info) && count($params->info)){
                                                        $info = $params->info;
                                                    }
                                                @endphp
                                                @if(isset($server))
                                                    <div class="row" style="margin: 0 auto;width: 100%">
                                                        <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                            Server :
                                                        </div>
                                                        <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                            {{--                                                                                        {{ $param??null }}--}}
                                                            {{ $server??'' }}
                                                        </div>
                                                    </div>

                                                @endif

                                                @if(isset($info) && count($info))
                                                    @foreach($info as $ke => $in)
                                                        @if(in_array($in->name,config('module.acc.auto_ninja_list_tt')))
                                                            @if($in->name == 'Yên')
                                                                <div class="row" style="margin: 0 auto;width: 100%">
                                                                    <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                                        {{ $in->name??'' }} :
                                                                    </div>
                                                                    <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                                        {{--                                                                                        {{ $param??null }}--}}
                                                                        {{ str_replace(',','.',number_format($in->value??'')) }}
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="row" style="margin: 0 auto;width: 100%">
                                                                    <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                                        {{ $in->name??'' }} :
                                                                    </div>
                                                                    <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                                        {{--                                                                                        {{ $param??null }}--}}
                                                                        {{ $in->value??'' }}
                                                                    </div>
                                                                </div>
                                                            @endif

                                                        @endif
                                                    @endforeach
                                                @endif
                                            @elseif($data->slug == "nick-ngoc-rong-online")

                                                @php
                                                    $server = null;
                                                    $info = array();

                                                    $params = $item->params;
                                                    if (isset($params->server)){
                                                        $server = $params->server;
                                                    }
                                                    if (isset($params->info) && count($params->info)){
                                                        $info = $params->info;
                                                    }
                                                @endphp
                                                @if(isset($server))
                                                    <?php
                                                    $total++;
                                                    ?>
                                                    <div class="row" style="margin: 0 auto;width: 100%">
                                                        <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                            Server :
                                                        </div>
                                                        <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                            {{--                                                                                        {{ $param??null }}--}}
                                                            {{ $server??'' }}
                                                        </div>
                                                    </div>

                                                @endif

                                                @if(isset($info) && count($info))
                                                    @foreach($info as $ke => $in)
                                                        @if(in_array($in->name,config('module.acc.auto_nro_list_tt')))

                                                            @if($total < 5)
                                                                @if($in->name == 'Skill Pet' || $in->name == 'Cải trang')
                                                                    @if($in->name == 'Skill Pet')
                                                                    @elseif($in->name == 'Cải trang')
                                                                        <?php

                                                                        $total = $total + 1;
                                                                        ?>
                                                                        <div class="row" style="margin: 0 auto;width: 100%">
                                                                            <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                                                {{ $in->name??'' }} :
                                                                            </div>
                                                                            <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                                                @if(isset($in->value) && count($in->value) )
                                                                                    {{ count($in->value) }}
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    @endif

                                                                @elseif($in->name == 'Hành tinh' || $in->name == 'Bông tai' )
                                                                    <?php

                                                                    $total = $total + 1;
                                                                    ?>
                                                                    <div class="row" style="margin: 0 auto;width: 100%">
                                                                        <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                                            {{ $in->name??'' }} :
                                                                        </div>
                                                                        <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">

                                                                            {{ $param??null }}
                                                                            {{ $in->value }}

                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif

                                            @endif
                                        @endif

                                        @if(isset($item->params) && isset($item->params->ext_info))
                                            <?php
                                            $params = json_decode(json_encode($item->params->ext_info),true);
                                            ?>
                                            @if($total < 4)
                                                @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                                    @foreach($dataAttribute as $index=>$att)
                                                        @if($att->position == 'text')
                                                            @if(isset($att->childs))
                                                                @foreach($att->childs as $child)
                                                                    @foreach($params as $key => $param)
                                                                        @if($key == $child->id && $child->is_slug_override == null)
                                                                            @if($total < 4)
                                                                                <?php
                                                                                $total = $total + 1;
                                                                                ?>
                                                                                <div class="row" style="margin: 0 auto;width: 100%">
                                                                                    <div class="col-auto text-left fixcssacount item_buy_list_info_inacc">
                                                                                        {{ $child->title??null }} :
                                                                                    </div>
                                                                                    <div class="col-auto text-right fixcssacount item_buy_list_info_inaccright" style="color: #666;font-weight: 600;margin-left: auto">
                                                                                        {{--                                                                                        {{ $param??null }}--}}
                                                                                        {{ isset($param) ? \Str::limit($param,16) : null }}
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="item_buy_list_more">
                                    <div class="row">
                                        <div class="col-12 fixcssacount">
                                            <div class="item_buy_list_price text-limit limit-1">
                                                <span>{{ str_replace(',','.',number_format($item->price_old)) }}đ </span>
                                                {{ str_replace(',','.',number_format($item->price)) }}đ
                                                {{--                                                {{ formatPrice($item->price) }}đ--}}
                                            </div>
                                        </div>
                                        <a href="/acc/{{ $item->randId }}" class="col-12 fixcssacount">
                                            <div class="item_buy_list_view">
                                                Chi tiết
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    @else
    @endif
    <div class="col-md-12 left-right justify-content-end paginate__v1 paginate__v1_mobie frontend__panigate">
        @if(isset($items))
            @if($items->total()>1)
                <div class="row marinautooo paginate__history paginate__history__fix justify-content-center">
                    <div class="col-auto paginate__category__col">
                        <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                            {{ $items->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endif
