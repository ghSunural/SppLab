'use strict';


//;(function (exports) {

  //  alert('hot');

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


    var container = document.getElementById('js-edit-table');



    let hot = new Handsontable(container, {

        col: col,
        minCols: 4,
        minRows: 4,
        rowHeaderWidth: 100,
        colWidths: 100,
        data: data,
        rowHeaders: true,

        height: '70vh',
       // width: '90%',
        colHeaders:  true,

        /* fixedRowsTop: 1,*/

        filters: true,
        dropdownMenu: true,
        manualColumnResize: true,
        manualRowResize: true,
        manualColumnMove: true,
        manualRowMove: true,
    });

    hot.onresize = function (){

        alert('изменился размер');
    }


    let clearTable = function () {

        hotTable.hot.clear()


        //hotTable.hot.deleteRows(container);
    };

    let redrawDescription = function () {

        alert("в функции redrawDescription [пока не работает]");
    }


export {hot};
//}(window.hotTable = {}));