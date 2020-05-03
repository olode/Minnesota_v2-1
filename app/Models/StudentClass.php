<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model 
{

    protected $table = 'student_calsses';
    public $timestamps = true;
    protected $fillable = array('class_id');

    public function Student()
    {
        return $this->belongsTo('App/Models\Student');
    }

    public function class()
    {
        return $this->belongsTo('App/Models\Class');
    }

}