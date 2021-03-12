import * as TPoint from "./TPoint.js"

export let getNodesFromTable = function (hotTable) {

    let $nodeSet = [];

    let $firstRow = 0;
    let $rowCount = hotTable.countRows();
    let $ordered_num = $firstRow;


    // не работает проверка на пустоту массива HT.hot.getSourceDataArray.length === 0
    //console.log(hotTable.getDataAtCell(0, 0));

    if (hotTable.getDataAtCell(0, 0) === null) {
        throw new Error('Нет данных');
    }

    for (let $curRow = $firstRow; $curRow < $rowCount; $curRow++) {

        $ordered_num = $curRow;

        let $x = hotTable.getDataAtCell($curRow, 0);
        let $y = hotTable.getDataAtCell($curRow, 1);
        let $param = hotTable.getDataAtCell($curRow, 2);
        let P = TPoint.FNode.create(
            {
                num: $ordered_num,
                x: $x,
                y: $y,
                z: $param
            }
        );
        $nodeSet.push(P);
    }
    return $nodeSet;

}




/*
let fillNodesSetFrom = function (hotTable) {

    let $nodeSet = [];

    let $firstRow = 0;
    let $rowCount = hotTable.countRows();
    let $ordered_num = $firstRow;


    // не работает проверка на пустоту массива HT.hot.getSourceDataArray.length === 0
    console.log(hotTable.getDataAtCell(0, 0));
    if (hotTable.getDataAtCell(0, 0) === null) {
        throw new Error('Нет данных');
    }

    for (let $curRow = $firstRow; $curRow < $rowCount; $curRow++) {

        $ordered_num = $curRow;


        let $x = hotTable.getDataAtCell($curRow, 0);
        let $y = hotTable.getDataAtCell($curRow, 1);
        let $param = hotTable.getDataAtCell($curRow, 2);
        let P = new TR.TNode($ordered_num, $x, $y, $param);
        $nodeSet.push(P);
    }
    return $nodeSet;

}

 */