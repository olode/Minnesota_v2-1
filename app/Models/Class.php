<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassInfo extends Model 
{

    protected $table = 'classes';
    public $timestamps = true;
    protected $fillable = array('stage_id', 'section_id', 'semester_id', 'material_id', 'teacher_id', 'class_day', 'class_time', 'max_student', 'lecturing_allowance', 'classroom_url', 'required_attendance', 'class_fee', 'fee_due_date', 'year_id');

    public function semester()
    {
        return $this->belongsTo('App/Models\Semester');
    }

    public function material()
    {
        return $this->belongsTo('App/Model\Material');
    }

    public function teacher()
    {
        return $this->belongsTo('App/Models\Teacher');
    }

    public function year()
    {
        return $this->belongsTo('App/Models\Year');
    }

}