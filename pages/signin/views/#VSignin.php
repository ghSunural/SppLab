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
    $Header_rightContent = "регистрация и вход";
    require "views/page_templates/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <aside class="side-bar block block_wrap main_bkg_color-2 main_text_color-2">

            <nav class="catalog block">
                <ul>

                    <li></li>
                </ul>
            </nav>


        </aside>

        <section class="content content_with_sideBar block block_wrap fl fl_w main_bkg_color-4">

            <div class="form form-signin">
                <form action="/signin" method="post">
                    <input class="input"
                           type="text"
                           name="Surname"
                           placeholder="Фамилия"
                           required/>
                    <br>
                    <input class="input"
                           type="text"
                           name="Name"
                           title=""
                           placeholder="Имя"
                           required/>
                    <br>
                    <input class="input"
                           type="text"
                           name="SecondName"
                           title=""
                           placeholder="Отчество"
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
                           placeholder="Пароль"
                           required>
                    <br>
                    <select class="input"
                            name="post"
                            title="должность">
                        <option class="input-cell" selected disabled value="Выберете должность"></option>
                        <option class="input-cell" value="">нет в списке</option>
                        <option class="input-cell" value="">Инженер-программист</option>
                        <option class="input-cell" value="">Ведущий геолог</option>
                    </select>
                    <br>


                    <input type="submit" value="Регистрация">

                    <input type="reset" value="Очистить">
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













