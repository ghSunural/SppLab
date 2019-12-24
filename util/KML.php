<?php


namespace Util;


class KML
{


    public static $kml;


    private static function getHeadersKML()
    {
        return $kml = <<< EOL
<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2">
EOL;
    }

    public static function getCloseTagKml()
    {

        return "</kml>";
    }

    public static function exportKML($fileName)
    {

        $kml = self::getHeadersKML();

        $sql_body = "select * from TAllEarthquakes
       where latitude > 49 and latitude < 56 and longitude > 105 and longitude < 120; ";

        // $sql_body = "select * from TAllEarthquakes";

        $Earthquakes = DB\ORM::sqlQuery($sql_body);

        foreach ($Earthquakes as $row) {

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

            $addition = <<< EOL
	<Placemark>
        <name>
$_MLH       
		</name>
		<IconStyle>
		<Icon>
        <href></href>
        </Icon>
        </IconStyle>
        <description>
M = $_MLH
$_year. $_month . $_day   $_hour : $_min : $_sec
Глубина = $_DEPTH км
$_latitude c.ш.  $_longitude в.д.
$_note
        </description>
        <Point>
        <coordinates>$_longitude, $_latitude, 0</coordinates>
        </Point>
    </Placemark>
EOL;
            $kml = $kml . $addition;

        }
        $kml .= self::getCloseTagKml();

        file_put_contents($fileName, $kml);

    }


    public static function addPoint()
    {


    }

    public static function addLine()
    {


    }


}