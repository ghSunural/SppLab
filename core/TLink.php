<?php

namespace Application\Models\Databases;

use PDO;

class TLink
{
    private $link;

    function __construct($host, $database, $user, $password)
    {
        //какие поддерживаются
        //print_r(PDO::getAvailableDrivers());

        $charset = 'utf8';
        //DSN - data saurce name - имя источника данных = link
        $dsn = "mysql:host=$host;dbname=$database;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];


        try {

            $pdo = new PDO($dsn, $user, $password, $options);
            $this->link = $pdo;
          //  echo "ПОДКЛЮЧЕНИЕ УСПЕШНО";

        } catch (PDOException $e) {

            echo "АВАРИЯ";
            echo $e->getMessage();
        }


    }

    public function getLink()
    {

        return $this->link;
    }


}

?>