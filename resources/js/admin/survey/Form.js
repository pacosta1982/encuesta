import AppForm from '../app-components/Form/AppForm';

Vue.component('survey-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                settings:  this.getLocalizedFormDefaults() ,
                
            }
        }
    }

});