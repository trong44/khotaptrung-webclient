@extends('frontend.layouts.master')

@section('content')
    {{--  Header mobile  --}}
    <section class="media-mobile">
        <div class="container container-fix banner-mobile-container-ct">

            <div class="row marginauto banner-mobile-row-ct">
                <div class="col-auto left-right" style="width: 10%">
                    <a href="" class="previous-step-one" style="line-height: 28px">
                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/back.png" alt="" >
                    </a>
                </div>

                <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                    <h3>Danh sách Nick</h3>
                </div>
                <div class="col-auto left-right" style="width: 10%">
                </div>
            </div>

        </div>
    </section>

    {{--    Banner--}}

    {{--  Menu  --}}
    <section class="media-web">
        <div class="container container-fix menu-container-ct">
            <ul>
                <li><a href="">Trang chủ</a></li>
                <li class="menu-container-li-ct"><img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="">Danh mục Shop Account</a></li>
                <li class="menu-container-li-ct"><img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="">Liên quân mobile</a></li>
                <li class="menu-container-li-ct"><img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/arrow-right.png" alt=""></li>
                <li class="menu-container-li-ct"><a href="">Danh sách Nick</a></li>
            </ul>
        </div>
    </section>

    {{--   Bopđyy --}}
    <section>
        <div class="container container-fix body-container-ct">
            <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">

                <div class="col-md-12 left-right">
                    <div class="row marginauto nick-list-bg" style="background: #FFFFFF">
                        <div class="col-md-12 left-right">
                            <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/list-nick-bg.png" alt="">
                        </div>
                    </div>
                    <div class="row marginauto body-row-nick-ct">

                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-header-ct">
                                <div class="col-auto left-right">
                                    <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/caythue.png" alt="">
                                </div>
                                <div class="col-md-10 col-10 body-header-col-ct">
                                    <h3>Danh sách Nick Liên quân Mobile</h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-search-ct">
                                <div class="col-md-12 text-left left-right">
                                    <span>Tìm kiếm</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right media-web">

                            <div class="row marginauto">
                                <div class="col-12 left-right">
                                    <form action="" method="POST">
                                        <div class="row marginauto body-form-search-ct">
                                            <div class="col-auto left-right">
                                                <input autocomplete="off" type="text" name="search" class="input-search-ct" placeholder="Nhập từ khóa">
                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/search.png" alt="">
                                            </div>
                                            <div class="col-4 body-form-search-button-ct">
                                                <button type="submit" class="timkiem-button-ct">Tìm kiếm</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 left-right">

                                    <div class="row marginauto justify-content-end nick-findter-row">

                                        <div class="col-auto nick-findter" style="position: relative">
                                            <ul>
                                                <li class="li-boloc">Bộ lọc</li>
                                                <li class="margin-findter"><img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/filter.png" alt="">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row marginauto nick-findter-data">
{{--                                        <div class="col-auto prepend-nick" style="position: relative"><a href="">Từ 500K - 1 Triệu</a><img class="lazy close-item-nick" src="/assets/{{env('THEME_VERSION')}}/image/nick/close.png" alt=""></div>--}}
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12 left-right media-mobile">
                            <div class="row marginauto">
                                <div class="col-12 left-right">
                                    <form action="" method="POST">
                                        <div class="row marginauto body-form-search-ct">
                                            <div class="col-12 left-right">
                                                <input autocomplete="off" type="text" name="search-mobile" class="input-search-ct" placeholder="Nhập từ khóa">
                                                <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/search.png" alt="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-12 left-right">
                                    <div class="row marginauto mobile-find">
                                        <div class="col-8 left-right">
                                            <select class="wide price" name="price">
                                                <option>Sắp xếp theo</option>
                                                <option value="0">Khuyến mãi tốt nhất</option>
                                                <option value="1">Bán chạy nhất</option>
                                                <option value="2">Mới về</option>
                                                <option value="3">Giá tăng dần</option>
                                                <option value="4">Giá giảm dần</option>
                                            </select>
                                        </div>
                                        <div class="col-auto left-right nick-findter" style="margin-left: auto">
                                            <ul>
                                                <li>Bộ lọc</li>
                                                <li><img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/filter.png" alt=""></li>
                                            </ul>
                                        </div>

                                    </div>

                                    <div class="row marginauto nick-findter-data">
                                        {{--                                        <div class="col-auto prepend-nick" style="position: relative"><a href="">Từ 500K - 1 Triệu</a><img class="lazy close-item-nick" src="/assets/{{env('THEME_VERSION')}}/image/nick/close.png" alt=""></div>--}}
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-12 left-right media-web">
                            <div class="row marginauto body-search-ct sort-nick">
                                <div class="col-auto text-left left-right sort-nick-left">
                                    <span>Sắp xếp theo</span>
                                </div>
                                <div class="col-auto left-right sort-nick-right">
                                    <div class="row marginauto">
                                        <div class="col-auto left-right item-sort-nick">
                                            <input id="sort-1" class="sort" type="radio" name="sort" value="1" style="display: none">
                                            <label for="sort-1" class="item-sort-nick-label">
                                                <span>Khuyến mãi tốt nhất</span>
                                            </label>
                                        </div>
                                        <div class="col-auto left-right item-sort-nick">
                                            <input checked id="sort-2" class="sort" type="radio" name="sort" value="2" style="display: none">
                                            <label for="sort-2" class="item-sort-nick-label">
                                                <span>Bán chạy nhất</span>
                                            </label>
                                        </div>
                                        <div class="col-auto left-right item-sort-nick">
                                            <input checked id="sort-32" class="sort" type="radio" name="sort" value="3" style="display: none">
                                            <label for="sort-3" class="item-sort-nick-label">
                                                <span>Mới về</span>
                                            </label>
                                        </div>
                                        <div class="col-auto left-right item-sort-nick">
                                            <input checked id="sort-4" class="sort" type="radio" name="sort" value="4" style="display: none">
                                            <label for="sort-4" class="item-sort-nick-label">
                                                <span>Giá tăng dần</span>
                                            </label>
                                        </div>
                                        <div class="col-auto left-right item-sort-nick">
                                            <input checked id="sort-5" class="sort" type="radio" name="sort" value="5" style="display: none">
                                            <label for="sort-5" class="item-sort-nick-label">
                                                <span>Giá giảm dần</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-detail-ct">

                                <div class="col-md-12 text-left left-right">
                                    <div class="row body-detail-row-ct">
                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-auto body-detail-nick-col-ct">
                                            <a href="" class="list-item-nick-hover">
                                                <div class="row marginauto list-item-nick">
                                                    <div class="col-md-12 left-right default-overlay-nick-ct">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/image-nick.png" alt="">
                                                    </div>
                                                    <div class="col-md-12 left-right">
                                                        <div class="row marginauto list-item-nick-body">
                                                            <div class="col-md-12 left-right text-left body-detail-account-col-span-ct">
                                                                <span>Nick ngon giá rẻ</span>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>ID: #1365898</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Rank: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Tướng: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <small>Ngọc: 91</small>
                                                            </div>
                                                            <div class="col-md-12 left-right text-left body-detail-account-small-span-ct">
                                                                <ul>
                                                                    <li class="fist-li-account">15.000đ</li>
                                                                    <li class="second-li-account">30.000đ</li>
                                                                    <li class="three-li-account">-50%</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right justify-content-end default-paginate">

                                    <div class="row marinautooo justify-content-center">
                                        <div class="col-auto">
                                            <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                                                <ul class="pagination pagination-sm">

                                                    <li class="page-item disabled">
                                                        <span class="page-link">
                                                            <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/back.png" alt="">
                                                        </span>
                                                    </li>

                                                    <li class="page-item active"><span class="page-link">1</span></li>
                                                    <li class="page-item"><a class="page-link" href="https://webnick.vn/mua-acc/nick-lien-quan?page=2">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="https://webnick.vn/mua-acc/nick-lien-quan?page=3">3</a></li>

                                                    <li class="page-item disabled hidden-xs"><span class="page-link">...</span></li>

                                                    <li class="page-item hidden-xs"><a class="page-link" href="https://webnick.vn/mua-acc/nick-lien-quan?page=14">14</a></li>


                                                    <li class="page-item">
                                                        <a class="page-link" href="https://webnick.vn/mua-acc/nick-lien-quan?page=2" rel="next">
                                                            <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/nick/forward.png" alt="">
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="media-mobile">
        <div class="row marginauto intermediary-ct" style="height: 20px;background: #EFEFEF">

        </div>
    </section>
    <section class="bottom-container-ct">
        <div class="container container-fix body-container-ct">
            <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">
                <div class="col-md-12 left-right">
                    <div class="row marginauto body-row-ct media-ctbg-ct">

                        <div class="col-md-12 left-right napgamekhac">
                            <div class="row marginauto">
                                <div class="col-md-12 text-left left-right">
                                    <span>Nạp tài khoản game khác</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 left-right">
                            <div class="row marginauto body-detail-ct">
                                <div class="swiper-container list-nap-game col-md-12 text-left left-right">
                                    <div class="swiper-wrapper">

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/lienquan.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Liên quân Mobile</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/freefire.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Garena freefire</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/bubg.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>PUBG Mobile</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/lmht.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Liên Minh Huyền Thoại</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/tocchien.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Tốc chiến</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/autochest.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Auto Chess</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/bangbang.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Bang Bang</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/cyber.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Cyber Punk 2077</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/csgo.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>CSGO</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/freefire.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Garena freefire</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/bubg.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>PUBG Mobile</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/lmht.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Liên Minh Huyền Thoại</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/tocchien.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Tốc chiến</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/autochest.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Auto Chess</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/bangbang.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Bang Bang</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="swiper-slide body-detail-ctng-col-ct">
                                            <div class="row marginauto hover-overlay-ct">
                                                <div class="col-md-12 left-right default-overlay-ct">
                                                    <a href="">
                                                        <img class="lazy" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/cyber.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="col-md-12 left-right text-center body-detail-col-span-ct">
                                                    <a href="">
                                                        <span>Cyber Punk 2077</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="modal fade login show order-modal" id="openFinter" aria-modal="true">

        <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
            <!--        <div class="image-login"></div>-->
            <div class="modal-content">
                <div class="modal-header p-0" style="border-bottom: 0">
                    <div class="row marginauto modal-header-nick-ct">
                        <div class="col-12 left-right text-left" style="position: relative">
                            <span>Bộ lọc</span>
                            <img class="lazy img-close-nick-ct" src="/assets/{{env('THEME_VERSION')}}/image/cay-thue/close.png" alt="">
                        </div>
                    </div>

                </div>

                <div class="modal-body modal-body-order-ct">
                    <form action="">
                        <div class="row marginauto">

                            <div class="col-md-12 left-right">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct">
                                        <small>Mã số</small>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct">
                                        <input autocomplete="off" class="input-defautf-ct id" type="text" placeholder="Nhập mã số">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right modal-nick-padding">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct">
                                        <small>Giá tiền</small>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct price-finter-nick">
                                        <select class="wide price" name="price">
                                            <option>Chọn giá tiền</option>
                                            <option value="0-50000">Dưới 50K</option>
                                            <option value="50000-200000">Từ 50K - 200K</option>
                                            <option value="200000-500000">Từ 200K - 500K</option>
                                            <option value="500000-1000000">Từ 500K - 1 Triệu</option>
                                            <option value="1000000-5000000">Trên 1 Triệu</option>
                                            <option value="5000000-10000000">Trên 5 Triệu</option>
                                            <option value="10000000">Trên 10 Triệu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right modal-nick-padding">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct">
                                        <small>Trạng thái</small>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct status-finter-nick">
                                        <select class="wide status" name="status">
                                            <option>Chọn trạng thái</option>
                                            <option value="1">Chưa bán</option>
                                            <option value="2">Đã bán</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right modal-nick-padding">
                                <div class="row marginauto">
                                    <div class="col-12 left-right background-nick-col-top-ct">
                                        <small>Rank</small>
                                    </div>
                                    <div class="col-12 left-right background-nick-col-bottom-ct rank-finter-nick">
                                        <select class="wide rank" name="rank">
                                            <option>Chọn rank</option>
                                            <option value="3">Vàng 4</option>
                                            <option value="4">Vàng 5</option>
                                            <option value="5">Vàng 6</option>
                                            <option value="5">Vàng 7</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 left-right modal-nick-padding">
                                <div class="row marginauto">
                                    <div class="col-auto left-right background-nick-select-left-ct">
                                        <small>Ngọc 90</small>
                                    </div>
                                    <div class="col-auto left-right background-nick-select-right-ct">
                                        <div class="default-select-ratio">
                                            <div class="switch">
                                                <input id="gem" name="switch" type="checkbox" value="1" data-title="Ngọc 90" class="switch-input switch-input-1" >
                                                <label for="gem" class="switch-label">Switch</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 left-right modal-nick-padding">
                                <div class="row marginauto">
                                    <div class="col-auto left-right background-nick-select-left-ct">
                                        <small>Nick có tướng trong đá quý</small>
                                    </div>
                                    <div class="col-auto left-right background-nick-select-right-ct">
                                        <div class="default-select-ratio">
                                            <div class="switch">
                                                <input id="hero" name="switch" type="checkbox" data-title="Nick có tướng trong đá quý" value="2" class="switch-input switch-input-2" >
                                                <label for="hero" class="switch-label">Switch</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right modal-nick-padding">
                                <div class="row marginauto">
                                    <div class="col-auto left-right background-nick-select-left-ct">
                                        <small>Nick có trang phục trong đá quý</small>
                                    </div>
                                    <div class="col-auto left-right background-nick-select-right-ct">
                                        <div class="default-select-ratio">
                                            <div class="switch">
                                                <input id="skill" name="switch" type="checkbox" data-title="Nick có trang phục trong đá quý" value="3" class="switch-input switch-input-3" >
                                                <label for="skill" class="switch-label">Switch</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right padding-nicks-footer-ct">

                                <div class="row marginauto justify-content-center">
                                    <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                        <div class="row marginauto modal-footer-success-row-not-ct">
                                            <div class="col-md-12 left-right">
                                                <a href="javascript:void(0)" class="button-not-bg-ct reset-find"><span>Thiết lập lại</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                        <div class="row marginauto">
                                            <div class="col-md-12 left-right">
                                                <button class="button-default-modal-ct button-modal-nick openSuccess" type="button">Áp dụng</button>
                                            </div>
                                        </div>
{{--                                        <div class="row marginauto modal-footer-success-row-ct">--}}
{{--                                            <div class="col-md-12 left-right">--}}
{{--                                                <a href="/" class="button-bg-ct"><span>Hỗ Trợ</span></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>



                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <script src="/assets/{{env('THEME_VERSION')}}/js/nick/nick.js?v={{time()}}"></script>
@endsection





