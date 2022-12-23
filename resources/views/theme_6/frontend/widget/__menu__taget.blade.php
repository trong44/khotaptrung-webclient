<div class="adthisbutton">
    @if(isset($data))
        @foreach($data as $key => $val)
            @if($val->target == 2)

                <a class="freefire freefire{{ $key }}" style="color:#fff" href="javascript:void(0)">
                    <img src="{{  config('api.url_media').$val->image }}" alt="">
                    <span>{{ $val->title }}</span>
                </a>

            @else
                <a class="freefire" style="color:#fff" href="#target_{{ $key }}">
                    <img src="{{  config('api.url_media').$val->image }}" alt="">
                    <span>{{ $val->title }}</span>
                </a>
            @endif
        @endforeach
    @endif
</div>

@if(isset($data))
    @foreach($data as $key => $val)
        @if($val->target == 2)
            <div class="modal fade in noticeEventModal{{ $key }}" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body" style="font-family: helvetica, arial, sans-serif;">
                            {!! $val->content !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function(){
                    $('body').on('click','.freefire{{ $key }}',function(e){
                        $('.noticeEventModal{{ $key }}').modal('show');
                    })
                })
            </script>
        @endif
    @endforeach
@endif
