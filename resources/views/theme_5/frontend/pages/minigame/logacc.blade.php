@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <div class="background-history">

        <div class="container c-container-side c-mb-24 c-mb-lg-0">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/minigame-log-{{$group->id}}" class="breadcrumb-link">Lịch sử chơi {{$group->title}} trúng nick</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/profile" class="link-back"></a>

                <h1 class="head-title text-title">Lịch sử chơi {{$group->title}} trúng nick</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>
                <div class="c-ml-16 c-ml-lg-0 c-history-right">
                    <div class="c-history-right-body brs-12 brs-lg-0 c-p-16">
                        <div class="c-history-title c-pb-16 c-pb-lg-12 media-web">
                            <h3 class="fw-700 fz-20 fz-lg-16 lh-28 lh-lg-20 mb-0">Lịch sử chơi {{$group->title}} trúng nick</h3>
                        </div>

                        <div class="tags d-none d-lg-flex justify-content-end" id="params-filter">

                        </div>
                        <div class="justify-content-between align-items-center c-pt-lg-16 c-pb-16 c-mb-16 d-flex d-lg-none">

                            <div class="value-filter c-ml-16">
                                <button type="button" class="filter-history open-sheet" data-target="#sheet-filter" data-notify="0"></button>
                            </div>
                        </div>

                        <div class="row marginauto c-mt-24 c-mt-lg-16">
                            <div class="col-12 left-right pl-0 pr-0">
                                <div class="row marginauto">
                                    <div class="col-md-5 pl-0 c-pr-4 c-pr-lg-2 col-6 logs-vat-pham-left">
                                        <div class="row marginauto">
                                            <div class="col-12 left-right c-pr-4 background-nick-col-bottom-ct status-finter-nick">
                                                <select class="wide" name="type" id="type">
                                                    <option value="1">Log trúng vật phẩm</option>
                                                    <option selected>Log trúng acc</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 pr-0 c-pl-4 c-pl-lg-2 col-6 logs-vat-pham-right">
                                        <div class="row marginauto">
                                            <div class="col-12 c-pl-4 left-right background-nick-col-bottom-ct status-finter-nick">
                                                <select class="wide" name="id" id="id">
                                                    @foreach($group_api as $item)
                                                        <option value="{{route('getLog',['id' => $item->id])}}" {{$group->id==$item->id?'selected':''}}>{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 pr-0 c-pl-4 c-pl-lg-2 col-6 logs-vat-pham-right d-none d-lg-flex">
                                        <div class="row marginauto">
                                            <div class="col-12 c-pl-4 left-right background-nick-col-bottom-ct status-finter-nick">
                                                <div class="value-filter c-mt-10">
                                                    <div class="show-modal-filter noselect" data-toggle="modal" data-target="#modal-filter">Bộ lọc</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" id="group_id" value="{{$group->id}}">
                                    <script type="text/javascript">
                                        $("#id").change(function(){
                                            window.location.href = $( "select#id" ).val();
                                        });
                                        $("#type").change(function(){
                                            window.location.href = $( "select#id" ).val().replace('logacc','log');
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        @php
                            $results = array();
                            foreach ($result->data as $element) {
                                $results[date('m/y',strtotime($element->created_at))][] = $element;
                            }
                            $prev = null;
                        @endphp
                        <div class="mr-n1 pb-3">
                            <div class="history-content c-pt-16 mr-n2">
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
                                                        {{$item->item_acc->title}} (#{{$item->item_acc->position}})
                                                    </span>
                                                        <span class="t-body-1 link-color">
                                                        {{date('d/m/Y - H:i', strtotime($item->created_at))}}
                                                    </span>
                                                    </div>
                                                    <div class="text-right">
                                                        <span class="fw-500 d-block c-mb-0">{{$item->item_ref->parrent->title??""}}</span>
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
                                <form action="{{route('getLog',[$group->id])}}" method="get" class=" account_content_transaction_history__v2">
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
                                                Tên quà
                                            </span>
                                            <input type="text" name="gift_name" class="gift_name" placeholder="Tên quà">
                                        </div>

                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="form-label">
                                                            Từ ngày
                                                        </span>
                                                        <input type="text" name="started_at" class="date-right" placeholder="Chọn">
                                                    </div>
                                                </td>
                                                <td class="c-px-6 d-block"></td>
                                                <td>
                                                    <div class="input-group">
                                                        <span class="form-label">
                                                            Đến ngày
                                                        </span>
                                                        <input type="text" name="ended_at" class="date-right" placeholder="Chọn">
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
                                <form action="{{route('getLog',[$group->id])}}" method="get" class=" account_content_transaction_history__v2">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center p-0">
                                            <p class="modal-title center">Bộ lọc</p>
                                            <button type="button" class="close" data-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body c-p-0">
                                            <div class="input-group">
                                                <span class="form-label title-color">Tên quà</span>
                                                <input type="text" name="gift_name" class="gift_name" placeholder="Tên quà">
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
                                            <button type="submit" class="btn primary js-submit-form">Xem kết quả</button>
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

{{--@section('scripts')--}}
{{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/account-history.js"></script>--}}
{{--@endsection--}}












