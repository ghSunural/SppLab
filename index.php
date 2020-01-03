<?php
//FRONT CONTROLLER
namespace Application;
require_once "core/autoload.php";
App::db_connect_with_DBsite();
//App::db_connect_with_DBstaff();
(new Router())->run();
?>



