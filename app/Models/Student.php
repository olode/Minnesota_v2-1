<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model 
{

    protected $guarded = [];
    protected $table = 'students';
    public $timestamps = true;

    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization');
    }

}