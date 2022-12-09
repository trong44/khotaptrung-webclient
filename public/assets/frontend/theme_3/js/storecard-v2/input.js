// only allow numeric input
$('input[numberic]').on('keypress', function (e) {
    if (isNaN(this.value + String.fromCharCode(e.keyCode))) return false;
});
// Tăng giảm số lượng mua thẻ
$('body').delegate('input.input--amount','input',function () {
    if ($(this).val() > 20){
        $(this).val(20);
    }
})

$(document).on('click','.js-amount', function (e) {
    let input = $(this).parent().find('input.input--amount');
    let value = input.val();
    if ($(this).data('action') === 'add') {
        input.val(++value);
    }
    if ($(this).data('action') === 'minus' && value > 1) {
        input.val(--value);
    }
    if (input.val() > 20) {
        input.val(20);
    }

    $('input[name=card-quantity]').trigger(jQuery.Event('keypress', { keyCode: 13 }));
});

//format number
function number_format(number) {
    let data = number.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
    return data.split('').reverse().join('').replace(/^[\.]/, '');
}

// format number to K
function kFormatter(num) {
    return Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000).toFixed(1)) + 'k' : Math.sign(num)*Math.abs(num);
}

function pad(d) {
    return (d < 10) ? '0' + d.toString() : d.toString();
}
