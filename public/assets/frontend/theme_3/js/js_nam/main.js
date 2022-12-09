//Toggle hamburger bar
// $('.item-search-mobile').click( function(){
//     $('.layout').addClass('search-active');
//     $('.input-search').focus();
// });

//Button open recharge modal and change tab
$(document).on('click', '.btn-open-recharge', function (e) {
    e.preventDefault();
    $('#rechargeModal').modal('show');
    let tabActive = $(this).data('tab');

    if (tabActive) {
        if (tabActive == 1) {
            $('[href="#tab-modal-recharge"]').tab('show');
        }
        if (tabActive == 2) {
            $('[href="#tab-modal-atm"]').tab('show');
        }
    } else {
        $('[href="#tab-modal-recharge"]').tab('show');
    }
});

//Handle Toggle Viewmore Action
$(document).on('click', '.view-more', function (e) {
    e.preventDefault();
    let viewBlock = $(this).closest('.detailViewBlock');
    let viewBlockTitle = $(viewBlock).find('.detailViewBlockTitle').text();
    let viewBlockContent = $(viewBlock).find('.detailViewBlockContent').html();
    console.log(viewBlock, viewBlockTitle, viewBlockContent);
    $('#viewMore #detailTitle').text(viewBlockTitle);
    $('#viewMore #detailContent').html(viewBlockContent);
    $('#viewMore').modal('show');
});

// side bar
var openHamburgerBar = false;
$('.open-hamburger-sidebar').click(function (e) {
    // if (!openHamburgerBar) {

        e.preventDefault();
        // $('.menu-category-mobile').addClass('menu-category-mobile_show');
        $('.menu-category-mobile').toggleClass('menu-category-mobile_show');
         $('.mobile-auth').removeClass('mobile-auth-show');
         $('.menu-profile-mobile').removeClass('menu-profile-mobile_show');

    // $('.open-hamburger-sidebar').css('display', 'none');
        // $('.close-hamburger-sidebar').css('display', 'flex');
        // openHamburgerBar = true;
    // }
});
function openMenuProfile(){
    // let width = $(window).width();
    setTimeout(function(){
        $('.menu-profile-mobile').toggleClass('menu-profile-mobile_show');
        $('.menu-category-mobile').removeClass('menu-category-mobile_show');

    }, 0);
}
// $('.close-hamburger-sidebar').click(function (e) {
//     if (openHamburgerBar) {
//         e.preventDefault();
//         $('.menu-category-mobile').removeClass('menu-category-mobile_show');
//         $('.open-hamburger-sidebar').css('display', 'flex');
//         $('.close-hamburger-sidebar').css('display', 'none');
//         openHamburgerBar = false;
//     }
// });
// search
var searchBar = false;
$('.item-search-mobile').click(function (e) {
    if (!searchBar) {
        e.preventDefault();
        $('.search-active').fadeToggle(100);
        $('.nav-overlay').fadeToggle(100);
        $('.input-search').focus();
        searchBar = true;
    }
});

$('.icon-search-close').click(function (e) {
    if (searchBar) {
        e.preventDefault();
        $('.search-active').fadeOut(100);
        $('.nav-overlay').fadeOut(100);

        searchBar = false;
    }
});
$('.nav-overlay').click(function (e) {
    if (searchBar) {
        e.preventDefault();
        $('.search-active').fadeOut(100);
        $('.nav-overlay').fadeOut(100);
        searchBar = false;
    }
});
$('.auth-nav-login').click(function (e) {
    $('.text-login').html('<h3>Đăng nhập</h3>')
});
$('.auth-nav-regist').click(function (e) {
    $('.text-login').html('<h3>Đăng ký</h3>')
});

function Redirect(){
    window.location.href = "/";
}

// menu profile side
// var menu_profile = false;
// $('.box-account-mobile_open').click(function (e) {
//
//     if (!menu_profile) {
//
//         e.preventDefault();
//         $('.menu-profile-mobile').addClass('menu-profile-mobile_show');
//         $('.box-account-mobile_open').css('display', 'none');
//         $('.box-account-mobile_close').css('display', 'block');
//         menu_profile = true;
//
//     }
// });
//
// $('.box-account-mobile_close').click(function (e) {
//     if (menu_profile) {
//         e.preventDefault();
//         $('.menu-profile-mobile').removeClass('menu-profile-mobile_show');
//         $('.box-account-mobile_close').css('display', 'none');
//         $('.box-account-mobile_open').css('display', 'block');
//         menu_profile = false;
//     }
// });

