<?php
//FRONT CONTROLLER
namespace Application;

use Application\Databases as DB;
use Error;
use Throwable;

ini_set('display_errors', false);
ini_set('max_execution_time', 600);
//phpinfo(); //- все о пхп Loaded php.ini: /etc/php.ini

try {
    require 'core/autoload.php';

    session_start();
    //echo $_SESSION["userRole"];

$_SESSION["userRole"] = 'DEV';


    if (isset($_SESSION["userRole"]) && $_SESSION["userRole"] == 'DEV') {
        // Users.isAdmin($curUser)
        ini_set('display_errors', true);
        error_reporting(E_ALL);
    } else {
        $_SESSION["userRole"] = 'GST';
     //  $_SESSION["userRole"] = 'DEV';
       ini_set('display_errors', false);
       error_reporting(E_ALL);
    }

    DB\DBManager::initDBs();
    (new Router2())->run();

} catch (TError $e) {
    //   if (isset($_SESSION["userRole"]) && $_SESSION["userRole"] == 'DEV') {
    if (isset($_SESSION["userRole"])) {
        ErrorHandler::handle_error($e);
    } else {
        ErrorHandler::alert_error($e);
        ErrorHandler::redirect($e);

    }
}catch (Throwable $e) {
    ErrorHandler::handle_error($e);
}
?>



