<?php

namespace user\models;

use Application\Databases\MPUser;
use Application\DB_connection;
use Application\TException;

class MUsers
    //implements IUsers
{

    public static function register(TUser $user)
    {

        if (validUserForReg($user)){
            MPUser::create()
        }
        else{
            throw Throwable;
        }

    }

    public static function checkUserData($email, $password)
    {
        // Соединение с БД
        $db = DB_connection::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        // Обращаемся к записи
        $user = $result->fetch();

        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }

        return false;
    }

    /**
     * Запоминаем пользователя.
     *
     * @param int $userId <p>id пользователя</p>
     */
    public static function auth($userRole)
    {
        // Записываем идентификатор пользователя в сессию
        //  $_SESSION['user'] = $userId;
        $_SESSION['userRole'] = $userRole;
    }

    /**
     * Возвращает идентификатор пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа.
     *
     * @return string <p>Идентификатор пользователя</p>
     */
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

    /**
     * Возвращает пользователя с указанным id.
     *
     * @param int $id <p>id пользователя</p>
     *
     * @return array <p>Массив с информацией о пользователе</p>
     */
    public static function getUserById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
}
