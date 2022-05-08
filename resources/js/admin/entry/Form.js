import AppForm from '../app-components/Form/AppForm';

Vue.component('entry-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                survey_id:  '' ,
                participant_id:  '' ,
                
            }
        }
    }

});