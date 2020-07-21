<?php

use Application as A;

$part1 = "";
/*
for($i = 0; $i < 10; $i++){


$part1 <<< EOL
<div class="block _option-ctrl">
   <input name="name"  type="checkbox" value="A" onclick="kmlController.getName(this)">
</div>
EOL;
}
*/

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = 'Конвертер KML';
$styles['main-css'] = '/css/styles.css';

require 'core/base_views/VHead.php';
?>

<body class="block block_wrap">
<?php require 'core/base_views/VMainToolbar.php' ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = 'Калькуляторы';
    $Header_rightContent = 'Конвертер в геоданные';
    require 'core/base_views/VMinorHeader.php';
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

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


        </aside>

        <section class="content content_with_sideBar block block_wrap  main_bkg_color-4">

            <div class="H1">Экспорт геоданных в KML</div>
            <br>

            <br>
            <div class="">Геоданные</div>
            <div>
                <fieldset>
                    <legend>Тип метки</legend>
                    <input id="#point" name="typePlacemark" type="radio" value="point" onclick="kmlController.setTypePlacemark(this)" checked>
                    <label for="#point" >Точка</label><br>
                    <input id="#line" name="typePlacemark" type="radio" value="line" onclick="kmlController.setTypePlacemark(this)">
                    <label for="#line">Линия</label><br>
                    <input id="#polygon" name="typePlacemark" type="radio" value="polygon" onclick="kmlController.setTypePlacemark(this)">
                    <label for="#polygon">Полигон</label>
                </fieldset>
            </div>

            <input class="main_text_color-1 main_bkg_color-1" type="button"
                   title="Экспорт данных в файл *.kml" value="Экспорт KML" onclick="kmlController.exportKml()">
            <input class="main_text_color-1 main_bkg_color-1" type="button"
                   title="Стереть все данные из таблицы" value="Очистить таблицу" onclick="hotTable.clearTable()">

            <!--
            <input class="main_text_color-1 main_bkg_color-1" type="button"
                   title="Тесты" value="Тест" onclick="tests.alertshow()">
            <input class="main_text_color-1 main_bkg_color-1" type="button"
                   title="Обновить описание колонок" value="Обновить" onclick="kmlController.redrawDescription()">
