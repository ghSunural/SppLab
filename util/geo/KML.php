<?php


namespace Util\geo;


class KML
{

    private static function getKmlOpenTags()
    {
        return $kmlHead = <<< EOL
<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2">
EOL;
    }

    private static function getCloseTagKml()
    {

        return "</kml>";
    }


    public static function getKmlBody($geoPoints = array())
    {
        $kml = self::getKmlOpenTags();

        foreach ($geoPoints as $geoPoint) {

            $kml = $kml . (self::getPointAsKml($geoPoint));
        }

        $kml = $kml . (self::getCloseTagKml());

        return $kml;
    }


    public static function getPointAsKml(TGeoPoint $geoPoint)
    {

        return $PointAsKml = <<< EOL
	<Placemark>
        <name>
{$geoPoint->getName()}     
		</name>
		<IconStyle>
		<Icon>
        <href></href>
        </Icon>
        </IconStyle>
        <description>
{$geoPoint->getDescription()}
        </description>
        <Point>
        <coordinates>{$geoPoint->getLong()}, {$geoPoint->getLat()}, {$geoPoint->getAlt()}</coordinates>
        </Point>
    </Placemark>
EOL;


    }

    public static function getLineAsKml(TGeoLine $geoLine)
    {


    }


}