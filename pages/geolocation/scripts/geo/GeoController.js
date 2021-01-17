'use strict';
;(function (exports) {



    exports.$settings = {

        $typePlacemark: 'point',
        $typeOutputFormat: 'kml',
        $objectIdCol: 0,
        //номера колонок, из которых собирать имя
        $nameCols: [],
        $latCol: 1,
        $longCol: 2,
        //номера колонок, из которых собирать описание
        $descriptionCols: [],
        $stylesNamesCol: 0,
        $styles: []
    };


    exports.exportGeo = function ($typeOutputFormat) {

        let $typePlacemark = this.$settings.$typePlacemark;
        //  let $typeOutputFormat = this.$settings.$typeOutputFormat;

        let $geoPoints = "";
        let $geoLines = "";
        let $geoPolygons = "";
        let $dataString = "Empty data";
        let $extension = ".kml";


        switch ($typeOutputFormat) {
            case "kml":
                $extension = ".kml";
                switch ($typePlacemark) {
                    case "point":
                        //alert('point');
                        $geoPoints = this.getGeoPoints();
                        $dataString = kml.getKmlPointsBody($geoPoints);
                        break;
                    case "line":

                        // if(!confirm('line')) break;
                        $geoLines = this.getGeoLines();
                        $dataString = kml.getKmlLinesBody($geoLines);
                        //  $extension = ".kml";
                        break;
                    case "polygon":
                        //alert('polygon');
                        $geoPolygons = this.getGeoPolygons();
                        $dataString = kml.getKmlPolygonsBody($geoPolygons);
                        //  $extension = ".kml";
                        break;
                    default:
                        //alert('point default');
                        $dataString = kml.getKmlPointsBody($geoPoints);
                        $extension = ".kml";
                        break;

                }
                break;
            case "gpx":
                $extension = ".gpx";
                switch ($typePlacemark) {
                    case "point":
                        $geoPoints = this.getGeoPoints();
                        $dataString = gpx.getGpxPointsBody($geoPoints);
                        break;
                    case "line":
                        $geoLines = this.getGeoLines();
                        $dataString = gpx.getGpxLinesBody($geoLines);
                        break;
                }
                break;
            default:
                //alert('point default');
                $dataString = kml.getKmlPointsBody($geoPoints);
                $extension = ".kml";
                break;

        }

        //alert($kml);
        $typePlacemark = $typePlacemark.charAt(0).toUpperCase() + $typePlacemark.substr(1) + 's';
        jsUtil.downloadFile("Geo" + $typePlacemark + $extension, $dataString);
    };


    exports.getGeoPoints = function () {


        let $geoPoints = [];

        let $stylesIdCol = GeoController.$settings.$stylesNamesCol;

        let $colLat = GeoController.$settings.$latCol;
        let $colLong = GeoController.$settings.$longCol;

        //let colAlt = 1;
        let $colsName = GeoController.$settings.$nameCols;
        let $colsDescription = GeoController.$settings.$descriptionCols;
        let $delimiter = ' ';


        let $firstRow = 0;
        let $rowCount = hotTable.hot.countRows();
        //alert(hotTable.hot.columnWidth());
        //alert($colLat + ""+ $colLong+ ""+$colsName+ ""+ $colsDescription);

        for (let $curRow = $firstRow; $curRow < $rowCount; $curRow++) {

            let $name = "";
            let $description = "";
            let $lat = hotTable.hot.getDataAtCell($curRow, $colLat);
            let $long = hotTable.hot.getDataAtCell($curRow, $colLong);

            for (let $col of $colsName) {

                $name += hotTable.hot.getDataAtCell($curRow, $col) + $delimiter;
            }

            for (let $col of $colsDescription) {

                $description += hotTable.hot.getDataAtCell($curRow, $col) + $delimiter;
            }
            let $styleName = hotTable.hot.getDataAtCell($curRow, $stylesIdCol);
            let P = new geoPoint.TGeoPoint($lat, $long, 0, $name, $description, $styleName);
            $geoPoints.push(P);
        }

        return $geoPoints;
    };

////////////////////////////////////////////
    exports.getGeoLines = function () {

        let $geoLines = [];

        let $objectIdCol = GeoController.$settings.$objectIdCol;
        let $stylesIdCol = GeoController.$settings.$stylesNamesCol;
        let $colLat = GeoController.$settings.$latCol;
        let $colLong = GeoController.$settings.$longCol;


        let $colsName = GeoController.$settings.$nameCols;
        let $colsDescription = GeoController.$settings.$descriptionCols;
        let $delimiter = ' ';

        let $rowCount = hotTable.hot.countRows();

        let $curRow = 0;
        let $objectId = "";
        let $name = "";
        let $description = "";

        while ($curRow < $rowCount) {

            $name = "";
            $description = "";
            // let $coordList = "";
            let $points = [];

            //let $coordString = "";

            $objectId = hotTable.hot.getDataAtCell($curRow, $objectIdCol);
            let $styleName = hotTable.hot.getDataAtCell($curRow, $stylesIdCol);

            let $lat = hotTable.hot.getDataAtCell($curRow, $colLat);
            let $long = hotTable.hot.getDataAtCell($curRow, $colLong);


            $points.push({
                lat: $lat,
                long: $long,
                alt: 0
            })

            for (let $col of $colsName) {

                $name += hotTable.hot.getDataAtCell($curRow, $col) + $delimiter;
            }

            for (let $col of $colsDescription) {

                $description += hotTable.hot.getDataAtCell($curRow, $col) + $delimiter;
            }


            $curRow++;

            let $objectIdNext = hotTable.hot.getDataAtCell($curRow + 1, $objectIdCol);

            do {

                // $lineId = hotTable.hot.getDataAtCell($curRow, $colLineId);
                let $lat = hotTable.hot.getDataAtCell($curRow, $colLat);
                let $long = hotTable.hot.getDataAtCell($curRow, $colLong);
                //  $coordString = $long + "," + $lat + "," + "0";

                // $coordList += "\n" + $coordString;

                $points.push({
                    lat: $lat,
                    long: $long,
                    alt: 0
                })

                $curRow++;

                $objectIdNext = hotTable.hot.getDataAtCell($curRow, $objectIdCol);

            } while ($objectIdNext === $objectId);


            let L = new geoL.TGeoLine($points, $name, $description, $styleName);

            $geoLines.push(L);

        }

        return $geoLines;
    };


    exports.getGeoCircle = function ($centerLat, $centerLong, $radius) {

        let $geoCircle = new geoCircle.TGeoCircle($centerLat, $centerLong, $radius, 1, 'круг',
            "", 1);

        let $extension = ".kml";
        jsUtil.downloadFile("GeoCircle" + $extension, kml.getKmlCircleBody($geoCircle));

        //alert($circle.toKml());
        // console.log($circle.toKml());
    }
    ////////////////////////////////////////////
    exports.getGeoPolygons = function () {

        let $geoPolygons = [];


        let $objectIdCol = GeoController.$settings.$objectIdCol;
        let $stylesIdCol = GeoController.$settings.$stylesNamesCol;
        let $colLat = GeoController.$settings.$latCol;
        let $colLong = GeoController.$settings.$longCol;


        let $colsName = GeoController.$settings.$nameCols;
        let $colsDescription = GeoController.$settings.$descriptionCols;
        let $delimiter = ' ';

        let $styleId = "";

        // alert("kml цвет " + $color);


        let $firstRow = 0;
        let $rowCount = hotTable.hot.countRows();


        //alert(hotTable.hot.columnWidth());
        //alert($colLat + ""+ $colLong+ ""+$colsName+ ""+ $colsDescription);

        /*
        let mask = /[^(\w)|(\x7F-\xFF)|(\s)]$/;

        if (!mask.test(ID)) {
            continue;
        }
        */
        let $curRow = 0;
        let $objectId = "";
        let $name = "";
        let $description = "";


        while ($curRow < $rowCount) {

            $name = "";
            $description = "";
            let $coordList = "";
            let $coordString = "";

            $objectId = hotTable.hot.getDataAtCell($curRow, $objectIdCol);
            let $styleName = hotTable.hot.getDataAtCell($curRow, $stylesIdCol);

            let $lat = hotTable.hot.getDataAtCell($curRow, $colLat);
            let $long = hotTable.hot.getDataAtCell($curRow, $colLong);


            $coordString = $long + "," + $lat + "," + "0";
            $coordList += $coordString;

            for (let $col of $colsName) {

                $name += hotTable.hot.getDataAtCell($curRow, $col) + $delimiter;
            }

            for (let $col of $colsDescription) {

                $description += hotTable.hot.getDataAtCell($curRow, $col) + $delimiter;
            }


            $curRow++;

            let $objectIdNext = hotTable.hot.getDataAtCell($curRow + 1, $objectIdCol);

            do {

                // $lineId = hotTable.hot.getDataAtCell($curRow, $colLineId);
                let $lat = hotTable.hot.getDataAtCell($curRow, $colLat);
                let $long = hotTable.hot.getDataAtCell($curRow, $colLong);
                $coordString = $long + "," + $lat + "," + "0";

                $coordList += "\n" + $coordString;

                $curRow++;

                $objectIdNext = hotTable.hot.getDataAtCell($curRow, $objectIdCol);

            } while ($objectIdNext === $objectId);


            let Pl = new geoPolygon.TGeoPolygon($coordList, $name, $description, $styleName);

            $geoPolygons.push(Pl);

        }

        return $geoPolygons;

        //   let Pl = new geoPolygon.TGeoPolygon($coordList, $name, $description, $styleId);

        //   $geoPolygons.push(Pl);

        //  }

        // return $geoPolygons;


    };
    exports.setObjectIdCol = function ($dom_input) {

        this.$settings.$objectIdCol = $dom_input.value;
    };


    exports.setNameCols = function ($dom_input) {

        if ($dom_input.checked) {
            // this.$settings.$nameCols.push(arr_EN.indexOf($dom_input.value))
            this.$settings.$nameCols.push($dom_input.value)
        } else {
            this.$settings.$nameCols.splice
            (this.$settings.$nameCols.indexOf($dom_input.value), 1);
            // (this.$settings.$nameCols.indexOf(arr_EN.indexOf($dom_input.value)), 1);
        }

        //alert(this.$settings.$nameCols); //через запятую
        //alert(this.$settings.$nameCols.join("\t"));
    };

    exports.setLatCol = function ($dom_input) {

        // this.$settings.$latCol = arr_EN.indexOf($dom_input.value);
        this.$settings.$latCol = $dom_input.value;
        //alert(this.$settings.$latCol);
    };

    exports.setLongCol = function ($dom_input) {

        // this.$settings.$longCol = arr_EN.indexOf($dom_input.value);
        this.$settings.$longCol = $dom_input.value;
        //alert(this.$settings.$longCol);
    };


    exports.setDescriptionCols = function ($dom_input) {

        if ($dom_input.checked) {

            //  this.$settings.$descriptionCols.push(arr_EN.indexOf($dom_input.value))
            this.$settings.$descriptionCols.push($dom_input.value)

        } else {
            this.$settings.$descriptionCols.splice
            (this.$settings.$descriptionCols.indexOf($dom_input.value), 1);
        }

        //this.$settings.$descriptionCols.sort();
        //alert(this.$settings.$descriptionCols.join("\t"));
    };


    exports.setStylesNamesCol = function ($dom_input) {

        this.$settings.$stylesNamesCol = $dom_input.value;
    };

    exports.setObjectIdCol = function ($dom_input) {

        GeoController.$settings.$objectIdCol = $dom_input.value;
    };


    exports.setTypePlacemark = function ($dom_input) {

        this.$settings.$typePlacemark = $dom_input.value;
        //alert(this.$settings.$typePlacemark);
    };

    exports.setTypeOutputFormat = function ($dom_input) {

        this.$settings.$typeOutputFormat = $dom_input.value;
        //alert(this.$settings.$typePlacemark);
    };


    exports.setStyleName = function ($dom_input) {

        this.$settings.$styles[$dom_input.name].setName($dom_input.value);
        // alert( this.$settings.$styles[$dom_input.name].getName());

    };

    exports.setWidth = function ($dom_input) {

        this.$settings.$styles[$dom_input.name].setWidth($dom_input.value);
    };


    exports.setColorLine = function ($dom_input) {

        this.$settings.$styles[$dom_input.name].setColorLine($dom_input.value);
    };

    exports.setColorFill = function ($dom_input) {

        this.$settings.$styles[$dom_input.name].setColorFill($dom_input.value);
    };

    exports.setIconUrl = function ($dom_input) {
//https://img2.freepng.ru/20180423/dhe/kisspng-earthquake-weather-computer-icons-symbol-5add5b8341e170.4567937415244563232699.jpg
        this.$settings.$styles[$dom_input.name].setIconUrl($dom_input.value);
    };

    exports.setIconScale = function ($dom_input) {

        this.$settings.$styles[$dom_input.name].setIconScale($dom_input.value);
    };


    exports.addStyle = function () {

        //alert('добавить стиль');
        this.$settings.$styles.push(new styles.TStyle());
        Vue.methods.addForm();
        console.log(this.$settings.$styles);

    };

    exports.removeStyle = function ($style) {

        //let doRemove = confirm('Удалить стиль?');
        //alert(doRemove);

        // if (doRemove) {
        this.$settings.$styles.splice($style, 1);
        // Vue.removeForm(this.index)
        // console.log(this.$settings.$styles);
        //} else {
        //   alert('нажата отмена');
        //  }

    };


}(window.GeoController = {}));