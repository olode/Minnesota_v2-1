<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentMaterial extends Model 
{

    protected $table = 'student_materials';
    public $timestamps = true;
    protected $guarded = [];

    public function teacher_material()
    {
        return $this->belongsTo('App\Models\TeacherMaterias');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

}