@if(empty($data->data))
    @if(isset($data) && count($data) > 0)
        @foreach ($data as $item)
            <div class="col-6 col-sm-6 col-lg-3">
                <div class="item_buy_list_in">
                    <div class="item_buy_list_img">
                        <a href="/{{ $item->slug }}">
                            <img class="item_buy_list_img-main" src="https://media-tt.nick.vn/{{ $item->image }}" alt="">
                        </a>
                    </div>

                    <div class="item_buy_list_info">
                        <div class="row">
                            <div class="col-12 item_buy_list_info_in">
                                <span style="font-weight: bold;color: #f7b03c;font-size: 16px;">
                                    {{ $item->title }}
                                </span>
                            </div>

                            <div class="col-12 item_buy_list_info_in">
                                <span>Hỗ trợ dịch vụ:</span> 5
                            </div>

                            <div class="col-12 item_buy_list_info_in">
                                <span>Giao dịch:</span> 19,878
                            </div>

                        </div>
                    </div>

                    <div class="item_buy_list_more">
                        <div class="row">

                            <a href="/{{ $item->slug }}" class="col-12">
                                <div class="item_buy_list_view">
                                    CHI TIẾT
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-md-12 text-left">
            <span style="font-size: 16px;color: red">Dữ liệu cần tìm không tồn tại vui lòng thử lại.</span>
        </div>
    @endif
    <div class="col-md-12 left-right justify-content-end paginate__v1 paginate__v1__get__service paginate__v1_mobie frontend__panigate">

    @if(isset($data))
        @if($data->total()>1)
            <div class="row marinautooo paginate__history paginate__history__fix justify-content-center">
                <div class="col-auto paginate__category__col">
                    <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                        {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        @endif
    @endif
</div>

@endif