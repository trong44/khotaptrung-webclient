$(document).ready(function () {

    let width = $(document).width();
    if ( width <= 480 ) {
        $('#addBankAccount').text('Thêm NH/Ví ĐT');
        $('#addAccountModal .form-change-button').first().text('TK ngân hàng')
    }  

    $('#bankAccountSelect').niceSelect();
    $('#withdrawMoneyFilter #transactionTypeInput').niceSelect();
    $('#withdrawMoneyFilter #transactionStatusInput').niceSelect();
    $('#accountBankDropdown').niceSelect();
    $('#walletBankDropdown').niceSelect();

    $('#withdrawMoneyFilter #filterEndDate').datetimepicker({
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
            $('#withdrawMoneyFilter #filterStartDate').data("DateTimePicker").maxDate(selected.date);
            $('#withdrawMoneyFilter #filterStartDate').data("DateTimePicker").disabledDates([selected.date]);
        }
    });

    $('#withdrawMoneyFilter #filterStartDate').datetimepicker({
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
            $('#withdrawMoneyFilter #filterEndDate').data("DateTimePicker").minDate(selected.date);
            $('#withdrawMoneyFilter #filterEndDate').data("DateTimePicker").maxDate(moment().add(1, 'days'));
            $('#withdrawMoneyFilter #filterEndDate').data("DateTimePicker").disabledDates([selected.date, moment().add(1, 'days')]);
        }
    });

    //Reset form
    $('#withdrawMoneyFilter #resetFormBtn').click(() => {
        $('#withdrawMoneyFilter #filterForm').trigger('reset');

        $('#withdrawMoneyFilter #transactionTypeInput').niceSelect('update');
        $('#withdrawMoneyFilter #transactionStatusInput').niceSelect('update');
        $('#withdrawMoneyFilter #filterStartDate').data("DateTimePicker").clear();
        $('#withdrawMoneyFilter #filterEndDate').data("DateTimePicker").clear();
        $('#withdrawMoneyFilter #filterEndDate').data("DateTimePicker").maxDate(moment().add(1, 'days'));
        $('#withdrawMoneyFilter #filterEndDate').data("DateTimePicker").disabledDates([moment().add(1, 'days')]);
        $('#withdrawMoneyFilter #filterEndDate').data("DateTimePicker").minDate(false);
        $('#withdrawMoneyFilter #filterStartDate').data("DateTimePicker").maxDate(moment());
        $('#withdrawMoneyFilter #filterStartDate').data("DateTimePicker").disabledDates([moment()]);
    });

    setActiveTable();

    function setActiveTable() {
        let width = $('#withdrawMoney .listed-type').first().parent().width();
        $('#withdrawMoney .listed-type').first().addClass('listed-type-active');
        $('#withdrawMoney .type-listing').css('transform', `translate3d(0%, 0px, 0px)` );
        $('#withdrawMoney .type-listing').css('width', `${width}px` );
    }

    //Change leaderboard table
    $('#withdrawMoney .listed-type').click( function (e) {
        if ($(this).hasClass('listed-type-active')) {
            return false;
        }
        var index = $('#withdrawMoney .listed-type').index(this);
        if ( index == 0 ) {
            $('#withdrawMoney .history-tab-container').css('display', 'none');
            $('#withdrawMoney .withdraw-tab-container').css('display', 'block');
        }
        if ( index == 1 ) {
            $('#withdrawMoney .withdraw-tab-container').css('display', 'none');
            $('#withdrawMoney .history-tab-container').css('display', 'block');
        }
        $('#withdrawMoney .listed-type').removeClass('listed-type-active');
        $(this).addClass('listed-type-active');
        $('#withdrawMoney .type-listing').css('transform', `translate3d(${index * 100}%, 0px, 0px)` );
        $('#withdrawMoney .type-listing').css('width', `${$(this).parent().width()}px` );
    });

    var executed = false;

    function setActiveForm() {
        if (executed) {
            return false;
        }
        let width = $('#addAccountModal .form-change-button').first().parent().width();
        $('#addAccountModal .form-change-button').first().addClass('form-change-button-active');
        $('#addAccountModal .form-listing').css('transform', `translate3d(0%, 0px, 0px)` );
        $('#addAccountModal .form-listing').css('width', `${width}px` );
        executed = true;
    }

    //Change form add account
    $('#addAccountModal .form-change-button').click( function (e) {
        if ($(this).hasClass('form-change-button-active')) {
            return false;
        }
        var index = $('#addAccountModal .form-change-button').index(this);
        if ( index == 0 ) {
            $('#addAccountModal #walletAccountForm').css('display', 'none');
            $('#addAccountModal #bankAccountForm').css('display', 'block');
        }
        if ( index == 1 ) {
            $('#addAccountModal #bankAccountForm').css('display', 'none');
            $('#addAccountModal #walletAccountForm').css('display', 'block');
        }
        $('#addAccountModal .form-change-button').removeClass('form-change-button-active');
        $(this).addClass('form-change-button-active');
        $('#addAccountModal .form-listing').css('transform', `translate3d(${index * 100}%, 0px, 0px)` );
        $('#addAccountModal .form-listing').css('width', `${$(this).parent().width()}px` );
    });

    //Onclick filter modal show
    $('#withdrawMoney #addBankAccount').click(() => {
        $('#addAccountModal').modal('show');
        setTimeout(() => {
            setActiveForm();
        }, 300);
    })

    $('#withdrawMoney .history-filter').click(() => {
        $('#withdrawMoneyFilter').modal('show');
    });

    $('#withdrawMoneyButton').click(() => {
        $('#withdrawResult').modal('show');
    });

    //Manage filter
    var filterCount = 0;
    var formData = {};
    
    $('#withdrawMoneyFilter #filterForm').submit(function (e) { 
        e.preventDefault();
        //Filter item html
        filterCount = 0;
        let html = '';

        //Get data of each input in form and append into the formData object => if null then remove the null property
        let transaction_type = $('#withdrawMoneyFilter #transactionTypeInput').val();
        let transaction_status = $('#withdrawMoneyFilter #transactionStatusInput').val();
        let start_date = $('#withdrawMoneyFilter #filterStartDate').val();
        let end_date = $('#withdrawMoneyFilter #filterEndDate').val();

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
        $('#withdrawMoney .current-filter').empty();
        $('#withdrawMoney .current-filter').append(html);
        
        //Check filter count and update count text
        $('#withdrawMoney .filter-count').text(filterCount);
        if (filterCount > 0) {
            $('#withdrawMoney .filter-count').css('display', 'block');
        } else {
            $('#withdrawMoney .filter-count').css('display', 'none');
        }
        $('#withdrawMoneyFilter').modal('hide');
    });

    //Action when click on delete button in filter-activated
    $(document).on('click', '#withdrawMoney .filter-activated-img', (event) => {
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
            $('#withdrawMoney .filter-count').css('display', 'block');
        } else {
            $('#withdrawMoney .filter-count').css('display', 'none');
        }
    });
});