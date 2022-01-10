<?php

//$rows = $this->models['rows'] ?? "-";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MD-Bot</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <script src="/vendor-libs/plotly/plotly.js"></script>
    <script src="/adminLTE/plugins/jquery/jquery.js"></script>
</head>
<body>
<div class="flex-wrapper">
    <div class="grid-wrapper">
        <section id="" class="section header-section">
            <!--  <header class="logo"></header> -->
            <header class="logo2"> &#129302; MD-BOT</header>

        </section>
        <section id="" class="section toolbar-section">
            <!--    <input type="button" id="js-get-report" value="Отчет JS" class="main-botton"> -->

            <div class title="Дата&#013;последнего&#013;обновления" id="js-last-update">Дата обновления</div>
        </section>

        <section id="" class="section section-enterprises">
            <fieldset id="js-enterprises">
                <legend>Предприятия</legend>
                <select id="js-select-enterprises" multiple="" size="16" class="enterprises">
                    <!-- fill width javascript-->
                </select>
            </fieldset>
        </section>

        <section class="section chart-section">
            <div id="js-plotly" class="js-plotly"></div>
        </section>
        <section class="section option-section">
            <fieldset class="period">
                <legend>Период</legend>
                <input name="period" type="radio" value="cur_month" id="js-last-days">
                <label for="js-last-days">За последние три дня</label>
                <br>
                <input name="period" type="radio" value="cur_month" id="js-cur-week">
                <label for="js-cur-week">За текущую неделю</label>
                <br>
                <input checked name="period" type="radio" value="cur_month" id="js-cur-month">
                <label for="js-cur-month">За текущий месяц</label>
                <br>
                <input name="period" type="radio" value="cur_month" id="js-cur-year">
                <label for="js-cur-year">За текущий год</label>
                <br>
                <br>
                <input name="period" type="radio" value="custom-period" id="js-custom-period">
                <label for="js-custom-period">Выбрать период

                    <input class="period_ctrl" type="date" id="js-dstart" name="date-start"
                           value="<?= date('Y-m-01'); ?>">
                    <input class="period_ctrl" id="js-dend" type="date" name="date-end" value="<?= date('Y-m-d'); ?>"/>
                </label>
                <br>

            </fieldset>
        </section>

        <section id="" class="section section-statistic">
            <!--  <h2 class="h2">Статистика изменений</h2> -->

            <br>
            <div id="js-report-as-list" class="js-report-as-list">
                Нет записей <br>
                Попробуйте выбрать другие организации и/или отчетный период
                <!-- render width javascript -->
            </div>

        </section>

        <section id="" class="section section-view-as-table">
            <input type="button" id="js-export-excel"
                   value="Экспорт в xls" class="main-botton" title="Экспортировать в Excel">
            <br>
            <table id="js-report-as-table" class="js-report-as-table">
                <!-- render width javascript -->
            </table>
        </section>

        <section id="js-console2" class="section section-js-console">
            <input type="button" id="js-do-inspect"
                   value="Обновить" class="main-botton" title="Обновить базу данных">
            <input type="button" id="js-update-href_rc"
                   value="Cсылки" class="main-botton" title="Обновить ссылки на РУ">

            <!--     <input type="button" id="js-test" value="JQ-тест" class="main-botton" title="тест"> -->


            <!--  <a href="/vector-best/mail" class="main-button" title="тест">почта</a>-->

            <div id="js-report"></div>
        </section>

        <section id="js-footer" class="section section-footer">
            <a href="https://roszdravnadzor.gov.ru/services/misearch">Источник данных Реестр МИ
                https://roszdravnadzor.gov.ru</a> (сайт Росздравнадзора)
        </section>

        <!--
        <section class="section section-exists-rows-section">

            <h2 class="h2">Найдено записей: 628</h2>
            <div>
                <a href="/pages/vector-best/models/inspection.log.html">Журнал обновлений данных</a>
            </div>
        </section>

        <section id="js-console2" class="section section-js-console">
            <a href="/vector-best/admin" class="main-button"
               title="тест">acnAdmin</a>
            <a href="/vector-best/inspect/do" class="main-button"
               title="получить актуальные данные">Запуск</a>



        </section>
-->

    </div>
</div>
</body>

<script type="module" src="/pages/vector-best/scripts/js-vector-index.js"></script>
<script src="/template/spplab/js/jquery-3.3.1.min.js"></script>
<!--<script type="module"  src="/pages/vector-best/scripts/js-models/typescript.js"></script>-->


</html>

