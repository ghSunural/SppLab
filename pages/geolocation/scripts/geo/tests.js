'use strict';

kml.hot.beforeChange = function(){
    (alert('ondraw1'));
}

;(function (exports) {


    exports.alertshow = function () {


        let colLitera = 'Z';
        let num = arr_EN.indexOf(colLitera, 0);

        let $test = "";
       // $test = kml.hot.getColHeader(2);
     //   $test = kml.hot.getColWidth(1);
       // kml.hot.callback();


        $test = kml.hot.getColHeader(kml.hot.countCols() - 1);
        $test = kml.hot.getDataAtCell(0, 0);

        /*
        for (let $geoPoint of $geoPoints) {

            $kml += ($geoPoint.toKml());
        }
        */

       alert($test);

        //alert(num);
        // alert(kml.hot.getDataAtCell(0, 0));
        // console.log(kml.hot.getDataAtCell(1, 1));

    };




///////////////////////
    function getGeoPoints() {


        let $geoPoints = [];

        /* let P = new TGeoPoint(51.72, 116.29, 0,'Балейское', 'тест');*/
        let $colLat = geocalcs.$options.$latCol;
        let $colLong = geocalcs.$options.$longCol;

        //   let colAlt = 1;
        let $colsName = geocalcs.$options.$name;
        let $colsDescription = geocalcs.$options.$description;

        let $firstRow = 0;
        let $rowCount = hotTable.hot.countRows();
        // alert(hotTable.hot.columnWidth());


        for (let $row = $firstRow; $row < $rowCount; $row++) {

            let $name = "";
            let $description = "";
            let $lat = hotTable.hot.getDataAtCell($row, $colLat);
            let $long = hotTable.hot.getDataAtCell($row, $colLong);


            for (let $col of $colsName) {

                $name += hotTable.hot.getDataAtCell($row, $col) + ' ';
            }

            for (let $col of $colsDescription) {

                $description += hotTable.hot.getDataAtCell($row, $col) + ' ';
            }

            let P = new geo.TGeoPoint($lat, $long, 0, $name, $description);
            $geoPoints.push(P);
        }

        return $geoPoints;
    }

    exports.exportKml = function ($typePlacemark) {

        let $geoPoints = "";
        let $geolines = "";
        let kml = "Empty data";

        switch ($typePlacemark) {
            case "point":
                $geoPoints = getGeoPoints();
                kml = getKmlPointsBody($geoPoints);
                break;
            case "line":
                kml = getKmlLinesBody($geolines);
                break;
            default:
                kml = getKmlPointsBody($geoPoints);
                break;

        }


        alert(kml);
        // jsUtil.downloadFile("geoData_KML.kml", kml);
    };


    function getKmlPointsBody($geoPoints) {

        let $kml = getKmlOpenTags();

        for (let $geoPoint of $geoPoints) {

            $kml += ($geoPoint.toKml());
        }

        $kml += (getCloseTagKml());

        return $kml;
    }


    function getKmlLinesBody($geoLines) {

        let $kml = getKmlOpenTags();

        for (let $geoLine of $geoLines) {

            $kml += ($geoLine.toKml());
        }

        $kml += (getCloseTagKml());

        return $kml;
    }

    function getKmlOpenTags() {

        return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>" +
            "\n<kml xmlns=\"http://www.opengis.net/kml/2.2\">"
    }

    function getCloseTagKml() {

        return '\n</kml>';
    }


}(window.Test = {}));