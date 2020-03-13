<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model 
{

    protected $guarded = [];
    protected $table = 'attendances';
    public $timestamps = true;

    public function lecture()
    {
        return $this->belongsTo('App\Models\Lecture');
    }

}