-->
            <br>
            <div class="_kml-option">
                <div class="block _header">Имя метки</div>
                <div class="block _option-ctrl">
                    <input name="name"  type="checkbox" value="A" onclick="kmlController.setNameCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="name"  type="checkbox" value="B" onclick="kmlController.setNameCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="name"  type="checkbox" value="C" onclick="kmlController.setNameCols(this)">
                </div>
                <div class="block  _option-ctrl">
                    <input name="name"  type="checkbox" value="D" onclick="kmlController.setNameCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="name"  type="checkbox" value="E" onclick="kmlController.setNameCols(this)">
                </div>
                <div class="block  _option-ctrl">
                    <input name="name"  type="checkbox" value="F" onclick="kmlController.setNameCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="name"  type="checkbox" value="G" onclick="kmlController.setNameCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="name"  type="checkbox" value="H" onclick="kmlController.setNameCols(this)">
                </div>
                <div class="block  _option-ctrl">
                    <input name="name"  type="checkbox" value="I" onclick="kmlController.setNameCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="name"  type="checkbox" value="J" onclick="kmlController.setNameCols(this)">
                </div>
            </div>

            <div class="_kml-option">
                <div class="block _header">Широта</div>
                <div class="block _option-ctrl">
                    <input name="lat" type="radio" value="A" onclick="kmlController.setLatCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="lat" type="radio" value="B" onclick="kmlController.setLatCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="lat" type="radio" value="C" onclick="kmlController.setLatCol(this)">
                </div>
                <div class="block  _option-ctrl">
                    <input name="lat" type="radio" value="D" onclick="kmlController.setLatCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="lat" type="radio" value="E" onclick="kmlController.setLatCol(this)">
                </div>
                <div class="block  _option-ctrl">
                    <input name="lat" type="radio" value="F" onclick="kmlController.setLatCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="lat" type="radio" value="G" onclick="kmlController.setLatCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="lat" type="radio" value="H" onclick="kmlController.setLatCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="lat" type="radio" value="I" onclick="kmlController.setLatCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="lat" type="radio" value="J" onclick="kmlController.setLatCol(this)">
                </div>
            </div>

            <div class="_kml-option">
                <div class="block _header">Долгота</div>
                <div class="block _option-ctrl">
                    <input name="long" type="radio" value="A" onclick="kmlController.setLongCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="long" type="radio" value="B" onclick="kmlController.setLongCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="long" type="radio" value="C" onclick="kmlController.setLongCol(this)">
                </div>
                <div class="block  _option-ctrl">
                    <input name="long" type="radio" value="D" onclick="kmlController.setLongCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="long" type="radio" value="E" onclick="kmlController.setLongCol(this)">
                </div>
                <div class="block  _option-ctrl">
                    <input name="long" type="radio" value="F" onclick="kmlController.setLongCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="long" type="radio" value="G" onclick="kmlController.setLongCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="long" type="radio" value="H" onclick="kmlController.setLongCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="long" type="radio" value="I" onclick="kmlController.setLongCol(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="long" type="radio" value="J" onclick="kmlController.setLongCol(this)">
                </div>
            </div>

            <div class="_kml-option">
                <div class="block _header">Описание</div>
                <div class="block _option-ctrl">
                    <input name="description"  type="checkbox" value="A" onclick="kmlController.setDescriptionCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="description"  type="checkbox" value="B" onclick="kmlController.setDescriptionCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="description"  type="checkbox" value="C" onclick="kmlController.setDescriptionCols(this)">
                </div>
                <div class="block  _option-ctrl">
                    <input name="description"  type="checkbox" value="D" onclick="kmlController.setDescriptionCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="description"  type="checkbox" value="E" onclick="kmlController.setDescriptionCols(this)">
                </div>
                <div class="block  _option-ctrl">
                    <input name="description"  type="checkbox" value="F" onclick="kmlController.setDescriptionCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="description"  type="checkbox" value="G" onclick="kmlController.setDescriptionCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="description"  type="checkbox" value="H" onclick="kmlController.setDescriptionCols(this)">
                </div>
                <div class="block  _option-ctrl">
                    <input name="description"  type="checkbox" value="I" onclick="kmlController.setDescriptionCols(this)">
                </div>
                <div class="block _option-ctrl">
                    <input name="description"  type="checkbox" value="J" onclick="kmlController.setDescriptionCols(this)">
                </div>
            </div>
            <br>

            <div id="EditTable" title="Скопируйте сюда текстовую таблицу"></div>


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

<script src="/js_base/node_modules/handsontable/dist/handsontable.full.min.js"></script>
<link href="/js_base/node_modules/handsontable/dist/handsontable.full.min.css" rel="stylesheet" media="screen">


<script src="/pages/calculators/scripts/geo/TGeoPoint.js"></script>
<script src="/pages/calculators/scripts/geo/TGeoLine.js"></script>
<script src="/pages/calculators/scripts/geo/hotTable.js"></script>
<script src="/pages/calculators/scripts/geo/kml.js"></script>
<script src="/pages/calculators/scripts/geo/GeoController.js"></script>

<script src="/pages/calculators/scripts/geo/tests.js"></script>



</body>
</html>

<script>


</script>

<style>

    ._kml-option {
        /*word-spacing: -.36em;*/
        display: table-row;

    }

    ._header {
        width: 100px;
        display: table-cell;
        text-align: left;


    }

    ._option-ctrl {
        width: 100px;
        display: table-cell;
        text-align: center;


    }


</style>













