import * as U from '../../js-models/Util.js'

export let jsv_item_as_list_item = function (medicalDevice) {

    //  console.log(medicalDevice)
    //medicalDevice["register_id_uniq"]
    let name = medicalDevice["device_name"] || '-';

    name = U.n2br(name);



    let shortname = medicalDevice["device_name"]
            .substring(0, medicalDevice["device_name"].indexOf('по ТУ'))
        ||
        medicalDevice["device_name"]
            .substring(0, 150) + "...";

    let cert = medicalDevice["registration_certificate"] || "$(^_^)$";
    let href = medicalDevice["href_registration_certificate"] || '';

    //let cert_ = ``;
    //download уже содержится в ссылке
    if (href !== "") {
        cert = `<a href="${href}" >${cert}</a>`;
    }

    //не получается
    let ancor = U.getEntryHref(medicalDevice["DT_RowId"])  || '-';
    ancor = `<a href="${ancor}" >Перейти >></a>`;

    let applicant = medicalDevice['enterprise_applicant_name'] || '-';
    let maker = medicalDevice['enterprise_maker_name'] || '-';
    let riskClass = medicalDevice['riskClass'] || '-';
    let date = medicalDevice['registration_date'] || '-';
    let validity_period = medicalDevice['validity_period'] || '-';
    if (validity_period !== "Бессрочно") {
        validity_period = "" + validity_period + "г.";
    }


    return `<article class="product-row">
    <details class="details">
        <summary class="item-header">
         <span class="date">${date} </span>    
         <span class="validity_period">(${validity_period}) </span> <br>
        ${maker} (Заявитель: ${applicant})<br>
           <span class="cert"> ${cert}</span><br>       
           ${shortname}<br>
 </summary>
        <div class="item-content">                   
            <br>
            <span class="title">Наименование: </span> 
                ${name}
            <br>
             <span class="title">Класс потенциального риска: </span> 
                ${riskClass}
            <br>
        </div>
    </details>
</article>
<hr>`

}

export let jsv_report_styles = function () {


    var elem = document.createElement('link');
    elem.rel = 'stylesheet';
    elem.type = 'text/css';
    document.body.appendChild(elem);
    elem.href = 'pages/vector-best/scripts/js-views/styles/enterprises.css';

}


export let jsv_enterprise_report = function (enterprise_report) {


    return `<article class="product-row">
    <details class="details">
        <summary class="divice-header">${medicalDevice["register_id_uniq"]}</summary>
        <div class="item-content">
            Регистарционное удостоверение ${medicalDevice["registration_certificate"] || "$(^_^)$"}  
            <a href="${medicalDevice["href_registration_certificate"]}">Скачать</a> 
            <br>
            <span class="title">Название</span> ${medicalDevice["device_name"]}
            <br>
        </div>
    </details>
</article>
<hr>`

}


export let jsv_item_as_table = function (table, medicalDevice) {

   // return `<tr><td>${medicalDevice["enterprise_applicant_name"]}</td></tr>`


    let row = table.insertRow();
    for(let prop in medicalDevice) {
        let cell = row.insertCell();
        cell.className = "cells_report-as-table";


        cell.innerText = medicalDevice[prop];
    }

    //return row;

}


