<?php

use Application as A;

$num = $this->models['num'];

$result = $this->models['result'];
?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "Конвертер KML";
$styles['main-css'] = A\config::SITE_URL() . "css/styles.css";
//$scripts['geocalcs'] = '/pages/calculators/scripts/geocalcs.js';
require "core/base_views/VHead.php";
?>

<body class="block block_wrap">
<?php require "core/base_views/VMainToolbar.php" ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = "Калькуляторы";
    $Header_rightContent = "Конвертер в геоданные";
    require "core/base_views/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

            <nav class="catalog block">
                <ul>
                    Калькуляторы
                    <li>Число прописью</li>
                </ul>
            </nav>


        </aside>

        <section class="content content_with_sideBar block block_wrap  main_bkg_color-4">

            <div id="#content">Hello KMl</div>
            <br>
            <div>Геоданные</div>
            <div id="example" title="Скопируйте сюда текстовую таблицу"></div>

            <input type="button" value = "Экспорт KML" onclick="geocalcs.alertshow()">
            <input type="button" value = "Сохранить" onclick="geocalcs.saveToFile('#content')">

        </section>
    </main>
    <?php require "core/base_views/VSiteFooter.php" ?>
</div>
<!--
<script src="https://cdn.jsdelivr.net/npm/handsontable@7.3.0/dist/handsontable.full.min.js"></script>
-->
<link href="https://cdn.jsdelivr.net/npm/handsontable@7.3.0/dist/handsontable.full.min.css" rel="stylesheet" media="screen">
<script src="/pages/calculators/scripts/kml.js"></script>
<script src="/pages/calculators/scripts/geo/geocalcs.js"></script>
<script src="/js_base/node_modules/handsontable/dist/handsontable.full.min.js"></script>


</body>
</html>

<script>



</script>













