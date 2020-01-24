<?php

use Application as A;

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = "SL-Регистрация";
$styles['main-css'] = A\config::SITE_URL() . "css/styles.css";
$scripts[] = '';
require "core/base_views/VHead.php";
?>

<body class="block block_wrap">
<?php require "core/base_views/VMainToolbar.php" ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = "Аутентификация / авторизация";
    $Header_rightContent = "вход";
    require "core/base_views/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <section class="content content block block_wrap fl fl_w main_bkg_color-4">

            <div class="form form-signin">
                <div class="headerform main_text_color-2 block_inline">ВХОД</div>
                <div class="headerform main_text_color-2 block_inline">
                    <a href="/sign/reg" target="_blank">Зарегистрироваться</a>
                </div>
                <br>

                <form action="/sign/auth" method="post">
                    <input class="input"
                           type="text"
                           name="login"
                           title="Будет использоваться в качестве логина"
                           placeholder="Логин или электронная почта"
                           required>
                    <br>
                    <input class="input"
                           type="password"
                           name=""
                           title=""
                           placeholder="Пароль"
                           required>
                    <br>

                    <input type="submit" class="_input main_text_color-1 main_bkg_color-1" value="Войти">

                </form>
            </div>
            <?php
            ?>
        </section>
    </main>
    <?php require "core/base_views/VSiteFooter.php" ?>
</div>
</body>
</html>

<style>
    ._input {

        border-radius: 10px;
    }

    .headerform {
        font-weight: bold;
        font-size: 1.5em;
        width: 48%;
    }

    .form-signin {
        width: 50vw;
        min-width: 320px;
    }

</style>>













