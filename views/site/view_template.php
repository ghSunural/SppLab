<?php
//require_once '../core/path.php'
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Silver-Hoof</title>

    <script type="text/javascript" src="../../index.php" async></script>
    <!-- <script type="text/javascript" src="css/bootstrap/dist/js/bootstrap.min.js" async></script>-->
    <link href="../css/styles.css" rel="stylesheet">
    <!--<link href="css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">-->


</head>
<body class="block block_wrap">

<nav class="Main_toolbar block block_wrap fl fl-w">
    Главная парам парам
    <div class="block block_inline">
        <label for="search">Найти</label>
        <input id="search" name="search" type="search">
    </div>
</nav>

<header class="Header block block_wrap fl fl-w">

    <div class="logo block block_inline"></div>


    <div class="logo__title-site block block_inline">Silver-Hoof</div>


    <div class="contact-info block block_inline">
        <div class="">
            <a href="tel:+89226162914" class="tel">8-922-616-29-14</a>

        </div>
    </div>
</header>
<main class="Main block block_wrap fl fl_nw">
    <aside class="side-bar block block_wrap">

        <nav class="catalog block">
            <ul>
                Каталог
                <li>Украшения из серебра и камня</li>
                <li>Камнерезные изделия</li>
                <li>Кабашоны</li>
                <li>Минералы</li>
            </ul>
        </nav>


        <div class="block">
            Следующая ярмарка
        </div>

        <div class="block reclame">
            Рекламный баннер<br>
            <a href="https://www.livemaster.ru" target="_blank">Ярмарка мастеров</a>
        </div>


    </aside>
    <section class="content block block_wrap">


        <nav class="minerals block fl fl_w">
        </nav>


    </section>


</main>

<footer class="Footer block block_wrap">Контактная информация</footer>

<a href="#openModal">Открыть модальное окно</a>
<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Закрыть" class="close">X</a>
        <h2>Модальное окно</h2>
        <p>Пример простого модального окна,
            которое может быть создано с использованием CSS3.</p>
        <p>Его можно использовать в широком диапазоне, начиная от вывода сообщений
            и заканчивая формой регистрации.</p>
    </div>
</div>

</body>
</html>

