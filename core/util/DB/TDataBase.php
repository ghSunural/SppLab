<?php

namespace Application\Databases;

use PDO;

class TDataBase
{

    private $dbName;

    private $host;
    private $user;
    private $password;
    private $link;


    function __construct($host, $dbName, $user, $password)
    {
         $charset = 'utf8';
        //DSN - data saurce name - имя источника данных = link
        $dsn = "mysql:host=$host;dbname=$dbName;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => true,
        ];


   //  try {

            $pdo = new PDO($dsn, $user, $password, $options);

            $this->link = $pdo;
            $this->host = $host;
            $this->dbName = $dbName;
            $this->user = $user;
            $this->password = $password;

         // echo $dbName. " ПОДКЛЮЧЕНИЕ УСПЕШНО";
         //   Util::handle_error(1, 1);

   //   } catch (Throwable $e) {

         //$e->setUserMessage('Ошибка подключения к базе данных');
      //   throw $e;
      //      ErrorHandler::handle_error("Ошибка подключения к базе", $e->getMessage());
        // throw new TException('Ошибка подключения к базе данных');

        //  echo "АВАРИЯ";
           // echo $e->getMessage();
    //   }


    }

    public function getLink()
    {

        return $this->link;
    }


    public function getHost()
    {
        return $this->host;
    }

    public function getDbName()
    {
        return $this->dbName;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }


    public function getDumpDB(){

        /*
           exec('mysqldump -u id10552045_malakhovav
                -p Malakhov6503 id10552045_spp_database --single-transaction --quick >
                pages/admin/resource/downloads/dump.sql');
        */


        //  $fileName =  'pages/admin/resource/downloads/dump'
        // exec('mysqldump -uYourLogin -pYourPassword DBName > /path/to/save/fileDBName.sql');
        // ini_set();

        ini_alter("disable_functions", "system");
        $command =  'mysqldump -u ' . $this->user.
            ' -p '. $this->password . ' ' .$this->dbName .' --single-transaction --quick > 
        pages/admin/resource/downloads/dump.sql';
        exec($command);


    }


}

?>