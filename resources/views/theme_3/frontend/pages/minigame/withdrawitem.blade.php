
@extends('theme_3.frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('styles')
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/breadcrumb.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/withdraw_items.css">
    <link rel="stylesheet" href="/assets/frontend/{{theme('')->theme_key}}/css/style_phu/layout_page.css">
@endsection
@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_phu/withdraw_items.js"></script>
@endsection
@section('content')
    <div class="container_page container">
        {{--breadcrumb--}}
        <section class="breadcrumb-container">
            <ul class="breadcrumb breadcrumb-arrow">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="">Rút vật phẩm</a></li>
            </ul>
        </section>
        <section class="breadcrumb-mobile">
            <a href="javascript:void(0)" style="display: block" onclick="openMenuProfile()">
                <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/back.svg" alt="">
            </a>
            <h1 class="mobile-rutvatpham">Rút vật phẩm</h1>
        </section>
        <div class="row">
            {{--navbar--}}
            @include('frontend.widget.__navbar__profile')
            {{--content--}}
            <div class="col-12 col-lg-9">
                <div class="withdraw-content">
                    <div class="ml-auto text-right" style="padding: 16px 16px 0 16px">
                        <span class="lammoi_lichsu" style="font-size: 13px;color: #ffffff" onClick="window.location.reload();"><i class="fas fa-redo mr-1" ></i>Làm mới</span>
                    </div>
                    <div class="withdraw-header row no-gutters">
                        <div class="col-6">
                            <div class="listed-type listed-type-active">
                                Rút vật phẩm
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="listed-type">
                                Lịch sử
                            </div>
                        </div>
                        <div class="type-listing"></div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="container">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    {{$message}}
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($messages=$errors->all())
                        <div class="container">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    {{$messages[0]}}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="withdraw-body">
                        <div class="withdraw-tab-container">
                            <div class="withdraw-tab">

                                    <div class="withdraw-tab-header">
                                        RÚT VẬT PHẨM GAME {{config('constants.game_type.'.$game_type)}}
                                    </div>
                                    <div class="input-block">
                                        <h6>Chọn loại vật phẩm khác</h6>
                                        <select class="select-primary withdraw-select" id="game_type" name="game_type">

                                            @if(count($result->listgametype)>0)
                                                @foreach($result->listgametype as $item)
                                                    <option value="{{route('getWithdrawItem',[$item->parent_id])}}" {{$item->parent_id==$game_type?'selected':''}}>{{$item->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="current-balance">Số {{isset($result->gametype->image)?$result->gametype->image:'vật phẩm'}} hiện có: <span style="font-weight: 700; color: #F67600;">{{number_format($result->number_item)}}</span></div>
                                    </div>
                                    <script type="text/javascript">
                                        $("#game_type").change(function(){
                                            window.location.href = $( "select#game_type" ).val();
                                        });
                                    </script>
                                <form class="form-horizontal form-withdraw" method="POST">
                                    {{csrf_field()}}
                                    <div class="input-block">
                                        <h6>Gói muốn rút</h6>
                                        <select class="select-primary withdraw-select" id="package" name="package">
                                            @if($result->package)
                                                @foreach($result->package as $item)
                                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="input-block">
                                        <h6>{{isset($result->gametype->idkey)?$result->gametype->idkey:'ID trong game:'}}</h6>
                                        <input type="text" name="idgame" class="withdraw-inputs input-primary" placeholder="">
                                    </div>


                                    @if(isset($result->gametype->position))

                                        @if($result->gametype->position == "Mật Khẩu" || $result->gametype->position == "Mật Khẩu Game")
                                            <div class="input-block input-block-password">
                                                <h6>{{isset($result->gametype->position)?$result->gametype->position:'Số điện thoại ( nếu có ):'}}</h6>
                                                <input type="password" name="phone" class="withdraw-inputs input-primary" placeholder="Nhập mật khẩu trong game">
                                                <img class="withdraw-password-hide" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-show.svg" alt="" style="display: none">
                                                <img class="withdraw-password-show" src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/eye-hide.svg" alt="">
                                            </div>
                                        @else
                                            <div class="input-block">
                                                <h6>{{isset($result->gametype->position)?$result->gametype->position:'Số điện thoại ( nếu có ):'}}</h6>
                                                <input type="text" name="phone" class="withdraw-inputs input-primary" placeholder="Nhập số điện thoại">
                                            </div>
                                        @endif
                                    @endif

                                    <div class="input-button">
                                        <button class="button-primary" type="submit" id="btn-confirm">Thực hiện</button>

                                        <script>
                                            $(".form-withdraw").submit(function(){
                                                $("#btn-confirm").prop( "disabled", true);
                                            });
                                        </script>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="history-tab-container" style="display: none">
                            <div class="history-tab-filter">
                                <div class="history-search">
                                    <h6>Tìm kiếm</h6>
                                    <form class="search-form">
                                        <input type="text" class="input-primary" placeholder="Nhập từ khóa" name="">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                                        <button class="button-primary">Tìm kiếm</button>
                                    </form>
                                </div>
                                <div class="history-filter">

                                    <p>Bộ lọc</p>
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/nick/filter.png" alt="">
                                    <span class="filter-count" style="display: none">0</span>
                                </div>
                            </div>
                            <div class="current-filter"></div>
                            <div class="history-table-container">
                                <div class="history-table">
                                    <div class="history-head row no-gutters">
                                        <div class="history-head-item item-left col-2">
                                            <p>
                                                Thời gian
                                            </p>
                                        </div>
                                        <div class="history-head-item item-left col-2">
                                            <p>
                                                ID
                                            </p>
                                        </div>
                                        <div class="history-head-item item-right col-3">
                                            <p>
                                                Số vật phẩm
                                            </p>
                                        </div>
                                        <div class="history-head-item item-right col-3">
                                            <p>
                                                Thông báo
                                            </p>
                                        </div>
                                        <div class="history-head-item item-right col-2">
                                            <p>
                                                Trạng thái
                                            </p>
                                        </div>
                                    </div>
                                    <div class="history-content">
                                        {{-- Empty State of table --}}
                                        {{-- <div class="history-item empty-state row no-gutters">
                                            <p>Tài khoản của quý khách chưa phát sinh giao dịch</p>
                                        </div> --}}
                                        @if($paginatedItems)
                                            @foreach($result->withdraw_history->data as $item)
                                                <div class="history-item row no-gutters">
                                                    <div class="col-2 history-item-data data-left">
                                                        <p>{{date('d/m/Y H:i:s', strtotime($item->created_at))}}</p>
                                                    </div>
                                                    <div class="col-2 history-item-data data-left">
                                                        <p>#{{$item->id}}</p>
                                                    </div>
                                                    <div class="col-3 history-item-data data-right">
                                                        <p>{{$item->price}}</p>
                                                    </div>
                                                    <div class="col-3 history-item-data data-right">
                                                        <p>
                                                            @if ($item->content != "")
                                                                <button type="submit" data-msg="{{$item->content}}" class="btn btn-xs c-btn-square m-b-10 btn-success proccess_toggle" rel="{{$item->id}}" >Tiến độ</button>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-2 history-item-data data-right">
                                                        @if($item->payment_type == 13 || $item->payment_type == 12 || $item->payment_type == 11 || $item->payment_type == 14)
                                                            @if ($item->status == 0)
                                                                <a class="btn btn-xs c-btn-square m-b-10 btn-danger">Giao dịch thất bại</a>
                                                            @elseif($item->status == 1 )
                                                                <a class="btn btn-xs c-btn-square m-b-10 btn-warning">Chờ xử lý</a>
                                                            @elseif($item->status == 2 )
                                                                <a class="btn btn-xs c-btn-square m-b-10 btn-warning">Chờ xử lý</a>
                                                            @elseif($item->status == 4 )
                                                                <a class="btn btn-xs c-btn-square m-b-10 btn-success">Hoàn thành</a>
                                                            @endif
                                                        @else
                                                            @if ($item->status == 0)
                                                                <a class="btn btn-xs c-btn-square m-b-10 btn-warning">{{config('constants.withdraw_status.0')}}</a>
                                                            @elseif($item->status == 1 )
                                                                <span class="status-success">{{config('constants.withdraw_status.1')}}</span>
                                                            @elseif($item->status == 2 )
                                                                <span class="status-failed">{{config('constants.withdraw_status.2')}}</span>
                                                            @elseif($item->status == 3 )
                                                                <span class="status-failed">{{config('constants.withdraw_status.3')}}</span>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="history-item empty-state row no-gutters">
                                                <p>Tài khoản của quý khách chưa phát sinh giao dịch.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right justify-content-end default-paginate-addpadding default-paginate">

                                @if(isset($paginatedItems))
                                    <div class="row marinautooo justify-content-center">
                                        <div class="col-auto">
                                            <div class="data_paginate paginate__v1 paging_bootstrap paginations_custom" style="text-align: center">
                                                {{ $paginatedItems->appends(request()->query())->links('pagination::bootstrap-default-4') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade rotation-modal" id="withdrawItemFilter" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header rotation-modal-header">
                    <h5 class="modal-title">Bộ lọc</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/close.png" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="filterForm">
                        <div class="filter-input-block">
                            <h5>Loại giao dịch</h5>
                            <select class="select-primary filter-dropdown transaction-type-dropdown" id="transactionTypeInput" name="transaction_type" id="">
                                <option value="" selected disabled>Chọn</option>
                                <option value="0">Rút kim cương</option>
                                <option value="1">Rút abc</option>
                            </select>
                        </div>
                        <div class="filter-input-block">
                            <h5>Trạng thái</h5>
                            <select class="select-primary filter-dropdown transaction-status-dropdown" id="transactionStatusInput" name="transaction_status" id="">
                                <option value="" selected disabled>Chọn</option>
                                <option value="0">Thành công</option>
                                <option value="1">Thất bại</option>
                            </select>
                        </div>
                        <div class="filter-date-block row no-gutters">
                            <div class="col-6">
                                <h5>Từ ngày</h5>
                                <input class="input-primary" id="filterStartDate" type="text" name="start_date" id="" placeholder="Chọn" autocomplete="off" onkeydown="return false">
                                <label for="filterStartDate" class="filter-block-img-left">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/calendar.svg" alt="">
                                </label>                            </div>
                            <div class="col-6 input-date-right" style="text-align: right;">
                                <h5>Đến ngày</h5>
                                <input class="input-primary" id="filterEndDate" type="text" name="end_date" id="" placeholder="Chọn" autocomplete="off" onkeydown="return false">
                                <label for="filterEndDate" class="filter-block-img-right">
                                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/calendar.svg" alt="">
                                </label>
                            </div>
                        </div>
                        <div class="rotation-modal-btn row no-gutters">
                            <div class="col-6">
                                <button class="button-secondary" type="button" id="resetFormBtn">Thiết lập lại</button>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <button class="button-primary" type="submit">Áp dụng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade rotation-modal" id="withdrawResult" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header rotation-modal-header">
                    <h5 class="modal-title">Rút vật phẩm thành công</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/close.png" alt="">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="rotation-prize-img">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/verify 1.png" alt="">
                    </div>
                    <div class="rotation-prize-detail">
                        <p>Bạn vừa rút thành công</p>
                        <p><span>100.000</span> kim cương</p>
                    </div>
                    <div class="rotation-modal-btn row no-gutters">
                        <div class="col-6">
                            <button class="button-secondary">
                                <a href="/" style="display: block">
                                    Về trang chủ
                                </a>
                            </button>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <button class="button-primary">
                                <a href="#" style="display: block">
                                    Hỗ trợ
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="modal fade login show order-modal" id="proccessModal" aria-modal="true">

        <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
            <!--        <div class="image-login"></div>-->
            <div class="modal-content">
                <div class="modal-header p-0" style="border-bottom: 0">
                    <div class="row marginauto modal-header-order-ct">
                        <div class="col-12 span__donhang text-center" style="position: relative">
                            <span>Tiến độ</span>
                            <img class="lazy img-close-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>

                </div>

                <div class="modal-body modal-body-order-ct">

                </div>
                <div class="modal-footer">
                    <div class="row marginauto">

                        <div class="col-md-12 left-right">
                            <div class="row marginauto justify-content-center gallery-right-footer">
                                <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">

        $("body").delegate(".proccess_toggle","click",function(){
            if($(this).attr('data-msg')!=''){
                $("#proccessModal .modal-body").html($(this).attr('data-msg'));
            }else{
                $("#proccessModal .modal-body").html('Chưa có thông báo tiến độ!');
            }
            $('#proccessModal').modal('show');
        })
    </script>

@endsection
