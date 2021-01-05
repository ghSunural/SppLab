<?php

use Application as A;

$num = $this->models['num'];

$result = $this->models['result'];
?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = 'SL-Число прописью';
$styles['main-styles'] = A\config::SITE_URL().'styles/styles.styles';
$scripts[] = '';
require 'core/base_views/VHead.php';
?>

<body class="block block_wrap">
<?php require 'core/base_views/VMainToolbar.php' ?>
<div class="page block block_wrap">
<?php
$Header_leftContent = 'Калькуляторы';
$Header_rightContent = 'Число прописью';
require 'core/base_views/VMinorHeader.php';
?>

<main class="Main block block_wrap fl fl_nw">

    <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

        <nav class="catalog block">
            <ul>
                Калькуляторы
                <li>Число прописью</li>
            </ul>
        </nav>


    </aside>

    <section class="content content_with_sideBar block block_wrap fl fl_w main_bkg_color-4">

        <div class="block block_box">

            <form action="/calculators/num2str" method="post">
                <p><input name="number"  type="number" step="0.01" placeholder="Введите число" class="input-text" value="<?=$num?>"</p>
                <p>
                    <input type="submit" title="Нажмите, чтобы получить заданное число прописью" value="Число прописью">
                </p>
            </form>


            <span class="H4">Выделите и скопируйте результат</span>
            <br>

            <p>
                <input type="text" placeholder="Результат"
                       value="<?php echo mb_substr(mb_strtoupper($result, 'utf-8'), 0, 1, 'utf-8').
                           mb_substr($result, 1, mb_strlen($result) - 1, 'utf-8') ?>" class="input-text">
            </p>


        </div>


    </section>
</main>
<?php require 'core/base_views/VSiteFooter.php' ?>
</div>
</body>
</html>













