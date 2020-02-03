<?php
//FRONT CONTROLLER
namespace Application;
use Application\Databases as DB;
use Throwable;

error_reporting(E_ALL);
//phpinfo(); - все о пхп Loaded php.ini: /etc/php.ini

try {
    require_once 'core/autoload.php';
    DB\DBManager::initDBs();
    (new Router())->run();

} catch (Throwable $e) {
   ErrorHandler::handle_error($e);
}
?>



