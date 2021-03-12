import {FPoint} from "./TPoint";

export let FConvexHull = {

    // let x_;
    nodes: [],

    create(options = {}) {
        //assign - присовить
        let entity = Object.create(FConvexHull.prototype);
        //добавляем индетефикатор типа
        entity.type =  options.type || "TConvexHull";
        entity.x =  options.x || '';
        entity.y =  options.y || '';
        entity.z =  options.z || 0;
        //возвращаем объект с прописанным типом
        return entity;
    },

    prototype: {
        print() {
            console.log(`X: ${this.x}  Y:  ${this.y}this.y`);
        }
    }

}