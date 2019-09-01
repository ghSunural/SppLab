<?php


 /*
    <<<EOL
    <script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink"
    type="text/javascript"></script>
<!--
  <script src="https://api-maps.yandex.ru/2.1/?apikey=369c0410-04f2-44bc-8b5e-db38533c045b&lang=ru_RU"
  type="text/javascript">
  </script> -->
EOL;
 */

$favicon_as_html = <<< EOL
    <link rel="shortcut icon" href="/resource/site/logo/favicon.ico" type="image/x-icon">
EOL;

$styles_as_html = "";
if ($styles) {
    foreach ($styles as $row) {

        $html_string = "<link href=\"{$row}\" rel=\"stylesheet\">";
        $styles_as_html = $html_string . "\n";
    }
}

$scripts_as_html = "";
if ($scripts) {

    foreach ($scripts as $row) {
        $html_string = "<script type=\"text/javascript\" src=\"{$row}\" async></script>";
        $scripts_as_html = $html_string . "\n";
    }
}

?>

<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <?php echo $styles_as_html ?>
    <?=$scripts_as_html?>
    <?=$favicon_as_html?>
</head>
