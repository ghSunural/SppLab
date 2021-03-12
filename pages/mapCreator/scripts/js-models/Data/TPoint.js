export let TPointdd = function TPoint_() {
    //закрытые члены класса  - в замыкании функции
    let privateVar = "private var";

    //открытые члены - эксортируем в виде объекта
    // return TPoint = {
    //    x: ''
    // }
}
//Point2d
//Point3d
//Node

export let FPoint = {

    entity: '',


    create(options = {}) {
        let entity = Object.create(FPoint.prototype);
        //добавляем индетефикатор типа
        entity.type = options.type || "TPoint";
        entity.x = options.x || '';
        entity.y = options.y || '';
        entity.z = options.z || 0;
        entity.print = () => {
            console.log(`point: ${JSON.stringify(entity, null, 2)}`);
        };
        /*
        entity.equal = (point) => {
            console.log(entity);
            console.log(point.x);
            console.log(entity.y);
            console.log(point.y);

            this.x === point.x &  this.y === point.y
            return (entity.x === point.x && entity.y === point.y);
        };

        */
        //возвращаем объект с прописанным типом
        return entity;
    },

    //непонятно зачем
    prototype: {}

}

/**
 * has fields num x y z
 * @type {{create(*=): any, prototype: {print(): void}}}
 */
export let FNode = {

    // let x_;

    create(options = {}) {
        //assign - присовить
        let point = FPoint.create("TNode");
        //объединить свойства узла и точки
        let nodeProto = Object.assign(point, FNode.prototype);
        let node = Object.create(nodeProto);
        node.name = options.name || '';
        node.x = options.x || '';
        node.y = options.y || '';
        node.z = options.z || 0;
        node.print = () => {
            console.log(`node: ${JSON.stringify(node, null, 2)}`);
        };
        return node;
    },


    prototype: {}

}

export let swapPoints = function (point_1, point_2) {

    let point_buff = point_1;
    point_1 = point_2;
    point_2 = point_1;
}

export let comparePoints = function (point_1, point_2) {

    return (point_1.x === point_2.x && point_1.y === point_2.y);
}


/*

let mouseFactory = function mouseFactory() {

    let secret = 'secret agent';
    // Функция Object.assign получает список объектов и копирует в первый target свойства из остальных.
    return Object.assign(
        Object.create(animal),
        {
            animalType: 'mouse',
            furColor: 'brown',
            legs: 4,
            tail: 'long, skinny',
            profession() {
                return secret;
            }
        });
};
let james = mouseFactory();


var Animal = {

    create(type) {
        var animal = Object.create(Animal.prototype);
        animal.type = type;
        return animal;
    },
    isAnimal(obj, type) {
        if (!Animal.prototype.isPrototypeOf(obj)) {
            return false;
        }
        return type ? obj.type === type : true;
    },
    prototype: {}
};


var Dog = {
    create(name, breed) {
        var proto = Object.assign(Animal.create("dog"), Dog.prototype);
        var dog = Object.create(proto);
        dog.name = name;
        dog.breed = breed;
        return dog;
    },
    isDog(obj) {
        return Animal.isAnimal(obj, "dog");
    },
    prototype: {
        bark() {
            console.log("ruff, ruff");
        },
        print() {
            console.log("The dog " + this.name + " is a " + this.breed);
        }
    }
};



 */