/*Lấy chiều dài để responsive*/
let width = $(document).width();

/*format tiền*/

$(document).ready(function() {
    /*Tất cả các thẻ select sẽ được dùng plugin select nice*/
    $('#formDataService select').niceSelect();
    /*Quantity*/
    $(document).on('click','.js-quantity-minus',function (event) {
        event.preventDefault();
        let input = $(this).closest('.js-quantity').find('.js-quantity-input');
        input.val(parseInt(input.val()) - 1);
        if(input.val() < 1 || isNaN(input.val())){
            input.val(1);
        }
        input.trigger('input')
    });
    $(document).on('click','.js-quantity-add',function (event) {
        event.preventDefault();
        let input = $(this).closest('.js-quantity').find('.js-quantity-input');
        input.val(parseInt(input.val()) + 1);
        if(input.val() > 20 || isNaN(input.val())){
            input.val(20);
        }
        input.trigger('input');
    });
    $(document).on('input','.js-quantity-input',function () {
        if ($(this).val() > 20 || isNaN($(this).val())){
            $(this).val(20);
        }
        if ($(this).val() < 1 || isNaN($(this).val())){
            $(this).val(1);
        }
    });
    /*End quantity*/
    /*Input chỉ được nhập số*/
    $(document).on('keypress','input[numberic]', function (e) {
        if (isNaN(this.value + String.fromCharCode(e.keyCode))) return false;
    });
    /*Dùng date time cho input */
    let date_time_picker = $('.date-left,.date-right');
    if (date_time_picker.length){
        /*config date_time_picker*/
        date_time_picker.datetimepicker({
            format: 'DD-MM-YYYY LT',
            useCurrent: false,
            locale:'vi',
            maxDate: moment(),
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
        /*auto close after choose*/
        date_time_picker.datetimepicker().on('dp.change', function(e){
            if( !e.oldDate || !e.date.isSame(e.oldDate, 'day')){
                $(this).data('DateTimePicker').hide();
            }
        });
    }

    /*Mua thẻ thành công*/
    tippy('.js-copy-text', {
        // default
        trigger: 'click',
        content: "Đã coppy !",
        placement: 'right',
    });

    $('.js-copy-text').on('click', function () {
        let text_value = $(this).parent().find('.card__info').text().trim();
        navigator.clipboard.writeText(text_value);
        $(this).parent().addClass('active')
    });

    /*Bottom sheet (Mobile)*/
    let bottom_sheet = $('.sheet-footer');
    if (bottom_sheet.length){
        bottom_sheet.prev().css('bottom',bottom_sheet.outerHeight());
    }

    /*Filter Account*/
    $('.js-reset-form').on('click',function (e) {
        e.preventDefault();
        $(this).closest('form').trigger('reset');
        if ($(this).closest('.bottom-sheet').length) {
            $('form select').niceSelect('update');
        }
    });
    $('.js-submit-form').on('click',function (e) {
        e.preventDefault();
        $(this).closest('form').trigger('submit');
    });
    /*Sort Account*/

    /*Desktop*/
    $(document).on('click','.selection',function (e) {
        e.preventDefault();
        let value_sort = $('.value-sort');
        value_sort.find('.selection').removeClass('active');
        $(this).addClass('active');
    });

    /*Mobile*/
    $(document).on('change','input[name=sort]',function () {
        $('label[for=bottom-sheet-sort]').trigger('click');
        $('label.tool-sort').text($(this).parent().text().trim());
    });
    /*Modal chi tiết nick liên minh*/

    $('body').on('click','.submit--search',function(e){
        e.preventDefault();
        let keyword = convertToSlug($('#keyword--search').val());

        let index = 0;
        $('.item-nick-lmht').each(function (i,elm) {
            $('.body-modal__nick__text-error').css('display','none');
            let slug_item = $(elm).find('img').attr('alt');
            slug_item = convertToSlug(slug_item);
            $(this).toggle(slug_item.indexOf(keyword) > -1);
            if (slug_item.indexOf(keyword) > -1){
                index = index + 1
            }else {}

            if (index == 0){
                $('.body-modal__nick__text-error').css('display','block');
            }

        })
    })

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

    if (width < 992){
        /*Step Mobile*/
        $('body').on('click','.js-step',function () {
            let selector = $(this).data('target');
            let elm = $(selector);
            elm.css('transform','translateX(0)');
        })
        $('body').on('click','.close-step',function (e) {
            e.preventDefault();
            let elm = $(this).closest('.step');
            elm.css('transform','translateX(130%)')
        })

        /*Box-shadow*/
        $('.body-mobile').on('scroll',function () {
            $('.head-mobile').toggleClass('box-shadow',!!$(this).scrollTop())
        })
    }

    /*toggle password*/
    $(document).on('click','.toggle-password',function (e) {
        let start = width < 992 ? $(this).outerWidth() - 54 : $(this).outerWidth() - 32;
        let end = $(this).outerWidth() - 12;
        if (e.offsetX >= start && e.offsetX <= end) {
            $(this).toggleClass('is_show');
            let input = $(this).find('input');
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        }
    });
    $(document).on('click','.copy-input',function (e) {
        let start;
        let end;
        if ($(this).hasClass('toggle-password')){
            start = width < 992 ? $(this).outerWidth() - 75 : $(this).outerWidth() - 60;
            end =  $(this).outerWidth() - 40;
        } else {
            start = width < 992 ? $(this).outerWidth() - 54 : $(this).outerWidth() - 32;
            end =  $(this).outerWidth() - 12;
        }
        if (e.offsetX >= start && e.offsetX <= end) {
            let value = $(this).find('input').val();
            navigator.clipboard.writeText(value);
            tippy(e.target, {
                trigger: 'focus',
                content: "Đã copy !",
                placement: 'right',
                showOnCreate: true,
            });
        }
    });

    /*Seemore*/
    $(document).on('click','.see-more',function () {
        handleToggleDesc($(this));
    });
    $('body').find('.content-desc').dblclick(function () {
        handleToggleDesc('.see-more');
    });

    let max_height_desc;
    window.onload = function (){
         max_height_desc = $('body').find('.content-desc').outerHeight();
        $('body').find('.content-desc').addClass('hide');
    }
    /*set max-heigh t for content*/
    /*handle toggle*/
    function handleToggleDesc(selector) {
        let content_desc = $('body').find('.content-desc');
        $(selector).toggleClass('hide');
        content_desc.toggleClass('hide');
        if ($(selector).hasClass('hide')){
            $(selector).attr('data-content','Ẩn bớt nội dung');
            content_desc.css('max-height',max_height_desc);
        }else {
            $(selector).attr('data-content','Xem thêm nội dung');
            content_desc.css('max-height','');
        }
    }
    // dblclick on mobile
    if (width < 1200) {
        let touchtime = 0;
        $('body').find('.content-desc').on("click", function() {
            if (!touchtime) {
                // set first click
                touchtime = new Date().getTime();
            } else {
                // compare first click to this click and see if they occurred within double click threshold
                if (((new Date().getTime()) - touchtime) < 500) {
                    // double click occurred
                    handleToggleDesc('.see-more');
                    touchtime = 0;
                } else {
                    // not a double click so set as a new first click
                    touchtime = new Date().getTime();
                }
            }
        });
    }
    /*Seemore nick*/
    let content_desc_nick = $('.content-desc-nick');
    if (content_desc_nick.length){
        let max_height_desc_nick = content_desc_nick.outerHeight();
        $(document).on('click','.see-more',function () {
            handleToggle($(this));
        });
        content_desc.dblclick(function () {
            handleToggle('.see-more');
        })
        /*set max-height for content*/
        content_desc_nick.toggleClass('hide',true);
        /*handle toggle*/
        function handleToggle(selector) {
            $(selector).toggleClass('hide');
            content_desc_nick.toggleClass('hide');
            if ($(selector).hasClass('hide')){
                $(selector).attr('data-content','Ẩn bớt nội dung');
                content_desc_nick.css('max-height',max_height_desc);
            }else {
                $(selector).attr('data-content','Xem thêm nội dung');
                content_desc_nick.css('max-height','');
            }
        }
        // dblclick on mobile
        if (width < 1200) {
            let touchtime = 0;
            content_desc.on("click", function() {
                if (!touchtime) {
                    // set first click
                    touchtime = new Date().getTime();
                } else {
                    // compare first click to this click and see if they occurred within double click threshold
                    if (((new Date().getTime()) - touchtime) < 500) {
                        // double click occurred
                        handleToggle('.see-more');
                        touchtime = 0;
                    } else {
                        // not a double click so set as a new first click
                        touchtime = new Date().getTime();
                    }
                }
            });
        }
    }

    /*Auto config noUiSlider JS*/
    let slider_input = $('.slider-input');
    if(slider_input.length){
        Array.from(slider_input).forEach(function (elm) {
            let option = $(elm).data('option').split(',');
            let arr_start = $(elm).data('start').split(',');
            let range = {
                'min': parseInt(option[0]),
                'max': parseInt(option[1]),
            }
            let step= option[2] ? parseInt(option[2]) : 0;
            let start = [parseInt(arr_start[0]),parseInt(arr_start[1])];
            noUiSlider.create(elm, {
                start: start,
                step:step,
                connect: true,
                range: range,
            });
            elm.noUiSlider.on('update', function (values, handle) {
                $(elm).attr('data-min',Math.round(values[0]));
                $(elm).attr('data-max',Math.round(values[1]));
            });
            elm.noUiSlider.on('slide', function (values, handle) {
                $(elm).addClass('changed');
            })
        })
    }

    if (width > 992) {
        let sticky = $('.js_sticky');
        if (sticky.length) {
            $(document).on('scroll',function () {
                if ($(document).scrollTop() > 180) {
                    sticky.css('top',$(sticky).data('top'))
                }else {
                    sticky.css('top',0)
                }
            })
        }
    }

    /*scroll add box shadown*/
    let card_service_select = $('#select-service').find('.card-body');
    if (card_service_select.length){
        card_service_select.on('scroll',function () {
            $(this).parent().toggleClass('card-service-select',!!$(this).scrollTop())
        })
    }

    /*close modal*/
    $(document).on('click','.modal .close',function (event) {
        event.preventDefault();
        $(this).closest('.modal').modal('hide');
    })

    $(function() {

        $('.lazy').Lazy({
            // your configuration goes here
            placeholder: "data:image/gif;base64,R0lGODlhEALAPQAPzl5uLr9Nrl8e7...",
            // scrollDirection: 'vertical',
            effect: 'fadeIn',
            visibleOnly: true,
            afterLoad: function(element) {
                $('img.lazy').css('background-image','unset')
            },
            onFinishedAll: function() {
                // called once all elements was handled
            }

        });

    });
});

