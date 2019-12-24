<?php

use Application as A;

$regions = $this->models['regions'];

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "SL-Сейсмичность";
$styles['main-css'] = "css/styles.css";
$scripts['ymaps'] = "https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink";
require "core/base_views/VHead.php";
?>

<body class="block block_wrap">
<?php require "core/base_views/VMainToolbar.php" ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = "Сейсмичность";
    $Header_rightContent = "СП 14.13330.2018 Строительство в сейсмических районах.
                              Актуализированная редакция СНиП II-7-81*";
    require "views/page_templates/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">
            <nav class="catalog block">
                <ul>
                    <li><a href="#tables">Таблицы</a></li>
                    <li><a href="#maps">Карты</a></li>
                    <li><a href="seismic/allEarthquakes">Каталог изветных землятресений</a></li>
                    Полезные ссылки
                    <li><a href="http://neotec.ginras.ru/database.html" target="_blank">База данных разломов</a></li>
                    <li><a href="http://eqru.gsras.ru/stations/index.php" target="_blank">Сейсмические станции России</a></li>
                    <li><a href="http://www.gsras.ru/new/ssd_news.htm" target="_blank">Последние землетрясения</a></li>
                    <li><a href="http://www.ceme.gsras.ru/cgi-bin" target="_blank">Землетрясения в радиусе от заданной точки</a></li>
                    </ul>
            </nav>
        </aside>

        <section class="content content_with_sideBar block block_wrap main_bkg_color-4">

        <section class="block block_wrap main_bkg_color-4">

            <div id="tables" class="block block_wrap">
                <?php
                foreach ($regions as $region) {
                    $this->region = $region;
                    require "VTowns_by_regions.php";
                };
                ?>
            </div>


            <div id="maps" class="block block_wrap">

                <div class="block block_box resizable_2 resize-tl">
                    <img class="" src="/pages/seismic/resource/content/OSR-2015-A.png"
                         title="ОСР-2015-A" alt="ОСР-2015-A" width=400px height="">
                </div>
                <div class="block block_box resizable_2 resize-lc">
                    <img class="" src="/pages/seismic/resource/content/OSR-2015-B.png"
                         title="ОСР-2015-B" alt="ОСР-2015-B" width=400px height="">
                </div>
                <div class="block block_box resizable_2 resize-bl">
                    <img class="" src="/pages/seismic/resource/content/OSR-2015-C.png"
                         title="ОСР-2015-C" alt="ОСР-2015-C" width=400px height="">
                </div>


            </div>

        </section>
        </section>
    </main>
    <?php require "core/base_views/VSiteFooter.php" ?>
</div>
</body>
</html>













