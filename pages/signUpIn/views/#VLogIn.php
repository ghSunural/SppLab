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
    $Header_leftContent = "Аудентификация / авторизация";
    $Header_rightContent = "вход";
    require "views/page_templates/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap fl fl_nw">

          <section class="content content block block_wrap fl fl_w main_bkg_color-4">

            <div class="form form-signin">
                ВХОД
                <a href="/signUp" target="_blank">Зарегистрироваться</a>


                <form action="/logIn" method="post">
                    <span class="red">*</span><input class="input"
                           type="text"
                           name="Surname"
                           placeholder="Фамилия"
                           required/>
                    <br>

                    <input class="input"
                           type="text"
                           name="login"
                           title="Будет использоваться в качестве логина"
                           placeholder="Электронная почта"
                           required>
                    <br>
                    <input class="input"
                           type="password"
                           name=""
                           title=""
                           placeholder="Введите пароль"
                           required>
                    <br>

                    <input type="submit" value="Войти">

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













