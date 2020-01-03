<?php

use Application as A;
use Application\Databases as DB;

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

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "SL-Админ";
//$styles['main-css'] = A\config::SITE_URL() . "css/styles.css";
$styles['main-css'] = "/css/styles.css";
//$scripts['thisJS'] = A\config::SITE_URL() . "pages/admin/scripts/scripts.js";
//$scripts['thisJS'] = "/pages/admin/scripts/scripts.js";
require "core/base_views/VHead.php";
?>

<body class="block block_wrap">
<?php require "core/base_views/VMainToolbar.php" ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = "Админ";
    $Header_rightContent = "администрирование сайта";
    //require "views/page_templates/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

            <nav class="block">
                <ul>
                    <li><a href="/"><span class="fa fa-globe fa-fw fa-1x"></span> На сайт</a></li>
                    <li><a href="https://ru.000webhost.com/vhod-v-cpanel"><span class="fa fa-globe fa-fw fa-1x"></span>управление
                            сайтом</a></li>
                    <li><a href=""><span class="fa fa-book  fa-fw fa-1x"></span> Категории</a></li>
                    <li><a href=""><span class="fa fa-user-secret fa-fw fa-2x"></span> Пользователи</a></li>
                    <li><a href=""><span class="fa fa-cog fa-fw fa-1x"></span> Настройки</a></li>
                    <li><a href="#database"><span class="fa fa-database fa-fw fa-1x"></span> База данных</a></li>

                    <li><a href="/my-tests" target="_blank" title="Различные тесты"><span
                                    class="fa fa-table fa-fw fa-2x"></span>ТЕСТЫ</a></li>
                    <br>
                    ПОЛЕЗНЫЕ ССЫЛКИ
                    <li><a href="https://codepen.io/topics/" target="_blank">codepen</a></li>
                    <li><a href="http://w2ui.com/web/demos/#!popup/popup-8" target="_blank">таблицы и панели</a></li>
                    <li><a href="http://archive-ipq-co.narod.ru/l1/regexp.html" target="_blank">Регулярные выражения</a>
                    <li><a href="https://myrusakov.ru/javascript-post.html" target="_blank">Post-запрос JavaScript</a>

                    <li><a href="http://phpfaq.ru/pdo" target="_blank">PDO</a>
                    </li>
                    <br>
                    ШПАРГАЛКИ
                    <!-- такая ссылка уязвима - раскрывает структуру папок на сервере-->
                    <li><a href="/pages/admin/articles/article_gitHint.php" target="_blank">шпаргалка GitHub</a></li>
                    <li><a href="/pages/admin/articles/article_MySqlHint.php" target="_blank">шпаргалка MySql</a></li>
                    <br>
                    <li><a href="pages/admin/articles/inDevelop.php" target="_blank">В разработке</a></li>
                </ul>
            </nav>


        </aside>

        <section class="content content_with_sideBar block block_wrap  main_bkg_color-4">
            <br>

            <section name="database">

                <div class="block block_wrap">
                    ТАБЛИЦЫ<br>
                    <?php

                    $tableNames = DB\ORM::sqlQuery('show tables');
                    // A\Debug::print_array($tables);
                    foreach ($tableNames as $tableName) {
                        // A\Debug::print_array($table);
                        //A\Debug::print_array($tableName);
                        $tableName = $tableName[0];
                        echo $tableName;

                       $columnHeaders = DB\ORM::getColumnHeaders($tableName);
                       //A\Debug::print_array($columnHeaders);
                        // $table = DB\ORM::findRows($tableName);
                        echo A\Html::convertRowsArray2HtmlTable($columnHeaders);
                        echo '<br>';

                        /*   echo "<div class='block block_wrap fl fl_w' style='justify-content: flex-start'>";
                           $tableName = $row[0];
                           echo "<div class='block block_inline'><B>" . $tableName . "</B></div>";
                           $fields = DB\ORM::sqlQuery('describe ' . $tableName);
                           $i = 0;
                           foreach ($fields as $f) {
                               echo "<div class='block block_inline' style='margin-left: 2px;'> &nbsp|| &nbsp;[" . $i . "] " . $f[0] . "&nbsp;</div>";
                               $i++;
                           }
                           echo '</div>';
                           echo '<br>';*/
                    }
                    ?>
                </div>
                <br>
                <?php
                echo "IP сервера: " . $_SERVER['SERVER_ADDR'];
                echo '<br>';
                echo "Мой IP: " . $_SERVER['REMOTE_ADDR'];
                ?>

                https://db-02.sppural.ru
                пользователь: admin
                пароль: _cX&#99A3iTvAZ*pI9LS

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

            <div class="block block_box bb contenteditable">
                <?php
                echo A\Html::convertRowsArray2HtmlTable($db_response);
                ?>
            </div>
            <hr>
            <div class="block block_box bb">
                <a href="download/NaryadDopusk_doc">Наряд-допуск</a>
                <br>

            </div>


            <br> ССылка на битость
            if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            die('Not a valid URL');
            }

        </section>
    </main>
    <?php require "core/base_views/VSiteFooter.php" ?>
</div>
</body>
<script type="text/javascript" src="/pages/admin/scripts/scripts.js"></script>
</html>
