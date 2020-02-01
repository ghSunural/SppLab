'use strict';

(function (exports) {

        var data = [
            ['', '', '', '1'],
        ];

        var container = document.getElementById('example');
        exports.hot = new Handsontable(container, {
            data: data,
            rowHeaders: true,
            colHeaders: true,
            filters: true,
            dropdownMenu: true


        });

        var cell = {

            //    c1:  getCellValue(2, 2)

        };




        exports.pushHtml = function (id, innerText) {
            document.getElementById(id).innerHTML = innerText;
        };


        exports.saveToFile = function (elemId) {
            //console.log();

            var text = document.getElementById(elemId).value;

            jsUtil.downloadFile("geoData_KML.kml", text);
        };


    }(window.kml = {})
);