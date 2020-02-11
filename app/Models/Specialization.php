<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model 
{

    protected $guarded = [];
    protected $table = 'specializations';
    public $timestamps = true;

    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

}