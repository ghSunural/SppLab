<?php

$content = 'this is rtf content';

?>
<?php
header('Content-Type: application/vnd.ms-word');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('content-disposition: attachment;filename=Report.doc');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Шаблон</title>
</head>
<body>

<div class="report-layout">
    <?php
    echo $content;
    ?>
</div>

</body>
</html>
