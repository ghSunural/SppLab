<?php

use Application as A;

/*


 <table id='tbl' class="table">
    <tr>
        <td class="td">text</td>
        <td class="td">text2</td>
    </tr>
</table>
  */


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SL-тесты</title>
    <link href="/pages/tests/css/tests-styles.css" rel="stylesheet">
</head>


<body class="block block_wrap">

ПУСТОЙ ЛИСТ ДЛЯ ТЕСТОВ

<div id='tbl' class="reportEditable">

    <?= "php " ?>

</div>

<button id='btn'>toggle</button>
<button id='btn2'>Значения</button>


<script type="text/javascript">
    window.onload = function () {
        // tbl.setAttribute('contenteditable', true);
        // var tabl = document.querySelector("contenteditable")
        // tabl = document.getElementsByClassName('table');
        tbl.setAttribute('contenteditable', true);

    }
</script>

<script type="text/javascript">

    // tbl.setAttribute('contenteditable', tbl.getAttribute("contenteditable") === 'true');
    function toggleState() {
        tbl.setAttribute('contenteditable', tbl.getAttribute("contenteditable") === "true" ? false : true);
    }

    btn.onclick = toggleState;

    function alert2() {
        var tds = document.getElementsByTagName("td");//возвращает массив всех <td>
        //  for (var i = 0; i < tds.length; i++) {
        alert(tds[1].innerHTML);//выводим числовое значение каждого <td>
        alert(tds[9].innerHTML);
        // }

    }

    btn2.onclick = alert2;


</script>
</body>
</html>
