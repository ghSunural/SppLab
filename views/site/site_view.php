<?php

use Application as A;
use Application\Views as V;
use Application\Models as M;

use Application\Controllers as C;

//A\config::SITE_URL() .

$styles[0] ="css/styles.css";
$head_as_html = V\Html::getView_Head("Spp-Lab", $styles);
?>


<!DOCTYPE html>
<html lang="ru">
<?php

echo $head_as_html;
echo <<<EOL
<!--
  <script src="https://api-maps.yandex.ru/2.1/?apikey=369c0410-04f2-44bc-8b5e-db38533c045b&lang=ru_RU"
  type="text/javascript">
  </script> -->
<script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink"
 type="text/javascript"></script>

EOL;
?>

<body class="block block_wrap">
<?php require "views/site/VMainToolbar.php"?>
<?php require "views/site/VSiteHeader.php"?>
<main class="Main block block_wrap fl fl_nw">

    <section class="content block block_wrap fl fl_w main_bkg_color-4">

        <div class="block tablet main_bkg_color-2">
            <div class="H1 main_text_color-5">Для технического отчета</div>
            <hr>
            <p align="justify" class="H_hint">
                Генерация отчетных таблиц по действующей нормативной документации в инженерных изысканиях
                <ul>
                    <li><a href="climate" target="_blank">Строительная климатология</a></li>
                    <li>Сейсмичность</li>
                </ul>
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

            <div class="H1 main_text_color-5">КАЛЬКУЛЯТОРЫ</div>
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
<?php require "views/site/VSiteFooter.php"?>
</body>
</html>

