<?php

use Application as A;

$labelName = "";
$lat = "";
$long = "";
$description = "";
$lineAutPolId = "";
$styleId = "";

$COL_COUNT = 15;

for ($i = 0; $i < $COL_COUNT; $i++) {

    $partName = <<<EOL
    <div class="block _option-ctrl">
        <input name="name"  type="checkbox" value="{$i}" onclick="GeoController.setNameCols(this)">   
    </div>
EOL;
    $labelName .= $partName;

    $partLineAutPolId = <<<EOL
    <div class="block _option-ctrl">
        <input name="objId"  type="radio" value="{$i}" onclick="GeoController.setObjectIdCol(this)">   
    </div>
EOL;
    $lineAutPolId .= $partLineAutPolId;

    $partLat = <<<EOL
    <div class="block _option-ctrl">
        <input name="lat"  type="radio" value="{$i}" onclick="GeoController.setLatCol(this)">   
    </div>
EOL;
    $lat .= $partLat;

    $partLong = <<<EOL
    <div class="block _option-ctrl">
        <input name="long"  type="radio" value="{$i}" onclick="GeoController.setLongCol(this)">   
    </div>
EOL;
    $long .= $partLong;

    $partDesc = <<<EOL
    <div class="block _option-ctrl">
        <input name="description"  type="checkbox" value="{$i}" onclick="GeoController.setDescriptionCols(this)">   
    </div>
EOL;
    $description .= $partDesc;

    $partStyle = <<<EOL
    <div class="block _option-ctrl">
        <input name="style"  type="radio" value="{$i}" onclick="GeoController.setStylesNamesCol(this)">   
    </div>
EOL;
    $styleId .= $partStyle;

}
?>

<!DOCTYPE html>
<html lang="ru">

<?php
$title = 'Конвертер в геоданные';
$styles['main-css'] = '/css/styles.css';


require 'core/base_views/VHead.php';

?>


<body class="block block_wrap" onload="split_layout('side-bar', 'panel','splitter')">
<?php require 'core/base_views/VMainToolbar.php' ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = 'Калькуляторы';
    $Header_rightContent = 'Конвертер в геоданные';
    // require 'core/base_views/VMinorHeader.php';
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside id="side-bar" class="side-bar block block_wrap main_bkg_color-1 main_text_color-1">

            <nav class="catalog block">
                <ul>
                    Калькуляторы
                    <li>Число прописью</li>
                    <li>
                        <a href="https://pbprog.ru/webservices/csc/">Конвертер координат PBPROG</a>
                        <br>
                        (Логин: spp <br>
                        пароль sppural2020)<br>
                    </li>
                </ul>
            </nav>

            <nav class="catalog block">
                <ul>


                </ul>
            </nav>


        </aside>

        <div id="splitter" class="main_bkg_color-5"></div>

        <section id="panel" class="block block_wrap content_with_sideBar main_bkg_color-4">


            <fieldset class="block_inline">
                <legend>Тип метки</legend>
                <input id="#point" name="typePlacemark" type="radio" value="point"
                       onclick="GeoController.setTypePlacemark(this)" checked>
                <label for="#point">Точка</label><br>
                <input id="#line" name="typePlacemark" type="radio" value="line"
                       onclick="GeoController.setTypePlacemark(this)">
                <label for="#line">Линия</label><br>
                <input id="#polygon" name="typePlacemark" type="radio" value="polygon"
                       onclick="GeoController.setTypePlacemark(this)">
                <label for="#polygon">Полигон</label>
                <br>

            </fieldset>


            <!--
            <input class="main_text_color-1 main_bkg_color-1" type="button"
                   title="Тесты" value="Тест" onclick="tests.alertshow()">
            <input class="main_text_color-1 main_bkg_color-1" type="button"
                   title="Обновить описание колонок" value="Обновить" onclick="kmlController.redrawDescription()">
