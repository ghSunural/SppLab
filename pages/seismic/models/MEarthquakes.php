<?php

namespace seismic\models;

use Application as A;
use Application\Databases as DB;
use Application\Models as M;
use Util\geo as G;
use Util\geo\TGeoPoint;

class MEarthquakes extends M\Model_base
{
    public static function getEarthquakesAsRowsArray($minLat, $maxLat, $minLong, $maxLong, $Mmin = null)
    {
        $sql_body = "select * from TAllEarthquakes
                     where latitude > $minLat 
                     and latitude < $maxLat 
                     and longitude > $minLong 
                     and longitude < $maxLong 
                    ";
        // and note !="";
        return DB\ORM::sqlQuery(A\DB_connection::$link_1, $sql_body, 2);
    }

    public static function exportEarthquakes2Kml($outFileName, $Earthquakes_dbResp)
    {
        $earthquakes = array();
        foreach ($Earthquakes_dbResp as $eq) {

          /*  $_year = $row[1];
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
*/
            $name = $eq['MLH'].' '.$eq['note'];
            $description = "MLH = {$eq['MLH']}
{$eq['_year']}.{$eq['_month']}.{$eq['_day']}  {$eq['_hour']}:{$eq['_min']}:{$eq['sec']}
Глубина = {$eq['DEPTH']} км
{$eq['latitude']} c.ш.  {$eq['longitude']} в.д.
{$eq['note']}";

            array_push($earthquakes,
                new TGeoPoint($eq['latitude'], $eq['longitude'], 0, $name, $description));
        }

        $kml = G\KML::getKmlBody($earthquakes);
        file_put_contents($outFileName, $kml);
    }
}
