import * as DOM from "/pages/vector-best/scripts/js-views/js-dom.js";


export let drawChart = function (data) {

    data = data || [];

    let layout = {


        title: '',
        //  height: "100%",
        //width: '150px',
        font: {
            family: 'Lato',
            size: 12,
            color: 'rgb(6,8,188)'
        },

        // plot_bgcolor: 'rgb(106,255,0)',
        margin: {
            pad: 0,
            t: 10,
            r: 10,
            b: 20,
            l: 200
        },
        xaxis: {
            //direction: "left",

            //   title: 'Организации',
            titlefont: {
                color: 'black',
                size: 12
            },
            //   rangemode: 'tozero'
        },
        yaxis: {
            //  title: 'количество',
            categoryorder: "total ascending",
            //  categoryorder: "total descending",
            direction: "top",

            titlefont: {
                color: 'black',
                size: '20px'
            },
            // rangemode: 'tozero'
        },


        showlegend: false
    };

    var config = {responsive: false}


    let plot = Plotly.newPlot(DOM.PLOTLY, data, layout, config);
    // let plot = Plotly.newPlot('js-plotly', data);

}


export let addEnterprise = function (enterprise) {

    // U.sleep(200);
    let pl = {

        orientation: 'h',
        //histnorm: 'probability density',
        type: 'bar',
        //barmode: 'group',
        //barmode: "stack",
        // hoverinfo: 'none',
        x: [],
        y: [],
        text: [],

        textposition: 'inside',
        hoverinfo: 'none',
        marker: {
            size: 12
        }


    };


    pl.y.push(enterprise['name']);
    pl.x.push(enterprise['count']);

    pl.text.push(enterprise['count'] || 0);

    let data = [pl];
    // Plotly.relayout(DOM.PLOTLY, {yaxis});
    let plot = Plotly.addTraces(DOM.PLOTLY, data);

}



