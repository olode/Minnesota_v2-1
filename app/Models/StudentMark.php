<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model 
{

    protected $guarded = [];
    protected $table = 'student_marks';
    public $timestamps = true;

    public function Student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function marktype()
    {
        return $this->belongsTo('App\Models\MarkType');
    }

    public function class()
    {
        return $this->belongsTo('App\Models\Class');
    }

}