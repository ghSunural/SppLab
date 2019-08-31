<?php

namespace Application\Models\Databases;

use Application as A;
use Application\Models as M;

class ORM
{

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