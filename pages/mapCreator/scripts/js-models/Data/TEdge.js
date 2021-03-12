import * as P from "./TPoint.js";

export let FEdge = {



    create(options = {}) {
        //assign - присовить
        let edge = {};

        //объединить свойства узла и точки
        //let nodeProto = Object.assign(point, FNode.prototype);
       // let node = Object.create(nodeProto);
        edge.name = '';
        edge.p1 = options.p1 || '';
        edge.p2 = options.p2 || '';

        edge.name = (edge.p1.name + '::' + edge.p2.name) || '';

       /* edge.isLife = "";*/
       // edge.tr = [];
        edge.trLeft;
        edge.trRight;

        return edge;
    },

    prototype: {
        print() {
          //  console.log(`X: ${this.point_beg}  Y:  ${this.point_end}`);
        }
    }

}