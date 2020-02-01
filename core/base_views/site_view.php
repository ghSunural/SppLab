<!DOCTYPE html>
<html lang="ru">

<?php
$title = "SPP-Lab";
$styles['main-css'] = "/css/styles.css";
$scripts['ymaps'] = "https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink";
require "core/base_views/VHead.php";
?>

<body class="block block_wrap">

<?php
require "core/base_views/VMainToolbar.php"
?>
<?php
require "core/base_views/VSiteHeader.php"
?>

<main class="Main block block_wrap fl fl_nw">

    <section class="content block block_wrap fl fl_w main_bkg_color-4">

        <div class="block tablet main_bkg_color-2">
            <div class="H1 main_text_color-5">Для технического отчета</div>
            <hr>
            <p>
            <ul>
                <li><a href="climate" target="">Строительная климатология</a></li>
                <li><a href="seismic" target="">Сейсмичность</a></li>
            </ul>
            </p>

            <hr>
            <p align="justify" class="H_hint">
                Генерация отчетных таблиц по действующей нормативной документации в инженерных изысканиях
            </p>
        </div>

        <div class="block tablet main_bkg_color-2">
            <div class="H1 main_text_color-5">
                Железные дороги
            </div>
            <hr>
            <p>
            <ul>
                <li><a href="railways" target="_parent">Схемы железных дорог</a></li>
                <li><a href="" target="">Контактные данные представителей</a></li>
            </ul>
            </p>
        </div>


        <div class="block tablet main_bkg_color-2">
            <div class="H1 main_text_color-5">
                Инженерная геофизика
            </div>
            <hr>
            <p>
            <ul>
                <li><a href="geophysics" target="">Статьи и советы</a></li>
                <li><a href="" target="">Программы обработки</a></li>
                <li><a href="" target="">Скрипты и все прочее</a></li>
            </ul>
            </p>

            <hr>
            <p align="justify" class="H_hint">
                Советы, программы и все то, чего так не хватает
            </p>
        </div>

        <div class="block tablet main_bkg_color-2">

            <div class="H1 main_text_color-5">
                <a href="calculators" target="">КАЛЬКУЛЯТОРЫ</a>
            </div>
            <hr>
            <p align="justify" class="H_hint">
                Сервис вспомогательных вычислений
            <ul>
                <li><a href="calculators/converterKML" target="">Конвертер KML</a></li>
                <li><a href="calculators/num2str" target="">Число прописью</a></li>
            </ul>
            </p>
        </div>

    </section>
</main>
<?php
require "core/base_views/VSiteFooter.php"
?>
</body>
</html>

