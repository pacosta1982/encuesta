<?php

namespace App\Http\Requests\Admin\Question;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreQuestion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.question.create');
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function rules(): array {
        return [
            'survey_id' => ['nullable', 'integer'],
            'section_id' => ['nullable', 'integer'],
            'content' => ['required', 'string'],
            'type' => ['required'],
            'options' => ['nullable'],
            'rules' => ['nullable'],

        ];
    }


    public function getTypeId()
    {
        if ($this->has('type')) {
            return $this->get('type')['name'];
        }
        return null;
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    /*public function translatableRules($locale): array {
        return [
            //'options' => ['nullable', 'string'],
            //'rules' => ['nullable', 'string'],

        ];
    }*/

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
