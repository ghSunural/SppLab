<?php
//FRONT CONTROLLER
namespace Application;
//Отчет об ошибках PHP
//define("DEBUG_MODE", false);
/*
if (config::DEBUG_MODE()) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

function debug_print($message)
{
    if (config::DEBUG_MODE()) {
        echo $message;
    }
}
*/
//echo "index2";

//require $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR."core/tests.php";


require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR."core/autoload.php";
App::db_connect();

//Вызов роутера
$router = new Router();
//(new Router())->run();
$router->run();
?>



