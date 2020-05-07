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

    public function student_material()
    {
        return $this->belongsTo('App\Models\StudentMaterial');
    }

    public function marktype()
    {
        return $this->belongsTo('App\Models\MarkType', 'mark_type_id');
    }

    

}