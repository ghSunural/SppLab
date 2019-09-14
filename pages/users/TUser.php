<?php


namespace user\models;


use Application\Debug;
use Application\Models\Databases\ORM;

class TUser
{

    private $name;
    private $login;
    private $passwordHash;
    private $phone;
    private $role = array(
        1 => 'user',
        2 => 'userExt',
        3 => 'admin',
        4 => 'developer',
    );
    private $post;
    private $avatarFile;


    public function __construct($name, $email, $password, $role = 1, $post = NULL)
    {

        if (self::checkName($name)) {

            $this->name = $name;
        }

        if (self::checkEmail($email)) {

            $this->login = $email;
        }

        if (self::checkPassword($password)) {

            $this->passwordHash = self::passwordCrypt($password);
        }

        $this->role = $role;

        if (isset($post)) {

            $this->post = $post;
        }
    }


    public static function checkName($name)
    {

        if (strlen($name) >= 2) {
            return true;
        }

        return false;
    }

    public static function checkEmail($email)
    {

        if (preg_match($email, "/@sppural.ru/")) {
            return true;
        }
        return false;
    }


    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }

        return false;
    }


    public static function auth($userId)
    {

        $_SESSION['user'] = $userId;
    }

    public static function getById($id)
    {
        $userParam = ORM::findRows("TUsers", "ID = '{$id}'");

        Debug::print_array($userParam, 'Пользователь '. $id);

        return $userParam;
    }

    public static function checkLogged()
    {

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        return "";
    }

    public static function isGuest()
    {

        if (isset($_SESSION['user'])) {
            return false;
        }

        return "";
    }

    public static function getAvatar($userId)
    {

        if (file_exists()) {

        }

        return "";
    }


    private static function passwordCrypt($password)
    {

        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function passwordDecryption($password, $hash)
    {
        if (isset($password) && isset($hash)) {
            return password_verify($password, $hash);
        }

        return false;
    }


}