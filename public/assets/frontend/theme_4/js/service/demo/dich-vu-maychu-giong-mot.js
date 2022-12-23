$(document).ready(function () {
    $('#btnPurchase').click(function () {

        $('#homealert').modal('show');
    });

    function Confirm(index, serverid) {
        $('[name="server"]').val(serverid);
        $('[name="selected"]').val(index);
        $('#btnPurchase').click();
    }

    var data = jQuery.parseJSON('{"input_auto":"0","idkey":null,"image_oldest":"1","server_mode":"1","server_price":"0","server_id":["0","1","2","3","4","5","6","7"],"server_data":["Vũ Trụ 1","Vũ Trụ 2","Vũ Trụ 3","Vũ Trụ 4","Vũ Trụ 5","Vũ Trụ 6","Vũ Trụ 7","Vũ Trụ 8"],"server_data_minValue":[null,null,null,null,null,null,null,null],"server_data_maxValue":[null,null,null,null,null,null,null,null],"filter_name":"Các Gói Làm Đệ","filter_type":"4","input_pack_min":null,"input_pack_max":null,"input_pack_rate":null,"id":["7","7","7","7"],"name":["Xayda (có skill5 - tự phát nổ)","Trái Đất (có skill5 - quả cầu kênh khi)","Namek (có skill5 - laze)","Nick Sơ sinh (vào được pt trở lên)"],"price":["20000","30000","30000","50000"],"discount":["1",null,null,null],"total":[null,null,null,null],"day":[null,null,null,null],"punish_price":[null,null,null,null],"praise_day":[null,null,null,null],"praise_price":[null,null,null,null],"send_name":["Tài Khoản","Mật Khẩu","Bạn Đã Đọc Kĩ Quy Định Và Chuẩn Bị Đầy Đủ Vật Phẩm, Phụ Kiện Theo Yêu Cầu Của Shop Chưa?"],"send_type":["1","5","1"],"send_id0":[null,null],"send_data0":[null,null],"send_id1":[null],"send_data1":[null],"input_send_desc":"Khi mua ngọc tại web các bạn lưu ý để trong nick 1 ngọc và đứng tại siêu thị để nhận ngọc nhanh nhé","captcha":null}');
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

//                    $('tbody tr a').each((idx, elm) => {
//                        $(elm).attr('href', '/service/purchase/33.html?selected=' + idx + '&server=' + server);
//                    });
    }

    function ConfirmBuy(value) {
        var index = $('.server-filter').val();
        Confirm(value, index);
    }

    $(document).ready(function () {
        App.init(); // init core
    });
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
