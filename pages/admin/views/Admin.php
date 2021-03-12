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
//$styles['main-styles'] = A\config::SITE_URL() . "styles/styles.styles";
$styles['main-styles'] = '/styles/styles.styles';
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
    require "core/base_views/RibbonTools.php";
    ?>



    <main class="Main block block_wrap ">


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
    .content-top {
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




