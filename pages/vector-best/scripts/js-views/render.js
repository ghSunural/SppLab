import * as V from "./templates/views.js"

export let doRender = async function (report) {

    document.getElementById("test-html").innerHTML = "";

    report = report[0];

    for (let enterprise_name of Object.keys(report)) {

        //console.log(enterprise_name);
        //console.log(report[enterprise_name]);

        for (let medDev of report[enterprise_name]) {
            document.getElementById("test-html").innerHTML
                += await V.jsv_item_list(medDev);
        }

    }


}





