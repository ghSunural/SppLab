'use strict';
;(function (exports) {

    var data = [
        ['']
    ];

    var container = document.getElementById('EditTable');

    exports.hot = new Handsontable(container, {

        minCols: 10,
        minRows: 10,
        rowHeaderWidth: 100,
        colWidths: 100,
        data: data,
        rowHeaders: true,
        colHeaders: true,
        filters: true,
        dropdownMenu: true,
        manualColumnResize: true,
        manualRowResize: true,
        manualColumnMove: true,
        manualRowMove: true
    });


    exports.clearTable = function () {

        hotTable.hot.clear();
    };

    exports.redrawDescription = function () {

        alert("в функции redrawDescription [пока не работает]");
    };

}(window.hotTable = {}));