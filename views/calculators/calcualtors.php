<?php

use Application as A;
use Application\Models as M;

$region = $this->region;
//A\Debug::print_var("", $region);
$townsInRegions = M\MTowns::getTownsByRegion($region);
//A\Debug::print_array($townsInRegions);

?>

<article class="block block_inline product_panel_mini">

    <div class="product_article block text_header_bar">
        <?php echo $region ?>
    </div>

        <?php
        echo "<div class=\"product_article block main_text_color-1\">";

        foreach ($townsInRegions as $town) {


            echo "<a href=\"climate/$town->ID\">" . $town->locality . "</a>";

            echo "</br>";


        }

         echo "</div>";
        ?>





</article>

