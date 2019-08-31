<?php


use Application as A;
use Application\Views as V;
use Application\Models as M;
use Application\Controllers as C;

$regions = $this->models['regions'];
$styles[0] = A\config::SITE_URL() . "css/styles.css";
$head_as_html = V\Html::getView_Head("Spp-Lab", $styles);
?>

<aside class="side-bar block block_wrap">

    <nav class="catalog block">
        <ul>
            Нормативные документы
            <li>Строительная климатология</li>
        </ul>
    </nav>


</aside>

<nav class="block">

    <div class="H1 main_text_color-5">СП 131.13330.2018 "СНиП 23-01-99* Строительная климатология"</div>

    <?php
    foreach ($regions as $region) {

        $this->region = $region;

        require A\config::SITE_ROOT() . "views/climate/VTowns_by_regions.php";
        // A\Debug::print_array($townsInRegions);
    };
    ?>

</nav>


