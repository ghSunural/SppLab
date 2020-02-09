<?php

namespace Application;

use Error;
use Throwable;

class ErrorHandler
{
    public static $user_error_message;
    public static $system_error_message;

    public static function alert_error(Throwable $e)
    {

        $message = ($e->getUserMessage());
        Html::alert($message);
        //echo "<script type='text/javascript'>alert('$message');</script>";

    }


    public static function handle_error(Throwable $e)
    {
        error_log($e->getMessage() . "\n", 3, 'core/util/ErrorHandler/errors.log');

      //  is_null($e->getMessage())         ?
            self::$user_error_message = '';
           // : $e->getUserMessage();
      //  self::$system_error_message = $e->getSystemMessage();

        if (self::$user_error_message === 'Доступ запрещен') {
            Html::alert(self::$user_error_message);
            // echo "<script type='text/javascript'>alert('$e->getUserMessage()');</script>";
            // echo "<script type='text/javascript'>alert(\"."self::$user_error_message"."\");</script>";
            header('Location: /sign/login');
            //  require 'pages/signUpIn/views/#VLogIn.php';
            //  return;
        }
        require 'core/util/ErrorHandler/#VShowError.php';
    }

    public static function displayErr()
    {


    }
}
