import FormComponent from './components/FormComponent.vue';
console.log(fields);
new Vue({
    el: '#app',
    components: {
       'form-component':  FormComponent
    },
    data: {
        fields: [],
        responses: [],
        checked: []
    },
    mounted() {
        this.setFields(fields)
        if(typeof responses !== 'undefined') {
            this.setResponse(responses)

            for(let field in this.fields) {
                this.checked.push({'prop': false});
            }
        }
    },
    methods: {
        setFields(fields) {
            return this.fields = JSON.parse(fields);
        },
        setResponse(responses) {
            return this.responses = JSON.parse(responses);
        },
        isChecked(value) {
            return this.checked = value ? 'checked' : '';
        },
        print(string) {
            string = string.replace(/_/g, ' ');
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
    }
});
