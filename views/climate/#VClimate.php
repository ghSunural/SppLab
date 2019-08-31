<?php


use Application as A;
use Application\Views as V;
use Application\Models as M;

use Application\Controllers as C;

//A\config::SITE_URL() .
$regions = $this->models['regions'];
$styles[0] = "css/styles.css";
$head_as_html = V\Html::getView_Head("Spp-Lab", $styles);
?>


<!DOCTYPE html>
<html lang="ru">
<?php


echo $head_as_html;
echo <<<EOL
<!--
  <script src="https://api-maps.yandex.ru/2.1/?apikey=369c0410-04f2-44bc-8b5e-db38533c045b&lang=ru_RU"
  type="text/javascript">
  </script> -->
<script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink"
 type="text/javascript"></script>
EOL;
?>

<body class="block block_wrap">
<?php require "views/site/VMainToolbar.php" ?>
<?php require "views/page_templates/VMinorHeader.php" ?>
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
            foreach ($regions as $region) {
                $this->region = $region;
                require A\config::SITE_ROOT() . "views/climate/VTowns_by_regions.php";
            };
            ?>
        </nav>

    </section>
</main>
<?php require "views/site/VSiteFooter.php" ?>
</body>
</html>











