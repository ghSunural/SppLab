<?php
?>

<!DOCTYPE html>
<html lang="ru">

<?php
$title = 'SPP-Lab';
$styles['main-styles'] = '/styles/styles.styles';

require 'core/base_views/VHead.php';
?>

<body class="block block_wrap">

<?php
require 'core/base_views/VMainToolbar.php'
?>
<?php
require 'core/base_views/VSiteHeader.php'
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
                <li><a href="geocolumn" target="">Геологические колонки</a></li>
            </ul>
            </p>

            <hr>
            <p align="justify" class="H_hint">
                Генерация отчетных таблиц по действующей нормативной документации в инженерных изысканиях
            </p>
        </div>

        <div class="block tablet main_bkg_color-2">
            <div class="H1 main_text_color-5">Загрузки</div>
            <hr>
            <p>
            <ul>
                <li><a href="download/refs" target="">Нормативная документация</a></li>
                <li><a href="download/refs" target="">Бланки для технического отчета</a></li>
                <li><a href="download/refs" target="">Бланки организационной деятельности</a></li>
                <li><a href="download/refs" target="">Программное обеспечение</a></li>
            </ul>
            </p>

            <hr>
            <p align="justify" class="H_hint">
                Ссылки для скачивания
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
            </ul>
            <hr>
            <p align="justify" class="H_hint">
                Для железнодорожников
            </p>

            </p>
        </div>


        <div class="block tablet main_bkg_color-2">
            <div class="H1 main_text_color-5">
                Инженерная геофизика
            </div>
            <hr>
            <p>
            <ul>
                <li><a href="geophysics/articles" target="">Статьи и советы</a></li>
                <li><a href="geophysics/programms" target="">Программы обработки</a></li>
                <li><a href="/" target="">Англо-русский словарь геофизических терминов</a></li>
            </ul>
            </p>

            <hr>
            <p align="justify" class="H_hint">
                Программы, статьи, примеры
            </p>
        </div>

        <div class="block tablet main_bkg_color-2">

            <div class="H1 main_text_color-5">
                Геоданные
            </div>
            <hr>

            <ul>
                <li><a href="calculators/converterGeo" target="">Конвертер в геоданные</a></li>
                <li><a href="calculators/photoGps" target="">Фото с координатами</a></li>
            </ul>
            <hr>
            <p align="justify" class="H_hint">
                Работ с данными, имеющими географические координаты
            </p>

        </div>

        <div class="block tablet main_bkg_color-2">

            <div class="H1 main_text_color-5">
                КАЛЬКУЛЯТОРЫ
            </div>
            <hr>

            <ul>
                <li><a href="calculators/num2str" target="">Число прописью</a></li>
            </ul>
            <hr>
            <p align="justify" class="H_hint">
                Сервис вспомогательных вычислений
            </p>

        </div>

    </section>
</main>
<?php
require 'core/base_views/VSiteFooter.php'
?>
</body>
</html>
