<?php

use Application as A;
use Application\Views as V;

$regions = $this->models['regions'];
$styles[0] = A\config::SITE_URL() . 'styles/styles.styles';
$head_as_html = V\Html::getView_Head('Spp-Lab', $styles);
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

    <div class="H1 main_text_color-5">FFFFFFFFF</div>

    <?php
    foreach ($regions as $region) {
        $this->region = $region;

        require A\config::SITE_ROOT() . '/views/climate/VTowns_by_regions.php';
        // A\Debug::print_array($townsInRegions);
    }
    ?>

</nav>


