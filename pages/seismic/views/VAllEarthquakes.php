<?php

use Application as A;
use Application\Models\Databases as DB;

$rangeCoord = $this->models['rangeCoord'];
A\Debug::print_array($rangeCoord);

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "Каталог";
$styles['main-css'] = "/css/styles.css";
$scripts['ymaps'] = "https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink";
require "core/base_views/VHead.php";
?>

<body class="block block_wrap">
<?php require "core/base_views/VMainToolbar.php" ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = "КАТАЛОГ ЗЕМЛЕТРЯСЕНИЙ";
    $Header_rightContent = "Специализированный каталог землетрясений
для задач общего сейсмического районирования территории
Российской Федерации (ред. В.И.Уломов, Н.С.Медведева, Институт физики Земли РАН)";
    require "views/page_templates/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap">

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

        <section class="content content_with_sideBar block block_wrap main_bkg_color-4">

            <section class="block block_wrap main_bkg_color-4">


                <div class="block block_box bb">
                    <H3>Фильтры</H3>

                    <img class="" src="/pages/seismic/resource/site/earth.webp"
                         width="50px">


                    <form action="/seismic/getAllEarthquakes" method="post">
                        <p>
                            <input name="params[minLat]"
                                   type="number"
                                   class="_input"
                                   step="0.01"
                                   placeholder="34.06"
                                   min="34.06"
                                   value="<?= $rangeCoord['minLat']; ?>"
                        </p>
                        <p>
                            <input name="params[maxLat]"
                                   title="Максимальная широта"
                                   type="number"
                                   class="_input"
                                   step="0.01"
                                   placeholder="87.5"
                                   max="87.5"
                                   value="<?= $rangeCoord['maxLat'];?>"
                        </p>
                        <p>
                            <input name="params[minLong]"
                                   type="number"
                                   class="_input"
                                   step="0.01"
                                   placeholder="-179"
                                   min="-179"
                                   value="<?= $rangeCoord['minLong'] ?>"
                        </p>
                        <p>
                            <input name="params[maxLong]"
                                   type="number"
                                   class="_input"
                                   step="0.01"
                                   placeholder="186.14"
                                   max="186.14"
                                   value="<?= $rangeCoord['maxLong'];?>"
                        </p>

                        <p>
                            <input name="year"
                                   type="number"
                                   class="_input"
                                   step="1"
                                   placeholder="год"
                                   value="">
                        </p>
                        <p>
                            <input name="month"
                                   type="number"
                                   class="_input"
                                   min="1"
                                   max="12"
                                   step="1"
                                   placeholder="месяц"
                                   value="">
                        </p>

                        <p>
                            <input name="day"
                                   type="number"
                                   class="_input"
                                   min="1"
                                   max="31"
                                   step="1"
                                   placeholder="день"
                                   value="">
                        </p>

                        <p>
                            <input type="submit" title="Список землетрясений в диапазоне указанных координат"
                                   value="Ок">
                        </p>
                    </form>


                </div>

                <div class="block block_box bb contenteditable">
                    <?php
                    A\Util::printArrayAsTable($db_response);
                    ?>
                </div>
                <input action="/seismic/export2Kml" type="submit" value="Экспорт в KML">
                <br>
                <a href="/seismic/export2Kml">Экспорт в kml</a>

            </section>
        </section>
    </main>
    <?php require "core/base_views/VSiteFooter.php" ?>
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















