<div class="row" style="width: 100%;margin: 0 auto">
    <div class="art-list" style="width: 100%">
        <div class="entries">
            <div class="row fix-border">

                <div class="col-md-3 col-sm-6 col-6 entries_item" style="display: block">
                    <a href="/mua-acc/id">
                        <img src="https://backend.dev.tichhop.pro/storage/upload/images/Avatar%20Gi%E1%BA%A3i%20th%C6%B0%E1%BB%9Fng%20-%20Gif/dich%20v%E1%BB%A5/bHhkJqAKlB_1623164417.gif"
                             alt="Nạp Kim Cương - Free Fire" class="entries_item-img">
                        <h2 class="text-title fw-bold">#123456</h2>
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>

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
