<?php

use seismic\models as M;

$region = $this->region;
$townsInRegions = M\MTowns::getTownsByRegion($region);


/*
echo <<<EOL




<article class="block block_wrap panel_mini">

    <div class="H4">        
        <span class="ymaps-geolink icon-plus-circle region-container-head">{$region}</span>
    </div>     
    <div class="block panel_mini_sub main_text_color-1">
EOL;
foreach ($townsInRegions as $town) {
    // echо "<span class=\"ymaps-geolink\">."карта"."</span>"
    // echo "<a href=\"climate/".$town->ID.">\""{$town->locality}</a>;
    echo <<<EOL
      <div class='item block'>
            <a href="seismic/{$town->ID}" target="" class='main_text_color-2 H5 selected'>{$town->locality}</a>
      </div> 
EOL;
} */
/*
   foreach ($townsInRegions as $town) {
    echo <<<EOL
      <div class='item block'>
            <a href="seismic/{$town->ID}" target="" class='main_text_color-2 H5 selected'>{$town->locality}</a>
      </div>

EOL;
*/
echo <<<EOL
<article class="block block_wrap panel_mini">
    <details open class="details">
       <summary class="H4">{$region}</summary> 
       <div class="panel_mini_sub">
EOL;
foreach ($townsInRegions as $town) {
    echo <<<EOL
      <div class='item block'>
            <a href="seismic/{$town->ID}" target="" class='main_text_color-2 H5 selected'>{$town->locality}</a>
      </div>
EOL;
}

echo <<<EOL

</div>
</details>
</article>
<br>
<br>
EOL;





