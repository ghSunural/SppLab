<?php


namespace user\models;


class TUser
{


    public static function auth($userId)
    {

        $_SESSION['user'] = $userId;
    }

    public static function getById($id)
    {


        return "";
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

    public static function getImage($userId)
    {

        if (file_exists()) {

        }

        return "";
    }


}