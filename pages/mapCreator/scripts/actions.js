import * as HT from "./js-views/hotTable.js";
//import * as Util from "/scripts/jseUtil.js";
//import *  as TR from "/pages/mapCreator/scripts/js-models/TDelaunayTriangulation.js";
import * as TR from "./js-models/Data/TDelaunayTriangulation.js";
import * as PL from "./js-views/plChart.js";

import * as Algo from "./js-models/Algo/AlgGreedy.js";
import * as CH from "./js-models/Algo/ConvexHull.js";
import * as Util from "../../../scripts/jseUtil.js";
import * as DM from "./js-models/Data/DataManager.js";
import * as TS from "./tests/testSets/testsSets.js";
import * as CONSTS from "./js-models/Consts.js";
import * as P from "./js-models/Data/TPoint.js";
import * as E from "./js-models/Data/TEdge.js";
import * as ML from "./js-models/Lib/MathLib.js";

export let acnGreedy = () => {

    console.log("acnGreedy");
    //   let sourceNodeSet = DM.getNodesFromTable(HT.hot);
    //console.log(TR.TDelaunayTriangulation());
    //let trD = TR.TDelaunayTriangulation();
    //trD.nodeSet = fillNodesSetFrom(HT.hot);
    let sel = document.querySelector(`#${CONSTS.HTML_SELECT_TEST_SET}`);
    let selval = sel.value;
    let sourceNodeSet = [];

    if (selval === 'hot') {
        sourceNodeSet = DM.getNodesFromTable(HT.hot);
    } else {
        sourceNodeSet = TS.getTestSet(selval);
    }

    PL.plotPointSet(sourceNodeSet);
    let g = Algo.getTrGreedy(sourceNodeSet);
    console.log("TrGreedy");
    console.log(g);
}


export let acnConvexHull = () => {
    console.log("acnConvexHull");
    let sel = document.querySelector(`#${CONSTS.HTML_SELECT_TEST_SET}`);
    let selval = sel.value;
    //simple
    //regular
    let pointsArr = [];

    if (selval === 'hot') {
        pointsArr = DM.getNodesFromTable(HT.hot);
    } else {
        pointsArr = TS.getTestSet(selval);
    }

    PL.plotPointSet(pointsArr);
    let ch = CH.getConvexHull(pointsArr);
    console.log("CH.getConvexHull");
    console.log(ch.convexHull);

    console.log("CH.internalPoints");
    console.log(ch.internalPoints);
}

export let acnTests = () => {
    console.log("acnTests");

    //10-я точка
    let point_beg = P.FNode.create({name: '10-я', x: 50, y: 300});
    //0-я точка
    let point_end = P.FNode.create({name: '0-я', x: 100, y: 100});

    //let point_end = P.FNode.create({name: '0-я', x: 100, y: 100});

    let edge = E.FEdge.create({p1: point_beg, p2: point_end});


    let nodeSet = TS.getTestSet('simple');


    let i = 0;
    for (let node of nodeSet) {

        if (P.comparePoints(edge.p1, node)
            || P.comparePoints(edge.p2, node)) {
            continue;
        }

        let va = ML.getVector(node, edge.p2);
        let vb = ML.getVector(node, edge.p1);
        let cosi = ML.cos_ab(va, vb);

        console.log(`i=${i}  node:${node.name} (x:${node.x} y:${node.y})  cosi: ${cosi}`);
        i++
    }

}

export let acnSimpleTests = () => {
    console.log('simple test');
}

export let acnGetSourceData = () => {
    alert("acnGetSourceData");
    console.log(DM.getNodesFromTable(HT.hot));
}
/*
HT.hot.afterChange() = function (){

}
*/


export let acnDrawChartAnySet = () => {
    alert("acnDrawChart any set");


}


export let acnDrawChartSourceData = () => {
    alert("acnDrawChart");
    //возвращает instance


    let trD = TR.TDelaunayTriangulation();

    let nodeSet = trD.nodeSet;
    nodeSet = DM.getNodesFromTable(HT.hot);


    let data = [];

    let nodes = {
        name: 'Узлы',
        type: 'scatter',
        x: [],
        y: [],
        text: [],
        textposition: 'left',
        mode: 'markers+text',
        marker: {
            color: 'rgb(255,0,0)',
            size: 10
        }
    };

    let edges = {
        name: 'Ребра',
        type: 'scatter',
        x: [],
        y: [],
        mode: 'lines',
        marker: {
            color: 'rgb(255,255,0)',
            size: 10
        }
    };


    let triangles = {
        name: 'Треугольники',
        type: 'scatter',
        x: [],
        y: [],
        mode: 'markers+lines',
        marker: {
            color: 'rgb(255,0,255)',
            size: 10
        }
    };

    for (let i = 0; i < nodeSet.length; i++) {

        nodes.x.push(nodeSet[i].x);
        nodes.y.push(nodeSet[i].y);
        nodes.text.push(nodeSet[i].name);
    }

    //  edges.x.push();
    //  edges.y.push();


    data.push(nodes);
    PL.drawChart(data);

}


export let acnSaveToJsonFile = function () {
    alert('save');
    Util.saveToJsonFile(TR.TDelaunayTriangulation(), 'nodes.trjson');
}

