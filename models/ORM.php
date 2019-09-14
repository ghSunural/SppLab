<?php

namespace Application\Models\Databases;

use Application as A;
use Application\Models as M;

class ORM
{

//select * from tDepartments  order by tDepartments.fullTitle;
//select fullTitle as 'Наименование отдела' from tDepartments where acronym = 'ОИЗ';
//update tPrice set price = 250000 where tPrice.surObjectID = 4 AND tPrice.workKindID = 3;


    static function sqlQuery($sql)
    {

        $rows = array();

        $link = A\App::$db_connection->getLink();
        $queryResult = mysqli_query($link, $sql);

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


    static function deleteEntry($table, $key, $value)
    {

        $link = A\App::$db_connection->getLink();
        mysqli_query($link, "delete from $table where $key = $value");
    }


    static function getTablesList($link)
    {

        return mysqli_query($link, "SHOW TABLES;");
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