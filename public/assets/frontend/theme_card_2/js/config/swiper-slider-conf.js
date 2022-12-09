let swiper_flash_sale = new Swiper('.js-flash-sale-swiper',{
    autoplay: false,
    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,
    slidesPerView: 4,
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
            slidesPerView: 1.25,
        }
    },
    navigation: {
        nextEl: ".js-flash-sale-swiper .navigation.slider-next",
        prevEl: ".js-flash-sale-swiper .navigation.slider-prev",
    },
});

let swiper_slider_news = new Swiper('.js-swiper-news',{
    autoplay: false,
    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,
    slidesPerView: 4,
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
            slidesPerView: 1.25,
        }
    },
    navigation: {
        nextEl: ".js-swiper-news .navigation.slider-next",
        prevEl: ".js-swiper-news .navigation.slider-prev",
    },
});

let swiper_config_category = new Swiper('.section-category .class-config-demo',{
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
            slidesPerView: 1.5,
        }
    },
    navigation: {
        nextEl: ".class-config-demo .navigation.slider-next",
        prevEl: ".class-config-demo .navigation.slider-prev",
    },
});

let c_swiper_config_category = new Swiper('.c_section-category .class-config-demo',{
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
            slidesPerView: 2.3,
        }
    },
    navigation: {
        nextEl: ".class-config-demo .navigation.slider-next",
        prevEl: ".class-config-demo .navigation.slider-prev",
    },
});

let swiper_config_category_tab = new Swiper('.section-category-tab .class-config-demo',{
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
            slidesPerView: 2.25,
            spaceBetween: 12,
        }
    },
    navigation: {
        nextEl: ".class-config-demo .navigation.slider-next",
        prevEl: ".class-config-demo .navigation.slider-prev",
    },
});

let swiper_config_acc_game = new Swiper('.swiper-acc-game',{
    autoplay: false,
    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,
    slidesPerView: 5,
    speed: 300,
    spaceBetween: 16,
    touchMove: false,
    grabCursor: false,
    simulateTouch:false,
    observer: true,
    observeParents: true,
    breakpoints: {
        992: {
            freeMode: true,
            simulateTouch:true,
            slidesPerView: 3,
        },
        768: {
            freeMode: true,
            slidesPerView: 2.25,
            simulateTouch:true,
            spaceBetween: 12,
        }
    },
});

let swiper_config_related_service = new Swiper('.swiper-related-service',{
    autoplay: false,
    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,
    slidesPerView: 5,
    speed: 300,
    spaceBetween: 16,
    touchMove: false,
    grabCursor: false,
    observer: true,
    observeParents: true,
    breakpoints: {
        992: {
            freeMode: true,
            slidesPerView: 3,
        },
        768: {
            freeMode: true,
            slidesPerView: 2.25,
            spaceBetween: 12,
        }
    },
    navigation: {
        nextEl: ".swiper-related-service .navigation.slider-next",
        prevEl: ".swiper-related-service .navigation.slider-prev",
    },
});

let swiper_card_other = new Swiper('.swiper-card',{
    autoplay: false,
    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,
    slidesPerView: 4,
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
            slidesPerView: 1.5,
        }
    },
    navigation: {
        nextEl: ".card-other .navigation.slider-next",
        prevEl: ".card-other .navigation.slider-prev",
    },
});

let swiper_card_bought = new Swiper(".slider--card", {
    slidesPerView: 1,
    spaceBetween: 16,
    freeMode: true,
    observer: true,
    observeParents: true,
});

function initSwiperGallery() {

    if ($('.gallery-top').length) {
        let galleryTop = new Swiper('.gallery-top', {
            centeredSlides: true,
            spaceBetween: 16,
            touchRatio: 0.2,
            slidesPerView: "auto",
            slideToClickedSlide: true,
            loop: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            direction: "vertical",
            observer: true,
            observeParents: true,
        });
        let galleryThumbs = new Swiper('.gallery-thumbs', {
            loop: true,
            clickable: true,
            slideToClickedSlide: true,
            slidesPerView: "auto",
            navigation: {
                nextEl: ".acc-detail .navigation.slider-next",
                prevEl: ".acc-detail .navigation.slider-prev",
            },
            pagination: {
                el: ".tab-show-acc.count-thumb",
                type: "fraction",
            },
            observer: true,
            observeParents: true,
        });
        galleryTop.controller.control = galleryThumbs;
        galleryThumbs.controller.control = galleryTop;
    }
}

function initSwiperNick() {
    if ($('.class-config-demo').length) {
        let swiper_config_category_c = new Swiper('.section-category_c .class-config-demo',{
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
                nextEl: ".class-config-demo .navigation.slider-next",
                prevEl: ".class-config-demo .navigation.slider-prev",
            },
        });
    }
}
