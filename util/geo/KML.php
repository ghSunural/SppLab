<?php


namespace Util\geo;


class KML
{

    public static function getKmlBody($geoPoints = array())
    {
        $kml = self::getKmlOpenTags();

        foreach ($geoPoints as $geoPoint) {
            $kml = $kml . ($geoPoint->toKml());
        }

        $kml .= (self::getCloseTagKml());

        return $kml;
    }

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

}