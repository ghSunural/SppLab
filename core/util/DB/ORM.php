<?php

namespace Application\Databases;

use Application as A;
use PDO;

class ORM
{
    public static function sqlQuery(TDataBase $DB, $sql_body, $fetchMode = null)
    {

        $link = DBManager::getLinkWith($DB);
        //только имена PDO::FETCH_ASSOC = 2
        //только цыфры PDO::FETCH_NUM = 3
        //и цифры и буквы PDO::FETCH_BOTH = 4
        if (is_null($fetchMode)) {
            $fetchMode = PDO::FETCH_BOTH;
        }


        $statement = $link->query($sql_body);
        $statement->setFetchMode($fetchMode);

       // echo is_array($statement->fetch())."<br>";
      //  A\Debug::print_array($statement->fetch());
        $count = $statement->rowCount();
      //  A\Debug::print_var('количество строк', $count);
        $rowsArray = array();
        if ($count > 1) {
            echo "Массив";

            while ($row = $statement->fetch()) {
                array_push($rowsArray, $row);
            }
         //  A\Debug::print_array($rowsArray);
            //$rowsArray = $statement->fetch();

        } else {
           echo "Не массив";
            array_push($rowsArray, $statement->fetch());
          //  A\Debug::print_array($rowsArray);

        }

        return $rowsArray;


    }

    public static function findRows(TDataBase $DB, $table, $expression = null)
    {
        $link = DBManager::getLinkWith($DB);
        $rows = array();
        //$rowsArray = array();

        $sql = is_null($expression)
            ? "select * from  $table"
            : "select * from  $table where $expression";

        //echo $sql;
        //$statement = $link->prepare($sql);

        //  $db_response = $link->query('select * from ' . $table);
        //  $db_response->execute();

        //  $statement->bindValue(':tableN', $table);
        //  $statement->execute();
        // $statement->execute();
        $statement = $link->query($sql);
        $statement->setFetchMode(PDO::FETCH_BOTH);

        while ($row = $statement->fetch()) {
            array_push($rows, $row);
        }
        // A\Debug::print_array($rows);
        return $rows;
    }

    public static function getColumnHeaders(TDataBase $DB, $tableName)
    {

        $columnHeaders = array();
        $fields = self::sqlQuery($DB, 'describe ' . $tableName);
        $i = 0;
        foreach ($fields as $f) {
            array_push($columnHeaders, $f[0]);
            $i++;
        }

        return $columnHeaders;
    }

    public static function VAllEarthquakesQuery()
    {
        $sql_body = " 
 select
    ID as '№ п/п',
    _year as 'Год',
    _month	as 'Месяц',
    _day as 'День',
    _hour as 'Час',
    _min as 'Мин',
    sec	as 'Сек.',
    latitude as 'Широта, N',
    longitude as 'Долгота, E',
    DEPTH as 'Глубина гипоцентра, км',
    MLH	as 'Магнитуда по поверхностным волнам MLH с шагом 0.1',
    Ms05 as 'Магнитуда по поверхностным волнам MLH с шагом 0.5',
    polarAngle as 'Азимут',
    note as 'Примечание'
from TAllEarthquakes
where 
                        latitude > 49 
                        and latitude < 53 
                        and longitude > 110 
                        and longitude < 120;";

        $table = self::sqlQuery(DBManager::$DB1, $sql_body);

        return $table;
    }


}
