<div class="sidebar">
    <div class="sidebar-section d-flex brs-12 c-mb-16 sidebar-user-profile">
        {{--        <div class="sidebar-section-avt brs-100 c-mr-12">--}}
        {{--            <img class="brs-100" src="http://sacus.vn/wp-content/uploads/2019/06/no-image.jpg" alt="">--}}
        {{--        </div>--}}
        {{--        <div class="sidebar-section-info">--}}
        {{--            <p class="sidebar-section-title c-mb-4 fz-15 fw-500 sidebar-user-name">Nobita yêu Xuka</p>--}}
        {{--            <p class="sidebar-section-info-text c-mb-4 fz-13 fw-500 sidebar-user-balance">Số dư: <span>100.000đ</span></p>--}}
        {{--            <p class="sidebar-section-info-text mb-0 fz-13 fw-500 sidebar-user-id">ID: <span>123456</span></p>--}}
        {{--        </div>--}}
    </div>
@if(isset($data))
    <!-- Nhóm vào với các item vào với nhau theo parent -->
    @php
        $menu = [];
          foreach ($data as $element) {
            $menu[$element->parent_id][] = $element;
        }
    @endphp
    @if(count($menu))
        @forelse($menu[0] as $item)
            <!-- Tìm parent trước -->
                @if($item->slug == 'quan-ly-giao-dich')
                    <div class="sidebar-section brs-12 c-mb-16">
                        <p class="sidebar-section-title c-mb-16 fz-15 fw-500">Quản lý giao dịch</p>
                        <div class="d-flex justify-content-between transaction-manager">
                            @if(isset($menu[$item->id]))
                                @forelse($menu[$item->id] as $menu_child)
                                    @php
                                        $is_active = false;
                                        if ($menu_child->url && '/'.request()->path() == $menu_child->url){
                                          $is_active = true;
                                        }else if ('/'.request()->path() == $menu_child->slug){
                                            $is_active = true;
                                        }
                                    @endphp
                                    <div class="sidebar-item sidebar-item-col {{ $is_active ? 'active' : '' }}">
                                        <a href="{{$menu_child->url?$menu_child->url:'/'.$menu_child->slug}}" class=" d-flex flex-column align-items-center">
                                            <div class="icon-sidebar" style="--path:url({{ $menu_child->image_icon }})"></div>
                                            <div class="sidebar-transaction-item-text fw-400 fz-12 mb-0">{{ $menu_child->title }}</div>
                                        </a>
                                    </div>
                                @empty
                                @endforelse
                            @endif
                        </div>
                    </div>
                @else
                    <div class="sidebar-section brs-12 c-mb-16">
                        @if($item->slug !== 'tai-khoan')
                            <p class="sidebar-section-title fz-15 fw-500 c-mb-16">{{ $item->title }}</p>
                        @endif
                        @if(isset($menu[$item->id]))
                            @forelse($menu[$item->id] as $key => $menu_child)
                                @php
                                    $is_active = false;
                                    if ($menu_child->url && '/'.request()->path() == $menu_child->url || str_contains('/'.request()->path(), $menu_child->url)){
                                        $is_active = true;
                                    }else if('/'.request()->path() == $menu_child->slug || str_contains('/'.request()->path(),$menu_child->slug )){
                                        $is_active = true;
                                    }
                                @endphp
                                <div class="sidebar-item {{ $is_active ? 'active' : '' }}">
                                    <a href="{{$menu_child->url?$menu_child->url:'/'.$menu_child->slug}}" class="d-block align-items-center d-flex">
                                        <div class="icon-sidebar" style="--path:url({{ $menu_child->image_icon }})"></div>
                                        <p class="sidebar-item-text fw-400 fz-12 mb-0">{{ $menu_child->title }}</p>
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/svg/sidebar_arrow_right.svg" alt="">
                                    </a>
                                </div>
                                @if($key < count($menu[$item->id]) - 1)
                                    <div class="sidebar-item-partition d-flex c-my-8"></div>
                                @endif
                            @empty
                            @endforelse
                        @endif
                    </div>
                @endif
            @empty
            @endforelse
        @endif
    @else
    @endif
    <div class="sidebar-section brs-12 c-mb-16">
        <div class="sidebar-item log-out-button">
            {{--            <a href="javascript:void(0);" class="d-block align-items-center d-flex">--}}
            {{--                <div class="icon-sidebar"--}}
            {{--                     style="--path:url(/assets/frontend/theme_5/image/svg/sidebar-the-cao-da-mua.svg)"></div>--}}
            {{--                <p class="sidebar-item-text fw-400 fz-12 mb-0">Đăng xuất</p>--}}
            {{--            </a>--}}
        </div>
    </div>
</div>
