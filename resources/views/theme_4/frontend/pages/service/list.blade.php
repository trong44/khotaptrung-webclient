@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    <section>
        <div class="container">

            <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->

            <nav aria-label="breadcrumb" style="margin-top: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="/dich-vu">Dịch vụ</a></li>
                </ol>
            </nav>

            <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: BLOG LISTING -->

            <div class="c-content-box c-size-md">

                <div class="container" style="padding-bottom: 24px">

                    <div class="row">
                        <div class="col-md-12 col-xs-12 left-right">
                            <div class="row" style="width: 100%;margin: 0 auto">
                                <div class="art-list" style="width: 100%">
                                    {{--<div class="d-flex justify-content-between" style="padding-top: 8px;padding-bottom: 24px">--}}
                                    {{--    <div class="main-title">--}}
                                    {{--        --}}{{--                                            <h1>Danh mục game</h1>--}}
                                    {{--    </div>--}}
                                    {{--    <div class="service-search d-none d-lg-block">--}}
                                    {{--        <div class="input-group p-box">--}}
                                    {{--            <input type="text" id="txtSearch" placeholder="Tìm dịch vụ" value="" class="" width="200px">--}}
                                    {{--            <span class="icon-search"><i class="fas fa-search"></i></span>--}}
                                    {{--        </div>--}}
                                    {{--    </div>--}}
                                    {{--</div>--}}

                                    @include('frontend.widget.__content__home__dichvu')

{{--                                    <div class="entries">--}}
{{--                                        <div class="row fix-border fix-border-dich-vu">--}}

