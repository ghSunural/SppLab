<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Интерактивная карта</title>
    <link rel="stylesheet" href="">
    <script src="/vendor-libs/plotly/plotly.js"></script>
    <script src="/js_vendor/handsontable.full.js"></script>
    <link href="/js_vendor/node_modules/handsontable/dist/handsontable.full.min.css" rel="stylesheet" media="screen">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <link href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" rel="stylesheet"/>
</head>
<body>
<div class="flex-wrapper">
    <div class="grid-wrapper">
        <header class="section header-section">
            <h1 class="h1">Триангуляция Делоне</h1>
        </header>
        <aside class="section menu-section">
            панель
        </aside>

        <nav class="section tool-bar">
            <select id="js-select-test-set">
                <option value="simple" selected>Простой набор</option>
                <option value="regular">Регулярная сеть</option>
                <option value="hot">Таблица</option>
            </select>
            <button id="js-test-button" class="button"  title="тест">Тест</button>
            <button id="js-simple-test" class="button" title="тест отдельной функции">Тест2</button>
            <button id="js-get-source-data" class="button" title="Получить исходные данные из таблицы">Данные</button>
            <button id="js-convex-hull-button" class="button" title="Выпуклая оболочка">Выпукалая <br/> оболочка</button>
            <button id="js-greedy-tr" class="button"  title="пошаговый алгоритм">Жадный алгоритм</button>
            <button id="js-save" class="button">Сохранить</button>
            <button id="js-draw-chart" class="button">Диаграмма</button>
            <input type="file" id="js-load"/>
        </nav>
        <section class="section table-section">
            <div id="js-edit-table" class="ht" title="Скопируйте сюда текстовую таблицу">
            </div>
        </section>
        <section class="section chart-section">
            <div id="js-plotly" class="js-plotly"></div>
        </section>
        <section id="js-console" class="section js-console">

        </section>
        <section id="" class="">

        </section>


        <div id="osm-map"></div>
    </div>
</div>
</body>
<script type="module" src="pages/mapCreator/scripts/map-index.js"></script>
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

        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        /*font-size: 100%;*/
        vertical-align: baseline;
        background: transparent;
        font: 100% 'site-font', serif;

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

    .h1 {
        font-size: 1.2rem;
        font-weight: bold;
        color: var(--main-color-dark);
    }

    .flex-wrapper {
        display: flex;
        flex-wrap: nowrap;
    }

    .grid-wrapper {
        display: grid;
        grid-gap: 10px;
        width: 100%;
        border: 1px #ff0000 solid;

    }

    .grid-wrapper {
        grid-template-areas:
            "m h"
            "tb tb"
            "ht ht"
            "chart chart"
            "cons cons";
    }

    @media (min-device-width: 1200px) {
        .grid-wrapper {
            grid-template-areas:
            "m h h"
            "m tb tb"
            "m ht chart"
            "m cons cons";
        }
    }

    .section {
        border: 1px #1a56e9 solid;
        resize: horizontal;
        padding: 5px;
        min-height: 50px;
    }





    .menu-section {
        grid-area: m;
        width: 40px;
        background-color: var(--main-color-vdark);
        color: var(--main-color-medium);
    }

    @media (min-device-width: 1200px) {
        .menu-section {
            grid-area: m;
            width: 100px;
        }
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

    .table-section {
        grid-area: ht;
        width: 30vw;

    }

    .ht {
        border: 1px var(--main-color-dark) dashed;
        padding: 0;
        margin: auto auto;

        overflow: scroll;


    }

    .chart-section {
        grid-area: chart;
        width: 50vw;
    }

    .js-console {
        grid-area: cons;
        color: #ff0000;
        font-weight: bold;
    }

    .js-plotly {
        border: 1px var(--main-color-dark) solid;
        margin: auto;
        height: 100%;

    }


</style>





