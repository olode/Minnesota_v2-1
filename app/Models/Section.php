<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model 
{

    protected $guarded = [];
    protected $table = 'sections';
    public $timestamps = true;

    public function stage()
    {
        return $this->belongsTo('App\Models\Stage');
    }


    public function student_count()
    {
        return $this->hasMany('App\Models\Student',  'section_id');
    }
    public function classes_count()
    {
        return $this->hasMany('App\Models\ClassInfo',  'section_id');
    }
    public function material_count()
    {
        return $this->hasMany('App\Models\Material',  'section_id');
    }

}