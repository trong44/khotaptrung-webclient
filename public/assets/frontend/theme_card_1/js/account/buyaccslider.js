$(document).ready(function () {

    function initAccSwiper () {
        var slider = new Swiper ('.gallery-slider', {
            autoplay: {
                delay: 2000,

            },

            slidesPerView: 1,
            centeredSlides: true,
            loop: false,
            loopedSlides: 6,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        var thumbs = new Swiper ('.gallery-thumbs', {
            slidesPerView: 5,
            spaceBetween: 2,
            centeredSlides: false,
            loop: false,
            slideToClickedSlide: true,
        });
    }

    function initAccListSwiper () {
        if ($('.swiper-list-item').length) {
            let swiperListAcc = new Swiper('.swiper-list-item',{
                autoplay: false,
                updateOnImagesReady: true,
                watchSlidesVisibility: false,
                lazyLoadingInPrevNext: false,
                lazyLoadingOnTransitionStart: false,
                slidesPerView: 5,
                speed: 300,
                spaceBetween: 16,
                touchMove: true,
                grabCursor: true,
                observer: true,
                observeParents: true,
                breakpoints: {
                    992: {
                        freeMode: true,
                        slidesPerView: 3,
                    },
                    768: {
                        freeMode: true,
                        slidesPerView: 1.8,
                    }
                },
                navigation: {
                    nextEl: ".swiper-list-acc .swiper-list-next",
                    prevEl: ".swiper-list-acc .swiper-list-prev",
                },
            });
        } 
    }


    var slug = $('.slug').val();
    var slug_category = $('.slug_category').val();

    getShowAccDetail(slug);

    function getShowAccDetail(slug) {

        var url = '/acc/'+ slug + '/showacc';
        request = $.ajax({
            type: 'GET',
            url: url,
            data: {
                // id:id
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1){

                    $('#showdetailacc').html('');
                    $('#showdetailacc').html(data.data);

                    $('.loading-data__buyacc').html('');

                    $('.data__menuacc').html('');
                    $('.data__menuacc').html(data.datamenu);

                    initAccSwiper();

                }else if (data.status == 0){

                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';

                    $('#showdetailacc').html('');
                    $('#showdetailacc').html(html);


                    var htmlform = '';
                    htmlform += '<label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">Bạn phải đăng nhập mới có thể mua tài khoản tự động.</label>';

                    $('.form__data__buyacc').html('');
                    $('.form__data__buyacc').html(htmlform);

                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

    getDichVuLienQuan(slug_category)

    function getDichVuLienQuan(slug_category) {

        var url = '/related-acc';
        request = $.ajax({
            type: 'GET',
            url: url,
            data: {
                slug:slug_category,
                ran_id: slug
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1){

                    $('#showslideracc').html('');

                    $('#showslideracc').html(data.dataslider);

                    initAccListSwiper();

                }else if (data.status == 0){

                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';

                    $('#showdetailacc').html('');
                    $('#showdetailacc').html(html);
                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

    getTaiKhoanDaXem();

    function getTaiKhoanDaXem() {

        var url = '/watched-acc';
        request = $.ajax({
            type: 'GET',
            url: url,
            data: {
                slug:slug_category,
                ran_id: slug
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1){

                    $('#showswatched').html('');
                    $('#showswatched').html(data.datawatched);

                    initAccListSwiper();

                }else if (data.status == 0){
                    $('#showswatched').html('');
                }else if (data.status == 2){
                    $('#showswatched').html('');
                    console.log("chưa có dữ liệu")
                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }
});