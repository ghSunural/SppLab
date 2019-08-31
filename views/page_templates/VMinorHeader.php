<?php

$leftContent = "Строительная климатология";
$rightContent = "СП 131.13330.2018 \"СНиП 23-01-99* Строительная климатология\""
    ."<br>"."СП 22.13330.2016 Основания зданий и сооружений.
    Актуализированная редакция СНиП 2.02.01-83* (с Изменениями N 1, 2)";

?>
<header class="Header block block_wrap fl fl-nw">
    <div class="H2 Header_left block block_inline main_bkg_color-1 main_text_color-1">
        <?=$leftContent;?>
    </div>
    <div class="H3 Header_right block block_inline main_bkg_color-2 main_text_color-2">
        <?=$rightContent;?>
    </div>
</header>
<style>
    .Header {
        margin-top: 60px;
        /*background: linear-gradient(to right bottom, #ffffff 10%, #3c7839) ;*/
        height: 70px;
        justify-content: space-between;
        min-width: 600px;
        border-bottom: 2px #99173C solid;
    }

    .Header_left {
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1px 10px 1px 10px;
    }

    .Header_right {
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1px 10px 1px 10px;
    }



</style>
