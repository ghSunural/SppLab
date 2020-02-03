<?php

namespace Application\Databases;

class TDataBase
{
   // private $dbAlias;
    private $dbName;
    private $host;
    private $user;
    private $password;


    public function __construct($host, $dbName, $user, $password)
    {
       // $this->dbAlias = $dbAlias;
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;
    }


    public function getDbName()
    {
        return $this->dbName;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getUser()
    {
        return $this->user;
    }

      public function getPassword()
    {
        return $this->password;
    }


}
