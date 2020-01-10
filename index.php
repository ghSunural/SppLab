<?php
//FRONT CONTROLLER
namespace Application;

use Exception;
use PharIo\Manifest\Application;

//try {
require_once "core/autoload.php";
//error_reporting()
DB_connection::db_connect_with_DBsite();
DB_connection::db_connect_with_DBstaff();
(new Router())->run();
//} catch (Exception $e) {
//   echo "Ошибка верхнего уровня" . $e->getMessage();
//}
?>



