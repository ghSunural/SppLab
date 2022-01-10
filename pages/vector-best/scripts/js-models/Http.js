import * as DOM from "../js-views/js-dom.js";
import * as R from "../js-views/render.js";

export let getReport = async function (options) {

    //DOM.REPORT.innerHTML = '<span class="searching">Поиск...</span>';

    DOM.REPORT_AS_LIST.innerHTML = `<div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>          
        </div>
    </div>`


    let url = 'https://lab.sppural.ru/vector-best/inspect/report';
    let body = JSON.stringify(options);

    let response = await fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: body
    });

    return await response.json();
}


export let inspect = async function () {


    DOM.LBL_LAST_UPDATE.innerHTML = `<div class="blink">
        Обновление...
    </div>`;

    DOM.REPORT_AS_LIST.innerHTML = `<div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>          
        </div>
    </div>`;

    let url = 'https://lab.sppural.ru/vector-best/inspect/do';

    let response = await fetch(url, {
        method: "POST",
    });

    let lastUpdate = await getLastUpdate();
    R.renderLastUpdate(lastUpdate['date']);

    DOM.REPORT_AS_LIST.innerHTML = `Нет записей.<br>Попробуйте выбрать другие организации и/или отчетный период`;


    return await {
        json: await response.json()
    }

}


export let updateHrefs = async function () {

    DOM.LBL_LAST_UPDATE.innerHTML = `<div class="">
        Обновление...
    </div>`;

    DOM.REPORT_AS_LIST.innerHTML = `<div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>          
        </div>
    </div>`;


    let url = 'https://lab.sppural.ru/vector-best/update-hrefs/do';

    let response = await fetch(url, {
        method: "UPDATE",
    });


    DOM.REPORT_AS_LIST.innerHTML = `Нет записей.<br>Попробуйте выбрать другие организации и/или отчетный период`;

    let lastUpdate = await getLastUpdate();
    R.renderLastUpdate(lastUpdate['date']);

    return await {
        json: await response.json()
    }

}


export let getLastUpdate = async function () {


    let url = 'https://lab.sppural.ru/vector-best/last-update';

    let response = await fetch(url, {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }

    });

    return await response.json();

}


export let getEnterprises = async function () {


    let url = 'https://lab.sppural.ru/vector-best/enterprises';


    let response = await fetch(url, {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }

    });

    return await response.json();
}


