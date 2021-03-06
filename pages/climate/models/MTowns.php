<?php

namespace climate\models;

use Application as A;
use Application\Databases as DB;
use Application\Models as M;

class MTowns extends M\Model_base
{
    public static function getTowns()
    {
        $towns = array();

        $rows = DB\ORM::findRows(DB\DBManager::$DB1, 'VTowns');

        foreach ($rows as $row) {
            $town = new TTown();
            /*
            $town->ID = $row['ID_города'];
            $town->region = $row['Регион'];
            $town->locality = $row['Населенный_пункт'];
            */
            $town->ID = $row[0];
            $town->region = $row[1];
            $town->locality = $row[2];

            array_push($towns, $town);
        }

        return $towns;
    }

    public static function getTownByID($townID)
    {
        // $towns = array();
        $rows = DB\ORM::findRows(DB\DBManager::$DB1, 'VTowns', "ID_города = '{$townID}'");
        $town_as_row = $rows[0];

        $town = new TTown();
        $town->ID = $town_as_row[0];
        $town->region = $town_as_row[1];
        $town->locality = $town_as_row[2];

        return $town;
    }

    public static function getRegions()
    {
        $regions = array();
        $rows = DB\ORM::findRows(DB\DBManager::$DB1, 'TRegionsRF');
        //  $link = A\App::$db_connection->getLink();
        //  $rows = mysqli_query($link, "select * from TRegionsRF");

        // A\Debug::print_array($rows);
        foreach ($rows as $row) {
            $region = $row[1];
            array_push($regions, $region);
        }

        return $regions;
    }

    public static function getTownsByRegion($region)
    {
        $towns = array();
        $rows = DB\ORM::findRows(DB\DBManager::$DB1, 'VTowns', "Регион = '$region'");
        // A\Debug::print_array($rows);
        foreach ($rows as $row) {

            // A\Debug::print_array($row);
            $town = new TTown();

            $town->ID = $row[0];
            $town->region = $row[1];
            $town->locality = $row[2];
            // A\Debug::print_array($town);
            array_push($towns, $town);
        }

        return $towns;
    }
}
