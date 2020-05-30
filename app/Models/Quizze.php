<?php

namespace App\Models;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Quizze extends Model 
{

    protected $table = 'quizzes';
    public $timestamps = true;
    protected $fillable = array('title', 'date', 'full_mark', 'class_id');

    public function class()
    {
        return $this->belongsTo('App\Models\Class');
    }


    public function quizze_mark()
    {
        return $this->hasOne('App\Models\FollowUpQuizze', 'quizze_id')->Where('student_id', Auth::user()->id);
    }

}