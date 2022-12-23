@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('content')
    <section>
        <div class="container">
            <nav aria-label="breadcrumb" style="margin-top: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="/mua-acc">Mua acc</a></li>
                </ol>
            </nav>
            <div class="acc-category-block">
                <div class="acc-category-block-header d-flex justify-content-between align-items-center">
                    <div class="main-title">Danh sách mục Shop Account</div>
                    <div class="service-search d-none d-lg-block">
                        <div class="input-group p-box">
                            <input type="text" id="txtSearchNick" placeholder="Tìm danh mục" value="" class="" width="200px">
                            <span class="icon-search"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>

                @if(isset($data) && count($data) > 0)
                    <div class="acc-category-list">
                        <div class="row">
                            <div class="col-12 data-nick-search" style="display: none;">
                                <span style="color: rgb(238, 70, 35);">Dịch vụ cần tìm không tồn tại.</span>
                            </div>
                            @foreach($data as $key => $item)
                                <div class="col-lg-3 col-6 list-item list-item-nick">
                                    <a href="/mua-acc/{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}">
                                        <img src="{{ isset($item->custom->image) ? \App\Library\MediaHelpers::media($item->custom->image) :  \App\Library\MediaHelpers::media($item->image) }}"
                                             alt="{{ isset($item->custom->slug) && $item->custom->slug != '' ? $item->custom->slug :  $item->slug }}" class="list-item-img">
                                        <h2 class="text-title text-left">{{ isset($item->custom->title) ? $item->custom->title :  $item->title }}</h2>
            
                                        @if(isset($item->items_count))
                                            @if((isset($item->account_fake) && $item->account_fake > 1) || (isset($item->custom->account_fake) && $item->custom->account_fake > 1))
                                                <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ str_replace(',','.',number_format(round(isset($item->custom->account_fake) ? $item->items_count*$item->custom->account_fake : $item->items_count*$item->account_fake))) }} </p>
                                            @else
                                                <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: {{ $item->items_count }} </p>
                                            @endif
            
                                        @else
                                            <p class="text-left" style="margin-bottom: 0;margin-top: 4px">Số tài khoản: 0 </p>
                                        @endif
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/account/category.js?v={{time()}}"></script>
@endsection