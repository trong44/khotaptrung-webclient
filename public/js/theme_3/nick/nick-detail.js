$(document).ready((function(e){var t,s,i,o,l,a,n=$(".slug").val(),r=$(".slug_category").val();!function(e){var t="/acc/"+e+"/showacc";request=$.ajax({type:"GET",url:t,data:{},beforeSend:function(e){},success:function(e){if(1==e.status)$("#showdetailacc").html(""),$("#showdetailacc").html(e.data),$("#fieldset-two").append($("#fieldsetTwoPayment").html()),$("#fieldsetTwoPayment").remove(),$(".loading-data__buyacc").html(""),$("#pageBreadcrumb").html(""),$("#pageBreadcrumb").html(e.datamenu);else if(0==e.status){var t="";t+='<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">'+e.message+"</span></div></div>",$("#showdetailacc").html(""),$("#showdetailacc").html(t),$(".form__data__buyacc").html(""),$(".form__data__buyacc").html('<label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">Bạn phải đăng nhập mới có thể mua tài khoản tự động.</label>')}},error:function(e){},complete:function(e){$("#detailLoader").addClass("d-none"),function(){if($(".gallery-thumbs").length){var e=new Swiper(".gallery-thumbs",{slidesPerView:5.5,spaceBetween:8,centeredSlides:!0,loop:!0,clickable:!0,slideToClickedSlide:!0,observer:!0,observeParents:!0,watchSlidesVisibility:!0,watchSlidesProgress:!0,touchRatio:.2,breakpoints:{992:{slidesPerView:4.5},768:{slidesPerView:3.5},480:{slidesPerView:3.2}}}),t=new Swiper(".gallery-slider",{clickable:!0,slideToClickedSlide:!0,slidesPerView:"auto",centeredSlides:!0,loop:!0,loopedSlides:6,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},observer:!0,observeParents:!0});e.controller.control=t,t.controller.control=e}if($(".gallery-thumbs-mobile").length){var s=new Swiper(".gallery-thumbs-mobile",{slidesPerView:5.5,spaceBetween:8,centeredSlides:!0,loop:!1,clickable:!0,slideToClickedSlide:!0,observer:!0,observeParents:!0,watchSlidesVisibility:!0,watchSlidesProgress:!0,touchRatio:.2,breakpoints:{992:{slidesPerView:4.5},768:{slidesPerView:3.5},480:{slidesPerView:3.2}}}),i=new Swiper(".gallery-slider-mobile",{clickable:!0,slideToClickedSlide:!0,slidesPerView:1,centeredSlides:!1,loop:!0,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},observer:!0,observeParents:!0});s.controller.control=i,i.controller.control=s}}()}})}(n),function(e){request=$.ajax({type:"GET",url:"/related-acc",data:{slug:e},beforeSend:function(e){},success:function(e){if(1==e.status)$("#showslideracc").html(""),$("#showslideracc").html(e.dataslider),new Swiper(".list-dong-gia",{navigation:{nextEl:".list-dong-gia .swiper-button-next",prevEl:".list-dong-gia .swiper-button-prev"},autoplay:!1,updateOnImagesReady:!0,watchSlidesVisibility:!1,lazyLoadingInPrevNext:!1,lazyLoadingOnTransitionStart:!1,freeMode:!0,loop:!1,centeredSlides:!1,slidesPerView:4.5,speed:800,slidesPerGroup:3,spaceBetween:0,touchMove:!0,freeModeSticky:!0,grabCursor:!0,observer:!0,observeParents:!0,breakpoints:{992:{slidesPerView:3.2},768:{slidesPerView:2.5},480:{slidesPerView:1.8}}});else if(0==e.status){var t="";t+='<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">'+e.message+"</span></div></div>",$("#showslideracc").html(""),$("#showslideracc").html(t)}},error:function(e){},complete:function(e){new Swiper(".class-config-account-viewed",{navigation:{nextEl:".class-config-account-viewed .swiper-button-next",prevEl:".class-config-account-viewed .swiper-button-prev"},autoplay:!1,updateOnImagesReady:!0,watchSlidesVisibility:!1,lazyLoadingInPrevNext:!1,lazyLoadingOnTransitionStart:!1,slidesPerView:4.5,speed:800,slidesPerGroup:3,spaceBetween:16,touchMove:!0,grabCursor:!0,observer:!0,observeParents:!0,breakpoints:{992:{freeMode:!0,slidesPerView:3.2},768:{freeMode:!0,slidesPerView:2.3},480:{slidesPerView:1.8}}})}})}(r),$(document).on("submit",".formDonhangAccount",(function(e){e.preventDefault();var t=$(this),s=t.attr("action"),i=t.find(":submit"),o=$(i).text();$(i).text("Đang xử lý..."),i.prop("disabled",!0),t.data("id"),$.ajax({type:"POST",url:s,data:t.serialize(),beforeSend:function(e){},success:function(e){$("#openOrder").modal("hide"),1==e.status?$("#successModal").modal("show"):2==e.status?(swal("Thông báo!",e.message,"warning"),$(i).prop("disabled",!1),$(i).text(o)):(swal("Lỗi!",e.message,"error"),$(i).prop("disabled",!1),$(i).text(o))},error:function(e){if(422===e.status||429===e.status){var s=e.responseJSON.errors;jQuery.each(s,(function(e,s){return t.find(".order-errors .purchaseError").empty(),t.find(".order-errors .purchaseError").html("<small>".concat(s[0],"</small>")),!1}))}else 0===e.status?alert(e.message):alert("Kết nối với hệ thống thất bại.Xin vui lòng thử lại")},complete:function(e){i.prop("disabled",!1)}})})),$(".wide").niceSelect(),$("body").on("click",".button-next-step-one",(function(e){if(a)return!1;a=!0,t=$("#fieldset-one"),(s=$("#fieldset-two")).show(),t.animate({opacity:0},{step:function(e,t){o=50*e+"%",l=1-e,s.css({left:o,opacity:l})},complete:function(){t.hide(),a=!1},easing:"easeInOutBack"})})),$("body").on("click",".previous-step-one",(function(){if(a)return!1;a=!0,t=$("#fieldset-two"),(i=$("#fieldset-one")).show(),t.animate({opacity:0},{step:function(e,s){o=50*(1-e)+"%",l=1-e,t.css({left:o}),i.css({opacity:l})},complete:function(){t.hide(),a=!1},easing:"easeInOutBack"})})),$("body").on("click",".button-next-step-two",(function(){if(a)return!1;a=!0,t=$("#fieldset-two"),(i=$("#fieldset-one")).show(),t.animate({opacity:0},{step:function(e,s){o=50*(1-e)+"%",l=1-e,t.css({left:o}),i.css({opacity:l})},complete:function(){t.hide(),a=!1},easing:"easeInOutBack"})})),$("body").on("click",".button-next-step-one-tra-gop",(function(){if(a)return!1;a=!0,t=$("#fieldset-one"),(s=$("#fieldset-three")).show(),t.animate({opacity:0},{step:function(e,t){o=50*e+"%",l=1-e,s.css({left:o,opacity:l})},complete:function(){t.hide(),a=!1},easing:"easeInOutBack"})})),$("body").on("click",".button-next-step-two-tra-gop",(function(){if(a)return!1;a=!0,t=$("#fieldset-three"),(i=$("#fieldset-one")).show(),t.animate({opacity:0},{step:function(e,s){o=50*(1-e)+"%",l=1-e,t.css({left:o}),i.css({opacity:l})},complete:function(){t.hide(),a=!1},easing:"easeInOutBack"})})),$("body").on("click",".previous-step-one-tra-gop",(function(){if(a)return!1;a=!0,t=$("#fieldset-three"),(i=$("#fieldset-one")).show(),t.animate({opacity:0},{step:function(e,s){o=50*(1-e)+"%",l=1-e,t.css({left:o}),i.css({opacity:l})},complete:function(){t.hide(),a=!1},easing:"easeInOutBack"})})),$("body").on("click",".up-scroll-mobile",(function(){$(".tragop-order-body-row-ct").css("padding",12),$("#tra-gop-scroll-mobile").css("max-height",420),$(".data-scroll-mobile").html(""),$(".data-scroll-mobile").html('<div class="row marginauto down-scroll-mobile"><div class="col-auto left-right"><img class="lazy" src="/assets/theme_3/image/nick/up.png" alt=""></div></div>')})),$("body").on("click",".down-scroll-mobile",(function(){$(".tragop-order-body-row-ct").css("padding",0),$("#tra-gop-scroll-mobile").css("max-height",0),$(".data-scroll-mobile").html(""),$(".data-scroll-mobile").html('<div class="row marginauto up-scroll-mobile"><div class="col-auto left-right"><img class="lazy" src="/assets/theme_3/image/nick/up.png" alt=""></div></div>')})),$("body").on("click",".btn-mua-ngay",(function(e){$("#openOrder").modal("show")})),$("body").on("click",".close-modal-default",(function(){$("#openOrder").modal("hide"),$("#successModal").modal("hide"),$("#traGop").modal("hide")}))}));