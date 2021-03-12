TObserver = {
    subscribers: {
        any: []
    },
    subscribe: function (fn, type) {
        type = type || "any";
        if (typeof this.subscribers[type] === "undefined") {
            this.subscribers[type] = [];
        }
        this.subscribers[type].push(fn);
    },
    unsubscribe: function (fn, type) {
        this.visitSubscribers("unsubscribe", fn, type);
    },
    publish: function (publication, type) {
        this.visitSubscribers("publish", publication, type);
    },
    visitSubscribers: function (action, arg, type) {

        let pubtype = type || "any";
        let subscribers = this.subscribers[pubtype];
        let i;
        let max = subscribers.length;

        for (i = 0; i < max; i += 1) {
            if (action === "publish") {
                subscribers[i](arg);
            } else {
                if (subscribers[i] === arg) {
                    subscribers.splice(i, 1);
                }
            }
        }
    }
   // myfunc: mf()
};


/*
function mf(){
    alert('function out');
}
*/
 