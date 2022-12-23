$(document).ready(function () {
    $('#btnPurchase').click(function () {

        $('#homealert').modal('show');
    });

    function Confirm(index, serverid) {
        $('[name="server"]').val(serverid);
        $('[name="selected"]').val(index);
        $('#btnPurchase').click();
    }

    var data = jQuery.parseJSON('{"input_auto":"1","idkey":null,"image_oldest":"1","server_mode":"1","server_price":"1","server_id":["0","1","2","3","4","5","6","7","8","9","10"],"server_data":["Vũ trụ 1","Vũ trụ 2","Vũ trụ 3","Vũ Trụ 4","Vũ trụ 5","Vũ trụ 6","Vũ trụ 7","Vũ trụ 8","Vũ trụ 9","Vũ Trụ 10",null],"server_data_minValue":["2000","2000","2000","2000","2000","2000","2000","2000","2000","2000",null],"server_data_maxValue":["80000","80000","80000","80000","80000","80000","80000","80000","80000","80000",null],"filter_name":"Vàng","filter_type":"7","input_pack_min":"2000","input_pack_max":"80000","input_pack_rate":"1000","id":["7",null],"name":["Vip 1",null],"price0":["2000",null],"price1":["2000",null],"price2":["2000",null],"price3":["2000",null],"price4":["2000",null],"price5":["2000",null],"price6":["2000",null],"price7":["2000",null],"price8":["2000",null],"price9":["2000",null],"discount0":["5000",null],"discount1":["3000",null],"discount2":["4000",null],"discount3":["5000",null],"discount4":["5000",null],"discount5":["3000",null],"discount6":["3500",null],"discount7":["3500",null],"discount8":["3000",null],"discount9":["3000",null],"total0":["10000000",null],"total1":["6000000",null],"total2":["8000000",null],"total3":["10000000",null],"total4":["10000000",null],"total5":["6000000",null],"total6":["7000000",null],"total7":["7000000",null],"total8":["6000000",null],"total9":["6000000",null],"day0":["0",null],"day1":["0",null],"day2":["0",null],"day3":["0",null],"day4":["0",null],"day5":["0",null],"day6":["0",null],"day7":["0",null],"day8":["0",null],"day9":[null,null],"punish_price0":["0",null],"punish_price1":["0",null],"punish_price2":["0",null],"punish_price3":["0",null],"punish_price4":["0",null],"punish_price5":["0",null],"punish_price6":["0",null],"punish_price7":["0",null],"punish_price8":["0",null],"punish_price9":[null,null],"praise_day0":["0",null],"praise_day1":["0",null],"praise_day2":["0",null],"praise_day3":["0",null],"praise_day4":["0",null],"praise_day5":["0",null],"praise_day6":["0",null],"praise_day7":["0",null],"praise_day8":["0",null],"praise_day9":[null,null],"praise_price0":["0",null],"praise_price1":["0",null],"praise_price2":["0",null],"praise_price3":["0",null],"praise_price4":["0",null],"praise_price5":["0",null],"praise_price6":["0",null],"praise_price7":["0",null],"praise_price8":["0",null],"praise_price9":[null,null],"send_name":["Tên nhân vật"],"send_type":["1"],"send_id0":[null],"send_data0":[null],"input_send_desc":"Khi mua ngọc tại web các bạn lưu ý để trong nick 1 ngọc và đứng tại siêu thị để nhận ngọc nhanh nhé","captcha":null}');
    console.log(data);


    var purchase_name = 'Vàng';

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

    var server_id = $(".server-filter").val();
    console.log(server_id);
    var min=$("#minmax_"+server_id).attr("data-value-min") > 0 ? parseInt($("#minmax_"+server_id).attr("data-value-min")) : parseInt("2000");
    var max=$("#minmax_"+server_id).attr("data-value-max") > 0 ? parseInt($("#minmax_"+server_id).attr("data-value-max")) : parseInt("80000");
    if($("#minmax_"+server_id).length > 0)
    {
        $('#min_money').text($("#minmax_"+server_id).attr("data-value-min-text").toString());
        $('#max_money').text($("#minmax_"+server_id).attr("data-value-max-text").toString());
        $('#input_pack').val($("#minmax_"+server_id).attr("data-value-min").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }
    //var min = parseInt("2000");
    //var max = parseInt("80000");
    $('#txtPrice').html('Tổng: 0 ' + purchase_name);

    function UpdatePrice() {
        server_id = $(".server-filter").val();
        console.log(server_id);
        min=$("#minmax_"+server_id).attr("data-value-min") > 0 ? parseInt($("#minmax_"+server_id).attr("data-value-min")) : parseInt("2000");
        max=$("#minmax_"+server_id).attr("data-value-max") > 0 ? parseInt($("#minmax_"+server_id).attr("data-value-max")) : parseInt("80000");
        console.log("---"+server_id);
        console.log("---"+min);
        console.log("---"+max);
        var container = $('.m-datatable__body').html('');


        if (data.server_mode == 1 && data.server_price == 1) {

            var s_price = data["price" + server];
            var s_discount = data["discount" + server];
        }
        else {
            var s_price = data["price"];
        }

        for (var i = 0; i < data.name.length; i++) {

            var price = s_price[i];
            var discount = s_price[i];

            if (s_price != null && s_discount != null) {
                var ptemp = '';

                if (data.length == 1) {
                    ptemp = '<td style="width:180px;" class="m-datatable__cell"> <a class="btn-style border-color" href="/service/purchase/2.html?selected=' + price + '&server=' + server + '">Thanh toán</a> </td> </tr>';
                } else {
                    ptemp = '<td style="width:180px;" class="m-datatable__cell"> <a onclick="Confirm(' + price + ',' + server + ')" class="btn-style border-color">Thanh toán</a> </td> </tr>';
                }
                var temp = '<tr class="m-datatable__row m-datatable__row--even">' +
                    '<td style="width:30px;" class="m-datatable__cell">' + (i + 1) + '</td>' +
                    '<td class="m-datatable__cell">' + data.name[i] + '</td>' +
                    '<td style="width:150px;" class="m-datatable__cell">' + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ</td>' +
                    '<td style="width:250px;" class="m-datatable__cell">' + discount + '</td>' +
                    '<td style="width:180px;" class="m-datatable__cell">' + (parseInt(price * discount / 1000 * data.input_pack_rate)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' ' + purchase_name + '</td>' + ptemp

                $(temp).appendTo(container);
            }
        }
        UpdateTotal();
    }

    function UpdateTotal() {
        server_id = $(".server-filter").val();
        console.log(server_id);
        min=$("#minmax_"+server_id).attr("data-value-min") > 0 ? parseInt($("#minmax_"+server_id).attr("data-value-min")) : parseInt("2000");
        max=$("#minmax_"+server_id).attr("data-value-max") > 0 ? parseInt($("#minmax_"+server_id).attr("data-value-max")) : parseInt("80000");
        var price = parseInt($('#input_pack').val().replace(/,/g, ''));
        console.log("---"+server_id);
        console.log(min);
        console.log(max);
        if (typeof price != 'number' || price < min || price > max) {
            $('button[type="submit"]').addClass('not-allow');

            $('#txtPrice').html('Tiền nhập không đúng');
            return;
        } else {
            $('button[type="submit"]').removeClass('not-allow');
        }
        var total = 0;
        var index = 0;
        var current = 0;
        var discount = 0;


        if (data.server_mode == 1 && data.server_price == 1) {

            var s_price = data["price" + server];
            var s_discount = data["discount" + server];
        }
        else {
            var s_price = data["price"];
            var s_discount = data["discount"];
        }
        for (var i = 0; i < s_price.length; i++) {

            // if (price >= s_price[i] && s_price[i] != null) {
            if (s_price[i] != null) {
                current = s_price[i];
                index = i;
                discount = s_discount[i];
                total = price * s_discount[i];

            }
        }

        total = parseInt(total / 1000 * data.input_pack_rate);

        $('#txtDiscount').val(discount);
        $('#txtPrice').html('Tổng: ' + (total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " " + purchase_name);
        $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
        $('[name="selected"]').val(price);
        $('.m-datatable__body tbody tr.selected').removeClass('selected');
        $('.m-datatable__body tbody tr').eq(index).addClass('selected');
    }

    $('#input_pack').bind('focus keyup', function () {
        UpdateTotal();
    });
    $(document).ready(function () {
        UpdatePrice();
    });

    function ConfirmBuy(value) {
        var index = $('.server-filter').val();
        Confirm(value, index);
    }

    $('.load-modal').each(function (index, elem) {
        $(elem).unbind().click(function (e) {
            e.preventDefault();
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
        });
    });

    let html;
    $("#btnPurchase").on('click', function () {
        var sv = $("#select-sever").val();
        var id_service = $('#id_service').val();
        $.ajax({
            type: 'POST',
            url: '/check/check-details',
            data: {
                _token: 'X8YsQD4YEObNmCLktdimefYpYlAMxkxgV2KwMkYY',
                id_service:id_service,
                sever:sv
            },
            success: (data) => {
                if(data.status == 1){
                    html = "<p>Nhân vật giao dịch: <b style='color: red;'>"+data.name+"</b></p>";
                    html += "<p>Địa điểm giao dich: <b style='color: red;'>"+data.location+"</b></p>";
                    $("#content-sever").html(html);
                }
            },
        });
    });

    $('.load-modal').each(function (index, elem) {
        $(elem).unbind().click(function (e) {
            e.preventDefault();
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
        });
    });

    //Check nếu thay đổi mật khẩu mới thì login lại
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


});
