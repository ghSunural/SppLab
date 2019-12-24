<?php

namespace Application;

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Ошибка!</title>
    <link href="../../css/styles.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<main class="Main block block_wrap bb" width="100px">
    <h1>Ошибочка вышла...</h1>
    <h2>Сообщение</h2>

    <?php
    //горизонтальная линия в xhtml
    echo $_GET["user_error_message"];
    echo "<hr>";
    echo $_GET["system_error_message"];

    //debug_print("<hr>");
    //debug_print("Ошибка системного уровня <br />{$error_message}");
    ?>

    <p><a href="javascript:history.go(-1);">Вернуться</a></p>


</main>
</body>


<script type="text/javascript" src="../../index.php"></script>
</html>
