<!--<div class="row form-inline" style="padding-bottom: 10px;" v-cloak>
    <div :class="{'col-xl-10 col-md-11 text-right': !isFormLocalized, 'col text-center': isFormLocalized, 'hidden': onSmallScreen }">
        <small>{{ trans('brackets/admin-ui::admin.forms.currently_editing_translation') }}<span v-if="!isFormLocalized && otherLocales.length > 1"> {{ trans('brackets/admin-ui::admin.forms.more_can_be_managed') }}</span><span v-if="!isFormLocalized"> | <a href="#" @click.prevent="showLocalization">{{ trans('brackets/admin-ui::admin.forms.manage_translations') }}</a></span></small>
        <i class="localization-error" v-if="!isFormLocalized && showLocalizedValidationError"></i>
    </div>

    <div class="col text-center" :class="{'language-mobile': onSmallScreen, 'has-error': !isFormLocalized && showLocalizedValidationError}" v-if="isFormLocalized || onSmallScreen" v-cloak>
        <small>{{ trans('brackets/admin-ui::admin.forms.choose_translation_to_edit') }}
            <select class="form-control" v-model="currentLocale">
                <option :value="defaultLocale" v-if="onSmallScreen">@{{defaultLocale.toUpperCase()}}</option>
                <option v-for="locale in otherLocales" :value="locale">@{{locale.toUpperCase()}}</option>
            </select>
            <i class="localization-error" v-if="isFormLocalized && showLocalizedValidationError"></i>
            <span>|</span>
            <a href="#" @click.prevent="hideLocalization">{{ trans('brackets/admin-ui::admin.forms.hide') }}</a>
        </small>
    </div>
</div>-->

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('content'), 'has-success': fields.content && fields.content.valid }">
    <label for="content" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.question.columns.content') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.content" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('content'), 'form-control-success': fields.content && fields.content.valid}" id="content" name="content" placeholder="{{ trans('admin.question.columns.content') }}">
        <div v-if="errors.has('content')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('content') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('type'), 'has-success': fields.type && fields.type.valid }">
    <label for="type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.question.columns.type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect
            v-model="form.type"
            :options="tipo"
            :multiple="false"
            track-by="name"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.call.columns.type') }}">
        </multiselect>
            <!--<input type="text" v-model="form.type" v-validate="'required'" @input="validate($event)" class="form-control"
            :class="{'form-control-danger': errors.has('type'), 'form-control-success': fields.type && fields.type.valid}" id="type" name="type"
            placeholder="{{ trans('admin.question.columns.type') }}">-->
        <div v-if="errors.has('type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('type') }}</div>
    </div>
</div>

<div class="row">

        <div class="col-md" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('options'), 'has-success': fields.options && fields.options.valid }">
                <label for="options" class="col-md-2 col-form-label text-md-right">{{ trans('admin.question.columns.options') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.options" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('options'), 'form-control-success': fields.options && fields.options.valid }" id="options" name="options" placeholder="{{ trans('admin.question.columns.options') }}">
                    <div v-if="errors.has('options')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('options') }}</div>
                </div>
            </div>
        </div>

</div>

<div class="row">
        <div class="col-md" v-cloak>
            <div class="form-group row align-items-center" :class="{'has-danger': errors.has('rules'), 'has-success': fields.rules && fields.rules.valid }">
                <label for="rules" class="col-md-2 col-form-label text-md-right">{{ trans('admin.question.columns.rules') }}</label>
                <div class="col-md-9" :class="{'col-xl-8': !isFormLocalized }">
                    <input type="text" v-model="form.rules" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rules'), 'form-control-success': fields.rules && fields.rules.valid }" id="rules" name="rules" placeholder="{{ trans('admin.question.columns.rules') }}">
                    <div v-if="errors.has('rules')" class="form-control-feedback form-text" v-cloak>{{'{{'}} errors.first('rules') }}</div>
                </div>
            </div>
        </div>
</div>

<!--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('survey_id'), 'has-success': fields.survey_id && fields.survey_id.valid }">
    <label for="survey_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.question.columns.survey_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.survey_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('survey_id'), 'form-control-success': fields.survey_id && fields.survey_id.valid}" id="survey_id" name="survey_id" placeholder="{{ trans('admin.question.columns.survey_id') }}">
        <div v-if="errors.has('survey_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('survey_id') }}</div>
    </div>
</div>-->

<!--<div class="form-group row align-items-center" :class="{'has-danger': errors.has('section_id'), 'has-success': fields.section_id && fields.section_id.valid }">
    <label for="section_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.question.columns.section_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.section_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('section_id'), 'form-control-success': fields.section_id && fields.section_id.valid}" id="section_id" name="section_id" placeholder="{{ trans('admin.question.columns.section_id') }}">
        <div v-if="errors.has('section_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('section_id') }}</div>
    </div>
</div>-->




