<?php


namespace seismic\models;

use Application as A;
use Application\Models as M;
use Application\Databases as DB;
use Util\geo as G;
use Util\geo\TGeoPoint;

class MEarthquakes extends M\Model_base
{
    public static function getEarthquakesAsRowsArray($minLat, $maxLat, $minLong, $maxLong, $Mmin = NULL)
    {

        $sql_body = "select * from TAllEarthquakes
                     where latitude > $minLat 
                     and latitude < $maxLat 
                     and longitude > $minLong 
                     and longitude < $maxLong 
                    ";
        // and note !="";
        return DB\ORM::sqlQuery($sql_body);
    }

    public static function exportEarthquakes2Kml($outFileName, $Earthquakes_dbResp)
    {
        $earthquakes = array();
        foreach ($Earthquakes_dbResp as $row) {

            $_year = $row[1];
            $_month = $row[2];
            $_day = $row[3];
            $_hour = $row[4];
            $_min = $row[5];
            $_sec = $row[6];
            $_latitude = $row[7];
            $_longitude = $row[8];
            $_DEPTH = $row[9];
            $_MLH = $row[10];
            $_Ms05 = $row[11];
            $_polarAngle = $row[12];
            $_note = $row[13];

            $name = $_MLH . " " . $_note;
            $description = "MLH = $_MLH 
$_year.$_month.$_day  $_hour:$_min:$_sec
Глубина = $_DEPTH км
$_latitude c.ш.  $_longitude в.д.
$_note";

            array_push($earthquakes,
                new TGeoPoint($_latitude, $_longitude, 0, $name, $description));
        }

        $kml = G\KML::getKmlBody($earthquakes);
        file_put_contents($outFileName, $kml);
    }
}

?>
