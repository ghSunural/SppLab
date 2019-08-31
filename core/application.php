<?php

namespace Application;

require_once "Util.php";
require_once SITE_ROOT."core/config/db_connect.php";
//RewriteRule ^(.*)$ index.php?route=$1 [L,QSA]
//echo 'application';
//echo "<br>";

use Application\Models\Databases as DB;
use Application\Controllers as C;

class application
{
    public static $db_connection;
    public static $site_controller;

    //public static $SiteModel;

    public static function db_connect()
    {


        application::$db_connection =
            new DB\db_connect(HOST, USER, PASSWORD, DATABASE);


        mysqli_query((application::$db_connection)->getLink(), "SET NAMES utf8");


    }


}

?>