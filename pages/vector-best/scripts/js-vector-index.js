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
import * as DOM from "./js-views/js-dom.js";
import * as U from "./js-models/Util.js";
import * as A from "./js-actions.js";
import {testfunction} from "./js-actions.js";


//alert('js-cntr-loaded');
/*
$(document).ready( function () {
    $('#js-report-as-table').DataTable();
} );
*/



let firstLoad = function (callback) {
    A.acnRenderHomepage();
    callback();
}

window.onload = function () {

    //console.log("onload render main");
    A.acnRenderHomepage();




    // firstLoad(A.acnReport);
}

/*
DOM.BTN_JQ_TEST.addEventListener("click", function () {

    A.jq_test();
    //A.acnTests();
});
*/
/*
($('#js-test').on('click', A.jq_test));
*/

DOM.SEl_ENTERPRISES.addEventListener("change", function () {

    A.acnReport();
    //A.acnTests();
});

/*
DOM.BTN_GET_REPORT.addEventListener("click", function () {
    A.acnReport();
    //A.acnTests();
});

 */

DOM.BTN_INSPECT.addEventListener("click", function () {
    A.acnInspect();
    //A.acnTests();
});

DOM.BTN_UPDATE_HREF_RC.addEventListener("click", function () {
    A.acnUpdateHrefRc();
    //A.acnTests();
});

DOM.BTN_EXPORT_EXCEL.addEventListener("click", function () {
    A.export2excel();
    //A.acnTests();
});


DOM.RADIO_LAST_DAYS.addEventListener("click", function () {

    let bounds = U.getDatePoints();
    DOM.D_START.valueAsDate = bounds['fewDaysAgo'];
    DOM.D_END.valueAsDate = bounds['today'];
    A.acnReport();

});



DOM.RADIO_CUR_WEEK.addEventListener("click", function () {

    let bounds = U.getDatePoints();
    DOM.D_START.valueAsDate = bounds['firstday_week'];
    DOM.D_END.valueAsDate = bounds['today'];
    A.acnReport();

});

DOM.RADIO_CUR_MONTH.addEventListener("click", function () {

    let bounds = U.getDatePoints();
    DOM.D_START.valueAsDate = bounds['firstday_month'];
    DOM.D_END.valueAsDate = bounds['today'];
    A.acnReport();

});

DOM.RADIO_CUR_YEAR.addEventListener("click", function () {

    let bounds = U.getDatePoints();
    console.log(bounds['firstday_year']);

    DOM.D_START.valueAsDate = bounds['firstday_year'];
    DOM.D_END.valueAsDate = bounds['today'];
    A.acnReport();

});

DOM.RADIO_CUSTOM_PERIOD.addEventListener("click", function () {
    A.acnReport();
});


DOM.D_START.addEventListener("change", function () {
    A.acnReport();
});


DOM.D_START.addEventListener("click", function () {
    DOM.RADIO_CUSTOM_PERIOD.checked = true;
});

DOM.D_END.addEventListener("change", function () {
    A.acnReport();
});

DOM.D_END.addEventListener("click", function () {
    DOM.RADIO_CUSTOM_PERIOD.checked = true;
});