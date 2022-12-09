
$(document).ready(function () {
    $(function(){
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
    });
})

