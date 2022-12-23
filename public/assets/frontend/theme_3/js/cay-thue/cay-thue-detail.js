$(document).ready(function (e) {

    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    var product_list = new Swiper('.list-nap-game', {
        autoplay: false,
        navigation: {
            nextEl: '.swiper-nap-game .swiper-button-next',
            prevEl: '.swiper-nap-game .swiper-button-prev',
        },
        // preloadImages: false,
        updateOnImagesReady: true,
        // lazyLoading: false,
        watchSlidesVisibility: false,
        lazyLoadingInPrevNext: false,
        lazyLoadingOnTransitionStart: false,

        loop: false,
        centeredSlides: false,
        slidesPerView: 4.5,
        slidesPerGroup: 3,
        speed: 800,
        spaceBetween: 16,
        touchMove: true,
        freeMode:true,
        freeModeSticky:true,
        grabCursor: true,
        observer: true,
        observeParents: true,
        breakpoints: {
            992: {
                slidesPerView: 3.2,
            },
            768:{
                slidesPerView: 3.2,
            },
            480: {
                slidesPerView: 1.5,

            }
        }
    });

    // Click event of the showPassword button
    $('.show-btn-password').on('click', function(){

        // Get the password field
        let passwordField = $('#password');
        if (passwordField.attr('type') === "password") {
            passwordField.attr('type','text');
            $(this).find('img').attr('src','/assets/frontend/theme_3/image/images_1/eye-hide.svg')
        } else {
            passwordField.attr('type','password')
            $(this).find('img').attr('src','/assets/frontend/theme_3/image/images_1/eye-show.svg')
        }

    });

    $('.show-btn-password-mobile').on('click', function(){

        // Get the password field
        var passwordField = $('#password-mobile');

        // Get the current type of the password field will be password or text
        var passwordFieldType = passwordField.attr('type');

        // Check to see if the type is a password field
        if(passwordFieldType == 'password')
        {
            // Change the password field to text
            passwordField.attr('type', 'text');

            var htmlpass = '';
            htmlpass += '<img class="lazy" src="/assets/theme_3/image/cay-thue/eyeshow.png" alt="">';
            $('.show-btn-password-mobile').html('');
            $('.show-btn-password-mobile').html(htmlpass);

            // Change the Text on the show password button to Hide
            $(this).val('Hide');
        } else {
            var htmlpass = '';
            htmlpass += '<img class="lazy" src="/assets/theme_3/image/cay-thue/eyehide.png" alt="">';
            $('.show-btn-password-mobile').html('');
            $('.show-btn-password-mobile').html(htmlpass);

            // If the password field type is not a password field then set it to password
            passwordField.attr('type', 'password');

            // Change the value of the show password button to Show
            $(this).val('Show');
        }
    });

    $('.openSuccess').on('click', function(){
        $('#successModal').modal('show');
    })

    // $('#successModal').modal('show');
    $('.wide').niceSelect();

    tippy('.checkbox-info-ct', {
        // default
        placement: 'top',
        arrow: true,
        animation: 'fade',
        theme: 'light',
        // content: $(this).data('name'),
    });

    tippy('.option-info-ct', {
        // default
        placement: 'top',
        arrow: true,
        animation: 'fade',
        theme: 'light',
        content: "Đã copy!",
    });

    //    Step

    $('body').on('click','.button-next-step-one',function(){
        if (animating) return false;
        animating = true;

        // current_fs = $('#mobile-caythue .input-next-step-one').parent();
        // next_fs = $('#mobile-caythue .input-next-step-one').parent().next();

        current_fs = $('#fieldset-one');
        next_fs = $('#fieldset-two');
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

    $('body').on('click','.previous-step-one',function(){

        if(animating) return false;
        animating = true;

        current_fs = $('#fieldset-two');
        previous_fs = $('#fieldset-one');

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

    $('body').on('click','.button-next-step-two',function(){

        if(animating) return false;
        animating = true;

        current_fs = $('#fieldset-two');
        previous_fs = $('#fieldset-one');

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

        $('#successModal').modal('show');
    });

    $('body').on('click','.close-modal-default',function(e){
        e.preventDefault();
        $('#successModal').modal('hide');
        $('#openOrder').modal('hide');
    })

    $('body').on('click','.btn-data',function(){
        let is_ok = 1;
        let html = '';

        let required = $('#formDataService input[required]');
        if (required.length){
            required.each(function () {
                $(this).toggleClass('invalid',!$(this).val().trim());
                if (!$(this).val().trim()){
                    is_ok = 0;
                    let text = $(this).parent().prev().text().trim().toLowerCase();
                    html = `<div class="row marginauto order-errors"><div class="col-md-12 left-right default-span"><small>Bạn chưa nhập ${text}</small></div></div>`
                    $(this).parent().next().html(html)
                }else {
                    $(this).parent().next().text('');
                }
            });
        }

        if ($('.allgame[type=checkbox]').length){
            if (checkboxRequired('input.allgame[type=checkbox]')){
                html = `<div class="row marginauto order-errors"><div class="col-md-12 left-right default-span"><small>Phải chọn ít nhất một gói dịch vụ</small></div></div>`;
                is_ok = 0;
                $('#error-mes-checkbox').html(html)
            }

            else {
                $('#error-mes-checkbox').html('');
            }
        }
        let confirm_rules = $('.confirm-rules');
        /*nếu có nút confirm thì kiểm tra xem được check chưa*/
        if (confirm_rules.length){
            if (!confirm_rules.is(':checked')){
                html = `<div class="row marginauto order-errors"><div class="col-md-12 left-right default-span"><small>Vui lòng xác nhận thông tin trên</small></div></div>`;
                is_ok = 0;
                confirm_rules.parent().next().html(html)
            }
            else {
                confirm_rules.parent().next().html('')
            }
        }
        if (is_ok){
            if ($(document).width() > 1200) {
                $('#openOrder').modal('show');
            }else {
                $('.button-next-step-one').trigger('click')
            }
        }
    });

    $('body').on('click','.openSuccess',function(e){
        $('#openOrder').modal('hide');
        $('#successModal').modal('show');
    })
})
