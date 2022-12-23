@extends('frontend.layouts.master')

@section('content')
    <div class="container c-container" id="servicemobile">
        <div class="container c-container pl-0 pr-0">
            <input type="search" placeholder="Tìm kiếm" class="search c-mt-16">
            {{--            Slider banner    --}}
            <div class="">
                @include('frontend.widget.__slider__banner')
            </div>

            <div class="servicemobile--title c-pb-8 c-mt-28">
                <h3 class="fw-700 lh-24 fz-15 mb-0">Danh mục dịnh vụ</h3>
            </div>
            <div class="menu-category">
                <ul class="row px-0 menu-category_fixm ">

                    <li class="col-4 c-px-8 c-pt-8 c-pb-8">
                        <a href="/mua-the"  >
                            <div class=" c-pt-10 c-pb-10 brs-8 menu-category-item justify-content-center">
                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/nam/storecard.svg" alt="" >
                                <p class="fw-400 mb-0 text-primary-color">Mua thẻ</p>
                            </div>
                        </a>
                    </li>

                    <li class="col-4 c-px-8 c-pt-8 c-pb-8">
                        <a href="/nap-the"  >
                            <div class=" c-pt-10 c-pb-10 brs-8 menu-category-item justify-content-center">
                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/nam/charge.svg" alt="">
                                <p class="fw-400 mb-0 text-primary-color">Nạp thẻ</p>
                            </div>
                        </a>
                    </li>



                    <li class="col-4 c-px-8 c-pt-8 c-pb-8">
                        <a href="/recharge-atm"  >
                            <div class=" c-pt-10 c-pb-10 brs-8 menu-category-item justify-content-center">
                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/nam/recharge-atm.svg" alt="" >
                                <p class="fw-400 mb-0 text-primary-color">Nạp ATM -ví</p>
                            </div>
                        </a>
                    </li>

                    <li class="col-4 c-px-8 c-pt-8 c-pb-8">
                        <a href="/minigame"  >
                            <div class=" c-pt-10 c-pb-10 brs-8 menu-category-item justify-content-center">
                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/nam/vongquay.svg" alt="" >
                                <p class="fw-400 mb-0 text-primary-color">Vòng quay</p>
                            </div>
                        </a>
                    </li>

                    <li class="col-4 c-px-8 c-pt-8 c-pb-8">
                        <a href="/mua-acc"  >
                            <div class=" c-pt-10 c-pb-10 brs-8 menu-category-item justify-content-center">
                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/nam/mua-acc.svg" alt="" >
                                <p class="fw-400 mb-0 text-primary-color">Shop Acc</p>
                            </div>
                        </a>
                    </li>

                    <li class="col-4 c-px-8 c-pt-8 c-pb-8">
                        <a href="/dich-vu"  >
                            <div class=" c-pt-10 c-pb-10 brs-8 menu-category-item justify-content-center">
                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/nam/service-game.svg" alt="" >
                                <p class="fw-400 mb-0 text-primary-color">Dịch vụ Game</p>
                            </div>
                        </a>
                    </li>
                    <li class="col-4 c-px-8 c-pt-8 c-pb-8">
                        <a href="/minigame"  >
                            <div class=" c-pt-10 c-pb-10 brs-8 menu-category-item justify-content-center">
                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/nam/minigame.svg" alt="" >
                                <p class="fw-400 mb-0 text-primary-color">Mini Game</p>
                            </div>
                        </a>
                    </li>

                    <li class="col-4 c-px-8 c-pt-8 c-pb-8">
                        <a href="/tin-tuc"  >
                            <div class=" c-pt-10 c-pb-10 brs-8 menu-category-item justify-content-center">
                                <img src="/assets/frontend/{{env('THEME_VERSION')}}/image/nam/news.svg" alt="" >
                                <p class="fw-400 mb-0 text-primary-color">Tin tức</p>
                            </div>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </div>

@endsection
