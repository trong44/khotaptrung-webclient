<div class="modal fade rotation-modal" id="rotationPrize" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header rotation-modal-header">
                <h5 class="modal-title">Chúc mừng bạn đã quay trúng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/close.png" alt="">
                </button>
            </div>
            <div class="modal-body rotation-prize-body">
                <div class="rotation-prize-img">
                    <img src="/assets/frontend/{{theme('')->theme_key}}/image/images_1/verify 1.png" alt="">
                </div>
                <div class="rotation-prize-detail">
                    <p>Giải thưởng: <span id="rotationValue" style="font-weight: 600; color: #000000;">100.000 Kim cương</span></p>
                    <p>Bonus: <span id="rotationBonus" style="font-weight: 600; color: #000000;">100 Kim cương</span></p>
                    <p>Tổng nhận được: <span id="rotationTotal" style="font-weight: 600; color: #F67600;">100.100 Kim cương</span></p>
                </div>
                <div class="rotation-modal-btn row no-gutters">
                    <div class="col-6">
                        <button class="button-secondary">Rút quà</button>
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <button class="button-primary">Chơi tiếp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
