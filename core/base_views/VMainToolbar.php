<?php
?>
<nav class=" block block_wrap fl fl-w main_bkg_color-3 main_text_color-1 Main_toolbar">

    <div class="tb__left">
        <div class="block block_inline">
            <a href="/" class="t-botton">ГЛАВНАЯ</a>
        </div>


    </div>
    <div class="tb__center">

        <div class="info-bl block block_inline main_text_color-1">
            Информационно-вычислительный портал
        </div>

    </div>
    <div class="tb__right">
        <div class="block block_inline" title="Вход для зарегистрированных пользователей">
            <a href="/signin" class="t-botton">ВОЙТИ</a>
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

        opacity: 0.4;
        justify-content: space-between;
        align-items: center;
        border-bottom: 5px solid #99173C;
        margin: 0;
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

    .info-bl{
        font-size: 1vw;
        max-font-size: 2vh;

    }


</style>