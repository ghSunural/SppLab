'use strict';
;(function (exports) {




    var data = [
        []
    ];

    var col =  [
        { editor: 'select',
            selectOptions: ['Kia', 'Nissan', 'Toyota', 'Honda']},
        {
            editor: 'select',
            selectOptions: ['Kia', 'Nissan', 'Toyota', 'Honda']
        },
        { type: 'dropdown',
            source: ['yellow', 'red', 'orange', 'green', 'blue', 'gray', 'black', 'white']}
    ];


    var container = document.getElementById('EditTable');

    exports.hot = new Handsontable(container, {



        minCols: 15,
        minRows: 1,
        rowHeaderWidth: 100,
        colWidths: 100,
        data: data,
        rowHeaders: true,
        height: 200,
        colHeaders:  true,
       /* fixedRowsTop: 1,*/
        filters: true,
        dropdownMenu: true,
        manualColumnResize: true,
        manualRowResize: true,
        manualColumnMove: true,
        manualRowMove: true,
    });

    exports.hot.onresize = function (){

        alert('изменился размер');
    }


    exports.clearTable = function () {

        hotTable.hot.clear();


        //hotTable.hot.deleteRows(container);
    };

    exports.redrawDescription = function () {

        alert("в функции redrawDescription [пока не работает]");
    };

}(window.hotTable = {}));