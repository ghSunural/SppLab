<?php
//namespace climate\views;

use Application as A;
use climate\models as M;

$region = $this->region;
//A\Debug::print_var("", $region);
$townsInRegions = M\MTowns::getTownsByRegion($region);


//A\Debug::print_array($townsInRegions);
/*
 *
foreach ($townsInRegions as $town) {

    echо "<span class=\"ymaps-geolink\">.'карта'.</span>
        <a href="climate/$town->ID>"$town->locality</a>;

          </br>;
        }
*/

echo <<<EOL
<article class="block panel_mini">

    <div class="block text_header_bar">        
        <span class="ymaps-geolink">{$region}</span>
    </div>
     
    <div class="block main_text_color-1">
EOL;


foreach ($townsInRegions as $town) {
    // echо "<span class=\"ymaps-geolink\">."карта"."</span>"
    // echo "<a href=\"climate/".$town->ID.">\""{$town->locality}</a>;
    echo "&nbsp; - <a href=\"climate/{$town->ID}\" target=\"_blank\">{$town->locality}</a> - &nbsp;";
}

echo <<<EOL
</div>
</article>
EOL;

?>


