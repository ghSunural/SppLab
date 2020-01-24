<?php


?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "Железные дороги";
$styles['main-css'] = "css/styles.css";
$scripts['ymaps'] = "https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink";
require "core/base_views/VHead.php";
?>

<body class="block block_wrap">
<?php require "core/base_views/VMainToolbar.php" ?>

<div class="page block block_wrap">
    <?php
    $Header_leftContent = "ЖЕЛЕЗНЫЕ ДОРОГИ";
    $Header_rightContent = "Схемы ж.д. и контактные данные";
    require "core/base_views/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

            <nav class="site-map">
                <ul>
                    Схемы железных дорог
                    <li>Свердловская ж.д.</li>
                    <li>Южно-Уральская ж.д.</li>
                    <li>Красноярская ж.д.</li>
                    <li>Забайкальская ж.д.</li>
                    <li>Дальневосточная ж.д.</li>
                </ul>
            </nav>

        </aside>

        <section class="content content_with_sideBar block block_wrap  main_bkg_color-4">


            <?php require "core/base_views/Slider.php" ?>

            <?php

            $openDialog_header = "Карта";
            $openDialog_htmlContent = <<< EOL
            <div class="block block_box resizable_2 resize-bl">
                <img class="" src="/pages/railways/resource/content/SverdlovskRW.jpg"
                     title="Схема Свердловской ж.д." alt="Схема Свердловской ж.д." width="" height=80%>
            </div>
EOL;


            ?>
            <a href="#openModal">
                <div class="block block_box resizable_2 resize-bl">
                <img class="" src="/pages/railways/resource/content/SverdlovskRW.jpg"
                     title="Схема Свердловской ж.д." alt="Схема Свердловской ж.д." width=400px height="">
                </div>
            </a>


            <div class="block block_box resizable_2 resize-bl">

                <br>
                <a href="downloads/SverdlovskRW_jpg"><span
                            class="fa fa-download fa-1x main_text_color-5"> Скачать >>></span></a>
            </div>


            <div class="block block_box resizable_2 resize-bl">
                <img class="" src="/pages/railways/resource/content/SouthUralRW.jpg"
                     title="Схема Южно-Уральской ж.д." alt="Схема Южно-Уральской ж.д." width=400px height="">
                <br>
                <a href="downloads/SouthUralRW_jpg"><span
                            class="fa fa-download fa-1x main_text_color-5"> Скачать >>></span></a>
            </div>
            <br>

            <div class="block block_box resizable_2 resize-bl">
                <img class="" src="/pages/railways/resource/content/TransbaikalianRW.jpg"
                     title="Схема Забайкальской ж.д." alt="Схема Забайкальской ж.д." width=400px height="">
            </div>


            <div class="block block_box resizable_2 resize-bl">
                <img class="" src="/pages/railways/resource/content/FarEastRW.jpg"
                     title="Схема Дальневосточной ж.д." alt="Схема Дальневосточной ж.д." width=400px height="">
            </div>



        </section>
        <?php require "core/base_views/ModalDialog.php" ?>
    </main>
    <?php require "core/base_views/VSiteFooter.php" ?>

</div>
</body>
</html>











