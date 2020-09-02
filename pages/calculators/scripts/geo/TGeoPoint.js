'use strict';


;(function (exports) {


    exports.TGeoPoint = function ($lat, $long, $alt, $name, $description, $styleId) {

        this.lat = $lat || '';
        this.long = $long || '';
        this.alt = $alt || '0';
        this.name = $name || '';
        this.description = $description || '';


        this.styleId = $styleId || 'empty_style';
        this.getStyleId = function () {

            return this.styleId;
        };


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
<Point>
    <coordinates>${this.getLong()}, ${this.getLat()}, ${this.getAlt()}</coordinates>
</Point>
</Placemark>`;
        };



        this.toGpx = function () {

            return `
<wpt lat="${this.getLat()}" lon="${this.getLong()}"><name>${this.getName()}</name></wpt>`;
        };


    };

    //exports.TGeoPoint = this.TGeoPoint();


}(window.geoPoint = {}));

