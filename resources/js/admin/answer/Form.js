import AppForm from '../app-components/Form/AppForm';

Vue.component('answer-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                question_id:  '' ,
                entry_id:  '' ,
                value:  '' ,
                
            }
        }
    }

});