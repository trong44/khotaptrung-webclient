{{--{{Form::open(array('method'=>'POST' ,'class'=>'form-horizontal','enctype'=>"multipart/form-data"))}}--}}
<form class="formDonhangAccount" action="/acc/{{ $data->randId }}/databuy" method="POST">
    {{ csrf_field() }}
    <div class="modal-header">
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
                    <a href="#info2" role="tab" data-toggle="tab" aria-selected="false" class="c-font-16">Tài khoản</a>
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
                                <tr>
                                    <td>Nhà phát hành:</td>
                                    <th>{{ $data->groups[0]->title }}</th>
                                </tr>
                                <tr>
                                    <td>Tên game:</td>
                                    {{--                                    @dd($data_category)--}}
                                    <th>{{ isset($data_category->custom->title) ? $data_category->custom->title :  $data_category->title }}</th>
                                </tr>
                                <tr>
                                    <td>Giá tiền:</td>
                                    <th class="text-info">
                                        @if(isset($data_category->params->price) && isset($data_category->params))
                                            {{ str_replace(',','.',number_format($data_category->params->price)) }} đ
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
                                            @if(isset($att_value->parent[0]))
                                                <tr>
                                                    <td style="width:50%">{{ $att_value->parent[0]->title??null }}:</td>
                                                    <td class="text-danger" style="font-weight: 700">{{ $att_value->title??null }}</td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                                @if(isset($data->params) && isset($data->params->ext_info))
                                    <?php $params = json_decode(json_encode($data->params->ext_info),true) ?>
                                    @if(!is_null($dataAttribute) && count($dataAttribute)>0)
                                        @foreach($dataAttribute as $index=>$att)
                                            @if($att->position == 'text')
                                                @if(isset($att->childs))
                                                    @foreach($att->childs as $child)
                                                        @foreach($params as $key => $param)
                                                            @if($key == $child->id)
                                                                <tr>
                                                                    <td style="width:50%">{{ $child->title }}:</td>
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

        <div class="form-group form-group_buyacc form__data__buyacc">
{{--            @if(App\Library\AuthCustom::check())--}}

{{--                @if(isset($balance))--}}
{{--                    @if($balance < $data->price)--}}
{{--                        <div class="col-md-12"><label class="form-control-label text-danger" style="text-align: center;margin: 10px 0; ">Bạn không đủ số dư để mua tài khoản này. Bạn hãy click vào nút nạp thẻ để nạp thêm và mua tài khoản.</label></div>--}}
{{--                    @else--}}
{{--                        <div class="col-md-12"><label class="form-control-label" style="text-align: center;margin: 10px 0; ">Tài khoản của bạn chưa cấu hình bảo mật ODP nên chỉ cần click vào nút xác nhận mua để hoàn tất giao dịch</label></div>--}}
{{--                    @endif--}}
{{--                @endif--}}

{{--            @else--}}
{{--                <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">Bạn phải đăng nhập mới có thể mua tài khoản tự động.</label>--}}
{{--            @endif--}}

        </div>

        <div style="clear: both"></div>
    </div>

    <div class="modal-footer data__modal__buyacc">

                @if(App\Library\AuthCustom::check())

                    @if(isset($balance))
                        @if($balance < $data->price)
                                        <button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold"  id="d3" style="">Xác nhận mua</button>
                            <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold gallery__bottom__span_bg__2" href="/nap-the" id="d3">Nạp thẻ cào</a>
                            <a class="btn c-bg-green-4 c-font-white c-btn-square c-btn-uppercase c-btn-bold load-modal gallery__bottom__span_bg__2" style="color: #FFFFFF" data-dismiss="modal" rel="/atm" data-dismiss="modal">Nạp từ ATM - Ví điện tử</a>
                        @else
                            <button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold loginBox__layma__button__displayabs"  id="d3" style="position: relative">Xác nhận mua<div class="row justify-content-center loading-data__muangay"></div></button>
                        @endif
                    @endif
                @else
                    <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login?return_url=/acc/{{ $data->randId }}">Đăng nhập</a>
                @endif

                <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

    </div>
</form>
{{--{{ Form::close() }}--}}

<style>

    .c-content-tab-4.c-opt-3 > .nav > li > a {
        color: #ffffff;
        background-color: #d5e0ea;
    }
    .c-content-tab-4.c-opt-3 > .nav > li > a.active {
        color: #ffffff;
        background-color: #5bc2ce!important;
    }
    .c-content-tab-4 ul{
        padding-left: 0!important;
    }
    .c-content-tab-4 ul li{
        list-style: none!important;
    }

    .justified__ul_li{
        width: 50% !important;
        text-align: center!important;

    }

    .justified__ul_li a{
        display: flex!important;
        justify-content: center;
        padding: 20px;
    }
    .justified__ul_li a:hover{
        text-decoration: none!important;
    }
    .c-content-tab-4.c-opt-3 > .nav > li > a {
        color: #ffffff;
        background-color: #d5e0ea;
    }
</style>

<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal= $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/{{theme('')->theme_key}}/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>


