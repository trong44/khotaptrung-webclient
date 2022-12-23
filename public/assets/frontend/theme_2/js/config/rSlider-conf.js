/*Config on modal*/
let input = $('.rSlider-input');
if (input.length){

    let modal_sort_price;
    let config_sort_price = {
        values: {min:5000,max:50000},
        step:1000,
        range: true,
        tooltip: true,
        scale: false,
        labels: false,
        disabled:false,
        set:[10000,20000],
    }
    config_sort_price.target = '#sort-by-price-mobile';
    modal_sort_price =  new rSlider(config_sort_price);
    $('.modal').on('shown.bs.modal',function () {
        if ($('.sort-by-price').length){
            if (modal_sort_price){
                modal_sort_price.destroy();
            }
            config_sort_price.target = '#sort-by-price'
            modal_sort_price =  new rSlider(config_sort_price);
        }
    });
}

