<?php ?>
<header class="Header block block_wrap fl fl-nw">
    <div class="Header_left block block_inline main_bkg_color-1 main_text_color-1">
        <div class="Header_left_top block animated">
            S&nbsp;
        </div>
        <div class="Header_left_bottom block">

        </div>
    </div>
    <div class="Header_right block block_inline main_bkg_color-2 main_text_color-2">
        <div class="Header_right_top block">

        </div>
        <div class="Header_right_bottom block">
            &nbsp;L
        </div>
    </div>
</header>
<style>
    .Header {
        margin-top: 60px;
        /*background: linear-gradient(to right bottom, #ffffff 10%, #3c7839) ;*/
        height: 30vh;
        justify-content: space-between;
        border: 5px #99173C solid;
    }

    .Header_left {
        width: 50%;
    }

    .Header_right {
        width: 50%;
    }

    .Header_left_top {
        text-align: right;
        font: 12rem 'Arial', serif;
        font-weight: bold;
        height: 70%;

        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .Header_left_bottom {
        font: 1rem 'Arial', serif;
        font-weight: bold;
        font-style: italic;
        height: 30%;
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
        justify-content: center;
    }

    .Header_right_top {
        font: 1rem 'Arial', serif;
        font-weight: bold;
        height: 30%;
        text-align: center;
        font-style: italic;
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
        justify-content: center;
    }

    .Header_right_bottom {
        text-align: left;
        font: 12rem 'Arial', serif;
        font-weight: bold;
        height: 70%;
        display: flex;
        align-items: center
    }

    .animated {
        /* transition-timing-function */
        /*  transition-delay */
    }
</style>