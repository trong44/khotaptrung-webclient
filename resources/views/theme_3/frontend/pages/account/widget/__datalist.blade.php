@if(empty($data->data))
    <div class="col-md-12 left-right">
        <div class="row marginauto body-detail-ct">
            @if(isset($items) && count($items) > 0)

                <div class="col-md-12 text-left left-right">
                    <div class="row body-detail-row-ct">

                        @foreach ($items as $item)

                            @if($item->status == 1)
                                @if($data->display_type == 2)
                                    <div class="col-auto body-detail-nick-col-ct">
                                        <a href="javascript:void(0)" class="list-item-nick-hover buy-random-acc" data-id="{{ $item->randId }}">
                                            <div class="row marginauto list-item-nick-hover-row">
                                                <div class="col-md-12 left-right default-overlay-nick-ct nick-item-cover-overlay">
                                                    @if(isset($data->params->thumb_default) && isset($data->params))
                                                        <img onerror="imgError(this)" class="img-list-nick-category lazy" src="{{\App\Library\MediaHelpers::media($data->params->thumb_default)}}" alt="{{ $item->randId }}" >
                                                    @else
                                                        @if(isset($data->image))
                                                            <img onerror="imgError(this)" class="img-list-nick-category lazy" src="{{\App\Library\MediaHelpers::media($data->image)}}" alt="{{ $item->randId }}">
                                                        @else
                                                            <img onerror="imgError(this)" class="img-list-nick-category lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/no-image.png" alt="No-image">
                                                        @endif
                                                    @endif
                                                </div>

                                                <div class="col-md-12 left-right list-item-nick " >
                                                    <div class="row marginauto list-item-nick-body ">
                                                        <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                            <span>ID: {{ $item->randId }}</span>
                                                        </div>

                                                        <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                            <ul>
                                                                @if(isset($data->price))
                                                                    <li class="fist-li-account">{{ str_replace(',','.',number_format($data->price)) }}đ</li>
                                                                    <li class="second-li-account">{{ str_replace(',','.',number_format($data->price_old??$data->price)) }}đ</li>
                                                                    @php
                                                                        if (isset($data->price_old)) {
                                                                            $sale_percent = (($data->price_old - $data->price) / $data->price_old) * 100;
                                                                            $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                                                        } else {
                                                                            $sale_percent = 0;
                                                                        }
                                                                    @endphp
                                                                    @if($sale_percent > 0)
                                                                        <li class="three-li-account">-{{$sale_percent}}%</li>
                                                                    @endif
                                                                @endif
                                                            </ul>
                                                        </div>

                                                        <button class="button-secondary list-item-nick-button buy-random-acc" data-id="{{ $item->randId }}">Mua ngay</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="formDonhangAccount{{ $item->randId }}" style="display: none">
                                        @if(App\Library\AuthCustom::check() && App\Library\AuthCustom::user()->balance >= $data->price)
                                        <form class="formDonhangAccount" data-ranid="{{ $item->randId }}" action="/ajax/acc/{{ $item->randId }}/databuy" method="POST">
                                        @else
                                        <form class="formDonhangAccount">
                                        @endif
                                            {{ csrf_field() }}
                                            <div class="modal-header p-0" style="border-bottom: 0">
                                                <div class="row marginauto modal-header-order-ct">
                                                    <div class="col-12 span__donhang text-center" style="position: relative">
                                                        <span>Xác nhận thanh toán</span>
                                                        <img class="lazy img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-body modal-body-order-ct">
                                                <div class="row marginauto">

                                                    <div class="col-md-12 left-right title-order-ct">
                                                        <span>Thông tin acc</span>
                                                    </div>

                                                    <div class="col-md-12 left-right padding-order-ct">
                                                        <div class="row marginauto">
                                                            <div class="col-md-12 left-right background-order-ct">
                                                                <div class="row marginauto background-order-body-row-ct">
                                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                                        <span>Nhà phát hành</span>
                                                                    </div>
                                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                                        <small>{{ $item->groups[0]->title }}</small>
                                                                    </div>
                                                                </div>

                                                                <div class="row marginauto background-order-body-row-ct">
                                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                                        <span>Tên game</span>
                                                                    </div>
                                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                                        <small>{{ isset($data->custom->title) ? $data->custom->title :  $data->title }}</small>
                                                                    </div>
                                                                </div>

                                                                <div class="row marginauto background-order-body-row-ct">
                                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                                        <span>Giá tiền</span>
                                                                    </div>
                                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                                        <small>
                                                                            @if(isset($data->price))
                                                                                {{ str_replace(',','.',number_format($data->price)) }}đ
                                                                            @endif
                                                                        </small>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 left-right padding-order-ct">
                                                        <div class="row marginauto">
                                                            <div class="col-md-12 left-right background-order-ct">

                                                                @if(isset($item->groups))
                                                                    <?php $att_values = $item->groups ?>
                                                                    @foreach($att_values as $att_value)
                                                                        @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                                                            @if(isset($att_value->parent))
                                                                                <div class="row marginauto background-order-body-row-ct">
                                                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                                                        <span>{{ $att_value->parent->title??null }}</span>
                                                                                    </div>
                                                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                                                        <small>{{ $att_value->title??null }}</small>
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
                                                                                                <div class="row marginauto background-order-body-row-ct">
                                                                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                                                                        <span>{{ $child->title }}</span>
                                                                                                    </div>
                                                                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                                                                        <small>{{ $param }}</small>
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

                                                    <div class="col-md-12 left-right padding-order-ct">
                                                        <div class="row marginauto">
                                                            <div class="col-md-12 left-right background-order-ct">
                                                                <div class="row marginauto background-order-body-row-ct">
                                                                    <div class="col-auto left-right background-order-col-left-ct">
                                                                        <span>Phương thức thanh toán</span>
                                                                    </div>
                                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                                        <small>Tài khoản Shopbrand</small>
                                                                    </div>
                                                                </div>
                                                                @if(App\Library\AuthCustom::check())
                                                                    <div class="row marginauto background-order-body-row-ct">
                                                                        <div class="col-auto left-right background-order-col-left-ct">
                                                                            <span>Số dư tài khoản</span>
                                                                        </div>
                                                                        <div class="col-auto left-right background-order-col-right-ct">
                                                                            <small>{{ str_replace(',','.',number_format(round(\App\Library\AuthCustom::user()->balance))) }} đ</small>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <div class="row marginauto background-order-body-row-ct">
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
                                                                        <span>Tổng thanh toán</span>
                                                                    </div>
                                                                    <div class="col-auto left-right background-order-col-right-ct">
                                                                        <span>
                                                                            @if(isset($data->price))
                                                                                {{ str_replace(',','.',number_format($data->price)) }}đ
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if(App\Library\AuthCustom::check() && App\Library\AuthCustom::user()->balance < $data->price)
                                                        <div class="col-md-12 left-right padding-order-ct">
                                                            <div class="row marginauto">
                                                                <div class="col-md-12 left-right background-order-ct">
                                                                    <div class="row marginauto background-order-row-ct">
                                                                        <p class="card--attr__payment_failed">Tài khoản của bạn không đủ để thanh toán, vui lòng nạp tiền để tiếp tục giao dịch</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="col-md-12 left-right padding-order-footer-ct">
                                                        <div class="row marginauto">
                                                            <div class="col-md-12 left-right">
                                                                @if(App\Library\AuthCustom::check())

                                                                    @if(App\Library\AuthCustom::user()->balance >= $data->price)
                                                                        <button class="button-default-ct button-next-step-two" type="submit">Thanh toán</button>
                                                                    @else
                                                                        <div class="row marginauto justify-content-center">
                                                                            <div class="col-6 modal-footer-success-col-left-ct">
                                                                                <button type="button" class="button-success-secondary" disabled>
                                                                                    <a href="javascript:void(0);">Thanh toán</a>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-6 modal-footer-success-col-right-ct">
                                                                                <button type="button" class="button-success-primary btn-open-recharge" data-tab="1" data-dismiss="modal">
                                                                                    <a href="javascript:void(0);">Nạp tiền</a>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    <button class="button-default-ct" data-dismiss="modal" type="button" onclick="openLoginModal();">Đăng nhập</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @else
                                    <div class="col-auto body-detail-nick-col-ct">
                                        <a href="/acc/{{ $item->randId }}" class="list-item-nick-hover">
                                            <div class="row marginauto list-item-nick-hover-row">
                                                <div class="col-md-12 left-right default-overlay-nick-ct nick-item-cover-overlay">
                                                    @if(isset($item->image))
                                                        <img onerror="imgError(this)" class="img-list-nick-category lazy" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="{{ $item->randId }}">
                                                    @else
                                                        <img onerror="imgError(this)" class="img-list-nick-category lazy" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/no-image.png" alt="No-image">
                                                    @endif
                                                </div>
                                                <div class="col-md-12 left-right list-item-nick">
                                                    <div class="row marginauto list-item-nick-body">
                                                        {{--<div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                            <span>{{ $item->title }}</span>
                                                        </div>--}}
                                                        <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                            <span>ID: {{ $item->randId }}</span>
                                                        </div>
                                                        <?php
                                                        $total = 0;
                                                        ?>
                                                        @if(isset($item->groups))
                                                            <?php
                                                                $att_values = $item->groups;
                                                            ?>
                                                            @foreach($att_values as $att_value)
                                                                @if($att_value->module == 'acc_label' && $att_value->is_slug_override == null)
                                                                    @if(isset($att_value->parent))
                                                                        @if($total < 4)
                                                                            <?php
                                                                                $total = $total + 1;
                                                                            ?>

                                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                                <small>{{ $att_value->parent->title??null }}: {{ isset($att_value->title)? \Str::limit($att_value->title,16) : null }}</small>
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
                                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                                <small>
                                                                                    Rank :
                                                                                    @if($rank_info->tier == "NONE")
                                                                                        CHƯA CÓ RANK
                                                                                    @else
                                                                                        {{ config('module.acc.auto_lm_rank.'.$rank_info->tier ) }} - {{ $rank_info->division }}
                                                                                    @endif
                                                                                </small>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                @endif

                                                                @if(isset($item->params->count))
                                                                    @if(isset($item->params->count->champions))
                                                                        <?php
                                                                        $total = $total + 1;
                                                                        ?>
                                                                        <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                            <small>
                                                                                Số tướng :
                                                                                {{ $item->params->count->champions }}
                                                                            </small>
                                                                        </div>


                                                                    @endif
                                                                    @if(isset($item->params->count->skins))
                                                                        <?php
                                                                        $total = $total + 1;
                                                                        ?>
                                                                        <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                            <small>
                                                                                Trang phục :
                                                                                {{ $item->params->count->skins }}
                                                                            </small>
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
                                                                    <?php
                                                                    $total = $total + 1;
                                                                    ?>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>
                                                                            Server :
                                                                            {{ $server??'' }}
                                                                        </small>
                                                                    </div>

                                                                @endif

                                                                @if(isset($info) && count($info))
                                                                    @foreach($info as $ke => $in)
                                                                        @if(in_array($in->name,config('module.acc.auto_ninja_list_tt')))
                                                                            @if($in->name == 'Yên')
                                                                                <?php
                                                                                $total = $total + 1;
                                                                                ?>
                                                                                <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                                    <small>
                                                                                        {{ $in->name??'' }} : 
                                                                                        {{ str_replace(',','.',number_format($in->value??'')) }}
                                                                                    </small>
                                                                                </div>
                                                                            @else
                                                                                <?php
                                                                                $total = $total + 1;
                                                                                ?>
                                                                                <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                                    <small>
                                                                                        {{ $in->name??'' }} : 
                                                                                        {{ $in->value??'' }}
                                                                                    </small>
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
                                                                    $total = $total + 1;
                                                                    ?>
                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                        <small>
                                                                            Server :
                                                                            {{ $server??'' }}
                                                                        </small>
                                                                    </div>

                                                                @endif

                                                                @if(isset($info) && count($info))
                                                                    @foreach($info as $ke => $in)
                                                                        @if(in_array($in->name,config('module.acc.auto_nro_list_tt')))
                                                                            @if($total < 4)
                                                                                @if($in->name == 'Skill Pet' || $in->name == 'Cải trang')
                                                                                    @if($in->name == 'Skill Pet')
                                                                                    @elseif($in->name == 'Cải trang')
                                                                                        <?php
                                                                                        $total = $total + 1;
                                                                                        ?>
                                                                                        <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                                            <small>
                                                                                                {{ $in->name??'' }} :
                                                                                                @if(isset($in->value) && count($in->value) )
                                                                                                    {{ count($in->value) }}
                                                                                                @endif
                                                                                            </small>
                                                                                        </div>
                                                                                    @endif

                                                                                @elseif($in->name == 'Hành tinh' || $in->name == 'Bông tai' )
                                                                                    <?php
                                                                                    $total = $total + 1;
                                                                                    ?>
                                                                                    <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                                        <small>
                                                                                            {{ $in->name??'' }} :
                                                                                            {{ $param??null }}
                                                                                            {{ $in->value }}
                                                                                        </small>
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

                                                                                                <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                                                    <small>{{ $child->title??null }}: {{ isset($param) ? \Str::limit($param,16) : null }}</small>
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

                                                        @if ($total < 4)
                                                            @for ($i = 0; $i < 4 - $total; $i++)
                                                                <div class="col-md-12 left-right text-left body-detail-account-small-span-ct"></div>
                                                            @endfor
                                                        @endif
                                                        <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                            <ul>
                                                                @if(isset($data->params) && isset($data->params->price))
                                                                    <li class="fist-li-account">{{ str_replace(',','.',number_format($data->params->price)) }}đ</li>
                                                                    <li class="second-li-account">{{ str_replace(',','.',number_format($data->params->price_old??$data->params->price)) }}đ</li>
                                                                    @php
                                                                        if (isset($data->params->price_old)) {
                                                                            $sale_percent = (($data->params->price_old - $data->params->price) / $data->params->price_old) * 100;
                                                                            $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                                                        } else {
                                                                            $sale_percent = 0;
                                                                        }
                                                                    @endphp
                                                                    @if($sale_percent > 0)
                                                                    <li class="three-li-account">-{{$sale_percent}}%</li>
                                                                    @endif
                                                                @else
                                                                    <li class="fist-li-account">{{ str_replace(',','.',number_format($item->price)) }}đ</li>
                                                                    <li class="second-li-account">{{ str_replace(',','.',number_format($item->price_old??$item->price)) }}đ</li>
                                                                    @php
                                                                        if (isset($item->price_old)) {
                                                                            $sale_percent = (($item->price_old - $item->price) / $item->price_old) * 100;
                                                                            $sale_percent = round($sale_percent, 0, PHP_ROUND_HALF_UP);
                                                                        } else {
                                                                            $sale_percent = 0;
                                                                        }
                                                                    @endphp
                                                                    @if($sale_percent > 0)
                                                                        <li class="three-li-account">-{{$sale_percent}}%</li>
                                                                    @endif
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif

                            @endif

                        @endforeach

                    </div>
                </div>
            @else
            @endif

            <div class="col-md-12 left-right justify-content-end default-paginate">
                @if(isset($items))
                    @if($items->total()>1)

                        <div class="row marinautooo justify-content-center">
                            <div class="col-auto">
                                <div class="data_paginate paginate__v1 paging_bootstrap paginations_custom" style="text-align: center">
                                    {{ $items->appends(request()->query())->links('pagination::bootstrap-default-4') }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>

        </div>
    </div>
@endif
