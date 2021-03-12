import {isNum} from "../Lib/TypeChecking";

console.log('Модуль TDelaunayTriangulation');

export let TDelaunayTriangulation = (function () {

    let instance = {
        nodeSet: [],
        edgeSet: [],
        triangleSet: []
    }

    let node_ = '';

    this.addNode = function () {

    }

    this.deleteNode = function () {

    }

    //  TDelaunayTriangulation.prototype.subscribes = [];

    /*
        let subscribes = [];

        let f = function(){
            Array.observe(instance.nodeSet, function(changes) {
                console.log(changes);
            });
        }

     */


    return function Construct_singletone() {
        if (instance) {
            return instance;
        }
        if (this && this.constructor === Construct_singletone) {
            instance = this;
        } else {
            return new Construct_singletone();
        }
    }
}());

export let TNode = function ($orderNum, $coord_x, $coord_y, $param_z) {

    this.orderNum = $orderNum;
    this.x = $coord_x || '';
    this.y = $coord_y || '';
    this.z = $param_z || 0;
}

export let checking4Node = function ($Node) {

    if ($Node instanceof (TNode)) {
        throw new TypeError('Не корректный тип данных. Ожидается объект Узел');
    }
    /* console.log($vector);*/
    return $Node;
}

export let TEdge = function (node_1, node_2) {

    this.p1 = node_1 || '';
    this.p2 = node_2 || '';

    this.tr1 || '';
    this.tr2 || '';

    this.isLife = false;
    this.isActive = false;

}

export let TTriangle = function ($node_1, $node2, $node_3) {
    //trCount = n + i -2;
    // n - колечество всех точек
    // i - количество внутренних точек
    this.p1 = $node_1 || '';
    this.p2 = $node_2 || '';
    this.p3 = $node_3 || '';

    this.e1 = '';
    this.e2 = '';
    this.e3 = '';

    this.marked = false;
}


/*В основе алгоритма лежит идея подсчёта количества пересечений луча,
 исходящего из данной точки в направлении горизонтальной оси,
 со сторонами многоугольника. Если оно чётное,
 точка не принадлежит многоугольнику.
 В данном алгоритме луч направлен влево.
export let prevConvexHull = function (point, prevPolygon) {

    point.x = -40;
    point.y = -60;
    var xp = [-73, -33, 7, -33]; // Массив X-координат полигона
    var yp = [-85, -126, -85, -45]; // Массив Y-координат полигона

let j prevPolygon.length - 1;
    let isIntersect = false;
    for (var i = 0; i < ; i++) {
        if (
            (
                ((yp[i] <= y) && (y < yp[j])) ||
                ((yp[j] <= y) && (y < yp[i]))
            )
            && (x > (xp[j] - xp[i]) * (y - yp[i]) / (yp[j] - yp[i]) + xp[i])) {
            isIntersect = !isIntersect
        }
        j = i;
    }
    return isIntersect;


}

export let TDelaunayTriangulation____ = function () {

    this.nodeSet = [];
    this.edgeSet = [];
    this.triangleSet = [];

    let s = function () {


    }

    function doDelaunay() {


    }

}

*/
