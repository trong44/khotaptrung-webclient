{{--@extends('frontend.layouts.master')--}}
{{--@section('content')--}}
    <div class="sidebar">
        <div class="sidebar-section d-flex brs-12 c-mb-16">
            <div class="sidebar-section-avt brs-100 c-mr-12">
                <img src="/assets/frontend/theme_5/image/nam/avatar.png" alt="" class="brs-100">
            </div>
            <div class="sidebar-section-info">
                <p class="sidebar-section-title c-mb-4 fz-15 fw-500 " id="account-name"></p>
                <p class="sidebar-section-info-text c-mb-4 fz-13 fw-500 " id="account-balance"></p>
{{--                <p class="sidebar-section-info-text c-mb-4 fz-13 fw-500">Xu khóa: <span>100.000 xu</span></p>--}}
                <p class="sidebar-section-info-text mb-0 fz-13 fw-500" id="account-id"></p>
            </div>
        </div>
        <div class="sidebar-section brs-12 c-mb-16">
            <div class="sidebar-item active">
                <a href="javascript:void(0);" class="d-block align-items-center d-flex">
                    <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="sidebar-item-text fw-400 fz-12 mb-0">Thông tin tài khoản</p>
                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sidebar_arrow_right.svg" alt="">
                </a>
            </div>
            <div class="sidebar-item-partition d-flex c-my-8"></div>
            <div class="sidebar-item">
                <a href="javascript:void(0);" class="d-block align-items-center d-flex">
                    <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="sidebar-item-text fw-400 fz-12 mb-0">Đổi mật khẩu</p>
                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sidebar_arrow_right.svg" alt="">
                </a>
            </div>
        </div>
        <div class="sidebar-section brs-12 c-mb-16">
            <p class="sidebar-section-title c-mb-16 fz-15 fw-500">Quản lý giao dịch</p>
            <div class="d-flex justify-content-between">
                <div class="sidebar-item sidebar-item-col active">
                    <a href="javascript:void(0);" class=" d-flex flex-column align-items-center">
                        <div class="sidebar-item-icon brs-8 c-p-8 c-mb-8">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        </div>
                        <div class="sidebar-transaction-item-text fw-400 fz-12 mb-0">Nạp tiền</div>
                    </a>
                </div>
                <div class="sidebar-item sidebar-item-col">
                    <a href="javascript:void(0);" class=" d-flex flex-column align-items-center">
                        <div class="sidebar-item-icon brs-8 c-p-8 c-mb-8">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        </div>
                        <div class="sidebar-transaction-item-text fw-400 fz-12 mb-0" style="width: 56%;">Rút tiền ATM - Ví điện tử</div>
                    </a>
                </div>
                <div class="sidebar-item sidebar-item-col">
                    <a href="javascript:void(0);" class=" d-flex flex-column align-items-center">
                        <div class="sidebar-item-icon brs-8 c-p-8 c-mb-8">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        </div>
                        <div class="sidebar-transaction-item-text fw-400 fz-12 mb-0">Rút vật phẩm</div>
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar-section brs-12 c-mb-16">
            <p class="sidebar-section-title fz-15 fw-500 c-mb-16">Lịch sử giao dịch</p>
            <div class="sidebar-item">
                <a href="javascript:void(0);" class="d-block align-items-center d-flex">
                    <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="sidebar-item-text fw-400 fz-12 mb-0">Biến động số dư</p>
                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sidebar_arrow_right.svg" alt="">
                </a>
            </div>
            <div class="sidebar-item-partition d-flex c-my-8"></div>
            <div class="sidebar-item">
                <a href="javascript:void(0);" class="d-block align-items-center d-flex">
                    <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử nạp thẻ</p>
                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sidebar_arrow_right.svg" alt="">
                </a>
            </div>
            <div class="sidebar-item-partition d-flex c-my-8"></div>
            <div class="sidebar-item">
                <a href="javascript:void(0);" class="d-block align-items-center d-flex">
                    <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử nạp ATM tự động</p>
                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sidebar_arrow_right.svg" alt="">
                </a>
            </div>
            <div class="sidebar-item-partition d-flex c-my-8"></div>
            <div class="sidebar-item">
                <a href="javascript:void(0);" class="d-block align-items-center d-flex">
                    <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="sidebar-item-text fw-400 fz-12 mb-0">Thẻ cào đã mua</p>
                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sidebar_arrow_right.svg" alt="">
                </a>
            </div>
            <div class="sidebar-item-partition d-flex c-my-8"></div>
            <div class="sidebar-item">
                <a href="javascript:void(0);" class="d-block align-items-center d-flex">
                    <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="sidebar-item-text fw-400 fz-12 mb-0">Dịch vụ đã mua</p>
                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sidebar_arrow_right.svg" alt="">
                </a>
            </div>
            <div class="sidebar-item-partition d-flex c-my-8"></div>
            <div class="sidebar-item">
                <a href="javascript:void(0);" class="d-block align-items-center d-flex">
                    <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="sidebar-item-text fw-400 fz-12 mb-0">Lịch sử quay thưởng</p>
                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sidebar_arrow_right.svg" alt="">
                </a>
            </div>
            <div class="sidebar-item-partition d-flex c-my-8"></div>
            <div class="sidebar-item">
                <a href="javascript:void(0);" class="d-block align-items-center d-flex">
                    <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="sidebar-item-text fw-400 fz-12 mb-0">Tài khoản đã mua</p>
                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sidebar_arrow_right.svg" alt="">
                </a>
            </div>
            <div class="sidebar-item-partition d-flex c-my-8"></div>
            <div class="sidebar-item">
                <a href="javascript:void(0);" class="d-block align-items-center d-flex">
                    <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.12 12.78C12.05 12.77 11.96 12.77 11.88 12.78C10.12 12.72 8.71997 11.28 8.71997 9.50998C8.71997 7.69998 10.18 6.22998 12 6.22998C13.81 6.22998 15.28 7.69998 15.28 9.50998C15.27 11.28 13.88 12.72 12.12 12.78Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.74 19.3801C16.96 21.0101 14.6 22.0001 12 22.0001C9.40001 22.0001 7.04001 21.0101 5.26001 19.3801C5.36001 18.4401 5.96001 17.5201 7.03001 16.8001C9.77001 14.9801 14.25 14.9801 16.97 16.8001C18.04 17.5201 18.64 18.4401 18.74 19.3801Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#434657" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <p class="sidebar-item-text fw-400 fz-12 mb-0">Tài khoản trả góp</p>
                    <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/svg/sidebar_arrow_right.svg" alt="">
                </a>
            </div>
        </div>
        <div class="sidebar-section brs-12 c-mb-16">
            <div class="sidebar-item log-out-button">
                <a href="javascript:void(0);" class="d-block align-items-center d-flex">
                    <div class="sidebar-item-icon brs-8 c-p-8 c-mr-12">
                        <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/nam/log-out.svg" alt="" style="width: 24px;height: 24px">
                    </div>
                    <p class="sidebar-item-text fw-400 fz-12 mb-0">Đăng xuất</p>
                </a>
            </div>
        </div>
    </div>

<form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
    @csrf
</form>
{{--@endsection--}}
