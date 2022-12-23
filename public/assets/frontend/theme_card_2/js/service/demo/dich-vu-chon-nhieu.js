$(document).ready(function(){
    jQuery.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/checkpass",
        method: 'get',
        success: function (result) {
            console.log(result)
            if(result.status == 1)
            {
                window.location = '/logout';
            }
            else
            {
                //Nothing
            }
        },
        error: function (data, textStatus, errorThrown) {
            //Nothing
            console.log(errorThrown)
        }
    });
})

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

var data = jQuery.parseJSON('{"input_auto":"0","idkey":null,"image_oldest":"1","server_mode":"0","server_price":"0","server_id":["0"],"server_data":[null],"server_data_minValue":[null],"server_data_maxValue":[null],"filter_name":"Mức Rank Yêu Cầu","filter_type":"5","input_pack_min":null,"input_pack_max":null,"input_pack_rate":null,"id":["7","7","7","7","7","7","7","7"],"name":["100 điểm \/ Đồng -> Bạc","100 điểm \/ Bạc -> Vàng","100 điểm \/ Vàng -> Bạch Kim","100 điểm \/ Bạch Kim-> Kim cương","100 điểm \/ Kim cương -> Crown","100 điểm \/ Crown -> Ace","100 điểm \/ Ace -> Chí Tôn ( mốc 4k2- 4k5 điểm )","100 điểm \/ Ace -> Chí Tôn ( mốc 4k5- 4k9 điểm )"],"price":["30000","30000","50000","70000","100000","150000","250000","350000"],"discount":["1",null,null,null,null,null,null,null],"total":[null,null,null,null,null,null,null,null],"day":[null,null,null,null,null,null,null,null],"punish_price":[null,null,null,null,null,null,null,null],"praise_day":[null,null,null,null,null,null,null,null],"praise_price":[null,null,null,null,null,null,null,null],"send_name":["Tài khoản nick","Mật khẩu nick","Dạng nick","Loại rank","Version"],"send_type":["1","5","6","6","6"],"send_id0":[null],"send_data0":[null],"send_id1":[null],"send_data1":[null],"send_id2":["0","1"],"send_data2":["Facebook","gmail"],"send_id3":["0","1","2"],"send_data3":["SOLO","DUO","SQUAD"],"send_id4":[null,null,null,null,null],"send_data4":["Việt Nam","Korea","Taiwan","BGMI","Global"],"input_send_desc":"Khi mua ngọc tại web các bạn lưu ý để trong nick 1 ngọc và đứng tại siêu thị để nhận ngọc nhanh nhé","captcha":null}');
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

$('.s-filter input[type="checkbox"]').change(function () {

    UpdatePrice();
});

function UpdatePrice() {
    var price = 0;
    var itemselect = '';

    if (data.server_mode == 1 && data.server_price == 1) {
        var s_price = data["price" + server];
    }
    else {
        var s_price = data["price"];
    }

    if ($('.s-filter input[type="checkbox"]:checked').length > 0) {
        $('.s-filter input[type="checkbox"]:checked').each(function (idx, elm) {
            console.log($(elm).val());
            console.log(elm);
            price += parseInt(s_price[$(elm).val()]);
            if (itemselect != '') {
                itemselect += '|';
            }

            itemselect += $(elm).val();

            $('#txtPrice').html('Tổng: ' + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ');
            $('[name="selected"]').val(itemselect);

            $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });
        });
        $('#btnPurchase').prop('disabled', false);
    }
    else {
        $('#txtPrice').html('Tổng: 0 VNĐ');
        $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
        $('#btnPurchase').prop('disabled', true);

    }

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
