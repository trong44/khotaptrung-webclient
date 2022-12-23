@if(isset($data) && count($data) > 0)

    <div class="col-lg-4 d-none d-lg-block">
        <div class="card --custom">
            <div class="nav-bar-hr">
                <div class="row marginauto nav-bar-nick nav-bar-parent">
                    <div class="col-md-12 left-right">
                        <div class="row marginauto nav-bar-article-title">
                            <div class="col-12 left-right">
                                <span>Danh mục</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row marginauto nav-bar-nick nav-bar-child add-active_withdraw-money">
                    <div class="col-12 left-right">
                        @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                            <a href="{{ setting('sys_zip_shop') }}">
                                <div class="row marginauto">
                                    <div class="col-auto left-right">
                                        <i class="__icon --md --path__custom" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/cat-news-all.png)"></i>
                                    </div>
                                    <div class="col-10 nav-bar-log-top-body-col">
                                            <span> @php
                                                    $count = 0;
                                                    foreach ($data as $val){
                                                        $count = $count + $val->count_item;
                                                    }
                                                @endphp
                                              Tất cả ({{ $count }})</span>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="/tin-tuc">
                                <div class="row marginauto">
                                    <div class="col-auto left-right">
                                        <i class="__icon --md --path__custom" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/cat-news-all.png)"></i>
                                    </div>
                                    <div class="col-10 nav-bar-log-top-body-col">
                                            <span> @php
                                                    $count = 0;
                                                    foreach ($data as $val){
                                                        $count = $count + $val->count_item;
                                                    }
                                                @endphp
                                              Tất cả ({{ $count }})</span>
                                    </div>
                                </div>
                            </a>
                        @endif

                    </div>
                </div>
                @foreach($data as $val)
                    <div class="row marginauto nav-bar-nick nav-bar-child add-active_withdraw-items">
                        <div class="col-12 left-right">
                            @if(setting('sys_zip_shop') && setting('sys_zip_shop') != '')
                                <a href="{{ setting('sys_zip_shop') }}/{{ $val->slug }}" data-slug="{{ $val->slug }}">
                                    <div class="row marginauto">
                                        <div class="col-auto left-right">
                                            <i class="__icon --md --path__custom" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/cat-news-game.png)"></i>
                                        </div>
                                        <div class="col-10 nav-bar-log-top-body-col">
                                            <span>
                                                {{ $val->title }} ({{ $val->count_item }})
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <a href="/tin-tuc/{{ $val->slug }}" data-slug="{{ $val->slug }}">
                                    <div class="row marginauto">
                                        <div class="col-auto left-right">
                                            <i class="__icon --md --path__custom" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/icons/cat-news-game.png)"></i>
                                        </div>
                                        <div class="col-10 nav-bar-log-top-body-col">
                                            <span>
                                                {{ $val->title }} ({{ $val->count_item }})
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endif
