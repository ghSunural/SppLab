export let getDatePoints = function () {

    let curDate = new Date();

    let today = new Date();

    let firstday_month = new Date(curDate.getFullYear(), curDate.getMonth(), 2);
    let lastday_month = new Date(curDate.getFullYear(), curDate.getMonth() + 1, 0);

    let firstday_week = new Date(curDate.setDate(curDate.getDate() - curDate.getDay() + 1));
    let lastday_week = new Date(curDate.setDate(curDate.getDate() - curDate.getDay() + 7));


    let addDays = -3;
    let date = new Date();
    let few_days_ago =  new Date(date.setDate(date.getDate() + addDays));
   // console.log(`few_days_ago ${few_days_ago}`);


    var currentYear = new Date().getFullYear();
    console.log(currentYear);
    var firstday_year = new Date(currentYear, 0, 1);
   // console.log(firstday_year);
    var lastday_year = new Date(currentYear, 11, 31);
   // console.log(`lastday_year ${lastday_year}`);

    return {
        today: today,
        fewDaysAgo: few_days_ago,
        firstday_week: firstday_week,
        lastday_week: lastday_week,
        firstday_month: firstday_month,
        lastday_month: lastday_month,
        firstday_year: firstday_year,
        lastday_year: lastday_year
    }
}

export let n2br = function (str) {
    return str.replace(/(?:\r\n|\r|\n)/g, '<br>');
}

export let getEntryHref = function (DT_RowID) {
    let params = DT_RowID.split('-');
    let table_name = params[0];
    let int_code = params[1];
   // var arr = row.id.split('-');
//	$(row).attr('data-src', '/services/misearch?id=' + arr[1] + '&table_name=' + arr[0]);
    return `http://roszdravnadzor.gov.ru/services/misearch?id=${int_code}&table_name=${table_name}&fancybox=true`;

}

export let export2excel = function (table){
    var html = table.outerHTML;
    window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
}