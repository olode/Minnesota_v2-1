<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model 
{

    protected $table = 'semesters';
    public $timestamps = true;
    protected $fillable = array('semester-code', 'starts_at', 'end_at', 'max_courses', 'min_courses', 'semester_fee', 'min_paid', 'due_date', 'year_id', 'specialization_id');
    protected $visible = array('specialization_id');

    public function year()
    {
        return $this->belongsTo('App/Models\Year');
    }

    public function specialization()
    {
        return $this->belongsTo('App/Models\Specialization');
    }


    public function classes()
    {
        return $this->hasMany('App\Models\ClassInfo');
    }

}