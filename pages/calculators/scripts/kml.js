'use strict';

(function (exports) {

        var data = [
            ['', '', '', ''],
            ['', '', '', ''],
        ];

        var container = document.getElementById('example');
        exports.hot = new Handsontable(container, {
            data: data,
            rowHeaders: true,
            colHeaders: true,
            filters: true,
            dropdownMenu: true



        });




        exports.saveToFileElem = function (elemId) {
            //console.log();

            var text = document.getElementById(elemId).value;

            jsUtil.downloadFile("geoData_KML.kml", text);
        };

    //.saveToFileVar(kml.TGeoPoint.)

    }(window.kml = {})
);

/*
<?xml version="1.0" encoding="UTF-8"?>
<kml xmlns="http://www.opengis.net/kml/2.2">	<Placemark>
<name>
6.2
</name>
<IconStyle>
<Icon>
<href></href>
</Icon>
</IconStyle>
<description>
MLH = 6.2
1628.10.7  0:0:0
Глубина = 20 км
40.6 c.ш.  114.2 в.д.
</description>
<Point>
<coordinates>114.2, 40.6, 0</coordinates>
</Point>
</Placemark>
<Placemark>
<name>
6.5
</name>
<IconStyle>
<Icon>
<href></href>
</Icon>
</IconStyle>
<description>
MLH = 6.5
1873.10.18  0:0:0
Глубина = 20 км
40.5 c.ш.  113.5 в.д.

</description>
<Point>
<coordinates>113.5, 40.5, 0</coordinates>
</Point>
</Placemark>
</kml>
*/
