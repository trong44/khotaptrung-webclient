$(document).ready(function(){
var banner_slide = new Swiper('.banner-slide', {
    autoplay: true,

    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,

    centeredSlides: false,
    slidesPerView: 1,
    speed: 1200,
    delay: 5000,

    loop: "infinite",
    effect: "fade",

    // spaceBetween: 56,
    freeMode: false,
    touchMove: true,
    freeModeSticky:true,
    grabCursor: true,
    observer: true,
    observeParents: true,
    keyboard: {
        enabled: true,
    },
    // breakpoints: {
    //
    //     992: {
    //         slidesPerView: 3,
    //     },
    //
    //
    //     480: {
    //         slidesPerView: 1.5,
    //
    //     }
    // }
});
var intro_list = new Swiper('.list-intro', {
    autoplay: false,

    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,
    loop: false,
    centeredSlides: false,
    slidesPerView: 4,
    speed: 800,
    spaceBetween: 56,
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
            slidesPerView: 3,
        },


        480: {
            slidesPerView: 1.5,

        }
    }
});

var news_list = new Swiper('.list-article', {
    autoplay: false,
    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,
    loop: false,
    centeredSlides: false,
    slidesPerView: 5,
    speed: 800,
    spaceBetween: 18,
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

        1199: {
            slidesPerView: 3,
        },
        480: {
            slidesPerView: 2.5,
            spaceBetween: 6,
        }
    }
});
var news_list_home = new Swiper('.list-news', {
        autoplay: false,

        updateOnImagesReady: true,
        watchSlidesVisibility: false,
        lazyLoadingInPrevNext: false,
        lazyLoadingOnTransitionStart: false,
        loop: false,
        centeredSlides: false,
        slidesPerView: 5,
        speed: 800,
        spaceBetween: 20,
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
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 3,
            },

            480: {
                slidesPerView: 1.8,
                spaceBetween: 6,
            }
        }
    });
var other_nick_list = new Swiper('.list-other-nick', {
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

var minigame_list = new Swiper('.minigame-swiper', {
    autoplay: false,
    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,
    loop: false,
    centeredSlides: false,
    slidesPerView: 1.8,
    speed: 800,
    spaceBetween: 8,
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
            slidesPerView: 3,
        },
        768: {
            slidesPerView: 2.2,
        },

        480: {
            slidesPerView: 1.5,

        }
    }
});
// var product_list = new Swiper('.list-product', {
//     autoplay: false,
//     updateOnImagesReady: true,
//     watchSlidesVisibility: false,
//     lazyLoadingInPrevNext: false,
//     lazyLoadingOnTransitionStart: false,
//     loop: false,
//     centeredSlides: false,
//     slidesPerView: 4,
//
//     speed: 2000,
//     spaceBetween: 20,
//     freeMode: true,
//     velocityRatio: 20,
//     touchMove: true,
//     freeModeSticky:true,
//     grabCursor: true,
//     observer: true,
//     observeParents: true,
//     keyboard: {
//         enabled: true,
//     },
//     breakpoints: {
//         1024: {
//             slidesPerView: 3.2,
//         },
//         992: {
//             slidesPerView: 3.6,
//         },
//
//         768: {
//             slidesPerView: 2.4,
//         },
//         480: {
//             slidesPerView: 1.8,
//             spaceBetween: 6,
//         }
//     }
// });



});
