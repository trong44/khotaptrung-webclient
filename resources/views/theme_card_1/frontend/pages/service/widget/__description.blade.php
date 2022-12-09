<div class="job-wide-devider" style="margin-top: 24px">

    <div class="description" style="float: none">
        <h2 style="margin-bottom: 23px;font-size: 20px;text-transform: uppercase;">
            Mô tả</h2>
    </div>
    <div class="row">
        <div class="col-lg-12 column">
            <div class="job-details">
                <div class="article-content content_post ">
                    <div class="special-text">
                        {!! $data->content  !!}
                    </div>
                    <span class="expand-button" style="text-align: center">
                        Xem thêm nội dung
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>
<script>

    $('.expand-button').on('click', function() {

        $('.special-text').toggleClass('-expanded');

        if ($('.special-text').hasClass('-expanded')) {
            $('.expand-button').html('Thu gọn nội dung');
        } else {
            $('.expand-button').html('Xem thêm nội dung');
        }
    });
</script>

