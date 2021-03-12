import * as ML from "../js-models/Lib/MathLib.js";
import {FPoint} from "../js-models/Data/TPoint.js";
import {FEdge} from "../js-models/Data/TEdge.js";


describe("cos_ab MathLib.js", () => {

//   let Pi = Math.PI;

    it('векторы перпендикулярны: cos(pi/2) = 0', () => {

        let vector_a = [0, 2];
        let vector_b = [1, 0];
        expect(ML.cos_ab(vector_a, vector_b)).toBeCloseTo(0.0);
    });

    it('векторы коллинеарны: cos(0) = 1', () => {

        let vector_a = [0, 2];
        let vector_b = [0, 1];
        expect(ML.cos_ab(vector_a, vector_b)).toBeCloseTo(1);
    });

    it('векторы под на треугольнике 3-4-5', () => {

        let vector_a = [1, 0];
        let vector_b = [3, 4];
        expect(ML.cos_ab(vector_a, vector_b)).toBeCloseTo(0.6);
    });

    it('векторы под на треугольнике 3-4-5', () => {

        let vector_a = [2, 0];
        let vector_b = [-4, -3];
        expect(ML.cos_ab(vector_a, vector_b)).toBe(-0.80000);
    });

    it('вектор нулевой длины', () => {

        let vector_a = [2, 0];
        let vector_b = [0, 0];
        expect(() => {
            (ML.cos_ab(vector_a, vector_b));
        }).toThrow();
    });


});


describe("calcVectorProductVtoV MathLib.js", () => {

//   let Pi = Math.PI;

    it('calcVectorProductVtoV', () => {

        let vector_a = [0, 2];
        let vector_b = [1, 0];
        expect(ML.calcVectorProductVtoV(vector_a, vector_b)).toBeCloseTo(-2.0);
    });

    it('calcVectorProductVtoV', () => {

        let vector_a = [4.5, -2.1];
        let vector_b = [1.0, 2];
        expect(ML.calcVectorProductVtoV(vector_a, vector_b)).toBeCloseTo(11.1);
    });

});


describe("relativeSide MathLib.js", () => {

    it('relativeSide вектор слева', () => {

        let pointA = FPoint.create({x: 0, y: 0});
        let pointB = FPoint.create({x: 1, y: 1});

        let edge = FEdge.create({p1: pointA, p2: pointB})

        let point2check = FPoint.create({x: 0, y: 1});
        expect(ML.relativeSide(edge, point2check)).toBe("left");
    });

    it('relativeSide векторы коллинеарны', () => {

        let pointA = FPoint.create({x: 0, y: 0});
        let pointB = FPoint.create({x: 1, y: 1});

        let edge = FEdge.create({p1: pointA, p2: pointB});

        let point2check = FPoint.create({x: 2, y: 2});
        expect(ML.relativeSide(edge, point2check)).toBe("collinear");
    });


    it('relativeSide векторы коллинеарны, направление обратное', () => {

        let pointA = FPoint.create({x: 0, y: 0});
        let pointB = FPoint.create({x: 1, y: 1});

        let edge = FEdge.create({p1: pointA, p2: pointB});

        let point2check = FPoint.create({x: -2, y: -2});
        expect(ML.relativeSide(edge, point2check)).toBe("collinear");
    });

    it('relativeSide вектор справа', () => {

        let pointA = FPoint.create({x: 0, y: 0});
        let pointB = FPoint.create({x: 1, y: 1});

        let edge = FEdge.create({p1: pointA, p2: pointB});

        let point2check = FPoint.create({x: 1, y: 0});
        expect(ML.relativeSide(edge, point2check)).toBe("right");
    });

});


describe("dist MathLib.js", () => {

    it('dist', () => {

        let pointA = FPoint.create({x: 0, y: 0});
        let pointB = FPoint.create({x: 3, y: 4});

        expect(ML.dist(pointA, pointB)).toBeCloseTo(5);
    });

    it('dist', () => {

        let pointA = FPoint.create({x: 100, y: 100});
        let pointB = FPoint.create({x: 400, y: 500});

        expect(ML.dist(pointA, pointB)).toBeCloseTo(500);
    });

});


describe("minNeg MathLib.js", () => {

    it('minNeg', () => {

        let array = [33, -21, 24, -36, 42, -11, -6, 42, 36, -1, -0.5, 43, -8, 24, 40];


        expect((ML.minNeg(array))).toEqual({index: 11, element: -0.5});
    });


});



