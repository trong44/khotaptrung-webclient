<div class="section-history-filter">
    <form action="">

        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="t-sub-2 mb-2">
                    Lịch sử
                </div>
                <select name="type" id="" class="wide">
                    <option value="spin-bonus" selected>Log trúng vật phẩm</option>
                    <option value="spin-bonus-acc">Log trúng acc</option>
                </select>
            </div>
            <div class="col-12 col-lg-4">
                <div class="t-sub-2 mb-2">
                    Minigame
                </div>
                <select name="id" id="" class="wide">
                    @foreach($group_api as $item)
                        <option value="{{$item->id}}" {{$group->id==$item->id?'selected':''}}>{{$item->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-lg-4">
                <div class="t-sub-2 mb-2">
                    Tên quà
                </div>
                <input type="text" name="gift_name" class="input-defautf-ct" placeholder="Tên quà">
            </div>
            <div class="col-12 col-lg-4">
                <div class="t-sub-2 mb-2">
                    Từ ngày
                </div>
                <input type="text" name="started_at" class="input-defautf-ct" placeholder="Từ ngày" autocomplete="off">
            </div>
            <div class="col-12 col-lg-4">
                <div class="t-sub-2 mb-2">
                    Đến ngày
                </div>
                <input type="text" name="ended_at" class="input-defautf-ct" placeholder="Đến ngày" autocomplete="off">
            </div>
            <div class="col-12 col-lg-4">
                <button class="btn -secondary" type="reset">Đặt lại</button>
                <button class="btn -primary" type="button" id="submit-filter-spin">Áp dụng</button>
            </div>
        </div>
    </form>
</div>
<div class="section-table-history">
    <div class="wrap-table">
        <table>
            <tr>
                <th>Thời gian</th>
                <th>ID</th>
                <th>Phần thưởng</th>
                <th>Số vật phẩm</th>
                <th>Danh mục</th>
            </tr>
            @forelse($data as $item)
                <tr>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i')}}</td>
                    <td>#{{$item->id}}</td>

                    <td>{{$item->item_ref->children[0]->title??""}}</td>
                    <td>
                        @if(isset($item->item_ref) && isset($item->item_ref->parrent) && isset($item->item_ref->parrent->params))
                            @if($item->item_ref->parrent->params->gift_type == 0)
                                @php
                                    $value = $item->item_ref->parrent->params->value;
                                    $bonus = 0;
                                    if (isset($item->value_gif_bonus)){
                                        $bonus = $item->value_gif_bonus;
                                    }
                                    $total_vp = $value + $bonus;
                                @endphp
                                {{ $total_vp }}
                            @else
                                {{$item->item_ref->parrent->params->value??""}}
                            @endif
                        @endif
                    </td>
                    <td>
                        @if(isset($item->group))
                            {{ $item->group->title }}
                        @endif
                    </td>
                </tr>
            @empty
                <tr style="width: 100%" id="table-notdata">
                    <td colspan="5"><span>Tài khoản của quý khách chưa phát sinh giao dịch.</span></td>
                </tr>
            @endforelse
        </table>
    </div>
</div>
@if(isset($paginatedItems))
    <div class="default-paginate pb-3">
        <div class="row marinautooo justify-content-center">
            <div class="col-auto">
                <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                    {{ $paginatedItems->appends(request()->query())->links('pagination::bootstrap-default-4') }}
                </div>
            </div>
        </div>
    </div>
@endif
