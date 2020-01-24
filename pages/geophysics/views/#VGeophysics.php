<?php

use Application as A;

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "SL-Геофизика";
$styles['main-css'] = A\config::SITE_URL() . "css/styles.css";
$scripts[] = '';
require "core/base_views/VHead.php";
?>

<body class="block block_wrap">
<?php require "core/base_views/VMainToolbar.php" ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = "ИНЖЕНЕРНАЯ ГЕОФИЗИКА";
    $Header_rightContent = "";
    require "core/base_views/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

            <nav class="catalog block">
                <ul>
                    Обработка геофизических данных
                    <li>Георадар</li>
                    <li>Электротомография</li>
                    <li>Сейсморазведка</li>
                </ul>
            </nav>


        </aside>

        <section class="content content_with_sideBar block block_wrap fl fl_w main_bkg_color-4">

            <article>
                <?= require_once "./pages/geophysics/articles/synchronization_systems.php" ?>
            </article>


            <!--
            <nav class="">

                <ul class="tabs">
                    <li><a href="#one">1</a></li>
                    <li><a href="#two">2</a></li>
                    <li><a href="#three">3</a></li>
                    <li><a href="#four">4</a></li>
                    <li><a href="#five">5</a></li>
                </ul>
                <div class="tabs-content">
                    <ul>
                        <li id="one">Содержимое 1-й вкладки</li>
                        <li id="two">Содержимое 2-й вкладки</li>
                        <li id="three">Содержимое 3-й вкладки</li>
                        <li id="four">Содержимое 4-й вкладки</li>
                        <li id="five">Содержимое 5-й вкладки</li>
                    </ul>
                </div>
            </nav>-->
        </section>

    </main>
    <?php require "core/base_views/VSiteFooter.php" ?>
</div>
</body>
</html>
