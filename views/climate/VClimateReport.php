<?php

use Application as A;

$town = $this->models['town'];
?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "SL-Отчет";
$styles['main-css'] = A\config::SITE_URL() . "css/styles.css";
$scripts['ymaps'] = "https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink";
require "views/site/VHead.php";
?>

<body class="block block_wrap">
<?php require "views/site/VMainToolbar.php" ?>
<?php
$Header_leftContent = "Отчет. Климатология";
$Header_rightContent =  <<<EOL
     <div class="">
         <span class="ymaps-geolink"> {$town->locality} ({$town->region})</span>
     </div>
EOL;

require "views/page_templates/VMinorHeader.php";
?>

<main class="Main block block_wrap fl fl_nw">

    <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

        <nav class="catalog block">
            <ul>
                Выкопировки из документов
                <li>Строительная климатология</li>
                <li>СП 14.13330.2018 Строительство в сейсмических районах. Актуализированная редакция СНиП II-7-81*</li>
            </ul>
        </nav>


    </aside>

    <section class="content content_width_sideBar block block_wrap fl fl_w main_bkg_color-4">

        <nav class="">

            <?php
            echo "</br>";
            require A\config::SITE_ROOT() . "views/climate/VTable_3_1_coldSeason.php";
            echo "</br>";
            require A\config::SITE_ROOT() . "views/climate/VTable_4_1_warmSeason.php";
            echo "</br>";
            require A\config::SITE_ROOT() . "views/climate/VTable_5_1_temperature.php";
            ?>

        </nav>

    </section>
</main>
<?php require "views/site/VSiteFooter.php" ?>
</body>
</html>












