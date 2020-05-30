<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model 
{

    protected $guarded = [];
    protected $table = 'lectures';
    public $timestamps = true;

    public function class()
    {
        return $this->belongsTo('App\Models\ClassInfo');
    }

}