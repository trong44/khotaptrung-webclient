
$(document).ready(function(){

});
function reply_click(clicked_id) {
    let html = '';
    let button = '';
    button += '<div class="form-group m-form__group row ml-1">';
    button += '<label class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-form-label" style="font-weight:bold;font-size:16px;line-height: 33px;color:#212121">Số lượng: </label>';
    button += '<div class="col-lg-2 col-md-4 col-sm-4 col-4">';
    button += '<select class="form-control m-input m-input--air" name="quantity" id="quantity" style="border-color: #0000004f;">';
    for (i = 1; i <= 10; i++) {
        button += '<option class="quantity" value="' + i + '">' + i + '</option>';
    }
    button += '</select></div></div>';
    $('#button').html(button);
    var render_denominations = clicked_id;
    $('.denominations').html(render_denominations);
    $(".price_supplier").html("Chưa chọn");
    $(".price_sale").html("0");
    $(".render_quantity").html("1");
    $(".total_price").html("0");
    getAmount(clicked_id)
    function getAmount(clicked_id){
        var url = '/ajax/store-card/get-amount';
        $.ajax({
            type: "GET",
            url: url,
            data: {
                telecom:clicked_id
            },
            beforeSend: function (xhr) {
                let html_loading = '';
                html_loading += ' <div class="loading-wrap">';
                html_loading += ' <span class="modal-loader-spin"></span>';
                html_loading += '  </div>';
                $('#render-supplier').html(html_loading);
            },
            success: function (data) {
                if(data.status == 1){

                    let html = '';
                    if(data.data.length > 0){
                        $.each(data.data,function(key,value){
                            // html+= '<p>'+value.amount +'</p>'
                            if (key == 0){
                                html += '<div class="text-center">';
                                html += '<input type="radio" name="amount" class="amount" id="CheckboxSupplier' + key + '" value="' + value.amount + '" rel-ratio="' + value.ratio_default + '" checked>';
                                html += '<input style="display: none" type="text" id="price_' + value.amount + '" class="ratio_default" value="' + value.ratio_default + '"/>';
                                html += '<label class="item-content active" for="CheckboxSupplier' + key + '">';
                                html += '<h5>' + formatNumber(value.amount) + ' VNĐ </h5>';
                                html += '<p>Giá: <span>' + formatNumber(value.amount * value.ratio_default / 100) + ' VNĐ</span></p>';
                                html += '</label></div>';
                            }else {
                                html += '<div class="text-center">';
                                html += '<input type="radio" name="amount" class="amount" id="CheckboxSupplier' + key + '" value="' + value.amount + '" rel-ratio="' + value.ratio_default + '"/>';
                                html += '<input style="display: none" type="text" id="price_' + value.amount + '" class="ratio_default" value="' + value.ratio_default + '"/>';
                                html += '<label class="item-content" for="CheckboxSupplier' + key + '">';
                                html += '<h5>' + formatNumber(value.amount) + ' VNĐ </h5>';
                                html += '<p>Giá: <span>' + formatNumber(value.amount * value.ratio_default / 100) + ' VNĐ</span></p>';
                                html += '</label></div>';
                            }
                            $('#render-supplier').html(html);
                            UpdatePrice();


                            // html += '<option value="'+ value.amount +'" rel-ratio="'+ value.ratio_default+'">'+ formatNumber(value.amount)  +' VNĐ - ' + (100-value.ratio_default) +'% </option>';
                        });
                    }else {
                        html += '<span style="color: #F25922;font-size: 16px">Thẻ chưa được cấu hình mệnh giá</span>';
                        $('#render-supplier').html(html);

                    }

                    // $('#amount_storecard').html(html);
                }
                else{
                    // swal({
                    //     title: "Có lỗi xảy ra !",
                    //     text: data.message,
                    //     icon: "error",
                    //     buttons: {
                    //         cancel: "Đóng",
                    //     },
                    // })
                }
            },
            error: function (data) {
                swal({
                    title: "Lỗi !",
                    text: "Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.",
                    icon: "error",
                    buttons: {
                        cancel: "Đóng",
                    },
                })
            },
            complete: function (data) {

            }
        });
    }
    function UpdatePrice(){
        var amount = $('input[name=amount]:checked').val(),
            quantity = $('.quantity').val();
        sale = $("#price_" + amount).val(),
            $(".render_quantity").html(quantity);
        $(".price_supplier").html(formatNumber(amount) + " VNĐ");
        $(".ratio").html(formatNumber(100-sale) +"%" );
        $(".total_price").html(formatNumber(quantity * (sale * amount / 100))+" VNĐ");


    }
}

function formatNumber(num) {
    var num = num+"";
    if(num!="undefined"){
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    }
    else{
        return "";
    }
}

