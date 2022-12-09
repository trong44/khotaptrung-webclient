@if(isset($data->custom->content))

    <section>
        <div class="font-detail-service container container-fix body-container-ct">
            <div class="row marginauto body-container-row-ct">
                <div class="col-md-12 left-right detailViewBlock">
                    <div class="row marginauto body-row-ct footer-row-ct">
                        <div class="col-md-12 left-right">
                            <span class="detailViewBlockTitle">Chi tiết dịch vụ</span>
                        </div>
                        @if(substr($data->custom->content,1200))
                        <div class="col-md-12 left-right footer-row-col-ct content-video-in content-video-in-add detailViewBlockContent">
                        @else
                        <div class="col-md-12 left-right footer-row-col-ct content-video-in  detailViewBlockContent">
                        @endif
                            {!!  $data->custom->content !!}
                        </div>
                        @if(substr($data->custom->content,1200))
                        <div class="col-md-12 left-right text-center js-toggle-content noselect">
                            <div class="view-more">
                                <a href="javascript:void(0)" class="global__link__default">Xem thêm<i class="__icon__default --sm__default --link__default ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/xemthem.svg)"></i></a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                </div>

            </div>
        </div>
    </section>
@else

    @if(isset($data->content))
        <section>
            <div class="font-detail-service container container-fix body-container-ct">
                <div class="row marginauto body-container-row-ct">
                    <div class="col-md-12 left-right detailViewBlock">
                        <div class="row marginauto body-row-ct footer-row-ct">
                            <div class="col-md-12 left-right">
                                <span class="detailViewBlockTitle">Chi tiết dịch vụ</span>
                            </div>
                            @if(substr($data->content,1200))
                            <div class="col-md-12 left-right footer-row-col-ct content-video-in content-video-in-add detailViewBlockContent">
                            @else
                            <div class="col-md-12 left-right footer-row-col-ct content-video-in  detailViewBlockContent">
                            @endif
                                {!!  $data->content !!}
                            </div>
                            @if(substr($data->content,1200))
                            <div class="col-md-12 left-right text-center js-toggle-content noselect">
                                <div class="view-more">
                                    <a href="javascript:void(0)" class="global__link__default">Xem thêm<i class="__icon__default --sm__default --link__default ml-1" style="--path : url(/assets/frontend/{{theme('')->theme_key}}/image/svg/xemthem.svg)"></i></a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            </div>
        </section>
    @endif
@endif
<style>
    .font-detail-service a small span p{
        font-family: 'Open Sans' !important;
    }
</style>
