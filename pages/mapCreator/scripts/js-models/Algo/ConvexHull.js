//Минимальная выпукалая оболчка
//Алгоритма Джарвиса

//import {FNode} from "../Data/TPoint.js";
import {byField} from "../Lib/Util.js";
import * as ML from "../Lib/MathLib.js"
import * as PL from "../../js-views/plChart.js";
import {FEdge} from "../Data/TEdge.js";
import {FNode} from "../Data/TPoint.js";

export let getConvexHull = function (sourcePoints = []) {

    let convexHull = [];

    //создаем независимую копию
    let remainderPoints = sourcePoints.slice();
    let p1 = getStartPoint(remainderPoints);
    let startPoint = p1;
    PL.addStartPoint(p1);

    let negX_ = FNode.create({name: "negXb", x: ((p1.x) - 10), y: p1.y});
    let curEdge = FEdge.create({p1: negX_, p2: startPoint});

    do {
        let p2 = getNextPoint(remainderPoints, curEdge);
        //
        curEdge = FEdge.create({p1: p1, p2: p2, trRight: 'infinity', isAlive: true});
        convexHull.push(curEdge);
        PL.addLine(curEdge);
        p1 = curEdge.p2;
        remainderPoints.splice(remainderPoints.indexOf(p1), 1);

    } while (curEdge.p2 !== startPoint);

    return {
        convexHull: convexHull,
        internalPoints: remainderPoints
    };

}


export let getStartPoint = function (sourcePoints) {
    //если точек несколько
    //создаем независимую копию
    let SP = sourcePoints.slice();
    /*  let startPointsX = [];
     SP.sort(byField('y'));
     let i = 0;
     do {
         startPointsX.push(SP[i]);
         i++;
     } while (SP[i].x === startPointsX[0].x);
     startPointsX.sort(byField('x'));
     // console.log("в функции старт поинт startPoints")
     //   console.log(startPointsX[0])
     return startPointsX[0];
    */
    return SP.sort(byField('x')).sort(byField('y'))[0];
}

/**
 * Поиск точки с минимальным положительным углом между векторами
 * @param remainderPoints
 * @param curEdge
 * @returns {*}
 */

export let getNextPoint = function (remainderPoints, curEdge) {


// c минимальным углом и вектором
    //console.log(`curEdge: ${JSON.stringify(curEdge.name)}`);

    //PointWithMinAngleAndDist
    let snode;
    let candidates = [];
    let allNodes = [];

    let va = ML.getVector(curEdge.p1, curEdge.p2);
    let vb;
    let maxCos = -1;

    for (let point2check of remainderPoints) {
        vb = ML.getVector(curEdge.p2, point2check);

        if (vb[0] === 0 && vb[1] === 0) {

            console.log("вектор 0-й длины. Пропущено");
            continue;
        }
        let cosi = ML.cos_ab(va, vb);
        point2check.cosi = ML.cos_ab(va, vb);

        if (cosi >= maxCos) {
            maxCos = cosi;
        }
        point2check.dist = ML.dist(point2check, curEdge.p2);
        candidates.push(point2check);
    }

    let line = candidates.sort(byField('cosi')).reverse();

    let linefilter = line.filter(function (point) {
        return point.cosi === maxCos;
    });

    snode = linefilter.sort(byField('dist'))[0];

    delete snode['dist'];
    delete snode['cosi'];

    return snode;

}

export let getNearestNode = function (Points, point) {

    let nearestNode;
    let dist = [];


    for (let curPoint in Points) {
        dist.push(ML.dist(point, curPoint));
    }

    return Points.valueOf(Math.min(dist));
}
