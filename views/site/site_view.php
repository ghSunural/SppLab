<!DOCTYPE html>
<html lang="ru">

<?php
$title = "SPP-Lab";
$styles['main-css'] = "/css/styles.css";
$scripts['ymaps'] = "https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink";
    require "views/site/VHead.php";
?>

<body class="block block_wrap">

<?php
    require "views/site/VMainToolbar.php"
?>
<?php
    require "views/site/VSiteHeader.php"
?>

<main class="Main block block_wrap fl fl_nw">

    <section class="content block block_wrap fl fl_w main_bkg_color-4">

        <div class="block tablet main_bkg_color-2">
            <div class="H1 main_text_color-5">Для технического отчета</div>
            <hr>
            <p align="justify" class="H_hint">

            <ul>
                <li><a href="climate" target="_blank">Строительная климатология</a></li>
                <li>Сейсмичность</li>
            </ul>
            <hr>
            Генерация отчетных таблиц по действующей нормативной документации в инженерных изысканиях
            </p>
        </div>
        <div class="block tablet main_bkg_color-2">

            <div class="H1 main_text_color-5">Обработка геофизических данных</div>
            <hr>
            <p align="justify" class="H_hint">
                Построение геологического разреза по заданной цифровой модели
            </p>
        </div>
        <div class="block tablet main_bkg_color-2">

            <div class="H1 main_text_color-5">
                <a href="calculators" target="_blank">КАЛЬКУЛЯТОРЫ</a>
            </div>
            <hr>
            <p align="justify" class="H_hint">
                Сервис вспомогательных вычислений
            <ul>
                <li><a href="calculators/num2str" target="_blank">Число прописью</a></li>


            </ul>
            </p>
        </div>

    </section>
</main>
<?php
    require "views/site/VSiteFooter.php"
?>
</body>
</html>

