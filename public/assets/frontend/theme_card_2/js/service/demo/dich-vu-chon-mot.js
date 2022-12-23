$(document).ready(function () {
    $('#btnPurchase').click(function () {

        $('#homealert').modal('show');
    });
});


function Confirm(index, serverid) {
    $('[name="server"]').val(serverid);
    $('[name="selected"]').val(index);
    $('#btnPurchase').click();
}

var data = jQuery.parseJSON('{"input_auto":"1","idkey":"freefire","image_oldest":"1","server_mode":"0","server_price":"0","filter_name":"Kim Cương","filter_type":"4","input_pack_min":null,"input_pack_max":null,"input_pack_rate":null,"id":["7","7","7","7","7"],"name":["Kim Cương × 45","Kim Cương × 90","Kim Cương × 230","Kim Cương × 465","Kim Cương × 950"],"price":["8200","16400","41000","82000","164000"],"discount":["1","0","0","0","0"],"total":["NaN","NaN","NaN","NaN","NaN"],"day":["0","0","0","0","0"],"punish_price":["0","0","0","0","0"],"praise_day":["0","0","0","0","0"],"praise_price":["10","20","50","100","200"],"send_name":["Điền ID game của bạn"],"send_type":["1"],"send_id0":[null],"send_data0":[null],"input_send_desc":"Khi mua ngọc tại web các bạn lưu ý để trong nick 1 ngọc và đứng tại siêu thị để nhận ngọc nhanh nhé","captcha":null}');
console.log(data);


var purchase_name = 'VNĐ';

var server = -1;

$(".server-filter").change(function (elm, select) {
    server = parseInt($(".server-filter").val());
    $('[name="server"]').val(server);
    if($("#minmax_"+server).length > 0)
    {
        $('#min_money').text($("#minmax_"+server).attr("data-value-min-text").toString());
        $('#max_money').text($("#minmax_"+server).attr("data-value-max-text").toString());
        $('#input_pack').val($("#minmax_"+server).attr("data-value-min").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }
    UpdatePrice();
});
server = parseInt($(".server-filter").val());
$('[name="server"]').val(server);

var itemselect = -1;
$(document).ready(function () {
    $(".s-filter").change(function (elm, select) {
        itemselect = parseInt($(".s-filter").val());
        UpdatePrice();
    });
    itemselect = parseInt($(".s-filter").val());
    UpdatePrice();
});

function UpdatePrice() {
    var price = 0;
    if (itemselect == -1) {
        return;
    }

    if (data.server_mode == 1 && data.server_price == 1) {

        var s_price = data["price" + server];
        price = parseInt(s_price[itemselect]);
    }
    else {
        var s_price = data["price"];
        price = parseInt(s_price[itemselect]);
    }


    $('#txtPrice').html('Tổng: ' + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ');
    $('[name="selected"]').val($(".s-filter").val());

    $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
    $('tbody tr.selected').removeClass('selected');
    $('tbody tr').eq(itemselect).addClass('selected');
}

function ConfirmBuy(value) {
    var index = $('.server-filter').val();
    Confirm(value, index);
}

$(document).ready(function () {
    $('.load-modal').each(function (index, elem) {
        $(elem).unbind().click(function (e) {
            e.preventDefault();
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
        });
    });
});
