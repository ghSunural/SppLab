<?php

namespace user\models;

use Application\Databases\DBManager;
use Application\Databases\MPUsers;

use Application\TError;


class MUsers
    //implements IUsers
{

    public static $roles = array(
        'BAN' => 0,
        'GST' => 1,
        'UEXT' => 3,
        'UW' => 5,
        'MDR' => 7,
        'ADM' => 10,
        'DEV' => 12
    );


    public static function register(TUser $user)
    {
       // echo $user;

        MPUsers::add($user);
        // header("Location: /");
        /*
        if (validUserForReg($user)) {
        } else {
            throw new TError('Данные не корректны');
        }
        */

    }


    /**
     * Запоминаем пользователя.
     *
     * @param int $userId <p>id пользователя</p>
     */
    public static function auth(TUser $user)
    {
        // echo $user;
        if (
            $user->getLogin() == 'ysunural' &&
            password_verify("Malakhov65", $user->getPasswordHash())
        ) {
            // session_start();
            $_SESSION["userRole"] = 'DEV';           // require 'index.php';
            return true;
        } else {
            throw new TError('Неверный логин или пароль');
        }

    }

    public static function unlog()
    {
        $_SESSION["userRole"] = 'GST';
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header('Location: /user/login');

    }

    /**
     * Проверяет является ли пользователь гостем
     *
     * @return bool <p>Результат выполнения метода</p>
     *              public static function isGuest()
     *              {
     *              if (isset($_SESSION['user'])) {
     *              return false;
     *              }
     *              return true;
     *              }
     *
     *  */

    /**
     * Проверяет имя: не меньше, чем 2 символа.
     *
     * @param string $name <p>Имя</p>
     *
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }

        return false;
    }

    /**
     * Проверяет телефон: не меньше, чем 10 символов.
     *
     * @param string $phone <p>Телефон</p>
     *
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }

        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов.
     *
     * @param string $password <p>Пароль</p>
     *
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }

        return false;
    }

    /**
     * Проверяет email.
     *
     * @param string $email <p>E-mail</p>
     *
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    /**
     * Проверяет не занят ли email другим пользователем
     *
     * @param type $email <p>E-mail</p>
     *
     * @return bool <p>Результат выполнения метода</p>
     */
    public static function checkEmailExists($email)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }

        return false;
    }


}
