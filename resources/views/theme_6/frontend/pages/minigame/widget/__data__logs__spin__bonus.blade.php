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

                    <td>{{$item->item_ref->parrent->title??""}}</td>
                    <td>
                        {{$item->item_ref->parrent->params->value??""}}
                    </td>
                    <td>
                        {{$item->group->title}}
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
            <div class="col-auto frontend__panigate">
                <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                    {{ $paginatedItems->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endif
