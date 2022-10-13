$(document).ready(function () {
    $(".shownewx").click(function () {
        $(".showmore").css("right", "-27px");
        $(".bg_gra").fadeIn("slow");
    });
    $(".close_nav").click(function () {
        $(".showmore").css("right", "-110vw");
        $(".bg_gra").fadeOut("slow");
    });
    $(".menu li.m1").hover(function () {
        $(this).find(".mini_menu").addClass("show");
    }, function () {
        $(this).find(".mini_menu").removeClass("show");
    });
    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('.c-layout-header-fixed').removeClass('fixtop');
            $('.c-layout-header-fixed').addClass('fixscroll');
            $("#btn-back-to-top").show();
        } else {
            $('.c-layout-header-fixed').removeClass('fixscroll');
            $('.c-layout-header-fixed').addClass('fixtop');
            $("#btn-back-to-top").hide();
        }
    });
    $("#btn-back-to-top").click(function(){
        document.body.scrollIntoView({behavior: 'smooth', block: 'start'});
    });
    $(function () {
        var url = window.location.href;
        $("#navbar-main li").removeClass("active");
        $("#navbar-main a").each(function () {
            if (url == (this.href)) {
                $(this).closest("a").addClass("active");
                $(this).closest("li").parents('li').addClass("active");
            }
        });
    });
});



$(document).ready(function () {
    console.log(222)
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
    $('.load-modal').each(function (index, elem) {
        $(elem).unbind().click(function (e) {
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><i class=\"fas fa-spinner fa-spin\" style='font-size: 30px'></i></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
        });
    });
});
