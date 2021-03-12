import * as S from "./simple.js";
import * as R from "./regular.js";

export let getTestSet = function (nameSet) {

    let TestSets = {
        add(nameSet, set) {
            TestSets[nameSet] = set;
        }
    };

    TestSets.add('simple', S.simple());
    TestSets.add('regular', R.regular());

    //console.log(TestSets);
    return TestSets[nameSet];
}
