<?php

namespace Application;

use Application\Databases as DB;


class DB_connection
{

    public static $DBsite;
    public static $link_1;

    public static $DBEnterprise;
    public static $link_2;


    public static function db_connect_with_DBsite()
    {
        $consts = require_once("db_site_consts.php");
        self::$DBsite = new DB\TDataBase($consts['HOST'], $consts['DATABASE'], $consts['USER'], $consts['PASSWORD']);
        self::$link_1 = self::$DBsite->getLink();

    }

    public static function db_connect_with_DBstaff()
    {
        $consts = require_once("db_staff_consts.php");

            self::$DBEnterprise = new DB\TDataBase($consts['HOST'], $consts['DATABASE'], $consts['USER'], $consts['PASSWORD']);
            self::$link_2 = self::$DBEnterprise->getLink();

    }

}

?>