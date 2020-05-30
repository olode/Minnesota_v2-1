<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quizze extends Model 
{

    protected $table = 'quizzes';
    public $timestamps = true;
    protected $fillable = array('title', 'date', 'full_mark', 'class_id');

    public function class()
    {
        return $this->belongsTo('App\Models\ClassInfo');
    }

}