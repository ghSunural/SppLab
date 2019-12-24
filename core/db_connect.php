<?php

namespace Application\Models\Databases;

use Application as A;
use PDO;

require_once ("db_consts.php");

class db_connect
{
    private $link;

    function ss(){

        $host = '127.0.0.1';
        $db   = 'test';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';



    }


    function __construct($host, $database, $user, $password)
    {

        $charset = 'utf8';
        //DSN - data saurce name - имя источника данных = link
        $dsn = "mysql:host=$host;dbname=$database;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        $pdo = new PDO($dsn, $user, $password, $options)
        or
        A\Util::handle_error("Ошибка подключения к базе данных", mysqli_error($this->link));
    }

    public function getLink()
    {

        return $this->link;
    }


}

?>