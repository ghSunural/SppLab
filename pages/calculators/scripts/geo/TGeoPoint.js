'use strict';

(function (exports) {

    function TGeoPoint() {

        var name;
        var description;
        var lat;
        var long;
        var alt;

        this.atrr = {};

        TGeoPoint.prototype.toKml = function () {

            var $kml = "<Placemark>\n<name>\n${this.name}\n</name>";
            console.log($kml);
            return $kml;
        };

    }

    exports.TGeoPoint = TGeoPoint;


}(window.kml = {}));


/*
<IconStyle>
<Icon>
<href></href>
</Icon>
</IconStyle>
<description>
{$this->getDescription()}
</description>
<Point>
<coordinates>{$this->getLong()}, {$this->getLat()}, {$this->getAlt()}</coordinates>
</Point>
</Placemark>
";
}

*/

