<?php


use Application as A;
use Application\Views as V;


$styles[0] = SITE_URL . "css/styles.css";
$display_head = V\Html::getView_Head("Silver-Hoof", $styles);
$display_footer = V\Html::getView_Footer("Footer block block_wrap", "footer content")

?>
<!DOCTYPE html>
<html lang="ru">
<?= $display_head ?>
<!--<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">-->
<body class="block block_wrap">

<main class="Main block block_wrap fl fl_nw">

    <section class="content block block_wrap">

        <div class="block block_wrap fl ">


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
            <a href="https://material.io/tools/icons/?style=baseline"><span class="fa fa-edit fa-2x"></span>
                Редактировать</a>
            <a href=""><span class="fa fa-shopping-cart fa-2x"></span> Купить</a>
        </div>

        <h2>Панель администратора</h2>

        <nav class="block">

            <ul>

                <li><a href="admin/main"><span class="fa fa-home fa-fw fa-1x"></span> Главная</a></li>
                <li><a href="/admin"><span class="fa fa-shopping-basket fa-fw fa-1x"></span> Управление товарами</a></li>
                <li><a href="/admin/category"><span class="fa fa-book  fa-fw fa-1x"></span> Категории</a></li>
                <li><a href="/admin/minerals"><span class="fa fa-diamond fa-fw fa-1x"></span> Минералы</a></li>
                <li><a href="/admin/order"><span class="fa fa-shopping-cart fa-fw fa-1x"></span> Заказы</a></li>
                <li><a href="/admin/order"><span class="fa fa-cog fa-fw fa-1x"></span> Настройки</a></li>
                <li><a href="/admin/site"><span class="fa fa-database fa-fw fa-1x"></span> База данных</a></li>
                <li><a href="/admin/site"><span class="fa fa-globe fa-fw fa-1x"></span> На сайт</a></li>
            </ul>


        </nav>




    </section>


</main>


</body>
</html>

