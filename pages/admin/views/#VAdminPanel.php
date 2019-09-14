<?php

use Application as A;
use Application\Models\Databases as DB;

/*
$_FILES['image'];

if (is_uploaded_file()) {
    move_uploaded_file($_FILES['image']['tmp_name'],
        $_SERVER['DOCUMENT_ROOT'] . "resource/content/download" . filen);
}
*/


//'image' name поля

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "SL-Админ";
//$styles['main-css'] = A\config::SITE_URL() . "css/styles.css";
$styles['main-css'] = "/css/styles.css";
//$scripts['thisJS'] = A\config::SITE_URL() . "pages/admin/scripts/scripts.js";
//$scripts['thisJS'] = "/pages/admin/scripts/scripts.js";
require "views/site/VHead.php";
?>

<body class="block block_wrap">
<?php require "views/site/VMainToolbar.php" ?>
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

                    <li>ПОЛЕЗНЫЕ ССЫЛКИ</li>
                    <li><a href="https://codepen.io/topics/" target="_blank">codepen</a></li>
                    <li><a href="http://w2ui.com/web/demos/#!popup/popup-8" target="_blank">таблицы и панели</a></li>
                    <li><a href="http://archive-ipq-co.narod.ru/l1/regexp.html" target="_blank">Регулярные выражения</a>
                    <li><a href="https://myrusakov.ru/javascript-post.html" target="_blank">PostJavaScript</a>

                    </li>


                </ul>
            </nav>


        </aside>

        <section class="content content_width_sideBar block block_wrap fl fl_w main_bkg_color-4">

            <div class="block block_wrap fl fl_w bb">
                <a href=""><span class="fa fa-database fa-2x"></span> База данных</a>
                <a href=""><span class="fa fa-book fa-2x"></span> Каталог</a>
                <a href=""><span class="fa fa-eye fa-2x"></span> Глаз</a>
                <a href=""><span class="fa fa-eye-slash fa-2x"></span> Зачеркнутый глаз</a>
                <a href=""><span class="fa fa-phone fa-2x"></span> Телефон</a>
                <a href=""><span class="fa fa-folder-open fa-2x"></span> Открыть</a>
                <a href=""><span class="fa fa-ruble fa-2x"></span> Рубль</a>
                <a href=""><span class="fa fa-plus fa-2x"></span> Добавить</a>
                <a href=""><span class="fa fa-remove fa-2x"></span> Удалить</a>
                <a href=""><span class="fa fa fa-spinner fa-spin fa-2x"></span> Крутить</a>
                <a href=""><span class="fa fa fa-refresh fa-spin fa-2x"></span> Крутить</a>
                <a href=""><span class="fa fa-save fa-2x"></span> Сохранить</a>
                <a href=""><span class="fa fa-image fa-2x"></span> Картинка</a>
                <a href=""><span class="fa fa-diamond fa-2x"></span> Минералы</a>
                <a href=""><span class="fa fa-search fa-2x"></span> Искать</a>
                <a href=""><span class="fa fa-download fa-2x main_text_color-5"></span>Загрузка</a>
                <a href="https://material.io/tools/icons/?style=baseline"><span class="fa fa-edit fa-2x"></span>
                    Редактировать</a>
                <a href=""><span class="fa fa-shopping-cart fa-2x"></span> Купить</a>
            </div>

            <br>

            <section name="database">

                <div class="block block_wrap">
                    ТАБЛИЦЫ<br>
                    <?php

                    $tables = DB\ORM::sqlQuery('show tables');
                    foreach ($tables as $row) {
                        echo "<div class='block block_wrap fl fl_w' style='justify-content: flex-start'>";
                        $tableName = $row[0];
                        echo "<div class='block block_inline'><B>" . $tableName . "</B></div>";
                        $fields = DB\ORM::sqlQuery('describe ' . $tableName);
                        $i = 0;
                        foreach ($fields as $f) {
                            echo "<div class='block block_inline' style='margin-left: 2px;'> &nbsp|| &nbsp;[" . $i . "] " . $f[0] . "&nbsp;</div>";
                            $i++;
                        }

                        echo '</div>';
                        echo '<br>';
                    }
                    echo '<br>';
                    echo '<br>';
                    ?>
                </div>
                <br>
                <?php
                $resultSql = $this->models['resultSql'];
                $sql = $this->models['sql'];
                ?>


                <div class="block block_wrap fl fl_nw bb ">
                    <div class="block block_box bb">
                        <label for="sql-query">SQL-запрос</label><br>
                        <form action="/admin/sql" method="post" enctype="multipart/form-data">

                         <textarea name="sql-query" placeholder="SQL-запрос"
                                   style="
                                   width:  400px;
                                   height: 200px;
                                   font-size: 1.3em;
                                   justify-content: left;">
                            <?= $sql ?>
                         </textarea>
                            <br>
                            <input type="submit" value="Отправить запрос"><br>
                        </form>
                        <br>

                        <?php
                        A\Debug::print_array($resultSql, "Ответ");
                        ?>
                        <br>
                    </div>

                    <div id="cont">
                        контент
                    </div>


                    <div class="block block_box bb contenteditable">
                        <input type="button" class="" value="Сохранить" onclick="save()">
                        <div>
                        <pre>
