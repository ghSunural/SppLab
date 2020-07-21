'use strict';


;(function (exports) {

    exports.TGeoLine = function($coordList, $name, $description) {



        //this.lat = $lat;
        //this.long = $long;
        //this.alt = $alt;
        this.coordList  = $coordList;
        this.name = $name;
        this.description = $description;

        this.getName = function () {
            return this.name;
        };

        this.getDescription = function () {
            return this.description;
        };

        this.getCoordList = function () {


            return this.coordList;
        };



        this.toKml = function () {

            return `
<Placemark>
<name>
    ${this.getName()}
</name>
<description>
    ${this.getDescription()}
</description>
<LineString>
    <coordinates>    
        ${this.getCoordList()}  
    </coordinates>
</LineString>
</Placemark>`;
        };
    };


}(window.geoL = {}));