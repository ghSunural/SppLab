<?php

use Application as A;

$rangeCoord = $this->models['rangeCoord'];
$arrEarthquakes = $this->models['arrEarthquakes'];
$arrColumnHeaders = $this->models['arrColumnHeaders'];
$tableAsHtml = A\Html::convertRowsArray2HtmlTable($arrEarthquakes, $arrColumnHeaders);

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = 'Каталог';
$styles['main-styles'] = '/styles/styles.styles';
//$scripts['ymaps'] = "https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink";
//$scripts['ymaps2'] = "https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=369c0410-04f2-44bc-8b5e-db38533c045b";

//$scripts['geoxml'] = "https://yandex.st/jquery/2.2.3/jquery.min.js";
//$scripts['geoxml2'] = "pages/seismic/scripts/geoxml_display.js";

require 'core/base_views/VHead.php';
?>

<body class="block block_wrap">
<?php require 'core/base_views/VMainToolbar.php' ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = 'КАТАЛОГ ЗЕМЛЕТРЯСЕНИЙ';
    $Header_rightContent = 'Специализированный каталог землетрясений
для задач общего сейсмического районирования территории
Российской Федерации (ред. В.И.Уломов, Н.С.Медведева, Институт физики Земли РАН)';
    require 'core/base_views/VMinorHeader.php';

    ?>
    <script src="/pages/seismic/scripts/geoxml_display.js" type="text/javascript"></script>
    <main class="Main block block_wrap">
        <section class="content block  main_bkg_color-4">
            <section class="block main_bkg_color-4">

                <div class="block block_box bb">
                    <H3>Фильтры</H3>

                    <div class="block">
                        <img class="" src="/pages/seismic/resource/site/earth.webp" width="50px">

                        <form id="limits" action="/seismic/getEarthquakes" method="post" class="">


                                <div class="block">
                                  <!--  <label for="#maxLat">Север</label><br> -->
                                    <input
                                            id="#maxLat"
                                            name="params[maxLat]"
                                            title="Максимальная широта"
                                            type="number"
                                            class="_input"
                                            step="0.01"
                                            placeholder="87.5"
                                            max="87.5"
                                            value="<?= $rangeCoord['maxLat']; ?>"
                                </div>

                                <div class="block ">
                                  <!--  <label for="#minLat">Запад</label> -->
                                    <input
                                            id="#minLong"
                                            name="params[minLong]"
                                            title="Минимальная долгота"
                                            type="number"
                                            class="_input"
                                            step="0.01"
                                            placeholder="-179"
                                            min="-179"
                                            value="<?= $rangeCoord['minLong'] ?>"
                                </div>
                                <div class="block">
                                    <!--  <label for="#maxLat">Восток</label><br> -->
                                    <input
                                            id="#maxLong"
                                            name="params[maxLong]"
                                            title="Максимальная долгота"
                                            type="number"
                                            class="_input"
                                            step="0.01"
                                            placeholder="186.14"
                                            max="186.14"
                                            value="<?= $rangeCoord['maxLong']; ?>"
                                </div>
                                <div class="block">
                               <!--     <label for="#minLat">Юг</label><br> -->
                                    <input
                                            id="#minLat"
                                            name="params[minLat]"
                                            title="Минимальная широта"
                                            type="number"
                                            class="_input"
                                            step="0.01"
                                            placeholder="34.06"
                                            min="34.06"
                                            value="<?= $rangeCoord['minLat']; ?>"
                                </div>


                            <div>
                                <input name="year"
                                       type="number"
                                       class="_input"
                                       step="1"
                                       placeholder="год"
                                       value="">
                            </div>
                            <div>
                                <input name="month"
                                       type="number"
                                       class="_input"
                                       min="1"
                                       max="12"
                                       step="1"
                                       placeholder="месяц"
                                       value="">
                            </div>
                            <div>
                                <input name="day"
                                       type="number"
                                       class="_input"
                                       min="1"
                                       max="31"
                                       step="1"
                                       placeholder="день"
                                       value="">
                            </div>

                        </form>

                    </div>




                </div>

                <div class="block">
                    <input type="submit" name="list" form="limits"
                           title="Список землетрясений в диапазоне указанных координат"
                           value="Список" class='main_bkg_color-1 main_text_color-1'>

                    <input type="submit" name="on_map" form="limits" value="На карте"
                           class="load-kml main_bkg_color-1 main_text_color-1"/>

                    <input type="submit" name="export" form="limits" title="Экспорт геоданных в kml"
                           value="Экспорт в kml" class='main_bkg_color-1 main_text_color-1'>
                </div>



                <div id="map______" class="bb">
                    <!--карта-->
                </div>
                <div class="block block_box bb contenteditable">
                    <?php
                    echo $tableAsHtml;
                    ?>
                </div>
                <br>
            </section>


        </section>
        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">
            <nav class="catalog block">
                <ul>
                    Полезные ссылки
                    <li><a href="http://neotec.ginras.ru/database.html" target="_blank">База данных разломов</a></li>
                    <li><a href="http://eqru.gsras.ru/stations/index.php" target="_blank">Сейсмические станции
                            России</a></li>
                    <li><a href="http://www.gsras.ru/new/ssd_news.htm" target="_blank">Последние землетрясения</a></li>
                    <li><a href="http://www.ceme.gsras.ru/cgi-bin" target="_blank">Землетрясения в радиусе от заданной
                            точки</a></li>
                </ul>
            </nav>
        </aside>


    </main>
    <?php require 'core/base_views/VSiteFooter.php' ?>
</div>
</body>
</html>


<style>

    ._input {
        width: auto;
        border-collapse: collapse;
        padding: 4px;

    }

</style>

<style>


    #map {
        width: 90vw;
        height: 80vh;

    }

    .inputs {
        padding: 10px;
    }
</style>
















