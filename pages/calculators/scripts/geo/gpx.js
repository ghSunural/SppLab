'use strict';
;(function (exports) {

    /*        $coordinatesLine  =  ${this.getLong()}, ${this.getLat()}, ${this.getAlt()}
        for (let $geoPoint of $geoPoints) {
            $kml += ($geoPoint.toKml());        }     */


    exports.getKmlPointsBody = function($geoPoints) {

        let $kml = getKmlOpenTags();

        for (let $geoPoint of $geoPoints) {

            $kml += ($geoPoint.toKml());
        }

        $kml += (getCloseTagKml());

        return $kml;
    };


    exports.getKmlLinesBody =  function($geoLines)  {

        let $kml = getKmlOpenTags();

        for (let $geoLine of $geoLines) {

            $kml += ($geoLine.toKml());
        }

        $kml += (getCloseTagKml());

        return $kml;
    };

    //private functions
    function getKmlOpenTags() {

        return `
<?xml version="1.0" encoding="UTF-8"?>
<gpx
xmlns="http://www.topografix.com/GPX/1/1"
version="1.1"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.topografix.com/GPX/1/1 http://www.topografix.com/GPX/1/1/gpx.xsd">   
`;

    }

    function getCloseTagKml() {

        return '\n</gpx>';
    }

}(window.gpx = {}));

