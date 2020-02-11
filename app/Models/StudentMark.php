<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model 
{

    protected $guarded = [];
    protected $table = 'student_marks';
    public $timestamps = true;

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function mark_type()
    {
        return $this->belongsTo('App\Models\MarkType');
    }

    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }
    public function student_material()
    {
        $this->belongsTo('App\Models\StudentMaterial');
    }

    public function marktype(){
        $this->belongsTo('App\Models\MarkType');
    }

}