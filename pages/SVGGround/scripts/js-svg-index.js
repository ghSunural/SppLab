//import * as CONSTS from "./js-models/Consts.js";

//($('#defs_patterns').html('/pages/SVGGround/views/svg_patterns/Глина.svg'));
//$( "#defs_patterns" ).append( "/pages/SVGGround/views/svg_patterns/Глина.svg" );
//$( "#defs_patterns" ).append( "/pages/SVGGround/views/svg_patterns/Гранит.svg" );

//$( "/pages/SVGGround/views/svg_patterns/Глина.svg" ).appendTo( "/pages/SVGGround/views/svg_patterns/Глина.svg" );

//window.onload();
//import * as JSV from "./js-views/views.js";
import * as JSV from "./js-views/views.js";

let grounds = {};
loadPage();


//let grounds =  JSON.stringify(await response.json());
//let grounds =  JSON.parse(await response.json());


export async function loadPage() {


    let groundsFile = await fetch('/pages/SVGGround/views/svg_patterns/grounds.json');
    grounds = (await groundsFile.json());

    let count = Object.keys(grounds).length - 1;
    $('#countPatterns').append(count);

//let grounds =  JSON.stringify(await response.json());
//let grounds =  JSON.parse(await response.json());

    let dirPatterns = '/pages/SVGGround/views/svg_patterns/';

    for (let key in grounds) {

        let path = dirPatterns + grounds[key]['filename'];
        let divId = "defs_patterns";
        grounds[key]['pattern'] = await loadPattern(key, divId, path);

        let svg_demo = JSV.jsv_pattern(key, grounds[key]);

        let demoId = 'demo';
        let demo = document.querySelector(`#${demoId}`);

        /* demo.innerHTML += key + '<br>';*/
        demo.innerHTML += svg_demo;


        let collection = document.getElementById("svg_collection");
        // let collection  = document.querySelector(`#${svg_collection}`);
        //console.log(grounds[key])

        $('#svg_collection').val(($('#svg_collection').val()) + grounds[key]['pattern'] + "\r\n\n");

        //collection.innerText += grounds[key]['pattern'] + "\r\n\n";
        // grounds[key]['pattern'] = "здесь должен быть паттерн";
    }

}

export async function demo() {


}


export async function loadPattern(key, divId, filename) {
    let response = await fetch(filename);
    let data = (await response.text());
    let defs = document.querySelector(`#${divId}`);
    defs.innerHTML += data;
    grounds[key]['pattern'] = await data;

    return data;
}


export async function loadPattern___(divId, filename) {
    let response = await fetch(filename);
    let data = await response.text();
    let defs = document.querySelector(`#${divId}`);
    defs.innerHTML += data;
    let col = document.getElementById("svg_collection");
    // let col = document.querySelector(`#${svg_collection}`);
    col.innerText += data + "\r\n\n";


}


export async function loadPattern__(divId, filename) {

    var reader = new FileReader();
    reader.onloadend = function (evt) {
        // file is loaded
        result_base64 = evt.target.result;
    };

    // ($('#svg_collection')).text += (reader.readAsDataURL(file) + "\r\n\n");
    let col = document.getElementById("svg_collection");
    // let col = document.querySelector(`#${svg_collection}`);
    col.innerText += reader.readAsDataURL(filename) + "\r\n\n";


}


jQuery.get('/pages/SVGGround/views/svg_patterns/Глина.svg', function (data) {
//  var windowInfo = document.querySelector(`#defs_patterns`);
//   windowInfo.innerText += data;
});


($('#js-btn-collect').on('click', collect));

export async function collect() {
    //console.log('collect');
    let response = await fetch('/pages/SVGGround/views/svg_patterns/grounds.json');
    let grounds = (await response.json());

}


($('#js-btn-test').on('click', jq_test));

export function jq_test() {
//  alert('работает jquery');
    let test_svg = $('#svg-for-test').val();
//alert($('#rect').attr('fill'));

    var elements = $(test_svg);
    var found = $('.FindMe', elements);

    console.log(found);

//  $('#search').attr('href') = ;
    console.log($('#rect').attr('fill'));
    $('#rect').attr('fill', 'url(#Глина)');
    console.log($('#rect').attr('fill'));


}