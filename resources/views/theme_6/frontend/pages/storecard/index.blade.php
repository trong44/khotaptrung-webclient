@extends('frontend.layouts.master')
@section('seo_head')
    @include('frontend.widget.__seo_head')
@endsection
@section('meta_robots')
    <meta name="robots" content="noindex,nofollow" />
@endsection
@push('js')
    <script src="/assets/frontend/{{theme('')->theme_key}}/js/storeCard/store_card.js"></script>
@endpush
@section('content')


<div class="c-content-box c-size-lg c-overflow-hide c-bg-white font-roboto">
   <div class="container">
   </div>
   <div class="text-center" style="margin-bottom: 50px;">
      <h2 style="font-size: 30px;font-weight: bold;text-transform: uppercase">MUA THẺ GAME GIÁ RẺ </h2>
   </div>

   <form method="POST" action="{{route('postStoreCard')}}" id="form-storecard" >
      @csrf
      <div class="container detail-service">
         <div class="row">

            <div class="col-md-8 "   style="margin-bottom:20px;">
               <div class="service-info">
                  <div class="row">
                     <div class="col-md-5 d-none d-md-block d-lg-block">
                        <div class="">
                           <div class="news_image" style="margin-top: 8px;">
                              <img src="/assets/frontend/{{theme('')->theme_key}}/images/store-card.jpg" alt="">
                           </div>
                        </div>
                     </div>
{{--                      <div class="col-md-7 row justify-content-center" id="loading-data">--}}
{{--                          <div class="loading"></div>--}}
{{--                      </div>--}}
                     <div class="col-md-7 " id="formStoreCard"  >
                        <div class="mb-2 control-label bb"><strong>Chọn nhà mạng:</strong> </div>
                        <div class="mb-3">

                            <select name="telecom" id="telecom_storecard" class="server-filter form-control t14" style="">
                                @foreach($telecoms as $val)
                                   <option value="{{$val->key}}">{{$val->title}}</option>
                               @endforeach
                           </select>
                        </div>
                        <div class="mb-2 control-label bb"><strong>Mệnh giá:</strong> </div>
                        <div class="mb-3">
                           <select name="amount" id="amount_storecard" class="server-filter form-control t14" style="">

                           </select>
                        </div>
                        <div class="mb-2 control-label bb"><strong>Số lượng:</strong></div>
                        <div class="mb-3">
                           <select name="quantity" id="quantity" class="server-filter form-control t14" style="">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="row">
                  <div class="col-md-12">
                     <div class=" emply-btns text-center">
                        <a id="txtPrice" style="font-size: 20px;font-weight: bold;color: white" class="" aria-invalid="">
                            <div class="justify-content-center" id="loading-data-total">
                                <div class="loading"></div>
                            </div>
                           <span class="hide" id="StoreCardTotal"> Tổng: 0 VNĐ</span>
                        </a>
                         @if(\App\Library\AuthCustom::check())
                        <button id="btnPurchase" type="submit" style="font-size: 20px;" class="followus">
                            <div class="justify-content-center" id="loading-data-pay">
                                <div class="loading"></div>
                            </div>
                            <span class="hide" id="StoreCardPay">  <i class="fa fa-credit-card" aria-hidden="true"></i> Thanh toán</span>
                        </button>
                         @else
                             <a href="/login" style="font-size: 20px;" class="followus">
                                 <span class="hide" id="StoreCardPay">  <i class="fa fa-key" aria-hidden="true"></i> Đăng nhập để thanh toán</span>
                             </a>
                         @endif
                     </div>
                  </div>
               </div>
               <div class="row box-body" style="color: #505050;padding:20px;line-height: 2;margin-top: 30px">
               </div>
            </div>
         </div>
      </div>
   </form>
    <div class="container">

        <div class="intro_store_card">
            {!! setting('sys_store_card_content') !!}
        </div>
        <button class="store_card-expand-button"> Xem thêm nội dung</button>
        <button class="store_card-collapse-button"> Thu gọn nội dung</button>

    </div>

    @include('frontend.widget.__dichvu__lienquan')
</div>


<div class="modal fade" id="homealert" role="dialog" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="loader" style="text-align: center"><img src="/assets/frontend/{{theme('')->theme_key}}/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center;margin: auto">Xác nhận thông tin thanh toán</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <p> Bạn thực sự muốn thanh toán?</p>
         </div>
         <div class="modal-footer">
            <button type="button" data-dismiss="modal" id="ok" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold " style="">Xác nhận thanh toán</button>
            <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="success_storecard" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
        <div class="loader" style="text-align: center"><img src="/assets/frontend/{{theme('')->theme_key}}/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center;margin: auto">Chi tiết giao dịch</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="font-size: 16px;font-weight: 600"> Thẻ đã mua</p>
                <div class="success_storecard row">
{{--                    <div class="col-md-4 p-2">--}}
{{--                        <div class="alert alert-info">--}}
{{--                            <p>Mã thẻ 1 </p>--}}
{{--                            <p>Loại thẻ : <span>Viettel</span> </p>--}}
{{--                            <div class="success_storecard_pin">--}}
{{--                                <p>Mã thẻ <br>--}}
{{--                                    <span>5465465464654</span>--}}
{{--                                </p>--}}
{{--                                <b><i style="cursor: pointer" class="fa fa-copy copyData" data-copy="'+data.data.price+'" aria-hidden="true"></i></b>--}}
{{--                            </div>--}}
{{--                            <div class="success_storecard_serial">--}}
{{--                                <p>Serial  <br>--}}
{{--                                    <span>5465465464654</span>--}}

{{--                                </p>--}}
{{--                                <b><i style="cursor: pointer" class="fa fa-copy copyData" data-copy="'+data.data.price+'" aria-hidden="true"></i></b>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}





                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection
