<?php

namespace Application\Databases;

use Application as A;
use PDO;

class ORM
{
    public static function sqlQuery($linkedDB, $sql_body, $fetchMode = null)
    {

        //только имена PDO::FETCH_ASSOC = 2
        //только цыфры PDO::FETCH_NUM = 3
        //и цифры и буквы PDO::FETCH_BOTH = 4
        if (is_null($fetchMode)) {
            $fetchMode = PDO::FETCH_BOTH;
        }

        $rowsArray = array();

        $statement = $linkedDB->query($sql_body);
        $statement->setFetchMode($fetchMode);

        while ($row = $statement->fetch()) {
            array_push($rowsArray, $row);
        }

        return $rowsArray;
    }

    public static function findRows($linkedDB, $table, $expression = null)
    {
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
        $statement = $linkedDB->query($sql);
        $statement->setFetchMode(PDO::FETCH_BOTH);

        while ($row = $statement->fetch()) {
            array_push($rows, $row);
        }
        // A\Debug::print_array($rows);
        return $rows;
    }

    public static function getColumnHeaders($linkedDB, $tableName)
    {
        $columnHeaders = array();
        $fields = self::sqlQuery($linkedDB, 'describe '.$tableName);
        $i = 0;
        foreach ($fields as $f) {
            array_push($columnHeaders, $f[0]);
            $i++;
        }

        return $columnHeaders;
    }

    public static function deleteEntry($table, $key, $value)
    {
        $link = A\App::$link_1;
        mysqli_query($link, "delete from $table where $key = $value");
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

        $table = self::sqlQuery(A\App::$link_1, $sql_body);

        return $table;
    }

    /*
        static function getMainPhoto($link, $article)
        {

            return mysqli_query($link, "select * from v_article_to_photo where article=" . $article . " and main_marker=1;");
            // select * from v_article_to_photo where article=19030102;
        }

        static function getPhoto($link, $article)
        {

            return mysqli_query($link, "select * from v_article_to_photo where article=" . $article);
            // select * from v_article_to_photo where article=19030102;
        }

        static function getGeneralData($link, $article)
        {

            return mysqli_query($link, "select * from TCatalog where article=" . $article);
            // select * from v_article_to_photo where article=19030102;
        }


        static function select($link, $fields, $table)

        {
            return mysqli_query($link, "SELECT {$fields} FROM {$table}");
            //  return mysqli_query($link, "SELECT * FROM
            //  ttable WHERE `column` LIKE '%{$needle}%'");
        }

    */
}
