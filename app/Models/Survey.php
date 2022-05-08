<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Survey extends Model
{
use HasTranslations;
    protected $fillable = [
        'name',
        'settings',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    // these attributes are translatable
    public $translatable = [


    ];

    protected $appends = ['resource_url','survey_url'];
    protected $withCount = ['entries'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/surveys/'.$this->getKey());
    }

    public function getSurveyUrlAttribute()
    {
        return url(env('APP_URL').'/survey/'.$this->getKey());
    }

    public function entries()
    {
        return $this->hasMany('App\Models\Entry');
    }
}
