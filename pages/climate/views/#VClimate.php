<?php

$regions = $this->models['regions'];
?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = 'SL-Климат';
$styles['add-styles'] = 'styles/styles.css';
$styles['main-styles'] = '/template/spplab/css/style.css';

require 'core/base_views/VHead.php';
?>


<body class="block block_wrap">
<?php require 'core/base_views/VMainToolbar.php' ?>

<div class="page block block_wrap">
<?php
$Header_leftContent = 'Строительная климатология';
$Header_rightContent = 'СП 131.13330.2018 "СНиП 23-01-99* Строительная климатология"'
    .'<br>'.'СП 22.13330.2016 Основания зданий и сооружений.
    Актуализированная редакция СНиП 2.02.01-83* (с Изменениями №1, 2)';
//require 'core/base_views/VMinorHeader.php';
require 'core/base_views/VBreadCrumbs.php';
?>

<main class="Main block block_wrap fl fl_nw">



    <section class="content block block_wrap fl fl_w text-separ ">

        <nav class="">

            <?php

            foreach ($regions as $region) {
                $this->region = $region;
                require 'VTowns_by_regions.php';
            }
            ?>
        </nav>

    </section>
</main>
<?php require 'core/base_views/VSiteFooter.php' ?>

</div>
</body>
</html>











