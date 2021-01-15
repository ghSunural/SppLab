<?php

//echo $_SESSION["userRole"];

($_SESSION['userRole'] == 'DEV') ?
    $opacity = 0.1 : $opacity = 0.8;

if ($_SESSION['userRole'] == 'GST') {
    $log_unlog = 'ВХОД';
    $ref_log_unlog = '/sign/login';
} else {
    $log_unlog = 'ВЫХОД';
    $ref_log_unlog = '/sign/unlog';
}


?>
<nav class="block block_wrap fl fl-w main_bkg_color-3 main_text_color-1 Main_toolbar">

    <div class="tb__left">
        <div class="block block_inline">
           <!-- <img src="/resource/site/logo/favicon.ico" height="5px" alt=""> -->
            <a href="/" class="t-botton fa fa-home"></a>
        </div>


    </div>
    <div class="tb__center">
        <!--
                <div class="info-bl block block_inline main_text_color-1">
                    Информационно-вычислительный портал
                </div>
        -->

    </div>


    <div class="search">
        <i class="fa fa-search ico" onclick="jsUtil.searchpage()"></i>
        <input type="search" id="search" placeholder="Поиск..."/>
    </div>


    <div class="tb__right">
        <div class="block block_inline" title="Вход и регистрация">
            <a href="<?=$ref_log_unlog?>" class="t-botton"><?=$log_unlog?></a>
        </div>

    </div>


    <!--   <div class="block block_inline">
          <label for="search">Найти</label>
        <a href=""><span class="fa fa-search fa-2x"></span></a>
        <input id="search" name="search" type="search">
    </div> -->
</nav>


<style>
    .Main_toolbar {
        top: 0;
        position: fixed;
        height: 8vh;
        min-height: 4vw;
        width: 96vw;
        z-index: 100;
        opacity: <?=$opacity?>;
        justify-content: space-between;
        align-items: center;
        border-bottom: 5px solid #99173C;
        margin: 0;
    }

    .ico{
        font-size: 2em;
    }

    .t-botton {

        color: #DCE9BE;
        font-weight: bold;
        font-size: 3vw;
        max-font-size: 3vh;
        margin-left: 15px;
    }

    .tb__left {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding-left: 10px;
    }

    .tb__center {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 10px 0 10px;
    }

    .tb__right {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 20px;
    }

    .info-bl {
        font-size: 1vw;
        max-font-size: 2vh;

    }



    .search {
        border: 1px solid #ccc;
        display: inline-block;
        border-radius: 10px;
        font-size: 70%;
        height: 65%;
    }

    [type='search'] {
        border: none;
        outline: none;
        height: 100%;

    }

    .fa .fa-search {
        color: #0fcc21;
    }

    input[type=text]::-ms-clear {
        display: none;
        width: 0;
        height: 0;
    }

    input[type=text]::-ms-reveal {
        display: none;
        width: 0;
        height: 0;
    }

    input[type="search"]::-webkit-search-decoration,
    input[type="search"]::-webkit-search-cancel-button,
    input[type="search"]::-webkit-search-results-button,
    input[type="search"]::-webkit-search-results-decoration {
        display: none;
    }



</style>