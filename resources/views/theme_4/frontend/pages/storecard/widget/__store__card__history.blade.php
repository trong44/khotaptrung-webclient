
@if(empty($data->data))
    <table class="table table-hover table-custom-res">
        <thead>
        <tr>
            <th class="hidden-xs">Thời gian</th>
            <th>ID</th>
            <th>Loại</th>
            <th>Mô tả</th>
            <th>Trị giá</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($data) && count($data) > 0)

            @foreach ($data as $key => $item)
                @if($item->status == 0)
                    <div class="col-lg-4 col-md-6">
                        <!-- BEGIN Purchased Item -->
                        <div class="purchased-item mb-4">
                            <div class="mb-2 item-meta small text-secondary">
                                <i class="las la-clock"></i> {{ formatDateTime($item->created_at) }}
                                {{--                        12:24 31/03/2021--}}
                            </div>


                            <div class="item-content">
                                <div class="inner">
                                    <div class="item-logo mb-2 d-flex align-items-center">
                                        {{--                                <img src="{{ $item->image }}" class="logo me-2" alt=""> --}}
                                        Thẻ {{json_decode($item->params)->telecom}}
                                    </div>
                                    <div class="mb-2">
                                        <label class="mb-1 text-secondary">Mã Pin</label>
                                        <div class="input-group">
                                            {{--                                    @if(isset($arrpin) && count($arrpin))--}}
                                            {{--                                        <input type="text" class="form-control border-end-0" placeholder="" value="{{ $arrpin[$key] }}" aria-label="">--}}
                                            {{--                                    @endif--}}

                                            <input type="text" class="form-control border-end-0" placeholder="" value="" aria-label="">
                                            <span class="input-group-text bg-transparent text-secondary"><i class="fa fa-copy" style="cursor: pointer" data-id=""></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-2 d-flex justify-content-between">
                                        <div class="text-secondary">Trạng thái</div>
                                        <div>
                                            <b class="text-danger">Thất bại</b>
                                        </div>
                                    </div>
                                    <div class="mb-2 d-flex justify-content-between">
                                        <div class="text-secondary">Mệnh giá</div>
                                        <div>
                                            <td>{{ formatPrice(json_decode($item->params)->amount) }} đ</td>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- END Purchased Item -->
                    </div>
                @elseif($item->status == 1)
                    @foreach($item->card as $itemCard)
                        <div class="col-lg-4 col-md-6">
                            <!-- BEGIN Purchased Item -->
                            <div class="purchased-item mb-4">
                                <div class="mb-2 item-meta small text-secondary">
                                    <i class="las la-clock"></i> {{ formatDateTime($item->created_at) }}
                                    {{--                        12:24 31/03/2021--}}
                                </div>


                                <div class="item-content">
                                    <div class="inner">
                                        <div class="item-logo mb-2 d-flex align-items-center">
                                            {{--                                <img src="{{ $item->image }}" class="logo me-2" alt=""> --}}
                                            Thẻ {{json_decode($item->params)->telecom}}
                                        </div>
                                        <div class="mb-2">
                                            <label class="mb-1 text-secondary">Mã Pin</label>
                                            <div class="input-group">
                                                {{--                                    @if(isset($arrpin) && count($arrpin))--}}
                                                {{--                                        <input type="text" class="form-control border-end-0" placeholder="" value="{{ $arrpin[$key] }}" aria-label="">--}}
                                                {{--                                    @endif--}}

                                                <input type="text" class="form-control border-end-0" placeholder="" value="{{  App\Library\Helpers::Decrypt($itemCard->pin,config('module.charge.key_encrypt')) }}" aria-label="">
                                                <span class="input-group-text bg-transparent text-secondary"><i class="fa fa-copy" style="cursor: pointer" data-id="{{  App\Library\Helpers::Decrypt($itemCard->pin,config('module.charge.key_encrypt')) }}"></i></span>
                                            </div>
                                        </div>
                                        <div class="mb-2 d-flex justify-content-between">
                                            <div class="text-secondary">Số seri</div>
                                            <div>
                                                {{  App\Library\Helpers::Decrypt($itemCard->serial,config('module.charge.key_encrypt')) }}
                                            </div>
                                        </div>
                                        <div class="mb-2 d-flex justify-content-between">
                                            <div class="text-secondary">Mệnh giá</div>
                                            <div>
                                                <td>{{ formatPrice((int)$itemCard->amount) }} đ</td>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- END Purchased Item -->
                        </div>
                        <!-- END List Items -->
                    @endforeach
                @elseif($item->status == 2)
                    <div class="col-lg-4 col-md-6">
                        <!-- BEGIN Purchased Item -->
                        <div class="purchased-item mb-4">
                            <div class="mb-2 item-meta small text-secondary">
                                <i class="las la-clock"></i> {{ formatDateTime($item->created_at) }}
                                {{--                        12:24 31/03/2021--}}
                            </div>


                            <div class="item-content">
                                <div class="inner">
                                    <div class="item-logo mb-2 d-flex align-items-center">
                                        {{--                                <img src="{{ $item->image }}" class="logo me-2" alt=""> --}}
                                        Thẻ {{json_decode($item->params)->telecom}}
                                    </div>
                                    <div class="mb-2">
                                        <label class="mb-1 text-secondary">Mã Pin</label>
                                        <div class="input-group">
                                            {{--                                    @if(isset($arrpin) && count($arrpin))--}}
                                            {{--                                        <input type="text" class="form-control border-end-0" placeholder="" value="{{ $arrpin[$key] }}" aria-label="">--}}
                                            {{--                                    @endif--}}

                                            <input type="text" class="form-control border-end-0" placeholder="" value="" aria-label="">
                                            <span class="input-group-text bg-transparent text-secondary"><i class="fa fa-copy" style="cursor: pointer" data-id=""></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-2 d-flex justify-content-between">
                                        <div class="text-secondary">Trạng thái</div>
                                        <div>
                                            <b class="text-danger">Đang chờ xử lý</b>
                                        </div>
                                    </div>
                                    <div class="mb-2 d-flex justify-content-between">
                                        <div class="text-secondary">Mệnh giá</div>
                                        <div>
                                            <td>{{ formatPrice(json_decode($item->params)->amount) }} đ</td>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- END Purchased Item -->
                    </div>
                @endif

            @endforeach
        @else
            {{--            <div class="col-md-12 data-card">--}}
            {{--                <span style="color: red;font-size: 16px;">Không có dữ liệu!</span>--}}
            {{--            </div>--}}
        @endif
        <tbody>
    </table>
@endif
<!-- END: PAGE CONTENT -->

<div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">

</div>
