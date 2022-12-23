@if(isset($data))
<div class="container">
    <div id="banner">
        <div class="c-content-box">
            <div id="slider" class="owl-theme section section-cate slideshow_full_width ">
                <div id="slide_banner" class="owl-carousel owl-loaded owl-drag">

                    <div class="owl-stage-outer" data-position="0">
                        <div class="owl-stage" style="transform: translate3d(-2220px, 0px, 0px); transition: all 0.25s ease 0s; width: 5550px;">
                            @foreach($data??[] as $item)
                            <div class="owl-item cloned" style="width: 1110px;">
                                <div class="item">
                                    <a href="#" alt="mua thẻ garena bảo mật, nhanh chóng, tiện lợi">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="mua thẻ garena bảo mật, nhanh chóng, tiện lợi">
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="owl-nav disabled" data-position="1">
                        <button type="button" role="presentation" class="owl-prev">
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <button type="button" role="presentation" class="owl-next">
                            <i class="fa fa-angle-right right_button" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="owl-dots disabled" data-position="2">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
