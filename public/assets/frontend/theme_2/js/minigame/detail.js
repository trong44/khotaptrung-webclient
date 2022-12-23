$(document).ready(function () {

    var module = $('.module').val();
    var id_group = $('.id_group').val();
    var slug = $('.slug').val();

    getShowMinigameDetail(id_group,module,slug)

    function getShowMinigameDetail(id_group,module,slug) {

        var url = '/minigame-' + slug + '';
        request = $.ajax({
            type: 'GET',
            url: url,
            data: {
                id_group:id_group,
                module:module,
            },
            beforeSend: function (xhr) {

            },
            success: (data) => {

                if (data.status == 1) {

                    $('.data_minigame_detail').html('');
                    $('.data_minigame_detail').html(data.data);

                } else if (data.status == 0) {

                    var html = '';
                    html += '<div class="row pb-3 pt-3"><div class="col-md-12 text-center"><span style="color: red;font-size: 16px;">' + data.message + '</span></div></div>';

                    $('.data_minigame_detail').html('');
                    $('.data_minigame_detail').html(html);

                }

                $('.rotation-content_minigame').removeClass('is-load')
                $('.rotation-content_minigame').find('.loading-wrap').remove();

            },
            error: function (data) {

            },
            complete: function (data) {

                $('select').niceSelect();

                let openSheetButton = $(".open-sheet");
                let sheet = $(document);
                let sheetContents = $(document);
                let draggableArea = $(document);
                let sheetHeight;
                function setSheet(selector) {
                    sheet = $(selector);
                    sheetContents = sheet.find(".content-bottom-sheet");
                    draggableArea = sheet.find(".bar-slide .sheet-header");
                }
                function setSheetHeight(value) {
                    sheetHeight = Math.max(0, Math.min(100, value));
                    sheetContents.css('height',`${sheetHeight}vh`);
                }
                /*Set trạng thái của sheet */
                function setIsSheetShown(value) {
                    $('body').toggleClass('overflow-hidden', value);
                    sheet.attr("aria-hidden", String(!value));
                }
                function closeSheet() {
                    setSheetHeight(10);
                    setTimeout(function () {
                        setIsSheetShown(false);
                        sheet.hide();
                    },200);
                }
                /*Mở sheet khi bấm vào nút '.open-sheet' , chỉ mở khi trên mobile*/
                if (width < 992){
                    openSheetButton.on("click", function (e){
                        /*Chặn tất cả sự kiện lại nhỡ click là thẻ 'a' hay là mở modal*/
                        e.preventDefault();
                        e.stopPropagation();
                        sheet.show();

                        /*Nếu là có cùng modal trên nút bấm thì lấy data-target_2 làm target để show sheet lên*/
                        if ($(this).attr('data-toggle') && $(this).data('toggle') === 'modal') {
                            setSheet($(this).data('target_2'));
                        }
                        else {
                            setSheet($(this).data('target'));
                        }
                        setSheetHeight(sheet.data('height') * 1);
                        setIsSheetShown(true);
                        draggableArea.on("mousedown", onDragStart);
                        draggableArea.on("touchstart", onDragStart);
                    });
                }
                /*Ẩn sheet khi click vào nút 'close'*/
                /* Ẩn sheet khi bấm vào lớp nền mờ*/
                sheet.find(".close,.layer").on("click", function (){
                    closeSheet()
                });

                const touchPosition = (event) => event.touches ? event.touches[0] : event;

                let dragPosition;

                function onDragStart(event) {
                    dragPosition = touchPosition(event).pageY
                    sheetContents.addClass("not-selectable")
                    draggableArea.css('cursor','grabbing');
                    document.body.style.cursor = "grabbing";
                }

                function onDragMove(event) {
                    if (dragPosition === undefined) return

                    const y = touchPosition(event).pageY;
                    const deltaY = dragPosition - y;
                    const deltaHeight = deltaY / window.innerHeight * 100;

                    setSheetHeight(sheetHeight + deltaHeight);
                    dragPosition = y;
                }

                function onDragEnd () {
                    dragPosition = undefined;
                    sheetContents.removeClass("not-selectable");
                    draggableArea.css('cursor','');
                    document.body.style.cursor = "";

                    if (sheetHeight < 25) {
                        setIsSheetShown(false);
                        sheet.hide();
                    }
                    else {
                        setSheetHeight(Math.ceil(sheetHeight/5)*5);
                    }
                }

                window.addEventListener("mousemove", onDragMove);
                window.addEventListener("touchmove", onDragMove);

                window.addEventListener("mouseup", onDragEnd);
                window.addEventListener("touchend", onDragEnd);

            }
        });
    }
})
