
let input_currency = $('input[currency]');

input_currency.on('input', function (e) {

    let val = this.value;
    val = val.replace(/\./g, "");
    let newVal = val.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
    newVal = newVal.split('').reverse().join('').replace(/^[\.]/, '');
    this.value = newVal;
});
