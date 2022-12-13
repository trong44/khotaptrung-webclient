<div class="section-history-filter mb_12">
    <form action="">

        <div class="row">
            <div class="col-6">
                <div class="t-sub-2 mb-2">
                    Lịch sử
                </div>
                <select name="type" id="" class="form-control">
                    <option value="spin-bonus" selected>Log trúng vật phẩm</option>
                    <option value="spin-bonus-acc">Log trúng acc</option>
                </select>
            </div>
            <div class="col-6">
                <div class="t-sub-2 mb-2">
                    Minigame
                </div>
                <select name="id" id="" class="form-control">
                    @foreach($group_api as $item)
                        <option value="{{$item->id}}" {{$group->id==$item->id?'selected':''}}>{{$item->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
</div>
<div class="section-table-history scroll-default">
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

                    <td>{{$item->item_ref->title??""}}</td>
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
    <div class="default-paginate" style="padding-top: 16px">
        <div class="row marinautooo justify-content-center">
            <div class="col-auto frontend__panigate">
                <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                    {{ $paginatedItems->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endif
