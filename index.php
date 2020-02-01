<?php
//FRONT CONTROLLER
namespace Application;

use Throwable;

error_reporting(E_ALL);

//phpinfo(); - все о пхп Loaded php.ini: /etc/php.ini

try {
    require_once "core/autoload.php";

    DB_connection::db_connect_with_DBsite();
    //DB_connection::db_connect_with_DBstaff();
    //session_start();
    (new Router())->run();
} catch (Throwable $e) {
    ErrorHandler::handle_error($e);
}
?>



