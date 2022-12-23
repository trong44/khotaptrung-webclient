@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head',with(['data'=>$data]))
@endsection
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
    {{--  Header mobile  --}}
    <section class="media-mobile">
        <div class="container container-fix banner-mobile-container-ct">

            <div class="row marginauto banner-mobile-row-ct">
                <div class="col-auto left-right" style="width: 10%">
                    <a href="/mua-acc" class="previous-step-one" style="line-height: 28px">
                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/back.png" alt="" >
                    </a>
                </div>

                <div class="col-auto left-right banner-mobile-span text-center" style="width: 80%">
                    <p>Mua Acc</p>
                </div>
                <div class="col-auto left-right" style="width: 10%">
                </div>
            </div>

        </div>
    </section>

    {{--    Banner--}}

    @if($data == null)
        <div class="item_buy">

            <div class="container pt-3">
                <div class="row pb-3 pt-3">
                    <div class="col-md-12 text-center">
                        <span style="color: red;font-size: 16px;">
                            @if(isset($message))
                                {{ $message }}
                            @else
                                Hiện tại không có dữ liệu nào phù hợp với yêu cầu của bạn! Hệ thống cập nhật nick thường xuyên bạn vui lòng theo dõi web trong thời gian tới !
                            @endif
                        </span>
                    </div>
                </div>

            </div>

        </div>
    @else
        {{--  Menu  --}}
        <section class="media-web">
            <div class="container container-fix menu-container-ct">
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li class="menu-container-li-ct"><img  src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                    <li class="menu-container-li-ct"><a href="/mua-acc">Danh mục Shop Account</a></li>
                    <li class="menu-container-li-ct"><img  src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                    <li class="menu-container-li-ct"><a href="/mua-acc/{{ $data->slug }}">{{ $data->custom->title ? $data->custom->title : $data->title }}</a></li>
                    <li class="menu-container-li-ct"><img  src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/arrow-right.png" alt=""></li>
                    <li class="menu-container-li-ct"><a href="/mua-acc/{{ $data->slug }}">Danh sách Nick</a></li>
                </ul>
            </div>
        </section>
        {{--   Bopđyy --}}

        <section>
                <div class="container container-fix body-container-ct" >
                    <div class="row marginauto body-container-row-ct body-container-row-mobile-ct">

                        <div class="col-md-12 left-right">
                            <div class="row marginauto nick-list-bg" style="background: #FFFFFF">
                                <div class="col-md-12 left-right">
                                    <img class="lazy theme_3_imagebanner" src="{{ isset($data->custom->image_banner) ? \App\Library\MediaHelpers::media($data->custom->image_banner) : \App\Library\MediaHelpers::media($data->image_banner) }}" alt="">
                                </div>
                            </div>
                            <div class="row marginauto body-row-nick-ct">

                                <div class="col-md-12 left-right">
                                    <div class="row marginauto body-header-ct">
                                        <div class="col-auto left-right">
                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/caythue.png" alt="">
                                        </div>
                                        <div class="col-md-10 col-10 body-header-col-ct">
                                            <h1 class="">{{ $data->custom->title ? $data->custom->title : $data->title }}</h1>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right">
                                    <div class="row marginauto body-search-ct">
                                        <div class="col-md-12 text-left left-right">
                                            <span>Tìm kiếm</span>
                                        </div>
                                    </div>
                                </div>

                                {{--                        Find    --}}
                                <div class="col-md-12 left-right">

                                    <div class="row marginauto">
                                        <div class="col-12 left-right">
                                            <form id="idFilterForm" method="POST">
                                                <div class="row marginauto body-form-search-ct">
                                                    <div class="col-auto left-right">
                                                        <input autocomplete="off" type="text" name="search" class="input-search-ct" placeholder="Nhập từ khóa">
                                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/search.png" alt="">
                                                    </div>
                                                    <div class="col-4 body-form-search-button-ct media-web">
                                                        <button type="submit" class="timkiem-button-ct">Tìm kiếm</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-auto ml-auto left-right">

                                            <div class="row marginauto justify-content-end nick-findter-row">

                                                <div class="col-auto nick-findter" style="position: relative">
                                                    <ul>
                                                        <li class="li-boloc">Bộ lọc</li>
                                                        <li class="margin-findter">
                                                            <img src="/assets/frontend/{{theme('')->theme_key}}/image/nick/filter.png" alt="">
                                                            <span class="overlay-find">
                                                        0
                                                    </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row marginauto nick-findter-data">

                                    </div>
                                </div>
                                {{--End find   --}}
                                <div class="col-md-12 left-right d-none d-lg-block">
                                    <div class="row marginauto body-search-ct sort-nick">
                                        <div class="col-auto text-left left-right sort-nick-left">
                                            <span class="nick_total"></span>
                                        </div>
                                        <div class="col-auto left-right sort-nick-right">
                                            <div class="row marginauto align-items-center">
                                                <div class="col-auto left-right">
                                                    <span>Sắp xếp theo:</span>
                                                </div>
                                                <div class="col-auto left-right item-sort-nick">
                                                    <input checked id="sort-1" class="sort" type="radio" name="sort" value="random" hidden>
                                                    <label for="sort-1" class="item-sort-nick-label">
                                                        <span>Ngẫu nhiên</span>
                                                    </label>
                                                </div>
                                                <div class="col-auto left-right item-sort-nick">
                                                    <input id="sort-2" class="sort" type="radio" name="sort" value="price_start" hidden>
                                                    <label for="sort-2" class="item-sort-nick-label">
                                                        <span>Giá giảm dần</span>
                                                    </label>
                                                </div>
                                                <div class="col-auto left-right item-sort-nick">
                                                    <input id="sort-3" class="sort" type="radio" name="sort" value="price_end" hidden>
                                                    <label for="sort-3" class="item-sort-nick-label">
                                                        <span>Giá tăng dần</span>
                                                    </label>
                                                </div>
                                                <div class="col-auto left-right item-sort-nick">
                                                    <input id="sort-4" class="sort" type="radio" name="sort" value="created_at_start" hidden>
                                                    <label for="sort-4" class="item-sort-nick-label">
                                                        <span>Mới nhất</span>
                                                    </label>
                                                </div>
                                                <div class="col-auto left-right item-sort-nick">
                                                    <input id="sort-5" class="sort" type="radio" name="sort" value="created_at_end" hidden>
                                                    <label for="sort-5" class="item-sort-nick-label">
                                                        <span>Cũ nhất</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div id="account_data" style="width: 100%;">

                                </div>

                                <div id="listLoader" class="w-100" style="min-height: 500px">
                                    <div class="loader position-relative" style="padding: 1rem">
                                        <div class="loading-spokes">
                                            <div class="spoke-container">
                                                <div class="spoke"></div>
                                            </div>
                                            <div class="spoke-container">
                                                <div class="spoke"></div>
                                            </div>
                                            <div class="spoke-container">
                                                <div class="spoke"></div>
                                            </div>
                                            <div class="spoke-container">
                                                <div class="spoke"></div>
                                            </div>
                                            <div class="spoke-container">
                                                <div class="spoke"></div>
                                            </div>
                                            <div class="spoke-container">
                                                <div class="spoke"></div>
                                            </div>
                                            <div class="spoke-container">
                                                <div class="spoke"></div>
                                            </div>
                                            <div class="spoke-container">
                                                <div class="spoke"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
        </section>

        <section class="media-mobile">
            <div class="row marginauto intermediary-ct" style="height: 20px;background: #EFEFEF">

            </div>
        </section>

        @include('frontend.pages.account.widget.__related__category')

        @include('frontend.pages.account.widget.__category__content')

        <div class="modal fade login show order-modal" id="openFinter" aria-modal="true">

            <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
                <!--        <div class="image-login"></div>-->
                <div class="modal-content">
                    <div class="modal-header p-0" style="border-bottom: 0">
                        <div class="row marginauto modal-header-nick-ct">
                            <div class="col-12 left-right text-left" style="position: relative">
                                <span>Bộ lọc</span>
                                <img class="img-close-nick-ct close-modal-default" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" alt="">
                            </div>
                        </div>

                    </div>

                    <div class="modal-body modal-body-order-ct">
                        <form id="data_sort" action="">
                            <div class="row marginauto">

                                <div class="col-md-12 left-right">
                                    <div class="row marginauto">
                                        <div class="col-12 left-right background-nick-col-top-ct">
                                            <small>Mã số</small>
                                        </div>
                                        <div class="col-12 left-right background-nick-col-bottom-ct">
                                            <input autocomplete="off" class="input-defautf-ct id" type="text" data-query="id_data" placeholder="Nhập mã số">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 left-right modal-nick-padding">
                                    <div class="row marginauto">
                                        <div class="col-12 left-right background-nick-col-top-ct">
                                            <small>Giá tiền</small>
                                        </div>
                                        <div class="col-12 left-right background-nick-col-bottom-ct price-finter-nick">
                                            <select class="wide price" data-query="price_data">
                                                <option value="" selected disabled>Chọn giá tiền</option>
                                                <option value="0-50000">Dưới 50K</option>
                                                <option value="50000-200000">Từ 50K - 200K</option>
                                                <option value="200000-500000">Từ 200K - 500K</option>
                                                <option value="500000-1000000">Từ 500K - 1 Triệu</option>
                                                <option value="1000000-5000000">Trên 1 Triệu</option>
                                                <option value="5000000-10000000">Trên 5 Triệu</option>
                                                <option value="10000000">Trên 10 Triệu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                @if(isset($auto_properties))
                                    @if($slug == 'nick-lien-minh')
                                        @foreach($auto_properties as $auto_propertie)
                                            @if($auto_propertie->key == 'champions')
                                                <div class="col-md-12 left-right modal-nick-padding">
                                                    <div class="row marginauto">
                                                        <div class="col-12 left-right background-nick-col-top-ct">
                                                            <small>{{ $auto_propertie->name }}</small>
                                                        </div>
                                                        <div class="col-12 left-right background-nick-col-bottom-ct">
                                                            <select class="select-2-custom account-filter-field" data-query="champions_data"  data-title="">
                                                                <option value="">--Không chọn--</option>
                                                                @if(isset($auto_propertie->childs))
                                                                    @foreach($auto_propertie->childs as $child)
                                                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 left-right modal-nick-padding">
                                                    <div class="row marginauto">
                                                        <div class="col-12 left-right background-nick-col-top-ct">
                                                            <small>Trang phục</small>
                                                        </div>
                                                        <div class="col-12 left-right background-nick-col-bottom-ct">
                                                            <select class="select-2-custom account-filter-field" data-query="skill_data"  data-title="">

                                                                <option value="" selected disabled>--Không chọn--</option>
                                                                @if(isset($auto_propertie->childs) && count($auto_propertie->childs))
                                                                    @foreach($auto_propertie->childs as $child)

                                                                        @if(isset($child->childs) && count($child->childs))
                                                                            @foreach($child->childs as $c_child)
                                                                                <option value="{{ $c_child->id }}">{{ $c_child->name }}</option>
                                                                            @endforeach
                                                                        @endif

                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($auto_propertie->key == 'tftcompanions')

                                                <div class="col-md-12 left-right modal-nick-padding">
                                                    <div class="row marginauto">
                                                        <div class="col-12 left-right background-nick-col-top-ct">
                                                            <small>{{ $auto_propertie->name }}</small>
                                                        </div>
                                                        <div class="col-12 left-right background-nick-col-bottom-ct">
                                                            <select class="select-2-custom account-filter-field" data-query="tftcompanions_data"  data-title="">
                                                                <option value="" selected disabled>--Không chọn--</option>

                                                                @if($auto_propertie->childs)
                                                                    @foreach($auto_propertie->childs as $child)
                                                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($auto_propertie->key == 'tftmapskins')
                                                <div class="col-md-12 left-right modal-nick-padding">
                                                    <div class="row marginauto">
                                                        <div class="col-12 left-right background-nick-col-top-ct">
                                                            <small>{{ $auto_propertie->name }}</small>
                                                        </div>
                                                        <div class="col-12 left-right background-nick-col-bottom-ct">
                                                            <select class="select-2-custom account-filter-field" data-query="tftmapskins_data"  data-title="">
                                                                <option value="" selected disabled>--Không chọn--</option>
                                                                @if($auto_propertie->childs)
                                                                    @foreach($auto_propertie->childs as $child)
                                                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($auto_propertie->key == 'tftdamageskins')
                                                <div class="col-md-12 left-right modal-nick-padding">
                                                    <div class="row marginauto">
                                                        <div class="col-12 left-right background-nick-col-top-ct">
                                                            <small>{{ $auto_propertie->name }}</small>
                                                        </div>
                                                        <div class="col-12 left-right background-nick-col-bottom-ct">
                                                            <select class="select-2-custom account-filter-field" data-query="tftdamageskins_data"  data-title="">
                                                                <option value="" selected disabled>--Không chọn--</option>
                                                                @if($auto_propertie->childs)
                                                                    @foreach($auto_propertie->childs as $child)
                                                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @elseif($slug == 'nick-ninja-school')
                                        @foreach($auto_properties as $auto_propertie)

                                            @if($auto_propertie->key == 'CAPTURES')

                                            @elseif($auto_propertie->key == 'SERVER')
                                                <div class="col-md-12 left-right modal-nick-padding">
                                                    <div class="row marginauto">
                                                        <div class="col-12 left-right background-nick-col-top-ct">
                                                            <small>{{ $auto_propertie->key }}</small>
                                                        </div>
                                                        <div class="col-12 left-right background-nick-col-bottom-ct">
                                                            <select class="select-2-custom account-filter-field" data-query="tftmapskins_data"  data-title="">
                                                                <option value="">--Không chọn--</option>
                                                                @if(isset($auto_propertie->childs))
                                                                    @foreach($auto_propertie->childs as $child)
                                                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            @else
                                                @foreach($auto_propertie->childs as $childs)
                                                    @if($childs->key == 'CHAR_LEVEL')
                                                        <div class="col-md-12 left-right modal-nick-padding">
                                                            <div class="row marginauto">
                                                                <div class="col-12 left-right background-nick-col-top-ct">
                                                                    <small>LEVEL</small>
                                                                </div>
                                                                <div class="col-12 left-right background-nick-col-bottom-ct">
                                                                    <select class="select-2-custom account-filter-field" data-query="tftdamageskins_data"  data-title="">
                                                                        <option value="">--Không chọn--</option>
                                                                        <option value="{{ $childs->id }}-1-39">1 - 39</option>
                                                                        <option value="{{ $childs->id }}-40-49">40 - 49</option>
                                                                        <option value="{{ $childs->id }}-50-59">50 - 59</option>
                                                                        <option value="{{ $childs->id }}-60-69">60 - 69</option>
                                                                        <option value="{{ $childs->id }}-70-79">70 - 79</option>
                                                                        <option value="{{ $childs->id }}-80-89">80 - 89</option>
                                                                        <option value="{{ $childs->id }}-90-99">90 - 99</option>
                                                                        <option value="{{ $childs->id }}-100-109">100 - 109</option>
                                                                        <option value="{{ $childs->id }}-110-119">110 - 119</option>
                                                                        <option value="{{ $childs->id }}-120-129">120 - 129</option>
                                                                        <option value="{{ $childs->id }}-130">130</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @elseif($childs->key == 'CHAR_CLASS')
                                                        <div class="col-md-12 left-right modal-nick-padding">
                                                            <div class="row marginauto">
                                                                <div class="col-12 left-right background-nick-col-top-ct">
                                                                    <small>CLASS</small>
                                                                </div>
                                                                <div class="col-12 left-right background-nick-col-bottom-ct">
                                                                    <select class="select-2-custom account-filter-field" data-query="champions_data"  data-title="">
                                                                        <option value="">--Không chọn--</option>
                                                                        @foreach($childs->childs as $child)
                                                                            <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endif
                                                @endforeach

                                            @endif

                                        @endforeach
                                    @elseif($slug == 'ban-nick-ngoc-rong' || $slug == 'nick-ngoc-rong-online')
                                        @foreach($auto_properties as $auto_propertie)
                                            @if($auto_propertie->key == 'CAPTURES')

                                            @elseif($auto_propertie->key == 'SERVER')
                                                <div class="col-md-12 left-right modal-nick-padding">
                                                    <div class="row marginauto">
                                                        <div class="col-12 left-right background-nick-col-top-ct">
                                                            <small>{{ $auto_propertie->key }}</small>
                                                        </div>
                                                        <div class="col-12 left-right background-nick-col-bottom-ct">
                                                            <select class="select-2-custom account-filter-field" data-query="tftcompanions_data"  data-title="">
                                                                <option value="">--Không chọn--</option>
                                                                @if(isset($auto_propertie->childs))
                                                                    @foreach($auto_propertie->childs as $child)
                                                                        <option value="{{ $child->id }}">Server {{ $child->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($auto_propertie->key == 'INFO')
                                                @if(isset($auto_propertie->childs))
                                                    @foreach($auto_propertie->childs as $childs)
                                                        @if($childs->key == 'CAI_TRANG')
                                                            <div class="col-md-12 left-right modal-nick-padding">
                                                                <div class="row marginauto">
                                                                    <div class="col-12 left-right background-nick-col-top-ct">
                                                                        <small>CẢI TRANG</small>
                                                                    </div>
                                                                    <div class="col-12 left-right background-nick-col-bottom-ct">
                                                                        <select class="select-2-custom account-filter-field" data-query="champions_data"  data-title="">
                                                                            <option value="">--Không chọn--</option>
                                                                            @if(isset($childs->childs))
                                                                                @foreach($childs->childs as $child)
                                                                                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif($childs->key == 'SKILL_PET')
                                                            <div class="col-md-12 left-right modal-nick-padding">
                                                                <div class="row marginauto">
                                                                    <div class="col-12 left-right background-nick-col-top-ct">
                                                                        <small>SKILL 2 ĐỆ TỬ</small>
                                                                    </div>
                                                                    <div class="col-12 left-right background-nick-col-bottom-ct">
                                                                        <select class="select-2-custom account-filter-field" data-query="tftmapskins_data"  data-title="">
                                                                            <option value="">--Không chọn--</option>
                                                                            @if(isset($childs->childs))
                                                                                @foreach($childs->childs as $child)

                                                                                    @if($child->name == config('module.acc.auto_nro_skill_pet_2.'.$child->name))
                                                                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 left-right modal-nick-padding">
                                                                <div class="row marginauto">
                                                                    <div class="col-12 left-right background-nick-col-top-ct">
                                                                        <small>SKILL 3 ĐỆ TỬ</small>
                                                                    </div>
                                                                    <div class="col-12 left-right background-nick-col-bottom-ct">
                                                                        <select class="select-2-custom account-filter-field" data-query="tftdamageskins_data"  data-title="">
                                                                            <option value="">--Không chọn--</option>
                                                                            @if(isset($childs->childs))
                                                                                @foreach($childs->childs as $child)
                                                                                    @if($child->name == config('module.acc.auto_nro_skill_pet_3.'.$child->name))
                                                                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12 left-right modal-nick-padding">
                                                                <div class="row marginauto">
                                                                    <div class="col-12 left-right background-nick-col-top-ct">
                                                                        <small>SKILL 4 ĐỆ TỬ</small>
                                                                    </div>
                                                                    <div class="col-12 left-right background-nick-col-bottom-ct">
                                                                        <select class="select-2-custom account-filter-field" data-query="skill_data" data-title="">
                                                                            <option value="">--Không chọn--</option>
                                                                            @if(isset($childs->childs))
                                                                                @foreach($childs->childs as $child)
                                                                                    @if($child->name == config('module.acc.auto_nro_skill_pet_4.'.$child->name))
                                                                                        <option value="{{ $child->id }}">{{ $child->name }}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                @else
                                    @if(isset($dataAttribute) && count($dataAttribute) > 0)
                                        @foreach($dataAttribute as $key_val => $val)
                                            @if($val->position == 'select')
                                                <div class="col-md-12 left-right modal-nick-padding">
                                                    <div class="row marginauto">
                                                        <div class="col-12 left-right background-nick-col-top-ct">
                                                            <small>{{ $val->title }}</small>
                                                        </div>
                                                        <div class="col-12 left-right background-nick-col-bottom-ct">
                                                            <select class="select-2-custom account-filter-field" data-query="select_data_{{ $key_val }}"  data-title="{{ $val->title }}">
                                                                <option value="" selected disabled>--Không chọn--</option>
                                                                @foreach($val->childs as $child)
                                                                    <option value="{{ $child->id }}">{{ $child->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endif

                                <div class="col-md-12 left-right padding-nicks-footer-ct">

                                    <div class="row marginauto justify-content-center">
                                        <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                            <div class="row marginauto modal-footer-success-row-not-ct">
                                                <div class="col-md-12 left-right">
                                                    <a href="javascript:void(0)" class="button-not-bg-ct reset-find"><span>Thiết lập lại</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                            <div class="row marginauto">
                                                <div class="col-md-12 left-right">
                                                    <button class="button-default-modal-ct button-modal-nick btn-ap-dung" type="button">Áp dụng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

        <div class="modal fade login show order-modal" id="successModal" aria-modal="true">
            <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
                <div class="modal-content">
                    <div class="modal-header p-0" style="border-bottom: 0">
                        <div class="row marginauto modal-header-order-ct">
                            <div class="col-12 span__donhang text-center" style="position: relative">
                                <span>Mua tài khoản thành công</span>
                                <img class="lazy img-close-ct close-modal-success" src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/close.png" data-dismiss="modal" alt="">

                            </div>

                        </div>
                    </div>
                    <div class="modal-body modal-body-order-ct">
                        <div class="row marginauto">

                            <div class="col-md-12 left-right image-success">
                                <div class="row marginauto justify-content-center">
                                    <div class="col-auto">
                                        <img src="/assets/frontend/{{theme('')->theme_key}}/image/cay-thue/group.png" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right">
                                <div class="row marginauto title-tra-gop-success-row">
                                    <div class="col-md-12 left-right body-title-detail-span-ct">
                                        <span>ID tài khoản</span>
                                    </div>
                                    <div class="col-md-12 left-right body-title-detail-select-ct email-success-nick">
                                        <input id="nickIdInput" value="" readonly autocomplete="off" class="input-defautf-ct" type="text">
                                        <img class="js_copy_input" src="/assets/frontend/{{theme('')->theme_key}}/image/nick/copy.png" alt="icon_copy" data-tippy-content="Đã copy tài khoản">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 left-right padding-order-16-ct">
                                <div class="row marginauto">
                                    <div class="col-md-12 left-right background-order-ct">
                                        <div class="row marginauto title-success-thanh-cong">
                                            <div class="col-md-12 left-right">
                                                <span>Nick của bạn được sẽ gửi tới trang Lịch sử mua Nick, vui lòng kiểm tra và đăng nhập vào Game, thay đổi mật khẩu để bảo mật cho tài khoản đã mua</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12 left-right">
                                <div class="row marginauto justify-content-center gallery-right-footer">
                                    <div class="col-md-6 col-6 modal-footer-success-col-left-ct">
                                        <button type="button" class="button-success-secondary">
                                            <a href="/" style="display: block">Trang chủ</a>
                                        </button>
                                    </div>
                                    <div class="col-md-6 col-6 modal-footer-success-col-right-ct">
                                        <button type="button" class="button-success-primary">
                                            <a href="/lich-su-mua-account" style="display: block">Lịch sử</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade login show order-modal" id="openOrder" aria-modal="true">

            <div class="modal-dialog step-tab-panel modal-lg modal-dialog-centered login animated">
                <!--        <div class="image-login"></div>-->
                <div class="modal-content data-account-random">
                </div>
            </div>
        </div>

        <input type="hidden" value="{{ $slug }}" name="slug" class="slug">

{{--        <script src="/js/{{theme('')->theme_key}}/nick/nick--list.js?v={{time()}}"></script>--}}

            <script src="/assets/frontend/{{theme('')->theme_key}}/js/js_trong/handle-history-table.js?v={{time()}}"></script>
            <script src="/assets/frontend/{{theme('')->theme_key}}/js/nick/nick--update.js?v={{time()}}"></script>

        </div>

    @endif

@endsection
@section('scripts')
    <script>
        // config select 2

        let $select_2 = $('.select-2-custom');
        $select_2.select2({
            placeholder: '--Không chọn--',
            allowClear: true,
            tags: false
        });
    </script>
@endsection
