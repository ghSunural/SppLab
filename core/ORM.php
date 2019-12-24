<?php

namespace Application\Models\Databases;

use Application as A;
use Application\Models as M;

class ORM
{

//select * from tDepartments  order by tDepartments.fullTitle;
//select fullTitle as 'Наименование отдела' from tDepartments where acronym = 'ОИЗ';
//update tPrice set price = 250000 where tPrice.surObjectID = 4 AND tPrice.workKindID = 3;


    public static function sqlQuery($sql_body)
    {

        $rows = array();

        $link = A\App::$db_connection->getLink();
        $queryResult = mysqli_query($link, $sql_body);

        while ($row = mysqli_fetch_row($queryResult)) {

            array_push($rows, $row);
        }

        //echo $jRow, "\n";
        // echo json_encode($rows), "\n";
        //echo json_encode($rows, JSON_PRETTY_PRINT);
        //echo  JSON.stringify($jRow, null, '\t');
        // array_push($rowsArray, $row);
        return $rows;
    }

    static function findRows($table, $statement = null)
    {
        $rows = array();

        //$rowsArray = array();
        $link = A\App::$db_connection->getLink();

        $queryResult = is_null($statement)
            ? mysqli_query($link, "select * from $table")
            : mysqli_query($link, "select * from $table where $statement");


        while ($row = mysqli_fetch_row($queryResult)) {

            array_push($rows, $row);
        }
        // array_push($rowsArray, $row);
        return $rows;
    }

    public static function getColumnHeaders($tableName){

        $columnHeaders = array();
        $fields = DB\ORM::sqlQuery('describe ' . $tableName);
        $i = 0;
        foreach ($fields as $f) {
            array_push($columnHeaders, $f[0]);
            $i++;
        }

        return $columnHeaders;
    }


    static function deleteEntry($table, $key, $value)
    {

        $link = A\App::$db_connection->getLink();
        mysqli_query($link, "delete from $table where $key = $value");
    }


    static function getTablesList($link)
    {

        return mysqli_query($link, "SHOW TABLES;");
    }

    static function VAllEarthquakesQuery()
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

        $table =  self::sqlQuery($sql_body);
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

?>