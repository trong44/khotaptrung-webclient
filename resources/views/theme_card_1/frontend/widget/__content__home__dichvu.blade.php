@if(isset($data) && count($data) > 0)
    @php
        $total_key_service = 8;
        $flag_slide_service = 0;
        if(setting('sys_theme_service_list') != ''){
            if (setting('sys_theme_service_list') > 1){
                $total_key_service = (int)setting('sys_theme_service_list')*4;
            }elseif (setting('sys_theme_service_list') == 1){
                $flag_slide_service = 1;
            }
        }
    @endphp


    <div class="wp_content_post_index__minigame">
        <div class="post_index">

            <div class="d-flex justify-content-between" style="padding-top: 24px; padding-bottom: 16px">
                <div class="main-title">
                    <h2>{{ $title??'Dịch vụ game' }}</h2>
                </div>
                @if($flag_slide_service == 0)
                    <div class="service-search d-none d-lg-block ">
                        <div class="input-group p-box">
                            <input type="text" id="txtSearchDichVu" placeholder="Tìm dịch vụ" value="" class="" width="200px">
                            <span class="icon-search"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                @else
                    <div class="service-search d-none d-lg-block " style="font-size: 14px;line-height: 24px;font-weight: 600">
                        <div class="input-group p-box">
                            <a href="/dich-vu" class="dich__vu__home">Xem tất cả »</a>
                        </div>
                    </div>
                @endif
            </div>
            @if($flag_slide_service == 0)
                <div class="entries" id="service__widget" style="padding-bottom: 16px">
                    <div class="row marginauto fix-border">

                        <div class="col-md-12 left-right data-service-search">
                            <span style="color: rgb(238, 70, 35);">Dịch vụ cần tìm không tồn tại.</span>
                        </div>
                        @php
                            $index = 0;
                        @endphp
                        @foreach($data as $key => $item)
                            @if($key < 8)
                                @php
                                    $index = 1;
                                @endphp
                                <div class="col-md-3 col-sm-6 col-6 list-item list-item-service item-page-1" style="display: block">
                                    <a href="/dich-vu/{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                @if(isset($item->total_order))
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}
                                                            @endif
                                                        @endforeach

                                                    @else
                                                        Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}
                                                    @endif

                                                @else
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($val)) }}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Giao dịch: 0
                                                    @endif

                                                @endif
                                            </div>

                                        </div>

                                    </a>
                                </div>
                            @elseif($key < 16)
                                @php
                                    $index = 2;
                                @endphp
                                <div class="col-md-3 col-sm-6 col-6 list-item list-item-service item-page-2" style="display: none">
                                    <a href="/dich-vu/{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                @if(isset($item->total_order))
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}
                                                            @endif
                                                        @endforeach

                                                    @else
                                                        Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}
                                                    @endif

                                                @else
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($val)) }}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Giao dịch: 0
                                                    @endif

                                                @endif
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            @elseif($key < 24)
                                @php
                                    $index = 3;
                                @endphp
                                <div class="col-md-3 col-sm-6 col-6 list-item list-item-service item-page-3" style="display: none">
                                    <a href="/dich-vu/{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                @if(isset($item->total_order))
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}
                                                            @endif
                                                        @endforeach

                                                    @else
                                                        Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}
                                                    @endif

                                                @else
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($val)) }}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Giao dịch: 0
                                                    @endif

                                                @endif
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            @elseif($key < 32)
                                @php
                                    $index = 4;
                                @endphp
                                <div class="col-md-3 col-sm-6 col-6 list-item list-item-service item-page-4" style="display: none">
                                    <a href="/dich-vu/{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                @if(isset($item->total_order))
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}
                                                            @endif
                                                        @endforeach

                                                    @else
                                                        Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}
                                                    @endif

                                                @else
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($val)) }}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Giao dịch: 0
                                                    @endif

                                                @endif
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            @elseif($key < 40)
                                @php
                                    $index = 5;
                                @endphp
                                <div class="col-md-3 col-sm-6 col-6 list-item list-item-service item-page-5" style="display: none">
                                    <a href="/dich-vu/{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                @if(isset($item->total_order))
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}
                                                            @endif
                                                        @endforeach

                                                    @else
                                                        Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}
                                                    @endif

                                                @else
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($val)) }}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Giao dịch: 0
                                                    @endif

                                                @endif
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach

                        @if(count($data) > 8)
                        <button id="btn-expand-serivce" class="expand-button" data-page-current="1" data-page-max="{{ $index }}">Xem thêm dịch vụ</button>
                        @endif
                    </div>


                    <div class="entries-search">
                        <div class="row fix-border-dich-vu">
                        </div>
                    </div>

                </div>
                {{--    <script src="/assets/frontend/{{theme('')->theme_key}}/js/service/style.js"></script>--}}
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#btn-expand-serivce').on('click', function(e) {
                            var pageCurrrent=$(this).data('page-current');
                            var pageMax=$(this).data('page-max');
                            pageCurrrent=pageCurrrent+1;
                            $('.item-page-'+pageCurrrent).fadeIn( "fast", function() {
                                // Animation complete
                            });
                            $(this).data('page-current',pageCurrrent);
                            if(pageCurrrent==pageMax){
                                $(this).remove();
                            }
                        });

                        $('#txtSearchDichVu').on('input', function() {

                            let keyword = convertToSlug($(this).val());

                            let index = 0;
                            let value = 0;
                            $('#service__widget .list-item-service').each(function (i,elm) {
                                $(this).removeClass('dis-block-dich-vu');
                            })

                            $('#service__widget .list-item-service').each(function (i,elm) {
                                // $('.body-modal__nick__text-error').css('display','none');
                                let slug_item = $(elm).find('img').attr('alt');
                                slug_item = convertToSlug(slug_item);
                                $(this).toggle(slug_item.indexOf(keyword) > -1);
                                if (slug_item.indexOf(keyword) > -1){
                                    ++index;
                                    $(this).addClass('dis-block-dich-vu');
                                }else {

                                }
                                $('#btn-expand-serivce').remove();
                                $('#btn-expand-serivce-search').remove();
                            })


                            $('#service__widget .dis-block-dich-vu').each(function (i,elm) {
                                if (i>=8){
                                    $(this).css('display','none');
                                }
                            })
                            if (index <= 8){
                                value = 1;
                            }else if (index <= 16){
                                value = 2;
                            }else if (index <= 24){
                                value = 3;
                            }else if (index <= 32){
                                value = 4;
                            }else if (index <= 40){
                                value = 5;
                            }

                            if (value > 1){
                                let htmldv = '<button id="btn-expand-serivce-search" class="expand-button" data-page-current="1" data-page-max="' + value + '">Xem thêm danh mục</button>';
                                console.log($('#btn-expand-serivce-search').length)
                                if ($('#btn-expand-serivce-search').length < 1){
                                    $('#service__widget .fix-border-dich-vu').append(htmldv);
                                }

                            }



                            if (index == 0){
                                $('#service__widget .data-service-search').css('display','block');
                            }else {
                                $('#service__widget .data-service-search').css('display','none');
                            }
                            //$(this).val() // get the current value of the input field.
                        });


                        function convertToSlug(title) {
                            var slug;
                            //Đổi chữ hoa thành chữ thường
                            slug = title.toLowerCase();
                            //Đổi ký tự có dấu thành không dấu
                            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                            slug = slug.replace(/đ/gi, 'd');
                            //Xóa các ký tự đặt biệt
                            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\<|\'|\"|\:|\;|_/gi, '');
                            //Đổi khoảng trắng thành ký tự gạch ngang
                            slug = slug.replace(/ /gi, "-");
                            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                            slug = slug.replace(/\-\-\-\-\-/gi, '-');
                            slug = slug.replace(/\-\-\-\-/gi, '-');
                            slug = slug.replace(/\-\-\-/gi, '-');
                            slug = slug.replace(/\-\-/gi, '-');
                            //Xóa các ký tự gạch ngang ở đầu và cuối
                            slug = '@' + slug + '@';
                            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                            // trả về kết quả
                            return slug;
                        }

                    });

                </script>
            @else
                <div class="entries" style="margin-bottom: 0;padding-bottom: 16px">

                    <div class="swiper swiper-container swiper-list-item swiper-banner swiper-list-item-dich-vu overflow-hidden" style="background: none;box-shadow: none">
                        <div class=" swiper-wrapper">
                            @foreach($data as $item)

                                <div class="list-item image swiper-slide">
                                    <a href="/dich-vu/{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                @if(isset($item->total_order))
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($item->total_order + $val)) }}
                                                            @endif
                                                        @endforeach

                                                    @else
                                                        Giao dịch: {{ str_replace(',','.',number_format($item->total_order)) }}
                                                    @endif

                                                @else
                                                    @if($item->params_plus)
                                                        @foreach($item->params_plus as $key => $val)
                                                            @if($key == 'fk_buy')
                                                                Giao dịch: {{ str_replace(',','.',number_format($val)) }}
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        Giao dịch: 0
                                                    @endif

                                                @endif
                                            </div>

                                        </div>
                                    </a>

                                </div>

                            @endforeach

                        </div>

                        <div class="navigation swiper-list-prev"></div>
                        <div class="navigation swiper-list-next"></div>

                    </div>
                </div>
                <script>
                    let swiper_list_item_dich_vu = new Swiper('.swiper-list-item-dich-vu', {
                        autoplay: false,
                        updateOnImagesReady: true,
                        watchSlidesVisibility: false,
                        lazyLoadingInPrevNext: false,
                        lazyLoadingOnTransitionStart: false,
                        loop: false,
                        centeredSlides: false,
                        slidesPerView: 4,
                        speed: 800,
                        spaceBetween: 0,
                        freeMode: true,
                        touchMove: true,
                        freeModeSticky:true,
                        grabCursor: true,
                        observer: true,
                        observeParents: true,
                        keyboard: {
                            enabled: true,
                        },
                        breakpoints: {

                            992: {
                                slidesPerView: 4,
                            },
                            768: {
                                slidesPerView: 3,
                            },

                            480: {
                                slidesPerView: 1.8,
                                spaceBetween: 6,
                            }
                        },
                        navigation: {
                            nextEl: '.swiper-banner .navigation.swiper-list-next',
                            prevEl: '.swiper-banner .navigation.swiper-list-prev',
                        },
                    });
                </script>
            @endif

        </div>
    </div>

@endif

