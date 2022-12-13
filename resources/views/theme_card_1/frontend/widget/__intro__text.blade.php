<div class="clr"></div>
@if(setting('sys_intro_text'))
    <div class="wp_content_post_index">
        <div class="post_index">
            <div class="content_bvct">
                {!! setting('sys_intro_text') !!}
            </div>
            <span class="xt more">Xem thêm</span>
            <span class="xt tg" style="display: none;">Thu gọn</span>

            <script type="text/javascript">
                $('.more').click(function () {
                    $('.content_bvct').css('height', 'unset');
                    $('.more').hide();
                    $('.tg').show();
                });
                $('.tg').click(function () {
                    $('.content_bvct').css('height', '1000px');
                    $('.more').show();
                    $('.tg').hide();
                });
            </script>
        </div>
    </div>
@endif
