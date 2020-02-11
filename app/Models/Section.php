<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model 
{

    protected $fillable = ['name', 'info', 'stage_id'];

    protected $table = 'sections';
    public $timestamps = true;

    public function stage()
    {
        return $this->belongsTo('App\Models\Stage');
    }

}