// $('.box-list-service').mouseover(function () {
//     let menu_service = $('.box-list-service');
//     animateTime = 10;
//
//         autoHeightAnimate(menu_service, animateTime);
// }).mouseout(function() {
//     let menu_service = $('.box-list-service');
//     menu_service.stop().animate({ height: '56px' }, animateTime);
// });
// $('.box-list-top').mouseover(function () {
//     let menu_top_list = $('.box-list-top');
//
//     animateTime = 10;
//         autoHeightAnimate(menu_top_list, animateTime);
//
// }).mouseout(function() {
//     let menu_top_list = $('.box-list-top');
//     menu_top_list.stop().animate({ height: '56px' }, animateTime);
// });
// function autoHeightAnimate(element, time){
//     var curHeight = element.height(), // Get Default Height
//         autoHeight = element.css('height', 'auto').height(); // Get Auto Height
//     element.height(curHeight); // Reset to Default Height
//     element.stop().animate({ height: autoHeight }, time); // Animate to Auto Height
// }


var user = function() {
    $('.box-account-logined').click(function(e) {
        // e.preventDefault(); // stops link from making page jump to the top
        let login_content = $('.account-logined-content');
        e.stopPropagation();
        login_content.click(function (e) {
            e.stopPropagation();
        });
        // Okee rồi nhé anh Nam ^^
        login_content.fadeToggle(200);
        $(".notification-menu").hide();
        $('#myPopover10d').hide();

    });


    $('body').click( function() {
        $('.account-logined-content').hide();
    });
    $('.notification img').click( function() {
        $('.user-logined-content').hide();
    });
    $('.nav-bar-info-search').click( function() {
        $('.user-logined-content').hide();
    });

}
$(document).ready(user);
$(document).ready(function (e) {
    $('.select-form').niceSelect();
});
$(document).ready(function (e) {

    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches
    //    Step

    $('body').on('click','#charge_next.button-next-step-one',function(){

    })
    $('body').on('click','#recharge_atm_next.button-next-step-one',function(){
        if (animating) return false;
        animating = true;

        // current_fs = $('#mobile-caythue .input-next-step-one').parent();
        // next_fs = $('#mobile-caythue .input-next-step-one').parent().next();

        current_fs = $('#fieldset-one_transaction');
        next_fs = $('#fieldset-two-transfer');
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now, mx) {
                left = (now * 50) + "%";
                opacity = 1 - now;
                next_fs.css({'left': left, 'opacity': opacity});
            },
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            easing: 'easeInOutBack'
        });
    })
    $('body').on('click','#wallet_next.button-next-step-one',function(){
        if (animating) return false;
        animating = true;

        // current_fs = $('#mobile-caythue .input-next-step-one').parent();
        // next_fs = $('#mobile-caythue .input-next-step-one').parent().next();

        current_fs = $('#fieldset-one_transaction');
        next_fs = $('#fieldset-two-charge');
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now, mx) {
                left = (now * 50) + "%";
                opacity = 1 - now;
                next_fs.css({'left': left, 'opacity': opacity});
            },
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            easing: 'easeInOutBack'
        });
    })

    $('body').on('click','#charge_prev.previous-step-one',function(){

        if(animating) return false;
        animating = true;

        current_fs = $('#fieldset-two-charge');
        previous_fs = $('#fieldset-one_transaction');

        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1-now) * 50)+"%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'opacity': opacity});
            },
            // duration: 200,
            complete: function(){
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });
    $('body').on('click','#recharge_atm_prev.previous-step-one',function(){

        if(animating) return false;
        animating = true;

        current_fs = $('#fieldset-two-transfer');
        previous_fs = $('#fieldset-one_transaction');

        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now, mx) {
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1-now) * 50)+"%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'opacity': opacity});
            },
            // duration: 200,
            complete: function(){
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });


    // $('body').on('click','.button-next-step-two',function(){
    //
    //     if(animating) return false;
    //     animating = true;
    //
    //     current_fs = $('#fieldset-two');
    //     previous_fs = $('#fieldset-one');
    //
    //     //show the previous fieldset
    //     previous_fs.show();
    //     //hide the current fieldset with style
    //     current_fs.animate({opacity: 0}, {
    //         step: function(now, mx) {
    //             //1. scale previous_fs from 80% to 100%
    //             scale = 0.8 + (1 - now) * 0.2;
    //             //2. take current_fs to the right(50%) - from 0%
    //             left = ((1-now) * 50)+"%";
    //             //3. increase opacity of previous_fs to 1 as it moves in
    //             opacity = 1 - now;
    //             current_fs.css({'left': left});
    //             previous_fs.css({'opacity': opacity});
    //         },
    //         // duration: 200,
    //         complete: function(){
    //             current_fs.hide();
    //             animating = false;
    //         },
    //         //this comes from the custom easing plugin
    //         easing: 'easeInOutBack'
    //     });
    //
    //     $('#successModal').modal('show');
    // });

    $('.view-more-top').click(function(){
        $('.view-less-top').css("display","block");
        $('.view-more-top').css("display","none");
        $(".item-top-content").addClass( "showtext_top" );
    });
    $('.view-less-top').click(function(){
        $('.view-more-top').css("display","block");
        $('.view-less-top').css("display","none");
        $(".item-top-content").removeClass( "showtext_top");
    });

    var countDownDateHome = new Date("June 14, 2022 18:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDateHome - now;

        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance / (1000 * 60 * 60)));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element
        $('#hourHome').text(hours);
        $('#minuteHome').text(minutes);
        $('#secondHome').text(seconds);


        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            $('#hourHome').text('0');
            $('#minuteHome').text('0');
            $('#secondHome').text('0');
        }
    }, 1000);


