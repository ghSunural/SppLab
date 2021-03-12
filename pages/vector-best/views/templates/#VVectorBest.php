<?php

//$rows = $this->models['rows'] ?? "-";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vector-Lab</title>
    <link rel="stylesheet" href="">
</head>
<body>
<div class="flex-wrapper">
    <div class="grid-wrapper">
        <section id="" class="section header-section">
            <header class="logo"></header>

        </section>


        <section id="" class="section section-options">


            <form method="post" action="vector-best/inspect/report">


                <fieldset>


                    <br>


                    <legend>Предприятия</legend>

                    <select multiple="" size="5" id="enterprises" class="enterprises">
                        <option value="1">АО "Вектор-Бест"</option>
                        <option value="2">АО "Диагностические системы"</option>
                    </select>

                </fieldset>
                <fieldset>
                    <legend>Период</legend>
                    <input name="period" type="radio" value="cur_month" id="cur_month">
                    <label for="cur_month">За текущий месяц</label>
                    <br>
                    <br>
                    <input name="period" type="radio" value="custom_period" id="custom_period" checked>
                    <label for="custom_period">Задать период</label>
                    <br>
                    <input class="button" type="date" id="dstart" name="date-start"
                           value="2021-03-08"
                           min="2021-03-08">
                    <input id="dend" type="date" name="date-end" value="<?= date('Y-m-d'); ?>"/>
                </fieldset>


            </form>
            <br>
            <input type="button" id="js-get-report" value="Отчет JS" class="main-botton">

        </section>



        <section id="" class="section section-statistic">
            <h2 class="h2">Статистика изменений</h2>
            <details class="details">
                <summary class="">Добавлено записей: 0</summary>
                <div class="item-content">
                    <section id="test-html" class="section section-test">
                        Добавленные записи
                    </section>
                </div>
            </details>
            <details class="details">
                <summary class="">Удалено записей: 0</summary>
                <div class="item-content">
                    0551
                </div>
            </details>
            <details class="details">
                <summary class="">Изменено записей: 0</summary>
                <div class="item-content">
                    0551
                </div>
            </details>

        </section>

        <section class="section section-exists-rows-section">

            <h2 class="h2">Найдено записей: 628</h2>
            <div>
            </div>
        </section>

        <section id="js-console2" class="section section-js-console">
            <a href="/vector-best/admin" class="main-button"
               title="тест">Заполнить базовую таблицу</a>
            <a href="/vector-best/inspect/do" class="main-button"
               title="получить актуальные данные">Запуск</a>
        </section>

    </div>
</div>
</body>
<script type="module" src="pages/vector-best/scripts/js-vector-index.js"></script>
<script src="template/spplab/js/jquery-3.3.1.min.js"></script>

</html>

<style>

    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, font, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td {
        /*
                margin: 0;
                padding: 0;
                border: 0;
                outline: 0;

                vertical-align: baseline;
                background: transparent;
                font: 100% 'site-font', serif;
                */

    }

    option:before {
        content: "☐ "
    }

    option:checked:before {
        content: "☑ "
    }

    :root {
        --main-color-vdark: #2e2633;
        --main-color-dark: #555152;
        --main-color-medium: #DCE9BE;
        --main-color-light: #FFFFE0;
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

    html {
        font-family: "site-font", serif;
        width: 96vw;
        margin: 0 auto;
        scroll-behavior: smooth;
    }

    .block_inline {
        display: inline-block;
    }

    .h1 {
        font-size: 1.2rem;
        font-weight: bold;
        color: var(--main-color-dark);
    }

    .flex-wrapper {
        display: flex;
        justify-content: flex-start;
        flex-wrap: nowrap;
    }

    .grid-wrapper {
        display: grid;
        grid-gap: 1px;
        width: 100%;
        border: 1px #ff0000 solid;

    }

    .grid-wrapper {
        grid-template-areas:
            "h"
            "opt"
            "stat"
            "er"
            "cons";
    }

    @media (min-device-width: 1200px) {
        .grid-wrapper {
            grid-template-areas:
            "h h "
             "t t "
            "opt stat"
            "er er"
            "cons cons";
        }
    }

    .section {
        border: 1px #1a56e9 solid;
        resize: horizontal;
        padding: 5px;
        min-height: 50px;
    }

    .section-test {
        grid-area: t;
    }


    .section-options {
        /* max-width: 400px;*/
        grid-area: opt;
    }

    .section-statistic {

        grid-area: stat;
        overflow: scroll;
        height: 50vh;
        width: 70vw;
    }

    .section-exists-rows-section {
        grid-area: er;
    }


    .header-section {
        grid-area: h;
        word-wrap: break-word;

    }

    .tool-bar {
        display: flex;
        justify-content: stretch;
        grid-area: tb;
        background: var(--main-color-medium);
    }

    .button {
        height: 80%;
    }


    .section-js-console {
        grid-area: cons;
        color: #ff0000;
        font-weight: bold;
    }

    .main-button {

display: block;
        background-color: var(--main-color-dark);

        color: var(--main-color-medium);
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

    .div-button {
        cursor: pointer;

    }

    .main-botton{
        width: 80%;
        max-width: 100px;
        height: 48px;
        background: var(--main-color-dark);
        color: var(--main-color-medium);
        border-radius: 14px;
        margin: 0 auto;
    }

    .enterprises{
        width: 100%;
    }


</style>









