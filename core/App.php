<?php

namespace Application;

//require_once "core/util/Util.php";
//SITE_ROOT.
require_once "db_connect.php";

//echo 'application';
//echo "<br>";

use Application\Models\Databases as DB;
use Application\Controllers as C;

class App
{
    public static $db_connection;

    public static function db_connect()
    {

        self::$db_connection =
            new DB\db_connect(HOST, USER, PASSWORD, DATABASE);


        mysqli_query((self::$db_connection)->getLink(), "SET NAMES utf8");

    }


}

?>