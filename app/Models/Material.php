<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model 
{

    protected $fillable = ['special_material_id', 'name', 'info', 'max_mark', 'max_students_number', 'section_id', 'specialization_id', 'optional', 'requirement'];
    protected $table = 'materials';
    public $timestamps = true;

    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization');
    }

}