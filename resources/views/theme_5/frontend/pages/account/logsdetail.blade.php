@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')

    <div class="background-history">
        <div class="container c-container-side">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)" class="breadcrumb-link">Chi tiết tài khoản đã mua</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/lich-su-mua-account" class="link-back"></a>

                <h1 class="head-title text-title">Tài khoản đã mua</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>

                <div class="c-ml-16 c-ml-lg-0 c-history-right">
                    @if(isset($item))
                    <div class="history-detail-title c-p-16 c-mb-16 brs-12 d-none d-sm-block">
                        <h1 class="fw-700 fz-20 lh-28 c-my-0">Chi tiết tài khoản đã mua</h1>
                    </div>
                    <div class="history-detail-content brs-12">
                        <div class="history-detail-subtitle lh-24 c-pt-16 c-pb-12 c-px-16 fw-500 fz-15 d-none d-sm-block">
                            {{ $item->category->title }}
                        </div>
                        <div class="c-px-16 c-pb-24">
                            <div class="history-detail-label c-py-12 fw-500 fz-13 fz-sm-15">
                                Thông tin giao dịch
                            </div>
                            <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">ID</p>
                                    <div class="fw-500 fz-13">#{{ $item->randId }}</div>
                                </div>
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Game</p>
                                    <div class="fw-500 fz-13">{{ $item->category->title }}</div>
                                </div>

                            </div>

                            @if($item->status == 0)

                            <div class="history-detail-info-block brs-12 c-p-16 c-mb-16">
                                @if($checkpass && isset($time))
                                    @foreach($dataAttribute as $value)
                                        @if($value->position == 'text')
                                            @if (count($value->childs) > 0)
                                                @foreach($value->childs as $valuechild)
                                                    @if(isset($item->params))

                                                        @if(isset($item->params->ext_info))
                                                            @foreach($item->params->ext_info as $keyparam => $valueparam)
                                                                @if ($keyparam == $valuechild->id && $valuechild->is_slug_override == 1)
                                                                    <div class="c-mt-0 c-mb-12">
                                                                        <label class="c-mb-4 fw-500 fz-13 lh-20 text_border">{{ $valuechild->title }}</label>
                                                                        <div class="copy-input">
                                                                            <input type="text" readonly value="{{ $valueparam }}" autocomplete="off" placeholder="{{ $valueparam }}">
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif

                                    @endforeach
                                @endif
                                <div class="c-mt-0">
                                    <label class="c-mb-4 fw-500 fz-13 lh-20 text_border">Tài khoản</label>
                                    <div class="copy-input">
                                        @if($checkpass && isset($time))
                                            <input type="text" required value="{{ $item->title }}" readonly autocomplete="off" placeholder="{{ $item->title }}">

                                        @else
                                            <input type="text" readonly value="******" autocomplete="off" placeholder="******">
                                        @endif
                                    </div>
                                </div>
                                <div class="c-mt-12">
                                    <label class="c-mb-4 fw-500 fz-13 lh-20 text_border">Mật khẩu</label>
                                    <div class="copy-input toggle-password">
                                        @if($checkpass && isset($time))
                                            <input type="password" readonly value="{{ \App\Library\Helpers::Decrypt($item->slug,config('module.acc.encrypt_key')) }}" autocomplete="off" placeholder="Mật khẩu">
                                        @else
                                            <input type="password" value="******" readonly autocomplete="off" placeholder="******">
                                        @endif
                                    </div>
                                </div>
                                @if($checkpass && isset($time))
                                <div class="c-mt-4 w-100 text-left focus-color">Đã lấy mật khẩu lúc: {{ $time }}</div>
                                <div class="c-mt-12">
                                    <div class="row marginauto his_nick-detail-noti">
                                        <div class="col-md-12 left-right">
                                            <label class="c-mb-4 fw-400 fz-13 lh-20 text-center text__main">Để bảo mật bạn vui lòng thay đổi mật khẩu và tên đăng nhập của tải khoản đã mua!</label>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </div>

                            @endif
                            <div class="history-detail-info-block brs-12 c-p-16 c-mb-24">
                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Trị giá</p>
                                    <div class="fw-500 fz-13">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                </div>

                                <div class="history-detail-attr c-mb-8 d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Ngày giao dịch</p>
                                    <div class="fw-500 fz-13">{{ formatDateTime($item->published_at) }}</div>
                                </div>

                                <div class="history-detail-attr d-flex justify-content-between align-items-center">
                                    <p class="fz-13 fw-400 mb-0">Trạng thái</p>

                                    @if($item->status == 1)
                                    @elseif($item->status == 2)
                                        <div class="detail-pending fw-500 fz-13">Chờ xử lý</div>
                                    @elseif($item->status == 3)
                                        <div class="detail-pending fw-500 fz-13">Đang check thông tin</div>
                                    @elseif($item->status == 4)
                                        <div class="detail-failed fw-500 fz-13">Sai thông tin</div>
                                    @elseif($item->status == 5)
                                        <div class="detail-failed fw-500 fz-13">Đã xoá</div>
                                    @elseif($item->status == 0)
                                        <div class="detail-success fw-500 fz-13">Thành công</div>
                                    @endif

                                </div>
                            </div>
                            @if(!$checkpass && $item->status == 0 && !isset($time))

                                <form action="/lich-su-mua-account-{{ $item->randId }}/showpass" class="formPassword" method="post">
                                    @csrf
                                <div class="footer-mobile v2 group-btn c-my-24 c-my-lg-0 c-px-lg-16 c-pt-lg-16 button-password" style="--data-between:12px">

                                    <button class="btn primary his__detail__button btn-data" data-id="{{ $item->randId }}" type="submit" style="position: relative">
                                        Lấy mật khẩu
                                    </button>

                                </div>
                                </form>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- Dịch vụ khác -->
        <div class="container c-container d-none d-lg-block c-mt-24 c-mt-lg-16">
            @include('frontend.widget.__service__other__his')
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade modal-328" id="modal-get-nick" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content">
                <div class="modal-body c-p-0">
                    <div class="banner">
                        <img class="" src="/assets/frontend/{{theme('')->theme_key}}/image/son/success.png" alt="">
                    </div>
                    <div class="c-mt-12">
                        <label class="c-mb-4 fw-500 fz-13 lh-20">Tài khoản</label>
                        <div class="copy-input">
                            <input type="text">
                        </div>
                    </div>
                    <div class="c-mt-12">
                        <label class="c-mb-4 fw-500 fz-13 lh-20">Mật khẩu</label>
                        <div class="copy-input toggle-password">
                            <input type="password">
                        </div>
                    </div>
                    <div class="c-mt-12 w-100 text-center focus-color">Đã lấy mật khẩu lúc: 05-05-2022, 121:32:56</div>
                    <div class="c-mt-16">
                        <label class="c-mb-4 fw-400 fz-13 lh-20 text-center">Để bảo mật bạn vui lòng thay đổi mật khẩu và tên đăng nhập của tải khoản đã mua!</label>
                    </div>
                </div>
                <div class="modal-footer c-pt-16">
                    <button class="btn ghost" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/his-detail.js?v={{time()}}"></script>
@endsection

