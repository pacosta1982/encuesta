import AppForm from '../app-components/Form/AppForm';

Vue.component('question-form', {
    mixins: [AppForm],
    props: ['survey','tipo'],
    data: function() {
        return {
            form: {
                survey_id:  this.survey ,
                section_id:  '' ,
                content:  '' ,
                type:  '' ,
                options:  '',
                rules:  '' ,

            }
        }
    }

});
