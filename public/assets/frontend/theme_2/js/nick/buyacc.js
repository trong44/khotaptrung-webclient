$(document).ready(function () {

    setDisplayLink(0, 'skin-paginate');
    setDisplayLink(0, 'tft-paginate');
    setDisplayLink(0, 'champion-paginate');

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
                    $('#successNickPurchase').modal('show');
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
                btnSubmit.prop('disabled', false);
            }
        })


    })

    $(document).on('click', '.tinhnang',function(e){
        $('#notInbox').modal('show');
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

    $('body').on('click','.show-modal-champ',function (e) {
        e.preventDefault();
        $('#modal-champ').modal('show').find('.modal-body').trigger('scroll');
    })
    $('body').on('click','.show-modal-skin',function (e) {
        e.preventDefault();
        $('#modal-skin').modal('show').find('.modal-body').trigger('scroll');
    })
    $('body').on('click','.show-modal-animal',function (e) {
        e.preventDefault();
        $('#modal-animal').modal('show').find('.modal-body').trigger('scroll');
    })

    $('.modal-lmht .modal-body').on('scroll',function () {
        $('html body').trigger('scroll');
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

    // Handle suggestion
    $('.form-search-modal-input').on('input', function () {

        let formBlock = $(this).closest('.form-search-modal');
        let dataBlock = formBlock.data('tab');
        let result_ul = $(formBlock).find('.suggest-list');

        result_ul.empty();
        result_ul.toggleClass('d-none', !$(this).val().trim());

        let keyword = convertToSlug($(this).val());
        Array.from($(`${dataBlock} .card-lmht`)).forEach(function (elm) {
            let text = convertToSlug($(elm).find('.card-name').text().trim())
            if (text.indexOf(keyword) > -1) {
                let html = `<li class="suggest-item">${$(elm).find('.card-name').text().trim()}</li>`;
                result_ul.append(html);
            }
        })
    });

    $('.suggest-list').on('click', '.suggest-item', function () {
        let text = $(this).text();
        $(this).parent().prev().val(text);
        $(this).parent().next().trigger('click');
    });

    $('.form-search-modal').on('submit', function (e) {
        e.preventDefault();
        let modalBlock = $(this).closest('.modal-lmht');
        let dataBlock = $(this).data('tab');
        let keyword = convertToSlug($(this).find('.form-search-modal-input').val().trim());
        let elm_result = $(modalBlock).find('.modal-lmht-search-results');
        elm_result.empty();
        $('.suggest-list').addClass('d-none')
        Array.from($(`${dataBlock} .card-lmht`)).forEach(function (elm) {
            let text = convertToSlug($(elm).find('.card-name').text().trim())
            if (text && text.indexOf(keyword) > -1) {
                let new_elm = $(elm).clone();
                new_elm.find('img').attr('src', new_elm.find('img').attr('data-original'));
                let elmBlock = jQuery("<div></div>", {class: "col-lg-2 col-6"});
                elmBlock.append(new_elm);
                elm_result.append(elmBlock);
            }
        });
        elm_result.toggleClass('d-none', !keyword);
        $(modalBlock).find('.modal-lmht-tabs-block').toggleClass('d-none', !!keyword);
    });

});
