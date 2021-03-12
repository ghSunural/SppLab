import * as Http from "./js-models/Http.js"
import * as R from "./js-views/render.js"

export let acnVendorData =  async() => {

    console.log("рапорт");

    let dstart = document.querySelector(`#dstart`).value;
    let dend = document.querySelector(`#dend`).value;

    let options = {
        enterprises_codes: [0],
        period: {
            start: dstart,
            end: dend
        }
    }

   let resp = await Http.getReport(options);
   R.doRender(resp);
}