import * as M from "../Lib/MathLib.js";
import * as AL from "../Algo/ConvexHull.js";
import {FEdge} from "../Data/TEdge.js";
import * as PL from "../../js-views/plChart.js";

//console.log(convexHull.top());
//convexHull.isEmpty();

export let getTrGreedy = function (sourceNodeSet) {

    let TrGreedy = [];
    let hull = AL.getConvexHull(sourceNodeSet);
    let internalPoints = (hull.internalPoints).slice();
    console.log("internalPoints");
    console.log(internalPoints);
    let convexHull = (hull.convexHull).slice();
    console.log("convexHull");
    console.log(convexHull);
    console.log("trCount");
    let trCount = 2 * (sourceNodeSet.length) - convexHull.length - 2;
    console.log(trCount);

    let stack = convexHull.slice();

    let i = 0;
    do {
        console.log("итерация " + i);

        let activeEdge = stack.pop();
        console.log("activeEdge");
        console.log(activeEdge);

        let p2 = getNodeWidthMinCos(activeEdge, internalPoints);
        console.log("p2");
        console.log(p2);

        let newEdge1 = FEdge.create(
            {
                p1: activeEdge.p1,
                p2: p2
            });

        stack.push(newEdge1);
        console.log("newEdge1");
        console.log(newEdge1);
        PL.addLine(newEdge1);
     //   console.log("activeEdge2");
     //   console.log(activeEdge);
        let newEdge2 = FEdge.create(
            {
                p1: p2,
                p2: activeEdge.p2
            });


        stack.push(newEdge2);
        console.log("newEdge2");
        console.log(newEdge2);
        PL.addLine(newEdge2);

/*
        if (activeEdge.tr.length === 2) {
            TrGreedy.push(activeEdge);
            PL.addLine(activeEdge);
        }

 */

        i++;
    }while (i < 15);

    //while (!stack.isEmpty());
    //while (i < 10);
    //while (!stack.isEmpty());

    return TrGreedy;

}
//let edgeQueue = new TQueue();
//возвращает instance
//let trD = TR.TDelaunayTriangulation();

//let nodeSet = trD.nodeSet;
//let edgeSet = trD.edgeSet;

//trD.nodeSet.push(sourceNodeSet[0]);
//  trD.nodeSet.push(sourceNodeSet[1]);

//sourceNodeSet[0]

// let activeEdge = new TR.TEdge(sourceNodeSet[0], sourceNodeSet[1]);
/*
    for (let i = 2; i < sourceNodeSet.length; i++) {

        let snode = getNodeWidthMinCos(activeEdge, sourceNodeSet);
        edgeQueue.enqueue(new TR.TEdge(activeEdge.p1, snode));
        edgeQueue.enqueue(new TR.TEdge(activeEdge.p2, snode));

        trD.nodeSet.push(sourceNodeSet[snode.name]);

    }

    //console.log(edgeQueue);
    console.log("Узлы");
    console.log(trD.nodeSet);



 */

/*
    edgeQueue.enqueue(edge);

    while(!edgeQueue.isEmpty()){

        let activeEdge = edgeQueue.dequeue();
        //    edge.            = new TR.TEdge(nodeSet[0], nodeSet[1]);

        getMinCos();

    }
    */


export let getNodeWidthMinCos = function (Edge, nodeSet) {

    let curMinCos = 1;
    let snode;
    let cosi;

    for (let i = 0; i < nodeSet.length; i++) {

        let VA = M.getVector(nodeSet[i], Edge.p1);
        let VB = M.getVector(nodeSet[i], Edge.p2);


        try {

        } catch (e) {
            continue;
        }
        cosi = M.cos_ab(VA, VB);

        if (cosi <= curMinCos) {
            snode = nodeSet[i];
            curMinCos = cosi;
        }
    }

    return snode;
}




export let getLeftPoint = function (Edge, nodeSet) {

    let curAbsMinCos = 1;
    let snode;
    let cosi;

    for (let i = 0; i < nodeSet.length; i++) {

        let VA = M.getVector(nodeSet[i], Edge.p1);
        let VB = M.getVector(nodeSet[i], Edge.p2);


        try {
            cosi = (M.cos_ab(VA, VB));
        } catch (e) {
            continue;
        }


        if (cosi <= curAbsMinCos) {
            snode = nodeSet[i];
            curAbsMinCos = cosi;
        }
    }

    return snode;
}
