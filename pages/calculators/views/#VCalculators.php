<?php
?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "SL-Калькуляторы";
$styles['main-css'] = "/css/styles.css";
$scripts[] = '';
require "core/base_views/VHead.php";
?>

<body class="block block_wrap">
<?php require "core/base_views/VMainToolbar.php" ?>
<div class="page block block_wrap">
<?php
$Header_leftContent = "Калькуляторы";
$Header_rightContent = "";
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

    <section class="content content_with_sideBar block block_wrap fl fl_w main_bkg_color-4">

        <nav class="">
            <?php



            ?>
        </nav>

    </section>
</main>
<?php require "core/base_views/VSiteFooter.php" ?>
</div>
</body>
</html>













