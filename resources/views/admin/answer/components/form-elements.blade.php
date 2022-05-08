<div class="form-group row align-items-center" :class="{'has-danger': errors.has('question_id'), 'has-success': fields.question_id && fields.question_id.valid }">
    <label for="question_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.answer.columns.question_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.question_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('question_id'), 'form-control-success': fields.question_id && fields.question_id.valid}" id="question_id" name="question_id" placeholder="{{ trans('admin.answer.columns.question_id') }}">
        <div v-if="errors.has('question_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('question_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('entry_id'), 'has-success': fields.entry_id && fields.entry_id.valid }">
    <label for="entry_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.answer.columns.entry_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.entry_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('entry_id'), 'form-control-success': fields.entry_id && fields.entry_id.valid}" id="entry_id" name="entry_id" placeholder="{{ trans('admin.answer.columns.entry_id') }}">
        <div v-if="errors.has('entry_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('entry_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('value'), 'has-success': fields.value && fields.value.valid }">
    <label for="value" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.answer.columns.value') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.value" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('value'), 'form-control-success': fields.value && fields.value.valid}" id="value" name="value" placeholder="{{ trans('admin.answer.columns.value') }}">
        <div v-if="errors.has('value')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('value') }}</div>
    </div>
</div>


