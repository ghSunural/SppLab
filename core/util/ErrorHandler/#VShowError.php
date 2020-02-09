<?php

use Application\Debug;

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
                <div class="toolbar">
                    <a href="javascript:history.go(-1);">Вернуться</a>
                </div>
                <h1>Мы уже работаем над этим...</h1>
            </div>
            <div class="imgFrame bb">
                <!-- <img alt="фото" width="" height="" src="/core/util/ErrorHandler/resource/images/we_are_working.jpg">-->
            </div>
        </div>
        <div class="datablock bb">
            <?php
            if ($_SESSION["userRole"] == 'DEV') {
                echo "<h2>Аааа! вот что случилось!</h2>";
                echo self::$user_error_message;
                echo '<hr>';
                echo self::$system_error_message;
                echo "<h3>Трассировка</h3>";
                /* Debug::print_array(debug_backtrace());*/
                basename(print_r(debug_backtrace()));
            }
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
        /*  border: #1f1dff solid;*/
    }

    .toolbar {
        text-align: right;
    }

    .wrapper {
        box-sizing: border-box;
        font: 16px 'site-font', serif;
        margin: 0 auto;
        word-break: break-all;


        width: 98vw;
    }

    .datablock {
        box-sizing: border-box;
        max-width: 98vw;
        padding: 10px;
    }

    .imgFrame {
        height: 80%;
        box-sizing: border-box;
        background: url(/core/util/ErrorHandler/resource/images/we_are_working.jpg) no-repeat;
        background-size: contain; /* Современные браузеры */
    }

    @font-face {
        font-family: 'site-font';
        src: url('/fonts/Play-Regular.ttf');
        /*CentarRegular.otf*/
        font-weight: normal;
        font-style: normal;
    }


</style>
