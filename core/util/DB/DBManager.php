<?php

namespace Application\Databases;

use Application\Databases as DB;
use Application\Debug;
use PDO;
use PDOException;

class DBManager
{
    public static $DB1;
    public static $DB2;

    public static function initDBs()
    {
        self::$DB1 = self::getDB(require 'db_site_consts.php');
        self::$DB2 = self::getDB(require 'db_staff_consts.php');
    }

    private static function getDB($consts = array())
    {

        return new TDataBase($consts['HOST'], $consts['DATABASE'], $consts['USER'], $consts['PASSWORD']);
    }

    public static function getLinkWith(TDataBase $dataBase)
    {


        $charset = 'utf8';
        //DSN - data surce name - имя источника данных = link
        // {$dataBase->getHost()}
        $dsn = "mysql:host={$dataBase->getHost()};dbname={$dataBase->getDbName()};charset=$charset";

        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => true,
        );
        //link

        //  print_r($dsn);

        try {
            $link = new PDO($dsn, $dataBase->getUser(), $dataBase->getPassword(), $options);
            return $link;
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }

        return false;
    }

    public static function getDumpDB(TDataBase $dataBase)
    {
        //  $fileName =  'pages/admin/resource/downloads/dump'
        // exec('mysqldump -uYourLogin -pYourPassword DBName > /path/to/save/fileDBName.sql');
        // ini_set();

        ini_set('disable_functions', 'system');
        $command = 'mysqldump -u ' . $dataBase->getUser() .
            ' -p ' . $dataBase->getPassword() . ' ' . $dataBase->getDbName() . ' --single-transaction --quick > 
        /pages/admin/resource/downloads/dump.sql';
        exec($command);
    }
}
