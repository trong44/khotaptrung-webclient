$(document).ready(function(){

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }

    // function getTelecom (){
    //     const url = '/store-card/get-telecom';
    //     $.ajax({
    //         type: "GET",
    //         url: url,
    //         beforeSend: function (xhr) {
    //         },
    //         success: function (data) {
    //             if(data.status == 1){
    //                 let html = '';
    //                 if(data.data.length > 0){
    //                     $.each(data.data,function(key,value){
    //                         html += '<option value="'+value.key+'">'+value.key+'</option>';
    //                     });
    //                 }
    //                 $('select#telecom_storecard').html(html)
    //                 ele = $('select#telecom_storecard option').first();
    //
    //                 var telecom = ele.val();
    //                 getAmount(telecom);
    //                 $("#buy_telecom_key").on('change', function () {
    //                     getAmount(telecom);
    //
    //                 });
    //
    //                 $("#buy_amount").on('change', function () {
    //                     UpdatePrice();
    //                 });
    //
    //                 $("#quantity").on('change', function () {
    //                     UpdatePrice();
    //                 });
    //                 $('#loading-data').remove();
    //                 $('#loading-data-total').remove();
    //                 $('#loading-data-pay').remove();
    //                 $('#formStoreCard').removeClass('hide');
    //                 $('#StoreCardTotal').removeClass('hide');
    //                 $('#StoreCardPay').removeClass('hide');
    //             }
    //             else{
    //                 swal({
    //                     title: "Có lỗi xảy ra !",
    //                     text: data.message,
    //                     icon: "error",
    //                     buttons: {
    //                         cancel: "Đóng",
    //                     },
    //                 })
    //             }
    //         },
    //         error: function (data) {
    //             alert('Có lỗi phát sinh, vui lòng liên hệ QTV để kịp thời xử lý!')
    //             return;
    //         },
    //         complete: function (data) {
    //
    //         }
    //     });
    // }

    ele = $('select#telecom_storecard option').first();
    var telecom = ele.val();
    getAmount(telecom);
    $("#buy_telecom_key").on('change', function () {
        getAmount(telecom);

    });

    $("#buy_amount").on('change', function () {
        UpdatePrice();
    });

    $("#quantity").on('change', function () {
        UpdatePrice();
    });
    // $('#loading-data').remove();
    $('#loading-data-total').remove();
    $('#loading-data-pay').remove();
    // $('#formStoreCard').removeClass('hide');
    $('#StoreCardTotal').removeClass('hide');
    $('#StoreCardPay').removeClass('hide');
    function getAmount(telecom){
        var url = '/ajax/store-card/get-amount';
        $.ajax({
            type: "GET",
            url: url,
            data: {
                telecom:telecom
            },
            beforeSend: function (xhr) {

            },
            success: function (data) {

                if(data.status == 1){

                    let html = '';
                    if(data.data.length > 0){
                        $.each(data.data,function(key,value){
                            // html+= '<p>'+value.amount +'</p>'
                            html += '<option value="'+ value.amount +'" rel-ratio="'+ value.ratio_default+'">'+ formatNumber(value.amount)  +' VNĐ - ' + (100-value.ratio_default) +'% </option>';
                        });
                    }
                    $('#amount_storecard').html(html);
                    UpdatePrice();
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
                console.log('Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.(mua thẻ (getAmount))')

            },
            complete: function (data) {

            }
        });
    }
    $('body').on('change','#telecom_storecard',function(){
        var telecom = $(this).val();
        getAmount(telecom)
    });
    // getTelecom();
    // $("#telecom_storecard").on('change', function () {
    //     getAmount();
    //
    // });

    $("#amount_storecard").on('change', function () {
        UpdatePrice();
    });

    $("#quantity").on('change', function () {
        UpdatePrice();
    });

    function UpdatePrice(){
        var amount=$("#amount_storecard").val();
        var ratio=$('#amount_storecard option:selected').attr('rel-ratio');
        var quantity=$("#quantity").val();

        if(amount=='' ||amount==null || ratio=='' ||ratio==null   || quantity=='' ||quantity==null){

            $('#txtPrice').html('Tổng: ' + 0 + ' VNĐ');
            $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });
            return;
        }
        if(ratio<=0 || ratio=="" || ratio==null){
            ratio=100;
        }
        var sale=amount-(amount*ratio/100);
        var total=(amount-sale) *quantity;
        // var total=sale*quantity;
        var totalnotsale = amount*quantity
        if(sale != 0){
            $('#txtPrice').html('Tổng: ' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' VNĐ');
            $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });
        }else {
            $('#txtPrice').html('Tổng: ' + totalnotsale.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ' VNĐ');
            $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });
        }


    }
    $(document).ready(function () {
        $('#btnbeforePurchase').click(function () {
            $('#success_storecard').modal('show');
        });
    });
    $('body').on('click','.copyData',function(){
        data = $(this).data('copy');
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($.trim(data)).select();
        document.execCommand("copy");
        $temp.remove();
        toastr.success('Đã sao chép: '+ data);
    })

    $('#form-storecard').submit(function (e) {
        e.preventDefault();
        $('#homealert').modal("show");
        var formSubmit = $(this);
        var url = formSubmit.attr('action');
        var btnSubmit = formSubmit.find(':submit');
        // btnSubmit.text('Đang xử lý...');

        $('#ok').off().on('click', function (m) {
            $.ajax({
                type: "POST",
                url: url,
                cache:false,
                data: formSubmit.serialize(), // serializes the form's elements.
                beforeSend: function (xhr) {

                },
                success: function (data) {
                    if(data.status == 1){
                        btnSubmit.prop('disabled', true);
                        swal({
                            title: "Thành công !",
                            text: data.message,
                            icon: "success",
                        })
                        $('#success_storecard').modal("show");
                        let html = '';
                        if(data.data.data_card.length > 0){
                            $.each(data.data.data_card,function(key,value){

                                html+='<div class="col-12 col-md-4 p-2">'
                                html+='<div class="alert alert-info">'
                                html+='<p>Mã thẻ '+key+' </p>'
                                html+='<div class="success_storecard_pin">'
                                html+='<p>Mã thẻ <br>'
                                html+='<span>'+value.pin+'</span>'
                                html+='</p>'
                                html+='<b class="mt-4"><i style="cursor: pointer" class="fa fa-copy copyData" data-copy="'+value.pin+'" aria-hidden="true"></i></b>'
                                html+='</div>'
                                html+='<div class="success_storecard_serial">'
                                html+='<p>Serial  <br>'
                                html+='<span>'+value.serial+'</span>'
                                html+='</p>'
                                html+='<b class="mt-4"><i style="cursor: pointer" class="fa fa-copy copyData" data-copy="'+value.serial+'" aria-hidden="true"></i></b>'
                                html+='</div>'
                                html+='</div>'
                                html+='</div>'

                            });
                        }
                        $('.success_storecard').html(html);
                    }
                    else if(data.status == 401){
                        window.location.href = '/login?return_url='+window.location.href;
                    }
                    else if(data.status == 0){
                        swal({
                            title: "Mua thẻ thất bại !",
                            text: data.message,
                            icon: "error",
                            buttons: {
                                cancel: "Đóng",
                            },
                        })
                    }
                    else{
                        swal({
                            title: "Có lỗi xảy ra !",
                            text: data.message,
                            icon: "error",
                            buttons: {
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
                    $('span#reload').trigger('click');
                    formSubmit.trigger("reset");
                    // btnSubmit.text('Nạp thẻ');
                    btnSubmit.prop('disabled', false);
                }
            });
        });

    });

});
