$(document).ready(function () {
    getShowAccRandomDetail()

    function getShowAccRandomDetail() {

        var url = '/mua-nick-random';
            $.ajax({
            type: 'GET',
            url: url,
            success: (data) => {
                if (data.status == 1){
                    $('#nick-random-home-wrap').empty().append(data.data);
                }else if (data.status == 0){
                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';
                    $('#nick-random-home-wrap').html(html);
                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        }).done(function () {
                initSwiperAccGame();
        })
    }
    function initSwiperAccGame() {
        new Swiper('.list-other-nick', {
            autoplay: false,
            updateOnImagesReady: true,
            watchSlidesVisibility: false,
            lazyLoadingInPrevNext: false,
            lazyLoadingOnTransitionStart: false,
            loop: false,
            centeredSlides: false,
            slidesPerView: 4,
            speed: 800,
            spaceBetween: 6,
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
                    slidesPerView: 1.8,
                },
                768: {
                    slidesPerView: 2.4,
                },


                480: {
                    slidesPerView: 1.8,

                }
            }
        });
    }
})