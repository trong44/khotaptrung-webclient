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
                    $('#successModal').modal('show');
                    swal({
                        title: "Mua tài khoản thành công",
                        text: "Thông tin chi tiết tài khoản vui lòng về lịch sử đơn hàng.",
                        type: "success",
                        confirmButtonText: "Về lịch sử đơn hàng",
                        showCancelButton: true,
                        cancelButtonText: "Đóng",
                    })
                        .then((result) => {
                            var slug_category = $('.slug_category').val();

                            if (result.value) {
                                window.location = '/lich-su-mua-account';
                            } else if (result.dismiss === "Đóng") {
                                window.location = '/mua-acc/'+ slug_category;
                            }else {
                                window.location = '/mua-acc/'+ slug_category;
                            }
                        })
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

    $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
        window.scrollTo(window.scrollX, window.scrollY + 1);
    })
    $('body').on('click', '.lm_xemthem', function () {
        window.scrollTo(window.scrollX, window.scrollY + 1);
    })

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

});
