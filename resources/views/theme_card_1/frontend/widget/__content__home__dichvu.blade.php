@if(isset($data) && count($data) > 0)

    <div class="d-flex justify-content-between" style="padding-top: 24px; padding-bottom: 16px">
        <div class="main-title">
            <h2>Dịch vụ game</h2>
        </div>
        <div class="service-search d-none d-lg-block ">
            <div class="input-group p-box">
                <input type="text" id="txtSearch" placeholder="Tìm dịch vụ" value="" class="" width="200px">
                <span class="icon-search"><i class="fas fa-search"></i></span>
            </div>
        </div>
    </div>
    <div class="entries">
        <div class="row fix-border fix-border-dich-vu">

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
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-1" style="display: block">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h3 class="text-title">{{ $item->title   }}</h3>
                        </a>
                    </div>
                @elseif($key < 16)
                    @php
                        $index = 2;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-2" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h3 class="text-title">{{ $item->title   }}</h3>
                        </a>
                    </div>
                @elseif($key < 24)
                    @php
                        $index = 3;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-3" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h3 class="text-title">{{ $item->title   }}</h3>
                        </a>
                    </div>
                @elseif($key < 32)
                    @php
                        $index = 4;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-4" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h3 class="text-title">{{ $item->title   }}</h3>
                        </a>
                    </div>
                @elseif($key < 40)
                    @php
                        $index = 5;
                    @endphp
                    <div class="col-md-3 col-sm-6 col-6 entries_item entries_item_service item-page-5" style="display: none">
                        <a href="/dich-vu/{{ $item->slug}}">
                            <img src="{{\App\Library\MediaHelpers::media($item->image)}}"
                                 alt="{{ $item->slug   }}" class="entries_item-img">
                            <h3 class="text-title">{{ $item->title   }}</h3>
                        </a>
                    </div>
                @endif
            @endforeach


            <button id="btn-expand-serivce" class="expand-button" data-page-current="1" data-page-max="{{ $index }}">Xem thêm dịch vụ</button>

        </div>


        <div class="entries-search">
            <div class="row fix-border ">
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


            $('#txtSearch').on('input', function() {
                let keyword = convertToSlug($(this).val());
                let index = 0;
                let value = 0;
                $('.entries_item_service').each(function (i,elm) {
                    $(this).removeClass('dis-block-service');
                })
                $('.entries_item_service').each(function (i,elm) {

                    let slug_item = $(elm).find('img').attr('alt');
                    slug_item = convertToSlug(slug_item);
                    $(this).toggle(slug_item.indexOf(keyword) > -1);
                    if (slug_item.indexOf(keyword) > -1){
                        ++index;
                        $(this).addClass('dis-block-service');
                    }else {}

                    $('#btn-expand-serivce').remove();
                    $('#btn-expand-serivce-search').remove();
                })

                $('.dis-block-service').each(function (i,elm) {
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

                    let htmlservice = '<button id="btn-expand-serivce-search" class="expand-button" data-page-current="1" data-page-max="' + value + '">Xem thêm dịch vụ</button>';
                    $('.fix-border-dich-vu').append(htmlservice);
                }

                if (index == 0){
                    $('.data-service-search').css('display','block');
                }else {
                    $('.data-service-search').css('display','none');
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
    <style>
        .entries_item {
            text-align: center;
            display: block;
            box-sizing: border-box;
            border: 1px solid #eeeeee;
            padding: 12px 12px 16px 12px;
            color: #676E76;
            overflow: hidden;
            text-overflow: ellipsis;

        }

        .entries_item:hover {
            background: #F3F3F3;
        }

        .entries_item-img {
            width: 100%;
            height: 160px;
            border-radius: 8px;
            display: block;
            margin: auto;
        }

        .entries_item .text-title,.text-title {
            margin-top: 20px;
            margin-bottom: 0;
            font-weight: bold;
            font-size: 15px;
        }
        .main-title h1 {
            font-size: 20px;
            line-height: 30px;
            margin: 0;
            padding: 0;
        }
        .service-search .p-box input {
            border: 1px solid #cccccc;
            border-radius: 5px;
            padding: .7em 37px .7em .8em;
            width: 250px;

        }

        .service-search .p-box input:focus {
            border: 1px solid rgb(238, 70, 35) !important;
        }
        .service-search .p-box input:focus +  .icon-search i{
            color: rgb(238, 70, 35) !important;
        }
        .service-search .p-box .icon-search {

            right: 11px;
            top: 13px;
            border-radius: .25rem;
            border-left: 0;
            position: absolute;
        }

        .service-search .p-box .icon-search i{
            font-size: 18px;
        }
        .expand-button {
            cursor: pointer;
            display: block;
            width: 20%;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
            margin-left: auto;
            margin-right: auto;
            border: 1px solid rgb(238, 70, 35) !important;
            border-radius: 3px;
            background-color: #fff;
            color: rgb(238, 70, 35) !important;
            font-size: 13px;
            padding: 0.5rem;
            border: 4px solid darken(darkcyan, 10%);
        }

    </style>
@endif

