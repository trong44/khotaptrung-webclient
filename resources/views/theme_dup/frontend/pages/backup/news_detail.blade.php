@extends('frontend.theme_1.layouts.master')
@section('content')
    <div class="news">
        <div class="news_content">
            <div class="container">
                <div class="row " >
                    <div class="col-md-12 col-sm-12">
                        <div class="news_detail">
                            <div class="news_detail_content">
                                {!! $data->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--    aaaaaaaaaaaa--}}
