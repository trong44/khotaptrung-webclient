@extends('frontend.layout.master')
@section('content')
    <div id="profile" style="margin-top: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                    <div class="profile-menu">
                        <div id="m_ver_menu"
                             class="m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark m-scroller ps"
                             m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500"
                             style="height: 357px; overflow: hidden;">
                            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                                <li class="m-menu__item " aria-haspopup="true"><a href=" https://muathegarena.com/user/profile " class="m-menu__link m-menu__link__user">
                                        <i class="m-menu__link-icon fas fa-user"></i>
                                        <span class="m-menu__link-text" style="padding-left: inherit">Thông tin cá nhân</span>
                                    </a>
                                </li>
                                <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                    <a href="javascript:void(0)" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fas fa-handshake"></i>
                                        <span class="m-menu__link-text" style="padding-left: inherit">Lịch sử giao dịch <span style="padding-left: 18px"></span><i class="fa-solid fa-angle-right"></i></span>
                                    </a>

                                    <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                                        <ul class="m-menu__subnav">
                                            <li class="m-menu__item " aria-haspopup="true"><a href=" https://muathegarena.com/user/tran-log " class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Lịch sử giao dịch</span></a></li>
                                            <li class="m-menu__item " aria-haspopup="true"><a href=" https://muathegarena.com/deposit-history " class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thẻ cào đã nạp</span></a></li>
                                            <li class="m-menu__item " aria-haspopup="true"><a href=" https://muathegarena.com/mua-the/log " class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Thẻ cào đã mua</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; right: 4px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="content-profile">
                        <h3>LỊCH SỬ GIAO DỊCH</h3>
                        <hr class="lines">
                        <form action="https://muathegarena.com/user/tran-log" class="form-horizontal form-find m-b-20"
                              role="form" method="get">
                            <div class="row mb-3">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group m-form__group">
                                        <div class="input-group m-input-group date date-picker" data-rtl="false">
                                            <div class="input-group-prepend"><span
                                                    class="input-group-text">Từ ngày</span></div>
                                            <input type="text" class="form-control c-square c-theme" id="m_datepicker_1"
                                                   name="started_at" autocomplete="off" data-date-format="dd/mm/yyyy"
                                                   placeholder="Từ ngày" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group m-form__group">
                                        <div class="input-group m-input-group date date-picker"
                                             data-date-format="dd/mm/yyyy" data-rtl="false">
                                            <div class="input-group-prepend"><span
                                                    class="input-group-text">Đến ngày</span></div>
                                            <input type="text" class="form-control c-square c-theme" id="m_datepicker_1"
                                                   name="ended_at" autocomplete="off" data-date-format="dd/mm/yyyy"
                                                   placeholder="Đến ngày" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="input-group m-input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Giao dịch</span>
                                        </div>
                                        <select id="group_id" name="trade_type" class="form-control c-square c-theme">
                                            <option value="">-- Tất cả --</option>
                                            <option value="1">Nạp thẻ tự động</option>
                                            <option value="6">Cộng tiền</option>
                                            <option value="7">Trừ tiền</option>
                                            <option value="14">Thanh toán mua thẻ</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <input style="font-family: 'Nunito', sans-serif" type="submit"
                                           class="btn btn-success btn-sm m-btn m-btn--custom" value="Tìm kiếm">
                                    <a style="font-family: 'Nunito', sans-serif"
                                       class="btn btn-danger btn-sm m-btn m-btn--custom"
                                       href="https://muathegarena.com/user/tran-log">Tất cả</a>
                                </div>
                            </div>


                        </form>
                        <div id="content-cart" class="m-portlet__body">
                            <div style="overflow-x: auto" class="tab-content">
                                <table class="table">
                                    <thead class="thead-inverse">
                                    <tr>
                                        <th>Thời gian</th>
                                        <th>ID</th>
                                        <th>Tài khoản</th>
                                        <th>Giao dịch</th>
                                        <th>Số tiền</th>
                                        <th>Số dư cuối</th>
                                        <th>Nội dung</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody style="font-weight: bold">
                                    </tbody>
                                </table>
                                <div class="data_paginate paging_bootstrap paginations_custom"
                                     style="text-align: center">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
