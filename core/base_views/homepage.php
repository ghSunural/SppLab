<!DOCTYPE html>
<html lang="ru">

<?php
$title = 'SPP-Lab';
$styles['main-css'] = '/css/styles.css';

require 'core/base_views/VHead.php';
?>

<body class="block block_wrap">

<?php
require 'core/base_views/VMainToolbar.php'
?>


<main class="Main block block_wrap fl fl_nw">


    <section class="content block block_wrap fl fl_w">

        <div class="darkened main_bkg_color-1">



        <div class="block block_wrap fl fl_w logo">
            <div class="block block_inline main_bkg_color-1 main_text_color-1 logo_left">
                <div class="Main_header_left_top ">
                    SPP&nbsp;
                </div>
            </div>
            <div class="main_bkg_color-2 main_text_color-2 logo_right">
                &nbsp;LAB
            </div>
        </div>

        </div>

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

<style>
    .darkened {
        position: relative;
        top: 8vh;

    }

    .darkened::before {
        height: 75vh;
        content: '';
        position: absolute;
        top: 8vh;
        left: 0;
        right: 0;
        bottom: 0;
        background-color:   #2E2633;
        opacity: 90%;
        z-index: 1;
    }
     img {

         z-index: 0;
         width: 96vw;
     }

    .home_title{
        position: relative;

        display: inline-block;
        align-items: center;
        justify-content: stretch;
        height: 10vh;
        font-size: 10vh;
        font-weight: bold;
    }

</style>


<style type="text/css">
    .logo {
        display: flex;
        vertical-align: center;

        /*background: linear-gradient(to right bottom, #ffffff 10%, #3c7839) ;*/
        height: 32vh;
        justify-content: center;
        border: 5px #99173C solid;

        z-index: 2;
        border-radius: 300px;
        opacity: 90%;
    }

    .logo_left {
        width: 25vh;
        border-bottom-left-radius: 300px;
        border-top-left-radius: 300px;
    }

    .logo_right {
        width: 25vh;
        border-bottom-right-radius: 300px;
        border-top-right-radius: 300px;


        align-items: center;
        justify-content: flex-start;
        vertical-align: center;
        height: 30vh;
        font-size: 10vh;
        font-weight: bold;
    }

    .Main_header_left_top {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        height: 10vh;
        font-size: 10vh;
        font-weight: bold;

    }

    .Main_header_left_bottom {

    }

    .Main_header_right_top {
        font-size: 2vh;
        font-weight: bold;
        height: 30%;
        font-style: italic;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: nowrap;


    }

    .Main_header_right_bottom {

        /*
        display: flex;
        align-items: center;
        justify-content: flex-start;
        font-weight: bold;
        height: 25vh;
        */

        display: flex;

        justify-content: flex-start;
        height: 10vh;
        font-size: 10vh;
        font-weight: bold;

    }

    .animated {
        /* transition-timing-function */
        /*  transition-delay */
    }
</style>