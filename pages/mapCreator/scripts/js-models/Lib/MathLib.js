//векторное произведе
//
/*
export function calcVectorProductVtoV(vector_a, vector_b) {
    return (vector_a[0] * vector_b[1] - vector_b[0] * vector_a[1]);
}
 */
import * as T from "./TypeChecking.js";

export let calcVectorProductVtoV = (vector_a, vector_b) => {

    vector_a = T.checking4vector2d(vector_a);
    vector_b = T.checking4vector2d(vector_b);

    return (vector_a[0] * vector_b[1] - vector_b[0] * vector_a[1]);
}

export let cos_ab = function (vector_a, vector_b) {

    vector_a = T.checking4vector2d(vector_a);
    vector_b = T.checking4vector2d(vector_b);

    let Ax = vector_a[0];
    let Ay = vector_a[1];

    let Bx = vector_b[0];
    let By = vector_b[1];

    let A = Math.sqrt(Ax * Ax + Ay * Ay);
    let B = Math.sqrt(Bx * Bx + By * By);

    if (A === 0) {
        throw Error(`Вектор 0-вой длины. Входные данные: 
        \n а -  ${vector_a}`);
    } else if (B === 0) {
        throw Error(`Вектор 0-вой длины. Входные данные: 
        \n b -  ${vector_b}`);
    }


    return +(((Ax * Bx + Ay * By) / (A * B)).toFixed(5));
}


export let getVector = function (point_beg, point_end) {

    if (point_beg === point_end) {
        console.log(`Предупреждение: вектор 0-й длины 
        ${JSON.stringify(point_beg, null, 4)}
        ${JSON.stringify(point_end, null, 4)}`
        );
        //console.log(point_beg);
        // console.log(point_end);
    }

    return [(point_end.x - point_beg.x),
        (point_end.y - point_beg.y)];


}

export let dist = function ($point_beg, $point_end) {

    return Math.sqrt(($point_end.x - $point_beg.x) ** 2 + ($point_end.y - $point_beg.y) ** 2);
}

export let relativeSide = function ($edge, $chekPoint) {

    let $point_beg = $edge.p1;
    let $point_end = $edge.p2;

    let v_ab = getVector($point_beg, $point_end);
    let v_ac = getVector($point_beg, $chekPoint);
    // +1 слева, - справа, 0 - на линии
    let sign = Math.sign(calcVectorProductVtoV(v_ab, v_ac));

    switch (sign) {
        case (1):
            return "left";
        case (0):
            return "collinear";
        case (-1):
            return "right";
    }
}


export let minNeg = function (array) {

    let i = 0
    let index = -1

    while (i < array.length) {
        if ((array[i] < 0 && index === -1)
            || (array[i] < 0 && array[i] > array[index]))
        {
            index = i;
        }
        i++;
    }

    return {
        index: index + 1,
        element: array[index]
    }
}