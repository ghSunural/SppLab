import * as CONSTS from "../js-models/Consts.js";


export let drawChart = function (data) {

    data = data || [];

    let layout = {
        title: 'Триангуляция Делоне',
        // height: '150%',
        //  width: '100%',
        font: {
            family: 'Lato',
            size: 16,
            color: 'rgb(100,150,200)'
        },
        // plot_bgcolor: 'rgb(106,255,0)',
        margin: {
            pad: 2
        },
        xaxis: {
            title: 'X / долгота',
            titlefont: {
                color: 'black',
                size: 12
            },
            //   rangemode: 'tozero'
        },
        yaxis: {
            title: 'Y / широта',
            titlefont: {
                color: 'black',
                size: 12
            },
            // rangemode: 'tozero'
        },

        showlegend: false
    };

    let plot = Plotly.newPlot(CONSTS.HTML_PLOTLY, data, layout);
    // let plot = Plotly.newPlot('js-plotly', data);

}

export let plotPointSet = function (pointSet = []) {


    let data = [];

    let layout = {
        title: 'Тестовый набор',

        font: {
            family: 'Lato',
            size: 16,
            color: 'rgb(100,150,200)'
        },
        // plot_bgcolor: 'rgb(106,255,0)',
        margin: {
            pad: 10
        },
        xaxis: {
            title: 'X / долгота',
            titlefont: {
                color: 'black',
                size: 12
            },
            //   rangemode: 'tozero'
        },
        yaxis: {
            title: 'Y / широта',
            titlefont: {
                color: 'black',
                size: 12
            },
            scaleanchor: "x",
            scaleratio: 1
            // rangemode: 'tozero'
        },
        showlegend: false
    };

    let points = {
        name: 'Узлы',
        type: 'scatter',
        x: [],
        y: [],
        text: [],
        textposition: 'bottom',
        mode: 'markers+text',
        marker: {
            color: 'rgb(255,0,0)',
            size: 8
        }
    };


    for (let i = 0; i < pointSet.length; i++) {

        points.x.push(pointSet[i].x);
        points.y.push(pointSet[i].y);
        points.text.push(pointSet[i].name);
    }

    //  edges.x.push();
    //  edges.y.push();


    data.push(points);


    let plot = Plotly.newPlot(CONSTS.HTML_PLOTLY, data, layout);
}

export let addStartPoint = function (startPoint) {


    let plStartPoint = {
        name: 'Стартовая точка',
        type: 'scatter',
        x: [startPoint.x],
        y: [startPoint.y],
        text: [],
        textposition: 'left',
        mode: 'markers+text',
        marker: {
            color: 'rgb(17,255,0)',
            size: 15
        }
    };
    plStartPoint.x.push(startPoint.x);
    plStartPoint.y.push(startPoint.y);


    let data = [plStartPoint];
    let plot = Plotly.addTraces(CONSTS.HTML_PLOTLY, data);

}

export let addLine = function (edge) {

    // U.sleep(200);
    let plEdge = {
        name: 'ребра триангуляции',
        type: 'scatter',
        x: [edge.x],
        y: [edge.y],
        text: [],
        textposition: 'left',
        mode: 'line',
        marker: {
            color: 'rgb(0,115,255)',
            size: 1
        }
    };
    plEdge.x.push(edge.p1.x);
    plEdge.y.push(edge.p1.y);
    plEdge.x.push(edge.p2.x);
    plEdge.y.push(edge.p2.y);


    let data = [plEdge];

    //Plotly.relayout(CONSTS.HTML_PLOTLY, {yaxis});
    let plot = Plotly.addTraces(CONSTS.HTML_PLOTLY, data);

}



