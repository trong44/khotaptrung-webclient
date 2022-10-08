$(document).ready(function () {
    $('#btnPurchase').click(function () {

        $('#homealert').modal('show');
    });

    function Confirm(index, serverid) {
        $('[name="server"]').val(serverid);
        $('[name="selected"]').val(index);
        $('#btnPurchase').click();
    }

    var data = jQuery.parseJSON('{"input_auto":"0","idkey":null,"image_oldest":"1","server_mode":"1","server_price":"0","server_id":["0","1","2","3","4","5","6"],"server_data":["Vũ Trụ 1","Vũ Trụ 2","Vũ Trụ 3","Vũ Trụ 4","Vũ Trụ 5","Vũ Trụ 6","Vũ Trụ 7"],"server_data_minValue":[null,null,null,null,null,null,null],"server_data_maxValue":[null,null,null,null,null,null,null],"filter_name":"Bảng giá làm thuê capsule vàng","filter_type":"5","input_pack_min":null,"input_pack_max":null,"input_pack_rate":null,"id":[null,"7","7","7"],"name":["Max Chỉ Số 24 Tỷ Sm (Tặng Kèm x1 Phiếu Giảm Giá)","Max Chỉ Số 40 Tỷ Sm (Tặng Kèm x1 Phiếu Giảm Giá)","Max Chỉ Số 50-60 Tỷ Sm (Tặng Kèm x1 Phiếu Giảm Giá)","Max Chỉ Số 70-80 Tỷ Sm (Tặng Kèm x1 Phiếu Giảm Giá)"],"price":["170000","160000","150000","140000"],"discount":[null,"0","0","0"],"total":["NaN",null,null,null],"day":[null,"0","0","0"],"punish_price":[null,"0","0","0"],"praise_day":[null,"0","0","0"],"praise_price":[null,"0","0","0"],"input_send_desc":"Khi mua ngọc tại web các bạn lưu ý để trong nick 1 ngọc và đứng tại siêu thị để nhận ngọc nhanh nhé","captcha":null}');
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

    $('.load-modal').each(function (index, elem) {
        $(elem).unbind().click(function (e) {
            e.preventDefault();
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
        });
    });

    App.init(); // init core

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    $(".menu-main-mobile a").click(function () {

        if ($(this).closest("li").hasClass("c-open")) {
            $(this).closest("li").removeClass("c-open");
        }
        else {
            $(this).closest("li").addClass("c-open");
        }
    });

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
});
