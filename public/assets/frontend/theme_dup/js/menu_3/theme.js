$(document).on('scroll',function(){
    if($(window).width() > 1024){
        if ($(this).scrollTop() > 100) {
            $(".nav-bar-category").css("height","90px");


        } else {
            $(".nav-bar-category").css("height","120px");

        }
    }

});