-->
            <br>

            <fieldset class="block_inline">
                <legend>Стили отображения</legend>
                <div id="styles" class="">

                    <table class="table styles-table">

                        <tr class="">
                            <th>№</th>
                            <th>Стиль</th>
                            <th class="img-provider" colspan="1"
                                title="Значок"
                                style=" background-image: url(https://lab.sppural.ru/resource/site/iconsimg/geomarker.webp);">
                            </th>
                            <th class="img-provider" colspan="1"
                                title="Размер значка"
                                style=" background-image: url(https://lab.sppural.ru/resource/site/iconsimg/geomarker_scale.png);">
                            </th>
                            <th class="img-provider"
                                title="Толщина линии"
                                style=" background-image: url(https://lab.sppural.ru/resource/site/iconsimg/line_width.png);">
                            </th>
                            <th class="img-provider"
                                title="Цвет линии"
                                style=" background-image: url(https://lab.sppural.ru/resource/site/iconsimg/color_line_6055.png);">
                            </th>
                            <th class="img-provider"
                                title="Заливка"
                                style=" background-image:  url(https://lab.sppural.ru/resource/site/iconsimg/nalivnoi-pol.png);">
                            </th>
                        </tr>

                        <template v-for="(form, index) in formsData">

                            <tr class="table-row ">
                                <td class="table-cell">
                                    {{index}}
                                </td>
                                <td class="table-cell">
                                    <input type="text" :name="index" v-model="form.stileId"
                                           title="Имя стиля" placeholder="Новый стиль"
                                           onchange="GeoController.setStyleName(this)">
                                </td>


                                <td class="table-cell">
                                    <input type="url"
                                           title="url" :name="index" v-model="form.url"
                                           placeholder="http://"
                                           onchange="GeoController.setIconUrl(this)">
                                </td>
                                <td class="table-cell">
                                    <input type="number" min="0.1" max="10" step="0.1" :name="index"
                                           title="Размер"
                                           v-model="form.scale"
                                           onchange="GeoController.setIconScale(this)">
                                </td>


                                <td class="table-cell">
                                    <input type="number" :name="index" v-model="form.width"
                                           title="Толщина линии" value="1" min="0"
                                           onchange="GeoController.setWidth(this)">

                                </td>
                                <td class="table-cell">
                                    <input type="color" :name="index" v-model="form.colorLine"
                                           title="Цвет линии" onchange="GeoController.setColorLine(this)">

                                </td>
                                <td class="table-cell">
                                    <input type="color" :name="index" v-model="form.colorFill"
                                           title="Заливка полигонов"
                                           onchange="GeoController.setColorFill(this)">

                                </td>
                                <td class="img-provider div-button"
                                    title="Удалить стиль"
                                    style="background-image: url(https://lab.sppural.ru/resource/site/iconsimg/delete2.png);"
                                    onclick="GeoController.removeStyle(this)"
                                    @click="removeForm(index)">
                                </td>
                            </tr>
                        </template>
                    </table>


                    <div class="img-provider table-cell div-button"
                         title="Новый стиль"
                         style="background-image: url(https://lab.sppural.ru/resource/site/iconsimg/add2.png);"
                         @click="addForm"
                         onclick="GeoController.addStyle()"
                    ></div>

                </div>
            </fieldset>
            <br>


            <div class="dropdown img-provider div-button" title="Экспорт в геоданные"
                 style="background-image: url(https://lab.sppural.ru/resource/site/iconsimg/world-grid-with-placeholder-blue-1-768x835.png)">

                <div class="dropdown-child">
                    <a href="#" class="dropdown-item"
                       onclick="GeoController.exportGeo('kml')">
                        <div class="img-provider block_inline"
                             style="background-image: url(https://lab.sppural.ru/resource/site/iconsimg/kml.png)">
                        </div>
                        KML
                    </a>
                    <a href="#" class="dropdown-item"
                       onclick="GeoController.exportGeo('gpx')">
                        <div class="img-provider block_inline"
                             style="background-image: url(https://lab.sppural.ru/resource/site/iconsimg/gpx.png)">
                        </div>
                        GPX
                    </a>
                </div>
                <div class="dropdown-item-level2">Level2</div>
            </div>


            <div class="dropdown img-provider div-button block_inline" title="окружность заданного радиуса"
                 style="background-image: url(https://lab.sppural.ru/resource/site/iconsimg/circle-map.png)">
                <div class="dropdown-child">
                    <input id="latcenter" type="text" :name=""
                           title="Широта цента" placeholder="Широта"
                           onchange="" min="-90" max="90">
                    <input id="longcenter" type="text" :name=""
                           title="Долгота центра" placeholder="Долгота"
                           onchange="">
                    <input id="R" type="text" :name=""
                           title="Радиус окуржности, км" placeholder="Радиус"
                           onchange="">
                    <a href="#" class="dropdown-item"
                       onclick="GeoController.getGeoCircle(document.getElementById('latcenter').value,
                                                           document.getElementById('longcenter').value,
                                                           document.getElementById('R').value)">
                        <div class="img-provider block_inline"
                             style="background-image: url(https://lab.sppural.ru/resource/site/iconsimg/kml.png)">
                        </div>
                        KML</a>
                    <a href="#" class="dropdown-item"
                       onclick="">
                        <div class="img-provider block_inline"
                             style="background-image: url(https://lab.sppural.ru/resource/site/iconsimg/gpx.png)">
                        </div>
                        GPX</a>
                </div>
                <div class="dropdown-item-level2">Level2</div>
            </div>


            <div class="img-provider div-button" title="Стереть все данные из таблицы"
                 style="background-image: url('https://lab.sppural.ru/resource/site/iconsimg/clear-symbol.png')"
                 onclick="hotTable.clearTable()">
            </div>

            <div class="table-row _kml-option">
                <div class="block _header">Имя метки</div>
                <?= $labelName ?>
            </div>

            <div class="_kml-option">
                <div class="block _header">ID объекта</div>
                <?= $lineAutPolId ?>
            </div>

            <div class="_kml-option">
                <div class="block _header">Широта</div>
                <?= $lat ?>
            </div>
            <div class="_kml-option">
                <div class="block _header">Долгота</div>
                <?= $long ?>
            </div>
            <div class="_kml-option">
                <div class="block _header">Описание</div>
                <?= $description ?>
            </div>

            <div class="table-row">
                <div class="block _header">ID стиля</div>
                <?= $styleId ?>
            </div>

            <br>
            <div id="EditTable" class="ht" title="Скопируйте сюда текстовую таблицу">
            </div>


        </section>


    </main>
    <?php require 'core/base_views/VSiteFooter.php' ?>
