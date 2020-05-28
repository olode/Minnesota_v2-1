<?php

namespace App\Models;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model 
{

    protected $guarded = [];
    protected $table = 'lectures';
    public $timestamps = true;

    public function class()
    {
        return $this->belongsTo('App\Models\Class');
    }

    public function attendance()
    {


        return $this->hasOne('App\Models\Attendance', 'lecture_id')->Where('student_id', Auth::user()->id);
         

    }

}