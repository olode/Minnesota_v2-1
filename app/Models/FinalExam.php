<?php

namespace App\Models;
use Auth;

use Illuminate\Database\Eloquent\Model;

class FinalExam extends Model 
{

    protected $table = 'final_exams';
    public $timestamps = true;
    protected $fillable = array('title', 'date', 'full_mark', 'class_id');

    public function class()
    {
        return $this->belongsTo('App\Models\Class');
    }


    public function final_exam_mark()
    {
        return $this->hasOne('App\Models\FollowUpFinalExam', 'final_exam_id')->Where('student_id', Auth::user()->id);
    }

}