<div class="modal fade" id="recharge-atm" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="loader" style="text-align: center"><img src="/assets/frontend/{{theme('')->theme_key}}/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;">Nạp tiền từ Atm - Ví điện tử</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @if(isset($data))
            <p style="text-align: center;  font-weight: 600;margin-top: 12px;">Mã nạp: {{$data}} <span><i class="fas fa-copy"  data-id="{{$data}}"></i></span></p>
            @endif
                <div class="modal-body">
                @if(setting('sys_tranfer_content'))
                    {!! setting('sys_tranfer_content') !!}
                @endif
            </div>

            <div class="modal-footer">
                <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

