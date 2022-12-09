@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <div class="background-history">
        <div class="container c-container-side c-mb-24 c-mb-lg-0" >
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/lich-su-mua-account" class="breadcrumb-link">Tài khoản đã mua</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/profile" class="link-back"></a>

                <h1 class="head-title text-title">Tài khoản đã mua</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>
                <div class="c-ml-16 c-ml-lg-0 c-history-right">
                    <div class="c-history-right-body brs-12 brs-lg-0 c-p-16">
                        <div class="c-history-title c-pb-16 c-pb-lg-12 media-web">
                            <h3 class="fw-700 fz-20 fz-lg-16 lh-28 lh-lg-20 mb-0">Tài khoản đã mua</h3>
                            <span class="reload-page" onclick="window.location.reload()"><i class="fas fa-redo"></i>Làm mới</span>
                        </div>
                        <div class="justify-content-between align-items-center c-pt-16 c-pb-16 c-mb-12 d-none d-lg-flex">
                            <form action="" class="form-search history">
                                <input type="search" placeholder="Tìm kiếm" name="serial" class=" has-submit">
                                <button type="submit"></button>
                            </form>
                            <div class="value-filter">
                                <div class="show-modal-filter noselect" data-toggle="modal" data-target="#modal-filter">Bộ lọc</div>
                            </div>
                        </div>
                        <div class="tags d-none d-lg-flex justify-content-end" id="params-filter">
                            {{--                        <div class="tag">Mã số</div>--}}
                            {{--                        <div class="tag">Trạng thái</div>--}}
                            {{--                        <div class="tag">Rank</div>--}}
                        </div>
                        <div class="justify-content-between align-items-center c-pt-lg-16 c-pb-16 c-mb-16 d-flex d-lg-none">
                            <form action="" class="form-search history">
                                <input type="search" placeholder="Tìm kiếm" name="serial" class="search">
                                <button type="submit"></button>
                            </form>
                            <div class="value-filter c-ml-16">
                                <button type="button" class="filter-history open-sheet" data-target="#sheet-filter" data-notify="0"></button>
                            </div>
                        </div>
                        <div class="mr-n1 pb-3 is-load">
                            <div class="loading-wrap">
                                <span class="modal-loader-spin"></span>
                            </div>
                            <div class="history-content c-pt-16 mr-n2">

                            </div>
                        </div>

                        <!-- Sheet Filter Mobile -->
                        <div class="bottom-sheet" id="sheet-filter" aria-hidden="true" data-height="60">
                            <div class="layer"></div>
                            <div class="content-bottom-sheet bar-slide">
                                <form action="" class="form-filter">
                                    <div class="sheet-header">
                                        <p class="text-title center">
                                            Bộ lọc
                                        </p>
                                        <label class="close"></label>
                                    </div>
                                    <div class="sheet-body overflow-visible">
                                        <!-- body -->
                                        @if(isset($datacategory) && count($datacategory) > 0)
                                        <div class="input-group">
                                            <span class="form-label">
                                                Game
                                            </span>
                                            <select class="game key" name="key">
                                                <option value="">Chọn</option>
                                                @foreach($datacategory as $val)
                                                    <option value="{{ $val->slug }}">{{ $val->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                        <div class="input-group">
                                            <span class="form-label">
                                                Trạng thái
                                            </span>
                                            {{Form::select('status',array(''=>'Chọn')+config('module.acc.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'status'))}}

                                        </div>

                                        <div class="input-group">
                                            <span class="form-label">
                                                Số tiền
                                            </span>
                                            {{Form::select('status',array(''=>'Chọn')+config('module.acc.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'status'))}}

                                        </div>

                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="form-label">
                                                            Từ ngày
                                                        </span>
                                                        <input type="text" name="started_at" class="date-right started_at" placeholder="Chọn">
                                                    </div>
                                                </td>
                                                <td class="c-px-6 d-block"></td>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="form-label">
                                                            Đến ngày
                                                        </span>
                                                        <input type="text" name="ended_at" class="date-right ended_at" placeholder="Chọn">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="sheet-footer">
                                        <button class="btn secondary js-reset-form">Thiết lập lại</button>
                                        <button class="btn primary js-submit-form">Xem kết quả</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal Filter -->
                        <div class="modal fade" id="modal-filter">
                            <div class="modal-dialog modal-dialog-centered c-px-sm-16">
                                <form action="" class="form-filter">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center p-0">
                                            <p class="modal-title center">Bộ lọc</p>
                                            <button type="button" class="close" data-dismiss="modal"></button>
                                        </div>


                                        <div class="modal-body c-p-0">
                                            @if(isset($datacategory) && count($datacategory) > 0)
                                            <div class="input-group">
                                                <span class="form-label title-color">Game</span>
                                                <select class="game key" name="key">

                                                    <option value="">Chọn</option>
                                                    @foreach($datacategory as $val)
                                                        <option value="{{ $val->slug }}">{{ $val->title }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            @endif
                                            <div class="input-group">
                                                <span class="form-label title-color">Trạng thái</span>
                                                {{Form::select('status',array(''=>'Chọn')+config('module.acc.status'),old('status', isset($data['status']) ? $data['status'] : null),array('class'=>'status'))}}
                                            </div>
                                            <div class="input-group">
                                                <span class="form-label title-color">Số tiền</span>
                                                {{Form::select('price',array(''=>'Chọn')+config('module.acc.price'),old('price', isset($data['price']) ? $data['price'] : null),array('class'=>'price'))}}
                                            </div>

                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                    <span class="form-label title-color">
                                                        Từ ngày
                                                    </span>
                                                            <input type="text" name="started_at" class="date-right started_at" placeholder="Chọn">
                                                        </div>
                                                    </td>
                                                    <td class="c-px-6 d-block"></td>
                                                    <td>
                                                        <div class="input-group">
                                                    <span class="form-label title-color">
                                                        Đến ngày
                                                    </span>
                                                            <input type="text" name="ended_at" class="date-right ended_at" placeholder="Chọn">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer group-btn c-mt-24" style="--data-between: 12px">
                                            <button type="button" class="btn secondary js-reset-form">Thiết lập lại</button>
                                            <button type="button" class="btn primary js-submit-form">Xem kết quả</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--            Dịch vụ khác   --}}
        <div class="container c-container">
            @include('frontend.widget.__service__other__his')
        </div>

    </div>

@endsection

@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/account-history.js"></script>
@endsection


