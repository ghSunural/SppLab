//import * as EH from "/pages/mapCreator/scripts/js-models/ErrorHandler.js";
/*
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

*/

import * as CONSTS from "./js-models/Consts.js";
import * as A from "./js-actions.js"

alert('js-cntr-loaded');

/*
document.querySelector("#js-test-button")
    .addEventListener("click", function () {
        A.acnTests();
    });


let sel = document.querySelector(`#${CONSTS.HTML_SELECT_TEST_SET}`);
sel.addEventListener("change", function () {
    //  A.acnConvexHull(sel.value);
    console.log(sel.value);
});


 */



document.querySelector(`#${CONSTS.HTML_GET_REPORT}`)
    .addEventListener("click", function () {


      A.acnVendorData();
        //A.acnTests();
    });