
@if(isset(theme('')->theme_config->sys_background_image))
    @if(isset(theme('')->theme_config->sys_background_image) == 'sys_background_image_ver1')
        <style>
            .main-lay-out{
                background:{{setting('sys_theme_background_color')}} url({{setting('sys_theme_background_image')}});
                background-attachment: fixed;
                background-size: 100%;
                padding-bottom: 40px;
            }
        </style>
    @else
        <style>
            .main-lay-out{
                background:{{setting('sys_theme_background_color')}};
                background-attachment: fixed;
                background-size: 100%;
                padding-bottom: 40px;
            }
        </style>
    @endif
@else
    <style>
        .main-lay-out{
            background:#000 url(/assets/frontend/{{theme('')->theme_key}}/images/background_image.jpg);
            background-attachment: fixed;
            background-size: 100%;
            padding-bottom: 40px;
        }
    </style>
@endif


{{--màu nền --}}
@if(setting('sys_theme_color_primary'))
    <style>
        :root {
            --primary-color: {{setting('sys_theme_color_primary')}};
        }
        @media screen and (max-width: 992px){
            .menu-bottom-item.is-active .menu-bottom_text {
                color: {{setting('sys_theme_color_primary')}};
            }
        }

    </style>


@endif
@if(setting('sys_theme_color_hover'))
    <style>
        :root {
            --primary-hover-color: {{setting('sys_theme_color_hover')}};
        }
        .nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus {
            background-color: {{setting('sys_theme_color_hover')}};

        }
    </style>


@endif

@if(setting('sys_theme_color_text_item'))
    <style>
        :root {
            --text-title-color: {{setting('sys_theme_color_text_item')}};
        }
    </style>


@endif

@if(setting('sys_theme_background_color'))
    <style>
        header nav.heading {
            background-color: {{setting('sys_theme_background_color')}};

        }
        body{
            background-color: {{setting('sys_theme_background_color')}};
        }
        .menu-list .menu-category {
            background-color: {{setting('sys_theme_background_color')}};
        }
        .menu-category li {

            background: {{setting('sys_theme_background_color')}};
        }

        .background-history {
            background: {{setting('sys_theme_background_color')}};
        }
        @media screen and (max-width: 992px){
            #menu-bottom-tabs.tabs {

                background: {{setting('sys_theme_background_color')}};

            }
        }
        .loading-child {

            background-color: {{setting('sys_theme_background_color')}};

        }

    </style>


@endif

