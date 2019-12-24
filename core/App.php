<?php

namespace Application;

require_once "Util.php";
//SITE_ROOT.
require_once "db_connect.php";

//echo 'application';
//echo "<br>";

use Application\Models\Databases as DB;
use Application\Controllers as C;

class App
{
    public static $link_1;
    public static $link_2;
    public static $site_controller;

    //public static $SiteModel;

    public static function db_connect()
    {

        self::$link_1 =
            new DB\db_connect(HOST, DATABASE, USER, PASSWORD);

    }

}

?>