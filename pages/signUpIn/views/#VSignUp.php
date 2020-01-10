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
    $Header_rightContent = "регистрация";
    require "views/page_templates/VMinorHeader.php";
    ?>

    <main class="Main block block_wrap fl fl_nw">

          <section class="content content block block_wrap fl fl_w main_bkg_color-4">

            <div class="form form-signin">
                РЕГИСТРАЦИЯ
                <form action="/signin" method="post">
                    <span class="red">*</span><input class="input"
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
                          />
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
                           placeholder="Придумайте пароль"
                           required>
                    <br>
                    <input class="input"
                           type="password"
                           name=""
                           title=""
                           placeholder="Повторите пароль"
                           required>
                    <br>
                    <!--
                    <select class="input"
                            name="post"
                            title="должность">
                        <option class="input-cell" selected disabled value="Выберете должность"></option>
                        <option class="input-cell" value="">нет в списке</option>
                        <option class="input-cell" value="">Инженер-программист</option>
                        <option class="input-cell" value="">Ведущий геолог</option>
                    </select>

                    <br>
                    -->

                    <div>
                        <input class="input block block_inline"
                               type="checkbox"
                               name=""
                               title="Для продолжения необходимо принять пользовательское соглашение"
                               placeholder="Повторите пароль"
                               required>Я принимаю условия
                        <a href="/signUp/userAgreement" class="block_inline" target="_blank">Пользовательского соглашения</a>
                        и даю своё согласие Яндексу на обработку моей
                        персональной информации на условиях, определенных
                        Политикой конфиденциальности.

                    </div>
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