</div>
<!--
<script src="https://cdn.jsdelivr.net/npm/handsontable@7.3.0/dist/handsontable.full.min.js"></script>
<script src="/js_base/node_modules/handsontable/dist/handsontable.full.min.js"></script>

<script src="/js_base/handsontable.full.min.js"></script>
<link href="/js_base/handsontable.full.min.css" rel="stylesheet" media="screen">
<script src="/js_base/node_modules/handsontable/dist/handsontable.full.min.js"></script>
<link href="/js_base/node_modules/handsontable/dist/handsontable.full.min.css" rel="stylesheet" media="screen">
-->

<script src="/js_vendor/node_modules/handsontable/dist/handsontable.full.min.js"></script>
<link href="/js_vendor/node_modules/handsontable/dist/handsontable.full.min.css" rel="stylesheet" media="screen">

<script src="/pages/calculators/scripts/geo/onload.js"></script>
<script src="/pages/calculators/scripts/geo/TGeoPoint.js"></script>
<script src="/pages/calculators/scripts/geo/TGeoLine.js"></script>
<script src="/pages/calculators/scripts/geo/TGeoPolygon.js"></script>
<script src="/pages/calculators/scripts/geo/TGeoCircle.js"></script>
<script src="/pages/calculators/scripts/geo/TStyle.js"></script>
<script src="/pages/calculators/scripts/geo/hotTable.js"></script>
<script src="/pages/calculators/scripts/geo/kml.js"></script>
<script src="/pages/calculators/scripts/geo/gpx.js"></script>

<script src="/pages/calculators/scripts/geo/GeoController.js"></script>
<script src="https://unpkg.com/vue"></script>
<script src="/pages/calculators/scripts/geo/Vue.js"></script>

<script src="/pages/calculators/scripts/geo/tests.js"></script>


</body>
</html>

