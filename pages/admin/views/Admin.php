<?php
$users = $this->models['users'];
/*
$_FILES['image'];

if (is_uploaded_file()) {
    move_uploaded_file($_FILES['image']['tmp_name'],
        $_SERVER['DOCUMENT_ROOT'] . "resource/content/download" . filen);
}
*/

//'image' name поля

$db_response = $this->models['db_response'];
$sql_body = $this->models['sql_body'];

use Application\Html;

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = 'SL-Админ';
//$styles['main-css'] = A\config::SITE_URL() . "css/styles.css";
$styles['main-css'] = '/css/styles.css';
//$scripts['thisJS'] = A\config::SITE_URL() . "pages/admin/scripts/scripts.js";
//$scripts['thisJS'] = "/pages/admin/scripts/scripts.js";
require 'core/base_views/VHead.php';
?>

<body class="block block_wrap">
<?php require 'core/base_views/VMainToolbar.php' ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = 'Админ';
    $Header_rightContent = 'администрирование сайта';
    //require "core/base_views/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap ">


        <section class="menu main_bkg_color-1 fl fl_w">
            <div class="menu_item">
                <a href="#home" class="item_header">Главная</a>
            </div>
            <div class="menu_item drop_item">
                <a href="javascript:void(0)" class="item_header item_droped">Git</a>
                <div class="subitems_block">
                    <div class="menu_subitem">
                        <a href="#">Hint</a>
                    </div>
                </div>
            </div>
            <div class="menu_item drop_item">
                <a href="javascript:void(0)" class="item_header item_droped">Базы данных</a>
                <div class="subitems_block">
                    <div class="menu_subitem">
                        <a href="#">СУБД</a>
                    </div>
                    <div class="menu_subitem">
                        <a href="#">MySQL</a>
                    </div>
                </div>
            </div>
        </section>

        <br>
        <br>
        <br>

        <section class="tab main_bkg_color-1 fl fl_w">

            <div class="tab_item">
                <a href="javascript:void(0)" class="tab_header">Git</a>
                <div class="block tab_layout">
                    текст 1
                </div>
            </div>
            <div class="tab_item drop_item">
                <a href="javascript:void(0)" class="tab_header">Базы данных</a>
                <div class="tab_layout">
                    текст 2
                </div>
            </div>
        </section>

        <br>
        <br>


        <section class="content block block_wrap  main_bkg_color-4">
            <br>

            <section name="database">


                <div class="block block_wrap bb fl fl_w">
                    <div class="block block_box bb">
                        <label for="sql-query">SQL-запрос</label><br>
                        <form action="/admin/sql" method="post" enctype="multipart/form-data">

                         <textarea name="sql-query" placeholder="SQL-запрос"
                                   style="
                                   width:  400px;
                                   height: 200px;
                                   font-size: 1.3em;
                                   justify-content: left;">
                            <?= $sql_body ?>
                         </textarea>
                            <br>
                            <input type="submit" value="Отправить запрос"><br>
                        </form>
                        <br>
                    </div>

                    <div class="block block_box bb contenteditable">
                        <input type="button" class="" value="Сохранить" onclick="save()">
                        <div>
                        <pre>
Редактируемый текст
select * from TAllEarthquakes limit 30;
describe TAllEarthquakes;
                        </pre>
                        </div>
                    </div>
                </div>
            </section>
            <hr>

            <?php

            echo Html::convertRowsArray2HtmlTable($users);

            ?>


            <hr>
            <ul class="tabs">
                <li><a href="#one">1</a></li>
                <li><a href="#two">2</a></li>
                <li><a href="#three">3</a></li>
                <li><a href="#four">4</a></li>
                <li><a href="#five">5</a></li>
            </ul>
            <div class="tabs-content">
                <ul>
                    <li id="one">
                        <div>Содержимое 1-й вкладки</div>
                    </li>
                    <li id="two">
                        <div>Содержимое 2-й вкладки</div>
                    </li>
                    <li id="three">
                        <div>Содержимое 3-й вкладки</div>
                    </li>
                    <li id="four">
                        <div>Содержимое 4-й вкладки</div>
                    </li>
                    <li id="five">
                        <div>Содержимое 5-й вкладки</div>
                    </li>
                </ul>
            </div>

        </section>
    </main>
    <?php require 'core/base_views/VSiteFooter.php' ?>
</div>
</body>
<script type="text/javascript" src="/pages/admin/scripts/scripts.js"></script>
</html>

<script type="text/javascript">
    $(function () {
        $('#tabs').w2tabs({
            name: 'tabs',
            active: 'tab1',
            tabs: [
                {id: 'tab1', text: 'Tab 1'},
                {id: 'tab2', text: 'Tab 2'},
                {id: 'tab3', text: 'Tab 3'},
                {id: 'tab4', text: 'Tab 4'}
            ],
            onClick: function (event) {
                $('#selected-tab').html(event.target);
            }
        });
    });
</script>


<style>
    /*
    li = menu_item
    dropdown-content = subitems_block
    a = item_header
    dropbtn = item_droped - не нужен

    */
    .tab {
        margin: 0;
        padding: 0;
        overflow: hidden;
        height: 60px;
    }

    .tab_item {
        float: left;
        border: 1px #854fe1 solid;
    }

    .tab_item:hover {
        background-color: red;
    }

    .tab_header {
        color: #fffb33;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;


    }

    /*
    a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }
     */


    .tab_header:hover .tab_layout {
        display: block;
        z-index: 2000;

    }

    .tab_layout {
        display: none;
        position: absolute;
        background-color: #ff9041;
        width: 80%;
        height: 40px;


    }


    /*
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        */


    .menu_subitem:hover {
        background-color: #3c7839
    }

</style>


<style>
    /*
    li = menu_item
    dropdown-content = subitems_block
    a = item_header
    dropbtn = item_droped - не нужен

    */
    .menu {
        margin: 0;
        padding: 0;
        overflow: hidden;
        height: 60px;
    }

    .menu_item {
        float: left;
        border: 1px #854fe1 solid;
    }

    .menu_item:hover {
        background-color: red;
    }

    .item_header {
        color: #fffb33;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;


    }

    /*
    a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }
     */


    .drop_item:hover .subitems_block {
        display: block;

    }

    .subitems_block {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1000;

    }


    /*
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        */


    .menu_subitem:hover {
        background-color: #3c7839
    }

</style>




