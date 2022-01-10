import * as V from "./templates/views.js"
import * as CONSTS from "../js-models/Consts.js";
import * as DOM from "./js-dom.js"
import * as Http from "../js-models/Http.js";
import * as PL from "./plChart.js";

export let renderEnterprises = async function (enterprises) {

    //console.log("renderEnterprises ");

    DOM.SEl_ENTERPRISES.innerText = "";

    for (let i = 0; i < enterprises.length; i++) {

        DOM.SEl_ENTERPRISES.innerHTML +=
            `<option class="enterp" id="e${enterprises[i]["code"]}" value="${enterprises[i]["code"]}"  title="${enterprises[i]["hint"] || ""}">
                 ${enterprises[i]["title"]} 
             </option>`;
    }

}

export let renderLastUpdate = async function (lastUpdate) {

    //console.log("renderLastUpdate");
    DOM.LBL_LAST_UPDATE.innerHTML = `<span class="last-update">${lastUpdate}</span>`;
}

export let doRenderReport = async function (report) {

    PL.drawChart();
    DOM.REPORT_AS_LIST.innerHTML = "";
    DOM.REPORT_AS_TABLE.innerHTML = "";


    for (let enterprise_name of Object.keys(report)) {

        let pl_enterprise = {
            name: enterprise_name,
            count: report[enterprise_name].length
        }

        PL.addEnterprise(pl_enterprise);

        for (let medDev of report[enterprise_name]) {
            DOM.REPORT_AS_LIST.innerHTML += await V.jsv_item_as_list_item(medDev);
            V.jsv_item_as_table(DOM.REPORT_AS_TABLE, medDev);

        }


        try {
            let code = await report[enterprise_name][0]['code'] || undefined;
            let re = await document.querySelector(`#e${code}`).innerText;
            re = re.substring(0, re.indexOf('|')) || re;
            re += await ` | (+ ${report[enterprise_name].length})` || "-";
            document.querySelector(`#e${code}`).innerHTML = re;
            document.querySelector(`#e${code}`).className = "changed_enterprises";

        } catch (e) {
            continue;
        }

    }

    if (DOM.REPORT_AS_LIST.innerText === "") {
        DOM.REPORT_AS_LIST.innerHTML = '<span class="alert_message">Нет записей...\r\n Попробуйте выбрать другие организации и/или отчетный период</span>';
        DOM.REPORT_AS_TABLE.innerHTML = '<span class="alert_message">Нет записей...\r\n Попробуйте выбрать другие организации и/или отчетный период</span>';
    }

    //console.log(DOM.REPORT);

   // V.jsv_report_styles();

}












