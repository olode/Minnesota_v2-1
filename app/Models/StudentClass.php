<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model 
{

    protected $guarded = [];
    protected $table = 'student_calsses';
    public $timestamps = true;

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function semester()
    {
        return $this->belongsTo('App\Models\Semester');
    }

    public function class()
    {
        return $this->belongsTo('App\Models\ClassInfo');
    }


    public function marks()
    {
        return $this->hasMany('App\Models\StudentMark', 'student_id', 'student_id');
    }

    public function lectures()
    {
        return $this->hasMany('App\Models\Lecture', 'class_id', 'class_id');
    }

    public function quizzes()
    {
        return $this->hasMany('App\Models\Quizze', 'class_id', 'class_id');
    }


    public function final_exams()
    {
        return $this->hasMany('App\Models\FinalExam', 'class_id', 'class_id');
    }



    public function year()
    {
        return $this->belongsTo('App\Models\Year');
    }



}