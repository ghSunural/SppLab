<?php

namespace Application;

class Util
{
//" show_error.php?.
//            SITE_URL . "views/layouts/
//перенаправление на страницу ошибки
    public static function handle_error($user_error_message, $system_error_message)
    {
        header("Location: " . SITE_URL .
            "views/layouts/show_error.php?user_error_message
            ={$user_error_message}
            &system_error_message
            ={$system_error_message}");
    }

    public static function redirect()
    {


    }

    public static function get_web_path()
    {

        return $_SERVER['DOCUMENT_ROOT'];
    }

    public static function build_GET()
    {
        // request

    }

}

?>