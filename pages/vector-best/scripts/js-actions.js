import * as Http from "./js-models/Http.js"
import * as U from "./js-models/Util.js"
import * as R from "./js-views/render.js"
import * as CONSTS from "./js-models/Consts.js";
import * as DOM from "./js-views/js-dom.js";
import * as PL from "./js-views/plChart.js"


export let jq_test = () => {
    console.log("jq_test");

}

export let export2excel = () => {
    console.log("export2excel");
    U.export2excel(DOM.REPORT_AS_TABLE);

}

export let testfunction = () => {
    console.log("jtestfunction");
   // $('#js-report').append($('#js-plotly').clone())


}


export let acnInspect = async () => {
    //console.log("acnInspect");
    let resp = await Http.inspect();
}

export let acnUpdateHrefRc = async () => {
    //console.log("acnUpdateHrefRc");
    let resp = await Http.updateHrefs();
    alert(resp.status());

}

export let acnReport = async () => {

    //console.log("acnReport");

    let enterprises = await Http.getEnterprises();

    for (let i = 0; i < enterprises.length; i++) {

        DOM.SEl_ENTERPRISES.childNodes[i].innerText = `${enterprises[i]["title"]}`;
        DOM.SEl_ENTERPRISES.childNodes[i].className = "enterp";
    }

    let dstart = DOM.D_START.value;
    let dend = DOM.D_END.value;

    let enterprises_codes = [];
    // let html_select_enterprises = DOM.SEl_ENTERPRISES;

    for (let i = 0; i < DOM.SEl_ENTERPRISES.length; i++) {

        if (DOM.SEl_ENTERPRISES.childNodes[i].selected) {
            enterprises_codes.push(DOM.SEl_ENTERPRISES.childNodes[i].value);
        }
    }

    if (enterprises_codes.length === 0) {
        // alert("Не выбрано ни одного предприятия.");
        return;
    }

    let options = {
        enterprises_codes: enterprises_codes,
        period: {
            start: dstart,
            end: dend
        }
    }

    let resp = await Http.getReport(options);
    R.doRenderReport(resp);
}


export let acnRenderHomepage = async () => {

    //console.log("acnRenderHomepage");

    let enterprises = await Http.getEnterprises();
    R.renderEnterprises(enterprises);

    let lastUpdate = await Http.getLastUpdate();
    R.renderLastUpdate(lastUpdate['date']);

    PL.drawChart();



}


