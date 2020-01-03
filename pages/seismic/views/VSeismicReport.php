<?php

use Application as A;

$town = $this->models['town'];
?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "SL-Отчет";
$styles['main-css'] = A\config::SITE_URL() . "css/styles.css";

//$scripts['ymaps'] = "https://api-maps.yandex.ru/2.1/?lang=ru-RU";
$scripts['ymaps'] = "https://api-maps.yandex.ru/2.1/?apikey=ваш API-ключ&lang=ru_RU&load=Geolink";
require "core/base_views/VHead.php";
?>

<body class="block block_wrap">
<?php require "core/base_views/VMainToolbar.php" ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = "Отчет. Сейсмичность";
    $Header_rightContent = <<<EOL
     <div class="">
         <span class="ymaps-geolink">{$town->locality}</span>  ({$town->region})
     </div>

EOL;
    require "views/page_templates/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

            <nav class="">
                <ul>
                    Выкопировки из документов
                    <li>Строительная климатология</li>
                    <li>СП 14.13330.2018 Строительство в сейсмических районах. Актуализированная редакция СНиП
                        II-7-81*
                    </li>

                </ul>
            </nav>


        </aside>
        <section class="content content_with_sideBar block block_wrap main_bkg_color-4">
            <section class="block block_wrap  main_bkg_color-4">

                <div class="block block_box">
                    <span class="ymaps-geolink"> <?php echo $town->locality . "  (" . $town->region . ")" ?></span>
                </div>
                <nav class="">
                    <?php
                    echo "</br>";
                    require "VTable_seismicMSK.php";
                    ?>
                </nav>
            </section>
        </section>
    </main>

    <?php require "core/base_views/VSiteFooter.php" ?>
</div>

<script type="text/javascript">

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }


    //  printCold.onclick = printDiv('report1');

    window.onload = function () {

        contenteditable();
        // printableArea.setAttribute('contenteditable', true);

    }

    function contenteditable() {
        var tds = document.getElementsByClassName("report-layout");//возвращает массив всех <td>
        for (var i = 0; i < tds.length; i++) {
            tds[i].setAttribute('contenteditable', true);
        }

    }

</script>

</body>














