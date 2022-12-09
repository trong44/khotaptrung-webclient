$(document).ready(function () {
    setActiveTable();

    $('#game_type').niceSelect();
    $('#package').niceSelect();
    $('#transactionTypeInput').niceSelect();
    $('#transactionStatusInput').niceSelect();

    $('#filterEndDate').datetimepicker({
        format: 'DD-MM-YYYY',
        useCurrent: false,
        icons:
            { time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                language: 'vi',
                clear: 'fas fa-trash',
                close: 'far fa-times' },
        maxDate: moment().add(1, 'days'),
        disabledDates: [
            moment().add(1, 'days')
        ],
    })
    .on('dp.change', function (selected) {
        if (selected.date) {
            $('#filterStartDate').data("DateTimePicker").maxDate(selected.date);
            $('#filterStartDate').data("DateTimePicker").disabledDates([selected.date]);
        }
    });
    $('#filterStartDate').datetimepicker({
        format: 'DD-MM-YYYY',
        useCurrent: false,
        icons:
            { time: 'fas fa-clock',
                date: 'fas fa-calendar',
                up: 'fas fa-arrow-up',
                down: 'fas fa-arrow-down',
                previous: 'fas fa-arrow-circle-left',
                next: 'fas fa-arrow-circle-right',
                today: 'far fa-calendar-check-o',
                language: 'vi',
                clear: 'fas fa-trash',
                close: 'far fa-times' },
        maxDate: moment(),
        disabledDates: [
            moment()
        ],

    })
    .on('dp.change', function (selected) {
        if (selected.date) {
            $('#filterEndDate').data("DateTimePicker").minDate(selected.date);
            $('#filterEndDate').data("DateTimePicker").maxDate(moment().add(1, 'days'));
            $('#filterEndDate').data("DateTimePicker").disabledDates([selected.date, moment().add(1, 'days')]);
        }
    });

    function setActiveTable() {
        let width = $('.listed-type').first().parent().width();
        $('.listed-type').first().addClass('listed-type-active');
        $('.type-listing').css('transform', `translate3d(0%, 0px, 0px)` );
        $('.type-listing').css('width', `${width}px` );
    }

    //Change leaderboard table
    $('.listed-type').click( function (e) {
        if ($(this).hasClass('listed-type-active')) {
            return false;
        }
        var index = $('.listed-type').index(this);
        if ( index == 0 ) {
            $('.history-tab-container').css('display', 'none');
            $('.withdraw-tab-container').css('display', 'block');
        }
        if ( index == 1 ) {
            $('.withdraw-tab-container').css('display', 'none');
            $('.history-tab-container').css('display', 'block');
        }
        $('.listed-type').removeClass('listed-type-active');
        $(this).addClass('listed-type-active');
        $('.type-listing').css('transform', `translate3d(${index * 100}%, 0px, 0px)` );
        $('.type-listing').css('width', `${$(this).parent().width()}px` );
    });

    //Hide and show password
    $('.withdraw-password-show').click(function(e) {
        let inputPassword = $(this).parent().find('input');
        let eyeHide = $(this).parent().find('.withdraw-password-hide');
        $(this).css('display','none');
        eyeHide.css('display','block');
        $(inputPassword).attr('type', 'text');
    });

    $('.withdraw-password-hide').click(function(e) {
        let inputPassword = $(this).parent().find('input');
        let eyeShow = $(this).parent().find('.withdraw-password-show');
        $(this).css('display','none');
        eyeShow.css('display','block');
        $(inputPassword).attr('type', 'password');
    });

    //End js hide show

    //Onclick filter modal show
    $('.history-filter').click(() => {
        $('#withdrawItemFilter').modal('show');
    });

    $('#withdrawItemButton').click(() => {
        $('#withdrawResult').modal('show');
    });

    //Manage filter
    var filterCount = 0;
    var formData = {};

    $('#filterForm').submit(function (e) {
        e.preventDefault();
        //Filter item html
        filterCount = 0;
        let html = '';
        //Get data of each input in form and append into the formData object => if null then remove the null property
        let transaction_type = $('#transactionTypeInput').val();
        let transaction_status = $('#transactionStatusInput').val();
        let start_date = $('#filterStartDate').val();
        let end_date = $('#filterEndDate').val();

        if (transaction_type) {
            filterCount++ ;
            let innerText = $('.transaction-type-dropdown .option.selected').text();
            formData = {...formData, transaction_type: transaction_type };
            html += '<div class="filter-activated" data-key="transaction_type">' +
                        '<span>' +
                            innerText +
                        '</span>' +
                        '<img class="filter-activated-img" src="assets/theme_3/image/images_1/close.png" alt="">' +
                    '</div>';
        } else {
            delete formData['transaction_type'];
        }

        if (transaction_status) {
            filterCount++ ;
            let innerText = $('.transaction-status-dropdown .option.selected').text();
            formData = {...formData, transaction_status: transaction_status };
            html += '<div class="filter-activated" data-key="transaction_status">' +
                        '<span>' +
                            innerText +
                        '</span>' +
                        '<img class="filter-activated-img" src="assets/theme_3/image/images_1/close.png" alt="">' +
                    '</div>';
        } else {
            delete formData['transaction_status'];
        }

        if (start_date) {
            formData = {...formData, start_date: start_date };
        } else {
            delete formData['start_date'];
        }

        if (end_date) {
            formData = {...formData, end_date: end_date }
        } else {
            delete formData['end_date'];
        }

        if (end_date && start_date) {
            filterCount++ ;
            let innerText = start_date + ' - ' + end_date;
            html += '<div class="filter-activated" data-key="transaction_date">' +
                        '<span>' +
                            innerText +
                        '</span>' +
                        '<img class="filter-activated-img" src="assets/theme_3/image/images_1/close.png" alt="">' +
                    '</div>';
        } else if ( end_date && !start_date ) {
            filterCount++ ;
            let innerText = 'Trước ' + end_date;
            html += '<div class="filter-activated" data-key="transaction_date">' +
                        '<span>' +
                            innerText +
                        '</span>' +
                        '<img class="filter-activated-img" src="assets/theme_3/image/images_1/close.png" alt="">' +
                    '</div>';
        } else if ( !end_date && start_date ) {
            filterCount++ ;
            let innerText = 'Sau ' + start_date;
            html += '<div class="filter-activated" data-key="transaction_date">' +
                        '<span>' +
                            innerText +
                        '</span>' +
                        '<img class="filter-activated-img" src="assets/theme_3/image/images_1/close.png" alt="">' +
                    '</div>';
        }

        //Empty current than add new html
        $('.current-filter').empty();
        $('.current-filter').append(html);

        //Check filter count and update count text
        $('.filter-count').text(filterCount);
        if (filterCount > 0) {
            $('.filter-count').css('display', 'block');
        } else {
            $('.filter-count').css('display', 'none');
        }
        $('#withdrawItemFilter').modal('hide');
    });

    //Reset form
    $('#resetFormBtn').click(() => {
        $('#filterForm').trigger('reset');

        $('#transactionTypeInput').niceSelect('update');
        $('#transactionStatusInput').niceSelect('update');
        $('#filterStartDate').data("DateTimePicker").clear();
        $('#filterEndDate').data("DateTimePicker").clear();
        $('#filterEndDate').data("DateTimePicker").maxDate(moment().add(1, 'days'));
        $('#filterEndDate').data("DateTimePicker").disabledDates([moment().add(1, 'days')]);
        $('#filterEndDate').data("DateTimePicker").minDate(false);
        $('#filterStartDate').data("DateTimePicker").maxDate(moment());
        $('#filterStartDate').data("DateTimePicker").disabledDates([moment()]);
    });

    //Action when click on delete button in filter-activated
    $(document).on('click', '.filter-activated-img', (event) => {
        let deleteButton = event.target;
        let filterElement = $(deleteButton).parent();
        let key = filterElement.data('key');
        if ( key == 'transaction_date' ) {
            delete formData['start_date'];
            delete formData['end_date'];
        } else {
            delete formData[key];
        }
        $(filterElement).remove();

        //Check filter count and update count text
        filterCount-- ;
        $('.filter-count').text(filterCount);
        if (filterCount > 0) {
            $('.filter-count').css('display', 'block');
        } else {
            $('.filter-count').css('display', 'none');
        }
    });
});
