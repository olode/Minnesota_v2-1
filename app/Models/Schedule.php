<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model 
{

    protected $table = 'schedule';
    public $timestamps = true;

    public function teacher_material()
    {
        return $this->hasOne('App/Models\TeacherMaterias');
    }

}