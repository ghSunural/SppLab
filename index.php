<?php
//FRONT CONTROLLER
namespace Application;

use Application\Databases as DB;
use Throwable;

ini_set('display_errors', false);
//phpinfo(); //- все о пхп Loaded php.ini: /etc/php.ini
try {
    require_once 'core/autoload.php';

    session_start();
    //echo $_SESSION["userRole"];

    if (isset($_SESSION["userRole"]) && $_SESSION["userRole"] == 'DEV') {
        // Users.isAdmin($curUser)
        ini_set('display_errors', true);
        error_reporting(E_ALL);
    } else {
        $_SESSION["userRole"] = 'GST';
    }

    DB\DBManager::initDBs();
    (new Router())->run();

} catch (Throwable $e) {
    //ErrorHandler::alert_error($e);
    ErrorHandler::handle_error($e);
}
?>



