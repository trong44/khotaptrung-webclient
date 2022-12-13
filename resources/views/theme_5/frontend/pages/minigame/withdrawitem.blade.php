@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <div class="background-history" id="withdrawitem">
        <div class="container c-container-side c-mb-24 c-mb-lg-0">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)" class="breadcrumb-link">Rút vật phẩm</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/profile" class="link-back"></a>

                <h1 class="head-title text-title">Rút vật phẩm</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>
                <div class="c-ml-16 c-ml-lg-0 c-history-right">
                    <div class="card unset-lg withdraw-items">
                        <div class="card-header d-none d-lg-flex justify-content-between align-items-center">
                            <h1 class="text-title-bold fz-20 lh-28">
                                Rút vật phẩm
                            </h1>
                            <span class="reload-page" onclick="window.location.reload()"><i class="fas fa-redo"></i>Làm mới</span>
                        </div>
                        <div class="card-body c-px-16 c-py-0">
                            <ul class="nav nav-tabs size-auto c-pb-16" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="tab active" data-toggle="tab" href="#tab-1" role="tab"
                                       aria-selected="true">Rút vật phẩm</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="tab" data-toggle="tab" href="#tab-2" role="tab" aria-selected="false">Lịch
                                        sử</a>
                                </li>
                            </ul>
                            @if ($message = Session::get('success'))
                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                    aria-hidden="true">×</span></button>
                                            {{$message}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($messages=$errors->all())
                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                    aria-hidden="true">×</span></button>
                                            {{$messages[0]}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="tab-content withdraw-body">
                                <div class="tab-pane fade active show c-pt-16 c-pb-lg-50 c-mb-lg-50" id="tab-1"
                                     role="tabpanel">
                                    <div class="input-group c-mb-10">
                                        <span class="form-label">
                                            RÚT VẬT PHẨM GAME {{config('constants.game_type.'.$game_type)}}
                                        </span>
                                        <select class="select-primary withdraw-select" id="game_type" name="game_type">
                                            @if(count($result->listgametype)>0)
                                                @foreach($result->listgametype as $item)
                                                    <option value="{{route('getWithdrawItem',[$item->parent_id])}}" {{$item->parent_id==$game_type?'selected':''}}>{{$item->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="group-info c-mb-16">
                                        <span class="fw-400">Số {{isset($result->gametype->image)?$result->gametype->image:'vật phẩm'}} hiện có:</span>
                                        <span class="text-primary-color">{{ str_replace(',','.',number_format($result->number_item)) }} đ</span>
                                    </div>
                                    <script type="text/javascript">
                                        $("#game_type").change(function(){
                                            window.location.href = $( "select#game_type" ).val();
                                        });
                                    </script>
                                    <form class="form-horizontal form-withdraw" method="POST">
                                        {{csrf_field()}}
                                    <div class="input-group">
                                        <span class="form-label">
                                            Gói muốn rút
                                        </span>
                                        <select id="package" name="package">
                                            @if($result->package)
                                                @foreach($result->package as $item)
                                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                        @php
                                            $service = null;
                                            $params = null;
                                            $server_id = null;
                                            $server_data = null;
                                            if (isset($result->service)){
                                                $service = $result->service;

                                                if (isset($service->params)){
                                                    $params = $service->params;
                                                    $server_data=\App\Library\HelpersDecode::DecodeJson('server_data',$params);
                                                    $server_id = \App\Library\HelpersDecode::DecodeJson('server_id',$params);
                                                }

                                            }

                                        @endphp
                                    @if(isset($service))
                                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                                        @if(isset($server_data) && isset($server_id) && count($server_data) && count($server_id))
                                            @if($service->idkey != 'roblox_buyserver')
                                                <div class="input-group">
                                                    <span class="form-label">
                                                        Chon server
                                                    </span>
                                                    <select name="server" class="wide">
                                                        @for($i = 0; $i < count($server_data); $i++)
                                                            @if((strpos($server_data[$i], '[DELETE]') === false))
                                                                <option value="{{$server_id[$i]}}">{{$server_data[$i]}}</option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                            @endif
                                        @endif
                                    @endif

                                    <div class="input-group">
                                        <span class="form-label">
                                            {{isset($result->gametype->idkey)?$result->gametype->idkey:'ID trong game:'}}
                                        </span>
                                        <input type="text" name="idgame" placeholder="Tên tài khoản">
                                    </div>

                                    <div class="input-group">
                                        <span class="form-label">
                                            {{isset($result->gametype->position)?$result->gametype->position:'Số điện thoại ( nếu có ):'}}
                                        </span>
                                        <input type="text" name="phone">
                                    </div>

                                    <div class="group-btn c-mt-24 c-mb-24 media-web" style="justify-content: end;">
                                        <button type="submit" id="btn-confirm-w" class="btn primary" style="width: 266px">Rút ngay</button>
                                    </div>

                                    <div class="footer-mobile">
                                        <div class="group-btn" >
                                            <button type="submit" id="btn-confirm-w-mobile" class="btn primary">Rút ngay</button>
                                        </div>
                                    </div>

                                        <script>
                                            $(".form-withdraw").submit(function(){
                                                $("#btn-confirm-w").prop( "disabled", true);
                                                $('#btn-confirm-w-mobile').prop( "disabled", true);
                                            });
                                        </script>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="c-history-title c-pb-16 c-pb-lg-12 media-web">
                                        <h3 class="fw-700 fz-20 fz-lg-16 lh-28 lh-lg-20 mb-0">Lịch sử rút vật phẩm</h3>
                                    </div>
                                    <div
                                        class="justify-content-between align-items-center c-pt-16 c-pb-16 c-mb-12 d-none d-lg-flex">
                                        <form action="" class="form-search history">
                                            <input type="search" placeholder="Tìm kiếm" class=" has-submit">
                                            <button type="submit"></button>
                                        </form>
                                        <div class="value-filter">
                                            <div class="show-modal-filter noselect" data-toggle="modal"
                                                 data-target="#modal-filter">Bộ lọc
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tags d-none d-lg-flex justify-content-end" id="params-filter">
                                        {{--                        <div class="tag">Mã số</div>--}}
                                        {{--                        <div class="tag">Trạng thái</div>--}}
                                        {{--                        <div class="tag">Rank</div>--}}
                                    </div>
                                    <div
                                        class="justify-content-between align-items-center c-pt-lg-16 c-pb-16 c-mb-16 d-flex d-lg-none">
                                        <form action="" class="form-search history">
                                            <input type="search" placeholder="Tìm kiếm" class="search">
                                            <button type="submit"></button>
                                        </form>
                                        <div class="value-filter c-ml-16">
                                            <button type="button" class="filter-history open-sheet"
                                                    data-target="#sheet-filter" data-notify="0"></button>
                                        </div>
                                    </div>
                                    @if($paginatedItems)
                                    @php
                                        $results = array();
                                        foreach ($result->withdraw_history->data as $element) {
                                            $results[date('m/y',strtotime($element->created_at))][] = $element;
                                        }
                                        $prev = null;
                                    @endphp
                                    @endif
                                    <div class="mr-n1 pb-3">
                                        <div class="history-content c-pt-16 mr-n2">
                                            @if($paginatedItems)
                                                @forelse($results as $key => $data)
                                                    @if(date('m-y',strtotime($key)) != $prev)
                                                        <div class="text-title-bold fw-500 c-mb-12">Tháng {{date('m',strtotime($key))}}</div>
                                                        @php
                                                            $prev = date('m-y',strtotime($key));
                                                        @endphp
                                                    @endif

                                                    <ul class="trans-list">
                                                        @forelse($data as $item)
                                                            <li class="trans-item">
                                                                <a href="javascript:void(0)">
                                                                    <div class="text-left">
                                                                        <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                                                                            {{$item->content}}
                                                                        </span>
                                                                        <span class="t-body-1 link-color">
                                                                            {{date('d/m/Y - H:i', strtotime($item->created_at))}}
                                                                        </span>
                                                                    </div>
                                                                    <div class="text-right">
                                                                        <span class="fw-500 d-block c-mb-0">{{$item->price}}</span>
                                                                        @if($item->payment_type == 13 || $item->payment_type == 12 || $item->payment_type == 11 || $item->payment_type == 14)
                                                                            @if ($item->status == 0)
                                                                                <span class="invalid-color c-mb-0">Giao dịch thất bại</span>
                                                                            @elseif($item->status == 1 )
                                                                                <span class="warning-color c-mb-0">Chờ xử lý</span>
                                                                            @elseif($item->status == 2 )
                                                                                <span class="warning-color c-mb-0">Chờ xử lý</span>
                                                                            @elseif($item->status == 4 )
                                                                                <span class="success-color c-mb-0">Hoàn thành</span>
                                                                            @endif
                                                                        @else
                                                                            @switch($item->status)
                                                                                @case(0)
                                                                                <span class="warning-color c-mb-0">{{config('constants.withdraw_status.0')}}</span>
                                                                                @break
                                                                                @case(1)
                                                                                <span class="success-color c-mb-0">{{config('constants.withdraw_status.1')}}</span>
                                                                                @break
                                                                                @case(2)
                                                                                <span class="warning-color c-mb-0">{{config('constants.withdraw_status.2')}}</span>
                                                                                @break
                                                                                @case(3)
                                                                                <span class="invalid-color c-mb-0">{{config('constants.withdraw_status.3')}}</span>
                                                                                @break
                                                                            @endswitch
                                                                        @endif
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                @empty
                                                    <ul class="trans-list">
                                                        <li class="trans-item" style="height: auto">
                                                            <a href="javascript:void(0)">
                                                                <div class="text-left">
                                                <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                                                    Không có dữ liệu
                                                </span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                @endforelse
                                            @else
                                                <ul class="trans-list">
                                                    <li class="trans-item" style="height: auto">
                                                        <a href="javascript:void(0)">
                                                            <div class="text-left">
                                                <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                                                    Không có dữ liệu
                                                </span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endif
                                            <div class="c-pt-24 w-100">
                                                @if(isset($paginatedItems) && count($paginatedItems))
                                                    {{ $paginatedItems->appends(request()->query())->links('pagination::pagination_3_0') }}
                                                @endif
                                            </div>
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
                                                    <div class="input-group">
                                                        <span class="form-label">
                                                            Loại giao dịch
                                                        </span>
                                                        <select name="service" id="">
                                                            <option value="">Chọn</option>
                                                        </select>
                                                    </div>

                                                    <div class="input-group">
                                                        <span class="form-label">
                                                            Trạng thái
                                                        </span>
                                                        <select name="status" id="">
                                                            <option value="">Chọn</option>
                                                            <option value="1">Đã bán</option>
                                                            <option value="0">Hủy</option>
                                                        </select>
                                                    </div>

                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span class="form-label">
                                                                        Từ ngày
                                                                    </span>
                                                                    <input type="text" class="date-right"
                                                                           placeholder="Chọn">
                                                                </div>
                                                            </td>
                                                            <td class="c-px-6 d-block"></td>
                                                            <td>
                                                                <div class="input-group">
                                <span class="form-label">
                                    Đến ngày
                                </span>
                                                                    <input type="text" class="date-right"
                                                                           placeholder="Chọn">
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
                                                        <button type="button" class="close"
                                                                data-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body c-p-0">
                                                        <div class="input-group">
                                                            <span class="form-label title-color">Loại giao dịch</span>
                                                            <select name="id" id="">
                                                                <option value="">Chọn</option>
                                                                <option value="ngoc-rong">Ngoc rong</option>
                                                                <option value="cf-online">CF Online</option>
                                                            </select>
                                                        </div>

                                                        <div class="input-group">
                                                            <span class="form-label title-color">Trạng thái</span>
                                                            <select name="status" id="">
                                                                <option value="">Chọn</option>
                                                                <option value="1">Huy</option>
                                                                <option value="0">Thanh cong</option>
                                                            </select>
                                                        </div>

                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <div class="input-group">
                                                    <span class="form-label title-color">
                                                        Từ ngày
                                                    </span>
                                                                        <input type="text" name="startat"
                                                                               class="date-right" placeholder="Chọn">
                                                                    </div>
                                                                </td>
                                                                <td class="c-px-6 d-block"></td>
                                                                <td>
                                                                    <div class="input-group">
                                                    <span class="form-label title-color">
                                                        Đến ngày
                                                    </span>
                                                                        <input type="text" name="endat"
                                                                               class="date-right" placeholder="Chọn">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer group-btn c-mt-24"
                                                         style="--data-between: 12px">
                                                        <button type="button" class="btn secondary js-reset-form">Thiết
                                                            lập lại
                                                        </button>
                                                        <button type="button" class="btn primary js-submit-form">Xem kết
                                                            quả
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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


