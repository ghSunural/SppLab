<?php

use Application as A;

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = 'SL-Геофизика';
$styles['main-styles'] = A\config::SITE_URL() . 'styles/styles.css';
$scripts[] = '';
require 'core/base_views/VHead.php';
?>

<body class="block block_wrap">
<?php require 'core/base_views/VMainToolbar.php' ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = 'ИНЖЕНЕРНАЯ ГЕОФИЗИКА';
    $Header_rightContent = '';
    require 'core/base_views/VMinorHeader.php';
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

            <nav class="catalog block">
                <ul>
                    Обработка геофизических данных
                    <li>Георадар</li>
                    <li>Электротомография</li>
                    <li>Сейсморазведка</li>
                    <li><a href="/pages/geophysics/articles/Velocity.html">Скорости упругих волн</a></li>
                </ul>
            </nav>


        </aside>

        <section class="content content_with_sideBar block block_wrap fl fl_w main_bkg_color-4">

            <article>
                <div class="H1">ССЫЛКИ ДЛЯ СКАЧИВАНИЯ</div>
                <div class="H2">Программы</div>
                <div>
                    <div class="block_inline"><a href="resource/content/download/programs/GeoSemDem_v3_2021E.exe" download>GeoSemDem.exe</a></div>
                    <div class="block_inline">
                        Программа для вспомогательной обработки радарограмм в формате GPR и GPR2
                    </div>
                </div>
                <div>
                    <div class="block_inline"><a href="resource/content/download/programs/Sodales.exe">Sodales.exe</a></div>
                    <div class="block_inline">
                        Программа для построения геологических разрезов по цифровым данным
                    </div>
                </div>
                <div>
                    <div class="block_inline"><a href="resource/content/download/programs/Effingo.xlam" download>Effingo.xlam</a></div>
                    <div class="block_inline">
                        Надстройка Excel с полезными функциями
                    </div>
                </div>

                <br>
                <div class="H2">Примеры входных данных</div>
                <div class=""><a href="resource/content/download/examples/Layers_DigitalModel.xls">Данные для построения геологических
                        слоев</a></div>
                <div class=""><a href="resource/content/download/examples/Hole_DigitalModel.xls">Данные для построения горных выработок</a>
                </div>

                <br>
                <br>
                <div class="H2">Бланки</div>

                <div class=""><a href="resource/content/download/examples/Hole_DigitalModel.xls">Ведомость описания горных выработок</a></div>
                <br>
                <div class="">OpenOfficeDraw</div>

                <div>
                    ГОСТ Р 21.1101-2013 Система проектной документации для строительства (СПДС).<br>
                    Основные требования к проектной и рабочей документации (с Поправкой)<br>
                    <div class=""><a href="/download/Blank_GOSTR21.1101-2013_stump_odg">Бланк с штампом</a></div>
                    <div class=""><a href="/download/Blank_GOSTR21.1101-2013_custom_odg">Бланк произвольного формата</a>
                    </div>
                    <div class=""><a href="/download/Blank_GOSTR21.1101-2013_A4book_odg">Бланк A4 книжная ориентация</a>
                    </div>
                    <div class=""><a href="/download/Blank_GOSTR21.1101-2013_A3landscape_odg">Бланк A3 альбомная
                            ориентация</a></div>


                </div>


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
    <?php require 'core/base_views/VSiteFooter.php' ?>
</div>
</body>
</html>
