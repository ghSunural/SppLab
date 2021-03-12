import * as Q from "../js-models/Lib/TQueue.js";


describe("очередь TQueue", () => {


    it('очередь пуста', () => {

        let queue = new Q.TQueue();
        expect(queue.isEmpty()).toBe(true);
    });



    it('Добавление в очередь', () => {

        let queue = new Q.TQueue();
        expect(queue.isEmpty()).toBe(true);
    });
});

