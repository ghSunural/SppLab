import * as TC from "../js-models/Lib/TypeChecking.js";

describe("isNum  в TypeChecking.js", () => {

    it('целое число', () => {

        expect(TC.isNum(5)).toBe(true);
    });

    it('дробное число', () => {

        expect(TC.isNum(1.2)).toBe(true);
    });

    it('пробел в начале " 45" - Не число', () => {

        expect(TC.isNum(' 45')).toBe(false);
    });

    it('отрицательное дробное "-4.5" - Не число', () => {

        expect(TC.isNum('-4.5')).toBe(true);
    });

    it('нарушен порядок знаков "4.-5" - Не число', () => {

        expect(TC.isNum('4.-5')).toBe(false);
    });

    it('undefined', () => {

        expect(TC.isNum(undefined)).toBe(false);
    });

    it('function', () => {

        let foo = function(){};
        expect(TC.isNum(foo)).toBe(false);
    });

});


describe("checking4vector2d в TypeChecking.js", () => {

    it('Правильный 2d вектор', () => {
        let $vector = [1, 2];
        expect(TC.checking4vector2d($vector)).toBe($vector);
    });

    const failedCases = [
        [1, 2]



    ];
    it.each(failedCases)('Много аргументов', () => {

        expect(() => {
            TC.checking4vector2d($vector);
        }).toThrow();

    });




    /*
    it('дробное число', () => {

        expect(ML.isNum(1.2)).toBe(true);
    });

    it('пробел в начале " 45" - Не число', () => {

        expect(ML.isNum(' 45')).toBe(false);
    });

    it('отрицательное дробное "-4.5" - Не число', () => {

        expect(ML.isNum('-4.5')).toBe(true);
    });

    it('нарушен порядок знаков "4.-5" - Не число', () => {

        expect(ML.isNum('4.-5')).toBe(false);
    });

    it('undefined', () => {

        expect(ML.isNum(undefined)).toBe(false);
    });

    it('function', () => {

        let foo = function(){};
        expect(ML.isNum(foo)).toBe(false);
    });

     */

});



