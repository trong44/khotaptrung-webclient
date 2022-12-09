@if(isset($data))
    @if(($data->dacong == 0 || $data->dacong == '' || $data->dacong == null) && $data->status == 1)
        <div class="bonusouter">
            <style type="text/css">
                #bonus{
                    position: fixed;
                    bottom: 15px;
                    left: 15px;
                    width: 13%;
                    z-index: 1000;
                    cursor: pointer;
                }
                #bonus img{
                    width: 100%;
                }
                #bonus_login{
                    display:block;
                    position: fixed;
                    bottom: 15px;
                    left: 15px;
                    width: 10%;
                    z-index: 1000;
                    cursor: pointer;
                }
                #bonus_login img{
                    width: 100%;
                }
                .mobile{
                    width: 30%!important;
                }
                @media only screen and (max-width: 640px) {
                    #bonus_login{width: 25%!important;!important;}
                    #bonus{width: 50%!important;!important;}
                }
                #bonusModal .modal-body p,#bonusModal .modal-body b{display:inline;color:#000}
            </style>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            @if($data->giatritu > 0 && $data->giatriden > 0)
                @if($data->dangnhap == 0)
                    <a id="bonus_login"  title="Click để nhận thưởng!" style="position: relative">
                        <img src='{{\App\Library\MediaHelpers::media($data->icon)}}'/>
                        <img class="remove_gift_bonus" style="width: 24px;height: 24px;position: absolute;top: 0;right: 0" src='/assets/frontend/{{theme('')->theme_key}}/image/closer-red.png'/>
                    </a>
                @else
                    <div id="bonus" title="Click để nhận thưởng!">
                        <img src='{{\App\Library\MediaHelpers::media($data->icon)}}'/>
                    </div>
                @endif
            @endif


            <div class="modal fade" id="bonusModal" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"
                                style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông
                                báo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="middle nohuthang" style="text-align: center;padding: 15px 0;color: blue"></div>
                        <div class="modal-body content-popup" style="font-family: helvetica, arial, sans-serif;">
                            {!!$data->contenttruoc!!} <b class="moneyAdd"></b>

                            {!!$data->contentsau!!}
                            <style>
                                #bonusModal .modal-body p{display:inline!important}
                            </style>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btnPlayNow btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" style="display:none"><a href="#" style="color: #f00">Chơi ngay nào</a></button>
                            <button type="button" class="btnRVP btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" style="display:none"><a href="#" style="color: #333;">Rút vật phẩm</a></button>
                            <button type="button"
                                    class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase"
                                    data-dismiss="modal">Đóng
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript">
                checkQua();
                var isMobile = {
                    Android: function() {
                        return navigator.userAgent.match(/Android/i);
                    },
                    BlackBerry: function() {
                        return navigator.userAgent.match(/BlackBerry/i);
                    },
                    iOS: function() {
                        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
                    },
                    Opera: function() {
                        return navigator.userAgent.match(/Opera Mini/i);
                    },
                    Windows: function() {
                        return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
                    },
                    any: function() {
                        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
                    }
                };
                if( isMobile.any() ) {
                    $('#bonus').addClass('mobile');
                }
                var roll_check = true;

                $("#bonus_login").click(function(){
                    window.location.href = '/login';
                })

                $(".remove_gift_bonus").click(function(){
                    $('#bonus_login').remove();
                    $('#bonus').remove();
                })

                $('#bonus').click(function(){
                    if(roll_check){
                        roll_check = false;
                        $.ajax({
                            url: '/bonus',
                            datatype:'json',
                            data:{
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'post',
                            success: function (data) {
                                console.log(data);
                                if(data.status==0){
                                    if(data.type == "99")
                                    {
                                        $(".btnPlayNow a").attr("href",data.slug);
                                        $(".btnPlayNow").show();
                                        $(".moneyAdd").html(data.msg);
                                        $('#bonusModal').modal('show');
                                        $('#bonus').remove();
                                    }
                                    else if(data.type != 11 && data.type != 12 && data.type != 13)
                                    {
                                        $(".btnRVP a").attr("href",data.slug);
                                        $(".btnRVP").show();
                                        $(".moneyAdd").html(data.msg);
                                        $('#bonusModal').modal('show');
                                        $('#bonus').remove();
                                    }else{
                                        $(".btnPlayNow").hide();
                                        $(".btnRVP").hide();
                                    }
                                }else if(data.status='LOGIN'){
                                    window.location.href = '/login';
                                }else{
                                    $('.modal-body').text('Có lỗi xảy ra. Vui lòng thử lại!');
                                    $('#bonusModal').modal('show');
                                }
                            },
                            error: function(){
                                $('.modal-body').text('Có lỗi xảy ra. Vui lòng thử lại!');
                                $('#bonusModal').modal('show');
                            }
                        })
                    }
                })

                function checkQua(){
                    $.ajax({
                        url: '/bonus',
                        datatype:'json',
                        data:{
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'get',
                        success: function (data) {
                            if(data.dacong!=0 && data.dacong!='' && data.dacong!=null){
                                $('.bonusouter').remove();
                            }
                        },
                        error: function(){

                        }
                    })
                }
            </script>
        </div>
    @endif
@endif
