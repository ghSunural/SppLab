<?php

use Application as A;

//$user = $this->models['user'];

?>

<!DOCTYPE html>
<html lang="ru">
<?php
$title = 'SL-Регистрация';
$styles['main-css'] = A\config::SITE_URL() . 'css/styles.css';
$scripts[] = '';
require 'core/base_views/VHead.php';
?>

<body class="block block_wrap">
<?php require 'core/base_views/VMainToolbar.php' ?>
<div class="page block block_wrap">
    <?php
    $Header_leftContent = 'Аудентификация / авторизация';
    $Header_rightContent = 'регистрация';
    require 'core/base_views/VMinorHeader.php';
    ?>

    <main class="Main block block_wrap fl fl_nw">

        <section class="content block block_wrap fl fl_w main_bkg_color-4">

            <div class="form form-signin">
                РЕГИСТРАЦИЯ
                <form action="/sign/doreg" method="post">
                    <input class="input"
                           type="text"
                           name="Surname"
                           placeholder="Фамилия"
                           value=""
                           required/>
                    <br>
                    <input class="input"
                           type="text"
                           name="firstName"
                           title=""
                           placeholder="Имя"
                           value=""
                           required/>
                    <br>
                    <input class="input"
                           type="text"
                           name="login"
                           title="Будет использоваться в качестве логина"
                           placeholder="Логин"
                           value=""
                           required>
                    <br>
                    <input class="input"
                           type="text"
                           name="email"
                           title="Может использоваться в качестве логина"
                           placeholder="Электронная почта"
                           value=""
                           required>
                    <br>
                    <input class="input"
                           type="password"
                           name="password"
                           title=""
                           placeholder="Придумайте пароль"
                           value=""
                           required>
                    <br>
                    <input class="input"
                           type="password"
                           name="r-password"
                           title=""
                           placeholder="Повторите пароль"
                           value=""
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
                               checked
                               required>Я принимаю условия
                        <a href="/signUp/userAgreement" class="block_inline" target="_blank">Пользовательского
                            соглашения</a>
                        и даю своё согласие Spp-Lab на обработку моей
                        персональной информации
                        <!-- на условиях, определенных Политикой конфиденциальности.-->

                    </div>
                    <input class='main_bkg_color-1 main_text_color-1' type="submit" value="Регистрация">
                    <input type="reset" value="Очистить" class='main_bkg_color-1 main_text_color-1'>
                </form>
            </div>

        </section>
    </main>
    <?php require 'core/base_views/VSiteFooter.php' ?>
</div>
</body>
</html>













