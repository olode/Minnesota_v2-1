<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUpQuizze extends Model 
{

    protected $table = 'follow_up_quizzes';
    public $timestamps = true;
    protected $fillable = array('student_id', 'mark', 'status', 'quizze_id');

    public function quiz()
    {
        return $this->belongsTo('App\Models\Quizze');
    }

}