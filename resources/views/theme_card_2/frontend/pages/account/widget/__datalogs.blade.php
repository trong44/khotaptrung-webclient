@if(empty($data->data))
    <div class="table-responsive" id="tableacchstory">
        <table class="table table-hover table-custom-res">
            <thead><tr><th>Thời gian</th><th>ID</th><th>Game</th><th>Tài khoản</th><th>Trị giá</th><th>Trạng thái</th><th>Thao tác</th></tr></thead>
            <tbody>

            @if(isset($data) && count($data) > 0)
                @foreach ($data as $item)
                    <tr>
                        <td>{{ formatDateTime($item->published_at) }}</td>
                        <td>
                            @if(isset($item->randId))
                                #{{ $item->randId }}
                            @endif
                        </td>
                        <td>
                            @if(isset($item->groups))
                                @foreach($item->groups as $val)
                                    @if($val->module == 'acc_category')
                                        {{ $val->title }}
                                    @endif
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>
                            {{ str_replace(',','.',number_format($item->price)) }} đ
                        </td>
                        <td>
                            @if($item->status == 1)
                            @elseif($item->status == 2)
                                <span class="badge badge-warning">Chờ xử lý</span>
                            @elseif($item->status == 3)
                                <span class="badge badge-warning">Đang check thông tin</span>
                            @elseif($item->status == 4)
                                <span class="badge badge-danger">Sai thông tin</span>
                            @elseif($item->status == 5)
                                <span class="badge badge-danger">Đã xoá</span>
                            @elseif($item->status == 0)
                                <span class="badge badge-success">Thành công</span>
                            @endif
                        </td>
                        <td>
                            @if($item->status == 0)
                                <a href="javascript:void(0)" style="color: #ffffff" class="badge badge-info show_chitiet" data-id="{{ $item->id }}">Chi tiết</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else

            @endif

            </tbody>
        </table>
    </div>

    <div class="col-md-12 left-right justify-content-end paginate__v1 paginate__v1_mobie frontend__panigate">

        @if(isset($data))
            @if($data->total()>1)
                <div class="row marinautooo paginate__history paginate__history__fix justify-content-center">
                    <div class="col-auto paginate__category__col">
                        <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                            {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>
    {{--    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>--}}
    {{--    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>--}}
    <script>



        function myFunction() {
            var copyText = document.getElementById("password");
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            navigator.clipboard.writeText(copyText.value);

        }

        function myFunctionId() {
            var copyText = document.getElementById("idkey");
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            navigator.clipboard.writeText(copyText.value);

        }
        function myFunctiontk() {
            var copyText = document.getElementById("taikhoan");
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
            navigator.clipboard.writeText(copyText.value);
        }



        $(document).ready(function(){

            tippy('#getpass', {
                // default
                trigger: 'click',
                content: "Đã copy!",
                placement: 'right',
            });

            tippy('#getpasstk', {
                // default
                trigger: 'click',
                content: "Đã copy!",
                placement: 'right',
            });



            tippy('#getIdkey', {
                // default
                trigger: 'click',
                content: "Đã copy!",
                placement: 'right',
            });

            // Click event of the showPassword button
            $('.show-btn-password').on('click', function(){

                // Get the password field
                var passwordField = $('#password');

                // Get the current type of the password field will be password or text
                var passwordFieldType = passwordField.attr('type');

                // Check to see if the type is a password field
                if(passwordFieldType == 'password')
                {
                    // Change the password field to text
                    passwordField.attr('type', 'text');

                    var htmlpass = '';
                    htmlpass += '<i class="fas fa-eye-slash fa-eye-slash-password"></i>';
                    $('.show-btn-password').html('');
                    $('.show-btn-password').html(htmlpass);

                    // Change the Text on the show password button to Hide
                    $(this).val('Hide');
                } else {
                    var htmlpass = '';
                    htmlpass += '<i class="fas fa-eye fa-eye-password"></i>';
                    $('.show-btn-password').html('');
                    $('.show-btn-password').html(htmlpass);

                    // If the password field type is not a password field then set it to password
                    passwordField.attr('type', 'password');

                    // Change the value of the show password button to Show
                    $(this).val('Show');
                }
            });

            // Click event of the showPassword button
            $('.show-btn-idkey').on('click', function(){

                // Get the password field
                var passwordField = $('#idkey');

                // Get the current type of the password field will be password or text
                var passwordFieldType = passwordField.attr('type');

                // Check to see if the type is a password field
                if(passwordFieldType == 'password')
                {
                    // Change the password field to text
                    passwordField.attr('type', 'text');

                    var htmlpass = '';
                    htmlpass += '<i class="fas fa-eye-slash fa-eye-slash-idkey"></i>';
                    $('.show-btn-idkey').html('');
                    $('.show-btn-idkey').html(htmlpass);

                    // Change the Text on the show password button to Hide
                    $(this).val('Hide');
                } else {
                    var htmlpass = '';
                    htmlpass += '<i class="fas fa-eye fa-eye-idkey"></i>';
                    $('.show-btn-idkey').html('');
                    $('.show-btn-idkey').html(htmlpass);

                    // If the password field type is not a password field then set it to password
                    passwordField.attr('type', 'password');

                    // Change the value of the show password button to Show
                    $(this).val('Show');
                }
            });
        });


    </script>

    <style>
        span i.hide-btn::before{
            content: "\f070";
        }
        .show-btn-password{
            cursor: pointer;
            right: 20%;
            position: absolute;
            top: 20%;
        }
        .show-btn-password i{
            color: #32c5d2;
        }
        #password{
            position: relative;
        }
        #idkey{
            position: relative;
        }
        .show-btn-idkey i{
            color: #32c5d2;
        }
        .show-btn-idkey{
            cursor: pointer;
            right: 20%;
            position: absolute;
            top: 20%;
        }
    </style>
@endif
