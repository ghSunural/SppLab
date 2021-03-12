//import * as EH from "/pages/mapCreator/scripts/js-models/ErrorHandler.js";

import * as EH from "/pages/mapCreator/scripts/js-models/Lib/ErrorHandler.js";
import * as PL from "./js-views/plChart.js";
import * as Util from "/scripts/jseUtil.js";
import *  as TR from "/pages/mapCreator/scripts/js-models/Data/TDelaunayTriangulation.js";
import * as A from "./actions.js";
import * as M from "./js-models/Lib/MathLib.js";
import * as CONSTS from "./js-models/Consts.js";
import {acnGetSourceData} from "./actions.js";

A;
EH;
M;

alert('js-cntr-loaded');

//отрисовываем пустую диаграмму
PL.drawChart();

document.querySelector("#js-test-button")
    .addEventListener("click", function () {
        A.acnTests();
    });


let sel = document.querySelector(`#${CONSTS.HTML_SELECT_TEST_SET}`);
sel.addEventListener("change", function () {
      //  A.acnConvexHull(sel.value);
        console.log(sel.value);
    });




document.querySelector(`#${CONSTS.HTML_CONVEX_HULL_BUTTON}`)
    .addEventListener("click", function () {
        A.acnConvexHull();
    });



document.querySelector("#js-simple-test")
    .addEventListener("click", function () {
        A.acnSimpleTests();
    });



document.querySelector("#js-get-source-data")
    .addEventListener("click", function () {
        A.acnGetSourceData();
    });

document.querySelector("#js-greedy-tr")
    .addEventListener("click", function () {
        A.acnGreedy();
    });

document.querySelector("#js-draw-chart")
    .addEventListener("click", function () {

        A.acnDrawChartSourceData();
    });

document.querySelector("#js-save")
    .addEventListener("click", function () {
      A.acnSaveToJsonFile();
    });

document.querySelector("#js-load")
    .addEventListener("change", {
        handleEvent: Util.readJsonFile,
        a: this,
        b: TR.TDelaunayTriangulation()
    });

document.querySelector("#js-load")
    .addEventListener("change", function () {

        alert('load2');
        let file = this.files[0];
        TR.TDelaunayTriangulation.instance = Util.readJsonFile(file);

    });

/*
function makePublisher(object) {
    var i;
    for (i in publisher) {
        if (publisher.hasOwnProperty(i) && typeof publisher[i] === "function") {

            object[i] = publisher[i];
        }
    }
    object.subscribers = {any: []};
}


let dr = function () {
    Array.observe(instance.nodeSet, function (changes) {
        console.log(changes);
    });
}
*/
