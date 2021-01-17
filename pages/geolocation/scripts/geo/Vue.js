const defaultFormVModels = {
    styleId: '',
    width: '',
    colorLine: '',
    colorFill: ''
}

new Vue({
    el: '#styles',
    data: {
        formsData: [],
    },
    methods: {
        addForm() {
            this.formsData.push(Object.assign({}, defaultFormVModels));
        },
        removeForm(i) {
            Vue.delete(this.formsData, i);
        },
    }
})