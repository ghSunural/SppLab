<?php

use Application as A;


$subfolders = $this->models['files'];
//A\Debug::print_array($subfolders);


?>

<!DOCTYPE html>
<meta charset="windows-1251">

<html lang="ru">
<?php
$title = "SL-загрузки";
$styles['main-css'] = A\config::SITE_URL() . "css/styles.css";
$scripts[] = '';
require "core/base_views/VHead.php";
?>

<body class="block block_wrap">
<?php require "core/base_views/VMainToolbar.php" ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = "Загрузки";
    $Header_rightContent = "скачивание файлов";
    require "core/base_views/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

            <nav class="catalog block">
                <ul>
                    Файлы для скачивания
                    <li>Бланки</li>
                    <li>СНИПЫ</li>
                    <li>Книги</li>
                    <li>Программы</li>
                    <li>Примеры</li>
                    <li>Прочее</li>
                </ul>
            </nav>


        </aside>

        <section class="content content_with_sideBar block block_wrap fl fl_w main_bkg_color-4">


            <nav class="">

                <div class="block">

                </div>

                    <div class="block block_wrap fl fl_w  block_box download-row">
                        <div class="block block_inline block_box">
                            <a href= "downloads/{$ID}"><span class="fa fa-download fa-1x main_text_color-5"></span></a>
                        </div>
                        <div class="block block_inline block_box">
                            {name}
                        </div>
                        <div class="block block_inline block_box">
                            {description}
                        </div>
                    </div>



                    <?php

                    foreach ($subfolders as $path => $subfolder) {
                        echo $path . '<br>';
                        foreach ($subfolder as $file) {
                            //echo $file['name']."    ".$file['size'].'<br>';

                            echo $file['name'] . "    " . $file['size'] . '<br>';

                        }
                    }

                    ?>
            </nav>

        </section>
    </main>
    <?php require "core/base_views/VSiteFooter.php" ?>
</div>
</body>
</html>













