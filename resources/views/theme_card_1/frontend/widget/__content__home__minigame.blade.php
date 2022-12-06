@if(isset($data) && count($data) > 0)
    @php
        $total_key_minigame = 8;
        $flag_slide_minigame = 0;
        if(setting('sys_theme_minigame_list') != ''){
            if (setting('sys_theme_minigame_list') > 1){
                $total_key_minigame = (int)setting('sys_theme_minigame_list')*4;
            }elseif (setting('sys_theme_minigame_list') == 1){
                $flag_slide_minigame = 1;
            }
        }
    @endphp
    <div class="wp_content_post_index__minigame">
        <div class="post_index">
            <div class="d-flex justify-content-between" style="padding-top: 24px;margin-bottom: 16px">
                <div class="main-title">
                    <h2>{{ $title??'Dịch vụ game minigame' }}</h2>
                </div>

                @if($flag_slide_minigame == 0)
                    <div class="service-search d-none d-lg-block">
                        <div class="input-group p-box">
                            <input type="text" id="txtSearchMinigame" placeholder="Tìm minigame" value="" class="" width="200px">
                            <span class="icon-search"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                @else
                    <div class="service-search d-none d-lg-block " style="font-size: 14px;line-height: 24px;font-weight: 600">
                        <div class="input-group p-box">
                            <a href="/minigame" class="dich__vu__home">Xem thêm</a>
                        </div>
                    </div>
                @endif
            </div>
            @if($flag_slide_minigame == 0)
                <div class="entries card-list" style="padding-bottom: 16px" id="minigame">
                    <div class="row fix-border fix-border-dich-vu marginauto" >

                        <div class="col-md-12 left-right data-nick-search">
                            <span style="color: rgb(238, 70, 35);">Minigame cần tìm không tồn tại.</span>
                        </div>
                        @php
                            $index = 0;
                        @endphp
                        @foreach($data as $key => $item)
                            @if($key < 8)
                                @php
                                    $index = 1;
                                @endphp
                                <div class="col-md-3 col-sm-6 col-6 list-item entries_item entries_item_minigame item-page-1" style="display: block;padding-top: 16px">
                                    <a href="/minigame-{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="entries_item-img list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}
                                            </div>
                                            <div class="price">
                                                @if(isset($item->params->percent_sale))
                                                    <div class="price-current">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                    <div class="price-old c-mr-8">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                                                    <div class="discount">{{ $item->params->percent_sale }}%</div>
                                                @else
                                                    <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @elseif($key < 16)
                                @php
                                    $index = 2;
                                @endphp
                                <div class="col-md-3 col-sm-6 col-6 list-item entries_item entries_item_minigame item-page-2" style="display: none;padding-top: 16px">
                                    <a href="/minigame-{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="entries_item-img list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}
                                            </div>
                                            <div class="price">
                                                @if(isset($item->params->percent_sale))
                                                    <div class="price-current">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                    <div class="price-old c-mr-8">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                                                    <div class="discount">{{ $item->params->percent_sale }}%</div>
                                                @else
                                                    <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            @elseif($key < 24)
                                @php
                                    $index = 3;
                                @endphp
                                <div class="col-md-3 col-sm-6 col-6 list-item entries_item entries_item_minigame item-page-3" style="display: none;padding-top: 16px">
                                    <a href="/minigame-{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="entries_item-img list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}
                                            </div>
                                            <div class="price">
                                                @if(isset($item->params->percent_sale))
                                                    <div class="price-current">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                    <div class="price-old c-mr-8">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                                                    <div class="discount">{{ $item->params->percent_sale }}%</div>
                                                @else
                                                    <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @elseif($key < 32)
                                @php
                                    $index = 4;
                                @endphp
                                <div class="col-md-3 col-sm-6 col-6 list-item entries_item entries_item_minigame item-page-4" style="display: none;padding-top: 16px">
                                    <a href="/minigame-{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="entries_item-img list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}
                                            </div>
                                            <div class="price">
                                                @if(isset($item->params->percent_sale))
                                                    <div class="price-current">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                    <div class="price-old c-mr-8">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                                                    <div class="discount">{{ $item->params->percent_sale }}%</div>
                                                @else
                                                    <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @elseif($key < 40)
                                @php
                                    $index = 5;
                                @endphp
                                <div class="col-md-3 col-sm-6 col-6 list-item entries_item entries_item_minigame item-page-5" style="display: none;padding-top: 16px">
                                    <a href="/minigame-{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="entries_item-img list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}
                                            </div>
                                            <div class="price">
                                                @if(isset($item->params->percent_sale))
                                                    <div class="price-current">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                    <div class="price-old c-mr-8">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                                                    <div class="discount">{{ $item->params->percent_sale }}%</div>
                                                @else
                                                    <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach


                        <button id="btn-expand-minigame" class="expand-button" data-page-current="1" data-page-max="{{ $index }}">Xem thêm minigame</button>

                    </div>


                    <div class="entries-search">
                        <div class="row fix-border-minigame">
                        </div>
                    </div>

                </div>
                <script>
                    $(document).ready(function () {

                        $('#txtSearchMobile').on('input', function() {
                            let keyword = convertToSlug($(this).val());

                            let index = 0;
                            $('.entries_item').each(function (i,elm) {
                                // $('.body-modal__nick__text-error').css('display','none');
                                let slug_item = $(elm).find('img').attr('alt');
                                slug_item = convertToSlug(slug_item);
                                $(this).toggle(slug_item.indexOf(keyword) > -1);
                                if (slug_item.indexOf(keyword) > -1){
                                    index = index + 1
                                }else {}
                                console.log(index)
                                if (index > 8){
                                    $('.item-page-2').css('display','none');
                                    $('.item-page-3').css('display','none');
                                    $('.item-page-4').css('display','none');
                                }

                            })


                            //$(this).val() // get the current value of the input field.
                        });

                        $('#txtSearchMinigame').on('input', function() {
                            let keyword = convertToSlug($(this).val());

                            let index = 0;
                            let value = 0;
                            $('.entries_item_minigame').each(function (i,elm) {
                                $(this).removeClass('dis-block');
                            })

                            $('.entries_item_minigame').each(function (i,elm) {
                                // $('.body-modal__nick__text-error').css('display','none');
                                let slug_item = $(elm).find('img').attr('alt');
                                slug_item = convertToSlug(slug_item);
                                $(this).toggle(slug_item.indexOf(keyword) > -1);
                                if (slug_item.indexOf(keyword) > -1){
                                    ++index;
                                    $(this).addClass('dis-block');
                                }else {

                                }
                                $('#btn-expand-minigame').remove();
                                $('#btn-expand-minigame-search').remove();
                            })


                            $('.dis-block').each(function (i,elm) {
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

                                let htmlnick = '<button id="btn-expand-minigame-search" class="expand-button" data-page-current="1" data-page-max="' + value + '">Xem thêm danh mục</button>';
                                $('.fix-border-minigame').append(htmlnick);
                            }

                            if (index == 0){
                                $('.data-nick-search').css('display','block');
                            }else {
                                $('.data-nick-search').css('display','none');
                            }
                            //$(this).val() // get the current value of the input field.
                        });

                        $('body').on('click','#btn-expand-minigame',function(){
                            var pageCurrrent=$(this).data('page-current');
                            var pageMax=$(this).data('page-max');
                            pageCurrrent=pageCurrrent+1;
                            $('#minigame .item-page-'+pageCurrrent).fadeIn( "fast", function() {
                                // Animation complete
                            });
                            $(this).data('page-current',pageCurrrent);
                            if(pageCurrrent==pageMax){
                                $(this).remove();
                            }
                        });

                        $('body').on('click','#btn-expand-minigame-search',function(){

                            var pageCurrrent=$(this).data('page-current');
                            var pageMax=$(this).data('page-max');
                            pageCurrrent=pageCurrrent+1;
                            $('.dis-block').each(function (i,elm) {
                                if (pageCurrrent == 2){
                                    if (i < 16){
                                        $(this).css('display','block');
                                    }
                                }else if (pageCurrrent == 3){
                                    if (i < 24){
                                        $(this).css('display','block');
                                    }
                                }else if (pageCurrrent == 4){
                                    if (i < 32){
                                        $(this).css('display','block');
                                    }
                                }else if (pageCurrrent == 5){
                                    if (i < 40){
                                        $(this).css('display','block');
                                    }
                                }
                            });

                            $(this).data('page-current',pageCurrrent);
                            if(pageCurrrent==pageMax){
                                $(this).remove();
                            }
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
                <div class="entries" style="margin-bottom: 0">

                    <div class="swiper swiper-container swiper-banner swiper-list-item-minigame overflow-hidden" style="background: none;box-shadow: none">
                        <div class=" swiper-wrapper" style="padding-bottom: 16px">
                            @foreach($data as $item)

                                <div class="list-item image swiper-slide">
                                    <a href="/minigame-{{ $item->slug}}">
                                        <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                             alt="{{ $item->slug   }}" class="entries_item-img list-item-img">
                                        <div class="card-attr">
                                            <div class="text-title fw-700 text-limit limit-1">
                                                {{ $item->title   }}
                                            </div>
                                            <div class="info-attr">
                                                Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}
                                            </div>
                                            <div class="price">
                                                @if(isset($item->params->percent_sale))
                                                    <div class="price-current">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                    <div class="price-old c-mr-8">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>
                                                    <div class="discount">{{ $item->params->percent_sale }}%</div>
                                                @else
                                                    <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
{{--                                    <div class="card">--}}
{{--                                        <div class="card-body c-p-16 c-p-lg-12 scale-thumb">--}}

{{--                                            <a href="/minigame-{{ $item->slug}}">--}}
{{--                                                <div class="card-thumb c-mb-8">--}}
{{--                                                    <img onerror="imgError(this)" src="{{\App\Library\MediaHelpers::media($item->image)}}" alt="" class="card-thumb-image">--}}
{{--                                                </div>--}}
{{--                                                <div class="card-attr">--}}
{{--                                                    <div class="text-title fw-700 text-limit limit-1" style="text-align: left">--}}
{{--                                                        {{ $item->title   }}--}}
{{--                                                    </div>--}}
{{--                                                    <div class="info-attr">--}}
{{--                                                        Đã quay: {{isset($item->params->fake_num_play)?($item->params->fake_num_play+$item->order_gate_count):$item->order_gate_count}}--}}
{{--                                                    </div>--}}
{{--                                                    <div class="price">--}}
{{--                                                        @if(isset($item->params->percent_sale))--}}
{{--                                                            <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>--}}
{{--                                                            <div class="price-old c-mr-8">{{ str_replace(',','.',number_format(($item->params->percent_sale*$item->price)/100 + $item->price)) }} đ</div>--}}
{{--                                                            <div class="discount">{{ $item->params->percent_sale }}%</div>--}}

{{--                                                        @else--}}
{{--                                                            <div class="price-current w-100">{{ str_replace(',','.',number_format($item->price)) }} đ</div>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </a>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>

                            @endforeach

                        </div>

                        <div class="navigation swiper-list-prev"></div>
                        <div class="navigation swiper-list-next"></div>

                    </div>
                </div>
                <script>
                    let swiper_list_item_minigame = new Swiper('.swiper-list-item-minigame', {
                        autoplay: false,
                        updateOnImagesReady: true,
                        watchSlidesVisibility: false,
                        lazyLoadingInPrevNext: false,
                        lazyLoadingOnTransitionStart: false,
                        loop: false,
                        centeredSlides: false,
                        slidesPerView: 4,
                        speed: 800,
                        spaceBetween: 16,
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
                                slidesPerView: 2.8,
                            },

                            480: {
                                slidesPerView: 1.8,
                                spaceBetween: 6,
                            }
                        },
                        navigation: {
                            nextEl: '.swiper-list-item-minigame .navigation.swiper-list-next',
                            prevEl: '.swiper-list-item-minigame .navigation.swiper-list-prev',
                        },
                    });
                </script>
            @endif
        </div>
    </div>

@endif

