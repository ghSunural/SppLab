export let isNum = function ($var) {
    let mask = /^[-+]?[0-9]+(?:\.[0-9]+)?(?:[eE][-+][0-9]+)?$/;
    return mask.test($var);
}


export let checking4number = function ($var) {
    let mask = /^[-+]?[0-9]+(?:\.[0-9]+)?(?:[eE][-+][0-9]+)?$/;

    if (!mask.test($var)) {
        throw new TypeError('Не корректный тип данных. Ожидается число');
    }

    return $var;
}

export let checking4vector2d = function ($vector) {

    if (!Array.isArray($vector) || !($vector.length === 2)
        || !isNum($vector[0]) || !isNum($vector[1])) {
        throw new TypeError('Не корректный тип данных. Ожидается вектор-2D (массив из двух элементов-чисел)');
        // throw new Error('you are using the wrong JDK');
    }
    /* console.log($vector);*/
    return $vector;
}