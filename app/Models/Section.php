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
        return $this->belongsTo('App\Models\Stage', 'stage_id');
    }

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'section_id');
    }


    public function teacher_count()
    {
        return $this->hasMany('App\Models\ClassInfo', 'section_id');
    }

    

}