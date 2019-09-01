<?php
use Application as A;
?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "SL-Число прописью";
$styles['main-css'] = A\config::SITE_URL() . "css/styles.css";
$scripts[] = '';
require "views/site/VHead.php";
?>

<body class="block block_wrap">
<?php require "views/site/VMainToolbar.php" ?>
<?php
$Header_leftContent = "Калькуляторы";
$Header_rightContent = "Число прописью";
require "views/page_templates/VMinorHeader.php";
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

    <section class="content content_width_sideBar block block_wrap fl fl_w main_bkg_color-4">

        <nav class="">
            <?php



            ?>
        </nav>

    </section>
</main>
<?php require "views/site/VSiteFooter.php" ?>
</body>
</html>













