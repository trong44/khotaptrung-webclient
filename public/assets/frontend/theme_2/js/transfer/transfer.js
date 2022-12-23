$(document).ready(function(){

    // get ID code atm
    function getIdCode(){
        var url = '/ajax/transfer-code';
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                if(data.status == 1){
                    let html = '';
                    html += data.data +'  <a href="#"><i class="las la-copy" data-id="' + data.data + '"></i></a>';
                    $('.transfer-code').html(html)


                }
            },
            error: function (data) {
                swal({
                    title: "Lỗi !",
                    text: "Có lỗi phát sinh vui lòng liên hệ QTV để kịp thời xử lý.(nạp thẻ ATM)",
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
    getIdCode();
    $('body').on('click','i.la-copy',function(e){
        data = $(this).data('id');
        var $temp = $("<input>");
        $("body #copy").html($temp);
        $temp.val($.trim(data)).select();
        document.execCommand("copy");
        $temp.remove();
        toastr.success('Sao chép thành công!');
    });


})