<style id="layout">

    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, font, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    table, caption, tbody, tfoot, thead, tr, th, td, section, article, fieldset {

        box-sizing: border-box;
        /* margin: 0;
         padding: 0;*/
    }

    html {
        font-family: "site-font", serif;
        width: 100vw;
        margin: 0 auto;
        scroll-behavior: smooth;
        font-size: 100%;

        border: 1px #0fcc21 solid;
    }

    .flex-wrapper {
        /* display: flex;
         justify-content: flex-start;
         flex-wrap: nowrap;*/
        width: 100%;
        margin: 0 auto;
    }

    .grid-wrapper {
        display: grid;
        grid-gap: 1px;
        width: 100%;
        border: 1px var(--main-color-dark) solid;

    }



    /*
        .grid-wrapper {
            grid-template-areas:
                "h    t"
                "ent stat"
                "ch stat"
                "st-t st-t"
                "f f"
                 "cons cons";
        }

     */


    .section {
        border: 1px var(--main-color-dark) solid;
        padding: 10px;
        width: 100%;
    }

    .header-section {
        grid-area: h;
        word-wrap: break-word;
        display: flex;
        justify-content: center;
        /* vertical-align: center;*/
        font-size: 2rem;
        font-weight: 900;
        letter-spacing: 4px;
        color: var(--main-color-light);
        background-color: var(--main-color-vdark);


    }

    .toolbar-section {
        grid-area: t;
        display: flex;
        justify-content: end;
        /*vertical-align: center;*/

    }


    .section-enterprises {
        /* max-width: 400px;*/
        grid-area: ent;
    }

    .js-enterprises {
        width: 90%;
    }

    .js-plotly {
        /*border: 4px var(--main-color-dark) solid;*/
        margin: auto;
        height: 100%;
        padding: 5px;
        width: 95%;
    }

    /*
        .section-period {
            grid-area: per;
        }
        */
    .chart-section {
        grid-area: ch;
        min-height: 50vh;

        /*  max-width: 50%;*/

    }

    option-section {
        grid-area: per;
    }

    .section-statistic {
        grid-area: stl;


    }

    .period {
        width: 100%;

    }

    .js-report-as-list {
        overflow: scroll;
        width: 100%;
        max-height: 65vh;
        min-height: 65vh;
    }

    .section-view-as-table {

        grid-area: stt;
        overflow: scroll;
        max-height: 100vh;
    }


    .section-js-console {
        grid-area: cons;
        color: #ff0000;
        font-weight: bold;
    }

    .section-footer {
        grid-area: f;
    }


    option:before {
        content: "☐ "
    }

    option:checked:before {
        content: "☑ "
    }

    option:checked {
        background: var(--main-color-light);
        color: var(--main-color-dark);
    }

    /*
        :root {
            --main-color-vdark: #2e2633;
            --main-color-dark: #555152;
            --main-color-medium: #DCE9BE;
            --main-color-light: #FFFFE0;
            --main-color-separator: #cf2756;
            --site-font: site-font;
        }

    */
    :root {
        --main-color-vdark: #004C79;
        --main-color-dark: #3C8AB8;
        --main-color-medium: #849FBB;
        --main-color-light: #E8F4FA;
        --main-color-separator: #cf2756;
        --site-font: site-font;
    }

    @font-face {
        font-family: 'site-font';
        /* src: url('/fonts/Play-Regular.ttf');*/
        src: url('/fonts/Play-Regular.ttf');
        /*CentarRegular.otf*/
        font-weight: normal;
        font-style: normal;


    }


    .h1 {
        font-size: 1.2rem;
        font-weight: bold;
        color: var(--main-color-dark);
    }


    .button {
        height: 80%;
    }


    .period_ctrl {
        font-size: 1.2rem;
        font-weight: bold;
        width: 40vw;
        margin: 5px auto;

    }


    .main-button {

        display: block;
        background-color: var(--main-color-vdark);

        color: var(--main-color-light);
        font-size: 16px;
        cursor: pointer;
        height: 60px;
        width: 120px;
        border-radius: 10px;
        margin: 5px;
    }

    .logo {

        margin: 27px 0 0 30px;
        padding: 0;
        border: 0;
        width: 136px;
        height: 42px;
        background: url(/pages/vector-best/resource/content/logo-vb.png) no-repeat;
        background-size: auto;
        background-size: contain;

        -webkit-transition: transform 150ms;
        -moz-transition: transform 150ms;
        -ms-transition: transform 150ms;
        -o-transition: transform 150ms;
        transition: transform 150ms;
    }

    .img-provider {
        background-repeat: no-repeat;
        box-sizing: border-box;
        background-size: contain;

        text-align: center;
        /* border: #00d9ff 1px solid;*/

        font-weight: bold;
    }

    input {

    }

    .div-button {
        cursor: pointer;

    }

    .main-botton {
        width: 80%;
        max-width: 100px;
        height: 48px;
        background: var(--main-color-vdark);
        color: var(--main-color-light);
        border-radius: 14px;
        margin: 0 auto;
    }

    .enterprises {
        min-height: 11vh;
        width: 100%;
    }


    .enterp:hover {
        background-color: var(--main-color-light);
    }

    .alert_message {
        font-weight: bold;
        color: #ff0000;
    }

    .searching {
        font-weight: bold;
        color: #000088;
    }


    .logo2 {

    }

    .grid-wrapper {
        grid-template-areas:
            "h"
            "t"
            "ent"
            "per"
            "stl"
            "ch"
            "stt"
            "f"
            "cons";
    }

    @media (min-device-width: 1200px) {

        html {
            max-width: 1200px;
        }

        .flex-wrapper {
            font-size: 1rem;
        }

        .grid-wrapper {
            grid-template-areas:
            "h    t"
            "ent per"
            "ent stl"
            "ch stl"
            "stt stt"
            "f f"
             "cons cons";
        }

        .header-section {
            width: 100%;

        }

        .period_ctrl {
            font-size: 1.2rem;
            font-weight: bold;
            width: auto;
            margin: 5px auto;

        }


        .section-enterprises {
            /* max-width: 400px;*/
            width: 100%;

        }


        .chart-section {

            width: 100%;
            /*  max-width: 50%;*/

        }

        .section-statistic {
            min-width: 40vw;
        }


    }


