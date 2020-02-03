<?php

namespace Application;

use Throwable;

class ErrorHandler
{
    public static $user_error_message;
    public static $system_error_message;

    public static function handle_error(Throwable $e)
    {
        error_log($e->getMessage()."\n", 3, 'core/util/ErrorHandler/errors.log');
        self::$user_error_message = 'Сообщение_';
        self::$system_error_message = print_r(basename(debug_print_backtrace()) . $e->getMessage());

        //header('Location: core/util/ErrorHandler/#VShowError.php');
        require 'core/util/ErrorHandler/#VShowError.php';
    }
}