<style>

    ._kml-option {
        /*word-spacing: -.36em;*/
        display: table-row;
        overflow: scroll;

    }

    .table-row {
        display: table-row;
    }

    .table-cell {
        display: table-cell;
        vertical-align: top;
        text-align: right;
    }

    ._header {
        width: 120px;
        display: table-cell;
        text-align: left;


    }

    ._option-ctrl {
        width: 120px;
        display: table-cell;
        text-align: center;
        border-right: #ffdd00 1px solid;
        box-sizing: border-box;

    }


    .dynamic_fields, .dynamic_fields * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .example_student {
        display: none;
    }

    .form-control {
        display: block;
        width: 100%;
    }


    .img-provider {
        background-repeat: no-repeat;
        box-sizing: border-box;
        background-size: contain;
        width: 40px;
        height: 40px;
        text-align: center;
        /* border: #00d9ff 1px solid;*/

        font-weight: bold;
    }

    .div-button {
        cursor: pointer;

    }

    input[type=number] {

        width: 50px;
    }

    input[type=color] {

        height: 30px;
        width: 30px;
        border-radius: 20px;
    }

    .inputtypecolor
        /* .colorFill*/
    {
        opacity: 50;
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        border-radius: 20px;
    }


    .styles-table {
        border-collapse: collapse;
    }


</style>


<style id="styles">

    #splitter {
        width: 5px;
        /*  background-color: #002200;*/
        float: left;
        height: 100%;
        position: absolute;
        cursor: w-resize;
    }


    .styleButton1 {

        cursor: pointer;
        text-align: center;
        display: inline-block;
        font-weight: bold;
        /*  color: #fff;*/
        text-decoration: none;
        text-shadow: 0 -1px rgba(0, 0, 0, .5);
        user-select: none;
        padding: .5em 1.5em;
        border: 1px solid rgb(80, 32, 0);
        border-radius: 5px;
        outline: none;

        /*background: rgb(147, 80, 36) linear-gradient(rgb(106, 58, 26), rgb(147, 80, 36) 80%);*/

        box-shadow: 0 6px rgb(86, 38, 6),
        0 3px 15px rgba(0, 0, 0, .4),
        inset 0 1px rgba(255, 255, 255, .3),
        inset 0 0 3px rgba(255, 255, 255, .5);
        transition: .2s;
    }

    .styleButton1:hover {
        background: rgb(167, 91, 41) linear-gradient(rgb(126, 69, 31), rgb(167, 91, 41) 80%);
    }

    .styleButton1:active {
        background: rgb(120, 63, 25) linear-gradient(rgb(120, 63, 25) 20%, rgb(167, 91, 41));
        box-shadow: 0 2px rgb(86, 38, 6),
        0 1px 6px rgba(0, 0, 0, .4),
        inset 0 1px rgba(255, 255, 255, .3),
        inset 0 0 3px rgba(255, 255, 255, .5);
        -webkit-transform: translate(0, 4px);
        transform: translate(0, 4px);
    }

    .dropdown {
        position: relative;
        display: inline-block;
        z-index: 100;
        transition: 2s height;
    }

    .dropdown-child {

        position: absolute;
        top: 40px;
       /* display: none;*/
        background-color: #555152;
        min-width: 200px;
        font-weight: bold;


        box-shadow: 0 0 5px #000000;
        opacity: 0;
        visibility: hidden;
        transition: .5s opacity, .5s visibility, 1s border-radius;


    }

    .dropdown-child a {
        color: #DCE9BE;
        padding: 20px;
        text-decoration: none;
        display: block;

    }

    .dropdown:hover .dropdown-child {
        /*display: block;*/
        opacity: 1;
        visibility: visible;
        border-radius: 10px;


    }




    .dropdown-item {
        text-align: left;

    }

    .dropdown-item:hover {
        color: #555152;
        background-color: #DCE9BE;
    }

    .dropdown-item-level2 {
        display: none;
        position: absolute;
        z-index: 200;
    }

    .dropdown:hover .dropdown-child:hover .dropdown-item-level2 {
        display: block;


    }

    .ht {
        z-index: 0;
        border: #ff9041 2px solid;
    }

</style>







