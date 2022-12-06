const position_input = $('#position_input').val();
function animate(options) {
    var start = performance.now();
    requestAnimationFrame(function animate(time) {
        var timeFraction = (time - start) / options.duration;
        if (timeFraction > 1) timeFraction = 1;
        var progress = options.timing(timeFraction)
        options.draw(progress);
        if (timeFraction < 1) {
            requestAnimationFrame(animate);
        }
    });
}
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
                        if(num2 > parseInt('{{count($result->group->items)}}')){
                            num2 = num2 - parseInt('{{count($result->group->items)}}');
                        }
                        num3 = num2 + 1;
                        if(num3 > parseInt('{{count($result->group->items)}}')){
                            num3 = num3 - parseInt('{{count($result->group->items)}}');
                        }
                    }else{
                        num1 = parseInt(gift_detail.order)+1;
                        num2 = parseInt(gift_detail.order)+1;
                        num3 = parseInt(gift_detail.order)+1;
                    }



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
                        $(".item_spin_progress_bubble").css("width", data.userpoint + "%")
                    }else{
                        $(".item_spin_progress_bubble").css("width", "100%");
                        $(".item_spin_progress_bubble").addClass('clickgif');
                    }
                    $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
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
                $('#noticeModal .nohuthang').html(data.msg + " - " + data.arr_gift[0].title);
                $('#noticeModal').modal('show');
                var userpoint = data.userpoint;
                if(userpoint<100){
                    $(".item_spin_progress_bubble").css("width", data.userpoint + "%");
                    $(".item_spin_progress_bubble").removeClass('clickgif');
                }else{
                    $(".item_spin_progress_bubble").css("width", "100%");
                    $(".item_spin_progress_bubble").addClass('clickgif');
                }
                $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
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
                        if(num2 > parseInt('{{count($result->group->items)}}')){
                            num2 = num2 - parseInt('{{count($result->group->items)}}');
                        }
                        num3 = num2 + 1;
                        if(num3 > parseInt('{{count($result->group->items)}}')){
                            num3 = num3 - parseInt('{{count($result->group->items)}}');
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
                        $(".item_spin_progress_bubble").css("width", data.userpoint + "%")
                    }else{
                        $(".item_spin_progress_bubble").css("width", "100%");
                        $(".item_spin_progress_bubble").addClass('clickgif');
                    }
                    $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
                    $("#saleoffpass").val("");

                },
                error: function() {
                    $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                    $('#noticeModal').modal('show');
                }
            })
        }
    });

    function doSlot(one, two, three){
        document.getElementById("slot1").className='a1'
        document.getElementById("slot2").className='a1'
        document.getElementById("slot3").className='a1'
        var numChanges = randomInt(1,4)*parseInt('{{count($result->group->items)}}');
        var numeberSlot1 = numChanges+one
        var numeberSlot2 = numChanges+2*parseInt('{{count($result->group->items)}}')+two
        var numeberSlot3 = numChanges+4*parseInt('{{count($result->group->items)}}')+three
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
            if (slotTile.className=="a{{count($result->group->items)}}"){
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
            if (slotTile.className=="a{{count($result->group->items)}}"){
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
            if (slotTile.className=="a{{count($result->group->items)}}"){
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

            if (typeRoll == "real") {
                if (gift_revice.length == 1) {
                    // if(arrDiscount[0] != "")
                    // {
                    //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[0]+"</b></span>";
                    // }
                    $html += "<span>Kết quả: " + gift_revice[0]["title"] + "</span><br/>";
                    if (gift_detail.winbox == 1) {
                        $html += "<span>Mua X1: Nhận được " + gift_revice[0]["parrent"].params.value + "</span><br/>";
                        $html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                        $html += "<span>Tổng cộng: " + parseInt(gift_revice[0]["parrent"].params.value) * (parseInt(xvalueaDD[0])) + "</span>";
                    }
                } else {
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
            } else {
                $("#btnWithdraw").hide();
                if (gift_revice.length == 1) {
                    $html += "<span>Kết quả chơi thử: " + gift_revice[0]["title"] + "</span><br/>";
                    if (gift_detail.winbox == 1) {
                        $html += "<span>Mua X1: Nhận được " + gift_revice[0]["parrent"].params.value + "</span><br/>";
                        $html += "<span>Quay được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                        $html += "<span>Tổng cộng: " + parseInt(gift_revice[0]["parrent"].params.value) * (parseInt(xvalueaDD[0])) + "</span>";
                    }
                } else {
                    $totalRevice = 0;
                    $html += "<span>Kết quả chơi thử: Nhận " + gift_revice.length + " phần thưởng cho " + gift_revice.length + " lượt quay.</span><br/>";
                    $html += "<span><b>Mua X" + gift_revice.length + ":</b></span><br/>";
                    for ($i = 0; $i < gift_revice.length; $i++) {
                        $html += "<span>Lần quay " + ($i + 1) + ": " + gift_revice[$i]["title"];
                        if (gift_revice[$i].winbox == 1) {
                            $html += " - nhận được: " + gift_revice[$i]["parrent"].params.value + " X" + (parseInt(xvalueaDD[$i])) + " = " + parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + "" + msg_random_bonus[$i] + "</span><br/>";
                        } else {
                            $html += "" + msg_random_bonus[$i] + "<br/>";
                        }
                        $totalRevice += parseInt(gift_revice[$i]["parrent"].params.value) * (parseInt(xvalueaDD[$i])) + parseInt(value_gif_bonus[$i]);
                    }

                    $html += "<span><b>Tổng cộng: " + $totalRevice + "</b></span>";
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
$('body').delegate('.reLoad', 'click', function() {
    location.reload();
})

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
$(document).ready(function(e){
    initial();
    $('.play').click(function(){
        roll_check = true;
        $('.boxflip img.flip-box-front').each(function(){
            $(this).attr('src','{{ \App\Library\MediaHelpers::media($result->group->params->image_static) }}');
        })
        $('.boxflip .flip-box-front').css({'transform': 'rotateY(0deg)'});
        $('.boxflip .flip-box-front').parent().css({'transform': 'rotateY(0deg)'});
        $('.boxflip .flip-box-front').prev().removeClass('transparent');
        $('.boxflip .flip-box-front').addClass('img_remove');
        $('.num-play-try').hide();
        $('.play').hide();
        //$('.continue').hide();
        $('#type_play').val('real');
    })
    $('.num-play-try').click(function(){
        roll_check = true;
        $('.boxflip img.flip-box-front').each(function(){
            $(this).attr('src','{{ \App\Library\MediaHelpers::media($result->group->params->image_static) }}');
        })
        $('.boxflip .flip-box-front').css({'transform': 'rotateY(0deg)'});
        $('.boxflip .flip-box-front').parent().css({'transform': 'rotateY(0deg)'});
        $('.boxflip .flip-box-front').prev().removeClass('transparent');
        $('.boxflip img.flip-box-front').addClass('img_remove');
        $('.num-play-try').hide();
        $('.play').hide();
        //$('.continue').hide();
        $('#type_play').val('try');
    })
    function initial(){
        gift_list = [];
        $('.image_gift').each(function(){
            gift_list.push({'image':$(this).val()})
        })
        gift_list = shuffle(gift_list);
        var i=0;
        $('.boxflip img.flip-box-front').each(function(){
            $(this).attr('src',gift_list[i].image);
            i++;
        })
    }
    var saleoffpass = "";
    var saleoffmessage = "";
    var gift_revice="";
    var userpoint = 0;
    var roll_check = true;
    var num_loop = 4;
    var angle_gift = '';
    var num_gift = '{{count($result->group->items)}}';
    var gift_detail = '';
    var gift_list = '';
    var num_roll_remain = 0;
    var angles = 0;
    var free_wheel = 0;
    var arrDiscount = '';
    //Click nút lật
    $('body').delegate('.img_remove', 'click', function(){
        $('.boxflip .flip-box-front').removeClass('img_remove');
        $('.boxflip .flip-box-front').removeClass('active');
        $('.boxflip .flip-box-front').addClass('noactive');
        saleoffpass = $("#saleoffpass").val();
        $(this).removeClass('noactive');
        $(this).addClass('active');
        if(roll_check){
            roll_check = false;
            numrolllop = $("#numrolllop").val();
            $.ajax({
                url: '/minigame-play',
                datatype:'json',
                data:{
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: $('#group_id').val(),
                    numrollbyorder: numrollbyorder,
                    typeRoll : $('#type_play').val(),
                    saleoffpass:saleoffpass,
                    numrolllop:numrolllop,
                },
                type: 'post',
                success: function (data) {
                    gift_detail = data.gift_detail;
                    setTimeout(function(){
                        if(gift_detail != undefined){
                            $('.boxflip .active').attr('src',gift_detail.image);
                            $('.boxflip .active').css({'transform': 'rotateY(180deg)'});
                            $('.boxflip .active').prev().addClass('transparent');
                            $('.boxflip .active').parent().css({'transform': 'rotateY(180deg)'});
                        }
                        $('.boxflip .flip-box-front').prev().removeClass('transparent');
                        $('.boxflip .flip-box-front').removeClass('active');
                    },1000);
                    if (data.status == 4) {
                        location.href='/login';
                    } else if (data.status == 3) {
                        roll_check = true;
                        $('#naptheModal').modal('show');
                        return;
                    } else if (data.status == 0) {
                        roll_check = true;
                        $("#btnWithdraw").hide();
                        $('#noticeModal .content-popup').text(data.msg);
                        $('#noticeModal').modal('show');
                        $('.num-play-try').show();
                        $('.play').show();
                        //$('.continue').show();
                        // if($('#type_play').val() == "real")
                        // {
                        //     $('.continue').html("Chơi tiếp");
                        // }
                        // else
                        // {
                        //     $('.continue').html("Chơi thử tiếp");
                        // }
                        return;
                    }
                    numrollbyorder = parseInt(data.numrollbyorder) + 1;
                    free_wheel = data.free_wheel;
                    //arrDiscount = data.arrDiscount;
                    gift_list = data.listgift;
                    gift_list = shuffle(gift_list);
                    gift_revice = data.arr_gift;
                    arrxgt = data.xgt;
                    if (data.xgt > 0) {
                        xvalue = data.xgt[data.xgt.length - 1];
                    } else {
                        xvalue = 0;
                    }
                    value_gif_bonus = data.value_gif_bonus;
                    msg_random_bonus = data.msg_random_bonus;
                    xvalueaDD = data.xValue;
                    free_wheel = data.free_wheel;
                    num_roll_remain = gift_detail.num_roll_remain;

                    if($('#type_play').val()=='real'){
                        userpoint = data.userpoint;
                        if(userpoint<100){
                            $(".item_spin_progress_bubble").css("width", userpoint + "%")
                        }else{
                            $(".item_spin_progress_bubble").css("width", "100%");
                            $(".item_spin_progress_bubble").addClass('clickgif');
                        }
                        $(".item_spin_progress_percent").html(userpoint + "/100 point");
                        $("#saleoffpass").val("");
                        //saleoffmessage = data.saleMessage;
                    }

                    setTimeout(function(){
                        var i=0;
                        $('.boxflip img.noactive').each(function(){
                            $(this).attr('src',gift_list[i].image);
                            $(this).css({'transform': 'rotateY(180deg)'});
                            $(this).prev().addClass('transparent');
                            $(this).parent().css({'transform': 'rotateY(180deg)'});
                            i++;
                        });
                    }, 1500);

                    $("#btnWithdraw").show();
                    if (gift_detail.winbox == 0) {
                        $("#btnWithdraw").hide();
                    } else {
                        if (gift_detail.gift_type == 0) {
                            $("#btnWithdraw").html("Rút " + $("#withdrawruby_" + gift_detail.game_type).val());
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
                        $strDiscountcode="";
                        // if(saleoffmessage.length > 0)
                        // {
                        //     $html += "<br/><span style='font-size: 14px;color: #f90707;font-style: italic;display: block;text-align: center;'>"+saleoffmessage+"</span><br/>";
                        // }

                        if($('#type_play').val() == "real")
                        {
                            if(gift_revice.length == 1)
                            {
                                // if(arrDiscount[0] != "")
                                // {
                                //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[0]+"</b></span>";
                                // }
                                $html += "<span>Kết quả: "+gift_revice[0]["title"]+"</span><br/>";
                                if(gift_detail.winbox == 1){
                                    $html += "<span>Mua X1: Nhận được "+gift_gift_revice[$i]['parrent'].title+"</span><br/>";
                                    //$html += "<span>Lật được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>"+$strDiscountcode;
                                    $html += "<span>Tổng cộng: "+parseInt(gift_revice[0]["parrent"].params.value)*(parseInt(xvalueaDD[0]))+"</span>";
                                }
                            }
                            else
                            {
                                $totalRevice = 0;
                                $html += "<span>Kết quả: Nhận "+gift_revice.length+" phần thưởng cho "+gift_revice.length+" lượt lật.</span><br/>";
                                $html += "<span><b>Mua X"+gift_revice.length+":</b></span><br/>";
                                for($i=0;$i<gift_revice.length;$i++)
                                {
                                    // if(arrDiscount[$i] != "")
                                    // {
                                    //     $strDiscountcode="<span>Bạn nhận được 1 mã giảm giá khuyến mãi đi kèm: <b>"+arrDiscount[$i]+"</b></span>";
                                    // }
                                    $html += "<span>Lần lật "+($i + 1)+": "+gift_revice[$i]["title"];
                                    if(gift_revice[$i].winbox == 1){
                                        $html +=" - nhận được: "+gift_revice[$i]['parrent'].title+" X"+(parseInt(xvalueaDD[$i]))+" = "+parseInt(gift_revice[$i]['parrent'].title)*(parseInt(xvalueaDD[$i]))+""+msg_random_bonus[$i]+"</span><br/>"+$strDiscountcode+"<br/>";
                                    }
                                    else
                                    {
                                        $html +=""+msg_random_bonus[$i]+"<br/>"+$strDiscountcode+"<br/>";
                                    }
                                    $totalRevice +=  parseInt(gift_revice[$i]['parrent'].params.value)*(parseInt(xvalueaDD[$i]))+ parseInt(value_gif_bonus[$i]);
                                }

                                $html += "<span><b>Tổng cộng: "+$totalRevice+"</b></span>";
                            }
                        }
                        else
                        {
                            $("#btnWithdraw").hide();
                            if(gift_revice.length == 1)
                            {
                                $html += "<span>Kết quả chơi thử: "+gift_revice[0]["title"]+"</span><br/>";
                                if(gift_detail.winbox == 1){
                                    $html += "<span>Mua X1: Nhận được "+gift_revice[0]["parrent"].params.value+"</span><br/>";
                                    //$html += "<span>Lật được "+(xvalue+3)+" hình trùng nhau. Nhận X"+(xvalueaDD[0])+" giải thưởng: "+gift_revice[0]["parrent"].params.value*(xvalueaDD[0])+""+msg_random_bonus[0]+"</span><br/>";
                                    $html += "<span>Tổng cộng: "+parseInt(gift_revice[0]["parrent"].params.value)*(parseInt(xvalueaDD[0]))+"</span>";
                                }
                            }
                            else
                            {
                                $totalRevice = 0;
                                $html += "<span>Kết quả chơi thử: Nhận "+gift_revice.length+" phần thưởng cho "+gift_revice.length+" lượt lật.</span><br/>";
                                $html += "<span><b>Mua X"+gift_revice.length+":</b></span><br/>";
                                for($i=0;$i<gift_revice.length;$i++)
                                {
                                    $html += "<span>Lần lật "+($i + 1)+": "+gift_revice[$i]["title"];
                                    if(gift_revice[$i].winbox == 1){
                                        $html +=" - nhận được: "+gift_revice[$i]['parrent'].title+" X"+(parseInt(xvalueaDD[$i]))+" = "+parseInt(gift_revice[$i]['parrent'].title)*(parseInt(xvalueaDD[$i]))+""+msg_random_bonus[$i]+"</span><br/>";
                                    }
                                    else
                                    {
                                        $html +=""+msg_random_bonus[$i]+"<br/>";
                                    }
                                    $totalRevice +=  parseInt(gift_revice[$i]['parrent'].params.value)*(parseInt(xvalueaDD[$i]))+ parseInt(value_gif_bonus[$i]);
                                }

                                $html += "<span><b>Tổng cộng: "+$totalRevice+"</b></span>";
                            }
                        }
                    }

                    $('#noticeModal .content-popup').html($html);
                    if (userpoint > 99) {
                        getgifbonus();
                    }
                    setTimeout(function(){
                        $('#noticeModal').modal('show');
                        //$('.continue').show();
                        $('.num-play-try').show();
                        $('.play').show();
                        // if($('#type_play').val() == "real")
                        // {
                        //     $('.continue').html("Chơi tiếp");
                        // }
                        // else
                        // {
                        //     $('.continue').html("Chơi thử tiếp");
                        // }
                    },2500);
                },
                error: function(){
                    $('#noticeModal .content-popup').text('Có lỗi xảy ra. Vui lòng thử lại!');
                    $('#noticeModal').modal('show');
                    roll_check = true;
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
                $('#noticeModal .content-popup').append(data.msg + " - " + data.arr_gift[0].title);
                //$("#noticeModalNoHu #btnWithdraw").hide();
                $('#noticeModal').modal('show');
                var userpoint = data.userpoint;
                if(userpoint<100){
                    $(".item_spin_progress_bubble").css("width", data.userpoint + "%");
                    $(".item_spin_progress_bubble").removeClass('clickgif');
                }else{
                    $(".item_spin_progress_bubble").css("width", "100%");
                    $(".item_spin_progress_bubble").addClass('clickgif');
                }
                $(".item_spin_progress_percent").html(data.userpoint + "/100 point");
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

    $('body').delegate('.reLoad','click',function(){
        location.reload();
    })

    function shuffle(array) {
        var currentIndex = array.length, temporaryValue, randomIndex;
        while (0 !== currentIndex) {
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }
        return array;
    }

    // $('.continue').click(function(){
    //     $('.boxflip').html(document.getElementById('boxfliphide').innerHTML);
    //     $('.continue').hide();
    //     $('.play').hide();
    //     $('.num-play-try').hide();
    //     roll_check = true;
    // });
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
var numrollbyorder = 0;
document.addEventListener('touchmove', function (event) {
    if (event.scale !== 1) { event.preventDefault(); }
}, false);
var lastTouchEnd = 0;
document.addEventListener('touchend', function (event) {
    var now = (new Date()).getTime();
    if (now - lastTouchEnd <= 300) {
        event.preventDefault();
    }
    lastTouchEnd = now;
}, false);
