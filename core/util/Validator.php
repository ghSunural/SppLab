<?php

namespace Application;


use Application\TError;


class Validator
{

    public static function isName($var)
    {
        // /u unicode
        $regExp = '/^([а-яА-ЯЁёa-zA-Z]+)$/u';
        return (preg_match($regExp, $var))
            ? true : false;
    }


    public static function isNumber($var)
    {
        $regExp = '|^[\d]+$|';
        return (preg_match($regExp, $var))
            ? true : false;
    }

    public static function isEmail($var)
    {
        //  $regExp = "/.+@.+\..+/ui";
        $regExp = "/\A[^@]+@([^@\.]+\.)+[^@\.]+\z/";
        return (preg_match($regExp, $var))
            ? true : false;
    }

    public static function verifyEmail($var){
        //  $regExp = "/.+@.+\..+/ui";
        /*
        $regExp = "/\A[^@]+@([^@\.]+\.)+[^@\.]+\z/";
        if (preg_match($regExp, $var)) {
            return;
        } else {
            throw new Exception('не почта');
        }
        */

        $regExp = "/\A[^@]+@([^@\.]+\.)+[^@\.]+\z/";
        if (preg_match($regExp, $var)) {
            return true;
        } else {
            throw new TError('не почта', '');
        }

    }



    public static function isLogin($var)
    {

        //буквы русского и латинского алфавита, знака "_" (подчерк), пробела и цифр
        $regExp = "/[^(\w)|(\x7F-\xFF)|(\s)]/u";
        return (preg_match($regExp, $var))
            ? true : false;
    }

    public static function isPhone($var)
    {

        //укв русского и латинского алфавита, знака "_" (подчерк), пробела и цифр
        $regExp = "/^\d{10}$/u";
        return (preg_match($regExp, $var))
            ? true : false;
    }


}