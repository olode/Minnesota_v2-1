<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Year extends Model 
{

    protected $table = 'years';
    public $timestamps = true;
    protected $fillable = array('year_h', 'year_m');
    protected $visible = array('year_h', 'year_m');

}