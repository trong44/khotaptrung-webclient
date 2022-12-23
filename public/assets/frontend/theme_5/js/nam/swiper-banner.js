var banner_slide = new Swiper('.swiper-banner', {
    autoplay: true,
    pagination: {
        el: '.banner-slide .swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-banner .navigation.slider-next',
        prevEl: '.swiper-banner .navigation.slider-prev',
    },
    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,

    centeredSlides: false,
    slidesPerView: 1,
    speed: 600,
    delay: 5000,

    loop: "infinite",


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

var banner_slide_text = new Swiper('.news-ads-slide', {
    autoplay: true,
    pagination: {
        el: '.banner-news .swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.news-ads-slide .navigation.slider-next',
        prevEl: '.news-ads-slide .navigation.slider-prev',
    },
    updateOnImagesReady: true,
    watchSlidesVisibility: false,
    lazyLoadingInPrevNext: false,
    lazyLoadingOnTransitionStart: false,

    centeredSlides: false,
    slidesPerView: 1,
    speed: 600,
    delay: 5000,

    loop: "infinite",
    //
    effect: "slide",
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
    breakpoints: {
        // 2000: {
        //
        // },
        // 992: {
        //
        // },
        //
        //
        // 480: {
        //     effect: "slide",
        //
        // }
    }
});
