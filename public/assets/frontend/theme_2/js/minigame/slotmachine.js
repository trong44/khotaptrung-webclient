$( document ).ready(function() {
    $(document).on('scroll',function(){
        if($(window).width() > 1024){
            if ($(this).scrollTop() > 100) {
                $(".nav-bar-container").css("height","90px");
                $(".nav-bar-category .nav li a").css("line-height","90px");
                $("header .nav-bar").css("background-color","rgba(0,0,0,0.5)");
                $(".nav-bar-brand").css("margin","14px");

            } else {
                $(".nav-bar-container").css("height","120px");
                $(".nav-bar-category .nav li a").css("line-height","120px");
                $(".nav-bar-brand").css("margin","20px 0");
                $("header .nav-bar").css("background-color","rgba(0,0,0,0.8)");
            }
        }

    });
    $('.item_play_intro_viewmore').click(function(){
        $('.item_play_intro_viewless').css("display","flex");
        $('.item_play_intro_viewmore').css("display","none");
        $(".item_play_intro_content").addClass( "showtext" );
    });
    $('.item_play_intro_viewless').click(function(){
        $('.item_play_intro_viewmore').css("display","flex");
        $('.item_play_intro_viewless').css("display","none");
        $(".item_play_intro_content").removeClass( "showtext");
    });
    $('.item_spin_list_more').click(function(){
        $('.item_spin_list').css("overflow","auto");
        $('.item_spin_list_less').css("display","block");
        $(".item_spin_list_more").css("display","none");
    });
    $('.item_spin_list_less').click(function(){
        $('.item_spin_list').css("overflow","hidden");
        $('.item_spin_list_less').css("display","none");
        $(".item_spin_list_more").css("display","block");
    });
});
$(document).ready(function(e) {
    $(".thele").on("click", function(){
        $("#theleModal").modal('show');
    })
    $(".tylevongquay").on("click", function(){
        $("#tylevongquayModal").modal('show');
    })
    $(".uytin").on("click", function(){
        $("#uytinModal").modal('show');
    })
    $(".luotquay").on("click", function(){
        $("#luotquayModal").modal('show');
    })
    $(".topquaythuong").on("click", function(){
        $("#topquaythuongModal").modal('show');
    })


    var tyleLoop = 0;
    var saleoffpass = "";
    //var saleoffmessage = "";
    var game_type_value = "";
    var gift_revice="";
    var userpoint = 0;
    var numrollbyorder = 0;
    var roll_check = true;
    var num_loop = 3;
    var xvalue=0;
    var xvalueaDD = 0;
    var num = 0;
    var num_current = 0;
    var target = 0;
    var arrxgt;
    var free_wheel = 0;
    var typeRoll = "real";
    var value_gif_bonus='';
    var msg_random_bonus = '';
    var arrDiscount = '';
    var slot1_fake;
    var slot2_fake;
    var slot3_fake;
    //Click nút quay
    $('body').delegate('#start-played', 'click', function() {

        if (!auth_check) {
            location.href = '/login?return_url=' + window.location.href;
            return
        }


        if (roll_check) {
            //fakeLoop();
            roll_check = false;
            saleoffpass = $("#saleoffpass").val();
            typeRoll = "real";
            numrolllop = $("#numrolllop").val();
            $.ajax({
                url: '/minigame-play',
                datatype: 'json',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: $('#group_id').val(),
                    numrolllop: numrolllop,
                    numrollbyorder: numrollbyorder,
                    typeRoll: typeRoll,
                    saleoffpass: saleoffpass,
                },
                type: 'POST',
                success: function(data) {
                    if (data.status == 4) {
                        location.href='/login?return_url='+window.location.href;
                        return;
                    } else if (data.status == 3) {
                        roll_check = true;
                        $('#naptheModal').modal('show')
                        return;
                    } else if (data.status == 0) {
                        roll_check = true;
                        $('#noticeModal .content-popup').text(data.msg);
                        $('#noticeModal').modal('show');
                        return;
                    }
                    roll_check = true;
                    gift_detail = data.gift_detail;
                    var num1=0;
                    var num2=0;
                    var num3=0;
                    if(gift_detail.winbox == 0){
                        num1 = parseInt(gift_detail.order)+1;
                        num2 = num1 + 1;
                        if(num2 > parseInt($('#count_item').val())){
                            num2 = num2 - parseInt($('#count_item').val());
                        }
                        num3 = num2 + 1;
                        if(num3 > parseInt($('#count_item').val())){
                            num3 = num3 - parseInt($('#count_item').val());
                        }
                    }else{
                        num1 = parseInt(gift_detail.order)+1;
                        num2 = parseInt(gift_detail.order)+1;
                        num3 = parseInt(gift_detail.order)+1;
                    }


                    game_type_value = data.game_type_value;
                    gift_revice = data.arr_gift;
                    numrollbyorder = parseInt(data.numrollbyorder) + 1;
                    arrxgt = data.xgt;
                    if (arrxgt > 0) {
                        xvalue = arrxgt[arrxgt.length - 1];
                    } else {
                        xvalue = 0;
                    }
                    value_gif_bonus = data.value_gif_bonus;
                    msg_random_bonus = data.msg_random_bonus;
                    xvalueaDD = data.xValue;
                    free_wheel = data.free_wheel;
                    userpoint = data.userpoint;
                    if(userpoint<100){
                        $(".progress-bar").css("width", data.userpoint + "%");
                        $(".progress-bar").removeClass('clickgif');
                    }else{
                        $(".progress-bar").css("width", "100%");
                        $(".progress-bar").addClass('clickgif');
                    }
                    $(".progress-tooltip").text(`Điểm của bạn: ${data.userpoint}/100`);
                    $("#saleoffpass").val("");
                    tyleLoop = 1;
                    doSlot(num1,num2,num3);

                },
                error: function() {
                    $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                    $('#noticeModal').modal('show');
                }
            })
        }
    });


    function getgifbonus() {
        if($('#checkPoint').val() != "1"){
            return;
        }
        $.ajax({
            url: '/minigame-bonus',
            datatype: 'json',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: $('#group_id').val(),
            },
            type: 'POST',
            success: function(data) {
                if (data.status == 0) {
                    $('#noticeModal .content-popup').text(data.msg);
                    $('#noticeModal').modal('show');
                    return;
                }

                var flag_bonus = true;
                var c_game_type_value = '';
                if (data.game_type_value){
                    c_game_type_value = " " + data.game_type_value;
                }
                if (data.value_gif_bonus.length > 0){
                    for (let i = 0; i < data.value_gif_bonus.length; i++ ){
                        if (parseInt(data.value_gif_bonus[i]) > 0){
                            flag_bonus = false;
                        }
                    }
                }
                var total_vp = parseInt(data.arr_gift[0]['parrent'].params.value) + parseInt(data.value_gif_bonus[0]);
                if (!flag_bonus){
                    var html_bonus = "";
                    html_bonus += "</br>";
                    html_bonus += "</br>";
                    html_bonus += "Nổ hũ may mắn - bạn đã trúng thêm " + total_vp + c_game_type_value;
                    $('#noticeModal .nohuthang').append(html_bonus);
                }else{
                    var html_bonus = "";
                    html_bonus += "</br>";
                    html_bonus += "</br>";
                    html_bonus += data.msg + " - " + data.arr_gift[0].title;
                    $('#noticeModal .nohuthang').append(html_bonus);
                }

                $('#noticeModal').modal('show');
                var userpoint = data.userpoint;
                if(userpoint<100){
                    $(".progress-bar").css("width", data.userpoint + "%");
                    $(".progress-bar").removeClass('clickgif');
                }else{
                    $(".progress-bar").css("width", "100%");
                    $(".progress-bar").addClass('clickgif');
                }
                $(".progress-tooltip").text(`Điểm của bạn: ${data.userpoint}/100`);
                $(".pyro").show();
                setTimeout(function(){
                    $(".pyro").hide();
                },6000)
            },
            error: function() {
                $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                $('#noticeModal').modal('show');
            }
        })
    }


    $('body').delegate('.num-play-try', 'click', function() {

        if (!auth_check) {
            location.href = '/login?return_url=' + window.location.href;
            return
        }

        if (roll_check) {
            //fakeLoop();
            roll_check = false;
            saleoffpass = $("#saleoffpass").val();
            typeRoll = "try";
            numrolllop = $("#numrolllop").val();
            $.ajax({
                url: '/minigame-play',
                datatype: 'json',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: $('#group_id').val(),
                    numrolllop: numrolllop,
                    numrollbyorder: numrollbyorder,
                    typeRoll: typeRoll,
                    saleoffpass: saleoffpass,
                },
                type: 'POST',
                success: function(data) {
                    if (data.status == 4) {
                        location.href='/login';
                        return;
                    } else if (data.status == 3) {
                        $('#naptheModal').modal('show')
                        return;
                    } else if (data.status == 0) {
                        roll_check = true;
                        $('#noticeModal .content-popup').text(data.msg);
                        $('#noticeModal').modal('show');
                        return;
                    }
                    roll_check = true;
                    gift_detail = data.gift_detail;
                    var num1=0;
                    var num2=0;
                    var num3=0;
                    if(gift_detail.winbox == 0){
                        num1 = parseInt(gift_detail.order)+1;
                        num2 = num1 + 1;
                        if(num2 > parseInt($('#count_item').val())){
                            num2 = num2 - parseInt($('#count_item').val());
                        }
                        num3 = num2 + 1;
                        if(num3 > parseInt($('#count_item').val())){
                            num3 = num3 - parseInt($('#count_item').val());
                        }
                    }else{
                        num1 = parseInt(gift_detail.order)+1;
                        num2 = parseInt(gift_detail.order)+1;
                        num3 = parseInt(gift_detail.order)+1;
                    }
                    tyleLoop = 1;
                    doSlot(num1,num2,num3);

                    gift_revice = data.arr_gift;
                    numrollbyorder = parseInt(data.numrollbyorder) + 1;
                    arrxgt = data.xgt;
                    if (arrxgt > 0) {
                        xvalue = arrxgt[arrxgt.length - 1];
                    } else {
                        xvalue = 0;
                    }
                    value_gif_bonus = data.value_gif_bonus;
                    msg_random_bonus = data.msg_random_bonus;
                    xvalueaDD = data.xValue;
                    free_wheel = data.free_wheel;
                    userpoint = data.userpoint;
                    if(userpoint<100){
                        $(".progress-bar").css("width", userpoint + "%");
                    }else{
                        $(".pyro").show();
                        setTimeout(function(){
                            $(".pyro").hide();
                        },6000)
                        $(".progress-bar").css("width", "100%");
                        $(".progress-bar").addClass('clickgif');
                    }
                    $('.progress-tooltip').text(`Điểm của bạn: ${userpoint}/100`);
                    $("#saleoffpass").val("");

                },
                error: function() {
                    $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                    $('#noticeModal').modal('show');
                }
            })
        }
    });

    // function fakeLoop(){
    //     document.getElementById("slot1").className='a1'
    //     document.getElementById("slot2").className='a1'
    //     document.getElementById("slot3").className='a1'
    //     var i1 = 0;
    //     var i2 = 0;
    //     var i3 = 0;
    //     slot1_fake = setInterval(spin1_fake, 50);
    //     slot2_fake = setInterval(spin2_fake, 50);
    //     slot3_fake = setInterval(spin3_fake, 50);

    //     function spin1_fake() {
    //         i1++;
    //         slotTile = document.getElementById("slot1");
    //         if (slotTile.className==`a${$('#count_item').val()}`){
    //             slotTile.className = "a0";
    //         }
    //         slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
    //     }
    //     function spin2_fake(){
    //         i2++;
    //         slotTile = document.getElementById("slot2");
    //         if (slotTile.className==`a${$('#count_item').val()}`){
    //             slotTile.className = "a0";
    //         }
    //         slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
    //     }
    //     function spin3_fake(){
    //         i3++;
    //         slotTile = document.getElementById("slot3");
    //         if (slotTile.className==`a${$('#count_item').val()}`){
    //             slotTile.className = "a0";
    //         }
    //         slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
    //     }
    // }


    function doSlot(one, two, three){
        // clearInterval(slot1_fake);
        // clearInterval(slot2_fake);
        // clearInterval(slot3_fake);
        document.getElementById("slot1").className='a1'
        document.getElementById("slot2").className='a1'
        document.getElementById("slot3").className='a1'
        var numChanges = randomInt(1,4)*parseInt($('#count_item').val());
        var numeberSlot1 = numChanges+one
        var numeberSlot2 = numChanges+2*parseInt($('#count_item').val())+two
        var numeberSlot3 = numChanges+4*parseInt($('#count_item').val())+three
        var i1 = 0;
        var i2 = 0;
        var i3 = 0;
        slot1 = setInterval(spin1, 50);
        slot2 = setInterval(spin2, 50);
        slot3 = setInterval(spin3, 50);

        function spin1() {
            i1++;
            if (tyleLoop == 1) {
                if (i1 >= numeberSlot1) {
                    clearInterval(slot1);
                    return null;
                }
            }
            slotTile = document.getElementById("slot1");
            if (slotTile.className==`a${$('#count_item').val()}`){
                slotTile.className = "a0";
            }
            slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
        }
        function spin2(){
            i2++;
            if (tyleLoop == 1) {
                if (i2 >= numeberSlot2) {
                    clearInterval(slot2);

                    return null;
                }
            }
            slotTile = document.getElementById("slot2");
            if (slotTile.className==`a${$('#count_item').val()}`){
                slotTile.className = "a0";
            }
            slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
        }
        function spin3(){
            i3++;
            if (tyleLoop == 1) {
                if (i3 >= numeberSlot3) {
                    clearInterval(slot3);
                    testWin();
                    return null;
                }
            }
            slotTile = document.getElementById("slot3");
            if (slotTile.className==`a${$('#count_item').val()}`){
                slotTile.className = "a0";
            }
            slotTile.className = "a"+(parseInt(slotTile.className.substring(1))+1)
        }
    }

    function randomInt(min, max){
        return Math.floor((Math.random() * (max-min+1)) + min);
    }

    function testWin() {
        roll_check = true;

        $("#btnWithdraw").show();
        if (gift_detail.winbox == 0) {
            $("#btnWithdraw").hide();
        } else {
            if (gift_detail.gift_type == 0) {
                $("#btnWithdraw").html("Rút quà");
                $("#btnWithdraw").attr('href', '/withdrawitem-' + gift_detail.game_type);
            } else if (gift_detail.gift_type == 1) {
                $("#btnWithdraw").html("Kiểm tra nick trúng");
                $("#btnWithdraw").attr('href', '/minigame-logacc-' + $('#group_id').val());
                // } else if (gift_detail.gift_type == 'nrocoin') {
                //     $("#btnWithdraw").html("Rút vàng");
                //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROCOIN").val());
                // } else if (gift_detail.gift_type == 'nrogem') {
                //     $("#btnWithdraw").html("Rút ngọc");
                //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NROGEM").val());
                // } else if (gift_detail.gift_type == 'nroxu') {
                //     $("#btnWithdraw").html("Rút xu");
                //     $("#btnWithdraw").attr('href', '/withdrawservice?id=' + $("#ID_NINJAXU").val());
            } else if (gift_detail.gift_type == 2) {
                $("#btnWithdraw").html("Load lại trang");
                $("#btnWithdraw").removeAttr("href");
                $("#btnWithdraw").addClass('reLoad');
            } else {
                $("#btnWithdraw").hide();
            }

        }


        if (gift_revice.length > 0) {
            $html = "";
            $strDiscountcode = "";

            var flag_bonus = true;

            if (value_gif_bonus.length > 0){
                for (let i = 0; i < value_gif_bonus.length; i++ ){
                    if (parseInt(value_gif_bonus[i]) > 0){
                        flag_bonus = false;
                    }
                }
            }

            var c_game_type_value = '';
            if (game_type_value){
                c_game_type_value = "  " + game_type_value;
            }

            // if(saleoffmessage.length > 0)
            // {
            //     $html += "<br/><span style='font-size: 14px;color: #f90707;font-style: italic;display: block;text-align: center;'>"+saleoffmessage+"</span><br/>";
            // }

            if (typeRoll == "real") {
                if (gift_revice.length == 1) {
                    // if(arrDiscount[0] != "")
                    // {
                    //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[0]+"</b></span>";
                    // }

                    if (!flag_bonus){//trường hợp bonus.
                        var total_vp = parseInt(gift_revice[0]['parrent'].params.value) + parseInt(value_gif_bonus[0]);
                        $html += "<span>Kết quả: Bạn đã trúng " + total_vp + c_game_type_value +"</span><br/>";
                        if (gift_detail.winbox == 1) {
                            $html += "<span>Mua X1: Nhận được " + total_vp + game_type_value + "</span><br/>";
                            $html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+ (parseInt(gift_revice[0]['parrent'].params.value) * (parseInt(xvalueaDD[0])) + parseInt(value_gif_bonus[0])) + game_type_value +"</span><br/>";
                            $html += "<span>Tổng cộng: " + (parseInt(gift_revice[0]['parrent'].params.value) * (parseInt(xvalueaDD[0])) + parseInt(value_gif_bonus[0])) + game_type_value +"</span>";
                        }
                    }else {
                        $html += "<span>Kết quả: " + gift_revice[0]["title"] + "</span><br/>";
                        if (gift_detail.winbox == 1) {
                            $html += "<span>Mua X1: Nhận được " + gift_revice[0]["parrent"].params.value + "</span><br/>";
                            $html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                            $html += "<span>Tổng cộng: " + parseInt(gift_revice[0]["parrent"].params.value) * (parseInt(xvalueaDD[0])) + "</span>";
                        }
                    }

                } else {

                    if (!flag_bonus) {//trường hợp bonus.

                        $totalRevice = 0;
                        $html += "<span>Kết quả: Nhận " + gift_revice.length + " phần thưởng cho " + gift_revice.length + " lượt quay.</span><br/>";
                        $html += "<span><b>Mua X" + gift_revice.length + ":</b></span><br/>";

                        for ($i = 0; $i < gift_revice.length; $i++) {
                            var total_vp = parseInt(gift_revice[$i]['parrent'].params.value) + parseInt(value_gif_bonus[$i]);
                            $html += "<span>Lần quay " + ($i + 1) + ": Bạn đã trúng " + total_vp + " " + c_game_type_value;
                            if (gift_revice[$i].winbox == 1) {
                                $html += " - nhận được: " + gift_revice[$i]['parrent'].params.value + " X" + (parseInt(xvalueaDD[$i])) + " = " + (parseInt(gift_revice[$i]['parrent'].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i])) + "" + c_game_type_value + "</span><br/><br/>";
                            } else {
                                $html += "" + msg_random_bonus[$i] + "<br/>" + $strDiscountcode + "<br/>";
                            }
                            $totalRevice += parseInt(gift_revice[$i]['parrent'].params.value) * (parseInt(xvalueaDD[$i])) + " " + parseInt(value_gif_bonus[$i]);
                        }

                        $html += "<span><b>Tổng cộng: " + $totalRevice + " " + c_game_type_value + " </b></span>";
                    }else{
                        console.log(3);

                        $totalRevice = 0;
                        $html += "<span>Kết quả: Nhận " + gift_revice.length + " phần thưởng cho " + gift_revice.length + " lượt quay.</span><br/>";
                        $html += "<span><b>Mua X" + gift_revice.length + ":</b></span><br/>";

                        for ($i = 0; $i < gift_revice.length; $i++) {
                            // if(arrDiscount[$i] != "")
                            // {
                            //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[$i]+"</b></span>";
                            // }
                            $html += "<span>Lần quay " + ($i + 1) + ": " + gift_revice[$i]["title"];
                            if (gift_revice[$i].winbox == 1) {
                                $html += " - nhận được: " + gift_revice[$i]["parrent"].params.value + " X" + (parseInt(xvalueaDD[$i])) + " = " + parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + "" + msg_random_bonus[$i] + "</span><br/>"  + "<br/>";
                            } else {
                                $html += "" + msg_random_bonus[$i] + "<br/>" + $strDiscountcode + "<br/>";
                            }
                            $totalRevice += parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i]);
                        }

                        $html += "<span><b>Tổng cộng: " + $totalRevice + "</b></span>";
                    }
                }
            } else {
                $("#btnWithdraw").hide();
                if (gift_revice.length == 1) {

                    if (!flag_bonus){//trường hợp bonus.

                        var total_vp = parseInt(gift_revice[0]['parrent'].params.value) + parseInt(value_gif_bonus[0]);
                        $html += "<span>Kết quả chơi thử: Bạn đã trúng " + total_vp + " " + c_game_type_value +"</span><br/>";

                        if (gift_detail.winbox == 1) {
                            $html += "<span>Mua X1: Nhận được " + total_vp + " " + + game_type_value + "</span><br/>";
                            $html += "<span>Tổng cộng: " + (parseInt(gift_revice[0]['parrent'].params.value) * (parseInt(xvalueaDD[0])) + parseInt(value_gif_bonus[0])) + " " + game_type_value +"</span>";
                        }

                    }else {

                        $html += "<span>Kết quả chơi thử: " + gift_revice[0]["title"] + "</span><br/>";

                        if (gift_detail.winbox == 1) {
                            $html += "<span>Mua X1: Nhận được " + gift_revice[0]["parrent"].params.value + "</span><br/>";
                            $html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                            $html += "<span>Tổng cộng: " + parseInt(gift_revice[0]["parrent"].params.value) * (parseInt(xvalueaDD[0])) + "</span>";
                        }
                    }
                } else {

                    if (!flag_bonus) {//trường hợp bonus.

                        $totalRevice = 0;
                        $html += "<span>Kết quả chơi thử: Nhận " + gift_revice.length + " phần thưởng cho " + gift_revice.length + " lượt quay.</span><br/>";
                        $html += "<span><b>Mua X" + gift_revice.length + ":</b></span><br/>";

                        for ($i = 0; $i < gift_revice.length; $i++) {

                            var total_vp = parseInt(gift_revice[$i]['parrent'].params.value) + parseInt(value_gif_bonus[$i]);
                            $html += "<span>Lần quay " + ($i + 1) + ": Bạn đã trúng " + total_vp + c_game_type_value;

                            if (gift_revice[$i].winbox == 1) {
                                $html += " - nhận được: " + gift_revice[$i]['parrent'].params.value + " X" + (parseInt(xvalueaDD[$i])) + " = " + (parseInt(gift_revice[$i]['parrent'].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i])) + "" + c_game_type_value + "</span><br/><br/>";
                            } else {
                                $html += "<br/><br/>";
                            }

                            $totalRevice += parseInt(gift_revice[$i]['parrent'].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i]);
                        }

                        $html += "<span><b>Tổng cộng: " + $totalRevice + c_game_type_value + " </b></span>";
                    }else{

                        $totalRevice = 0;
                        $html += "<span>Kết quả chơi thử: Nhận " + gift_revice.length + " phần thưởng cho " + gift_revice.length + " lượt quay.</span><br/>";
                        $html += "<span><b>Mua X" + gift_revice.length + ":</b></span><br/>";

                        for ($i = 0; $i < gift_revice.length; $i++) {
                            // if(arrDiscount[$i] != "")
                            // {
                            //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[$i]+"</b></span>";
                            // }
                            $html += "<span>Lần quay " + ($i + 1) + ": " + gift_revice[$i]["title"];

                            if (gift_revice[$i].winbox == 1) {
                                $html += " - nhận được: " + gift_revice[$i]["parrent"].params.value + " X" + (parseInt(xvalueaDD[$i])) + " = " + parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + "" + msg_random_bonus[$i] + "</span><br/>"  + "<br/>";
                            } else {
                                $html += "" + msg_random_bonus[$i] + "<br/>" + $strDiscountcode + "<br/>";
                            }

                            $totalRevice += parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i]);
                        }

                        $html += "<span><b>Tổng cộng: " + $totalRevice + "</b></span>";
                    }
                }
            }
        }

        $('#noticeModal .content-popup').html($html);

        if (userpoint > 99) {
            getgifbonus();
        }
        $("#noticeModal").modal('show');
        $("#noticeModal").on("hidden.bs.modal", function () {
            $('.modal-backdrop').remove();
            $('body').removeClass( "modal-open" );
        });
        if (free_wheel < 1) {
            $('.num-play-free').hide();
        } else {
            $('.num-play-free').html("(Bạn còn " + free_wheel + " lượt quay miễn phí)");
        }
    }
});
$(".nav-tabs #tap1-tab-1").on("click",function(){
    $(".active").removeClass("active");
    $(this).parents("li").addClass("active");
    $(".tab-pane").hide();
    $("#tap1-pane-1").show();
})
$(".nav-tabs #tap1-tab-2").on("click",function(){
    $(".active").removeClass("active");
    $(this).parents("li").addClass("active");
    $(".tab-pane").hide();
    $("#tap1-pane-2").show();
})
$(".nav-tabs #tap1-tab-3").on("click",function(){
    $(".active").removeClass("active");
    $(this).parents("li").addClass("active");
    $(".tab-pane").hide();
    $("#tap1-pane-3").show();

})
