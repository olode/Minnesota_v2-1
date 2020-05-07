<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model 
{

    protected $guarded = [];
    protected $table = 'materials';
    public $timestamps = true;
    protected $visible = array('specialization_id');

    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization');
    }

}