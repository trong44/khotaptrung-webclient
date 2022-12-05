<div class="section-history-filter">
    <form action="">

        <div class="row">
            <div class="col-6">
                <div class="t-sub-2 mb-2">
                    Lịch sử
                </div>
                <select name="type" id="" class="form-control">
                    <option value="spin-bonus">Log trúng vật phẩm</option>
                    <option value="spin-bonus-acc" selected>Log trúng acc</option>
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
        <table class="w-100">
            <tr>
                <th>Thời gian</th>
                <th>ID Web</th>
                <th>Phần thưởng</th>
                <th>ID Phần thưởng</th>
                <th>Danh mục dịch vụ</th>
                <th>Giá dịch vụ</th>
                <th>Số dư cuối</th>
            </tr>
            @forelse($data as $item)
                <tr>
                    <td>{{\Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i')}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->item_acc->title}}</td>
                    <td>{{$item->item_acc->position}}</td>
                    <td>{{$item->item_ref->parrent->title??""}}</td>
                    <td>{{$item->group->title}}</td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tài khoản của quý khách chưa phát sinh giao dịch.</td>
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