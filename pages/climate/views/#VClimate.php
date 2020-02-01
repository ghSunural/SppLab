<?php

$regions = $this->models['regions'];
?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = 'SL-Климат';
$styles['main-css'] = 'css/styles.css';

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
require 'core/base_views/VMinorHeader.php';
?>

<main class="Main block block_wrap fl fl_nw">

    <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

        <nav class="site-map">
            <ul>
                Выкопировки из документов
                <li>Строительная климатология</li>
                <li>СП 14.13330.2018 Строительство в сейсмических районах. Актуализированная редакция СНиП II-7-81*</li>
            </ul>
        </nav>


    </aside>

    <section class="content content_with_sideBar block block_wrap fl fl_w main_bkg_color-4">

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