// Coppy text vào bộ nhớ
    $('.js-copy-text').on('click', function () {
        let text_value = $(this).parent().find('.card__info').text().trim();
        navigator.clipboard.writeText(text_value);
    });
    tippy('.js-copy-text', {
        // default
        trigger: 'click',
        content: "Đã coppy !",
        placement: 'right',
    });
    //
    // $(document).on('scroll',function(){
    //     if ($(this).scrollTop() > 200) {
    //
    //         $('#heading').addClass("header-fix");
    //     } else {
    //         $('#heading').removeClass("header-fix");
    //     }
    //
    //
    // });


    $('body').on('click','.btn-charge-data',function(e){
        e.preventDefault();
        $('#openCharge').modal('show');
    })
    $('body').on('click','.openChargeSuccess',function(e){
        e.preventDefault();
        $('#openCharge').modal('hide');
        $('#successChargeModal').modal('show');
    });

    $('body').on('click','.menu_login',function(e){
        e.preventDefault();

        let width = $(window).width();
        setTimeout(function(){
            if ( width > 1200 ) {
                $('#loginModal').modal('show');
                setTimeout(() => {
                    $('#loginModal #modal-login-container').removeClass('right-panel-active');
                }, 200);
            } else {
                $('.mobile-auth').toggleClass('mobile-auth-show');
                $('.menu-category-mobile').removeClass('menu-category-mobile_show');
            }
        }, 0);

    });

    $(document).on('scroll', function () {
        if($(window).width() > 992) {
            if ($(this).scrollTop() > 600) {
                $('.go-to-top').fadeIn();
            } else {
                $('.go-to-top').fadeOut();
            }
        }
        $(window).resize(function() {
            if($(window).width() > 992) {
                if ($(this).scrollTop() > 600) {
                    $('.go-to-top').fadeIn();
                } else {
                    $('.go-to-top').fadeOut();
                }
            }
        });
    });

    // $('body').on('click','.openChargeSuccess',function(e){
    //     e.preventDefault();
    //     $('#openCharge').modal('hide');
    //     $('#rejectChargeModal').modal('show');
    // })

    // $('body').on('click','.btn-data-charge_atm',function(e){
    //     e.preventDefault();
    //
    //     $('#successChargeAtmModal').modal('show');
    // })
    // $('body').on('click','.btn-data-charge_atm',function(e){
    //     e.preventDefault();
    //
    //     $('#successChargeAtmModal').modal('show');
    // })
    // $('body').on('click','.btn-data-wallet_card',function(e){
    //     e.preventDefault();
    //
    //     $('#successWalletCardModal').modal('show');
    // })
    // Fancybox.defaults.infinite = 0;
    Fancybox.bind('[data-fancybox="gallerycoverDetail"]', {
        infinite: true,
        thumbs : {
            autoStart : true,
        },
        dragToClose: true,
        animated: true,
        closeButton: "top",
        openSpeed: 300,
        Image: {
            zoom: false,
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
                "close",
            ],

        },

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
})
