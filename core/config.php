<?php

namespace Application;

//Singleton

ini_set('max_execution_time', 900);

class config
{
    public static function SITE_ROOT()
    {
        return $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR;
    }

    public static function SITE_URL()
    {
        return '//'.$_SERVER['SERVER_NAME'].'/';
        //return "//silver-hoof.000webhostapp.com/";
    }

    public static function IMG_URL_PREFIX()
    {
        return '//'.$_SERVER['SERVER_NAME'].'/resource/images/photo/';
        //return "http://localhost/silver-hoof/resource/images/photo/";
    }

    public static function DEBUG_MODE()
    {
        return true;
    }
}
