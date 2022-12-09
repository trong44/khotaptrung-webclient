@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@section('content')
    <div class="background-history">
        <div class="container c-container-side c-mb-24 c-mb-lg-0">
            <ul class="breadcrumb-list">
                <li class="breadcrumb-item">
                    <a href="/" class="breadcrumb-link">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/lich-su-giao-dich" class="breadcrumb-link">Biến động số dư</a>
                </li>
            </ul>

            <div class="head-mobile">
                <a href="/profile" class="link-back"></a>

                <h1 class="head-title text-title">Biến động số dư</h1>

                <a href="/" class="home"></a>
            </div>
            <div class="row">
                <div class="c-history-left media-web">
                    @include('frontend.widget.__menu_profile')
                </div>
                <div class="c-ml-16 c-ml-lg-0 c-history-right">
                    <div class="c-history-right-body brs-12 brs-lg-0 c-p-16">
                        <div class="c-history-title c-pb-16 c-pb-lg-12 media-web">
                            <h3 class="fw-700 fz-20 fz-lg-16 lh-28 lh-lg-20 mb-0">Biến động số dư</h3>
                            <span class="reload-page" onclick="window.location.reload()"><i class="fas fa-redo"></i>Làm mới</span>
                        </div>
                        <div
                            class="justify-content-between align-items-center c-pt-16 c-pb-16 c-mb-12 d-none d-lg-flex">
                            <form action="" class="form-search history">
                                <input type="search" placeholder="Tìm kiếm" name="id" class=" has-submit">
                                <button type="submit"></button>
                            </form>
                            <div class="value-filter">
                                <div class="show-modal-filter noselect" data-toggle="modal" data-target="#modal-filter">
                                    Bộ lọc
                                </div>
                            </div>
                        </div>
                        <div class="tags d-none d-lg-flex justify-content-end" id="params-filter">
                            {{--                        <div class="tag">Mã số</div>--}}
                            {{--                        <div class="tag">Trạng thái</div>--}}
                            {{--                        <div class="tag">Rank</div>--}}
                        </div>
                        <div
                            class="justify-content-between align-items-center c-pt-lg-16 c-pb-16 c-mb-16 d-flex d-lg-none">
                            <form action="" class="form-search history">
                                <input type="search" placeholder="Tìm kiếm" class="search">
                                <button type="submit"></button>
                            </form>
                            <div class="value-filter c-ml-16">
                                <button type="button" class="filter-history open-sheet" data-target="#sheet-filter"
                                        data-notify="0"></button>
                            </div>
                        </div>
                        <div class="mr-n1 pb-3 is-load">
                            <div class="loading-wrap">
                                <span class="modal-loader-spin"></span>
                            </div>
                            <div class="history-content c-pt-16 mr-n2">

                            </div>
                        </div>

                        <!-- Sheet Filter Mobile -->
                        <div class="bottom-sheet" id="sheet-filter" aria-hidden="true" data-height="60">
                            <div class="layer"></div>
                            <div class="content-bottom-sheet bar-slide">
                                <form action="" class="form-filter">
                                    <div class="sheet-header">
                                        <h2 class="text-title center">
                                            Bộ lọc
                                        </h2>
                                        <label class="close"></label>
                                    </div>
                                    <div class="sheet-body overflow-visible">
                                        <!-- body -->
                                        <div class="input-group">
                                            <span class="form-label">
                                                Loại giao dịch
                                            </span>
                                            <select name="service" id="">
                                                <option value="">Chọn</option>
                                                @if(isset($config))
                                                    @forelse($config as $key => $value)
                                                        <option value="{{$key}}">{{ $value }}</option>
                                                    @empty
                                                    @endforelse
                                                @endif
                                            </select>
                                        </div>

                                        <div class="input-group">
                                              <span class="form-label">
                                                     Trạng thái
                                              </span>
                                            <select name="status" id="">
                                                <option value="">Chọn</option>
                                                @if(isset($status))
                                                    @forelse($status as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @empty
                                                    @endforelse
                                                @endif
                                            </select>
                                        </div>

                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="input-group">
                                <span class="form-label">
                                    Từ ngày
                                </span>
                                                        <input type="text" class="date-right" placeholder="Chọn">
                                                    </div>
                                                </td>
                                                <td class="c-px-6 d-block"></td>
                                                <td>
                                                    <div class="input-group">
                                <span class="form-label">
                                    Đến ngày
                                </span>
                                                        <input type="text" class="date-right" placeholder="Chọn">
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="sheet-footer">
                                        <button class="btn secondary js-reset-form">Thiết lập lại</button>
                                        <button class="btn primary js-submit-form">Xem kết quả</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal Filter -->
                        <div class="modal fade" id="modal-filter">
                            <div class="modal-dialog modal-dialog-centered c-px-sm-16">
                                <form action="" class="form-filter">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center p-0">
                                            <h2 class="modal-title center">Bộ lọc</h2>
                                            <button type="button" class="close" data-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body c-p-0">
                                            <div class="input-group">
                                                <span class="form-label title-color">Loại giao dịch</span>
                                                <select name="config" id="">
                                                    <option value="">Chọn</option>
                                                    @if(isset($config))
                                                        @forelse($config as $key => $value)
                                                            <option value="{{$key}}">{{ $value }}</option>
                                                        @empty
                                                        @endforelse
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="input-group">
                                                <span class="form-label title-color">Trạng thái</span>
                                                <select name="status" id="">
                                                    <option value="">Chọn</option>
                                                    @if(isset($status))
                                                        @forelse($status as $key => $value)
                                                            <option value="{{ $key }}">{{ $value }}</option>
                                                        @empty
                                                        @endforelse
                                                    @endif
                                                </select>
                                            </div>

                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                    <span class="form-label title-color">
                                                        Từ ngày
                                                    </span>
                                                            <input type="text" name="started_at" class="date-right"
                                                                   placeholder="Chọn">
                                                        </div>
                                                    </td>
                                                    <td class="c-px-6 d-block"></td>
                                                    <td>
                                                        <div class="input-group">
                                                    <span class="form-label title-color">
                                                        Đến ngày
                                                    </span>
                                                            <input type="text" name="ended_at" class="date-right"
                                                                   placeholder="Chọn">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer group-btn c-mt-24" style="--data-between: 12px">
                                            <button type="button" class="btn secondary js-reset-form">Thiết lập lại
                                            </button>
                                            <button type="button" class="btn primary js-submit-form">Xem kết quả
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        {{--            Dịch vụ khác   --}}
        <div class="container c-container">
            @include('frontend.widget.__service__other__his')
        </div>
        @endsection
@section('scripts')
            <script src="/assets/frontend/{{theme('')->theme_key}}/js/txns/logs.js?v={{time()}}"></script>
@endsection



