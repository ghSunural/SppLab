export let TQueue = function () {

    this.data = [];
    this.head = 0;
    this.tail = 0;

    this.isEmpty = function (element) {
       return (!this.data.length);
    }

    this.enqueue = function (element) {
        this.data[this.tail++] = element;
    }

    this.dequeue = function () {
        if (this.tail === this.head) {
            return undefined;
        }

        var element = this.data[this.head];
        delete this.elements[this.head++];
        return element;
    }
}

