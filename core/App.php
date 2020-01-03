<?php

namespace Application;


//require_once "Util.php";

//SITE_ROOT.

require_once "TLink.php";

//echo 'application';
//echo "<br>";
use Application\Models\Databases\DBstaff as DBstaff;
use Application\Models\Databases as DB;
use Application\Controllers as C;


class App
{

    public static $link_1;
    public static $link_2;

    public static function db_connect_with_DBsite()
    {
        $consts = require_once("db_site_consts.php");
        $link_1 = new DB\TLink($consts['HOST'], $consts['DATABASE'], $consts['USER'], $consts['PASSWORD']);
        self::$link_1 = $link_1->getLink();

    }

    public static function db_connect_with_DBstaff()
    {
        $consts = require_once("db_staff_consts.php");
        $link_2 = new DB\TLink($consts['HOST'], $consts['DATABASE'], $consts['USER'], $consts['PASSWORD']);
        self::$link_2 = $link_2->getLink();
    }

}

?>