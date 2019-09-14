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
require "views/site/VHead.php";
?>

<body class="block block_wrap">
<?php require "views/site/VMainToolbar.php" ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = "Сейсмичность";
    $Header_rightContent = "СП 14.13330.2018 Строительство в сейсмических районах.
                              Актуализированная редакция СНиП II-7-81*";
    require "views/page_templates/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

            <nav class="catalog block">
                <ul>
                    <li><a href="#tables">Таблицы</a></li>
                    <li><a href="#maps">Карты</a></li>

                </ul>
            </nav>


        </aside>
        <section class="content content_width_sideBar block block_wrap main_bkg_color-4">
        <section class="block block_wrap fl fl_w main_bkg_color-4">

            <nav id="tables" class="">
                <?php
                foreach ($regions as $region) {
                    $this->region = $region;
                    require "VTowns_by_regions.php";
                };
                ?>
            </nav>


            <nav id="maps" class="">

                <div class="block block_box resizable_2 resize-tl">
                    <img class="" src="../../../resource/content/images/pages/OSR-2015-A.png"
                         title="ОСР-2015-A" alt="ОСР-2015-A" width=400px height="">
                </div>
                <div class="block block_box resizable_2 resize-lc">
                    <img class="" src="../../../resource/content/images/pages/OSR-2015-B.png"
                         title="ОСР-2015-B" alt="ОСР-2015-B" width=400px height="">
                </div>
                <div class="block block_box resizable_2 resize-bl">
                    <img class="" src="../../../resource/content/images/pages/OSR-2015-C.png"
                         title="ОСР-2015-C" alt="ОСР-2015-C" width=400px height="">
                </div>


            </nav>

        </section>
        </section>
    </main>
    <?php require "views/site/VSiteFooter.php" ?>
</div>
</body>
</html>













