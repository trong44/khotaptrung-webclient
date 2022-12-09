$(document).ready(function(){
    loadDataServiceCategory();
    let page = 1;
    let is_over = false;
    let not_loaded = true;

    function loadDataServiceCategory(page) {
        let slug = $('#slug').val();

        request = $.ajax({
            type: 'GET',
            url: '/dich-vu/'+ slug +'/data-category',
            data: {
                page:page,
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {
                console.log(data)
                let html = "";

                if (data.is_over){
                    is_over = true;
                } else {
                    data.data.forEach(function (data) {
                        html += '<div class="col-sm-6 col-md-3">';
                            html += '<div class="classWithPad">';
                                html += '<div class="image">';
                                    html += '<a href="/dich-vu/lam-nhiem-vu-thue-ngoc-rong">';
                                    html += '<img src="/storage/images/vuQtyFn1Gl_1623228670.jpg">';
                                    html += '</a>';
                                html += '</div>';
                                html += '<div class="news_title">';
                                    html += '<a href="/dich-vu/lam-nhiem-vu-thue-ngoc-rong">Làm Nhiệm Vụ Thuê Ngọc Rồng</a>';
                                html += '</div>';
                                html += '<div class="a-more" style="margin-top: 15px">';
                                    html += '<div class="row">';
                                    html += '<div class="col-xs-6"></div>';
                                    html += '</div>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';

                    });
                    $('#data-list-service-category').append(html);
                    not_loaded = true;
                }

                if ((data.data == '' || data.data == null) && is_over == false){

                    var htmld = '';
                    htmld += '<div class="row pb-3">';
                    htmld += '<div class="col-md-12 text-center">'
                    htmld += '<span style="color: red;font-size: 16px;">Hiện tại chưa có dịch vụ ! Hệ thống sẽ cập nhật dịch vụ thường xuyên bạn vui lòng theo dõi web trong thời gian tới !\n' +
                        '\n</span>';                    htmld += '</div>';
                    htmld += '</div>';
                    $('#data-list-service-category').html('');
                    $('#data-list-service-category').html(htmld);
                }

            },
            error: function (data) {

            },
            complete: function (data) {

            }
        });
    }
});
