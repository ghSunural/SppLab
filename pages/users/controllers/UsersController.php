<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 21.02.2019
 * Time: 16:42.
 */

namespace Application\Controllers;

//(англ. create), чтение (read), модификация (update), удаление (delete).

use Application\Databases\DBManager;
use Application\Databases\MPUsers;
use Application\Databases\ORM;
use Application\Html;
use Application\Resolver;

class UsersController extends BaseController
{


    public function actionRegister()
    {
        // Переменные для формы
        $name = false;
        $email = false;
        $password = false;
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $result = User::register($name, $email, $password);
            }
        }

        // Подключаем вид
        require_once ROOT.'/views/user/register.php';

        return true;
    }

    /**
     * Action для страницы "Вход на сайт".
     */
    public function actionLogin()
    {
        // Переменные для формы
        $email = false;
        $password = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем пользователя в закрытую часть - кабинет
                header('Location: /cabinet');
            }
        }

        // Подключаем вид
        require_once ROOT.'/views/user/login.php';

        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии.
     */
    public function actionLogout()
    {
        // Стартуем сессию
        session_start();

        // Удаляем информацию о пользователе из сессии
        unset($_SESSION['user']);

        // Перенаправляем пользователя на главную страницу
        header('Location: /');
    }


    public function acnUserManager()
    {

        Resolver::isAllowedFor('ADM');
        echo urldecode(("php://input"));
        echo http_get_request_headers();

        //htmlspecialchars против XSS атак

        if (isset($_POST['delete'])) {
            //  echo 'list';
            self::actionDelete($_POST['login']);


        } elseif (isset($_POST['isWorker'])) {
            //присвоить статус UW = 3
            self::acnSetStatus($_POST['login'], 3);
        }


    }


    public function actionCreate()
    {
    }

    public function actionRead()
    {
    }

    public function actionUpdate()
    {



    }

    public function acnSetStatus($login, $status)
    {
         //UW = 4
        $sql_body = "update TUsers set ref_role_id = $status where login = \"$login\"";
        echo $sql_body;
        ORM::sqlQuery(DBManager::$DB1, $sql_body);
    }





    public static function actionDelete($login)
    {
       MPUsers::delete($login);
        Html::alert("Пользователь " .$login. " успешно удален");
        //require "pages/users/views/VUsers.php";

    }
}
