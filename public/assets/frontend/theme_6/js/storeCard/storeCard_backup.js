
$(document).ready(function() {

    // get tele
    const csrf_token = $('meta[name="csrf-token"]').attr('content');
    const token =  $('meta[name="jwt"]').attr('content');
    function getTele (){
        const url = '/get-tele-card-store';
        $.ajax({
            type: "GET",
            url: url,
            cache:false,
            data: {
                _token:csrf_token,
                jwt:token
            },
            beforeSend: function (xhr) {

            },
            success: function (data) {
                if(data.status === "LOGIN"){
                    window.location.href = '/logout';
                    // method = method || 'post';
                    return;
                }
                if(data.status === "ERROR"){
                    alert('Lỗi dữ liệu, vui lòng load lại trang để tải lại dữ liệu')
                }
                if(data.status == true){
                    $('select[name="telecom_key"]').find('option').remove();
                    for(i = 0; i < data.data.data.length; i++) {
                        tele = data.data.data[i];
                        let html = '';
                        html +=''
                        html += '<option value="'+ tele['key'] +'">'+ tele['title'] +'</option>';
                        $('select[name="telecom_key"]').append(html);
                        GetAmount();
                    };

                }
            },
            error: function (data) {
                alert('Có lỗi phát sinh, vui lòng liên hệ QTV để kịp thời xử lý!')
                return;
            },
            complete: function (data) {

            }
        });
    }
    getTele();

    GetAmount();



    $("#buy_telecom_key").on('change', function () {
        GetAmount();

    });

    $("#buy_amount").on('change', function () {
        UpdatePrice();
    });

    $("#quantity").on('change', function () {
        UpdatePrice();
    });

    // $(function () {
    $('#buy_telecom_key').change(function () {
        // $("#telecard").on('change', function(){




    });
    function GetAmount(){
        $('.hide').show();
        telecom = $("#buy_telecom_key").val();
        $.ajax({
            type: 'GET',
            dataType: "json",
            data: {
                telecom: telecom,

            },
            url: "/mua-the-api",
            success: function (response) {

                console.log(response.data)
                $('select[name="amount"]').find('option').remove();
                for(i = 0; i < response.data.data.length; i++) {

                    tele = response.data.data[i];
                    let html = '';
                    html +=''
                    html += '<option value="'+ tele['amount'] +'" rel-ratio="'+ tele['ratio_default']+'">'+ tele['amount'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +' VNĐ - ' + tele['ratio_default'] +'% </option>';
                    $('select[name="amount"]').append(html)
// js
                    UpdatePrice();
                };


            }

        });
    }
    function UpdatePrice(){
        var amount=$("#buy_amount").val();
        var ratio=$('#buy_amount option:selected').attr('rel-ratio');
        var quantity=$("#quantity").val();

        if(amount=='' ||amount==null || ratio=='' ||ratio==null   || quantity=='' ||quantity==null){

            $('#txtPrice').html('Tổng: ' + 0 + ' VNĐ');
            $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });
            console.log('amount:'+amount);
            console.log('ratio:'+ratio);
            console.log('quantity:'+quantity);
            return;
        }



        if(ratio<=0 || ratio=="" || ratio==null){
            ratio=100;
        }

        var sale=amount-(amount*ratio/100);
        // var sale=amount-(amount*ratio/100);

        // var total=(amount-sale) *quantity;
        var total=sale*quantity;
        var totalnotsale = amount*quantity
        console.log(sale)
        if(sale != 0){
            $('#txtPrice').html('Tổng: ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ');
            $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });
        }else {
            $('#txtPrice').html('Tổng: ' + totalnotsale.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ');
            $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });
        }


    }
});
$(document).ready(function () {
    $('#btnPurchase').click(function () {

        $('#homealert').modal('show');
    });
});


// function Confirm(index, serverid) {
//     $('[name="server"]').val(serverid);
//     $('[name="selected"]').val(index);
//     $('#btnPurchase').click();
// }

// var data = jQuery.parseJSON('{"input_auto":"1","idkey":"lienquan","image_oldest":"1","server_mode":"0","server_price":"0","filter_name":"Quân Huy","filter_type":"4","input_pack_min":null,"input_pack_max":null,"input_pack_rate":null,"id":["7","7","7","7","7","7"],"name":["Gói 1 : 16 quân huy","Gói 2 : 32  quân huy","Gói 3 : 84 quân huy","Gói 4 : 168  quân huy","Gói 5 : 340  quân huy","Gói 7 : 856 quân huy"],"price":["8200","16400","41000","82000","164000","410000"],"discount":["1","0","0","0","0","0"],"total":["NaN","NaN","NaN","NaN","NaN","NaN"],"day":["0","0","0","0","0","0"],"punish_price":["0","0","0","0","0","0"],"praise_day":["0","0","0","0","0","0"],"praise_price":["10","20","50","100","200","500"],"send_name":["Tên tài khoản đăng nhập liên quân","Mật khẩu đăng nhập"],"send_type":["1","5"],"send_id0":[null],"send_data0":[null],"send_id1":[null],"send_data1":[null],"input_send_desc":"Khi mua ngọc tại web các bạn lưu ý để trong nick 1 ngọc và đứng tại siêu thị để nhận ngọc nhanh nhé","captcha":null}');
// console.log(data);

//
$('#form-storecard').submit(function (e) {
    e.preventDefault();
    // var formSubmit = $(this).closest('form')
    // url = $(this).data('key');
    //
    $('#homealert').modal("show");
    var formSubmit = $(this);
    var url = formSubmit.attr('action');
    var btnSubmit = formSubmit.find(':submit');
    btnSubmit.text('Đang xử lý...');
    btnSubmit.prop('disabled', true);

    $('#ok').off().on('click', function (m) {
        $.ajax({
            type: "POST",
            url: url,
            cache:false,
            data: formSubmit.serialize(), // serializes the form's elements.
            beforeSend: function (xhr) {
            },
            success: function (data) {
                console.log(data);
                if(data.status == 1){
                    alert(data.message);

                }
                else{
                    alert(data);
                    btnSubmit.text('Thanh toán');
                    btnSubmit.prop('disabled', false);
                }
            },
            error: function (data) {
                alert('Kết nối với hệ thống thất bại.Xin vui lòng thử lại');
                btnSubmit.text('Xác nhận');
                btnSubmit.prop('disabled', false);
            },
            complete: function (data) {
                $('#imgcaptcha').trigger('click');
                $('#form-recharge').trigger("reset");
            }
        });
    });
    btnSubmit.text('Thanh toán');
    btnSubmit.prop('disabled', false);
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    //
});

