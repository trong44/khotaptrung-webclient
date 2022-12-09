$(document).ready(function () {

    var slug = $('.slug').val();
    var slug_category = $('.slug_category').val();

    getShowAccDetail(slug)

    function getShowAccDetail(slug) {

        var url = '/acc/'+ slug + '/showacc';
        request = $.ajax({
            type: 'GET',
            url: url,
            data: {
                // id:id
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1){

                    $('#showdetailacc').html('');
                    $('#showdetailacc').html(data.data);

                    $('.loading-data__buyacc').html('');

                    $('.data__menuacc').html('');
                    $('.data__menuacc').html(data.datamenu);

                }else if (data.status == 0){

                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';

                    $('#showdetailacc').html('');
                    $('#showdetailacc').html(html);


                    var htmlform = '';
                    htmlform += '<label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">Bạn phải đăng nhập mới có thể mua tài khoản tự động.</label>';

                    $('.form__data__buyacc').html('');
                    $('.form__data__buyacc').html(htmlform);

                }

            },
            error: function (data) {

            },
            complete: function (data) {

                $('.result-amount-loadding__nick-lien-quan').css('display','block');
                getDichVuLienQuan(slug_category);
                $('#section-viewed-account').parent().removeClass('d-none');
            }
        });
    }

    function getDichVuLienQuan(slug_category) {

        var url = '/related-acc';
        request = $.ajax({
            type: 'GET',
            url: url,
            data: {
                slug:slug_category,
                ran_id: slug
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1){

                    $('#showslideracc').html('');

                    $('#showslideracc').html(data.dataslider);

                }else if (data.status == 0){

                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';

                    $('#showdetailacc').html('');
                    $('#showdetailacc').html(html);
                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }

    getTaiKhoanDaXem();

    function getTaiKhoanDaXem() {

        var url = '/watched-acc';
        request = $.ajax({
            type: 'GET',
            url: url,
            data: {
                slug:slug_category,
                ran_id: slug
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1){

                    $('#showswatched').html('');
                    $('#showswatched').html(data.datawatched);

                }else if (data.status == 0){
                    $('#showswatched').html('');
                    // var html = '';
                    // html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';
                    //
                    // $('#showdetailacc').html('');
                    // $('#showdetailacc').html(html);
                }else if (data.status == 2){
                    $('#showswatched').html('');
                    console.log("chưa có dữ liệu")
                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }
})
