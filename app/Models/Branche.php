<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branche extends Model 
{

    protected $guarded = [];
    
    protected $table = 'branches';
    public $timestamps = true;

    public function users()
    {
        return $this->hasMany('App\User');
    }

}