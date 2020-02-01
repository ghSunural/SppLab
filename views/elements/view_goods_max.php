<?php

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title></title>

</head>
<body>

<header class="block block_wrap fl fl_w">
    <div class="logo">
    </div>
</header>

<main class="block block_wrap fl fl_w">

    <div class="product_view_max block fl fl_nw">

        <div class="photo block block_inline">
            <img alt="фото" width="400" height="400" src="">
        </div>

        <div class="description-block block block_inline">

            <div class="description_name block">
                <?php echo $title?>
            </div>
            <div class="description_price block">
                <?php echo $price?>
            </div>
            <div class="description_article block">
                <?php echo $article?>
            </div>
            <div class="description_material block">
                <?php echo $material?></div>
            <div class="description_sizes block">
                <?php echo $sizes?>
            </div>


        </div>

    </div>


    <div class="block"><?php echo $а?></div>



</main>
<footer class="footer block_wrap fl fl_w">
</footer>
</body>
</html>
