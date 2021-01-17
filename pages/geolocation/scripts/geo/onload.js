let splitter;
let  cont1;
let  cont2;
let  last_x;
let  window_width;

function split_layout(sidebar_Id, panel_Id, splitter_Id) {
    window_width = window.innerWidth;
    splitter = document.getElementById(splitter_Id);
    cont1 = document.getElementById(sidebar_Id);
    cont2 = document.getElementById(panel_Id);
    var dx = cont1.clientWidth;
    splitter.style.marginLeft = dx + "px";
    dx += splitter.clientWidth;
    cont2.style.marginLeft = dx + "px";
    dx = window_width - dx;
    cont2.style.width = dx + "px";
    splitter.addEventListener("mousedown", spMouseDown);
}

function spMouseDown(e) {
    splitter.removeEventListener("mousedown", spMouseDown);
    window.addEventListener("mousemove", spMouseMove);
    window.addEventListener("mouseup", spMouseUp);
    last_x = e.clientX;
}

function spMouseUp(e) {
    window.removeEventListener("mousemove", spMouseMove);
    window.removeEventListener("mouseup", spMouseUp);
    splitter.addEventListener("mousedown", spMouseDown);
    resetPosition(last_x);
}

function spMouseMove(e) {
    resetPosition(e.clientX);
}

function resetPosition(nowX) {
    var dx = nowX - last_x;
    dx += cont1.clientWidth;
    cont1.style.width = dx + "px";
    splitter.style.marginLeft = dx + "px";
    dx += splitter.clientWidth;
    cont2.style.marginLeft = dx + "px";
    dx = window_width - dx;
    cont2.style.width = dx + "px";
    last_x = nowX;
}