<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherMaterias extends Model 
{

    protected $table = 'teacher_materials';
    public $timestamps = true;
    protected $fillable = array('teacher_id', 'material_id', 'yearOfAdd');

    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }

    public function material()
    {
        return $this->belongsTo('App\Models\Material');
    }

}