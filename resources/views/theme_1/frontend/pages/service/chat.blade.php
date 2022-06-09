@extends('frontend.layouts.master')
@section('meta_robots')
    <meta name="robots" content="index,follow" />
@endsection
@section('content')
{{--    @dd($inbox)--}}
    <div class="account">
        <div class="account_content">
            <div class="container">
                @include('frontend.pages.account.sidebar')

                <div class="account_sidebar_content">

                    <div class="c-content-title-1 pt-3" style="border-bottom: 1px solid #3f444a;">
                        <h3 class="c-font-uppercase c-font-bold" style="font-size: 30px;font-weight: bold;text-transform: uppercase;">Gửi tin nhắn</h3>
                        <div class="c-line-left"></div>
                    </div>

                    <div style="float: left;width: 100%;padding-top: 24px">
                        <h2 style="text-align: center;font-size: 25px;color: #3f444a;">
                            Trao đổi dịch vụ <a href="/dich-vu-da-mua-{{$item->id}}" style="color: #32c5d2;">#{{$item->id}}</a>
                        </h2>
                        <div class="edu-history-sec" id="experience">


                            @forelse($inbox  ?: [] as $aInbox)

                                <div id="msg{{$aInbox->id}}" class="edu-history style2">
                                    <i></i>
                                    <div class="edu-hisinfo">
                                        @if($conversation->type==1)

                                            @if($aInbox->username==$conversation->author)
                                                <h3>Người yêu cầu(order)</h3>
                                            @elseif($aInbox->username==$conversation->buyer)
                                                <h3>Người thực hiện</h3>
                                            @else
                                                <h3>Người hỗ trợ</h3>
                                            @endif

                                        @else

                                            @if($aInbox->username==$conversation->author)
                                                <h3>Người bán</h3>
                                            @elseif($aInbox->username==$conversation->buyer)
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

                        <form method="POST" enctype="multipart/form-data" action="/inbox/send/{{$item->id}}" accept-charset="UTF-8" class="form-horizontal form-charge">
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
                                        <input multiple="" accept=".jpg,.png,.gif" type="file" name="image[]">
                                        {{--<input type="file" class="form-control c-square" accept=".jpg,.png,.gif" type="file" name="image[]">--}}
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
                                    <button type="submit" class="btn btn-submit c-theme-btn  c-btn-uppercase c-btn-bold  c-square">Gửi tin nhắn</button>
                                </div>

                            </div>
                        </form>
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
        $(".chat-history").scrollTop($(".chat-history")[0].scrollHeight);


        $("#btn_pick_image").click(function () {
            $("#file_pick_image").click();
        });


        $('#file_pick_image').on("change", function (e) {
            var temp = "";
            for (var i = 0; i < $(this)[0].files.length; ++i) {
                temp += '<span class="m-badge  m-badge--success">' + $(this)[0].files.item(i).name + '</span> ';
            }
//						console.log($(this).parent().find(".imggem"));
            $(this).parent().find(".img-label").html(temp);
        });
    </script>
@endsection


<script type="application/ld+json">
    {
          "@graph":
      [
          {
                "@context": "http://schema.org/",
                "@type": "Product",
                "name": "NICK FREE FIRE GIÁ RẺ",
                    "description": "Shop bán nick free fire online giá rẻ uy tín. Đây là địa chỉ bán nick FF được nhiều game thủ và youtuber tin tưởng và sử dụng với nhiều ưu đãi khi mua acc FF tại shop Webnick.vn.";
                     "image": "https://cdn.upanh.info/storage/upload/images/MUA-NICK-FF-SIEU-RE.gif",
                    "brand": {
                        "@type": "Brand",
                        "name": "webnick"
                      },
                    "aggregateRating": {
                        "@type": "AggregateRating",
                        "ratingValue": "5",
                        "bestRating": "5",
                        "worstRating": "4",
                        "ratingCount": "79396",
                        "reviewCount": "793986"
                    },
                    "sku": "nick-free-fire",
                    "gtin8": "nick-free-fire",
                    "mpn": "nick-free-fire",
                    "offers": {
                            "@type": "Offer",
                             "url": "https://webnick.vn/mua-acc/",
                            "priceCurrency": "VND",
                            "price": "7700",
                            "priceValidUntil": "2099-12-31",
                            "availability": "https://schema.org/InStock",
                            "itemCondition": "https://schema.org/NewCondition"
                          },
                    "review": {
                    "@type": "Review",
                    "name": "NICK FREE FIRE GIÁ RẺ",
                    "reviewBody": "Đã mua acc game thành công, giá rẻ hơn so với các shop khác, thời gian giao dịch và nhận nick rất nhanh, web mua nick game uy tín",
                    "reviewRating": {
                      "@type": "Rating",
                      "ratingValue": "5",
                      "bestRating": "5",
                      "worstRating": "4"
                    },
                    "author": {"@type": "Person", "name": "An"},
                    "publisher": {"@type": "Organization", "name": "An"}
                  }
          },
        {
          "@context": "http://schema.org",
          "@type": "WebSite",
          "name": "https://napgamegiare.net",
              "url": "https://napgamegiare.net"
        }
      ]
    }

    </script>