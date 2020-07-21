'use strict';


;(function (exports) {



    exports.TGeoPoint = function ($lat, $long, $alt, $name, $description) {

        this.lat = $lat;
        this.long = $long;
        this.alt = $alt;
        this.name = $name;
        this.description = $description;

        this.getName = function () {
            return this.name;
        };

        this.getDescription = function () {
            return this.description;
        };

        this.getLat = function () {
            return this.lat;
        };

        this.getLong = function () {
            return this.long;
        };

        this.getAlt = function () {
            return this.alt;
        };


        this.toKmlPlacemark = function () {

            return `
<Placemark>
<name>
    ${this.getName()}
</name>
<description>
    ${this.getDescription()}
</description>
<Point>
    <coordinates>${this.getLong()}, ${this.getLat()}, ${this.getAlt()}</coordinates>
</Point>
</Placemark>`;
        };

        this.toGpxWayPoint = function () {

            return `
<wpt lat="${this.getLat()}" lon="${this.getLong()}"><name>${this.getName()}</name></wpt>
`;
        };











    };

    //exports.TGeoPoint = this.TGeoPoint();


}(window.geo = {}));

