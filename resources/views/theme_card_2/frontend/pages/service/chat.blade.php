@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection

@section('content')
    <div id="profile" style="margin-top: 15px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-12 col-sm-12 col-12">
                    @include('frontend.layouts.includes.menu_profile')
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="content-profile" style="min-height: 468px;">
                        <div class="account_sidebar_content">

                            <div class="c-content-title-1 pt-3" style="border-bottom: 1px solid #3f444a;">
                                <h3 class="c-font-uppercase c-font-bold" style="font-size: 30px;font-weight: bold;text-transform: uppercase;">Gửi tin nhắn</h3>
                                <div class="c-line-left"></div>
                            </div>

                            <div style="float: left;width: 100%;padding-top: 24px">
                                <h2 style="text-align: center;font-size: 25px;color: #2F6A7C;">
                                    Trao đổi dịch vụ <a href="/dich-vu-da-mua-{{$item->id}}" style="color: #2F6A7C;">#{{$item->id}}</a>
                                </h2>
                                <div class="error-chat">
                                    {{--                            <span style="font-size: 14px;color: red;margin-bottom: 16px">Lỗi rồi em ơi</span>--}}
                                </div>
                                <div class="edu-history-sec pt-3" id="experience">

                                    @forelse($inbox  ?: [] as $aInbox)

                                        <div id="msg{{$aInbox->id}}" class="edu-history style2">
                                            <i></i>
                                            <div class="edu-hisinfo">
                                                @if($conversation->type==1)

                                                    @if($aInbox->user->id == $conversation->author_id)
                                                        <h3>Người yêu cầu(order)</h3>
                                                    @elseif($aInbox->user->id == $conversation->buyer_id)
                                                        <h3>Người thực hiện</h3>
                                                    @else
                                                        <h3>Người hỗ trợ</h3>
                                                    @endif

                                                @else

                                                    @if($aInbox->user->user_id==$conversation->author_id)
                                                        <h3>Người bán</h3>
                                                    @elseif($aInbox->user->user_id==$conversation->buyer_id)
                                                        <h3>Người mua</h3>
                                                    @else
                                                        <h3>Người hỗ trợ</h3>
                                                    @endif

                                                @endif

                                                <p><span>{{\App\Library\Helpers::ConvertToAgoTime($aInbox->created_at)}}</span>: {{$aInbox->message}}</p>

                                                @if(isset($aInbox) && $aInbox->image != "")
                                                    <div class="mess-gallery m-t-20">
                                                        @foreach(explode('|', $aInbox->image) as $img)
                                                            <a href="{{$img}}" target="_blank"><img src="{{\App\Library\Files::media($img)}}" style="max-height: 200px; max-width: 100%;">
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @empty
                                        <div style="padding:20px 0;font-weight: 400;color: #3f444a;">Chưa có nội dung trao đổi</div>
                                    @endforelse

                                </div>

                            </div>

                            <div style="float: left;width: 100%">

                                <form method="POST" id="chatFrom" enctype="multipart/form-data" action="/inbox/send/{{$item->id}}" accept-charset="UTF-8" class="form-horizontal form-charge">
                                    {{csrf_field()}}

                                    <div class="left-right col-sm-offset-1 col-sm-9">
                                        <div class="form-group">
                                            <label class="col-sm-12 left-right control-label" style="font-weight: 400;color: #3f444a;">Nội dung:</label>
                                            <div class="col-sm-12 left-right">
                                                <textarea type="email" rows="4" class="form-control c-square" name="message"></textarea>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-12 left-right control-label" style="font-weight: 400;color: #3f444a;">Hình ảnh:</label>
                                            <div class="col-sm-12 left-right">
                                                {{--                                        <input multiple="" accept=".jpg,.png,.gif" type="file" name="image[]">--}}
                                                <input type="file" name="image" accept="image/*" multiple="">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12 left-right">
                                                <div class="checkbox">
                                                    <input id="complain" type="checkbox" value="1" name="complain" style="width: 16px;height: 16px">
                                                    <label for="complain" style="padding-left: 0px;cursor: pointer;margin-left: 8px;font-weight: 400;color: #3f444a;">
                                                        Khiếu nại
                                                    </label>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 left-right control-label">Mã bảo vệ:</label>
                                            <div class="col-sm-12 left-right">
                                                <div class="input-group col-sm-6 left-right">

                                                    <input type="text" class="form-control c-square" id="captcha" name="captcha" placeholder="Mã bảo vệ" maxlength="3" autocomplete="off" required="">
                                                    <span class="input-group-addon" style="padding: 1px;">
                                            <img style="margin-left: 16px;border: 1px solid #3f444a;padding: 4px 16px;border-radius: 4px;" src="{{captcha_src('flat')}}" height="38px" id="imgcaptcha" onclick="document.getElementById('imgcaptcha').src ='{{captcha_src('flat')}}'+Math.random();document.getElementById('captcha').focus();">
                                        </span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-submit c-theme-btn  c-btn-uppercase c-btn-bold  c-square" style="background: #2F6A7C;color: #ffffff">Gửi tin nhắn</button>
                                        </div>

                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: PAGE CONTENT -->
    <style>
        .checkbox label:after {
            content: '';
            display: table;
            clear: both;
        }

        .checkbox .cr {
            position: relative;
            display: inline-block;
            border: 1px solid #a9a9a9;
            border-radius: .25em;
            width: 1.3em;
            height: 1.3em;
            float: left;
            margin-right: .5em;
        }

        .checkbox .cr .cr-icon {
            position: absolute;
            font-size: .8em;
            line-height: 0;
            top: 50%;
            left: 15%;
        }

        .checkbox label input[type="checkbox"] {
            display: none;
        }

        .checkbox label input[type="checkbox"]+.cr>.cr-icon {
            opacity: 0;
        }

        .checkbox label input[type="checkbox"]:checked+.cr>.cr-icon {
            opacity: 1;
        }
    </style>

    <script>


        $(document).ready(function () {
            $('#chatFrom').submit(function (e) {
                e.preventDefault();
                var formSubmit = $(this);
                var url = formSubmit.attr('action');
                var btnSubmit = formSubmit.find(':submit');
                btnSubmit.prop('disabled', true);

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formSubmit.serialize(), // serializes the form's elements.
                    beforeSend: function (xhr) {

                    },
                    success: function (response) {

                        if(response.status == 1){

                            swal({
                                title: "Gửi tin nhắn thành công",
                                type: "success",
                                confirmButtonText: "Về dịch vụ đã mua",
                                showCancelButton: true,
                                cancelButtonText: "Đóng",
                            })
                                .then((result) => {
                                    if (result.value) {
                                        window.location = '/dich-vu-da-mua';
                                    } else if (result.dismiss === "Đóng") {
                                        location.reload();
                                    }else {
                                        location.reload();
                                    }
                                })
                        }
                        else if (response.status == 2){
                            $('.loadModal__acount').modal('hide');

                            swal(
                                'Thông báo!',
                                response.message,
                                'warning'
                            )
                            $('.loginBox__layma__button__displayabs').prop('disabled', false);
                        }else {
                            $('.loadModal__acount').modal('hide');
                            swal(
                                'Lỗi!',
                                response.message,
                                'error'
                            )
                            $('.loginBox__layma__button__displayabs').prop('disabled', false);
                        }
                        $('.loading-data__muangay').html('');
                    },
                    error: function (response) {
                        if(response.status === 422 || response.status === 429) {
                            let errors = response.responseJSON.errors;

                            jQuery.each(errors, function(index, itemData) {

                                formSubmit.find('.notify-error').text(itemData[0]);
                                return false; // breaks
                            });
                        }else if(response.status === 0){
                            alert(response.message);
                            $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+response.message+'</span>');
                        }
                        else {
                            $('#text__errors').html('<span class="text-danger pb-2" style="font-size: 14px">'+'Kết nối với hệ thống thất bại.Xin vui lòng thử lại'+'</span>');
                        }
                    },
                    complete: function (data) {
                        btnSubmit.prop('disabled', false);
                    }
                })


            })
        })


    </script>

@endsection




