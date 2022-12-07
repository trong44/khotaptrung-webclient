
@if(setting('sys_intro_text') != '')
<div id="intro_text_home" class="c-mb-16 c-mt-16">
    <div class="card overflow-hidden detailViewBlock">
        <div class="card-body c-px-16">
            <div class="content-desc hide detailViewBlockContent">

                {!! setting('sys_intro_text') !!}
            </div>
        </div>
        <div class="card-footer text-center">
            <span class="see-more" data-content="Xem thêm nội dung"></span>
        </div>
    </div>
</div>
@endif
