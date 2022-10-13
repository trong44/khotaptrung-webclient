

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



    $("#render-supplier").on("click",".item-content", function(){
        // alert("success");
        $('.item-content').removeClass("active");
        $(this).addClass("active");
        $('#quantity option').prop('selected', function() {
            return this.defaultSelected;
        });
    });

    $("#render-supplier").on("click", function(){
        var amount = $('input[name=amount]:checked').val(),
            quantity = $('.quantity').val();
        sale = $("#price_"+amount).val(),
            $(".render_quantity").html(quantity);
        $(".price_supplier").html(formatNumber(amount)+" VNĐ");
        $(".price_sale").html(formatNumber((amount - (sale * amount /100 )) * quantity));
        $(".total_price").html(formatNumber(quantity *  (sale * amount /100 )));

    });


    $("#button").on('change','#quantity',function () {
        quantity = $('#quantity').val();
        var amount = $('input[name=amount]:checked', '#recharge_supplier').val(),
            sale = $("#price_"+amount).val();
        $(".render_quantity").html(quantity);
        $(".price_supplier").html(formatNumber(amount)+" VNĐ");
        $(".price_sale").html(formatNumber((amount - (sale * amount /100 )) * quantity));
        $(".total_price").html(formatNumber(quantity *  (sale * amount /100 )));
    });


})
