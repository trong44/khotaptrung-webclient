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

var data = jQuery.parseJSON('{"input_auto":"0","idkey":null,"image_oldest":"1","server_mode":"0","server_price":"1","server_id":["0"],"server_data":[null],"server_data_minValue":[null],"server_data_maxValue":[null],"filter_name":"Tiền","filter_type":"6","input_pack_min":null,"input_pack_max":null,"input_pack_rate":null,"id":["7","7","7","7","7","7","7","7","7","7","7","7","7","7","7","7","7","7","7","7","7",null,null,null,null,null,null,null,null,null],"name":["Vàng 4","Vàng 3","Vàng 2","Vàng 1","Bạch Kim 5","Bạch kim 4","Bạch kim 3","Bạch kim 2","Bạch kim 1","Kim cương 5","Kim cương 4","Kim cương 3","Kim cương 2","Kim cương 1","Tinh anh 5","Tinh anh 4","Tinh anh 3","Tinh anh 2","Tinh anh 1","Cao thủ 1*","Cao thủ 5*","Cao thủ 10*","Cao thủ 15 *","Cao thủ 20*","Cao thủ 25*","Cao thủ 30*","Cao thủ 35*","Cao thủ 40*","Cao thủ 45*","Cao thủ 50*"],"price":["0","40000","80000","120000","160000","200000","240000","280000","320000","360000","400000","440000","480000","520000","560000","610000","660000","710000","760000","840000","940000","1140000","1240000","1340000","1440000","1540000","1640000","1740000","1840000","1940000"],"discount":["0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0",null,null,null,null,null,null,null,null,null],"total":[null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,"NaN","NaN","NaN","NaN","NaN","NaN","NaN","NaN","NaN","NaN"],"day":["0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0",null,null,null,null,null,null,null,null,null],"punish_price":["0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0",null,null,null,null,null,null,null,null,null],"praise_day":["0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0",null,null,null,null,null,null,null,null,null],"praise_price":["0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0",null,null,null,null,null,null,null,null,null],"send_name":["Tài khoản","Mật khẩu"],"send_type":["1","5"],"send_id0":[null],"send_data0":[null],"send_id1":[null],"send_data1":[null],"input_send_desc":"Khi mua ngọc tại web các bạn lưu ý để trong nick 1 ngọc và đứng tại siêu thị để nhận ngọc nhanh nhé","captcha":null}');
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

var json = JSON.parse(JSON.parse($("#json_rank").val()).params);
var data = json.price;
$('.nstSlider').attr('data-range_max', data.length - 1);
$('.nstSlider').attr('data-cur_max', data.length - 1);
$('.nstSlider').nstSlider({
    "crossable_handles": false,
    "left_grip_selector": ".leftGrip",
    "right_grip_selector": ".rightGrip",
    "value_bar_selector": ".bar",
    "value_changed_callback": function (cause, leftValue, rightValue) {
        from = leftValue;
        to = rightValue;
        $(".from-chosen").val(from);
        $(".to-chosen").val(to);
        $(".to-chosen").trigger("chosen:updated");
        $(".from-chosen").trigger("chosen:updated");
        UpdatePrice1();
    }
});

var from = 0, to = 1;
$(document).ready(() => {
    $(".from-chosen").chosen({disable_search_threshold: 10});
    $(".from-chosen").change((elm, select) => {
        from = parseInt($(".from-chosen").val());
        if (to <= from) {
            to = from + 1;
            $(".to-chosen").val(to);
            //$(".to-chosen").chosen('update');
            $(".to-chosen").trigger("chosen:updated");
        }
        $('.nstSlider').nstSlider('set_position', from, to);
        UpdatePrice1();
    });

    $(".to-chosen").chosen({disable_search_threshold: 10});
    $(".to-chosen").change((elm, select) => {
        to = parseInt($(".to-chosen").val());
        if (to <= from) {
            from = to - 1;
            $(".from-chosen").val(from);
            $(".from-chosen").trigger("chosen:updated");
        }
        $('.nstSlider').nstSlider('set_position', from, to);
        UpdatePrice1();
    });
    UpdatePrice1();
});

function UpdatePrice1() {
    var price = 0;
    var data =json.price;
    $('tbody tr.selected').removeClass('selected');
    for (var i = from + 1; i <= to; i++) {
        price += parseInt(data[i]-data[i-1]);
        $('tbody tr').eq(i - 1).addClass('selected');
    }
    $('#txtPrice').html('Tổng: ' + (price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ');
    $('[name="selected"]').val(from + '|' + to);
    $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
    $('.nstSlider').nstSlider('set_position', from, to);
    $(".from-chosen").val(from);
    $(".to-chosen").val(to);
    $(".to-chosen").trigger("chosen:updated");
    $(".from-chosen").trigger("chosen:updated");
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
