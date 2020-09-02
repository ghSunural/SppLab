'use strict';


;(function (exports) {

    exports.TGeoLine = function ($points, $name, $description, $styleId) {

        /*
        this.coordList = [{
            lat: "",
            long: "",
            alt: ""
        }];
        */

        this.points = $points;
        this.name = $name;
        this.description = $description;

        this.styleId = $styleId;


        this.getStyleId = function () {

            return this.styleId;
        };


        this.getName = function () {
            return this.name;
        };

        this.getDescription = function () {
            return this.description;
        };

        function getCoordListKml($points) {

            let $coordList = "";

            for (let $point of $points) {

                let $coordString = $point.long + "," + $point.lat + "," + $point.alt;
                $coordList += '\n        ' + $coordString;

            }

            return $coordList.trim();
        }

        function getCoordListGpx($points) {

            let $coordList = "";

            for (let $point of $points) {

                let $coordString = `<rtept lon="${$point.long}" lat="${$point.lat}"/>`;
                $coordList += '\n        ' + $coordString;
            }

            return $coordList.trim();
        }


        this.toKml = function () {

            return `
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

        this.toGpx = function () {

            return `
<rte>
        ${getCoordListGpx(this.points)} 
</rte>`
        };
    };


}(window.geoL = {}));