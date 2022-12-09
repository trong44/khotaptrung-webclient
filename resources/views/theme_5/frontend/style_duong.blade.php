<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/{{env('THEME_VERSION')}}/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/frontend/theme_5/css/main.css">
    <link rel="stylesheet" href="/assets/frontend/theme_5/css/duong/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
</head>
<body>


<h1>Status</h1>
<div class="status-tag white">Tag content</div>
<div class="status-tag success">Tag content</div>
<div class="status-tag danger">Tag content</div>
<div class="status-tag yellow">Tag content</div>
<div class="status-tag red">Tag content</div>
<div class="status-tag blue">Tag content</div>
<div class="status-tag gray">Tag content</div>
<br>
<div class="status-tag sd-white">Tag content</div>
<div class="status-tag sd-success">Tag content</div>
<div class="status-tag sd-danger">Tag content</div>
<div class="status-tag sd-yellow">Tag content</div>
<div class="status-tag sd-red">Tag content</div>
<div class="status-tag sd-blue">Tag content</div>
<div class="status-tag gray">Tag content</div>
<br>
<div class="status-tag outline-white">Tag content</div>
<div class="status-tag outline-success">Tag content</div>
<div class="status-tag outline-danger">Tag content</div>
<div class="status-tag outline-yellow">Tag content</div>
<div class="status-tag outline-red">Tag content</div>
<div class="status-tag outline-blue">Tag content</div>
<div class="status-tag outline-gray">Tag content</div>

<h1>Avatar</h1>
    <img class="avatar" src="{{asset('assets/frontend/theme_5/image/duong/avt.svg')}}" alt="">
    <img class="avatar" src="{{asset('assets/frontend/theme_5/image/duong/avt-01.svg')}}" alt="">
    <img class="avatar" src="{{asset('assets/frontend/theme_5/image/duong/avt-icon.svg')}}" alt="">
    <div class="avatar king"><img class="avatar-icon" src="{{asset('assets/frontend/theme_5/image/duong/avt-icon.svg')}}" alt=""></div>
<br>
    <img class="avatar avatar-sm" src="{{asset('assets/frontend/theme_5/image/duong/avt.svg')}}" alt="">
    <img class="avatar avatar-sm" src="{{asset('assets/frontend/theme_5/image/duong/avt-01.svg')}}" alt="">
    <img class="avatar avatar-sm" src="{{asset('assets/frontend/theme_5/image/duong/avt-icon.svg')}}" alt="">
    <div class="avatar avatar-sm king"><img class="avatar-icon" src="{{asset('assets/frontend/theme_5/image/duong/avt-icon.svg')}}" alt=""></div>
<br>
    <img class="avatar avatar-md" src="{{asset('assets/frontend/theme_5/image/duong/avt.svg')}}" alt="">
    <img class="avatar avatar-md" src="{{asset('assets/frontend/theme_5/image/duong/avt-01.svg')}}" alt="">
    <img class="avatar avatar-md" src="{{asset('assets/frontend/theme_5/image/duong/avt-icon.svg')}}" alt="">
    <div class="avatar avatar-md king"><img class="avatar-icon" src="{{asset('assets/frontend/theme_5/image/duong/avt-icon.svg')}}" alt=""></div>
<br>
    <img class="avatar avatar-lg" src="{{asset('assets/frontend/theme_5/image/duong/avt.svg')}}" alt="">
    <img class="avatar avatar-lg" src="{{asset('assets/frontend/theme_5/image/duong/avt-01.svg')}}" alt="">
    <img class="avatar avatar-lg" src="{{asset('assets/frontend/theme_5/image/duong/avt-icon.svg')}}" alt="">
    <div class="avatar avatar-lg king"><img class="avatar-icon" src="{{asset('assets/frontend/theme_5/image/duong/avt-icon.svg')}}" alt=""></div>


<h1> Quantity </h1>
<div class="quantity">
    <button type="button" class="quantity-min -minus js-amount" data-action="minus"></button>
    <input type="text" name="card-amount" class="quantity-number input--amount" value="01" numberic>
    <button type="button" class="quantity-max -add js-amount" data-action="add"></button>
</div>


<h1>Introduction</h1>

<button id="button">My button</button>
<br>
<button id="buttonRightStart">My button</button>
<br>
<button id="buttonRightEnd">My button</button>
<br>

<div style="margin-left: 110px">
<button id="buttonLeft">My button</button>
<br>
<button id="buttonLeftStart">My button</button>
<br>
<button id="buttonLeftEnd">My button</button>
<br>
</div>

<button  id="buttonBottom">button</button>
<button  id="buttonBottomStart">button</button>
<button  id="buttonBottomEnd">button</button>

<div style="margin-top: 48px">
    <button  id="buttonTop">button</button>
    <button  id="buttonTopStart">button</button>
    <button  id="buttonTopEnd">button</button>
</div>
<script>
    tippy('#button', {
        content: 'Tooltip',
        placement: 'right',
    });
    tippy('#buttonRightStart', {
        content: 'Tooltip',
        placement: 'right-start',
    });
    tippy('#buttonRightEnd', {
        content: 'Tooltip',
        placement: 'right-end',
    });

    tippy('#buttonLeft', {
        content: 'Tooltip',
        placement: 'left',
    });
    tippy('#buttonLeftStart', {
        content: 'Tooltip',
        placement: 'left-start',
    });
    tippy('#buttonLeftEnd', {
        content: 'Tooltip',
        placement: 'left-end',
    });

    tippy('#buttonBottom', {
        content: 'Tooltip',
        placement: 'bottom',
    });
    tippy('#buttonBottomStart', {
        content: 'Tooltip',
        placement: 'bottom-start',
    });
    tippy('#buttonBottomEnd', {
        content: 'Tooltip',
        placement: 'bottom-end',
    });

    tippy('#buttonTop', {
        content: 'Tooltip',
        placement: 'top',
    });
    tippy('#buttonTopStart', {
        content: 'Tooltip',
        placement: 'top-start',
    });
    tippy('#buttonTopEnd', {
        content: 'Tooltip',
        placement: 'top-end',
    });

</script>

<h1>Slider button</h1>
<div class="slider-button-hover">
    <img src="{{asset('assets/frontend/theme_5/image/duong/left-arrow.svg')}}" alt="">
</div>
<br>
<div class="slider-button-hover slider-button-default">
    <img src="{{asset('assets/frontend/theme_5/image/duong/left-arrow.svg')}}" alt="">
</div>
<br>
<div class="slider-button-hover slider-button">
    <img src="{{asset('assets/frontend/theme_5/image/duong/right-arrow.svg')}}" alt="">
</div>
<br>
<div class="slider-button-hover slider-button slider-button-default">
    <img src="{{asset('assets/frontend/theme_5/image/duong/right-arrow.svg')}}" alt="">
</div>
</body>
</html>
<script src="{{asset('assets/frontend/theme_5/js/js_duong/style.js')}}"></script>
