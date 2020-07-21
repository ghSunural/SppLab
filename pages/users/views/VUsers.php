<?php

use Application as A;


$users = $this->models['users'];
$arrColumnHeaders = $this->models['arrColumnHeaders'];
$tableAsHtml = A\Html::convertRowsArray2HtmlTable($users, $arrColumnHeaders);

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = 'Пользователи';
$styles['main-css'] = '/css/styles.css';

require 'core/base_views/VHead.php';
?>

<body class="block block_wrap">
<?php require 'core/base_views/VMainToolbar.php' ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = 'АДМИН';
    $Header_rightContent = 'ПОЛЬЗОВАТЕЛИ';
    require 'core/base_views/VMinorHeader.php';

    ?>
    <script src="/pages/seismic/scripts/geoxml_display.js" type="text/javascript"></script>
    <main class="Main block block_wrap">
        <section class="content block  main_bkg_color-4">
            <section class="block main_bkg_color-4">

                <div class="block block_box bb contenteditable">
                    <?php
                    echo $tableAsHtml;
                    ?>
                </div>
                <br>

                <div class="form form-signin">
                    Управление пользователями
                    <form id="usersManager" method="post" action="/users">

                        <input class="input"
                               type="text"
                               name="login"
                               title=""
                               placeholder="Логин"
                               value="<?= '' ?>"
                               required>
                        <br>



                        <!--
                        <select class="input"
                                name="post"
                                title="должность">
                            <option class="input-cell" selected disabled value="Выберете должность"></option>
                            <option class="input-cell" value="">нет в списке</option>
                            <option class="input-cell" value="">Инженер-программист</option>
                            <option class="input-cell" value="">Ведущий геолог</option>
                        </select>

                        <br>
                        -->



                        <input type="reset" value="Очистить" class='main_bkg_color-1 main_text_color-1'>
                    </form>

                    <div class="block">
                        <input type="submit" name="delete" form="usersManager"
                               title="Удалить пользователя"
                               value="Удалить" class='main_bkg_color-1 main_text_color-1'>
                        <br>
                        <input type="submit" name="isWorker" form="usersManager"
                               title="Присвоить статус сотрудника"
                               value="Сотрудник" class='main_bkg_color-1 main_text_color-1'>
                    </div>

                </div>


            </section>

        </section>

    </main>
    <?php require 'core/base_views/VSiteFooter.php' ?>
</div>
</body>
</html>


<style>

    ._input {
        width: auto;
        border-collapse: collapse;
        padding: 4px;

    }

</style>

<style>


    #map {
        width: 90vw;
        height: 80vh;

    }

    .inputs {
        padding: 10px;
    }
</style>
















