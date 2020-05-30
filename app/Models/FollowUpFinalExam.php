<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUpFinalExam extends Model 
{

    protected $table = 'follow_up_final_exams';
    public $timestamps = true;
    protected $fillable = array('student_id', 'mark', 'status', 'final_exam_id');

    public function final_exam()
    {
        return $this->belongsTo('App\Models\FinalExam');
    }

}