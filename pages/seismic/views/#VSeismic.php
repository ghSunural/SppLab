<?php

$regions = $this->models['regions'];

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = 'SL-Сейсмичность';
$styles['main-styles'] = 'styles/styles.styles';
//$scripts['ymaps'] = "https://api-maps.yandex.ru/2.1/?apikey=369c0410-04f2-44bc-8b5e-db38533c045b&lang=ru_RU&load=Geolink";
require 'core/base_views/VHead.php';
?>

<body class="block block_wrap">
<?php require 'core/base_views/VMainToolbar.php' ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = 'Сейсмичность';
    $Header_rightContent = 'СП 14.13330.2018 Строительство в сейсмических районах.
                              Актуализированная редакция СНиП II-7-81*';
    require 'core/base_views/VMinorHeader.php';
    require 'core/base_views/VBreadCrumbs.php';
    ?>

    <main class="Main block block_wrap">

<div class="block fl fl-w">
        <section class="block content_with_rightSideBar main_bkg_color-4">

        <section class="block block_wrap main_bkg_color-4">

            <div id="tables" class="block block_wrap">
                <?php
                foreach ($regions as $region) {
                    $this->region = $region;
                    require 'VTowns_by_regions.php';
                }
                ?>
            </div>


            <div id="maps" class="block block_wrap">

                <div class="block block_box resizable_2 resize-tl">
                    <img class="" src="/pages/seismic/resource/content/OSR-2016-A.jpg"
                         title="ОСР-2016-A" alt="ОСР-2016-A" width=400px height="">
                </div>
                <div class="block block_box resizable_2 resize-lc">
                    <img class="" src="/pages/seismic/resource/content/OSR-2016-B.jpg"
                         title="ОСР-2016-B" alt="ОСР-2016-B" width=400px height="">
                </div>
                <div class="block block_box resizable_2 resize-bl">
                    <img class="" src="/pages/seismic/resource/content/OSR-2016-C.jpg"
                         title="ОСР-2016-C" alt="ОСР-2016-C" width=400px height="">
                </div>

                <iframe src="https://www.google.com/maps/d/embed?mid=1fvvLEiH06jiUxjwDy-JPxsQ6PXzRJwRc"
                        width="640" height="480"></iframe>

            </div>

        </section>
        </section>
        <aside class="block right-side-bar main_bkg_color-2 main_text_color-2">
            <nav class="catalog block">
                <ul>
                    <li><a href="#tables">Таблицы</a></li>
                    <li><a href="#maps">Карты</a></li>
                    <li><a href="/seismic/earthquakes">Каталог известных землятресений</a></li>
                    Полезные ссылки
                    <li><a href="http://neotec.ginras.ru/database.html" target="_blank">База данных разломов</a></li>
                    <li><a href="http://eqru.gsras.ru/stations/index.php" target="_blank">Сейсмические станции России</a></li>
                    <li><a href="http://www.gsras.ru/new/ssd_news.htm" target="_blank">Последние землетрясения</a></li>
                    <li><a href="http://www.ceme.gsras.ru/cgi-bin" target="_blank">Землетрясения в радиусе от заданной точки</a></li>
                    <li><a href="https://earthquake.usgs.gov/earthquakes/search/" target="_blank">Американский каталог</a></li>

                </ul>
            </nav>
        </aside>
</div>
    </main>
    <?php require 'core/base_views/VSiteFooter.php' ?>
</div>
</body>
</html>