{{--                                            <div class="col-md-12 left-right data-service-search">--}}
{{--                                                <span style="color: rgb(238, 70, 35);padding-bottom: 24px">Dịch vụ cần tìm không tồn tại.</span>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-1" style="display: block">--}}
{{--                                                <a href="/dich-vu/cay-thue-lien-quan">--}}
{{--                                                    <img src="//backend.dev.tichhop.pro/storage/upload/images/napgamegiare/ZADEUfZ4zs_1627120716.jpg" alt="cay-thue-lien-quan" class="entries_item-img">--}}
{{--                                                    <h2 class="text-title">Cày thuê liên quân.</h2>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-1" style="display: block">--}}
{{--                                                <a href="/dich-vu/ban-xu-ninja">--}}
{{--                                                    <img src="//backend.dev.tichhop.pro/storage/upload/images/Avatar%20Gi%E1%BA%A3i%20th%C6%B0%E1%BB%9Fng%20-%20Gif/dich%20v%E1%BB%A5/ZaUpJaYZh2_1623164524.gif" alt="ban-xu-ninja" class="entries_item-img">--}}
{{--                                                    <h2 class="text-title">Bán Xu Ninja</h2>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-1" style="display: block">--}}
{{--                                                <a href="/dich-vu/nap-kim-cuong-free-fire">--}}
{{--                                                    <img src="//backend.dev.tichhop.pro/storage/upload/images/Avatar%20Gi%E1%BA%A3i%20th%C6%B0%E1%BB%9Fng%20-%20Gif/dich%20v%E1%BB%A5/ZwCbQxRd6b_1623164799.gif" alt="nap-kim-cuong-free-fire" class="entries_item-img">--}}
{{--                                                    <h2 class="text-title">Nạp Kim Cương Free Fire</h2>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-1" style="display: block">--}}
{{--                                                <a href="/dich-vu/ban-hong-ngoc">--}}
{{--                                                    <img src="//backend.dev.tichhop.pro/storage/upload/images/Avatar%20Gi%E1%BA%A3i%20th%C6%B0%E1%BB%9Fng%20-%20Gif/dich%20v%E1%BB%A5/WRZdijOT0U_1623164562.gif" alt="ban-hong-ngoc" class="entries_item-img">--}}
{{--                                                    <h2 class="text-title">Bán Hồng Ngọc</h2>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-1" style="display: block">--}}
{{--                                                <a href="/dich-vu/ban-vang-tu-dong">--}}
{{--                                                    <img src="//backend.dev.tichhop.pro/storage/upload/images/Avatar%20Gi%E1%BA%A3i%20th%C6%B0%E1%BB%9Fng%20-%20Gif/dich%20v%E1%BB%A5/nijYzYWqiq_1623164431.gif" alt="ban-vang-tu-dong" class="entries_item-img">--}}
{{--                                                    <h2 class="text-title">Bán Vàng Tự Động NRO</h2>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-1" style="display: block">--}}
{{--                                                <a href="/dich-vu/lam-de-san-de">--}}
{{--                                                    <img src="//backend.dev.tichhop.pro/storage/upload/images/Avatar%20Gi%E1%BA%A3i%20th%C6%B0%E1%BB%9Fng%20-%20Gif/dich%20v%E1%BB%A5/pneRsSb1BU_1626075373.gif" alt="lam-de-san-de" class="entries_item-img">--}}
{{--                                                    <h2 class="text-title">Làm Đệ - Săn Đệ NRO</h2>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-1" style="display: block">--}}
{{--                                                <a href="/dich-vu/lam-nhiem-vu-nro">--}}
{{--                                                    <img src="//backend.dev.tichhop.pro/storage/upload/images/Avatar%20Gi%E1%BA%A3i%20th%C6%B0%E1%BB%9Fng%20-%20Gif/dich%20v%E1%BB%A5/iIrZycTALV_1623294112.gif" alt="lam-nhiem-vu-nro" class="entries_item-img">--}}
{{--                                                    <h2 class="text-title">Làm Nhiệm Vụ NRO</h2>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-1" style="display: block">--}}
{{--                                                <a href="/dich-vu/up-suc-manh-de-tu-nro">--}}
{{--                                                    <img src="//backend.dev.tichhop.pro/storage/upload/images/Avatar%20Gi%E1%BA%A3i%20th%C6%B0%E1%BB%9Fng%20-%20Gif/dich%20v%E1%BB%A5/bHhkJqAKlB_1623164417.gif" alt="up-suc-manh-de-tu-nro" class="entries_item-img">--}}
{{--                                                    <h2 class="text-title">Úp Sức Mạnh Đệ Tử NRO</h2>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-2" style="display: none">--}}
{{--                                                <a href="/dich-vu/up-bi-kip-cai-trang-yardrat">--}}
{{--                                                    <img src="//backend.dev.tichhop.pro/storage/upload/images/Avatar%20Gi%E1%BA%A3i%20th%C6%B0%E1%BB%9Fng%20-%20Gif/dich%20v%E1%BB%A5/6JMeECUSjw_1623212937.gif" alt="up-bi-kip-cai-trang-yardrat" class="entries_item-img">--}}
{{--                                                    <h2 class="text-title">Úp Bí Kíp - Cải Trang Yardrat NRO</h2>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-2" style="display: none">--}}
{{--                                                <a href="/dich-vu/up-suc-manh-su-phu-nro">--}}
{{--                                                    <img src="//backend.dev.tichhop.pro/storage/upload/images/Avatar%20Gi%E1%BA%A3i%20th%C6%B0%E1%BB%9Fng%20-%20Gif/dich%20v%E1%BB%A5/7iOrQTsWpT_1623164498.gif" alt="up-suc-manh-su-phu-nro" class="entries_item-img">--}}
{{--                                                    <h2 class="text-title">Úp Sức Mạnh Sư Phụ NRO</h2>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}


{{--                                            <button id="btn-expand-serivce" class="expand-button" data-page-current="1" data-page-max="2">Xem thêm dịch vụ</button>--}}

{{--                                        </div>--}}


{{--                                        <div class="entries-search">--}}
{{--                                            <div class="row fix-border ">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END: BLOG LISTING  -->

            <!-- END: PAGE CONTENT -->

        </div><!-- /.container -->
    </section>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#btn-expand-serivce').on('click', function(e) {
                var pageCurrrent=$(this).data('page-current');
                var pageMax=$(this).data('page-max');
                pageCurrrent=pageCurrrent+1;
                $('.item-page-'+pageCurrrent).fadeIn( "fast", function() {
                    // Animation complete
                });
                $(this).data('page-current',pageCurrrent);
                if(pageCurrrent==pageMax){
                    $(this).remove();
                }
            });
        });

    </script>
@endsection