</style>

<style id="preloader">

    .preloader {
        /*фиксированное позиционирование*/
        /*  position: fixed;*/
        /* координаты положения */
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        /* фоновый цвет элемента */
        /* background: #e0e0e0;*/
        /* размещаем блок над всеми элементами на странице (это значение должно быть больше, чем у любого другого позиционированного элемента на странице) */
        z-index: 1001;
    }

    .preloader__row {
        position: relative;
        top: 50%;
        left: 50%;
        width: 70px;
        height: 250px;

        text-align: center;
        animation: preloader-rotate 2s infinite linear;
    }

    .preloader__item {
        /* position: absolute;*/
        display: inline-block;
        top: 0;
        background-color: var(--main-color-dark);
        border-radius: 100%;
        width: 35px;
        height: 35px;
        animation: preloader-bounce 2s infinite ease-in-out;
    }

    .preloader__item:last-child {
        top: auto;
        bottom: 0;
        animation-delay: -1s;
    }

    @keyframes preloader-rotate {
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes preloader-bounce {

        0%,
        100% {
            transform: scale(0);
        }

        50% {
            transform: scale(1);
        }
    }

    .loaded_hiding .preloader {
        transition: 0.3s opacity;
        opacity: 0;
    }

    .loaded .preloader {
        display: none;
    }


</style>

<style id="blink">

    @-webkit-keyframes pulsate {
        50% {
            color: #fff;
            text-shadow: 0 -1px rgba(0, 0, 0, .3), 0 0 5px #ffd, 0 0 8px #fff;
        }
    }

    @keyframes pulsate {
        50% {
            color: #fff;
            text-shadow: 0 -1px rgba(0, 0, 0, .3), 0 0 5px #ffd, 0 0 8px #fff;
        }
    }

    .blink {
        color: rgb(245, 245, 245);
        text-shadow: 0 -1px rgba(0, 0, 0, .1);
        background: var(--main-color-dark);
        font-size: 2rem;
        -webkit-animation: pulsate 1.2s linear infinite;
        animation: pulsate 1.2s linear infinite;

    }

</style>

<style>
    .changed_enterprises {
        font-weight: bold;
    }

    .product-row {

        padding: 10px;
        margin-bottom: 10px;
        background: var(--main-color-light);
    }


    .item-header {

    }

    .title {
        color: var(--main-color-vdark);
        font-size: 1.2rem;
        font-weight: bold;
    }

    .date {
        background: rgba(15, 204, 33, 0.5);

    }

    .date:before {
        content: "+ ";

    }

    .cert {
        font-weight: bold;
    }

    .js-report-as-table
    {
        border-collapse: collapse;
        margin-top: 5px;
    }

    .cells_report-as-table{
        vertical-align: top;
        text-overflow: ellipsis;
        border: 1px solid #000000;
        font-size: .5rem;
    }






</style>













