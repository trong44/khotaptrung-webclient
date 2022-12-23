$(document).ready(function () {

    setDisplayLink(0, 'skin-paginate');
    setDisplayLink(0, 'tft-paginate');
    setDisplayLink(0, 'champion-paginate');

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

    $(document).on('click', '.lm_xemthem_tuong', function (e) {
        e.preventDefault();
        $('#modal-champion-list').modal('show');
    });

    $(document).on('click', '.lm_xemthem_linhthu', function (e) {
        e.preventDefault();
        $('#modal-champion-tft').modal('show');
    });

    $(document).on('click', '.lm_xemthem_trangphuc', function (e) {
        e.preventDefault();
        $('#modal-lol-custom').modal('show');
    });

    $(document).on('click', '.buyacc',function(e){
        e.preventDefault();
        var htmlloading = '';

        htmlloading += '<div class="loading"></div>';
        $('.loading-data__buyacc').html('');
        $('.loading-data__buyacc').html(htmlloading);

        // var id = $(this).data("id");

        $('.loadModal__acount').modal('toggle');
        $('.loading-data__buyacc').html('');
        // getBuyAcc(id)
    });

    $(document).on('submit', '.formDonhangAccount', function(e){
        e.preventDefault();
        var htmlloading = '';

        htmlloading += '<div class="loading"></div>';
        $('.loading-data__muangay').html('');
        $('.loading-data__muangay').html(htmlloading);

        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        btnSubmit.prop('disabled', true);
        $('.loginBox__layma__button__displayabs').prop('disabled', true);

        $.ajax({
            type: "POST",
            url: url,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {

            },
            success: function (response) {

                if(response.status == 1){
                    $('.loadModal__acount').modal('hide');
                    $('#successModal').modal('show');
                }
                else if (response.status == 2){
                    $('.loadModal__acount').modal('hide');

                    swal(
                        'Thông báo!',
                        response.message,
                        'warning'
                    )
                    $('.loginBox__layma__button__displayabs').prop('disabled', false);
                }else {
                    $('.loadModal__acount').modal('hide');
                    swal(
                        'Lỗi!',
                        response.message,
                        'error'
                    )
                    $('.loginBox__layma__button__displayabs').prop('disabled', false);
                }
                $('.loading-data__muangay').html('');
            },
            error: function (response) {
                if(response.status === 422 || response.status === 429) {
                    let errors = response.responseJSON.errors;

                    jQuery.each(errors, function(index, itemData) {

                        formSubmit.find('.notify-error').text(itemData[0]);
                        return false; // breaks
                    });
                }else if(response.status === 0){
                    alert(response.message);
                    $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+response.message+'</span>');
                }
                else {
                    $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+'Kết nối với hệ thống thất bại.Xin vui lòng thử lại'+'</span>');
                }
            },
            complete: function (data) {
                $('#successModal').on('hidden.bs.modal', function () {
                    window.location.replace("/");
                });
                btnSubmit.prop('disabled', false);
            }
        })


    });

    // Paginate Handle
    function setDisplayLink (page, paginateTab) {
        let firstPage = $(`.js-pagination-handle.${paginateTab} .page-item:first-child .page-link`).data('page');
        let lastPage = $(`.js-pagination-handle.${paginateTab} .page-item:last-child .page-link`).data('page');

        //Display none all page item
        $(`.js-pagination-handle.${paginateTab} .page-item`).addClass('d-none');

        if ( page > 2 ) {
            $(`.js-pagination-handle.${paginateTab} .page-item-0`).removeClass('d-none');
        }

        if ( page > 3 ) {
            $(`.js-pagination-handle.${paginateTab} .page-item.dot-first-paginate`).removeClass('d-none');
        }

        for ( let i = firstPage; i <= lastPage; i++ ) {
            if ( i >= page - 2 && i <= page + 2 ) {
                if ( i == page ) {
                    $(`.js-pagination-handle.${paginateTab} .page-item`).removeClass('active');
                    $(`.js-pagination-handle.${paginateTab} .page-item-${i}`).removeClass('d-none');
                    $(`.js-pagination-handle.${paginateTab} .page-item-${i}`).addClass('active');
                } else {
                    $(`.js-pagination-handle.${paginateTab} .page-item-${i}`).removeClass('d-none');
                }
            }
        }

        if ( page < lastPage - 3 ) {
            $(`.js-pagination-handle.${paginateTab} .page-item.dot-last-paginate`).removeClass('d-none');
        }

        if ( page < lastPage - 2 ) {
            $(`.js-pagination-handle.${paginateTab} .page-item-${lastPage}`).removeClass('d-none');
        }

    }

    $('.js-pagination-handle .page-item .page-link').on('click', function (e) {
        e.preventDefault();
        let pageSelected = $(this).data('page');
        let paginateTab = $(this).closest('.js-pagination-handle').data('tab');
        if ( pageSelected === undefined || pageSelected === null || pageSelected === "" ) {
            return false;
        }

        setDisplayLink(pageSelected, paginateTab);
    });

    // Suggestion handle

    $('#modal-lol-custom #input-search-skins').on('input', function () {

        let result_ul = $('#modal-lol-custom .sugges_list');
        result_ul.empty();
        result_ul.toggleClass('d-none', !$(this).val().trim());

        let keyword = convertToSlug($(this).val());
        Array.from($('#content_page_skin .item-nick-lmht__border')).forEach(function (elm) {
            let text = convertToSlug($(elm).find('.properties-lol-title').text().trim())
            if (text.indexOf(keyword) > -1) {
                let html = `<li class="sugges_item">${$(elm).find('.properties-lol-title').text()}</li>`;
                result_ul.append(html);
            }
        })
    });

    $('#modal-champion-list #input-search-champ').on('input', function () {

        let result_ul = $('#modal-champion-list .sugges_list');
        result_ul.empty();
        result_ul.toggleClass('d-none', !$(this).val().trim());

        let keyword = convertToSlug($(this).val());
        Array.from($('#content_page_champ .item-nick-lmht__border')).forEach(function (elm) {
            let text = convertToSlug($(elm).find('.properties-lol-title').text().trim())
            if (text.indexOf(keyword) > -1) {
                let html = `<li class="sugges_item">${$(elm).find('.properties-lol-title').text()}</li>`;
                result_ul.append(html);
            }
        })
    });

    $('#modal-champion-tft #input-search-conpanion').on('input', function () {

        let result_ul = $('#modal-champion-tft .sugges_list');
        result_ul.empty();
        result_ul.toggleClass('d-none', !$(this).val().trim());

        let keyword = convertToSlug($(this).val());
        Array.from($('#content_page_companion .item-nick-lmht__border')).forEach(function (elm) {
            let text = convertToSlug($(elm).find('.properties-lol-title').text().trim())
            if (text.indexOf(keyword) > -1) {
                let html = `<li class="sugges_item">${$(elm).find('.properties-lol-title').text()}</li>`;
                result_ul.append(html);
            }
        })
    });

    $('.submit-search-skins').on('click', function () {
        let keyword = convertToSlug($('#input-search-skins').val());
        let elm_result = $('#result-search-skin');
        elm_result.empty();
        $('.sugges_list').addClass('d-none')
        Array.from($('#content_page_skin .item-nick-lmht')).forEach(function (elm) {
            let text = convertToSlug($(elm).find('.properties-lol-title').text().trim())
            if (text && text.indexOf(keyword) > -1) {
                let new_elm = $(elm).clone();
                new_elm.find('img').attr('src', new_elm.find('img').attr('data-original'))
                elm_result.append(new_elm);
            }
        });

        elm_result.toggleClass('d-none', !keyword);
        $('#tab-panel-skins').toggleClass('d-none', !!keyword);
    });
    
    $('.submit-search-champ').on('click', function () {
        let keyword = convertToSlug($('#input-search-champ').val());
        let elm_result = $('#result-search-champ');
        elm_result.empty();
        $('.sugges_list').addClass('d-none')
        Array.from($('#content_page_champ .item-nick-lmht')).forEach(function (elm) {
            let text = convertToSlug($(elm).find('.properties-lol-title').text().trim())
            if (text && text.indexOf(keyword) > -1) {
                let new_elm = $(elm).clone();
                new_elm.find('img').attr('src', new_elm.find('img').attr('data-original'))
                elm_result.append(new_elm);
            }
        });
        elm_result.toggleClass('d-none', !keyword);
        $('#tab-panel-champ').toggleClass('d-none', !!keyword);
    });
    $('.submit-search-companion').on('click', function () {
        let keyword = convertToSlug($('#input-search-conpanion').val());
        let elm_result = $('#result-search-companion');
        elm_result.empty();
        $('.sugges_list').addClass('d-none')
        Array.from($('#content_page_companion .item-nick-lmht')).forEach(function (elm) {
            let text = convertToSlug($(elm).find('.properties-lol-title').text().trim())
            if (text && text.indexOf(keyword) > -1) {
                let new_elm = $(elm).clone();
                new_elm.find('img').attr('src', new_elm.find('img').attr('data-original'))
                elm_result.append(new_elm);
            }
        });
        elm_result.toggleClass('d-none', !keyword);
        $('#tab-panel-companion').toggleClass('d-none', !!keyword);
    });
    $('.sugges_list').on('click', '.sugges_item', function () {
        let text = $(this).text();
        $(this).parent().prev().val(text);
        $(this).parent().next().trigger('click');
    });


});