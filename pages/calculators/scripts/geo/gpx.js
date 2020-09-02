'use strict';
;(function (exports) {


    exports.getGpxPointsBody = function ($geoPoints) {

        let $gpx = getGpxOpenTags();

        for (let $geoPoint of $geoPoints) {

            $gpx += ($geoPoint.toGpx());
        }

        $gpx += (getCloseTagGpx());

        return $gpx;
    };


    exports.getGpxLinesBody = function ($geoLines) {

        let $gpx = getGpxOpenTags();
        for (let $geoLine of $geoLines) {
            $gpx += ($geoLine.toGpx());
        }
        $gpx += (getCloseTagGpx());

        return $gpx;
    }


    //private functions
    function getGpxOpenTags() {

        return `<?xml version="1.0" encoding="UTF-8"?>
<gpx
xmlns="http://www.topografix.com/GPX/1/1"
version="1.1"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.topografix.com/GPX/1/1 http://www.topografix.com/GPX/1/1/gpx.xsd">`;

    }

    function getCloseTagGpx() {

        return '\n</gpx>';
    }

}(window.gpx = {}));

