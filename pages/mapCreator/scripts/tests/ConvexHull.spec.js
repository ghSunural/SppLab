import * as CH from "../js-models/Algo/ConvexHull.js";
import * as TS from "./testSets/testsSets.js";
import * as S from "./testSets/simple.js";
import * as R from "./testSets/regular.js";


describe("getStartPoint ConvexHull.js", () => {

/*
    it('регулярная сеть', () => {

        let pointsArr = TS.getTestSet('regular');
        let toBe = R.StartPoint_toBe();
        console.log(CH.getStartPoint(pointsArr));
        expect(CH.getStartPoint(pointsArr).name).toBe(toBe);

    });

 */


    it('Нет точек с одинаковыми абциссами simple', () => {

        let pointsArr = TS.getTestSet('simple');
        let toBe = S.StartPoint_toBe();
        expect(CH.getStartPoint(pointsArr).name).toBe(toBe);
    });


});

