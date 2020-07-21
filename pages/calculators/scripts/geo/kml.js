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

        return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>" +
            "\n<kml xmlns=\"http://www.opengis.net/kml/2.2\">"
    }

    function getCloseTagKml() {

        return '\n</kml>';
    }

}(window.kml = {}));

