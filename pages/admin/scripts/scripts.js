jsUtil.contenteditable('contenteditable');
//console.log(jsUtil.getInnerText('idContent'));
window.onload = function () {
    console.log(document.getElementById('cont').value);
    console.log(jsUtil.getInnerText('cont'));
};

function save() {
    console.log(jsUtil.getInnerText('cont'));
    //jsUtil.getInnerText('id');
    //jsUtil.pushHtml('id', );
    //  console.log($elem);
    console.log('cont');
}


/*
window.onload = function () {
    jsUtil.contenteditable('contenteditable');
    console.log(jsUtil.getInnerText('idContent'));
// printableArea.setAttribute('contenteditable', true);
};



*/


