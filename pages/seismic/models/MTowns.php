<?php


namespace seismic\models;

use Application as A;
use Application\Models as M;
use Application\Models\Databases as DB;


class MTowns extends M\Model_base
{
    static function getTowns()
    {
        $towns = array();
        $rows = DB\ORM::findRows("VTowns");

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

    static function getTownsByID($townID)
    {
      //  $towns = array();
        $rows = DB\ORM::findRows("VTowns", "ID_города = '{$townID}'");

        $town_as_row = $rows[0];
       // A\Debug::print_array("ППППППП", $town_as_row);

        $town = new TTown();
        $town->ID = $town_as_row[0];
        $town->region = $town_as_row[1];
        $town->locality = $town_as_row[2];

      //  A\Debug::print_var("ППППППП", $town->region);

        return $town;
    }

    static function getRegions()
    {
        $regions = array();
        $rows = DB\ORM::findRows("TRegionsRF");
        //  $link = A\App::$db_connection->getLink();
        //  $rows = mysqli_query($link, "select * from TRegionsRF");


        //A\Debug::print_array($rows);
        foreach ($rows as $row) {

            $region = $row[1];
            array_push($regions, $region);
        }

        return $regions;
    }


    public static function getTownsByRegion($region)
    {
        $towns = array();
        $rows = DB\ORM::findRows("VTowns_seism", "Регион = '{$region}'");
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

?>