'use strict';


;(function (exports) {

    exports.TGeoCircle = function ($centerLat, $centerLong, $radius, $dA, $name, $description, $styleId) {

        //let $coordList2 =  this.createCoordList($centerLat, $centerLong, $radius, $dA);

        this.centerLat = $centerLat;
        this.centerLong = $centerLong;

        this.points = createCoordList($centerLat, $centerLong, $radius, $dA);
        this.name = $name;
        this.description = $description;

        this.styleId = $styleId;



        this.getCenterLat = function(){

            return this.centerLat;
        }

        this.getCenterLong = function(){

            return this.centerLong;
        }


        this.getStyleId = function () {

            return this.styleId;
        };


        this.getName = function () {
            return this.name;
        };

        this.getDescription = function () {
            return this.description;
        };

        function toRad($degree) {

            return Math.PI / 180 * $degree;
        }

        function f_geodesist_task($lat1, $long1, $radius, $azimutDegree) {


            //https://planetcalc.ru/73/
            let $R_EARTH = 6371.008; //6 367 444.6571 по WGS


            let $S = $radius / $R_EARTH;

            let sin_l1 = Math.sin(toRad($lat1));
            let cos_S = Math.cos($S);
            let cos_l1 = Math.cos(toRad($lat1));
            let sin_S = Math.sin($S);
            let cos_a = Math.cos(toRad($azimutDegree));
            let sin_a = Math.sin(toRad($azimutDegree));
             //console.log()

            //sin(phi2) = sin(phi1) * cos(l) + cos(phi1) * sin(l) * cos(A)
            let $lat2 = Math.asin(sin_l1 * cos_S + cos_l1 * sin_S * cos_a);

            //let $lat2 = $lat1 + 0.01;
            $lat2 = $lat2 * 180 / Math.PI;
            //alert('$lat2 ' + $lat2);

            //sin(d_lyambda) = sin(A) * sin(l) / cos(phi2)
            let $long2 = toRad($long1)  + Math.atan((sin_S * sin_a) / (cos_S * cos_l1 - sin_S * sin_l1 * cos_a));
            //let $long2 = $long1 + Math.asin(sin_a*sin_S/Math.cos($lat2));
            $long2 = $long2 * 180 / Math.PI;



            return {
                lat2: $lat2,
                long2: $long2,
                alt: 0
            }
        }

        function createCoordList($centerLat, $centerLong, $radius, $dA) {

            let $points = [];
            let $curA = 0;
            while ($curA <= 360) {

                let $p2 = f_geodesist_task($centerLat, $centerLong, $radius, $curA);

                $points.push({
                    lat: $p2.lat2,
                    long: $p2.long2,
                    alt: 0
                })

                $curA += $dA;
            }


            return $points;
        }

        this.getCoordList = function () {

            return this.coordList;
        };


        function getCoordListKml($points) {

            let $coordList = "";

            for (let $point of $points) {

                let $coordString = $point.long + "," + $point.lat + "," + $point.alt;
                $coordList += '\n        ' + $coordString;

            }

            return $coordList.trim();
        }





        this.toKml = function () {

            return `
<Placemark>
<Point>
    <coordinates>${this.getCenterLong()}, ${this.getCenterLat()}, 0</coordinates>
</Point>
</Placemark>
<Placemark>
<name>
    ${this.getName()}
</name>
<description>
    ${this.getDescription()}
</description>
<styleUrl>#${this.getStyleId()}</styleUrl>
<LineString>
    <coordinates>    
        ${getCoordListKml(this.points)}    
    </coordinates>
</LineString>
</Placemark>`;
        };
    };


}(window.geoCircle = {}));