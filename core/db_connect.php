<?php

namespace Application\Models\Databases;

use Application as A;
use PDO;

require ("db_consts.php");

class db_connect
{
    private $link;

    function __construct($host, $user, $password, $database)
    {

        ($this->link =  mysqli_connect
            ($host, $user, $password, $database))
        or
        A\Util::handle_error("Ошибка подключения к базе данных", mysqli_error($this->link));
    }

    public function getLink()
    {

        return $this->link;
    }


}

?>