select * from tDepartments;
select * from tDepartments  order by tDepartments.fullTitle;
select * from tDepartments  where acronym = 'ОИЗ';
select
	fullTitle as 'Наименование отдела'
from tDepartments where acronym = 'ОИЗ';

select
	fullTitle as 'Полное наименование отдела',
	acronym as 'Аббревиатура'
from tDepartments
	 order by fullTitle;

select distinct
	ID as 'ID должности',
	postName as 'Наименование должности'
from tPostList;

delete
from tWorkKindsList
where workKind = 'инженерно-гидрологические работы';

select * from tWorkerList
order by ID desc;

select *
from tWorkerList
where
	postId in
	(
	  1,
	  2
	)

 --вызов скалярной функции
 --почему то для скалярных функций указание схемы обязательно
 select [dbo].[GetNextMedCheck](1001)

--удаление записи
delete from tWorkerList where surname = 'Основин';

select count(surname) as 'кол-во'
from tWorkerList
where postId = 4;
--group by ID, postId;

select top 4 * from vWorkerList;

--выбор значений из коллекции
select *
from vWorkerList
where
	Должность in
	(
	  'геофизик',
	  'геолог'
	)

select *
from vWorkerList
where
	Должность not in
	(
	  'геофизик',
	  'геолог'
	)

--alter table WorkerList drop column vaccination;
--alter table WorkerList add vaccination datetime;

-- измененеие ячейки
update tPrice
set price = 250000 where tPrice.surObjectID = 4 AND tPrice.workKindID = 3;

--удаление функции
drop function if exists GetNextMedCheck;
--или
if object_ID('GetNextMedCheck', 'f') is not null
drop function GetNextMedCheck;

 /*--ограничение целостности в контексте alter table
 --не выходит на существующие столбцы
alter table tWorksImplementation ADD constraint surObjectID_FK
foreign key(surObjectID) references tSurObjects(ID);

alter table tWorksImplementation ADD constraint workKindID_FK
foreign key(workKindID) references tWorkKindsList(ID);

alter table tWorksImplementation ADD constraint workerID_FK
foreign key(workerID) references tWorkerList(ID);
*/

--alter table tWorksImplementation add bonus money;
--except
--intersect
--catch
--try
--throw
--одностроччный комментарий--
--create database #EnterpriseDB
--drop - сбрасывать
--drop database #EnterpriseDB
--alter database #EnterpriseDB
--create type MyType;
--insert into
--truncate -остается только поисание
--delete from [dbo].[Workers] where personnelNumber = 1;
--integer
--asc - по возрастанию
--desc - по убыванию
--alter table изменяет структуру таблицы
--while
--break
--continue
                        </pre>
                        </div>
                    </div>
                </div>
            </section>

            <div class="block block_box">
                REST
                <br>
                Поиск
                <br>
                Пользователи
                <br>
                Загрузки
                <br>

            </div>


        </section>
    </main>
    <?php require "views/site/VSiteFooter.php" ?>
</div>
</body>
<script type="text/javascript" src="/pages/admin/scripts/scripts.js"></script>
</html>










