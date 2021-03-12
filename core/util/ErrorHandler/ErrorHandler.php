<?php

namespace Application;

use Error;
use Throwable;

class ErrorHandler
{
    public static $user_error_message;
    public static $error_time;
    public static $system_error_message;
    public static $error_file;
    public static $error_line;
    public static $error_trace = [];

    public static function alert_error(TError $e)
    {

        Html::alert($e->getMessage());
       // self::redirect($e);
        /*
        if($e->getUserMessage() == 'Доступ запрещен'){

            header ("Location: /sign/reg");
        }else{
            header ("Location: /");
        }
        */
        //echo "<script type='text/javascript'>alert('$message');</script>";

    }

    public static function redirect(TError $e){
        if($e->getMessage() == 'Доступ запрещен'){
            require 'pages/signUpIn/views/#VLogIn.php';
          //  header ("Location: /sign/login");
        }else{
            require 'core/base_views/404_NotFound.php';
        }
    }


    public static function handle_error(Throwable $e)
    {

     //   self::$user_error_message = 'Ошибочка вышла...';
        self::$system_error_message = $e->getMessage();
        self::$error_file = $e->getFile();
        self::$error_line = $e->getLine();
        self::$error_trace = $e->getTraceAsString();


       // self::$error_time = date('m/d/Y h:i:s a', time());
        self::$error_time = '--code_stub--';

       // "<br>&nbsp; Дата и время: ". self::$error_time.

       /* $err_message="<br><br><b style='color:red;'>Ошибка</b>: ".
            self::$system_error_message.
            "<br>&nbsp; файл: ".self::$error_file  .
            "<br>&nbsp; строка: ". self::$error_line;*/



        error_log('stub',3, 'core/util/ErrorHandler/errors.html');



        require 'core/util/ErrorHandler/#VShowError.php';

    }

    public static function displayError()
    {

        if ($_SESSION["userRole"] == 'DEV') {
            echo "<h2>Аааа! вот что случилось!</h2>";
          //  echo "Ошибка: ".self::$user_error_message;
          //  echo '<br>';
            echo "Ошибка: ".self::$system_error_message;
            echo '<hr>';
            echo "Файл: ".self::$error_file;
            echo '<br>';
            echo "Строка: ".self::$error_line;
            echo '<br>';
            echo '<hr>';
            echo( "Трассировка: ".self::$error_trace);
           /* echo "<h3>Трассировка</h3>";
             Debug::print_array(debug_backtrace());
            basename(print_r(debug_backtrace()));*/
        }
        else{

        }


    }
}
