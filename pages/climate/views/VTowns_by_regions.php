<?php

use climate\models as M;

$region = $this->region;
$townsInRegions = M\MTowns::getTownsByRegion($region);

echo <<<EOL
<article class="block block_wrap panel_mini">

    <div class="H4">        
        <span class="ymaps-geolink">{$region}</span>
    </div>
    <br>     
    <div class="block panel_mini_sub text-dark">
EOL;
foreach ($townsInRegions as $town) {
    // echо "<span class=\"ymaps-geolink\">."карта"."</span>"
    // echo "<a href=\"climate/".$town->ID.">\""{$town->locality}</a>;
    echo <<<EOL
      <div class='item block'>
            <a href="climate/{$town->ID}" target="" class='main_text_color-2 H5 selected'>{$town->locality}</a>
      </div> 
EOL;
}
echo <<<'EOL'
</div>
</article>
<style>
 .selected:hover{ 
   background-color: #DCE9BE;
}
</style>
EOL;

?>