$(document).ready(function(){
    $('.store-telecom0').trigger('click');
    $("#render-supplier").on("click", ".item-content", function () {
        // alert("success");
        $('.item-content').removeClass("active");
        $(this).addClass("active");
        $('#quantity option').prop('selected', function () {
            return this.defaultSelected;
        });
    });
    $("#render-supplier").on("click", function () {
        var amount = $('input[name=amount]:checked').val(),
            quantity = $('.quantity').val();
        sale = $("#price_" + amount).val(),
            $(".render_quantity").html(quantity);
        $(".price_supplier").html(formatNumber(amount) + " VNĐ");
        $(".ratio").html(formatNumber(100-sale) +"%" );
        $(".total_price").html(formatNumber(quantity * (sale * amount / 100))+" VNĐ");

    });
    $('#store_card').on('click','.copyPin',function(){
        var text=$(this).prev().text()
        var $temp = $("<input>");
        $("#store_card").append($temp);
        $temp.val($.trim(text)).select();
        document.execCommand("copy");
        $temp.remove();
    });
    $('#store_card').on('click','.copySerial',function(){
        var text=$(this).prev().text()
        var $temp = $("<input>");
        $("#store_card").append($temp);
        $temp.val($.trim(text)).select();
        document.execCommand("copy");
        $temp.remove();
    });

    $("#button").on('change', '#quantity', function () {

        quantity = $('#quantity').val();
        var amount = $('input[name=amount]:checked').val(),
            sale = $("#price_" + amount).val();
        $(".render_quantity").html(quantity);

        $(".price_supplier").html(formatNumber(amount) + " VNĐ");
        $(".ratio").html(formatNumber(formatNumber(100-sale) +"%" ));
        //
        $(".total_price").html(formatNumber(quantity * (sale * amount / 100))+" VNĐ");
    });


    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }
    // code cu

    $(document).ready(function () {

    });

    $("#recharge_supplier").on('submit',function (event) {
        event.preventDefault();
        // var formData = new FormData(this);
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        $.ajax({
            type: "POST",
            url: url,
            cache:false,
            data: formSubmit.serialize(), // serializes the form's elements.
            // data:{
            //     telecom:key,
            //     amount:amount,
            //     quantity:quantity,
            // },
            beforeSend: function (xhr) {
                $(".content-ajax").hide();
                $('#btnBuy').prop('disabled', true);
                $('#btnBuy').html('<i class="fas fa-spinner fa-spin"></i> Chờ xử lý');
            },
            success: function (data) {
                let html = '';


                if(data.status == 1){
                    $('#modal_pay').modal('hide');
                    $('#showInfor').modal('show');
                    // let html = '';
                    // html += '<div class="id-infor" data-id="'+data.id+'"></div>';
                    // $('#showInforDetails').html(html);
                    // var id = $(".id-infor").data('id');

                    // mua thẻ thành công
                    // $("#id-item").html(id);
                    // $("#description-item").html(data.data.description);
                    // $("#money-item").html(formatNumber(data.data.price)+" VNĐ");
                    // $("#txns-item").html(100-(data.data.txns[0].ratio)+" %");
                    //
                    // console.log(data.data.store_card);
                    let html_card = '';
                    if(data.data.data_card.length > 0){

                        $.each(data.data.data_card,function(key,value){
                            html_card += '<tr>';
                            html_card += '<td>Thẻ '+key+'</td>';
                            html_card += '<td class="pin"><span>'+value.pin+'</span>&nbsp;<i style="cursor: pointer" class="fa fa-copy copyPin" aria-hidden="true"></i></td>';
                            html_card += '<td class="serial"><span>'+value.serial+'</span>&nbsp;<i style="cursor: pointer" class="fa fa-copy copySerial" aria-hidden="true"></i></td>';
                            html_card += '</tr>';
                            html_card += '<tr>';
                        });
                        $('#store_card').html(html_card);

                    }
                }
                else if(data.status == 401){
                    window.location.href = '/login';
                }
                else if(data.status == 0){
                    $('#modal_pay').modal('hide');

                    swal({
                        title: "Mua thẻ thất bại !",
                        text: data.message,
                        icon: "error",
                        buttons: {

                            charge: {
                                text: "Nạp tiền",
                                value: "/nap-the",

                            },
                            cancel: "Đóng",
                        },

                    })

                }
                else{
                    $('#modal_pay').modal('hide');

                    swal({
                        title: "Mua thẻ thất bại !",
                        text: "Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.",
                        icon: "error",
                        buttons: {

                            charge: {
                                text: "Nạp tiền",
                                value: "charge",
                            },
                            cancel: "Đóng",
                        },
                    })
                }
            },
            error: function (data) {
                swal({
                    title: "Có lỗi xảy ra !",
                    text: "Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.",
                    icon: "error",
                    buttons: {
                        cancel: "Đóng",
                    },
                })
            },
            complete: function (data) {
                $('.ajax-loader').hide();
                $(".content-ajax").show();

                $('#btnBuy').prop('disabled', false);
                $('#btnBuy').html('Thanh toán');
            }
        });

    });


    // code cu

});
