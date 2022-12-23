function openSearch(){
    // let width = $(window).width();
    setTimeout(function(){
        $('.box-search-mobile_detail').toggle();

    }, 0);
}
$(document).ready(function () {
    // $(document).on('scroll',function(){
    //
    //     if ($(this).scrollTop() > 180) {
    //
    //         $('.box-menu').addClass("menu-fix");
    //         $('.box-menu-bar').fadeOut(200);
    //
    //     } else {
    //         $('.box-menu').removeClass("menu-fix");
    //         $('.box-menu-bar').fadeIn(200);
    //     }
    // });
    // $('.refresh-captcha').click(function () {
    //     $('.refresh-captcha img').toggleClass("down");
    // });
    var user = function() {
        $('.box-search-mobile').click(function(e) {
            e.stopPropagation();
            $('.box-search-mobile_detail').click(function (e) {
                e.stopPropagation();
            });
            $('.box-search-mobile_detail').toggle();
            $('.box-account-logined').fadeOut(200);

        });
        $(document).on("click",".box-account-open",function(e) {

            // $('.box-account-open').click(function(e) {
            // e.preventDefault(); // stops link from making page jump to the top
            let login_content = $('.box-account-logined');
            e.stopPropagation();
            login_content.click(function (e) {
                e.stopPropagation();
            });
            // Okee rồi nhé anh Nam ^^
            login_content.fadeToggle(200);
            $('.box-search-mobile_detail').fadeOut(100)


        });


        $('body').click( function() {
            $('.box-account-logined').fadeOut(200);
            $('.box-search-mobile_detail').fadeOut(100)
        });
        $('.close-login-popup').click( function() {
            $('.box-account-logined').fadeOut(200);
            $('.box-search-mobile_detail').fadeOut(100)

        });
        $('.nav-bar-info-search').click( function() {
            $('.user-logined-content').hide();
            $('.box-search-mobile_detail').fadeOut(100)

        });

    }
    $(document).ready(user);




    $(document).ready(function(){

        var previousScroll = 0;

        $(window).scroll(function(){
            var currentScroll = $(this).scrollTop();
            if (currentScroll > 80 && currentScroll < $(document).height() - $(window).height()){
                if (currentScroll >= previousScroll){
                    window.setTimeout(hideNav, 100);
                } else {
                    window.setTimeout(showNav, 100);
                }
                previousScroll = currentScroll;
            }else{
                window.setTimeout(hideNav, 100);
            }
        });
        function hideNav() {
            $('.box-menu').removeClass("menu-fix");
            $('.box-menu-bar').fadeIn(200);
            $('.rotation-leaderboard').css('top', '80px');

        }
        function showNav() {
            $('.box-menu').addClass("menu-fix");
            $('.box-menu-bar').fadeOut(200);
            $('.rotation-leaderboard').css('top', '140px');


        }

    });
    $(window).scroll(function() {
        if($(window).width() < 992) {
            if ($(this).scrollTop() > 10) {
                $('.box-search_mobile').fadeIn();
            } else {
                $('.box-search_mobile').fadeOut();
            }
        }
    });

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

    Fancybox.bind('[data-fancybox="galleryAccount"]', {
        infinite: true,
        Thumbs : false,
        toolbar         : false,
        dragToClose: true,
        animated: true,
        closeButton: "top",
        openSpeed: 300,
        Image: {
            zoom: true,
            // zoom: 200
        },
        caption: function (fancybox, carousel, slide) {
            return (
                `${slide.index + 1} / ${carousel.slides.length} <br />` + slide.caption
            );
        },
        slideshow: true,
        Toolbar: {

            display: [
                { id: "prev", position: "center" },
                { id: "counter", position: "center" },
                { id: "next", position: "center" },
                { id: "zoom", position: "center" },
                "close",
            ],

        },

    });
    Fancybox.bind('[data-fancybox="galleryNickDetail"]', {
        infinite: false,
        Thumbs : true,
        toolbar         : true,
        dragToClose: true,
        animated: true,
        loop:false,
        closeButton: "top",
        openSpeed: 300,
        Image: {
            zoom: true,
            // zoom: 200
        },
        caption: function (fancybox, carousel, slide) {
            return (
                `${slide.index + 1} / ${carousel.slides.length} <br />` + slide.caption
            );
        },
        slideshow: true,
        Toolbar: {

            display: [
                { id: "prev", position: "center" },
                { id: "counter", position: "center" },
                { id: "next", position: "center" },
                { id: "zoom", position: "center" },
                "close",
            ],

        },

    });
});

