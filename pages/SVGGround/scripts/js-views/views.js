export let jsv_pattern = function (key, ground) {

    //  console.log(medicalDevice)
    //medicalDevice["register_id_uniq"]
    let alias = ground["alias"] || '-';
    let patternCode = ground["pattern"] || '-';

    //${alias}
    //${patternCode}

    return `<div class="patternItemRow">
    <div class="patternName grid-area">
        ${alias}
    </div>
    <div class="patternCanvas grid-area">
        <svg class="rectsvg">
            <rect id="rect" x="0" y="0" width="100%" height="100%" fill="url(#${key})"></rect>
        </svg>
    </div>
    <div class="patternCode grid-area">       
        <textarea class="pattern_code">
${patternCode}
        </textarea>
    </div>
    <div class="patternTools grid-area">
        <input type="checkbox" value="N" checked>
        <br>
        <input type="color">
        <br>      
    </div>
</div>
<style>
    .patternItemRow {
        width: 98%;
        margin: 10px 0;
        box-sizing: border-box;
        padding: 5px;
        border: 1px #f17508 solid;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        display: grid;
        grid-template-columns: 25% 1fr 10%;
        grid-template-rows: 25% 1fr;

        gap: 1px;
        grid-template-areas:
            "name code tools"
            "canvas code tools";
    }

    .grid-area {
        /*border: 1px #f4fd00 solid;*/
        padding: 5px;
    }

    .patternCheck {
        grid-area: ch;
    }

    .patternName {
        grid-area: name;
        color: var(--main-color-dark);
        font-weight: bold;

    }

    .patternCanvas {
        padding: 2px;
        grid-area: canvas;
    }

    .patternCode {
        padding: 2px;
        grid-area: code;
        
    }

    .patternTools {
        grid-area: tools;
    }

    .pattern_code {
        width: 98%;
        height: 80%;
        margin: 5px;
        font-size: 0.6rem;
    }

    .rectsvg {
        background: #fff3cd;
        border: 2px #000000 solid;
        width: 98%;
        height: 75%;
        /*  height: 400px;*/
    }
</style>`

}




