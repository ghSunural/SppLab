<?php


?>
<header class="block block_wrap Minor-header fl fl-w">
    <div class="H2 Minor-header_left block block_inline main_bkg_color-1 main_text_color-1">
        <?= $Header_leftContent; ?>
    </div>
    <div class="H3 Minor-header_right block block_inline main_bkg_color-2 main_text_color-2">
        <?= $Header_rightContent; ?>
    </div>
</header>
<style>
    .Minor-header {
        display: flex;

        justify-content: center;
        border-bottom: 2px #99173C solid;
        min-width: 96vw;
       /* overflow: hidden;*/
        text-overflow: ellipsis;
    }

    .Minor-header_left {
        height: 70px;
        width: 48vw;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1px 10px 1px 10px;
    }

    .Minor-header_right {
        height: 70px;
        width: 48vw;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1px 10px 1px 10px;
        text-overflow: ellipsis;

    }

</style>
