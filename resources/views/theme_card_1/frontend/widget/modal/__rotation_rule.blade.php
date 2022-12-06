<div class="modal fade rotation-modal" id="rotationRule" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered animated" role="document">
        <div class="modal-content">
            <div class="modal-header rotation-modal-header">
                <h5 class="modal-title">Thể lệ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/close.png" alt="">
                </button>
            </div>
            <div class="modal-body rotation-rule-body">
                <div class="rotation-rule-img">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/rotation-rule.png" alt="">
                </div>
                <div class="rotation-rule-text">
                    {!! $thele??null !!}
                </div>
                <div class="rotation-modal-btn row no-gutters">
                    @if(App\Library\AuthCustom::check())
                    <div class="col-6">
                        <button id="playerDemo" class="button-secondary button-demo num-play-try" data-dismiss="modal">Chơi thử</button>
                    </div>
                    @else
                        <div class="col-6">
                            <button class="button-secondary" onclick="openLoginModal();" data-dismiss="modal">Chơi thử</button>
                        </div>
                    @endif
                    <div class="col-6" style="text-align: right;">
                        <button id="start-played" class="button-primary button-play play b_button" data-dismiss="modal">Chơi ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
