<?php

use Application as A;

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = 'SL-ТЕСТ';
$styles['main-css'] = A\config::SITE_URL().'css/styles.css';
$scripts[] = '';
require 'core/base_views/VHead.php';
?>
<!--ПОДКЛЮЧЕНИЕ ДОПОЛНИТЕЛЬНЫХ СКРИПТОВ-->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#draggable").draggable();
    });
</script>

<script>

    $("#button").click(function () {
            $("document").ready(function () {
                $("#panel").slideDown("slow");
            });
        }
    )
</script>


<!-- ---------------------  -->


<body class="block block_wrap">

<?php require 'core/base_views/VMainToolbar.php' ?>


<div class="page block block_wrap">

    <?php
    $Header_leftContent = 'Тесты';
    $Header_rightContent = 'Тестирование функции и видов';
    require 'core/base_views/VMinorHeader.php';
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">
            <nav class="catalog block">
                <ul>
                    Тесты
                    <li>функций</li>
                    <li>видов</li>
                    <li>HTML&CSS</li>
                    <li><a href="/my-tests/empty" target="_blank">ПУСТОЙ ЛИСТ</a></li>
                </ul>
            </nav>
        </aside>

        <section class="content content_with_sideBar block block_wrap fl fl_w main_bkg_color-4">

            <div id="draggable" class="test-b1">
                <p>Drag me around</p>
            </div>


            <nav class="block block_box">

                <div class="H1">ТЕСТ-КОД</div>


                <input id="button" type="button" value="Кнопка">

                <div id="panel" class="block block_box">
                    #panel
                </div>

                <iframe src="https://docs.google.com/viewer?url=http://spplab.000webhostapp.com/resource/content/pdf/SVRW_2018.pdf&embedded=true"
                        style="width: 600px; height: 600px;" frameborder="0">Ваш браузер не поддерживает фреймы
                </iframe>


                <?php
                echo '<br>'.'В начале кода РHP'.'<br>';
                echo '<br>'.'В конце кода PHP'.'<br>';
                ?>
            </nav>


            <input type=button class="buttons; ngstop"
                   value="Стоп" OnClick="if(confirm('Здесь какой то вопрос?!'))
                       document.getElementById('action').value='/etc/init.d/nginx stop';
                   submit();"/>

        </section>
    </main>
    <?php require 'core/base_views/VSiteFooter.php' ?>
</div>
</body>
</html>
