@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <div class="site-content-body bg-white first last p-0">
        <div class="block-profile">
            @include('frontend.widget.__menu_profile')
            <div class="block-content p-3">
                <div class=" mb-4">
                    <div class="" id="history" style="min-height: 628px;">

                        <h4 class="title-style-left mb-3">Tài khoản đã mua</h4>

                        <form class="form-charge form-charge__accountls account_content_transaction_history__v2">
                            <div class="row">
                                <div class="col-6 col-lg-4">
                                    <div class="form-label">Mã tài khoản</div>
                                    <input type="text" name="serial" class="form-control serial" placeholder="Mã tài khoản">
                                </div>

                                <div class="col-6 col-lg-4">
                                    <div class="form-label">Trạng thái</div>
                                    {{Form::select('status',array(''=>'Chọn trạng thái')+config('module.acc.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'form-control status'))}}
                                </div>
                                <div class="c-mt-lg-16 col-6 col-lg-4 d-flex flex-column justify-content-end">
                                    <div class="position-relative">
                                        <input type="text" name="started_at" class="date-left started_at" placeholder="Từ ngày">
                                    </div>
                                </div>
                                <div class="c-mt-lg-16 col-6 col-lg-4 d-flex flex-column justify-content-end">
                                    <div class="position-relative">
                                        <input type="text" name="ended_at" class="date-left ended_at" placeholder="Đến ngày">
                                    </div>
                                </div>

                                <div class="c-mt-lg-16 col-6 col-lg-4">
                                    <div class="form-label">Giá tiền</div>
                                    {{Form::select('price',array(''=>'-- Chọn giá tiền --')+config('module.acc.price'),old('price', isset($data['price']) ? $data['price'] : null),array('class'=>'form-control price'))}}
                                </div>

                                <div class="c-mt-lg-16 col-6 col-lg-4" id="datahtmlcategory">
                                    @if(isset($datacategory) && count($datacategory) > 0)
                                        <div class="form-label">Game</div>
                                        <select name="key" class="form-control key">
                                            <option value="">--Tất cả game--</option>
                                            @foreach($datacategory as $val)
                                                <option value="{{ $val->slug }}">{{ $val->title }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>

                            <div class="row c-mt-16">
                                <div class="col-12 item_buy_form_search">
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn primary btn_timkiem" style="position: relative">
                                                Tìm kiếm
                                            </button>
                                            <a href="javascript:void(0)" class="btn pink btn-all" style="position: relative">
                                                Tất cả
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div id="data_lich__su_history" class="c-mt-16">
                            <div class="text-center ajax-loading-store load_spinner" >
                                <div class="cv-spinner">
                                    <span class="spinner"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="serial_data" class="serial_data" value="">
    <input type="hidden" name="key_data" class="key_data" value="">
    <input type="hidden" name="price_data" class="price_data" value="">
    <input type="hidden" name="status_data" class="status_data" value="">
    <input type="hidden" name="started_at_data" class="started_at_data" value="">
    <input type="hidden" name="ended_at_data" class="ended_at_data" value="">
    <input type="hidden" name="id_data" class="id_data" value="">


@endsection

@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/account-history.js"></script>
@endsection


