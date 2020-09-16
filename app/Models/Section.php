<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model 
{

    protected $guarded = [];
    protected $table = 'sections';
    public $timestamps = true;

    public function stage()
    {
        return $this->belongsTo('App\Models\Stage', 'stage_id');
    }

}