@if(setting('sys_theme_color_disable'))
    <style>
        :root{
            --input-disable-color: {{setting('sys_theme_color_disable')}};
        }
        .card {
            border: 1px solid {{setting('sys_theme_color_disable')}};
            box-shadow: var(--box-shadow-default);
            background-color: {{setting('sys_theme_color_disable')}};
        }
        .block-item {
            background: {{setting('sys_theme_color_disable')}};

        }
        .recharge-money-container {
            border: 1px solid {{setting('sys_theme_color_disable')}};
            background-color: {{setting('sys_theme_color_disable')}};

        }
        .money-radio-form label {
            background-color: {{setting('sys_theme_color_disable')}};
{{--            border-color: {{setting('sys_theme_color_disable')}};--}}
        }
        .nice-select{
            background-color: {{setting('sys_theme_color_disable')}};
        }
        input[type=text], input[type=password], textarea, select {

            background:  {{setting('sys_theme_color_disable')}};

        }
        .js-quantity {

            background-color:  {{setting('sys_theme_color_disable')}};

        }
        .item-about-us {
            background: {{setting('sys_theme_color_disable')}};

        }

        /*mua acc*/
        .value-sort .selection {

            background-color:{{setting('sys_theme_color_disable')}};

        }

        .sidebar-section {
            background: {{setting('sys_theme_color_disable')}};

        }

        /*account*/
        .history-detail-title, .history-detail-content {
            background-color:{{setting('sys_theme_color_disable')}};
        }
        .history-detail-title, .g_history-detail-content {
            background-color: {{setting('sys_theme_color_disable')}};
        }
        .card-header:first-child {
            background-color:  {{setting('sys_theme_color_disable')}};

        }
        .c-history-right-body {
            background: {{setting('sys_theme_color_disable')}};
        }

        @media screen and (max-width: 992px){
            .news-item {

                background: {{setting('sys_theme_color_disable')}};

            }
        }
        .modal-content {
            background-color: {{setting('sys_theme_color_disable')}} !important;
        }
        .modal-login-container {
            background-color: {{setting('sys_theme_color_disable')}} !important;

        }
        .modal-login-form {
            background-color: {{setting('sys_theme_color_disable')}} !important;

        }
        .rotation-comment-block{
            background-color: {{setting('sys_theme_color_disable')}} !important;

        }
        .rotation-comment {
            background-color: {{setting('sys_theme_color_disable')}};

        }
        .rotation-detail {
            background-color: {{setting('sys_theme_color_disable')}};
        }
        .rotation-leaderboard {

            background: {{setting('sys_theme_color_disable')}};

        }
        .leaderboard-table {
            background: {{setting('sys_theme_color_disable')}};

        }
        .leaderboard-item:nth-child(odd) {
            background-color:  {{setting('sys_theme_color_disable')}}   ;
        }
        .footer-default-two,.link-footer {
            background: {{setting('sys_theme_color_disable')}} ;

        }
        .atm-recharge-left, .atm-recharge-right {
            background-color: {{setting('sys_theme_color_disable')}};
        }
    </style>


@endif
@if(setting('sys_theme_color_text'))
    <style>
        :root{
            --text-color: {{setting('sys_theme_color_text')}};
        }
        .footer-default-two li a {
            color: {{setting('sys_theme_color_text')}};
        }
        .text-title-theme {
            color: {{setting('sys_theme_color_text')}};
        }
    </style>

@endif
@if(setting('sys_theme_color_click'))
    <style>
        .money-radio-form input[type=radio]:checked ~ label {
            background-color: {{setting('sys_theme_color_click')}};
        }
        .nice-select:active, .nice-select.open, .nice-select:focus, .nice-select:hover {
            background: {{setting('sys_theme_color_click')}};
        }
        .nice-select .list {
            background-color: {{setting('sys_theme_color_click')}};
        }

        /*mua thẻ*/
        .card-type-form input[type=radio]:checked ~ label {
            background-color: {{setting('sys_theme_color_click')}};
        }
        .card-price-form input[type=radio]:checked ~ label {
            background-color: {{setting('sys_theme_color_click')}};
        }
        /*account*/
        .box-account-logined {

            background: {{setting('sys_theme_color_click')}};

        }
        .sidebar-item.active {
            background-color: {{setting('sys_theme_color_click')}};
        }
        .footer-default {
            background: {{setting('sys_theme_color_click')}};
        }
        input[type=search] {

            background-color: {{setting('sys_theme_color_click')}};

        }
        @media screen and (max-width: 992px){
            .menu-bottom-item.is-active .menu-bottom_icon {
                background-color:{{setting('sys_theme_color_click')}};
            }
            .menu-bottom-item:hover .menu-bottom_icon {
                background-color: {{setting('sys_theme_color_click')}};
            }
        }
        .rotation-sale-content {
            background-color: {{setting('sys_theme_color_click')}};
        }
        .leaderboard-item:nth-child(even) {
            background-color: {{setting('sys_theme_color_click')}};
        }
        .menu-category a:hover div {
            background-color:  {{setting('sys_theme_color_click')}};
        }
        .menu-category a .active {
            background-color: {{setting('sys_theme_color_click')}};
        }
        .leaderboard-items {
            background-color: {{setting('sys_theme_color_click')}};
        }
    </style>

@endif
