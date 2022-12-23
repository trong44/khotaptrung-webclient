


$( document ).ready(function() {

    $(document).on('scroll',function(){
        if($(window).width() > 1024){
            if ($(this).scrollTop() > 100) {
                $(".nav-bar-container").css("height","90px");
                $(".nav-bar-category .nav li a").css("line-height","90px");
                $("header .nav-bar").css("background-color","white");
                $("header .nav-bar").css("box-shadow","0 6px 12px rgb(0 0 0 / 18%)");
                $(".nav-bar-brand").css("margin","14px");


            } else {
                $(".nav-bar-container").css("height","120px");
                $(".nav-bar-category .nav li a").css("line-height","120px");
                $(".nav-bar-brand").css("margin","20px 0");
                $("header .nav-bar").css("background-color","white");
                $("header .nav-bar").css("box-shadow","none");

            }
        }

    });
    $('.item_play_intro_viewmore').click(function(){
        $('.item_play_intro_viewless').css("display","flex");
        $('.item_play_intro_viewmore').css("display","none");
        $(".item_play_intro_content").addClass( "showtext" );
    });
    $('.item_play_intro_viewless').click(function(){
        $('.item_play_intro_viewmore').css("display","flex");
        $('.item_play_intro_viewless').css("display","none");
        $(".item_play_intro_content").removeClass( "showtext");
    });
    $('.item_spin_list_more').click(function(){
        $('.item_spin_list').css("overflow","auto");
        $('.item_spin_list_less').css("display","block");
        $(".item_spin_list_more").css("display","none");
    });
    $('.item_spin_list_less').click(function(){
        $('.item_spin_list').css("overflow","hidden");
        $('.item_spin_list_less').css("display","none");
        $(".item_spin_list_more").css("display","block");
    });
    $(".nav-tabs #tap1-tab-1").on("click",function(){
        $(".active").removeClass("active");
        $(this).parents("li").addClass("active");
        $(".tab-pane").hide();
        $("#tap1-pane-1").show();
    })
    $(".nav-tabs #tap1-tab-2").on("click",function(){
        $(".active").removeClass("active");
        $(this).parents("li").addClass("active");
        $(".tab-pane").hide();
        $("#tap1-pane-2").show();
    })
    $(".nav-tabs #tap1-tab-3").on("click",function(){
        $(".active").removeClass("active");
        $(this).parents("li").addClass("active");
        $(".tab-pane").hide();
        $("#tap1-pane-3").show();

    })
    $('.item_play_intro_viewmore').click(function(){
        $('.item_play_intro_viewless').css("display","flex");
        $('.item_play_intro_viewmore').css("display","none");
        $(".item_play_intro_content").addClass( "showtext" );
    });
    $('.item_play_intro_viewless').click(function(){
        $('.item_play_intro_viewmore').css("display","flex");
        $('.item_play_intro_viewless').css("display","none");
        $(".item_play_intro_content").removeClass( "showtext");
    });
    $('.item_spin_list_more').click(function(){
        $('.item_spin_list').css("overflow","auto");
        $('.item_spin_list_less').css("display","block");
        $(".item_spin_list_more").css("display","none");
    });
    $('.item_spin_list_less').click(function(){
        $('.item_spin_list').css("overflow","hidden");
        $('.item_spin_list_less').css("display","none");
        $(".item_spin_list_more").css("display","block");
    });

    $('.view-more').click(function(){
        $('.view-less').css("display","flex");
        $('.view-more').css("display","none");
        $(".intro_text .content-video-in").addClass( "showtext" );
    });
    $('.view-less').click(function(){
        $('.view-more').css("display","flex");
        $('.view-less').css("display","none");
        $(".intro_text .content-video-in").removeClass( "showtext");
    });

    $('.store_card-expand-button').click(function(){
        $('.store_card-collapse-button').css("display","block");
        $('.store_card-expand-button').css("display","none");
        $(".intro_store_card").addClass( "-expanded" );
    });
    $('.store_card-collapse-button').click(function(){
        $('.store_card-expand-button').css("display","block");
        $('.store_card-collapse-button').css("display","none");
        $(".intro_store_card").removeClass( "-expanded");
    });


    $('.item_play_spin_shake').click(function(){
        $("#lac_lixi").attr("src", "./assets/frontend/image/lixi.gif");
    });

    $('body').delegate('.viewmore','click',function(){

        $(this).addClass('viewless').removeClass('viewmore');
        $(this).text('« Thu gọn');
        $('.hidetext').addClass('showtext').removeClass('hidetext');
    })
    $('body').delegate('.viewless','click',function(){
        $(this).addClass('viewmore').removeClass('viewless');
        $(this).text('Xem tất cả »');
        $('.showtext').addClass('hidetext').removeClass('showtext');
    })

    $('body').delegate('.btn-viewmore','click',function(){
        var ele=$(this).closest('.panel-body').find(".special-text").toggleClass('-expanded');
        if ($(ele).hasClass('-expanded')) {
            $(this).html('« Thu gọn');
        } else {
            $(this).html('Xem tất cả »');

        }
    })
    // $(function () {
    $('.started_at').datetimepicker({
        format: 'DD-MM-YYYY LT',
        useCurrent: false,
        icons:
            { time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                clear: 'fas fa-trash',
                close: 'far fa-times' },

    });
    $('.ended_at').datetimepicker({
        format: 'DD-MM-YYYY LT',
        useCurrent: false,
        icons:
            { time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                clear: 'fas fa-trash',
                close: 'far fa-times' },
        maxDate: moment()
    });
    $('#datetimepicker2').datetimepicker({
        format: 'DD-MM-YYYY'
    });
    $('#datetimepicker3').datetimepicker({
        format: 'LT'
    });
    $('#datetimepicker3').datetimepicker({
        format: 'LT'
    });

});
$(document).ready(function(){
    (function () {
        function logElementEvent(eventName, element) {
            // console.log(Date.now(), eventName, element.getAttribute("data-src"));
        }

        var callback_enter = function (element) {
            logElementEvent("🔑 ENTERED", element);
        };
        var callback_exit = function (element) {
            logElementEvent("🚪 EXITED", element);
        };
        var callback_loading = function (element) {
            logElementEvent("⌚ LOADING", element);
        };
        var callback_loaded = function (element) {
            logElementEvent("👍 LOADED", element);
        };
        var callback_error = function (element) {
            logElementEvent("💀 ERROR", element);
            element.src =
                "https://via.placeholder.com/440x560/?text=Error+Placeholder";
        };
        var callback_finish = function () {
            logElementEvent("✔️ FINISHED", document.documentElement);
        };
        var callback_cancel = function (element) {
            logElementEvent("🔥 CANCEL", element);
        };

        var ll = new LazyLoad({
            // container: document.getElementById("results"),
            threshold: 200,
            load_delay: 200,
            // Assign the callbacks defined above
            callback_enter: callback_enter,
            callback_exit: callback_exit,
            callback_cancel: callback_cancel,
            callback_loading: callback_loading,
            callback_loaded: callback_loaded,
            callback_error: callback_error,
            callback_finish: callback_finish
        });

    })();
});
