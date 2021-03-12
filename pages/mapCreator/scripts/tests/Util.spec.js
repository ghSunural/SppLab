import * as U from "../js-models/Lib/Util.js";
import {byField} from "../js-models/Lib/Util.js";


describe("deleteFromArray Util.js", () => {

//   let Pi = Math.PI;

    it('deleteFromArray', () => {

        let arr = [0, 2, 3];
        let arr_res = [0, 3];
        expect(U.deleteFromArray(arr, 1, 1)).toEqual(arr_res);
    });



});

describe("byField(x) Util.js", () => {

//   let Pi = Math.PI;

    it('byField(x)', () => {

     //   byField('x')
       // expect(U.deleteFromArray(arr, 1, 1)).toEqual(arr_res);
    });



});




