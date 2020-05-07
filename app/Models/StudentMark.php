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

<<<<<<< HEAD
    public function marktype()
    {
        return $this->belongsTo('App\Models\MarkType', 'mark_type_id');
=======
    public function class()
    {
        return $this->belongsTo('App\Models\ClassInfo');
>>>>>>> 5a4484109e2e9b3dccb7534f01aff4f8b8c32494
    }

}