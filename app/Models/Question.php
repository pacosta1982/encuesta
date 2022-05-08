<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Brackets\Translatable\Traits\HasTranslations;

class Question extends Model
{
//use HasTranslations;
    protected $fillable = [
        'survey_id',
        'section_id',
        'content',
        'type',
        'options',
        'rules',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];
    // these attributes are translatable
    /*public $translatable = [


    ];*/

    protected $appends = ['resource_url'];
    protected $with = ['Type'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/questions/'.$this->getKey());
    }


    public function Type()
    {
        return $this->hasOne('App\Models\Type', 'name', 'type');
    }
}
