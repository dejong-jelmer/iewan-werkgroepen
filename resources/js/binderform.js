import FormComponent from './components/FormComponent.vue';

new Vue({
    el: '#app',
    components: {
       'form-component':  FormComponent
    },
    data: {
        fields: []
    },
    methods: {
        setFields(fields) {
            return this.fields = fields
        }
    }
});
