'use strict';
;(function (exports) {

    let arr_EN = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
        'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    exports.$settings = {

        $typePlacemark: 'point',
        $lineIdCol: 0,
        //номера колонок, из которых собирать имя
        $nameCols: [],
        $latCol: 1,
        $longCol: 2,
        //номера колонок, из которых собирать описание
        $descriptionCols: []
    };


    exports.exportKml = function () {

        let $typePlacemark = this.$settings.$typePlacemark;

        let $geoPoints = "";
        let $geoLines = "";
        let $geoPolygons = "";
        let $kml = "Empty data";

        switch ($typePlacemark) {
            case "point":
                //alert('point');
                $geoPoints = this.getGeoPoints();
                $kml = kml.getKmlPointsBody($geoPoints);
                break;
            case "line":
                alert('line');
                $geoLines = this.getGeoLines();
                $kml = kml.getKmlLinesBody($geoLines);
                break;
            case "polygon":
                //alert('polygon');
                $kml = kml.getKmlPolygonsBody($geoPolygons);
                break;
            default:
                //alert('point default');
                $kml = kml.getKmlPointsBody($geoPoints);
                break;

        }

        //alert($kml);
        jsUtil.downloadFile("geoData_KML.kml", $kml);
    };


    exports.getGeoPoints = function () {


        let $geoPoints = [];
        //let P = geo.TGeoPoint(51.72, 116.29, 0,'Балейское', 'тест');
        let $colLat = kmlController.$settings.$latCol;
        let $colLong = kmlController.$settings.$longCol;

        //let colAlt = 1;
        let $colsName = kmlController.$settings.$nameCols;
        let $colsDescription = kmlController.$settings.$descriptionCols;
        let $delimiter = ' ';


        let $firstRow = 0;
        let $rowCount = hotTable.hot.countRows();
        //alert(hotTable.hot.columnWidth());
        //alert($colLat + ""+ $colLong+ ""+$colsName+ ""+ $colsDescription);

        for (let $row = $firstRow; $row < $rowCount; $row++) {

            let $name = "";
            let $description = "";
            let $lat = hotTable.hot.getDataAtCell($row, $colLat);
            let $long = hotTable.hot.getDataAtCell($row, $colLong);

            for (let $col of $colsName) {

                $name += hotTable.hot.getDataAtCell($row, $col) + $delimiter;
            }

            for (let $col of $colsDescription) {

                $description += hotTable.hot.getDataAtCell($row, $col) + $delimiter;
            }

            let P = new geo.TGeoPoint($lat, $long, 0, $name, $description);
            $geoPoints.push(P);
        }

        return $geoPoints;
    };

////////////////////////////////////////////
    exports.getGeoLines = function () {

        let $colLineId = kmlController.$settings.$lineIdCol;


        let $geoLines = [];
        let $colLat = kmlController.$settings.$latCol;
        let $colLong = kmlController.$settings.$longCol;


        let $colsName = kmlController.$settings.$nameCols;
        let $colsDescription = kmlController.$settings.$descriptionCols;
        let $delimiter = ' ';


        let $firstRow = 0;
        let $rowCount = hotTable.hot.countRows();
        //alert(hotTable.hot.columnWidth());
        //alert($colLat + ""+ $colLong+ ""+$colsName+ ""+ $colsDescription);


        for (let $row = $firstRow; $row < $rowCount; $row++) {


            //  alert($lineId);
            let $lineIdPrev = hotTable.hot.getDataAtCell($row - 1, $colLineId);
            //   alert($lineIdPrev);
            let $lineIdNext = hotTable.hot.getDataAtCell($row + 1, $colLineId);
            //   alert($lineIdNext);
            let $name = "";
            let $description = "";


            let $coordList = "";
            let $coordString = "";
            //  $lineId === $lineIdPrev ||
            let $lineId = hotTable.hot.getDataAtCell($row, $colLineId);
            while ($lineId === $lineIdNext) {
               // alert($lineId);

                let $lat = hotTable.hot.getDataAtCell($row, $colLat);
                let $long = hotTable.hot.getDataAtCell($row, $colLong);
                $coordString = $long + "," + $lat + "," + "0";
                $coordList += $coordString + "\n";
                //alert($coordList);
                $row++;
                $lineId = hotTable.hot.getDataAtCell($row, $colLineId);
            }


            for (let $col of $colsName) {

                $name += hotTable.hot.getDataAtCell($row, $col) + $delimiter;
            }

            for (let $col of $colsDescription) {

                $description += hotTable.hot.getDataAtCell($row, $col) + $delimiter;
            }

            let L = new geoL.TGeoLine($coordList, $name, $description);

            $geoLines.push(L);
        }

        return $geoLines;
    };


    exports.setNameCols = function ($dom_input) {

        if ($dom_input.checked) {
            this.$settings.$nameCols.push(arr_EN.indexOf($dom_input.value))

        } else {
            this.$settings.$nameCols.splice
            (this.$settings.$nameCols.indexOf(arr_EN.indexOf($dom_input.value)), 1);
        }

        //alert(this.$settings.$nameCols); //через запятую
        //alert(this.$settings.$nameCols.join("\t"));
    };

    exports.setLatCol = function ($dom_input) {

        this.$settings.$latCol = arr_EN.indexOf($dom_input.value);
        //alert(this.$settings.$latCol);
    };

    exports.setLongCol = function ($dom_input) {

        this.$settings.$longCol = arr_EN.indexOf($dom_input.value);
        //alert(this.$settings.$longCol);
    };


    exports.setDescriptionCols = function ($dom_input) {

        if ($dom_input.checked) {
            this.$settings.$descriptionCols.push(arr_EN.indexOf($dom_input.value))

        } else {
            this.$settings.$descriptionCols.splice
            (this.$settings.$descriptionCols.indexOf(arr_EN.indexOf($dom_input.value)), 1);
        }

        //this.$settings.$descriptionCols.sort();
        //alert(this.$settings.$descriptionCols.join("\t"));
    };


    exports.setTypePlacemark = function ($dom_input) {

        this.$settings.$typePlacemark = $dom_input.value;
        //alert(this.$settings.$typePlacemark);
    };


}(window.kmlController = {}));