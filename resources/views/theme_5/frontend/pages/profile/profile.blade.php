@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('content')
    <div class="content background-history">
        <div class="container c-container c-py-16">
            @include('frontend.layouts.components.sidebar')
        </div>
    </div>
@endsection
