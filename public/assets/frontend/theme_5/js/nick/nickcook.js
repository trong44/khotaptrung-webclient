$(document).ready(function(){

    var cooki_image = $('.cooki_image').val();
    var cooki_category = $('.cooki_category').val();
    var cooki_randid = $('.cooki_randid').val();
    var cooki_price = $('.cooki_price').val();
    var cooki_price_old = $('.cooki_price_old').val();
    var cooki_promotion = $('.cooki_promotion').val();
    var cooki_buy_account = $('.cooki_buy_account').val();

    function setCookie(name,value,days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days*24*60*60*1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
    }

    function eraseCookie(name) {
        document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

    let cookies = getCookie('for_you_nick');

    if (cookies){
        let n_cookies =  cookies.split(',');
        var isSet = true;

        if (n_cookies.length < 24){
            $.each(n_cookies,function(n_key,n_value){

                let s_cookies = n_value.split('|');


                $.each(s_cookies,function(s_key,s_value){

                    if (s_key == 2 && s_value == cooki_randid){
                        isSet = false;
                    }

                })

            })

            if (isSet){

                var array_item = cooki_image + '|' + cooki_category + '|' + cooki_randid + '|' + cooki_price + '|' + cooki_price_old + '|' + cooki_promotion + '|' + cooki_buy_account;
                var new_cookies = cookies + ',' + array_item;

                eraseCookie('for_you_nick');

                setCookie('for_you_nick',new_cookies,30);

            }
        }else {

            $.each(n_cookies,function(n_key,n_value){

                let s_cookies = n_value.split('|');

                $.each(s_cookies,function(s_key,s_value){

                    if (s_key == 2 && s_value == cooki_randid){
                        isSet = false;
                    }

                })

            })

            if (isSet){
                var itemselect = '';

                $.each(n_cookies,function(nn_key,nn_value){
                    if (nn_key > 0){

                        if (itemselect != '') {
                            itemselect += '|';
                        }

                        itemselect += nn_value;
                    }
                })

                var array_item = cooki_image + '|' + cooki_category + '|' + cooki_randid + '|' + cooki_price + '|' + cooki_price_old + '|' + cooki_promotion + '|' + cooki_buy_account;
                var new_cookies = itemselect + ',' + array_item;

                eraseCookie('for_you_nick');

                setCookie('for_you_nick',new_cookies,30);

            }
        }

    }else{

        var array_item = cooki_image + '|' + cooki_category + '|' + cooki_randid + '|' + cooki_price + '|' + cooki_price_old + '|' + cooki_promotion + '|' + cooki_buy_account;

        setCookie('for_you_nick',array_item,30);

    }

})
