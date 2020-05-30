<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FollowUpHomework extends Model 
{

    protected $table = 'follow_up_homeworks';
    public $timestamps = true;
    protected $fillable = array('homework', 'homework_id', 'student_id', 'status');


    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function homework()
    {
        return $this->belongsTo('App\Models\HomeWork');
    }

}