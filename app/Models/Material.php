<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model 
{

    protected $fillable = ['name', 'info', 'maxMark', 'maxStudentNumber', 'specialization_id'];
    protected $table = 'materials';
    public $timestamps = true;

    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization');
    }

}