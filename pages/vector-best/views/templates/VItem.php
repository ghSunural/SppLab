<?php

$row;

$device_name = nl2br($row['device_name']);

echo '
<article class="product-row">
    <details open class="details">
       <summary class="H4">{$row["id"]} / {$row["register_id_uniq"]}</summary> 
       <div class="item-content">
           Регистарционное удостоверение {$row["registration_certificate"]} <br>
           Название {$device_name} <br>
       </div>
    </details>
</article>
<br>
<hr>'


?>


