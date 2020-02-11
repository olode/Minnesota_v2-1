<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecializationPlan extends Model 
{

    protected $table = 'specialization_plan';
    public $timestamps = true;
    protected $fillable = array('specialization_id');

    public function specialization()
    {
        return $this->belongsTo('App/Models\Specialization');
    }

}