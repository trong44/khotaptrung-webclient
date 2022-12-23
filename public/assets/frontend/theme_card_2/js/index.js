

$( document ).ready(function() {
    var width = $(window).width() + 50;
    var height = $(window).height() + 10;
    // console.log(height);
    $('#menu-mobile').css('width',width);
    $('#menu-mobile').css('height',height);


    var height_header =  $("#header-mobile").height() + 15;
    $('#main').css('margin-top',height_header);
    $('#profile').css('margin-top',height_header);
    $('.blog-custom').css('margin-top',height_header);
    $('header label').on('click',function(){
        $('#togger').toggleClass('active');
    });
    $("#togger").on('click',function(){
        $('#togger').removeClass('active');
        $("#nav").prop("checked", false);
    });



})
