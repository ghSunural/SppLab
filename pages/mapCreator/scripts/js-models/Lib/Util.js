Array.prototype.top = function() {
    return this[this.length - 1];
}
Array.prototype.isEmpty = function() {
    return (this.length === 0);
}



export let deleteFromArray = function (arr, index, deleteCount) {

    Array.isArray(arr) || [];
    //slice возвращает массив из удаленных элементов
    let whatDelete = arr.splice(index, deleteCount);

    return arr;
}

export let copyArray = function (arr) {

    Array.isArray(arr) || [];
    return arr.slice();
}

export let testArray = function (arr) {

    //индекс элемента
    arr.indexOf(searchEl);

    Array.isArray(arr) || [];
    return arr.slice(1, 3);
}

/**
 * Example: arr.sort(byField('x'));
 * @param field
 * @returns {function(*, *): number}
 */

export let byField = function (field) {


    return (a, b) => a[field] > b[field] ? 1 : -1;
}


export let print = function(def) {
    console.log("-----start print---------");


    console.log("----- end print---------");
}


export let getArgs = function (func) {
    // First match everything inside the function argument parens.
    var args = func.toString().match(/function\s.*?\(([^)]*)\)/)[1];

    // Split the arguments string into an array comma delimited.
    return args.split(',').map(function (arg) {
        // Ensure no inline comments are parsed and trim the whitespace.
        return arg.replace(/\/\*.*\*\//, '').trim();
    }).filter(function (arg) {
        // Ensure no undefined values are added.
        return arg;
    });
}

let display = function ($var) {
    console.log(print);
}


export let sleep= function(milliseconds) {
    const date = Date.now();
    let currentDate = null;
    do {
        currentDate = Date.now();
    } while (currentDate - date < milliseconds);
}





