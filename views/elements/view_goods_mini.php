<?php

?>

<article class="block block_inline product_panel_mini">

    <div class="product_article main_text_color-1">
        Артикул: <?php echo $article?>;
        <a href=""><span class="fa fa-shopping-cart fa-fw fa-3x"></span></a>
    </div>
    <div class="product_img img_container">
        <a class="href product__href" href="">
            <img class="product_face-img" src="../../resource/images/site/default.webp"
                 title="title" alt="фото" width=200px height="">
        </a>
    </div>

    <div class="description block">

        <div class ="main_text_color-1">
            <a href="" class="product__href">
                <?php echo $product_type?>
            </a>
        </div>
        <div class ="main_text_color-1">
            <?php echo $materials?>
        </div>


        <div class="product_price block_inline">
            <?php echo $price?> <span class="fa fa-ruble fa-1x"></span>
        </div>


    </div>


</article>

