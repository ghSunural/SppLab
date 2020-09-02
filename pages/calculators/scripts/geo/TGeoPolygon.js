'use strict';


;(function (exports) {

    exports.TGeoPolygon = function ($coordList, $name, $description, $styleId) {

        this.coordList = $coordList;
        this.name = $name;
       // this.description = $description;
        this.description = $description;

        this.styleId = $styleId;

        this.getStyleId = function(){

            return this.styleId;
        };

        this.getName = function () {
            return this.name;
        };

     //   this.getDescription = function () {
       //     return this.description;
     //   };

        this.getCoordList = function () {

            return this.coordList;
        };

        this.getDescription = function () {
            return this.description;
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
<Polygon>
<tessellate>1</tessellate>
<outerBoundaryIs>
<LinearRing>
  <coordinates>
    ${this.getCoordList()}
  </coordinates>
</LinearRing>
</outerBoundaryIs> 
</Polygon>
</Placemark>`;
        };
    };


}(window.geoPolygon = {}));