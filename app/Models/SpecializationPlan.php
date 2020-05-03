<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecializationPlan extends Model 
{

    protected $guarded = [];
    protected $table = 'specialization_plan';
    public $timestamps = true;

    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization');
    }

}