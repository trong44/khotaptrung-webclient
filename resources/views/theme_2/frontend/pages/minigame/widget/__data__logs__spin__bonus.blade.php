<div class="section-history-filter">
    <form action="">

        <div class="row">
            <div class="col-6 col-lg-4 c-pr-6">
                <div class="input-group">
                    <div class="form-label">Lịch sử</div>
                    <select name="type" id="" class="wide">
                        <option value="spin-bonus" selected>Log trúng vật phẩm</option>
                        <option value="spin-bonus-acc">Log trúng acc</option>
                    </select>
                </div>
            </div>
            <div class="col-6 col-lg-4 c-px-6 c-pr-lg-15 c-pl-lg-6">
                <div class="input-group">
                    <div class="form-label">Minigame</div>
                    <select name="id" id="" class="wide">
                        @foreach($group_api as $item)
                            <option value="{{$item->id}}" {{$group->id==$item->id?'selected':''}}>{{$item->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6 col-lg-4 c-pl-6 c-pl-lg-15 c-pr-lg-6">
                <div class="input-group">
                    <div class="form-label">Tên quà</div>
                    <input type="text" name="gift_name" placeholder="Tên quà">
                </div>
            </div>
            <div class="col-6 col-lg-4 c-pr-6 c-pr-lg-15 c-pl-lg-6">
                <div class="input-group">
                    <div class="form-label">
                        Từ ngày
                    </div>
                    <input type="text" name="started_at" class="date-right" placeholder="Chọn" autocomplete="off">
                </div>
            </div>
            <div class="col-6 col-lg-4 c-px-6 c-pr-lg-6 c-pl-lg-15">
                <div class="input-group">
                    <div class="form-label">
                        Đến ngày
                    </div>
                    <input type="text" name="ended_at" class="date-right" placeholder="Chọn" autocomplete="off">
                    <span class="text-error"></span>
                </div>
            </div>
            <div class="col-12 col-lg-4 c-pl-6 c-pr-lg-6 c-pl-lg-15 c-mt-lg-4">
                <div class="row align-items-end" style="height: 100%">
                    <div class="col-6 c-pr-6 c-mb-8">
                        <button type="button" class="btn secondary w-100" id="reset-filter-spin">Đặt lại</button>
                    </div>
                    <div class="col-6 c-pl-6 c-mb-8">
                        <button type="button" class="btn primary w-100" id="submit-filter-spin">Áp dụng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="section-history-list">
    @php
        $results = array();
        foreach ($data as $element) {
            $results[date('m/y',strtotime($element->created_at))][] = $element;
        }
        $prev = null;
    @endphp
    @forelse($results as $key => $result)
        @if(date('m-y',strtotime($key)) != $prev)
            <div class="text-title-bold fw-500 c-mb-12">Tháng {{date('m',strtotime($key))}}</div>
            @php
                $prev = date('m-y',strtotime($key));
            @endphp
        @endif

        <ul class="trans-list">
            @forelse($result as $item)
                <li class="trans-item">
                    <a href="javascript:void(0)">
                        <div class="text-left">
                        <span class="t-body-2 title-color c-mb-0 text-limit limit-1 bread-word">
                            <td>{{$item->item_ref->title??""}}</td>
                        </span>
                            <span class="t-body-1 link-color">
                            {{date('d/m/Y - H:i', strtotime($item->created_at))}}
                        </span>
                        </div>
                        <div class="text-right">
                            <span class="fw-500 d-block c-mb-0">
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
                                @endif</span>
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
    @if(isset($paginatedItems) && count($paginatedItems))
        <div class="c-pt-24 w-100">
            {{ $paginatedItems->appends(request()->query())->links('pagination::pagination_3_0') }}
        </div>
    @endif
</div>
