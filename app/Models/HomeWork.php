<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class HomeWork extends Model 
{

    protected $table = 'homeworks';
    public $timestamps = true;
    protected $fillable = array('title', 'info', 'due_date', 'lecture_id', 'class_id', 'stage_id', 'section_id', 'teacher_id', 'full_mark');

    public function lecture()
    {
        return $this->belongsTo('App\Models\Lecture');
    }

    public function class()
    {
        return $this->belongsTo('App\Models\ClassInfo');
    }

    public function stage()
    {
        return $this->belongsTo('App\Models\Stage');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    public function follow_up_home_work()
    {
        return $this->hasOne('App\Models\FollowUpHomework', 'homework_id')->Where('student_id', Auth::user()->id);
    }

}