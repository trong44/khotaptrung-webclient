@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow"/>
@endsection
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
            @include('frontend.widget.__list__service__mobile')


        </div>
    </div>

@endsection
