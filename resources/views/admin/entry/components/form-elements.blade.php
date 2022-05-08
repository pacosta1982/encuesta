<div class="form-group row align-items-center" :class="{'has-danger': errors.has('survey_id'), 'has-success': fields.survey_id && fields.survey_id.valid }">
    <label for="survey_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.entry.columns.survey_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.survey_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('survey_id'), 'form-control-success': fields.survey_id && fields.survey_id.valid}" id="survey_id" name="survey_id" placeholder="{{ trans('admin.entry.columns.survey_id') }}">
        <div v-if="errors.has('survey_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('survey_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('participant_id'), 'has-success': fields.participant_id && fields.participant_id.valid }">
    <label for="participant_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.entry.columns.participant_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.participant_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('participant_id'), 'form-control-success': fields.participant_id && fields.participant_id.valid}" id="participant_id" name="participant_id" placeholder="{{ trans('admin.entry.columns.participant_id') }}">
        <div v-if="errors.has('participant_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('participant_id') }}</div>
    </div>
</div>


