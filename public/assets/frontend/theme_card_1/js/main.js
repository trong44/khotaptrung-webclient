$(document).ready(function () {
    $(".shownewx").click(function () {
        $(".showmore").css("right", "-27px");
        $(".bg_gra").fadeIn("slow");
    });
    $(".close_nav").click(function () {
        $(".showmore").css("right", "-110vw");
        $(".bg_gra").fadeOut("slow");
    });
    $(".menu li.m1").hover(function () {
        $(this).find(".mini_menu").addClass("show");
    }, function () {
        $(this).find(".mini_menu").removeClass("show");
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 10) {
            $('.c-layout-header-fixed').removeClass('fixtop');
            $('.c-layout-header-fixed').addClass('fixscroll');
            $("#btn-back-to-top").show();
        } else {
            $('.c-layout-header-fixed').removeClass('fixscroll');
            $('.c-layout-header-fixed').addClass('fixtop');
            $("#btn-back-to-top").hide();
        }
    });
    $("#btn-back-to-top").click(function(){
        document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
    });
    $(function () {
        var url = window.location.href;
        $("#navbar-main li").removeClass("active");
        $("#navbar-main a").each(function () {
            if (url == (this.href)) {
                $(this).closest("a").addClass("active");
                $(this).closest("li").parents('li').addClass("active");
            }
        });
    });
});



$(document).ready(function () {
    $('.started_at').datetimepicker({
        format: 'DD-MM-YYYY LT',
        useCurrent: false,
        icons:
            { time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                clear: 'fas fa-trash',
                close: 'far fa-times' },

    });
    $('.ended_at').datetimepicker({
        format: 'DD-MM-YYYY LT',
        useCurrent: false,
        icons:
            { time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                clear: 'fas fa-trash',
                close: 'far fa-times' },
        maxDate: moment()
    });
    $('.load-modal').each(function (index, elem) {
        $(elem).unbind().click(function (e) {
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><i class=\"fas fa-spinner fa-spin\" style='font-size: 30px'></i></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
        });
    });

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
