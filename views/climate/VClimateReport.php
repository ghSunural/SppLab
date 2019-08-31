<?php


use Application as A;
use Application\Views as V;
use Application\Models as M;


//$regions = $this->models['climateTown'];

$town = $this->models['town'];


//Debug::print_array($regions);

$styles[0] = A\config::SITE_URL() . "css/styles.css";
$head_as_html = V\Html::getView_Head("Отчет климатология", $styles);


?>


<!DOCTYPE html>
<html lang="ru">
<?= $head_as_html ?>
<script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink"
        type="text/javascript"></script>

<body class="block block_wrap">

<nav class="Main_toolbar block block_wrap fl fl-w">

    Главная страница
    <div class="block block_inline">
        <!-- <label for="search">Найти</label> -->
        <a href=""><span class="fa fa-search fa-2x"></span></a>
        <input id="search" name="search" type="search">

    </div>
</nav>

<header class="Header block block_wrap fl fl-w main_bkg_color-1">

    <div class="logo block block_inline"></div>


    <div class="logo__title-site block block_inline main_text_color-2">SPP-Lab</div>


    <div class="contact-info block block_inline">
        <div class="block">

        </div>
    </div>
</header>
<main class="Main block block_wrap fl fl_nw">

    <section class="content block block_wrap">


        <nav class="block">

            <?php

            echo <<<EOL
            <div class="block text_header_bar">
                <span class="ymaps-geolink"> {$town->locality} ({$town->region})</span>
            </div>
EOL;

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




</body>
</html>

