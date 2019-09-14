<?php



?>


<?php

use Application as A;
use Application\Views as V;
use Application\Models as M;

use Application\Controllers as C;

$styles[0] = A\config::SITE_URL() . "css/styles.css";
$head_as_html = V\Html::getView_Head("Spp-Lab", $styles);
?>


<!DOCTYPE html>
<html lang="ru">
<?php
echo $head_as_html;
echo <<<EOL
<!--
  <script src="https://api-maps.yandex.ru/2.1/?apikey=369c0410-04f2-44bc-8b5e-db38533c045b&lang=ru_RU"
  type="text/javascript">
  </script> -->
<script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU&load=Geolink"
 type="text/javascript"></script>
EOL;
?>

<body class="block block_wrap">
<?php require "views/site/VMainToolbar.php"?>
<div class="page block block_wrap">

<main class="block block_wrap fl fl_nw">

    <section class="content block block_wrap fl fl_w main_bkg_color-4">





    </section>
</main>
<?php require "views/site/VSiteFooter.php"?>
</div>
</body>
</html>


