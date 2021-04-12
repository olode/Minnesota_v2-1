<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewStudentClasse extends Model
{
    //
    protected $table = 'view_student_classes';
    public $timestamps = true;
    // protected $fillable = array('title', 'info', 'due_date', 'lecture_id', 'class_id', 'stage_id', 'section_id', 'teacher_id', 'full_mark');


    public function homeworks()
    {
        return $this->hasMany('App\Models\FollowUpHomework', 'student_id');
    }

}
