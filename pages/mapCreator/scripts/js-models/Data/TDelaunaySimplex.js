let moduleName = "TDelaunay.js";


//TDelaunaySimplex может быть задан по разному
export let TDelaunaySimplex = function () {

    this.triangle = [];


    alert("TDelaunay - f");
}

export let checkPoint = function (point, triangle) {


    let pc = getCircle(triangle);


    return !((pc.a * (Math.pow(point.x, 2) + Math.pow(point.y, 2)) - pc.b * point.x + pc.c * point.y) < pc.d);

}


export let getCircle = function (triangle) {
/*
    point.x;
    point.y;
    triangle.p1.x;
    triangle.p1.y;
    triangle.p2.x;
    triangle.p2.y;
    triangle.p3.x;
    triangle.p3.y;

 */


    let k = Math.pow(triangle.p1.x, 2) + Math.pow(triangle.p1.y, 2)
    console.log(k);
    let m = Math.pow(triangle.p2.x, 2) + Math.pow(triangle.p2.y, 2)
    console.log(m);
    let n = Math.pow(triangle.p3.x, 2) + Math.pow(triangle.p3.y, 2)
    console.log(n);

    let a = triangle.p1.x * (triangle.p2.y - triangle.p3.y) +
        triangle.p2.x * (triangle.p3.y - triangle.p1.y) +
        triangle.p3.x * (triangle.p1.y - triangle.p2.y);


    let b = k * (triangle.p2.y - triangle.p3.y) +
        m * (triangle.p3.y - triangle.p1.y) +
        n * (triangle.p1.y - triangle.p2.y);

    let c = k * (triangle.p2.x - triangle.p3.x) +
        m * (triangle.p3.x - triangle.p1.x) +
        n * (triangle.p1.x - triangle.p2.x);


    let d = k * (triangle.p2.x * triangle.p3.y - triangle.p3.x * triangle.p2.y) +
        m * (triangle.p3.x * triangle.p1.y - triangle.p1.x * triangle.p3.y) +
        n * (triangle.p1.x * triangle.p2.y - triangle.p2.x * triangle.p1.y);


    return {
        a: a,
        b: b,
        c: c,
        d: d
    };
}


export {moduleName};
