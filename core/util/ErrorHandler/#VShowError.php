<?php

?>

<!DOCTYPE html>
<html lang="ru" class="html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/resource/site/logo/favicon.ico" type="image/x-icon">
    <title>Ошибка!</title>
</head>
<body>
<main>

    <div class="wrapper bb">

        <div class="datablock bb">
            <div class="">
                <h1>Мы уже работаем над этим...</h1>

            </div>

            <img alt="фото" width="95%" height="auto" src="/core/util/ErrorHandler/resource/images/we_are_working.jpg">


        </div>
        <div class="datablock bb">
            <div class="toolbar" >
                <p><a href="javascript:history.go(-1);">Вернуться</a></p>
                <br>
            </div>

            <hr>
            <h2>Аааа! вот что случилось!</h2>

            <?php
            echo self::$user_error_message;
            echo "<hr>";
            echo self::$system_error_message;
            ?>
        </div>
    </div>


</main>
</body>


</html>

<style type="text/css">

    .html {
        background-color: #DCE9BE;
    }

    .bb {
        /* border: #1f1dff solid;*/
    }

    .toolbar{
        text-align: right;
    }

    .wrapper {
        font: 16px 'site-font', serif;
        margin: 0 auto;
        word-break: break-all;
        display: flex;
        vertical-align: top;
        justify-content: center;
        flex-wrap: wrap;
        height: 80%;
        width: 80vw;
    }

    .datablock {

        display: inline-block;
        width: 48%;
        padding: 10px;
    }

    @font-face {
        font-family: 'site-font';
        src: url('/fonts/Play-Regular.ttf');
        /*CentarRegular.otf*/
        font-weight: normal;
        font-style: normal;
    }


</style>
